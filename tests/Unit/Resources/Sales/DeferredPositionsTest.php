<?php

use Bexio\BexioClient;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\ItemPositions\ItemPositionSubposition;
use Bexio\Resources\Sales\ItemPositions\Requests\CreateItemPositionRequest;
use Bexio\Resources\Sales\ItemPositions\Requests\CreateItemSubPositionRequest;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Quotes\Quote;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request as SaloonRequest;

it('creates documents with subpositions through the item position endpoints in order', function (string $class, string $resource) {
    $custom = ['id' => 1, 'type' => 'KbPositionCustom', 'text' => 'Custom'];
    $subposition = ['id' => 2, 'type' => 'KbPositionSubposition', 'text' => 'Section', 'show_pos_nr' => true];
    $mockClient = new MockClient([
        MockResponse::make(['id' => 123, 'title' => 'Sections', 'positions' => []], 201),
        MockResponse::make($custom, 201),
        MockResponse::make($subposition, 201),
        MockResponse::make(['id' => 123, 'title' => 'Sections', 'positions' => [$custom, $subposition]]),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $document = (new $class(title: 'Sections', positions: new ItemPositionCollection([
        new ItemPositionCustom(text: 'Custom'),
        new ItemPositionSubposition(text: 'Section'),
    ])))->attachClient($client);

    $created = $document->create();

    expect($created->positions)->toHaveCount(2)
        ->and($created->positions[1])->toBeInstanceOf(ItemPositionSubposition::class)
        ->and($document->positions)->toHaveCount(2);
    $mockClient->assertSentInOrder([
        fn (SaloonRequest $request): bool => $request->resolveEndpoint() === "/2.0/$resource"
            && $request->body()->all()['positions'] === [],
        fn (SaloonRequest $request): bool => $request instanceof CreateItemPositionRequest
            && $request->resolveEndpoint() === "/2.0/$resource/123/kb_position_custom",
        fn (SaloonRequest $request): bool => $request instanceof CreateItemSubPositionRequest
            && $request->resolveEndpoint() === "/2.0/$resource/123/kb_position_subposition",
        fn (SaloonRequest $request): bool => $request->getMethod() === Method::GET
            && $request->resolveEndpoint() === "/2.0/$resource/123",
    ]);
})->with([
    'invoice' => [Invoice::class, 'kb_invoice'],
    'order' => [Order::class, 'kb_order'],
    'quote' => [Quote::class, 'kb_offer'],
]);

it('rejects nested positions in a document create before sending', function (string $class) {
    $mockClient = new MockClient();
    $child = ItemPosition::fromApiPayload(['id' => 3, 'type' => 'KbPositionText', 'text' => 'Child', 'parent_id' => 2]);
    $document = (new $class(title: 'Copy', positions: new ItemPositionCollection([$child])))
        ->attachClient((new BexioClient('mock-token'))->withMockClient($mockClient));

    expect(fn () => $document->create())
        ->toThrow(LogicException::class, 'Nested item positions can only be created after their document exists.');

    $mockClient->assertNothingSent();
})->with([Invoice::class, Order::class, Quote::class]);
