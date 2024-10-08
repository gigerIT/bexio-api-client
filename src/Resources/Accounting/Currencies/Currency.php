<?php
declare(strict_types=1);


namespace Bexio\Resources\Accounting\Currencies;

use Bexio\Resources\Resource;

class Currency extends Resource
{
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

}