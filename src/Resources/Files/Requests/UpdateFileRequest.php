<?php
declare(strict_types=1);

namespace Bexio\Resources\Files\Requests;

use Bexio\Resources\Files\File;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateFileRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(protected readonly File $file)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/files/{$this->file->id}";
    }

    protected function defaultBody(): array
    {
        return $this->file->toApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): File
    {
        return File::from($response->json());
    }
}

