<?php

declare(strict_types=1);

namespace Bexio\Resources\Files\Requests;

use Bexio\Resources\Files\File;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetFileRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $fileId) {}

    public function resolveEndpoint(): string
    {
        return "/3.0/files/{$this->fileId}";
    }

    public function createDtoFromResponse(Response $response): File
    {
        return File::from($response->json());
    }
}
