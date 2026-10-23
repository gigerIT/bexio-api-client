<?php

use Bexio\BexioClient;
use Bexio\Resources\Accounting\Accounts\Account;
use Bexio\Resources\Contacts\Titles\Title;
use Bexio\Resources\Purchase\Bills\BillLineItem;
use Saloon\Http\Faking\MockClient;

beforeEach(function () {
    $this->mockClient = new MockClient();
    $this->client = (new BexioClient('mock-token'))->withMockClient($this->mockClient);
});

it('rejects operations the resource does not declare', function (Closure $operation) {
    expect(fn () => $operation($this->client))
        ->toThrow(RuntimeException::class, 'does not support this operation.');

    $this->mockClient->assertNothingSent();
})->with([
    'find' => static fn (BexioClient $client) => BillLineItem::useClient($client)->find(1),
    'delete' => static fn (BexioClient $client) => Account::useClient($client)->delete(1),
    'all' => static fn (BexioClient $client) => BillLineItem::useClient($client)->all(),
]);

it('refuses to update a resource without a persisted id', function () {
    // POST /2.0/title/ without an id is the create endpoint.
    $title = (new Title(name: 'Dr.'))->attachClient($this->client);

    expect(fn () => $title->update())
        ->toThrow(LogicException::class, 'cannot be updated without a persisted id.');

    $this->mockClient->assertNothingSent();
});
