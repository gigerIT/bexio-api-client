Title: bexio API documentation

* Overview
* First steps
* Reporting a problem
* Changelog
* Authentication
* OpenID Connect
* Migration from idp.bexio.com to auth.bexio.com
* API Scopes
* OpenID Connect Scopes
* Authorization Code Flow
* Refresh Token Flow
* Redirect URL(s)
* Personal Access Tokens (PAT)
* API basics
* API routes
* HTTP Verbs
* HTTP Headers
* Errors
* Search
* Rate Limiting
* FAQ
* Contacts
* Contacts
* getFetch a list of contacts
* postCreate contact
* postSearch contacts
* getFetch a contact
* postEdit a contact
* delDelete a contact
* postBulk create contacts
* patchRestore a contact
* Contact Relations
* getFetch a list of contact relations
* postCreate contact relation
* postSearch contact relations
* getFetch a contact relation
* postEdit a contact relation
* delDelete a contact relation
* Contact Groups
* getFetch a list of contact groups
* postCreate contact group
* postSearch contact groups
* getFetch a contact group
* postEdit a contact group
* delDelete a contact group
* Contact Sectors
* getFetch a list of contact sectors
* postSearch contact sectors
* Additional Addresses
* getFetch a list of additional addresses
* postCreate additional address
* postSearch additional addresses
* getFetch an additional address
* postEdit an additional address
* delDelete an additional address
* Salutations
* getFetch a list of salutations
* postCreate salutation
* postSearch salutations
* getFetch a salutation
* postEdit a salutation
* delDelete a salutation
* Titles
* getFetch a list of titles
* postCreate title
* postSearch titles
* getFetch a title
* postEdit a title
* delDelete a title
* Sales Order Management
* Quotes
* getFetch a list of quotes
* postCreate quote
* postSearch quotes
* getFetch a quote
* postEdit a quote
* delDelete a quote
* postIssue a quote
* postRevert issue a quote
* postAccept a quote
* postDecline a quote
* postReissue a quote
* postMark quote as sent
* getShow PDF
* postSend a quote
* postCopy a quote
* postCreate order from quote
* postCreate invoice from quote
* Orders
* getFetch a list of orders
* postCreate order
* postSearch orders
* getFetch an order
* postEdit an order
* delDelete an order
* postCreate delivery from order
* postCreate invoice from order
* getShow PDF
* getShow repetition
* postEdit a repetition
* delDelete a repetition
* Deliveries
* getFetch a list of deliveries
* getFetch a delivery
* postIssue a delivery
* Invoices
* getFetch a list of invoices
* postCreate invoice
* postSearch invoices
* getFetch an invoice
* postEdit an invoice
* delDelete an invoice
* getShow PDF
* postCopy a invoice
* postIssue an invoice
* postSets issued invoice to draft
* postCancel an invoice
* postMark invoice as sent
* postSend an invoice
* getFetch a list of payments
* postCreate payment
* getFetch a payment
* delDelete a payment
* getFetch a list of reminders
* postCreate reminder
* postSearch invoice reminders
* getFetch a reminder
* delDelete a reminder
* postMark reminder as sent
* postMark reminder as unsent
* postSend a reminder
* getShow reminder PDF
* Document Settings
* getFetch a list of document settings
* Comments
* getFetch a list of comments
* postCreate a comment
* getFetch a comment
* Default positions
* getFetch a list of default positions
* postCreate a default position
* getFetch a default position
* postEdit a default position
* delDelete a default position
* Item positions
* getFetch a list of item positions
* postCreate an item position
* getFetch an item position
* postEdit an item position
* delDelete a item position
* Text positions
* getFetch a list of text positions
* postCreate a text position
* getFetch a text position
* postEdit a text position
* delDelete a text position
* Subtotal positions
* getFetch a list of subtotal positions
* postCreate a subtotal position
* getFetch a subtotal position
* postEdit a subtotal position
* delDelete a subtotal position
* Discount positions
* getFetch a list of discount positions
* postCreate a discount position
* getFetch a discount position
* postEdit a discount position
* delDelete a discount position
* Pagebreak positions
* getFetch a list of pagebreak positions
* postCreate a pagebreak position
* getFetch a pagebreak position
* postEdit a pagebreak position
* delDelete a pagebreak position
* Sub positions
* getFetch a list of sub positions
* postCreate a sub position
* getFetch a sub position
* postEdit a sub position
* delDelete a sub position
* Document templates
* getList document templates
* Purchase
* Bills
* getGet Bills
* postCreate new Bill
* getGet Bill
* putUpdate Bill
* delDelete Bill
* putUpdate Bill status
* postExecute Bill action
* getValidate whether document number is available or not
* Expenses
* getGet Expenses
* postCreate new Expense
* getGet Expense
* putUpdate Expense
* delDelete Expense
* putUpdate Expense status
* postExecute Expense action
* getValidate whether document number is available or not
* Purchase Orders
* getFetch a list of purchase orders
* postCreate a purchase order
* getFetch a single purchase order
* putUpdate a single purchase order
* delDelete a purchase order
* Outgoing Payment
* getRetrieve Outgoing Payments
* putEdit Outgoing Payment
* postCreate new Outgoing Payment
* getGet Outgoing Payment
* delDelete Outgoing Payment
* Accounting
* Accounts
* getFetch a list of accounts
* postSearch Accounts
* Account Groups
* getFetch a list of account groups
* Calendar Years
* getFetch a list of calendar years
* postCreate calendar year.
* postSearch calendar years
* getFetch a calendar year
* Business Years
* getFetch a list of business years
* getFetch a business year
* Currencies
* getFetch a list of currencies
* postCreate a currency
* getFetch a currency
* delDelete a currency
* patchUpdate a currency
* getFetch exchange rates for currencies
* getFetch all possible currency codes
* Manual Entries
* getFetch a list of manual entries
* postCreate manual entry
* putUpdate manual entry
* delDelete manual entry
* getGet next reference number
* getFetch files of manual entry line
* postAdd file to manual entry line
* getFetch file of manual entry line
* delDelete connection between file and manual entry line
* getFetch files of manual compound entry
* postAdd file to manual compound entry
* getFetch file of manual compound entry
* delDelete connection between file and manual compound entry
* Reports
* getJournal
* Taxes
* getFetch a list of taxes
* getFetch a tax
* delDelete a tax
* Vat Periods
* getFetch a list of vat periods
* getFetch a vat period
* Banking
* Bank Accounts
* getFetch a list of bank accounts
* getFetch a single bank account
* IBAN Payments
* postCreate IBAN payment
* getGet IBAN payment
* patchUpdate IBAN payment
* QR Payments
* postCreate QR payment
* getGet QR payment
* patchUpdate QR payment
* Payments
* getFetch a list of payments
* postCancel a payment
* delDelete a payment
* getFetch a list of all payments
* postCreate a payment
* getGet a payment
* putUpdate a payment
* delDelete a payment
* postCancel a payment
* Items & Products
* Items
* getFetch a list of items
* postCreate item
* postSearch items
* getFetch an item
* postEdit an item
* delDelete an item
* Stock locations
* getFetch a list of stock locations
* postSearch stock locations
* Stock Areas
* getFetch a list of stock areas
* postSearch stock areas
* Projects & Time Tracking
* Projects
* getFetch a list of projects
* postCreate project
* postSearch projects
* getFetch a project
* postEdit a project
* delDelete a project
* postArchive a project
* postUnarchive a project
* getProject status
* getProject types
* getFetch a list of milestones
* postCreate milestone
* getFetch a milestone
* postEdit a milestone
* delDelete a milestone
* getFetch a list of work packages
* postCreate work package
* getFetch a work package
* delDelete a work package
* patchEdit a work package
* Timesheets
* getFetch a list of timesheets
* postCreate timesheet
* postSearch timesheets
* getFetch a timesheet
* postEdit a timesheet
* delDelete a timesheet
* getTimesheet status
* Business Activities
* getFetch a list of business activities
* postCreate business activity
* postSearch business activities
* Communication Types
* getFetch a list of communication types
* postSearch communication types
* Files
* Files
* getFetch a list of files
* postCreate new file
* postSearch files
* getGet single file
* delDelete a existing file
* patchUpdate existing file
* getDownload file
* getGet file preview
* getShow file usage
* Payroll
* Employees
* getRetrieves all active employees
* postCreate employee
* getRetrieve a single employee on a specific date
* patchUpdate employee
* Absences
* getRetrieving absences of employee for given year
* postCreate absence for employee
* getRetrieving absence for employee with given absence id
* putUpdating existing absence
* delDeleting employee absence with given id
* Documents
* getRetrieving pdf for employee for given month
* Other endpoints
* Company Profile
* getFetch a list of company profiles
* getShow company profile
* Countries
* getFetch a list of countries
* postCreate country
* postSearch countries
* getFetch a country
* postEdit a country
* delDelete a country
* Languages
* getFetch a list of languages
* postSearch languages
* Notes
* getFetch a list of notes
* postCreate note
* postSearch notes
* getFetch a note
* postEdit a note
* delDelete a note
* Payment Types
* getFetch a list of payment types
* postSearch payment types
* Permissions
* getGet access information of logged in user
* Tasks
* getFetch a list of tasks
* postCreate task
* postSearch tasks
* getFetch a task
* postEdit a task
* delDelete a task
* getTask priorities
* getTask status
* Units
* getFetch a list of units
* postCreate unit
* postSearch units
* getFetch a unit
* postEdit a unit
* delDelete a unit
* User Management
* getFetch a list of users
* getFetch a user
* getFetch the authenticated user
* getFetch a list of fictional users
* postCreate a fictional user
* getFetch a fictional User
* delDelete a fictional user
* patchUpdate a fictional User

API docs by Redocly

bexio API (3.0.0)
=================

**Stay up-to-date**

Subscribe to our status page to get informed about short term issues with the API. Subscribe to our API developer newsletter to get the latest news and updates around our API platform.

Overview
--------

The bexio API uses HTTPS methods and RESTful endpoints to create, edit, and manage documents in the bexio system. JSON is used as the data interchange format.

First steps
-----------

In order to use the bexio API, you need to follow the following steps in order:

1. Create a bexio account by signing up for a trial account at  and complete the onboarding process. If you already have a bexio account, you can skip this step.
2. Go to the developer portal at  and log in using your bexio credentials.
3. Read and accept the terms and conditions
4. Create a new app and make sure that you define a valid site for the "Allowed redirect URL" field(s)
5. By clicking on the section "App Details" you can reveal the Client ID and Client Secret
6. Initiate the Authorization Code Flow to obtain an access token.
7. Use the access token to create a request to the bexio API. The example below fetches a list of contacts (make sure to request the scope `contact_show` in the authorization code flow)

```
curl -X GET \
https://api.bexio.com/2.0/contact \
-H 'Accept: application/json' \
-H 'Authorization: Bearer {access-token}'
```

Authentication
--------------

OpenID Connect
--------------

OpenID Connect 1.0 is a simple identity layer on top of the OAuth 2.0 protocol. It allows Clients to verify the identity of the End-User based on the authentication performed by an Authorization Server, as well as to obtain basic profile information about the End-User in an interoperable and REST-like manner.

| Key | Value |
| --- | --- |
| Issuer |  |
| OpenID Configuration URL |  |
| Authorization endpoint |  |
| Token endpoint |  |
| Userinfo endpoint |  |
| JWK endpoint |  |

If you're using the IdP  for obtaining tokens, please make sure to migrate to  until 2025-03-31. Afterwards,  will no longer be available. Refresh tokens issued from  will be valid on  but must be exchanged for new refresh tokens until 2025-03-31.

Migration from idp.bexio.com to auth.bexio.com
----------------------------------------------

The IdP, currently available at `idp.bexio.com`, is about to be replaced by a new IdP available on `auth.bexio.com`. Like the `idp.bexio.com`, the new solution will implement the OAuth2 protocol with the OpenID connect extension which ensures compatibility for API clients.

During the migration period of six months, both `idp.bexio.com` and `auth.bexio.com` will be available for API clients to initiate the OAuth2 authorization code flow and to issue API access tokens. This will allow API clients to migrate to the new IdP at their own pace.

**`idp.bexio.com` will be decommissioned on 31.03.2025.**

### How to migrate an API client to the new IdP?

Most client applications can migrate to the new IdP by just reconfiguring the URLs to initialize the authorization flow and to issue tokens. Depending on the framework in use, the URLs to change might differ but usually includes one or more of the following URLs:

| Endpoint | Old URL | New URL |
| --- | --- | --- |
| Issuer |  |  |
| OpenID Configuration URL |  |  |
| Authorization endpoint |  |  |
| Token endpoint |  |  |
| Userinfo endpoint |  |  |
| JWK endpoint |  |  |

Other configuration options like `client_id`, `client_secret` or `scope` do not need to be changed.

### Are there any new features for client applications?

From a client perspective, there are some minor improvements that simplify the correct use of id and access tokens:

* Claims in id tokens are aligned with the `/userinfo` endpoint. Id tokens will contain the following claims if the according scope is requested:
* scope: `profile`, claims: `given_name`, `family_name`, `gender`, `locale`
* scope: `email`, claims: `email`, `email_verified`
* In addition, the following scope has been added to request access to company information in id tokens and the `/userinfo` endpoint:
* scope: `company_profile`, claims: `company_id`, `company_name`, `company_user_id`

### Are there breaking changes?

The new IdP differs in some of the claims provided by the access and id tokens returned by the `/token` endpoint and in some of the properties provided by the `/userinfo` endpoint. The breaking changes affect the following claims:

* `iss` - This claim identifies the issuer of the token and is currently `"https://idp.bexio.com"`. With the switch to the new IdP the value will change to `"https://auth.bexio.com/realms/bexio"`.
* `sub` - This claim identifies the user who granted the creation of the token. Currently, the claim equals to the user’s email address. The new IdP will instead return a UUID identifying the user within bexio equal to the `login_id` claim.
* If you’re using the `sub` claim to identify the user, consider switching to the `login_id` claim before migrating to `auth.bexio.com`. `login_id` will be identical on both the old and the new IdP for a given user.
* If you’re using the `sub` claim to get access to the user’s email address, consider to use the `email` claim instead. Please note that the claim is only available if the `email` scope has been granted to your client. Alternatively, you can use the `/3.0/users/me endpoint` (docs).
* `locale` - Contains the user’s default locale if the user grants access to the `openid profile` scope and is provided by the `/userinfo` endpoint. `idp.bexio.com` currently uses the non-compliant underscore to separate language code from country code (as in `de_CH`). `auth.bexio.com` will provide the locale in the OIDC compliant format using a hyphen (e.g. `de-CH`).
* `shard_id` - This claim will no longer be available.

Additionally, the following will change with the switch to the new IdP:

* Offline sessions will have an idle timeout of 1 year. An offline session is created if tokens are requested with the `offline_access` scope. The returned refresh token will be valid indefinitely but the associated offline session will be closed if not renewed within 1 year. This effectively means that tokens must be refreshed within 1 year.
* idp.bexio.com supports accepting some parameters to the `/token` endpoint as query parameters in the URL. This behavior is no longer supported in the new IdP and all parameters must be passed in the request body.
* In some cases, you may run into more strict CORS policies after switching to the new IdP. These issues can be mitigated by adding your web origin as a valid redirect URL for your app on . Redirect URLs will be accepted as valid web origins for requests from the according client.

### Do users have to re-authorize my application after the switch?

To answer this question we have to distinguish between two cases:

* Applications using refresh tokens can migrate refresh tokens issued by `idp.bexio.com` to the new IdP by passing the tokens to the refresh token grant type on . When the new IdP receives a refresh token issued by `idp.bexio.com`, the according user consent will be imported. This means that users wont be required to re-authorize your application in this case. Keep in mind though that this requires that applications replace refresh tokens with the new refresh tokens provided during the token refresh instead of reusing the refresh token received with the initial call to the token endpoint. Also, tokens have to be refreshed at least once before `idp.bexio.com` is decommissioned on 31.03.2025.
* If refresh tokens are not used, users will be required to give consent to the scope requested by your application again after switching to the new IdP.

API Scopes
----------

Scope is a mechanism in OAuth 2.0 / OpenID Connect to limit an application's access to a user's account. An application can request one or more scopes, this information is then presented to the user in the consent screen, and the access token issued to the application will be limited to the scopes granted.Please only request the scopes that you need for your application. You are allowed to request multiple scopes per request. Multiple scopes have to be separated by a whitespace. As an example, write access to quotes and invoices can be requested with the following scopes: `kb_offer_edit kb_invoice_edit`.

Read access is granted automatically when a write scope is requested for a resource. This means that by requesting the scope `contact_edit` the scope `contact_show` is not needed in order to get read access to contacts.

| Scope | Description |
| --- | --- |
| `accounting` | Write access to accounting data |
| `article_show` | Read access to items / products |
| `article_edit` | Write access to items / products |
| `bank_account_show` | Show bank accounts |
| `bank_payment_show` | Show bank payments |
| `bank_payment_edit` | Show and edit bank payments |
| `contact_show` | Read access to contacts |
| `contact_edit` | Write access to contacts |
| `file` | Read and write access to the inbox (file upload) |
| `kb_invoice_show` | Read access to invoices |
| `kb_invoice_edit` | Write access to invoices |
| `kb_offer_show` | Read access to quotes |
| `kb_offer_edit` | Write access to quotes |
| `kb_order_show` | Read access to orders |
| `kb_order_edit` | Write access to orders |
| `kb_delivery_show` | Read access to deliveries |
| `kb_delivery_edit` | Write access to deliveries |
| `monitoring_show` | Read access to timesheets |
| `monitoring_edit` | Write access to timesheets |
| `note_show` | Read access to contact notes |
| `note_edit` | Write access to contact notes |
| `kb_article_order_show` | Read access to purchase orders |
| `kb_article_order_edit` | Write access to purchase orders |
| `project_show` | Read access to projects |
| `project_edit` | Write access to projects |
| `stock_edit` | Write access to item stock |
| `task_show` | Read access to tasks |
| `task_edit` | Write access to tasks |
| `kb_bill_show` | Read access to supplier bills |
| `kb_expense_show` | Read access to Purchase Expenses |
| `payroll_employee_show` | Read access to Payroll employees |
| `payroll_employee_edit` | Write access to Payroll employees |
| `payroll_absence_show` | Read access to Payroll absences |
| `payroll_absence_edit` | Write access to Payroll absences |
| `payroll_paystub_show` | Read access to Payroll paystubs |

OpenID Connect Scopes
---------------------

In addition to scopes controlling API access, the following OpenID Connect Scopes can be used to configure the token response:

| Scope | Description |
| --- | --- |
| `company_profile` | Adds company specific claims to the id token like `company_id` and `company_name` describing the company the user is signed in to. |
| `email` | Adds claims containing email address of the signed in user. |
| `offline_access` | Ensures that tokens can be refreshed also after the current user session has been closed. |
| `openid` | Standard OpenID Connect (OIDC) scope. Required to indicate that the application intends to use OIDC to verify the user's identity. If requested, an ID token is provided within the token response. |
| `profile` | Adds user specific claims to the id token like `given_name`, `family_name`, `locale` and `gender`. |

Authorization Code Flow
-----------------------

bexio supports the "Authorization Code Grant" as defined in OAuth 2.0 RFC 6749, section 4.1 to obtain an Access Token. Your app must be server-side because during this exchange, you must also pass along your application's Client Secret, which must always be kept secure, and you will have to store it in your client.

### Scopes and user access rights

While connecting via the API there are 2 levels of authorization. One level is the scopes granted to the application using the API. The scopes are granted by the user who sets up the connection to the application. The other level is based on user rights, this is done in the configuration of the user within the bexio UI. The API access happens with the user rights of the user who set up the connection to the application.

Meaning that a user which doesn’t have access to the contact will not have access to the contact via an API connection if the app is given the scope to access contact. A user with access to contacts in the bexio UI will not have access to the contacts if the application doesn’t have the correct scopes granted.

| User access \\ API client scopes | Client has required scope | Client does not have required scope |
| --- | :-: | :-: |
| **User has required permission** | ✅ API access granted | ❌ API access denied |
| **User does not have required permission** | ❌ API access denied | ❌ API access denied |

### How it works

1. The user clicks Login within the regular web application.
2. The web application redirects the user to the `/authorize` endpoint of the bexio OpenID Connect service.
3. The bexio OpenID Connect Service displays the login page.
4. The user authenticates and sees a consent page listing the permissions bexio will give to the web application.
5. The user is redirected back to the web application with an Authorization Code.
6. The web application sends this code to the bexio OpenID Connect service (`/token` endpoint) along with the application's Client ID and Client Secret.
7. bexio verifies the code, Client ID, and Client Secret.
8. An ID Token and Access Token (and optionally, a Refresh Token) is returned to the web application.
9. The web application uses the Access Token to call the bexio API.
10. The bexio API responds with requested data.

### Code example (PHP)

> The following example showcases the usage of OpenID Connect (PHP example uses the OpenID-Connect-PHP library). The library uses OpenID Connect Discovery to automatically configure the application.

```php
setRedirectURL("https://www.example.com/oidc_callback");
$oidc->addScope(array("openid", "profile", "contact_show", "offline_access"));
$oidc->authenticate();

echo $oidc->getAccessToken();
```

> The consent screen shown to the user will look like this:

Refresh Token Flow
------------------

The scope `offline_access` is required to obtain a refresh token to keep the api connection alive.

1. POST a request to the endpoint “/token”. Make sure you use the grant type “refresh\_token”. This is implemented according to the standards of OAuth 2.0 RFC 6749
2. The response contains a new access token. Please note that the requested scopes do not change when refreshing a token. Acquiring new scopes is only possible by going through the initial authorization process again.
3. The new access token can be used to authorize requests and execute API requests
4. The bexio API responds with the requested data.

Redirect URL(s)
---------------

> Redirect URLs are a critical part of the OAuth flow. After a user successfully authorizes an application, the authorization server will redirect the user back to the application with either an authorization code or access token in the URL. Because the redirect URL will contain sensitive information, it is critical that the service doesn’t redirect the user to arbitrary locations.
>
> The best way to ensure the user will only be directed to appropriate locations is to require the developer to register one or more redirect URLs when they create the application.
>
> Source

The new bexio API platform requires to define redirect URLs during the app registration in the developer portal. Unknown URLs will not be accepted during the Authorization and the user will receive an error message.

Up to 10 different redirect URLs can be defined for an app, e.g. to support multiple test environments and mobile apps with custom schemes

Please make sure to always use a separate set of Client ID and Client Secret for production environments. You can do this by creating an additional app in the bexio developer portal.

Personal Access Tokens (PAT)
----------------------------

Personal Access Tokens (PAT) can be managed on  and are convenient way to issue API access tokens for _personal use_:

* A PAT has all default scopes granted and therefore has full access to your company's data.
* A PAT is valid for six months after creation.
* A PAT can be revoked by deleting it on developer.bexio.com. After deletion, a PAT can no longer be used to access the API. In the worst case, it might take up to 1 hour until the revocation takes full effect. Subsystems might still be accessible by the token during this period.

If you have other requirements, like restricting the scope granted to a token, please use the Authorization Code Flow instead.

To use a PAT to authorise a request, it can be used as a bearer token in the `Authorization` header of a request:

```
Authorization: Bearer eyJraWQiOiI2ZGM2YmJlOC1iMjZjLTExZTgtOGUwZC0w...
```

PAT are strictly intended for personal use and should never be shared with anyone else. If you have a use case that requires the sharing of access tokens with another party, you must use the Authorization Code Flow instead.

API basics
----------

API routes
----------

Each API endpoint is available on our API host `https://api.bexio.com`.

> Endpoints are usually defined with a relative path, as seen in the following example:

Each relative path must be combined with the API platform URL. For the example this would result in the endpoint `https://api.bexio.com/2.0/contact`

HTTP Verbs
----------

Where possible, bexio tries to use the appropriate HTTP verb for its operations

| Verb | Description |
| --- | --- |
| `GET` | Used for retrieving resources |
| `POST` | Used for creating resources |
| `PATCH` | Used for updating resources with partial data |
| `PUT` | Used for updating resources with full data |
| `DELETE` | Used for deleting resources. Please note that delete actions permanently delete resources. It cannot be undone. |

HTTP Headers
------------

HTTP headers let the client and the server pass additional information with an HTTP request or response. An HTTP header consists of its case-insensitive name followed by a colon (:), then by its value.

### Request Headers

The following headers must be used for every request:

* `Accept: application/json`
* `Authorization: Bearer `

Additionally, the header `Content-Length: ` must be specified for requests with a payload.

The `Accept-Language: xx` can be used to specify the language you would like to have some translated elements returned to you. The `xx` has to be replaced by the ISO 639-1 code of the language. This is for example useful to have the tax codes in the user’s language.

### Response Headers

The API will always indicate the return type with a `Content-Type` header. Normally the header value is set to `application/json`, but can vary (e.g. for PDF exports).

Response Codes Actions and errors yield different HTTP response codes. Please have a look at the expected response codes in the following list:

| Code | Description |
| --- | --- |
| 200 | Request OK |
| 201 | New resource created |
| 304 | The resource has not been changed |
| 400 | The request parameters are invalid |
| 401 | The bearer token or the provided api key is invalid |
| 403 | You do not possess the required rights to access this resource |
| 404 | The resource could not be found / is unknown |
| 411 | Length Required |
| 415 | The data could not be processed or the accept header is invalid |
| 422 | Could not save the entity |
| 429 | Too many requests |
| 500 | An unexpected condition was encountered |
| 503 | The server is not available (maintenance work) |

Errors
------

> Error responses contain an HTTP status code and a JSON response body that is structured as follows:

```javascript
{
"error_code": 404,
"message": "Page not found"
}
```

Search
------

Some older endpoints implement search methods. Searching for these endpoint works by sending a POST request to the resource (e.g.: POST `/contact/search` or POST `/country/search`). The search parameters must be provided in the body of the POST request.

Please have a look at the resource documentation to see a list of available search parameters.

### Criterias

You can use different criterias for the search. The criteria “like” will be used by default if you do not define a criteria.

| Criteria | Description |
| --- | --- |
| `=` | Exact match |
| `equal` | Exact match (synonyme for =) |
| `!=` | Not equal |
| `not_equal` | Not equal (synonyme for !=) |
| `>` | Greather than |
| `greater_than` | Greather than (synonyme for >) |
| `=` | Greater or equal then |
| `greater_equal` | Greater or equal then (synonyme for >=) |
| ` Define the search array

```php
$data = array(
array(
'field' => 'name_1',
'value' => 'Meyer',
'criteria' => '=',
),
array(
'field' => 'nr',
'value' => 10,
'criteria' => '>',
),
);
```

> Transform the array to JSON

```php
json_encode($data);
```

> POST-Body for the search

```javascript
[
{
"field" : "name_1",
"value" : "Meyer",
"criteria" : "="
},
{
"field" : "nr",
"value" : 10,
"criteria" : ">"
}
]
```

Rate Limiting
-------------

The bexio API enforces a rate limit that limits the number of requests a company can make per minute.

If this limit is reached, the API will return a 429 status code to the client.

### HTTP Headers

The table below describes the relevant headers regarding the API rate-limit.

| Header | Description |
| --- | --- |
| RateLimit-Limit | The current limit for this time period. |
| RateLimit-Remaining | The remaining amount of requests allowed for this time period. |
| RateLimit-Reset | The remaining time until the next time period starts (seconds). |

FAQ
---

### Is an OpenAPI (Swagger) definition available?

No, we currently do not provide an OpenAPI definition but we have plans to put it online.

### Why is “insert business process here” not available as an API endpoint?

We are continously working on a product that makes our customers more successful. Unfortunately we are not able to support every use case via API yet.

### Are Credit Notes available?

No, currently Credit Notes are not available but we have plans to put it online.

### How many decimals are allowed in a price or quantity field

6 is the maximum amount of decimals you can put after the `.` in a price or amount field.

Contacts
--------

Fetch a list of contacts
------------------------

This action fetches a list of all contacts

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "nr" "name_1" "updated_at" Example: order_by=name_1 Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |
| show_archived | boolean Default: false Example: show_archived=true Show archived elements only |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/contact

Live Server

<https://api.bexio.com/2.0/contact>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/contact> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "nr": null,

*   "contact_type_id": 1,

*   "name_1": "Example Company",

*   "name_2": null,

*   "salutation_id": 2,

*   "salutation_form": null,

*   "title_id": null,

*   "birthday": null,

*   "address": "Smith Street 22",

*   "street_name": "Smith Street",

*   "house_number": "77",

*   "address_addition": "Building C",

*   "postcode": "8004",

*   "city": "Zurich",

*   "country_id": 1,

*   "mail": "[email protected]",

*   "mail_second": "",

*   "phone_fixed": "",

*   "phone_fixed_second": "",

*   "phone_mobile": "",

*   "fax": "",

*   "url": "",

*   "skype_name": "",

*   "remarks": "",

*   "language_id": null,

*   "is_lead": false,

*   "contact_group_ids": "1,2",

*   "contact_branch_ids": null,

*   "user_id": 1,

*   "owner_id": 1,

*   "updated_at": "2019-04-08 13:17:32"

}

]
```

Create contact
--------------

This action creates a new contact

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| nr | string or null If set to null, the number will be assigned automatically. Must be a number, can also be used as integer |
| contact_type_id required | integer Please use the value 1 for companies or 2 for persons |
| name_1 required | string This field is used as the company name if the field contact_type_id is set to 1. Otherwise, the field is used as the last name of the person |
| name_2 | string or null This field is used as the company addition if the field contact_type_id is set to 1. Otherwise, the field is used as the first name of the person |
| salutation_id | integer or null References a salutation object |
| salutation_form | integer or null |
| title_id | integer or null References a title object |
| birthday | string or null  |
| street_name | string or null Is required if house_number or address_addition are not NULL |
| house_number | string or null Requires street_name if the value is not NULL |
| address_addition | string or null Requires street_name if the value is not NULL |
| postcode | string or null |
| city | string or null |
| country_id | integer or null References a country object |
| mail | string or null  |
| mail_second | string or null  |
| phone_fixed | string or null |
| phone_fixed_second | string or null |
| phone_mobile | string or null |
| fax | string or null |
| url | string or null |
| skype_name | string or null |
| remarks | string or null |
| language_id | integer or null References a language object |
| contact_group_ids | string or null References one ore multiple contact group objects |
| contact_branch_ids | string or null References one ore multiple contact sector objects |
| user_id required | integer References a user object |
| owner_id required | integer |

### Responses

**201**

Created

**422**

Validation error

post/2.0/contact

Live Server

<https://api.bexio.com/2.0/contact>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "nr": null,

*   "contact_type_id": 1,

*   "name_1": "Example Company",

*   "name_2": null,

*   "salutation_id": 2,

*   "salutation_form": null,

*   "title_id": null,

*   "birthday": null,

*   "street_name": "Smith Street",

*   "house_number": "77",

*   "address_addition": "Building C",

*   "postcode": "8004",

*   "city": "Zurich",

*   "country_id": 1,

*   "mail": "[email protected]",

*   "mail_second": "",

*   "phone_fixed": "",

*   "phone_fixed_second": "",

*   "phone_mobile": "",

*   "fax": "",

*   "url": "",

*   "skype_name": "",

*   "remarks": "",

*   "language_id": null,

*   "contact_group_ids": "1,2",

*   "contact_branch_ids": null,

*   "user_id": 1,

*   "owner_id": 1

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "nr": null,

*   "contact_type_id": 1,

*   "name_1": "Example Company",

*   "name_2": null,

*   "salutation_id": 2,

*   "salutation_form": null,

*   "title_id": null,

*   "birthday": null,

*   "address": "Smith Street 22",

*   "street_name": "Smith Street",

*   "house_number": "77",

*   "address_addition": "Building C",

*   "postcode": "8004",

*   "city": "Zurich",

*   "country_id": 1,

*   "mail": "[email protected]",

*   "mail_second": "",

*   "phone_fixed": "",

*   "phone_fixed_second": "",

*   "phone_mobile": "",

*   "fax": "",

*   "url": "",

*   "skype_name": "",

*   "remarks": "",

*   "language_id": null,

*   "is_lead": false,

*   "contact_group_ids": "1,2",

*   "contact_branch_ids": null,

*   "user_id": 1,

*   "owner_id": 1,

*   "updated_at": "2019-04-08 13:17:32",

*   "profile_image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

Search contacts
---------------

Search contacts via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `id`
* `name_1`
* `name_2`
* `nr`
* `address`
* `mail`
* `mail_second`
* `postcode`
* `city`
* `country_id`
* `contact_group_ids`
* `contact_type_id`
* `updated_at`
* `user_id`
* `phone_fixed`
* `phone_mobile`
* `fax`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "nr" "name_1" "updated_at" Example: order_by=name_1 Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |
| show_archived | boolean Default: false Example: show_archived=true Show archived elements only |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 4,

*   "nr": null,

*   "contact_type_id": 1,

*   "name_1": "Example Company",

*   "name_2": null,

*   "salutation_id": 2,

*   "salutation_form": null,

*   "title_id": null,

*   "birthday": null,

*   "address": "Smith Street 22",

*   "street_name": "Smith Street",

*   "house_number": "77",

*   "address_addition": "Building C",

*   "postcode": "8004",

*   "city": "Zurich",

*   "country_id": 1,

*   "mail": "[email protected]",

*   "mail_second": "",

*   "phone_fixed": "",

*   "phone_fixed_second": "",

*   "phone_mobile": "",

*   "fax": "",

*   "url": "",

*   "skype_name": "",

*   "remarks": "",

*   "language_id": null,

*   "is_lead": false,

*   "contact_group_ids": "1,2",

*   "contact_branch_ids": null,

*   "user_id": 1,

*   "owner_id": 1,

*   "updated_at": "2019-04-08 13:17:32"

}

]
```

Fetch a contact
---------------

This action fetches a single contact

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_id required | integer  Example: 1 the id of the contact |

##### query Parameters

| Name | Details |
| --- | --- |
| show_archived | boolean Default: false Example: show_archived=true Show archived elements only |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/contact/{contact\_id}

Live Server

<https://api.bexio.com/2.0/contact/{contact_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/contact/{contact_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "nr": null,

*   "contact_type_id": 1,

*   "name_1": "Example Company",

*   "name_2": null,

*   "salutation_id": 2,

*   "salutation_form": null,

*   "title_id": null,

*   "birthday": null,

*   "address": "Smith Street 22",

*   "street_name": "Smith Street",

*   "house_number": "77",

*   "address_addition": "Building C",

*   "postcode": "8004",

*   "city": "Zurich",

*   "country_id": 1,

*   "mail": "[email protected]",

*   "mail_second": "",

*   "phone_fixed": "",

*   "phone_fixed_second": "",

*   "phone_mobile": "",

*   "fax": "",

*   "url": "",

*   "skype_name": "",

*   "remarks": "",

*   "language_id": null,

*   "is_lead": false,

*   "contact_group_ids": "1,2",

*   "contact_branch_ids": null,

*   "user_id": 1,

*   "owner_id": 1,

*   "updated_at": "2019-04-08 13:17:32",

*   "profile_image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

Edit a contact
--------------

This action edits a single contact

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_id required | integer  Example: 1 the id of the contact |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| nr | string or null If set to null, the number will be assigned automatically. Must be a number, can also be used as integer |
| contact_type_id required | integer Please use the value 1 for companies or 2 for persons |
| name_1 required | string This field is used as the company name if the field contact_type_id is set to 1. Otherwise, the field is used as the last name of the person |
| name_2 | string or null This field is used as the company addition if the field contact_type_id is set to 1. Otherwise, the field is used as the first name of the person |
| salutation_id | integer or null References a salutation object |
| salutation_form | integer or null |
| title_id | integer or null References a title object |
| birthday | string or null  |
| street_name | string or null Is required if house_number or address_addition are not NULL |
| house_number | string or null Requires street_name if the value is not NULL |
| address_addition | string or null Requires street_name if the value is not NULL |
| postcode | string or null |
| city | string or null |
| country_id | integer or null References a country object |
| mail | string or null  |
| mail_second | string or null  |
| phone_fixed | string or null |
| phone_fixed_second | string or null |
| phone_mobile | string or null |
| fax | string or null |
| url | string or null |
| skype_name | string or null |
| remarks | string or null |
| language_id | integer or null References a language object |
| contact_group_ids | string or null References one ore multiple contact group objects |
| contact_branch_ids | string or null References one ore multiple contact sector objects |
| user_id required | integer References a user object |
| owner_id required | integer |

### Responses

**200**

OK

**422**

Validation error

post/2.0/contact/{contact\_id}

Live Server

<https://api.bexio.com/2.0/contact/{contact_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "nr": null,

*   "contact_type_id": 1,

*   "name_1": "Example Company",

*   "name_2": null,

*   "salutation_id": 2,

*   "salutation_form": null,

*   "title_id": null,

*   "birthday": null,

*   "street_name": "Smith Street",

*   "house_number": "77",

*   "address_addition": "Building C",

*   "postcode": "8004",

*   "city": "Zurich",

*   "country_id": 1,

*   "mail": "[email protected]",

*   "mail_second": "",

*   "phone_fixed": "",

*   "phone_fixed_second": "",

*   "phone_mobile": "",

*   "fax": "",

*   "url": "",

*   "skype_name": "",

*   "remarks": "",

*   "language_id": null,

*   "contact_group_ids": "1,2",

*   "contact_branch_ids": null,

*   "user_id": 1,

*   "owner_id": 1

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "nr": null,

*   "contact_type_id": 1,

*   "name_1": "Example Company",

*   "name_2": null,

*   "salutation_id": 2,

*   "salutation_form": null,

*   "title_id": null,

*   "birthday": null,

*   "address": "Smith Street 22",

*   "street_name": "Smith Street",

*   "house_number": "77",

*   "address_addition": "Building C",

*   "postcode": "8004",

*   "city": "Zurich",

*   "country_id": 1,

*   "mail": "[email protected]",

*   "mail_second": "",

*   "phone_fixed": "",

*   "phone_fixed_second": "",

*   "phone_mobile": "",

*   "fax": "",

*   "url": "",

*   "skype_name": "",

*   "remarks": "",

*   "language_id": null,

*   "is_lead": false,

*   "contact_group_ids": "1,2",

*   "contact_branch_ids": null,

*   "user_id": 1,

*   "owner_id": 1,

*   "updated_at": "2019-04-08 13:17:32",

*   "profile_image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

Delete a contact
----------------

This action deletes a contact. Please note that a contact is marked as deleted and can still be accessed by using the "show deleted contacts" filter.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_id required | integer  Example: 1 the id of the contact |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/contact/{contact\_id}

Live Server

<https://api.bexio.com/2.0/contact/{contact_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/contact/{contact_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Bulk create contacts
--------------------

This action creates multiple contacts in one request

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

Array

| Name | Details |
| --- | --- |
| nr | string or null If set to null, the number will be assigned automatically. Must be a number, can also be used as integer |
| contact_type_id required | integer Please use the value 1 for companies or 2 for persons |
| name_1 required | string This field is used as the company name if the field contact_type_id is set to 1. Otherwise, the field is used as the last name of the person |
| name_2 | string or null This field is used as the company addition if the field contact_type_id is set to 1. Otherwise, the field is used as the first name of the person |
| salutation_id | integer or null References a salutation object |
| salutation_form | integer or null |
| title_id | integer or null References a title object |
| birthday | string or null  |
| street_name | string or null Is required if house_number or address_addition are not NULL |
| house_number | string or null Requires street_name if the value is not NULL |
| address_addition | string or null Requires street_name if the value is not NULL |
| postcode | string or null |
| city | string or null |
| country_id | integer or null References a country object |
| mail | string or null  |
| mail_second | string or null  |
| phone_fixed | string or null |
| phone_fixed_second | string or null |
| phone_mobile | string or null |
| fax | string or null |
| url | string or null |
| skype_name | string or null |
| remarks | string or null |
| language_id | integer or null References a language object |
| contact_group_ids | string or null References one ore multiple contact group objects |
| contact_branch_ids | string or null References one ore multiple contact sector objects |
| user_id required | integer References a user object |
| owner_id required | integer |

### Responses

**200**

OK

**422**

Validation error

post/2.0/contact/\_bulk\_create

Live Server

<https://api.bexio.com/2.0/contact/_bulk_create>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "nr": null,

*   "contact_type_id": 1,

*   "name_1": "Example Company",

*   "name_2": null,

*   "salutation_id": 2,

*   "salutation_form": null,

*   "title_id": null,

*   "birthday": null,

*   "street_name": "Smith Street",

*   "house_number": "77",

*   "address_addition": "Building C",

*   "postcode": "8004",

*   "city": "Zurich",

*   "country_id": 1,

*   "mail": "[email protected]",

*   "mail_second": "",

*   "phone_fixed": "",

*   "phone_fixed_second": "",

*   "phone_mobile": "",

*   "fax": "",

*   "url": "",

*   "skype_name": "",

*   "remarks": "",

*   "language_id": null,

*   "contact_group_ids": "1,2",

*   "contact_branch_ids": null,

*   "user_id": 1,

*   "owner_id": 1

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 4,

*   "nr": null,

*   "contact_type_id": 1,

*   "name_1": "Example Company",

*   "name_2": null,

*   "salutation_id": 2,

*   "salutation_form": null,

*   "title_id": null,

*   "birthday": null,

*   "address": "Smith Street 22",

*   "street_name": "Smith Street",

*   "house_number": "77",

*   "address_addition": "Building C",

*   "postcode": "8004",

*   "city": "Zurich",

*   "country_id": 1,

*   "mail": "[email protected]",

*   "mail_second": "",

*   "phone_fixed": "",

*   "phone_fixed_second": "",

*   "phone_mobile": "",

*   "fax": "",

*   "url": "",

*   "skype_name": "",

*   "remarks": "",

*   "language_id": null,

*   "is_lead": false,

*   "contact_group_ids": "1,2",

*   "contact_branch_ids": null,

*   "user_id": 1,

*   "owner_id": 1,

*   "updated_at": "2019-04-08 13:17:32"

}

]
```

Restore a contact
-----------------

This action restores an archived contact.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_id required | integer  Example: 1 the id of the contact |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

patch/2.0/contact/{contact\_id}/restore

Live Server

<https://api.bexio.com/2.0/contact/{contact_id}/restore>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X PATCH \\
<https://api.bexio.com/2.0/contact/{contact_id}/restore> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Contact Relations
-----------------

Fetch a list of contact relations
---------------------------------

This action fetches a list of all contact relations

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "contact_id" "contact_sub_id" "updated_at" Example: order_by=contact_id Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/contact\_relation

Live Server

<https://api.bexio.com/2.0/contact_relation>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/contact_relation> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "contact_id": 2,

*   "contact_sub_id": 3,

*   "description": "",

*   "updated_at": "2019-04-08 13:17:32"

}

]
```

Create contact relation
-----------------------

This action creates a new contact relation

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| contact_id required | integer or null References a contact object |
| contact_sub_id required | integer or null References a contact object |
| description | string or null |

### Responses

**201**

Created

**422**

Validation error

post/2.0/contact\_relation

Live Server

<https://api.bexio.com/2.0/contact_relation>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "contact_id": 2,

*   "contact_sub_id": 3,

*   "description": ""

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "nr": null,

*   "contact_type_id": 1,

*   "name_1": "Example Company",

*   "name_2": null,

*   "salutation_id": 2,

*   "salutation_form": null,

*   "title_id": null,

*   "birthday": null,

*   "address": "Smith Street 22",

*   "street_name": "Smith Street",

*   "house_number": "77",

*   "address_addition": "Building C",

*   "postcode": "8004",

*   "city": "Zurich",

*   "country_id": 1,

*   "mail": "[email protected]",

*   "mail_second": "",

*   "phone_fixed": "",

*   "phone_fixed_second": "",

*   "phone_mobile": "",

*   "fax": "",

*   "url": "",

*   "skype_name": "",

*   "remarks": "",

*   "language_id": null,

*   "is_lead": false,

*   "contact_group_ids": "1,2",

*   "contact_branch_ids": null,

*   "user_id": 1,

*   "owner_id": 1,

*   "updated_at": "2019-04-08 13:17:32",

*   "profile_image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

Search contact relations
------------------------

Search contact relations via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `contact_id`
* `contact_sub_id`
* `updated_at`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "contact_id" "contact_sub_id" "updated_at" Example: order_by=contact_id Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "contact_id": 2,

*   "contact_sub_id": 3,

*   "description": "",

*   "updated_at": "2019-04-08 13:17:32"

}

]
```

Fetch a contact relation
------------------------

This action fetches a single contact relation

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_relation_id required | integer  Example: 1 the id of the contact relation |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/contact\_relation/{contact\_relation\_id}

Live Server

<https://api.bexio.com/2.0/contact_relation/{contact_relation_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/contact_relation/{contact_relation_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "contact_id": 2,

*   "contact_sub_id": 3,

*   "description": "",

*   "updated_at": "2019-04-08 13:17:32"

}
```

Edit a contact relation
-----------------------

This action edits a single contact relation

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_relation_id required | integer  Example: 1 the id of the contact relation |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| contact_id required | integer or null References a contact object |
| contact_sub_id required | integer or null References a contact object |
| description | string or null |

### Responses

**200**

OK

**422**

Validation error

post/2.0/contact\_relation/{contact\_relation\_id}

Live Server

<https://api.bexio.com/2.0/contact_relation/{contact_relation_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "contact_id": 2,

*   "contact_sub_id": 3,

*   "description": ""

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "contact_id": 2,

*   "contact_sub_id": 3,

*   "description": "",

*   "updated_at": "2019-04-08 13:17:32"

}
```

Delete a contact relation
-------------------------

This action permanently deletes a contact relation. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_relation_id required | integer  Example: 1 the id of the contact relation |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/contact\_relation/{contact\_relation\_id}

Live Server

<https://api.bexio.com/2.0/contact_relation/{contact_relation_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/contact_relation/{contact_relation_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Contact Groups
--------------

Fetch a list of contact groups
------------------------------

This action fetches a list of all contact groups

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/contact\_group

Live Server

<https://api.bexio.com/2.0/contact_group>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/contact_group> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Suppliers"

}

]
```

Create contact group
--------------------

This action creates a new contact group

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| name required | string |

### Responses

**201**

Created

**422**

Validation error

post/2.0/contact\_group

Live Server

<https://api.bexio.com/2.0/contact_group>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Suppliers"

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "Suppliers"

}
```

Search contact groups
---------------------

Search contact groups via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Suppliers"

}

]
```

Fetch a contact group
---------------------

This action fetches a single contact group

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_group_id required | integer  Example: 1 the id of the contact group |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/contact\_group/{contact\_group\_id}

Live Server

<https://api.bexio.com/2.0/contact_group/{contact_group_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/contact_group/{contact_group_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "name": "Suppliers"

}
```

Edit a contact group
--------------------

This action edits a single contact group

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_group_id required | integer  Example: 1 the id of the contact group |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| name required | string |

### Responses

**200**

OK

**422**

Validation error

post/2.0/contact\_group/{contact\_group\_id}

Live Server

<https://api.bexio.com/2.0/contact_group/{contact_group_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Suppliers"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "Suppliers"

}
```

Delete a contact group
----------------------

This action permanently deletes a contact group. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_group_id required | integer  Example: 1 the id of the contact group |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/contact\_group/{contact\_group\_id}

Live Server

<https://api.bexio.com/2.0/contact_group/{contact_group_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/contact_group/{contact_group_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Contact Sectors
---------------

Fetch a list of contact sectors
-------------------------------

This action fetches a list of all contact sectors

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/contact\_branch

Live Server

<https://api.bexio.com/2.0/contact_branch>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/contact_branch> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Photography"

}

]
```

Search contact sectors
----------------------

Search contact sectors via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Photography"

}

]
```

Additional Addresses
--------------------

Fetch a list of additional addresses
------------------------------------

This action fetches a list of all additional addresses for a given contact

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_id required | integer  Example: 1 the id of the contact |

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" "postcode" "country_id" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/contact/{contact\_id}/additional\_address

Live Server

<https://api.bexio.com/2.0/contact/{contact_id}/additional_address>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/contact/{contact_id}/additional_address> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "My new address",

*   "name_addition": "Name addition",

*   "address": "Walter Street 22",

*   "street_name": "Walter Street",

*   "house_number": "22",

*   "address_addition": "Building C",

*   "postcode": "9000",

*   "city": "St. Gallen",

*   "country_id": 1,

*   "subject": "Additional address",

*   "description": "This is an internal description"

}

]
```

Create additional address
-------------------------

This action creates a new additional address

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_id required | integer  Example: 1 the id of the contact |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| name | string |
| name_addition | string or null |
| street_name | string or null Is required if house_number or address_addition are not NULL |
| house_number | string or null Requires street_name if the value is not NULL |
| address_addition | string or null Requires street_name if the value is not NULL |
| postcode | string or null |
| city | string or null |
| country_id | integer or null References a country object |
| subject | string |
| description | string |

### Responses

**201**

Created

**422**

Validation error

post/2.0/contact/{contact\_id}/additional\_address

Live Server

<https://api.bexio.com/2.0/contact/{contact_id}/additional_address>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "My new address",

*   "name_addition": "Name addition",

*   "street_name": "Walter Street",

*   "house_number": "22",

*   "address_addition": "Building C",

*   "postcode": "9000",

*   "city": "St. Gallen",

*   "country_id": 1,

*   "subject": "Additional address",

*   "description": "This is an internal description"

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "My new address",

*   "name_addition": "Name addition",

*   "address": "Walter Street 22",

*   "street_name": "Walter Street",

*   "house_number": "22",

*   "address_addition": "Building C",

*   "postcode": "9000",

*   "city": "St. Gallen",

*   "country_id": 1,

*   "subject": "Additional address",

*   "description": "This is an internal description"

}
```

Search additional addresses
---------------------------

Search additional addresses via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`
* `address`
* `postcode`
* `city`
* `country_id`
* `subject`
* `email`

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_id required | integer  Example: 1 the id of the contact |

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" "postcode" "country_id" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "My new address",

*   "name_addition": "Name addition",

*   "address": "Walter Street 22",

*   "street_name": "Walter Street",

*   "house_number": "22",

*   "address_addition": "Building C",

*   "postcode": "9000",

*   "city": "St. Gallen",

*   "country_id": 1,

*   "subject": "Additional address",

*   "description": "This is an internal description"

}

]
```

Fetch an additional address
---------------------------

This action fetches an additional address for a given contact

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_id required | integer  Example: 1 the id of the contact |
| additional_address_id required | integer  Example: 1 the id of the additional address |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/contact/{contact\_id}/additional\_address/{additional\_address\_id}

Live Server

<https://api.bexio.com/2.0/contact/{contact_id}/additional_address/{additional_address_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/contact/{contact_id}/additional_address/{additional_address_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "name": "My new address",

*   "name_addition": "Name addition",

*   "address": "Walter Street 22",

*   "street_name": "Walter Street",

*   "house_number": "22",

*   "address_addition": "Building C",

*   "postcode": "9000",

*   "city": "St. Gallen",

*   "country_id": 1,

*   "subject": "Additional address",

*   "description": "This is an internal description"

}
```

Edit an additional address
--------------------------

This action edits an additional address

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_id required | integer  Example: 1 the id of the contact |
| additional_address_id required | integer  Example: 1 the id of the additional address |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| name | string |
| name_addition | string or null |
| street_name | string or null Is required if house_number or address_addition are not NULL |
| house_number | string or null Requires street_name if the value is not NULL |
| address_addition | string or null Requires street_name if the value is not NULL |
| postcode | string or null |
| city | string or null |
| country_id | integer or null References a country object |
| subject | string |
| description | string |

### Responses

**200**

OK

**422**

Validation error

post/2.0/contact/{contact\_id}/additional\_address/{additional\_address\_id}

Live Server

<https://api.bexio.com/2.0/contact/{contact_id}/additional_address/{additional_address_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "My new address",

*   "name_addition": "Name addition",

*   "street_name": "Walter Street",

*   "house_number": "22",

*   "address_addition": "Building C",

*   "postcode": "9000",

*   "city": "St. Gallen",

*   "country_id": 1,

*   "subject": "Additional address",

*   "description": "This is an internal description"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "My new address",

*   "name_addition": "Name addition",

*   "address": "Walter Street 22",

*   "street_name": "Walter Street",

*   "house_number": "22",

*   "address_addition": "Building C",

*   "postcode": "9000",

*   "city": "St. Gallen",

*   "country_id": 1,

*   "subject": "Additional address",

*   "description": "This is an internal description"

}
```

Delete an additional address
----------------------------

This action permanently deletes an additional address. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| contact_id required | integer  Example: 1 the id of the contact |
| additional_address_id required | integer  Example: 1 the id of the additional address |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/contact/{contact\_id}/additional\_address/{additional\_address\_id}

Live Server

<https://api.bexio.com/2.0/contact/{contact_id}/additional_address/{additional_address_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/contact/{contact_id}/additional_address/{additional_address_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Salutations
-----------

Fetch a list of salutations
---------------------------

This action fetches a list of all salutations

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/salutation

Live Server

<https://api.bexio.com/2.0/salutation>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/salutation> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Herr"

}

]
```

Create salutation
-----------------

This action creates a new salutation

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| name required | string |

### Responses

**201**

Created

**422**

Validation error

post/2.0/salutation

Live Server

<https://api.bexio.com/2.0/salutation>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Herr"

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "Herr"

}
```

Search salutations
------------------

Search salutations via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Herr"

}

]
```

Fetch a salutation
------------------

This action fetches a single salutation

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| salutation_id required | integer  Example: 1 the id of the salutation |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/salutation/{salutation\_id}

Live Server

<https://api.bexio.com/2.0/salutation/{salutation_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/salutation/{salutation_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "name": "Herr"

}
```

Edit a salutation
-----------------

This action edits a single salutation

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| salutation_id required | integer  Example: 1 the id of the salutation |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| name required | string |

### Responses

**200**

OK

**422**

Validation error

post/2.0/salutation/{salutation\_id}

Live Server

<https://api.bexio.com/2.0/salutation/{salutation_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Herr"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "Herr"

}
```

Delete a salutation
-------------------

This action permanently deletes a salutation. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| salutation_id required | integer  Example: 1 the id of the salutation |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/salutation/{salutation\_id}

Live Server

<https://api.bexio.com/2.0/salutation/{salutation_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/salutation/{salutation_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Titles
------

Fetch a list of titles
----------------------

This action fetches a list of all titles

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/title

Live Server

<https://api.bexio.com/2.0/title>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/title> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Dr."

}

]
```

Create title
------------

This action creates a new title

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| name required | string |

### Responses

**201**

Created

**422**

Validation error

post/2.0/title

Live Server

<https://api.bexio.com/2.0/title>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Dr."

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "Dr."

}
```

Search titles
-------------

Search titles via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Dr."

}

]
```

Fetch a title
-------------

This action fetches a single title

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| title_id required | integer  Example: 1 the id of the title |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/title/{title\_id}

Live Server

<https://api.bexio.com/2.0/title/{title_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/title/{title_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "name": "Dr."

}
```

Edit a title
------------

This action edits a single title

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| title_id required | integer  Example: 1 the id of the title |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| name required | string |

### Responses

**200**

OK

**422**

Validation error

post/2.0/title/{title\_id}

Live Server

<https://api.bexio.com/2.0/title/{title_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Dr."

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "Dr."

}
```

Delete a title
--------------

This action permanently deletes a title. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| title_id required | integer  Example: 1 the id of the title |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/title/{title\_id}

Live Server

<https://api.bexio.com/2.0/title/{title_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/title/{title_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Quotes
------

Fetch a list of quotes
----------------------

This action fetches a list of all quotes

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "total" "total_net" "total_gross" "updated_at" Example: order_by=total Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_offer

Live Server

<https://api.bexio.com/2.0/kb_offer>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_offer> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "document_nr": "AN-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_until": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "kb_terms_of_payment_template_id": null,

*   "show_total": true,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": ""

}

]
```

Create quote
------------

This action creates a new quote

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| document_nr | string Can not be used if “automatic numbering” is activated in frontend-settings. required if “automatic numbering” deactivated. https://help.bexio.com/s/article/000001784 |
| title | string or null |
| contact_id | integer or null References a contact object |
| contact_sub_id | integer or null References a contact object |
| user_id | integer References a user object |
| pr_project_id | integer or null References a project object |
| logopaper_id | integer Deprecated |
| language_id | integer References a language object |
| bank_account_id | integer References a bank account object |
| currency_id | integer References a currency object |
| payment_type_id | integer References a payment type object |
| header | string |
| footer | string |
| 0 | including taxes |
| 1 | excluding taxes |
| 2 | exempt from taxes |
- **mwst_is_net** (boolean)
This value affects the total if the field `mwst_type` has been set to 0.
`false` = Taxes are included in the total
`true` = Taxes will be added to the total
- **show_position_taxes** (boolean)
- **is_valid_from** (string <date>)
- **is_valid_until** (string <date>)
- **contact_address_manual** (string or null)
This field can be used to set a contact address manually. If not in use or `null` the invoice address of the contact will be taken.
- **delivery_address_type** (integer) Enum: 0 1
| Name | Details |
| --- | --- |
| 0 | use invoice address |
| 1 | use custom address |
- **delivery_address_manual** (string or null)
This field can be used to set a delivery address manually if `delivery_address_type` is set to `1`. If not in use or `null` the invoice address will be taken.
- **api_reference** (string or null)
This field can only be read and edited by the api. It can be used to save references to other systems.
- **viewed_by_client_at** (string or null)
- **kb_terms_of_payment_template_id** (integer or null)
- **template_slug** (string or null)
References a [document template slug](#operation/v3ListDocumentTemplate)
positions

Array of PositionCustomExtendedOptional (object) or PositionArticleExtendedOpional (object) or PositionTextExtended (object) or PositionSubtotalExtended (object) or PositionPagebreakExtended (object) or PositionDiscountExtended (object)
Please note that you can combine multiple positions. This means that an array containing `KbPositionCustom` and `KbPositionArticle` positions is valid.

**Recommendation**: use a maximum of 150 positions when creating sales documents. Other positions can be added using the item creation endpoint.

### Responses

**201**

Created

**422**

Validation error

post/2.0/kb\_offer

Live Server

<https://api.bexio.com/2.0/kb_offer>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "document_nr": "AN-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "pr_project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_until": "2019-07-24",

*   "contact_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",

*   "delivery_address_type": 0,

*   "delivery_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "kb_terms_of_payment_template_id": null,

*   "template_slug": "581a8010821e01426b8b456b",

*   "positions": [

*   {

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "tax_id": 4,

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "AN-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_until": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "kb_terms_of_payment_template_id": null,

*   "show_total": true,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Search quotes
-------------

Search quotes via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `id`
* `kb_item_status_id`
* `document_nr`
* `title`
* `contact_id`
* `contact_sub_id`
* `user_id`
* `currency_id`
* `total_gross`
* `total_net`
* `total`
* `is_valid_from`
* `is_valid_to`
* `is_valid_until`
* `updated_at`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "total" "total_net" "total_gross" "updated_at" Example: order_by=total Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 4,

*   "document_nr": "AN-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_until": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "kb_terms_of_payment_template_id": null,

*   "show_total": true,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": ""

}

]
```

Fetch a quote
-------------

This action fetches a single quote

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_offer/{quote\_id}

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_offer/{quote_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "AN-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_until": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "kb_terms_of_payment_template_id": null,

*   "show_total": true,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Edit a quote
------------

This action edits a single quote

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| document_nr | string Can not be used if “automatic numbering” is activated in frontend-settings. required if “automatic numbering” deactivated. https://help.bexio.com/s/article/000001784 |
| title | string or null |
| contact_id | integer or null References a contact object |
| contact_sub_id | integer or null References a contact object |
| user_id | integer References a user object |
| pr_project_id | integer or null References a project object |
| logopaper_id | integer Deprecated |
| language_id | integer References a language object |
| bank_account_id | integer References a bank account object |
| currency_id | integer References a currency object |
| payment_type_id | integer References a payment type object |
| header | string |
| footer | string |
| 0 | including taxes |
| 1 | excluding taxes |
| 2 | exempt from taxes |
- **mwst_is_net** (boolean)
This value affects the total if the field `mwst_type` has been set to 0.
`false` = Taxes are included in the total
`true` = Taxes will be added to the total
- **show_position_taxes** (boolean)
- **is_valid_from** (string <date>)
- **is_valid_until** (string <date>)
- **contact_address_manual** (string or null)
This field can be used to set a contact address manually. If not in use or `null` the invoice address of the contact will be taken.
- **delivery_address_type** (integer) Enum: 0 1
| Name | Details |
| --- | --- |
| 0 | use invoice address |
| 1 | use custom address |
- **delivery_address_manual** (string or null)
This field can be used to set a delivery address manually if `delivery_address_type` is set to `1`. If not in use or `null` the invoice address will be taken.
- **api_reference** (string or null)
This field can only be read and edited by the api. It can be used to save references to other systems.
- **viewed_by_client_at** (string or null)
- **kb_terms_of_payment_template_id** (integer or null)
- **template_slug** (string or null)
References a [document template slug](#operation/v3ListDocumentTemplate)

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_offer/{quote\_id}

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "document_nr": "AN-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "pr_project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_until": "2019-07-24",

*   "contact_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",

*   "delivery_address_type": 0,

*   "delivery_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "kb_terms_of_payment_template_id": null,

*   "template_slug": "581a8010821e01426b8b456b"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "AN-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_until": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "kb_terms_of_payment_template_id": null,

*   "show_total": true,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Delete a quote
--------------

This action permanently deletes a quote. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/kb\_offer/{quote\_id}

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/kb_offer/{quote_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Issue a quote
-------------

This action issues a quote. The quote must be in the draft status.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_offer/{quote\_id}/issue

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/issue>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_offer/{quote_id}/issue> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Revert issue a quote
--------------------

This action reverts a quote to the draft status

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_offer/{quote\_id}/revertIssue

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/revertIssue>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_offer/{quote_id}/revertIssue> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Accept a quote
--------------

This action accepts a quote. The value `kb_item_status_id` must be `2` in this case.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_offer/{quote\_id}/accept

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/accept>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_offer/{quote_id}/accept> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Decline a quote
---------------

This action declines a quote. The value `kb_item_status_id` must be `2` in this case.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_offer/{quote\_id}/reject

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/reject>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_offer/{quote_id}/reject> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Reissue a quote
---------------

This action re-issues a quote. Meaning the status is changed to pending from either accepted or declined.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_offer/{quote\_id}/reissue

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/reissue>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_offer/{quote_id}/reissue> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Mark quote as sent
------------------

This action marks a quote as sent

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_offer/{quote\_id}/mark\_as\_sent

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/mark_as_sent>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_offer/{quote_id}/mark_as_sent> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Show PDF
--------

This action returns a pdf document of the quote.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |
| logopaper | integer  Enum: 0 1 Example: 1 Whether the PDF should be generated using the letterhead, or not. |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_offer/{quote\_id}/pdf

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/pdf>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_offer/{quote_id}/pdf> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "name": "document-00005.pdf",

*   "size": 9768,

*   "mime": "application/pdf",

*   "content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

Send a quote
------------

This action sends a quote by email.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| recipient_email required | string  During the trial period, the recipient is limited to the email address associated to the access token provided. |
| subject required | string |
| message required | string The placeholder "[Network Link]" must be part of the text. |
| mark_as_open | boolean |
| attach_pdf | boolean Attach PDF directly to the email |

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_offer/{quote\_id}/send

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/send>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "recipient_email": "[email protected]",

*   "subject": "Your new document",

*   "message": "Please find the document at [Network Link]",

*   "mark_as_open": true,

*   "attach_pdf": true

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "success": true

}
```

Copy a quote
------------

This action copies a quote.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| contact_id required | integer or null References a contact object |
| contact_sub_id | integer or null References a contact object |
| is_valid_from | string  |
| pr_project_id | integer or null References a project object |
| title | string or null |

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_offer/{quote\_id}/copy

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/copy>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "is_valid_from": "2019-06-27",

*   "pr_project_id": null,

*   "title": null

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "AN-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_until": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "kb_terms_of_payment_template_id": null,

*   "show_total": true,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Create order from quote
-----------------------

This action creates an order from a quote.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| positions | Array of objects Please note that the positions array can be omitted to create a document with all positions from the source document. |

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_offer/{quote\_id}/order

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/order>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "positions": [

*   {

*   "id": 1,

*   "type": "KbPositionArticle",

*   "amount": 5

}

]

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "AU-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 5,

*   "is_recurring": false,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Create invoice from quote
-------------------------

This action creates an invoice from a quote.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| quote_id required | integer  Example: 1 the id of the quote |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| positions | Array of objects Please note that the positions array can be omitted to create a document with all positions from the source document. |

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_offer/{quote\_id}/invoice

Live Server

<https://api.bexio.com/2.0/kb_offer/{quote_id}/invoice>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "positions": [

*   {

*   "id": 1,

*   "type": "KbPositionArticle",

*   "amount": 5

}

]

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "RE-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total_received_payments": "0.000000",

*   "total_credit_vouchers": "0.000000",

*   "total_remaining_payments": "19.150000",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "reference": null,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "esr_id": 1,

*   "qr_invoice_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Orders
------

Fetch a list of orders
----------------------

This action fetches a list of all orders

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "total" "total_net" "total_gross" "updated_at" Example: order_by=total Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_order

Live Server

<https://api.bexio.com/2.0/kb_order>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_order> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "document_nr": "AU-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 5,

*   "is_recurring": false,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": ""

}

]
```

Create order
------------

This action creates a new order

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| document_nr | string Can not be used if “automatic numbering” is activated in frontend-settings. required if “automatic numbering” deactivated. https://help.bexio.com/s/article/000001784 |
| title | string or null |
| contact_id | integer References a contact object |
| contact_sub_id | integer or null References a contact object |
| user_id | integer References a user object |
| pr_project_id | integer or null References a project object |
| logopaper_id | integer Deprecated |
| language_id | integer References a language object |
| bank_account_id | integer References a bank account object |
| currency_id | integer References a currency object |
| payment_type_id | integer References a payment type object |
| header | string |
| footer | string |
| 0 | including taxes |
| 1 | excluding taxes |
| 2 | exempt from taxes |
- **mwst_is_net** (boolean)
This value affects the total if the field `mwst_type` has been set to 0.
`false` = Taxes are included in the total
`true` = Taxes will be added to the total
- **show_position_taxes** (boolean)
- **is_valid_from** (string <date>)
- **contact_address_manual** (string or null)
This field can be used to set a contact address manually. If not in use or `null` the invoice address of the contact will be taken.
- **delivery_address_type** (integer) Enum: 0 1
| Name | Details |
| --- | --- |
| 0 | use invoice address |
| 1 | use custom address |
- **delivery_address_manual** (string or null)
This field can be used to set a delivery address manually if `delivery_address_type` is set to `1`. If not in use or `null` the invoice address will be taken.
- **api_reference** (string or null)
This field can only be read and edited by the api. It can be used to save references to other systems.
- **template_slug** (string or null)
References a [document template slug](#operation/v3ListDocumentTemplate)
positions

Array of PositionCustomExtendedOptional (object) or PositionArticleExtendedOpional (object) or PositionTextExtended (object) or PositionSubtotalExtended (object) or PositionPagebreakExtended (object) or PositionDiscountExtended (object)
Please note that you can combine multiple positions. This means that an array containing `KbPositionCustom` and `KbPositionArticle` positions is valid.

**Recommendation**: use a maximum of 150 positions when creating sales documents. Other positions can be added using the item creation endpoint.

### Responses

**201**

Created

**422**

Validation error

post/2.0/kb\_order

Live Server

<https://api.bexio.com/2.0/kb_order>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "document_nr": "AU-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "pr_project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "contact_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",

*   "delivery_address_type": 0,

*   "delivery_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",

*   "api_reference": null,

*   "template_slug": "581a8010821e01426b8b456b",

*   "positions": [

*   {

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "tax_id": 4,

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "AU-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 5,

*   "is_recurring": false,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Search orders
-------------

Search orders via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `id`
* `kb_item_status_id`
* `document_nr`
* `title`
* `contact_id`
* `contact_sub_id`
* `user_id`
* `currency_id`
* `total_gross`
* `total_net`
* `total`
* `is_valid_from`
* `is_valid_to`
* `updated_at`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "total" "total_net" "total_gross" "updated_at" Example: order_by=total Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 4,

*   "document_nr": "AU-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 5,

*   "is_recurring": false,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": ""

}

]
```

Fetch an order
--------------

This action fetches a single order

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| order_id required | integer  Example: 1 the id of the order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_order/{order\_id}

Live Server

<https://api.bexio.com/2.0/kb_order/{order_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_order/{order_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "AU-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 5,

*   "is_recurring": false,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Edit an order
-------------

This action edits a single order

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| order_id required | integer  Example: 1 the id of the order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| document_nr | string Can not be used if “automatic numbering” is activated in frontend-settings. required if “automatic numbering” deactivated. https://help.bexio.com/s/article/000001784 |
| title | string or null |
| contact_id | integer or null References a contact object |
| contact_sub_id | integer or null References a contact object |
| user_id | integer References a user object |
| pr_project_id | integer or null References a project object |
| logopaper_id | integer Deprecated |
| language_id | integer References a language object |
| bank_account_id | integer References a bank account object |
| currency_id | integer References a currency object |
| payment_type_id | integer References a payment type object |
| header | string |
| footer | string |
| 0 | including taxes |
| 1 | excluding taxes |
| 2 | exempt from taxes |
- **mwst_is_net** (boolean)
This value affects the total if the field `mwst_type` has been set to 0.
`false` = Taxes are included in the total
`true` = Taxes will be added to the total
- **show_position_taxes** (boolean)
- **is_valid_from** (string <date>)
- **contact_address_manual** (string or null)
This field can be used to set a contact address manually. If not in use or `null` the invoice address of the contact will be taken.
- **delivery_address_type** (integer) Enum: 0 1
| Name | Details |
| --- | --- |
| 0 | use invoice address |
| 1 | use custom address |
- **delivery_address_manual** (string or null)
This field can be used to set a delivery address manually if `delivery_address_type` is set to `1`. If not in use or `null` the invoice address will be taken.
- **api_reference** (string or null)
This field can only be read and edited by the api. It can be used to save references to other systems.
- **template_slug** (string or null)
References a [document template slug](#operation/v3ListDocumentTemplate)

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_order/{order\_id}

Live Server

<https://api.bexio.com/2.0/kb_order/{order_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "document_nr": "AU-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "pr_project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "contact_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",

*   "delivery_address_type": 0,

*   "delivery_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",

*   "api_reference": null,

*   "template_slug": "581a8010821e01426b8b456b"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "AU-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 5,

*   "is_recurring": false,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Delete an order
---------------

This action permanently deletes an order. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| order_id required | integer  Example: 1 the id of the order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/kb\_order/{order\_id}

Live Server

<https://api.bexio.com/2.0/kb_order/{order_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/kb_order/{order_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Create delivery from order
--------------------------

This action creates a delivery from an order.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| order_id required | integer  Example: 1 the id of the order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| positions | Array of objects Please note that the positions array can be omitted to create a document with all positions from the source document. |

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_order/{order\_id}/delivery

Live Server

<https://api.bexio.com/2.0/kb_order/{order_id}/delivery>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "positions": [

*   {

*   "id": 1,

*   "type": "KbPositionArticle",

*   "amount": 5

}

]

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "LS-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "header": "Thank you very much for your inquiry.:",

*   "footer": "We hope that our delivery meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "is_valid_from": "2019-06-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 10,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Create invoice from order
-------------------------

This action creates an invoice from an order.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| order_id required | integer  Example: 1 the id of the order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| positions | Array of objects Please note that the positions array can be omitted to create a document with all positions from the source document. |

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_order/{order\_id}/invoice

Live Server

<https://api.bexio.com/2.0/kb_order/{order_id}/invoice>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "positions": [

*   {

*   "id": 1,

*   "type": "KbPositionArticle",

*   "amount": 5

}

]

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "RE-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total_received_payments": "0.000000",

*   "total_credit_vouchers": "0.000000",

*   "total_remaining_payments": "19.150000",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "reference": null,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "esr_id": 1,

*   "qr_invoice_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Show PDF
--------

This action returns a pdf document of the order.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| order_id required | integer  Example: 1 the id of the order |
| logopaper | integer  Enum: 0 1 Example: 1 Whether the PDF should be generated using the letterhead, or not. |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_order/{order\_id}/pdf

Live Server

<https://api.bexio.com/2.0/kb_order/{order_id}/pdf>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_order/{order_id}/pdf> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "name": "document-00005.pdf",

*   "size": 9768,

*   "mime": "application/pdf",

*   "content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

Show repetition
---------------

This action fetches an order repetition

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| order_id required | integer  Example: 1 the id of the order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_order/{order\_id}/repetition

Live Server

<https://api.bexio.com/2.0/kb_order/{order_id}/repetition>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_order/{order_id}/repetition> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "start": "2019-01-01",

*   "end": "2019-12-31",

*   "repetition": {

*   "type": "daily",

*   "interval": 1

}

}
```

Edit a repetition
-----------------

This action edits an order repetition

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| order_id required | integer  Example: 1 the id of the order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| start | string  |
| end | string or null  Date until the repetition is supposed to run. If empty indefinite repetition is assumed. |
| repetition | OrderRepetitionDaily (object) or OrderRepetitionWeekly (object) or OrderRepetitionMonthly (object) or OrderRepetitionYearly (object) Four different formats can be used to define the repetition. Either type daily, weekly, monthly or type yearly. |

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_order/{order\_id}/repetition

Live Server

<https://api.bexio.com/2.0/kb_order/{order_id}/repetition>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "start": "2019-01-01",

*   "end": "2019-12-31",

*   "repetition": {

*   "type": "daily",

*   "interval": 1

}

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "start": "2019-01-01",

*   "end": "2019-12-31",

*   "repetition": {

*   "type": "daily",

*   "interval": 1

}

}
```

Delete a repetition
-------------------

This action permanently deletes an order repetition. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| order_id required | integer  Example: 1 the id of the order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/kb\_order/{order\_id}/repetition

Live Server

<https://api.bexio.com/2.0/kb_order/{order_id}/repetition>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/kb_order/{order_id}/repetition> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Deliveries
----------

Fetch a list of deliveries
--------------------------

This action fetches a list of all deliveries

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "total" "total_net" "total_gross" "updated_at" Example: order_by=total Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_delivery

Live Server

<https://api.bexio.com/2.0/kb_delivery>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_delivery> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "document_nr": "LS-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "header": "Thank you very much for your inquiry.:",

*   "footer": "We hope that our delivery meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "is_valid_from": "2019-06-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 10,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

]

}

]
```

Fetch a delivery
----------------

This action fetches a single delivery

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| delivery_id required | integer  Example: 1 the id of the delivery |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_delivery/{delivery\_id}

Live Server

<https://api.bexio.com/2.0/kb_delivery/{delivery_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_delivery/{delivery_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "LS-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "header": "Thank you very much for your inquiry.:",

*   "footer": "We hope that our delivery meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "is_valid_from": "2019-06-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "delivery_address_type": 0,

*   "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 10,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Issue a delivery
----------------

This action issues a delivery. The delivery must be in the draft status.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| delivery_id required | integer  Example: 1 the id of the delivery |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_delivery/{delivery\_id}/issue

Live Server

<https://api.bexio.com/2.0/kb_delivery/{delivery_id}/issue>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_delivery/{delivery_id}/issue> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Invoices
--------

Fetch a list of invoices
------------------------

This action fetches a list of all invoices

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "total" "total_net" "total_gross" "updated_at" Example: order_by=total Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_invoice

Live Server

<https://api.bexio.com/2.0/kb_invoice>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_invoice> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "document_nr": "RE-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total_received_payments": "0.000000",

*   "total_credit_vouchers": "0.000000",

*   "total_remaining_payments": "19.150000",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "reference": null,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "esr_id": 1,

*   "qr_invoice_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": ""

}

]
```

Create invoice
--------------

This action creates a new invoice

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| document_nr | string Can not be used if “automatic numbering” is activated in frontend-settings. required if “automatic numbering” deactivated. https://help.bexio.com/s/article/000001784 |
| title | string or null |
| contact_id | integer or null References a contact object |
| contact_sub_id | integer or null References a contact object |
| user_id | integer References a user object |
| pr_project_id | integer or null References a project object |
| logopaper_id | integer Deprecated |
| language_id | integer References a language object |
| bank_account_id | integer References a bank account object |
| currency_id | integer References a currency object |
| payment_type_id | integer References a payment type object |
| header | string |
| footer | string |
| 0 | including taxes |
| 1 | excluding taxes |
| 2 | exempt from taxes |
- **mwst_is_net** (boolean)
This value affects the total if the field `mwst_type` has been set to 0.
`false` = Taxes are included in the total
`true` = Taxes will be added to the total
- **show_position_taxes** (boolean)
- **is_valid_from** (string <date>)
- **is_valid_to** (string <date>)
- **contact_address_manual** (string or null)
This field can be used to set a contact address manually. If not in use or `null` the invoice address of the contact will be taken.
- **reference** (string or null)
- **api_reference** (string or null)
This field can only be read and edited by the api. It can be used to save references to other systems.
- **template_slug** (string or null)
References a [document template slug](#operation/v3ListDocumentTemplate)
positions

Array of PositionCustomExtended (object) or PositionArticleExtended (object) or PositionTextExtended (object) or PositionSubtotalExtended (object) or PositionPagebreakExtended (object) or PositionDiscountExtended (object)
Please note that you can combine multiple positions. This means that an array containing `KbPositionCustom` and `KbPositionArticle` positions is valid.

**Recommendation**: use a maximum of 150 positions when creating sales documents. Other positions can be added using the item creation endpoint.

### Responses

**201**

Created

**422**

Validation error

post/2.0/kb\_invoice

Live Server

<https://api.bexio.com/2.0/kb_invoice>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "document_nr": "RE-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "pr_project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "contact_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",

*   "reference": null,

*   "api_reference": null,

*   "template_slug": "581a8010821e01426b8b456b",

*   "positions": [

*   {

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "tax_id": 4,

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "RE-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total_received_payments": "0.000000",

*   "total_credit_vouchers": "0.000000",

*   "total_remaining_payments": "19.150000",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "reference": null,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "esr_id": 1,

*   "qr_invoice_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Search invoices
---------------

Search invoices via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `id`
* `kb_item_status_id`
* `document_nr`
* `title`
* `api_reference`
* `contact_id`
* `contact_sub_id`
* `user_id`
* `currency_id`
* `total_gross`
* `total_net`
* `total`
* `is_valid_from`
* `is_valid_to`
* `updated_at`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "total" "total_net" "total_gross" "updated_at" Example: order_by=total Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 4,

*   "document_nr": "RE-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total_received_payments": "0.000000",

*   "total_credit_vouchers": "0.000000",

*   "total_remaining_payments": "19.150000",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "reference": null,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "esr_id": 1,

*   "qr_invoice_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": ""

}

]
```

Fetch an invoice
----------------

This action fetches a single invoice

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_invoice/{invoice\_id}

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "RE-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total_received_payments": "0.000000",

*   "total_credit_vouchers": "0.000000",

*   "total_remaining_payments": "19.150000",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "reference": null,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "esr_id": 1,

*   "qr_invoice_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Edit an invoice
---------------

This action edits a single invoice

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| document_nr | string Can not be used if “automatic numbering” is activated in frontend-settings. required if “automatic numbering” deactivated. https://help.bexio.com/s/article/000001784 |
| title | string or null |
| contact_id | integer or null References a contact object |
| contact_sub_id | integer or null References a contact object |
| user_id | integer References a user object |
| pr_project_id | integer or null References a project object |
| logopaper_id | integer Deprecated |
| language_id | integer References a language object |
| bank_account_id | integer References a bank account object |
| currency_id | integer References a currency object |
| payment_type_id | integer References a payment type object |
| header | string |
| footer | string |
| 0 | including taxes |
| 1 | excluding taxes |
| 2 | exempt from taxes |
- **mwst_is_net** (boolean)
This value affects the total if the field `mwst_type` has been set to 0.
`false` = Taxes are included in the total
`true` = Taxes will be added to the total
- **show_position_taxes** (boolean)
- **is_valid_from** (string <date>)
- **is_valid_to** (string <date>)
- **contact_address_manual** (string or null)
This field can be used to set a contact address manually. If not in use or `null` the invoice address of the contact will be taken.
- **reference** (string or null)
- **api_reference** (string or null)
This field can only be read and edited by the api. It can be used to save references to other systems.
- **template_slug** (string or null)
References a [document template slug](#operation/v3ListDocumentTemplate)

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_invoice/{invoice\_id}

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "document_nr": "RE-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "pr_project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "contact_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",

*   "reference": null,

*   "api_reference": null,

*   "template_slug": "581a8010821e01426b8b456b"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "RE-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total_received_payments": "0.000000",

*   "total_credit_vouchers": "0.000000",

*   "total_remaining_payments": "19.150000",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "reference": null,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "esr_id": 1,

*   "qr_invoice_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Delete an invoice
-----------------

This action permanently deletes an invoice. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/kb\_invoice/{invoice\_id}

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Show PDF
--------

This action returns a pdf document of the invoice.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |
| logopaper | integer  Enum: 0 1 Example: 1 Whether the PDF should be generated using the letterhead, or not. |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_invoice/{invoice\_id}/pdf

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/pdf>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/pdf> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "name": "document-00005.pdf",

*   "size": 9768,

*   "mime": "application/pdf",

*   "content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

Copy a invoice
--------------

This action copies a invoice.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| contact_id required | integer or null References a contact object |
| contact_sub_id | integer or null References a contact object |
| is_valid_from | string  |
| title | string or null |

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_invoice/{invoice\_id}/copy

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/copy>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "is_valid_from": "2019-06-27",

*   "title": null

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "document_nr": "RE-00001",

*   "title": null,

*   "contact_id": 14,

*   "contact_sub_id": null,

*   "user_id": 1,

*   "project_id": null,

*   "logopaper_id": 1,

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency_id": 1,

*   "payment_type_id": 1,

*   "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",

*   "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",

*   "total_gross": "17.800000",

*   "total_net": "17.800000",

*   "total_taxes": "1.3706",

*   "total_received_payments": "0.000000",

*   "total_credit_vouchers": "0.000000",

*   "total_remaining_payments": "19.150000",

*   "total": "19.150000",

*   "total_rounding_difference": -0.02,

*   "mwst_type": 0,

*   "mwst_is_net": true,

*   "show_position_taxes": false,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",

*   "kb_item_status_id": 3,

*   "reference": null,

*   "api_reference": null,

*   "viewed_by_client_at": null,

*   "updated_at": "2019-04-08 13:17:32",

*   "esr_id": 1,

*   "qr_invoice_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "taxs": [

*   {

*   "percentage": "7.70",

*   "value": "1.3706"

}

],

*   "network_link": "",

*   "positions": [

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]

}
```

Issue an invoice
----------------

This action issues an invoice. The invoice must be in the draft status.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_invoice/{invoice\_id}/issue

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/issue>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/issue> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Sets issued invoice to draft
----------------------------

This action set an already issued invoice to state draft.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_invoice/{invoice\_id}/revert\_issue

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/revert_issue>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/revert_issue> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Cancel an invoice
-----------------

This action cancels an already issued invoice.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_invoice/{invoice\_id}/cancel

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/cancel>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/cancel> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Mark invoice as sent
--------------------

This action marks an invoice as sent

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_invoice/{invoice\_id}/mark\_as\_sent

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/mark_as_sent>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/mark_as_sent> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Send an invoice
---------------

This action sends an invoice by email.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| recipient_email required | string  During the trial period, the recipient is limited to the email address associated to the access token provided. |
| subject required | string |
| message required | string The placeholder "[Network Link]" must be part of the text. |
| mark_as_open | boolean |
| attach_pdf | boolean Attach PDF directly to the email |

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_invoice/{invoice\_id}/send

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/send>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "recipient_email": "[email protected]",

*   "subject": "Your new document",

*   "message": "Please find the document at [Network Link]",

*   "mark_as_open": true,

*   "attach_pdf": true

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "success": true

}
```

Fetch a list of payments
------------------------

This action fetches a list of all payments for the invoice

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_invoice/{invoice\_id}/payment

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "date": "2019-06-29",

*   "value": "10.0000",

*   "bank_account_id": 1,

*   "title": "Received Payment",

*   "payment_service_id": null,

*   "is_client_account_redemption": false,

*   "is_cash_discount": false,

*   "kb_invoice_id": 1,

*   "kb_credit_voucher_id": null,

*   "kb_bill_id": null,

*   "kb_credit_voucher_text": ""

}

]
```

Create payment
--------------

This action creates a new payment for an invoice

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| date | string  |
| value required | string |
| bank_account_id | integer or null References a bank account object |
| 1 | PayPal |
| 2 | Stripe |
| 3 | SIX Payments |

### Responses

**201**

Created

**422**

Validation error

post/2.0/kb\_invoice/{invoice\_id}/payment

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "date": "2019-06-29",

*   "value": "10.0000",

*   "bank_account_id": 1,

*   "payment_service_id": null

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "date": "2019-06-29",

*   "value": "10.0000",

*   "bank_account_id": 1,

*   "title": "Received Payment",

*   "payment_service_id": null,

*   "is_client_account_redemption": false,

*   "is_cash_discount": false,

*   "kb_invoice_id": 1,

*   "kb_credit_voucher_id": null,

*   "kb_bill_id": null,

*   "kb_credit_voucher_text": ""

}
```

Fetch a payment
---------------

This action fetches a payment

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |
| payment_id required | integer  Example: 1 the id of the payment |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_invoice/{invoice\_id}/payment/{payment\_id}

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment/{payment_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment/{payment_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "date": "2019-06-29",

*   "value": "10.0000",

*   "bank_account_id": 1,

*   "title": "Received Payment",

*   "payment_service_id": null,

*   "is_client_account_redemption": false,

*   "is_cash_discount": false,

*   "kb_invoice_id": 1,

*   "kb_credit_voucher_id": null,

*   "kb_bill_id": null,

*   "kb_credit_voucher_text": ""

}
```

Delete a payment
----------------

This action permanently deletes a payment. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |
| payment_id required | integer  Example: 1 the id of the payment |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/kb\_invoice/{invoice\_id}/payment/{payment\_id}

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment/{payment_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment/{payment_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Fetch a list of reminders
-------------------------

This action fetches a list of all reminders for the invoice

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_invoice/{invoice\_id}/kb\_reminder

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "kb_invoice_id": 1,

*   "title": "First reminder",

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "reminder_period_in_days": 14,

*   "reminder_level": 1,

*   "show_positions": true,

*   "remaining_price": "17.8000",

*   "received_total": "0.0000",

*   "is_sent": false,

*   "header": null,

*   "footer": null

}

]
```

Create reminder
---------------

This action creates a new reminder for an invoice

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**201**

Created

**400**

Bad Request

post/2.0/kb\_invoice/{invoice\_id}/kb\_reminder

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 201
* 400

Content type

application/json

```
{

*   "id": 4,

*   "kb_invoice_id": 1,

*   "title": "First reminder",

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "reminder_period_in_days": 14,

*   "reminder_level": 1,

*   "show_positions": true,

*   "remaining_price": "17.8000",

*   "received_total": "0.0000",

*   "is_sent": false,

*   "header": null,

*   "footer": null

}
```

Search invoice reminders
------------------------

Search invoice reminders via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `title`
* `reminder_level`
* `is_sent`
* `is_valid_from`
* `is_valid_to`

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 4,

*   "kb_invoice_id": 1,

*   "title": "First reminder",

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "reminder_period_in_days": 14,

*   "reminder_level": 1,

*   "show_positions": true,

*   "remaining_price": "17.8000",

*   "received_total": "0.0000",

*   "is_sent": false,

*   "header": null,

*   "footer": null

}

]
```

Fetch a reminder
----------------

This action deletes the most recent reminder

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |
| reminder_id required | integer  Example: 1 the id of the reminder |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_invoice/{invoice\_id}/kb\_reminder/{reminder\_id}

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "kb_invoice_id": 1,

*   "title": "First reminder",

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "reminder_period_in_days": 14,

*   "reminder_level": 1,

*   "show_positions": true,

*   "remaining_price": "17.8000",

*   "received_total": "0.0000",

*   "is_sent": false,

*   "header": null,

*   "footer": null

}
```

Delete a reminder
-----------------

This action permanently deletes the most recent reminder. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |
| reminder_id required | integer  Example: 1 the id of the reminder |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/kb\_invoice/{invoice\_id}/kb\_reminder/{reminder\_id}

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Mark reminder as sent
---------------------

This action marks an invoice reminder as sent

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |
| reminder_id required | integer  Example: 1 the id of the reminder |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_invoice/{invoice\_id}/kb\_reminder/{reminder\_id}/mark\_as\_sent

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/mark_as_sent>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/mark_as_sent> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Mark reminder as unsent
-----------------------

This action marks an invoice reminder as unsent

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |
| reminder_id required | integer  Example: 1 the id of the reminder |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/kb\_invoice/{invoice\_id}/kb\_reminder/{reminder\_id}/mark\_as\_unsent

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/mark_as_unsent>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/mark_as_unsent> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Send a reminder
---------------

This action sends an invoice reminder by email.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |
| reminder_id required | integer  Example: 1 the id of the reminder |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| recipient_email required | string  During the trial period, the recipient is limited to the email address associated to the access token provided. |
| subject required | string |
| message required | string The placeholder "[Network Link]" must be part of the text. |

### Responses

**200**

OK

**422**

Validation error

post/2.0/kb\_invoice/{invoice\_id}/kb\_reminder/{reminder\_id}/send

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/send>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "recipient_email": "[email protected]",

*   "subject": "Your new document",

*   "message": "Please find the document at [Network Link]"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "success": true

}
```

Show reminder PDF
-----------------

This action returns a pdf document of the invoice reminder.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| invoice_id required | integer  Example: 1 the id of the invoice |
| reminder_id required | integer  Example: 1 the id of the reminder |
| logopaper | integer  Enum: 0 1 Example: 1 Whether the PDF should be generated using the letterhead, or not. |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_invoice/{invoice\_id}/kb\_reminder/{reminder\_id}/pdf

Live Server

<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/pdf>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/pdf> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "name": "document-00005.pdf",

*   "size": 9768,

*   "mime": "application/pdf",

*   "content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

Document Settings
-----------------

Fetch a list of document settings
---------------------------------

This action fetches a list of all document settings

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "text" Example: order_by=id Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/kb\_item\_setting

Live Server

<https://api.bexio.com/2.0/kb_item_setting>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/kb_item_setting> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "text": "Quote",

*   "kb_item_class": "KbOffer",

*   "enumeration_format": "AN-%nummer%",

*   "use_automatic_enumeration": true,

*   "use_yearly_enumeration": false,

*   "next_nr": 1,

*   "nr_min_length": 5,

*   "default_time_period_in_days": 14,

*   "default_logopaper_id": 1,

*   "default_language_id": 1,

*   "default_client_bank_account_new_id": 1,

*   "default_currency_id": 1,

*   "default_mwst_type": 0,

*   "default_mwst_is_net": true,

*   "default_nb_decimals_amount": 2,

*   "default_nb_decimals_price": 2,

*   "default_show_position_taxes": false,

*   "default_title": "Angebot",

*   "default_show_esr_on_same_page": false,

*   "default_payment_type_id": 1,

*   "kb_terms_of_payment_template_id": 1,

*   "default_show_total": true

}

]
```

Comments
--------

Fetch a list of comments
------------------------

This action fetches a list of all comments for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Item positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/comment

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/comment>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/comment> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "text": "Sample comment",

*   "user_id": 1,

*   "user_email": null,

*   "user_name": "Peter Smith",

*   "date": "2019-07-18 15:41:53",

*   "is_public": false,

*   "image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=",

*   "image_path": "https://my.bexio.com/img/profile_picture/j2cbWl-yp3zT9oOh9jHTAA/Ds8buEV0HXZsvuBm3df8SQ.png?type=thumb"

}

]
```

Create a comment
----------------

This action creates a new comment for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Comments can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| text required | string |
| user_id required | integer or null References a user object |
| user_email | string or null  |
| user_name required | string or null |
| is_public | boolean |

### Responses

**201**

Created

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/comment

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/comment>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "text": "Sample comment",

*   "user_id": 1,

*   "user_email": null,

*   "user_name": "Peter Smith",

*   "is_public": false

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "text": "Sample comment",

*   "user_id": 1,

*   "user_email": null,

*   "user_name": "Peter Smith",

*   "date": "2019-07-18 15:41:53",

*   "is_public": false,

*   "image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=",

*   "image_path": "https://my.bexio.com/img/profile_picture/j2cbWl-yp3zT9oOh9jHTAA/Ds8buEV0HXZsvuBm3df8SQ.png?type=thumb"

}
```

Fetch a comment
---------------

This action fetches a single comment for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Comments can be used in quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| comment_id required | integer  Example: 1 the id of the comment |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/comment/{comment\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/comment/{comment_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/comment/{comment_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "text": "Sample comment",

*   "user_id": 1,

*   "user_email": null,

*   "user_name": "Peter Smith",

*   "date": "2019-07-18 15:41:53",

*   "is_public": false,

*   "image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=",

*   "image_path": "https://my.bexio.com/img/profile_picture/j2cbWl-yp3zT9oOh9jHTAA/Ds8buEV0HXZsvuBm3df8SQ.png?type=thumb"

}
```

Default positions
-----------------

Fetch a list of default positions
---------------------------------

This action fetches a list of all default positions for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Default positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_custom

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionCustom",

*   "parent_id": null

}

]
```

Create a default position
-------------------------

This action creates a new default position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Default positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| amount | string |
| amount_reserved | string |
| amount_open | string |
| amount_completed | string |
| unit_id | integer References a unit object |
| account_id | integer References an account object |
| tax_id | integer References a tax object Please note that only active sales taxes can be used as references on the document types quote, order and invoice. An easy way to retrieve all valid taxes is by calling the taxes endpoint with the query parameters types=sales_tax&scope=active (this would result in the path /3.0/taxes?types=sales_tax&scope=active). |
| text | string |
| unit_price | string The price of one unit (max. 6 decimals) |
| discount_in_percent | string or null The discount (max. 6 decimals) |
| is_optional | boolean Only in the case of quotes or Orders |

### Responses

**201**

Created

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_custom

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "tax_id": 4,

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "is_optional": false

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}
```

Fetch a default position
------------------------

This action fetches a single default position for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Default positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_custom/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionCustom",

*   "parent_id": null

}
```

Edit a default position
-----------------------

This action edits a single default position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Default positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| amount | string |
| amount_reserved | string |
| amount_open | string |
| amount_completed | string |
| unit_id | integer References a unit object |
| account_id | integer References an account object |
| tax_id | integer References a tax object Please note that only active sales taxes can be used as references on the document types quote, order and invoice. An easy way to retrieve all valid taxes is by calling the taxes endpoint with the query parameters types=sales_tax&scope=active (this would result in the path /3.0/taxes?types=sales_tax&scope=active). |
| text | string |
| unit_price | string The price of one unit (max. 6 decimals) |
| discount_in_percent | string or null The discount (max. 6 decimals) |
| is_optional | boolean Only in the case of quotes or Orders |

### Responses

**200**

OK

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_custom/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "tax_id": 4,

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "is_optional": false

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "type": "KbPositionCustom",

*   "parent_id": null

}
```

Delete a default position
-------------------------

This action permanently deletes a default position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Default positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_custom/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Item positions
--------------

Fetch a list of item positions
------------------------------

This action fetches a list of all item positions for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Item positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_article

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": false,

*   "article_id": 3,

*   "type": "KbPositionArticle",

*   "parent_id": null

}

]
```

Create an item position
-----------------------

This action creates a new item position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Item positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| amount | string |
| amount_reserved | string |
| amount_open | string |
| amount_completed | string |
| unit_id | integer References a unit object |
| account_id | integer References an account object |
| tax_id | integer References a tax object Please note that only active sales taxes can be used as references on the document types quote, order and invoice. An easy way to retrieve all valid taxes is by calling the taxes endpoint with the query parameters types=sales_tax&scope=active (this would result in the path /3.0/taxes?types=sales_tax&scope=active). |
| text | string |
| unit_price | string The price of one unit (max. 6 decimals) |
| discount_in_percent | string or null The discount (max. 6 decimals) |
| is_optional | boolean Only valid in the case of Quotes or Orders |
| article_id | integer References an item object |

### Responses

**201**

Created

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_article

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "tax_id": 4,

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "is_optional": false,

*   "article_id": 3

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "article_id": 3,

*   "type": "KbPositionArticle",

*   "parent_id": null

}
```

Fetch an item position
----------------------

This action fetches a single item position for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Item positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_article/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": false,

*   "article_id": 3,

*   "type": "KbPositionArticle",

*   "parent_id": null

}
```

Edit an item position
---------------------

This action edits a single item position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Item positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| amount | string |
| amount_reserved | string |
| amount_open | string |
| amount_completed | string |
| unit_id | integer References a unit object |
| account_id | integer References an account object |
| tax_id | integer References a tax object Please note that only active sales taxes can be used as references on the document types quote, order and invoice. An easy way to retrieve all valid taxes is by calling the taxes endpoint with the query parameters types=sales_tax&scope=active (this would result in the path /3.0/taxes?types=sales_tax&scope=active). |
| text | string |
| unit_price | string The price of one unit (max. 6 decimals) |
| discount_in_percent | string or null The discount (max. 6 decimals) |
| is_optional | boolean Only valid in the case of Quotes or Orders |
| article_id | integer References an item object |

### Responses

**200**

OK

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_article/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "tax_id": 4,

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "is_optional": false,

*   "article_id": 3

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "amount": "5.000000",

*   "amount_reserved": "5.000000",

*   "amount_open": "5.000000",

*   "amount_completed": "5.000000",

*   "unit_id": 1,

*   "account_id": 1,

*   "unit_name": "kg",

*   "tax_id": 4,

*   "tax_value": "7.70",

*   "text": "Apples",

*   "unit_price": "3.560000",

*   "discount_in_percent": "0.000000",

*   "position_total": "17.800000",

*   "pos": 1,

*   "internal_pos": 1,

*   "is_optional": null,

*   "article_id": 3,

*   "type": "KbPositionArticle",

*   "parent_id": null

}
```

Delete a item position
----------------------

This action permanently deletes an item position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Item positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_article/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Text positions
--------------

Fetch a list of text positions
------------------------------

This action fetches a list of all text positions for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Text positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_text

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false,

*   "pos": null,

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionText",

*   "parent_id": null

}

]
```

Create a text position
----------------------

This action creates a new text position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Text positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| text | string |
| show_pos_nr | boolean |

### Responses

**201**

Created

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_text

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false,

*   "pos": null,

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionText",

*   "parent_id": null

}
```

Fetch a text position
---------------------

This action fetches a single text position for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Text positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_text/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false,

*   "pos": null,

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionText",

*   "parent_id": null

}
```

Edit a text position
--------------------

This action edits a single text position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Text positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| text | string |
| show_pos_nr | boolean |

### Responses

**200**

OK

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_text/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false,

*   "pos": null,

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionText",

*   "parent_id": null

}
```

Delete a text position
----------------------

This action permanently deletes a text position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Text positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_text/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Subtotal positions
------------------

Fetch a list of subtotal positions
----------------------------------

This action fetches a list of all subtotal positions for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Subtotal positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_subtotal

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "text": "Subtotal",

*   "value": "17.800000",

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionSubtotal",

*   "parent_id": null

}

]
```

Create a subtotal position
--------------------------

This action creates a new subtotal position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Subtotal positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| text | string |

### Responses

**201**

Created

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_subtotal

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "text": "Subtotal"

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "text": "Subtotal",

*   "value": "17.800000",

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionSubtotal",

*   "parent_id": null

}
```

Fetch a subtotal position
-------------------------

This action fetches a single subtotal position for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Subtotal positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_subtotal/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "text": "Subtotal",

*   "value": "17.800000",

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionSubtotal",

*   "parent_id": null

}
```

Edit a subtotal position
------------------------

This action edits a single subtotal position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Subtotal positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| text | string |

### Responses

**200**

OK

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_subtotal/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "text": "Subtotal"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "text": "Subtotal",

*   "value": "17.800000",

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionSubtotal",

*   "parent_id": null

}
```

Delete a subtotal position
--------------------------

This action permanently deletes a subtotal position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Subtotal positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_subtotal/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Discount positions
------------------

Fetch a list of discount positions
----------------------------------

This action fetches a list of all discount positions for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Discount positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_discount

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "text": "Partner discount",

*   "is_percentual": true,

*   "value": "10.000000",

*   "discount_total": "1.780000",

*   "type": "KbPositionDiscount"

}

]
```

Create a discount position
--------------------------

This action creates a new discount position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Discount positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| text | string |
| is_percentual | boolean |
| value | string |

### Responses

**201**

Created

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_discount

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "text": "Partner discount",

*   "is_percentual": true,

*   "value": "10.000000"

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "text": "Partner discount",

*   "is_percentual": true,

*   "value": "10.000000",

*   "discount_total": "1.780000",

*   "type": "KbPositionDiscount"

}
```

Fetch a discount position
-------------------------

This action fetches a single discount position for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Discount positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_discount/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "text": "Partner discount",

*   "is_percentual": true,

*   "value": "10.000000",

*   "discount_total": "1.780000",

*   "type": "KbPositionDiscount"

}
```

Edit a discount position
------------------------

This action edits a single discount position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Discount positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| text | string |
| is_percentual | boolean |
| value | string |

### Responses

**200**

OK

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_discount/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "text": "Partner discount",

*   "is_percentual": true,

*   "value": "10.000000"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "text": "Partner discount",

*   "is_percentual": true,

*   "value": "10.000000",

*   "discount_total": "1.780000",

*   "type": "KbPositionDiscount"

}
```

Delete a discount position
--------------------------

This action permanently deletes a discount position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Discount positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_discount/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Pagebreak positions
-------------------

Fetch a list of pagebreak positions
-----------------------------------

This action fetches a list of all pagebreak positions for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Pagebreak positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_pagebreak

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionPagebreak",

*   "parent_id": null

}

]
```

Create a pagebreak position
---------------------------

This action creates a new pagebreak position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Pagebreak positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| pagebreak | boolean |

### Responses

**201**

Created

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_pagebreak

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "pagebreak": true

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionPagebreak",

*   "parent_id": null

}
```

Fetch a pagebreak position
--------------------------

This action fetches a single pagebreak position for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Pagebreak positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_pagebreak/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionPagebreak",

*   "parent_id": null

}
```

Edit a pagebreak position
-------------------------

This action edits a single pagebreak position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Pagebreak positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| pagebreak | boolean |

### Responses

**200**

OK

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_pagebreak/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "pagebreak": true

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "internal_pos": 1,

*   "is_optional": false,

*   "type": "KbPositionPagebreak",

*   "parent_id": null

}
```

Delete a pagebreak position
---------------------------

This action permanently deletes a pagebreak position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Pagebreak positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_pagebreak/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Sub positions
-------------

Fetch a list of sub positions
-----------------------------

This action fetches a list of all sub positions for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Sub positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_subposition

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "text": "This is a container to group other position types",

*   "pos": 1,

*   "internal_pos": 1,

*   "show_pos_nr": true,

*   "is_optional": false,

*   "total_sum": "17.800000",

*   "show_pos_prices": true,

*   "type": "KbPositionSubposition",

*   "parent_id": null

}

]
```

Create a sub position
---------------------

This action creates a new sub position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Sub positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| text | string |
| show_pos_nr | boolean |

### Responses

**201**

Created

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_subposition

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "text": "This is a container to group other position types",

*   "show_pos_nr": true

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "text": "This is a container to group other position types",

*   "pos": 1,

*   "internal_pos": 1,

*   "show_pos_nr": true,

*   "is_optional": false,

*   "total_sum": "17.800000",

*   "show_pos_prices": true,

*   "type": "KbPositionSubposition",

*   "parent_id": null

}
```

Fetch a sub position
--------------------

This action fetches a single sub position for a document.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Sub positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_subposition/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "text": "This is a container to group other position types",

*   "pos": 1,

*   "internal_pos": 1,

*   "show_pos_nr": true,

*   "is_optional": false,

*   "total_sum": "17.800000",

*   "show_pos_prices": true,

*   "type": "KbPositionSubposition",

*   "parent_id": null

}
```

Edit a sub position
-------------------

This action edits a single sub position for a document

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Sub positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| text | string |
| show_pos_nr | boolean |

### Responses

**200**

OK

**422**

Validation error

post/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_subposition/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "text": "This is a container to group other position types",

*   "show_pos_nr": true

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "text": "This is a container to group other position types",

*   "pos": 1,

*   "internal_pos": 1,

*   "show_pos_nr": true,

*   "is_optional": false,

*   "total_sum": "17.800000",

*   "show_pos_prices": true,

*   "type": "KbPositionSubposition",

*   "parent_id": null

}
```

Delete a sub position
---------------------

This action permanently deletes a sub position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter `kb_document_type` with kb\_invoice and replace the path parameter `document_id` with `4`.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| kb_document_type required | string Enum: "kb_offer" "kb_order" "kb_invoice" Example: kb_invoice The type of the document. Sub positions can be added to quotes, orders and invoices |
| document_id required | integer  Example: 1 the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice |
| position_id required | integer  Example: 1 the id of the position |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/{kb\_document\_type}/{document\_id}/kb\_position\_subposition/{position\_id}

Live Server

<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Document templates
------------------

List document templates
-----------------------

This action fetches a list of document templates

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/document\_templates

Live Server

<https://api.bexio.com/3.0/document_templates>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/document_templates> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "template_slug": "5f118cbc200a0c76ef1f34b2",

*   "name": "Standard template",

*   "is_default": true,

*   "default_for_document_types": [

*   "type_offer",

*   "type_order",

*   "type_invoice",

*   "type_delivery",

*   "type_credit_voucher",

*   "type_account_statement",

*   "type_article_order"

]

}

]
```

Bills
-----

Get Bills
---------

Endpoint for retrieving Bills

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer Default: 100 Example: limit=45 Limit the number of results (max is 500) |
| page | integer Default: 1 Example: page=2 current page |
| order | string Default: "asc" Example: order=asc&order=desc sorting order |
| sort | string Example: sort=document_no field to sort by |
| search_term | string [ 3 .. 255 ] characters Example: search_term=term term for which application will look for (minimum 3 signs, maximum 255 signs) |
| fields[] | Array of strings Items Enum: "firstname_suffix" "lastname_company" "vendor_ref" "currency_code" "document_no" "title" fields for which search will be run (if no 'fields[]' is specified than searching will be done for all allowed fields) |
| status | string Enum: "DRAFTS" "TODO" "PAID" "OVERDUE" Example: status=TODO filter for Bill 'status' (DRAFTS: [DRAFT], TODO: [BOOKED, PARTIALLY_CREATED, CREATED, PARTIALLY_SENT, SENT, PARTIALLY_DOWNLOADED, DOWNLOADED, PARTIALLY_PAID, PARTIALLY_FAILED, FAILED], PAID: [PAID], OVERDUE: [BOOKED, PARTIALLY_CREATED, CREATED, PARTIALLY_SENT, SENT, PARTIALLY_DOWNLOADED, DOWNLOADED, PARTIALLY_PAID, PARTIALLY_FAILED, FAILED]) and for 'onlyOverdue' (DRAFTS: [FALSE], TODOS: [FALSE], PAID: [FALSE], OVERDUE: [TRUE]). Choosing OVERDUE means that only Bills with 'due_date' before now will be shown |
| bill_date_start | string  Example: bill_date_start=2019-04-19 filter for Bill 'bill_date', the earliest accepted date |
| bill_date_end | string  Example: bill_date_end=2019-04-27 filter for Bill 'bill_date', the latest accepted date |
| due_date_start | string  Example: due_date_start=2019-05-19 filter for Bill 'due_date', the earliest accepted date |
| due_date_end | string  Example: due_date_end=2019-05-27 filter for Bill 'due_date', the latest accepted date |
| vendor_ref | string Example: vendor_ref=reference filter for Bill 'vendor_ref', text containing in field |
| title | string Example: title=Some Title filter for Bill 'title', text containing in field |
| currency_code | string Example: currency_code=CHF filter for Bill 'currency_code', text containing in field |
| pending_amount_min | number  Example: pending_amount_min=438.32 filter for Bill 'pending_amount', the lowest accepted value |
| pending_amount_max | number  Example: pending_amount_max=465.75 filter for Bill 'pending_amount', the greatest accepted value |
| vendor | string Example: vendor=bexio ag filter for Bill 'vendor', text containing in fields lastname_company and firstname_suffix |
| gross_min | number  Example: gross_min=438.32 filter for Bill 'gross', the lowest accepted value |
| gross_max | number  Example: gross_max=465.75 filter for Bill 'gross', the greatest accepted value |
| net_min | number  Example: net_min=438.32 filter for Bill 'net', the lowest accepted value |
| net_max | number  Example: net_max=465.75 filter for Bill 'net', the greatest accepted value |
| document_no | string Example: document_no=DC-123 filter for Bill 'document_no', text containing in field |
| supplier_id | integer Example: supplier_id=1234 filter for Bill 'supplier_id' |
| average_exchange_rate_enabled | boolean Example: average_exchange_rate_enabled=false indicates whether 'average_exchange_rate_enabled' is enabled, or not |

### Responses

**200**

Bill retrieved

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

get/4.0/purchase/bills

Live Server

<https://api.bexio.com/4.0/purchase/bills>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/purchase/bills> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 401
* 403

Content type

application/json

```
{

*   "data": [

*   {

*   "id": "2af7df09-bf6b-4a6b-840f-142e337e692a",

*   "created_at": "2019-03-23T09:53:49+0000",

*   "document_no": "NO-1",

*   "status": "DRAFT",

*   "vendor_ref": "Vendor 1",

*   "firstname_suffix": "John",

*   "lastname_company": "Doe",

*   "vendor": "John Doe",

*   "title": "Title 1",

*   "currency_code": "CHF",

*   "pending_amount": 100.23,

*   "net": 0.45,

*   "gross": 13.42,

*   "bill_date": "2019-02-12",

*   "due_date": "2019-03-14",

*   "overdue": false,

*   "booking_account_ids": [

*   10,

*   12

],

*   "attachment_ids": [

*   "1cb712f3-652c-4707-9641-2de94f77e07d",

*   "ab2b0d50-f3b0-4773-9c65-6606657db25b",

*   "34ef8407-094a-419f-b649-789d36b5d145"

]

},

*   {

*   "id": "99fd6dc2-09cf-4db6-8dfa-2b9b3b9394b1",

*   "created_at": "2019-05-23T09:53:49+0000",

*   "document_no": "NO-3",

*   "status": "BOOKED",

*   "vendor_ref": "Vendor 2",

*   "firstname_suffix": "James",

*   "lastname_company": "Doe",

*   "vendor": "James Doe",

*   "title": "Title 2",

*   "currency_code": "USD",

*   "pending_amount": 2.73,

*   "net": 0.01,

*   "gross": 1.42,

*   "bill_date": "2019-04-02",

*   "due_date": "2019-05-27",

*   "overdue": true,

*   "booking_account_ids": [

*   12,

*   134,

*   9

],

*   "attachment_ids": [

*   "1f1ef73d-6b4a-4de5-812c-27f8732be88b",

*   "d9d3a328-8c0b-4889-9b15-d3e9abc24df0"

]

}

],

*   "paging": {

*   "page": 1,

*   "page_size": 10,

*   "page_count": 50,

*   "item_count": 300

}

}
```

Create new Bill
---------------

Endpoint for creating Bill

##### Authorizations

_bearerAuth_

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| supplier_id required | integer  |
| vendor_ref | string [ 1 .. 255 ] characters |
| title | string [ 1 .. 80 ] characters |
| contact_partner_id required | integer  |
| bill_date required | string  |
| due_date required | string  |
| amount_man | number  required when 'manual_amount' is true. Maximum of 17 digits and maximum of 2 decimal digits. |
| amount_calc | number  required when 'manual_amount' is false. Maximum of 17 digits and maximum of 2 decimal digits. |
| manual_amount required | boolean indicates whether 'amount_man' or 'amount_calc' is required and considered as bill amount |
| currency_code required | string [ 1 .. 20 ] characters |
| exchange_rate | number  required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 5 digits and maximum of 10 decimal digits. |
| base_currency_amount | number  >= 0 required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 17 digits and maximum of 2 decimal digits. |
| item_net required | boolean Indicates whether 'amount' in 'line_items' is net or gross. |
| purchase_order_id | integer  |
| qr_bill_information | string [ 1 .. 255 ] characters |
| attachment_ids required | Array of strings  [ items  ] |
| address required | object (address) Address |
| line_items required | Array of objects (createlineItem) [ 1 .. 100 ] items |
| discounts required | Array of objects (discount) [ 0 .. 100 ] items |
| payment | object (payment) |

### Responses

**201**

Successful Bill creation

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

post/4.0/purchase/bills

Live Server

<https://api.bexio.com/4.0/purchase/bills>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "supplier_id": 1323,

*   "vendor_ref": "Reference text",

*   "title": "Bill 42",

*   "contact_partner_id": 647,

*   "bill_date": "2019-02-12",

*   "due_date": "2019-03-14",

*   "amount_man": 23.8,

*   "amount_calc": 32.08,

*   "manual_amount": true,

*   "currency_code": "CHF",

*   "exchange_rate": 2.3455347621,

*   "base_currency_amount": 212.78,

*   "item_net": false,

*   "purchase_order_id": 637,

*   "qr_bill_information": "//S1/10/10201409/11/190512/20/1400.000-53/30/106017086/31/180508/32/7.7/40/2:10;0:30",

*   "address": {

*   "title": "Dr.",

*   "salutation": "Mr",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

},

*   "line_items": [

*   {

*   "position": 0,

*   "title": "First line item title",

*   "tax_id": 15,

*   "amount": 56.8,

*   "booking_account_id": 16

},

*   {

*   "position": 1,

*   "title": "Second line item title",

*   "tax_id": 15,

*   "amount": 48.8,

*   "booking_account_id": 14

}

],

*   "discounts": [

*   {

*   "position": 1,

*   "amount": 56.8

}

],

*   "payment": {

*   "type": "IBAN",

*   "bank_account_id": 12,

*   "fee": "BY_SENDER",

*   "execution_date": "2019-03-15",

*   "exchange_rate": 2.3455394587,

*   "amount": 3.9,

*   "iban": "CH121234567812345678900",

*   "name": "LeSS Organisation",

*   "address": "1147 Super Street",

*   "street": "Super Street",

*   "house_no": 1147,

*   "postcode": "9999",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "message": "This is a message.",

*   "booking_text": "Further education.",

*   "salary_payment": false,

*   "reference_no": "1212345675321984798456",

*   "note": "Some note text"

},

*   "attachment_ids": [

*   "e84b9fe2-3fe2-4fcf-8c30-298fe16adb14",

*   "aa9fc418-f292-49ad-9a35-9869123d1091"

]

}
```

### Response samples

* 201
* 400
* 401
* 403

Content type

application/json

```
{

*   "id": "64bf865d-988a-496d-a24f-bab2d52e4b4a",

*   "document_no": "LR-12345",

*   "title": "Bill 42",

*   "status": "DRAFT",

*   "firstname_suffix": "LeSS",

*   "lastname_company": "Organisation",

*   "created_at": "2019-02-12T09:53:49",

*   "supplier_id": 1323,

*   "vendor_ref": "Reference text",

*   "contact_partner_id": 647,

*   "bill_date": "2019-02-12",

*   "due_date": "2019-03-14",

*   "pending_amount": 65.23,

*   "amount_man": 23.87,

*   "amount_calc": 23.9,

*   "manual_amount": true,

*   "currency_code": "USD",

*   "exchange_rate": 2.3455365492,

*   "base_currency_code": "USD",

*   "item_net": false,

*   "split_into_line_items": true,

*   "purchase_order_id": 637,

*   "base_currency_amount": 75.23,

*   "overdue": true,

*   "qr_bill_information": "//S1/10/10201409/11/190512/20/1400.000-53/30/106017086/31/180508/32/7.7/40/2:10;0:30",

*   "address": {

*   "title": "Prof",

*   "salutation": "Mrs",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

},

*   "line_items": [

*   {

*   "id": "2d267f64-6b94-4109-818e-c54515837004",

*   "position": 0,

*   "title": "First line item title",

*   "tax_id": 15,

*   "tax_calc": 12.89,

*   "amount": 56.8,

*   "booking_account_id": 16

},

*   {

*   "id": "e33ecd04-188e-40b5-92eb-02f9efbf1b1c",

*   "position": 1,

*   "title": "Second line item title",

*   "tax_id": 15,

*   "tax_calc": 8.89,

*   "amount": 48.8,

*   "booking_account_id": 14

}

],

*   "discounts": [

*   {

*   "id": "8b102a32-5bef-462e-a41b-9c00197c26b9",

*   "position": 1,

*   "amount": 56.8

}

],

*   "payment": {

*   "type": "IBAN",

*   "bank_account_id": 12,

*   "fee": "BY_SENDER",

*   "execution_date": "2019-03-15",

*   "exchange_rate": 2.34553,

*   "amount": 3.9,

*   "iban": "CH121234567812345678900",

*   "name": "LeSS Organisation",

*   "address": "1147 Super Street",

*   "street": "Super Street",

*   "house_no": 1147,

*   "postcode": "9999",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "message": "This is a message.",

*   "booking_text": "Further education.",

*   "salary_payment": false,

*   "reference_no": "1212345675321984798456",

*   "note": "Some note text"

},

*   "attachment_ids": [

*   "e84b9fe2-3fe2-4fcf-8c30-298fe16adb14",

*   "aa9fc418-f292-49ad-9a35-9869123d1091"

]

}
```

Get Bill
--------

Endpoint for retrieving Bill by id

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: 7572f70e-6bf5-47be-9a28-466423d8e3b1 id of Bill to retrieve |

### Responses

**200**

Bill retrieved

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Bill with specified id was not found

get/4.0/purchase/bills/{id}

Live Server

<https://api.bexio.com/4.0/purchase/bills/{id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/purchase/bills/{id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 401
* 403
* 404

Content type

application/json

```
{

*   "id": "64bf865d-988a-496d-a24f-bab2d52e4b4a",

*   "document_no": "LR-12345",

*   "title": "Bill 42",

*   "status": "DRAFT",

*   "firstname_suffix": "LeSS",

*   "lastname_company": "Organisation",

*   "created_at": "2019-02-12T09:53:49",

*   "supplier_id": 1323,

*   "vendor_ref": "Reference text",

*   "contact_partner_id": 647,

*   "bill_date": "2019-02-12",

*   "due_date": "2019-03-14",

*   "pending_amount": 65.23,

*   "amount_man": 23.87,

*   "amount_calc": 23.9,

*   "manual_amount": true,

*   "currency_code": "USD",

*   "exchange_rate": 2.3455365492,

*   "base_currency_code": "USD",

*   "item_net": false,

*   "split_into_line_items": true,

*   "purchase_order_id": 637,

*   "base_currency_amount": 75.23,

*   "overdue": true,

*   "qr_bill_information": "//S1/10/10201409/11/190512/20/1400.000-53/30/106017086/31/180508/32/7.7/40/2:10;0:30",

*   "address": {

*   "title": "Prof",

*   "salutation": "Mrs",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

},

*   "line_items": [

*   {

*   "id": "2d267f64-6b94-4109-818e-c54515837004",

*   "position": 0,

*   "title": "First line item title",

*   "tax_id": 15,

*   "tax_calc": 12.89,

*   "amount": 56.8,

*   "booking_account_id": 16

},

*   {

*   "id": "e33ecd04-188e-40b5-92eb-02f9efbf1b1c",

*   "position": 1,

*   "title": "Second line item title",

*   "tax_id": 15,

*   "tax_calc": 8.89,

*   "amount": 48.8,

*   "booking_account_id": 14

}

],

*   "discounts": [

*   {

*   "id": "8b102a32-5bef-462e-a41b-9c00197c26b9",

*   "position": 1,

*   "amount": 56.8

}

],

*   "payment": {

*   "type": "IBAN",

*   "bank_account_id": 12,

*   "fee": "BY_SENDER",

*   "execution_date": "2019-03-15",

*   "exchange_rate": 2.34553,

*   "amount": 3.9,

*   "iban": "CH121234567812345678900",

*   "name": "LeSS Organisation",

*   "address": "1147 Super Street",

*   "street": "Super Street",

*   "house_no": 1147,

*   "postcode": "9999",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "message": "This is a message.",

*   "booking_text": "Further education.",

*   "salary_payment": false,

*   "reference_no": "1212345675321984798456",

*   "note": "Some note text"

},

*   "attachment_ids": [

*   "e84b9fe2-3fe2-4fcf-8c30-298fe16adb14",

*   "aa9fc418-f292-49ad-9a35-9869123d1091"

]

}
```

Update Bill
-----------

Endpoint for updating Bill

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: 1d204702-00ba-447b-ad48-aefbfb1bf984 id of Bill to update |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| document_no | string [ 1 .. 255 ] characters |
| title | string [ 1 .. 80 ] characters |
| supplier_id required | integer  |
| vendor_ref | string [ 1 .. 255 ] characters |
| amount_man | number  required when 'manual_amount' is true. Maximum of 17 digits and maximum of 2 decimal digits. |
| amount_calc | number  required when 'manual_amount' is false. Maximum of 17 digits and maximum of 2 decimal digits. |
| manual_amount required | boolean Indicates whether 'amount_man' or 'amount_calc' is required and considered as bill amount |
| contact_partner_id required | integer  |
| bill_date required | string  |
| due_date required | string  |
| currency_code required | string [ 1 .. 20 ] characters |
| exchange_rate | number  required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 5 digits and maximum of 10 decimal digits. |
| item_net required | boolean |
| split_into_line_items required | boolean Indicates whether Bill has multiple items (true) or single item (false). By items it means 'line_items' and 'discounts'. |
| base_currency_amount | number  Maximum of 17 digits and maximum of 2 decimal digits. |
| attachment_ids required | Array of strings  [ items  ] |
| address required | object (address) Address |
| line_items required | Array of objects (updatelineItem) [ 1 .. 100 ] items Each of Line Item's 'id' must be unique (no duplicates) and already existing on the Bill or it should be null for creating new Line Item. When 'split_into_line_items' is false then there must be only 1 Line Item. |
| discounts required | Array of objects (discount) [ 0 .. 100 ] items Each of Discount's 'id' must be unique (no duplicates) and already existing on the Bill or it should be null for creating new Discount. When 'split_into_line_items' is false then there must 0 Discounts. |
| payment | object (payment) |

### Responses

**200**

Successful Bill update

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Bill with specified id was not found

put/4.0/purchase/bills/{id}

Live Server

<https://api.bexio.com/4.0/purchase/bills/{id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "document_no": "LR-12345",

*   "title": "Bill 42",

*   "supplier_id": 1323,

*   "vendor_ref": "Reference text",

*   "contact_partner_id": 647,

*   "bill_date": "2019-02-12",

*   "due_date": "2019-03-14",

*   "amount_man": 23.8,

*   "amount_calc": 23.83,

*   "manual_amount": true,

*   "currency_code": "CHF",

*   "exchange_rate": 2.3455354632,

*   "item_net": false,

*   "split_into_line_items": true,

*   "base_currency_amount": 63.23,

*   "attachment_ids": [

*   "e84b9fe2-3fe2-4fcf-8c30-298fe16adb14",

*   "aa9fc418-f292-49ad-9a35-9869123d1091"

],

*   "address": {

*   "title": "Prof",

*   "salutation": "Ms",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

},

*   "line_items": [

*   {

*   "id": "25eb990e-1758-4381-a621-ad57e44ad04c",

*   "position": 0,

*   "title": "First line item title",

*   "tax_id": 15,

*   "amount": 56.8,

*   "booking_account_id": 16

},

*   {

*   "id": "c0260c25-5f70-4428-b9e9-2edbf29f88f5",

*   "position": 1,

*   "title": "Second line item title",

*   "tax_id": 15,

*   "amount": 48.8,

*   "booking_account_id": 14

}

],

*   "discounts": [

*   {

*   "id": "8b102a32-5bef-462e-a41b-9c00197c26b9",

*   "position": 1,

*   "amount": 56.8

}

],

*   "payment": {

*   "type": "IBAN",

*   "bank_account_id": 12,

*   "fee": "BY_RECEIVER",

*   "execution_date": "2019-03-15",

*   "exchange_rate": 2.3455394678,

*   "amount": 3.9,

*   "account_no": 12345678125678900,

*   "iban": "CH121234567812345678900",

*   "name": "LeSS Organisation",

*   "address": "1147 Super Street",

*   "street": "Super Street",

*   "house_no": 1147,

*   "postcode": "9999",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "message": "This is a message.",

*   "booking_text": "Further education.",

*   "salary_payment": false,

*   "reference_no": "1212345675321984798456",

*   "note": "Some note text"

}

}
```

### Response samples

* 200
* 400
* 401
* 403
* 404

Content type

application/json

```
{

*   "id": "64bf865d-988a-496d-a24f-bab2d52e4b4a",

*   "document_no": "LR-12345",

*   "title": "Bill 42",

*   "status": "DRAFT",

*   "firstname_suffix": "LeSS",

*   "lastname_company": "Organisation",

*   "created_at": "2019-02-12T09:53:49",

*   "supplier_id": 1323,

*   "vendor_ref": "Reference text",

*   "contact_partner_id": 647,

*   "bill_date": "2019-02-12",

*   "due_date": "2019-03-14",

*   "pending_amount": 65.23,

*   "amount_man": 23.87,

*   "amount_calc": 23.9,

*   "manual_amount": true,

*   "currency_code": "USD",

*   "exchange_rate": 2.3455365492,

*   "base_currency_code": "USD",

*   "item_net": false,

*   "split_into_line_items": true,

*   "purchase_order_id": 637,

*   "base_currency_amount": 75.23,

*   "overdue": true,

*   "qr_bill_information": "//S1/10/10201409/11/190512/20/1400.000-53/30/106017086/31/180508/32/7.7/40/2:10;0:30",

*   "address": {

*   "title": "Prof",

*   "salutation": "Mrs",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

},

*   "line_items": [

*   {

*   "id": "2d267f64-6b94-4109-818e-c54515837004",

*   "position": 0,

*   "title": "First line item title",

*   "tax_id": 15,

*   "tax_calc": 12.89,

*   "amount": 56.8,

*   "booking_account_id": 16

},

*   {

*   "id": "e33ecd04-188e-40b5-92eb-02f9efbf1b1c",

*   "position": 1,

*   "title": "Second line item title",

*   "tax_id": 15,

*   "tax_calc": 8.89,

*   "amount": 48.8,

*   "booking_account_id": 14

}

],

*   "discounts": [

*   {

*   "id": "8b102a32-5bef-462e-a41b-9c00197c26b9",

*   "position": 1,

*   "amount": 56.8

}

],

*   "payment": {

*   "type": "IBAN",

*   "bank_account_id": 12,

*   "fee": "BY_SENDER",

*   "execution_date": "2019-03-15",

*   "exchange_rate": 2.34553,

*   "amount": 3.9,

*   "iban": "CH121234567812345678900",

*   "name": "LeSS Organisation",

*   "address": "1147 Super Street",

*   "street": "Super Street",

*   "house_no": 1147,

*   "postcode": "9999",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "message": "This is a message.",

*   "booking_text": "Further education.",

*   "salary_payment": false,

*   "reference_no": "1212345675321984798456",

*   "note": "Some note text"

},

*   "attachment_ids": [

*   "e84b9fe2-3fe2-4fcf-8c30-298fe16adb14",

*   "aa9fc418-f292-49ad-9a35-9869123d1091"

]

}
```

Delete Bill
-----------

Endpoint for deleting Bill by id. Bill can be removed when it is in status DRAFT only.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: 047e0179-89ea-499c-a427-62b1b9adbe7d id of Bill to delete |

### Responses

**204**

Bill deleted

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Bill with specified id was not found

delete/4.0/purchase/bills/{id}

Live Server

<https://api.bexio.com/4.0/purchase/bills/{id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/4.0/purchase/bills/{id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 401
* 403
* 404

Content type

application/json

```
{

*   "error_code": 401,

*   "message": "Invalid access token"

}
```

Update Bill status
------------------

Changing status to BOOKED
=========================

When changing status to BOOKED there are specific validations triggered:

1. Bill must be in status DRAFT.
2. 'amount\_man' is required and must be greater than 0 when 'manual\_amount' is true.
3. 'amount\_calc' is required and must be greater than 0 when 'manual\_amount' is false.
4. 'exchange\_rate' is required and must be greater than 0 when 'curency\_code' does not equal 'base\_currency\_code'.
5. 'base\_currency\_amount' is required and must be greater than 0 when 'curency\_code' does not equal 'base\_currency\_code'.
6. 'bill\_date' must be in existing Business Year that is not Closed and not Locked.
7. 'due\_date' must be after or equal to 'bill\_date'.
8. 'document\_no' cannot be blank and must be unique across all existing Bills in status other than DRAFT.
9. 'item\_net' cannot be set to 'true' when any of 'line\_items' 'tax\_id' is one of tax types that is ignorig vat:

* pre\_regards\_tax\_material
* pre\_regards\_tax\_investment
* pre\_customs\_tax\_material
* pre\_customs\_tax\_investment

1. 'line\_tems' total amount must be greater than 0.
2. 'booking\_account\_id' is required for each 'line\_item'. And this Booking Account:

* Cannot be a system asset account (account type ID 3, is\_locked true)
* Cannot be a system liability account (account type ID 4, is\_locked true) with the exception of account 2201
* Cannot be a system complete account (account type ID 5, is\_locked true)

1. 'line\_item' amount cannot be less or equal to 0 when 'tax\_id' is one of types:

* pre\_customs\_tax\_investment
* pre\_customs\_tax\_material
* pre\_regards\_tax\_investment
* pre\_regards\_tax\_material

1. 'line\_item' 'tax\_id' validation:

* when Bill is not subject to Vat then 'tax\_id' must be null
* Tax cannot have 'digit' set to one of:
* 415
* 420
* when Bill's Calendar Year has Effective Vat accounting method then Tax type must be one of:
* pre\_tax\_material
* pre\_tax\_investment
* pre\_customs\_tax\_investment
* pre\_customs\_tax\_material
* pre\_regards\_tax\_material
* pre\_regards\_tax\_investment
* when Bill's Calendar Year does not have Effective Vat accounting method then 'tax\_id' is not required
* when Bill's Calendar Year does not have Effective Vat accounting method then Tax type must be one of:
* pre\_regards\_tax\_material
* pre\_regards\_tax\_investment

1. 'discounts' total amount must be less than 'line\_items' total amount.
2. Each 'discount' amount must be greater than 0.
3. 'discounts' must be empty when there is 'line\_item' with amount less or equal to 0.
4. 'discounts' must be empty when there is 'line\_item' with 'tax\_id' being one of types rejecting discounts:

* pre\_customs\_tax\_material
* pre\_customs\_tax\_investment

1. 'address.lastname\_company' cannot be null or empty

Changing status to DRAFT
========================

When changing status to DRAFT there are specific validations triggered:

1. Bill must be in status BOOKED.
2. 'bill\_date' must be in existing Business Year that is not Closed and not Locked.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: 166dcef6-91c8-487f-b135-64dbf9d395a7 id of Bill to update |
| status required | string Enum: "DRAFT" "BOOKED" Example: BOOKED Bill status to update to |

### Responses

**200**

Successful Bill update

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Bill with specified id was not found

put/4.0/purchase/bills/{id}/bookings/{status}

Live Server

<https://api.bexio.com/4.0/purchase/bills/{id}/bookings/{status}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X PUT \\
<https://api.bexio.com/4.0/purchase/bills/{id}/bookings/{status}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 401
* 403
* 404

Content type

application/json

```
{

*   "id": "64bf865d-988a-496d-a24f-bab2d52e4b4a",

*   "document_no": "LR-12345",

*   "title": "Bill 42",

*   "status": "DRAFT",

*   "firstname_suffix": "LeSS",

*   "lastname_company": "Organisation",

*   "created_at": "2019-02-12T09:53:49",

*   "supplier_id": 1323,

*   "vendor_ref": "Reference text",

*   "contact_partner_id": 647,

*   "bill_date": "2019-02-12",

*   "due_date": "2019-03-14",

*   "pending_amount": 65.23,

*   "amount_man": 23.87,

*   "amount_calc": 23.9,

*   "manual_amount": true,

*   "currency_code": "USD",

*   "exchange_rate": 2.3455365492,

*   "base_currency_code": "USD",

*   "item_net": false,

*   "split_into_line_items": true,

*   "purchase_order_id": 637,

*   "base_currency_amount": 75.23,

*   "overdue": true,

*   "qr_bill_information": "//S1/10/10201409/11/190512/20/1400.000-53/30/106017086/31/180508/32/7.7/40/2:10;0:30",

*   "address": {

*   "title": "Prof",

*   "salutation": "Mrs",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

},

*   "line_items": [

*   {

*   "id": "2d267f64-6b94-4109-818e-c54515837004",

*   "position": 0,

*   "title": "First line item title",

*   "tax_id": 15,

*   "tax_calc": 12.89,

*   "amount": 56.8,

*   "booking_account_id": 16

},

*   {

*   "id": "e33ecd04-188e-40b5-92eb-02f9efbf1b1c",

*   "position": 1,

*   "title": "Second line item title",

*   "tax_id": 15,

*   "tax_calc": 8.89,

*   "amount": 48.8,

*   "booking_account_id": 14

}

],

*   "discounts": [

*   {

*   "id": "8b102a32-5bef-462e-a41b-9c00197c26b9",

*   "position": 1,

*   "amount": 56.8

}

],

*   "payment": {

*   "type": "IBAN",

*   "bank_account_id": 12,

*   "fee": "BY_SENDER",

*   "execution_date": "2019-03-15",

*   "exchange_rate": 2.34553,

*   "amount": 3.9,

*   "iban": "CH121234567812345678900",

*   "name": "LeSS Organisation",

*   "address": "1147 Super Street",

*   "street": "Super Street",

*   "house_no": 1147,

*   "postcode": "9999",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "message": "This is a message.",

*   "booking_text": "Further education.",

*   "salary_payment": false,

*   "reference_no": "1212345675321984798456",

*   "note": "Some note text"

},

*   "attachment_ids": [

*   "e84b9fe2-3fe2-4fcf-8c30-298fe16adb14",

*   "aa9fc418-f292-49ad-9a35-9869123d1091"

]

}
```

Execute Bill action
-------------------

Endpoint for executing actions for Bill

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: 96c5e76f-8b85-487b-bcfb-b9d2ebf92fcf Id of a Bill for which action will be executed |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| action required | string Value: "DUPLICATE" |

### Responses

**200**

Successful Bill action execution

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Bill with specified id was not found

post/4.0/purchase/bills/{id}/actions

Live Server

<https://api.bexio.com/4.0/purchase/bills/{id}/actions>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "action": "DUPLICATE"

}
```

### Response samples

* 200
* 400
* 401
* 403
* 404

Content type

application/json

```
{

*   "id": "64bf865d-988a-496d-a24f-bab2d52e4b4a",

*   "document_no": "LR-12345",

*   "title": "Bill 42",

*   "status": "DRAFT",

*   "firstname_suffix": "LeSS",

*   "lastname_company": "Organisation",

*   "created_at": "2019-02-12T09:53:49",

*   "supplier_id": 1323,

*   "vendor_ref": "Reference text",

*   "contact_partner_id": 647,

*   "bill_date": "2019-02-12",

*   "due_date": "2019-03-14",

*   "pending_amount": 65.23,

*   "amount_man": 23.87,

*   "amount_calc": 23.9,

*   "manual_amount": true,

*   "currency_code": "USD",

*   "exchange_rate": 2.3455365492,

*   "base_currency_code": "USD",

*   "item_net": false,

*   "split_into_line_items": true,

*   "purchase_order_id": 637,

*   "base_currency_amount": 75.23,

*   "overdue": true,

*   "qr_bill_information": "//S1/10/10201409/11/190512/20/1400.000-53/30/106017086/31/180508/32/7.7/40/2:10;0:30",

*   "address": {

*   "title": "Prof",

*   "salutation": "Mrs",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

},

*   "line_items": [

*   {

*   "id": "2d267f64-6b94-4109-818e-c54515837004",

*   "position": 0,

*   "title": "First line item title",

*   "tax_id": 15,

*   "tax_calc": 12.89,

*   "amount": 56.8,

*   "booking_account_id": 16

},

*   {

*   "id": "e33ecd04-188e-40b5-92eb-02f9efbf1b1c",

*   "position": 1,

*   "title": "Second line item title",

*   "tax_id": 15,

*   "tax_calc": 8.89,

*   "amount": 48.8,

*   "booking_account_id": 14

}

],

*   "discounts": [

*   {

*   "id": "8b102a32-5bef-462e-a41b-9c00197c26b9",

*   "position": 1,

*   "amount": 56.8

}

],

*   "payment": {

*   "type": "IBAN",

*   "bank_account_id": 12,

*   "fee": "BY_SENDER",

*   "execution_date": "2019-03-15",

*   "exchange_rate": 2.34553,

*   "amount": 3.9,

*   "iban": "CH121234567812345678900",

*   "name": "LeSS Organisation",

*   "address": "1147 Super Street",

*   "street": "Super Street",

*   "house_no": 1147,

*   "postcode": "9999",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "message": "This is a message.",

*   "booking_text": "Further education.",

*   "salary_payment": false,

*   "reference_no": "1212345675321984798456",

*   "note": "Some note text"

},

*   "attachment_ids": [

*   "e84b9fe2-3fe2-4fcf-8c30-298fe16adb14",

*   "aa9fc418-f292-49ad-9a35-9869123d1091"

]

}
```

Validate whether document number is available or not
----------------------------------------------------

Endpoint for retrieving validation for document number

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| document_no required | string

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/purchase/bills/{id}/actions> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 401
* 403

Content type

application/json

```
{

*   "valid": false,

*   "next_available_no": "AB-1235"

}
```

Expenses
--------

Get Expenses
------------

Endpoint for retrieving Expenses

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer Default: 100 Example: limit=45 results per page |
| page | integer Default: 1 Example: page=2 current page |
| order | string Default: "asc" Example: order=asc&order=desc sorting order |
| sort | string Example: sort=document_no field to sort by |
| vendor | string Example: vendor=bexio ag filter for Expense 'vendor', text containing in fields lastname_company and firstname_suffix |
| gross_min | number  Example: gross_min=438.32 filter for Expense 'gross', the lowest accepted value |
| gross_max | number  Example: gross_max=465.75 filter for Expense 'gross', the greatest accepted value |
| net_min | number  Example: net_min=438.32 filter for Expense 'net', the lowest accepted value |
| net_max | number  Example: net_max=465.75 filter for Expense 'net', the greatest accepted value |
| paid_on_start | string  Example: paid_on_start=2019-04-19 filter for Expense 'paid_on', the earliest accepted date |
| paid_on_end | string  Example: paid_on_end=2019-04-27 filter for Expense 'paid_on', the latest accepted date |
| created_at_start | string  Example: created_at_start=2020-01-24T13:08:01+0000 filter for Expense 'created_at', the earliest accepted date |
| created_at_end | string  Example: created_at_end=2020-01-27T13:08:01+0000 filter for Expense 'created_at', the latest accepted date |
| title | string Example: title=Some Title filter for Expense 'title', text containing in field |
| currency_code | string Example: currency_code=CHF filter for Expense 'currency_code', text containing in field |
| document_no | string Example: document_no=DC-123 filter for Expense 'document_no', text containing in field |
| supplier_id | integer Example: supplier_id=1234 filter for Expense 'supplier_id' |
| project_id | string  Example: project_id=1a1864c0-ba80-46a8-ad89-ffd128db9456 filter for Expense 'project_id' |

### Responses

**200**

Expenses retrieved

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

get/4.0/expenses

Live Server

<https://api.bexio.com/4.0/expenses>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/expenses> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 401
* 403

Content type

application/json

```
{

*   "data": [

*   {

*   "id": "e27be5f4-c8db-4193-92f3-1c6f1dc98f1b",

*   "created_at": "2019-03-23T09:53:49+0000",

*   "document_no": "NO-1",

*   "status": "DRAFT",

*   "firstname_suffix": "John",

*   "lastname_company": "Doe",

*   "vendor": "John Doe",

*   "title": "Title 1",

*   "currency_code": "CHF",

*   "paid_on": "2019-03-07",

*   "booking_account_id": 387,

*   "net": 26.65,

*   "gross": 29.43,

*   "project_id": "c14aa91c-b4f5-43ca-ae2a-882f94cd40f4",

*   "chargeable_contact_id": 4,

*   "transaction_id": "b388a4da-7085-475a-87a0-a2acb4d8d68f",

*   "invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",

*   "attachment_ids": [

*   "60dd4dfa-24a3-4114-a934-108380789edc",

*   "a3161942-1b1d-42c1-816d-dc44cd53c7e6"

]

},

*   {

*   "id": "dd6d20f4-8c77-45ba-952f-84948798c79b",

*   "created_at": "2019-05-23T09:53:49+0000",

*   "document_no": "NO-3",

*   "status": "DONE",

*   "vendor_ref": "Vendor 2",

*   "firstname_suffix": "James",

*   "lastname_company": "Doe",

*   "vendor": "James Doe",

*   "title": "Title 2",

*   "currency_code": "USD",

*   "paid_on": "2018-02-07",

*   "booking_account_id": 7,

*   "net": 31.39,

*   "gross": 50.44,

*   "project_id": "1a1864c0-ba80-46a8-ad89-ffd128db9456",

*   "chargeable_contact_id": 7,

*   "transaction_id": "771590b0-a794-461f-a375-886e4634b618",

*   "invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",

*   "attachment_ids": [

*   "06573f59-01a2-493d-9876-462deda4cee3",

*   "a230f087-f742-4259-925e-cf3abea5e6bf"

]

}

],

*   "paging": {

*   "page": 1,

*   "page_size": 10,

*   "page_count": 50,

*   "item_count": 300

}

}
```

Create new Expense
------------------

Endpoint for creating Expense

##### Authorizations

_bearerAuth_

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| paid_on required | string  |
| currency_code required | string [ 1 .. 20 ] characters |
| supplier_id | integer  |
| title | string [ 1 .. 80 ] characters |
| bank_account_id | integer  |
| booking_account_id | integer  |
| amount required | number  >= 0 Maximum of 17 digits and maximum of 2 decimal digits. |
| tax_id | integer  |
| exchange_rate | number  required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 5 digits and maximum of 10 decimal digits. |
| base_currency_amount | number  >= 0 required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 17 digits and maximum of 2 decimal digits. |
| attachment_ids required | Array of strings  [ items  ] List of file ids that should be attached to this Expense. Cannot have duplicates. |
| address | object (address) Address |

### Responses

**201**

Successful Expense creation

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

post/4.0/expenses

Live Server

<https://api.bexio.com/4.0/expenses>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "paid_on": "2019-03-20",

*   "currency_code": "CHF",

*   "exchange_rate": 1.5243546497,

*   "supplier_id": 123,

*   "title": "Expense 42",

*   "bank_account_id": 5,

*   "booking_account_id": 16,

*   "amount": 80.54,

*   "tax_id": 15,

*   "base_currency_amount": 167.87,

*   "attachment_ids": [

*   "3c570a07-1fa1-41e7-a761-0f486dfc01f6",

*   "138c5618-744c-4c05-b504-c034ccf5f7d9"

],

*   "address": {

*   "title": "Prof",

*   "salutation": "Ms",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

}

}
```

### Response samples

* 201
* 400
* 401
* 403

Content type

application/json

```
{

*   "id": "759b0915-4787-4151-9a81-6e7499d26bee",

*   "document_no": "123",

*   "title": "Some Title",

*   "status": "DRAFT",

*   "firstname_suffix": "Less",

*   "lastname_company": "Organisation",

*   "created_at": "2019-03-23T09:53:49+0000",

*   "supplier_id": null,

*   "paid_on": "2019-03-20",

*   "bank_account_id": 3,

*   "booking_account_id": 4,

*   "currency_code": "CHF",

*   "base_currency_code": "USD",

*   "exchange_rate": 1.4123567431,

*   "amount": 30.9,

*   "tax_man": 1.14,

*   "tax_calc": 3.45,

*   "tax_id": 6,

*   "base_currency_amount": 24.84,

*   "transaction_id": null,

*   "invoice_id": null,

*   "project_id": null,

*   "attachment_ids": [

*   "3c570a07-1fa1-41e7-a761-0f486dfc01f6",

*   "138c5618-744c-4c05-b504-c034ccf5f7d9"

],

*   "address": {

*   "title": "Prof",

*   "salutation": "Mrs",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

}

}
```

Get Expense
-----------

Endpoint for retrieving Expense by id

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: 170a3a1e-df4d-4153-abdf-3a8670efd0e7 id of Expense to retrieve |

### Responses

**200**

Expense retrieved

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Expense with specified id was not found

get/4.0/expenses/{id}

Live Server

<https://api.bexio.com/4.0/expenses/{id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/expenses/{id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 401
* 403
* 404

Content type

application/json

```
{

*   "id": "1355499f-aa07-4382-887e-acaf0323e6f6",

*   "document_no": "123",

*   "title": "Some Title",

*   "status": "DRAFT",

*   "firstname_suffix": "Less",

*   "lastname_company": "Organisation",

*   "created_at": "2019-03-23T09:53:49+0000",

*   "supplier_id": 1,

*   "paid_on": "2019-03-20",

*   "bank_account_id": 3,

*   "booking_account_id": 4,

*   "currency_code": "CHF",

*   "base_currency_code": "USD",

*   "exchange_rate": 1.4355684751,

*   "amount": 30.9,

*   "tax_man": 1.14,

*   "tax_calc": 3.45,

*   "tax_id": 6,

*   "base_currency_amount": 24.84,

*   "transaction_id": "b4229af3-a20f-4f68-b513-db651dd2c2ea",

*   "invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",

*   "project_id": "1a1864c0-ba80-46a8-ad89-ffd128db9456",

*   "attachment_ids": [

*   "06573f59-01a2-493d-9876-462deda4cee3",

*   "a230f087-f742-4259-925e-cf3abea5e6bf"

],

*   "address": {

*   "title": "Prof",

*   "salutation": "Mrs",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

}

}
```

Update Expense
--------------

Endpoint for updating Expense

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: b057613b-ba1a-4f4d-a55c-d88eb605c922 id of Expense to update |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| paid_on required | string  |
| currency_code required | string [ 1 .. 20 ] characters |
| exchange_rate | number  required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 5 digits and maximum of 10 decimal digits. |
| supplier_id | integer  |
| document_no | string [ 1 .. 255 ] characters |
| title | string [ 1 .. 80 ] characters |
| bank_account_id | integer  |
| booking_account_id | integer  |
| amount required | number  >= 0 Maximum of 17 digits and maximum of 2 decimal digits. |
| tax_id | integer  |
| base_currency_amount | number  Maximum of 17 digits and maximum of 2 decimal digits. |
| attachment_ids required | Array of strings  [ items  ] List of file ids that should be attached to this Expense. Cannot have duplicates. |
| address | object (address) Address |

### Responses

**200**

Successful Expense update

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Expense with specified id was not found

put/4.0/expenses/{id}

Live Server

<https://api.bexio.com/4.0/expenses/{id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "currency_code": "CHF",

*   "exchange_rate": 1.5497651324,

*   "paid_on": "2019-03-20",

*   "supplier_id": 123,

*   "document_no": "LR-12345",

*   "title": "Expense 42",

*   "bank_account_id": 5,

*   "booking_account_id": 16,

*   "amount": 80.54,

*   "tax_id": 15,

*   "base_currency_amount": 167.87,

*   "attachment_ids": [

*   "06573f59-01a2-493d-9876-462deda4cee3",

*   "a230f087-f742-4259-925e-cf3abea5e6bf"

],

*   "address": {

*   "title": "Prof",

*   "salutation": "Ms",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

}

}
```

### Response samples

* 200
* 400
* 401
* 403
* 404

Content type

application/json

```
{

*   "id": "1355499f-aa07-4382-887e-acaf0323e6f6",

*   "document_no": "123",

*   "title": "Some Title",

*   "status": "DRAFT",

*   "firstname_suffix": "Less",

*   "lastname_company": "Organisation",

*   "created_at": "2019-03-23T09:53:49+0000",

*   "supplier_id": 1,

*   "paid_on": "2019-03-20",

*   "bank_account_id": 3,

*   "booking_account_id": 4,

*   "currency_code": "CHF",

*   "base_currency_code": "USD",

*   "exchange_rate": 1.4355684751,

*   "amount": 30.9,

*   "tax_man": 1.14,

*   "tax_calc": 3.45,

*   "tax_id": 6,

*   "base_currency_amount": 24.84,

*   "transaction_id": "b4229af3-a20f-4f68-b513-db651dd2c2ea",

*   "invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",

*   "project_id": "1a1864c0-ba80-46a8-ad89-ffd128db9456",

*   "attachment_ids": [

*   "06573f59-01a2-493d-9876-462deda4cee3",

*   "a230f087-f742-4259-925e-cf3abea5e6bf"

],

*   "address": {

*   "title": "Prof",

*   "salutation": "Mrs",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

}

}
```

Delete Expense
--------------

Endpoint for deleting Expense by id. Expense cannot be removed when it is DONE.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: d00b2005-a52f-4d7b-ad72-217d549d9734 id of Expense to delete |

### Responses

**204**

Expense deleted

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Expense with specified id was not found

delete/4.0/expenses/{id}

Live Server

<https://api.bexio.com/4.0/expenses/{id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/4.0/expenses/{id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 401
* 403
* 404

Content type

application/json

```
{

*   "error_code": 401,

*   "message": "Invalid access token"

}
```

Update Expense status
---------------------

Changing status from DRAFT to DONE
==================================

When changing status to DONE there are specific validations triggered:

1. 'bank\_account\_id' is required.
2. 'base\_currency\_amount' is required when 'curency\_code' does not equal 'base\_currency\_code' and must be greater than 0.
3. 'booking\_account\_id' is required. And this Booking Account:

* Cannot be a system asset account (account type ID 3, is\_locked true)
* Cannot be a system liability account (account type ID 4, is\_locked true)
* Cannot be a system complete account (account type ID 5, is\_locked true)

1. 'document\_no' cannot be blank and must be unique across all existing Expenses in DONE status.
2. 'exchange\_rate' is required when 'curency\_code' does not equal 'base\_currency\_code' and must be greater than 0.
3. 'amount' must be greater than 0.
4. 'tax\_id' validation:

* when Expense is not subject to Vat then 'tax\_id' must be null
* Tax cannot have 'digit' set to one of:
* 415
* 420
* when Expense's Calendar Year has Effective Vat accounting method then Tax type must be one of:
* pre\_tax\_material
* pre\_tax\_investment
* pre\_customs\_tax\_investment
* pre\_customs\_tax\_material
* pre\_regards\_tax\_material
* pre\_regards\_tax\_investment
* when Expense's Calendar Year does not have Effective Vat accounting method then 'tax\_id' is not required
* when Expense's Calendar Year does not have Effective Vat accounting method then Tax type must be one of:
* pre\_regards\_tax\_material
* pre\_regards\_tax\_investment

1. 'paid\_on' must be in existing Business Year that is not Closed and not Locked.
2. If 'supplier\_id' is set then 'address' cannot be null.
3. If 'aupplier\_id' is not set then 'address' must be null.
4. If 'address' is set then 'address.lastname\_company' cannot be null or empty

Changing status from DONE to DRAFT
==================================

When changing status to DRAFT there are specific validations triggered:

1. 'paid\_on' date must be in existing Business Year that is not Closed and not Locked.
2. Expense cannot be linked to an Invoice ('invoice\_id' must be null).
3. Expense cannot be reconciled with any Transaction ('transaction\_id' must be null).

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: f0cc58cb-3b71-42c7-b28b-aeed4aa0493f Id of Expense to update |
| status required | string Enum: "DRAFT" "DONE" Example: DONE Expense status to update to |

### Responses

**200**

Successful Expense update

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Expense with specified id was not found

put/4.0/expenses/{id}/bookings/{status}

Live Server

<https://api.bexio.com/4.0/expenses/{id}/bookings/{status}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X PUT \\
<https://api.bexio.com/4.0/expenses/{id}/bookings/{status}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 401
* 403
* 404

Content type

application/json

```
{

*   "id": "1355499f-aa07-4382-887e-acaf0323e6f6",

*   "document_no": "123",

*   "title": "Some Title",

*   "status": "DRAFT",

*   "firstname_suffix": "Less",

*   "lastname_company": "Organisation",

*   "created_at": "2019-03-23T09:53:49+0000",

*   "supplier_id": 1,

*   "paid_on": "2019-03-20",

*   "bank_account_id": 3,

*   "booking_account_id": 4,

*   "currency_code": "CHF",

*   "base_currency_code": "USD",

*   "exchange_rate": 1.4355684751,

*   "amount": 30.9,

*   "tax_man": 1.14,

*   "tax_calc": 3.45,

*   "tax_id": 6,

*   "base_currency_amount": 24.84,

*   "transaction_id": "b4229af3-a20f-4f68-b513-db651dd2c2ea",

*   "invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",

*   "project_id": "1a1864c0-ba80-46a8-ad89-ffd128db9456",

*   "attachment_ids": [

*   "06573f59-01a2-493d-9876-462deda4cee3",

*   "a230f087-f742-4259-925e-cf3abea5e6bf"

],

*   "address": {

*   "title": "Prof",

*   "salutation": "Mrs",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

}

}
```

Execute Expense action
----------------------

Endpoint for executing actions for Expense

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: 96c5e76f-8b85-487b-bcfb-b9d2ebf92fcf id of Expense for which action will be executed |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| action required | string Value: "DUPLICATE" |

### Responses

**200**

Successful Expense action execution

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Expense with specified id was not found

post/4.0/expenses/{id}/actions

Live Server

<https://api.bexio.com/4.0/expenses/{id}/actions>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "action": "DUPLICATE"

}
```

### Response samples

* 200
* 400
* 401
* 403
* 404

Content type

application/json

```
{

*   "id": "1355499f-aa07-4382-887e-acaf0323e6f6",

*   "document_no": "123",

*   "title": "Some Title",

*   "status": "DRAFT",

*   "firstname_suffix": "Less",

*   "lastname_company": "Organisation",

*   "created_at": "2019-03-23T09:53:49+0000",

*   "supplier_id": 1,

*   "paid_on": "2019-03-20",

*   "bank_account_id": 3,

*   "booking_account_id": 4,

*   "currency_code": "CHF",

*   "base_currency_code": "USD",

*   "exchange_rate": 1.4355684751,

*   "amount": 30.9,

*   "tax_man": 1.14,

*   "tax_calc": 3.45,

*   "tax_id": 6,

*   "base_currency_amount": 24.84,

*   "transaction_id": "b4229af3-a20f-4f68-b513-db651dd2c2ea",

*   "invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",

*   "project_id": "1a1864c0-ba80-46a8-ad89-ffd128db9456",

*   "attachment_ids": [

*   "06573f59-01a2-493d-9876-462deda4cee3",

*   "a230f087-f742-4259-925e-cf3abea5e6bf"

],

*   "address": {

*   "title": "Prof",

*   "salutation": "Mrs",

*   "firstname_suffix": "John",

*   "lastname_company": "Newman",

*   "address_line": "Mega Street",

*   "postcode": "6694",

*   "city": "Tel Aviv",

*   "country_code": "CH",

*   "main_contact_id": 45,

*   "contact_address_id": 827,

*   "type": "PRIVATE"

}

}
```

Validate whether document number is available or not
----------------------------------------------------

Endpoint for retrieving validation for document number

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| document_no required | string

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/expenses/{id}/actions> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 401
* 403

Content type

application/json

```
{

*   "valid": false,

*   "next_available_no": "AB-1235"

}
```

Purchase Orders
---------------

Fetch a list of purchase orders
-------------------------------

This action fetches a list of article orders

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "total" "total_net" "total_gross" "updated_at" Example: order_by=total Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/purchase\_orders

Live Server

<https://api.bexio.com/3.0/purchase_orders>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/purchase_orders> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "document_nr": "RE-00001",

*   "kb_payment_template_id": 1,

*   "payment_type_id": 1,

*   "title": "purchase order example title",

*   "contact_id": 14,

*   "contact_sub_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "user_id": 1,

*   "project_id": 1,

*   "logopaper_id": 1,

*   "language": {

*   "id": 1,

*   "name": "Deutsch",

*   "decimalpoint": ".",

*   "thousandsseparator": "'",

*   "iso_639_1": "de",

*   "date_format": "d.m.Y"

},

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency": {

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05

},

*   "currency_id": 1,

*   "header": "We would like to order the following products:",

*   "footer": "Many thanks for the fast processing of our order.",

*   "total_rounding_difference": -0.02,

*   "mwst_type": "included",

*   "mwst_is_net": true,

*   "is_compact_view": false,

*   "show_position_taxes": false,

*   "salesman_user_id": 1,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "delivery_address_type": "contact_address",

*   "contact_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "delivery_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "nb_decimals_amount": 2,

*   "nb_decimals_price": 2,

*   "kb_item_status_id": 22,

*   "terms_of_payment_text": "Payable within 30 days",

*   "reference": "Based on Quote Q-3860",

*   "api_reference": null,

*   "mail": "[email protected]",

*   "viewed_by_client_at": "2020-07-24",

*   "is_valid_until": "2019-07-24",

*   "created_at": "2020-04-28T19:58:58+00:00",

*   "updated_at": "2020-04-30T19:58:58+00:00",

*   "custom_translations": { },

*   "date_format": "d.m.Y"

}

]
```

Create a purchase order
-----------------------

This action creates a new purchase order

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| id | integer  The id of the purchase order |
| document_nr | string |
| kb_payment_template_id | integer or null |
| payment_type_id | integer References a payment type object |
| title | string or null |
| contact_id | integer References a contact object |
| contact_sub_id | integer or null References a contact object |
| template_slug | string or null |
| user_id | integer References a user object |
| project_id | integer or null References a project object |
| logopaper_id | integer |
| language | object (Language) |
| language_id | integer References a language object |
| bank_account_id | integer References a bank account object |
| currency | object (Currency) |
| currency_id | integer References a currency object |
| header | string or null |
| footer | string or null |
| mwst_type | string Enum: "included" "excluded" "exempt" Possible values are included - included means that the tax is included in the total priceexcluded - excluded means that the tax is excluded from the total priceexempt - exempt means that no tax is charged |
| mwst_is_net | boolean This value affects the total if the field mwst_type has been set to 0. false = Taxes are included in the total true = Taxes will be added to the total |
| is_compact_view | boolean |
| show_position_taxes | boolean |
| salesman_user_id | integer or null References a user object |
| is_valid_from | string  |
| is_valid_to | string  |
| delivery_address_type | string Enum: "contact_address" "manual" |
| contact_address_manual | string  Default: 2 The maximum number of decimal digits to display for amounts (number of items). |
| nb_decimals_price | integer  Default: 2 The maximum number of decimal digits to display for prices (line item prices, totals, etc.). |
| terms_of_payment_text | string or null  |
| created_at | string  Creation date of the purchase order |
| updated_at | string  Last time when purchase order was updated |
| custom_translations | object |
| date_format | string |
| positions | object A purchase order can have multiple line items (positions). Please note that the line items must be grouped by required , optional and discount positions. |

### Responses

**201**

Created

**422**

Validation error

post/3.0/purchase\_orders

Live Server

<https://api.bexio.com/3.0/purchase_orders>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "id": 1,

*   "document_nr": "RE-00001",

*   "kb_payment_template_id": 1,

*   "payment_type_id": 1,

*   "title": "purchase order example title",

*   "contact_id": 14,

*   "contact_sub_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "user_id": 1,

*   "project_id": 1,

*   "logopaper_id": 1,

*   "language": {

*   "id": 1,

*   "name": "Deutsch",

*   "decimalpoint": ".",

*   "thousandsseparator": "'",

*   "iso_639_1": "de",

*   "date_format": "d.m.Y"

},

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency": {

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05

},

*   "currency_id": 1,

*   "header": "We would like to order the following products:",

*   "footer": "Many thanks for the fast processing of our order.",

*   "mwst_type": "included",

*   "mwst_is_net": true,

*   "is_compact_view": false,

*   "show_position_taxes": false,

*   "salesman_user_id": 1,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "delivery_address_type": "contact_address",

*   "contact_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "delivery_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "nb_decimals_amount": 2,

*   "nb_decimals_price": 2,

*   "terms_of_payment_text": "Payable within 30 days",

*   "reference": "Based on Quote Q-3860",

*   "api_reference": null,

*   "mail": "[email protected]",

*   "is_valid_until": "2019-07-24",

*   "created_at": "2020-04-28T19:58:58+00:00",

*   "updated_at": "2020-04-30T19:58:58+00:00",

*   "custom_translations": { },

*   "date_format": "d.m.Y",

*   "positions": {

*   "required": [

*   {

*   "type": "text",

*   "pos": null,

*   "is_optional": false,

*   "id": 1,

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false

}

],

*   "optional": [

*   {

*   "type": "text",

*   "pos": null,

*   "is_optional": false,

*   "id": 1,

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false

}

],

*   "discount": [

*   {

*   "type": "discount",

*   "pos": null,

*   "is_optional": false,

*   "id": 1,

*   "text": "Partner discount",

*   "is_percentual": true,

*   "value": 10,

*   "discount_total": 1.78

}

]

}

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "document_nr": "RE-00001",

*   "kb_payment_template_id": 1,

*   "payment_type_id": 1,

*   "title": "purchase order example title",

*   "contact_id": 14,

*   "contact_sub_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "user_id": 1,

*   "project_id": 1,

*   "logopaper_id": 1,

*   "language": {

*   "id": 1,

*   "name": "Deutsch",

*   "decimalpoint": ".",

*   "thousandsseparator": "'",

*   "iso_639_1": "de",

*   "date_format": "d.m.Y"

},

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency": {

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05

},

*   "currency_id": 1,

*   "header": "We would like to order the following products:",

*   "footer": "Many thanks for the fast processing of our order.",

*   "total_rounding_difference": -0.02,

*   "mwst_type": "included",

*   "mwst_is_net": true,

*   "is_compact_view": false,

*   "show_position_taxes": false,

*   "salesman_user_id": 1,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "delivery_address_type": "contact_address",

*   "contact_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "delivery_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "nb_decimals_amount": 2,

*   "nb_decimals_price": 2,

*   "kb_item_status_id": 22,

*   "terms_of_payment_text": "Payable within 30 days",

*   "reference": "Based on Quote Q-3860",

*   "api_reference": null,

*   "mail": "[email protected]",

*   "viewed_by_client_at": "2020-07-24",

*   "is_valid_until": "2019-07-24",

*   "created_at": "2020-04-28T19:58:58+00:00",

*   "updated_at": "2020-04-30T19:58:58+00:00",

*   "custom_translations": { },

*   "date_format": "d.m.Y",

*   "positions": {

*   "required": [

*   {

*   "type": "text",

*   "pos": null,

*   "is_optional": false,

*   "id": 1,

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false

}

],

*   "optional": [

*   {

*   "type": "text",

*   "pos": null,

*   "is_optional": false,

*   "id": 1,

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false

}

],

*   "discount": [

*   {

*   "type": "discount",

*   "pos": null,

*   "is_optional": false,

*   "id": 1,

*   "text": "Partner discount",

*   "is_percentual": true,

*   "value": 10,

*   "discount_total": 1.78

}

]

}

}
```

Fetch a single purchase order
-----------------------------

This action fetches a single purchase order

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| purchase_order_id required | integer  Example: 1 the id of the purchase order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/purchase\_orders/{purchase\_order\_id}

Live Server

<https://api.bexio.com/3.0/purchase_orders/{purchase_order_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/purchase_orders/{purchase_order_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "document_nr": "RE-00001",

*   "kb_payment_template_id": 1,

*   "payment_type_id": 1,

*   "title": "purchase order example title",

*   "contact_id": 14,

*   "contact_sub_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "user_id": 1,

*   "project_id": 1,

*   "logopaper_id": 1,

*   "language": {

*   "id": 1,

*   "name": "Deutsch",

*   "decimalpoint": ".",

*   "thousandsseparator": "'",

*   "iso_639_1": "de",

*   "date_format": "d.m.Y"

},

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency": {

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05

},

*   "currency_id": 1,

*   "header": "We would like to order the following products:",

*   "footer": "Many thanks for the fast processing of our order.",

*   "total_rounding_difference": -0.02,

*   "mwst_type": "included",

*   "mwst_is_net": true,

*   "is_compact_view": false,

*   "show_position_taxes": false,

*   "salesman_user_id": 1,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "delivery_address_type": "contact_address",

*   "contact_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "delivery_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "nb_decimals_amount": 2,

*   "nb_decimals_price": 2,

*   "kb_item_status_id": 22,

*   "terms_of_payment_text": "Payable within 30 days",

*   "reference": "Based on Quote Q-3860",

*   "api_reference": null,

*   "mail": "[email protected]",

*   "viewed_by_client_at": "2020-07-24",

*   "is_valid_until": "2019-07-24",

*   "created_at": "2020-04-28T19:58:58+00:00",

*   "updated_at": "2020-04-30T19:58:58+00:00",

*   "custom_translations": { },

*   "date_format": "d.m.Y"

}
```

Update a single purchase order
------------------------------

This action updates a purchase order.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| purchase_order_id required | integer  Example: 1 the id of the purchase order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| id | integer  The id of the purchase order |
| document_nr | string |
| kb_payment_template_id | integer or null |
| payment_type_id | integer References a payment type object |
| title | string or null |
| contact_id | integer References a contact object |
| contact_sub_id | integer or null References a contact object |
| template_slug | string or null |
| user_id | integer References a user object |
| project_id | integer or null References a project object |
| logopaper_id | integer |
| language | object (Language) |
| language_id | integer References a language object |
| bank_account_id | integer References a bank account object |
| currency | object (Currency) |
| currency_id | integer References a currency object |
| header | string or null |
| footer | string or null |
| mwst_type | string Enum: "included" "excluded" "exempt" Possible values are included - included means that the tax is included in the total priceexcluded - excluded means that the tax is excluded from the total priceexempt - exempt means that no tax is charged |
| mwst_is_net | boolean This value affects the total if the field mwst_type has been set to 0. false = Taxes are included in the total true = Taxes will be added to the total |
| is_compact_view | boolean |
| show_position_taxes | boolean |
| salesman_user_id | integer or null References a user object |
| is_valid_from | string  |
| is_valid_to | string  |
| delivery_address_type | string Enum: "contact_address" "manual" |
| contact_address_manual | string  Default: 2 The maximum number of decimal digits to display for amounts (number of items). |
| nb_decimals_price | integer  Default: 2 The maximum number of decimal digits to display for prices (line item prices, totals, etc.). |
| terms_of_payment_text | string or null  |
| created_at | string  Creation date of the purchase order |
| updated_at | string  Last time when purchase order was updated |
| custom_translations | object |
| date_format | string |

### Responses

**200**

OK

**422**

Validation error

put/3.0/purchase\_orders/{purchase\_order\_id}

Live Server

<https://api.bexio.com/3.0/purchase_orders/{purchase_order_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "id": 1,

*   "document_nr": "RE-00001",

*   "kb_payment_template_id": 1,

*   "payment_type_id": 1,

*   "title": "purchase order example title",

*   "contact_id": 14,

*   "contact_sub_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "user_id": 1,

*   "project_id": 1,

*   "logopaper_id": 1,

*   "language": {

*   "id": 1,

*   "name": "Deutsch",

*   "decimalpoint": ".",

*   "thousandsseparator": "'",

*   "iso_639_1": "de",

*   "date_format": "d.m.Y"

},

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency": {

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05

},

*   "currency_id": 1,

*   "header": "We would like to order the following products:",

*   "footer": "Many thanks for the fast processing of our order.",

*   "mwst_type": "included",

*   "mwst_is_net": true,

*   "is_compact_view": false,

*   "show_position_taxes": false,

*   "salesman_user_id": 1,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "delivery_address_type": "contact_address",

*   "contact_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "delivery_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "nb_decimals_amount": 2,

*   "nb_decimals_price": 2,

*   "terms_of_payment_text": "Payable within 30 days",

*   "reference": "Based on Quote Q-3860",

*   "api_reference": null,

*   "mail": "[email protected]",

*   "is_valid_until": "2019-07-24",

*   "created_at": "2020-04-28T19:58:58+00:00",

*   "updated_at": "2020-04-30T19:58:58+00:00",

*   "custom_translations": { },

*   "date_format": "d.m.Y"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "document_nr": "RE-00001",

*   "kb_payment_template_id": 1,

*   "payment_type_id": 1,

*   "title": "purchase order example title",

*   "contact_id": 14,

*   "contact_sub_id": 1,

*   "template_slug": "581a8010821e01426b8b456b",

*   "user_id": 1,

*   "project_id": 1,

*   "logopaper_id": 1,

*   "language": {

*   "id": 1,

*   "name": "Deutsch",

*   "decimalpoint": ".",

*   "thousandsseparator": "'",

*   "iso_639_1": "de",

*   "date_format": "d.m.Y"

},

*   "language_id": 1,

*   "bank_account_id": 1,

*   "currency": {

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05

},

*   "currency_id": 1,

*   "header": "We would like to order the following products:",

*   "footer": "Many thanks for the fast processing of our order.",

*   "total_rounding_difference": -0.02,

*   "mwst_type": "included",

*   "mwst_is_net": true,

*   "is_compact_view": false,

*   "show_position_taxes": false,

*   "salesman_user_id": 1,

*   "is_valid_from": "2019-06-24",

*   "is_valid_to": "2019-07-24",

*   "delivery_address_type": "contact_address",

*   "contact_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "delivery_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",

*   "nb_decimals_amount": 2,

*   "nb_decimals_price": 2,

*   "kb_item_status_id": 22,

*   "terms_of_payment_text": "Payable within 30 days",

*   "reference": "Based on Quote Q-3860",

*   "api_reference": null,

*   "mail": "[email protected]",

*   "viewed_by_client_at": "2020-07-24",

*   "is_valid_until": "2019-07-24",

*   "created_at": "2020-04-28T19:58:58+00:00",

*   "updated_at": "2020-04-30T19:58:58+00:00",

*   "custom_translations": { },

*   "date_format": "d.m.Y",

*   "positions": {

*   "required": [

*   {

*   "type": "text",

*   "pos": null,

*   "is_optional": false,

*   "id": 1,

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false

}

],

*   "optional": [

*   {

*   "type": "text",

*   "pos": null,

*   "is_optional": false,

*   "id": 1,

*   "text": "This position type allows to add free text to a document",

*   "show_pos_nr": false

}

],

*   "discount": [

*   {

*   "type": "discount",

*   "pos": null,

*   "is_optional": false,

*   "id": 1,

*   "text": "Partner discount",

*   "is_percentual": true,

*   "value": 10,

*   "discount_total": 1.78

}

]

}

}
```

Delete a purchase order
-----------------------

This action permanently deletes a purchase order. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| purchase_order_id required | integer  Example: 1 the id of the purchase order |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/3.0/purchase\_orders/{purchase\_order\_id}

Live Server

<https://api.bexio.com/3.0/purchase_orders/{purchase_order_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/purchase_orders/{purchase_order_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Outgoing Payment
----------------

Retrieve Outgoing Payments
--------------------------

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| bill_id required | string  Example: bill_id=5d035f66-8217-433a-b01f-cf0d211c50b1 id of Bill for which Outgoing Payments were created |
| limit | integer >= 1 Default: 100 Example: limit=15 results per page |
| page | integer >= 1 Default: 1 Example: page=2 current page |
| order | string Default: "asc" Enum: "asc" "desc" Example: order=desc sorting order |
| sort | string Example: sort=payment_type field to sort by |

### Responses

**200**

Outgoing Payments retrieved

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

get/4.0/purchase/outgoing-payments

Live Server

<https://api.bexio.com/4.0/purchase/outgoing-payments>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/purchase/outgoing-payments> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 401
* 403

Content type

application/json

```
{

*   "data": [

*   {

*   "id": "46913fdc-802b-49ba-99d7-4ccc13cccfc2",

*   "bill_id": "176a1442-d66d-4907-b8c8-6dad090452a8",

*   "payment_type": "MANUAL",

*   "execution_date": "2019-10-15",

*   "status": "TRANSFERRED",

*   "amount": 45.98,

*   "sender_bank_account_id": 4,

*   "receiver_account_no": "657858734587301523",

*   "receiver_iban": "DE121234567812345678900",

*   "banking_payment_id": "0c8b18af-9a66-4c89-b01a-8abab642d69a",

*   "transaction_id": "f020b371-939e-427a-8175-eceb8dea17b3"

},

*   {

*   "id": "176a1442-d66d-4907-b8c8-6dad090452a8",

*   "bill_id": "869f16ee-d688-476b-9f18-9bb608fdc21f",

*   "payment_type": "IBAN",

*   "status": "PENDING",

*   "execution_date": "2019-09-25",

*   "amount": 95.2,

*   "sender_bank_account_id": 96,

*   "receiver_account_no": "253458734587301523",

*   "receiver_iban": "ES121234567812345678900",

*   "banking_payment_id": "f7e53b5e-a496-4bce-94b5-97f739dc4d5b",

*   "transaction_id": "b3bafed8-fe0f-414d-b360-b50734fb199c"

}

],

*   "paging": {

*   "page": 1,

*   "page_size": 10,

*   "page_count": 50,

*   "item_count": 300

}

}
```

Edit Outgoing Payment
---------------------

Endpoint for editing Outgoing Payment

##### Authorizations

_bearerAuth_

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| payment_id required | string  |
| execution_date required | string  Must be after or equal to Bill's 'bill_date'. Cannot be in CLOSED or LOCKED Business Year. Must be in existing Business Year. For IBAN and QR must be in present or future and cannot be on the weekend. |
| amount required | number  > 0 Must be less or equal to Bill's 'pending_amount'. Maximum of 17 digits and maximum of 2 decimal digits. |
| fee_type | string Enum: "BY_SENDER" "BY_RECEIVER" "BREAKDOWN" "NO_FEE" required for IBAN. Not allowed for QR, MANUAL, CASH_DISCOUNT. Must be set to NO_FEE when 'receiver_iban' is a domestic IBAN (same country as 'sender_bank_account_id' Bank Account IBAN country). Cannot be set to NO_FEE when 'receiver_iban' is not a domestic IBAN. |
| is_salary_payment required | boolean Allowed to be set to true only for IBAN. |
| reference_no | string [ 1 .. 27 ] characters [a-zA-Z0-9]+ Not allowed for IBAN, MANUAL, CASH_DISCOUNT. For QR, when 'receiver_iban' is QR Iban then 'reference_no' must be valid Isr Account number. For QR, when 'receiver_iban' is not QR Iban then 'reference_no' must be valid Creditor Reference. |
| message | string [ 1 .. 140 ] characters Not allowed for QR, MANUAL, CASH_DISCOUNT. |
| receiver_iban | string [ 1 .. 100 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. Must be valid Iban for IBAN Payment or must be valid QR Iban for QR Payment. |
| receiver_name | string [ 1 .. 70 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_street | string [ 1 .. 255 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_house_no | string [ 1 .. 10 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_city | string [ 1 .. 50 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_postcode | string [ 1 .. 10 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_country_code | string [ 1 .. 4 ] characters |

### Responses

**200**

Outgoing Payment updated

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Outgoing Payment with specified id was not found

put/4.0/purchase/outgoing-payments

Live Server

<https://api.bexio.com/4.0/purchase/outgoing-payments>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "payment_id": "1701eb40-d4ea-4617-a8e0-e40e68cbc1d8",

*   "execution_date": "2025-06-12",

*   "amount": 100,

*   "fee_type": "BY_SENDER",

*   "is_salary_payment": false,

*   "reference_no": null,

*   "message": null,

*   "receiver_iban": "NL40INGB5940297536",

*   "receiver_name": "Vare Back",

*   "receiver_street": "Kniestrasse",

*   "receiver_house_no": "1437223",

*   "receiver_city": "Jona",

*   "receiver_postcode": "8645",

*   "receiver_country_code": "CH"

}
```

### Response samples

* 200
* 400
* 401
* 403
* 404

Content type

application/json

```
{

*   "id": "f68e87e0-fa2d-4576-91c6-15f7b6876003",

*   "status": "DOWNLOADED",

*   "created_at": "2019-06-27T10:25:50+0200",

*   "bill_id": "22c306ad-c158-4792-b557-72340df816f5",

*   "payment_type": "IBAN",

*   "execution_date": "2019-10-15",

*   "amount": 45.98,

*   "currency_code": "CHF",

*   "exchange_rate": 1.0000000032,

*   "note": "Some notes",

*   "sender_bank_account_id": 2,

*   "sender_iban": "DE684734567812345678900",

*   "sender_name": "Sender name",

*   "sender_street": "Good Street",

*   "sender_house_no": "45",

*   "sender_city": "Warsaw",

*   "sender_postcode": "6723",

*   "sender_country_code": "PL",

*   "sender_bc_no": "238747349095789",

*   "sender_bank_no": "80759758235723820983",

*   "sender_bank_name": "Name of the Bank",

*   "receiver_iban": "CH121234567812345678900",

*   "receiver_name": "Receiver name",

*   "receiver_street": "Mega street",

*   "receiver_house_no": "10/20",

*   "receiver_city": "London",

*   "receiver_postcode": "3781",

*   "receiver_country_code": "CH",

*   "receiver_bc_no": "98364949095789",

*   "receiver_bank_no": "26597585382673",

*   "receiver_bank_name": "Some Bank name",

*   "fee_type": "BREAKDOWN",

*   "is_salary_payment": false,

*   "reference_no": "9568345675321984798456",

*   "message": "Some message",

*   "booking_text": "Swimming lessons",

*   "banking_payment_id": "f35d39a3-dfc4-43d1-bf38-387f821c0ed0",

*   "banking_payment_entry_id": "27c0d66a-8ea2-4b51-9ce0-372d3e0a4117",

*   "transaction_id": "b4f1e277-8424-48a7-a0b0-100646e82d25"

}
```

Create new Outgoing Payment
---------------------------

Endpoint for creating Outgoing Payment

##### Authorizations

_bearerAuth_

##### Request Body schema: application/json

New Outgoing Payment

| Name | Details |
| --- | --- |
| bill_id required | string  Payment can be created only for Bill that is not in status DRAFT. |
| payment_type required | string Enum: "IBAN" "MANUAL" "CASH_DISCOUNT" "QR" Bill's amount cannot be covered only by CASH_DISCOUNT payments. |
| execution_date required | string  Must be after or equal to Bill's 'bill_date'. Cannot be in CLOSED or LOCKED Business Year. Must be in existing Business Year. For IBAN and QR must be in present or future and cannot be on the weekend. |
| amount required | number  > 0 Must be less or equal to Bill's 'pending_amount'. Maximum of 17 digits and maximum of 2 decimal digits. |
| currency_code required | string [ 1 .. 20 ] characters Must be equal to Bill's 'currency_code'. Only 'CHF' and 'EUR' is allowed for QR. |
| exchange_rate required | number  Maximum of 5 digits and maximum of 10 decimal digits. |
| note | string [ 1 .. 80 ] characters Not allowed for IBAN, QR. |
| sender_bank_account_id required | integer  required for IBAN, MANUAL, QR. Not allowed for CASH_DISCOUNT. For [IBAN, QR] it must be Bank Account with type 'bank'. For MANUAL it could be Bank Account with type 'bank' or 'cash'. |
| sender_iban | string [ 1 .. 100 ] characters required for IBAN, QR. Not allowed for CASH_DISCOUNT. |
| sender_name | string [ 1 .. 100 ] characters required for IBAN, QR. Not allowed for CASH_DISCOUNT. |
| sender_street | string [ 1 .. 255 ] characters required for IBAN, QR. Not allowed for CASH_DISCOUNT. |
| sender_house_no | string [ 1 .. 10 ] characters Not allowed for CASH_DISCOUNT. |
| sender_city | string [ 1 .. 50 ] characters required for IBAN, QR. Not allowed for CASH_DISCOUNT. |
| sender_postcode | string [ 1 .. 10 ] characters required for IBAN, QR. Not allowed for CASH_DISCOUNT. |
| sender_country_code | string [ 1 .. 4 ] characters Not allowed for CASH_DISCOUNT. |
| sender_bc_no | string [ 1 .. 20 ] characters Not allowed for CASH_DISCOUNT. |
| sender_bank_no | string [ 1 .. 50 ] characters Not allowed for CASH_DISCOUNT. |
| sender_bank_name | string [ 1 .. 80 ] characters Not allowed for CASH_DISCOUNT. |
| receiver_account_no | string [ 1 .. 100 ] characters Deprecated Not allowed for IBAN, QR, MANUAL, CASH_DISCOUNT. |
| receiver_iban | string [ 1 .. 100 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. Must be valid Iban for IBAN Payment or must be valid QR Iban for QR Payment. |
| receiver_name | string [ 1 .. 70 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_street | string [ 1 .. 255 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_house_no | string [ 1 .. 10 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_city | string [ 1 .. 50 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_postcode | string [ 1 .. 10 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_country_code | string [ 1 .. 4 ] characters required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_bc_no | string [ 1 .. 20 ] characters Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_bank_no | string [ 1 .. 50 ] characters Not allowed for MANUAL, CASH_DISCOUNT. |
| receiver_bank_name | string [ 1 .. 80 ] characters Not allowed for MANUAL, CASH_DISCOUNT. |
| fee_type | string Enum: "BY_SENDER" "BY_RECEIVER" "BREAKDOWN" "NO_FEE" required for IBAN. Not allowed for QR, MANUAL, CASH_DISCOUNT. Must be set to NO_FEE when 'receiver_iban' is a domestic IBAN (same country as 'sender_bank_account_id' Bank Account IBAN country). Cannot be set to NO_FEE when 'receiver_iban' is not a domestic IBAN. |
| is_salary_payment required | boolean Allowed to be set to true only for IBAN. |
| reference_no | string [ 1 .. 27 ] characters [a-zA-Z0-9]+ Not allowed for IBAN, MANUAL, CASH_DISCOUNT. For QR, when 'receiver_iban' is QR Iban then 'reference_no' must be valid Isr Account number. For QR, when 'receiver_iban' is not QR Iban then 'reference_no' must be valid Creaditor Reference. |
| message | string [ 1 .. 140 ] characters Not allowed for QR, MANUAL, CASH_DISCOUNT. |
| booking_text | string [ 1 .. 35 ] characters Not allowed for MANUAL, CASH_DISCOUNT. |

### Responses

**201**

Successful Outgoing Payment creation

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

post/4.0/purchase/outgoing-payments

Live Server

<https://api.bexio.com/4.0/purchase/outgoing-payments>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

Example

IBANQRManualCash DiscountIBAN

```
{

*   "bill_id": "13e24b2d-355a-424f-9c80-f457c7ddd555",

*   "payment_type": "IBAN",

*   "execution_date": "2020-11-13",

*   "amount": 78.64,

*   "currency_code": "EUR",

*   "exchange_rate": 1.211,

*   "is_salary_payment": true,

*   "fee_type": "BY_SENDER",

*   "sender_bank_account_id": 2,

*   "sender_iban": "CH5604835012345678009",

*   "sender_name": "Muster Hans",

*   "sender_city": "London",

*   "sender_postcode": "6723",

*   "sender_street": "address no 2",

*   "receiver_iban": "DE91100000000123456789",

*   "receiver_name": "bexio ag",

*   "receiver_street": "Reinluftweg 1",

*   "receiver_city": "Wattwil",

*   "receiver_postcode": "9630",

*   "receiver_country_code": "CH"

}
```

### Response samples

* 201
* 400
* 401
* 403

Content type

application/json

```
{

*   "id": "f68e87e0-fa2d-4576-91c6-15f7b6876003",

*   "status": "DOWNLOADED",

*   "created_at": "2019-06-27T10:25:50+0200",

*   "bill_id": "22c306ad-c158-4792-b557-72340df816f5",

*   "payment_type": "IBAN",

*   "execution_date": "2019-10-15",

*   "amount": 45.98,

*   "currency_code": "CHF",

*   "exchange_rate": 1.0000000032,

*   "note": "Some notes",

*   "sender_bank_account_id": 2,

*   "sender_iban": "DE684734567812345678900",

*   "sender_name": "Sender name",

*   "sender_street": "Good Street",

*   "sender_house_no": "45",

*   "sender_city": "Warsaw",

*   "sender_postcode": "6723",

*   "sender_country_code": "PL",

*   "sender_bc_no": "238747349095789",

*   "sender_bank_no": "80759758235723820983",

*   "sender_bank_name": "Name of the Bank",

*   "receiver_iban": "CH121234567812345678900",

*   "receiver_name": "Receiver name",

*   "receiver_street": "Mega street",

*   "receiver_house_no": "10/20",

*   "receiver_city": "London",

*   "receiver_postcode": "3781",

*   "receiver_country_code": "CH",

*   "receiver_bc_no": "98364949095789",

*   "receiver_bank_no": "26597585382673",

*   "receiver_bank_name": "Some Bank name",

*   "fee_type": "BREAKDOWN",

*   "is_salary_payment": false,

*   "reference_no": "9568345675321984798456",

*   "message": "Some message",

*   "booking_text": "Swimming lessons",

*   "banking_payment_id": "f35d39a3-dfc4-43d1-bf38-387f821c0ed0",

*   "banking_payment_entry_id": "27c0d66a-8ea2-4b51-9ce0-372d3e0a4117",

*   "transaction_id": "b4f1e277-8424-48a7-a0b0-100646e82d25"

}
```

Get Outgoing Payment
--------------------

Endpoint for retrieving Outgoing Payment by id

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: 8f276cb8-9220-452c-a649-6877207f47bb id of Outgoing Payment to retrieve |

### Responses

**200**

Outgoing Payment retrieved

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Outgoing Payment with specified id was not found

get/4.0/purchase/outgoing-payments/{id}

Live Server

<https://api.bexio.com/4.0/purchase/outgoing-payments/{id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/purchase/outgoing-payments/{id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 401
* 403
* 404

Content type

application/json

```
{

*   "id": "f68e87e0-fa2d-4576-91c6-15f7b6876003",

*   "status": "DOWNLOADED",

*   "created_at": "2019-06-27T10:25:50+0200",

*   "bill_id": "22c306ad-c158-4792-b557-72340df816f5",

*   "payment_type": "IBAN",

*   "execution_date": "2019-10-15",

*   "amount": 45.98,

*   "currency_code": "CHF",

*   "exchange_rate": 1.0000000032,

*   "note": "Some notes",

*   "sender_bank_account_id": 2,

*   "sender_iban": "DE684734567812345678900",

*   "sender_name": "Sender name",

*   "sender_street": "Good Street",

*   "sender_house_no": "45",

*   "sender_city": "Warsaw",

*   "sender_postcode": "6723",

*   "sender_country_code": "PL",

*   "sender_bc_no": "238747349095789",

*   "sender_bank_no": "80759758235723820983",

*   "sender_bank_name": "Name of the Bank",

*   "receiver_iban": "CH121234567812345678900",

*   "receiver_name": "Receiver name",

*   "receiver_street": "Mega street",

*   "receiver_house_no": "10/20",

*   "receiver_city": "London",

*   "receiver_postcode": "3781",

*   "receiver_country_code": "CH",

*   "receiver_bc_no": "98364949095789",

*   "receiver_bank_no": "26597585382673",

*   "receiver_bank_name": "Some Bank name",

*   "fee_type": "BREAKDOWN",

*   "is_salary_payment": false,

*   "reference_no": "9568345675321984798456",

*   "message": "Some message",

*   "booking_text": "Swimming lessons",

*   "banking_payment_id": "f35d39a3-dfc4-43d1-bf38-387f821c0ed0",

*   "banking_payment_entry_id": "27c0d66a-8ea2-4b51-9ce0-372d3e0a4117",

*   "transaction_id": "b4f1e277-8424-48a7-a0b0-100646e82d25"

}
```

Delete Outgoing Payment
-----------------------

Payment cannot be removed when it is RECONCILED (transaction\_id is not null). Payment cannot be removed when it's Business Year is Closed or Locked.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| id required | string  Example: 9bcf8181-2843-4726-b023-d38261c56ca8 Outgoing Payment id |

### Responses

**204**

Outgoing Payment deleted

**400**

Bad request

**401**

Access token is missing or is invalid

**403**

No access rights

**404**

Outgoing Payment with specified id was not found

delete/4.0/purchase/outgoing-payments/{id}

Live Server

<https://api.bexio.com/4.0/purchase/outgoing-payments/{id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/4.0/purchase/outgoing-payments/{id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 400
* 401
* 403
* 404

Content type

application/json

```
{

*   "error_code": 400,

*   "message": "Parameters are invalid"

}
```

Accounts
--------

Fetch a list of accounts
------------------------

This action fetches a list of all accounts

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

**422**

Validation error

get/2.0/accounts

Live Server

<https://api.bexio.com/2.0/accounts>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/accounts> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "c7da5b70-2d27-467e-abd9-9c3ac0f83c7d",

*   "account_no": "3201",

*   "name": "Gross proceeds credit sales",

*   "account_type": 1,

*   "tax_id": 40,

*   "fibu_account_group_id": 65,

*   "is_active": true,

*   "is_locked": false

}

]
```

Search Accounts
---------------

Search accounts via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `account_no`
* `fibu_account_group_id`
* `name`
* `account_type`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "c7da5b70-2d27-467e-abd9-9c3ac0f83c7d",

*   "account_no": "3201",

*   "name": "Gross proceeds credit sales",

*   "account_type": 1,

*   "tax_id": 40,

*   "fibu_account_group_id": 65,

*   "is_active": true,

*   "is_locked": false

}

]
```

Account Groups
--------------

Fetch a list of account groups
------------------------------

This action fetches a list of all account groups

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/account\_groups

Live Server

<https://api.bexio.com/2.0/account_groups>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/account_groups> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "5fe93c8a-b05f-4004-91f5-9177ffd011fd",

*   "account_no": "1",

*   "name": "Assets",

*   "parent_fibu_account_group_id": 3,

*   "is_active": true,

*   "is_locked": false

}

]
```

Calendar Years
--------------

Fetch a list of calendar years
------------------------------

This action fetches a list of all calendar years

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/calendar\_years

Live Server

<https://api.bexio.com/3.0/accounting/calendar_years>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/calendar_years> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "start": "2018-01-01",

*   "end": "2018-12-31",

*   "is_vat_subject": true,

*   "is_annual_reporting": false,

*   "created_at": "2017-04-28T19:58:58+00:00",

*   "updated_at": "2018-04-30T19:58:58+00:00",

*   "vat_accounting_method": "effective",

*   "vat_accounting_type": "agreed"

}

]
```

Create calendar year
---------------------

This action creates a calendar year. If only year parameter is passed to request the next year is created with the same settings as the year before other way all parameters must be pass to request.

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| year | string The year for which we want to create an entry. It is possible to create years 10 years ahead and higher than 2016 year. If it is a future year, we generate all in between with the settings the user has chosen. |
| is_vat_subject | boolean Determines if the calendar year is vat subjected or not. |
| is_annual_reporting | boolean Determines if the calendar year has annual reporting enabled. |
| vat_accounting_method | string Enum: "effective" "net_tax" Vat accounting method. |
| vat_accounting_type | string Enum: "agreed" "collected" Vat accounting type. |
| default_tax_income_id | integer Determine default tax ID for income. References a tax object |
| default_tax_expense_id | integer Determine default tax ID for expense. Tax ID is not required if the client has the plan bexio mini. In this case, the year is created with the tax ID from the previous year. References a tax object. |

### Responses

**201**

OK

**422**

Validation error

post/3.0/accounting/calendar\_years

Live Server

<https://api.bexio.com/3.0/accounting/calendar_years>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "year": "2018",

*   "is_vat_subject": true,

*   "is_annual_reporting": false,

*   "vat_accounting_method": "effective",

*   "vat_accounting_type": "agreed",

*   "default_tax_income_id": 1,

*   "default_tax_expense_id": 2

}
```

### Response samples

* 201
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "start": "2018-01-01",

*   "end": "2018-12-31",

*   "is_vat_subject": true,

*   "is_annual_reporting": false,

*   "created_at": "2017-04-28T19:58:58+00:00",

*   "updated_at": "2018-04-30T19:58:58+00:00",

*   "vat_accounting_method": "effective",

*   "vat_accounting_type": "agreed"

}

]
```

Search calendar years
---------------------

This action fetches a list of all calendar years which matches the search criteria. If you want to search for end date use "like" instead of "=" cause if you search for equality, you will have to provide the date in the following format: "2018-12-31 23:59:59"

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "start",

*   "value": "2018-01-01",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "start": "2018-01-01",

*   "end": "2018-12-31",

*   "is_vat_subject": true,

*   "is_annual_reporting": false,

*   "created_at": "2017-04-28T19:58:58+00:00",

*   "updated_at": "2018-04-30T19:58:58+00:00",

*   "vat_accounting_method": "effective",

*   "vat_accounting_type": "agreed"

}

]
```

Fetch a calendar year
---------------------

This action fetches a single calendar year

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| calendar_year_id required | integer  Example: 1 the id of the calendar_year |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/calendar\_years/{calendar\_year\_id}

Live Server

<https://api.bexio.com/3.0/accounting/calendar_years/{calendar_year_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/calendar_years/{calendar_year_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "start": "2018-01-01",

*   "end": "2018-12-31",

*   "is_vat_subject": true,

*   "is_annual_reporting": false,

*   "created_at": "2017-04-28T19:58:58+00:00",

*   "updated_at": "2018-04-30T19:58:58+00:00",

*   "vat_accounting_method": "effective",

*   "vat_accounting_type": "agreed"

}
```

Business Years
--------------

Fetch a list of business years
------------------------------

This action fetches a list of all business years

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/business\_years

Live Server

<https://api.bexio.com/3.0/accounting/business_years>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/business_years> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "start": "2018-01-01",

*   "end": "2018-12-31",

*   "status": "open",

*   "closed_at": "2019-04-28"

}

]
```

Fetch a business year
---------------------

This action fetches a single business year

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| business_year_id required | integer  Example: 1 the id of the business_year |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/business\_years/{business\_year\_id}

Live Server

<https://api.bexio.com/3.0/accounting/business_years/{business_year_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/business_years/{business_year_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "start": "2018-01-01",

*   "end": "2018-12-31",

*   "status": "open",

*   "closed_at": "2019-04-28"

}
```

Currencies
----------

Fetch a list of currencies
--------------------------

This action fetches a list of all currencies

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |
| embed | string  Example: embed=exchange_rate The embed parameters is being used for embedding related resources in the response. Example In case of embed=exchange_rate the fields exchange_rate, exchange_rate_id, ratio, exchange_rate_to_ratio, source, source_reason and exchange_rate_date are shown |
| date | date  Example: date=2019-05-17 the validity date for the fetched exchange rate |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/currencies

Live Server

<https://api.bexio.com/3.0/currencies>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/currencies> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05,

*   "exchange_rate": 0.9849,

*   "exchange_rate_id": 2,

*   "ratio": 1,

*   "exchange_rate_to_ratio": 0.9849,

*   "source": "monthly_average",

*   "source_reason": "monthly_average_provided",

*   "exchange_rate_date": "2024-05-01"

}

]
```

Create a currency
-----------------

This action creates a new currency

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| name required | string

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "CHF",

*   "round_factor": 0.05

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05

}
```

Fetch a currency
----------------

This action fetches a single currency

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| currency_id required | integer  Example: 1 the id of the currency |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/currencies/{currency\_id}

Live Server

<https://api.bexio.com/3.0/currencies/{currency_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/currencies/{currency_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05

}
```

Delete a currency
-----------------

This action permanently deletes a currency. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| currency_id required | integer  Example: 1 the id of the currency |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

**422**

Validation error

delete/3.0/currencies/{currency\_id}

Live Server

<https://api.bexio.com/3.0/currencies/{currency_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/currencies/{currency_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "success": true

}
```

Update a currency
-----------------

This action updates an existing currency

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| currency_id required | integer  Example: 1 the id of the currency |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Any of

CurrencyBase

| Name | Details |
| --- | --- |
| round_factor | number The round factor of the currency. E.g.: In order to round CHF to 5 Rp. the round_factor must be set to 0.05 |

### Responses

**201**

Created

**422**

Validation error

patch/3.0/currencies/{currency\_id}

Live Server

<https://api.bexio.com/3.0/currencies/{currency_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "round_factor": 0.05

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05

}
```

Fetch exchange rates for currencies
-----------------------------------

This action fetches all configured exchange rates for a given currency

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| currency_id required | integer  the id of the currency |

##### query Parameters

| Name | Details |
| --- | --- |
| date | date  Example: date=2019-05-17 the validity date for the fetched exchange rate |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/currencies/{currency\_id}/exchange\_rates

Live Server

<https://api.bexio.com/3.0/currencies/{currency_id}/exchange_rates>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/currencies/{currency_id}/exchange_rates> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "factor_nr": 1.2,

*   "exchange_currency": {

*   "id": 1,

*   "name": "CHF",

*   "round_factor": 0.05

},

*   "ratio": 1,

*   "exchange_rate_to_ratio": 0.9849,

*   "source": "monthly_average",

*   "source_reason": "monthly_average_provided",

*   "exchange_rate_date": "2024-05-01"

}

]
```

Fetch all possible currency codes
---------------------------------

This endpoint can be used to retrieve all available currency codes (in the format CHF, EUR, etc.)

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/currencies/codes

Live Server

<https://api.bexio.com/3.0/currencies/codes>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/currencies/codes> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   [

*   "EUR",

*   "GBP",

*   "PLN"

]

]
```

Manual Entries
--------------

Fetch a list of manual entries
------------------------------

This action fetches a list of all manual entries which have been added in the accounting module

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/manual\_entries

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/manual_entries> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "type": "manual_single_entry",

*   "date": "2019-11-17",

*   "reference_nr": "Booking BA-22",

*   "created_by_user_id": 1,

*   "edited_by_user_id": 1,

*   "entries": [

*   {

*   "id": 32,

*   "date": "2019-11-17",

*   "debit_account_id": 77,

*   "credit_account_id": 139,

*   "tax_id": 3,

*   "tax_account_id": 77,

*   "description": "Payment for client Smith",

*   "amount": 328.25,

*   "currency_id": 1,

*   "base_currency_id": 1,

*   "currency_factor": 1,

*   "base_currency_amount": 328.25,

*   "created_by_user_id": 1,

*   "edited_by_user_id": 1

}

],

*   "is_locked": false,

*   "locked_info": "closed_business_year"

}

]
```

Create manual entry
-------------------

This action creates a new manual entry for the account ledger

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| 1020 | 3200 |

**manual_compound_entry**
Can be used to create a more complex booking where the total amount can be distributed among multiple accounts. The following example shows how a received bank transaction can be booked on multiple accounts:

| Name | Details |
| --- | --- |
| 1020 |  |
|  | 3200 |
|  | 3201 |
|  | 3202 |

**manual_group_entry**
Can be used to create multiple one line bookings in one group entry. This means that the bookings will have the same `reference_nr` but can differ in accounts, currencies, etc. The following example shows how two received bank transaction can be booked on different accounts:

| Name | Details |
| --- | --- |
| 1020 | 3200 |
| 1021 | 3201 |
- **date** required (string) <date>
the booking date
- **reference_nr** (string) <= 80 characters
A reference number for the booking
entries

requiredArray of objects (ManualEntry)

### Responses

**201**

Created

**422**

Validation error

post/3.0/accounting/manual\_entries

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "type": "manual_single_entry",

*   "date": "2019-11-17",

*   "reference_nr": "Booking BA-22",

*   "entries": [

*   {

*   "debit_account_id": 77,

*   "credit_account_id": 139,

*   "tax_id": 3,

*   "tax_account_id": 77,

*   "description": "Payment for client Smith",

*   "amount": 328.25,

*   "currency_id": 1,

*   "currency_factor": 1

}

]

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "type": "manual_single_entry",

*   "date": "2019-11-17",

*   "reference_nr": "Booking BA-22",

*   "created_by_user_id": 1,

*   "edited_by_user_id": 1,

*   "entries": [

*   {

*   "id": 32,

*   "date": "2019-11-17",

*   "debit_account_id": 77,

*   "credit_account_id": 139,

*   "tax_id": 3,

*   "tax_account_id": 77,

*   "description": "Payment for client Smith",

*   "amount": 328.25,

*   "currency_id": 1,

*   "base_currency_id": 1,

*   "currency_factor": 1,

*   "base_currency_amount": 328.25,

*   "created_by_user_id": 1,

*   "edited_by_user_id": 1

}

],

*   "is_locked": false,

*   "locked_info": "closed_business_year"

}
```

Update manual entry
-------------------

This action updates a manual entry

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| 1020 | 3200 |

**manual_compound_entry**
Can be used to create a more complex booking where the total amount can be distributed among multiple accounts. The following example shows how a received bank transaction can be booked on multiple accounts:

| Name | Details |
| --- | --- |
| 1020 |  |
|  | 3200 |
|  | 3201 |
|  | 3202 |

**manual_group_entry**
Can be used to create multiple one line bookings in one group entry. This means that the bookings will have the same `reference_nr` but can differ in accounts, currencies, etc. The following example shows how two received bank transaction can be booked on different accounts:

| Name | Details |
| --- | --- |
| 1020 | 3200 |
| 1021 | 3201 |
- **date** required (string) <date>
the booking date
- **reference_nr** (string) <= 80 characters
A reference number for the booking
entries

requiredArray of objects (ManualEntry)idnumber
The id of the main resource

### Responses

**200**

Created

**422**

Validation error

put/3.0/accounting/manual\_entries/{manual\_entry\_id}

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "type": "manual_single_entry",

*   "date": "2019-11-17",

*   "reference_nr": "Booking BA-22",

*   "entries": [

*   {

*   "debit_account_id": 77,

*   "credit_account_id": 139,

*   "tax_id": 3,

*   "tax_account_id": 77,

*   "description": "Payment for client Smith",

*   "amount": 328.25,

*   "currency_id": 1,

*   "currency_factor": 1,

*   "id": 2

}

],

*   "id": 1

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "type": "manual_single_entry",

*   "date": "2019-11-17",

*   "reference_nr": "Booking BA-22",

*   "created_by_user_id": 1,

*   "edited_by_user_id": 1,

*   "entries": [

*   {

*   "id": 32,

*   "date": "2019-11-17",

*   "debit_account_id": 77,

*   "credit_account_id": 139,

*   "tax_id": 3,

*   "tax_account_id": 77,

*   "description": "Payment for client Smith",

*   "amount": 328.25,

*   "currency_id": 1,

*   "base_currency_id": 1,

*   "currency_factor": 1,

*   "base_currency_amount": 328.25,

*   "created_by_user_id": 1,

*   "edited_by_user_id": 1

}

],

*   "is_locked": false,

*   "locked_info": "closed_business_year"

}
```

Delete manual entry
-------------------

This action permanently deletes a manual entry. It cannot be undone. It also deletes the connection between the specific manual entry and any linked files.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| manual_entry_id required | integer  Example: 1 the id of the manual_entry |

### Responses

**200**

OK

**422**

Validation error

delete/3.0/accounting/manual\_entries/{manual\_entry\_id}

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "success": true

}
```

Get next reference number
-------------------------

This action can be used to get the next reference number for a manual entry

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

**422**

Validation error

get/3.0/accounting/manual\_entries/next\_ref\_nr

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/next_ref_nr>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/manual_entries/next_ref_nr> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "next_ref_nr": "Booking BA-22"

}
```

Fetch files of manual entry line
--------------------------------

This action fetches a list of all files associated to a specific manual entry line

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| manual_entry_id required | integer  Example: 1 the id of the manual_entry |
| entry_id required | integer  Example: 1 the id of a single entry in the manual_entry object |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/manual\_entries/{manual\_entry\_id}/entries/{entry\_id}/files

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00"

}

]
```

Add file to manual entry line
-----------------------------

This action uploads one or multiple files and attaches the files to an existing accounting entry line (only for entry types manual\_single\_entry and manual\_group\_entry)

Please note that you must set the content-type to `multipart/form-data`. You can upload multiple files with one request by providing different identifiers (e.g. `fileName1` and `fileName2`). Max. file size is 12MB and supported file formats are PNG, JPG, JPEG, GIF, DOC, DOCX, XLS, XLSX, PPT, PPTX, PDF.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| manual_entry_id required | integer  Example: 1 the id of the manual_entry |
| entry_id required | integer  Example: 1 the id of a single entry in the manual_entry object |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: multipart/form-data

required

| Name | Details |
| --- | --- |
| fileName | Array of strings  [ items  ] Please note that the same request parameter can only be used once. Please use different request parameter for multiple files. |

### Responses

**201**

Created

**422**

Validation error

post/3.0/accounting/manual\_entries/{manual\_entry\_id}/entries/{entry\_id}/files

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 201
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00"

}

]
```

Fetch file of manual entry line
-------------------------------

This action fetches a file associated to a specific manual entry line (only for entry types manual\_single\_entry and manual\_group\_entry)

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| manual_entry_id required | integer  Example: 1 the id of the manual_entry |
| entry_id required | integer  Example: 1 the id of a single entry in the manual_entry object |
| file_id required | integer  Example: 1 the id of the file |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/manual\_entries/{manual\_entry\_id}/entries/{entry\_id}/files/{file\_id}

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00",

*   "data": "iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAIAAADTED8xAAAACXBIWXMAAABIAAAASABGyWs+AAACu0lEQVR42u3TAQkAMBDEsHuYf80T0oRa6G07qdrbDbIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYC0DxplBfxP7XIvAAAAAElFTkSuQmCC"

}
```

Delete connection between file and manual entry line
----------------------------------------------------

This action deletes the connection between the file and the specific manual entry line (only for entry types manual\_single\_entry and manual\_group\_entry).

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| manual_entry_id required | integer  Example: 1 the id of the manual_entry |
| entry_id required | integer  Example: 1 the id of a single entry in the manual_entry object |
| file_id required | integer  Example: 1 the id of the currency |

### Responses

**200**

OK

delete/3.0/accounting/manual\_entries/{manual\_entry\_id}/entries/{entry\_id}/files/{file\_id}

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Fetch files of manual compound entry
------------------------------------

This action fetches a list of all files associated with a specific manual compound entry

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| manual_entry_id required | integer  Example: 1 the id of the manual_entry |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/manual\_entries/{manual\_entry\_id}/files

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00"

}

]
```

Add file to manual compound entry
---------------------------------

This action uploads one or multiple files and attaches the files to an existing manual compound entry

Please note that you must set the content-type to `multipart/form-data`. You can upload multiple files with one request by providing different identifiers (e.g. `fileName1` and `fileName2`). Max. file size is 12MB and supported file formats are PNG, JPG, JPEG, GIF, DOC, DOCX, XLS, XLSX, PPT, PPTX, PDF.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| manual_entry_id required | integer  Example: 1 the id of the manual_entry |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: multipart/form-data

required

| Name | Details |
| --- | --- |
| fileName | Array of strings  [ items  ] Please note that the same request parameter can only be used once. Please use different request parameter for multiple files. |

### Responses

**201**

Created

**422**

Validation error

post/3.0/accounting/manual\_entries/{manual\_entry\_id}/files

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 201
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00"

}

]
```

Fetch file of manual compound entry
-----------------------------------

This action fetches a file associated with a specific compound entry

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| manual_entry_id required | integer  Example: 1 the id of the manual_entry |
| file_id required | integer  Example: 1 the id of the file |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/manual\_entries/{manual\_entry\_id}/files/{file\_id}

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files/{file_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files/{file_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00",

*   "data": "iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAIAAADTED8xAAAACXBIWXMAAABIAAAASABGyWs+AAACu0lEQVR42u3TAQkAMBDEsHuYf80T0oRa6G07qdrbDbIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYC0DxplBfxP7XIvAAAAAElFTkSuQmCC"

}
```

Delete connection between file and manual compound entry
--------------------------------------------------------

This action deletes the connection between the file and the specific manual compound entry

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| manual_entry_id required | integer  Example: 1 the id of the manual_entry |
| file_id required | integer  Example: 1 the id of the currency |

### Responses

**200**

OK

delete/3.0/accounting/manual\_entries/{manual\_entry\_id}/files/{file\_id}

Live Server

<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files/{file_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files/{file_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Reports
-------

Journal
-------

This action fetches a list of all accounting journal bookings

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| from | string  Example: from=2019-01-01 Can be used to filter for entries after this date |
| to | string  Example: to=2019-12-31 Can be used to filter for entries until this date |
| account_uuid | string  Example: account_uuid=d591c997-5e88-486b-8fca-48dfd984d45d Can be used to filter for entries with account with uuid |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/journal

Live Server

<https://api.bexio.com/3.0/accounting/journal>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/journal> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "ref_id": 13,

*   "ref_uuid": "456fc553-f42b-417e-a2af-dd5c5b9bade6",

*   "ref_class": "KbInvoice",

*   "date": "2019-02-17T00:00:00+02:00",

*   "debit_account_id": 77,

*   "credit_account_id": 139,

*   "description": "Website for client Smith",

*   "amount": 328.25,

*   "currency_id": 1,

*   "currency_factor": 1,

*   "base_currency_id": 1,

*   "base_currency_amount": 328.25

}

]
```

Taxes
-----

Fetch a list of taxes
---------------------

This action fetches a list of all taxes

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| scope | string Enum: "active" "inactive" Example: scope=active Can be used to filter for active or inactive taxes |
| date | string  Example: date=2018-03-17 Displays all taxes which are active at the date given |
| types | string Enum: "sales_tax" "pre_tax" Example: types=sales_tax Filter the types of the tax |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

**422**

Validation error

get/3.0/taxes

Live Server

<https://api.bexio.com/3.0/taxes>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/taxes> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "8078b1f3-f85b-4adf-aaa8-c3eeea964927",

*   "name": "lib.model.tax.ch.sales_7_7.name",

*   "code": "UN77",

*   "digit": "302",

*   "type": "sales_tax",

*   "account_id": 98,

*   "tax_settlement_type": "none",

*   "value": 7.7,

*   "net_tax_value": null,

*   "start_year": 2017,

*   "end_year": 2018,

*   "is_active": true,

*   "display_name": "ZOLLM  - Import Mat/SV 100.00%",

*   "start_month": 1,

*   "end_month": 12

}

]
```

Fetch a tax
-----------

This action fetches a single tax

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| tax_id required | integer  Example: 1 the id of the tax |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/taxes/{tax\_id}

Live Server

<https://api.bexio.com/3.0/taxes/{tax_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/taxes/{tax_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "8078b1f3-f85b-4adf-aaa8-c3eeea964927",

*   "name": "lib.model.tax.ch.sales_7_7.name",

*   "code": "UN77",

*   "digit": "302",

*   "type": "sales_tax",

*   "account_id": 98,

*   "tax_settlement_type": "none",

*   "value": 7.7,

*   "net_tax_value": null,

*   "start_year": 2017,

*   "end_year": 2018,

*   "is_active": true,

*   "display_name": "ZOLLM  - Import Mat/SV 100.00%",

*   "start_month": 1,

*   "end_month": 12

}
```

Delete a tax
------------

This action permanently deletes a tax. It cannot be undone. Please note that taxes which are used and/or referenced within bexio, and taxes assigned to the digit 000 can not be deleted. In that case, the API will throw a 409 error.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| tax_id required | integer  Example: 1 the id of the tax |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

**409**

Conflict

delete/3.0/taxes/{tax\_id}

Live Server

<https://api.bexio.com/3.0/taxes/{tax_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/taxes/{tax_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 409

Content type

application/json

```
{

*   "success": true

}
```

Vat Periods
-----------

Fetch a list of vat periods
---------------------------

This action fetches a list of all vat periods

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/vat\_periods

Live Server

<https://api.bexio.com/3.0/accounting/vat_periods>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/vat_periods> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "start": "2018-01-01",

*   "end": "2018-03-31",

*   "type": "quarter",

*   "status": "closed",

*   "closed_at": "2018-04-28"

}

]
```

Fetch a vat period
------------------

This action fetches a single vat period

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| vat_period_id required | integer  Example: 1 the id of the vat_period |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/accounting/vat\_periods/{vat\_period\_id}

Live Server

<https://api.bexio.com/3.0/accounting/vat_periods/{vat_period_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/accounting/vat_periods/{vat_period_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "start": "2018-01-01",

*   "end": "2018-03-31",

*   "type": "quarter",

*   "status": "closed",

*   "closed_at": "2018-04-28"

}
```

Bank Accounts
-------------

Fetch a list of bank accounts
-----------------------------

This action fetches a list of all bank accounts which are shown on the banking component page

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/banking/accounts

Live Server

<https://api.bexio.com/3.0/banking/accounts>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/banking/accounts> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "name": "UBS",

*   "owner": "Metzgerei Schneider",

*   "owner_address": "Alte Jonastrasse 10",

*   "owner_house_number": 10,

*   "owner_zip": 8640,

*   "owner_city": "Rapperswil",

*   "owner_country_code": "CH",

*   "bc_nr": 250,

*   "bank_name": "UBS Switzerland AG",

*   "bank_nr": "UBSWCHZH86M",

*   "bank_account_nr": "25010367101Y",

*   "iban_nr": "CH560025025010367101Y",

*   "currency_id": 1,

*   "account_id": 77,

*   "remarks": "This is an additional description",

*   "invoice_mode": "qr_invoice",

*   "qr_invoice_iban": "CH4431999123000889012",

*   "type": "bank"

}

]
```

Fetch a single bank account
---------------------------

This action fetches a single bank account which is shown on the banking component page

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| bank_account_id required | integer  ID of bank account to return |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/banking/accounts/{bank\_account\_id}

Live Server

<https://api.bexio.com/3.0/banking/accounts/{bank_account_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/banking/accounts/{bank_account_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "name": "UBS",

*   "owner": "Metzgerei Schneider",

*   "owner_address": "Alte Jonastrasse 10",

*   "owner_house_number": 10,

*   "owner_zip": 8640,

*   "owner_city": "Rapperswil",

*   "owner_country_code": "CH",

*   "bc_nr": 250,

*   "bank_name": "UBS Switzerland AG",

*   "bank_nr": "UBSWCHZH86M",

*   "bank_account_nr": "25010367101Y",

*   "iban_nr": "CH560025025010367101Y",

*   "currency_id": 1,

*   "account_id": 77,

*   "remarks": "This is an additional description",

*   "invoice_mode": "qr_invoice",

*   "qr_invoice_iban": "CH4431999123000889012",

*   "type": "bank"

}
```

IBAN Payments
-------------

Create IBAN payment Deprecated
------------------------------

This action creates a new payment for the selected bank account

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| bank_account_id required | integer  the id of the bank account |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

optional

Payment that needs to be added for the selected bank account

| Name | Details |
| --- | --- |
| instructed_amount required | object (BankPaymentAmount) |
| recipient required | object (BankPaymentRecipient) |
| iban required | string  The execution date of the payment. The bank holds back the payment until this date is reached. Format (Y-m-d). |
| is_salary_payment required | boolean Describes whether the payment is a salary payment or not |
| is_editing_restricted | boolean If this value is set to true, the payment can be edited only by the initial creator. This means that the payment can not be edited within the frontend and by other API clients. |
| message | string

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "execution_date": "2018-03-17",

*   "is_salary_payment": false,

*   "is_editing_restricted": false,

*   "message": "Payment for invoice IV-1202842",

*   "allowance_type": "fee_paid_by_sender"

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "type": "iban",

*   "bank_account": {

*   "id": 4,

*   "iban": "CH560025025010367101Y"

},

*   "payment": {

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "execution_date": "2018-03-17",

*   "is_salary_payment": false,

*   "is_editing_restricted": false,

*   "message": "Payment for invoice IV-1202842",

*   "allowance_type": "fee_paid_by_sender"

},

*   "instruction_id": "5a335fe3345a96.14999616",

*   "status": "open",

*   "created_at": "2018-04-09T07:44:10+00:00"

}
```

Get IBAN payment Deprecated
---------------------------

This action fetches an IBAN payment which is associated to the specified bank account

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| bank_account_id required | integer  the id of the bank account |
| payment_id required | string or integer ID or UUID of the IBAN payment |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/banking/bank\_accounts/{bank\_account\_id}/iban\_payments/{payment\_id}

Live Server

<https://api.bexio.com/3.0/banking/bank_accounts/{bank_account_id}/iban_payments/{payment_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/banking/bank_accounts/{bank_account_id}/iban_payments/{payment_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "type": "iban",

*   "bank_account": {

*   "id": 4,

*   "iban": "CH560025025010367101Y"

},

*   "payment": {

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "execution_date": "2018-03-17",

*   "is_salary_payment": false,

*   "is_editing_restricted": false,

*   "message": "Payment for invoice IV-1202842",

*   "allowance_type": "fee_paid_by_sender"

},

*   "instruction_id": "5a335fe3345a96.14999616",

*   "status": "open",

*   "created_at": "2018-04-09T07:44:10+00:00"

}
```

Update IBAN payment Deprecated
------------------------------

This action updates an existing payment for the selected bank account. Please note that a payment can only be edited, when the status is "open".

Please note that you do not have to provide all fields to update a payment.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| bank_account_id required | string |
| payment_id required | string or integer ID or UUID of the IBAN payment |

##### query Parameters

| Name | Details |
| --- | --- |
| iban required | integer  IBAN of the payment bank account |
| id required | integer  ID of the IBAN payment |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Payment that needs to be added for the selected bank account

| Name | Details |
| --- | --- |
| instructed_amount required | object (BankPaymentAmount) |
| recipient required | object (BankPaymentRecipient) |
| iban required | string  The execution date of the payment. The bank holds back the payment until this date is reached. Format (Y-m-d). |
| is_salary_payment required | boolean Describes whether the payment is a salary payment or not |
| is_editing_restricted | boolean If this value is set to true, the payment can be edited only by the initial creator. This means that the payment can not be edited within the frontend and by other API clients. |
| message | string

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "execution_date": "2018-03-17",

*   "is_salary_payment": false,

*   "is_editing_restricted": false,

*   "message": "Payment for invoice IV-1202842",

*   "allowance_type": "fee_paid_by_sender"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "type": "iban",

*   "bank_account": {

*   "id": 4,

*   "iban": "CH560025025010367101Y"

},

*   "payment": {

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "execution_date": "2018-03-17",

*   "is_salary_payment": false,

*   "is_editing_restricted": false,

*   "message": "Payment for invoice IV-1202842",

*   "allowance_type": "fee_paid_by_sender"

},

*   "instruction_id": "5a335fe3345a96.14999616",

*   "status": "open",

*   "created_at": "2018-04-09T07:44:10+00:00"

}
```

QR Payments
-----------

Create QR payment Deprecated
----------------------------

This action creates a new payment for the selected bank account

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| bank_account_id required | integer  the id of the bank account |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

optional

Payment that needs to be added for the selected bank account

| Name | Details |
| --- | --- |
| instructed_amount required | object (BankPaymentAmount) |
| recipient required | object (BankPaymentRecipient) |
| iban | string  The execution date of the payment. The bank holds back the payment until this date is reached. Format (Y-m-d). |

### Responses

**201**

Created

**422**

Validation error

post/3.0/banking/bank\_accounts/{bank\_account\_id}/qr\_payments

Live Server

<https://api.bexio.com/3.0/banking/bank_accounts/{bank_account_id}/qr_payments>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "qr_reference_nr": "998877000000000000000000634",

*   "additional_information": "//S1/10/5541/11/191210/20/1235/31/191220200108/32/2.5:337.5;3.7:3807.5/40/0:30",

*   "is_editing_restricted": false,

*   "execution_date": "2018-03-17"

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "type": "qr",

*   "bank_account": {

*   "id": 4,

*   "iban": "CH560025025010367101Y"

},

*   "payment": {

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "qr_reference_nr": "998877000000000000000000634",

*   "additional_information": "//S1/10/5541/11/191210/20/1235/31/191220200108/32/2.5:337.5;3.7:3807.5/40/0:30",

*   "is_editing_restricted": false,

*   "execution_date": "2018-03-17"

},

*   "instruction_id": "5a335fe3345a96.14999616",

*   "status": "open",

*   "created_at": "2018-04-09T07:44:10+00:00"

}
```

Get QR payment Deprecated
-------------------------

This action fetches an IBAN payment which is associated to the specified bank account

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| bank_account_id required | integer  the id of the bank account |
| payment_id required | string or integer ID or UUID of the IBAN payment |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/banking/bank\_accounts/{bank\_account\_id}/qr\_payments/{payment\_id}

Live Server

<https://api.bexio.com/3.0/banking/bank_accounts/{bank_account_id}/qr_payments/{payment_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/banking/bank_accounts/{bank_account_id}/qr_payments/{payment_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "type": "qr",

*   "bank_account": {

*   "id": 4,

*   "iban": "CH560025025010367101Y"

},

*   "payment": {

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "qr_reference_nr": "998877000000000000000000634",

*   "additional_information": "//S1/10/5541/11/191210/20/1235/31/191220200108/32/2.5:337.5;3.7:3807.5/40/0:30",

*   "is_editing_restricted": false,

*   "execution_date": "2018-03-17"

},

*   "instruction_id": "5a335fe3345a96.14999616",

*   "status": "open",

*   "created_at": "2018-04-09T07:44:10+00:00"

}
```

Update QR payment Deprecated
----------------------------

This action updates an existing payment for the selected bank account. Please note that a payment can only be edited, when the status is "open".

Please note that you do not have to provide all fields to update a payment.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| bank_account_id required | string |
| payment_id required | string or integer ID or UUID of the IBAN payment |

##### query Parameters

| Name | Details |
| --- | --- |
| iban required | integer  IBAN of the payment bank account |
| id required | integer  ID of the IBAN payment |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Payment that needs to be added for the selected bank account

| Name | Details |
| --- | --- |
| instructed_amount required | object (BankPaymentAmount) |
| recipient required | object (BankPaymentRecipient) |
| iban | string  The execution date of the payment. The bank holds back the payment until this date is reached. Format (Y-m-d). |

### Responses

**200**

OK

**422**

Validation error

patch/3.0/banking/bank\_accounts/{bank\_account\_id}/qr\_payments/{payment\_id}

Live Server

<https://api.bexio.com/3.0/banking/bank_accounts/{bank_account_id}/qr_payments/{payment_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "qr_reference_nr": "998877000000000000000000634",

*   "additional_information": "//S1/10/5541/11/191210/20/1235/31/191220200108/32/2.5:337.5;3.7:3807.5/40/0:30",

*   "is_editing_restricted": false,

*   "execution_date": "2018-03-17"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "type": "qr",

*   "bank_account": {

*   "id": 4,

*   "iban": "CH560025025010367101Y"

},

*   "payment": {

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "qr_reference_nr": "998877000000000000000000634",

*   "additional_information": "//S1/10/5541/11/191210/20/1235/31/191220200108/32/2.5:337.5;3.7:3807.5/40/0:30",

*   "is_editing_restricted": false,

*   "execution_date": "2018-03-17"

},

*   "instruction_id": "5a335fe3345a96.14999616",

*   "status": "open",

*   "created_at": "2018-04-09T07:44:10+00:00"

}
```

Payments
--------

Fetch a list of payments Deprecated
-----------------------------------

This action fetches all payments

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| from | string  Filter payments by their date starting from the specified date (Format: Y-m-d) |
| to | string  Filter payments by their date ranging to the specified date (Format: Y-m-d) |
| bill_id | string or integer Filter payments by the referenced bill |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/banking/payments

Live Server

<https://api.bexio.com/3.0/banking/payments>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/banking/payments> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "type": "iban",

*   "bank_account": {

*   "id": 4,

*   "iban": "CH560025025010367101Y"

},

*   "payment": {

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "execution_date": "2018-03-17",

*   "is_salary_payment": false,

*   "is_editing_restricted": false,

*   "message": "Payment for invoice IV-1202842",

*   "allowance_type": "fee_paid_by_sender"

},

*   "instruction_id": "5a335fe3345a96.14999616",

*   "status": "open",

*   "created_at": "2018-04-09T07:44:10+00:00"

}
```

Cancel a payment Deprecated
---------------------------

This action cancels an existing payment. Please note that a payment can only be cancelled when the status is "downloaded", "transferred" or "error".

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| payment_id required | string or integer ID or UUID of the payment |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/3.0/banking/payments/{payment\_id}/cancel

Live Server

<https://api.bexio.com/3.0/banking/payments/{payment_id}/cancel>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/3.0/banking/payments/{payment_id}/cancel> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "type": "iban",

*   "bank_account": {

*   "id": 4,

*   "iban": "CH560025025010367101Y"

},

*   "payment": {

*   "instructed_amount": {

*   "currency": "CHF",

*   "amount": 187.2

},

*   "recipient": {

*   "name": "Müller GmbH",

*   "street": "Sonnenstrasse",

*   "zip": 8005,

*   "city": "Zürich",

*   "country_code": "CH",

*   "house_number": 36

},

*   "iban": "CH8100700110005554634",

*   "execution_date": "2018-03-17",

*   "is_salary_payment": false,

*   "is_editing_restricted": false,

*   "message": "Payment for invoice IV-1202842",

*   "allowance_type": "fee_paid_by_sender"

},

*   "instruction_id": "5a335fe3345a96.14999616",

*   "status": "open",

*   "created_at": "2018-04-09T07:44:10+00:00"

}
```

Delete a payment Deprecated
---------------------------

This action permanently deletes an existing payment. It cannot be undone. Please note that a payment can only be deleted when the status is "open".

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| payment_id required | string or integer ID or UUID of the payment |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/3.0/banking/payments/{payment\_id}

Live Server

<https://api.bexio.com/3.0/banking/payments/{payment_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/banking/payments/{payment_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Fetch a list of all payments
----------------------------

This action returns list of all payments

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| filter-by | string Examples: filter-by=account_id:0c295adb-91ff-4cd5-8a8c-009ee4330f69 - uuid of a bank account filter-by=status:open - Status of a payment filter-by=currency:CHF - Currency of a payment, according to ISO 4217 filter-by=execution_date:2025-16-11 - Execution date of a payment, format Y-m-d (ISO 8601) filter-by=amount:11.16 - Amount of a payment, represented by positive integer or float. filter-by=recipient.name:Bexio AG - Name of the recipient of a payment. filter-by=recipient.iban:DE75512108001245126199 - IBAN of the account of the recipient of a payment. filter-by=document_no:00000123 - Document number of a bill, linked to a payment. Filters can be used in range _, separated by ;, example multiple filter - filter-by=amount:11.16_16.11;execution_date:2025-11-16_2025-12-16 |
| page | integer  Default: 0 Example: page=0 Skip over a number of elements by specifying an offset value for the query |
| per-page | integer  Default: 500 Example: per-page=20 Limit the number of results (max is 2000) |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/4.0/banking/payments

Live Server

<https://api.bexio.com/4.0/banking/payments>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/banking/payments> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 0,

*   "uuid": "string",

*   "sender": {

*   "id": 0,

*   "uuid": "string",

*   "iban": "string"

},

*   "recipient": {

*   "name": "John Doe / John Doe Company Name",

*   "iban": "CH3000784295116252003",

*   "address": {

*   "street_name": "Föhrenstrasse",

*   "house_number": "34",

*   "zip": "5003",

*   "city": "Zürich",

*   "country_code": "CH"

}

},

*   "amount": "10.5858",

*   "currency": "CHF",

*   "execution_date": "2022-02-01",

*   "allowance": "fee_paid_by_payer",

*   "is_salary": false,

*   "instruction_id": "string",

*   "purchase_reference": {

*   "bill_id": "50d9b44e-68b6-43d6-9c5e-0cb4e5e0080c",

*   "bill_payment_id": "98f2c638-ee51-4159-9c26-27958d8fd6be"

},

*   "document_no": "0000044",

*   "qr_reference_number": "RF95000000000000000000011 / CH4431999123000889012",

*   "additional_information": "string",

*   "status": "open",

*   "type": "iban",

*   "due_date": "2022-02-01",

*   "created_at": "string",

*   "is_editing_restricted": false

}
```

Create a payment
----------------

This action creates a new payment

##### Authorizations

_bearerAuth_

##### Request Body schema: application/json

required

Payment that needs to be added

| Name | Details |
| --- | --- |
| account_id required | string  |
| allowance | string Default: "fee_split" Enum: "fee_paid_by_payer" "fee_paid_by_payee" "fee_split" "no_fee" For payments to other countries or with different currencies |
| amount required | number > 0 The amount (decimal number) to send in the chosen currency. The amount may be exchanged by the bank if a currency is different from the currency of an account |
| currency required | string ^[A-Z]{3}$ Currency in which send a payment, according to ISO 4217 |
| execution_date required | string  Date according to ISO 8601. Execution date of a payment (when the payment should be carried out by the bank), should be at least the next working day |
| is_salary required | boolean or null Default: false If it is a salary payment |
| recipient required | object (PaymentAddress) |
| type required | string Enum: "iban" "qr" Type of the payment. Each payment requires different fields |
| is_editing_restricted | boolean If set to true, editing will be restricted to the api client id which created the payment |
| message | string or null ^([a-zA-Z0-9\.,;:'\+\-/\(\)?\*\[\]\{\}\\`´~ ]... Show pattern Multiline description of the payment |

### Responses

**201**

Created

**422**

Validation error

post/4.0/banking/payments

Live Server

<https://api.bexio.com/4.0/banking/payments>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "account_id": "449e7a5c-69d3-4b8a-aaaf-5c9b713ebc65",

*   "allowance": "fee_paid_by_payer",

*   "amount": "10.5858",

*   "currency": "CHF",

*   "execution_date": "2025-11-16",

*   "is_salary": false,

*   "recipient": {

*   "name": "John Doe / John Doe Company Name",

*   "iban": "CH3000784295116252003",

*   "address": {

*   "street_name": "Föhrenstrasse",

*   "house_number": "34",

*   "zip": "5003",

*   "city": "Zürich",

*   "country_code": "CH"

}

},

*   "type": "iban",

*   "is_editing_restricted": false,

*   "message": "string"

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 0,

*   "uuid": "string",

*   "sender": {

*   "id": 0,

*   "uuid": "string",

*   "iban": "string"

},

*   "recipient": {

*   "name": "John Doe / John Doe Company Name",

*   "iban": "CH3000784295116252003",

*   "address": {

*   "street_name": "Föhrenstrasse",

*   "house_number": "34",

*   "zip": "5003",

*   "city": "Zürich",

*   "country_code": "CH"

}

},

*   "amount": "10.5858",

*   "currency": "CHF",

*   "execution_date": "2022-02-01",

*   "allowance": "fee_paid_by_payer",

*   "is_salary": false,

*   "instruction_id": "string",

*   "purchase_reference": {

*   "bill_id": "50d9b44e-68b6-43d6-9c5e-0cb4e5e0080c",

*   "bill_payment_id": "98f2c638-ee51-4159-9c26-27958d8fd6be"

},

*   "document_no": "0000044",

*   "qr_reference_number": "RF95000000000000000000011 / CH4431999123000889012",

*   "additional_information": "string",

*   "status": "open",

*   "type": "iban",

*   "due_date": "2022-02-01",

*   "created_at": "string",

*   "is_editing_restricted": false

}
```

Get a payment
-------------

This action returns single payment

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| payment_id required | string  Payment uuid |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

Success

get/4.0/banking/payments/{payment\_id}

Live Server

<https://api.bexio.com/4.0/banking/payments/{payment_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/banking/payments/{payment_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 0,

*   "uuid": "string",

*   "sender": {

*   "id": 0,

*   "uuid": "string",

*   "iban": "string"

},

*   "recipient": {

*   "name": "John Doe / John Doe Company Name",

*   "iban": "CH3000784295116252003",

*   "address": {

*   "street_name": "Föhrenstrasse",

*   "house_number": "34",

*   "zip": "5003",

*   "city": "Zürich",

*   "country_code": "CH"

}

},

*   "amount": "10.5858",

*   "currency": "CHF",

*   "execution_date": "2022-02-01",

*   "allowance": "fee_paid_by_payer",

*   "is_salary": false,

*   "instruction_id": "string",

*   "purchase_reference": {

*   "bill_id": "50d9b44e-68b6-43d6-9c5e-0cb4e5e0080c",

*   "bill_payment_id": "98f2c638-ee51-4159-9c26-27958d8fd6be"

},

*   "document_no": "0000044",

*   "qr_reference_number": "RF95000000000000000000011 / CH4431999123000889012",

*   "additional_information": "string",

*   "status": "open",

*   "type": "iban",

*   "due_date": "2022-02-01",

*   "created_at": "string",

*   "is_editing_restricted": false

}
```

Update a payment
----------------

This action updates a payment

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| payment_id required | string  Payment uuid |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

One of

PaymentUpdate

| Name | Details |
| --- | --- |
| allowance | string Default: "fee_split" Enum: "fee_paid_by_payer" "fee_paid_by_payee" "fee_split" "no_fee" For payments to other countries or with different currencies |
| amount | number > 0 The amount (decimal number) to send in the chosen currency. The amount may be exchanged by the bank if a currency is different from the currency of an account |
| currency | string ^[A-Z]{3}$ Currency in which send a payment, according to ISO 4217 |
| execution_date | string  Date according to ISO 8601. Execution date of a payment (when the payment should be carried out by the bank), should be at least the next working day |
| is_salary | boolean Default: false If it is a salary payment |
| recipient | object (PaymentAddress) |
| is_editing_restricted | boolean If set to true, editing will be restricted to the api client id which created the payment |
| message | string or null ^([a-zA-Z0-9\.,;:'\+\-/\(\)?\*\[\]\{\}\\`´~ ]... Show pattern Multiline description of the payment |

### Responses

**200**

Updated

**422**

Validation error

put/4.0/banking/payments/{payment\_id}

Live Server

<https://api.bexio.com/4.0/banking/payments/{payment_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "allowance": "fee_paid_by_payer",

*   "amount": "10.5858",

*   "currency": "CHF",

*   "execution_date": "2025-11-16",

*   "is_salary": false,

*   "recipient": {

*   "name": "John Doe / John Doe Company Name",

*   "iban": "CH3000784295116252003",

*   "address": {

*   "street_name": "Föhrenstrasse",

*   "house_number": "34",

*   "zip": "5003",

*   "city": "Zürich",

*   "country_code": "CH"

}

},

*   "is_editing_restricted": false,

*   "message": "string"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 0,

*   "uuid": "string",

*   "sender": {

*   "id": 0,

*   "uuid": "string",

*   "iban": "string"

},

*   "recipient": {

*   "name": "John Doe / John Doe Company Name",

*   "iban": "CH3000784295116252003",

*   "address": {

*   "street_name": "Föhrenstrasse",

*   "house_number": "34",

*   "zip": "5003",

*   "city": "Zürich",

*   "country_code": "CH"

}

},

*   "amount": "10.5858",

*   "currency": "CHF",

*   "execution_date": "2022-02-01",

*   "allowance": "fee_paid_by_payer",

*   "is_salary": false,

*   "instruction_id": "string",

*   "purchase_reference": {

*   "bill_id": "50d9b44e-68b6-43d6-9c5e-0cb4e5e0080c",

*   "bill_payment_id": "98f2c638-ee51-4159-9c26-27958d8fd6be"

},

*   "document_no": "0000044",

*   "qr_reference_number": "RF95000000000000000000011 / CH4431999123000889012",

*   "additional_information": "string",

*   "status": "open",

*   "type": "iban",

*   "due_date": "2022-02-01",

*   "created_at": "string",

*   "is_editing_restricted": false

}
```

Delete a payment
----------------

This action permanently deletes an existing payment. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| payment_id required | string  Payment uuid |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/4.0/banking/payments/{payment\_id}

Live Server

<https://api.bexio.com/4.0/banking/payments/{payment_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/4.0/banking/payments/{payment_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Cancel a payment
----------------

This action cancels an existing payment. Please note that a payment can only be cancelled when the status is "downloaded", "transferred" or "error".

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| payment_id required | string  Payment uuid |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/4.0/banking/payments/{payment\_id}/cancel

Live Server

<https://api.bexio.com/4.0/banking/payments/{payment_id}/cancel>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/4.0/banking/payments/{payment_id}/cancel> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 0,

*   "uuid": "string",

*   "sender": {

*   "id": 0,

*   "uuid": "string",

*   "iban": "string"

},

*   "recipient": {

*   "name": "John Doe / John Doe Company Name",

*   "iban": "CH3000784295116252003",

*   "address": {

*   "street_name": "Föhrenstrasse",

*   "house_number": "34",

*   "zip": "5003",

*   "city": "Zürich",

*   "country_code": "CH"

}

},

*   "amount": "10.5858",

*   "currency": "CHF",

*   "execution_date": "2022-02-01",

*   "allowance": "fee_paid_by_payer",

*   "is_salary": false,

*   "instruction_id": "string",

*   "purchase_reference": {

*   "bill_id": "50d9b44e-68b6-43d6-9c5e-0cb4e5e0080c",

*   "bill_payment_id": "98f2c638-ee51-4159-9c26-27958d8fd6be"

},

*   "document_no": "0000044",

*   "qr_reference_number": "RF95000000000000000000011 / CH4431999123000889012",

*   "additional_information": "string",

*   "status": "open",

*   "type": "iban",

*   "due_date": "2022-02-01",

*   "created_at": "string",

*   "is_editing_restricted": false

}
```

Items
-----

Fetch a list of items
---------------------

This action fetches a list of all items / products

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "intern_name" Example: order_by=intern_name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/article

Live Server

<https://api.bexio.com/2.0/article>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/article> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "user_id": 1,

*   "article_type_id": 1,

*   "contact_id": 14,

*   "deliverer_code": null,

*   "deliverer_name": null,

*   "deliverer_description": null,

*   "intern_code": "wh-2019",

*   "intern_name": "Webhosting",

*   "intern_description": null,

*   "purchase_price": null,

*   "sale_price": null,

*   "purchase_total": null,

*   "sale_total": null,

*   "currency_id": null,

*   "tax_income_id": null,

*   "tax_id": null,

*   "tax_expense_id": null,

*   "unit_id": null,

*   "is_stock": false,

*   "stock_id": null,

*   "stock_place_id": null,

*   "stock_nr": 0,

*   "stock_min_nr": 0,

*   "stock_reserved_nr": 0,

*   "stock_available_nr": 0,

*   "stock_picked_nr": 0,

*   "stock_disposed_nr": 0,

*   "stock_ordered_nr": 0,

*   "width": null,

*   "height": null,

*   "weight": null,

*   "volume": null,

*   "html_text": null,

*   "remarks": null,

*   "delivery_price": null,

*   "article_group_id": null,

*   "account_id": null,

*   "expense_account_id": null

}

]
```

Create item
-----------

This action creates a new item

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| user_id | integer References a user object (Currently, it has no impact, regardless of which user_id is sent.) |
| article_type_id | integer Please use the value 1 for physical products or 2 for services |
| contact_id | integer or null References a contact object |
| deliverer_code | string or null |
| deliverer_name | string or null |
| deliverer_description | string or null |
| intern_code | string |
| intern_name | string |
| intern_description | string or null |
| purchase_price | string or null |
| sale_price | string or null |
| purchase_total | number or null |
| sale_total | number or null |
| currency_id | integer or null References a currency object |
| tax_income_id | integer or null References a tax object |
| tax_expense_id | integer or null References a tax object |
| unit_id | integer or null References a unit object |
| is_stock | boolean Requires stock_edit scope to work. |
| stock_id | integer or null References a stock location object |
| stock_place_id | integer or null References a stock area object |
| stock_nr | integer Please note that the stock number can only be set if no bookings for this product have been made. |
| stock_min_nr | integer |
| width | integer or null |
| height | integer or null |
| weight | integer or null |
| volume | integer or null |
| html_text | string or null Deprecated |
| remarks | string or null |
| delivery_price | number or null |
| article_group_id | integer or null |
| account_id | integer or null References an account object |
| expense_account_id | integer or null References an account object |

### Responses

**201**

Created

**422**

Validation error

post/2.0/article

Live Server

<https://api.bexio.com/2.0/article>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "user_id": 1,

*   "article_type_id": 1,

*   "contact_id": 14,

*   "deliverer_code": null,

*   "deliverer_name": null,

*   "deliverer_description": null,

*   "intern_code": "wh-2019",

*   "intern_name": "Webhosting",

*   "intern_description": null,

*   "purchase_price": null,

*   "sale_price": null,

*   "purchase_total": null,

*   "sale_total": null,

*   "currency_id": null,

*   "tax_income_id": null,

*   "tax_expense_id": null,

*   "unit_id": null,

*   "is_stock": false,

*   "stock_id": null,

*   "stock_place_id": null,

*   "stock_nr": 0,

*   "stock_min_nr": 0,

*   "width": null,

*   "height": null,

*   "weight": null,

*   "volume": null,

*   "html_text": null,

*   "remarks": null,

*   "delivery_price": null,

*   "article_group_id": null,

*   "account_id": null,

*   "expense_account_id": null

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "user_id": 1,

*   "article_type_id": 1,

*   "contact_id": 14,

*   "deliverer_code": null,

*   "deliverer_name": null,

*   "deliverer_description": null,

*   "intern_code": "wh-2019",

*   "intern_name": "Webhosting",

*   "intern_description": null,

*   "purchase_price": null,

*   "sale_price": null,

*   "purchase_total": null,

*   "sale_total": null,

*   "currency_id": null,

*   "tax_income_id": null,

*   "tax_id": null,

*   "tax_expense_id": null,

*   "unit_id": null,

*   "is_stock": false,

*   "stock_id": null,

*   "stock_place_id": null,

*   "stock_nr": 0,

*   "stock_min_nr": 0,

*   "stock_reserved_nr": 0,

*   "stock_available_nr": 0,

*   "stock_picked_nr": 0,

*   "stock_disposed_nr": 0,

*   "stock_ordered_nr": 0,

*   "width": null,

*   "height": null,

*   "weight": null,

*   "volume": null,

*   "html_text": null,

*   "remarks": null,

*   "delivery_price": null,

*   "article_group_id": null,

*   "account_id": null,

*   "expense_account_id": null

}
```

Search items
------------

Search items via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `intern_name`
* `intern_code`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "intern_name" Example: order_by=intern_name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 4,

*   "user_id": 1,

*   "article_type_id": 1,

*   "contact_id": 14,

*   "deliverer_code": null,

*   "deliverer_name": null,

*   "deliverer_description": null,

*   "intern_code": "wh-2019",

*   "intern_name": "Webhosting",

*   "intern_description": null,

*   "purchase_price": null,

*   "sale_price": null,

*   "purchase_total": null,

*   "sale_total": null,

*   "currency_id": null,

*   "tax_income_id": null,

*   "tax_id": null,

*   "tax_expense_id": null,

*   "unit_id": null,

*   "is_stock": false,

*   "stock_id": null,

*   "stock_place_id": null,

*   "stock_nr": 0,

*   "stock_min_nr": 0,

*   "stock_reserved_nr": 0,

*   "stock_available_nr": 0,

*   "stock_picked_nr": 0,

*   "stock_disposed_nr": 0,

*   "stock_ordered_nr": 0,

*   "width": null,

*   "height": null,

*   "weight": null,

*   "volume": null,

*   "html_text": null,

*   "remarks": null,

*   "delivery_price": null,

*   "article_group_id": null,

*   "account_id": null,

*   "expense_account_id": null

}

]
```

Fetch an item
-------------

This action fetches a single item

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| article_id required | integer  Example: 1 the id of the item |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/article/{article\_id}

Live Server

<https://api.bexio.com/2.0/article/{article_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/article/{article_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "user_id": 1,

*   "article_type_id": 1,

*   "contact_id": 14,

*   "deliverer_code": null,

*   "deliverer_name": null,

*   "deliverer_description": null,

*   "intern_code": "wh-2019",

*   "intern_name": "Webhosting",

*   "intern_description": null,

*   "purchase_price": null,

*   "sale_price": null,

*   "purchase_total": null,

*   "sale_total": null,

*   "currency_id": null,

*   "tax_income_id": null,

*   "tax_id": null,

*   "tax_expense_id": null,

*   "unit_id": null,

*   "is_stock": false,

*   "stock_id": null,

*   "stock_place_id": null,

*   "stock_nr": 0,

*   "stock_min_nr": 0,

*   "stock_reserved_nr": 0,

*   "stock_available_nr": 0,

*   "stock_picked_nr": 0,

*   "stock_disposed_nr": 0,

*   "stock_ordered_nr": 0,

*   "width": null,

*   "height": null,

*   "weight": null,

*   "volume": null,

*   "html_text": null,

*   "remarks": null,

*   "delivery_price": null,

*   "article_group_id": null,

*   "account_id": null,

*   "expense_account_id": null

}
```

Edit an item
------------

This action edits a single item

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| article_id required | integer  Example: 1 the id of the item |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| user_id | integer References a user object (Currently, it has no impact, regardless of which user_id is sent.) |
| contact_id | integer or null References a contact object |
| deliverer_code | string or null |
| deliverer_name | string or null |
| deliverer_description | string or null |
| intern_code | string |
| intern_name | string |
| intern_description | string or null |
| purchase_price | string or null |
| sale_price | string or null |
| purchase_total | number or null |
| sale_total | number or null |
| currency_id | integer or null References a currency object |
| tax_income_id | integer or null References a tax object |
| tax_expense_id | integer or null References a tax object |
| unit_id | integer or null References a unit object |
| is_stock | boolean Requires stock_edit scope to work. |
| stock_id | integer or null References a stock location object |
| stock_place_id | integer or null References a stock area object |
| stock_nr | integer Please note that the stock number can only be set if no bookings for this product have been made. |
| stock_min_nr | integer |
| width | integer or null |
| height | integer or null |
| weight | integer or null |
| volume | integer or null |
| html_text | string or null Deprecated |
| remarks | string or null |
| delivery_price | number or null |
| article_group_id | integer or null |
| account_id | integer or null References an account object |
| expense_account_id | integer or null References an account object |

### Responses

**200**

OK

**422**

Validation error

post/2.0/article/{article\_id}

Live Server

<https://api.bexio.com/2.0/article/{article_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "user_id": 1,

*   "contact_id": 14,

*   "deliverer_code": null,

*   "deliverer_name": null,

*   "deliverer_description": null,

*   "intern_code": "wh-2019",

*   "intern_name": "Webhosting",

*   "intern_description": null,

*   "purchase_price": null,

*   "sale_price": null,

*   "purchase_total": null,

*   "sale_total": null,

*   "currency_id": null,

*   "tax_income_id": null,

*   "tax_expense_id": null,

*   "unit_id": null,

*   "is_stock": false,

*   "stock_id": null,

*   "stock_place_id": null,

*   "stock_nr": 0,

*   "stock_min_nr": 0,

*   "width": null,

*   "height": null,

*   "weight": null,

*   "volume": null,

*   "html_text": null,

*   "remarks": null,

*   "delivery_price": null,

*   "article_group_id": null,

*   "account_id": null,

*   "expense_account_id": null

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "user_id": 1,

*   "article_type_id": 1,

*   "contact_id": 14,

*   "deliverer_code": null,

*   "deliverer_name": null,

*   "deliverer_description": null,

*   "intern_code": "wh-2019",

*   "intern_name": "Webhosting",

*   "intern_description": null,

*   "purchase_price": null,

*   "sale_price": null,

*   "purchase_total": null,

*   "sale_total": null,

*   "currency_id": null,

*   "tax_income_id": null,

*   "tax_id": null,

*   "tax_expense_id": null,

*   "unit_id": null,

*   "is_stock": false,

*   "stock_id": null,

*   "stock_place_id": null,

*   "stock_nr": 0,

*   "stock_min_nr": 0,

*   "stock_reserved_nr": 0,

*   "stock_available_nr": 0,

*   "stock_picked_nr": 0,

*   "stock_disposed_nr": 0,

*   "stock_ordered_nr": 0,

*   "width": null,

*   "height": null,

*   "weight": null,

*   "volume": null,

*   "html_text": null,

*   "remarks": null,

*   "delivery_price": null,

*   "article_group_id": null,

*   "account_id": null,

*   "expense_account_id": null

}
```

Delete an item
--------------

This action permanently deletes an item. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| article_id required | integer  Example: 1 the id of the item |

### Responses

**200**

OK

delete/2.0/article/{article\_id}

Live Server

<https://api.bexio.com/2.0/article/{article_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/article/{article_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Stock locations
---------------

Fetch a list of stock locations
-------------------------------

This action fetches a list of all stock locations

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/stock

Live Server

<https://api.bexio.com/2.0/stock>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/stock> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Stock Berlin"

}

]
```

Search stock locations
----------------------

Search stock locations via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Stock Berlin"

}

]
```

Stock Areas
-----------

Fetch a list of stock areas
---------------------------

This action fetches a list of all stock areas

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/stock\_place

Live Server

<https://api.bexio.com/2.0/stock_place>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/stock_place> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Shelf A-06"

}

]
```

Search stock areas
------------------

Search stock areas via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`
* `stock_id`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Shelf A-06"

}

]
```

Projects
--------

Fetch a list of projects
------------------------

This action fetches a list of all projects

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/pr\_project

Live Server

<https://api.bexio.com/2.0/pr_project>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/pr_project> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 2,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "nr": "000002",

*   "name": "Villa Kunterbunt",

*   "start_date": "2019-07-12 00:00:00",

*   "end_date": null,

*   "comment": "",

*   "pr_state_id": 2,

*   "pr_project_type_id": 2,

*   "contact_id": 2,

*   "contact_sub_id": null,

*   "pr_invoice_type_id": 3,

*   "pr_invoice_type_amount": "230.00",

*   "pr_budget_type_id": 1,

*   "pr_budget_type_amount": "200.00",

*   "user_id": 1

}

]
```

Create project
--------------

This action creates a new project

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| document_nr | string Can not be used if “automatic numbering” is activated in frontend-settings. required if “automatic numbering” deactivated. https://help.bexio.com/s/article/000001721 |
| name required | string |
| start_date | string or null  |
| end_date | string or null  |
| comment | string |
| pr_state_id required | integer References a project status object |
| pr_project_type_id required | integer References a project type object |
| contact_id required | integer References a contact object |
| contact_sub_id | integer or null References a contact object |
| 1 | type_hourly_rate_service |
| 2 | type_hourly_rate_employee |
| 3 | type_hourly_rate_project |
| 4 | type_fix |
- **pr_invoice_type_amount** (string)
This field can only be edited if the `pr_invoice_type` is set. (Only supported for invoice types: `type_hourly_rate_project` and `type_fix`)
- **pr_budget_type_id** (number or null)
The following budget types are available:

| Name | Details |
| --- | --- |
| 1 | type_budgeted_costs |
| 2 | type_budgeted_hours |
| 3 | type_service_budget |
| 4 | type_service_employees |
- **pr_budget_type_amount** (string)
This field can only be edited if the `pr_budget_type` is set. (Only supported for budget types: `type_budgeted_costs` and `type_budgeted_hours`)
- **user_id** required (integer)
References a [user object](#operation/v3ListUsers)

### Responses

**201**

Created

**422**

Validation error

post/2.0/pr\_project

Live Server

<https://api.bexio.com/2.0/pr_project>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "document_nr": "project name",

*   "name": "Villa Kunterbunt",

*   "start_date": "2019-07-12 00:00:00",

*   "end_date": null,

*   "comment": "",

*   "pr_state_id": 2,

*   "pr_project_type_id": 2,

*   "contact_id": 2,

*   "contact_sub_id": null,

*   "pr_invoice_type_id": 3,

*   "pr_invoice_type_amount": "230.00",

*   "pr_budget_type_id": 1,

*   "pr_budget_type_amount": "200.00",

*   "user_id": 1

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 2,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "nr": "000002",

*   "name": "Villa Kunterbunt",

*   "start_date": "2019-07-12 00:00:00",

*   "end_date": null,

*   "comment": "",

*   "pr_state_id": 2,

*   "pr_project_type_id": 2,

*   "contact_id": 2,

*   "contact_sub_id": null,

*   "pr_invoice_type_id": 3,

*   "pr_invoice_type_amount": "230.00",

*   "pr_budget_type_id": 1,

*   "pr_budget_type_amount": "200.00",

*   "user_id": 1

}
```

Search projects
---------------

Search projects via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`
* `contact_id`
* `pr_state_id`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 2,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "nr": "000002",

*   "name": "Villa Kunterbunt",

*   "start_date": "2019-07-12 00:00:00",

*   "end_date": null,

*   "comment": "",

*   "pr_state_id": 2,

*   "pr_project_type_id": 2,

*   "contact_id": 2,

*   "contact_sub_id": null,

*   "pr_invoice_type_id": 3,

*   "pr_invoice_type_amount": "230.00",

*   "pr_budget_type_id": 1,

*   "pr_budget_type_amount": "200.00",

*   "user_id": 1

}

]
```

Fetch a project
---------------

This action fetches a single project

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/pr\_project/{project\_id}

Live Server

<https://api.bexio.com/2.0/pr_project/{project_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/pr_project/{project_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 2,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "nr": "000002",

*   "name": "Villa Kunterbunt",

*   "start_date": "2019-07-12 00:00:00",

*   "end_date": null,

*   "comment": "",

*   "pr_state_id": 2,

*   "pr_project_type_id": 2,

*   "contact_id": 2,

*   "contact_sub_id": null,

*   "pr_invoice_type_id": 3,

*   "pr_invoice_type_amount": "230.00",

*   "pr_budget_type_id": 1,

*   "pr_budget_type_amount": "200.00",

*   "user_id": 1

}
```

Edit a project
--------------

This action edits a single project

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| document_nr | string Can not be used if “automatic numbering” is activated in frontend-settings. required if “automatic numbering” deactivated. https://help.bexio.com/s/article/000001721 |
| name required | string |
| start_date | string or null  |
| end_date | string or null  |
| comment | string |
| pr_state_id required | integer References a project status object |
| pr_project_type_id required | integer References a project type object |
| contact_id required | integer References a contact object |
| contact_sub_id | integer or null References a contact object |
| 1 | type_hourly_rate_service |
| 2 | type_hourly_rate_employee |
| 3 | type_hourly_rate_project |
| 4 | type_fix |
- **pr_invoice_type_amount** (string)
This field can only be edited if the `pr_invoice_type` is set. (Only supported for invoice types: `type_hourly_rate_project` and `type_fix`)
- **pr_budget_type_id** (number or null)
The following budget types are available:

| Name | Details |
| --- | --- |
| 1 | type_budgeted_costs |
| 2 | type_budgeted_hours |
| 3 | type_service_budget |
| 4 | type_service_employees |
- **pr_budget_type_amount** (string)
This field can only be edited if the `pr_budget_type` is set. (Only supported for budget types: `type_budgeted_costs` and `type_budgeted_hours`)
- **user_id** required (integer)
References a [user object](#operation/v3ListUsers)

### Responses

**200**

OK

**422**

Validation error

post/2.0/pr\_project/{project\_id}

Live Server

<https://api.bexio.com/2.0/pr_project/{project_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "document_nr": "project name",

*   "name": "Villa Kunterbunt",

*   "start_date": "2019-07-12 00:00:00",

*   "end_date": null,

*   "comment": "",

*   "pr_state_id": 2,

*   "pr_project_type_id": 2,

*   "contact_id": 2,

*   "contact_sub_id": null,

*   "pr_invoice_type_id": 3,

*   "pr_invoice_type_amount": "230.00",

*   "pr_budget_type_id": 1,

*   "pr_budget_type_amount": "200.00",

*   "user_id": 1

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 2,

*   "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",

*   "nr": "000002",

*   "name": "Villa Kunterbunt",

*   "start_date": "2019-07-12 00:00:00",

*   "end_date": null,

*   "comment": "",

*   "pr_state_id": 2,

*   "pr_project_type_id": 2,

*   "contact_id": 2,

*   "contact_sub_id": null,

*   "pr_invoice_type_id": 3,

*   "pr_invoice_type_amount": "230.00",

*   "pr_budget_type_id": 1,

*   "pr_budget_type_amount": "200.00",

*   "user_id": 1

}
```

Delete a project
----------------

This action permanently deletes a project. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/pr\_project/{project\_id}

Live Server

<https://api.bexio.com/2.0/pr_project/{project_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/pr_project/{project_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Archive a project
-----------------

This action archives a project

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/pr\_project/{project\_id}/archive

Live Server

<https://api.bexio.com/2.0/pr_project/{project_id}/archive>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/pr_project/{project_id}/archive> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Unarchive a project
-------------------

This action unarchives an archived project

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

post/2.0/pr\_project/{project\_id}/reactivate

Live Server

<https://api.bexio.com/2.0/pr_project/{project_id}/reactivate>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X POST \\
<https://api.bexio.com/2.0/pr_project/{project_id}/reactivate> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Project status
--------------

This action fetches a list of project status

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/pr\_project\_state

Live Server

<https://api.bexio.com/2.0/pr_project_state>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/pr_project_state> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Active"

}

]
```

Project types
-------------

This action fetches a list of project types

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/pr\_project\_type

Live Server

<https://api.bexio.com/2.0/pr_project_type>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/pr_project_type> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Internal Project"

}

]
```

Fetch a list of milestones
--------------------------

This action fetches a list of all milestones for a given project

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

**422**

Validation error

get/3.0/projects/{project\_id}/milestones

Live Server

<https://api.bexio.com/3.0/projects/{project_id}/milestones>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/projects/{project_id}/milestones> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 4,

*   "name": "project documentation",

*   "end_date": "2018-05-18",

*   "comment": "Finish project documentation.",

*   "pr_parent_milestone_id": 3

}

]
```

Create milestone
----------------

This action creates a new milestone

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| name required | string  The end date for the milestone |
| comment | string  Higher level milestone |

### Responses

**201**

Created

**422**

Validation error

post/3.0/projects/{project\_id}/milestones

Live Server

<https://api.bexio.com/3.0/projects/{project_id}/milestones>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "project documentation",

*   "end_date": "2018-05-18",

*   "comment": "Finish project documentation.",

*   "pr_parent_milestone_id": 3

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "name": "project documentation",

*   "end_date": "2018-05-18",

*   "comment": "Finish project documentation.",

*   "pr_parent_milestone_id": 3

}
```

Fetch a milestone
-----------------

This action fetches a single milestone

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |
| milestone_id required | integer  Example: 3 the id of the milestone |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/projects/{project\_id}/milestones/{milestone\_id}

Live Server

<https://api.bexio.com/3.0/projects/{project_id}/milestones/{milestone_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/projects/{project_id}/milestones/{milestone_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "name": "project documentation",

*   "end_date": "2018-05-18",

*   "comment": "Finish project documentation.",

*   "pr_parent_milestone_id": 3

}
```

Edit a milestone
----------------

This action edits a single milestone

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |
| milestone_id required | integer  Example: 3 the id of the milestone |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| name required | string  The end date for the milestone |
| comment | string  Higher level milestone |

### Responses

**200**

OK

**422**

Validation error

post/3.0/projects/{project\_id}/milestones/{milestone\_id}

Live Server

<https://api.bexio.com/3.0/projects/{project_id}/milestones/{milestone_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "project documentation",

*   "end_date": "2018-05-18",

*   "comment": "Finish project documentation.",

*   "pr_parent_milestone_id": 3

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "name": "project documentation",

*   "end_date": "2018-05-18",

*   "comment": "Finish project documentation.",

*   "pr_parent_milestone_id": 3

}
```

Delete a milestone
------------------

This action permanently deletes a milestone. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |
| milestone_id required | integer  Example: 3 the id of the milestone |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/3.0/projects/{project\_id}/milestones/{milestone\_id}

Live Server

<https://api.bexio.com/3.0/projects/{project_id}/milestones/{milestone_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/projects/{project_id}/milestones/{milestone_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Fetch a list of work packages
-----------------------------

This action fetches a list of all work packages for a given project

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

**422**

Validation error

get/3.0/projects/{project\_id}/packages

Live Server

<https://api.bexio.com/3.0/projects/{project_id}/packages>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/projects/{project_id}/packages> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 4,

*   "name": "Documentation",

*   "spent_time_in_hours": 0.5,

*   "estimated_time_in_hours": 1.75,

*   "comment": "Crete project documentation",

*   "pr_milestone_id": 3

}

]
```

Create work package
-------------------

This action creates a new work package

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| name required | string  References a milestone object |

### Responses

**201**

Created

**422**

Validation error

post/3.0/projects/{project\_id}/packages

Live Server

<https://api.bexio.com/3.0/projects/{project_id}/packages>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Documentation",

*   "spent_time_in_hours": 0.5,

*   "estimated_time_in_hours": 1.75,

*   "comment": "Crete project documentation",

*   "pr_milestone_id": 3

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "name": "Documentation",

*   "spent_time_in_hours": 0.5,

*   "estimated_time_in_hours": 1.75,

*   "comment": "Crete project documentation",

*   "pr_milestone_id": 3

}
```

Fetch a work package
--------------------

This action fetches a single work package

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |
| package_id required | integer  Example: 3 the id of the work package |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/projects/{project\_id}/packages/{package\_id}

Live Server

<https://api.bexio.com/3.0/projects/{project_id}/packages/{package_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/projects/{project_id}/packages/{package_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "name": "Documentation",

*   "spent_time_in_hours": 0.5,

*   "estimated_time_in_hours": 1.75,

*   "comment": "Crete project documentation",

*   "pr_milestone_id": 3

}
```

Delete a work package
---------------------

This action permanently deletes a work package. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |
| package_id required | integer  Example: 3 the id of the work package |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/3.0/projects/{project\_id}/packages/{package\_id}

Live Server

<https://api.bexio.com/3.0/projects/{project_id}/packages/{package_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/projects/{project_id}/packages/{package_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Edit a work package
-------------------

This action edits a single work package

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| project_id required | integer  Example: 1 the id of the project |
| package_id required | integer  Example: 3 the id of the work package |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| name required | string  References a milestone object |

### Responses

**200**

OK

**422**

Validation error

patch/3.0/projects/{project\_id}/packages/{package\_id}

Live Server

<https://api.bexio.com/3.0/projects/{project_id}/packages/{package_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Documentation",

*   "spent_time_in_hours": 0.5,

*   "estimated_time_in_hours": 1.75,

*   "comment": "Crete project documentation",

*   "pr_milestone_id": 3

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "name": "Documentation",

*   "spent_time_in_hours": 0.5,

*   "estimated_time_in_hours": 1.75,

*   "comment": "Crete project documentation",

*   "pr_milestone_id": 3

}
```

Timesheets
----------

Fetch a list of timesheets
--------------------------

This action fetches a list of all timesheets

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "date" Example: order_by=date Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/timesheet

Live Server

<https://api.bexio.com/2.0/timesheet>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/timesheet> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 2,

*   "user_id": 1,

*   "status_id": 4,

*   "client_service_id": 1,

*   "text": "",

*   "allowable_bill": true,

*   "charge": null,

*   "contact_id": 2,

*   "sub_contact_id": null,

*   "pr_project_id": null,

*   "pr_package_id": null,

*   "pr_milestone_id": null,

*   "travel_time": null,

*   "travel_charge": null,

*   "travel_distance": 0,

*   "estimated_time": "02:30",

*   "date": "2019-05-20",

*   "duration": "01:40",

*   "running": false,

*   "tracking": {

*   "type": "duration",

*   "date": "2019-05-20",

*   "duration": "01:40"

}

}

]
```

Create timesheet
----------------

This action creates a new timesheet

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| user_id required | integer References a user object |
| status_id | integer References a timesheet status object |
| client_service_id required | integer References a business activity object |
| text | string |
| allowable_bill required | boolean |
| charge | string or null |
| contact_id | integer or null References a contact object |
| sub_contact_id | integer or null References a contact object |
| pr_project_id | integer or null References a project object |
| pr_package_id | integer or null |
| pr_milestone_id | integer or null |
| estimated_time | string or null |
| tracking required | TimesheetDuration (object) or TimesheetRange (object) Two different formats can be used to submit the tracked time. Either type range or type duration. |

### Responses

**201**

Created

**422**

Validation error

post/2.0/timesheet

Live Server

<https://api.bexio.com/2.0/timesheet>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "user_id": 1,

*   "status_id": 4,

*   "client_service_id": 1,

*   "text": "",

*   "allowable_bill": true,

*   "charge": null,

*   "contact_id": 2,

*   "sub_contact_id": null,

*   "pr_project_id": null,

*   "pr_package_id": null,

*   "pr_milestone_id": null,

*   "estimated_time": "02:30",

*   "tracking": {

*   "type": "duration",

*   "date": "2019-05-20",

*   "duration": "01:40"

}

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 2,

*   "user_id": 1,

*   "status_id": 4,

*   "client_service_id": 1,

*   "text": "",

*   "allowable_bill": true,

*   "charge": null,

*   "contact_id": 2,

*   "sub_contact_id": null,

*   "pr_project_id": null,

*   "pr_package_id": null,

*   "pr_milestone_id": null,

*   "travel_time": null,

*   "travel_charge": null,

*   "travel_distance": 0,

*   "estimated_time": "02:30",

*   "date": "2019-05-20",

*   "duration": "01:40",

*   "running": false,

*   "tracking": {

*   "type": "duration",

*   "date": "2019-05-20",

*   "duration": "01:40"

}

}
```

Search timesheets
-----------------

Search timesheets via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `id`
* `client_service_id`
* `contact_id`
* `user_id`
* `pr_project_id`
* `status_id`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "date" Example: order_by=date Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 2,

*   "user_id": 1,

*   "status_id": 4,

*   "client_service_id": 1,

*   "text": "",

*   "allowable_bill": true,

*   "charge": null,

*   "contact_id": 2,

*   "sub_contact_id": null,

*   "pr_project_id": null,

*   "pr_package_id": null,

*   "pr_milestone_id": null,

*   "travel_time": null,

*   "travel_charge": null,

*   "travel_distance": 0,

*   "estimated_time": "02:30",

*   "date": "2019-05-20",

*   "duration": "01:40",

*   "running": false,

*   "tracking": {

*   "type": "duration",

*   "date": "2019-05-20",

*   "duration": "01:40"

}

}

]
```

Fetch a timesheet
-----------------

This action fetches a single timesheet

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| timesheet_id required | integer  Example: 1 the id of the timesheet |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/timesheet/{timesheet\_id}

Live Server

<https://api.bexio.com/2.0/timesheet/{timesheet_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/timesheet/{timesheet_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 2,

*   "user_id": 1,

*   "status_id": 4,

*   "client_service_id": 1,

*   "text": "",

*   "allowable_bill": true,

*   "charge": null,

*   "contact_id": 2,

*   "sub_contact_id": null,

*   "pr_project_id": null,

*   "pr_package_id": null,

*   "pr_milestone_id": null,

*   "travel_time": null,

*   "travel_charge": null,

*   "travel_distance": 0,

*   "estimated_time": "02:30",

*   "date": "2019-05-20",

*   "duration": "01:40",

*   "running": false,

*   "tracking": {

*   "type": "duration",

*   "date": "2019-05-20",

*   "duration": "01:40"

}

}
```

Edit a timesheet
----------------

This action edits a single timesheet

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| timesheet_id required | integer  Example: 1 the id of the timesheet |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| user_id required | integer References a user object |
| status_id | integer References a timesheet status object |
| client_service_id required | integer References a business activity object |
| text | string |
| allowable_bill required | boolean |
| charge | string or null |
| contact_id | integer or null References a contact object |
| sub_contact_id | integer or null References a contact object |
| pr_project_id | integer or null References a project object |
| pr_package_id | integer or null |
| pr_milestone_id | integer or null |
| estimated_time | string or null |
| tracking required | TimesheetDuration (object) or TimesheetRange (object) Two different formats can be used to submit the tracked time. Either type range or type duration. |

### Responses

**200**

OK

**422**

Validation error

post/2.0/timesheet/{timesheet\_id}

Live Server

<https://api.bexio.com/2.0/timesheet/{timesheet_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "user_id": 1,

*   "status_id": 4,

*   "client_service_id": 1,

*   "text": "",

*   "allowable_bill": true,

*   "charge": null,

*   "contact_id": 2,

*   "sub_contact_id": null,

*   "pr_project_id": null,

*   "pr_package_id": null,

*   "pr_milestone_id": null,

*   "estimated_time": "02:30",

*   "tracking": {

*   "type": "duration",

*   "date": "2019-05-20",

*   "duration": "01:40"

}

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 2,

*   "user_id": 1,

*   "status_id": 4,

*   "client_service_id": 1,

*   "text": "",

*   "allowable_bill": true,

*   "charge": null,

*   "contact_id": 2,

*   "sub_contact_id": null,

*   "pr_project_id": null,

*   "pr_package_id": null,

*   "pr_milestone_id": null,

*   "travel_time": null,

*   "travel_charge": null,

*   "travel_distance": 0,

*   "estimated_time": "02:30",

*   "date": "2019-05-20",

*   "duration": "01:40",

*   "running": false,

*   "tracking": {

*   "type": "duration",

*   "date": "2019-05-20",

*   "duration": "01:40"

}

}
```

Delete a timesheet
------------------

This action permanently deletes a timesheet. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| timesheet_id required | integer  Example: 1 the id of the timesheet |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/timesheet/{timesheet\_id}

Live Server

<https://api.bexio.com/2.0/timesheet/{timesheet_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/timesheet/{timesheet_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Timesheet status
----------------

This action fetches a list of all timesheet Status

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/timesheet\_status

Live Server

<https://api.bexio.com/2.0/timesheet_status>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/timesheet_status> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 2,

*   "name": "In Progress"

}

]
```

Business Activities
-------------------

Fetch a list of business activities
-----------------------------------

This action fetches a list of all business activities

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/client\_service

Live Server

<https://api.bexio.com/2.0/client_service>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/client_service> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Project Management",

*   "default_is_billable": false,

*   "default_price_per_hour": null,

*   "account_id": null

}

]
```

Create business activity
------------------------

This action creates a new business activity

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| name required | string |
| default_is_billable | boolean or null |
| default_price_per_hour | number or null |
| account_id | integer or null References an account object |

### Responses

**201**

Created

**422**

Validation error

post/2.0/client\_service

Live Server

<https://api.bexio.com/2.0/client_service>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Project Management",

*   "default_is_billable": false,

*   "default_price_per_hour": null,

*   "account_id": null

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "Project Management",

*   "default_is_billable": false,

*   "default_price_per_hour": null,

*   "account_id": null

}
```

Search business activities
--------------------------

Search business activities via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Project Management",

*   "default_is_billable": false,

*   "default_price_per_hour": null,

*   "account_id": null

}

]
```

Communication Types
-------------------

Fetch a list of communication types
-----------------------------------

This action fetches a list of all communication types

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/communication\_kind

Live Server

<https://api.bexio.com/2.0/communication_kind>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/communication_kind> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Mobile Phone"

}

]
```

Search communication types
--------------------------

Search communication types via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Mobile Phone"

}

]
```

Files
-----

Fetch a list of files
---------------------

This action provides a list of files which are uploaded to a certain company

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| archived_state | string Example: archived_state=all Include/Exclude archived files via filter (all, archived, not_archived) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |
| order_by | string Default: "id" Enum: "id" "created_at" "source_id" "uuid" "name" "size_in_bytes" Example: order_by=id_asc Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/files

Live Server

<https://api.bexio.com/3.0/files>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/files> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00"

}

]
```

Create new file
---------------

Creates a new file from payload

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: multipart/form-data

required

Upload file

| Name | Details |
| --- | --- |
| file required | string

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

multipart/form-data

{
"name": "form-data",
"value": "@\\"/path-to-your-file\\""
}

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00"

}

]
```

Search files
------------

Search files via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `id`
* `uuid`
* `created_at`
* `name`
* `extension`
* `size_in_bytes`
* `mime_type`
* `user_id`
* `is_archived`
* `source_id`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| archived_state | string Example: archived_state=all Include/Exclude archived files via filter (all, archived, not_archived) |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "name",

*   "value": "screenshot"

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00"

}

]
```

Get single file
---------------

Tries to query the requested file from the backend

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| file_id required | integer  Example: 1 File ID to show |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/files/{file\_id}

Live Server

<https://api.bexio.com/3.0/files/{file_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/files/{file_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00"

}
```

Delete a existing file
----------------------

Sets state of a file to deleted. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| file_id required | integer  Example: 1 File ID to show |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

**422**

Validation error

delete/3.0/files/{file\_id}

Live Server

<https://api.bexio.com/3.0/files/{file_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/files/{file_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "success": true

}
```

Update existing file
--------------------

Updates a existing file with provided properties

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| file_id required | integer  Example: 1 File ID to show |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Update file

| Name | Details |
| --- | --- |
| name | string

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "screenshot",

*   "is_archived": true,

*   "source_type": "web"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",

*   "name": "screenshot",

*   "size_in_bytes": 218476,

*   "extension": "png",

*   "mime_type": "image/png",

*   "uploader_email": "[email protected]",

*   "user_id": 1,

*   "is_archived": false,

*   "source_id": 2,

*   "source_type": "web",

*   "is_referenced": false,

*   "created_at": "2018-06-09T08:52:10+00:00"

}
```

Download file
-------------

Provides requested file from backend as stream

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| file_id required | integer  Example: 1 File ID to show |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/files/{file\_id}/download

Live Server

<https://api.bexio.com/3.0/files/{file_id}/download>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/files/{file_id}/download> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

`"string"`

Get file preview
----------------

Provides requested preview for file from backend as stream

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| file_id required | integer  Example: 1 File ID to get preview file |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/files/{file\_id}/preview

Live Server

<https://api.bexio.com/3.0/files/{file_id}/preview>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/files/{file_id}/preview> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

`"string"`

Show file usage
---------------

Tries to query the requested file from the backend

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| file_id required | integer  Example: 1 File ID to show |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/files/{file\_id}/usage

Live Server

<https://api.bexio.com/3.0/files/{file_id}/usage>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/files/{file_id}/usage> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "ref_class": "KbInvoice",

*   "title": "RE-00001",

*   "document_nr": "RE-00001"

}
```

Employees
---------

Retrieves all active employees
------------------------------

##### Authorizations

_bearerAuth_

### Responses

**200**

List of all active employees

get/4.0/payroll/employees

Live Server

<https://api.bexio.com/4.0/payroll/employees>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/payroll/employees> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "data": [

*   {

*   "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08",

*   "first_name": "string",

*   "last_name": "string",

*   "date_of_birth": "2024-01-31",

*   "ahv_number": "string",

*   "gender": "male",

*   "nationality": "CH",

*   "stay_permit_category": "string",

*   "language": "de",

*   "marital_status": "unknown",

*   "email": "string",

*   "phone_number": "string",

*   "hours_per_week": 0,

*   "employment_level": 0,

*   "annual_vacation_days_total": 0,

*   "address": {

*   "complementary_line": "string",

*   "street": "string",

*   "street_name": "string",

*   "house_number": "string",

*   "postbox": "string",

*   "locality": "string",

*   "zip_code": "string",

*   "city": "string",

*   "country": "CH",

*   "canton": "string",

*   "municipality_id": "string"

},

*   "personal_number": "string",

*   "iban": "string"

}

]

}
```

Create employee
---------------

##### Authorizations

_bearerAuth_

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| email | string |
| first_name | string |
| last_name | string |
| personal_number | string |
| nationality | string Nation should be in ISO Alpha-2 format. Special values: '11' means 'unknown', '22' means 'stateless'. |
| iban | string |
| ahv_number | string |
| marital_status | string Default: "unknown" Enum: "unknown" "single" "married" "separated" "registered_partnership" "partnership_dissolved_by_law" "partnership_dissolved_by_death" "partnership_dissolved_by_declaration_of_lost" "widowed" "divorced" |
| gender | string Enum: "male" "female" |
| date_of_birth | string  |
| address | object |
| language | string Default: "de" Enum: "de" "it" "fr" "en" |
| phone_number | string |
| annual_vacation_days | integer  |

### Responses

**201**

Employee created

**400**

Malformed content (missing or invalid parameters)

post/4.0/payroll/employees

Live Server

<https://api.bexio.com/4.0/payroll/employees>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "email": "string",

*   "first_name": "string",

*   "last_name": "string",

*   "personal_number": "string",

*   "nationality": "CH",

*   "iban": "string",

*   "ahv_number": "string",

*   "marital_status": "unknown",

*   "gender": "male",

*   "date_of_birth": "2024-01-31",

*   "address": {

*   "complementary_line": "string",

*   "street": "string",

*   "street_name": "string",

*   "house_number": "string",

*   "postbox": "string",

*   "locality": "string",

*   "zip_code": "string",

*   "city": "string",

*   "country": "CH",

*   "canton": "string",

*   "municipality_id": "string"

},

*   "language": "de",

*   "phone_number": "string",

*   "annual_vacation_days": 0

}
```

### Response samples

* 201
* 400

Content type

application/json

```
{

*   "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08",

*   "first_name": "string",

*   "last_name": "string",

*   "date_of_birth": "2024-01-31",

*   "ahv_number": "string",

*   "gender": "male",

*   "nationality": "CH",

*   "stay_permit_category": "string",

*   "language": "de",

*   "marital_status": "unknown",

*   "email": "string",

*   "phone_number": "string",

*   "hours_per_week": 0,

*   "employment_level": 0,

*   "annual_vacation_days_total": 0,

*   "address": {

*   "complementary_line": "string",

*   "street": "string",

*   "street_name": "string",

*   "house_number": "string",

*   "postbox": "string",

*   "locality": "string",

*   "zip_code": "string",

*   "city": "string",

*   "country": "CH",

*   "canton": "string",

*   "municipality_id": "string"

},

*   "personal_number": "string",

*   "iban": "string",

*   "annual_vacation_days_used": 0,

*   "annual_vacation_days_left": 0,

*   "effective_working_hours_per_week": 0

}
```

Retrieve a single employee on a specific date
---------------------------------------------

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| employeeId required | string  Id of an employee |

##### query Parameters

| Name | Details |
| --- | --- |
| date required | string  Example: date=2024-01-31 Date of employee's state |

### Responses

**200**

Employee object

**400**

Malformed request (missing or invalid parameters)

**404**

Employee with given id not found

**410**

Employee has been deleted

get/4.0/payroll/employees/{employeeId}

Live Server

<https://api.bexio.com/4.0/payroll/employees/{employeeId}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/payroll/employees/{employeeId}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 404
* 410

Content type

application/json

```
{

*   "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08",

*   "first_name": "string",

*   "last_name": "string",

*   "date_of_birth": "2024-01-31",

*   "ahv_number": "string",

*   "gender": "male",

*   "nationality": "CH",

*   "stay_permit_category": "string",

*   "language": "de",

*   "marital_status": "unknown",

*   "email": "string",

*   "phone_number": "string",

*   "hours_per_week": 0,

*   "employment_level": 0,

*   "annual_vacation_days_total": 0,

*   "address": {

*   "complementary_line": "string",

*   "street": "string",

*   "street_name": "string",

*   "house_number": "string",

*   "postbox": "string",

*   "locality": "string",

*   "zip_code": "string",

*   "city": "string",

*   "country": "CH",

*   "canton": "string",

*   "municipality_id": "string"

},

*   "personal_number": "string",

*   "iban": "string",

*   "annual_vacation_days_used": 0,

*   "annual_vacation_days_left": 0,

*   "effective_working_hours_per_week": 0

}
```

Update employee
---------------

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| employeeId required | string  Id of an employee |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| email | string |
| first_name | string |
| last_name | string |
| personal_number | string |
| nationality | string Nation should be in ISO Alpha-2 format. Special values: '11' means 'unknown', '22' means 'stateless'. |
| iban | string |
| ahv_number | string |
| marital_status | string Default: "unknown" Enum: "unknown" "single" "married" "separated" "registered_partnership" "partnership_dissolved_by_law" "partnership_dissolved_by_death" "partnership_dissolved_by_declaration_of_lost" "widowed" "divorced" |
| gender | string Enum: "male" "female" |
| date_of_birth | string  |
| address | object |
| language | string Default: "de" Enum: "de" "it" "fr" "en" |
| phone_number | string |
| annual_vacation_days | integer  |

### Responses

**204**

Employee updated

**400**

Malformed content (missing or invalid parameters)

**404**

Employee with given id not found

**410**

Employee has been deleted

patch/4.0/payroll/employees/{employeeId}

Live Server

<https://api.bexio.com/4.0/payroll/employees/{employeeId}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "email": "string",

*   "first_name": "string",

*   "last_name": "string",

*   "personal_number": "string",

*   "nationality": "CH",

*   "iban": "string",

*   "ahv_number": "string",

*   "marital_status": "unknown",

*   "gender": "male",

*   "date_of_birth": "2024-01-31",

*   "address": {

*   "complementary_line": "string",

*   "street": "string",

*   "street_name": "string",

*   "house_number": "string",

*   "postbox": "string",

*   "locality": "string",

*   "zip_code": "string",

*   "city": "string",

*   "country": "CH",

*   "canton": "string",

*   "municipality_id": "string"

},

*   "language": "de",

*   "phone_number": "string",

*   "annual_vacation_days": 0

}
```

### Response samples

* 400
* 404
* 410

Content type

application/problem+json

```
{

*   "status": 400,

*   "title": "Malformed content (missing or invalid parameters)"

}
```

Absences
--------

Retrieving absences of employee for given year
----------------------------------------------

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| employeeId required | string  Id of an employee |

##### query Parameters

| Name | Details |
| --- | --- |
| businessYear required | integer  Example: businessYear=2024 Year of absence |

### Responses

**200**

List of employee absences

**400**

Malformed request (missing or invalid parameters)

**404**

Employee not found

**410**

Employee has been deleted

get/4.0/payroll/employees/{employeeId}/absences

Live Server

<https://api.bexio.com/4.0/payroll/employees/{employeeId}/absences>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/payroll/employees/{employeeId}/absences> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 404
* 410

Content type

application/json

```
{

*   "data": [

*   {

*   "reason": "Injury",

*   "start_date": "2024-01-31",

*   "end_date": "2024-01-31",

*   "half_day": false,

*   "continued_pay": 0,

*   "disability": 0,

*   "paid_hours": 0,

*   "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08"

}

]

}
```

Create absence for employee
---------------------------

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| employeeId required | string  Id of an employee |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| reason required | string Currently supported reasons: Injury, Sickness, MaternityLeave, MilitaryLeave, Vacation, InterruptionOfWork. New reasons might be added in the future. |
| start_date required | string  |
| end_date | string  |
| half_day | boolean Default: false |
| continued_pay | number  |
| disability | number  |
| paid_hours | number  |

### Responses

**201**

Absence created

**400**

Malformed content (missing or invalid parameters)

**404**

Employee not found

**410**

Employee has been deleted

post/4.0/payroll/employees/{employeeId}/absences

Live Server

<https://api.bexio.com/4.0/payroll/employees/{employeeId}/absences>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "reason": "Injury",

*   "start_date": "2024-01-31",

*   "end_date": "2024-01-31",

*   "half_day": false,

*   "continued_pay": 0,

*   "disability": 0,

*   "paid_hours": 0

}
```

### Response samples

* 201
* 400
* 404
* 410

Content type

application/json

```
{

*   "reason": "Injury",

*   "start_date": "2024-01-31",

*   "end_date": "2024-01-31",

*   "half_day": false,

*   "continued_pay": 0,

*   "disability": 0,

*   "paid_hours": 0,

*   "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08"

}
```

Retrieving absence for employee with given absence id
-----------------------------------------------------

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| employeeId required | string  Id of an employee |
| absenceId required | string  Id of an absence |

### Responses

**200**

Found absence

**400**

Malformed request (missing or invalid parameters)

**404**

Employee or absence not found

**410**

Employee has been deleted

get/4.0/payroll/employees/{employeeId}/absences/{absenceId}

Live Server

<https://api.bexio.com/4.0/payroll/employees/{employeeId}/absences/{absenceId}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/payroll/employees/{employeeId}/absences/{absenceId}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 404
* 410

Content type

application/json

```
{

*   "reason": "Injury",

*   "start_date": "2024-01-31",

*   "end_date": "2024-01-31",

*   "half_day": false,

*   "continued_pay": 0,

*   "disability": 0,

*   "paid_hours": 0,

*   "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08"

}
```

Updating existing absence
-------------------------

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| employeeId required | string  Id of an employee |
| absenceId required | string  Id of an absence |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| reason required | string Currently supported reasons: Injury, Sickness, MaternityLeave, MilitaryLeave, Vacation, InterruptionOfWork. New reasons might be added in the future. |
| start_date required | string  |
| end_date required | string  |
| half_day required | boolean Default: false |
| continued_pay required | number  |
| disability required | number  |
| paid_hours required | number  |

### Responses

**204**

Absence updated

**400**

Malformed content (missing or invalid parameters)

**404**

Employee or absence not found

**410**

Employee has been deleted

put/4.0/payroll/employees/{employeeId}/absences/{absenceId}

Live Server

<https://api.bexio.com/4.0/payroll/employees/{employeeId}/absences/{absenceId}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "reason": "Injury",

*   "start_date": "2024-01-31",

*   "end_date": "2024-01-31",

*   "half_day": false,

*   "continued_pay": 0,

*   "disability": 0,

*   "paid_hours": 0

}
```

### Response samples

* 400
* 404
* 410

Content type

application/problem+json

```
{

*   "status": 400,

*   "title": "Malformed content (missing or invalid parameters)"

}
```

Deleting employee absence with given id
---------------------------------------

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| employeeId required | string  Id of an employee |
| absenceId required | string  Id of an absence |

### Responses

**204**

Absence deleted

**400**

Malformed request (missing or invalid parameters)

**404**

Employee or absence not found

**410**

Employee has been deleted

delete/4.0/payroll/employees/{employeeId}/absences/{absenceId}

Live Server

<https://api.bexio.com/4.0/payroll/employees/{employeeId}/absences/{absenceId}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/4.0/payroll/employees/{employeeId}/absences/{absenceId}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 400
* 404
* 410

Content type

application/problem+json

```
{

*   "status": 400,

*   "title": "Malformed request (missing or invalid parameters)"

}
```

Documents
---------

Retrieving pdf for employee for given month
-------------------------------------------

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| employeeId required | string  Id of an employee |
| year required | integer  Year for which report is being generated |
| month required | integer  Month for which report is being generated |

### Responses

**200**

Location of generated pdf

**400**

Malformed request (missing or invalid parameters)

**404**

Employee with given id not found

**410**

Employee has been deleted

get/4.0/payroll/employees/{employeeId}/paystub-pdf/{year}/{month}

Live Server

<https://api.bexio.com/4.0/payroll/employees/{employeeId}/paystub-pdf/{year}/{month}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/4.0/payroll/employees/{employeeId}/paystub-pdf/{year}/{month}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200
* 400
* 404
* 410

Content type

application/json

```
{

*   "location": "http://example.com"

}
```

Company Profile
---------------

Fetch a list of company profiles
--------------------------------

Please note that each account currently has only one company profile.

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/company\_profile

Live Server

<https://api.bexio.com/2.0/company_profile>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/company_profile> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "bexio AG",

*   "address": "Alte Jonastrasse 24",

*   "address_nr": "",

*   "postcode": 8640,

*   "city": "Rapperswil",

*   "country_id": 1,

*   "legal_form": "association",

*   "country_name": "Switzerland",

*   "mail": "[email protected]",

*   "phone_fixed": "+41 (0)71 552 00 60",

*   "phone_mobile": "+41 (0)79 123 45 67",

*   "fax": "",

*   "url": "https://www.bexio.com",

*   "skype_name": "",

*   "facebook_name": "",

*   "twitter_name": "",

*   "description": "",

*   "ust_id_nr": "CHE-322.646.985",

*   "mwst_nr": "CHE-322.646.985 MWST",

*   "trade_register_nr": "",

*   "has_own_logo": true,

*   "is_public_profile": false,

*   "is_logo_public": false,

*   "is_address_public": false,

*   "is_phone_public": false,

*   "is_mobile_public": false,

*   "is_fax_public": false,

*   "is_mail_public": false,

*   "is_url_public": false,

*   "is_skype_public": false,

*   "logo_base64": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}

]
```

Show company profile
--------------------

This action fetches a single company profile

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| profile_id required | integer  Example: 1 the id of the company profile |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/company\_profile/{profile\_id}

Live Server

<https://api.bexio.com/2.0/company_profile/{profile_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/company_profile/{profile_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "name": "bexio AG",

*   "address": "Alte Jonastrasse 24",

*   "address_nr": "",

*   "postcode": 8640,

*   "city": "Rapperswil",

*   "country_id": 1,

*   "legal_form": "association",

*   "country_name": "Switzerland",

*   "mail": "[email protected]",

*   "phone_fixed": "+41 (0)71 552 00 60",

*   "phone_mobile": "+41 (0)79 123 45 67",

*   "fax": "",

*   "url": "https://www.bexio.com",

*   "skype_name": "",

*   "facebook_name": "",

*   "twitter_name": "",

*   "description": "",

*   "ust_id_nr": "CHE-322.646.985",

*   "mwst_nr": "CHE-322.646.985 MWST",

*   "trade_register_nr": "",

*   "has_own_logo": true,

*   "is_public_profile": false,

*   "is_logo_public": false,

*   "is_address_public": false,

*   "is_phone_public": false,

*   "is_mobile_public": false,

*   "is_fax_public": false,

*   "is_mail_public": false,

*   "is_url_public": false,

*   "is_skype_public": false,

*   "logo_base64": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

Countries
---------

Fetch a list of countries
-------------------------

This action fetches a list of all countries

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" "name_short" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/country

Live Server

<https://api.bexio.com/2.0/country>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/country> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Kiribati",

*   "name_short": "KI",

*   "iso3166_alpha2": "KI"

}

]
```

Create country
--------------

This action creates a new country

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| name required | string |
| name_short required | string |
| iso3166_alpha2 required | string |

### Responses

**201**

Created

**422**

Validation error

post/2.0/country

Live Server

<https://api.bexio.com/2.0/country>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Kiribati",

*   "name_short": "KI",

*   "iso3166_alpha2": "KI"

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "Kiribati",

*   "name_short": "KI",

*   "iso3166_alpha2": "KI"

}
```

Search countries
----------------

Search countries via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`
* `name_short`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" "name_short" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Kiribati",

*   "name_short": "KI",

*   "iso3166_alpha2": "KI"

}

]
```

Fetch a country
---------------

This action fetches a single country

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| country_id required | integer  Example: 1 the id of the country |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/country/{country\_id}

Live Server

<https://api.bexio.com/2.0/country/{country_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/country/{country_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "name": "Kiribati",

*   "name_short": "KI",

*   "iso3166_alpha2": "KI"

}
```

Edit a country
--------------

This action edits a single country

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| country_id required | integer  Example: 1 the id of the country |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| name required | string |
| name_short required | string |
| iso3166_alpha2 required | string |

### Responses

**200**

OK

**422**

Validation error

post/2.0/country/{country\_id}

Live Server

<https://api.bexio.com/2.0/country/{country_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "Kiribati",

*   "name_short": "KI",

*   "iso3166_alpha2": "KI"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "Kiribati",

*   "name_short": "KI",

*   "iso3166_alpha2": "KI"

}
```

Delete a country
----------------

This action permanently deletes a country. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| country_id required | integer  Example: 1 the id of the country |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/country/{country\_id}

Live Server

<https://api.bexio.com/2.0/country/{country_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/country/{country_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Languages
---------

Fetch a list of languages
-------------------------

This action fetches a list of all languages

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/language

Live Server

<https://api.bexio.com/2.0/language>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/language> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "German",

*   "decimal_point": ".",

*   "thousands_separator": "'",

*   "date_format_id": 1,

*   "date_format": "d.m.Y",

*   "iso_639_1": "de"

}

]
```

Search languages
----------------

Search languages via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`
* `iso_639_1`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "German",

*   "decimal_point": ".",

*   "thousands_separator": "'",

*   "date_format_id": 1,

*   "date_format": "d.m.Y",

*   "iso_639_1": "de"

}

]
```

Notes
-----

Fetch a list of notes
---------------------

This action fetches a list of all notes

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/note

Live Server

<https://api.bexio.com/2.0/note>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/note> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "user_id": 1,

*   "event_start": "2019-01-16 14:20:00",

*   "subject": "API conception",

*   "info": "string",

*   "contact_id": 14,

*   "project_id": null,

*   "entry_id": null,

*   "module_id": null

}

]
```

Create note
-----------

This action creates a new note

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| user_id required | integer References a user object |
| event_start required | string  |
| subject required | string |
| info | string |
| contact_id | integer or null References a contact object |
| pr_project_id | integer or null References a project object |
| entry_id | integer or null |
| module_id | integer or null |

### Responses

**201**

Created

**422**

Validation error

post/2.0/note

Live Server

<https://api.bexio.com/2.0/note>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "user_id": 1,

*   "event_start": "2019-01-16 14:20:00",

*   "subject": "API conception",

*   "info": "string",

*   "contact_id": 14,

*   "pr_project_id": null,

*   "entry_id": null,

*   "module_id": null

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "user_id": 1,

*   "event_start": "2019-01-16 14:20:00",

*   "subject": "API conception",

*   "info": "string",

*   "contact_id": 14,

*   "project_id": null,

*   "entry_id": null,

*   "module_id": null

}
```

Search notes
------------

Search notes via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `event_start`
* `contact_id`
* `user_id`
* `subject`
* `module_id`
* `entry_id`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 4,

*   "user_id": 1,

*   "event_start": "2019-01-16 14:20:00",

*   "subject": "API conception",

*   "info": "string",

*   "contact_id": 14,

*   "project_id": null,

*   "entry_id": null,

*   "module_id": null

}

]
```

Fetch a note
------------

This action fetches a single note

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| note_id required | integer  Example: 1 the id of the note |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/note/{note\_id}

Live Server

<https://api.bexio.com/2.0/note/{note_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/note/{note_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "user_id": 1,

*   "event_start": "2019-01-16 14:20:00",

*   "subject": "API conception",

*   "info": "string",

*   "contact_id": 14,

*   "project_id": null,

*   "entry_id": null,

*   "module_id": null

}
```

Edit a note
-----------

This action edits a single note

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| note_id required | integer  Example: 1 the id of the note |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| user_id required | integer References a user object |
| event_start required | string  |
| subject required | string |
| info | string |
| contact_id | integer or null References a contact object |
| pr_project_id | integer or null References a project object |
| entry_id | integer or null |
| module_id | integer or null |

### Responses

**200**

OK

**422**

Validation error

post/2.0/note/{note\_id}

Live Server

<https://api.bexio.com/2.0/note/{note_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "user_id": 1,

*   "event_start": "2019-01-16 14:20:00",

*   "subject": "API conception",

*   "info": "string",

*   "contact_id": 14,

*   "pr_project_id": null,

*   "entry_id": null,

*   "module_id": null

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "user_id": 1,

*   "event_start": "2019-01-16 14:20:00",

*   "subject": "API conception",

*   "info": "string",

*   "contact_id": 14,

*   "project_id": null,

*   "entry_id": null,

*   "module_id": null

}
```

Delete a note
-------------

This action permanently deletes a note. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| note_id required | integer  Example: 1 the id of the note |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/note/{note\_id}

Live Server

<https://api.bexio.com/2.0/note/{note_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/note/{note_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Payment Types
-------------

Fetch a list of payment types
-----------------------------

This action fetches a list of all payment types

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" "name_short" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/payment\_type

Live Server

<https://api.bexio.com/2.0/payment_type>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/payment_type> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Cash"

}

]
```

Search payment types
--------------------

Search payment types via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" "name_short" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Cash"

}

]
```

Permissions
-----------

Get access information of logged in user
----------------------------------------

Get components and user permissions of logged in user

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/permissions

Live Server

<https://api.bexio.com/3.0/permissions>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/permissions> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "components": [

*   "functionality1",

*   "functionality2"

],

*   "permissions": {

*   "property": {

*   "attribute1": "enabled",

*   "attribute2": "all",

*   "attribute3": "all"

}

}

}
```

Tasks
-----

Fetch a list of tasks
---------------------

This action fetches a list of all tasks

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "finish_date" Example: order_by=finish_date Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/task

Live Server

<https://api.bexio.com/2.0/task>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/task> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "user_id": 1,

*   "finish_date": "2018-04-09T07:44:10+00:00",

*   "subject": "Unterlagen versenden",

*   "place": 0,

*   "info": "so schnell wie möglich.",

*   "contact_id": 1,

*   "sub_contact_id": null,

*   "project_id": null,

*   "entry_id": null,

*   "module_id": null,

*   "todo_status_id": 1,

*   "todo_priority_id": null,

*   "has_reminder": false,

*   "remember_type_id": null,

*   "remember_time_id": null,

*   "communication_kind_id": null

}

]
```

Create task
-----------

This action creates a new task

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| user_id required | integer  References a user object |
| finish_date | string or null  |
| subject required | string |
| info | string |
| contact_id | integer  References a contact object |
| sub_contact_id | integer or null References a contact object |
| pr_project_id | integer or null References a project object |
| entry_id | integer or null |
| module_id | integer or null |
| todo_status_id | integer  |
| todo_priority_id | integer or null |
| have_remember | boolean |
| remember_type_id | integer  Is required if have_remember is set to true. |
| remember_time_id | integer or null Is required if have_remember is set to true. |
| communication_kind_id | integer or null |

### Responses

**201**

Created

**422**

Validation error

post/2.0/task

Live Server

<https://api.bexio.com/2.0/task>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "user_id": 1,

*   "finish_date": "2018-04-09T07:44:10+00:00",

*   "subject": "Unterlagen versenden",

*   "info": "so schnell wie möglich.",

*   "contact_id": 1,

*   "sub_contact_id": null,

*   "pr_project_id": null,

*   "entry_id": null,

*   "module_id": null,

*   "todo_status_id": 1,

*   "todo_priority_id": null,

*   "have_remember": false,

*   "remember_type_id": null,

*   "remember_time_id": null,

*   "communication_kind_id": null

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "user_id": 1,

*   "finish_date": "2018-04-09T07:44:10+00:00",

*   "subject": "Unterlagen versenden",

*   "place": 0,

*   "info": "so schnell wie möglich.",

*   "contact_id": 1,

*   "sub_contact_id": null,

*   "project_id": null,

*   "entry_id": null,

*   "module_id": null,

*   "todo_status_id": 1,

*   "todo_priority_id": null,

*   "has_reminder": false,

*   "remember_type_id": null,

*   "remember_time_id": null,

*   "communication_kind_id": null

}
```

Search tasks
------------

Search tasks via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `subject`
* `updated_at`
* `user_id`
* `contact_id`
* `todo_status_id`
* `module_id`
* `entry_id`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "finish_date" Example: order_by=finish_date Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "user_id": 1,

*   "finish_date": "2018-04-09T07:44:10+00:00",

*   "subject": "Unterlagen versenden",

*   "place": 0,

*   "info": "so schnell wie möglich.",

*   "contact_id": 1,

*   "sub_contact_id": null,

*   "project_id": null,

*   "entry_id": null,

*   "module_id": null,

*   "todo_status_id": 1,

*   "todo_priority_id": null,

*   "has_reminder": false,

*   "remember_type_id": null,

*   "remember_time_id": null,

*   "communication_kind_id": null

}

]
```

Fetch a task
------------

This action fetches a single task

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| task_id required | integer  Example: 1 the id of the task |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/task/{task\_id}

Live Server

<https://api.bexio.com/2.0/task/{task_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/task/{task_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "user_id": 1,

*   "finish_date": "2018-04-09T07:44:10+00:00",

*   "subject": "Unterlagen versenden",

*   "place": 0,

*   "info": "so schnell wie möglich.",

*   "contact_id": 1,

*   "sub_contact_id": null,

*   "project_id": null,

*   "entry_id": null,

*   "module_id": null,

*   "todo_status_id": 1,

*   "todo_priority_id": null,

*   "has_reminder": false,

*   "remember_type_id": null,

*   "remember_time_id": null,

*   "communication_kind_id": null

}
```

Edit a task
-----------

This action edits a single task

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| task_id required | integer  Example: 1 the id of the task |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| user_id required | integer  References a user object |
| finish_date | string or null  |
| subject required | string |
| info | string |
| contact_id | integer  References a contact object |
| sub_contact_id | integer or null References a contact object |
| pr_project_id | integer or null References a project object |
| entry_id | integer or null |
| module_id | integer or null |
| todo_status_id | integer  |
| todo_priority_id | integer or null |
| have_remember | boolean |
| remember_type_id | integer  Is required if have_remember is set to true. |
| remember_time_id | integer or null Is required if have_remember is set to true. |
| communication_kind_id | integer or null |

### Responses

**200**

OK

**422**

Validation error

post/2.0/task/{task\_id}

Live Server

<https://api.bexio.com/2.0/task/{task_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "user_id": 1,

*   "finish_date": "2018-04-09T07:44:10+00:00",

*   "subject": "Unterlagen versenden",

*   "info": "so schnell wie möglich.",

*   "contact_id": 1,

*   "sub_contact_id": null,

*   "pr_project_id": null,

*   "entry_id": null,

*   "module_id": null,

*   "todo_status_id": 1,

*   "todo_priority_id": null,

*   "have_remember": false,

*   "remember_type_id": null,

*   "remember_time_id": null,

*   "communication_kind_id": null

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "user_id": 1,

*   "finish_date": "2018-04-09T07:44:10+00:00",

*   "subject": "Unterlagen versenden",

*   "place": 0,

*   "info": "so schnell wie möglich.",

*   "contact_id": 1,

*   "sub_contact_id": null,

*   "project_id": null,

*   "entry_id": null,

*   "module_id": null,

*   "todo_status_id": 1,

*   "todo_priority_id": null,

*   "has_reminder": false,

*   "remember_type_id": null,

*   "remember_time_id": null,

*   "communication_kind_id": null

}
```

Delete a task
-------------

This action permanently deletes a task. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| task_id required | integer  Example: 1 the id of the task |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/task/{task\_id}

Live Server

<https://api.bexio.com/2.0/task/{task_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/task/{task_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Task priorities
---------------

This action fetches a list of all task priorities

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/todo\_priority

Live Server

<https://api.bexio.com/2.0/todo_priority>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/todo_priority> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "High"

}

]
```

Task status
-----------

This action fetches a list of all task status

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| order_by | string Default: "id" Enum: "id" "name" Example: order_by=name Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending. |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/todo\_status

Live Server

<https://api.bexio.com/2.0/todo_status>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/todo_status> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "Open"

}

]
```

Units
-----

Fetch a list of units
---------------------

This action fetches a list of all units

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/unit

Live Server

<https://api.bexio.com/2.0/unit>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/unit> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "h"

}

]
```

Create unit
-----------

This action creates a new unit

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| name required | string |

### Responses

**201**

Created

**422**

Validation error

post/2.0/unit

Live Server

<https://api.bexio.com/2.0/unit>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "h"

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "h"

}
```

Search units
------------

Search units via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

* `name`

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

Array

| Name | Details |
| --- | --- |
| field required | string " "greater_than" ">=" "greater_equal" "

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
[

*   {

*   "field": "search_field",

*   "value": "search term",

*   "criteria": "="

}

]
```

### Response samples

* 200
* 422

Content type

application/json

```
[

*   {

*   "id": 1,

*   "name": "h"

}

]
```

Fetch a unit
------------

This action fetches a single unit

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| unit_id required | integer  Example: 1 the id of the unit |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/2.0/unit/{unit\_id}

Live Server

<https://api.bexio.com/2.0/unit/{unit_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/2.0/unit/{unit_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 1,

*   "name": "h"

}
```

Edit a unit
-----------

This action edits a single unit

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| unit_id required | integer  Example: 1 the id of the unit |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

| Name | Details |
| --- | --- |
| name required | string |

### Responses

**200**

OK

**422**

Validation error

post/2.0/unit/{unit\_id}

Live Server

<https://api.bexio.com/2.0/unit/{unit_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "name": "h"

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 1,

*   "name": "h"

}
```

Delete a unit
-------------

This action permanently deletes a unit. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| unit_id required | integer  Example: 1 the id of the unit |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/2.0/unit/{unit\_id}

Live Server

<https://api.bexio.com/2.0/unit/{unit_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/2.0/unit/{unit_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

User Management
---------------

Fetch a list of users
---------------------

This action fetches a list of all users

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/users

Live Server

<https://api.bexio.com/3.0/users>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/users> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "salutation_type": "male",

*   "firstname": "Rudolph",

*   "lastname": "Smith",

*   "email": "[email protected]",

*   "is_superadmin": true,

*   "is_accountant": false

}

]
```

Fetch a user
------------

This action fetches a single user

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| user_id required | integer  Example: 4 the id of the user |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/users/{user\_id}

Live Server

<https://api.bexio.com/3.0/users/{user_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/users/{user_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "salutation_type": "male",

*   "firstname": "Rudolph",

*   "lastname": "Smith",

*   "email": "[email protected]",

*   "is_superadmin": true,

*   "is_accountant": false

}
```

Fetch the authenticated user
----------------------------

This action fetches the user authenticated by the bearer token.

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/users/me

Live Server

<https://api.bexio.com/3.0/users/me>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/users/me> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "salutation_type": "male",

*   "firstname": "Rudolph",

*   "lastname": "Smith",

*   "email": "[email protected]",

*   "is_superadmin": true,

*   "is_accountant": false

}
```

Fetch a list of fictional users
-------------------------------

This action fetches a list of all fictional users. These fictional users can be used in dropdowns but can not log in to the application

##### Authorizations

_bearerAuth_

##### query Parameters

| Name | Details |
| --- | --- |
| limit | integer  Default: 500 Example: limit=20 Limit the number of results (max is 2000) |
| offset | integer  Default: 0 Example: offset=0 Skip over a number of elements by specifying an offset value for the query |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/fictional\_users

Live Server

<https://api.bexio.com/3.0/fictional_users>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/fictional_users> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
[

*   {

*   "id": 4,

*   "salutation_type": "male",

*   "firstname": "Rudolph",

*   "lastname": "Smith",

*   "email": "[email protected]",

*   "title_id": null

}

]
```

Create a fictional user
-----------------------

This action creates a new fictional user

##### Authorizations

_bearerAuth_

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| salutation_type required | string Enum: "male" "female" |
| firstname required | string  The email address of the fictional user. Please note that an email address can only be used once for both regular and fictional users. |
| title_id | integer A reference to a title |

### Responses

**201**

Created

**422**

Validation error

post/3.0/fictional\_users

Live Server

<https://api.bexio.com/3.0/fictional_users>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "salutation_type": "male",

*   "firstname": "Rudolph",

*   "lastname": "Smith",

*   "email": "[email protected]",

*   "title_id": null

}
```

### Response samples

* 201
* 422

Content type

application/json

```
{

*   "id": 4,

*   "salutation_type": "male",

*   "firstname": "Rudolph",

*   "lastname": "Smith",

*   "email": "[email protected]",

*   "title_id": null

}
```

Fetch a fictional User
----------------------

This action fetches a single fictional user

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| fictional_user_id required | integer  Example: 4 the id of the fictional user |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

get/3.0/fictional\_users/{fictional\_user\_id}

Live Server

<https://api.bexio.com/3.0/fictional_users/{fictional_user_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X GET \\
<https://api.bexio.com/3.0/fictional_users/{fictional_user_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "id": 4,

*   "salutation_type": "male",

*   "firstname": "Rudolph",

*   "lastname": "Smith",

*   "email": "[email protected]",

*   "title_id": null

}
```

Delete a fictional user
-----------------------

This action permanently deletes a fictional user. It cannot be undone.

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| fictional_user_id required | integer  Example: 4 the id of the fictional user |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

### Responses

**200**

OK

delete/3.0/fictional\_users/{fictional\_user\_id}

Live Server

<https://api.bexio.com/3.0/fictional_users/{fictional_user_id}>

### Request samples

* cURL
* Python
* PHP
* Node.JS

curl \-X DELETE \\
<https://api.bexio.com/3.0/fictional_users/{fictional_user_id}> \\
\-H 'Accept: application/json' \\
\-H 'Authorization: Bearer {access-token}'

### Response samples

* 200

Content type

application/json

```
{

*   "success": true

}
```

Update a fictional User
-----------------------

This action updates an existing fictional user

##### Authorizations

_bearerAuth_

##### path Parameters

| Name | Details |
| --- | --- |
| fictional_user_id required | integer  Example: 4 the id of the fictional user |

##### header Parameters

| Name | Details |
| --- | --- |
| Accept required | string Example: application/json |

##### Request Body schema: application/json

required

| Name | Details |
| --- | --- |
| salutation_type required | string Enum: "male" "female" |
| firstname required | string  The email address of the fictional user. Please note that an email address can only be used once for both regular and fictional users. |
| title_id | integer A reference to a title |

### Responses

**200**

Ok

**422**

Validation error

patch/3.0/fictional\_users/{fictional\_user\_id}

Live Server

<https://api.bexio.com/3.0/fictional_users/{fictional_user_id}>

### Request samples

* Payload
* cURL
* Python
* PHP
* Node.JS

Content type

application/json

```
{

*   "salutation_type": "male",

*   "firstname": "Rudolph",

*   "lastname": "Smith",

*   "email": "[email protected]",

*   "title_id": null

}
```

### Response samples

* 200
* 422

Content type

application/json

```
{

*   "id": 4,

*   "salutation_type": "male",

*   "firstname": "Rudolph",

*   "lastname": "Smith",

*   "email": "[email protected]",

*   "title_id": null

}
```
