<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Concerns;

trait SerializesSalesDocumentPayloads
{
    /**
     * @param array<int, string> $excludedFields
     * @param array<string, bool> $conditionalExcludedFields
     */
    protected function salesDocumentPayload(array $excludedFields, array $conditionalExcludedFields = []): static
    {
        $payload = $this->except(...array_values(array_unique([
            ...$this->commonSalesDocumentExcludedFields(),
            ...$excludedFields,
        ])));

        foreach ($conditionalExcludedFields as $field => $condition) {
            $payload = $payload->exceptWhen($field, $condition);
        }

        return $payload;
    }

    /**
     * @return array<int, string>
     */
    private function commonSalesDocumentExcludedFields(): array
    {
        return [
            'total_gross',
            'total_net',
            'total_taxes',
            'total',
            'total_rounding_difference',
            'contact_address',
            'kb_item_status_id',
            'updated_at',
            'taxs',
            'network_link',
            'viewed_by_client_at',
        ];
    }
}
