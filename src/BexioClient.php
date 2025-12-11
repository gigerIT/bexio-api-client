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
    use AlwaysThrowOnErrors;
    use AcceptsJson;

    /**
     * @param string|Authenticator|null $authentication Token or Authenticator instance or null to manually authenticate.
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
        return new self("eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJkVTNTYXFLOHF1c25rakl4WEFsbE1EZk0zakRLYkJneDd3dlVVMHBsaUhFIn0.eyJleHAiOjE3NzU4MTI2NjcsImlhdCI6MTc2MDAwMTQ2NywianRpIjoiZThmNTBjYmQtMzUyMi00YjYxLWJjY2YtMWI1MzQyNTFmMDcxIiwiaXNzIjoiaHR0cHM6Ly9hdXRoLmJleGlvLmNvbS9yZWFsbXMvYmV4aW8iLCJzdWIiOiI4ZTIwMzk2NC1hYTY5LTRhNDQtOTM4ZS05NDFkOTA2NjI1NDkiLCJ0eXAiOiJCZWFyZXIiLCJhenAiOiJiZXhpb19wYXRfcHJvdmlkZXIiLCJzaWQiOiI5NTNlY2VjMi02ZWU1LTQ0NzMtOTM1NC02NzIxYTRkMzEzMWQiLCJzY29wZSI6Im9wZW5pZCBhY2NvdW50aW5nIGtiX2RlbGl2ZXJ5X3Nob3cgYmFua19wYXltZW50X3Nob3cgcHJvamVjdF9lZGl0IGFjY291bnRpbmdfc2V0dGluZ3NfZWRpdCBrYl9jcmVkaXRfdm91Y2hlcl9zaG93IGtiX29mZmVyX2VkaXQgZmlsZSBwcm9qZWN0X3Nob3cgY29tcGFueV9wcm9maWxlIGtiX2JpbGxfc2hvdyBjb250YWN0X2VkaXQgbm90ZV9zaG93IGtiX2RlbGl2ZXJ5X2VkaXQga2JfZXhwZW5zZV9zaG93IHBheXJvbGxfcGF5c3R1Yl9zaG93IHBheXJvbGxfZW1wbG95ZWVfc2hvdyBrYl9hcnRpY2xlX29yZGVyX2VkaXQgYXJ0aWNsZV9lZGl0IGtiX2ludm9pY2VfZWRpdCBvZmZsaW5lX2FjY2VzcyBrYl9vcmRlcl9zaG93IGtiX2FydGljbGVfb3JkZXJfc2hvdyBwYXlyb2xsX3RpbWVfYWNjb3VudF9lZGl0IHBheXJvbGxfdGltZV9hY2NvdW50X3Nob3cgc3RvY2tfZWRpdCBwYXlyb2xsX2Fic2VuY2Vfc2hvdyBlbWFpbCBrYl9vcmRlcl9lZGl0IHBheXJvbGxfZW1wbG95ZWVfZWRpdCByZXZvY2FibGUga2JfY3JlZGl0X3ZvdWNoZXJfZWRpdCBiYW5rX3BheW1lbnRfZWRpdCBtb25pdG9yaW5nX2VkaXQgdGFza19lZGl0IGxlYWRfZWRpdCBhY2NvdW50aW5nX3NldHRpbmdzX3Nob3cga2JfYmlsbF9lZGl0IG1vbml0b3Jpbmdfc2hvdyB0ZWNobmljYWwgbGVhZF9zaG93IHRhc2tfc2hvdyBhcnRpY2xlX3Nob3cgZmluYW5jZV9yZXBvcnRzIGtiX2ludm9pY2Vfc2hvdyBzdWJzY3JpcHRpb25fYW5kX3Blcm1pc3Npb25zIGtiX29mZmVyX3Nob3cgcGF5cm9sbF9hYnNlbmNlX2VkaXQgYmFua19hY2NvdW50X3Nob3cgbm90ZV9lZGl0IGtiX2V4cGVuc2VfZWRpdCBwcm9maWxlIGNvbnRhY3Rfc2hvdyIsImxvZ2luX2lkIjoiOGUyMDM5NjQtYWE2OS00YTQ0LTkzOGUtOTQxZDkwNjYyNTQ5IiwiY29tcGFueV9pZCI6Iml5bm92ZHhhcm43dCIsInVzZXJfaWQiOjQyNTYxMiwiY29tcGFueV91c2VyX2lkIjoxfQ.T0LOX8s8etYEOOG2wkSKNrnakumoGBV3UqFNd91lny0Ca3kQtsB-qYfkSLPAOzgR5KGsGOONvLS1yuacUHICWNf9ZYWfZHtDTjBy7XqvUhMyI9evCKxnngUsYMVE5_Kgb2_uZIywdlfgi3EJGAckLn3HrzW0TN8B2pWZ_4-lheAAXpYl76eGBns_Q5nvD-wgxiLm1b_R9qNzm1Fn-kZx62n8SujzEerjTZoavj74Cv9IfN37rV8FQyNgBDexjvXMa3ENUwD7wKVw-uxNlRYIzff8eBsIalW8KShTTDkC33dp3gPsLiB6jKHmZpLpJqLsK-R3VuiqlBoOi7j0X3nqiA");

    }
}