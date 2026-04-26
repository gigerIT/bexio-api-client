<?php

namespace Bexio\Resources\Sales\ItemPositions\Concerns;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\ItemPositions\Requests\DeleteItemPositionRequest;
use Bexio\Resources\Sales\ItemPositions\Requests\GetItemPositionRequest;
use Bexio\Resources\Sales\ItemPositions\Requests\GetItemPositionsRequest;
use Bexio\Resources\Sales\ItemPositions\Requests\UpdateItemPositionRequest;
use LogicException;

trait HasPositions
{
    public function addPosition(ItemPosition $position): static
    {
        if ($this->positions === null) {
            $this->positions = new ItemPositionCollection([]);
        }

        $this->positions->add($position);

        return $this;
    }

    public function positionsByType(ItemPositionType $type, int $limit = 500, int $offset = 0): array
    {
        $request = new GetItemPositionsRequest(
            documentType: $this::DOCUMENT_TYPE,
            documentId: $this->resolveKbDocumentId(),
            type: $type,
            limit: $limit,
            offset: $offset,
        );

        return $request->createDtoFromResponse($this->client()->send($request));
    }

    public function position(ItemPositionType $type, int $positionId): ItemPosition
    {
        $request = new GetItemPositionRequest(
            documentType: $this::DOCUMENT_TYPE,
            documentId: $this->resolveKbDocumentId(),
            type: $type,
            positionId: $positionId,
        );

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }

    public function updatePosition(ItemPosition $position): ItemPosition
    {
        if (! isset($position->id)) {
            throw new LogicException('The item position must have an id before it can be updated.');
        }

        $request = new UpdateItemPositionRequest(
            documentType: $this::DOCUMENT_TYPE,
            documentId: $this->resolveKbDocumentId(),
            itemPosition: $position,
        );

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }

    public function deletePosition(ItemPositionType|ItemPosition $type, ?int $positionId = null): bool
    {
        if ($type instanceof ItemPosition) {
            $positionId ??= $type->id;
            $type = $type->type;
        }

        if ($positionId === null) {
            throw new LogicException('A position id is required to delete an item position.');
        }

        return $this->client()
            ->send(new DeleteItemPositionRequest(
                documentType: $this::DOCUMENT_TYPE,
                documentId: $this->resolveKbDocumentId(),
                type: $type,
                positionId: $positionId,
            ))
            ->successful();
    }
}
