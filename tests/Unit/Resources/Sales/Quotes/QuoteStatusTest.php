<?php

use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;

it('exposes QuoteStatus::DECLINED', function () {
    expect(QuoteStatus::DECLINED->value)->toBe(4);
});
