<?php

namespace Bexio\Resources;

use Bexio\BexioClient;
use Saloon\Http\Request;

trait QueryBuilder
{
    public static function useClient(BexioClient $client): static
    {
        $instance = new static();
        $instance->client = $client;

        return $instance;
    }

    final public function all(): array
    {
        $request = $this->newRequestInstance(static::INDEX_REQUEST);
        $response = $this->client->send($request);
        return $request->createDtoFromResponse($response);
    }

    private function newRequestInstance(string $requestClass, ...$args): Request
    {
        try {
            $class = $requestClass;
            return new $class(...$args);
        } catch (\Throwable $e) {
            throw new \RuntimeException("Failed to create request instance: " . $e->getMessage());
        }

    }

    final public function find(int $id): static
    {
        $request = $this->newRequestInstance(static::SHOW_REQUEST, $id);
        $response = $this->client->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client);
    }

    public function attachClient(BexioClient $client): static
    {
        $this->client = $client;
        return $this;
    }

    final public function delete(): bool
    {
        $request = $this->newRequestInstance(static::DELETE_REQUEST, $this->id);
        $response = $this->client->send($request);
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

    final public function update(): static
    {
        $request = $this->newRequestInstance(static::UPDATE_REQUEST, $this->id, $this);
        $response = $this->client->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client);
    }

    final public function create(): static
    {
        $request = $this->newRequestInstance(static::CREATE_REQUEST, $this);
        $response = $this->client->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client);
    }
}