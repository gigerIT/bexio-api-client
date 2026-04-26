<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Traversable;

final class DocumentConversionPayload
{
    /**
     * @param array<int, DocumentConversionPosition|array{id: int, type: string, amount: int|float|string}>|null $positions
     */
    public static function fromPositions(?array $positions): string
    {
        if ($positions === null) {
            return json_encode(['positions' => []], JSON_THROW_ON_ERROR);
        }

        return json_encode([
            'positions' => array_map(self::serializePosition(...), $positions),
        ], JSON_THROW_ON_ERROR);
    }

    /**
     * @param iterable<int, mixed> $positions
     * @return array<int, DocumentConversionPosition>
     */
    public static function positionsFromSource(iterable $positions): array
    {
        if ($positions instanceof Traversable) {
            $positions = iterator_to_array($positions);
        }

        return array_map(static function (mixed $position): DocumentConversionPosition {
            $type = self::sourceValue($position, 'type');

            return new DocumentConversionPosition(
                id: (int) self::sourceValue($position, 'id'),
                type: $type instanceof ItemPositionType ? $type : ItemPositionType::from($type),
                amount: self::sourceValue($position, 'amount') ?? '1',
            );
        }, $positions);
    }

    /**
     * @param DocumentConversionPosition|array{id: int, type: string, amount: int|float|string} $position
     * @return array{id: int, type: string, amount: int|float|string}
     */
    private static function serializePosition(DocumentConversionPosition|array $position): array
    {
        if ($position instanceof DocumentConversionPosition) {
            return $position->toPayload();
        }

        return $position;
    }

    private static function sourceValue(mixed $position, string $key): mixed
    {
        if (is_array($position)) {
            return $position[$key] ?? null;
        }

        return $position->{$key} ?? null;
    }
}
