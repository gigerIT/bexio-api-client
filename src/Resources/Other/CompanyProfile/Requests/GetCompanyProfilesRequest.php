<?php
declare(strict_types=1);


namespace Bexio\Resources\Other\CompanyProfile\Requests;

use Bexio\Resources\Other\CompanyProfile\CompanyProfile;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCompanyProfilesRequest extends Request
{
    protected Method $method = Method::GET;


    public function resolveEndpoint(): string
    {
        return "/2.0/company_profile";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return CompanyProfile::collect($response->json());
    }

}
