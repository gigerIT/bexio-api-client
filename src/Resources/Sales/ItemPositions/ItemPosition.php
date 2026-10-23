<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\Concerns\BuildsWritePayloads;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\Requests\CreateItemPositionRequest;
use Bexio\Resources\Sales\KbDocumentContract;
use Bexio\Resources\Sales\Writable;
use Bexio\Resources\Sales\WriteOperation;
use ReflectionClass;

class ItemPosition extends Resource
{
    use BuildsWritePayloads;

    const CREATE_REQUEST = CreateItemPositionRequest::class;

    const CAN_BE_ATTACHED = true;

    // Inline positions require the type; the dedicated endpoints reject it.
    #[Writable(on: [WriteOperation::INLINE])]
    public ItemPositionType $type;

    public ?int $id;

    public ?int $internal_pos;

    // Only a dedicated create can nest a position; inline creates reject parent_id and updates ignore or reject it.
    #[Writable(on: [WriteOperation::CREATE], omitNull: true)]
    public ?int $parent_id;

    // Invoices have no optional positions and reject the field.
    #[Writable(exceptFor: [KbDocumentType::INVOICE])]
    public ?bool $is_optional;

    public ?string $pos;

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

    public static function fromApiPayload(array $payload): self
    {
        $type = ItemPositionType::from($payload['type']);

        return match ($type) {
            ItemPositionType::ARTICLE => self::hydratePosition(ItemPositionArticle::class, $payload),
            ItemPositionType::CUSTOM => self::hydratePosition(ItemPositionCustom::class, $payload),
            ItemPositionType::DISCOUNT => self::hydratePosition(ItemPositionDiscount::class, $payload),
            ItemPositionType::PAGEBREAK => self::hydratePosition(ItemPositionPagebreak::class, $payload),
            ItemPositionType::SUBPOSITION => self::hydratePosition(ItemPositionSubposition::class, $payload),
            ItemPositionType::SUBTOTAL => self::hydratePosition(ItemPositionSubtotal::class, $payload),
            ItemPositionType::TEXT => self::hydratePosition(ItemPositionText::class, $payload),
        };
    }

    public static function collectFromApiPayload(array $payloads): array
    {
        return array_map(static fn (array $payload): self => static::fromApiPayload($payload), $payloads);
    }

    /**
     * @deprecated Use toWritePayload(WriteOperation::UPDATE, $documentType).
     */
    public function toApiPayload(): array
    {
        return $this->toWritePayload(WriteOperation::UPDATE);
    }

    /**
     * @deprecated Use toWritePayload(WriteOperation::CREATE, $documentType).
     */
    public function toCreateApiPayload(): array
    {
        return $this->toWritePayload(WriteOperation::CREATE);
    }

    /**
     * @param class-string<self> $class
     */
    private static function hydratePosition(string $class, array $payload): self
    {
        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();
        $arguments = [];
        $constructorParameters = [];

        foreach ($constructor?->getParameters() ?? [] as $parameter) {
            $constructorParameters[] = $parameter->getName();
            $arguments[$parameter->getName()] = $payload[$parameter->getName()]
                ?? ($parameter->isDefaultValueAvailable() ? $parameter->getDefaultValue() : null);
        }

        /** @var self $position */
        $position = $reflection->newInstanceArgs($arguments);

        foreach ($payload as $property => $value) {
            if ($property === 'type' || in_array($property, $constructorParameters, true) || ! property_exists($position, $property)) {
                continue;
            }

            $position->{$property} = $value;
        }

        return $position;
    }
}
