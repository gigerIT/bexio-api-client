<?php

declare(strict_types=1);

namespace Bexio\Facades;

use Bexio\BexioClient;
use Illuminate\Support\Facades\Facade;
use Saloon\Contracts\Authenticator;

/**
 * @method static BexioClient authenticate(Authenticator $authenticator)
 * @method static string resolveBaseUrl()
 * @method static \Saloon\Http\Response send(\Saloon\Http\Request $request, ?\Saloon\Http\Faking\MockClient $mockClient = null, ?callable $handleRetry = null)
 * @method static \Saloon\Http\Response sendAndRetry(\Saloon\Http\Request $request, int $maxAttempts, int $interval = 0, ?callable $handleRetry = null, bool $throw = true, ?\Saloon\Http\Faking\MockClient $mockClient = null)
 *
 * @see \Bexio\BexioClient
 */
class Bexio extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return BexioClient::class;
    }
}
