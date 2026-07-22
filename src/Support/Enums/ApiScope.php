<?php

namespace Bexio\Support\Enums;

enum ApiScope: string
{

    /**
     * Adds company specific claims to the id token like `company_id` and `company_name` describing the company the user is signed in to.    
     */
    case COMPANY_PROFILE = 'company_profile';

    /**
     * Adds claims containing email address of the signed in user.
     */
    case EMAIL = 'email';

    /**
     * Ensures that tokens can be refreshed also after the current user session has been closed.
     */
    case OFFLINE_ACCESS = 'offline_access';

    /**
     * Standard OpenID Connect (OIDC) scope. Required to indicate that the application intends to use OIDC to verify the user's identity. If requested, an ID token is provided within the token response.
     */
    case OPENID = 'openid';

    /**
     * Adds user specific claims to the id token like `given_name`, `family_name`, `locale` and `gender`.
     */
    case PROFILE = 'profile';

    /**
     * Write access to accounting data
     */
    case ACCOUNTING = 'accounting';

    /**
     * Read access to items / products
     */
    case ARTICLE_SHOW = 'article_show';

    /**
     * Write access to items / products
     */
    case ARTICLE_EDIT = 'article_edit';

    /**
     * Show bank accounts
     */
    case BANK_ACCOUNT_SHOW = 'bank_account_show';

    /**
     * Show bank payments
     */
    case BANK_PAYMENT_SHOW = 'bank_payment_show';

    /**
     * Show and edit bank payments
     */
    case BANK_PAYMENT_EDIT = 'bank_payment_edit';

    /**
     * Read access to contacts
     */
    case CONTACT_SHOW = 'contact_show';

    /**
     * Write access to contacts
     */
    case CONTACT_EDIT = 'contact_edit';

    /**
     * Read and write access to the inbox (file upload)
     */
    case FILE = 'file';

    /**
     * Read access to invoices
     */
    case KB_INVOICE_SHOW = 'kb_invoice_show';

    /**
     * Write access to invoices
     */
    case KB_INVOICE_EDIT = 'kb_invoice_edit';

    /**
     * Read access to quotes
     */
    case KB_OFFER_SHOW = 'kb_offer_show';

    /**
     * Write access to quotes
     */
    case KB_OFFER_EDIT = 'kb_offer_edit';

    /**
     * Read access to orders
     */
    case KB_ORDER_SHOW = 'kb_order_show';

    /**
     * Write access to orders
     */
    case KB_ORDER_EDIT = 'kb_order_edit';

    /**
     * Read access to deliveries
     */
    case KB_DELIVERY_SHOW = 'kb_delivery_show';

    /**
     * Write access to deliveries
     */
    case KB_DELIVERY_EDIT = 'kb_delivery_edit';

    /**
     * Read access to timesheets
     */
    case MONITORING_SHOW = 'monitoring_show';

    /**
     * Write access to timesheets
     */
    case MONITORING_EDIT = 'monitoring_edit';

    /**
     * Read access to contact notes
     */
    case NOTE_SHOW = 'note_show';

    /**
     * Write access to contact notes
     */
    case NOTE_EDIT = 'note_edit';

    /**
     * Read access to purchase orders
     */
    case KB_ARTICLE_ORDER_SHOW = 'kb_article_order_show';

    /**
     * Write access to purchase orders
     */
    case KB_ARTICLE_ORDER_EDIT = 'kb_article_order_edit';

    /**
     * Read access to projects
     */
    case PROJECT_SHOW = 'project_show';

    /**
     * Write access to projects
     */
    case PROJECT_EDIT = 'project_edit';

    /**
     * Write access to item stock
     */
    case STOCK_EDIT = 'stock_edit';

    /**
     * Read access to tasks
     */
    case TASK_SHOW = 'task_show';

    /**
     * Write access to tasks
     */
    case TASK_EDIT = 'task_edit';

    /**
     * Read access to supplier bills
     */
    case KB_BILL_SHOW = 'kb_bill_show';

    /**
     * Read access to Purchase Expenses
     */
    case KB_EXPENSE_SHOW = 'kb_expense_show';

    /**
     * Read access to Payroll employees
     */
    case PAYROLL_EMPLOYEE_SHOW = 'payroll_employee_show';

    /**
     * Write access to Payroll employees
     */
    case PAYROLL_EMPLOYEE_EDIT = 'payroll_employee_edit';

    /**
     * Read access to Payroll absences
     */
    case PAYROLL_ABSENCE_SHOW = 'payroll_absence_show';

    /**
     * Write access to Payroll absences
     */
    case PAYROLL_ABSENCE_EDIT = 'payroll_absence_edit';

    /**
     * Read access to Payroll paystubs
     */
    case PAYROLL_PAYSTUB_SHOW = 'payroll_paystub_show';
}
