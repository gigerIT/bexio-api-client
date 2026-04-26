<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Comments\Requests;

use Bexio\Resources\Sales\Comments\Comment;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCommentsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly KbDocumentType $documentType,
        protected readonly int $documentId,
        protected readonly int $limit = 500,
        protected readonly int $offset = 0,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/{$this->documentType->value}/{$this->documentId}/comment";
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
        return Comment::collect($response->json());
    }
}
