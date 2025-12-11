<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\BusinessActivities\Requests;

use Bexio\Resources\Projects\BusinessActivities\BusinessActivity;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateBusinessActivityRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected BusinessActivity $activity)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/2.0/client_service';
    }

    protected function defaultBody(): array
    {
        return $this->activity->except('id')->toArray();
    }

    public function createDtoFromResponse(Response $response): BusinessActivity
    {
        return BusinessActivity::from($response->json());
    }
}

