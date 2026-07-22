<?php

use Bexio\Support\Enums\ApiScope;

it('contains every documented Bexio API and OpenID Connect scope', function () {
    $documentedScopes = [
        // API scopes (docs.bexio.com Authentication / API Scopes)
        'accounting',
        'article_show',
        'article_edit',
        'bank_account_show',
        'bank_payment_show',
        'bank_payment_edit',
        'contact_show',
        'contact_edit',
        'file',
        'kb_invoice_show',
        'kb_invoice_edit',
        'kb_offer_show',
        'kb_offer_edit',
        'kb_order_show',
        'kb_order_edit',
        'kb_delivery_show',
        'kb_delivery_edit',
        'monitoring_show',
        'monitoring_edit',
        'note_show',
        'note_edit',
        'kb_article_order_show',
        'kb_article_order_edit',
        'project_show',
        'project_edit',
        'stock_edit',
        'task_show',
        'task_edit',
        'kb_bill_show',
        'kb_expense_show',
        'payroll_employee_show',
        'payroll_employee_edit',
        'payroll_absence_show',
        'payroll_absence_edit',
        'payroll_paystub_show',
        // OpenID Connect scopes
        'company_profile',
        'email',
        'offline_access',
        'openid',
        'profile',
    ];

    $enumScopes = array_map(
        static fn (ApiScope $scope): string => $scope->value,
        ApiScope::cases(),
    );

    expect($enumScopes)
        ->toEqualCanonicalizing($documentedScopes)
        ->and(ApiScope::ACCOUNTING->value)->toBe('accounting');
});
