<?php
declare(strict_types=1);


namespace Bexio;

use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Connector;
use Saloon\Traits\OAuth2\AuthorizationCodeGrant;
use Saloon\Traits\Plugins\AcceptsJson;

class BexioAuth extends Connector
{
    use AuthorizationCodeGrant;
    use AcceptsJson;

    public function __construct(
        private readonly string  $clientId,
        private readonly string  $clientSecret,
        private readonly ?string $redirectUri = null,
    )
    {
        $this->oauthConfig()->setClientId($clientId);
        $this->oauthConfig()->setClientSecret($clientSecret);

        if ($this->redirectUri) {
            $this->oauthConfig()->setRedirectUri($redirectUri);
        }
    }


    public function resolveBaseUrl(): string
    {
        return 'https://auth.bexio.com/realms/bexio/protocol/openid-connect';
    }


    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setAuthorizeEndpoint('/auth')
            ->setTokenEndpoint('/token')
            ->setUserEndpoint('/userinfo');
    }
}