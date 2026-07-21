<?php


use Bexio\Auth\Requests\RevokeTokenRequest;
use Bexio\BexioAuth;
use Saloon\Enums\Method;
use Saloon\Exceptions\OAuthConfigValidationException;
use Saloon\Exceptions\Request\Statuses\UnauthorizedException;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;
use Saloon\Http\Response;

it('can generate a oauth2 authorization url', function () {
    $auth = new BexioAuth('dac55bc2-04db-4102-92f7-675c6cc00ffb', 'Mod5hkJch_7S_ErhOe2ASekv5MJ7hdi5p9m77-VDJEqZkAN-JSV9wF-Em5k0Bu7S3z__FcwBrxl3CTX52CYzQw', 'http://localhost/callback');

    $url = $auth->getAuthorizationUrl(
        scopes: [
            "company_profile",
            "email",
            "offline_access",
            "openid",
            "profile",
            "accounting",
            "article_show",
            "article_edit",
            "bank_account_show",
            "bank_payment_show",
            "bank_payment_edit",
            "contact_show",
            "contact_edit",
            "file",
            "kb_invoice_show",
            "kb_invoice_edit",
            "kb_offer_show",
            "kb_offer_edit",
            "kb_order_show",
            "kb_order_edit",
            "kb_delivery_show",
            "kb_delivery_edit",
            "monitoring_show",
            "monitoring_edit",
            "note_show",
            "note_edit",
            "kb_article_order_show",
            "kb_article_order_edit",
            "project_show",
            "project_edit",
            "stock_edit",
            "task_show",
        ],
        state: 'random_state',
    );

    expect($url)->toBeString();

//    dump($url);
});

it('can get an access token', function () {
    $auth = new BexioAuth('dac55bc2-04db-4102-92f7-675c6cc00ffb', 'Mod5hkJch_7S_ErhOe2ASekv5MJ7hdi5p9m77-VDJEqZkAN-JSV9wF-Em5k0Bu7S3z__FcwBrxl3CTX52CYzQw', 'http://localhost/callback');

    $response = $auth->getAccessToken('643add39-b995-487c-9a2d-c4b2f084cdfd.318583ed-65aa-4a6d-8b1c-f8da02c03aa3.474a8da1-1d20-4031-8130-a77cada62eea', 'random_state');

    expect($response)->toBeInstanceOf(AccessTokenAuthenticator::class)
        ->and($response->getAccessToken())->toBeString()
        ->and($response->getRefreshToken())->toBeString()
        ->and($response->getExpiresAt())->not()->toBeNull();

//    dump($response);
})->skip();

it('returns the successful token revocation response', function () {
    $mockClient = new MockClient([
        RevokeTokenRequest::class => MockResponse::make('', 200),
    ]);
    $auth = (new BexioAuth('client-id', 'client-secret'))->withMockClient($mockClient);

    $response = $auth->revokeToken('refresh-token', 'refresh_token');

    expect($response)->toBeInstanceOf(Response::class)
        ->and($response->status())->toBe(200);
});

it('posts the refresh token revocation request with the exact form body', function () {
    $mockClient = new MockClient([
        RevokeTokenRequest::class => MockResponse::make('', 200),
    ]);
    $auth = (new BexioAuth('client-id', 'client-secret'))->withMockClient($mockClient);

    $auth->revokeToken('refresh-token', 'refresh_token');

    $mockClient->assertSent(function (Request $request): bool {
        return $request instanceof RevokeTokenRequest
            && $request->getMethod() === Method::POST
            && $request->resolveEndpoint() === '/revoke'
            && $request->body()->all() === [
                'token' => 'refresh-token',
                'client_id' => 'client-id',
                'client_secret' => 'client-secret',
                'token_type_hint' => 'refresh_token',
            ];
    });

    expect($mockClient->getLastPendingRequest()?->headers()->get('Content-Type'))
        ->toBe('application/x-www-form-urlencoded');
});

it('omits a null token hint and does not require a redirect URI', function () {
    $mockClient = new MockClient([
        RevokeTokenRequest::class => MockResponse::make('', 200),
    ]);
    $auth = (new BexioAuth('client-id', 'client-secret'))->withMockClient($mockClient);

    $auth->revokeToken('token-without-hint');

    $mockClient->assertSent(fn (Request $request): bool => $request instanceof RevokeTokenRequest
        && $request->body()->all() === [
            'token' => 'token-without-hint',
            'client_id' => 'client-id',
            'client_secret' => 'client-secret',
        ]);
});

it('forwards an access token hint', function () {
    $mockClient = new MockClient([
        RevokeTokenRequest::class => MockResponse::make('', 200),
    ]);
    $auth = (new BexioAuth('client-id', 'client-secret'))->withMockClient($mockClient);

    $auth->revokeToken('access-token', 'access_token');

    $mockClient->assertSent(fn (Request $request): bool => $request instanceof RevokeTokenRequest
        && $request->body()->get('token_type_hint') === 'access_token');
});

it('applies the OAuth request modifier when revoking a token', function () {
    $mockClient = new MockClient([
        RevokeTokenRequest::class => MockResponse::make('', 200),
    ]);
    $auth = (new BexioAuth('client-id', 'client-secret'))->withMockClient($mockClient);
    $auth->oauthConfig()->setRequestModifier(
        function (Request $request): void {
            $request->headers()->add('X-OAuth-Request', 'modified');
        }
    );

    $auth->revokeToken('refresh-token', 'refresh_token');

    $mockClient->assertSent(fn (Request $request): bool => $request instanceof RevokeTokenRequest
        && $request->headers()->get('X-OAuth-Request') === 'modified');
});

it('requires an OAuth client ID to revoke a token', function () {
    $auth = new BexioAuth('', 'client-secret');

    $auth->revokeToken('refresh-token', 'refresh_token');
})->throws(OAuthConfigValidationException::class, 'The Client ID is empty or has not been provided.');

it('requires an OAuth client secret to revoke a token', function () {
    $auth = new BexioAuth('client-id', '');

    $auth->revokeToken('refresh-token', 'refresh_token');
})->throws(OAuthConfigValidationException::class, 'The Client Secret is empty or has not been provided.');

it('throws for an unauthorized token revocation response', function () {
    $mockClient = new MockClient([
        RevokeTokenRequest::class => MockResponse::make(['error' => 'invalid_client'], 401),
    ]);
    $auth = (new BexioAuth('client-id', 'wrong-secret'))->withMockClient($mockClient);

    $auth->revokeToken('refresh-token', 'refresh_token');
})->throws(UnauthorizedException::class);
