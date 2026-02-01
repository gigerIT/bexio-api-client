<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Bexio API Access Token
    |--------------------------------------------------------------------------
    |
    | This is your Bexio API access token. You can generate a Personal Access
    | Token (PAT) in your Bexio account settings under "Apps & Extensions".
    | This is the simplest authentication method for server-to-server requests.
    |
    */

    'access_token' => env('BEXIO_ACCESS_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | OAuth2 Configuration
    |--------------------------------------------------------------------------
    |
    | If you need to use OAuth2 authentication (for user-based authentication),
    | configure your OAuth2 credentials here. This is typically used when
    | building applications where users authenticate with their own Bexio account.
    |
    */

    'oauth' => [
        'client_id' => env('BEXIO_CLIENT_ID'),
        'client_secret' => env('BEXIO_CLIENT_SECRET'),
        'redirect_uri' => env('BEXIO_REDIRECT_URI'),

        // Stored access token from OAuth flow (typically stored in database per user)
        'access_token' => env('BEXIO_OAUTH_ACCESS_TOKEN'),
        'refresh_token' => env('BEXIO_OAUTH_REFRESH_TOKEN'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Scopes
    |--------------------------------------------------------------------------
    |
    | When using OAuth2 authentication, these scopes will be requested by
    | default. You can override these when calling getAuthorizationUrl().
    |
    | Available scopes include: openid, profile, email, offline_access,
    | contact_show, contact_edit, article_show, article_edit, etc.
    |
    | See Bexio API documentation for the full list of available scopes.
    |
    */

    'scopes' => [
        'openid',
        'profile',
        'offline_access',
        'contact_show',
        'contact_edit',
        'article_show',
        'article_edit',
        'kb_invoice_show',
        'kb_invoice_edit',
        'kb_offer_show',
        'kb_offer_edit',
        'kb_order_show',
        'kb_order_edit',
        'accounting',
        'bank_account_show',
        'bank_payment_show',
    ],

];
