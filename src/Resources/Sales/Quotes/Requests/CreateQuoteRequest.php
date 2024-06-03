<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Sales\Quotes\Quote;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateQuoteRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected Quote $quote)
    {
    }


    public function resolveEndpoint(): string
    {
        return "/kb_offer";
    }

    protected function defaultBody(): array
    {
        return $this->quote->toArray();
    }

    public function createDtoFromResponse(Response $response): Quote
    {
        return Quote::from($response->json());
    }

}
