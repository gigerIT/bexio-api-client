<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\Requests\CreateItemPositionRequest;
use Bexio\Resources\Sales\KbDocumentContract;

class ItemPosition extends Resource
{
    const CREATE_REQUEST = CreateItemPositionRequest::class;

    const CAN_BE_ATTACHED = true;

    public ItemPositionType $type;

    public ?int $id;

    public ?int $internal_pos;

    public ?int $parent_id;

    public ?bool $is_optional;

    public function attachTo($parent): static
    {
        if (static::CAN_BE_ATTACHED === false) {
            throw new \Exception('This item position type cannot be attached to another item position');
        }

        $this->parent_id = $parent->id;
        return $this;
    }

    public function createFor(KbDocumentContract $documentResource): static
    {
        $createRequestClass = static::CREATE_REQUEST;
        $request = new $createRequestClass(
            $documentResource::DOCUMENT_TYPE,
            $documentResource->resolveKbDocumentId(),
            $this
        );
        $response = $this->client()->send($request);
        return static::from($response->json())->attachClient($this->client());
    }
}
