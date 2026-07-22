<?php

use Bexio\BexioClient;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Orders\Requests\GetOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrdersRequest;
use Bexio\Support\QueryBuilder;
use Bexio\Support\SearchableQueryBuilder;
use Bexio\Support\Data\SearchCriteria;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request as SaloonRequest;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

beforeEach(function () {
    // Use a simple mock client for unit tests - no real API token needed
    $this->client = new BexioClient('mock-token');
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

it('calculates limit and offset with forPage', function () {
    $this->queryBuilder->forPage(3, 25);

    $reflection = new ReflectionClass($this->queryBuilder);
    $parametersProperty = $reflection->getProperty('parameters');
    $parametersProperty->setAccessible(true);
    $parameters = $parametersProperty->getValue($this->queryBuilder);

    expect($parameters->get('limit'))->toBe(25)
        ->and($parameters->get('offset'))->toBe(50);
});

it('formats order by clauses', function () {
    $this->queryBuilder->orderBy('updated_at', 'desc');

    $reflection = new ReflectionClass($this->queryBuilder);
    $parametersProperty = $reflection->getProperty('parameters');
    $parametersProperty->setAccessible(true);
    $parameters = $parametersProperty->getValue($this->queryBuilder);

    expect($parameters->get('order_by'))->toBe('updated_at_desc');
});

it('uses the search request when filters are present', function () {
    $mockClient = new MockClient([
        TestSearchRequest::class => MockResponse::make([
            ['id' => 1],
        ]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $queryBuilder = new TestSearchQueryBuilder(TestSearchableResource::class, $client);

    $results = $queryBuilder
        ->where('status', SearchCriteria::EQUAL, 'paid')
        ->forPage(2, 5)
        ->orderBy('updated_at', 'desc')
        ->get();

    expect($results)->toBeArray()->and($results[0]['id'])->toBe(1);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof TestSearchRequest
            && $request->query()->all() === [
                'order_by' => 'updated_at_desc',
                'limit' => 5,
                'offset' => 5,
            ]
            && $request->body()->all() === [[
                'field' => 'status',
                'criteria' => '=',
                'value' => 'paid',
            ]];
    });
});

it('passes pagination and sorting to the unfiltered orders index request', function () {
    $mockClient = new MockClient([
        GetOrdersRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $results = Order::useClient($client)
        ->query()
        ->forPage(2, 5)
        ->orderBy('updated_at', 'desc')
        ->get();

    expect($results)->toBeArray()->toBe([]);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof GetOrdersRequest
            && $request->query()->all() === [
                'order_by' => 'updated_at_desc',
                'limit' => 5,
                'offset' => 5,
            ];
    });
});

it('attaches the query client to orders returned by get and first', function (Closure $query) {
    $mockClient = new MockClient([
        GetOrdersRequest::class => MockResponse::make([
            ['id' => 123, 'title' => 'Queried order'],
        ]),
        GetOrderRequest::class => MockResponse::make([
            'id' => 123,
            'title' => 'Refreshed order',
        ]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $order = $query(Order::useClient($client)->query());

    $refreshedOrder = $order->refresh();

    expect($order)->toBeInstanceOf(Order::class)
        ->and($refreshedOrder)->toBeInstanceOf(Order::class)
        ->and($refreshedOrder->id)->toBe(123)
        ->and($refreshedOrder->title)->toBe('Refreshed order');

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof GetOrderRequest
            && $request->resolveEndpoint() === '/2.0/kb_order/123';
    });
})->with([
    'get' => static fn (QueryBuilder $queryBuilder): Order => $queryBuilder->get()[0],
    'first' => static fn (QueryBuilder $queryBuilder): Order => $queryBuilder->first(),
]);

it('forwards unmatched pagination params to zero-constructor index requests', function () {
    $mockClient = new MockClient([
        TestSearchIndexRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $queryBuilder = new QueryBuilder(TestZeroCtorResource::class, $client);

    $results = $queryBuilder
        ->forPage(2, 5)
        ->orderBy('updated_at', 'desc')
        ->get();

    expect($results)->toBeArray()->toBe([]);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof TestSearchIndexRequest
            && $request->query()->get('limit') === 5
            && $request->query()->get('offset') === 5
            && $request->query()->get('order_by') === 'updated_at_desc';
    });
});

it('preserves defaultQuery when forwarding unmatched index params', function () {
    $mockClient = new MockClient([
        TestScopedIndexRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $queryBuilder = new QueryBuilder(TestScopedResource::class, $client);

    $queryBuilder->limit(5)->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof TestScopedIndexRequest
            && $request->query()->all() === [
                'scope' => 'active',
                'limit' => 5,
            ];
    });
});

it('allows explicit null query overrides for unmatched index params', function () {
    $mockClient = new MockClient([
        TestScopedIndexRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $queryBuilder = new TestScopedQueryBuilder(TestScopedResource::class, $client);

    $queryBuilder->withInactive()->limit(5)->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        $query = $request->query()->all();

        return $request instanceof TestScopedIndexRequest
            && array_key_exists('scope', $query)
            && $query['scope'] === null
            && $query['limit'] === 5;
    });
});

it('forwards unmatched params when the constructor only accepts route context', function () {
    $mockClient = new MockClient([
        TestPartialCtorIndexRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $queryBuilder = new TestPartialCtorQueryBuilder(TestPartialCtorResource::class, $client);

    $queryBuilder->forContext(42)->limit(10)->offset(20)->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof TestPartialCtorIndexRequest
            && $request->contextId === 42
            && $request->query()->all() === [
                'limit' => 10,
                'offset' => 20,
            ];
    });
});

it('limits searchable first queries to one record', function () {
    $mockClient = new MockClient([
        TestSearchRequest::class => MockResponse::make([
            ['id' => 1],
        ]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $queryBuilder = new TestSearchQueryBuilder(TestSearchableResource::class, $client);

    $result = $queryBuilder
        ->where('status', SearchCriteria::EQUAL, 'paid')
        ->first();

    expect($result)->toBe(['id' => 1]);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof TestSearchRequest
            && $request->query()->get('limit') === 1;
    });
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

class TestZeroCtorResource
{
    public const INDEX_REQUEST = TestSearchIndexRequest::class;
}

class TestScopedResource
{
    public const INDEX_REQUEST = TestScopedIndexRequest::class;
}

class TestPartialCtorResource
{
    public const INDEX_REQUEST = TestPartialCtorIndexRequest::class;
}

class TestSearchableResource
{
    public const INDEX_REQUEST = TestSearchIndexRequest::class;
}

class TestSearchQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = TestSearchRequest::class;
}

class TestScopedQueryBuilder extends QueryBuilder
{
    public function withInactive(): static
    {
        return $this->setParameter('scope', null);
    }
}

class TestPartialCtorQueryBuilder extends QueryBuilder
{
    private ?int $contextId = null;

    public function forContext(int $contextId): static
    {
        $this->contextId = $contextId;

        return $this;
    }

    protected function indexRequestArguments(): array
    {
        return [
            'contextId' => $this->contextId,
            ...parent::indexRequestArguments(),
        ];
    }
}

class TestIndexRequest extends SaloonRequest
{
    protected Method $method = Method::GET;

    public function __construct(
        public ?int $limit = null,
        public ?int $offset = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/test';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}

class TestSearchIndexRequest extends SaloonRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/search-test';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}

class TestScopedIndexRequest extends SaloonRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/scoped-test';
    }

    protected function defaultQuery(): array
    {
        return [
            'scope' => 'active',
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}

class TestPartialCtorIndexRequest extends SaloonRequest
{
    protected Method $method = Method::GET;

    public function __construct(public readonly int $contextId)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/partial-ctor-test/'.$this->contextId;
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}

class TestSearchRequest extends SaloonRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(public array $searchClauses = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return '/search-test/search';
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}
