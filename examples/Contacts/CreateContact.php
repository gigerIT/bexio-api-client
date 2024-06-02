<?php

use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use Bexio\Resources\Contacts\Contacts\Requests\CreateContactRequest;

require_once __DIR__ . '/../../vendor/autoload.php';

$faker = Faker\Factory::create();

$client = new BexioClient();


$contact = new Contact(
    name_1: $faker->firstName(),
    contact_type_id: ContactType::PERSON,
    name_2: $faker->lastName(),
    mail: $faker->email(),
);


$request = new CreateContactRequest($contact);
$response = $client->send($request);


$newContact = $request->createDtoFromResponse($response);


print_r($newContact);