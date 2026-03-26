<?php
declare(strict_types=1);


namespace Bexio\Resources;

use Bexio\BexioClient;
use Bexio\Support\QueryBuilder;
use LogicException;
use ReflectionClass;
use RuntimeException;
use Saloon\Http\Request;
use Spatie\LaravelData\Data;
use Throwable;

class Resource extends Data
{
    const INDEX_REQUEST = Request::class;
    const SHOW_REQUEST = Request::class;
    const CREATE_REQUEST = Request::class;
    const UPDATE_REQUEST = Request::class;
    const DELETE_REQUEST = Request::class;
    const QUERY_BUILDER = QueryBuilder::class;

    const OFFICE_BASE_URL = 'https://office.bexio.com';

    private BexioClient $client;

    /**
     * Instantiates a new instance of the resource with the provided BexioClient attached.
     */
    public static function useClient(BexioClient $client): static
    {
        $reflectionClass = new ReflectionClass(static::class);
        $instance = $reflectionClass->newInstanceWithoutConstructor();
        $instance->attachClient($client);
        return $instance;
    }


    /**
     * Attaches a BexioClient to the current instance of the resource.
     */
    public function attachClient(BexioClient $client): static
    {
        $this->client = $client;
        return $this;
    }

    protected function client(): BexioClient
    {
        return $this->client;
    }

    /**
     * Start a query builder for this resource
     */
    public function query(): QueryBuilder
    {
        $queryBuilderClass = static::QUERY_BUILDER;
        return new $queryBuilderClass(static::class, $this->client);
    }

    protected function newRequestInstance(?string $requestClass = null, ...$args): Request
    {
        if (!$requestClass) {
            throw new RuntimeException(static::class . " does not support this operation.");
        }

        try {
            $class = $requestClass;
            return new $class(...$args);
        } catch (Throwable $e) {
            throw new RuntimeException("Failed to create request instance: " . $e->getMessage());
        }

    }

    public function create(): static
    {
        $request = $this->newRequestInstance(static::CREATE_REQUEST, $this);
        $response = $this->client()->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    public function all(): array
    {
        return $this->query()->get();
    }


    public function find(int|string $id): static
    {
        $request = $this->newRequestInstance(static::SHOW_REQUEST, $id);
        $response = $this->client()->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    /**
     * Refresh the current instance with the latest data from the API.
     */
    public function refresh(): static
    {
        return $this->find($this->resolveResourceId());
    }


    public function update(): static
    {
        $request = $this->newRequestInstance(static::UPDATE_REQUEST, $this);
        $response = $this->client()->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    public function delete(string|int|null $id = null): bool
    {
        $request = $this->newRequestInstance(static::DELETE_REQUEST, $id ?? $this->resolveResourceId());
        $response = $this->client()->send($request);
        return $response->successful();
    }


    public function save(): static
    {
        if ($this->hasResourceId()) {
            return $this->update();
        }

        return $this->create();
    }

    protected function hasResourceId(): bool
    {
        $reflectionClass = new ReflectionClass($this);

        if (! $reflectionClass->hasProperty('id')) {
            return false;
        }

        return $reflectionClass->getProperty('id')->getValue($this) !== null;
    }

    protected function resolveResourceId(): int|string
    {
        $reflectionClass = new ReflectionClass($this);

        if (! $reflectionClass->hasProperty('id')) {
            throw new LogicException(static::class . ' does not define an id property.');
        }

        $id = $reflectionClass->getProperty('id')->getValue($this);

        if (! is_int($id) && ! is_string($id)) {
            throw new LogicException(static::class . ' does not have a persisted id.');
        }

        return $id;
    }

}
