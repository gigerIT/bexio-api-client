<?php

declare(strict_types=1);

namespace Bexio;

use Illuminate\Support\ServiceProvider;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;

class BexioServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/bexio.php',
            'bexio'
        );

        $this->app->singleton(BexioClient::class, function ($app) {
            $config = $app['config']['bexio'];

            $authentication = $this->resolveAuthentication($config);

            return new BexioClient($authentication);
        });

        $this->app->alias(BexioClient::class, 'bexio');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/bexio.php' => config_path('bexio.php'),
            ], 'bexio-config');
        }
    }

    /**
     * Resolve the authentication method from config.
     */
    protected function resolveAuthentication(array $config): ?Authenticator
    {
        // If an access token is provided directly, use it
        if (! empty($config['access_token'])) {
            return new TokenAuthenticator($config['access_token']);
        }

        // If OAuth credentials are provided and we have a stored token
        if (! empty($config['oauth']['access_token'])) {
            return new TokenAuthenticator($config['oauth']['access_token']);
        }

        return null;
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            BexioClient::class,
            'bexio',
        ];
    }
}
