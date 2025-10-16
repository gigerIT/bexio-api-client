<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Accounts\Account;
use Bexio\Resources\Accounting\Taxes\Tax;
use Bexio\Resources\Other\CompanyProfile\CompanyProfile;

it('can get all Company Profiles', function () {
    $companyProfile = CompanyProfile::useClient(testClient())->all();

    expect($companyProfile)->toBeArray()
        ->and($companyProfile[0])->toBeInstanceOf(CompanyProfile::class)
        ->and($companyProfile[0]->id)->toBeInt();
});


it('can get a Company Profile', function () {
    $companyProfile = CompanyProfile::useClient(testClient())->find(1);

    expect($companyProfile)->toBeInstanceOf(CompanyProfile::class)
        ->and($companyProfile->id)->toBeInt()
        ->and($companyProfile->name)->toBeString();
});


it('can get Company Profiles using query builder', function () {
    $companyProfiles = CompanyProfile::useClient(testClient())->query()->get();

    expect($companyProfiles)->toBeArray()
        ->and($companyProfiles[0])->toBeInstanceOf(CompanyProfile::class);
});


it('can get first Company Profile using query builder', function () {
    $companyProfile = CompanyProfile::useClient(testClient())->query()->first();

    expect($companyProfile)->toBeInstanceOf(CompanyProfile::class)
        ->and($companyProfile->id)->toBeInt();
});

