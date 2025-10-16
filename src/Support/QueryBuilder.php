<?php
declare(strict_types=1);


namespace Bexio\Support;

use Bexio\BexioClient;
use Illuminate\Support\Collection;
use ReflectionClass;
use RuntimeException;

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

    /**
     * Execute the query and return the results
     */
    public function get(): array
    {
        $indexRequestClass = $this->resourceClass::INDEX_REQUEST;

        $request = $this->createRequestWithParameters($indexRequestClass);

        $response = $this->client->send($request);

        if (!$response->successful()) {
            throw new RuntimeException("Failed to fetch resources: " . $response->json());
        }

        return $request->createDtoFromResponse($response);
    }

    /**
     * Get the first result
     */
    public function first(): mixed
    {
        $results = $this->get();
        return $results[0] ?? null;
    }

    /**
     * Create a request instance with the appropriate parameters based on what the constructor accepts
     */
    protected function createRequestWithParameters(string $requestClass): object
    {
        $reflection = new ReflectionClass($requestClass);
        $constructor = $reflection->getConstructor();

        // If there's no constructor, just instantiate the class
        if (!$constructor) {
            return new $requestClass();
        }

        $constructorParams = $constructor->getParameters();
        $args = [];

        foreach ($constructorParams as $parameter) {
            $paramName = $parameter->getName();

            // Try to match from our parameters collection, otherwise use default value
            if ($this->parameters->has($paramName)) {
                $args[$paramName] = $this->parameters->get($paramName);
            } elseif ($parameter->isDefaultValueAvailable()) {
                $args[$paramName] = $parameter->getDefaultValue();
            }
        }

        return new $requestClass(...$args);
    }
}