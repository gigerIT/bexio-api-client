<?php

use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;
use Bexio\Resources\Sales\Quotes\Quote;

it('hydrates quote positions through ItemPositionCast', function () {
    $quote = Quote::from([
        'id' => 1,
        'document_nr' => 'Q-1',
        'title' => 'Test Quote',
        'contact_id' => 1,
        'user_id' => 1,
        'language_id' => 1,
        'bank_account_id' => 1,
        'currency_id' => 1,
        'payment_type_id' => 1,
        'header' => '',
        'footer' => '',
        'mwst_type' => 0,
        'mwst_is_net' => true,
        'show_position_taxes' => false,
        'is_valid_from' => '2024-01-01',
        'is_valid_until' => '2024-01-31',
        'contact_address' => 'Address',
        'delivery_address' => 'Address',
        'kb_item_status_id' => QuoteStatus::DRAFT->value,
        'show_total' => true,
        'total_gross' => '10.000000',
        'total_net' => '10.000000',
        'total_taxes' => '0.000000',
        'total' => '10.000000',
        'total_rounding_difference' => 0,
        'updated_at' => '2024-01-01 00:00:00',
        'network_link' => 'https://example.test',
        'taxs' => [],
        'positions' => [
            [
                'id' => 10,
                'type' => ItemPositionType::ARTICLE->value,
                'amount' => '1.000000',
                'unit_id' => 1,
                'account_id' => 1,
                'unit_name' => 'pc',
                'tax_id' => 1,
                'tax_value' => '0.000000',
                'text' => 'Article',
                'unit_price' => '10.000000',
                'discount_in_percent' => '0.000000',
                'position_total' => '10.000000',
                'pos' => '1',
                'internal_pos' => 1,
                'parent_id' => null,
                'is_optional' => false,
                'article_id' => 99,
            ],
        ],
    ]);

    expect($quote->positions)->toHaveCount(1)
        ->and($quote->positions[0])->toBeInstanceOf(ItemPositionArticle::class)
        ->and($quote->positions[0]->article_id)->toBe(99);
});
