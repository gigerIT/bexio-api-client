<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\Titles\Requests;

use Bexio\Resources\Contacts\Titles\Title;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateTitleRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Title $title) {}

    public function resolveEndpoint(): string
    {
        return '/2.0/title';
    }

    protected function defaultBody(): array
    {
        return $this->title->except('id')->toArray();
    }

    public function createDtoFromResponse(Response $response): Title
    {
        return Title::from($response->json());
    }
}
