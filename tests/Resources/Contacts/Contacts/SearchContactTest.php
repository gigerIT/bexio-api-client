<?php

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\SearchCriteria;

it('can search a Contact', function () {

    $contacts = Contact::useClient(testClient())->where('name_1', SearchCriteria::LIKE, 'Alba')->search();

    dump($contacts);

});
