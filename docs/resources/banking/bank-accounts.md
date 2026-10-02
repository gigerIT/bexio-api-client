# Bank accounts

```php
use Bexio\Resources\Banking\BankAccounts\BankAccount;

$accounts = BankAccount::useClient($client)->query()->limit(10)->get();
$account = BankAccount::useClient($client)->find($accounts[0]->id);
```

Bank accounts expose both numeric `id` and string `uuid`. `owner_zip` and `bc_nr`
accept strings or integers, preserving international postal codes and leading
zeros. `owner_house_number` and `owner_country_code` are also available.

Contract and live list response verified on 2026-10-02 against the official
[bank account endpoint](https://docs.bexio.com/#operation/ListBankAccounts).
