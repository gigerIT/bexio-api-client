<?php

use Bexio\Resources\Resource;
use Saloon\Http\Request;

it('requires live show coverage for every exposed show operation', function () {
    $uncovered = [];

    foreach (resourceClassesWithOwnShowRequest() as $resourceClass) {
        $shortName = (new ReflectionClass($resourceClass))->getShortName();

        if (resourceHasLiveFindCoverage($resourceClass, $shortName)) {
            continue;
        }

        $uncovered[] = $resourceClass;
    }

    expect($uncovered)->toBe([]);
});

it('requires every exposed show operation to appear in the README coverage table', function () {
    $readme = normalizeReadmeCoverageTable();
    $missing = [];

    foreach (resourceClassesWithOwnShowRequest() as $resourceClass) {
        $requestClass = (new ReflectionClass($resourceClass))->getReflectionConstant('SHOW_REQUEST')?->getValue();

        try {
            $request = instantiateRequestWithPlaceholders($requestClass);
        } catch (Throwable $throwable) {
            $missing[] = $resourceClass . ' could not instantiate ' . $requestClass . ': ' . $throwable->getMessage();

            continue;
        }

        $needle = $request->getMethod()->value . ' ' . normalizeEndpointPlaceholders($request->resolveEndpoint());

        if (! str_contains($readme, $needle)) {
            $missing[] = $resourceClass . ' exposes undocumented ' . $needle;
        }
    }

    expect($missing)->toBe([]);
});

/**
 * @return array<class-string<Resource>>
 */
function resourceClassesWithOwnShowRequest(): array
{
    $classes = [];

    $root = realpath(__DIR__ . '/../../src/Resources');

    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root)) as $file) {
        if (! $file instanceof SplFileInfo || ! $file->isFile() || $file->getExtension() !== 'php') {
            continue;
        }

        $path = $file->getRealPath();
        $class = 'Bexio\\Resources\\' . str_replace(
            ['/', '.php'],
            ['\\', ''],
            substr($path, strlen($root) + 1),
        );

        if (! class_exists($class) || ! is_subclass_of($class, Resource::class)) {
            continue;
        }

        $reflection = new ReflectionClass($class);
        $constant = $reflection->getReflectionConstant('SHOW_REQUEST');

        if ($constant?->getDeclaringClass()->getName() !== $class) {
            continue;
        }

        if ($constant->getValue() === Request::class) {
            continue;
        }

        $classes[] = $class;
    }

    sort($classes);

    return $classes;
}

/**
 * @param class-string<Request> $requestClass
 */
function instantiateRequestWithPlaceholders(string $requestClass): Request
{
    $reflection = new ReflectionClass($requestClass);
    $constructor = $reflection->getConstructor();

    if ($constructor === null) {
        return $reflection->newInstance();
    }

    $arguments = [];

    foreach ($constructor->getParameters() as $parameter) {
        if ($parameter->isDefaultValueAvailable()) {
            $arguments[] = $parameter->getDefaultValue();

            continue;
        }

        $type = $parameter->getType();
        $arguments[] = $type instanceof ReflectionNamedType && $type->getName() === 'int' ? 123 : '123';
    }

    return $reflection->newInstanceArgs($arguments);
}

function normalizeReadmeCoverageTable(): string
{
    return normalizeEndpointPlaceholders(str_replace('`', '', file_get_contents(__DIR__ . '/../../README.md')));
}

function normalizeEndpointPlaceholders(string $value): string
{
    return preg_replace('/\{[^}]+}/', '123', $value);
}

/**
 * @param class-string<Resource> $resourceClass
 */
function resourceHasLiveFindCoverage(string $resourceClass, string $shortName): bool
{
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__)) as $file) {
        if (! $file instanceof SplFileInfo || ! $file->isFile() || $file->getExtension() !== 'php') {
            continue;
        }

        $source = file_get_contents($file->getPathname());

        if (
            ! str_contains($source, 'use ' . $resourceClass . ';')
            && ! preg_match('/namespace\s+' . preg_quote(substr($resourceClass, 0, -strlen('\\' . $shortName)), '/') . '\s*;/', $source)
        ) {
            continue;
        }

        if (preg_match('/\b' . preg_quote($shortName, '/') . '::useClient\([^;]+?->find\(/s', $source)) {
            return true;
        }

        if (preg_match('/new\s+' . preg_quote($shortName, '/') . '\([^;]*\)[^;]+?->find\(/s', $source)) {
            return true;
        }

        if (preg_match('/\$[A-Za-z_][A-Za-z0-9_]*->[^;]*?find\(/s', $source)) {
            return true;
        }

        if (str_contains($source, 'LiveApiContracts::assertFirstIndexedCandidateCanBeShown')) {
            return true;
        }
    }

    return false;
}
