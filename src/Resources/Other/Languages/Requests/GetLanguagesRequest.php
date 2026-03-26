<?php

declare(strict_types=1);

namespace Bexio\Resources\Other\Languages\Requests;

use Bexio\Resources\Other\Languages\Language;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetLanguagesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/language';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Language::collect($response->json());
    }
}
