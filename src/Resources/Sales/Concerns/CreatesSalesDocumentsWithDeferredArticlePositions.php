<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Concerns;

use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Illuminate\Support\Collection;
use Throwable;

trait CreatesSalesDocumentsWithDeferredArticlePositions
{
    abstract protected function emptyPositionsForDeferredArticleCreate(): Collection;

    abstract protected function setPositionsForDeferredArticleCreate(Collection $positions): void;

    public function create(): static
    {
        if (! $this->hasArticlePosition()) {
            return parent::create();
        }

        return $this->createWithDeferredPositions();
    }

    private function hasArticlePosition(): bool
    {
        return $this->positions instanceof Collection
            && $this->positions->contains(
                static fn (mixed $position): bool => $position instanceof ItemPositionArticle,
            );
    }

    private function createWithDeferredPositions(): static
    {
        $positions = $this->positions;

        if (! $positions instanceof Collection) {
            return parent::create();
        }

        // Some Bexio widget schemas reject article_id in inline sales document positions.
        $this->setPositionsForDeferredArticleCreate($this->emptyPositionsForDeferredArticleCreate());

        try {
            $created = parent::create();
        } finally {
            $this->setPositionsForDeferredArticleCreate($positions);
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
