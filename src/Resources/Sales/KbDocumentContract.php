<?php

namespace Bexio\Resources\Sales;

interface KbDocumentContract
{
    const DOCUMENT_TYPE = 'kb_document';

    public function resolveKbDocumentId(): int;

}
