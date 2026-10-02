# Document templates

```php
use Bexio\Resources\Sales\DocumentTemplates\DocumentTemplate;

$templates = DocumentTemplate::useClient($client)->all();

foreach ($templates as $template) {
    $slug = $template->slug;
    $documentTypes = $template->default_for_document_types;
}
```

Bexio returns `template_slug`; the package maps it to the existing public
`slug` property. Pass that value as a sales document's `template_slug` when
selecting its template.

Verified against live responses on 2026-10-02 and the official
[document template endpoint](https://docs.bexio.com/#operation/v3ListDocumentTemplate).
