<?php

use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Resource;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\ItemPositions\ItemPositionSubposition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionText;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Quotes\Quote;
use Illuminate\Support\Str;

/**
 * @param callable(BexioClient, int, callable(Resource): Resource): void $test receives a tracker for documents to delete afterwards
 */
function writePayloadLive(callable $test): void
{
    $client = testClient();
    $contact = (new Contact(name_1: 'Write payload ' . Str::uuid()))->attachClient($client)->create();
    $documents = [];

    try {
        $test($client, $contact->id, function (Resource $document) use (&$documents): Resource {
            return $documents[] = $document;
        });
    } finally {
        foreach (array_reverse($documents) as $document) {
            $document->delete();
        }
        $contact->delete();
    }
}

function writePayloadLivePosition(): ItemPositionCustom
{
    return new ItemPositionCustom(
        tax_id: testSaleTaxId(),
        amount: '1',
        account_id: testSalesAccount()->id,
        text: 'Write payload position',
        unit_price: '10',
    );
}

it('re-creates a fetched sales document with its positions', function (string $class) {
    writePayloadLive(function (BexioClient $client, int $contactId, callable $track) use ($class) {
        $original = $track((new $class(
            title: 'Write payload original',
            contact_id: $contactId,
            positions: new ItemPositionCollection([writePayloadLivePosition()]),
        ))->attachClient($client)->create());

        $copy = $track($class::useClient($client)->find($original->id)->create());

        expect($copy->id)->not->toBe($original->id)
            ->and($copy->positions)->toHaveCount(1)
            ->and($copy->positions[0]->text)->toBe('Write payload position');
    });
})->with([Invoice::class, Order::class, Quote::class]);

it('creates a sales document with a subposition section', function (string $class) {
    writePayloadLive(function (BexioClient $client, int $contactId, callable $track) use ($class) {
        $created = $track((new $class(
            title: 'Write payload sections',
            contact_id: $contactId,
            positions: new ItemPositionCollection([writePayloadLivePosition(), new ItemPositionSubposition(text: 'Section')]),
        ))->attachClient($client)->create());

        expect(array_map(static fn (ItemPosition $position): ItemPositionType => $position->type, $created->positions->all()))
            ->toContain(ItemPositionType::CUSTOM, ItemPositionType::SUBPOSITION);
    });
})->with([Invoice::class, Order::class, Quote::class]);

it('marks text positions optional only where the document supports it', function (string $class, bool $optional) {
    writePayloadLive(function (BexioClient $client, int $contactId, callable $track) use ($class, $optional) {
        $document = $track((new $class(title: 'Write payload optional', contact_id: $contactId))->attachClient($client)->create());
        $text = new ItemPositionText(text: 'Optional text', show_pos_nr: true);
        $text->is_optional = true;

        $created = $text->attachClient($client)->createFor($document);

        expect($document->position(ItemPositionType::TEXT, $created->id)->is_optional)->toBe($optional);
    });
})->with([
    'invoice' => [Invoice::class, false],
    'order' => [Order::class, true],
    'quote' => [Quote::class, true],
]);

it('updates a fetched sales document whose tax mode was cleared', function (string $class) {
    writePayloadLive(function (BexioClient $client, int $contactId, callable $track) use ($class) {
        $created = $track((new $class(title: 'Write payload tax mode', contact_id: $contactId))->attachClient($client)->create());
        $fetched = $class::useClient($client)->find($created->id);
        $fetched->mwst_is_net = null;
        $fetched->title = 'Write payload tax mode updated';

        expect($fetched->update()->title)->toBe('Write payload tax mode updated');
    });
})->with([Invoice::class, Order::class, Quote::class]);

it('keeps an explicit tax mode on order and quote create', function (string $class) {
    writePayloadLive(function (BexioClient $client, int $contactId, callable $track) use ($class) {
        $document = new $class(title: 'Write payload net mode', contact_id: $contactId);
        $document->mwst_is_net = false;

        $created = $track($document->attachClient($client)->create());

        expect($created->mwst_is_net)->toBeFalse()
            ->and($class::useClient($client)->find($created->id)->mwst_is_net)->toBeFalse();
    });
})->with([Order::class, Quote::class]);
