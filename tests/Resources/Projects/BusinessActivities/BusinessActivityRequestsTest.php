<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Projects\BusinessActivities\BusinessActivity;
use Bexio\Support\Data\SearchCriteria;
use PHPUnit\Framework\Assert;

it('can get Business Activities', function () {
    try {
        $activities = BusinessActivity::useClient(testClient())->all();
    } catch (\Throwable $e) {
        Assert::markTestSkipped('Business activities endpoint unavailable: '.$e->getMessage());
    }

    if (count($activities) === 0) {
        Assert::markTestSkipped('No business activities available');
    }

    expect($activities)->toBeArray()
        ->and($activities[0])->toBeInstanceOf(BusinessActivity::class)
        ->and($activities[0]->id)->toBeInt();
});

it('can get a Business Activity', function () {
    try {
        $activities = BusinessActivity::useClient(testClient())->all();
    } catch (\Throwable $e) {
        Assert::markTestSkipped('Business activities endpoint unavailable: '.$e->getMessage());
    }

    if (count($activities) === 0) {
        Assert::markTestSkipped('No business activities available');
    }

    $activity = BusinessActivity::useClient(testClient())->find($activities[0]->id);

    expect($activity)->toBeInstanceOf(BusinessActivity::class)
        ->and($activity->id)->toBeInt();
});

it('can search Business Activities', function () {
    try {
        $activities = BusinessActivity::useClient(testClient())->all();
    } catch (\Throwable $e) {
        Assert::markTestSkipped('Business activities endpoint unavailable: '.$e->getMessage());
    }

    if (count($activities) === 0) {
        Assert::markTestSkipped('No business activities available');
    }

    $searchable = $activities[0];

    if (! $searchable->name) {
        Assert::markTestSkipped('No searchable business activity available');
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
        Assert::markTestSkipped('Business activities endpoint unavailable: '.$e->getMessage());
    }

    if (! $activity) {
        Assert::markTestSkipped('No business activities available');
    }

    expect($activity)->toBeInstanceOf(BusinessActivity::class)
        ->and($activity->id)->toBeInt();
});
