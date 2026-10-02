<?php

use Bexio\Resources\Projects\Projects\Project;
use Bexio\Resources\Projects\Projects\Requests\CreateProjectRequest;
use Bexio\Resources\Projects\Projects\Requests\UpdateProjectRequest;

it('leaves automatic project numbering to Bexio when no number is supplied', function (string $requestClass) {
    $project = new Project('API test', 1, 1, 42, 1, id: 7, nr: '000007');

    expect((new $requestClass($project))->body()->all())
        ->toHaveKey('name', 'API test')
        ->not->toHaveKeys(['id', 'uuid', 'nr', 'document_nr']);
})->with([
    'create' => [CreateProjectRequest::class],
    'update' => [UpdateProjectRequest::class],
]);

it('preserves explicitly supplied numbers for manual project numbering', function () {
    $project = new Project('API test', 1, 1, 42, 1, document_nr: 'CUSTOM-42');

    expect((new CreateProjectRequest($project))->body()->all())
        ->toHaveKey('document_nr', 'CUSTOM-42');
});
