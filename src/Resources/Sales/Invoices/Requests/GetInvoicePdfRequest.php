<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Requests;

use Bexio\Resources\Sales\DocumentPdf;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetInvoicePdfRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $invoiceId,
        protected readonly ?bool $logopaper = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/pdf";
    }

    protected function defaultQuery(): array
    {
        if ($this->logopaper === null) {
            return [];
        }

        return [
            'logopaper' => $this->logopaper ? 1 : 0,
        ];
    }

    public function createDtoFromResponse(Response $response): DocumentPdf
    {
        return DocumentPdf::from($response->json());
    }
}
