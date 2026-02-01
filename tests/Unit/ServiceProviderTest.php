<?php

use Bexio\BexioClient;
use Bexio\BexioServiceProvider;
use Bexio\Facades\Bexio;

test('service provider is loaded', function () {
    expect($this->app->getProviders(BexioServiceProvider::class))
        ->toHaveCount(1);
});

test('config is merged', function () {
    expect(config('bexio'))
        ->toBeArray()
        ->toHaveKey('access_token')
        ->toHaveKey('oauth')
        ->toHaveKey('scopes');
});

test('bexio client can be resolved from container', function () {
    config(['bexio.access_token' => 'test-token']);

    $client = app(BexioClient::class);

    expect($client)->toBeInstanceOf(BexioClient::class);
});

test('bexio client can be resolved using alias', function () {
    config(['bexio.access_token' => 'test-token']);

    $client = app('bexio');

    expect($client)->toBeInstanceOf(BexioClient::class);
});

test('bexio client is singleton', function () {
    config(['bexio.access_token' => 'test-token']);

    $client1 = app(BexioClient::class);
    $client2 = app(BexioClient::class);

    expect($client1)->toBe($client2);
});

test('facade resolves to bexio client', function () {
    config(['bexio.access_token' => 'test-token']);

    expect(Bexio::getFacadeRoot())->toBeInstanceOf(BexioClient::class);
});

test('config can be published', function () {
    $this->artisan('vendor:publish', [
        '--tag' => 'bexio-config',
    ])->assertExitCode(0);
});
