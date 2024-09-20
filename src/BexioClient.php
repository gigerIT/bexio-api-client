<?php
declare(strict_types=1);


namespace Bexio;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class BexioClient extends Connector
{
    use AlwaysThrowOnErrors;

    public function __construct(public readonly string $apiToken)
    {
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->apiToken);
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.bexio.com';
    }

    public function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    public static function testAccount(): static
    {
        return new self("eyJraWQiOiI2ZGM2YmJlOC1iMjZjLTExZTgtOGUwZC0wMjQyYWMxMTAwMDIiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJiZXhpby1hcGktdGVzdGluZ0BnaWdlcml0LmNoIiwibG9naW5faWQiOiI4ZTIwMzk2NC1hYTY5LTRhNDQtOTM4ZS05NDFkOTA2NjI1NDkiLCJjb21wYW55X2lkIjoidHdicmRrYWRyc2d6IiwidXNlcl9pZCI6NDI1NjEyLCJhenAiOiJldmVybGFzdC10b2tlbi1vZmZpY2UtY2xpZW50Iiwic2NvcGUiOiJvcGVuaWQgcHJvZmlsZSBlbWFpbCBhbGwgdGVjaG5pY2FsIiwiaXNzIjoiaHR0cHM6XC9cL2lkcC5iZXhpby5jb20iLCJleHAiOjMzMDM1NTM4MjQsImlhdCI6MTcyNjc1MzgyNCwiY29tcGFueV91c2VyX2lkIjoxLCJqdGkiOiIxNzdkZDMwMy1lNTE5LTQ0MjctYjM4YS1iZThlOWJmODIwYTgifQ.Dlhyn4VrfeR1OpTJZ86Q9WKyfI8V9ddpNifgUvzvC54YPIDzfz7K8FbmhNo6wX5rs0EcCezx3Ymu5gTNLMjfXvwdhdaWh9drBM7HVyEvUr3t-KeWyN_hT_OaycOlaR8zcraZelyODztIqoDlQHhD3cRbZhlQaRHIGmTlXMDRqkuzjUbZoTdTp2Z4MsKO2DWLd0KtdRslwLEToLcHxJjdr-kVcHB_TWVLhlfc2_kpFyBMHXmfMd2RRh35Xmm7PB1oaxpZ348uA8IZEuzjnf5jWu8ROpQO5agOmyc7B9NReA0oq3AXz5QK0XkT8Mm9P-62HMO8dv531O3LyWEi4Tbi16nYucHAjZmpUuDVl9bMf972PqG3SweJFKvB-SUr5bfGA_6iOYxze7d2U3SkaBaOB1YqDQyQHiiD5gHnAYaeEWwWUx1KHqG42vJvfEFYm-xTkFaEsQvSOL8R7NQsS5sI_kYJngGcH7XzUdr9vsh9mZnnKGeT7s0lMrpwWPPPAQHqsD87Td5tRhjxJs-SpSxBv3urg5yUaHSlq1WjLUFAo9DxnF8XN3PzOvpmSlZ8U3FBFyUNaI2uvb-o0THGcfGu_MHuTb_VTtEo_tleLTuslUmraPWDvyEu_-gun1vYosSkniZN6eUbWHpnK6nJ9odGxTlBB9z9wCed9t4CDrKeZV0");
    }
}