# Purchase OAuth scopes

The official contract checked on 2026-10-02 specifies these scopes. Its
[2026-06-19 changelog entry](https://docs.bexio.com/#section/Changelog) records
the purchase scope update.

| Operations | Required `ApiScope` cases |
| --- | --- |
| Bills and expenses: list, show, create, update, delete, status, actions, document-number validation | `OPENID`, `CONTACT_SHOW` |
| Purchase outgoing payments: list, show, create | `OPENID`, `CONTACT_SHOW` |
| Purchase outgoing payments: update | `OPENID`, `CONTACT_SHOW`, `BANK_PAYMENT_EDIT` |
| Purchase outgoing payments: delete | `OPENID`, `CONTACT_SHOW`, `KB_BILL_SHOW` |

Pass the enum **values** to the authorization flow:

```php
use Bexio\Support\Enums\ApiScope;

$scopes = [
    ApiScope::OPENID->value,
    ApiScope::CONTACT_SHOW->value,
    ApiScope::BANK_PAYMENT_EDIT->value,
    ApiScope::KB_BILL_SHOW->value,
];
```

The package already exposes these cases. Request the subset your integration
uses, and retain `OFFLINE_ACCESS` when refresh tokens are needed. Changing
requested scopes requires a new authorization flow; refreshing an existing
token does not add scopes. Access also depends on the authorizing user's rights.

Banking `/4.0/banking/payments` is a separate API: its read operations use
`BANK_PAYMENT_SHOW`, and its writes use `BANK_PAYMENT_EDIT`.

Sources: [bill list](https://docs.bexio.com/#operation/ApiBillsList_GET),
[expense list](https://docs.bexio.com/#operation/ApiExpensesList_GET), and the
outgoing-payment operation security declarations in the
[captured official contract](../../api-sync/).
