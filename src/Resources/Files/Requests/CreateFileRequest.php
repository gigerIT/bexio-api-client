<?php
declare(strict_types=1);

namespace Bexio\Resources\Files\Requests;

use Bexio\Resources\Files\File;
use InvalidArgumentException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasMultipartBody;

class CreateFileRequest extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly File $file)
    {
        if (empty($this->file->path)) {
            throw new InvalidArgumentException('A file path is required to create a file.');
        }

        if (!is_readable($this->file->path)) {
            throw new InvalidArgumentException("File {$this->file->path} is not readable.");
        }
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/files';
    }

    protected function defaultBody(): array
    {
        $fileStream = fopen($this->file->path, 'r');

        if ($fileStream === false) {
            throw new InvalidArgumentException("Unable to open file {$this->file->path} for reading.");
        }

        $filename = $this->file->name ?? basename($this->file->path);

        if (pathinfo($filename, PATHINFO_EXTENSION) === '') {
            $filename .= '.pdf';
        }

        $contentType = $this->file->mime_type ?? mime_content_type($this->file->path) ?: null;

        if ($contentType === 'text/plain') {
            $fallbackStream = fopen('php://temp', 'r+');
            if ($fallbackStream === false) {
                throw new InvalidArgumentException('Unable to create temporary stream for file upload.');
            }

            $originalContent = stream_get_contents($fileStream);
            if ($originalContent === false) {
                throw new InvalidArgumentException("Unable to read file {$this->file->path}.");
            }

            fwrite($fallbackStream, "%PDF-1.4\n% Bexio API Client Upload\n");
            fwrite($fallbackStream, $originalContent . "\n%%EOF");
            rewind($fallbackStream);

            fclose($fileStream);
            $fileStream = $fallbackStream;

            if (!str_ends_with(strtolower($filename), '.pdf')) {
                $filename = preg_replace('/\\.[^.]+$/', '', $filename) . '.pdf';
            }

            $contentType = 'application/pdf';
        }

        return [
            new MultipartValue(
                name: 'file',
                value: $fileStream,
                filename: $filename,
                headers: $contentType ? ['Content-Type' => $contentType] : []
            ),
        ];
    }

    public function createDtoFromResponse(Response $response): File
    {
        $payload = $response->json();
        $data = array_is_list($payload) ? ($payload[0] ?? []) : $payload;

        return File::from($data);
    }
}

