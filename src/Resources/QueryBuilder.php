<?php

namespace Bexio\Resources;

use Bexio\BexioClient;
use Saloon\Http\Request;

trait QueryBuilder
{
    private BexioClient $client;

    public static function useClient(BexioClient $client): static
    {
        $reflectionClass = new \ReflectionClass(static::class);
        $instance = $reflectionClass->newInstanceWithoutConstructor();
        $instance->attachClient($client);
        return $instance;
    }


    public function attachClient(BexioClient $client): static
    {
        $this->client = $client;
        return $this;
    }

    protected function client(): BexioClient
    {
        return $this->client;
    }

    private function newRequestInstance(?string $requestClass = null, ...$args): Request
    {
        if (!$requestClass) {
            throw new \RuntimeException(static::class . " does not support this operation.");
        }

        try {
            $class = $requestClass;
            return new $class(...$args);
        } catch (\Throwable $e) {
            throw new \RuntimeException("Failed to create request instance: " . $e->getMessage());
        }

    }

    final public function create(): static
    {
        $request = $this->newRequestInstance(static::CREATE_REQUEST, $this);
        $response = $this->client()->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    final public function all(): array
    {
        $request = $this->newRequestInstance(static::INDEX_REQUEST);
        $response = $this->client()->send($request);
        if (!$response->successful()) {
            throw new \RuntimeException("Failed to fetch resources: " . $response->json());
        }
        return $request->createDtoFromResponse($response);
    }


    final public function find(int|string $id): static
    {
        $request = $this->newRequestInstance(static::SHOW_REQUEST, $id);
        $response = $this->client()->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }


    final public function update(): static
    {
        $request = $this->newRequestInstance(static::UPDATE_REQUEST, $this);
        $response = $this->client()->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    final public function delete(): bool
    {
        $request = $this->newRequestInstance(static::DELETE_REQUEST, $this->id);
        $response = $this->client()->send($request);
        return $response->successful();
    }


    final public function save(): static
    {
        if ($this->id) {
            return $this->update();
        } else {
            return $this->create();
        }
    }
}