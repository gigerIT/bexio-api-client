<?php
declare(strict_types=1);


namespace Bexio\Resources\Accounting\Currencies;

use Bexio\Resources\Accounting\Currencies\Requests\CreateCurrencyRequest;
use Bexio\Resources\Accounting\Currencies\Requests\DeleteCurrencyRequest;
use Bexio\Resources\Accounting\Currencies\Requests\GetCurrenciesRequest;
use Bexio\Resources\Accounting\Currencies\Requests\GetCurrencyRequest;
use Bexio\Resources\Accounting\Currencies\Requests\UpdateCurrencyRequest;
use Bexio\Resources\Resource;

class Currency extends Resource
{
    public const INDEX_REQUEST = GetCurrenciesRequest::class;
    public const SHOW_REQUEST = GetCurrencyRequest::class;
    public const CREATE_REQUEST = CreateCurrencyRequest::class;
    public const UPDATE_REQUEST = UpdateCurrencyRequest::class;
    public const DELETE_REQUEST = DeleteCurrencyRequest::class;

    //Default ID's for currencies in Bexio (most users don't change this list)
    const DEFAULT_ID = [
        'CHF' => 1,
        'EUR' => 2,
        'USD' => 3,
        'GBP' => 4,
        'BRL' => 5,
        'JPY' => 6,
        'CNY' => 7,
    ];

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public int|float|null $round_factor = null,
        public int|float|string|null $exchange_rate = null,
        public ?int $exchange_rate_id = null,
        public int|float|string|null $ratio = null,
        public int|float|string|null $exchange_rate_to_ratio = null,
        public ?string $source = null,
        public ?string $source_reason = null,
        public ?string $exchange_rate_date = null,
        public ?array $exchange_rates = null,
    ) {
    }

    public function toCreateApi(): Currency
    {
        return $this->except(
            'id',
            'exchange_rate',
            'exchange_rate_id',
            'ratio',
            'exchange_rate_to_ratio',
            'source',
            'source_reason',
            'exchange_rate_date',
            'exchange_rates',
        );
    }

    public function toUpdateApi(): Currency
    {
        return $this->only('round_factor');
    }
}
