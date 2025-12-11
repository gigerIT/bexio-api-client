<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\DocumentSettings\Requests;

use Bexio\Resources\Sales\DocumentSettings\DocumentSetting;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetDocumentSettingsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/kb_item_setting';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return DocumentSetting::collect($response->json());
    }
}

