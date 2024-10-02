<?php
declare(strict_types=1);


namespace Bexio;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class BexioClient extends Connector
{
    use AlwaysThrowOnErrors;

    const PUBLIC_TEST_API_KEY = "eyJraWQiOiI2ZGM2YmJlOC1iMjZjLTExZTgtOGUwZC0wMjQyYWMxMTAwMDIiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJiZXhpby1hcGktdGVzdGluZ0BnaWdlcml0LmNoIiwibG9naW5faWQiOiI4ZTIwMzk2NC1hYTY5LTRhNDQtOTM4ZS05NDFkOTA2NjI1NDkiLCJjb21wYW55X2lkIjoidHdicmRrYWRyc2d6IiwidXNlcl9pZCI6NDI1NjEyLCJhenAiOiJldmVybGFzdC10b2tlbi1vZmZpY2UtY2xpZW50Iiwic2NvcGUiOiJvcGVuaWQgcHJvZmlsZSBlbWFpbCBhbGwgdGVjaG5pY2FsIiwiaXNzIjoiaHR0cHM6XC9cL2lkcC5iZXhpby5jb20iLCJleHAiOjMzMDQ2NTUxMTksImlhdCI6MTcyNzg1NTExOSwiY29tcGFueV91c2VyX2lkIjoxLCJqdGkiOiJiZDU3YjVlOS1iZGVkLTQyMzUtOWYxZC05ODZmNGM4YzlmYzcifQ.mpVV0iEBrae2syUEWZKtE7gLMz7Ok0WQoWjpwdibSleJJbhJ_vx8ZsqEMr6LRe16LrXehG2Br0d-71GiYNEeS1WuB2AH_C_lGRX4MZ5JKGcFYWrAPbO6w-kV-l1E-TM4gDi776AZ-CLtX2D7ikgrvgj29mBHnQ-NjiDBGbrGE2iWS5GDblz-oOKfLwVHbj7SImvbrSs9K7DX3HE-Tz4ilsN0oUW11RMPw8P2Ig24kYMqy6HL2jacG15GkseOc4L3E7COZWnvP_azI4_t2uLHK_YelhbxcQ50vaCby6kWg2_xKWR4Fn8C7YzbNWdxq34aR5sbY5YevkcPdc4ICYMWdnqokWOHbkjhmA5gcILZoUOzM2R6ekO3T0VIfYhHMXs1aXnVARuTNGBugBzdnq0RJmXpGFgGQUtYNUre89YwfTSPdIKG2s9rjZTwxDWt3JDZ2U_eBrVP2keRmoWQwaQ2-xRTVNiAwu1mNjgqjdUhuBarXntn1Kxb0nPHtImPnz0KFkhv5AGi2b1oqpf9XNnOFH3gm0r7GPGDhJRrJFSVAnamDh3GWPpBplrFtdUN2OcqoPtYsbYog5s0IWsA2QLccCm0v6RFiAG7BlhfhAkCXYjqk7l1MzQcC1s4waKjxKKSF3qqxWKQfBsK4CAoEDb8Kun2AP8ntlicFyvQOv3-vH8";

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
        return new self(self::PUBLIC_TEST_API_KEY);
    }
}