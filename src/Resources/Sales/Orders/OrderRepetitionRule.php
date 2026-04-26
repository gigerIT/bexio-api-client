<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders;

use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionMonthlySchedule;
use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionType;
use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionWeekday;
use Spatie\LaravelData\Data;

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
     * @param array<string, mixed> $payload
     */
    public static function fromApiPayload(array $payload): self
    {
        return new self(
            type: OrderRepetitionType::from((string) $payload['type']),
            interval: (int) $payload['interval'],
            weekdays: isset($payload['weekdays']) ? array_map(
                static fn (string|OrderRepetitionWeekday $weekday): OrderRepetitionWeekday => $weekday instanceof OrderRepetitionWeekday
                    ? $weekday
                    : OrderRepetitionWeekday::from($weekday),
                $payload['weekdays'],
            ) : null,
            schedule: isset($payload['schedule'])
                ? OrderRepetitionMonthlySchedule::from((string) $payload['schedule'])
                : null,
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
