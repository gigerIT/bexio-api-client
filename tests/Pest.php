<?php

use Bexio\BexioClient;
use Bexio\Resources\Accounting\Taxes\Requests\GetTaxesRequest;
use Bexio\Resources\Accounting\Taxes\Tax;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;


uses()
    ->beforeEach(fn() => MockClient::destroyGlobal())
    ->in(__DIR__);

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

// uses(Tests\TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/


expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

//region Clients
function testClient(): BexioClient
{
    return BexioClient::testAccount();
}

function testClientDebug(): BexioClient
{
    return testClient()->debug();
}

function testMockClient(string $requestClass, string $fixture): BexioClient
{
    return BexioClient::testAccount()->withMockClient(new MockClient([
        $requestClass => MockResponse::fixture($fixture),
    ]));
}

//endregion

//region Helpers

function testContact()
{
    static $contact;
}

function testContactId(): int
{
    return 1;
}


function testSaleTax(): Tax
{
    static $tax;
    if ($tax === null) {
        $request = new GetTaxesRequest();
        $response = testClientDebug()->send($request);
        $taxes = $request->createDtoFromResponse($response);
        $tax = $taxes[0];
    }
    return $tax;
}

function testSaleTaxId(): int
{
    //in fresh bexio instances tax id 28 is the default sales tax
    return 28;
//    return testSaleTax()->id;
}