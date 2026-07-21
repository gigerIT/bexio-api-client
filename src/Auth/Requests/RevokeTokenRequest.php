<?php

declare(strict_types=1);

namespace Bexio\Auth\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;
use Saloon\Traits\Plugins\AcceptsJson;

class RevokeTokenRequest extends Request implements HasBody
{
    use AcceptsJson;
    use HasFormBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected OAuthConfig $oauthConfig,
        protected string $token,
        protected ?string $tokenTypeHint = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/revoke';
    }

    /**
     * @return array<string, string>
     */
    protected function defaultBody(): array
    {
        $body = [
            'token' => $this->token,
            'client_id' => $this->oauthConfig->getClientId(),
            'client_secret' => $this->oauthConfig->getClientSecret(),
        ];

        if ($this->tokenTypeHint !== null) {
            $body['token_type_hint'] = $this->tokenTypeHint;
        }

        return $body;
    }
}
