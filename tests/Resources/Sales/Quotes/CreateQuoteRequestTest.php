<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Items\Items\Item;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;
use Bexio\Resources\Sales\Quotes\Quote;
use Bexio\Support\Data\SearchCriteria;
use Illuminate\Support\Collection;

$testQuote = null;

it('can create a Quote', function () use (&$testQuote) {

    $quote = new Quote(
        title: sprintf('Test Quote %s', uniqid()),
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
            amount: '10',
            text: 'Test Position',
            unit_price: '100',
        )
    );


    $testQuote = $quote->attachClient(testClient())->create();


    expect($testQuote)->toBeInstanceOf(Quote::class)
        ->and($testQuote->title)->toStartWith('Test Quote ')
        ->and($testQuote->kb_item_status_id)->toBe(QuoteStatus::DRAFT);
});

it('can get Quotes', function () use (&$testQuote) {
    $quotes = Quote::useClient(testClient())->all();

    expect($quotes)->toBeArray()
        ->and($quotes[0])->toBeInstanceOf(Quote::class)
        ->and(array_map(static fn (Quote $quote): ?int => $quote->id, $quotes))->toContain($testQuote->id);
})->depends('it can create a Quote');

it('can paginate and sort Quotes via the index endpoint', function () use (&$testQuote) {
    $quotes = Quote::useClient(testClient())
        ->query()
        ->forPage(1, 1)
        ->orderBy('id', 'desc')
        ->get();

    expect($quotes)->toHaveCount(1)
        ->and($quotes[0])->toBeInstanceOf(Quote::class)
        ->and($quotes[0]->id)->toBeGreaterThanOrEqual($testQuote->id);
})->depends('it can create a Quote');

it('can get a Quote', function () use (&$testQuote) {
    $quote = Quote::useClient(testClient())->find($testQuote->id);

    expect($quote)->toBeInstanceOf(Quote::class)
        ->and($quote->id)->toBe($testQuote->id)
        ->and($quote->title)->toBe($testQuote->title);
})->depends('it can create a Quote');

it('can search Quotes via the search endpoint', function () use (&$testQuote) {
    $quote = Quote::useClient(testClient())->find($testQuote->id);

    $quotes = Quote::useClient(testClient())
        ->query()
        ->status(QuoteStatus::DRAFT)
        ->validBetween($quote->is_valid_from, $quote->is_valid_until)
        ->where('title', SearchCriteria::LIKE, $quote->title)
        ->orderBy('updated_at', 'desc')
        ->limit(100)
        ->get();

    expect($quotes)->toBeArray()
        ->and($quotes[0])->toBeInstanceOf(Quote::class)
        ->and(array_map(static fn (Quote $quote): ?int => $quote->id, $quotes))->toContain($testQuote->id);
})->depends('it can create a Quote');

it('can get first Quote using query builder', function () use (&$testQuote) {
    $quote = Quote::useClient(testClient())
        ->query()
        ->orderBy('id', 'desc')
        ->first();

    expect($quote)->toBeInstanceOf(Quote::class)
        ->and($quote->id)->toBeGreaterThanOrEqual($testQuote->id);
})->depends('it can create a Quote');

it('can create a Quote with an article position', function () {
    $client = testClient();
    $createdQuote = null;

    try {
        $items = Item::useClient($client)->all();
    } catch (\Throwable $exception) {
        \PHPUnit\Framework\Assert::markTestSkipped('Items endpoint unavailable: ' . $exception->getMessage());
    }

    $item = collect($items)->first(fn (Item $item): bool => $item->id !== null && $item->unit_id !== null);

    if (! $item instanceof Item) {
        \PHPUnit\Framework\Assert::markTestSkipped('No item with a unit is available for article-position quote testing.');
    }

    $salesAccount = testSalesAccount();
    $text = $item->intern_name !== '' ? $item->intern_name : ($item->intern_code !== '' ? $item->intern_code : 'Article position');

    try {
        $quote = new Quote(
            title: sprintf('Article Position Quote %s', uniqid()),
            contact_id: 1,
            user_id: 1,
            is_valid_from: date('Y-m-d'),
            is_valid_until: date('Y-m-d', strtotime('+14 days')),
            positions: new Collection([
                new ItemPositionArticle(
                    amount: '1',
                    unit_id: $item->unit_id,
                    account_id: $salesAccount->id,
                    tax_id: $salesAccount->tax_id,
                    text: $text,
                    unit_price: '123.45',
                    article_id: $item->id,
                    discount_in_percent: '0',
                ),
            ]),
        );

        $createdQuote = $quote->attachClient($client)->create();
        $articlePositions = $createdQuote->attachClient($client)->positionsByType(ItemPositionType::ARTICLE);

        expect($createdQuote)->toBeInstanceOf(Quote::class)
            ->and($createdQuote->id)->toBeInt()
            ->and($articlePositions[0])->toBeInstanceOf(ItemPositionArticle::class)
            ->and($articlePositions[0]->article_id)->toBe($item->id);
    } finally {
        if ($createdQuote instanceof Quote) {
            try {
                $createdQuote->attachClient($client)->delete();
            } catch (\Throwable) {
                // Cleanup failures should not hide the regression assertion result.
            }
        }
    }
});

it('can delete a Quote', function () use (&$testQuote) {
    expect($testQuote->attachClient(testClient())->delete())->toBeTrue();
})->depends('it can create a Quote', 'it can get a Quote');
