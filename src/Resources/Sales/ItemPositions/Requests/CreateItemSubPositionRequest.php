<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\ItemPositions\Requests;

use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\ItemSubPositions\ItemSubPosition;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateItemSubPositionRequest extends Request implements HasBody
{

    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly KbDocumentType $documentType, readonly int $documentId, readonly protected ItemSubPosition $itemSubPosition)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/{$this->documentType->value}/$this->documentId/kb_position_subposition";
    }

    /**
     * @inheritDoc
     */
    protected function defaultBody(): array
    {
        return $this->itemSubPosition->toArray();
    }

    public function createDtoFromResponse(Response $response): ItemSubPosition
    {
        return ItemSubPosition::from($response->json());
    }


}