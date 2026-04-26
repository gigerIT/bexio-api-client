<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Comments\Requests;

use Bexio\Resources\Sales\Comments\Comment;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCommentRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly KbDocumentType $documentType,
        protected readonly int $documentId,
        protected readonly int $commentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/{$this->documentType->value}/{$this->documentId}/comment/{$this->commentId}";
    }

    public function createDtoFromResponse(Response $response): Comment
    {
        return Comment::from($response->json());
    }
}
