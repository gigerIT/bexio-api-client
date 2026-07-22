<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders;

use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionMonthlySchedule;
use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionType;
use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionWeekday;
use Spatie\LaravelData\Data;
use UnexpectedValueException;

class OrderRepetitionRule extends Data
{
    /**
     * @param array<int, OrderRepetitionWeekday>|null $weekdays
     */
    public function __construct(
        public OrderRepetitionType $type,
        public int $interval,
        public ?array $weekdays = null,
        public ?OrderRepetitionMonthlySchedule $schedule = null,
    ) {
    }

    public static function daily(int $interval = 1): self
    {
        return new self(OrderRepetitionType::DAILY, $interval);
    }

    /**
     * @param array<int, OrderRepetitionWeekday> $weekdays
     */
    public static function weekly(array $weekdays, int $interval = 1): self
    {
        return new self(OrderRepetitionType::WEEKLY, $interval, $weekdays);
    }

    public static function monthly(OrderRepetitionMonthlySchedule $schedule, int $interval = 1): self
    {
        return new self(OrderRepetitionType::MONTHLY, $interval, schedule: $schedule);
    }

    public static function yearly(int $interval = 1): self
    {
        return new self(OrderRepetitionType::YEARLY, $interval);
    }

    /**
     * @param array<mixed> $payload
     */
    public static function fromApiPayload(array $payload): self
    {
        $typeValue = $payload['type'] ?? null;
        $type = is_string($typeValue) ? OrderRepetitionType::tryFrom($typeValue) : null;
        if ($type === null) {
            throw new UnexpectedValueException(
                'Order repetition response field "repetition.type" must be a valid repetition type.',
            );
        }

        $interval = $payload['interval'] ?? null;
        if (! is_int($interval)) {
            throw new UnexpectedValueException(
                'Order repetition response field "repetition.interval" must be an integer.',
            );
        }

        $weekdayValues = $payload['weekdays'] ?? null;
        if ($weekdayValues !== null && ! is_array($weekdayValues)) {
            throw new UnexpectedValueException(
                'Order repetition response field "repetition.weekdays" must be an array or null.',
            );
        }

        $weekdays = null;
        if ($weekdayValues !== null) {
            $weekdays = [];

            foreach ($weekdayValues as $weekdayValue) {
                $weekday = is_string($weekdayValue) ? OrderRepetitionWeekday::tryFrom($weekdayValue) : null;
                if ($weekday === null) {
                    throw new UnexpectedValueException(
                        'Order repetition response field "repetition.weekdays" contains an invalid weekday.',
                    );
                }

                $weekdays[] = $weekday;
            }
        }

        $scheduleValue = $payload['schedule'] ?? null;
        $schedule = is_string($scheduleValue) ? OrderRepetitionMonthlySchedule::tryFrom($scheduleValue) : null;
        if ($scheduleValue !== null && $schedule === null) {
            throw new UnexpectedValueException(
                'Order repetition response field "repetition.schedule" must be a valid monthly schedule or null.',
            );
        }

        return new self(
            type: $type,
            interval: $interval,
            weekdays: $weekdays,
            schedule: $schedule,
        );
    }

    /**
     * @return array{type: string, interval: int, weekdays?: array<int, string>, schedule?: string}
     */
    public function toPayload(): array
    {
        $payload = [
            'type' => $this->type->value,
            'interval' => $this->interval,
        ];

        if ($this->weekdays !== null) {
            $payload['weekdays'] = array_map(
                static fn (OrderRepetitionWeekday $weekday): string => $weekday->value,
                $this->weekdays,
            );
        }

        if ($this->schedule !== null) {
            $payload['schedule'] = $this->schedule->value;
        }

        return $payload;
    }
}
