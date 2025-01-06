<?php


use Bexio\BexioAuth;
use Saloon\Http\Auth\AccessTokenAuthenticator;

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

    dump($url);
});

it('can get an access token', function () {
    $auth = new BexioAuth('dac55bc2-04db-4102-92f7-675c6cc00ffb', 'Mod5hkJch_7S_ErhOe2ASekv5MJ7hdi5p9m77-VDJEqZkAN-JSV9wF-Em5k0Bu7S3z__FcwBrxl3CTX52CYzQw', 'http://localhost/callback');

    $response = $auth->getAccessToken('643add39-b995-487c-9a2d-c4b2f084cdfd.318583ed-65aa-4a6d-8b1c-f8da02c03aa3.474a8da1-1d20-4031-8130-a77cada62eea', 'random_state');

    expect($response)->toBeInstanceOf(AccessTokenAuthenticator::class)
        ->and($response->getAccessToken())->toBeString()
        ->and($response->getRefreshToken())->toBeString()
        ->and($response->getExpiresAt())->not()->toBeNull();

    dump($response);
});
