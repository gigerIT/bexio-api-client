<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Packages\Requests;

use Bexio\Resources\Projects\Packages\Package;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetPackagesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $projectId,
        protected readonly int $limit = 500,
        protected readonly int $offset = 0,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/projects/{$this->projectId}/packages";
    }

    protected function defaultQuery(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Package::collect($this->withProjectId($response->json()));
    }

    private function withProjectId(array $packages): array
    {
        return array_map(function (array $package): array {
            $package['project_id'] = $this->projectId;

            return $package;
        }, $packages);
    }
}
