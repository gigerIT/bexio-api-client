<?php

declare(strict_types=1);

namespace Bexio;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class BexioClient extends Connector
{
    use AcceptsJson;
    use AlwaysThrowOnErrors;

    /**
     * @param  string|Authenticator|null  $authentication  Token or Authenticator instance or null to manually authenticate.
     */
    public function __construct(
        string|Authenticator|null $authentication = null,
    ) {
        if (is_string($authentication)) {
            $authentication = new TokenAuthenticator($authentication);
        }

        if ($authentication) {
            $this->authenticate($authentication);
        }
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.bexio.com';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
        ];
    }

    public static function testAccount(): static
    {
        // return new self(getenv('TEST_API_KEY'));
        return new self('eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJkVTNTYXFLOHF1c25rakl4WEFsbE1EZk0zakRLYkJneDd3dlVVMHBsaUhFIn0.eyJleHAiOjE3OTAzMjMzMTAsImlhdCI6MTc3NDUxMjExMSwianRpIjoiMzcyMjcyNWYtNWFiYy00OGJiLWIwNjMtODE1MmI3MmFjZGUzIiwiaXNzIjoiaHR0cHM6Ly9hdXRoLmJleGlvLmNvbS9yZWFsbXMvYmV4aW8iLCJzdWIiOiI4ZTIwMzk2NC1hYTY5LTRhNDQtOTM4ZS05NDFkOTA2NjI1NDkiLCJ0eXAiOiJCZWFyZXIiLCJhenAiOiJiZXhpb19wYXRfcHJvdmlkZXIiLCJzaWQiOiI1MmU0ZGExYi00ODQyLTQ4OTctOTU4ZC0zNGI0NGFmMWFmOWUiLCJzY29wZSI6Im9wZW5pZCBhY2NvdW50aW5nIGtiX2RlbGl2ZXJ5X3Nob3cgYXJjaGl2ZV9lZGl0IGJhbmtfcGF5bWVudF9zaG93IHByb2plY3RfZWRpdCBhY2NvdW50aW5nX3NldHRpbmdzX2VkaXQga2JfY3JlZGl0X3ZvdWNoZXJfc2hvdyBhcmNoaXZlX3NldHRpbmdzX2VkaXQga2Jfb2ZmZXJfZWRpdCBmaWxlIHByb2plY3Rfc2hvdyBjb21wYW55X3Byb2ZpbGUga2JfYmlsbF9zaG93IGNvbnRhY3RfZWRpdCBub3RlX3Nob3cga2JfZGVsaXZlcnlfZWRpdCBrYl9leHBlbnNlX3Nob3cgcGF5cm9sbF9wYXlzdHViX3Nob3cgcGF5cm9sbF9lbXBsb3llZV9zaG93IGtiX2FydGljbGVfb3JkZXJfZWRpdCBhcnRpY2xlX2VkaXQga2JfaW52b2ljZV9lZGl0IG9mZmxpbmVfYWNjZXNzIGtiX29yZGVyX3Nob3cga2JfYXJ0aWNsZV9vcmRlcl9zaG93IHBheXJvbGxfdGltZV9hY2NvdW50X2VkaXQgcGF5cm9sbF90aW1lX2FjY291bnRfc2hvdyBzdG9ja19lZGl0IHBheXJvbGxfYWJzZW5jZV9zaG93IGVtYWlsIGtiX29yZGVyX2VkaXQgcGF5cm9sbF9lbXBsb3llZV9lZGl0IHJldm9jYWJsZSBrYl9jcmVkaXRfdm91Y2hlcl9lZGl0IGJhbmtfcGF5bWVudF9lZGl0IG1vbml0b3JpbmdfZWRpdCB0YXNrX2VkaXQgbGVhZF9lZGl0IGFjY291bnRpbmdfc2V0dGluZ3Nfc2hvdyBhcmNoaXZlX3Nob3cga2JfYmlsbF9lZGl0IG1vbml0b3Jpbmdfc2hvdyB0ZWNobmljYWwgbGVhZF9zaG93IHRhc2tfc2hvdyBhcnRpY2xlX3Nob3cgZmluYW5jZV9yZXBvcnRzIGFyY2hpdmVfc2V0dGluZ3Nfc2hvdyBrYl9pbnZvaWNlX3Nob3cgc3Vic2NyaXB0aW9uX2FuZF9wZXJtaXNzaW9ucyBjaGF0X2VkaXQga2Jfb2ZmZXJfc2hvdyBwYXlyb2xsX2Fic2VuY2VfZWRpdCBiYW5rX2FjY291bnRfc2hvdyBub3RlX2VkaXQga2JfZXhwZW5zZV9lZGl0IHByb2ZpbGUgY29udGFjdF9zaG93IiwibG9naW5faWQiOiI4ZTIwMzk2NC1hYTY5LTRhNDQtOTM4ZS05NDFkOTA2NjI1NDkiLCJjb21wYW55X2lkIjoiYm92ZmR6NXJqdHBpIiwidXNlcl9pZCI6NDI1NjEyLCJjb21wYW55X3VzZXJfaWQiOjF9.Bnsj0J55ESr_qzC0TcBXSIk4BTyD7bS5q-5L0DJdF97Z73L8EBXNFCLdXVgdCkFwvKl9u4ffxCVrJxROZNZKRkBFYb-18gEF1EkvYJpsEHTh9rdxmNkuAJmLt5_03P750ieHpQkjmPys4wtnG7iC7oLzw3iVsCsS6Qthk7urKG8ftIwxg2aTQ5YTwy9z4oFe16IYjTu8-46mf-HrFqNLTVyOAS6WNgayRF8xXbs-bpk1vffhTiu6qrQfuZuaJ9K3Ev_RZhg9PnvXY8AZCjzFeBTpBaAm6FEfblk6eRbku9dnRkv4Zz9O1olt9GvghEqmTW_euSmMkbl7Ozldvmiwuw');
    }
}
