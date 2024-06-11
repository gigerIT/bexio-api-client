<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\Comments\Requests;

use Bexio\Resources\Sales\Comments\Comment;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateCommentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly KbDocumentType $documentType, readonly int $documentId, readonly protected Comment $comment)
    {
    }


    public function resolveEndpoint(): string
    {
        return "/2.0/{$this->documentType->value}/$this->documentId/comment";
    }

    public function createDtoFromResponse(Response $response): Comment
    {
        return Comment::from($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->comment->toArray();
    }

}
