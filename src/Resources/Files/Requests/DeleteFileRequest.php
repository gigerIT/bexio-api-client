<?php
declare(strict_types=1);

namespace Bexio\Resources\Files\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteFileRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $fileId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/files/{$this->fileId}";
    }
}

