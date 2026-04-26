<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Deliveries\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class IssueDeliveryRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(protected readonly int $deliveryId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_delivery/{$this->deliveryId}/issue";
    }
}
