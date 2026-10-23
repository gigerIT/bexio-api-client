<?php

use Bexio\Resources\Sales\Invoices\Enums\InvoiceStatus;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\MwstType;

function invoiceApiPayload(array $overrides = []): array
{
    return array_replace([
        'id' => 4,
        'document_nr' => 'RE-00001',
        'title' => 'Reporting Invoice',
        'contact_id' => 14,
        'contact_sub_id' => null,
        'user_id' => 1,
        'project_id' => null,
        'logopaper_id' => 1,
        'language_id' => 1,
        'bank_account_id' => 1,
        'currency_id' => 2,
        'payment_type_id' => 1,
        'header' => 'Header',
        'footer' => 'Footer',
        'total_gross' => '100.000000',
        'total_net' => '100.000000',
        'total_taxes' => '8.100000',
        'total_received_payments' => '0.000000',
        'total_credit_vouchers' => '0.000000',
        'total_remaining_payments' => '108.100000',
        'total' => '108.100000',
        'total_rounding_difference' => 0.0,
        'mwst_type' => MwstType::INCLUDING->value,
        'mwst_is_net' => true,
        'show_position_taxes' => false,
        'is_valid_from' => '2026-01-15',
        'is_valid_to' => '2026-02-14',
        'contact_address' => "ACME GmbH\nMain Street 1\n8000 Zurich",
        'kb_item_status_id' => InvoiceStatus::DRAFT->value,
        'reference' => 'INV-REF',
        'api_reference' => 'ERP-123',
        'viewed_by_client_at' => null,
        'updated_at' => '2026-01-16 10:00:00',
        'esr_id' => 1,
        'qr_invoice_id' => 1,
        'template_slug' => 'invoice-template',
        'taxs' => [
            [
                'percentage' => '8.10',
                'value' => '8.100000',
            ],
        ],
        'network_link' => '',
        'positions' => [],
        'currency_code' => 'EUR',
        'exchange_rate' => 0.9321456789,
        'base_currency_amount' => 100.25,
        'base_currency_code' => 'CHF',
    ], $overrides);
}

it('hydrates invoice reporting fields from api payloads', function () {
    $invoice = Invoice::createFromApiPayload(invoiceApiPayload([
        'invoice_date' => '2026-01-12',
    ]));

    expect($invoice)
        ->toBeInstanceOf(Invoice::class)
        ->and($invoice->invoice_date)->toBe('2026-01-12')
        ->and($invoice->is_valid_from)->toBe('2026-01-15')
        ->and($invoice->currency_code)->toBe('EUR')
        ->and($invoice->exchange_rate)->toBe(0.9321456789)
        ->and($invoice->base_currency_amount)->toBe(100.25)
        ->and($invoice->base_currency_code)->toBe('CHF');
});

it('falls back invoice_date to is_valid_from when the api omits it', function () {
    $invoice = Invoice::createFromApiPayload(invoiceApiPayload([
        'invoice_date' => null,
        'is_valid_from' => '2026-03-01',
    ]));

    expect($invoice->invoice_date)->toBe('2026-03-01')
        ->and($invoice->is_valid_from)->toBe('2026-03-01');
});
