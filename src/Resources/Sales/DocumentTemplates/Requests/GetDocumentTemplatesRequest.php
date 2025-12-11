<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\DocumentTemplates\Requests;

use Bexio\Resources\Sales\DocumentTemplates\DocumentTemplate;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetDocumentTemplatesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/3.0/document_templates';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return DocumentTemplate::collect($response->json());
    }
}

