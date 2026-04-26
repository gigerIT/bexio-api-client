<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Documents;

use Spatie\LaravelData\Data;

class PaystubPdf extends Data
{
    public function __construct(
        public ?string $location = null,
        public ?string $name = null,
        public ?int $size = null,
        public ?string $mime = null,
        public ?string $content = null,
    ) {
    }
}
