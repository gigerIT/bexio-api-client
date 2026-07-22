<?php

use Bexio\Resources\Files\File;
use Bexio\Resources\Files\Requests\CreateFileRequest;
use Saloon\Data\MultipartValue;

it('preserves text file bytes and multipart metadata', function () {
    $contents = "First line\nSecond line\n";
    $path = tempnam(sys_get_temp_dir(), 'bexio-file-upload-');

    if ($path === false) {
        throw new RuntimeException('Unable to create temporary upload file.');
    }

    file_put_contents($path, $contents);

    $stream = null;

    try {
        $file = new File(path: $path);
        $file->name = 'upload-notes.txt';
        $file->mime_type = 'text/plain';

        $request = new CreateFileRequest($file);
        $method = new ReflectionMethod($request, 'defaultBody');
        $method->setAccessible(true);
        $body = $method->invoke($request);

        expect($body)->toHaveCount(1)
            ->and($body[0])->toBeInstanceOf(MultipartValue::class);

        /** @var MultipartValue $part */
        $part = $body[0];
        $stream = $part->value;

        expect(stream_get_contents($stream))->toBe($contents)
            ->and($part->filename)->toBe('upload-notes.txt')
            ->and($part->headers)->toBe(['Content-Type' => 'text/plain']);
    } finally {
        if (is_resource($stream)) {
            fclose($stream);
        }

        if (file_exists($path)) {
            unlink($path);
        }
    }
});

it('retains an extensionless basename and detects its MIME type', function () {
    $path = tempnam(sys_get_temp_dir(), 'bexio-file-upload-');

    if ($path === false) {
        throw new RuntimeException('Unable to create temporary upload file.');
    }

    file_put_contents($path, 'extensionless upload');

    $stream = null;

    try {
        $file = new File(path: $path);

        $request = new CreateFileRequest($file);
        $method = new ReflectionMethod($request, 'defaultBody');
        $method->setAccessible(true);
        $body = $method->invoke($request);

        /** @var MultipartValue $part */
        $part = $body[0];
        $stream = $part->value;

        expect($part->filename)->toBe(basename($path))
            ->and($part->headers)->toBe(['Content-Type' => 'text/plain']);
    } finally {
        if (is_resource($stream)) {
            fclose($stream);
        }

        if (file_exists($path)) {
            unlink($path);
        }
    }
});
