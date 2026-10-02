<?php

use Bexio\BexioClient;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\ItemPositions\Requests\CreateItemPositionRequest;
use Bexio\Resources\Sales\ItemPositions\Requests\CreateItemSubPositionRequest;
use Bexio\Resources\Sales\ItemPositions\Requests\UpdateItemPositionRequest;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('preserves position calculations without resending them on create or update', function (string $type, array $fields, array $metadata) {
    $payload = ['id' => 7, 'type' => 'KbPosition' . ucfirst($type), 'internal_pos' => 1, 'parent_id' => null, 'is_optional' => false, ...$fields, ...$metadata];
    $position = ItemPosition::fromApiPayload($payload);
    foreach ($metadata as $key => $value) {
        expect($position->{$key})->toBe($value);
    }
    $endpoint = '/2.0/kb_invoice/42/kb_position_' . $type;
    $createClass = $type === 'subposition' ? CreateItemSubPositionRequest::class : CreateItemPositionRequest::class;
    $mock = new MockClient([
        $createClass => MockResponse::make($payload),
        UpdateItemPositionRequest::class => MockResponse::make($payload),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mock);
    $create = new $createClass(KbDocumentType::INVOICE, 42, $position);
    $client->send($create);
    $update = new UpdateItemPositionRequest(KbDocumentType::INVOICE, 42, $position);
    $client->send($update);
    $updateFields = $fields;
    if ($type === 'article') {
        unset($updateFields['article_id'], $updateFields['parent_id']);
    }
    $mock->assertSent(fn ($r): bool => $r->getMethod() === Method::POST && $r->resolveEndpoint() === $endpoint && $r->body()->all() === $fields);
    $mock->assertSent(fn ($r): bool => $r->getMethod() === Method::POST && $r->resolveEndpoint() === $endpoint . '/7' && $r->body()->all() === $updateFields);
})->with([
    'custom' => ['custom', ['tax_id' => 1, 'amount' => '1', 'unit_id' => 2, 'account_id' => 3, 'text' => 'Custom', 'unit_price' => '10', 'discount_in_percent' => '0'], ['pos' => '1', 'position_total' => '10.00', 'tax_value' => '8.1', 'unit_name' => 'h', 'amount_open' => '1', 'amount_completed' => '0', 'amount_reserved' => '0']],
    'article' => ['article', ['amount' => '1', 'unit_id' => 2, 'account_id' => 3, 'tax_id' => 1, 'text' => 'Article', 'unit_price' => '10', 'article_id' => 4, 'discount_in_percent' => '0'], ['pos' => '1', 'position_total' => '10.00', 'tax_value' => '8.1', 'unit_name' => 'h', 'amount_open' => '1', 'amount_completed' => '0', 'amount_reserved' => '0']],
    'text' => ['text', ['text' => 'Text', 'show_pos_nr' => true], ['pos' => '2']],
    'subposition' => ['subposition', ['text' => 'Group', 'show_pos_nr' => true], ['pos' => '3', 'show_pos_prices' => true, 'total_sum' => '10.00']],
    'subtotal' => ['subtotal', ['text' => 'Subtotal'], ['value' => '10.00']],
    'discount' => ['discount', ['text' => 'Discount', 'is_percentual' => true, 'value' => '10'], ['discount_total' => '1.00']],
    'pagebreak' => ['pagebreak', ['pagebreak' => true], []],
]);
