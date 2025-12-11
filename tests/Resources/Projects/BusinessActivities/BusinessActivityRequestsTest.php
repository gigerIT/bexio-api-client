<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Projects\BusinessActivities\BusinessActivity;
use Bexio\Support\Data\SearchCriteria;

it('can get Business Activities', function () {
    try {
        $activities = BusinessActivity::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Business activities endpoint unavailable: ' . $e->getMessage());
    }

    if (count($activities) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No business activities available');
    }

    expect($activities)->toBeArray()
        ->and($activities[0])->toBeInstanceOf(BusinessActivity::class)
        ->and($activities[0]->id)->toBeInt();
});

it('can get a Business Activity', function () {
    try {
        $activities = BusinessActivity::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Business activities endpoint unavailable: ' . $e->getMessage());
    }

    if (count($activities) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No business activities available');
    }

    $activity = BusinessActivity::useClient(testClient())->find($activities[0]->id);

    expect($activity)->toBeInstanceOf(BusinessActivity::class)
        ->and($activity->id)->toBeInt();
});

it('can search Business Activities', function () {
    try {
        $activities = BusinessActivity::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Business activities endpoint unavailable: ' . $e->getMessage());
    }

    if (count($activities) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No business activities available');
    }

    $searchable = $activities[0];

    if (!$searchable->name) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable business activity available');
    }

    $results = BusinessActivity::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $searchable->name)
        ->search();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(BusinessActivity::class);
});

it('can get first Business Activity using query builder', function () {
    try {
        $activity = BusinessActivity::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Business activities endpoint unavailable: ' . $e->getMessage());
    }

    if (!$activity) {
        \PHPUnit\Framework\Assert::markTestSkipped('No business activities available');
    }

    expect($activity)->toBeInstanceOf(BusinessActivity::class)
        ->and($activity->id)->toBeInt();
});

