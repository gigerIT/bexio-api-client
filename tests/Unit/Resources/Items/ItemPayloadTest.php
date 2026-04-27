<?php

use Bexio\Resources\Items\Items\Item;
use Bexio\Resources\Items\Items\Requests\CreateItemRequest;
use Bexio\Resources\Items\Items\Requests\UpdateItemRequest;
use Saloon\Http\Request;

function itemDefaultBody(Request $request): array
{
    $method = new ReflectionMethod($request, 'defaultBody');
    $method->setAccessible(true);

    return $method->invoke($request);
}

it('creates items without sending the live-rejected article type id', function () {
    $item = new Item(
        article_type_id: 1,
        intern_code: 'SKU-321',
        intern_name: 'Payload Test Item',
    );

    $body = itemDefaultBody(new CreateItemRequest($item));

    expect($body)->toMatchArray([
        'intern_code' => 'SKU-321',
        'intern_name' => 'Payload Test Item',
    ])
        ->not->toHaveKey('article_type_id');
});

it('updates items without sending the route id in the body', function () {
    $item = new Item(
        id: 321,
        intern_code: 'SKU-321',
        intern_name: 'Payload Test Item',
    );

    $body = itemDefaultBody(new UpdateItemRequest($item));

    expect($body)->toMatchArray([
        'intern_code' => 'SKU-321',
        'intern_name' => 'Payload Test Item',
    ])
        ->not->toHaveKeys(['id', 'article_type_id']);
});

it('hydrates item responses with a nullable article type id', function () {
    $item = Item::from([
        'id' => 321,
        'article_type_id' => null,
        'user_id' => 1,
        'intern_code' => 'SKU-321',
        'intern_name' => 'Payload Test Item',
    ]);

    expect($item)->toBeInstanceOf(Item::class)
        ->and($item->id)->toBe(321)
        ->and($item->article_type_id)->toBeNull();
});
