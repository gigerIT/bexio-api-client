<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales;

use Spatie\LaravelData\Data;
use UnexpectedValueException;

class DocumentPdf extends Data
{
    public function __construct(
        public string $name,
        public int $size,
        public string $mime,
        public string $content,
    ) {
    }

    public function decodedContent(): string
    {
        $content = base64_decode($this->content, true);

        if ($content === false) {
            throw new UnexpectedValueException('Document PDF content is not valid base64.');
        }

        return $content;
    }
}
