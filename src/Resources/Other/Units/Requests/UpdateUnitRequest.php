<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Units\Requests;

use Bexio\Resources\Other\Units\Unit;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateUnitRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Unit $unit)
    {
        if ($this->unit->id === null) {
            throw new \InvalidArgumentException('id is required to update a unit.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/unit/{$this->unit->id}";
    }

    protected function defaultBody(): array
    {
        return $this->unit->toApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): Unit
    {
        return Unit::from($response->json());
    }
}
