<?php

use Bexio\BexioClient;
use Bexio\Resources\Sales\Comments\Comment;
use Bexio\Resources\Sales\Comments\Requests\GetCommentRequest;
use Bexio\Resources\Sales\Comments\Requests\GetCommentsRequest;
use Bexio\Resources\Sales\Deliveries\Delivery;
use Bexio\Resources\Sales\Deliveries\Requests\IssueDeliveryRequest;
use Bexio\Resources\Sales\DocumentCopyPayload;
use Bexio\Resources\Sales\DocumentPdf;
use Bexio\Resources\Sales\Email\Email;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\InvoiceReminder;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\GetInvoiceReminderPdfRequest;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\MarkInvoiceReminderAsSentRequest;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\MarkInvoiceReminderAsUnsentRequest;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\SendInvoiceReminderRequest;
use Bexio\Resources\Sales\Invoices\Payments\InvoicePayment;
use Bexio\Resources\Sales\Invoices\Payments\Requests\CreateInvoicePaymentRequest;
use Bexio\Resources\Sales\Invoices\Payments\Requests\DeleteInvoicePaymentRequest;
use Bexio\Resources\Sales\Invoices\Payments\Requests\GetInvoicePaymentRequest;
use Bexio\Resources\Sales\Invoices\Payments\Requests\GetInvoicePaymentsRequest;
use Bexio\Resources\Sales\Invoices\Requests\CancelInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\CopyInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\CreateInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\GetInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\GetInvoicePdfRequest;
use Bexio\Resources\Sales\Invoices\Requests\MarkInvoiceAsSentRequest;
use Bexio\Resources\Sales\Invoices\Requests\SendInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\UpdateInvoiceRequest;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\ItemPositions\ItemPositionDiscount;
use Bexio\Resources\Sales\ItemPositions\ItemPositionSubtotal;
use Bexio\Resources\Sales\ItemPositions\Requests\CreateItemPositionRequest;
use Bexio\Resources\Sales\ItemPositions\Requests\DeleteItemPositionRequest;
use Bexio\Resources\Sales\ItemPositions\Requests\GetItemPositionRequest;
use Bexio\Resources\Sales\ItemPositions\Requests\GetItemPositionsRequest;
use Bexio\Resources\Sales\ItemPositions\Requests\UpdateItemPositionRequest;
use Bexio\Resources\Sales\MwstType;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Quotes\Quote;
use Bexio\Resources\Sales\Quotes\Requests\AcceptQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\CopyQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\CreateQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\GetQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\GetQuotePdfRequest;
use Bexio\Resources\Sales\Quotes\Requests\IssueQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\MarkQuoteAsSentRequest;
use Bexio\Resources\Sales\Quotes\Requests\ReissueQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\RejectQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\RevertIssueQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\SendQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\UpdateQuoteRequest;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request as SaloonRequest;

function salesEndpointInvoicePayload(array $overrides = []): array
{
    return array_replace([
        'id' => 123,
        'document_nr' => 'RE-00001',
        'title' => 'Invoice endpoint test',
        'contact_id' => 1,
        'contact_sub_id' => null,
        'user_id' => 1,
        'project_id' => null,
        'logopaper_id' => 1,
        'language_id' => 1,
        'bank_account_id' => 1,
        'currency_id' => 1,
        'payment_type_id' => 1,
        'header' => 'Header',
        'footer' => 'Footer',
        'total_gross' => '10.000000',
        'total_net' => '10.000000',
        'total_taxes' => '0.810000',
        'total_received_payments' => '0.000000',
        'total_credit_vouchers' => '0.000000',
        'total_remaining_payments' => '10.810000',
        'total' => '10.810000',
        'total_rounding_difference' => 0.0,
        'mwst_type' => MwstType::INCLUDING->value,
        'mwst_is_net' => true,
        'show_position_taxes' => false,
        'is_valid_from' => '2026-04-01',
        'is_valid_to' => '2026-04-30',
        'contact_address' => "Test AG\nStreet 1\n8000 Zurich",
        'kb_item_status_id' => 7,
        'reference' => null,
        'api_reference' => null,
        'viewed_by_client_at' => null,
        'updated_at' => '2026-04-01 12:00:00',
        'esr_id' => null,
        'qr_invoice_id' => null,
        'template_slug' => null,
        'taxs' => [],
        'network_link' => '',
        'positions' => [],
    ], $overrides);
}

function salesEndpointQuotePayload(array $overrides = []): array
{
    return array_replace([
        'id' => 456,
        'document_nr' => 'AN-00001',
        'title' => 'Quote endpoint test',
        'contact_id' => 1,
        'contact_sub_id' => null,
        'user_id' => 1,
        'project_id' => null,
        'language_id' => 1,
        'bank_account_id' => 1,
        'currency_id' => 1,
        'payment_type_id' => 1,
        'header' => 'Header',
        'footer' => 'Footer',
        'total_gross' => '10.000000',
        'total_net' => '10.000000',
        'total_taxes' => '0.810000',
        'total' => '10.810000',
        'total_rounding_difference' => 0.0,
        'mwst_type' => MwstType::INCLUDING->value,
        'mwst_is_net' => true,
        'show_position_taxes' => false,
        'is_valid_from' => '2026-04-01',
        'is_valid_until' => '2026-04-30',
        'contact_address' => "Test AG\nStreet 1\n8000 Zurich",
        'delivery_address_type' => 0,
        'delivery_address' => "Test AG\nStreet 1\n8000 Zurich",
        'kb_item_status_id' => 1,
        'api_reference' => null,
        'viewed_by_client_at' => null,
        'kb_terms_of_payment_template_id' => null,
        'show_total' => true,
        'updated_at' => '2026-04-01 12:00:00',
        'template_slug' => null,
        'taxs' => [],
        'network_link' => '',
        'positions' => [],
    ], $overrides);
}

function salesEndpointArticlePositionPayload(array $overrides = []): array
{
    return array_replace([
        'id' => 222,
        'type' => ItemPositionType::ARTICLE->value,
        'amount' => '1.000000',
        'unit_id' => 1,
        'account_id' => 3200,
        'tax_id' => 28,
        'text' => 'Article position',
        'unit_price' => '75.000000',
        'article_id' => 99,
        'discount_in_percent' => '0.000000',
        'internal_pos' => 1,
        'parent_id' => null,
        'is_optional' => false,
    ], $overrides);
}

function salesEndpointCustomPositionPayload(array $overrides = []): array
{
    return array_replace([
        'id' => 223,
        'type' => ItemPositionType::CUSTOM->value,
        'amount' => '1.000000',
        'unit_id' => null,
        'account_id' => 3200,
        'tax_id' => 28,
        'text' => 'Custom position',
        'unit_price' => '50.000000',
        'discount_in_percent' => null,
        'internal_pos' => 2,
        'parent_id' => null,
        'is_optional' => false,
    ], $overrides);
}

it('creates quotes with article positions through the item position endpoint', function () {
    $articlePositionPayload = salesEndpointArticlePositionPayload();
    $customPositionPayload = salesEndpointCustomPositionPayload();
    $mockClient = new MockClient([
        MockResponse::make(salesEndpointQuotePayload(['positions' => []]), 201),
        MockResponse::make($articlePositionPayload, 201),
        MockResponse::make($customPositionPayload, 201),
        MockResponse::make(salesEndpointQuotePayload([
            'positions' => [$articlePositionPayload, $customPositionPayload],
        ])),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $quote = (new Quote(
        title: 'Quote with article',
        contact_id: 1,
        is_valid_from: '2026-04-01',
        is_valid_until: '2026-04-30',
        positions: new ItemPositionCollection([
            new ItemPositionArticle(
                amount: '1',
                unit_id: 1,
                account_id: 3200,
                tax_id: 28,
                text: 'Article position',
                unit_price: '75',
                article_id: 99,
                discount_in_percent: '0',
            ),
            new ItemPositionCustom(
                tax_id: 28,
                amount: '1',
                account_id: 3200,
                text: 'Custom position',
                unit_price: '50',
            ),
        ]),
    ))->attachClient($client);

    $created = $quote->create();

    expect($created)->toBeInstanceOf(Quote::class);

    $mockClient->assertSentInOrder([
        function (SaloonRequest $request): bool {
            $body = $request->body()->all();

            return $request instanceof CreateQuoteRequest
                && $request->resolveEndpoint() === '/2.0/kb_offer'
                && $body['positions'] === [];
        },
        function (SaloonRequest $request): bool {
            $body = $request->body()->all();

            return $request instanceof CreateItemPositionRequest
                && $request->resolveEndpoint() === '/2.0/kb_offer/456/kb_position_article'
                && $body['article_id'] === 99
                && ! array_key_exists('type', $body);
        },
        function (SaloonRequest $request): bool {
            $body = $request->body()->all();

            return $request instanceof CreateItemPositionRequest
                && $request->resolveEndpoint() === '/2.0/kb_offer/456/kb_position_custom'
                && $body['text'] === 'Custom position'
                && ! array_key_exists('type', $body);
        },
        fn (SaloonRequest $request): bool => $request instanceof GetQuoteRequest
            && $request->resolveEndpoint() === '/2.0/kb_offer/456',
    ]);
});

it('creates invoices with article positions through the item position endpoint', function () {
    $articlePositionPayload = salesEndpointArticlePositionPayload();
    $customPositionPayload = salesEndpointCustomPositionPayload();
    $mockClient = new MockClient([
        MockResponse::make(salesEndpointInvoicePayload(['positions' => []]), 201),
        MockResponse::make($articlePositionPayload, 201),
        MockResponse::make($customPositionPayload, 201),
        MockResponse::make(salesEndpointInvoicePayload([
            'positions' => [$articlePositionPayload, $customPositionPayload],
        ])),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $invoice = (new Invoice(
        title: 'Invoice with article',
        contact_id: 1,
        is_valid_from: '2026-04-01',
        is_valid_to: '2026-04-30',
        positions: new ItemPositionCollection([
            new ItemPositionArticle(
                amount: '1',
                unit_id: 1,
                account_id: 3200,
                tax_id: 28,
                text: 'Article position',
                unit_price: '75',
                article_id: 99,
                discount_in_percent: '0',
            ),
            new ItemPositionCustom(
                tax_id: 28,
                amount: '1',
                account_id: 3200,
                text: 'Custom position',
                unit_price: '50',
            ),
        ]),
    ))->attachClient($client);

    $created = $invoice->create();

    expect($created)->toBeInstanceOf(Invoice::class);

    $mockClient->assertSentInOrder([
        function (SaloonRequest $request): bool {
            $body = $request->body()->all();

            return $request instanceof CreateInvoiceRequest
                && $request->resolveEndpoint() === '/2.0/kb_invoice'
                && $body['positions'] === [];
        },
        function (SaloonRequest $request): bool {
            $body = $request->body()->all();

            return $request instanceof CreateItemPositionRequest
                && $request->resolveEndpoint() === '/2.0/kb_invoice/123/kb_position_article'
                && $body['article_id'] === 99
                && ! array_key_exists('type', $body);
        },
        function (SaloonRequest $request): bool {
            $body = $request->body()->all();

            return $request instanceof CreateItemPositionRequest
                && $request->resolveEndpoint() === '/2.0/kb_invoice/123/kb_position_custom'
                && $body['text'] === 'Custom position'
                && ! array_key_exists('type', $body);
        },
        fn (SaloonRequest $request): bool => $request instanceof GetInvoiceRequest
            && $request->resolveEndpoint() === '/2.0/kb_invoice/123',
    ]);
});

it('creates quotes without response-only fields from hydrated resources', function () {
    $mockClient = new MockClient([
        CreateQuoteRequest::class => MockResponse::make(salesEndpointQuotePayload(['title' => 'Created quote']), 201),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $quote = (new Quote(
        id: 456,
        title: 'Created quote',
        contact_id: 1,
        is_valid_from: '2026-04-01',
        is_valid_until: '2026-04-30',
        viewed_by_client_at: '2026-04-01 12:00:00',
        positions: new ItemPositionCollection(),
    ))->attachClient($client);
    $quote->document_nr = 'AN-00001';
    $quote->total = '10.810000';
    $quote->mwst_is_net = true;

    $created = $quote->create();

    expect($created)->toBeInstanceOf(Quote::class);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        if (! $request instanceof CreateQuoteRequest) {
            return false;
        }

        $body = $request->body()->all();

        return $request->resolveEndpoint() === '/2.0/kb_offer'
            && $body['title'] === 'Created quote'
            && $body['positions'] === []
            && $body['mwst_is_net'] === true
            && ! array_key_exists('id', $body)
            && ! array_key_exists('document_nr', $body)
            && ! array_key_exists('total', $body)
            && ! array_key_exists('viewed_by_client_at', $body);
    });
});

it('updates quotes and exposes quote action, pdf, send, and copy endpoints', function () {
    $mockClient = new MockClient([
        UpdateQuoteRequest::class => MockResponse::make(salesEndpointQuotePayload(['title' => 'Updated quote'])),
        IssueQuoteRequest::class => MockResponse::make(['success' => true]),
        RevertIssueQuoteRequest::class => MockResponse::make(['success' => true]),
        AcceptQuoteRequest::class => MockResponse::make(['success' => true]),
        RejectQuoteRequest::class => MockResponse::make(['success' => true]),
        ReissueQuoteRequest::class => MockResponse::make(['success' => true]),
        MarkQuoteAsSentRequest::class => MockResponse::make(['success' => true]),
        GetQuotePdfRequest::class => MockResponse::make([
            'name' => 'quote.pdf',
            'size' => 9,
            'mime' => 'application/pdf',
            'content' => base64_encode('%PDF-test'),
        ]),
        SendQuoteRequest::class => MockResponse::make(['success' => true]),
        CopyQuoteRequest::class => MockResponse::make(salesEndpointQuotePayload(['id' => 789, 'title' => 'Copied quote'])),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $quote = (new Quote(
        id: 456,
        title: 'Updated quote',
        contact_id: 1,
        is_valid_from: '2026-04-01',
        is_valid_until: '2026-04-30',
        positions: new ItemPositionCollection(),
    ))->attachClient($client);
    $quote->total = '10.810000';

    $updated = $quote->save();
    $issued = $quote->issue();
    $reverted = $quote->revertIssue();
    $accepted = $quote->accept();
    $rejected = $quote->reject();
    $reissued = $quote->reissue();
    $marked = $quote->markAsSent();
    $pdf = $quote->pdf(logopaper: false);
    $sent = $quote->send(new Email(
        recipient_email: 'recipient@example.test',
        subject: 'Quote',
        message: 'Please find the document at [Network Link]',
        mark_as_open: true,
        attach_pdf: false,
    ));
    $copy = $quote->copy(payload: new DocumentCopyPayload(
        contact_id: 1,
        is_valid_from: '2026-05-01',
        title: 'Copied quote',
    ));

    expect($updated)->toBeInstanceOf(Quote::class)
        ->and($issued->successful())->toBeTrue()
        ->and($reverted->successful())->toBeTrue()
        ->and($accepted->successful())->toBeTrue()
        ->and($rejected->successful())->toBeTrue()
        ->and($reissued->successful())->toBeTrue()
        ->and($marked->successful())->toBeTrue()
        ->and($pdf)->toBeInstanceOf(DocumentPdf::class)
        ->and($pdf->decodedContent())->toBe('%PDF-test')
        ->and($sent->successful())->toBeTrue()
        ->and($copy)->toBeInstanceOf(Quote::class)
        ->and($copy->id)->toBe(789);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        if (! $request instanceof UpdateQuoteRequest) {
            return false;
        }

        $body = $request->body()->all();

        return $request->resolveEndpoint() === '/2.0/kb_offer/456'
            && $body['title'] === 'Updated quote'
            && ! array_key_exists('id', $body)
            && ! array_key_exists('positions', $body)
            && ! array_key_exists('total', $body);
    });
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof IssueQuoteRequest && $request->resolveEndpoint() === '/2.0/kb_offer/456/issue');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof RevertIssueQuoteRequest && $request->resolveEndpoint() === '/2.0/kb_offer/456/revertIssue');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof AcceptQuoteRequest && $request->resolveEndpoint() === '/2.0/kb_offer/456/accept');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof RejectQuoteRequest && $request->resolveEndpoint() === '/2.0/kb_offer/456/reject');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof ReissueQuoteRequest && $request->resolveEndpoint() === '/2.0/kb_offer/456/reissue');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof MarkQuoteAsSentRequest && $request->resolveEndpoint() === '/2.0/kb_offer/456/mark_as_sent');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof GetQuotePdfRequest && $request->resolveEndpoint() === '/2.0/kb_offer/456/pdf' && $request->query()->get('logopaper') === 0);
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof SendQuoteRequest
        && $request->resolveEndpoint() === '/2.0/kb_offer/456/send'
        && $request->body()->all()['mark_as_open'] === true
        && $request->body()->all()['attach_pdf'] === false);
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof CopyQuoteRequest
        && $request->resolveEndpoint() === '/2.0/kb_offer/456/copy'
        && $request->body()->all() === [
            'contact_id' => 1,
            'is_valid_from' => '2026-05-01',
            'title' => 'Copied quote',
        ]);
});

it('exposes delivery issue and invoice update, pdf, copy, cancel, mark as sent, and send endpoints', function () {
    $mockClient = new MockClient([
        IssueDeliveryRequest::class => MockResponse::make(['success' => true]),
        UpdateInvoiceRequest::class => MockResponse::make(salesEndpointInvoicePayload(['title' => 'Updated invoice'])),
        GetInvoicePdfRequest::class => MockResponse::make([
            'name' => 'invoice.pdf',
            'size' => 9,
            'mime' => 'application/pdf',
            'content' => base64_encode('%PDF-test'),
        ]),
        CopyInvoiceRequest::class => MockResponse::make(salesEndpointInvoicePayload(['id' => 321, 'title' => 'Copied invoice'])),
        CancelInvoiceRequest::class => MockResponse::make(['success' => true]),
        MarkInvoiceAsSentRequest::class => MockResponse::make(['success' => true]),
        SendInvoiceRequest::class => MockResponse::make(['success' => true]),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $delivery = (new Delivery(id: 555))->attachClient($client);
    $invoice = (new Invoice(
        id: 123,
        title: 'Updated invoice',
        contact_id: 1,
        is_valid_from: '2026-04-01',
        is_valid_to: '2026-04-30',
    ))->attachClient($client);
    $invoice->total = '10.810000';

    $deliveryIssue = $delivery->issue();
    $updated = $invoice->save();
    $pdf = $invoice->pdf(logopaper: true);
    $copy = $invoice->copy(payload: new DocumentCopyPayload(
        contact_id: 1,
        is_valid_from: '2026-05-01',
        title: 'Copied invoice',
    ));
    $cancel = $invoice->cancel();
    $markAsSent = $invoice->markAsSent();
    $send = $invoice->send(new Email(
        recipient_email: 'recipient@example.test',
        subject: 'Invoice',
        message: 'Please find the document at [Network Link]',
        mark_as_open: false,
        attach_pdf: true,
    ));

    expect($deliveryIssue->successful())->toBeTrue()
        ->and($updated)->toBeInstanceOf(Invoice::class)
        ->and($pdf)->toBeInstanceOf(DocumentPdf::class)
        ->and($copy)->toBeInstanceOf(Invoice::class)
        ->and($copy->id)->toBe(321)
        ->and($cancel->successful())->toBeTrue()
        ->and($markAsSent->successful())->toBeTrue()
        ->and($send->successful())->toBeTrue();

    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof IssueDeliveryRequest && $request->resolveEndpoint() === '/2.0/kb_delivery/555/issue');
    $mockClient->assertSent(function (SaloonRequest $request): bool {
        if (! $request instanceof UpdateInvoiceRequest) {
            return false;
        }

        $body = $request->body()->all();

        return $request->resolveEndpoint() === '/2.0/kb_invoice/123'
            && $body['title'] === 'Updated invoice'
            && ! array_key_exists('id', $body)
            && ! array_key_exists('positions', $body)
            && ! array_key_exists('total', $body);
    });
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof GetInvoicePdfRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/pdf' && $request->query()->get('logopaper') === 1);
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof CopyInvoiceRequest
        && $request->resolveEndpoint() === '/2.0/kb_invoice/123/copy'
        && $request->body()->all() === [
            'contact_id' => 1,
            'is_valid_from' => '2026-05-01',
            'title' => 'Copied invoice',
        ]);
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof CancelInvoiceRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/cancel');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof MarkInvoiceAsSentRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/mark_as_sent');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof SendInvoiceRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/send');
});

it('manages invoice payments with invoice context', function () {
    $paymentPayload = [
        'id' => 654,
        'date' => '2026-04-15',
        'value' => '10.0000',
        'bank_account_id' => 1,
        'title' => 'Received Payment',
        'payment_service_id' => null,
        'is_client_account_redemption' => false,
        'is_cash_discount' => false,
        'kb_invoice_id' => 123,
        'kb_credit_voucher_id' => null,
        'kb_bill_id' => null,
        'kb_credit_voucher_text' => '',
    ];
    $mockClient = new MockClient([
        GetInvoicePaymentsRequest::class => MockResponse::make([$paymentPayload]),
        CreateInvoicePaymentRequest::class => MockResponse::make($paymentPayload, 201),
        GetInvoicePaymentRequest::class => MockResponse::make($paymentPayload),
        DeleteInvoicePaymentRequest::class => MockResponse::make(['success' => true]),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $payments = InvoicePayment::useClient($client)->query()->forInvoice(123)->limit(20)->get();
    $created = (new InvoicePayment(
        kb_invoice_id: 123,
        date: '2026-04-15',
        value: '10.0000',
        bank_account_id: 1,
    ))->attachClient($client)->create();
    $found = InvoicePayment::useClient($client)->forInvoice(123)->find(654);
    $deleted = $found->delete();

    expect($payments)->toBeArray()
        ->and($payments[0])->toBeInstanceOf(InvoicePayment::class)
        ->and($created)->toBeInstanceOf(InvoicePayment::class)
        ->and($found->kb_invoice_id)->toBe(123)
        ->and($deleted)->toBeTrue();

    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof GetInvoicePaymentsRequest
        && $request->resolveEndpoint() === '/2.0/kb_invoice/123/payment'
        && $request->query()->get('limit') === 20);
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof CreateInvoicePaymentRequest
        && $request->resolveEndpoint() === '/2.0/kb_invoice/123/payment'
        && $request->body()->all() === [
            'date' => '2026-04-15',
            'value' => '10.0000',
            'bank_account_id' => 1,
        ]);
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof GetInvoicePaymentRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/payment/654');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof DeleteInvoicePaymentRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/payment/654');
});

it('manages invoice reminder actions, email, and pdf with invoice context', function () {
    $mockClient = new MockClient([
        MarkInvoiceReminderAsSentRequest::class => MockResponse::make(['success' => true]),
        MarkInvoiceReminderAsUnsentRequest::class => MockResponse::make(['success' => true]),
        SendInvoiceReminderRequest::class => MockResponse::make(['success' => true]),
        GetInvoiceReminderPdfRequest::class => MockResponse::make([
            'name' => 'reminder.pdf',
            'size' => 9,
            'mime' => 'application/pdf',
            'content' => base64_encode('%PDF-test'),
        ]),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $reminder = (new InvoiceReminder(id: 987, kb_invoice_id: 123))->attachClient($client);

    $markAsSent = $reminder->markAsSent();
    $markAsUnsent = $reminder->markAsUnsent();
    $send = $reminder->send(new Email(
        recipient_email: 'recipient@example.test',
        subject: 'Reminder',
        message: 'Please find the document at [Network Link]',
    ));
    $pdf = $reminder->pdf(logopaper: false);

    expect($markAsSent->successful())->toBeTrue()
        ->and($markAsUnsent->successful())->toBeTrue()
        ->and($send->successful())->toBeTrue()
        ->and($pdf)->toBeInstanceOf(DocumentPdf::class)
        ->and($pdf->decodedContent())->toBe('%PDF-test');

    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof MarkInvoiceReminderAsSentRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/kb_reminder/987/mark_as_sent');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof MarkInvoiceReminderAsUnsentRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/kb_reminder/987/mark_as_unsent');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof SendInvoiceReminderRequest
        && $request->resolveEndpoint() === '/2.0/kb_invoice/123/kb_reminder/987/send'
        && $request->body()->all() === [
            'recipient_email' => 'recipient@example.test',
            'subject' => 'Reminder',
            'message' => 'Please find the document at [Network Link]',
        ]);
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof GetInvoiceReminderPdfRequest
        && $request->resolveEndpoint() === '/2.0/kb_invoice/123/kb_reminder/987/pdf'
        && $request->query()->get('logopaper') === 0);
});

it('lists and fetches comments for sales documents', function () {
    $commentPayload = [
        'id' => 42,
        'text' => 'Endpoint comment',
        'user_id' => 1,
        'user_email' => null,
        'user_name' => 'API User',
        'date' => '2026-04-01 12:00:00',
        'is_public' => false,
        'image' => null,
        'image_path' => null,
    ];
    $mockClient = new MockClient([
        GetCommentsRequest::class => MockResponse::make([$commentPayload]),
        GetCommentRequest::class => MockResponse::make($commentPayload),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $invoice = (new Invoice(id: 123))->attachClient($client);

    $comments = $invoice->comments(limit: 20);
    $comment = $invoice->comment(42);

    expect($comments)->toBeArray()
        ->and($comments[0])->toBeInstanceOf(Comment::class)
        ->and($comment)->toBeInstanceOf(Comment::class)
        ->and($comment->id)->toBe(42);

    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof GetCommentsRequest
        && $request->resolveEndpoint() === '/2.0/kb_invoice/123/comment'
        && $request->query()->get('limit') === 20);
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof GetCommentRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/comment/42');
});

it('manages item positions generically by position type for sales documents', function () {
    $positionPayload = [
        'id' => 222,
        'type' => ItemPositionType::CUSTOM->value,
        'tax_id' => 28,
        'amount' => '1.000000',
        'unit_id' => null,
        'account_id' => 3200,
        'text' => 'Updated custom position',
        'unit_price' => '50.000000',
        'discount_in_percent' => null,
        'internal_pos' => 1,
        'parent_id' => null,
        'is_optional' => false,
    ];
    $mockClient = new MockClient([
        GetItemPositionsRequest::class => MockResponse::make([$positionPayload]),
        GetItemPositionRequest::class => MockResponse::make($positionPayload),
        UpdateItemPositionRequest::class => MockResponse::make($positionPayload),
        DeleteItemPositionRequest::class => MockResponse::make(['success' => true]),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $invoice = (new Invoice(id: 123))->attachClient($client);
    $position = new ItemPositionCustom(
        tax_id: 28,
        amount: '1.000000',
        account_id: 3200,
        text: 'Updated custom position',
        unit_price: '50.000000',
    );
    $position->id = 222;

    $positions = $invoice->positionsByType(ItemPositionType::CUSTOM, limit: 20);
    $found = $invoice->position(ItemPositionType::CUSTOM, 222);
    $updated = $invoice->updatePosition($position);
    $deleted = $invoice->deletePosition(ItemPositionType::CUSTOM, 222);

    expect($positions)->toBeArray()
        ->and($positions[0])->toBeInstanceOf(ItemPositionCustom::class)
        ->and($found)->toBeInstanceOf(ItemPositionCustom::class)
        ->and($updated)->toBeInstanceOf(ItemPositionCustom::class)
        ->and($deleted)->toBeTrue();

    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof GetItemPositionsRequest
        && $request->resolveEndpoint() === '/2.0/kb_invoice/123/kb_position_custom'
        && $request->query()->get('limit') === 20);
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof GetItemPositionRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/kb_position_custom/222');
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof UpdateItemPositionRequest
        && $request->resolveEndpoint() === '/2.0/kb_invoice/123/kb_position_custom/222'
        && $request->body()->all()['text'] === 'Updated custom position'
        && ! array_key_exists('id', $request->body()->all())
        && ! array_key_exists('type', $request->body()->all()));
    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof DeleteItemPositionRequest && $request->resolveEndpoint() === '/2.0/kb_invoice/123/kb_position_custom/222');
});

it('updates article positions without resending the immutable article id', function () {
    $positionPayload = [
        'id' => 222,
        'type' => ItemPositionType::ARTICLE->value,
        'amount' => '1.000000',
        'unit_id' => 1,
        'account_id' => 3200,
        'tax_id' => 28,
        'text' => 'Updated article position',
        'unit_price' => '75.000000',
        'article_id' => 99,
        'discount_in_percent' => '0.000000',
        'internal_pos' => 1,
        'parent_id' => null,
        'is_optional' => false,
    ];
    $mockClient = new MockClient([
        UpdateItemPositionRequest::class => MockResponse::make($positionPayload),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $order = (new Order(id: 123))->attachClient($client);
    $position = new ItemPositionArticle(
        amount: '1.000000',
        unit_id: 1,
        account_id: 3200,
        tax_id: 28,
        text: 'Updated article position',
        unit_price: '75.000000',
        article_id: 99,
        discount_in_percent: '0.000000',
    );
    $position->id = 222;
    $position->internal_pos = 1;
    $position->parent_id = null;
    $position->is_optional = false;

    $updated = $order->updatePosition($position);

    expect($position->toApiPayload())->toBe([
        'amount' => '1.000000',
        'unit_id' => 1,
        'account_id' => 3200,
        'tax_id' => 28,
        'text' => 'Updated article position',
        'unit_price' => '75.000000',
        'discount_in_percent' => '0.000000',
        'is_optional' => false,
    ])
        ->and($updated)->toBeInstanceOf(ItemPositionArticle::class)
        ->and($updated->article_id)->toBe(99);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        $body = $request->body()->all();

        return $request instanceof UpdateItemPositionRequest
            && $request->resolveEndpoint() === '/2.0/kb_order/123/kb_position_article/222'
            && $body['text'] === 'Updated article position'
            && $body['unit_price'] === '75.000000'
            && ! array_key_exists('id', $body)
            && ! array_key_exists('type', $body)
            && ! array_key_exists('internal_pos', $body)
            && ! array_key_exists('article_id', $body)
            && ! array_key_exists('parent_id', $body);
    });
});

it('strips computed item position fields from update payloads', function () {
    $discount = ItemPositionDiscount::fromApiPayload([
        'id' => 333,
        'type' => ItemPositionType::DISCOUNT->value,
        'text' => 'Partner discount',
        'is_percentual' => true,
        'value' => '10.000000',
        'discount_total' => '1.780000',
    ]);

    $subtotal = ItemPositionSubtotal::fromApiPayload([
        'id' => 444,
        'type' => ItemPositionType::SUBTOTAL->value,
        'text' => 'Subtotal',
        'value' => '17.800000',
    ]);

    expect($discount->toApiPayload())->toBe([
        'text' => 'Partner discount',
        'is_percentual' => true,
        'value' => '10.000000',
    ])
        ->and($subtotal->toApiPayload())->toBe([
            'text' => 'Subtotal',
        ]);
});
