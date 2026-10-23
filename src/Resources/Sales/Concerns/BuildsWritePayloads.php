<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Concerns;

use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\KbDocumentContract;
use Bexio\Resources\Sales\ResponseOnly;
use Bexio\Resources\Sales\Writable;
use Bexio\Resources\Sales\WriteOperation;
use ReflectionClass;
use ReflectionProperty;

/**
 * Writes constructor-promoted properties, minus #[ResponseOnly], plus #[Writable]; see docs/adr/0001.
 */
trait BuildsWritePayloads
{
    /**
     * @return array<string, mixed>
     */
    public function toWritePayload(WriteOperation $operation, ?KbDocumentType $documentType = null): array
    {
        if ($documentType === null && $this instanceof KbDocumentContract) {
            $documentType = $this::DOCUMENT_TYPE;
        }

        $properties = $this->writablePropertyNames($operation, $documentType);
        $payload = array_intersect_key($this->toArray(), array_flip($properties));

        foreach ($properties as $property) {
            $positions = $this->{$property};

            if (! $positions instanceof ItemPositionCollection || ! array_key_exists($property, $payload)) {
                continue;
            }

            // Filter the transformed items so explicit exclusions such as except('positions.unit_price') survive.
            $payload[$property] = array_map(
                static fn (array $item, ItemPosition $position): array => array_intersect_key(
                    $item,
                    $position->toWritePayload(WriteOperation::INLINE, $documentType),
                ),
                array_values($payload[$property]),
                $positions->values()->all(),
            );
        }

        return $payload;
    }

    /**
     * @return array<int, string>
     */
    protected function writablePropertyNames(WriteOperation $operation, ?KbDocumentType $documentType = null): array
    {
        $names = [];

        foreach ((new ReflectionClass($this))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            if ($property->isStatic() || ! $property->isInitialized($this)) {
                continue;
            }

            $rule = $this->writeRule($property);
            $writable = match (true) {
                $rule instanceof ResponseOnly => false,
                $rule instanceof Writable => in_array($operation, $rule->on, true)
                    && ! in_array($documentType, $rule->exceptFor, true)
                    && ! ($rule->omitNull && $property->getValue($this) === null),
                default => $property->isPromoted(),
            };

            if ($writable) {
                $names[] = $property->getName();
            }
        }

        return $names;
    }

    private function writeRule(ReflectionProperty $property): Writable|ResponseOnly|null
    {
        // Subclasses redeclare properties such as `type` to set defaults; the parent's rule still applies.
        for (
            $class = $property->getDeclaringClass();
            $class !== false && $class->hasProperty($property->getName());
            $class = $class->getParentClass()
        ) {
            $declaration = $class->getProperty($property->getName());

            foreach ([Writable::class, ResponseOnly::class] as $ruleClass) {
                $attributes = $declaration->getAttributes($ruleClass);

                if ($attributes !== []) {
                    return $attributes[0]->newInstance();
                }
            }
        }

        return null;
    }
}
