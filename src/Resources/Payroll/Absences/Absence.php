<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Absences;

use Spatie\LaravelData\Data;

class Absence extends Data
{
    public function __construct(
        public ?string $employee_id = null,
        public ?string $id = null,
        public ?string $reason = null,
        public ?string $start_date = null,
        public ?string $end_date = null,
        public ?bool $half_day = null,
        public int|float|null $continued_pay = null,
        public int|float|null $disability = null,
        public int|float|null $paid_hours = null,
    ) {
    }

    public function toApi(): Absence
    {
        return $this->except('id', 'employee_id');
    }
}
