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
        return new self("eyJraWQiOiI2ZGM2YmJlOC1iMjZjLTExZTgtOGUwZC0wMjQyYWMxMTAwMDIiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJiZXhpby1hcGktdGVzdGluZ0BnaWdlcml0LmNoIiwibG9naW5faWQiOiI4ZTIwMzk2NC1hYTY5LTRhNDQtOTM4ZS05NDFkOTA2NjI1NDkiLCJjb21wYW55X2lkIjoiZTA4eXB4OW5oaGt0IiwidXNlcl9pZCI6NDI1NjEyLCJhenAiOiJldmVybGFzdC10b2tlbi1vZmZpY2UtY2xpZW50Iiwic2NvcGUiOiJvcGVuaWQgcHJvZmlsZSBlbWFpbCBhbGwgdGVjaG5pY2FsIiwiaXNzIjoiaHR0cHM6XC9cL2lkcC5iZXhpby5jb20iLCJleHAiOjMyOTg1MTIwMzcsImlhdCI6MTcyMTcxMjAzNywiY29tcGFueV91c2VyX2lkIjoxLCJqdGkiOiJiY2EzZWRjYS0wZjg0LTQ2MWMtYWM0Mi05OTVlNjI3YTU2YzYifQ.Xio6mD5SRHI47lGWmuqozLNl4RtHD-WYzrvyLhbA8p649llPmi21NMEsYP750-nqQFc4R2e9fGc4flIYXWAnWuofVvXc7J_uKwNviDPddfHGilmSuhCKBMNzJuz9ORafDlkkGQrPLEpbbegkCG4QgeCY8JHQYpC4ia8yiaIkIbRK664QVhUlXOi7dOnMm2ZkhX7JZRpqMa7WUqEWcDErbcXOgZLBp-_WXzgE_6bU330ZBka718o8M71GH3wdAn7-11Z01J4xNBfkNpmn6BgyGJfz0B2QfoqxaAoodUlMCp1QpD4jPBN8Mn5KPgMe1T5nfZuOFlFMALBfAR2p1-fhMBN9lgj5SZT1vcYc1gUrCnLX52xWsHjHTlmZmXET37myuihPV6FrKjDFQFeFfuSTrz1GfGrOcSAIwnqj87HDmTAHAMFQyIt3CT2Mz6JLRVg0o_xr4m6bf7Dr1bOWQErJr19G4Yl-IrahhCgn--u4W9rTewC3W-YiJppM-rsL7cOc9zs5j-zc4o8PMLQgtOXPhUu0VSnRVw2v7fjq9shbvuam9K3iilPoTs26MQUgzjncDra24MtYqaGftqbglfSYt3VplAZvyfMpnvFniU7z5I0u7aiI-EgneCkLapUoXipfyKOD_jm4STNlxXU0qng85Dr22lTDyBWWmwdybv4WruU");
    }
}