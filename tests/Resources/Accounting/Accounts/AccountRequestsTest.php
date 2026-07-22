<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\BexioClient;
use Bexio\Resources\Accounting\Accounts\Account;
use Bexio\Resources\Accounting\Accounts\Requests\GetAccountsRequest;
use Bexio\Support\Data\SearchCriteria;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request as SaloonRequest;


it('can get Accounts', function () {
    $accounts = Account::useClient(testClient())->all();

    expect($accounts)->toBeArray()
        ->and($accounts[0])->toBeInstanceOf(Account::class)
        ->and($accounts[0]->id)->toBeInt()
        ->and($accounts[0]->account_group_id)->toBeInt();
});

it('can search Accounts', function () {
    $accounts = Account::useClient(testClient())->all();

    if (count($accounts) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No accounts available');
    }

    $searchable = collect($accounts)->first(fn (Account $account): bool => filled($account->account_no));

    if (! $searchable) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable account available');
    }

    $results = Account::useClient(testClient())
        ->query()
        ->where('account_no', SearchCriteria::EQUAL, $searchable->account_no)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(Account::class);
});

it('can get first Account using query builder', function () {
    $account = Account::useClient(testClient())->query()->first();

    expect($account)->toBeInstanceOf(Account::class)
        ->and($account->id)->toBeInt();
});

it('forwards limit and offset on unfiltered account index queries', function () {
    $mockClient = new MockClient([
        GetAccountsRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    Account::useClient($client)
        ->query()
        ->limit(1)
        ->offset(2)
        ->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof GetAccountsRequest
            && $request->query()->get('limit') === 1
            && $request->query()->get('offset') === 2;
    });
});

it('limits live account index queries', function () {
    $accounts = Account::useClient(testClient())->query()->limit(1)->get();

    expect($accounts)->toBeArray()
        ->and(count($accounts))->toBeLessThanOrEqual(1);
});
