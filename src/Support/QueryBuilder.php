<?php
declare(strict_types=1);


namespace Bexio\Support;

use Bexio\BexioClient;
use Bexio\Resources\Resource;
use InvalidArgumentException;
use Illuminate\Support\Collection;
use ReflectionClass;
use RuntimeException;
use Saloon\Http\Request;

class QueryBuilder
{
    protected Collection $parameters;

    public function __construct(
        protected string $resourceClass,
        protected BexioClient $client,
    ) {
        $this->parameters = new Collection();
    }

    /**
     * Set a parameter for the query
     */
    protected function setParameter(string $key, mixed $value): static
    {
        $this->parameters->put($key, $value);
        return $this;
    }

    protected function getParameter(string $key, mixed $default = null): mixed
    {
        return $this->parameters->get($key, $default);
    }

    /**
     * Set the limit for the query
     */
    public function limit(int $limit): static
    {
        if ($limit < 1) {
            throw new InvalidArgumentException('Limit must be greater than 0.');
        }

        $this->setParameter('limit', $limit);
        return $this;
    }

    /**
     * Set the offset for the query
     */
    public function offset(int $offset): static
    {
        if ($offset < 0) {
            throw new InvalidArgumentException('Offset cannot be less than 0.');
        }

        $this->setParameter('offset', $offset);
        return $this;
    }

    /**
     * Set the order for the query
     */
    public function orderBy(string $field, string $direction = 'asc'): static
    {
        $direction = strtolower($direction);

        if (! in_array($direction, ['asc', 'desc'], true)) {
            throw new InvalidArgumentException('Order direction must be asc or desc.');
        }

        if (str_ends_with($field, '_asc') || str_ends_with($field, '_desc')) {
            return $this->setParameter('order_by', $field);
        }

        $orderBy = $direction === 'desc'
            ? sprintf('%s_desc', $field)
            : $field;

        return $this->setParameter('order_by', $orderBy);
    }

    /**
     * Set the query to a specific page.
     */
    public function forPage(int $page, int $perPage = 15): static
    {
        if ($page < 1) {
            throw new InvalidArgumentException('Page must be greater than 0.');
        }

        if ($perPage < 1) {
            throw new InvalidArgumentException('Per-page value must be greater than 0.');
        }

        return $this
            ->limit($perPage)
            ->offset(($page - 1) * $perPage);
    }

    /**
     * Apply callback conditionally when the given value is truthy
     */
    public function when(mixed $value, callable $callback, ?callable $default = null): static
    {
        if ($value) {
            $callback($this, $value);
        } elseif ($default) {
            $default($this, $value);
        }

        return $this;
    }

    /**
     * Execute the query and return the results
     */
    public function get(): array
    {
        return $this->executeRequest($this->createIndexRequest());
    }

    /**
     * Get the first result
     */
    public function first(): mixed
    {
        $results = $this->get();
        return $results[0] ?? null;
    }

    public function __clone()
    {
        $this->parameters = clone $this->parameters;
    }

    /**
     * Create the request used for the index endpoint.
     */
    protected function createIndexRequest(): Request
    {
        return $this->createRequestWithParameters(
            requestClass: $this->resourceClass::INDEX_REQUEST,
            parameters: $this->indexRequestArguments(),
        );
    }

    /**
     * Define the constructor arguments used for the index request.
     */
    protected function indexRequestArguments(): array
    {
        return $this->parameters->all();
    }

    /**
     * Execute a request and convert the response to DTOs.
     */
    protected function executeRequest(Request $request): array
    {
        $response = $this->client->send($request);

        if (! $response->successful()) {
            $body = $response->json();
            $message = json_encode($body);

            if ($message === false) {
                $message = 'unknown error';
            }

            throw new RuntimeException('Failed to fetch resources: ' . $message);
        }

        $results = $request->createDtoFromResponse($response);

        foreach ($results as $key => $result) {
            if ($result instanceof Resource) {
                $results[$key] = $result->attachClient($this->client);
            }
        }

        return $results;
    }

    /**
     * Create a request instance with the appropriate parameters based on what the constructor accepts.
     *
     * Unmatched builder parameters are forwarded onto the request query string so
     * zero-constructor and partial-constructor index requests still receive
     * limit/offset/order_by (and resource-specific filters).
     *
     * @param array<string, mixed> $parameters
     */
    protected function createRequestWithParameters(string $requestClass, array $parameters = []): Request
    {
        $reflection = new ReflectionClass($requestClass);
        $constructor = $reflection->getConstructor();

        if (! $constructor) {
            $request = new $requestClass();
            $this->applyUnmatchedQueryParameters($request, $parameters, matchedKeys: []);

            return $request;
        }

        $args = [];
        $matchedKeys = [];

        foreach ($constructor->getParameters() as $parameter) {
            $paramName = $parameter->getName();

            if (array_key_exists($paramName, $parameters)) {
                $args[$paramName] = $parameters[$paramName];
                $matchedKeys[] = $paramName;
            } elseif ($parameter->isDefaultValueAvailable()) {
                $args[$paramName] = $parameter->getDefaultValue();
            }
        }

        $request = new $requestClass(...$args);
        $this->applyUnmatchedQueryParameters($request, $parameters, $matchedKeys);

        return $request;
    }

    /**
     * Forward builder parameters that were not bound to constructor arguments.
     *
     * @param  array<string, mixed>  $parameters
     * @param  array<int, string>  $matchedKeys
     */
    protected function applyUnmatchedQueryParameters(Request $request, array $parameters, array $matchedKeys): void
    {
        foreach ($parameters as $key => $value) {
            if (in_array($key, $matchedKeys, true)) {
                continue;
            }

            $request->query()->add(
                $key,
                $value instanceof \BackedEnum ? $value->value : $value,
            );
        }
    }
}
