<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\Quotes\Quote;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateQuoteRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Quote $quote)
    {
        if ($this->quote->id === null) {
            throw new \InvalidArgumentException('id is required to update a quote.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_offer/{$this->quote->id}";
    }

    protected function defaultBody(): array
    {
        return $this->quote->toUpdateApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): Quote
    {
        return Quote::from($response->json());
    }
}
