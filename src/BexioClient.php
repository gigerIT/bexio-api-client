<?php
declare(strict_types=1);


namespace Bexio;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class BexioClient extends Connector
{
    use AlwaysThrowOnErrors;
    use AcceptsJson;

    /**
     * @param string|Authenticator|null $authentication Token or Authenticator instance or null to manually authenticate.
     */
    public function __construct(
        string|Authenticator|null $authentication = null,
    )
    {
        if (is_string($authentication)) {
            $authentication = new TokenAuthenticator($authentication);
        }

        if ($authentication) {
            $this->authenticate($authentication);
        }
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.bexio.com';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    public static function testAccount(): static
    {
        return new self(getenv('TEST_API_KEY'));
    }
}