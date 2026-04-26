<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Packages\Requests;

use Bexio\Resources\Projects\Packages\Package;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetPackageRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $projectId,
        protected readonly int|string $packageId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/projects/{$this->projectId}/packages/{$this->packageId}";
    }

    public function createDtoFromResponse(Response $response): Package
    {
        $data = $response->json();
        $data['project_id'] = $this->projectId;

        return Package::from($data);
    }
}
