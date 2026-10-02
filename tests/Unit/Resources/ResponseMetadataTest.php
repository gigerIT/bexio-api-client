<?php

use Bexio\Resources\Accounting\ManualEntries\ManualEntry;
use Bexio\Resources\Accounting\ManualEntries\ManualEntryFile;
use Bexio\Resources\Payroll\Employees\Employee;
use Bexio\Resources\Purchase\Bills\Bill;
use Bexio\Resources\Purchase\OutgoingPayments\OutgoingPayment;
use Bexio\Resources\Purchase\PurchaseOrders\PurchaseOrder;
use Bexio\Resources\Sales\Deliveries\Delivery;
use Bexio\Resources\Sales\Invoices\Payments\InvoicePayment;

it('hydrates response metadata and excludes it from writes', function (string $class, array $base, array $metadata) {
    $resource = $class::from([...$base, ...$metadata]);
    $body = $resource instanceof OutgoingPayment ? $resource->toCreateApi() : $resource->toApi()->toArray();

    foreach ($metadata as $field => $value) {
        expect($resource->{$field})->toBe($value)
            ->and($body)->not->toHaveKey($field);
    }
})->with([
    'manual entry ownership and locking' => [ManualEntry::class, [], [
        'created_by_user_id' => 1, 'edited_by_user_id' => 2, 'is_locked' => true, 'locked_info' => 'closed_business_year',
    ]],
    'bill totals and exchange context' => [Bill::class, [
        'supplier_id' => null, 'contact_partner_id' => null, 'address' => null,
        'bill_date' => '2026-10-02', 'due_date' => '2026-10-31', 'line_items' => [],
    ], [
        'booking_account_ids' => [10, 20], 'gross' => 108.10, 'net' => 100.00, 'vendor' => 'Supplier',
        'average_exchange_rate_enabled' => false, 'base_currency_code' => 'CHF',
    ]],
    'outgoing payment provenance' => [OutgoingPayment::class, [], [
        'created_at' => '2026-10-02T12:00:00+00:00', 'banking_payment_entry_id' => '7e732213-e0c7-4ab8-85de-37c8e2549e22',
    ]],
    'purchase order rounding' => [PurchaseOrder::class, ['contact_id' => 1], ['total_rounding_difference' => 0.02]],
    'payroll permit' => [Employee::class, [], ['stay_permit_category' => 'B']],
    'invoice payment references' => [InvoicePayment::class, [], [
        'kb_bill_id' => 42, 'kb_credit_voucher_id' => 73, 'kb_credit_voucher_text' => 'Credit',
    ]],
]);

it('hydrates delivery address type and manual entry attachment metadata', function () {
    expect(Delivery::from(['delivery_address_type' => 2])->delivery_address_type)->toBe(2);
    $file = ManualEntryFile::from([
        'created_at' => '2026-10-02T12:00:00Z', 'extension' => 'pdf', 'is_archived' => false,
        'is_referenced' => true, 'source_type' => 'web', 'uploader_email' => null,
        'user_id' => 1, 'data' => base64_encode('pdf bytes'),
    ]);
    expect($file->extension)->toBe('pdf')
        ->and($file->is_referenced)->toBeTrue()
        ->and($file->source_type)->toBe('web')
        ->and(base64_decode($file->data))->toBe('pdf bytes');
});

it('accepts nullable sales links and anonymous comment users', function () {
    foreach ([\Bexio\Resources\Sales\Invoices\Invoice::class, \Bexio\Resources\Sales\Orders\Order::class, \Bexio\Resources\Sales\Quotes\Quote::class] as $class) {
        expect($class::from(['network_link' => null])->network_link)->toBeNull();
    }
    expect(\Bexio\Resources\Sales\Comments\Comment::from(['text' => 'Guest comment', 'user_id' => null])->user_id)->toBeNull();
});
