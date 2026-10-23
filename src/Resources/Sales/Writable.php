<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales;

use Attribute;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;

/**
 * Writes the property only for the listed operations, whether or not it is constructor-promoted.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Writable
{
    /**
     * @param array<int, WriteOperation> $on
     * @param array<int, KbDocumentType> $exceptFor
     */
    public function __construct(
        public array $on = [WriteOperation::CREATE, WriteOperation::UPDATE, WriteOperation::INLINE],
        public bool $omitNull = false,
        public array $exceptFor = [],
    ) {
    }
}
