<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Packages\Requests;

use Bexio\Resources\Projects\Packages\Package;
use LogicException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreatePackageRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Package $package)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/projects/{$this->projectId()}/packages";
    }

    protected function defaultBody(): array
    {
        return $this->package->except('id', 'project_id')->toArray();
    }

    public function createDtoFromResponse(Response $response): Package
    {
        $data = $response->json();
        $data['project_id'] = $this->projectId();

        return Package::from($data);
    }

    private function projectId(): int
    {
        if ($this->package->project_id === null) {
            throw new LogicException('Package create requests require project_id.');
        }

        return $this->package->project_id;
    }
}
