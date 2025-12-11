<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Projects\CommunicationTypes\CommunicationType;
use Bexio\Support\Data\SearchCriteria;

it('can get Communication Types', function () {
    try {
        $types = CommunicationType::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Communication types endpoint unavailable: ' . $e->getMessage());
    }

    if (count($types) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No communication types available');
    }

    expect($types)->toBeArray()
        ->and($types[0])->toBeInstanceOf(CommunicationType::class)
        ->and($types[0]->id)->toBeInt();
});

it('can get a Communication Type', function () {
    try {
        $types = CommunicationType::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Communication types endpoint unavailable: ' . $e->getMessage());
    }

    if (count($types) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No communication types available');
    }

    $type = CommunicationType::useClient(testClient())->find($types[0]->id);

    expect($type)->toBeInstanceOf(CommunicationType::class)
        ->and($type->id)->toBeInt();
});

it('can search Communication Types', function () {
    try {
        $types = CommunicationType::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Communication types endpoint unavailable: ' . $e->getMessage());
    }

    if (count($types) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No communication types available');
    }

    $searchable = $types[0];

    if (!$searchable->name) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable communication type available');
    }

    $results = CommunicationType::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $searchable->name)
        ->search();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(CommunicationType::class);
});

it('can get first Communication Type using query builder', function () {
    try {
        $type = CommunicationType::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Communication types endpoint unavailable: ' . $e->getMessage());
    }

    if (!$type) {
        \PHPUnit\Framework\Assert::markTestSkipped('No communication types available');
    }

    expect($type)->toBeInstanceOf(CommunicationType::class)
        ->and($type->id)->toBeInt();
});


