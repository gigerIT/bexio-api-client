<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions\Requests;

use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use LogicException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateItemPositionRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly KbDocumentType $documentType,
        protected readonly int $documentId,
        protected readonly ItemPosition $itemPosition,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/{$this->documentType->value}/{$this->documentId}/{$this->itemPosition->type->getUrlResource()}/{$this->positionId()}";
    }

    protected function defaultBody(): array
    {
        return $this->itemPosition->toApiPayload();
    }

    public function createDtoFromResponse(Response $response): ItemPosition
    {
        return ItemPosition::fromApiPayload($response->json());
    }

    private function positionId(): int
    {
        if ($this->itemPosition->id === null) {
            throw new LogicException('The item position must have an id before it can be updated.');
        }

        return $this->itemPosition->id;
    }
}
