<?php

use Bexio\Resources\Files\File;
use Bexio\Support\Data\SearchCriteria;

it('can get Files', function () {
    $files = File::useClient(testClient())->all();

    expect($files)->toBeArray();
});

it('can create, update, search, download and delete a File', function () {
    $tempFile = tempnam(sys_get_temp_dir(), 'bexio-file-');
    file_put_contents($tempFile, "%PDF-1.4\n% Bexio API Client Upload Test\n%%EOF");

    $createdFile = null;

    try {
        $file = new File(path: $tempFile);
        $file->name = basename($tempFile) . '.pdf';

        $createdFile = $file
            ->attachClient(testClient())
            ->save();

        expect($createdFile)->toBeInstanceOf(File::class)
            ->and($createdFile->id)->toBeInt();

        $fetched = File::useClient(testClient())->find($createdFile->id);

        expect($fetched)->toBeInstanceOf(File::class)
            ->and($fetched->uuid)->toBeString();

        $newName = basename($tempFile) . '-renamed';
        $createdFile->name = $newName;
        $createdFile = $createdFile->save();

        expect($createdFile->name)->toBe($newName);

        $searchResults = File::useClient(testClient())
            ->query()
            ->where('id', SearchCriteria::EQUAL, (string)$createdFile->id)
            ->limit(1)
            ->get();

        expect($searchResults)->toBeArray()
            ->and($searchResults[0])->toBeInstanceOf(File::class)
            ->and($searchResults[0]->id)->toBe($createdFile->id);

        $downloaded = $createdFile->download();

        expect($downloaded)->toBeString()->not->toBe('');
    } finally {
        if ($createdFile?->id) {
            $createdFile->delete();
        }

        if ($tempFile && file_exists($tempFile)) {
            @unlink($tempFile);
        }
    }
});
