<?php
declare(strict_types=1);


namespace Bexio;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Request;
use Saloon\Http\Response;

class BexioClient extends Connector
{
    public function __construct(public readonly string $apiToken)
    {
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->apiToken);
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.bexio.com/2.0';
    }

    public function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

//    public function send(Request $request, MockClient $mockClient = null, callable $handleRetry = null)
//    {
//        $response = parent::send($request, $mockClient, $handleRetry);
//
//        return  $request->createDtoFromResponse($response);
//    }

    public static function testAccount(): static
    {
        return new self("eyJraWQiOiI2ZGM2YmJlOC1iMjZjLTExZTgtOGUwZC0wMjQyYWMxMTAwMDIiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJpbmZvQGdpZ2VyaXQuY2giLCJsb2dpbl9pZCI6IjQ2NmNlMjViLWM5NjAtMTFlOS1iMTYyLWE0YmYwMTFjZTg3MiIsImNvbXBhbnlfaWQiOiJqaWFiM3A1ZW5pemwiLCJ1c2VyX2lkIjoxMjY0MjQsImF6cCI6ImV2ZXJsYXN0LXRva2VuLW9mZmljZS1jbGllbnQiLCJzY29wZSI6Im9wZW5pZCBwcm9maWxlIGVtYWlsIGFsbCB0ZWNobmljYWwiLCJpc3MiOiJodHRwczpcL1wvaWRwLmJleGlvLmNvbSIsImV4cCI6MzI5NDA3NDI2MSwiaWF0IjoxNzE3Mjc0MjYxLCJjb21wYW55X3VzZXJfaWQiOjEsImp0aSI6ImY0NTE1ZmE4LTY1OTItNDExZS1hOTU2LTZiMDM5ZjQ5YzhiYSJ9.PcoIygDxFfPXN0gAVZ4qEyXsCso1FogrjmV8A5NOdEnzN0_i8PRh6UceXmbnKmTufGhZGr9XE7vkIClb1kl8Bd86mltP9lhMiht1eglBcKA4rE-COU1LdUb2Me5lt7ywKkEMDJCKXeF2o2sCnpaK5vs3aH0VAaWezGRxlw2CbrtUaGq2ljkyLUhs4sTWehlxyegrrasV5tWZBriwlW47YuMjDoBuUUgRzXt4YsIxo6dXYNZluMi6HmXQ1HFxKNw8X8PbJL8TiWD6IOkriUWP89NsK4gbpcg1_aiztw8ABnN7Oe6K-S53cpAMEKTuWK76T1vpLByXltjU5-SRPo2SCZDCj6EF9Rk59X0OBAJz6olZdTLMJ2G7S1dwh4nnKeC6esxcjjfYDIyGaX0SsMDvRGnjptqzR1a4SLNmRMrz7Jv1DxOIrECEWnOIhLXQ9Hd2TQCk28lSn8um_zeIjHXUabz7GQ0fe1d0A-zgP3EQd32-f7-W7yIvfcfCum-ItmEgzCz2F8CyoEiyT50FskTJp_ZoLbfUiewb57SCUJVRUdC6JvEig5-6hpD57oEopLCI6LauFC9qTjtj0VWK1lCEkYTD0UIq74vXWHZhzS4ieIwOPIhpN4FmSBigR6Smom982-jq0cT8T4sO2eWLaPvTBMZ82SBAVDrs2enIX7gqxr8");
    }
}