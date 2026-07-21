<?php
declare(strict_types=1);


namespace Bexio;

use Bexio\Auth\Requests\RevokeTokenRequest;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Connector;
use Saloon\Http\Response;
use Saloon\Traits\OAuth2\AuthorizationCodeGrant;
use Saloon\Traits\Plugins\AcceptsJson;

class BexioAuth extends Connector
{
    use AuthorizationCodeGrant;
    use AcceptsJson;

    public function __construct(
        string  $clientId,
        string  $clientSecret,
        ?string $redirectUri = null,
    )
    {
        $this->oauthConfig()->setClientId($clientId);
        $this->oauthConfig()->setClientSecret($clientSecret);

        if ($redirectUri) {
            $this->oauthConfig()->setRedirectUri($redirectUri);
        }
    }


    public function resolveBaseUrl(): string
    {
        return 'https://auth.bexio.com/realms/bexio/protocol/openid-connect';
    }


    public function revokeToken(string $token, ?string $tokenTypeHint = null): Response
    {
        $oauthConfig = $this->oauthConfig();
        $oauthConfig->validate(withRedirectUrl: false);

        $request = new RevokeTokenRequest($oauthConfig, $token, $tokenTypeHint);
        $request = $oauthConfig->invokeRequestModifier($request);
        $response = $this->send($request);

        $response->throw();

        return $response;
    }


    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setAuthorizeEndpoint('/auth')
            ->setTokenEndpoint('/token')
            ->setUserEndpoint('/userinfo');
    }
}
