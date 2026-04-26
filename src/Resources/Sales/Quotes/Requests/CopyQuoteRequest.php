<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\DocumentCopyPayload;
use Bexio\Resources\Sales\Quotes\Quote;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CopyQuoteRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly int $quoteId,
        protected readonly DocumentCopyPayload|array $payload = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_offer/{$this->quoteId}/copy";
    }

    protected function defaultBody(): array
    {
        if ($this->payload instanceof DocumentCopyPayload) {
            return $this->payload->toPayload();
        }

        return $this->payload;
    }

    public function createDtoFromResponse(Response $response): Quote
    {
        return Quote::from($response->json());
    }
}
