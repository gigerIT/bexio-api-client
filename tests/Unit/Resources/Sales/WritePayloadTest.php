<?php

use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\Invoices\Enums\InvoiceStatus;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\ItemPositions\ItemPositionText;
use Bexio\Resources\Sales\MwstType;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;
use Bexio\Resources\Sales\Quotes\Quote;
use Bexio\Resources\Sales\WriteOperation;

function writePayloadCustomPosition(): array
{
    return [
        'id' => 10, 'type' => ItemPositionType::CUSTOM->value, 'amount' => '1.000000', 'unit_id' => 1,
        'account_id' => 3200, 'unit_name' => 'Stk', 'tax_id' => 28, 'tax_value' => '0.810000',
        'text' => 'Custom position', 'unit_price' => '10.000000', 'discount_in_percent' => '0.000000',
        'position_total' => '10.000000', 'pos' => '1', 'internal_pos' => 1, 'parent_id' => null, 'is_optional' => true,
    ];
}

/**
 * A fetched sales document, including the response fields that must never be written.
 */
function writePayloadDocument(string $class): Invoice|Order|Quote
{
    $payload = [
        'id' => 1, 'document_nr' => 'DOC-00001', 'title' => 'Write payload', 'contact_id' => 2,
        'contact_sub_id' => null, 'user_id' => 1, 'pr_project_id' => 3, 'project_id' => 3, 'logopaper_id' => 1,
        'language_id' => 1, 'bank_account_id' => 1, 'currency_id' => 1, 'payment_type_id' => 1,
        'header' => 'Header', 'footer' => 'Footer', 'total_gross' => '10.810000', 'total_net' => '10.000000',
        'total_taxes' => '0.810000', 'total' => '10.810000', 'total_rounding_difference' => 0.0,
        'mwst_type' => MwstType::INCLUDING->value, 'mwst_is_net' => false, 'show_position_taxes' => false,
        'is_valid_from' => '2026-10-01', 'contact_address' => 'ACME AG', 'contact_address_manual' => 'Manual address',
        'api_reference' => 'ERP-1', 'viewed_by_client_at' => '2026-10-02 10:00:00',
        'updated_at' => '2026-10-02 10:00:00', 'template_slug' => 'template', 'taxs' => [], 'network_link' => '',
        'positions' => [writePayloadCustomPosition()],
    ];

    return $class::from($payload + match ($class) {
        Invoice::class => [
            'kb_item_status_id' => InvoiceStatus::DRAFT->value, 'is_valid_to' => '2026-10-31', 'reference' => 'REF',
            'esr_id' => 1, 'qr_invoice_id' => 1, 'total_received_payments' => '0.000000',
            'total_credit_vouchers' => '0.000000', 'total_remaining_payments' => '10.810000',
            'invoice_date' => '2026-10-01', 'currency_code' => 'CHF', 'exchange_rate' => 1.0,
            'base_currency_amount' => 10.81, 'base_currency_code' => 'CHF',
        ],
        Order::class => [
            'kb_item_status_id' => 5, 'is_valid_to' => '2026-10-31', 'reference' => 'REF',
            'delivery_address_type' => 0, 'delivery_address' => 'ACME AG', 'delivery_address_manual' => 'Delivery',
            'is_recurring' => false, 'esr_id' => 1, 'qr_invoice_id' => 1,
        ],
        Quote::class => [
            'kb_item_status_id' => QuoteStatus::DRAFT->value, 'is_valid_until' => '2026-10-31',
            'delivery_address_type' => 0, 'delivery_address' => 'ACME AG', 'delivery_address_manual' => 'Delivery',
            'show_total' => true, 'kb_terms_of_payment_template_id' => 4,
        ],
    });
}

it('writes only writable sales document fields', function (string $class, WriteOperation $operation, array $keys) {
    $payload = writePayloadDocument($class)->toWritePayload($operation);

    expect(array_keys($payload))->toEqualCanonicalizing($keys)
        ->and($payload['mwst_is_net'])->toBeFalse();
})->with(function () {
    $shared = [
        'title', 'contact_id', 'contact_sub_id', 'user_id', 'language_id', 'bank_account_id', 'currency_id',
        'payment_type_id', 'header', 'footer', 'mwst_type', 'mwst_is_net', 'show_position_taxes', 'is_valid_from',
        'contact_address_manual', 'api_reference', 'template_slug', 'pr_project_id',
    ];
    $invoice = [...$shared, 'logopaper_id', 'is_valid_to', 'reference'];
    $order = [...$shared, 'logopaper_id', 'delivery_address_type', 'delivery_address_manual'];
    $quote = [...$shared, 'is_valid_until', 'delivery_address_type', 'delivery_address_manual', 'kb_terms_of_payment_template_id'];

    return [
        'invoice create' => [Invoice::class, WriteOperation::CREATE, [...$invoice, 'positions']],
        'invoice update' => [Invoice::class, WriteOperation::UPDATE, $invoice],
        'order create' => [Order::class, WriteOperation::CREATE, [...$order, 'positions']],
        'order update' => [Order::class, WriteOperation::UPDATE, $order],
        'quote create' => [Quote::class, WriteOperation::CREATE, [...$quote, 'positions']],
        'quote update' => [Quote::class, WriteOperation::UPDATE, $quote],
    ];
});

it('omits a null tax mode on every sales document write', function (string $class, WriteOperation $operation) {
    $document = writePayloadDocument($class);
    $document->mwst_is_net = null;

    expect($document->toWritePayload($operation))->not->toHaveKey('mwst_is_net');
})->with([Invoice::class, Order::class, Quote::class])->with([WriteOperation::CREATE, WriteOperation::UPDATE]);

it('omits a tax mode that was never set', function () {
    expect((new Quote(title: 'New quote'))->toWritePayload(WriteOperation::CREATE))->not->toHaveKey('mwst_is_net')
        ->and((new Order(title: 'New order'))->toWritePayload(WriteOperation::CREATE))->not->toHaveKey('mwst_is_net');
});

it('writes fetched positions inline without response fields', function (string $class, array $positionKeys) {
    $payload = writePayloadDocument($class)->toWritePayload(WriteOperation::CREATE);

    expect($payload['positions'])->toHaveCount(1)
        ->and(array_keys($payload['positions'][0]))->toEqualCanonicalizing($positionKeys)
        ->and($payload['positions'][0]['type'])->toBe(ItemPositionType::CUSTOM->value);
})->with(function () {
    $custom = ['type', 'amount', 'unit_id', 'account_id', 'tax_id', 'text', 'unit_price', 'discount_in_percent'];

    return [
        'invoice' => [Invoice::class, $custom],
        'order' => [Order::class, [...$custom, 'is_optional']],
        'quote' => [Quote::class, [...$custom, 'is_optional']],
    ];
});

it('keeps explicit exclusions on sales document writes', function (string $class) {
    $headerOnly = writePayloadDocument($class)->except('positions')->toWritePayload(WriteOperation::CREATE);
    $withoutPrices = writePayloadDocument($class)->except('positions.unit_price')->toWritePayload(WriteOperation::CREATE);

    expect($headerOnly)->toHaveKey('title')->not->toHaveKey('positions')
        ->and($withoutPrices['positions'][0])->toHaveKeys(['type', 'text'])->not->toHaveKey('unit_price');
})->with([Invoice::class, Order::class, Quote::class]);

it('writes item positions per type, operation, and document', function (string $type, array $fields, array $metadata) {
    $position = ItemPosition::fromApiPayload([
        'id' => 7, 'type' => ItemPositionType::from('KbPosition' . ucfirst($type))->value, 'internal_pos' => 1,
        'pos' => '1', 'parent_id' => null, 'is_optional' => true, ...$fields, ...$metadata,
    ]);
    $updateFields = $type === 'article' ? array_diff_key($fields, ['article_id' => true]) : $fields;
    $inlineFields = ['type' => $position->type->value, ...$fields];

    expect($position->toWritePayload(WriteOperation::CREATE, KbDocumentType::OFFER))->toEqual([...$fields, 'is_optional' => true])
        ->and($position->toWritePayload(WriteOperation::CREATE, KbDocumentType::INVOICE))->toEqual($fields)
        ->and($position->toWritePayload(WriteOperation::UPDATE, KbDocumentType::ORDER))->toEqual([...$updateFields, 'is_optional' => true])
        ->and($position->toWritePayload(WriteOperation::UPDATE, KbDocumentType::INVOICE))->toEqual($updateFields)
        ->and($position->toWritePayload(WriteOperation::INLINE, KbDocumentType::OFFER))->toEqual([...$inlineFields, 'is_optional' => true])
        ->and($position->toWritePayload(WriteOperation::INLINE, KbDocumentType::INVOICE))->toEqual($inlineFields);
})->with([
    'custom' => ['custom', ['tax_id' => 1, 'amount' => '1', 'unit_id' => 2, 'account_id' => 3, 'text' => 'Custom', 'unit_price' => '10', 'discount_in_percent' => '0'], ['position_total' => '10.00', 'tax_value' => '8.1', 'unit_name' => 'h', 'amount_open' => '1', 'amount_completed' => '0', 'amount_reserved' => '0']],
    'article' => ['article', ['amount' => '1', 'unit_id' => 2, 'account_id' => 3, 'tax_id' => 1, 'text' => 'Article', 'unit_price' => '10', 'article_id' => 4, 'discount_in_percent' => '0'], ['position_total' => '10.00', 'tax_value' => '8.1', 'unit_name' => 'h', 'amount_open' => '1', 'amount_completed' => '0', 'amount_reserved' => '0']],
    'text' => ['text', ['text' => 'Text', 'show_pos_nr' => true], []],
    'subposition' => ['subposition', ['text' => 'Group', 'show_pos_nr' => true], ['show_pos_prices' => true, 'total_sum' => '10.00']],
    'subtotal' => ['subtotal', ['text' => 'Subtotal'], ['value' => '10.00']],
    'discount' => ['discount', ['text' => 'Discount', 'is_percentual' => true, 'value' => '10'], ['discount_total' => '1.00']],
    'pagebreak' => ['pagebreak', ['pagebreak' => true], []],
]);

it('writes a nesting parent only on dedicated create', function () {
    $position = (new ItemPositionText(text: 'Child', show_pos_nr: true))->attachTo((object) ['id' => 99]);

    expect($position->toWritePayload(WriteOperation::CREATE, KbDocumentType::OFFER))->toHaveKey('parent_id', 99)
        ->and($position->toWritePayload(WriteOperation::UPDATE, KbDocumentType::OFFER))->not->toHaveKey('parent_id')
        ->and($position->toWritePayload(WriteOperation::INLINE, KbDocumentType::OFFER))->not->toHaveKey('parent_id');
});

it('keeps deprecated payload helpers on the write payload rules', function () {
    $document = writePayloadDocument(Quote::class);
    $position = ItemPosition::fromApiPayload(writePayloadCustomPosition());

    expect(array_keys($document->toApi()->toArray()))->toEqualCanonicalizing(array_keys($document->toWritePayload(WriteOperation::CREATE)))
        ->and(array_keys($document->toUpdateApi()->toArray()))->toEqualCanonicalizing(array_keys($document->toWritePayload(WriteOperation::UPDATE)))
        ->and($position->toApiPayload())->toBe($position->toWritePayload(WriteOperation::UPDATE))
        ->and($position->toCreateApiPayload())->toBe($position->toWritePayload(WriteOperation::CREATE))
        ->and($position)->toBeInstanceOf(ItemPositionCustom::class);
});

it('leaves the full resource intact after building a write payload', function () {
    $document = writePayloadDocument(Invoice::class);
    $document->toWritePayload(WriteOperation::CREATE);

    expect($document->toArray())->toHaveKeys(['id', 'document_nr', 'total', 'project_id', 'viewed_by_client_at'])
        ->and($document->toArray()['positions'][0])->toHaveKeys(['id', 'position_total', 'pos']);
});
