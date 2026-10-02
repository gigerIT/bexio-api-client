<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\DocumentTemplates;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\DocumentTemplates\Requests\GetDocumentTemplatesRequest;
use Spatie\LaravelData\Attributes\MapInputName;

class DocumentTemplate extends Resource
{
    public const INDEX_REQUEST = GetDocumentTemplatesRequest::class;

    /**
     * @param string[]|null $default_for_document_types
     */
    public function __construct(
        #[MapInputName('template_slug')]
        public ?string $slug = null,
        public ?string $name = null,
        public ?bool $is_default = null,
        public ?array $default_for_document_types = null,
    ) {
    }
}
