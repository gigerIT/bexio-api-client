<?php
declare(strict_types=1);

namespace Bexio\Resources\Files;

use Bexio\Resources\Files\Enums\FileSourceType;
use Bexio\Resources\Files\Requests\CreateFileRequest;
use Bexio\Resources\Files\Requests\DeleteFileRequest;
use Bexio\Resources\Files\Requests\DownloadFileRequest;
use Bexio\Resources\Files\Requests\GetFilePreviewRequest;
use Bexio\Resources\Files\Requests\GetFileRequest;
use Bexio\Resources\Files\Requests\GetFilesRequest;
use Bexio\Resources\Files\Requests\GetFileUsageRequest;
use Bexio\Resources\Files\Requests\UpdateFileRequest;
use Bexio\Resources\Resource;
use InvalidArgumentException;

/**
 * @method FileQueryBuilder query()
 */
class File extends Resource
{
    public const INDEX_REQUEST = GetFilesRequest::class;
    public const SHOW_REQUEST = GetFileRequest::class;
    public const CREATE_REQUEST = CreateFileRequest::class;
    public const UPDATE_REQUEST = UpdateFileRequest::class;
    public const DELETE_REQUEST = DeleteFileRequest::class;
    public const QUERY_BUILDER = FileQueryBuilder::class;

    public ?int $id;
    public ?string $uuid;
    public ?string $name;
    public ?int $size_in_bytes;
    public ?string $extension;
    public ?string $mime_type;
    public ?string $uploader_email;
    public ?int $user_id;
    public ?bool $is_archived;
    public ?int $source_id;
    public ?FileSourceType $source_type;
    public ?bool $is_referenced;
    public ?string $created_at;

    public function __construct(
        public ?string $path = null,
    ) {
    }

    public function toApi(): File
    {
        return $this->only('name', 'is_archived', 'source_type');
    }

    public function download(?int $id = null): string
    {
        $fileId = $id ?? $this->id;

        if ($fileId === null) {
            throw new InvalidArgumentException('File ID is required for downloading.');
        }

        $response = $this->client()->send(new DownloadFileRequest($fileId));
        return $response->body();
    }

    public function preview(?int $id = null): string
    {
        $fileId = $id ?? $this->id;

        if ($fileId === null) {
            throw new InvalidArgumentException('File ID is required for preview.');
        }

        $response = $this->client()->send(new GetFilePreviewRequest($fileId));
        return $response->body();
    }

    public function usage(?int $id = null): array
    {
        $fileId = $id ?? $this->id;

        if ($fileId === null) {
            throw new InvalidArgumentException('File ID is required to fetch usage.');
        }

        $request = new GetFileUsageRequest($fileId);
        $response = $this->client()->send($request);
        return $request->createDtoFromResponse($response);
    }
}

