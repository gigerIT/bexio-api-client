<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions\Requests;

use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetItemPositionRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly KbDocumentType $documentType,
        protected readonly int $documentId,
        protected readonly ItemPositionType $type,
        protected readonly int $positionId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/{$this->documentType->value}/{$this->documentId}/{$this->type->getUrlResource()}/{$this->positionId}";
    }

    public function createDtoFromResponse(Response $response): ItemPosition
    {
        return ItemPosition::fromApiPayload($response->json());
    }
}
