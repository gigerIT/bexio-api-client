<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Bills\Requests;

use Bexio\Resources\Purchase\Bills\Bill;
use Bexio\Resources\Purchase\Bills\Enums\BillStatus;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class UpdateBillBookingRequest extends Request
{
    protected Method $method = Method::PUT;

    public function __construct(
        protected readonly string $id,
        protected readonly BillStatus|string $status,
    ) {
    }

    public function resolveEndpoint(): string
    {
        $status = $this->status instanceof BillStatus ? $this->status->value : $this->status;

        return "/4.0/purchase/bills/{$this->id}/bookings/{$status}";
    }

    public function createDtoFromResponse(Response $response): Bill
    {
        return Bill::from($response->json());
    }
}
