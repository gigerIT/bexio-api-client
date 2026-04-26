<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Payments\Requests;

use Bexio\Resources\Sales\Invoices\Payments\InvoicePayment;
use LogicException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateInvoicePaymentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly InvoicePayment $payment)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId()}/payment";
    }

    protected function defaultBody(): array
    {
        $payload = array_filter(
            $this->payment->toApi()->toArray(),
            static fn (mixed $value): bool => $value !== null,
        );

        $ordered = [];

        foreach ([
            'date',
            'value',
            'bank_account_id',
            'payment_type_id',
            'note',
        ] as $key) {
            if (array_key_exists($key, $payload)) {
                $ordered[$key] = $payload[$key];
            }
        }

        return $ordered;
    }

    public function createDtoFromResponse(Response $response): InvoicePayment
    {
        $payload = $response->json();
        $payload['kb_invoice_id'] = $this->invoiceId();

        return InvoicePayment::from($payload);
    }

    private function invoiceId(): int
    {
        if ($this->payment->kb_invoice_id === null) {
            throw new LogicException('Invoice payment create requests require kb_invoice_id.');
        }

        return $this->payment->kb_invoice_id;
    }
}
