<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Concerns;

use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Bexio\Resources\Sales\ItemPositions\ItemPositionSubposition;
use LogicException;
use Throwable;

trait CreatesSalesDocumentsWithDeferredPositions
{
    public function create(): static
    {
        foreach ($this->positions ?? [] as $position) {
            if (isset($position->parent_id)) {
                throw new LogicException('Nested item positions can only be created after their document exists. Create the document, then use attachTo() and createFor().');
            }
        }

        if (! $this->hasDeferredPosition()) {
            return parent::create();
        }

        return $this->createWithDeferredPositions();
    }

    private function hasDeferredPosition(): bool
    {
        // Bexio rejects inline subpositions. Article positions stay deferred because inline article_id was rejected before.
        return ($this->positions ?? new ItemPositionCollection())->contains(
            static fn (ItemPosition $position): bool => $position instanceof ItemPositionArticle
                || $position instanceof ItemPositionSubposition,
        );
    }

    private function createWithDeferredPositions(): static
    {
        $positions = $this->positions;
        $this->positions = new ItemPositionCollection();

        try {
            $created = parent::create();
        } finally {
            $this->positions = $positions;
        }

        try {
            foreach ($positions as $position) {
                $position->attachClient($this->client())->createFor($created);
            }

            return $created->refresh();
        } catch (Throwable $exception) {
            try {
                $created->delete();
            } catch (Throwable) {
                // Keep the original position creation failure visible to callers.
            }

            throw $exception;
        }
    }
}
