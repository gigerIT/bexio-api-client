<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders;

use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionMonthlySchedule;
use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionWeekday;
use Spatie\LaravelData\Data;
use UnexpectedValueException;

class OrderRepetition extends Data
{
    public function __construct(
        public string $start,
        public ?string $end,
        public OrderRepetitionRule $repetition,
    ) {
    }

    public static function daily(string $start, ?string $end = null, int $interval = 1): self
    {
        return new self($start, $end, OrderRepetitionRule::daily($interval));
    }

    /**
     * @param array<int, OrderRepetitionWeekday> $weekdays
     */
    public static function weekly(string $start, array $weekdays, ?string $end = null, int $interval = 1): self
    {
        return new self($start, $end, OrderRepetitionRule::weekly($weekdays, $interval));
    }

    public static function monthly(
        string $start,
        OrderRepetitionMonthlySchedule $schedule,
        ?string $end = null,
        int $interval = 1,
    ): self {
        return new self($start, $end, OrderRepetitionRule::monthly($schedule, $interval));
    }

    public static function yearly(string $start, ?string $end = null, int $interval = 1): self
    {
        return new self($start, $end, OrderRepetitionRule::yearly($interval));
    }

    public static function fromApiPayload(mixed $payload): self
    {
        if (! is_array($payload)) {
            throw new UnexpectedValueException('Order repetition response must be an array.');
        }

        $start = $payload['start'] ?? null;
        if (! is_string($start)) {
            throw new UnexpectedValueException('Order repetition response field "start" must be a string.');
        }

        $end = $payload['end'] ?? null;
        if ($end !== null && ! is_string($end)) {
            throw new UnexpectedValueException('Order repetition response field "end" must be a string or null.');
        }

        $repetition = $payload['repetition'] ?? null;
        if (! is_array($repetition)) {
            throw new UnexpectedValueException('Order repetition response field "repetition" must be an array.');
        }

        return new self(
            start: $start,
            end: $end,
            repetition: OrderRepetitionRule::fromApiPayload($repetition),
        );
    }

    /**
     * @return array{start: string, end: string|null, repetition: array<string, mixed>}
     */
    public function toPayload(): array
    {
        return [
            'start' => $this->start,
            'end' => $this->end,
            'repetition' => $this->repetition->toPayload(),
        ];
    }
}
