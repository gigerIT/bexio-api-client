<?php

use Bexio\BexioClient;
use Bexio\Support\QueryBuilder;

beforeEach(function () {
    $this->client = BexioClient::testAccount();
    $this->queryBuilder = new QueryBuilder(
        resourceClass: TestResource::class,
        client: $this->client
    );
});

it('executes callback when condition is truthy', function () {
    $callbackExecuted = false;

    $this->queryBuilder->when(true, function ($query) use (&$callbackExecuted) {
        $callbackExecuted = true;
    });

    expect($callbackExecuted)->toBeTrue();
});

it('does not execute callback when condition is falsy', function () {
    $callbackExecuted = false;

    $this->queryBuilder->when(false, function ($query) use (&$callbackExecuted) {
        $callbackExecuted = true;
    });

    expect($callbackExecuted)->toBeFalse();
});

it('does not execute callback when condition is null', function () {
    $callbackExecuted = false;

    $this->queryBuilder->when(null, function ($query) use (&$callbackExecuted) {
        $callbackExecuted = true;
    });

    expect($callbackExecuted)->toBeFalse();
});

it('passes the query builder instance to callback', function () {
    $this->queryBuilder->when(true, function ($query) {
        expect($query)->toBeInstanceOf(QueryBuilder::class);
    });
});

it('passes the value to callback', function () {
    $value = 'test-value';

    $this->queryBuilder->when($value, function ($query, $passedValue) use ($value) {
        expect($passedValue)->toBe($value);
    });
});

it('executes default callback when condition is falsy and default is provided', function () {
    $defaultCallbackExecuted = false;

    $this->queryBuilder->when(
        false,
        function ($query) {
            // This should not execute
        },
        function ($query) use (&$defaultCallbackExecuted) {
            $defaultCallbackExecuted = true;
        }
    );

    expect($defaultCallbackExecuted)->toBeTrue();
});

it('does not execute default callback when condition is truthy', function () {
    $defaultCallbackExecuted = false;
    $mainCallbackExecuted = false;

    $this->queryBuilder->when(
        true,
        function ($query) use (&$mainCallbackExecuted) {
            $mainCallbackExecuted = true;
        },
        function ($query) use (&$defaultCallbackExecuted) {
            $defaultCallbackExecuted = true;
        }
    );

    expect($mainCallbackExecuted)->toBeTrue();
    expect($defaultCallbackExecuted)->toBeFalse();
});

it('returns the query builder instance for method chaining', function () {
    $result = $this->queryBuilder->when(true, function ($query) {
        // Do nothing
    });

    expect($result)->toBe($this->queryBuilder);
});

it('allows chaining multiple when calls', function () {
    $firstExecuted = false;
    $secondExecuted = false;

    $this->queryBuilder
        ->when(true, function ($query) use (&$firstExecuted) {
            $firstExecuted = true;
        })
        ->when(true, function ($query) use (&$secondExecuted) {
            $secondExecuted = true;
        });

    expect($firstExecuted)->toBeTrue();
    expect($secondExecuted)->toBeTrue();
});

it('can modify query builder parameters in callback', function () {
    $this->queryBuilder->when(true, function ($query) {
        $query->limit(10)->offset(5);
    });

    // Access the parameters using reflection since they're protected
    $reflection = new ReflectionClass($this->queryBuilder);
    $parametersProperty = $reflection->getProperty('parameters');
    $parametersProperty->setAccessible(true);
    $parameters = $parametersProperty->getValue($this->queryBuilder);

    expect($parameters->get('limit'))->toBe(10);
    expect($parameters->get('offset'))->toBe(5);
});

it('works with various truthy values', function ($truthyValue) {
    $callbackExecuted = false;

    $this->queryBuilder->when($truthyValue, function ($query) use (&$callbackExecuted) {
        $callbackExecuted = true;
    });

    expect($callbackExecuted)->toBeTrue();
})->with([
    [true],
    [1],
    ['non-empty-string'],
    [[1, 2, 3]],
]);

it('works with various falsy values', function ($falsyValue) {
    $callbackExecuted = false;

    $this->queryBuilder->when($falsyValue, function ($query) use (&$callbackExecuted) {
        $callbackExecuted = true;
    });

    expect($callbackExecuted)->toBeFalse();
})->with([
    [false],
    [0],
    [''],
    [null],
    [[]],
]);

// Test helper class
class TestResource
{
    public const INDEX_REQUEST = TestIndexRequest::class;
}

class TestIndexRequest
{
    public function __construct(
        public ?int $limit = null,
        public ?int $offset = null,
    ) {}
}
