<?php
declare(strict_types=1);


namespace Bexio;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class BexioClient extends Connector
{
    public function __construct(public readonly string $apiToken) {}

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->apiToken);
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.bexio.com/2.0';
    }

    public function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }
}