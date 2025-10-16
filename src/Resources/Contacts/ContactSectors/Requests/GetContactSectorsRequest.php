<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\ContactSectors\Requests;

use Bexio\Resources\Contacts\ContactSectors\ContactSector;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetContactSectorsRequest extends Request
{

    const LIMIT_MAX = 2000;

    protected Method $method = Method::GET;


    public function __construct(
        protected int $limit = 500,
        protected int $offset = 0,
    ) {
        if ($limit > self::LIMIT_MAX) {
            throw new \InvalidArgumentException("Limit cannot be greater than " . self::LIMIT_MAX);
        }
        if ($offset < 0) {
            throw new \InvalidArgumentException("Offset cannot be less than 0");
        }
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/contact_branch";
    }

    protected function defaultQuery(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }


    public function createDtoFromResponse(Response $response): array
    {
        return ContactSector::collect($response->json());
    }
}

