<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Concerns;

use Bexio\Resources\Sales\DocumentConversionPayload;
use Bexio\Resources\Sales\DocumentConversionPosition;

trait ConvertsSalesDocuments
{
    /**
     * @return array<int, DocumentConversionPosition>
     */
    protected function conversionPositionsFor(int $documentId): array
    {
        if (isset($this->id) && $this->id === $documentId && isset($this->positions)) {
            return DocumentConversionPayload::positionsFromSource($this->positions);
        }

        return DocumentConversionPayload::positionsFromSource($this->find($documentId)->positions ?? []);
    }
}
