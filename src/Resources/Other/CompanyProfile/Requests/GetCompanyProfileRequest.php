<?php
declare(strict_types=1);


namespace Bexio\Resources\Other\CompanyProfile\Requests;

use Bexio\Resources\Other\CompanyProfile\CompanyProfile;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCompanyProfileRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(public readonly int $id)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/2.0/company_profile/$this->id";
    }

    public function createDtoFromResponse(Response $response): CompanyProfile
    {
        return CompanyProfile::from($response->json());
    }

}