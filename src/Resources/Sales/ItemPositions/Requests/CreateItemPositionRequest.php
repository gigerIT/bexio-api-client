<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\ItemPositions\Requests;

use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateItemPositionRequest extends Request implements HasBody
{

    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly KbDocumentType $documentType, readonly int $documentId, readonly protected ItemPosition $itemPosition)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/{$this->documentType->value}/$this->documentId/{$this->itemPosition->type->getUrlResource()}";
    }

    /**
     * @inheritDoc
     */
    protected function defaultBody(): array
    {
        return $this->itemPosition->except('type')->toArray();
    }

    public function createDtoFromResponse(Response $response): ItemPosition
    {
        return ItemPosition::from($response->json());
    }


}