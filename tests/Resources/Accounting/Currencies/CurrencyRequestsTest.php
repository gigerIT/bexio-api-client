<?php

use Bexio\Resources\Accounting\Currencies\Currency;
use Bexio\Resources\Accounting\Currencies\Requests\GetCurrencyCodesRequest;

it('can create and delete a Currency', function () {
    $client = testClient();
    $activeCurrencies = Currency::useClient($client)->all();
    $activeCurrencyCodes = array_map(
        static fn (Currency $currency): ?string => $currency->name,
        $activeCurrencies,
    );

    $codesRequest = new GetCurrencyCodesRequest();
    $availableCurrencyCodes = array_merge(...array_map(
        static fn (mixed $codes): array => is_array($codes) ? $codes : [$codes],
        $codesRequest->createDtoFromResponse($client->send($codesRequest)),
    ));

    $currencyCode = null;
    foreach (['XTS', 'NOK', 'SEK', 'DKK', 'CAD', 'AUD', 'PLN'] as $candidate) {
        if (in_array($candidate, $availableCurrencyCodes, true) && ! in_array($candidate, $activeCurrencyCodes, true)) {
            $currencyCode = $candidate;
            break;
        }
    }

    if ($currencyCode === null) {
        \PHPUnit\Framework\Assert::markTestSkipped('No unused supported currency code available');
    }

    $createdCurrency = null;

    try {
        $createdCurrency = (new Currency(
            name: $currencyCode,
            round_factor: 0.01,
        ))
            ->attachClient($client)
            ->create();

        expect($createdCurrency)->toBeInstanceOf(Currency::class)
            ->and($createdCurrency->id)->toBeInt()
            ->and($createdCurrency->name)->toBe($currencyCode)
            ->and($createdCurrency->round_factor)->toBe(0.01);
    } finally {
        if ($createdCurrency?->id !== null) {
            $createdCurrency->attachClient($client)->delete();
        }
    }
});
