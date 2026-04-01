<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\PaymentTypes\PaymentType;
use Bexio\Support\Data\SearchCriteria;

it('can get Payment Types', function () {
    $paymentTypes = PaymentType::useClient(testClient())->all();

    expect($paymentTypes)->toBeArray()
        ->and($paymentTypes[0])->toBeInstanceOf(PaymentType::class)
        ->and($paymentTypes[0]->id)->toBeInt();
});

it('can search Payment Types', function () {
    try {
        $paymentTypes = PaymentType::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Payment types endpoint unavailable: ' . $e->getMessage());
    }

    if (count($paymentTypes) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No payment types available');
    }

    foreach ($paymentTypes as $paymentType) {
        if (! $paymentType->name) {
            continue;
        }

        foreach (str_split(str_replace(' ', '', $paymentType->name)) as $searchTerm) {
            if ($searchTerm === '') {
                continue;
            }

            $results = PaymentType::useClient(testClient())
                ->query()
                ->where('name', SearchCriteria::LIKE, $searchTerm)
                ->get();

            if ($results !== []) {
                expect($results)->toBeArray()
                    ->and($results[0])->toBeInstanceOf(PaymentType::class);

                return;
            }
        }
    }

    \PHPUnit\Framework\Assert::markTestSkipped('No searchable payment type returned results');
});

it('can get first Payment Type using query builder', function () {
    $paymentType = PaymentType::useClient(testClient())->query()->first();

    expect($paymentType)->toBeInstanceOf(PaymentType::class)
        ->and($paymentType->id)->toBeInt();
});

