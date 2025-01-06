<?php
declare(strict_types=1);


namespace Bexio;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class BexioClient extends Connector
{
    use AlwaysThrowOnErrors;
    use AcceptsJson;

    const PUBLIC_TEST_API_KEY = "eyJraWQiOiI2ZGM2YmJlOC1iMjZjLTExZTgtOGUwZC0wMjQyYWMxMTAwMDIiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJiZXhpby1hcGktdGVzdGluZ0BnaWdlcml0LmNoIiwibG9naW5faWQiOiI4ZTIwMzk2NC1hYTY5LTRhNDQtOTM4ZS05NDFkOTA2NjI1NDkiLCJjb21wYW55X2lkIjoiNW54b3l0aHBiMXFrIiwidXNlcl9pZCI6NDI1NjEyLCJhenAiOiJldmVybGFzdC10b2tlbi1vZmZpY2UtY2xpZW50Iiwic2NvcGUiOiJvcGVuaWQgcHJvZmlsZSBlbWFpbCBhbGwgdGVjaG5pY2FsIiwiaXNzIjoiaHR0cHM6XC9cL2lkcC5iZXhpby5jb20iLCJleHAiOjMzMDQ3NDY5OTQsImlhdCI6MTcyNzk0Njk5NCwiY29tcGFueV91c2VyX2lkIjoxLCJqdGkiOiJlZGZhMzIyNS01NTY3LTQ1ODYtOTc2Ni0xNzY5NzUxZmIxNWIifQ.oZfPiv_neKSm5r-Hl94SXmwSZXyOH4SPN1sMnhaFAh5wDDe-NXm8uGbqfVoTQfBQMONGZFQTU3JFk1fxisD6cJKaI3Fxs4bPeXkU9T_NPHH2hKYOMm8d2WdG9Om_ma6F3qusrIsoxiDwQ3W7PRbE_uqksnY5FanjoezmWd_mISFUWt1-ENNMYvHG9lVCy8ZRhPkWukJISPhPzV9zV5ZKjghai3jdZ9IRU9kKc7uX8b9HHFOWwJxrRND81SRC7vIWYvt47wjEc2LAYnen1gud2sz3xpZs757EvPP0-7YSSl-8uptA8OpVsfm3ZQj4dni9diujVxEHMnIzMT0Zt5T8WY7AmY6gh6ZOzLfW1ZnnYEDhbZ0xJHEQBP-N8B-NcLKcyKjcJeNqXw0coU0FSMxqCoblxSBlTrBiwGQXh2Ke3htXrXlrasSp18f1pjzXMMqLjNxP2faENzDZK04eOd_sC4MHBZayqx8rGynEhoKluhaowIJBAm1LNM4SUanZZi6zhlAH5DjAYNgFNRvDk-gpg2Jk5NtBecCrVRvpRlrUrgS4dzmRymEFkfHrghGAi4MTAIIkNaq2pMBBbS22zaYPY8II2iYMzIhnX7L4RBU2pr0RtKhGWmWrRDrW4OFMhgGIfrcBy2x0kdB8bbPYBJnZV1nvB5IrFYQqzLT2aoH6CYM";


    public function __construct(
        protected ?Authenticator $authenticator = null,
    )
    {
    }

//    protected function defaultAuth(): TokenAuthenticator
//    {
//        return new TokenAuthenticator($this->apiToken);
//    }

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