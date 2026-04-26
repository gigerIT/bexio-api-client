<?php

use Bexio\Resources\Sales\Deliveries\Delivery;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Quotes\Quote;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;

function createSalesConversionQuote(string $title): Quote
{
    $quote = new Quote(
        title: sprintf('%s %s', $title, uniqid()),
        contact_id: 1,
        user_id: 1,
        is_valid_from: date('Y-m-d'),
        is_valid_until: date('Y-m-d', strtotime('+14 days')),
        positions: new Collection(),
    );

    $salesAccount = testSalesAccount();

    $quote->positions->add(
        new ItemPositionCustom(
            tax_id: $salesAccount->tax_id,
            account_id: $salesAccount->id,
            amount: '1',
            text: 'Conversion test position',
            unit_price: '100',
        )
    );

    return $quote->attachClient(testClient())->create();
}

function acceptSalesConversionQuote(Quote $quote): Quote
{
    $client = testClient();

    $client->send(new IssueQuoteForConversionTestRequest($quote->id));
    $client->send(new AcceptQuoteForConversionTestRequest($quote->id));

    return Quote::useClient($client)->find($quote->id);
}

function createSalesConversionOrder(string $title): Order
{
    $order = new Order(
        title: sprintf('%s %s', $title, uniqid()),
        contact_id: 1,
        is_valid_from: date('Y-m-d'),
        is_valid_to: date('Y-m-d', strtotime('+14 days')),
    );

    $salesAccount = testSalesAccount();

    $order->positions->add(
        new ItemPositionCustom(
            tax_id: $salesAccount->tax_id,
            account_id: $salesAccount->id,
            amount: '1',
            text: 'Conversion test position',
            unit_price: '100',
        )
    );

    return $order->attachClient(testClient())->create();
}

function deleteSalesConversionResource(Quote|Order|Invoice|null $resource): void
{
    if ($resource === null) {
        return;
    }

    try {
        $resource->attachClient(testClient())->delete();
    } catch (Throwable) {
        // Conversion tests should not fail because a remote cleanup request was rejected.
    }
}

it('can create an order from a quote', function () {
    $quote = acceptSalesConversionQuote(createSalesConversionQuote('Quote to order'));
    $order = null;

    try {
        $order = Quote::useClient(testClient())->createOrder($quote->id);

        expect($order)->toBeInstanceOf(Order::class)
            ->and($order->id)->toBeInt()
            ->and($order->document_nr)->toBeString()
            ->and($order->contact_id)->toBe($quote->contact_id);
    } finally {
        deleteSalesConversionResource($order);
        deleteSalesConversionResource($quote);
    }
});

it('can create an invoice from a quote', function () {
    $quote = acceptSalesConversionQuote(createSalesConversionQuote('Quote to invoice'));
    $invoice = null;

    try {
        $invoice = $quote->attachClient(testClient())->createInvoice();

        expect($invoice)->toBeInstanceOf(Invoice::class)
            ->and($invoice->id)->toBeInt()
            ->and($invoice->document_nr)->toBeString()
            ->and($invoice->contact_id)->toBe($quote->contact_id);
    } finally {
        deleteSalesConversionResource($invoice);
        deleteSalesConversionResource($quote);
    }
});

class IssueQuoteForConversionTestRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(private readonly int $quoteId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_offer/{$this->quoteId}/issue";
    }
}

class AcceptQuoteForConversionTestRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(private readonly int $quoteId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_offer/{$this->quoteId}/accept";
    }
}

it('can create a delivery from an order', function () {
    $order = createSalesConversionOrder('Order to delivery');

    try {
        $delivery = $order->attachClient(testClient())->createDelivery();

        expect($delivery)->toBeInstanceOf(Delivery::class)
            ->and($delivery->id)->toBeInt()
            ->and($delivery->document_nr)->toBeString()
            ->and($delivery->contact_id)->toBe($order->contact_id);
    } finally {
        deleteSalesConversionResource($order);
    }
});

it('can create an invoice from an order', function () {
    $order = createSalesConversionOrder('Order to invoice');
    $invoice = null;

    try {
        $invoice = Order::useClient(testClient())->createInvoice($order->id);

        expect($invoice)->toBeInstanceOf(Invoice::class)
            ->and($invoice->id)->toBeInt()
            ->and($invoice->document_nr)->toBeString()
            ->and($invoice->contact_id)->toBe($order->contact_id);
    } finally {
        deleteSalesConversionResource($invoice);
        deleteSalesConversionResource($order);
    }
});
