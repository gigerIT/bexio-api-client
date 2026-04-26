### Example Business Activity Response

Source: https://docs.bexio.com/

This is an example of a successful response when retrieving or creating a business activity.

```json
[
  * {
    * "id": 1,
    * "name": "Project Management",
    * "default_is_billable": false,
    * "default_price_per_hour": null,
    * "account_id": null
}

]
```

--------------------------------

### Search Files Response Example

Source: https://docs.bexio.com/

Example response structure returned after a successful file search.

```json
[
  {
    "id": 1,
    "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",
    "name": "screenshot",
    "size_in_bytes": 218476,
    "extension": "png",
    "mime_type": "image/png",
    "uploader_email": "contact@example.org",
    "user_id": 1,
    "is_archived": false,
    "source_id": 2,
    "source_type": "web",
    "is_referenced": false,
    "created_at": "2018-06-09T08:52:10+00:00"
  }
]
```

--------------------------------

### Get Permissions (cURL)

Source: https://docs.bexio.com/

Example of how to retrieve access information and permissions for the logged-in user using cURL. Requires an Accept header and Authorization token.

```bash
curl -X GET \
  https://api.bexio.com/3.0/permissions \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Get Payment Types (cURL)

Source: https://docs.bexio.com/

Example of how to fetch a list of payment types using cURL. Ensure the Accept header is set to application/json and include your Authorization token.

```bash
curl -X GET \
  https://api.bexio.com/2.0/payment_type \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Purchase Order Example

Source: https://docs.bexio.com/

This snippet shows an example of a purchase order payload that can be sent to the bexio API.

```APIDOC
## POST /websites/bexio/purchase_orders

### Description
Creates a new purchase order in bexio.

### Method
POST

### Endpoint
/websites/bexio/purchase_orders

### Request Body
- **id** (integer) - Optional - The ID of the purchase order.
- **document_nr** (string) - Optional - The document number for the purchase order.
- **kb_payment_template_id** (integer) - Optional - The ID of the payment template.
- **payment_type_id** (integer) - Optional - The ID of the payment type.
- **title** (string) - Optional - The title of the purchase order.
- **contact_id** (integer) - Required - The ID of the contact.
- **contact_sub_id** (integer) - Optional - The sub-ID of the contact.
- **template_slug** (string) - Optional - The slug for the template.
- **user_id** (integer) - Optional - The ID of the user.
- **project_id** (integer) - Optional - The ID of the project.
- **logopaper_id** (integer) - Optional - The ID of the logopaper.
- **language** (object) - Optional - Language settings for the document.
  - **id** (integer) - Optional - Language ID.
  - **name** (string) - Optional - Language name.
  - **decimalpoint** (string) - Optional - Decimal point character.
  - **thousandsseparator** (string) - Optional - Thousands separator character.
  - **iso_639_1** (string) - Optional - ISO 639-1 code.
  - **date_format** (string) - Optional - Date format.
- **language_id** (integer) - Optional - The ID of the language.
- **bank_account_id** (integer) - Optional - The ID of the bank account.
- **currency** (object) - Optional - Currency settings.
  - **id** (integer) - Optional - Currency ID.
  - **name** (string) - Optional - Currency name.
  - **round_factor** (number) - Optional - Rounding factor.
- **currency_id** (integer) - Optional - The ID of the currency.
- **header** (string) - Optional - Header text for the document.
- **footer** (string) - Optional - Footer text for the document.
- **mwst_type** (string) - Optional - Type of VAT (e.g., "included").
- **mwst_is_net** (boolean) - Optional - Whether VAT is net.
- **is_compact_view** (boolean) - Optional - Whether to use compact view.
- **show_position_taxes** (boolean) - Optional - Whether to show position taxes.
- **salesman_user_id** (integer) - Optional - The ID of the salesman user.
- **is_valid_from** (string) - Optional - Validity start date (YYYY-MM-DD).
- **is_valid_to** (string) - Optional - Validity end date (YYYY-MM-DD).
- **delivery_address_type** (string) - Optional - Type of delivery address (e.g., "contact_address").
- **delivery_address_manual** (string) - Optional - Manual delivery address.
- **nb_decimals_amount** (integer) - Optional - Number of decimal places for amount.
- **nb_decimals_price** (integer) - Optional - Number of decimal places for price.
- **terms_of_payment_text** (string) - Optional - Terms of payment text.
- **reference** (string) - Optional - Reference text.
- **api_reference** (string) - Optional - API reference.
- **mail** (string) - Optional - Email address.
- **is_valid_until** (string) - Optional - Validity until date (YYYY-MM-DD).
- **created_at** (string) - Optional - Creation timestamp.
- **updated_at** (string) - Optional - Update timestamp.
- **custom_translations** (object) - Optional - Custom translations.
- **date_format** (string) - Optional - Date format for the document.
- **positions** (object) - Optional - Details about document positions.
  - **required** (array) - Optional - Required positions.
    - **type** (string) - Required - Type of position (e.g., "text").
    - **pos** (integer) - Optional - Position number.
    - **is_optional** (boolean) - Optional - Whether the position is optional.
    - **id** (integer) - Optional - Position ID.
    - **text** (string) - Optional - Text for the position.
    - **show_pos_nr** (boolean) - Optional - Whether to show position number.
  - **optional** (array) - Optional - Optional positions.
    - **type** (string) - Required - Type of position (e.g., "text").
    - **pos** (integer) - Optional - Position number.
    - **is_optional** (boolean) - Optional - Whether the position is optional.
    - **id** (integer) - Optional - Position ID.
    - **text** (string) - Optional - Text for the position.
    - **show_pos_nr** (boolean) - Optional - Whether to show position number.
  - **discount** (array) - Optional - Discount positions.
    - **type** (string) - Required - Type of position (e.g., "discount").
    - **pos** (integer) - Optional - Position number.
    - **is_optional** (boolean) - Optional - Whether the position is optional.
    - **id** (integer) - Optional - Position ID.
    - **text** (string) - Optional - Text for the discount.
    - **is_percentual** (boolean) - Optional - Whether the discount is percentage-based.
    - **value** (number) - Optional - The discount value.
    - **discount_total** (number) - Optional - The total discount amount.

### Request Example
```json
{
  "document_nr": "RE-00001",
  "kb_payment_template_id": 1,
  "payment_type_id": 1,
  "title": "purchase order example title",
  "contact_id": 14,
  "contact_sub_id": 1,
  "template_slug": "581a8010821e01426b8b456b",
  "user_id": 1,
  "project_id": 1,
  "logopaper_id": 1,
  "language_id": 1,
  "bank_account_id": 1,
  "currency_id": 1,
  "header": "We would like to order the following products:",
  "footer": "Many thanks for the fast processing of our order.",
  "mwst_type": "included",
  "mwst_is_net": true,
  "is_compact_view": false,
  "show_position_taxes": false,
  "salesman_user_id": 1,
  "is_valid_from": "2019-06-24",
  "is_valid_to": "2019-07-24",
  "delivery_address_type": "contact_address",
  "delivery_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",
  "nb_decimals_amount": 2,
  "nb_decimals_price": 2,
  "terms_of_payment_text": "Payable within 30 days",
  "reference": "Based on Quote Q-3860",
  "mail": "support@bexio.com",
  "is_valid_until": "2019-07-24",
  "positions": {
    "required": [
      {
        "type": "text",
        "is_optional": false,
        "id": 1,
        "text": "This position type allows to add free text to a document",
        "show_pos_nr": false
      }
    ],
    "optional": [
      {
        "type": "text",
        "is_optional": false,
        "id": 1,
        "text": "This position type allows to add free text to a document",
        "show_pos_nr": false
      }
    ],
    "discount": [
      {
        "type": "discount",
        "is_optional": false,
        "id": 1,
        "text": "Partner discount",
        "is_percentual": true,
        "value": 10,
        "discount_total": 1.78
      }
    ]
  }
}
```

### Response
#### Success Response (200)
- **id** (integer) - The ID of the created purchase order.
- **document_nr** (string) - The document number of the purchase order.
- **created_at** (string) - The creation timestamp.
- **updated_at** (string) - The update timestamp.

#### Response Example
```json
{
  "id": 12345,
  "document_nr": "RE-00001",
  "created_at": "2020-04-28T19:58:58+00:00",
  "updated_at": "2020-04-30T19:58:58+00:00"
}
```
```

--------------------------------

### Fetch Contact Response Example

Source: https://docs.bexio.com/

Example JSON response for a single contact retrieval.

```json
{
  "id": 4,
  "nr": null,
  "contact_type_id": 1,
  "name_1": "Example Company",
  "name_2": null,
  "salutation_id": 2,
  "salutation_form": null,
  "title_id": null,
  "birthday": null,
  "address": "Smith Street 22",
  "street_name": "Smith Street",
  "house_number": "77",
  "address_addition": "Building C",
  "postcode": "8004",
  "city": "Zurich",
  "country_id": 1,
  "mail": "contact@example.org",
  "mail_second": "",
  "phone_fixed": "",
  "phone_fixed_second": "",
  "phone_mobile": "",
  "fax": "",
  "url": "",
  "skype_name": "",
  "remarks": "",
  "language_id": null,
  "is_lead": false,
  "contact_group_ids": "1,2",
  "contact_branch_ids": null,
  "user_id": 1,
  "owner_id": 1,
  "updated_at": "2019-04-08 13:17:32",
  "profile_image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="
}
```

--------------------------------

### Execute Bill Action - cURL Example

Source: https://docs.bexio.com/

Example of how to execute a bill action using cURL. Ensure to replace '{id}' with the actual bill ID and include the appropriate authorization header.

```bash
curl -X POST https://api.bexio.com/4.0/purchase/bills/{id}/actions \
     -H "Authorization: Bearer YOUR_ACCESS_TOKEN" \
     -H "Content-Type: application/json" \
     -d '{
  "action": "DUPLICATE"
}'
```

--------------------------------

### Fetch a Country Response Example

Source: https://docs.bexio.com/

Example response for a successful country fetch operation.

```json
{
  "id": 1,
  "name": "Kiribati",
  "name_short": "KI",
  "iso3166_alpha2": "KI"
}
```

--------------------------------

### Search Contacts Response Example

Source: https://docs.bexio.com/

Example JSON response returned after a successful contact search.

```json
[
  {
    "id": 4,
    "nr": null,
    "contact_type_id": 1,
    "name_1": "Example Company",
    "name_2": null,
    "salutation_id": 2,
    "salutation_form": null,
    "title_id": null,
    "birthday": null,
    "address": "Smith Street 22",
    "street_name": "Smith Street",
    "house_number": "77",
    "address_addition": "Building C",
    "postcode": "8004",
    "city": "Zurich",
    "country_id": 1,
    "mail": "contact@example.org",
    "mail_second": "",
    "phone_fixed": "",
    "phone_fixed_second": "",
    "phone_mobile": "",
    "fax": "",
    "url": "",
    "skype_name": "",
    "remarks": "",
    "language_id": null,
    "is_lead": false,
    "contact_group_ids": "1,2",
    "contact_branch_ids": null,
    "user_id": 1,
    "owner_id": 1,
    "updated_at": "2019-04-08 13:17:32"
  }
]
```

--------------------------------

### Document Template Response Example

Source: https://docs.bexio.com/

Example JSON response when listing document templates. It includes template slug, name, default status, and associated document types.

```JSON
[
  {
    "template_slug": "5f118cbc200a0c76ef1f34b2",
    "name": "Standard template",
    "is_default": true,
    "default_for_document_types": [
      "type_offer",
      "type_order",
      "type_invoice",
      "type_delivery",
      "type_credit_voucher",
      "type_account_statement",
      "type_article_order"
]
}

]
```

--------------------------------

### Search Countries Response Example

Source: https://docs.bexio.com/

Example response returned when searching for countries.

```json
[
  {
    "id": 1,
    "name": "Kiribati",
    "name_short": "KI",
    "iso3166_alpha2": "KI"
  }
]
```

--------------------------------

### GET /2.0/client_service

Source: https://docs.bexio.com/

Fetches a list of all business activities.

```APIDOC
## GET /2.0/client_service

### Description
Fetches a list of all business activities.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/client_service

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - ID of the activity
- **name** (string) - Name of the activity
- **default_is_billable** (boolean) - Default billable status
- **default_price_per_hour** (number) - Default hourly price
- **account_id** (integer) - Associated account ID

#### Response Example
[
  {
    "id": 1,
    "name": "Project Management",
    "default_is_billable": false,
    "default_price_per_hour": null,
    "account_id": null
  }
]
```

--------------------------------

### Example Communication Type Response

Source: https://docs.bexio.com/

This is an example of a successful response when fetching communication types.

```json
[
  * {
    * "id": 1,
    * "name": "Mobile Phone"
}

]
```

--------------------------------

### GET /2.0/task

Source: https://docs.bexio.com/

Fetches a list of all tasks.

```APIDOC
## GET /2.0/task

### Description
This action fetches a list of all tasks.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/task

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of results. Default: "id".
- **limit** (integer) - Optional - Limit the number of results (max 2000). Default: 500.
- **offset** (integer) - Optional - Skip over a number of elements. Default: 0.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json
```

--------------------------------

### PHP OpenID Connect Authentication

Source: https://docs.bexio.com/

Example of using the OpenID-Connect-PHP library to authenticate with the bexio API. Ensure the library is installed via Composer and the correct URLs and scopes are configured.

```php
<?php
require __DIR__ . '/vendor/autoload.php';
use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient("https://auth.bexio.com/realms/bexio", "client_id", "client_secret");
$oidc->setRedirectURL("https://www.example.com/oidc_callback");
$oidc->addScope(array("openid", "profile", "contact_show", "offline_access"));
$oidc->authenticate();

echo $oidc->getAccessToken();

```

--------------------------------

### Stock Areas Response Example

Source: https://docs.bexio.com/

Example response structure for stock area queries.

```json
[
  {
    "id": 1,
    "name": "Shelf A-06"
  }
]
```

--------------------------------

### Execute Bill Action - Python Example

Source: https://docs.bexio.com/

Python code snippet to execute a bill action using the 'requests' library. This example demonstrates sending the 'DUPLICATE' action.

```python
import requests

url = "https://api.bexio.com/4.0/purchase/bills/{id}/actions"
headers = {
    "Authorization": "Bearer YOUR_ACCESS_TOKEN",
    "Content-Type": "application/json"
}
payload = {
    "action": "DUPLICATE"
}

response = requests.post(url, headers=headers, json=payload)

print(response.status_code)
print(response.json())
```

--------------------------------

### Create Contact Response Sample

Source: https://docs.bexio.com/

Example response returned after successfully creating a contact.

```json
{
  * "id": 4,
  * "nr": null,
  * "contact_type_id": 1,
  * "name_1": "Example Company",
  * "name_2": null,
  * "salutation_id": 2,
  * "salutation_form": null,
  * "title_id": null,
  * "birthday": null,
  * "address": "Smith Street 22",
  * "street_name": "Smith Street",
  * "house_number": "77",
  * "address_addition": "Building C",
  * "postcode": "8004",
  * "city": "Zurich",
  * "country_id": 1,
  * "mail": "contact@example.org",
  * "mail_second": "",
  * "phone_fixed": "",
  * "phone_fixed_second": "",
  * "phone_mobile": "",
  * "fax": "",
  * "url": "",
  * "skype_name": "",
  * "remarks": "",
  * "language_id": null,
  * "is_lead": false,
  * "contact_group_ids": "1,2",
  * "contact_branch_ids": null,
  * "user_id": 1,
  * "owner_id": 1,
  * "updated_at": "2019-04-08 13:17:32",
  * "profile_image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

--------------------------------

### GET /3.0/permissions

Source: https://docs.bexio.com/

Get components and user permissions of the logged-in user.

```APIDOC
## GET /3.0/permissions

### Description
Get components and user permissions of logged in user.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/permissions

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **components** (array) - List of available functionality components.
- **permissions** (object) - User permission settings.

#### Response Example
{
  "components": ["functionality1", "functionality2"],
  "permissions": {
    "property": {
      "attribute1": "enabled",
      "attribute2": "all",
      "attribute3": "all"
    }
  }
}
```

--------------------------------

### GET /2.0/article

Source: https://docs.bexio.com/

Fetches a list of all items or products available in the system.

```APIDOC
## GET /2.0/article

### Description
Fetches a list of all items or products available in the system.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/article

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Default: "id" - Enum: "id", "intern_name" - Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. `_asc` and `_desc` can be appended to any parameter to either sort ascending (default) or descending. Example: order_by=intern_name
- **limit** (integer) - Optional - Default: 500 - Example: limit=20 - Limits the number of results (max is 2000).
- **offset** (integer) - Optional - Default: 0 - Example: offset=0 - Skips over a number of elements by specifying an offset value for the query.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json
- **Authorization** (string) - Required - Bearer {access-token}

### Response
#### Success Response (200)
- **id** (integer) - The unique identifier for the item.
- **user_id** (integer) - The ID of the user associated with the item.
- **article_type_id** (integer) - The ID of the item's type.
- **contact_id** (integer) - The ID of the contact associated with the item.
- **deliverer_code** (string) - The deliverer's code for the item.
- **deliverer_name** (string) - The deliverer's name for the item.
- **deliverer_description** (string) - A description from the deliverer.
- **intern_code** (string) - The internal code for the item.
- **intern_name** (string) - The internal name of the item.
- **intern_description** (string) - An internal description for the item.
- **purchase_price** (number) - The purchase price of the item.
- **sale_price** (number) - The sale price of the item.
- **purchase_total** (number) - The total purchase amount for the item.
- **sale_total** (number) - The total sale amount for the item.
- **currency_id** (integer) - The ID of the currency used for the item.
- **tax_income_id** (integer) - The ID of the tax rate for income.
- **tax_id** (integer) - The ID of the general tax rate.
- **tax_expense_id** (integer) - The ID of the tax rate for expenses.
- **unit_id** (integer) - The ID of the unit of measure.
- **is_stock** (boolean) - Indicates if the item is tracked in stock.
- **stock_id** (integer) - The ID of the stock location.
- **stock_place_id** (integer) - The ID of the specific place within the stock.
- **stock_nr** (integer) - The stock number.
- **stock_min_nr** (integer) - The minimum stock level.
- **stock_reserved_nr** (integer) - The number of items reserved in stock.
- **stock_available_nr** (integer) - The number of items available in stock.
- **stock_picked_nr** (integer) - The number of items picked from stock.
- **stock_disposed_nr** (integer) - The number of items disposed from stock.
- **stock_ordered_nr** (integer) - The number of items ordered for stock.
- **width** (number) - The width of the item.
- **height** (number) - The height of the item.
- **weight** (number) - The weight of the item.
- **volume** (number) - The volume of the item.
- **html_text** (string) - HTML formatted text for the item description.
- **remarks** (string) - Remarks about the item.
- **delivery_price** (number) - The delivery price for the item.
- **article_group_id** (integer) - The ID of the item group.
- **account_id** (integer) - The ID of the account associated with the item.
- **expense_account_id** (integer) - The ID of the expense account for the item.

### Response Example
```json
[
  {
    "id": 4,
    "user_id": 1,
    "article_type_id": 1,
    "contact_id": 14,
    "deliverer_code": null,
    "deliverer_name": null,
    "deliverer_description": null,
    "intern_code": "wh-2019",
    "intern_name": "Webhosting",
    "intern_description": null,
    "purchase_price": null,
    "sale_price": null,
    "purchase_total": null,
    "sale_total": null,
    "currency_id": null,
    "tax_income_id": null,
    "tax_id": null,
    "tax_expense_id": null,
    "unit_id": null,
    "is_stock": false,
    "stock_id": null,
    "stock_place_id": null,
    "stock_nr": 0,
    "stock_min_nr": 0,
    "stock_reserved_nr": 0,
    "stock_available_nr": 0,
    "stock_picked_nr": 0,
    "stock_disposed_nr": 0,
    "stock_ordered_nr": 0,
    "width": null,
    "height": null,
    "weight": null,
    "volume": null,
    "html_text": null,
    "remarks": null,
    "delivery_price": null,
    "article_group_id": null,
    "account_id": null,
    "expense_account_id": null
  }
]
```
```

--------------------------------

### Project JSON Response Sample

Source: https://docs.bexio.com/

Example JSON structure returned for a project object.

```json
{
  * "id": 2,
  * "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
  * "nr": "000002",
  * "name": "Villa Kunterbunt",
  * "start_date": "2019-07-12 00:00:00",
  * "end_date": null,
  * "comment": "",
  * "pr_state_id": 2,
  * "pr_project_type_id": 2,
  * "contact_id": 2,
  * "contact_sub_id": null,
  * "pr_invoice_type_id": 3,
  * "pr_invoice_type_amount": "230.00",
  * "pr_budget_type_id": 1,
  * "pr_budget_type_amount": "200.00",
  * "user_id": 1

}
```

--------------------------------

### Search Projects Response

Source: https://docs.bexio.com/

Example response body returned when searching for projects.

```json
[
  {
    "id": 2,
    "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
    "nr": "000002",
    "name": "Villa Kunterbunt",
    "start_date": "2019-07-12 00:00:00",
    "end_date": null,
    "comment": "",
    "pr_state_id": 2,
    "pr_project_type_id": 2,
    "contact_id": 2,
    "contact_sub_id": null,
    "pr_invoice_type_id": 3,
    "pr_invoice_type_amount": "230.00",
    "pr_budget_type_id": 1,
    "pr_budget_type_amount": "200.00",
    "user_id": 1
  }
]
```

--------------------------------

### Fetch Project Response

Source: https://docs.bexio.com/

Example response body for a successful project retrieval.

```json
{
  "id": 2,
  "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
  "nr": "000002",
  "name": "Villa Kunterbunt",
  "start_date": "2019-07-12 00:00:00",
  "end_date": null,
  "comment": "",
  "pr_state_id": 2,
  "pr_project_type_id": 2,
  "contact_id": 2,
  "contact_sub_id": null,
  "pr_invoice_type_id": 3,
  "pr_invoice_type_amount": "230.00",
  "pr_budget_type_id": 1,
  "pr_budget_type_amount": "200.00",
  "user_id": 1
}
```

--------------------------------

### GET /2.0/title

Source: https://docs.bexio.com/

Fetch a list of all titles.

```APIDOC
## GET /2.0/title

### Description
This action fetches a list of all titles.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/title

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results
- **limit** (integer) - Optional - Limit the number of results
- **offset** (integer) - Optional - Skip over a number of elements

### Response
#### Success Response (200)
- **id** (integer) - ID of the title
- **name** (string) - Name of the title

#### Response Example
[
  {
    "id": 1,
    "name": "Dr."
  }
]
```

--------------------------------

### Create Task Response Sample

Source: https://docs.bexio.com/

Example of a 201 Created response body returned after successfully creating a task.

```json
{
  "id": 1,
  "user_id": 1,
  "finish_date": "2018-04-09T07:44:10+00:00",
  "subject": "Unterlagen versenden",
  "place": 0,
  "info": "so schnell wie möglich.",
  "contact_id": 1,
  "sub_contact_id": null,
  "project_id": null,
  "entry_id": null,
  "module_id": null,
  "todo_status_id": 1,
  "todo_priority_id": null,
  "has_reminder": false,
  "remember_type_id": null,
  "remember_time_id": null,
  "communication_kind_id": null
}
```

--------------------------------

### Fetch Tasks List (cURL)

Source: https://docs.bexio.com/

Example of how to fetch a list of all tasks using cURL. Ensure the Accept header is set to application/json and include your Authorization token.

```bash
curl -X GET \
  https://api.bexio.com/2.0/task \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Get Timesheet Status cURL Request

Source: https://docs.bexio.com/

Example cURL command to fetch a list of all timesheet statuses. Supports query parameters for ordering and limiting results.

```curl
curl -X GET \
  https://api.bexio.com/2.0/timesheet_status \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Task Response Sample

Source: https://docs.bexio.com/

Example of a 200 OK response body returned when retrieving task information.

```json
[
  {
    "id": 1,
    "user_id": 1,
    "finish_date": "2018-04-09T07:44:10+00:00",
    "subject": "Unterlagen versenden",
    "place": 0,
    "info": "so schnell wie möglich.",
    "contact_id": 1,
    "sub_contact_id": null,
    "project_id": null,
    "entry_id": null,
    "module_id": null,
    "todo_status_id": 1,
    "todo_priority_id": null,
    "has_reminder": false,
    "remember_type_id": null,
    "remember_time_id": null,
    "communication_kind_id": null
}
]
```

--------------------------------

### Validate Document Number via cURL

Source: https://docs.bexio.com/

Example request to check if a document number is available using the GET method.

```bash
curl -X GET \
  https://api.bexio.com/4.0/expenses/documentnumbers \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Response Samples

Source: https://docs.bexio.com/

Example response structures for successful and error scenarios.

```APIDOC
## Response Samples

### Success Response (200)

```json
{
  "data": [
    {
      "id": "2af7df09-bf6b-4a6b-840f-142e337e692a",
      "created_at": "2019-03-23T09:53:49+0000",
      "document_no": "NO-1",
      "status": "DRAFT",
      "vendor_ref": "Vendor 1",
      "firstname_suffix": "John",
      "lastname_company": "Doe",
      "vendor": "John Doe",
      "title": "Title 1",
      "currency_code": "CHF",
      "pending_amount": 100.23,
      "net": 0.45,
      "gross": 13.42,
      "bill_date": "2019-02-12",
      "due_date": "2019-03-14",
      "overdue": false,
      "booking_account_ids": [
        10,
        12
      ],
      "attachment_ids": [
        "1cb712f3-652c-4707-9641-2de94f77e07d",
        "ab2b0d50-f3b0-4773-9c65-6606657db25b",
        "34ef8407-094a-419f-b649-789d36b5d145"
      ]
    },
    {
      "id": "99fd6dc2-09cf-4db6-8dfa-2b9b3b9394b1",
      "created_at": "2019-05-23T09:53:49+0000",
      "document_no": "NO-3",
      "status": "BOOKED",
      "vendor_ref": "Vendor 2",
      "firstname_suffix": "James",
      "lastname_company": "Doe",
      "vendor": "James Doe",
      "title": "Title 2",
      "currency_code": "USD",
      "pending_amount": 2.73,
      "net": 0.01,
      "gross": 1.42,
      "bill_date": "2019-04-02",
      "due_date": "2019-05-27",
      "overdue": true,
      "booking_account_ids": [
        12,
        134,
        9
      ],
      "attachment_ids": [
        "1f1ef73d-6b4a-4de5-812c-27f8732be88b",
        "d9d3a328-8c0b-4889-9b15-d3e9abc24df0"
      ]
    }
  ],
  "paging": {
    "page": 1,
    "page_size": 10,
    "page_count": 50,
    "item_count": 300
  }
}
```

### Error Responses
- **400**: Bad request
- **401**: Access token is missing or is invalid
- **403**: No access rights
```

--------------------------------

### Fetch Files Response Body

Source: https://docs.bexio.com/

Example response when fetching a list of files. Includes details like ID, name, size, and creation date.

```json
[
  {
    "id": 1,
    "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",
    "name": "screenshot",
    "size_in_bytes": 218476,
    "extension": "png",
    "mime_type": "image/png",
    "uploader_email": "contact@example.org",
    "user_id": 1,
    "is_archived": false,
    "source_id": 2,
    "source_type": "web",
    "is_referenced": false,
    "created_at": "2018-06-09T08:52:10+00:00"
}

]
```

--------------------------------

### GET /2.0/client_service

Source: https://docs.bexio.com/

Fetches a list of all business activities available in Bexio.

```APIDOC
## GET /2.0/client_service

### Description
Fetches a list of all business activities available in Bexio.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/client_service

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Can be `id` or `name`. Append `_asc` or `_desc` for sorting direction.
- **limit** (integer) - Optional - Limits the number of results (max is 2000). Default is 500.
- **offset** (integer) - Optional - Skips over a number of elements by specifying an offset value for the query. Default is 0.

#### Header Parameters
- **Accept** (string) - Required - Specifies the desired response format, e.g., `application/json`.

### Request Example
```bash
curl -X GET \
  https://api.bexio.com/2.0/client_service \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- A list of business activity objects. The exact structure of these objects is not detailed in the provided text but would typically include fields like `id` and `name`.
```

--------------------------------

### Project Status List Response

Source: https://docs.bexio.com/

Example response for project status retrieval.

```json
[
  * {
    * "id": 1,
    * "name": "Active"
}

]
```

--------------------------------

### Execute Bill Action - PHP Example

Source: https://docs.bexio.com/

PHP code snippet for executing a bill action. This example uses cURL to send a POST request with the 'DUPLICATE' action.

```php
<?php

$url = "https://api.bexio.com/4.0/purchase/bills/{id}/actions";
$headers = [
    "Authorization: Bearer YOUR_ACCESS_TOKEN",
    "Content-Type: application/json"
];
$payload = json_encode([
    "action" => "DUPLICATE"
]);

$ch = curl_init($url);
c_setopt($ch, CURLOPT_RETURNTRANSFER, true);
c_setopt($ch, CURLOPT_POST, true);
c_setopt($ch, CURLOPT_POSTFIELDS, $payload);
c_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

c_close($ch);

echo $response;

?>
```

--------------------------------

### Execute Bill Action - Node.js Example

Source: https://docs.bexio.com/

Node.js code snippet to execute a bill action. This example uses the 'https' module to send a POST request with the 'DUPLICATE' action.

```javascript
const https = require('https');

const options = {
  hostname: 'api.bexio.com',
  port: 443,
  path: '/4.0/purchase/bills/{id}/actions',
  method: 'POST',
  headers: {
    'Authorization': 'Bearer YOUR_ACCESS_TOKEN',
    'Content-Type': 'application/json'
  }
};

const postData = JSON.stringify({
  action: 'DUPLICATE'
});

const req = https.request(options, (res) => {
  let data = '';

  res.on('data', (chunk) => {
    data += chunk;
  });

  res.on('end', () => {
    console.log(res.statusCode);
    console.log(JSON.parse(data));
  });
});

req.on('error', (error) => {
  console.error(error);
});

req.write(postData);
req.end();
```

--------------------------------

### Fetch Purchase Order via cURL

Source: https://docs.bexio.com/

Example request to retrieve a specific purchase order using the cURL command-line tool.

```bash
curl -X GET \
  https://api.bexio.com/3.0/purchase_orders/{purchase_order_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/note

Source: https://docs.bexio.com/

Fetches a list of all notes.

```APIDOC
## GET /2.0/note

### Description
This action fetches a list of all notes.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/note

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max 2000, default: 500)
- **offset** (integer) - Optional - Skip over a number of elements (default: 0)

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Note ID
- **user_id** (integer) - User ID
- **event_start** (string) - Start date and time
- **subject** (string) - Note subject
- **info** (string) - Note information

#### Response Example
[
  {
    "id": 4,
    "user_id": 1,
    "event_start": "2019-01-16 14:20:00",
    "subject": "API conception",
    "info": "string"
  }
]
```

--------------------------------

### GET /2.0/unit

Source: https://docs.bexio.com/

Fetches a list of all units.

```APIDOC
## GET /2.0/unit

### Description
Fetches a list of all units.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/unit

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max 2000). Default: 500.
- **offset** (integer) - Optional - Skip over a number of elements. Default: 0.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - ID of the unit
- **name** (string) - Name of the unit

#### Response Example
[
  {
    "id": 1,
    "name": "h"
  }
]
```

--------------------------------

### Sample Project Response (200 OK)

Source: https://docs.bexio.com/

This is a sample JSON response for a successful project retrieval. It includes all project details.

```json
[
  {
    "id": 2,
    "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
    "nr": "000002",
    "name": "Villa Kunterbunt",
    "start_date": "2019-07-12 00:00:00",
    "end_date": null,
    "comment": "",
    "pr_state_id": 2,
    "pr_project_type_id": 2,
    "contact_id": 2,
    "contact_sub_id": null,
    "pr_invoice_type_id": 3,
    "pr_invoice_type_amount": "230.00",
    "pr_budget_type_id": 1,
    "pr_budget_type_amount": "200.00",
    "user_id": 1

}

]
```

--------------------------------

### Example JSON Response for a Quote

Source: https://docs.bexio.com/

This is an example of a successful JSON response (200 OK) when retrieving quote information from the Bexio API. It details all fields associated with a quote.

```json
[
  {
    "id": 4,
    "document_nr": "AN-00001",
    "title": null,
    "contact_id": 14,
    "contact_sub_id": null,
    "user_id": 1,
    "project_id": null,
    "logopaper_id": 1,
    "language_id": 1,
    "bank_account_id": 1,
    "currency_id": 1,
    "payment_type_id": 1,
    "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
    "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
    "total_gross": "17.800000",
    "total_net": "17.800000",
    "total_taxes": "1.3706",
    "total": "19.150000",
    "total_rounding_difference": -0.02,
    "mwst_type": 0,
    "mwst_is_net": true,
    "show_position_taxes": false,
    "is_valid_from": "2019-06-24",
    "is_valid_until": "2019-07-24",
    "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
    "delivery_address_type": 0,
    "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
    "kb_item_status_id": 3,
    "api_reference": null,
    "viewed_by_client_at": null,
    "kb_terms_of_payment_template_id": null,
    "show_total": true,
    "updated_at": "2019-04-08 13:17:32",
    "template_slug": "581a8010821e01426b8b456b",
    "taxs": [
      {
        "percentage": "7.70",
        "value": "1.3706"
      }
    ],
    "network_link": ""
  }
]
```

--------------------------------

### Fetch Files cURL Request

Source: https://docs.bexio.com/

Example cURL command to fetch a list of files. Ensure to replace `{access-token}` with your actual token.

```bash
curl -X GET \
  https://api.bexio.com/3.0/files \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Retrieve KB Item Settings

Source: https://docs.bexio.com/

Fetches the configuration settings for KB items using a GET request.

```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_item_setting \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/kb_invoice

Source: https://docs.bexio.com/

Fetches a list of all invoices available in the system.

```APIDOC
## GET /2.0/kb_invoice

### Description
This action fetches a list of all invoices.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/kb_invoice

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Multiple sort parameters can be combined by using a comma separator.
- **limit** (integer) - Optional - Limit the number of results (max is 2000)
- **offset** (integer) - Optional - Skip over a number of elements by specifying an offset value for the query

#### Header Parameters
- **Accept** (string) - Required - application/json

### Request Example
curl -X GET \
  https://api.bexio.com/2.0/kb_invoice \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Create Project Response (201 Created)

Source: https://docs.bexio.com/

This is a sample JSON response for a successfully created project. It returns the details of the newly created project.

```json
{
  "id": 2,
  "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
  "nr": "000002",
  "name": "Villa Kunterbunt",
  "start_date": "2019-07-12 00:00:00",
  "end_date": null,
  "comment": "",
  "pr_state_id": 2,
  "pr_project_type_id": 2,
  "contact_id": 2,
  "contact_sub_id": null,
  "pr_invoice_type_id": 3,
  "pr_invoice_type_amount": "230.00",
  "pr_budget_type_id": 1,
  "pr_budget_type_amount": "200.00",
  "user_id": 1

}
```

--------------------------------

### Tax Response Sample

Source: https://docs.bexio.com/

Example JSON response for a tax object.

```json
{
  * "id": 1,
  * "uuid": "8078b1f3-f85b-4adf-aaa8-c3eeea964927",
  * "name": "lib.model.tax.ch.sales_7_7.name",
  * "code": "UN77",
  * "digit": "302",
  * "type": "sales_tax",
  * "account_id": 98,
  * "tax_settlement_type": "none",
  * "value": 7.7,
  * "net_tax_value": null,
  * "start_year": 2017,
  * "end_year": 2018,
  * "is_active": true,
  * "display_name": "ZOLLM  - Import Mat/SV 100.00%",
  * "start_month": 1,
  * "end_month": 12

}
```

--------------------------------

### Get File Preview

Source: https://docs.bexio.com/

Retrieves a preview of a specific file.

```APIDOC
## GET /3.0/files/{file_id}/preview

### Description
Provides a preview for a requested file from the backend as a stream.

### Method
GET

### Endpoint
/3.0/files/{file_id}/preview

### Parameters
#### Path Parameters
- **file_id** (integer) - Required - File ID to get the preview file.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/3.0/files/{file_id}/preview \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
OK

#### Response Example
```json
"string"
```
```

--------------------------------

### GET /2.0/kb_offer

Source: https://docs.bexio.com/

Retrieves a list of all quotes available in the account.

```APIDOC
## GET /2.0/kb_offer

### Description
Retrieves a list of all quotes.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/kb_offer

### Response
#### Success Response (200)
- **id** (integer) - Unique identifier
- **document_nr** (string) - Document number
- **total** (string) - Total amount

#### Response Example
[
  {
    "id": 4,
    "document_nr": "AN-00001",
    "total": "19.150000"
  }
]
```

--------------------------------

### GET /2.0/pr_project

Source: https://docs.bexio.com/

Fetches a list of all projects. Supports sorting and pagination.

```APIDOC
## GET /2.0/pr_project

### Description
Fetches a list of all projects. Supports sorting and pagination.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/pr_project

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Default: "id". Enum: "id" "name". Multiple sort parameters can be combined by using a comma separator. `_asc` and `_desc` can be appended to any parameter to either sort ascending (default) or descending.
- **limit** (integer) - Optional - Limits the number of results (max is 2000). Default: 500.
- **offset** (integer) - Optional - Skips over a number of elements by specifying an offset value for the query. Default: 0.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
OK

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/2.0/pr_project \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```
```

--------------------------------

### GET /2.0/accounts

Source: https://docs.bexio.com/

Fetches a list of all accounts available in the system.

```APIDOC
## GET /2.0/accounts

### Description
This action fetches a list of all accounts.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/accounts

### Parameters
#### Query Parameters
- **limit** (integer <int32>) - Optional - Limit the number of results (max is 2000), default 500
- **offset** (integer <int32>) - Optional - Skip over a number of elements by specifying an offset value, default 0

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **Array** - List of account objects

#### Response Example
[
  {
    "id": 1,
    "uuid": "c7da5b70-2d27-467e-abd9-9c3ac0f83c7d",
    "account_no": "3201",
    "name": "Gross proceeds credit sales",
    "account_type": 1,
    "tax_id": 40,
    "fibu_account_group_id": 65,
    "is_active": true,
    "is_locked": false
  }
]
```

--------------------------------

### Project Type List Response

Source: https://docs.bexio.com/

Example response for project type retrieval.

```json
[
  * {
    * "id": 1,
    * "name": "Internal Project"
}

]
```

--------------------------------

### GET /2.0/kb_item_setting

Source: https://docs.bexio.com/

Retrieves the configuration settings for knowledge base items. Supports ordering by 'id' or 'text', with options for ascending or descending order.

```APIDOC
## GET /2.0/kb_item_setting

### Description
Retrieves the configuration settings for knowledge base items. Supports ordering by 'id' or 'text', with options for ascending or descending order.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/kb_item_setting

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. `_asc` and `_desc` can be appended to any parameter to either sort ascending (default) or descending. Default: "id". Enum: "id", "text"

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Description
- **text** (string) - Description
- **kb_item_class** (string) - Description
- **enumeration_format** (string) - Description
- **use_automatic_enumeration** (boolean) - Description
- **use_yearly_enumeration** (boolean) - Description
- **next_nr** (integer) - Description
- **nr_min_length** (integer) - Description
- **default_time_period_in_days** (integer) - Description
- **default_logopaper_id** (integer) - Description
- **default_language_id** (integer) - Description
- **default_client_bank_account_new_id** (integer) - Description
- **default_currency_id** (integer) - Description
- **default_mwst_type** (integer) - Description
- **default_mwst_is_net** (boolean) - Description
- **default_nb_decimals_amount** (integer) - Description
- **default_nb_decimals_price** (integer) - Description
- **default_show_position_taxes** (boolean) - Description
- **default_title** (string) - Description
- **default_show_esr_on_same_page** (boolean) - Description
- **default_payment_type_id** (integer) - Description
- **kb_terms_of_payment_template_id** (integer) - Description
- **default_show_total** (boolean) - Description

### Response Example
```json
[
  {
    "id": 1,
    "text": "Quote",
    "kb_item_class": "KbOffer",
    "enumeration_format": "AN-%nummer%",
    "use_automatic_enumeration": true,
    "use_yearly_enumeration": false,
    "next_nr": 1,
    "nr_min_length": 5,
    "default_time_period_in_days": 14,
    "default_logopaper_id": 1,
    "default_language_id": 1,
    "default_client_bank_account_new_id": 1,
    "default_currency_id": 1,
    "default_mwst_type": 0,
    "default_mwst_is_net": true,
    "default_nb_decimals_amount": 2,
    "default_nb_decimals_price": 2,
    "default_show_position_taxes": false,
    "default_title": "Angebot",
    "default_show_esr_on_same_page": false,
    "default_payment_type_id": 1,
    "kb_terms_of_payment_template_id": 1,
    "default_show_total": true
  }
]
```
```

--------------------------------

### GET /3.0/currencies

Source: https://docs.bexio.com/

Fetches a list of all currencies.

```APIDOC
## GET /3.0/currencies

### Description
Fetches a list of all configured currencies.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/currencies

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Currency ID
- **name** (string) - Currency name
- **round_factor** (number) - Rounding factor
- **exchange_rate** (number) - Current exchange rate

#### Response Example
[
  {
    "id": 1,
    "name": "CHF",
    "round_factor": 0.05,
    "exchange_rate": 0.9849
  }
]
```

--------------------------------

### GET /2.0/todo_priority

Source: https://docs.bexio.com/

Fetches a list of all todo priorities.

```APIDOC
## GET /2.0/todo_priority

### Description
Fetches a list of all todo priorities.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/todo_priority

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Default: "id". Enum: "id", "name".
- **limit** (integer) - Optional - Limit the number of results (max 2000). Default: 500.
- **offset** (integer) - Optional - Skip over a number of elements. Default: 0.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - ID of the priority
- **name** (string) - Name of the priority

#### Response Example
[
  {
    "id": 1,
    "name": "High"
  }
]
```

--------------------------------

### GET /3.0/currencies

Source: https://docs.bexio.com/

Fetches a list of all currencies.

```APIDOC
## GET /3.0/currencies

### Description
Fetches a list of all currencies, with optional embedding of exchange rate data.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/currencies

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results
- **offset** (integer) - Optional - Skip over a number of elements
- **embed** (string) - Optional - Embed related resources (e.g., "exchange_rate")
- **date** (date) - Optional - Validity date for the exchange rate
```

--------------------------------

### GET /2.0/salutation

Source: https://docs.bexio.com/

Fetches a list of all available salutations.

```APIDOC
## GET /2.0/salutation

### Description
This action fetches a list of all salutations.

### Method
GET

### Endpoint
/2.0/salutation

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Default: 500 - Limit the number of results (max 2000)
- **offset** (integer) - Optional - Default: 0 - Skip over a number of elements

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer)
- **name** (string)
```

--------------------------------

### GET /2.0/language

Source: https://docs.bexio.com/

Fetches a list of all available languages.

```APIDOC
## GET /2.0/language

### Description
Fetches a list of all available languages.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/language

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Language ID
- **name** (string) - Language name
- **decimal_point** (string) - Decimal separator
- **thousands_separator** (string) - Thousands separator
- **date_format_id** (integer) - Date format ID
- **date_format** (string) - Date format string
- **iso_639_1** (string) - ISO 639-1 code

#### Response Example
[
  {
    "id": 1,
    "name": "German",
    "decimal_point": ".",
    "thousands_separator": "'",
    "date_format_id": 1,
    "date_format": "d.m.Y",
    "iso_639_1": "de"
  }
]
```

--------------------------------

### GET /2.0/timesheet

Source: https://docs.bexio.com/

Fetches a list of all timesheets.

```APIDOC
## GET /2.0/timesheet

### Description
This action fetches a list of all timesheets.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/timesheet

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results
- **limit** (integer) - Optional - Limit the number of results (max 2000)
- **offset** (integer) - Optional - Skip over a number of elements

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **Array** (array) - List of timesheet objects

#### Response Example
[
  {
    "id": 2,
    "user_id": 1,
    "status_id": 4,
    "date": "2019-05-20",
    "duration": "01:40"
  }
]
```

--------------------------------

### Fetch Quote Response Sample

Source: https://docs.bexio.com/

Example of a successful response when fetching a single quote, including detailed information and positions.

```json
{
  "id": 4,
  "document_nr": "AN-00001",
  "title": null,
  "contact_id": 14,
  "contact_sub_id": null,
  "user_id": 1,
  "project_id": null,
  "logopaper_id": 1,
  "language_id": 1,
  "bank_account_id": 1,
  "currency_id": 1,
  "payment_type_id": 1,
  "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
  "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
  "total_gross": "17.800000",
  "total_net": "17.800000",
  "total_taxes": "1.3706",
  "total": "19.150000",
  "total_rounding_difference": -0.02,
  "mwst_type": 0,
  "mwst_is_net": true,
  "show_position_taxes": false,
  "is_valid_from": "2019-06-24",
  "is_valid_until": "2019-07-24",
  "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
  "delivery_address_type": 0,
  "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
  "kb_item_status_id": 3,
  "api_reference": null,
  "viewed_by_client_at": null,
  "kb_terms_of_payment_template_id": null,
  "show_total": true,
  "updated_at": "2019-04-08 13:17:32",
  "template_slug": "581a8010821e01426b8b456b",
  "taxs": [
    {
      "percentage": "7.70",
      "value": "1.3706"
}
],
  "network_link": "",
  "positions": [
    {
      "id": 1,
      "amount": "5.000000",
      "amount_reserved": "5.000000",
      "amount_open": "5.000000",
      "amount_completed": "5.000000",
      "unit_id": 1,
      "account_id": 1,
      "unit_name": "kg",
      "tax_id": 4,
      "tax_value": "7.70",
      "text": "Apples",
      "unit_price": "3.560000",
      "discount_in_percent": "0.000000",
      "position_total": "17.800000",
      "pos": 1,
      "internal_pos": 1,
      "is_optional": null,
      "type": "KbPositionCustom",
      "parent_id": null
}
]

}
```

--------------------------------

### Create Work Package Response Sample

Source: https://docs.bexio.com/

This is a sample JSON response when a work package is successfully created. It returns the details of the newly created work package.

```json
{
  "id": 4,
  "name": "Documentation",
  "spent_time_in_hours": 0.5,
  "estimated_time_in_hours": 1.75,
  "comment": "Crete project documentation",
  "pr_milestone_id": 3

}
```

--------------------------------

### GET /2.0/todo_status

Source: https://docs.bexio.com/

Fetches a list of all task statuses.

```APIDOC
## GET /2.0/todo_status

### Description
Fetches a list of all task statuses.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/todo_status

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Default: "id". Enum: "id", "name".
- **limit** (integer) - Optional - Limit the number of results (max 2000). Default: 500.
- **offset** (integer) - Optional - Skip over a number of elements. Default: 0.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - ID of the status
- **name** (string) - Name of the status

#### Response Example
[
  {
    "id": 1,
    "name": "Open"
  }
]
```

--------------------------------

### Fetch Payment via cURL

Source: https://docs.bexio.com/

Example request to retrieve payment details using cURL.

```bash
curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment/{payment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /3.0/files

Source: https://docs.bexio.com/

Fetch a list of files uploaded to a company.

```APIDOC
## GET /3.0/files

### Description
Provides a list of files which are uploaded to a certain company.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/files

### Parameters
#### Query Parameters
- **archived_state** (string) - Optional - Include/Exclude archived files (all, archived, not_archived).
- **offset** (integer) - Optional - Skip over a number of elements. Default: 0.
- **order_by** (string) - Optional - Defines the order of the results. Default: "id".

### Response
#### Success Response (200)
- **id** (integer) - File ID.
- **uuid** (string) - Unique identifier.
- **name** (string) - File name.
- **size_in_bytes** (integer) - File size.
- **created_at** (string) - Creation timestamp.

#### Response Example
[
  {
    "id": 1,
    "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",
    "name": "screenshot",
    "size_in_bytes": 218476,
    "extension": "png",
    "mime_type": "image/png",
    "created_at": "2018-06-09T08:52:10+00:00"
  }
]
```

--------------------------------

### Search Notes Response

Source: https://docs.bexio.com/

Example response returned after a successful note search.

```json
[
  * {
    * "id": 4,
    * "user_id": 1,
    * "event_start": "2019-01-16 14:20:00",
    * "subject": "API conception",
    * "info": "string",
    * "contact_id": 14,
    * "project_id": null,
    * "entry_id": null,
    * "module_id": null
}

]
```

--------------------------------

### GET /3.0/document_templates

Source: https://docs.bexio.com/

Fetches a list of all available document templates.

```APIDOC
## GET /3.0/document_templates

### Description
This action fetches a list of document templates.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/document_templates

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Must be application/json.

### Response
#### Success Response (200)
- **template_slug** (string) - The unique identifier for the template.
- **name** (string) - The display name of the template.
- **is_default** (boolean) - Whether this is the default template.
- **default_for_document_types** (array) - List of document types this template applies to.

#### Response Example
[
  {
    "template_slug": "5f118cbc200a0c76ef1f34b2",
    "name": "Standard template",
    "is_default": true,
    "default_for_document_types": [
      "type_offer",
      "type_order",
      "type_invoice"
    ]
  }
]
```

--------------------------------

### Get KB Orders with cURL

Source: https://docs.bexio.com/

Use this cURL command to retrieve a list of KB orders. Ensure you replace `{access-token}` with your actual token and set the `Accept` header to `application/json`.

```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_order \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Response for Fetch Sub Positions

Source: https://docs.bexio.com/

Example JSON array returned when fetching sub positions.

```json
[
  {
    "id": 1,
    "text": "This is a container to group other position types",
    "pos": 1,
    "internal_pos": 1,
    "show_pos_nr": true,
    "is_optional": false,
    "total_sum": "17.800000",
    "show_pos_prices": true,
    "type": "KbPositionSubposition",
    "parent_id": null
  }
]
```

--------------------------------

### Fetch Business Activities cURL Request

Source: https://docs.bexio.com/

Example cURL command to retrieve a list of all business activities. Supports query parameters for ordering and limiting results.

```curl
curl -X GET \
  https://api.bexio.com/2.0/client_service \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/pr_project_state

Source: https://docs.bexio.com/

Fetches a list of available project statuses.

```APIDOC
## GET /2.0/pr_project_state

### Description
This action fetches a list of project status.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/pr_project_state

### Parameters
#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **id** (integer) - Status ID
- **name** (string) - Status name

#### Response Example
[
  {
    "id": 1,
    "name": "Active"
  }
]
```

--------------------------------

### Archive a Project

Source: https://docs.bexio.com/

Archives an existing project.

```bash
curl -X POST \
  https://api.bexio.com/2.0/pr_project/{project_id}/archive \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /3.0/accounting/vat_periods

Source: https://docs.bexio.com/

Fetches a list of all VAT periods.

```APIDOC
## GET /3.0/accounting/vat_periods

### Description
This action fetches a list of all vat periods.

### Method
GET

### Endpoint
/3.0/accounting/vat_periods

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max 2000, default 500)
- **offset** (integer) - Optional - Skip over a number of elements (default 0)

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **id** (integer) - The id of the vat period
- **start** (string) - Start date of the period
- **end** (string) - End date of the period
- **type** (string) - Type of period (e.g., quarter)
- **status** (string) - Status of the period
- **closed_at** (string) - Timestamp when the period was closed
```

--------------------------------

### List currencies response

Source: https://docs.bexio.com/

Example JSON response for the list currencies endpoint.

```json
[
  {
    "id": 1,
    "name": "CHF",
    "round_factor": 0.05,
    "exchange_rate": 0.9849,
    "exchange_rate_id": 2,
    "ratio": 1,
    "exchange_rate_to_ratio": 0.9849,
    "source": "monthly_average",
    "source_reason": "monthly_average_provided",
    "exchange_rate_date": "2024-05-01"
  }
]
```

--------------------------------

### GET /2.0/pr_project_type

Source: https://docs.bexio.com/

Fetches a list of available project types.

```APIDOC
## GET /2.0/pr_project_type

### Description
This action fetches a list of project types.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/pr_project_type

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results (id, name)

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **id** (integer) - Type ID
- **name** (string) - Type name

#### Response Example
[
  {
    "id": 1,
    "name": "Internal Project"
  }
]
```

--------------------------------

### POST /2.0/client_service

Source: https://docs.bexio.com/

Creates a new business activity.

```APIDOC
## POST /2.0/client_service

### Description
This action creates a new business activity.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/client_service

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **name** (string) - Required
- **default_is_billable** (boolean/null) - Optional
- **default_price_per_hour** (number/null) - Optional
- **account_id** (integer/null) - Optional

### Request Example
{
  "name": "Project Management",
  "default_is_billable": false,
  "default_price_per_hour": null,
  "account_id": null
}

### Response
#### Success Response (201)
- Created

#### Error Response (422)
- Validation error
```

--------------------------------

### Expense Response Object

Source: https://docs.bexio.com/

Example response returned after a successful expense creation or retrieval.

```json
{
  "id": "759b0915-4787-4151-9a81-6e7499d26bee",
  "document_no": "123",
  "title": "Some Title",
  "status": "DRAFT",
  "firstname_suffix": "Less",
  "lastname_company": "Organisation",
  "created_at": "2019-03-23T09:53:49+0000",
  "supplier_id": null,
  "paid_on": "2019-03-20",
  "bank_account_id": 3,
  "booking_account_id": 4,
  "currency_code": "CHF",
  "base_currency_code": "USD",
  "exchange_rate": 1.4123567431,
  "amount": 30.9,
  "tax_man": 1.14,
  "tax_calc": 3.45,
  "tax_id": 6,
  "base_currency_amount": 24.84,
  "transaction_id": null,
  "invoice_id": null,
  "project_id": null,
  "attachment_ids": [
    "3c570a07-1fa1-41e7-a761-0f486dfc01f6",
    "138c5618-744c-4c05-b504-c034ccf5f7d9"
],
  "address": {
    "title": "Prof",
    "salutation": "Mrs",
    "firstname_suffix": "John",
    "lastname_company": "Newman",
    "address_line": "Mega Street",
    "postcode": "6694",
    "city": "Tel Aviv",
    "country_code": "CH",
    "main_contact_id": 45,
    "contact_address_id": 827,
    "type": "PRIVATE"
}

}
```

--------------------------------

### Work Package Response Sample

Source: https://docs.bexio.com/

This is a sample JSON response when successfully fetching a list of work packages. It includes details for each work package.

```json
[
  {
    "id": 4,
    "name": "Documentation",
    "spent_time_in_hours": 0.5,
    "estimated_time_in_hours": 1.75,
    "comment": "Crete project documentation",
    "pr_milestone_id": 3
}

]
```

--------------------------------

### GET /2.0/payment_type

Source: https://docs.bexio.com/

Retrieves a list of all payment types.

```APIDOC
## GET /2.0/payment_type

### Description
Retrieves a list of all payment types.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/payment_type

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of results. Default: "id".
- **limit** (integer) - Optional - Limit the number of results (max 2000). Default: 500.
- **offset** (integer) - Optional - Skip over a number of elements. Default: 0.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Payment type ID
- **name** (string) - Payment type name

#### Response Example
[
  {
    "id": 1,
    "name": "Cash"
  }
]
```

--------------------------------

### GET /2.0/communication_kind

Source: https://docs.bexio.com/

Fetches a list of all communication types.

```APIDOC
## GET /2.0/communication_kind

### Description
This action fetches a list of all communication types.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/communication_kind

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Default: "id"
- **limit** (integer) - Optional - Default: 500
- **offset** (integer) - Optional - Default: 0

### Response
#### Success Response (200)
- **id** (integer) - ID of the communication type
- **name** (string) - Name of the communication type

#### Response Example
[
  {
    "id": 1,
    "name": "Mobile Phone"
  }
]
```

--------------------------------

### GET /2.0/kb_delivery

Source: https://docs.bexio.com/

Fetches a list of all deliveries with optional sorting and pagination.

```APIDOC
## GET /2.0/kb_delivery

### Description
This action fetches a list of all deliveries.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/kb_delivery

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Options: id, total, total_net, total_gross, updated_at.
- **limit** (integer) - Optional - Limit the number of results (max 2000).
- **offset** (integer) - Optional - Skip over a number of elements.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **deliveries** (array) - A list of delivery objects

#### Response Example
[
  {
    "id": 4,
    "document_nr": "LS-00001",
    "total": "19.150000"
  }
]
```

--------------------------------

### GET /3.0/accounting/business_years

Source: https://docs.bexio.com/

Fetches a list of all business years.

```APIDOC
## GET /3.0/accounting/business_years

### Description
Fetches a list of all business years.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/accounting/business_years

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max 2000, default 500)
- **offset** (integer) - Optional - Skip over a number of elements (default 0)

#### Header Parameters
- **Accept** (string) - Required - Expected response format

### Response
#### Success Response (200)
- **id** (integer) - Business year ID
- **start** (string) - Start date
- **end** (string) - End date
- **status** (string) - Status of the year
- **closed_at** (string) - Date closed
```

--------------------------------

### Get file preview via cURL

Source: https://docs.bexio.com/

Provides a preview stream for a specific file.

```cURL
curl -X GET \
  https://api.bexio.com/3.0/files/{file_id}/preview \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch Project Types

Source: https://docs.bexio.com/

Retrieves a list of available project types.

```bash
curl -X GET \
  https://api.bexio.com/2.0/pr_project_type \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /3.0/taxes

Source: https://docs.bexio.com/

Fetches a list of all taxes with filtering options.

```APIDOC
## GET /3.0/taxes

### Description
Fetches a list of all taxes. This endpoint can be filtered by scope, date, and type.

### Method
GET

### Endpoint
/3.0/taxes

### Parameters
#### Query Parameters
- **scope** (string) - Optional - Filters by tax scope ('active' or 'inactive').
- **date** (string) - Optional - Filters for taxes active on a specific date (YYYY-MM-DD).
- **types** (string) - Optional - Filters by tax type ('sales_tax' or 'pre_tax').
- **limit** (integer) - Optional - Limits the number of results (max 2000, default 500).
- **offset** (integer) - Optional - Skips over a number of elements by specifying an offset value (default 0).

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/3.0/taxes \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **id** (integer) - The ID of the tax.
- **uuid** (string) - The UUID of the tax.
- **name** (string) - The name of the tax.
- **code** (string) - The tax code.
- **digit** (string) - The tax digit.
- **type** (string) - The type of tax ('sales_tax' or 'pre_tax').
- **account_id** (integer) - The ID of the associated account.
- **tax_settlement_type** (string) - The tax settlement type.
- **value** (number) - The tax value.
- **net_tax_value** (number) - The net tax value (can be null).
- **start_year** (integer) - The year the tax became effective.
- **end_year** (integer) - The year the tax expired.
- **is_active** (boolean) - Indicates if the tax is currently active.
- **display_name** (string) - The display name of the tax.
- **start_month** (integer) - The month the tax became effective.
- **end_month** (integer) - The month the tax expired.

#### Response Example
```json
[
  {
    "id": 1,
    "uuid": "8078b1f3-f85b-4adf-aaa8-c3eeea964927",
    "name": "lib.model.tax.ch.sales_7_7.name",
    "code": "UN77",
    "digit": "302",
    "type": "sales_tax",
    "account_id": 98,
    "tax_settlement_type": "none",
    "value": 7.7,
    "net_tax_value": null,
    "start_year": 2017,
    "end_year": 2018,
    "is_active": true,
    "display_name": "ZOLLM  - Import Mat/SV 100.00%",
    "start_month": 1,
    "end_month": 12
  }
]
```

#### Error Response (422)
- **Validation error** - Indicates a validation error occurred.
```

--------------------------------

### GET /2.0/pr_project/{project_id}

Source: https://docs.bexio.com/

Fetch details of a single project by its ID.

```APIDOC
## GET /2.0/pr_project/{project_id}

### Description
This action fetches a single project by its unique identifier.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/pr_project/{project_id}

### Parameters
#### Path Parameters
- **project_id** (integer) - Required - The id of the project

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **id** (integer) - Project ID
- **name** (string) - Project name

#### Response Example
{
  "id": 2,
  "name": "Villa Kunterbunt"
}
```

--------------------------------

### GET /2.0/account_groups

Source: https://docs.bexio.com/

Fetches a list of all account groups.

```APIDOC
## GET /2.0/account_groups

### Description
This action fetches a list of all account groups.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/account_groups

### Parameters
#### Query Parameters
- **limit** (integer <int32>) - Optional - Limit the number of results (max is 2000), default 500
- **offset** (integer <int32>) - Optional - Skip over a number of elements by specifying an offset value, default 0

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **Array** - List of account groups
```

--------------------------------

### Discount Position Response JSON

Source: https://docs.bexio.com/

Example JSON structure for a successful response when fetching a discount position.

```json
{
  "id": 1,
  "text": "Partner discount",
  "is_percentual": true,
  "value": "10.000000",
  "discount_total": "1.780000",
  "type": "KbPositionDiscount"

}
```

--------------------------------

### Discount Position Response

Source: https://docs.bexio.com/

Example response for a created or fetched discount position, including its ID, text, percentage status, value, and calculated discount total.

```json
{
  "id": 1,
  "text": "Partner discount",
  "is_percentual": true,
  "value": "10.000000",
  "discount_total": "1.780000",
  "type": "KbPositionDiscount"
}
```

--------------------------------

### Create Article Response Sample (201 Created)

Source: https://docs.bexio.com/

This is a sample JSON response received after successfully creating an article. It includes the newly assigned `id` and other details of the created article.

```json
{
  "id": 4,
  "user_id": 1,
  "article_type_id": 1,
  "contact_id": 14,
  "deliverer_code": null,
  "deliverer_name": null,
  "deliverer_description": null,
  "intern_code": "wh-2019",
  "intern_name": "Webhosting",
  "intern_description": null,
  "purchase_price": null,
  "sale_price": null,
  "purchase_total": null,
  "sale_total": null,
  "currency_id": null,
  "tax_income_id": null,
  "tax_id": null,
  "tax_expense_id": null,
  "unit_id": null,
  "is_stock": false,
  "stock_id": null,
  "stock_place_id": null,
  "stock_nr": 0,
  "stock_min_nr": 0,
  "stock_reserved_nr": 0,
  "stock_available_nr": 0,
  "stock_picked_nr": 0,
  "stock_disposed_nr": 0,
  "stock_ordered_nr": 0,
  "width": null,
  "height": null,
  "weight": null,
  "volume": null,
  "html_text": null,
  "remarks": null,
  "delivery_price": null,
  "article_group_id": null,
  "account_id": null,
  "expense_account_id": null
}
```

--------------------------------

### GET /2.0/contact_branch

Source: https://docs.bexio.com/

Fetches a list of all contact sectors.

```APIDOC
## GET /2.0/contact_branch

### Description
Fetches a list of all contact sectors.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/contact_branch

### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Can be 'id' or 'name'. Appended with `_asc` or `_desc` for sorting direction.
- **limit** (integer) - Optional - Limits the number of results (max is 2000).
- **offset** (integer) - Optional - Skips over a number of elements by specifying an offset value for the query.

### Header Parameters
- **Accept** (string) - Required - Example: application/json
```

--------------------------------

### GET /contact_branch

Source: https://docs.bexio.com/

Fetches a list of all contact branches.

```APIDOC
## GET /contact_branch

### Description
Fetches a list of all contact branches.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/contact_branch

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The ID of the branch
- **name** (string) - The name of the branch

#### Response Example
[
  {
    "id": 1,
    "name": "Photography"
  }
]
```

--------------------------------

### GET /3.0/taxes/{tax_id}

Source: https://docs.bexio.com/

Fetches a single tax by its ID.

```APIDOC
## GET /3.0/taxes/{tax_id}

### Description
Fetches a single tax by its ID.

### Method
GET

### Endpoint
/3.0/taxes/{tax_id}

### Parameters
#### Path Parameters
- **tax_id** (integer) - Required - The ID of the tax to retrieve.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/3.0/taxes/{tax_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **id** (integer) - The ID of the tax.
- **uuid** (string) - The UUID of the tax.
- **name** (string) - The name of the tax.
- **code** (string) - The tax code.
- **digit** (string) - The tax digit.
- **type** (string) - The type of tax ('sales_tax' or 'pre_tax').
- **account_id** (integer) - The ID of the associated account.
- **tax_settlement_type** (string) - The tax settlement type.
- **value** (number) - The tax value.
- **net_tax_value** (number) - The net tax value (can be null).
- **start_year** (integer) - The year the tax became effective.
- **end_year** (integer) - The year the tax expired.
- **is_active** (boolean) - Indicates if the tax is currently active.
- **display_name** (string) - The display name of the tax.
- **start_month** (integer) - The month the tax became effective.
- **end_month** (integer) - The month the tax expired.

#### Response Example
```json
{
  "id": 1,
  "uuid": "8078b1f3-f85b-4adf-aaa8-c3eeea964927",
  "name": "lib.model.tax.ch.sales_7_7.name",
  "code": "UN77",
  "digit": "302",
  "type": "sales_tax",
  "account_id": 98,
  "tax_settlement_type": "none",
  "value": 7.7,
  "net_tax_value": null,
  "start_year": 2017,
  "end_year": 2018,
  "is_active": true,
  "display_name": "ZOLLM  - Import Mat/SV 100.00%",
  "start_month": 1,
  "end_month": 12
}
```
```

--------------------------------

### List Project Milestones via cURL

Source: https://docs.bexio.com/

Retrieve all milestones for a specific project using a GET request.

```bash
curl -X GET \
  https://api.bexio.com/3.0/projects/{project_id}/milestones \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/salutation/{salutation_id}

Source: https://docs.bexio.com/

Fetch a single salutation by its ID.

```APIDOC
## GET /2.0/salutation/{salutation_id}

### Description
This action fetches a single salutation.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/salutation/{salutation_id}

### Parameters
#### Path Parameters
- **salutation_id** (integer) - Required - The id of the salutation

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **id** (integer) - ID of the salutation
- **name** (string) - Name of the salutation

#### Response Example
{
  "id": 1,
  "name": "Herr"
}
```

--------------------------------

### GET /2.0/company_profile/{profile_id}

Source: https://docs.bexio.com/

Fetches a single company profile by its ID.

```APIDOC
## GET /2.0/company_profile/{profile_id}

### Description
This action fetches a single company profile.

### Method
GET

### Endpoint
/2.0/company_profile/{profile_id}

### Parameters
#### Path Parameters
- **profile_id** (integer) - Required - The ID of the company profile.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/2.0/company_profile/{profile_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **id** (integer) - Description
- **name** (string) - Description
- **address** (string) - Description
- **address_nr** (string) - Description
- **postcode** (integer) - Description
- **city** (string) - Description
- **country_id** (integer) - Description
- **legal_form** (string) - Description
- **country_name** (string) - Description
- **mail** (string) - Description
- **phone_fixed** (string) - Description
- **phone_mobile** (string) - Description
- **fax** (string) - Description
- **url** (string) - Description
- **skype_name** (string) - Description
- **facebook_name** (string) - Description
- **twitter_name** (string) - Description
- **description** (string) - Description
- **ust_id_nr** (string) - Description
- **mwst_nr** (string) - Description
- **trade_register_nr** (string) - Description
- **has_own_logo** (boolean) - Description
- **is_public_profile** (boolean) - Description
- **is_logo_public** (boolean) - Description
- **is_address_public** (boolean) - Description
- **is_phone_public** (boolean) - Description
- **is_mobile_public** (boolean) - Description
- **is_fax_public** (boolean) - Description
- **is_mail_public** (boolean) - Description
- **is_url_public** (boolean) - Description
- **is_skype_public** (boolean) - Description
- **logo_base64** (string) - Description

#### Response Example
```json
{
  "id": 1,
  "name": "bexio AG",
  "address": "Alte Jonastrasse 24",
  "address_nr": "",
  "postcode": 8640,
  "city": "Rapperswil",
  "country_id": 1,
  "legal_form": "association",
  "country_name": "Switzerland",
  "mail": "info@bexio.com",
  "phone_fixed": "+41 (0)71 552 00 60",
  "phone_mobile": "+41 (0)79 123 45 67",
  "fax": "",
  "url": "https://www.bexio.com",
  "skype_name": "",
  "facebook_name": "",
  "twitter_name": "",
  "description": "",
  "ust_id_nr": "CHE-322.646.985",
  "mwst_nr": "CHE-322.646.985 MWST",
  "trade_register_nr": "",
  "has_own_logo": true,
  "is_public_profile": false,
  "is_logo_public": false,
  "is_address_public": false,
  "is_phone_public": false,
  "is_mobile_public": false,
  "is_fax_public": false,
  "is_mail_public": false,
  "is_url_public": false,
  "is_skype_public": false,
  "logo_base64": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="
}
```
```

--------------------------------

### Create manual entry (POST)

Source: https://docs.bexio.com/

This action creates a new manual entry. The 'type' parameter specifies the entry type, and 'date' and 'entries' are required. The 'reference_nr' is optional but recommended.

```bash
curl -X POST \
  https://api.bexio.com/3.0/accounting/manual_entries \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/country/{country_id}

Source: https://docs.bexio.com/

Fetch a single country by its ID.

```APIDOC
## GET /2.0/country/{country_id}

### Description
This action fetches a single country.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/country/{country_id}

### Parameters
#### Path Parameters
- **country_id** (integer) - Required - The ID of the country.

### Response
#### Success Response (200)
- **id** (integer) - Country ID
- **name** (string) - Country name
- **name_short** (string) - Short name
- **iso3166_alpha2** (string) - ISO code

#### Response Example
{
  "id": 1,
  "name": "Kiribati",
  "name_short": "KI",
  "iso3166_alpha2": "KI"
}
```

--------------------------------

### Custom Document Position Response Structure

Source: https://docs.bexio.com/

Example response body returned after creating or fetching a custom document position.

```json
{
  * "id": 1,
  * "amount": "5.000000",
  * "amount_reserved": "5.000000",
  * "amount_open": "5.000000",
  * "amount_completed": "5.000000",
  * "unit_id": 1,
  * "account_id": 1,
  * "unit_name": "kg",
  * "tax_id": 4,
  * "tax_value": "7.70",
  * "text": "Apples",
  * "unit_price": "3.560000",
  * "discount_in_percent": "0.000000",
  * "position_total": "17.800000",
  * "pos": 1,
  * "internal_pos": 1,
  * "is_optional": null,
  * "type": "KbPositionCustom",
  * "parent_id": null

}
```

```json
{
  * "id": 1,
  * "amount": "5.000000",
  * "amount_reserved": "5.000000",
  * "amount_open": "5.000000",
  * "amount_completed": "5.000000",
  * "unit_id": 1,
  * "account_id": 1,
  * "unit_name": "kg",
  * "tax_id": 4,
  * "tax_value": "7.70",
  * "text": "Apples",
  * "unit_price": "3.560000",
  * "discount_in_percent": "0.000000",
  * "position_total": "17.800000",
  * "pos": 1,
  * "internal_pos": 1,
  * "is_optional": false,
  * "type": "KbPositionCustom",
  * "parent_id": null

}
```

--------------------------------

### GET /accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files

Source: https://docs.bexio.com/

Fetches a list of all files associated with a specific manual entry line.

```APIDOC
## GET /accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files

### Description
Fetches a list of all files associated to a specific manual entry line.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files

### Parameters
#### Path Parameters
- **manual_entry_id** (integer) - Required - The ID of the manual entry.
- **entry_id** (integer) - Required - The ID of a single entry in the manual_entry object.

#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (default: 500, max: 2000).
- **offset** (integer) - Optional - Skip over a number of elements (default: 0).

### Response
#### Success Response (200)
- **files** (array) - List of file objects.

#### Response Example
[
  {
    "id": 1,
    "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",
    "name": "screenshot",
    "size_in_bytes": 218476,
    "extension": "png",
    "mime_type": "image/png",
    "uploader_email": "contact@example.org",
    "user_id": 1,
    "is_archived": false,
    "source_id": 2,
    "source_type": "web",
    "is_referenced": false,
    "created_at": "2018-06-09T08:52:10+00:00"
  }
]
```

--------------------------------

### Search Invoices Response

Source: https://docs.bexio.com/

Example response body returned when searching for invoices.

```json
[
  {
    "id": 4,
    "document_nr": "RE-00001",
    "title": null,
    "contact_id": 14,
    "contact_sub_id": null,
    "user_id": 1,
    "project_id": null,
    "logopaper_id": 1,
    "language_id": 1,
    "bank_account_id": 1,
    "currency_id": 1,
    "payment_type_id": 1,
    "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
    "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
    "total_gross": "17.800000",
    "total_net": "17.800000",
    "total_taxes": "1.3706",
    "total_received_payments": "0.000000",
    "total_credit_vouchers": "0.000000",
    "total_remaining_payments": "19.150000",
    "total": "19.150000",
    "total_rounding_difference": -0.02,
    "mwst_type": 0,
    "mwst_is_net": true,
    "show_position_taxes": false,
    "is_valid_from": "2019-06-24",
    "is_valid_to": "2019-07-24",
    "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
    "kb_item_status_id": 3,
    "reference": null,
    "api_reference": null,
    "viewed_by_client_at": null,
    "updated_at": "2019-04-08 13:17:32",
    "esr_id": 1,
    "qr_invoice_id": 1,
    "template_slug": "581a8010821e01426b8b456b",
    "taxs": [
      {
        "percentage": "7.70",
        "value": "1.3706"
      }
    ],
    "network_link": ""
  }
]
```

--------------------------------

### Fetch Salutation Response Sample

Source: https://docs.bexio.com/

This is a sample JSON response for a successfully fetched salutation.

```json
{
  "id": 1,
  "name": "Herr"

}
```

--------------------------------

### GET /3.0/accounting/manual_entries/{manual_entry_id}/files

Source: https://docs.bexio.com/

Fetches a list of all files associated with a specific manual compound entry.

```APIDOC
## Fetch files of manual compound entry

### Description
This action fetches a list of all files associated with a specific manual compound entry

### Method
GET

### Endpoint
/3.0/accounting/manual_entries/{manual_entry_id}/files

### Parameters
#### Path Parameters
- **manual_entry_id** (integer) - Required - The id of the manual_entry

#### Query Parameters
- **limit** (integer) - Optional - Default: 500 - Limit the number of results (max is 2000)
- **offset** (integer) - Optional - Default: 0 - Skip over a number of elements by specifying an offset value for the query

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```
```

--------------------------------

### GET /2.0/timesheet_status

Source: https://docs.bexio.com/

Retrieves a list of all available timesheet statuses.

```APIDOC
## GET /2.0/timesheet_status

### Description
Retrieves a list of all available timesheet statuses.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/timesheet_status

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Can be `id` or `name`. Append `_asc` or `_desc` for sorting direction.
- **limit** (integer) - Optional - Limits the number of results (max is 2000). Default is 500.
- **offset** (integer) - Optional - Skips over a number of elements by specifying an offset value for the query. Default is 0.

#### Header Parameters
- **Accept** (string) - Required - Specifies the desired response format, e.g., `application/json`.

### Request Example
```bash
curl -X GET \
  https://api.bexio.com/2.0/timesheet_status \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- A list of timesheet status objects, each containing:
  - **id** (integer) - The ID of the timesheet status.
  - **name** (string) - The name of the timesheet status.
```

--------------------------------

### Payment list response structure

Source: https://docs.bexio.com/

Example JSON response for a successful payment list retrieval.

```JSON
{
  "id": 0,
  "uuid": "string",
  "sender": {
    "id": 0,
    "uuid": "string",
    "iban": "string"
},
  "recipient": {
    "name": "John Doe / John Doe Company Name",
    "iban": "CH3000784295116252003",
    "address": {
      "street_name": "Föhrenstrasse",
      "house_number": "34",
      "zip": "5003",
      "city": "Zürich",
      "country_code": "CH"
}
},
  "amount": "10.5858",
  "currency": "CHF",
  "execution_date": "2022-02-01",
  "allowance": "fee_paid_by_payer",
  "is_salary": false,
  "instruction_id": "string",
  "purchase_reference": {
    "bill_id": "50d9b44e-68b6-43d6-9c5e-0cb4e5e0080c",
    "bill_payment_id": "98f2c638-ee51-4159-9c26-27958d8fd6be"
},
  "document_no": "0000044",
  "qr_reference_number": "RF95000000000000000000011 / CH4431999123000889012",
  "additional_information": "string",
  "status": "open",
  "type": "iban",
  "due_date": "2022-02-01",
  "created_at": "string",
  "is_editing_restricted": false
}
```

--------------------------------

### GET /2.0/country

Source: https://docs.bexio.com/

Fetches a list of all countries with optional sorting and limiting.

```APIDOC
## GET /2.0/country

### Description
This action fetches a list of all countries.

### Method
GET

### Endpoint
/2.0/country

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. `_asc` and `_desc` can be appended to any parameter to either sort ascending (default) or descending. Enum: "id" "name" "name_short" Example: order_by=name
- **limit** (integer) - Optional - Limit the number of results (max is 2000). Example: limit=20
- **offset** (integer) - Optional - Skip over a number of elements by specifying an offset value for the query. Example: offset=0

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/2.0/country \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **id** (integer) - Description
- **name** (string) - Description
- **name_short** (string) - Description
- **iso3166_alpha2** (string) - Description

#### Response Example
```json
[
  {
    "id": 1,
    "name": "Kiribati",
    "name_short": "KI",
    "iso3166_alpha2": "KI"
  }
]
```
```

--------------------------------

### GET /2.0/note/{note_id}

Source: https://docs.bexio.com/

Fetches a single note by its unique identifier.

```APIDOC
## GET /2.0/note/{note_id}

### Description
This action fetches a single note.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/note/{note_id}

### Parameters
#### Path Parameters
- **note_id** (integer) - Required - The id of the note

### Response
#### Success Response (200)
- **id** (integer) - Note ID
- **user_id** (integer) - User ID
- **event_start** (string) - Event start timestamp
- **subject** (string) - Note subject
- **info** (string) - Note information
- **contact_id** (integer) - Contact ID
- **project_id** (integer) - Project ID
- **entry_id** (integer) - Entry ID
- **module_id** (integer) - Module ID
```

--------------------------------

### GET /kb_invoice/{invoice_id}/payment

Source: https://docs.bexio.com/

Fetches a list of all payments for the invoice.

```APIDOC
## GET /kb_invoice/{invoice_id}/payment

### Description
This action fetches a list of all payments for the invoice.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The id of the invoice

#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max 2000)
- **offset** (integer) - Optional - Skip over a number of elements

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **OK** - Returns the list of payments
```

--------------------------------

### List Project Milestones Response

Source: https://docs.bexio.com/

Example JSON response body for a successful milestone list retrieval.

```json
[
  {
    "id": 4,
    "name": "project documentation",
    "end_date": "2018-05-18",
    "comment": "Finish project documentation.",
    "pr_parent_milestone_id": 3
  }
]
```

--------------------------------

### POST /2.0/kb_order

Source: https://docs.bexio.com/

Creates a new order in the system.

```APIDOC
## POST /2.0/kb_order

### Description
This action creates a new order.

### Method
POST

### Endpoint
/2.0/kb_order

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Must be set to "application/json".
```

--------------------------------

### GET /3.0/fictional_users/{fictional_user_id}

Source: https://docs.bexio.com/

Fetches a single fictional user by their ID.

```APIDOC
## GET /3.0/fictional_users/{fictional_user_id}

### Description
Fetches a single fictional user.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/fictional_users/{fictional_user_id}

### Path Parameters
- **fictional_user_id** (integer) - Required - The ID of the fictional user. Example: 4

### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Responses
#### Success Response (200)
OK
- **id** (integer) - The unique identifier for the fictional user.
- **salutation_type** (string) - The salutation type (e.g., 'male', 'female').
- **firstname** (string) - The first name of the fictional user.
- **lastname** (string) - The last name of the fictional user.
- **email** (string) - The email address of the fictional user.
- **title_id** (integer) - A reference to a title.

### Response Example (200)
```json
{
  "id": 4,
  "salutation_type": "male",
  "firstname": "Rudolph",
  "lastname": "Smith",
  "email": "rudolph.smith@bexio.com",
  "title_id": null
}
```
```

--------------------------------

### GET /2.0/company_profile

Source: https://docs.bexio.com/

Fetches a list of company profiles associated with the account.

```APIDOC
## GET /2.0/company_profile

### Description
Fetches a list of company profiles. Note that each account currently has only one company profile.

### Method
GET

### Endpoint
/2.0/company_profile

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- OK
```

--------------------------------

### GET /2.0/stock_place

Source: https://docs.bexio.com/

Fetches a list of all stock areas. Supports sorting and pagination.

```APIDOC
## GET /2.0/stock_place

### Description
Fetches a list of all stock areas. Supports sorting and pagination.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/stock_place

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Default: "id". Enum: "id" "name". Multiple sort parameters can be combined by using a comma separator. `_asc` and `_desc` can be appended to any parameter to either sort ascending (default) or descending.
- **limit** (integer) - Optional - Limits the number of results (max is 2000). Default: 500.
- **offset** (integer) - Optional - Skips over a number of elements by specifying an offset value for the query. Default: 0.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Description of the stock area ID
- **name** (string) - Description of the stock area name

#### Response Example
```json
[
  {
    "id": 1,
    "name": "Shelf A-06"
  }
]
```
```

--------------------------------

### GET /2.0/article/{article_id}

Source: https://docs.bexio.com/

Fetches a single article by its unique identifier.

```APIDOC
## GET /2.0/article/{article_id}

### Description
This action fetches a single item by its ID.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/article/{article_id}

### Parameters
#### Path Parameters
- **article_id** (integer) - Required - The id of the item

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The article ID
- **intern_code** (string) - Internal code of the article
- **intern_name** (string) - Internal name of the article
```

--------------------------------

### GET /2.0/kb_order

Source: https://docs.bexio.com/

Retrieves a list of KB orders with support for filtering, sorting, and pagination.

```APIDOC
## GET /2.0/kb_order

### Description
Retrieves a list of KB orders. Supports sorting, limiting the number of results, and offsetting.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/kb_order

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Default: "id".
- **limit** (integer) - Optional - Limit the number of results (max 2000). Default: 500.
- **offset** (integer) - Optional - Skip over a number of elements. Default: 0.

#### Header Parameters
- **Accept** (string) - Required - Must be set to "application/json".

### Response
#### Success Response (200)
- **id** (integer) - Order ID
- **document_nr** (string) - Document number
- **total** (string) - Total amount

#### Response Example
[
  {
    "id": 4,
    "document_nr": "AU-00001",
    "total": "19.150000"
  }
]
```

--------------------------------

### GET /2.0/kb_invoice/{invoice_id}/kb_reminder

Source: https://docs.bexio.com/

Fetches a list of all reminders for a specified invoice.

```APIDOC
## GET /2.0/kb_invoice/{invoice_id}/kb_reminder

### Description
This action fetches a list of all reminders for the invoice.

### Method
GET

### Endpoint
/2.0/kb_invoice/{invoice_id}/kb_reminder

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The id of the invoice.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
(Response structure for reminders not detailed in the provided text, but typically would be an array of reminder objects.)

#### Response Example
(Example response not detailed in the provided text.)
```

--------------------------------

### GET /3.0/currencies/{currency_id}

Source: https://docs.bexio.com/

Fetches details for a specific currency by ID.

```APIDOC
## GET /3.0/currencies/{currency_id}

### Description
Fetches a single currency by its ID.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/currencies/{currency_id}

### Parameters
#### Path Parameters
- **currency_id** (integer) - Required - The ID of the currency

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Currency ID
- **name** (string) - Currency name
- **round_factor** (number) - Rounding factor

#### Response Example
{
  "id": 1,
  "name": "CHF",
  "round_factor": 0.05
}
```

--------------------------------

### Get Single File Response

Source: https://docs.bexio.com/

JSON response containing the metadata of the requested file.

```json
{
  "id": 1,
  "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",
  "name": "screenshot",
  "size_in_bytes": 218476,
  "extension": "png",
  "mime_type": "image/png",
  "uploader_email": "contact@example.org",
  "user_id": 1,
  "is_archived": false,
  "source_id": 2,
  "source_type": "web",
  "is_referenced": false,
  "created_at": "2018-06-09T08:52:10+00:00"
}
```

--------------------------------

### GET /2.0/kb_delivery/{delivery_id}

Source: https://docs.bexio.com/

Fetches the details of a single delivery by its ID.

```APIDOC
## GET /2.0/kb_delivery/{delivery_id}

### Description
This action fetches a single delivery.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/kb_delivery/{delivery_id}

### Parameters
#### Path Parameters
- **delivery_id** (integer) - Required - The id of the delivery

#### Header Parameters
- **Accept** (string) - Required - Example: application/json
```

--------------------------------

### GET /2.0/kb_order/{order_id}

Source: https://docs.bexio.com/

Fetches a single order by its unique identifier.

```APIDOC
## GET /2.0/kb_order/{order_id}

### Description
This action fetches a single order.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/kb_order/{order_id}

### Parameters
#### Path Parameters
- **order_id** (integer) - Required - The id of the order

#### Header Parameters
- **Accept** (string) - Required - application/json

### Request Example
curl -X GET \
  https://api.bexio.com/2.0/kb_order/{order_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

### Response
#### Success Response (200)
- **id** (integer) - Order ID
- **document_nr** (string) - Document number
- **total** (string) - Total amount

#### Response Example
{
  "id": 4,
  "document_nr": "AU-00001",
  "total": "19.150000"
}
```

--------------------------------

### Fetch Reminders via cURL

Source: https://docs.bexio.com/

Example request to retrieve a list of reminders for an invoice using cURL.

```bash
curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Sample JSON Response for Purchase Order

Source: https://docs.bexio.com/

This is an example of a successful JSON response when retrieving purchase order data. It includes detailed fields for a single purchase order.

```json
[
  {
    "id": 1,
    "document_nr": "RE-00001",
    "kb_payment_template_id": 1,
    "payment_type_id": 1,
    "title": "purchase order example title",
    "contact_id": 14,
    "contact_sub_id": 1,
    "template_slug": "581a8010821e01426b8b456b",
    "user_id": 1,
    "project_id": 1,
    "logopaper_id": 1,
    "language": {
      "id": 1,
      "name": "Deutsch",
      "decimalpoint": ".",
      "thousandsseparator": "'",
      "iso_639_1": "de",
      "date_format": "d.m.Y"
    },
    "language_id": 1,
    "bank_account_id": 1,
    "currency": {
      "id": 1,
      "name": "CHF",
      "round_factor": 0.05
    },
    "currency_id": 1,
    "header": "We would like to order the following products:",
    "footer": "Many thanks for the fast processing of our order.",
    "total_rounding_difference": -0.02,
    "mwst_type": "included",
    "mwst_is_net": true,
    "is_compact_view": false,
    "show_position_taxes": false,
    "salesman_user_id": 1,
    "is_valid_from": "2019-06-24",
    "is_valid_to": "2019-07-24",
    "delivery_address_type": "contact_address",
    "contact_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",
    "delivery_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",
    "nb_decimals_amount": 2,
    "nb_decimals_price": 2,
    "kb_item_status_id": 22,
    "terms_of_payment_text": "Payable within 30 days",
    "reference": "Based on Quote Q-3860",
    "api_reference": null,
    "mail": "support@bexio.com",
    "viewed_by_client_at": "2020-07-24",
    "is_valid_until": "2019-07-24",
    "created_at": "2020-04-28T19:58:58+00:00",
    "updated_at": "2020-04-30T19:58:58+00:00",
    "custom_translations": { },
    "date_format": "d.m.Y"
}

]
```

--------------------------------

### Bank account response structure

Source: https://docs.bexio.com/

Example JSON response for a successful bank account retrieval.

```JSON
{
  "id": 4,
  "name": "UBS",
  "owner": "Metzgerei Schneider",
  "owner_address": "Alte Jonastrasse 10",
  "owner_house_number": 10,
  "owner_zip": 8640,
  "owner_city": "Rapperswil",
  "owner_country_code": "CH",
  "bc_nr": 250,
  "bank_name": "UBS Switzerland AG",
  "bank_nr": "UBSWCHZH86M",
  "bank_account_nr": "25010367101Y",
  "iban_nr": "CH560025025010367101Y",
  "currency_id": 1,
  "account_id": 77,
  "remarks": "This is an additional description",
  "invoice_mode": "qr_invoice",
  "qr_invoice_iban": "CH4431999123000889012",
  "type": "bank"
}
```

--------------------------------

### KB Order Response Sample

Source: https://docs.bexio.com/

This is a sample JSON response for a KB order. It includes details such as order ID, document number, contact information, and financial totals. Note the structure of the `taxs` array.

```json
[
  * {
    * "id": 4,
    * "document_nr": "AU-00001",
    * "title": null,
    * "contact_id": 14,
    * "contact_sub_id": null,
    * "user_id": 1,
    * "project_id": null,
    * "logopaper_id": 1,
    * "language_id": 1,
    * "bank_account_id": 1,
    * "currency_id": 1,
    * "payment_type_id": 1,
    * "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
    * "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
    * "total_gross": "17.800000",
    * "total_net": "17.800000",
    * "total_taxes": "1.3706",
    * "total": "19.150000",
    * "total_rounding_difference": -0.02,
    * "mwst_type": 0,
    * "mwst_is_net": true,
    * "show_position_taxes": false,
    * "is_valid_from": "2019-06-24",
    * "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
    * "delivery_address_type": 0,
    * "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
    * "kb_item_status_id": 5,
    * "is_recurring": false,
    * "api_reference": null,
    * "viewed_by_client_at": null,
    * "updated_at": "2019-04-08 13:17:32",
    * "template_slug": "581a8010821e01426b8b456b",
    * "taxs": [
      * {
        * "percentage": "7.70",
        * "value": "1.3706"
}
],
    * "network_link": ""
}

]
```

--------------------------------

### Retrieve a Payment via cURL

Source: https://docs.bexio.com/

Example command to fetch a specific payment by its UUID using a bearer token.

```bash
curl -X GET \
  https://api.bexio.com/4.0/banking/payments/{payment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id}

Source: https://docs.bexio.com/

Fetches a file associated with a specific manual entry line. This is applicable only for entry types manual_single_entry and manual_group_entry.

```APIDOC
## Fetch file of manual entry line

### Description
This action fetches a file associated to a specific manual entry line (only for entry types manual_single_entry and manual_group_entry)

### Method
GET

### Endpoint
/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id}

### Parameters
#### Path Parameters
- **manual_entry_id** (integer) - Required - The id of the manual_entry
- **entry_id** (integer) - Required - The id of a single entry in the manual_entry object
- **file_id** (integer) - Required - The id of the file

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
OK
- **id** (integer) - Description
- **uuid** (string) - Description
- **name** (string) - Description
- **size_in_bytes** (integer) - Description
- **extension** (string) - Description
- **mime_type** (string) - Description
- **uploader_email** (string) - Description
- **user_id** (integer) - Description
- **is_archived** (boolean) - Description
- **source_id** (integer) - Description
- **source_type** (string) - Description
- **is_referenced** (boolean) - Description
- **created_at** (string) - Description

#### Response Example
```json
{
  "id": 1,
  "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",
  "name": "screenshot",
  "size_in_bytes": 218476,
  "extension": "png",
  "mime_type": "image/png",
  "uploader_email": "contact@example.org",
  "user_id": 1,
  "is_archived": false,
  "source_id": 2,
  "source_type": "web",
  "is_referenced": false,
  "created_at": "2018-06-09T08:52:10+00:00",
  "data": "iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAIAAADTED8xAAAACXBIWXMAAABIAAAASABGyWs+AAACu0lEQVR42u3TAQkAMBDEsHuYf80T0oRa6G07qdrbDbIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYC0DxplBfxP7XIvAAAAAElFTkSuQmCC"
}
```

--------------------------------

### GET /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/pdf

Source: https://docs.bexio.com/

Returns a PDF document of the invoice reminder.

```APIDOC
## GET /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/pdf

### Description
Returns a PDF document of the invoice reminder.

### Method
GET

### Endpoint
/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/pdf

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The ID of the invoice.
- **reminder_id** (integer) - Required - The ID of the reminder.

#### Query Parameters
- **logo** (integer) - Optional - Enum: 0 1 - Whether the PDF should be generated using the letterhead, or not.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **name** (string) - The name of the PDF file.
- **size** (integer) - The size of the PDF file in bytes.
- **mime** (string) - The MIME type of the file (should be application/pdf).
- **content** (string) - The base64 encoded content of the PDF file.

#### Response Example
```json
{
  "name": "document-00005.pdf",
  "size": 9768,
  "mime": "application/pdf",
  "content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="
}
```
```

--------------------------------

### Retrieve Expense via cURL

Source: https://docs.bexio.com/

Example command to fetch an expense by its ID using an authorization token.

```bash
curl -X GET \
  https://api.bexio.com/4.0/expenses/{id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /3.0/accounting/business_years/{business_year_id}

Source: https://docs.bexio.com/

Fetches a single business year by its ID.

```APIDOC
## GET /3.0/accounting/business_years/{business_year_id}

### Description
Fetches a single business year by its ID.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/accounting/business_years/{business_year_id}

### Parameters
#### Path Parameters
- **business_year_id** (integer) - Required - The ID of the business year

### Response
#### Success Response (200)
- **id** (integer) - Business year ID
- **start** (string) - Start date
- **end** (string) - End date
- **status** (string) - Status of the year
- **closed_at** (string) - Date closed
```

--------------------------------

### GET /2.0/kb_offer/{quote_id}

Source: https://docs.bexio.com/

Fetch the details of a specific quote by its unique identifier.

```APIDOC
## GET /2.0/kb_offer/{quote_id}

### Description
Fetches a single quote by its ID.

### Method
GET

### Endpoint
/2.0/kb_offer/{quote_id}

### Parameters
#### Path Parameters
- **quote_id** (integer) - Required - The ID of the quote

#### Header Parameters
- **Accept** (string) - Required - application/json

### Request Example
curl -X GET \
  https://api.bexio.com/2.0/kb_offer/{quote_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

### Response
#### Success Response (200)
- **id** (integer) - Quote ID
- **document_nr** (string) - Document number
- **total** (string) - Total amount
- **positions** (array) - List of quote positions
```

--------------------------------

### GET /2.0/contact_relation

Source: https://docs.bexio.com/

Retrieves a list of all contact relations.

```APIDOC
## GET /2.0/contact_relation

### Description
Retrieves a list of all contact relations.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/contact_relation

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Default: "id".
- **limit** (integer) - Optional - Limit the number of results (max 2000). Default: 500.
- **offset** (integer) - Optional - Skip over a number of elements. Default: 0.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Relation ID
- **contact_id** (integer) - Contact ID
- **contact_sub_id** (integer) - Contact Sub ID
- **description** (string) - Description
- **updated_at** (string) - Last update timestamp

#### Response Example
[
  {
    "id": 1,
    "contact_id": 2,
    "contact_sub_id": 3,
    "description": "",
    "updated_at": "2019-04-08 13:17:32"
  }
]
```

--------------------------------

### Create Subtotal Position Response

Source: https://docs.bexio.com/

Example response structure returned after successfully creating a subtotal position.

```json
[
  {
    "id": 1,
    "text": "Subtotal",
    "value": "17.800000",
    "internal_pos": 1,
    "is_optional": false,
    "type": "KbPositionSubtotal",
    "parent_id": null
  }
]
```

--------------------------------

### GET /2.0/kb_order/{order_id}/repetition

Source: https://docs.bexio.com/

Fetches the repetition details for a specific order.

```APIDOC
## GET /2.0/kb_order/{order_id}/repetition

### Description
This action fetches an order repetition.

### Method
GET

### Endpoint
/2.0/kb_order/{order_id}/repetition

### Parameters
#### Path Parameters
- **order_id** (integer) - Required - The ID of the order. Example: 1

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_order/{order_id}/repetition \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **start** (string) - The start date of the repetition (YYYY-MM-DD).
- **end** (string) - The end date of the repetition (YYYY-MM-DD).
- **repetition** (object) - An object defining the repetition pattern.
  - **type** (string) - The type of repetition (e.g., 'daily', 'weekly', 'monthly', 'yearly').
  - **interval** (integer) - The interval for the repetition.

#### Response Example
```json
{
  "start": "2019-01-01",
  "end": "2019-12-31",
  "repetition": {
    "type": "daily",
    "interval": 1
  }
}
```
```

--------------------------------

### Fetch Titles Response Sample

Source: https://docs.bexio.com/

This is a sample JSON response containing a list of titles.

```json
[
  {
    "id": 1,
    "name": "Dr."
}

]
```

--------------------------------

### GET /3.0/accounting/vat_periods/{vat_period_id}

Source: https://docs.bexio.com/

Fetches a single VAT period by its ID.

```APIDOC
## GET /3.0/accounting/vat_periods/{vat_period_id}

### Description
This action fetches a single vat period.

### Method
GET

### Endpoint
/3.0/accounting/vat_periods/{vat_period_id}

### Parameters
#### Path Parameters
- **vat_period_id** (integer) - Required - The id of the vat_period

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **id** (integer) - The id of the vat period
- **start** (string) - Start date
- **end** (string) - End date
- **type** (string) - Period type
- **status** (string) - Status
- **closed_at** (string) - Closing timestamp
```

--------------------------------

### Retrieve Quote Response Sample

Source: https://docs.bexio.com/

Example JSON response structure for a successful quote retrieval.

```json
{
  "id": 4,
  "document_nr": "AN-00001",
  "title": null,
  "contact_id": 14,
  "contact_sub_id": null,
  "user_id": 1,
  "project_id": null,
  "logopaper_id": 1,
  "language_id": 1,
  "bank_account_id": 1,
  "currency_id": 1,
  "payment_type_id": 1,
  "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
  "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
  "total_gross": "17.800000",
  "total_net": "17.800000",
  "total_taxes": "1.3706",
  "total": "19.150000",
  "total_rounding_difference": -0.02,
  "mwst_type": 0,
  "mwst_is_net": true,
  "show_position_taxes": false,
  "is_valid_from": "2019-06-24",
  "is_valid_until": "2019-07-24",
  "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
  "delivery_address_type": 0,
  "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
  "kb_item_status_id": 3,
  "api_reference": null,
  "viewed_by_client_at": null,
  "kb_terms_of_payment_template_id": null,
  "show_total": true,
  "updated_at": "2019-04-08 13:17:32",
  "template_slug": "581a8010821e01426b8b456b",
  "taxs": [
    {
      "percentage": "7.70",
      "value": "1.3706"
    }
  ],
  "network_link": "",
  "positions": [
    {
      "id": 1,
      "amount": "5.000000",
      "amount_reserved": "5.000000",
      "amount_open": "5.000000",
      "amount_completed": "5.000000",
      "unit_id": 1,
      "account_id": 1,
      "unit_name": "kg",
      "tax_id": 4,
      "tax_value": "7.70",
      "text": "Apples",
      "unit_price": "3.560000",
      "discount_in_percent": "0.000000",
      "position_total": "17.800000",
      "pos": 1,
      "internal_pos": 1,
      "is_optional": null,
      "type": "KbPositionCustom",
      "parent_id": null
    }
  ]
}
```

--------------------------------

### GET /3.0/currencies/{currency_id}/exchange_rates

Source: https://docs.bexio.com/

Fetches exchange rates for a specific currency.

```APIDOC
## GET /3.0/currencies/{currency_id}/exchange_rates

### Description
Fetches all configured exchange rates for a given currency.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/currencies/{currency_id}/exchange_rates

### Parameters
#### Path Parameters
- **currency_id** (integer) - Required - The ID of the currency

#### Query Parameters
- **date** (date) - Optional - The validity date for the exchange rate

### Response
#### Success Response (200)
- **OK** - Returns exchange rate data
```

--------------------------------

### Search Quotes Response Sample

Source: https://docs.bexio.com/

Example of a successful response when searching for quotes, detailing quote information.

```json
[
  {
    "id": 4,
    "document_nr": "AN-00001",
    "title": null,
    "contact_id": 14,
    "contact_sub_id": null,
    "user_id": 1,
    "project_id": null,
    "logopaper_id": 1,
    "language_id": 1,
    "bank_account_id": 1,
    "currency_id": 1,
    "payment_type_id": 1,
    "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
    "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
    "total_gross": "17.800000",
    "total_net": "17.800000",
    "total_taxes": "1.3706",
    "total": "19.150000",
    "total_rounding_difference": -0.02,
    "mwst_type": 0,
    "mwst_is_net": true,
    "show_position_taxes": false,
    "is_valid_from": "2019-06-24",
    "is_valid_until": "2019-07-24",
    "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
    "delivery_address_type": 0,
    "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
    "kb_item_status_id": 3,
    "api_reference": null,
    "viewed_by_client_at": null,
    "kb_terms_of_payment_template_id": null,
    "show_total": true,
    "updated_at": "2019-04-08 13:17:32",
    "template_slug": "581a8010821e01426b8b456b",
    "taxs": [
      {
        "percentage": "7.70",
        "value": "1.3706"
}
],
    "network_link": ""
}
]
```

--------------------------------

### Fetch Project Statuses

Source: https://docs.bexio.com/

Retrieves a list of available project statuses.

```bash
curl -X GET \
  https://api.bexio.com/2.0/pr_project_state \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /3.0/accounting/calendar_years/{calendar_year_id}

Source: https://docs.bexio.com/

Fetches a single calendar year by its ID.

```APIDOC
## GET /3.0/accounting/calendar_years/{calendar_year_id}

### Description
Fetches a single calendar year by its ID.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/accounting/calendar_years/{calendar_year_id}

### Parameters
#### Path Parameters
- **calendar_year_id** (integer) - Required - The ID of the calendar year

#### Header Parameters
- **Accept** (string) - Required - Expected response format (e.g., application/json)

### Response
#### Success Response (200)
- **id** (integer) - Calendar year ID
- **start** (string) - Start date
- **end** (string) - End date
- **is_vat_subject** (boolean) - VAT subject status
- **is_annual_reporting** (boolean) - Annual reporting status
- **created_at** (string) - Creation timestamp
- **updated_at** (string) - Last update timestamp
- **vat_accounting_method** (string) - VAT accounting method
- **vat_accounting_type** (string) - VAT accounting type
```

--------------------------------

### POST /3.0/currencies

Source: https://docs.bexio.com/

Creates a new currency in the system.

```APIDOC
## POST /3.0/currencies

### Description
Creates a new currency.

### Method
POST

### Endpoint
https://api.bexio.com/3.0/currencies

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **name** (string) - Required - ISO 4217 format, max 80 chars
- **round_factor** (number) - Required - Rounding factor

### Response
#### Success Response (201)
- **id** (integer) - Created currency ID
- **name** (string) - Currency name
- **round_factor** (number) - Rounding factor

#### Response Example
{
  "id": 1,
  "name": "CHF",
  "round_factor": 0.05
}
```

--------------------------------

### GET /accounting/manual_entries/next_ref_nr

Source: https://docs.bexio.com/

Retrieves the next available reference number for a manual entry.

```APIDOC
## GET /accounting/manual_entries/next_ref_nr

### Description
Retrieves the next reference number for a manual entry.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/accounting/manual_entries/next_ref_nr

### Response
#### Success Response (200)
- **next_ref_nr** (string) - The next reference number.

#### Response Example
{
  "next_ref_nr": "Booking BA-22"
}
```

--------------------------------

### GET /3.0/purchase_orders/{purchase_order_id}

Source: https://docs.bexio.com/

Fetches a single purchase order by its unique identifier.

```APIDOC
## GET /3.0/purchase_orders/{purchase_order_id}

### Description
This action fetches a single purchase order.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/purchase_orders/{purchase_order_id}

### Parameters
#### Path Parameters
- **purchase_order_id** (integer) - Required - The id of the purchase order

### Response
#### Success Response (200)
- **id** (integer) - Purchase order ID
- **document_nr** (string) - Document number
- **title** (string) - Title of the purchase order
- **contact_id** (integer) - Associated contact ID
- **created_at** (string) - Creation timestamp
- **updated_at** (string) - Last update timestamp

#### Response Example
{
  "id": 1,
  "document_nr": "RE-00001",
  "title": "purchase order example title",
  "contact_id": 14
}
```

--------------------------------

### GET /2.0/kb_invoice/{invoice_id}

Source: https://docs.bexio.com/

Fetches the details of a single invoice by its unique identifier.

```APIDOC
## GET /2.0/kb_invoice/{invoice_id}

### Description
This action fetches a single invoice by its ID.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/kb_invoice/{invoice_id}

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The id of the invoice

#### Header Parameters
- **Accept** (string) - Required - application/json

### Request Example
curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

### Response
#### Success Response (200)
- **invoice** (object) - The full details of the requested invoice.

#### Response Example
{
  "id": 4,
  "document_nr": "RE-00001",
  "total": "19.150000"
}
```

--------------------------------

### GET /4.0/expenses/{id}

Source: https://docs.bexio.com/

Retrieves the details of a specific expense by its ID.

```APIDOC
## GET /4.0/expenses/{id}

### Description
Retrieves an expense by its unique identifier.

### Method
GET

### Endpoint
https://api.bexio.com/4.0/expenses/{id}

### Parameters
#### Path Parameters
- **id** (string, uuid) - Required - The ID of the expense to retrieve.

### Response
#### Success Response (200)
- **id** (string) - Expense ID
- **document_no** (string) - Document number
- **title** (string) - Title of the expense
- **status** (string) - Current status

### Response Example
{
  "id": "759b0915-4787-4151-9a81-6e7499d26bee",
  "document_no": "123",
  "title": "Some Title",
  "status": "DRAFT"
}
```

--------------------------------

### Search Salutation Response Sample

Source: https://docs.bexio.com/

This is a sample JSON response when a salutation is successfully found.

```json
[
  {
    "id": 1,
    "name": "Herr"
}

]
```

--------------------------------

### GET /2.0/contact/{contact_id}

Source: https://docs.bexio.com/

Fetches a single contact by its unique identifier.

```APIDOC
## GET /2.0/contact/{contact_id}

### Description
This action fetches a single contact by its ID.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/contact/{contact_id}

### Parameters
#### Path Parameters
- **contact_id** (integer) - Required - The id of the contact

#### Query Parameters
- **show_archived** (boolean) - Optional - Show archived elements only (Default: false)

#### Header Parameters
- **Accept** (string) - Required - Expected response format (e.g., application/json)

### Request Example
curl -X GET \
  https://api.bexio.com/2.0/contact/{contact_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

### Response
#### Success Response (200)
- **id** (integer) - Contact ID
- **name_1** (string) - Contact name
- **city** (string) - City
- **updated_at** (string) - Last update timestamp
```

--------------------------------

### GET /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}

Source: https://docs.bexio.com/

Fetches a specific invoice reminder by its ID.

```APIDOC
## GET /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}

### Description
This action fetches a specific reminder.

### Method
GET

### Endpoint
/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The ID of the invoice.
- **reminder_id** (integer) - Required - The ID of the reminder.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Description
- **kb_invoice_id** (integer) - Description
- **title** (string) - Description
- **is_valid_from** (string) - Description
- **is_valid_to** (string) - Description
- **reminder_period_in_days** (integer) - Description
- **reminder_level** (integer) - Description
- **show_positions** (boolean) - Description
- **remaining_price** (string) - Description
- **received_total** (string) - Description
- **is_sent** (boolean) - Description
- **header** (null) - Description
- **footer** (null) - Description

#### Response Example (200)
```json
{
  "id": 4,
  "kb_invoice_id": 1,
  "title": "First reminder",
  "is_valid_from": "2019-06-24",
  "is_valid_to": "2019-07-24",
  "reminder_period_in_days": 14,
  "reminder_level": 1,
  "show_positions": true,
  "remaining_price": "17.8000",
  "received_total": "0.0000",
  "is_sent": false,
  "header": null,
  "footer": null
}
```
```

--------------------------------

### GET /4.0/purchase/documentnumbers/bills

Source: https://docs.bexio.com/

Endpoint for retrieving validation for a document number.

```APIDOC
## GET /4.0/purchase/documentnumbers/bills

### Description
Endpoint for retrieving validation for document number.

### Method
GET

### Endpoint
/4.0/purchase/documentnumbers/bills

### Query Parameters
- **document_no** (string) - Required - Document number to validate. Max length: 255 characters.

### Responses
#### Success Response (200)
- **valid** (boolean) - Indicates if the document number is valid.
- **next_available_no** (string) - The next available document number if the provided one is invalid.

#### Error Responses
- **400** - Bad request
- **401** - Access token is missing or is invalid
- **403** - No access rights

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/4.0/purchase/documentnumbers/bills \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response Example (200)
```json
{
  "valid": false,
  "next_available_no": "AB-1235"
}
```
```

--------------------------------

### Fetch Files of Manual Entry Line

Source: https://docs.bexio.com/

Use this cURL command to fetch a list of all files associated with a specific manual entry line. You need to provide the `manual_entry_id` and `entry_id`. Optional `limit` and `offset` query parameters can be used.

```cURL
curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Search Payment Types (cURL)

Source: https://docs.bexio.com/

Example of how to search for payment types using cURL. This request includes a JSON payload to specify search criteria.

```json
[
  {
    "field": "search_field",
    "value": "search term",
    "criteria": "="
}
]
```

```bash
curl -X POST \
  https://api.bexio.com/2.0/payment_type/search \
  -H 'Accept: application/json' \
  -H 'Content-Type: application/json' \
  -d '[
  {
    "field": "search_field",
    "value": "search term",
    "criteria": "="
}
]'
```

--------------------------------

### GET /2.0/contact_group/{contact_group_id}

Source: https://docs.bexio.com/

Fetches a single contact group by its ID.

```APIDOC
## GET /2.0/contact_group/{contact_group_id}

### Description
Fetches a single contact group by its ID.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/contact_group/{contact_group_id}

### Path Parameters
- **contact_group_id** (integer) - Required - The ID of the contact group.

### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The ID of the contact group.
- **name** (string) - The name of the contact group.

#### Response Example
```json
{
  "id": 1,
  "name": "Suppliers"
}
```
```

--------------------------------

### Calendar Year Response Sample

Source: https://docs.bexio.com/

This is a sample JSON response for a successfully created or fetched calendar year. It includes details like start and end dates, VAT applicability, and accounting methods.

```json
[
  {
    "id": 1,
    "start": "2018-01-01",
    "end": "2018-12-31",
    "is_vat_subject": true,
    "is_annual_reporting": false,
    "created_at": "2017-04-28T19:58:58+00:00",
    "updated_at": "2018-04-30T19:58:58+00:00",
    "vat_accounting_method": "effective",
    "vat_accounting_type": "agreed"
}

]
```

--------------------------------

### GET /2.0/contact

Source: https://docs.bexio.com/

Fetches a list of all contacts with support for sorting, pagination, and filtering.

```APIDOC
## GET /2.0/contact

### Description
This action fetches a list of all contacts.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/contact

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Default: "id".
- **limit** (integer) - Optional - Limit the number of results (max 2000). Default: 500.
- **offset** (integer) - Optional - Skip over a number of elements. Default: 0.
- **show_archived** (boolean) - Optional - Show archived elements only. Default: false.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
curl -X GET https://api.bexio.com/2.0/contact -H 'Accept: application/json' -H 'Authorization: Bearer {access-token}'

### Response
#### Success Response (200)
- **id** (integer) - Contact ID
- **name_1** (string) - Contact name
- **updated_at** (string) - Last update timestamp

#### Response Example
[
  {
    "id": 4,
    "name_1": "Example Company",
    "updated_at": "2019-04-08 13:17:32"
  }
]
```

--------------------------------

### GET /4.0/expenses

Source: https://docs.bexio.com/

Retrieves a list of expenses with various filtering and sorting options.

```APIDOC
## GET /4.0/expenses

### Description
Retrieves a list of expenses. Supports filtering by vendor, dates, amounts, and more, as well as sorting and pagination.

### Method
GET

### Endpoint
https://api.bexio.com/4.0/expenses

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Default: 100 - Maximum number of results per page.
- **page** (integer) - Optional - Default: 1 - Current page number.
- **order** (string) - Optional - Default: "asc" - Sorting order ('asc' or 'desc').
- **sort** (string) - Optional - Field to sort by (e.g., 'document_no').
- **vendor** (string) - Optional - Filter for Expense 'vendor', matching text in 'lastname_company' and 'firstname_suffix'.
- **gross_min** (number) - Optional - Filter for Expense 'gross', the lowest accepted value.
- **gross_max** (number) - Optional - Filter for Expense 'gross', the greatest accepted value.
- **net_min** (number) - Optional - Filter for Expense 'net', the lowest accepted value.
- **net_max** (number) - Optional - Filter for Expense 'net', the greatest accepted value.
- **paid_on_start** (string) - Optional - Filter for Expense 'paid_on', the earliest accepted date (YYYY-MM-DD).
- **paid_on_end** (string) - Optional - Filter for Expense 'paid_on', the latest accepted date (YYYY-MM-DD).
- **created_at_start** (string) - Optional - Filter for Expense 'created_at', the earliest accepted date-time (YYYY-MM-DDTHH:MM:SS+0000).
- **created_at_end** (string) - Optional - Filter for Expense 'created_at', the latest accepted date-time (YYYY-MM-DDTHH:MM:SS+0000).
- **title** (string) - Optional - Filter for Expense 'title', matching text in the field.
- **currency_code** (string) - Optional - Filter for Expense 'currency_code', matching text in the field.
- **document_no** (string) - Optional - Filter for Expense 'document_no', matching text in the field.
- **supplier_id** (integer) - Optional - Filter for Expense 'supplier_id'.
- **project_id** (string) - Optional - Filter for Expense 'project_id' (UUID format).

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/4.0/expenses?limit=10&page=1&vendor=Bexio%20AG \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
Expenses retrieved successfully.
- **data** (array) - An array of expense objects.
- **paging** (object) - Pagination details.
  - **page** (integer) - Current page number.
  - **page_size** (integer) - Number of items per page.
  - **page_count** (integer) - Total number of pages.
  - **item_count** (integer) - Total number of items.

#### Response Example
```json
{
  "data": [
    {
      "id": "e27be5f4-c8db-4193-92f3-1c6f1dc98f1b",
      "created_at": "2019-03-23T09:53:49+0000",
      "document_no": "NO-1",
      "status": "DRAFT",
      "firstname_suffix": "John",
      "lastname_company": "Doe",
      "vendor": "John Doe",
      "title": "Title 1",
      "currency_code": "CHF",
      "paid_on": "2019-03-07",
      "booking_account_id": 387,
      "net": 26.65,
      "gross": 29.43,
      "project_id": "c14aa91c-b4f5-43ca-ae2a-882f94cd40f4",
      "chargeable_contact_id": 4,
      "transaction_id": "b388a4da-7085-475a-87a0-a2acb4d8d68f",
      "invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",
      "attachment_ids": [
        "60dd4dfa-24a3-4114-a934-108380789edc",
        "a3161942-1b1d-42c1-816d-dc44cd53c7e6"
      ]
    }
  ],
  "paging": {
    "page": 1,
    "page_size": 10,
    "page_count": 50,
    "item_count": 300
  }
}
```

#### Error Responses
- **400**: Bad request
- **401**: Access token is missing or is invalid
- **403**: No access rights
```

--------------------------------

### Search Communication Kinds Response Body

Source: https://docs.bexio.com/

Example response when searching for communication kinds. Returns a list of matching communication kinds.

```json
[
  {
    "id": 1,
    "name": "Mobile Phone"
}

]
```

--------------------------------

### GET /3.0/accounting/journal

Source: https://docs.bexio.com/

Fetches a list of all accounting journal bookings with filtering options.

```APIDOC
## GET /3.0/accounting/journal

### Description
Fetches a list of all accounting journal bookings. This endpoint can be filtered by date range and account UUID.

### Method
GET

### Endpoint
/3.0/accounting/journal

### Parameters
#### Query Parameters
- **from** (string) - Optional - Filters for entries after this date (YYYY-MM-DD).
- **to** (string) - Optional - Filters for entries until this date (YYYY-MM-DD).
- **account_uuid** (string) - Optional - Filters for entries with a specific account UUID.
- **limit** (integer) - Optional - Limits the number of results (max 2000, default 500).
- **offset** (integer) - Optional - Skips over a number of elements by specifying an offset value (default 0).

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/3.0/accounting/journal \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **id** (integer) - The ID of the journal entry.
- **ref_id** (integer) - The reference ID.
- **ref_uuid** (string) - The reference UUID.
- **ref_class** (string) - The reference class.
- **date** (string) - The date of the entry (ISO 8601 format).
- **debit_account_id** (integer) - The ID of the debit account.
- **credit_account_id** (integer) - The ID of the credit account.
- **description** (string) - A description of the entry.
- **amount** (number) - The amount of the entry.
- **currency_id** (integer) - The ID of the currency.
- **currency_factor** (number) - The currency factor.
- **base_currency_id** (integer) - The ID of the base currency.
- **base_currency_amount** (number) - The amount in the base currency.

#### Response Example
```json
[
  {
    "id": 1,
    "ref_id": 13,
    "ref_uuid": "456fc553-f42b-417e-a2af-dd5c5b9bade6",
    "ref_class": "KbInvoice",
    "date": "2019-02-17T00:00:00+02:00",
    "debit_account_id": 77,
    "credit_account_id": 139,
    "description": "Website for client Smith",
    "amount": 328.25,
    "currency_id": 1,
    "currency_factor": 1,
    "base_currency_id": 1,
    "base_currency_amount": 328.25
  }
]
```
```

--------------------------------

### Create Item Position Payload

Source: https://docs.bexio.com/

This is a JSON payload example for creating a custom item position. Ensure all required fields are correctly populated.

```json
{
  "amount": "5.000000",
  "amount_reserved": "5.000000",
  "amount_open": "5.000000",
  "amount_completed": "5.000000",
  "unit_id": 1,
  "account_id": 1,
  "tax_id": 4,
  "text": "Apples",
  "unit_price": "3.560000",
  "discount_in_percent": "0.000000",
  "is_optional": false
}
```

--------------------------------

### GET /2.0/kb_invoice/{invoice_id}/pdf

Source: https://docs.bexio.com/

Retrieves a PDF document of the specified invoice.

```APIDOC
## GET /2.0/kb_invoice/{invoice_id}/pdf

### Description
This action returns a pdf document of the invoice.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/kb_invoice/{invoice_id}/pdf

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The id of the invoice
- **logopaper** (integer) - Optional - Whether the PDF should be generated using the letterhead, or not.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **name** (string) - Filename of the PDF
- **size** (integer) - Size of the file
- **mime** (string) - Mime type
- **content** (string) - Base64 encoded content

#### Response Example
{
  "name": "document-00005.pdf",
  "size": 9768,
  "mime": "application/pdf",
  "content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="
}
```

--------------------------------

### Fetch Projects via cURL

Source: https://docs.bexio.com/

Retrieve a list of all projects using a bearer token for authorization.

```bash
curl -X GET \
  https://api.bexio.com/2.0/pr_project \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch Article cURL Request

Source: https://docs.bexio.com/

Example cURL command to retrieve a single article by its ID using bearer token authentication.

```bash
curl -X GET \
  https://api.bexio.com/2.0/article/{article_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_discount

Source: https://docs.bexio.com/

Fetches a list of all discount positions associated with a specific document.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_discount

### Description
This action fetches a list of all discount positions for a document.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - The type of the document (kb_offer, kb_order, kb_invoice).
- **document_id** (integer) - Required - The ID of the document.

#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (default: 500, max: 2000).
- **offset** (integer) - Optional - Skip over a number of elements (default: 0).

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **id** (integer) - Position ID
- **text** (string) - Description of the discount
- **is_percentual** (boolean) - Whether the discount is a percentage
- **value** (string) - Discount value
- **discount_total** (string) - Total discount amount
- **type** (string) - Position type

#### Response Example
[
  {
    "id": 1,
    "text": "Partner discount",
    "is_percentual": true,
    "value": "10.000000",
    "discount_total": "1.780000",
    "type": "KbPositionDiscount"
  }
]
```

--------------------------------

### Create manual entry

Source: https://docs.bexio.com/

This action creates a new manual entry for the account ledger.

```APIDOC
## POST /3.0/accounting/manual_entries

### Description
Creates a new manual entry for the account ledger.

### Method
POST

### Endpoint
/3.0/accounting/manual_entries

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **type** (string) - Required - Enum: "manual_single_entry", "manual_compound_entry", "manual_group_entry" - Specifies the type of manual entry.
- **date** (string) - Required - Format: date - The booking date.
- **reference_nr** (string) - Optional - Max length: 80 - A reference number for the booking.
- **entries** (Array of objects) - Required - Represents the entries for the manual entry.

### Request Example
```json
{
  "type": "manual_single_entry",
  "date": "2024-01-01",
  "reference_nr": "INV-123",
  "entries": [
    {
      "debit_account_id": 1020,
      "credit_account_id": 3200,
      "amount": 13600
    }
  ]
}
```

### Response
#### Success Response (201)
- **Created manual entry object** - Details of the created manual entry.

#### Error Response (422)
- **Validation error object** - Indicates validation errors in the request.

#### Response Example (201 Created)
```json
{
  "id": 2,
  "type": "manual_single_entry",
  "date": "2024-01-01",
  "reference_nr": "INV-123",
  "created_by_user_id": 1,
  "edited_by_user_id": 1,
  "entries": [
    {
      "id": 33,
      "date": "2024-01-01",
      "debit_account_id": 1020,
      "credit_account_id": 3200,
      "tax_id": null,
      "tax_account_id": null,
      "description": null,
      "amount": 13600,
      "currency_id": 1,
      "base_currency_id": 1,
      "currency_factor": 1,
      "base_currency_amount": 13600,
      "created_by_user_id": 1,
      "edited_by_user_id": 1
    }
  ],
  "is_locked": false,
  "locked_info": null
}
```
```

--------------------------------

### Fetch a Title Response Sample

Source: https://docs.bexio.com/

A successful response when fetching a single title. It returns the title object.

```json
{
  "id": 1,
  "name": "Dr."

}
```

--------------------------------

### Create New File Request Body

Source: https://docs.bexio.com/

Example payload for creating a new file using multipart/form-data. The file content should be specified with '@'.

```json
{
  "name": "form-data",
  "value": "@\"/path-to-your-file\""
}
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}

Source: https://docs.bexio.com/

Fetches a single discount position for a specific document.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}

### Description
This action fetches a single discount position for a document.

### Method
GET

### Endpoint
/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - The type of the document (kb_offer, kb_order, kb_invoice).
- **document_id** (integer) - Required - The id of the document.
- **position_id** (integer) - Required - The id of the position.

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **id** (integer) - The position ID
- **text** (string) - Description of the discount
- **is_percentual** (boolean) - Whether the discount is a percentage
- **value** (string) - The discount value
- **discount_total** (string) - The total discount amount
- **type** (string) - The object type

#### Response Example
{
  "id": 1,
  "text": "Partner discount",
  "is_percentual": true,
  "value": "10.000000",
  "discount_total": "1.780000",
  "type": "KbPositionDiscount"
}
```

--------------------------------

### GET /bills/{id}

Source: https://docs.bexio.com/

Retrieves the details of a specific bill by its unique identifier.

```APIDOC
## GET /bills/{id}

### Description
Endpoint for retrieving Bill by id.

### Method
GET

### Endpoint
/bills/{id}

### Parameters
#### Path Parameters
- **id** (string) - Required - The unique identifier of the bill.

### Response
#### Success Response (200)
- **id** (string) - Bill ID
- **document_no** (string) - Document number
- **status** (string) - Current status of the bill

#### Response Example
{
  "id": "64bf865d-988a-496d-a24f-bab2d52e4b4a",
  "document_no": "LR-12345",
  "status": "DRAFT"
}
```

--------------------------------

### Fetch Timesheet cURL Request

Source: https://docs.bexio.com/

Example cURL command to retrieve a specific timesheet by its ID.

```bash
curl -X GET \
  https://api.bexio.com/2.0/timesheet/{timesheet_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Retrieve Order PDF via cURL

Source: https://docs.bexio.com/

Fetches a PDF document for a specific order using a GET request.

```bash
curl -X GET \
  https://api.bexio.com/2.0/kb_order/{order_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Timesheet Status Response Sample

Source: https://docs.bexio.com/

Example JSON response containing a list of timesheet statuses, including their IDs and names.

```json
[
  {
    "id": 2,
    "name": "In Progress"
  }
]
```

--------------------------------

### GET /3.0/fictional_users

Source: https://docs.bexio.com/

Fetches a list of all fictional users. These users are suitable for dropdowns but cannot log in.

```APIDOC
## GET /3.0/fictional_users

### Description
Fetches a list of all fictional users. These fictional users can be used in dropdowns but can not log in to the application.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/fictional_users

### Query Parameters
- **limit** (integer) - Optional - Limits the number of results (max is 2000). Default: 500. Example: limit=20
- **offset** (integer) - Optional - Skips over a number of elements by specifying an offset value for the query. Default: 0. Example: offset=0

### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Responses
#### Success Response (200)
OK
- **id** (integer) - The unique identifier for the fictional user.
- **salutation_type** (string) - The salutation type (e.g., 'male', 'female').
- **firstname** (string) - The first name of the fictional user.
- **lastname** (string) - The last name of the fictional user.
- **email** (string) - The email address of the fictional user.
- **is_superadmin** (boolean) - Indicates if the user is a super admin.
- **is_accountant** (boolean) - Indicates if the user is an accountant.
- **title_id** (integer) - A reference to a title.

### Response Example (200)
```json
[
  {
    "id": 4,
    "salutation_type": "male",
    "firstname": "Rudolph",
    "lastname": "Smith",
    "email": "rudolph.smith@bexio.com",
    "title_id": null
  }
]
```
```

--------------------------------

### GET /invoices/search

Source: https://docs.bexio.com/

Search for invoices based on specific criteria and filter fields.

```APIDOC
## GET /invoices/search

### Description
Search invoices via query parameters and body criteria.

### Method
GET

### Query Parameters
- **order_by** (string) - Optional - Defines the order of results (e.g., id, total)
- **limit** (integer) - Optional - Limit the number of results (max 2000)
- **offset** (integer) - Optional - Skip over a number of elements

### Request Body
- **field** (string) - Required - Field to search over
- **value** (string) - Required - Value to search for
- **criteria** (string) - Optional - Search criteria (e.g., =, like, >)
```

--------------------------------

### Fetch Subtotal Position Response

Source: https://docs.bexio.com/

Example response structure returned when fetching a single subtotal position.

```json
{
  "id": 1,
  "text": "Subtotal",
  "value": "17.800000",
  "internal_pos": 1,
  "is_optional": false,
  "type": "KbPositionSubtotal",
  "parent_id": null
}
```

--------------------------------

### Fetch a list of manual entries (cURL)

Source: https://docs.bexio.com/

This action fetches a list of all manual entries. You can limit the number of results using the 'limit' query parameter and skip elements with 'offset'.

```bash
curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Update Expense Python Example

Source: https://docs.bexio.com/

This Python script shows how to update an expense using the 'requests' library. It sends a PUT request with the expense details in JSON format.

```python
import requests

url = "https://api.bexio.com/4.0/expenses/{id}"

payload = {
    "currency_code": "CHF",
    "exchange_rate": 1.5497651324,
    "paid_on": "2019-03-20",
    "supplier_id": 123,
    "document_no": "LR-12345",
    "title": "Expense 42",
    "bank_account_id": 5,
    "booking_account_id": 16,
    "amount": 80.54,
    "tax_id": 15,
    "base_currency_amount": 167.87,
    "attachment_ids": [
        "06573f59-01a2-493d-9876-462deda4cee3",
        "a230f087-f742-4259-925e-cf3abea5e6bf"
    ],
    "address": {
        "title": "Prof",
        "salutation": "Ms",
        "firstname_suffix": "John",
        "lastname_company": "Newman",
        "address_line": "Mega Street",
        "postcode": "6694",
        "city": "Tel Aviv",
        "country_code": "CH",
        "main_contact_id": 45,
        "contact_address_id": 827,
        "type": "PRIVATE"
    }
}

headers = {
    'Content-Type': 'application/json'
}

response = requests.request("PUT", url, headers=headers, json=payload)

print(response.text)
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_subposition

Source: https://docs.bexio.com/

Fetches a list of all sub positions for a document.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_subposition

### Description
This action fetches a list of all sub positions for a document.

### Method
GET

### Endpoint
/2.0/{kb_document_type}/{document_id}/kb_position_subposition

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - The type of the document.
- **document_id** (integer) - Required - The ID of the document.

#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max 2000).
- **offset** (integer) - Optional - Skip over a number of elements.

### Response
#### Success Response (200)
- **id** (integer) - Position ID
- **text** (string) - Description text
- **pos** (integer) - Position index
- **total_sum** (string) - Total sum of the sub position

#### Response Example
[
  {
    "id": 1,
    "text": "This is a container to group other position types",
    "pos": 1,
    "internal_pos": 1,
    "show_pos_nr": true,
    "is_optional": false,
    "total_sum": "17.800000",
    "show_pos_prices": true,
    "type": "KbPositionSubposition",
    "parent_id": null
  }
]
```

--------------------------------

### Response Sample for Searching Additional Addresses

Source: https://docs.bexio.com/

A successful search for additional addresses returns a JSON array of matching address objects.

```json
[
  {
    "id": 1,
    "name": "My new address",
    "name_addition": "Name addition",
    "address": "Walter Street 22",
    "street_name": "Walter Street",
    "house_number": "22",
    "address_addition": "Building C",
    "postcode": "9000",
    "city": "St. Gallen",
    "country_id": 1,
    "subject": "Additional address",
    "description": "This is an internal description"
}

]
```

--------------------------------

### GET /3.0/banking/accounts

Source: https://docs.bexio.com/

Fetches a list of all bank accounts shown on the banking component page.

```APIDOC
## GET /3.0/banking/accounts

### Description
This action fetches a list of all bank accounts which are shown on the banking component page.

### Method
GET

### Endpoint
/3.0/banking/accounts

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max 2000, default 500)
- **offset** (integer) - Optional - Skip over a number of elements (default 0)

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **id** (integer) - Bank account ID
- **name** (string) - Name of the account
- **iban_nr** (string) - IBAN number
- **type** (string) - Type of account (e.g., bank)
```

--------------------------------

### Fetch a list of manual entries

Source: https://docs.bexio.com/

This action fetches a list of all manual entries which have been added in the accounting module.

```APIDOC
## GET /3.0/accounting/manual_entries

### Description
Fetches a list of all manual entries in the accounting module.

### Method
GET

### Endpoint
/3.0/accounting/manual_entries

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Default: 500 - Example: limit=20 - Limits the number of results (max is 2000).
- **offset** (integer) - Optional - Default: 0 - Example: offset=0 - Skips over a number of elements by specifying an offset value for the query.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **Array of ManualEntry objects** - Details of manual entries.

#### Response Example
```json
[
  {
    "id": 1,
    "type": "manual_single_entry",
    "date": "2019-11-17",
    "reference_nr": "Booking BA-22",
    "created_by_user_id": 1,
    "edited_by_user_id": 1,
    "entries": [
      {
        "id": 32,
        "date": "2019-11-17",
        "debit_account_id": 77,
        "credit_account_id": 139,
        "tax_id": 3,
        "tax_account_id": 77,
        "description": "Payment for client Smith",
        "amount": 328.25,
        "currency_id": 1,
        "base_currency_id": 1,
        "currency_factor": 1,
        "base_currency_amount": 328.25,
        "created_by_user_id": 1,
        "edited_by_user_id": 1
      }
    ],
    "is_locked": false,
    "locked_info": "closed_business_year"
  }
]
```
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_article

Source: https://docs.bexio.com/

Fetches a list of all item positions for a document.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_article

### Description
Fetches a list of all item positions associated with a specific document.

### Method
GET

### Endpoint
/2.0/{kb_document_type}/{document_id}/kb_position_article

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - Enum: "kb_offer", "kb_order", "kb_invoice"
- **document_id** (integer) - Required - The ID of the document

#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max 2000)
- **offset** (integer) - Optional - Skip over a number of elements
```

--------------------------------

### Get Single File Request

Source: https://docs.bexio.com/

cURL command to retrieve details for a specific file by ID.

```bash
curl -X GET \
  https://api.bexio.com/3.0/files/{file_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /2.0/kb_offer

Source: https://docs.bexio.com/

Creates a new quote in the system.

```APIDOC
## POST /2.0/kb_offer

### Description
This action creates a new quote.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/kb_offer

### Parameters
#### Request Body
- **document_nr** (string) - Required if automatic numbering is deactivated
- **contact_id** (integer) - Optional, references a contact object
- **header** (string) - Optional, quote header text
- **footer** (string) - Optional, quote footer text
- **positions** (array) - Optional, list of quote positions

### Response
#### Success Response (201)
- Created

#### Error Response (422)
- Validation error
```

--------------------------------

### GET /4.0/payroll/employees/{employeeId}

Source: https://docs.bexio.com/

Retrieve a single employee's details on a specific date.

```APIDOC
## GET /4.0/payroll/employees/{employeeId}

### Description
Retrieve a single employee on a specific date.

### Method
GET

### Endpoint
/4.0/payroll/employees/{employeeId}

### Parameters
#### Path Parameters
- **employeeId** (string) - Required - Id of an employee

#### Query Parameters
- **date** (string) - Required - Date of employee's state (Example: 2024-01-31)

### Response
#### Success Response (200)
- **id** (string) - Employee ID
- **first_name** (string) - First name
- **last_name** (string) - Last name

#### Response Example
{
  "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08",
  "first_name": "string",
  "last_name": "string"
}
```

--------------------------------

### GET /2.0/contact/{contact_id}/additional_address/{additional_address_id}

Source: https://docs.bexio.com/

Fetches a specific additional address for a given contact.

```APIDOC
## GET /2.0/contact/{contact_id}/additional_address/{additional_address_id}

### Description
This action fetches an additional address for a given contact.

### Method
GET

### Endpoint
/2.0/contact/{contact_id}/additional_address/{additional_address_id}

### Parameters
#### Path Parameters
- **contact_id** (integer) - Required - The id of the contact
- **additional_address_id** (integer) - Required - The id of the additional address

### Response
#### Success Response (200)
- **id** (integer) - Address ID
- **name** (string) - Address name
- **address** (string) - Full address string

#### Response Example
{
  "id": 1,
  "name": "My new address",
  "address": "Walter Street 22"
}
```

--------------------------------

### GET /2.0/kb_invoice/{invoice_id}/payment/{payment_id}

Source: https://docs.bexio.com/

Fetches a specific payment associated with an invoice.

```APIDOC
## GET /2.0/kb_invoice/{invoice_id}/payment/{payment_id}

### Description
This action fetches a payment.

### Method
GET

### Endpoint
/2.0/kb_invoice/{invoice_id}/payment/{payment_id}

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The id of the invoice.
- **payment_id** (integer) - Required - The id of the payment.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The unique identifier of the payment.
- **date** (string) - The date of the payment.
- **value** (string) - The amount of the payment.
- **bank_account_id** (integer) - The ID of the bank account used.
- **title** (string) - The title of the payment.
- **payment_service_id** (integer or null) - The ID of the payment service.
- **is_client_account_redemption** (boolean) - Indicates if it's a client account redemption.
- **is_cash_discount** (boolean) - Indicates if it's a cash discount.
- **kb_invoice_id** (integer) - The ID of the associated invoice.
- **kb_credit_voucher_id** (integer or null) - The ID of the associated credit voucher.
- **kb_bill_id** (integer or null) - The ID of the associated bill.
- **kb_credit_voucher_text** (string) - Text for the credit voucher.

#### Response Example
```json
{
  "id": 4,
  "date": "2019-06-29",
  "value": "10.0000",
  "bank_account_id": 1,
  "title": "Received Payment",
  "payment_service_id": null,
  "is_client_account_redemption": false,
  "is_cash_discount": false,
  "kb_invoice_id": 1,
  "kb_credit_voucher_id": null,
  "kb_bill_id": null,
  "kb_credit_voucher_text": ""
}
```
```

--------------------------------

### Fetch Project via cURL

Source: https://docs.bexio.com/

Retrieve a single project by ID using a bearer token for authentication.

```bash
curl -X GET \
  https://api.bexio.com/2.0/pr_project/{project_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch a Country via cURL

Source: https://docs.bexio.com/

Retrieve a single country by its ID using a GET request.

```bash
curl -X GET \
  https://api.bexio.com/2.0/country/{country_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Unarchive a Project

Source: https://docs.bexio.com/

Reactivates an archived project.

```bash
curl -X POST \
  https://api.bexio.com/2.0/pr_project/{project_id}/reactivate \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /contact/{contact_id}/additional_address

Source: https://docs.bexio.com/

Fetches a list of all additional addresses for a given contact.

```APIDOC
## GET /contact/{contact_id}/additional_address

### Description
This action fetches a list of all additional addresses for a given contact.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/contact/{contact_id}/additional_address

### Parameters
#### Path Parameters
- **contact_id** (integer) - Required - The ID of the contact.

#### Query Parameters
- **order_by** (string) - Optional - Defines the order of results.
- **limit** (integer) - Optional - Limit the number of results.
- **offset** (integer) - Optional - Skip over a number of elements.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Address ID
- **name** (string) - Address name
- **address** (string) - Full address string

#### Response Example
[
  {
    "id": 1,
    "name": "My new address",
    "address": "Walter Street 22",
    "postcode": "9000",
    "city": "St. Gallen"
  }
]
```

--------------------------------

### Sample JSON Response for a Task

Source: https://docs.bexio.com/

This is a sample JSON object representing a task. It includes details such as ID, user ID, finish date, subject, and status.

```json
[
  {
    "id": 1,
    "user_id": 1,
    "finish_date": "2018-04-09T07:44:10+00:00",
    "subject": "Unterlagen versenden",
    "place": 0,
    "info": "so schnell wie möglich.",
    "contact_id": 1,
    "sub_contact_id": null,
    "project_id": null,
    "entry_id": null,
    "module_id": null,
    "todo_status_id": 1,
    "todo_priority_id": null,
    "has_reminder": false,
    "remember_type_id": null,
    "remember_time_id": null,
    "communication_kind_id": null

}

]
```

--------------------------------

### Business Year Response Data

Source: https://docs.bexio.com/

Example JSON response structure for business year objects.

```json
[
  {
    "id": 1,
    "start": "2018-01-01",
    "end": "2018-12-31",
    "status": "open",
    "closed_at": "2019-04-28"
  }
]
```

```json
{
  "id": 1,
  "start": "2018-01-01",
  "end": "2018-12-31",
  "status": "open",
  "closed_at": "2019-04-28"
}
```

--------------------------------

### Retrieve Employee cURL Request

Source: https://docs.bexio.com/

Example cURL command to fetch a single employee record using a bearer token.

```bash
curl -X GET \
  https://api.bexio.com/4.0/payroll/employees/{employeeId} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch Sub Position via cURL

Source: https://docs.bexio.com/

Example request to retrieve a specific sub position using cURL.

```bash
curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Get Communication Types

Source: https://docs.bexio.com/

Use this cURL command to fetch a list of all communication types. The Accept and Authorization headers are required.

```curl
curl -X GET \
  https://api.bexio.com/2.0/communication_kind \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /4.0/purchase/bills/{id}

Source: https://docs.bexio.com/

Retrieves the details of a specific bill using its unique identifier.

```APIDOC
## GET /4.0/purchase/bills/{id}

### Description
Retrieves the full details of a bill by its unique ID.

### Method
GET

### Endpoint
https://api.bexio.com/4.0/purchase/bills/{id}

### Parameters
#### Path Parameters
- **id** (string <uuid>) - Required - id of Bill to retrieve

### Response
#### Success Response (200)
- **id** (string) - Bill ID
- **document_no** (string) - Document number
- **title** (string) - Bill title
- **status** (string) - Bill status
- **created_at** (string) - Creation timestamp
- **supplier_id** (integer) - Supplier ID
- **bill_date** (string) - Date of the bill
- **due_date** (string) - Due date of the bill
- **currency_code** (string) - Currency code

#### Response Example
{
  "id": "64bf865d-988a-496d-a24f-bab2d52e4b4a",
  "document_no": "LR-12345",
  "title": "Bill 42",
  "status": "DRAFT",
  "bill_date": "2019-02-12",
  "due_date": "2019-03-14",
  "currency_code": "USD"
}
```

--------------------------------

### Create Contact Group Response Sample

Source: https://docs.bexio.com/

A sample JSON response for a newly created contact group, including its assigned `id` and `name`.

```json
{
  "id": 1,
  "name": "Suppliers"
}
```

--------------------------------

### Response Sample for Item Position

Source: https://docs.bexio.com/

This is a sample JSON response for a successfully created or fetched item position. It includes details like amount, tax information, and article references.

```json
[
  {
    "id": 1,
    "amount": "5.000000",
    "amount_reserved": "5.000000",
    "amount_open": "5.000000",
    "amount_completed": "5.000000",
    "unit_id": 1,
    "account_id": 1,
    "unit_name": "kg",
    "tax_id": 4,
    "tax_value": "7.70",
    "text": "Apples",
    "unit_price": "3.560000",
    "discount_in_percent": "0.000000",
    "position_total": "17.800000",
    "pos": 1,
    "internal_pos": 1,
    "is_optional": false,
    "article_id": 3,
    "type": "KbPositionArticle",
    "parent_id": null
}

]
```

--------------------------------

### Fetch a Title Request (cURL)

Source: https://docs.bexio.com/

Example cURL command to fetch a specific title using its ID. Ensure to replace `{access-token}` and `{title_id}`.

```curl
curl -X GET \
  https://api.bexio.com/2.0/title/{title_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}

Source: https://docs.bexio.com/

Fetches a single item position for a document.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}

### Description
This action fetches a single item position for a document.

### Method
GET

### Endpoint
/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - The type of the document (kb_offer, kb_order, kb_invoice).
- **document_id** (integer) - Required - The ID of the document.
- **position_id** (integer) - Required - The ID of the position.

### Response
#### Success Response (200)
- **id** (integer) - Position ID
- **amount** (string) - Amount
- **text** (string) - Position text
```

--------------------------------

### Delete Contact Response

Source: https://docs.bexio.com/

Example JSON response indicating successful deletion of a contact.

```json
{
  "success": true
}
```

--------------------------------

### GET /3.0/purchase_orders

Source: https://docs.bexio.com/

Retrieves a list of purchase orders with options for sorting, limiting, and offsetting results. Requires an Accept header.

```APIDOC
## GET /3.0/purchase_orders

### Description
Retrieves a list of purchase orders. Supports filtering and sorting.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/purchase_orders

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Can be combined with `_asc` or `_desc`. Enum: "id", "total", "total_net", "total_gross", "updated_at". Default: "id"
- **limit** (integer) - Optional - Limits the number of results. Max is 2000. Default: 500
- **offset** (integer) - Optional - Skips over a number of elements by specifying an offset value. Default: 0

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The unique identifier for the purchase order.
- **document_nr** (string) - The document number of the purchase order.
- **kb_payment_template_id** (integer) - The ID of the payment template.
- **payment_type_id** (integer) - The ID of the payment type.
- **title** (string) - The title of the purchase order.
- **contact_id** (integer) - The ID of the associated contact.
- **contact_sub_id** (integer) - The sub-ID of the associated contact.
- **template_slug** (string) - The slug for the template used.
- **user_id** (integer) - The ID of the user who created the purchase order.
- **project_id** (integer) - The ID of the associated project.
- **logopaper_id** (integer) - The ID of the logopaper used.
- **language** (object) - Information about the language used.
  - **id** (integer) - Language ID.
  - **name** (string) - Language name.
  - **decimalpoint** (string) - Decimal point character.
  - **thousandsseparator** (string) - Thousands separator character.
  - **iso_639_1** (string) - ISO 639-1 code for the language.
  - **date_format** (string) - Date format string.
- **language_id** (integer) - The ID of the language.
- **bank_account_id** (integer) - The ID of the bank account used.
- **currency** (object) - Information about the currency.
  - **id** (integer) - Currency ID.
  - **name** (string) - Currency name.
  - **round_factor** (number) - The rounding factor for the currency.
- **currency_id** (integer) - The ID of the currency.
- **header** (string) - The header text for the purchase order.
- **footer** (string) - The footer text for the purchase order.
- **total_rounding_difference** (number) - The total rounding difference.
- **mwst_type** (string) - The type of VAT (e.g., "included").
- **mwst_is_net** (boolean) - Indicates if VAT is net.
- **is_compact_view** (boolean) - Indicates if the compact view is enabled.
- **show_position_taxes** (boolean) - Indicates if position taxes are shown.
- **salesman_user_id** (integer) - The ID of the salesman user.
- **is_valid_from** (string) - The date from which the purchase order is valid.
- **is_valid_to** (string) - The date until which the purchase order is valid.
- **delivery_address_type** (string) - The type of delivery address.
- **contact_address_manual** (string) - Manual contact address.
- **delivery_address_manual** (string) - Manual delivery address.
- **nb_decimals_amount** (integer) - Number of decimal places for amount.
- **nb_decimals_price** (integer) - Number of decimal places for price.
- **kb_item_status_id** (integer) - The ID of the item status.
- **terms_of_payment_text** (string) - The terms of payment text.
- **reference** (string) - The reference for the purchase order.
- **api_reference** (any) - API reference field (can be null).
- **mail** (string) - Email address.
- **viewed_by_client_at** (string) - The date the purchase order was viewed by the client.
- **is_valid_until** (string) - The date until which the purchase order is valid.
- **created_at** (string) - The timestamp when the purchase order was created.
- **updated_at** (string) - The timestamp when the purchase order was last updated.
- **custom_translations** (object) - Custom translations for the purchase order.
- **date_format** (string) - The date format used in the response.

### Request Example
```json
{
  "example": "request body"
}
```

### Response Example
```json
[
  {
    "id": 1,
    "document_nr": "RE-00001",
    "kb_payment_template_id": 1,
    "payment_type_id": 1,
    "title": "purchase order example title",
    "contact_id": 14,
    "contact_sub_id": 1,
    "template_slug": "581a8010821e01426b8b456b",
    "user_id": 1,
    "project_id": 1,
    "logopaper_id": 1,
    "language": {
      "id": 1,
      "name": "Deutsch",
      "decimalpoint": ".",
      "thousandsseparator": "'",
      "iso_639_1": "de",
      "date_format": "d.m.Y"
    },
    "language_id": 1,
    "bank_account_id": 1,
    "currency": {
      "id": 1,
      "name": "CHF",
      "round_factor": 0.05
    },
    "currency_id": 1,
    "header": "We would like to order the following products:",
    "footer": "Many thanks for the fast processing of our order.",
    "total_rounding_difference": -0.02,
    "mwst_type": "included",
    "mwst_is_net": true,
    "is_compact_view": false,
    "show_position_taxes": false,
    "salesman_user_id": 1,
    "is_valid_from": "2019-06-24",
    "is_valid_to": "2019-07-24",
    "delivery_address_type": "contact_address",
    "contact_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",
    "delivery_address_manual": "bexio AG\\nReinluftweg 1\\nCH - 9630 Wattwil",
    "nb_decimals_amount": 2,
    "nb_decimals_price": 2,
    "kb_item_status_id": 22,
    "terms_of_payment_text": "Payable within 30 days",
    "reference": "Based on Quote Q-3860",
    "api_reference": null,
    "mail": "support@bexio.com",
    "viewed_by_client_at": "2020-07-24",
    "is_valid_until": "2019-07-24",
    "created_at": "2020-04-28T19:58:58+00:00",
    "updated_at": "2020-04-30T19:58:58+00:00",
    "custom_translations": { },
    "date_format": "d.m.Y"
  }
]
```

--------------------------------

### Create Contact Payload

Source: https://docs.bexio.com/

Example JSON payload for creating a new contact. Set 'nr' to null for automatic assignment. 'contact_type_id' is required (1 for company, 2 for person).

```json
{
  "nr": null,
  "contact_type_id": 1,
  "name_1": "Example Company",
  "name_2": null,
  "salutation_id": 2,
  "salutation_form": null,
  "title_id": null,
  "birthday": null,
  "street_name": "Smith Street",
  "house_number": "77",
  "address_addition": "Building C",
  "postcode": "8004",
  "city": "Zurich",
  "country_id": 1,
  "mail": "contact@example.org",
  "mail_second": "",
  "phone_fixed": "",
  "phone_fixed_second": "",
  "phone_mobile": "",
  "fax": "",
  "url": "",
  "skype_name": "",
  "remarks": "",
  "language_id": null,
  "contact_group_ids": "1,2",
  "contact_branch_ids": null,
  "user_id": 1,
  "owner_id": 1
}
```

--------------------------------

### API Basics

Source: https://docs.bexio.com/

Information on API host, routes, HTTP verbs, headers, and response codes.

```APIDOC
## API basics

### API routes
Each API endpoint is available on our API host `https://api.bexio.com`.
> Endpoints are usually defined with a relative path, as seen in the following example:
Each relative path must be combined with the API platform URL. For the example this would result in the endpoint `https://api.bexio.com/2.0/contact`

### HTTP Verbs
Where possible, bexio tries to use the appropriate HTTP verb for its operations
Verb | Description  
---|---
`GET` | Used for retrieving resources  
`POST` | Used for creating resources  
`PATCH` | Used for updating resources with partial data  
`PUT` | Used for updating resources with full data  
`DELETE` | Used for deleting resources. Please note that delete actions permanently delete resources. It cannot be undone.  

### HTTP Headers
HTTP headers let the client and the server pass additional information with an HTTP request or response. An HTTP header consists of its case-insensitive name followed by a colon (:), then by its value.
#### Request Headers
The following headers must be used for every request:
  * `Accept: application/json`
  * `Authorization: Bearer <token>`

Additionally, the header `Content-Length: <length>` must be specified for requests with a payload.
The `Accept-Language: xx` can be used to specify the language you would like to have some translated elements returned to you. The `xx` has to be replaced by the ISO 639-1 code of the language. This is for example useful to have the tax codes in the user’s language.
#### Response Headers
The API will always indicate the return type with a `Content-Type` header. Normally the header value is set to `application/json`, but can vary (e.g. for PDF exports).

### Response Codes
Actions and errors yield different HTTP response codes. Please have a look at the expected response codes in the following list:
Code | Description  
---|---
200 | Request OK  
201 | New resource created  
304 | The resource has not been changed  
400 | The request parameters are invalid  
401 | The bearer token or the provided api key is invalid  
403 | You do not possess the required rights to access this resource  
404 | The resource could not be found / is unknown  
411 | Length Required  
415 | The data could not be processed or the accept header is invalid  
422 | Could not save the entity  
429 | Too many requests  
500 | An unexpected condition was encountered  
503 | The server is not available (maintenance work)  
```

--------------------------------

### POST /2.0/unit

Source: https://docs.bexio.com/

Creates a new unit.

```APIDOC
## POST /2.0/unit

### Description
Creates a new unit.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/unit

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **name** (string) - Required - Name of the unit

### Request Example
{
  "name": "h"
}

### Response
#### Success Response (201)
- **id** (integer) - ID of the created unit
- **name** (string) - Name of the created unit

#### Response Example
{
  "id": 1,
  "name": "h"
}
```

--------------------------------

### Outgoing Payment Response (200 OK)

Source: https://docs.bexio.com/

This is an example of a successful response when an outgoing payment is updated or created. It includes details of the transaction.

```json
{
  "id": "f68e87e0-fa2d-4576-91c6-15f7b6876003",
  "status": "DOWNLOADED",
  "created_at": "2019-06-27T10:25:50+0200",
  "bill_id": "22c306ad-c158-4792-b557-72340df816f5",
  "payment_type": "IBAN",
  "execution_date": "2019-10-15",
  "amount": 45.98,
  "currency_code": "CHF",
  "exchange_rate": 1.0000000032,
  "note": "Some notes",
  "sender_bank_account_id": 2,
  "sender_iban": "DE684734567812345678900",
  "sender_name": "Sender name",
  "sender_street": "Good Street",
  "sender_house_no": "45",
  "sender_city": "Warsaw",
  "sender_postcode": "6723",
  "sender_country_code": "PL",
  "sender_bc_no": "238747349095789",
  "sender_bank_no": "80759758235723820983",
  "sender_bank_name": "Name of the Bank",
  "receiver_iban": "CH121234567812345678900",
  "receiver_name": "Receiver name",
  "receiver_street": "Mega street",
  "receiver_house_no": "10/20",
  "receiver_city": "London",
  "receiver_postcode": "3781",
  "receiver_country_code": "CH",
  "receiver_bc_no": "98364949095789",
  "receiver_bank_no": "26597585382673",
  "receiver_bank_name": "Some Bank name",
  "fee_type": "BREAKDOWN",
  "is_salary_payment": false,
  "reference_no": "9568345675321984798456",
  "message": "Some message",
  "booking_text": "Swimming lessons",
  "banking_payment_id": "f35d39a3-dfc4-43d1-bf38-387f821c0ed0",
  "banking_payment_entry_id": "27c0d66a-8ea2-4b51-9ce0-372d3e0a4117",
  "transaction_id": "b4f1e277-8424-48a7-a0b0-100646e82d25"
}
```

--------------------------------

### Validate Document Number Request

Source: https://docs.bexio.com/

Example cURL request to check if a document number is available.

```bash
curl -X GET \
  https://api.bexio.com/4.0/purchase/documentnumbers/bills \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Comment Response Sample

Source: https://docs.bexio.com/

This is a sample JSON response when successfully fetching a comment. It includes details about the comment and the user who posted it.

```json
{
  "id": 4,
  "text": "Sample comment",
  "user_id": 1,
  "user_email": null,
  "user_name": "Peter Smith",
  "date": "2019-07-18 15:41:53",
  "is_public": false,
  "image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=",
  "image_path": "https://my.bexio.com/img/profile_picture/j2cbWl-yp3zT9oOh9jHTAA/Ds8buEV0HXZsvuBm3df8SQ.png?type=thumb"

}
```

--------------------------------

### Retrieve Outgoing Payments Response

Source: https://docs.bexio.com/

Example JSON response containing a list of outgoing payments and pagination metadata.

```JSON
{
  "data": [
    {
      "id": "46913fdc-802b-49ba-99d7-4ccc13cccfc2",
      "bill_id": "176a1442-d66d-4907-b8c8-6dad090452a8",
      "payment_type": "MANUAL",
      "execution_date": "2019-10-15",
      "status": "TRANSFERRED",
      "amount": 45.98,
      "sender_bank_account_id": 4,
      "receiver_account_no": "657858734587301523",
      "receiver_iban": "DE121234567812345678900",
      "banking_payment_id": "0c8b18af-9a66-4c89-b01a-8abab642d69a",
      "transaction_id": "f020b371-939e-427a-8175-eceb8dea17b3"
    },
    {
      "id": "176a1442-d66d-4907-b8c8-6dad090452a8",
      "bill_id": "869f16ee-d688-476b-9f18-9bb608fdc21f",
      "payment_type": "IBAN",
      "status": "PENDING",
      "execution_date": "2019-09-25",
      "amount": 95.2,
      "sender_bank_account_id": 96,
      "receiver_account_no": "253458734587301523",
      "receiver_iban": "ES121234567812345678900",
      "banking_payment_id": "f7e53b5e-a496-4bce-94b5-97f739dc4d5b",
      "transaction_id": "b3bafed8-fe0f-414d-b360-b50734fb199c"
    }
  ],
  "paging": {
    "page": 1,
    "page_size": 10,
    "page_count": 50,
    "item_count": 300
  }
}
```

--------------------------------

### Fetch Quote cURL Request

Source: https://docs.bexio.com/

Example cURL command to fetch a specific quote using its ID. Requires an Accept header and Authorization token.

```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_offer/{quote_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_text

Source: https://docs.bexio.com/

Fetches a list of all text positions for a specific document.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_text

### Description
This action fetches a list of all text positions for a document.

### Method
GET

### Endpoint
/2.0/{kb_document_type}/{document_id}/kb_position_text

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - The type of the document (kb_offer, kb_order, kb_invoice).
- **document_id** (integer) - Required - The ID of the document.

#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max 2000, default 500).
- **offset** (integer) - Optional - Skip over a number of elements (default 0).

### Response
#### Success Response (200)
- **id** (integer) - Position ID
- **text** (string) - Position text
- **show_pos_nr** (boolean) - Whether to show position number
- **type** (string) - Position type

#### Response Example
[
  {
    "id": 1,
    "text": "This position type allows to add free text to a document",
    "show_pos_nr": false,
    "type": "KbPositionText"
  }
]
```

--------------------------------

### GET /quotes

Source: https://docs.bexio.com/

Searches for quotes based on various filter criteria and supports pagination and sorting.

```APIDOC
## GET /quotes

### Description
Search quotes via query parameters. Supported fields include id, kb_item_status_id, document_nr, title, contact_id, and more.

### Method
GET

### Endpoint
/quotes

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of results (e.g., id, total, updated_at)
- **limit** (integer) - Optional - Limit the number of results (max 2000)
- **offset** (integer) - Optional - Skip over a number of elements

### Request Example
GET /quotes?order_by=total&limit=20
```

--------------------------------

### Response Sample for Created Item Position

Source: https://docs.bexio.com/

This is a sample JSON response for a successfully created item position. It includes the newly assigned ID and other details of the created position.

```json
{
  "id": 1,
  "amount": "5.000000",
  "amount_reserved": "5.000000",
  "amount_open": "5.000000",
  "amount_completed": "5.000000",
  "unit_id": 1,
  "account_id": 1,
  "unit_name": "kg",
  "tax_id": 4,
  "tax_value": "7.70",
  "text": "Apples",
  "unit_price": "3.560000",
  "discount_in_percent": "0.000000",
  "position_total": "17.800000",
  "pos": 1,
  "internal_pos": 1,
  "is_optional": null,
  "article_id": 3,
  "type": "KbPositionArticle",
  "parent_id": null

}
```

--------------------------------

### List all currencies

Source: https://docs.bexio.com/

Retrieves a list of all configured currencies.

```bash
curl -X GET \
  https://api.bexio.com/3.0/currencies \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/contact

Source: https://docs.bexio.com/

Searches for contacts based on various criteria. Supports filtering, sorting, and pagination.

```APIDOC
## GET /2.0/contact

### Description
Searches for contacts via query parameters. Supports filtering by various fields, sorting, and pagination.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/contact

### Parameters
#### Query Parameters
- **id** (string) - Optional - Filter by contact ID.
- **name_1** (string) - Optional - Filter by the primary name (company name or last name).
- **name_2** (string) - Optional - Filter by the secondary name (company addition or first name).
- **nr** (string) - Optional - Filter by contact number.
- **address** (string) - Optional - Filter by address.
- **mail** (string) - Optional - Filter by primary email address.
- **mail_second** (string) - Optional - Filter by secondary email address.
- **postcode** (string) - Optional - Filter by postcode.
- **city** (string) - Optional - Filter by city.
- **country_id** (integer) - Optional - Filter by country ID.
- **contact_group_ids** (string) - Optional - Filter by contact group IDs (comma-separated).
- **contact_type_id** (integer) - Optional - Filter by contact type ID (1 for company, 2 for person).
- **updated_at** (string) - Optional - Filter by update timestamp.
- **user_id** (integer) - Optional - Filter by assigned user ID.
- **phone_fixed** (string) - Optional - Filter by fixed phone number.
- **phone_mobile** (string) - Optional - Filter by mobile phone number.
- **fax** (string) - Optional - Filter by fax number.
- **order_by** (string) - Optional - Default: "id". Enum: "id", "nr", "name_1", "updated_at". Example: `order_by=name_1`. Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. `_asc` and `_desc` can be appended to any parameter to either sort ascending (default) or descending.
- **limit** (integer) - Default: 500 - Example: `limit=20`. Limit the number of results (max is 2000).
- **offset** (integer) - Default: 0 - Example: `offset=0`. Skip over a number of elements by specifying an offset value for the query.
- **show_archived** (boolean) - Default: false - Example: `show_archived=true`. Show archived elements only.

#### Header Parameters
- **Accept** (string) - Required - Example: `application/json`.
```

--------------------------------

### Calendar Year Response Data

Source: https://docs.bexio.com/

Example JSON response structure for calendar year objects.

```json
[
  {
    "id": 1,
    "start": "2018-01-01",
    "end": "2018-12-31",
    "is_vat_subject": true,
    "is_annual_reporting": false,
    "created_at": "2017-04-28T19:58:58+00:00",
    "updated_at": "2018-04-30T19:58:58+00:00",
    "vat_accounting_method": "effective",
    "vat_accounting_type": "agreed"
  }
]
```

```json
{
  "id": 1,
  "start": "2018-01-01",
  "end": "2018-12-31",
  "is_vat_subject": true,
  "is_annual_reporting": false,
  "created_at": "2017-04-28T19:58:58+00:00",
  "updated_at": "2018-04-30T19:58:58+00:00",
  "vat_accounting_method": "effective",
  "vat_accounting_type": "agreed"
}
```

--------------------------------

### GET /4.0/expenses/documentnumbers

Source: https://docs.bexio.com/

Validates whether a specific document number is available for use.

```APIDOC
## GET /4.0/expenses/documentnumbers

### Description
Endpoint for retrieving validation for document number.

### Method
GET

### Endpoint
/4.0/expenses/documentnumbers

### Parameters
#### Query Parameters
- **document_no** (string) - Required - document number to validate

### Request Example
curl -X GET https://api.bexio.com/4.0/expenses/documentnumbers?document_no=AB-1234

### Response
#### Success Response (200)
- **valid** (boolean) - Whether the number is valid
- **next_available_no** (string) - The next available document number

#### Response Example
{
  "valid": false,
  "next_available_no": "AB-1235"
}
```

--------------------------------

### Construct API Endpoint URL

Source: https://docs.bexio.com/

Combine the base API host URL with the relative path to form a complete API endpoint. For example, `https://api.bexio.com/2.0/contact`.

```plaintext
https://api.bexio.com/2.0/contact
```

--------------------------------

### Expense API Response Structure

Source: https://docs.bexio.com/

Example JSON response returned by the /4.0/expenses endpoint, containing an array of expense objects and pagination metadata.

```json
{
  "data": [
    {
      "id": "e27be5f4-c8db-4193-92f3-1c6f1dc98f1b",
      "created_at": "2019-03-23T09:53:49+0000",
      "document_no": "NO-1",
      "status": "DRAFT",
      "firstname_suffix": "John",
      "lastname_company": "Doe",
      "vendor": "John Doe",
      "title": "Title 1",
      "currency_code": "CHF",
      "paid_on": "2019-03-07",
      "booking_account_id": 387,
      "net": 26.65,
      "gross": 29.43,
      "project_id": "c14aa91c-b4f5-43ca-ae2a-882f94cd40f4",
      "chargeable_contact_id": 4,
      "transaction_id": "b388a4da-7085-475a-87a0-a2acb4d8d68f",
      "invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",
      "attachment_ids": [
        "60dd4dfa-24a3-4114-a934-108380789edc",
        "a3161942-1b1d-42c1-816d-dc44cd53c7e6"
      ]
    },
    {
      "id": "dd6d20f4-8c77-45ba-952f-84948798c79b",
      "created_at": "2019-05-23T09:53:49+0000",
      "document_no": "NO-3",
      "status": "DONE",
      "vendor_ref": "Vendor 2",
      "firstname_suffix": "James",
      "lastname_company": "Doe",
      "vendor": "James Doe",
      "title": "Title 2",
      "currency_code": "USD",
      "paid_on": "2018-02-07",
      "booking_account_id": 7,
      "net": 31.39,
      "gross": 50.44,
      "project_id": "1a1864c0-ba80-46a8-ad89-ffd128db9456",
      "chargeable_contact_id": 7,
      "transaction_id": "771590b0-a794-461f-a375-886e4634b618",
      "invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",
      "attachment_ids": [
        "06573f59-01a2-493d-9876-462deda4cee3",
        "a230f087-f742-4259-925e-cf3abea5e6bf"
      ]
    }
  ],
  "paging": {
    "page": 1,
    "page_size": 10,
    "page_count": 50,
    "item_count": 300
  }
}
```

--------------------------------

### Retrieve Outgoing Payment via cURL

Source: https://docs.bexio.com/

Example request to fetch an outgoing payment by its ID using bearer authentication.

```bash
curl -X GET \
  https://api.bexio.com/4.0/purchase/outgoing-payments/{id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /3.0/purchase_orders

Source: https://docs.bexio.com/

Creates a new purchase order in the system.

```APIDOC
## POST /3.0/purchase_orders

### Description
Creates a new purchase order with the provided details.

### Method
POST

### Endpoint
https://api.bexio.com/3.0/purchase_orders

### Request Body
- **id** (integer) - Required - The id of the purchase order
- **document_nr** (string) - Required - Document number
- **kb_payment_template_id** (integer/null) - Required - Payment template ID
- **payment_type_id** (integer) - Required - References a payment type object
- **title** (string/null) - Required - Title of the order
- **contact_id** (integer) - Required - References a contact object
- **contact_sub_id** (integer/null) - Required - References a contact object
- **template_slug** (string/null) - Required - Template slug
- **user_id** (integer) - Required - References a user object
- **project_id** (integer/null) - Required - References a project object
- **logopaper_id** (integer) - Required - Logopaper ID
- **language** (object) - Required - Language object
- **language_id** (integer) - Required - References a language object
- **bank_account_id** (integer) - Required - References a bank account object
- **currency** (object) - Required - Currency object
- **currency_id** (integer) - Required - References a currency object
- **header** (string/null) - Required - Header text
- **footer** (string/null) - Required - Footer text
- **mwst_type** (string) - Required - Enum: "included", "excluded", "exempt"
- **mwst_is_net** (boolean) - Required - Affects total if mwst_type is 0
- **is_compact_view** (boolean) - Required - Compact view toggle
- **show_position_taxes** (boolean) - Required - Show position taxes toggle
- **salesman_user_id** (integer/null) - Required - References a user object
- **is_valid_from** (string) - Required - Date
- **is_valid_to** (string) - Required - Date
- **delivery_address_type** (string) - Required - Enum: "contact_address", "manual"
- **contact_address_manual** (string) - Required - Contact address
- **delivery_address_manual** (string) - Required - Delivery address
- **nb_decimals_amount** (integer) - Required - Decimals for amount
- **nb_decimals_price** (integer) - Required - Decimals for price
- **terms_of_payment_text** (string/null) - Required - Terms of payment text
- **reference** (string/null) - Required - Reference
- **api_reference** (string/null) - Required - API reference
- **mail** (string/null) - Required - Mail address
- **is_valid_until** (string) - Required - Date
- **created_at** (string) - Required - Creation date
- **updated_at** (string) - Required - Update date
- **custom_translations** (object) - Required - Custom translations
- **date_format** (string) - Required - Date format
- **positions** (object) - Required - Line items

### Response
#### Success Response (201)
- Created

#### Error Response (422)
- Validation error
```

--------------------------------

### Fetch an order via cURL

Source: https://docs.bexio.com/

Retrieves a single order by its ID using a GET request with bearer token authentication.

```bash
curl -X GET \
  https://api.bexio.com/2.0/kb_order/{order_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Delete Payment via cURL

Source: https://docs.bexio.com/

Example request to permanently delete a payment using cURL.

```bash
curl -X DELETE \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment/{payment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Create a currency

Source: https://docs.bexio.com/

Payload and response for creating a new currency.

```json
{
  "name": "CHF",
  "round_factor": 0.05
}
```

```json
{
  "id": 1,
  "name": "CHF",
  "round_factor": 0.05
}
```

--------------------------------

### GET /4.0/payroll/employees/{employeeId}/paystub-pdf/{year}/{month}

Source: https://docs.bexio.com/

Retrieves the location of a generated paystub PDF for a specific employee and month.

```APIDOC
## GET /4.0/payroll/employees/{employeeId}/paystub-pdf/{year}/{month}

### Description
Retrieves the location of a generated paystub PDF for a specific employee and month.

### Method
GET

### Endpoint
/4.0/payroll/employees/{employeeId}/paystub-pdf/{year}/{month}

### Parameters
#### Path Parameters
- **employeeId** (string <uuid>) - Required - Id of an employee
- **year** (integer <int32>) - Required - Year for which report is being generated
- **month** (integer <int32>) - Required - Month for which report is being generated

### Response
#### Success Response (200)
- **location** (string) - Location of generated pdf

#### Response Example
{
  "location": "http://example.com"
}
```

--------------------------------

### Fetch Users List via cURL

Source: https://docs.bexio.com/

Retrieve a list of all users.

```bash
curl -X GET \
  https://api.bexio.com/3.0/users \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /3.0/files/{file_id}

Source: https://docs.bexio.com/

Retrieves details for a specific file using its ID. Requires the file ID as a path parameter.

```APIDOC
## GET /3.0/files/{file_id}

### Description
Retrieves details for a specific file using its ID. Requires the file ID as a path parameter.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/files/{file_id}

### Path Parameters
- **file_id** (integer) - Required - File ID to show

### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Description
- **uuid** (string) - Description
- **name** (string) - Description
- **size_in_bytes** (integer) - Description
- **extension** (string) - Description
- **mime_type** (string) - Description
- **uploader_email** (string) - Description
- **user_id** (integer) - Description
- **is_archived** (boolean) - Description
- **source_id** (integer) - Description
- **source_type** (string) - Description
- **is_referenced** (boolean) - Description
- **created_at** (string) - Description

#### Response Example
```json
{
  "id": 1,
  "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",
  "name": "screenshot",
  "size_in_bytes": 218476,
  "extension": "png",
  "mime_type": "image/png",
  "uploader_email": "contact@example.org",
  "user_id": 1,
  "is_archived": false,
  "source_id": 2,
  "source_type": "web",
  "is_referenced": false,
  "created_at": "2018-06-09T08:52:10+00:00"
}
```
```

--------------------------------

### Retrieve Outgoing Payments Request

Source: https://docs.bexio.com/

Example request to retrieve a list of outgoing payments using cURL.

```cURL
curl -X GET \
  https://api.bexio.com/4.0/purchase/outgoing-payments \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/kb_order/{order_id}/pdf

Source: https://docs.bexio.com/

Retrieves a PDF document for a specific order. You can specify whether to use a letterhead for the PDF generation.

```APIDOC
## GET /2.0/kb_order/{order_id}/pdf

### Description
This action returns a pdf document of the order.

### Method
GET

### Endpoint
/2.0/kb_order/{order_id}/pdf

### Parameters
#### Path Parameters
- **order_id** (integer) - Required - The ID of the order.
- **logopaper** (integer) - Optional - Whether the PDF should be generated using the letterhead, or not. Enum: 0, 1. Example: 1

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_order/{order_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **name** (string) - The name of the PDF file.
- **size** (integer) - The size of the PDF file in bytes.
- **mime** (string) - The MIME type of the file, should be 'application/pdf'.
- **content** (string) - The base64 encoded content of the PDF file.

#### Response Example
```json
{
  "name": "document-00005.pdf",
  "size": 9768,
  "mime": "application/pdf",
  "content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="
}
```
```

--------------------------------

### GET /4.0/purchase/bills

Source: https://docs.bexio.com/

Retrieves a list of purchase bills based on optional query parameters for filtering and pagination.

```APIDOC
## GET /4.0/purchase/bills

### Description
Retrieves a list of purchase bills. Supports filtering by status, date ranges, vendor information, and financial values.

### Method
GET

### Endpoint
https://api.bexio.com/4.0/purchase/bills

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max 500, default 100)
- **page** (integer) - Optional - Current page (default 1)
- **order** (string) - Optional - Sorting order (asc/desc, default "asc")
- **sort** (string) - Optional - Field to sort by
- **search_term** (string) - Optional - Term to search for (3-255 characters)
- **fields[]** (Array of strings) - Optional - Fields to search within
- **status** (string) - Optional - Filter by bill status (DRAFTS, TODO, PAID, OVERDUE)
- **bill_date_start** (string) - Optional - Earliest bill date
- **bill_date_end** (string) - Optional - Latest bill date
- **due_date_start** (string) - Optional - Earliest due date
- **due_date_end** (string) - Optional - Latest due date
- **vendor_ref** (string) - Optional - Filter by vendor reference
- **title** (string) - Optional - Filter by title
- **currency_code** (string) - Optional - Filter by currency code
- **pending_amount_min** (number) - Optional - Minimum pending amount
- **pending_amount_max** (number) - Optional - Maximum pending amount
- **vendor** (string) - Optional - Filter by vendor name
- **gross_min** (number) - Optional - Minimum gross amount
- **gross_max** (number) - Optional - Maximum gross amount
- **net_min** (number) - Optional - Minimum net amount
- **net_max** (number) - Optional - Maximum net amount
- **document_no** (string) - Optional - Filter by document number
- **supplier_id** (integer) - Optional - Filter by supplier ID
- **average_exchange_rate_enabled** (boolean) - Optional - Filter by exchange rate status

### Response
#### Success Response (200)
- **Bill** (object) - Bill retrieved successfully

#### Error Responses
- **400** - Bad request
- **401** - Access token is missing or invalid
- **403** - No access rights
```

--------------------------------

### Account Sample Response

Source: https://docs.bexio.com/

This is a sample JSON response for an account object. It includes basic account information such as ID, UUID, account number, name, and status.

```json
[
  {
    "id": 1,
    "uuid": "5fe93c8a-b05f-4004-91f5-9177ffd011fd",
    "account_no": "1",
    "name": "Assets",
    "parent_fibu_account_group_id": 3,
    "is_active": true,
    "is_locked": false
}

]
```

--------------------------------

### Create Additional Address cURL Request

Source: https://docs.bexio.com/

Example cURL request for creating an additional address. This includes the endpoint, headers, and a sample JSON payload.

```curl
curl -X POST \
  https://api.bexio.com/2.0/contact/{contact_id}/additional_address \
  -H 'Accept: application/json' \
  -H 'Content-Type: application/json' \
  -H 'Authorization: Bearer {access-token}' \
  -d '{
  "name": "My new address",
  "name_addition": "Name addition",
  "street_name": "Walter Street",
  "house_number": "22",
  "address_addition": "Building C",
  "postcode": "9000",
  "city": "St. Gallen",
  "country_id": 1,
  "subject": "Additional address",
  "description": "This is an internal description"
}'
```

--------------------------------

### Search Contacts API Example (PHP)

Source: https://docs.bexio.com/

This PHP code defines an array for searching contacts based on name and contact number, then transforms it into JSON format for API requests. Ensure the 'name_1' field is 'Meyer' and 'nr' is greater than 10.

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

```php
json_encode($data);
```

--------------------------------

### Fetch Company Profile

Source: https://docs.bexio.com/

This cURL command demonstrates how to fetch the company profile. Ensure the Accept header is set to application/json.

```curl
curl -X GET \
  https://api.bexio.com/2.0/company_profile \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Create Project API

Source: https://docs.bexio.com/

This endpoint allows you to create a new project within the bexio system.

```APIDOC
## POST /2.0/pr_project

### Description
This action creates a new project.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/pr_project

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **document_nr** (string) - Required - Can not be used if “automatic numbering” is activated in frontend-settings. Required if “automatic numbering” deactivated.
- **name** (string) - Required
- **start_date** (string or null) - <date-time>
- **end_date** (string or null) - <date-time>
- **comment** (string) - Optional
- **pr_state_id** (integer) - Required - References a project status object
- **pr_project_type_id** (integer) - Required - References a project type object
- **contact_id** (integer) - Required - References a contact object
- **contact_sub_id** (integer or null) - Optional - References a contact object
- **pr_invoice_type_id** (integer or null) - Optional - The following invoice types are available: | Id | Name | Description  
---|---|---
1 | type_hourly_rate_service | Hourly rate for client services  
2 | type_hourly_rate_employee | Hourly rate for employee  
3 | type_hourly_rate_project | Hourly rate for project  
4 | type_fix | Fix price for project
- **pr_invoice_type_amount** (string) - Optional - This field can only be edited if the `pr_invoice_type` is set. (Only supported for invoice types: `type_hourly_rate_project` and `type_fix`)
- **pr_budget_type_id** (number or null) - Optional - The following budget types are available: | Id | Name | Description  
---|---|---
1 | type_budgeted_costs | Total budget costs  
2 | type_budgeted_hours | Total budget hours  
3 | type_service_budget | Budget for each client services  
4 | type_service_employees | Budget for each employee
- **pr_budget_type_amount** (string) - Optional - This field can only be edited if the `pr_budget_type` is set. (Only supported for budget types: `type_budgeted_costs` and `type_budgeted_hours`)
- **user_id** (integer) - Required - References a user object

### Request Example
```json
{
  "document_nr": "project name",
  "name": "Villa Kunterbunt",
  "start_date": "2019-07-12 00:00:00",
  "end_date": null,
  "comment": "",
  "pr_state_id": 2,
  "pr_project_type_id": 2,
  "contact_id": 2,
  "contact_sub_id": null,
  "pr_invoice_type_id": 3,
  "pr_invoice_type_amount": "230.00",
  "pr_budget_type_id": 1,
  "pr_budget_type_amount": "200.00",
  "user_id": 1
}
```

### Response
#### Success Response (201)
- **id** (integer) - Description
- **uuid** (string) - Description
- **nr** (string) - Description
- **name** (string) - Description
- **start_date** (string) - Description
- **end_date** (string or null) - Description
- **comment** (string) - Description
- **pr_state_id** (integer) - Description
- **pr_project_type_id** (integer) - Description
- **contact_id** (integer) - Description
- **contact_sub_id** (integer or null) - Description
- **pr_invoice_type_id** (integer) - Description
- **pr_invoice_type_amount** (string) - Description
- **pr_budget_type_id** (integer) - Description
- **pr_budget_type_amount** (string) - Description
- **user_id** (integer) - Description

#### Response Example
```json
{
  "id": 2,
  "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
  "nr": "000002",
  "name": "Villa Kunterbunt",
  "start_date": "2019-07-12 00:00:00",
  "end_date": null,
  "comment": "",
  "pr_state_id": 2,
  "pr_project_type_id": 2,
  "contact_id": 2,
  "contact_sub_id": null,
  "pr_invoice_type_id": 3,
  "pr_invoice_type_amount": "230.00",
  "pr_budget_type_id": 1,
  "pr_budget_type_amount": "200.00",
  "user_id": 1
}
```
```

--------------------------------

### Fetch Default Position via cURL

Source: https://docs.bexio.com/

Retrieve a specific document position using a GET request with Bearer token authentication.

```bash
curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### JSON Payload for Order Repetition

Source: https://docs.bexio.com/

This is a sample JSON payload used for creating or updating order repetitions. It specifies the start and end dates, and the repetition type and interval.

```json
{
  "start": "2019-01-01",
  "end": "2019-12-31",
  "repetition": {
    "type": "daily",
    "interval": 1
}

}
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}

Source: https://docs.bexio.com/

Fetches a specific subtotal position for a given document.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}

### Description
This action fetches a single subtotal position for a document. You need to provide the document type, document ID, and the specific position ID.

### Method
GET

### Endpoint
`https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}`

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - Enum: "kb_offer", "kb_order", "kb_invoice". The type of the document.
- **document_id** (integer) - Required - The ID of the document.
- **position_id** (integer) - Required - The ID of the subtotal position to fetch.

#### Header Parameters
- **Accept** (string) - Required - Example: `application/json`

### Response
#### Success Response (200)
- **id** (integer) - The unique identifier for the subtotal position.
- **text** (string) - The text of the subtotal position.
- **value** (string) - The calculated value of the subtotal position.
- **internal_pos** (integer) - Internal position number.
- **is_optional** (boolean) - Indicates if the position is optional.
- **type** (string) - The type of the position (e.g., `KbPositionSubtotal`).
- **parent_id** (null) - The parent ID, if applicable.

#### Response Example
```json
{
  "id": 1,
  "text": "Subtotal",
  "value": "17.800000",
  "internal_pos": 1,
  "is_optional": false,
  "type": "KbPositionSubtotal",
  "parent_id": null
}
```
```

--------------------------------

### Delete Purchase Order Request

Source: https://docs.bexio.com/

Example request to delete a specific purchase order using cURL.

```cURL
curl -X DELETE \
  https://api.bexio.com/3.0/purchase_orders/{purchase_order_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch Subtotal Position cURL Request

Source: https://docs.bexio.com/

Example cURL command to retrieve a specific subtotal position by ID.

```bash
curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch a list of items

Source: https://docs.bexio.com/

Retrieves a list of all products. Supports pagination and sorting via query parameters.

```cURL
curl -X GET \
  https://api.bexio.com/2.0/article \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Payment Response Sample

Source: https://docs.bexio.com/

JSON structure returned when fetching payment details or listing payments.

```json
[
  {
    "id": 4,
    "date": "2019-06-29",
    "value": "10.0000",
    "bank_account_id": 1,
    "title": "Received Payment",
    "payment_service_id": null,
    "is_client_account_redemption": false,
    "is_cash_discount": false,
    "kb_invoice_id": 1,
    "kb_credit_voucher_id": null,
    "kb_bill_id": null,
    "kb_credit_voucher_text": ""
  }
]
```

--------------------------------

### List Document Templates

Source: https://docs.bexio.com/

Fetches a list of available document templates. Requires 'Accept: application/json' header and bearer token authorization.

```cURL
curl -X GET \
  https://api.bexio.com/3.0/document_templates \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Search Contact Sectors cURL Request

Source: https://docs.bexio.com/

Example cURL request for searching contact sectors. This includes the endpoint and necessary headers.

```curl
curl -X POST \
  https://api.bexio.com/2.0/contact_branch/search \
  -H 'Accept: application/json' \
  -H 'Content-Type: application/json' \
  -d '[
  {
    "field": "search_field",
    "value": "search term",
    "criteria": "="
  }

]'
```

--------------------------------

### POST /2.0/note

Source: https://docs.bexio.com/

Creates a new note.

```APIDOC
## POST /2.0/note

### Description
This action creates a new note.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/note

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **user_id** (integer) - Required - References a user object
- **event_start** (string) - Required - Date-time string
- **subject** (string) - Required - Note subject
- **info** (string) - Optional - Note information
- **contact_id** (integer) - Optional - References a contact object
- **pr_project_id** (integer) - Optional - References a project object

### Response
#### Success Response (201)
- Returns the created note object.

#### Response Example
{
  "id": 4,
  "user_id": 1,
  "event_start": "2019-01-16 14:20:00",
  "subject": "API conception"
}
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}

Source: https://docs.bexio.com/

Fetches a single text position by its ID for a specific document.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}

### Description
This action fetches a single text position for a document.

### Method
GET

### Endpoint
/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - The type of the document.
- **document_id** (integer) - Required - The ID of the document.
- **position_id** (integer) - Required - The ID of the position.
```

--------------------------------

### POST /2.0/article

Source: https://docs.bexio.com/

Creates a new article in the system.

```APIDOC
## POST /2.0/article

### Description
Creates a new article record.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/article

### Request Body
- **user_id** (integer) - Required - References a user object.
- **article_type_id** (integer) - Required - Use 1 for physical products or 2 for services.
- **contact_id** (integer/null) - Optional - References a contact object.
- **deliverer_code** (string/null) - Optional
- **deliverer_name** (string/null) - Optional
- **deliverer_description** (string/null) - Optional
- **intern_code** (string) - Required
- **intern_name** (string) - Required
- **intern_description** (string/null) - Optional
- **purchase_price** (string/null) - Optional
- **sale_price** (string/null) - Optional
- **purchase_total** (number/null) - Optional
- **sale_total** (number/null) - Optional
- **currency_id** (integer/null) - Optional - References a currency object.
- **tax_income_id** (integer/null) - Optional - References a tax object.
- **tax_expense_id** (integer/null) - Optional - References a tax object.
- **unit_id** (integer/null) - Optional - References a unit object.
- **is_stock** (boolean) - Optional - Requires stock_edit scope.
- **stock_id** (integer/null) - Optional - References a stock location object.
- **stock_place_id** (integer/null) - Optional - References a stock area object.
- **stock_nr** (integer) - Optional - Can only be set if no bookings exist.
- **stock_min_nr** (integer) - Optional
- **width** (integer/null) - Optional
- **height** (integer/null) - Optional
- **weight** (integer/null) - Optional
- **volume** (integer/null) - Optional
- **html_text** (string/null) - Optional - Deprecated.
- **remarks** (string/null) - Optional
- **delivery_price** (number/null) - Optional
- **article_group_id** (integer/null) - Optional
- **account_id** (integer/null) - Optional - References an account object.
- **expense_account_id** (integer/null) - Optional - References an account object.

### Request Example
{
  "user_id": 1,
  "article_type_id": 1,
  "contact_id": 14,
  "intern_code": "wh-2019",
  "intern_name": "Webhosting",
  "is_stock": false,
  "stock_nr": 0,
  "stock_min_nr": 0
}

### Response
#### Success Response (201)
- **id** (integer) - The created article ID.

#### Response Example
{
  "id": 4,
  "user_id": 1,
  "article_type_id": 1,
  "intern_code": "wh-2019",
  "intern_name": "Webhosting"
}
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}

Source: https://docs.bexio.com/

Fetches a single sub position for a specific document using its ID.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}

### Description
Fetches a single sub position for a specific document using its ID.

### Method
GET

### Endpoint
`https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}`

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - Enum: "kb_offer" "kb_order" "kb_invoice" - The type of the document. Sub positions can be added to quotes, orders and invoices.
- **document_id** (integer) - Required - The ID of the document. E.g. if the `kb_document_type` is set to `kb_invoice` the `document_id` must be set to the ID of the invoice.
- **position_id** (integer) - Required - The ID of the sub position to fetch.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The ID of the sub position.
- **text** (string) - The text for the sub position.
- **pos** (integer) - The position number.
- **internal_pos** (integer) - The internal position number.
- **show_pos_nr** (boolean) - Whether the position number is shown.
- **is_optional** (boolean) - Whether the sub position is optional.
- **total_sum** (string) - The total sum of the sub position.
- **show_pos_prices** (boolean) - Whether to show prices for the sub position.
- **type** (string) - The type of the item (e.g., "KbPositionSubposition").
- **parent_id** (null) - The ID of the parent item, if any.

#### Response Example
```json
{
  "id": 1,
  "text": "This is a container to group other position types",
  "pos": 1,
  "internal_pos": 1,
  "show_pos_nr": true,
  "is_optional": false,
  "total_sum": "17.800000",
  "show_pos_prices": true,
  "type": "KbPositionSubposition",
  "parent_id": null
}
```
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}

Source: https://docs.bexio.com/

Fetches a single custom position for a specified document type, document ID, and position ID.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}

### Description
Fetches a single custom position for a specified document type, document ID, and position ID.

### Method
GET

### Endpoint
`https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}`

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - Enum: "kb_offer" "kb_order" "kb_invoice". Example: kb_invoice
- **document_id** (integer) - Required - Example: 1
- **position_id** (integer) - Required - Example: 1

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Description
- **amount** (string) - Description
- **amount_reserved** (string) - Description
- **amount_open** (string) - Description
- **amount_completed** (string) - Description
- **unit_id** (integer) - Description
- **account_id** (integer) - Description
- **unit_name** (string) - Description
- **tax_id** (integer) - Description
- **tax_value** (string) - Description
- **text** (string) - Description
- **unit_price** (string) - Description
- **discount_in_percent** (string) - Description
- **position_total** (string) - Description
- **pos** (integer) - Description
- **internal_pos** (integer) - Description
- **is_optional** (boolean) - Description
- **type** (string) - Description
- **parent_id** (null) - Description

#### Response Example
```json
{
  "id": 1,
  "amount": "5.000000",
  "amount_reserved": "5.000000",
  "amount_open": "5.000000",
  "amount_completed": "5.000000",
  "unit_id": 1,
  "account_id": 1,
  "unit_name": "kg",
  "tax_id": 4,
  "tax_value": "7.70",
  "text": "Apples",
  "unit_price": "3.560000",
  "discount_in_percent": "0.000000",
  "position_total": "17.800000",
  "pos": 1,
  "internal_pos": 1,
  "is_optional": false,
  "type": "KbPositionCustom",
  "parent_id": null
}
```
```

--------------------------------

### Search Contact Sectors Request Body Example

Source: https://docs.bexio.com/

This JSON payload is used to search for contact sectors. Specify the 'field' to search within, the 'value' to search for, and the 'criteria' for the search.

```json
[
  {
    "field": "search_field",
    "value": "search term",
    "criteria": "="
  }

]
```

--------------------------------

### GET /4.0/banking/payments/{payment_id}

Source: https://docs.bexio.com/

Retrieves the details of a specific payment using its unique UUID.

```APIDOC
## GET /4.0/banking/payments/{payment_id}

### Description
Retrieves the details of a specific payment using its unique UUID.

### Method
GET

### Endpoint
https://api.bexio.com/4.0/banking/payments/{payment_id}

### Parameters
#### Path Parameters
- **payment_id** (string) - Required - The UUID of the payment to retrieve.

#### Header Parameters
- **Accept** (string) - Required - Specifies the desired response format. Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/4.0/banking/payments/{payment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **id** (integer) - The unique identifier of the payment.
- **uuid** (string) - The unique UUID of the payment.
- **sender** (object) - Information about the sender.
- **recipient** (object) - Information about the payment recipient.
- **amount** (string) - The amount of the payment.
- **currency** (string) - The currency of the payment.
- **execution_date** (string) - The execution date of the payment.
- **allowance** (string) - The fee allowance setting.
- **is_salary** (boolean) - Indicates if it's a salary payment.
- **instruction_id** (string) - The instruction ID for the payment.
- **purchase_reference** (object) - Purchase reference details.
- **document_no** (string) - The document number.
- **qr_reference_number** (string) - The QR reference number.
- **additional_information** (string) - Additional information for the payment.
- **status** (string) - The current status of the payment.
- **type** (string) - The type of payment.
- **due_date** (string) - The due date of the payment.
- **created_at** (string) - The timestamp when the payment was created.
- **is_editing_restricted** (boolean) - Indicates if editing is restricted.
```

--------------------------------

### Sample Response After Editing Item Position

Source: https://docs.bexio.com/

This is a sample JSON response indicating a successful edit of an item position. It reflects the updated state of the item position.

```json
{
  "id": 1,
  "amount": "5.000000",
  "amount_reserved": "5.000000",
  "amount_open": "5.000000",
  "amount_completed": "5.000000",
  "unit_id": 1,
  "account_id": 1,
  "unit_name": "kg",
  "tax_id": 4,
  "tax_value": "7.70",
  "text": "Apples",
  "unit_price": "3.560000",
  "discount_in_percent": "0.000000",
  "position_total": "17.800000",
  "pos": 1,
  "internal_pos": 1,
  "is_optional": null,
  "article_id": 3,
  "type": "KbPositionArticle",
  "parent_id": null
}
```

--------------------------------

### Update Expense cURL Example

Source: https://docs.bexio.com/

This cURL command demonstrates how to update an expense using a PUT request to the Bexio API. Replace '{id}' with the actual expense ID.

```bash
curl -X PUT \
  https://api.bexio.com/4.0/expenses/{id} \
  -H 'Content-Type: application/json' \
  -d '{ "currency_code": "CHF", "exchange_rate": 1.5497651324, "paid_on": "2019-03-20", "supplier_id": 123, "document_no": "LR-12345", "title": "Expense 42", "bank_account_id": 5, "booking_account_id": 16, "amount": 80.54, "tax_id": 15, "base_currency_amount": 167.87, "attachment_ids": [ "06573f59-01a2-493d-9876-462deda4cee3", "a230f087-f742-4259-925e-cf3abea5e6bf" ], "address": { "title": "Prof", "salutation": "Ms", "firstname_suffix": "John", "lastname_company": "Newman", "address_line": "Mega Street", "postcode": "6694", "city": "Tel Aviv", "country_code": "CH", "main_contact_id": 45, "contact_address_id": 827, "type": "PRIVATE" } }'
```

--------------------------------

### GET /4.0/purchase/outgoing-payments/{id}

Source: https://docs.bexio.com/

Retrieves the details of a specific outgoing payment by its unique identifier.

```APIDOC
## GET /4.0/purchase/outgoing-payments/{id}

### Description
Endpoint for retrieving Outgoing Payment by id.

### Method
GET

### Endpoint
/4.0/purchase/outgoing-payments/{id}

### Parameters
#### Path Parameters
- **id** (string <uuid>) - Required - id of Outgoing Payment to retrieve

### Response
#### Success Response (200)
- **id** (string) - Payment ID
- **status** (string) - Current status of the payment
- **created_at** (string) - Timestamp of creation
- **bill_id** (string) - Associated bill ID
- **amount** (number) - Payment amount
- **currency_code** (string) - Currency code

#### Response Example
{
  "id": "f68e87e0-fa2d-4576-91c6-15f7b6876003",
  "status": "DOWNLOADED",
  "created_at": "2019-06-27T10:25:50+0200",
  "bill_id": "22c306ad-c158-4792-b557-72340df816f5",
  "payment_type": "IBAN",
  "execution_date": "2019-10-15",
  "amount": 45.98,
  "currency_code": "CHF"
}
```

--------------------------------

### POST /2.0/kb_order

Source: https://docs.bexio.com/

Creates a new sales order document in the Bexio system.

```APIDOC
## POST /2.0/kb_order

### Description
Creates a new sales order (kb_order) in the Bexio system. You can include various types of positions such as custom items, articles, or subtotals.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/kb_order

### Request Body
- **document_nr** (string) - Optional - Required if automatic numbering is deactivated.
- **title** (string) - Optional
- **contact_id** (integer) - Required - References a contact object.
- **contact_sub_id** (integer) - Optional - References a contact object.
- **user_id** (integer) - Required - References a user object.
- **pr_project_id** (integer) - Optional - References a project object.
- **logopaper_id** (integer) - Optional - Deprecated.
- **language_id** (integer) - Required - References a language object.
- **bank_account_id** (integer) - Required - References a bank account object.
- **currency_id** (integer) - Required - References a currency object.
- **payment_type_id** (integer) - Required - References a payment type object.
- **header** (string) - Optional
- **footer** (string) - Optional
- **mwst_type** (integer) - Optional - 0: including taxes, 1: excluding taxes, 2: exempt from taxes.
- **mwst_is_net** (boolean) - Optional - Affects total if mwst_type is 0.
- **show_position_taxes** (boolean) - Optional
- **is_valid_from** (string) - Optional - Date format.
- **contact_address_manual** (string) - Optional - Manual contact address.
- **delivery_address_type** (integer) - Optional - 0: use invoice address, 1: use custom address.
- **delivery_address_manual** (string) - Optional - Manual delivery address if type is 1.
- **api_reference** (string) - Optional - Reference to other systems.
- **template_slug** (string) - Optional - References a document template.
- **positions** (array) - Optional - List of position objects.

### Request Example
{
  "document_nr": "AU-00001",
  "contact_id": 14,
  "user_id": 1,
  "language_id": 1,
  "bank_account_id": 1,
  "currency_id": 1,
  "payment_type_id": 1,
  "mwst_type": 0,
  "mwst_is_net": true,
  "positions": [
    {
      "type": "KbPositionCustom",
      "text": "Apples",
      "unit_price": "3.560000"
    }
  ]
}

### Response
#### Success Response (201)
- Created

#### Error Response (422)
- Validation error
```

--------------------------------

### Show File Usage

Source: https://docs.bexio.com/

Queries the usage details of a specific file.

```APIDOC
## GET /3.0/files/{file_id}/usage

### Description
Queries the requested file from the backend to show its usage.

### Method
GET

### Endpoint
/3.0/files/{file_id}/usage

### Parameters
#### Path Parameters
- **file_id** (integer) - Required - File ID to show.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/3.0/files/{file_id}/usage \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
OK

#### Response Example
```json
{
  "id": 1,
  "ref_class": "KbInvoice",
  "title": "RE-00001",
  "document_nr": "RE-00001"
}
```
```

--------------------------------

### Sample JSON Response for Fetching a Task

Source: https://docs.bexio.com/

This JSON object represents the successful response when fetching a single task. It contains all the details of the requested task.

```json
{
  "id": 1,
  "user_id": 1,
  "finish_date": "2018-04-09T07:44:10+00:00",
  "subject": "Unterlagen versenden",
  "place": 0,
  "info": "so schnell wie möglich.",
  "contact_id": 1,
  "sub_contact_id": null,
  "project_id": null,
  "entry_id": null,
  "module_id": null,
  "todo_status_id": 1,
  "todo_priority_id": null,
  "has_reminder": false,
  "remember_type_id": null,
  "remember_time_id": null,
  "communication_kind_id": null

}
```

--------------------------------

### Fetch a List of Work Packages

Source: https://docs.bexio.com/

Retrieves a list of all work packages for a specified project, with options for limiting and offsetting results.

```APIDOC
## GET /3.0/projects/{project_id}/packages

### Description
Fetches a list of all work packages for a given project.

### Method
GET

### Endpoint
/3.0/projects/{project_id}/packages

### Parameters
#### Path Parameters
- **project_id** (integer) - Required - The ID of the project.

#### Query Parameters
- **limit** (integer) - Optional - Limits the number of results (max is 2000). Default: 500.
- **offset** (integer) - Optional - Skips over a number of elements by specifying an offset value for the query. Default: 0.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```json
{
  "example": ""
}
```

### Response
#### Success Response (200)
- **id** (integer) - The ID of the work package.
- **name** (string) - The name of the work package.
- **spent_time_in_hours** (number) - Time spent on the work package.
- **estimated_time_in_hours** (number) - Estimated time for the work package.
- **comment** (string) - A comment describing the work package.
- **pr_milestone_id** (integer) - The ID of the associated milestone.

#### Response Example
```json
[
  {
    "id": 4,
    "name": "Documentation",
    "spent_time_in_hours": 0.5,
    "estimated_time_in_hours": 1.75,
    "comment": "Crete project documentation",
    "pr_milestone_id": 3
  }
]
```
```

--------------------------------

### Fetch Notes via cURL

Source: https://docs.bexio.com/

Use this cURL command to retrieve a list of all notes.

```bash
curl -X GET \
  https://api.bexio.com/2.0/note \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch a List of Work Packages using cURL

Source: https://docs.bexio.com/

This cURL command retrieves a list of all work packages associated with a specific project. You can use query parameters like 'limit' and 'offset' to paginate results.

```bash
curl -X GET \
  https://api.bexio.com/3.0/projects/{project_id}/packages \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Retrieve a Purchase Bill by ID

Source: https://docs.bexio.com/

Use this cURL command to make a GET request to retrieve a specific purchase bill. Ensure you replace `{id}` with the actual bill ID and `{access-token}` with your valid Bearer token.

```cURL
curl -X GET \
  https://api.bexio.com/4.0/purchase/bills/{id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Retrieve Expenses via cURL

Source: https://docs.bexio.com/

Use this cURL command to fetch a list of expenses. Ensure you replace {access-token} with a valid bearer token.

```bash
curl -X GET \
  https://api.bexio.com/4.0/expenses \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/comment

Source: https://docs.bexio.com/

Fetches a list of comments for a specific document. You need to provide the document type (e.g., 'kb_invoice') and the document ID.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/comment

### Description
Fetches a list of comments for a specific document. You need to provide the document type (e.g., 'kb_invoice') and the document ID.

### Method
GET

### Endpoint
https://api.bexio.com/2.0/{kb_document_type}/{document_id}/comment

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - Enum: "kb_offer", "kb_order", "kb_invoice" - The type of the document. Item positions can be added to quotes, orders and invoices.
- **document_id** (integer) - Required - The ID of the document. E.g. if the `kb_document_type` is set to `kb_invoice` the `document_id` must be set to the ID of the invoice.

#### Query Parameters
- **limit** (integer) - Optional - Limit the number of results (max is 2000). Default: 500
- **offset** (integer) - Optional - Skip over a number of elements by specifying an offset value for the query. Default: 0

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Description
- **text** (string) - Description
- **user_id** (integer) - Description
- **user_email** (string or null) - Description
- **user_name** (string) - Description
- **date** (string) - Description
- **is_public** (boolean) - Description
- **image** (string) - Description
- **image_path** (string) - Description

### Response Example
```json
[
  {
    "id": 4,
    "text": "Sample comment",
    "user_id": 1,
    "user_email": null,
    "user_name": "Peter Smith",
    "date": "2019-07-18 15:41:53",
    "is_public": false,
    "image": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=",
    "image_path": "https://my.bexio.com/img/profile_picture/j2cbWl-yp3zT9oOh9jHTAA/Ds8buEV0HXZsvuBm3df8SQ.png?type=thumb"
  }
]
```
```

--------------------------------

### Send an Invoice via Email using Bexio API

Source: https://docs.bexio.com/

This section shows the JSON payload for sending an invoice via email and a cURL example. The message must include '[Network Link]'.

```json
{
  "recipient_email": "example@bexio.com",
  "subject": "Your new document",
  "message": "Please find the document at [Network Link]",
  "mark_as_open": true,
  "attach_pdf": true

}
```

```curl
curl -X POST \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/send \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}' \
  -d '{
  "recipient_email": "example@bexio.com",
  "subject": "Your new document",
  "message": "Please find the document at [Network Link]",
  "mark_as_open": true,
  "attach_pdf": true

}'
```

--------------------------------

### Update Expense Node.JS Example

Source: https://docs.bexio.com/

This Node.js code snippet uses the 'axios' library to send a PUT request to update an expense. The expense details are sent as a JSON payload.

```javascript
const axios = require('axios');

const url = 'https://api.bexio.com/4.0/expenses/{id}';

const payload = {
    "currency_code": "CHF",
    "exchange_rate": 1.5497651324,
    "paid_on": "2019-03-20",
    "supplier_id": 123,
    "document_no": "LR-12345",
    "title": "Expense 42",
    "bank_account_id": 5,
    "booking_account_id": 16,
    "amount": 80.54,
    "tax_id": 15,
    "base_currency_amount": 167.87,
    "attachment_ids": [
        "06573f59-01a2-493d-9876-462deda4cee3",
        "a230f087-f742-4259-925e-cf3abea5e6bf"
    ],
    "address": {
        "title": "Prof",
        "salutation": "Ms",
        "firstname_suffix": "John",
        "lastname_company": "Newman",
        "address_line": "Mega Street",
        "postcode": "6694",
        "city": "Tel Aviv",
        "country_code": "CH",
        "main_contact_id": 45,
        "contact_address_id": 827,
        "type": "PRIVATE"
    }
};

const headers = {
    'Content-Type': 'application/json'
};

axios.put(url, payload, { headers: headers })
    .then(response => {
        console.log(response.data);
    })
    .catch(error => {
        console.error(error);
    });

```

--------------------------------

### Update Expense PHP Example

Source: https://docs.bexio.com/

This PHP code snippet demonstrates how to update an expense using cURL. It sends a PUT request with the expense data as a JSON payload.

```php
<?php

$curl = curl_init();

$data = array(
    "currency_code" => "CHF",
    "exchange_rate" => 1.5497651324,
    "paid_on" => "2019-03-20",
    "supplier_id" => 123,
    "document_no" => "LR-12345",
    "title" => "Expense 42",
    "bank_account_id" => 5,
    "booking_account_id" => 16,
    "amount" => 80.54,
    "tax_id" => 15,
    "base_currency_amount" => 167.87,
    "attachment_ids" => array(
        "06573f59-01a2-493d-9876-462deda4cee3",
        "a230f087-f742-4259-925e-cf3abea5e6bf"
    ),
    "address" => array(
        "title" => "Prof",
        "salutation" => "Ms",
        "firstname_suffix" => "John",
        "lastname_company" => "Newman",
        "address_line" => "Mega Street",
        "postcode" => "6694",
        "city" => "Tel Aviv",
        "country_code" => "CH",
        "main_contact_id" => 45,
        "contact_address_id" => 827,
        "type" => "PRIVATE"
    )
);

curl_setopt($curl, CURLOPT_URL, 'https://api.bexio.com/4.0/expenses/{id}');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json'
));

$response = curl_exec($curl);

if (curl_errno($curl)) {
    echo 'Error:' . curl_error($curl);
}

c_url_close($curl);

echo $response;
?>

```

--------------------------------

### Fetch all currency codes (cURL)

Source: https://docs.bexio.com/

Use this endpoint to retrieve all available currency codes. Ensure your request includes the 'Accept' and 'Authorization' headers.

```bash
curl -X GET \
  https://api.bexio.com/3.0/currencies/codes \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Get Next Reference Number

Source: https://docs.bexio.com/

This cURL request retrieves the next available reference number for a manual entry. Include your authorization token in the header.

```cURL
curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/next_ref_nr \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /4.0/payroll/employees/{employeeId}/absences/{absenceId}

Source: https://docs.bexio.com/

Retrieves a specific absence record for an employee by its ID.

```APIDOC
## Retrieving absence for employee with given absence id

### Description
Retrieves a specific absence record for an employee by its ID.

### Method
GET

### Endpoint
/4.0/payroll/employees/{employeeId}/absences/{absenceId}

### Parameters
#### Path Parameters
- **employeeId** (string) - Required - Id of an employee
- **absenceId** (string) - Required - Id of an absence

### Responses
#### Success Response (200)
- **reason** (string) - Reason for absence
- **start_date** (string) - Start date of absence
- **end_date** (string) - End date of absence
- **half_day** (boolean) - Indicates if it's a half-day absence
- **continued_pay** (number) - Continued pay amount
- **disability** (number) - Disability amount
- **paid_hours** (number) - Paid hours
- **id** (string) - Unique identifier for the absence

#### Error Responses
- **400** - Malformed request (missing or invalid parameters)
- **404** - Employee or absence not found
- **410** - Employee has been deleted

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/4.0/payroll/employees/{employeeId}/absences/{absenceId} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response Example (200)
```json
{
  "reason": "Injury",
  "start_date": "2024-01-31",
  "end_date": "2024-01-31",
  "half_day": false,
  "continued_pay": 0,
  "disability": 0,
  "paid_hours": 0,
  "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08"
}
```
```

--------------------------------

### POST /2.0/title

Source: https://docs.bexio.com/

Create a new title.

```APIDOC
## POST /2.0/title

### Description
This action creates a new title.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/title

### Parameters
#### Request Body
- **name** (string) - Required - The name of the title

### Response
#### Success Response (201)
- Created
```

--------------------------------

### POST /accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files

Source: https://docs.bexio.com/

Uploads and attaches files to an existing accounting entry line.

```APIDOC
## POST /accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files

### Description
Uploads one or multiple files and attaches them to an existing accounting entry line. Requires multipart/form-data content type.

### Method
POST

### Endpoint
https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files

### Parameters
#### Path Parameters
- **manual_entry_id** (integer) - Required - The ID of the manual entry.
- **entry_id** (integer) - Required - The ID of a single entry in the manual_entry object.

#### Request Body
- **fileName** (array) - Required - Array of files to upload.

### Response
#### Success Response (201)
- **file** (object) - The created file object.

#### Response Example
[
  {
    "id": 1,
    "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",
    "name": "screenshot",
    "size_in_bytes": 218476,
    "extension": "png",
    "mime_type": "image/png",
    "uploader_email": "contact@example.org",
    "user_id": 1,
    "is_archived": false,
    "source_id": 2,
    "source_type": "web",
    "is_referenced": false,
    "created_at": "2018-06-09T08:52:10+00:00"
  }
]
```

--------------------------------

### Fetch Stock Locations via cURL

Source: https://docs.bexio.com/

Retrieve a list of all available stock locations.

```bash
curl -X GET \
  https://api.bexio.com/2.0/stock \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Create Work Package

Source: https://docs.bexio.com/

Creates a new work package within a specified project.

```APIDOC
## POST /3.0/projects/{project_id}/packages

### Description
Creates a new work package.

### Method
POST

### Endpoint
/3.0/projects/{project_id}/packages

### Parameters
#### Path Parameters
- **project_id** (integer) - Required - The ID of the project.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body schema: application/json
- **name** (string) - Required - Max 255 characters. The name of the work package.
- **spent_time_in_hours** (number) - Optional - Time spent on the work package.
- **estimated_time_in_hours** (number) - Optional - Estimated time for the work package.
- **comment** (string) - Optional - Max 10000 characters. Description for the work package.
- **pr_milestone_id** (integer) - Optional - References a milestone object.

### Request Example
```json
{
  "name": "Documentation",
  "spent_time_in_hours": 0.5,
  "estimated_time_in_hours": 1.75,
  "comment": "Crete project documentation",
  "pr_milestone_id": 3
}
```

### Response
#### Success Response (201)
- **id** (integer) - The ID of the newly created work package.
- **name** (string) - The name of the work package.
- **spent_time_in_hours** (number) - Time spent on the work package.
- **estimated_time_in_hours** (number) - Estimated time for the work package.
- **comment** (string) - A comment describing the work package.
- **pr_milestone_id** (integer) - The ID of the associated milestone.

#### Response Example
```json
{
  "id": 4,
  "name": "Documentation",
  "spent_time_in_hours": 0.5,
  "estimated_time_in_hours": 1.75,
  "comment": "Crete project documentation",
  "pr_milestone_id": 3
}
```
```

--------------------------------

### Get Contact Branches cURL Request

Source: https://docs.bexio.com/

Use this cURL command to retrieve a list of contact branches. Ensure you include your access token in the Authorization header.

```curl
curl -X GET \
  https://api.bexio.com/2.0/contact_branch \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Unit Response Sample

Source: https://docs.bexio.com/

Standard JSON response format for unit operations.

```json
[
  {
    "id": 1,
    "name": "h"
  }
]
```

--------------------------------

### Fetch Quotes using cURL

Source: https://docs.bexio.com/

Use this cURL command to make a GET request to the Bexio API to retrieve quote data. Ensure you include your access token in the Authorization header.

```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_offer \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /3.0/purchase_orders

Source: https://docs.bexio.com/

Creates a new purchase order. Requires an Accept header and authorization.

```APIDOC
## POST /3.0/purchase_orders

### Description
Creates a new purchase order.

### Method
POST

### Endpoint
https://api.bexio.com/3.0/purchase_orders

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Body
*Note: The request body schema is not provided in the source text. Please refer to Bexio API documentation for details.*

### Response
#### Success Response (201)
*Note: The success response schema is not provided in the source text. Please refer to Bexio API documentation for details.*

#### Error Response
*Note: Error response details are not provided in the source text. Please refer to Bexio API documentation for details.*

### Request Example
*Note: A specific request example for creating a purchase order is not provided in the source text.*

### Response Example
*Note: A specific response example for creating a purchase order is not provided in the source text.*
```

--------------------------------

### Response Sample for Text Position

Source: https://docs.bexio.com/

This is a sample JSON response for a text position. It includes details like ID, text content, and display settings.

```json
{
  "id": 1,
  "text": "This position type allows to add free text to a document",
  "show_pos_nr": false,
  "pos": null,
  "internal_pos": 1,
  "is_optional": false,
  "type": "KbPositionText",
  "parent_id": null

}
```

--------------------------------

### Get Invoice PDF via cURL

Source: https://docs.bexio.com/

Retrieve a PDF document of an invoice using its ID. This cURL command requires an authorization token and specifies the desired content type.

```bash
curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch Bank Accounts Request

Source: https://docs.bexio.com/

Retrieves a list of all bank accounts.

```bash
curl -X GET \
  https://api.bexio.com/3.0/banking/accounts \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /2.0/pr_project/{project_id}/reactivate

Source: https://docs.bexio.com/

Unarchives an archived project.

```APIDOC
## POST /2.0/pr_project/{project_id}/reactivate

### Description
This action unarchives an archived project.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/pr_project/{project_id}/reactivate

### Parameters
#### Path Parameters
- **project_id** (integer) - Required - The id of the project

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **success** (boolean) - Indicates if the reactivation was successful

#### Response Example
{
  "success": true
}
```

--------------------------------

### Response Sample for Creating Additional Address

Source: https://docs.bexio.com/

This is a sample JSON response when an additional address is successfully created. It includes the assigned ID and all provided details.

```json
{
  "id": 1,
  "name": "My new address",
  "name_addition": "Name addition",
  "address": "Walter Street 22",
  "street_name": "Walter Street",
  "house_number": "22",
  "address_addition": "Building C",
  "postcode": "9000",
  "city": "St. Gallen",
  "country_id": 1,
  "subject": "Additional address",
  "description": "This is an internal description"
}
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}

Source: https://docs.bexio.com/

Fetches a specific pagebreak position for a given document. Requires the document type, document ID, and the specific pagebreak position ID.

```APIDOC
## Fetch Pagebreak Position

### Description
This action fetches a single pagebreak position for a document. You need to provide the document type, document ID, and the specific `position_id` of the pagebreak you want to retrieve.

### Method
GET

### Endpoint
`/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}`

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - Enum: "kb_offer" "kb_order" "kb_invoice" - The type of the document. Pagebreak positions can be added to quotes, orders and invoices.
- **document_id** (integer) - Required - The ID of the document. E.g. if the `kb_document_type` is set to `kb_invoice` the `document_id` must be set to the ID of the invoice.
- **position_id** (integer) - Required - The ID of the pagebreak position to fetch.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The ID of the pagebreak position.
- **internal_pos** (integer) - The internal position of the pagebreak.
- **is_optional** (boolean) - Indicates if the pagebreak is optional.
- **type** (string) - The type of the object, always "KbPositionPagebreak".
- **parent_id** (integer) - The ID of the parent document.

#### Response Example
```json
{
  "id": 1,
  "internal_pos": 1,
  "is_optional": false,
  "type": "KbPositionPagebreak",
  "parent_id": null
}
```
```

--------------------------------

### Fetch a Single Work Package using cURL

Source: https://docs.bexio.com/

Use this cURL command to retrieve details for a specific work package within a project. Replace placeholders with the correct project and package IDs.

```bash
curl -X GET \
  https://api.bexio.com/3.0/projects/{project_id}/packages/{package_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Document Settings API

Source: https://docs.bexio.com/

Fetches a list of all document settings.

```APIDOC
## GET /document_settings

### Description
Fetches a list of all document settings.

### Method
GET

### Endpoint
/document_settings

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
(Response structure not provided in the source text)

#### Response Example
(No example provided in the source text)
```

--------------------------------

### GET /4.0/payroll/employees/{employeeId}/absences

Source: https://docs.bexio.com/

Retrieves a list of absences for a specific employee for a given business year.

```APIDOC
## Retrieving absences of employee for given year

### Description
Retrieves a list of absences for a specific employee for a given business year.

### Method
GET

### Endpoint
/4.0/payroll/employees/{employeeId}/absences

### Parameters
#### Path Parameters
- **employeeId** (string) - Required - Id of an employee

#### Query Parameters
- **businessYear** (integer) - Required - Year of absence

### Responses
#### Success Response (200)
- **data** (array) - List of employee absences
  - **reason** (string) - Reason for absence
  - **start_date** (string) - Start date of absence
  - **end_date** (string) - End date of absence
  - **half_day** (boolean) - Indicates if it's a half-day absence
  - **continued_pay** (number) - Continued pay amount
  - **disability** (number) - Disability amount
  - **paid_hours** (number) - Paid hours
  - **id** (string) - Unique identifier for the absence

#### Error Responses
- **400** - Malformed request (missing or invalid parameters)
- **404** - Employee not found
- **410** - Employee has been deleted

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/4.0/payroll/employees/{employeeId}/absences \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response Example (200)
```json
{
  "data": [
    {
      "reason": "Injury",
      "start_date": "2024-01-31",
      "end_date": "2024-01-31",
      "half_day": false,
      "continued_pay": 0,
      "disability": 0,
      "paid_hours": 0,
      "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08"
    }
  ]
}
```
```

--------------------------------

### Fetch Default Positions (cURL)

Source: https://docs.bexio.com/

Use this cURL command to fetch a list of default positions for a document. Ensure to specify the document type, ID, and include your authorization token.

```bash
curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Sample Search Response for Invoice Reminders

Source: https://docs.bexio.com/

This is a sample JSON response when searching for invoice reminders. It returns an array of reminder objects that match the search criteria.

```json
[
  {
    "id": 4,
    "kb_invoice_id": 1,
    "title": "First reminder",
    "is_valid_from": "2019-06-24",
    "is_valid_to": "2019-07-24",
    "reminder_period_in_days": 14,
    "reminder_level": 1,
    "show_positions": true,
    "remaining_price": "17.8000",
    "received_total": "0.0000",
    "is_sent": false,
    "header": null,
    "footer": null
}

]
```

--------------------------------

### Fetch a Work Package

Source: https://docs.bexio.com/

Retrieves details for a specific work package within a project.

```APIDOC
## GET /3.0/projects/{project_id}/packages/{package_id}

### Description
Fetches a single work package.

### Method
GET

### Endpoint
/3.0/projects/{project_id}/packages/{package_id}

### Parameters
#### Path Parameters
- **project_id** (integer) - Required - The ID of the project.
- **package_id** (integer) - Required - The ID of the work package.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```json
{
  "example": ""
}
```

### Response
#### Success Response (200)
- **id** (integer) - The ID of the work package.
- **name** (string) - The name of the work package.
- **spent_time_in_hours** (number) - Time spent on the work package.
- **estimated_time_in_hours** (number) - Estimated time for the work package.
- **comment** (string) - A comment describing the work package.
- **pr_milestone_id** (integer) - The ID of the associated milestone.

#### Response Example
```json
{
  "id": 4,
  "name": "Documentation",
  "spent_time_in_hours": 0.5,
  "estimated_time_in_hours": 1.75,
  "comment": "Crete project documentation",
  "pr_milestone_id": 3
}
```
```

--------------------------------

### Create Employee

Source: https://docs.bexio.com/

Creates a new employee record.

```APIDOC
## POST /4.0/payroll/employees

### Description
Creates a new employee record.

### Method
POST

### Endpoint
/4.0/payroll/employees

### Parameters
#### Request Body
- **email** (string) - Required
- **first_name** (string) - Required
- **last_name** (string) - Required
- **personal_number** (string) - Required
- **nationality** (string) - Required - Nation should be in ISO Alpha-2 format. Special values: '11' means 'unknown', '22' means 'stateless'.
- **iban** (string) - Optional
- **ahv_number** (string) - Optional
- **marital_status** (string) - Optional - Default: "unknown". Enum: "unknown", "single", "married", "separated", "registered_partnership", "partnership_dissolved_by_law", "partnership_dissolved_by_death", "partnership_dissolved_by_declaration_of_lost", "widowed", "divorced"
- **gender** (string) - Optional - Enum: "male", "female"
- **date_of_birth** (string) - Optional - <date>
- **address** (object) - Optional
- **language** (string) - Optional - Default: "de". Enum: "de", "it", "fr", "en"
- **phone_number** (string) - Optional
- **annual_vacation_days** (integer) - Optional - <int32>

### Response
#### Success Response (201)
Employee created.

#### Error Response (400)
Malformed content (missing or invalid parameters).

### Request Example
```json
{
  "email": "string",
  "first_name": "string",
  "last_name": "string",
  "personal_number": "string",
  "nationality": "CH",
  "iban": "string",
  "ahv_number": "string",
  "marital_status": "unknown",
  "gender": "male",
  "date_of_birth": "2024-01-31",
  "address": {},
  "language": "de",
  "phone_number": "string",
  "annual_vacation_days": 0
}
```
```

--------------------------------

### POST /2.0/client_service/search

Source: https://docs.bexio.com/

Search business activities via query.

```APIDOC
## POST /2.0/client_service/search

### Description
Search business activities via query. Supported search field: name.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/client_service/search

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Default: "id" - Enum: "id", "name"
- **limit** (integer) - Optional - Default: 500
- **offset** (integer) - Optional - Default: 0

#### Request Body
- **field** (string) - Required - Field to search over
- **value** (string) - Required - Value to search for
- **criteria** (string) - Optional - Default: "like"

### Request Example
[
  {
    "field": "search_field",
    "value": "search term",
    "criteria": "="
  }
]

### Response
#### Success Response (200)
- OK
```

--------------------------------

### Fetch file of manual compound entry

Source: https://docs.bexio.com/

Fetches a file associated with a specific compound entry. Requires the manual entry ID and the file ID.

```APIDOC
## GET /3.0/accounting/manual_entries/{manual_entry_id}/files/{file_id}

### Description
This action fetches a file associated with a specific compound entry.

### Method
GET

### Endpoint
/3.0/accounting/manual_entries/{manual_entry_id}/files/{file_id}

### Parameters
#### Path Parameters
- **manual_entry_id** (integer) - Required - The ID of the manual entry.
- **file_id** (integer) - Required - The ID of the file.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files/{file_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
OK
- **id** (integer) - Description
- **uuid** (string) - Description
- **name** (string) - Description
- **size_in_bytes** (integer) - Description
- **extension** (string) - Description
- **mime_type** (string) - Description
- **uploader_email** (string) - Description
- **user_id** (integer) - Description
- **is_archived** (boolean) - Description
- **source_id** (integer) - Description
- **source_type** (string) - Description
- **is_referenced** (boolean) - Description
- **created_at** (string) - Description
- **data** (string) - Description

#### Response Example
```json
{
  "id": 1,
  "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314",
  "name": "screenshot",
  "size_in_bytes": 218476,
  "extension": "png",
  "mime_type": "image/png",
  "uploader_email": "contact@example.org",
  "user_id": 1,
  "is_archived": false,
  "source_id": 2,
  "source_type": "web",
  "is_referenced": false,
  "created_at": "2018-06-09T08:52:10+00:00",
  "data": "iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAIAAADTED8xAAAACXBIWXMAAABIAAAASABGyWs+AAACu0lEQVR42u3TAQkAMBDEsHuYf80T0oRa6G07qdrbDbIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYC0DxplBfxP7XIvAAAAAElFTkSuQmCC"
}
```
```

--------------------------------

### Fetch a list of stock locations

Source: https://docs.bexio.com/

This action fetches a list of all stock locations.

```APIDOC
## GET /2.0/stock

### Description
This action fetches a list of all stock locations.

### Method
GET

### Endpoint
/2.0/stock

### Parameters
#### Query Parameters
- **order_by** (string) - Optional - Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. `_asc` and `_desc` can be appended to any parameter to either sort ascending (default) or descending. Example: order_by=name
- **limit** (integer) - Optional - Limit the number of results (max is 2000). Default: 500. Example: limit=20
- **offset** (integer) - Optional - Skip over a number of elements by specifying an offset value for the query. Default: 0. Example: offset=0

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The unique identifier for the stock location.
- **name** (string) - The name of the stock location.

#### Response Example
```json
[
  {
    "id": 1,
    "name": "Stock Berlin"
  }
]
```
```

--------------------------------

### Fetch file of manual compound entry

Source: https://docs.bexio.com/

Retrieves details and binary data for a specific file associated with a manual compound entry.

```cURL
curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files/{file_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Add File to Manual Entry Line

Source: https://docs.bexio.com/

This cURL request uploads one or multiple files and attaches them to an existing accounting entry line. Set the `content-type` to `multipart/form-data`. You can upload multiple files by using different identifiers for the `fileName` parameter. Max file size is 12MB, and supported formats include PNG, JPG, JPEG, GIF, DOC, DOCX, XLS, XLSX, PPT, PPTX, PDF.

```cURL
curl -X POST \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Salutations List Response

Source: https://docs.bexio.com/

This is a sample response when fetching a list of salutations. It returns an array of salutation objects, each with an ID and name.

```json
[
  {
    "id": 1,
    "name": "Herr"
  }

]
```

--------------------------------

### Error Response Sample

Source: https://docs.bexio.com/

Standard JSON error response returned when an authentication failure occurs.

```json
{
  "error_code": 401,
  "message": "Invalid access token"
}
```

--------------------------------

### POST /2.0/pr_project/{project_id}

Source: https://docs.bexio.com/

Edit an existing project's details.

```APIDOC
## POST /2.0/pr_project/{project_id}

### Description
This action edits a single project.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/pr_project/{project_id}

### Parameters
#### Path Parameters
- **project_id** (integer) - Required - The id of the project

#### Request Body
- **name** (string) - Required - Project name
- **pr_state_id** (integer) - Required - References a project status object
- **pr_project_type_id** (integer) - Required - References a project type object
- **contact_id** (integer) - Required - References a contact object
- **user_id** (integer) - Required - References a user object

### Request Example
{
  "name": "Villa Kunterbunt",
  "pr_state_id": 2,
  "pr_project_type_id": 2,
  "contact_id": 2,
  "user_id": 1
}
```

--------------------------------

### Contact Object Response Sample (JSON)

Source: https://docs.bexio.com/

This is a sample JSON response for a single contact object when fetching a list of contacts. It includes various fields such as ID, name, address, and contact details.

```json
[
  {
    "id": 4,
    "nr": null,
    "contact_type_id": 1,
    "name_1": "Example Company",
    "name_2": null,
    "salutation_id": 2,
    "salutation_form": null,
    "title_id": null,
    "birthday": null,
    "address": "Smith Street 22",
    "street_name": "Smith Street",
    "house_number": "77",
    "address_addition": "Building C",
    "postcode": "8004",
    "city": "Zurich",
    "country_id": 1,
    "mail": "contact@example.org",
    "mail_second": "",
    "phone_fixed": "",
    "phone_fixed_second": "",
    "phone_mobile": "",
    "fax": "",
    "url": "",
    "skype_name": "",
    "remarks": "",
    "language_id": null,
    "is_lead": false,
    "contact_group_ids": "1,2",
    "contact_branch_ids": null,
    "user_id": 1,
    "owner_id": 1,
    "updated_at": "2019-04-08 13:17:32"
}

]
```

--------------------------------

### POST /2.0/kb_order/{order_id}/invoice

Source: https://docs.bexio.com/

Creates an invoice document based on an existing order.

```APIDOC
## POST /2.0/kb_order/{order_id}/invoice

### Description
This action creates an invoice from an order.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/kb_order/{order_id}/invoice

### Parameters
#### Path Parameters
- **order_id** (integer) - Required - The id of the order

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **positions** (Array of objects) - Optional - List of positions to include. If omitted, all positions from the source document are used.

### Request Example
{
  "positions": [
    {
      "id": 1,
      "type": "KbPositionArticle",
      "amount": 5
    }
  ]
}
```

--------------------------------

### POST /2.0/kb_order/{order_id}/delivery

Source: https://docs.bexio.com/

Creates a delivery document based on an existing order.

```APIDOC
## POST /2.0/kb_order/{order_id}/delivery

### Description
This action creates a delivery from an order.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/kb_order/{order_id}/delivery

### Parameters
#### Path Parameters
- **order_id** (integer) - Required - The id of the order

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **positions** (Array of objects) - Optional - List of positions to include. If omitted, all positions from the source document are used.

### Request Example
{
  "positions": [
    {
      "id": 1,
      "type": "KbPositionArticle",
      "amount": 5
    }
  ]
}

### Response
#### Success Response (200)
- **id** (integer) - The ID of the created delivery
- **document_nr** (string) - The document number

#### Response Example
{
  "id": 4,
  "document_nr": "LS-00001"
}
```

--------------------------------

### POST /2.0/kb_order/{order_id}

Source: https://docs.bexio.com/

Updates an existing KB order in the system.

```APIDOC
## POST /2.0/kb_order/{order_id}

### Description
Updates an existing KB order using the provided order ID.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/kb_order/{order_id}

### Parameters
#### Path Parameters
- **order_id** (integer) - Required - The ID of the order to update.

#### Request Body
- **document_nr** (string) - Optional - Document number (required if automatic numbering is deactivated).
- **title** (string) - Optional
- **contact_id** (integer) - Optional - References a contact object.
- **contact_sub_id** (integer) - Optional - References a contact object.
- **user_id** (integer) - Optional - References a user object.
- **pr_project_id** (integer) - Optional - References a project object.
- **logopaper_id** (integer) - Optional - Deprecated.
- **language_id** (integer) - Optional - References a language object.
- **bank_account_id** (integer) - Optional - References a bank account object.
- **currency_id** (integer) - Optional - References a currency object.
- **payment_type_id** (integer) - Optional - References a payment type object.
- **header** (string) - Optional
- **footer** (string) - Optional
- **mwst_type** (integer) - Optional - 0: including taxes, 1: excluding taxes, 2: exempt from taxes.
- **mwst_is_net** (boolean) - Optional - Affects total if mwst_type is 0.
- **show_position_taxes** (boolean) - Optional
- **is_valid_from** (string) - Optional - Date format.
- **contact_address_manual** (string) - Optional - Manual contact address.
- **delivery_address_type** (integer) - Optional - 0: use invoice address, 1: use custom address.
- **delivery_address_manual** (string) - Optional - Manual delivery address.
- **api_reference** (string) - Optional - Reference to other systems.
- **template_slug** (string) - Optional - References a document template slug.

### Request Example
{
  "document_nr": "AU-00001",
  "title": null,
  "contact_id": 14,
  "contact_sub_id": null,
  "user_id": 1,
  "pr_project_id": null,
  "logopaper_id": 1,
  "language_id": 1,
  "bank_account_id": 1,
  "currency_id": 1,
  "payment_type_id": 1,
  "header": "Thank you very much for your inquiry.",
  "footer": "We hope that our offer meets your expectations.",
  "mwst_type": 0,
  "mwst_is_net": true,
  "show_position_taxes": false,
  "is_valid_from": "2019-06-24",
  "contact_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
  "delivery_address_type": 0,
  "delivery_address_manual": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
  "api_reference": null,
  "template_slug": "581a8010821e01426b8b456b"
}

### Response
#### Success Response (200)
- **id** (integer) - The ID of the updated order.
- **document_nr** (string) - The document number.
- **total** (string) - The total amount.

#### Response Example
{
  "id": 4,
  "document_nr": "AU-00001",
  "total": "19.150000"
}
```

--------------------------------

### Fetch Business Years via cURL

Source: https://docs.bexio.com/

Retrieve a list of all business years.

```bash
curl -X GET \
  https://api.bexio.com/3.0/accounting/business_years \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch Calendar Years (cURL)

Source: https://docs.bexio.com/

Use this cURL command to fetch a list of all calendar years. Ensure you replace '{access-token}' with your actual API token.

```bash
curl -X GET \
  https://api.bexio.com/3.0/accounting/calendar_years \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /2.0/salutation

Source: https://docs.bexio.com/

Creates a new salutation.

```APIDOC
## POST /2.0/salutation

### Description
This action creates a new salutation.

### Method
POST

### Endpoint
/2.0/salutation

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **name** (string) - Required

### Response
#### Success Response (201)
- **id** (integer)
- **name** (string)
```

--------------------------------

### POST /3.0/files

Source: https://docs.bexio.com/

Creates a new file from a provided payload.

```APIDOC
## POST /3.0/files

### Description
Creates a new file from payload.

### Method
POST

### Endpoint
https://api.bexio.com/3.0/files

### Parameters
#### Request Body
- **file** (string) - Required - Binary file input path.

### Response
#### Success Response (200)
- **id** (integer) - Created file ID.
- **uuid** (string) - Unique identifier.

#### Response Example
[
  {
    "id": 1,
    "uuid": "474cc93a-2d6f-47e9-bd3f-a5b5a1941314"
  }
]
```

--------------------------------

### POST /2.0/{kb_document_type}/{document_id}/kb_position_discount

Source: https://docs.bexio.com/

Creates a new discount position for a specified document.

```APIDOC
## POST /2.0/{kb_document_type}/{document_id}/kb_position_discount

### Description
This action creates a new discount position for a document.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - The type of the document (kb_offer, kb_order, kb_invoice).
- **document_id** (integer) - Required - The ID of the document.

#### Request Body
- **text** (string) - Required - Description of the discount.
- **is_percentual** (boolean) - Required - Whether the discount is a percentage.
- **value** (string) - Required - The discount value.

### Request Example
{
  "text": "Partner discount",
  "is_percentual": true,
  "value": "10.000000"
}

### Response
#### Success Response (201)
- **id** (integer) - Created position ID
- **text** (string) - Description
- **is_percentual** (boolean) - Is percentual
- **value** (string) - Value
- **discount_total** (string) - Total discount
- **type** (string) - Position type

#### Response Example
{
  "id": 1,
  "text": "Partner discount",
  "is_percentual": true,
  "value": "10.000000",
  "discount_total": "1.780000",
  "type": "KbPositionDiscount"
}
```

--------------------------------

### Create Payment API

Source: https://docs.bexio.com/

Creates a new payment.

```APIDOC
## POST /4.0/banking/payments

### Description
Creates a new payment.

### Method
POST

### Endpoint
/4.0/banking/payments

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Body
*Note: Request body details are not provided in the source text.*

### Response
*Note: Response details are not provided in the source text.*

```

--------------------------------

### Create Business Activity

Source: https://docs.bexio.com/

This is the JSON payload required to create a new business activity. It includes the name and optional billing and pricing details.

```json
{
  * "name": "Project Management",
  * "default_is_billable": false,
  * "default_price_per_hour": null,
  * "account_id": null

}
```

--------------------------------

### Delete Timesheet cURL Request

Source: https://docs.bexio.com/

Example cURL command to permanently delete a timesheet. Requires the timesheet ID and an authorization token.

```curl
curl -X DELETE \
  https://api.bexio.com/2.0/timesheet/{timesheet_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Create Discount Position

Source: https://docs.bexio.com/

Creates a new discount position for a document. Requires the discount details in the request body. The response includes the created discount's ID and calculated total.

```json
{
  "text": "Partner discount",
  "is_percentual": true,
  "value": "10.000000"
}
```

--------------------------------

### POST /2.0/kb_invoice/{invoice_id}/copy

Source: https://docs.bexio.com/

Creates a copy of an existing invoice.

```APIDOC
## POST /2.0/kb_invoice/{invoice_id}/copy

### Description
This action copies an invoice.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/kb_invoice/{invoice_id}/copy

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The id of the invoice

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **contact_id** (integer/null) - Required - References a contact object
- **contact_sub_id** (integer/null) - Optional - References a contact object
- **is_valid_from** (string) - Optional - Date string
- **title** (string/null) - Optional - Title of the invoice

### Request Example
{
  "contact_id": 14,
  "contact_sub_id": null,
  "is_valid_from": "2019-06-27",
  "title": null
}

### Response
#### Success Response (200)
- **id** (integer) - The ID of the new invoice
- **document_nr** (string) - The document number

#### Error Response (422)
- Validation error
```

--------------------------------

### Fetch Discount Positions

Source: https://docs.bexio.com/

Retrieves a list of all discount positions for a specified document. Supports pagination with limit and offset parameters.

```curl
curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch a List of Users

Source: https://docs.bexio.com/

Fetches a list of all users, with options for limiting and offsetting results.

```APIDOC
## Fetch a List of Users

### Description
This action fetches a list of all users.

### Method
GET

### Endpoint
/3.0/users

### Parameters
#### Query Parameters
- **limit** (integer) - Optional - Default: 500 - Limits the number of results (max is 2000).
- **offset** (integer) - Optional - Default: 0 - Skips over a number of elements by specifying an offset value for the query.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Description
- **salutation_type** (string) - Description
- **firstname** (string) - Description
- **lastname** (string) - Description
- **email** (string) - Description
- **is_superadmin** (boolean) - Description
- **is_accountant** (boolean) - Description

### Response Example
```json
[
  {
    "id": 4,
    "salutation_type": "male",
    "firstname": "Rudolph",
    "lastname": "Smith",
    "email": "rudolph.smith@example.com",
    "is_superadmin": true,
    "is_accountant": false
  }
]
```
```

--------------------------------

### Fetch files of manual compound entry

Source: https://docs.bexio.com/

Lists all files associated with a specific manual compound entry, supporting pagination via limit and offset parameters.

```bash
curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /2.0/kb_invoice/{invoice_id}/kb_reminder

Source: https://docs.bexio.com/

Creates a new reminder for a specified invoice.

```APIDOC
## POST /2.0/kb_invoice/{invoice_id}/kb_reminder

### Description
This action creates a new reminder for an invoice.

### Method
POST

### Endpoint
/2.0/kb_invoice/{invoice_id}/kb_reminder

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The ID of the invoice.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```json
{
  "title": "First reminder",
  "is_valid_from": "2019-06-24",
  "is_valid_to": "2019-07-24",
  "reminder_period_in_days": 14,
  "reminder_level": 1,
  "show_positions": true,
  "remaining_price": "17.8000",
  "received_total": "0.0000",
  "is_sent": false,
  "header": null,
  "footer": null
}
```

### Response
#### Success Response (201)
- **id** (integer) - Description
- **kb_invoice_id** (integer) - Description
- **title** (string) - Description
- **is_valid_from** (string) - Description
- **is_valid_to** (string) - Description
- **reminder_period_in_days** (integer) - Description
- **reminder_level** (integer) - Description
- **show_positions** (boolean) - Description
- **remaining_price** (string) - Description
- **received_total** (string) - Description
- **is_sent** (boolean) - Description
- **header** (null) - Description
- **footer** (null) - Description

#### Error Response (400)
Bad Request

#### Response Example (201)
```json
{
  "id": 4,
  "kb_invoice_id": 1,
  "title": "First reminder",
  "is_valid_from": "2019-06-24",
  "is_valid_to": "2019-07-24",
  "reminder_period_in_days": 14,
  "reminder_level": 1,
  "show_positions": true,
  "remaining_price": "17.8000",
  "received_total": "0.0000",
  "is_sent": false,
  "header": null,
  "footer": null
}
```
```

--------------------------------

### Fetch file of manual entry line

Source: https://docs.bexio.com/

Retrieves a specific file associated with a manual entry line. Requires the manual entry ID, entry ID, and file ID.

```bash
curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Delete a Title Request (cURL)

Source: https://docs.bexio.com/

Example cURL command to delete a specific title using its ID. Ensure to replace `{access-token}` and `{title_id}`.

```curl
curl -X DELETE \
  https://api.bexio.com/2.0/title/{title_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Download File

Source: https://docs.bexio.com/

Provides the requested file from the backend as a stream.

```APIDOC
## Download File

### Description
Provides the requested file from the backend as a stream.
```

--------------------------------

### List Project Milestones

Source: https://docs.bexio.com/

Retrieves a list of all milestones for a specific project.

```APIDOC
## GET /3.0/projects/{project_id}/milestones

### Description
Retrieves a list of all milestones for a specific project.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/projects/{project_id}/milestones

### Parameters
#### Path Parameters
- **project_id** (integer) - Required - The ID of the project.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The unique identifier for the milestone.
- **name** (string) - The name of the milestone.
- **end_date** (string) - The end date for the milestone (YYYY-MM-DD).
- **comment** (string) - Description for the milestone.
- **pr_parent_milestone_id** (integer) - The ID of the parent milestone, if applicable.

#### Response Example
```json
[
  {
    "id": 4,
    "name": "project documentation",
    "end_date": "2018-05-18",
    "comment": "Finish project documentation.",
    "pr_parent_milestone_id": 3
  }
]
```
```

--------------------------------

### Fetch VAT Periods Request

Source: https://docs.bexio.com/

Retrieves a list of all VAT periods with optional limit and offset parameters.

```bash
curl -X GET \
  https://api.bexio.com/3.0/accounting/vat_periods \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch Contact Relations (cURL)

Source: https://docs.bexio.com/

Use this cURL command to fetch a list of contact relations. Ensure you include the 'Accept' and 'Authorization' headers.

```bash
curl -X GET \
  https://api.bexio.com/2.0/contact_relation \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /2.0/kb_offer/{quote_id}/order

Source: https://docs.bexio.com/

Creates an order from a quote. This endpoint allows for the conversion of a quote into an order, optionally specifying which positions to include.

```APIDOC
## POST /2.0/kb_offer/{quote_id}/order

### Description
Creates an order from a quote.

### Method
POST

### Endpoint
/2.0/kb_offer/{quote_id}/order

### Parameters
#### Path Parameters
- **quote_id** (integer) - Required - The ID of the quote to convert into an order.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **positions** (Array of objects) - Optional - An array of position objects to include in the order. If omitted, all positions from the quote will be included.
  - **id** (integer) - Required - The ID of the position from the quote.
  - **type** (string) - Required - The type of the position (e.g., "KbPositionArticle").
  - **amount** (integer) - Required - The quantity of the item.

### Response
#### Success Response (200)
OK

#### Error Response (422)
Validation error

### Request Example
```json
{
  "positions": [
    {
      "id": 1,
      "type": "KbPositionArticle",
      "amount": 5
    }
  ]
}
```
```

--------------------------------

### Show Quote PDF

Source: https://docs.bexio.com/

Returns a PDF document of the quote.

```APIDOC
## GET /2.0/kb_offer/{quote_id}/pdf

### Description
Returns a PDF document of the quote.

### Method
GET

### Endpoint
/2.0/kb_offer/{quote_id}/pdf

### Parameters
#### Path Parameters
- **quote_id** (integer) - Required - The ID of the quote.
- **logopaper** (integer) - Optional - Whether the PDF should be generated using the letterhead, or not. Enum: 0, 1. Example: 1

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_offer/{quote_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **name** (string) - The name of the PDF file.
- **size** (integer) - The size of the PDF file in bytes.
- **mime** (string) - The MIME type of the file, should be application/pdf.
- **content** (string) - The base64 encoded content of the PDF file.

#### Response Example
```json
{
  "name": "document-00005.pdf",
  "size": 9768,
  "mime": "application/pdf",
  "content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="
}
```
```

--------------------------------

### Create Milestone

Source: https://docs.bexio.com/

Creates a new milestone for a given project.

```APIDOC
## POST /3.0/projects/{project_id}/milestones

### Description
This action creates a new milestone.

### Method
POST

### Endpoint
https://api.bexio.com/3.0/projects/{project_id}/milestones

### Parameters
#### Path Parameters
- **project_id** (integer) - Required - The ID of the project.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **name** (string) - Required - The name of the milestone (<= 255 characters).
- **end_date** (string) - The end date for the milestone (YYYY-MM-DD).
- **comment** (string) - Description for the milestone (<= 10000 characters).
- **pr_parent_milestone_id** (integer) - Higher level milestone.

### Request Example
```json
{
  "name": "project documentation",
  "end_date": "2018-05-18",
  "comment": "Finish project documentation.",
  "pr_parent_milestone_id": 3
}
```

### Response
#### Success Response (201)
- **id** (integer) - The unique identifier for the milestone.
- **name** (string) - The name of the milestone.
- **end_date** (string) - The end date for the milestone (YYYY-MM-DD).
- **comment** (string) - Description for the milestone.
- **pr_parent_milestone_id** (integer) - The ID of the parent milestone, if applicable.

#### Response Example
```json
{
  "id": 4,
  "name": "project documentation",
  "end_date": "2018-05-18",
  "comment": "Finish project documentation.",
  "pr_parent_milestone_id": 3
}
```
```

--------------------------------

### User Detail Response

Source: https://docs.bexio.com/

JSON object representing a single user.

```json
{
  "id": 4,
  "salutation_type": "male",
  "firstname": "Rudolph",
  "lastname": "Smith",
  "email": "rudolph.smith@example.com",
  "is_superadmin": true,
  "is_accountant": false
}
```

--------------------------------

### Delete Contact cURL Request

Source: https://docs.bexio.com/

Example cURL command to delete a contact. Replace '{contact_id}' with the actual contact ID and '{access-token}' with your Bearer token.

```curl
curl -X DELETE \
  https://api.bexio.com/2.0/contact/{contact_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### GET /2.0/{kb_document_type}/{document_id}/kb_position_pagebreak

Source: https://docs.bexio.com/

Retrieves a list of pagebreak positions for a specified document. You can filter the results using limit and offset query parameters.

```APIDOC
## Get Pagebreak Positions

### Description
This action retrieves a list of pagebreak positions for a document. You can specify the document type and ID, and optionally use `limit` and `offset` query parameters to paginate the results.

### Method
GET

### Endpoint
`/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak`

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - Enum: "kb_offer" "kb_order" "kb_invoice" - The type of the document. Pagebreak positions can be added to quotes, orders and invoices.
- **document_id** (integer) - Required - The ID of the document. E.g. if the `kb_document_type` is set to `kb_invoice` the `document_id` must be set to the ID of the invoice.

#### Query Parameters
- **limit** (integer) - Optional - Default: 500 - Limit the number of results (max is 2000).
- **offset** (integer) - Optional - Default: 0 - Skip over a number of elements by specifying an offset value for the query.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Description of the pagebreak position ID.
- **internal_pos** (integer) - The internal position of the pagebreak.
- **is_optional** (boolean) - Indicates if the pagebreak is optional.
- **type** (string) - The type of the object, always "KbPositionPagebreak".
- **parent_id** (integer) - The ID of the parent document.

#### Response Example
```json
[
  {
    "id": 1,
    "internal_pos": 1,
    "is_optional": false,
    "type": "KbPositionPagebreak",
    "parent_id": null
  }
]
```
```

--------------------------------

### Fetch all possible currency codes

Source: https://docs.bexio.com/

This endpoint can be used to retrieve all available currency codes (in the format CHF, EUR, etc.).

```APIDOC
## GET /3.0/currencies/codes

### Description
Retrieves all available currency codes.

### Method
GET

### Endpoint
/3.0/currencies/codes

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Example
```curl
curl -X GET \
  https://api.bexio.com/3.0/currencies/codes \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **Array of strings** (string) - Currency codes (e.g., "EUR", "GBP", "PLN")

#### Response Example
```json
[
  "EUR",
  "GBP",
  "PLN"
]
```
```

--------------------------------

### Users List Response

Source: https://docs.bexio.com/

JSON array containing user objects.

```json
[
  {
    "id": 4,
    "salutation_type": "male",
    "firstname": "Rudolph",
    "lastname": "Smith",
    "email": "rudolph.smith@example.com",
    "is_superadmin": true,
    "is_accountant": false
  }
]
```

--------------------------------

### POST /2.0/kb_invoice

Source: https://docs.bexio.com/

Creates a new invoice in the system. This endpoint supports various invoice configurations including tax settings, contact references, and multiple position types.

```APIDOC
## POST /2.0/kb_invoice

### Description
This action creates a new invoice.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/kb_invoice

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **document_nr** (string) - Optional - Required if automatic numbering is deactivated.
- **title** (string/null) - Optional
- **contact_id** (integer/null) - Optional - References a contact object.
- **contact_sub_id** (integer/null) - Optional - References a contact object.
- **user_id** (integer) - Optional - References a user object.
- **pr_project_id** (integer/null) - Optional - References a project object.
- **logopaper_id** (integer) - Optional - Deprecated.
- **language_id** (integer) - Optional - References a language object.
- **bank_account_id** (integer) - Optional - References a bank account object.
- **currency_id** (integer) - Optional - References a currency object.
- **payment_type_id** (integer) - Optional - References a payment type object.
- **header** (string) - Optional
- **footer** (string) - Optional
- **mwst_type** (integer) - Optional - Enum: 0 (including taxes), 1 (excluding taxes), 2 (exempt from taxes).
- **mwst_is_net** (boolean) - Optional - Affects total if mwst_type is 0.
- **show_position_taxes** (boolean) - Optional
- **is_valid_from** (string) - Optional - Date format.
- **is_valid_to** (string) - Optional - Date format.
- **contact_address_manual** (string/null) - Optional - Manually set contact address.
- **reference** (string/null) - Optional
- **api_reference** (string/null) - Optional - Used for external system references.
- **template_slug** (string/null) - Optional - References a document template slug.
- **positions** (Array) - Optional - List of position objects (Custom, Article, Text, Subtotal, Pagebreak, Discount).

### Response
#### Success Response (201)
- Created

#### Error Response (422)
- Validation error
```

--------------------------------

### Show file usage via cURL

Source: https://docs.bexio.com/

Queries the backend for usage information of a specific file.

```cURL
curl -X GET \
  https://api.bexio.com/3.0/files/{file_id}/usage \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Response Sample for Item Position

Source: https://docs.bexio.com/

This JSON object represents a successful response when retrieving or creating an item position. It includes details like ID, amounts, unit, tax, and text.

```json
{
  "id": 1,
  "amount": "5.000000",
  "amount_reserved": "5.000000",
  "amount_open": "5.000000",
  "amount_completed": "5.000000",
  "unit_id": 1,
  "account_id": 1,
  "unit_name": "kg",
  "tax_id": 4,
  "tax_value": "7.70",
  "text": "Apples",
  "unit_price": "3.560000",
  "discount_in_percent": "0.000000",
  "position_total": "17.800000",
  "pos": 1,
  "internal_pos": 1,
  "is_optional": null,
  "type": "KbPositionCustom",
  "parent_id": null
}
```

--------------------------------

### POST /2.0/contact/_bulk_create

Source: https://docs.bexio.com/

Creates multiple contacts in bulk. Requires specific contact details including type, names, and ownership information.

```APIDOC
## POST /2.0/contact/_bulk_create

### Description
Creates multiple contacts in bulk.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/contact/_bulk_create

### Parameters
#### Request Body
- **nr** (string/null) - Optional - If set to null, the number will be assigned automatically.
- **contact_type_id** (integer) - Required - Use 1 for companies or 2 for persons.
- **name_1** (string) - Required - Company name or last name.
- **name_2** (string/null) - Optional - Company addition or first name.
- **user_id** (integer) - Required - References a user object.
- **owner_id** (integer) - Required - Owner identifier.

### Request Example
[
  {
    "nr": null,
    "contact_type_id": 1,
    "name_1": "Example Company",
    "user_id": 1,
    "owner_id": 1
  }
]

### Response
#### Success Response (200)
- **id** (integer) - The created contact ID.
- **updated_at** (string) - Timestamp of creation/update.
```

--------------------------------

### POST /2.0/timesheet

Source: https://docs.bexio.com/

Creates a new timesheet entry.

```APIDOC
## POST /2.0/timesheet

### Description
This action creates a new timesheet.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/timesheet

### Parameters
#### Header Parameters
- **Accept** (string) - Required - application/json

#### Request Body
- **user_id** (integer) - Required - References a user object
- **client_service_id** (integer) - Required - References a business activity object
- **allowable_bill** (boolean) - Required - Billable status
- **tracking** (object) - Required - TimesheetDuration or TimesheetRange object

### Request Example
{
  "user_id": 1,
  "status_id": 4,
  "client_service_id": 1,
  "allowable_bill": true,
  "tracking": {
    "type": "duration",
    "date": "2019-05-20",
    "duration": "01:40"
  }
}

### Response
#### Success Response (201)
- **Status** (string) - Created
```

--------------------------------

### POST /2.0/pr_project/search

Source: https://docs.bexio.com/

Search for projects based on specific criteria.

```APIDOC
## POST /2.0/pr_project/search

### Description
Search for projects using a field, value, and criteria.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/pr_project/search

### Request Body
- **search_field** (string) - Required - The field to search by
- **value** (string) - Required - The search term
- **criteria** (string) - Required - The comparison operator (e.g., "=")

### Request Example
[
  {
    "field": "search_field",
    "value": "search term",
    "criteria": "="
  }
]

### Response
#### Success Response (200)
- **id** (integer) - Project ID
- **uuid** (string) - Project UUID
- **nr** (string) - Project number
- **name** (string) - Project name

#### Response Example
[
  {
    "id": 2,
    "uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
    "nr": "000002",
    "name": "Villa Kunterbunt"
  }
]
```

--------------------------------

### JSON Response for Fetching Deliveries

Source: https://docs.bexio.com/

This is a sample JSON response when fetching a list of deliveries. It includes details for each delivery, such as ID, document number, contact information, and totals. The `taxs` array provides tax breakdown for each delivery.

```json
[
  {
    "id": 4,
    "document_nr": "LS-00001",
    "title": null,
    "contact_id": 14,
    "contact_sub_id": null,
    "user_id": 1,
    "logopaper_id": 1,
    "language_id": 1,
    "bank_account_id": 1,
    "currency_id": 1,
    "header": "Thank you very much for your inquiry.:",
    "footer": "We hope that our delivery meets your expectations and will be happy to answer your questions.",
    "total_gross": "17.800000",
    "total_net": "17.800000",
    "total_taxes": "1.3706",
    "total": "19.150000",
    "total_rounding_difference": -0.02,
    "mwst_type": 0,
    "mwst_is_net": true,
    "is_valid_from": "2019-06-24",
    "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
    "delivery_address_type": 0,
    "delivery_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
    "kb_item_status_id": 10,
    "api_reference": null,
    "viewed_by_client_at": null,
    "updated_at": "2019-04-08 13:17:32",
    "taxs": [
      {
        "percentage": "7.70",
        "value": "1.3706"
}
]
}

]
```

--------------------------------

### POST /2.0/task

Source: https://docs.bexio.com/

Creates a new task in Bexio. Requires user authentication and provides fields for task details such as subject, due date, and associated contacts.

```APIDOC
## POST /2.0/task

### Description
This action creates a new task.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/task

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **user_id** (integer) - Required - References a user object
- **finish_date** (string or null) - Optional - Date-time string
- **subject** (string) - Required - Task subject
- **info** (string) - Optional - Additional information about the task
- **contact_id** (integer) - Optional - References a contact object
- **sub_contact_id** (integer or null) - Optional - References a contact object
- **pr_project_id** (integer or null) - Optional - References a project object
- **entry_id** (integer or null) - Optional
- **module_id** (integer or null) - Optional
- **todo_status_id** (integer) - Optional
- **todo_priority_id** (integer or null) - Optional
- **have_remember** (boolean) - Optional
- **remember_type_id** (integer or null) - Optional - Is required if `have_remember` is set to true.
- **remember_time_id** (integer or null) - Optional - Is required if `have_remember` is set to true.
- **communication_kind_id** (integer or null) - Optional

### Request Example
```json
{
  "user_id": 1,
  "finish_date": "2018-04-09T07:44:10+00:00",
  "subject": "Unterlagen versenden",
  "info": "so schnell wie möglich.",
  "contact_id": 1,
  "sub_contact_id": null,
  "pr_project_id": null,
  "entry_id": null,
  "module_id": null,
  "todo_status_id": 1,
  "todo_priority_id": null,
  "have_remember": false,
  "remember_type_id": null,
  "remember_time_id": null,
  "communication_kind_id": null
}
```

### Response
#### Success Response (201)
- **id** (integer) - Unique identifier for the task
- **user_id** (integer) - ID of the user associated with the task
- **finish_date** (string) - The date when the task should be finished
- **subject** (string) - The subject of the task
- **place** (integer) - Placeholder field, likely related to location
- **info** (string) - Additional details about the task
- **contact_id** (integer) - ID of the associated contact
- **sub_contact_id** (null) - Placeholder for sub-contact ID
- **project_id** (null) - Placeholder for project ID
- **entry_id** (null) - Placeholder for entry ID
- **module_id** (null) - Placeholder for module ID
- **todo_status_id** (integer) - ID of the task's status
- **todo_priority_id** (null) - Placeholder for task priority ID
- **has_reminder** (boolean) - Indicates if a reminder is set
- **remember_type_id** (null) - Placeholder for reminder type ID
- **remember_time_id** (null) - Placeholder for reminder time ID
- **communication_kind_id** (null) - Placeholder for communication kind ID

#### Response Example
```json
{
  "id": 1,
  "user_id": 1,
  "finish_date": "2018-04-09T07:44:10+00:00",
  "subject": "Unterlagen versenden",
  "place": 0,
  "info": "so schnell wie möglich.",
  "contact_id": 1,
  "sub_contact_id": null,
  "project_id": null,
  "entry_id": null,
  "module_id": null,
  "todo_status_id": 1,
  "todo_priority_id": null,
  "has_reminder": false,
  "remember_type_id": null,
  "remember_time_id": null,
  "communication_kind_id": null
}
```
```

--------------------------------

### Sample Response for Item Position

Source: https://docs.bexio.com/

This is a sample JSON response representing an item position within a Bexio document. It includes details like amount, unit, tax, and article information.

```json
{
  "id": 1,
  "amount": "5.000000",
  "amount_reserved": "5.000000",
  "amount_open": "5.000000",
  "amount_completed": "5.000000",
  "unit_id": 1,
  "account_id": 1,
  "unit_name": "kg",
  "tax_id": 4,
  "tax_value": "7.70",
  "text": "Apples",
  "unit_price": "3.560000",
  "discount_in_percent": "0.000000",
  "position_total": "17.800000",
  "pos": 1,
  "internal_pos": 1,
  "is_optional": false,
  "article_id": 3,
  "type": "KbPositionArticle",
  "parent_id": null
}
```

--------------------------------

### Create Fictional User

Source: https://docs.bexio.com/

Creates a new fictional user. Requires salutation_type, firstname, lastname, and a unique email address.

```json
{
  * "salutation_type": "male",
  * "firstname": "Rudolph",
  * "lastname": "Smith",
  * "email": "rudolph.smith@bexio.com",
  * "title_id": null

}
```

--------------------------------

### Sample Created Reminder Response

Source: https://docs.bexio.com/

This JSON object represents a successfully created invoice reminder. It mirrors the structure of a fetched reminder.

```json
{
  "id": 4,
  "kb_invoice_id": 1,
  "title": "First reminder",
  "is_valid_from": "2019-06-24",
  "is_valid_to": "2019-07-24",
  "reminder_period_in_days": 14,
  "reminder_level": 1,
  "show_positions": true,
  "remaining_price": "17.8000",
  "received_total": "0.0000",
  "is_sent": false,
  "header": null,
  "footer": null

}
```

--------------------------------

### POST /4.0/expenses

Source: https://docs.bexio.com/

Creates a new expense record in the system.

```APIDOC
## POST /4.0/expenses

### Description
Creates a new expense record.

### Method
POST

### Endpoint
https://api.bexio.com/4.0/expenses

### Parameters
#### Request Body
- **paid_on** (string, date) - Required - Date the expense was paid.
- **currency_code** (string) - Required - Currency code (1-20 chars).
- **supplier_id** (integer) - Optional - ID of the supplier.
- **title** (string) - Optional - Title of the expense (1-80 chars).
- **bank_account_id** (integer) - Optional - ID of the bank account.
- **booking_account_id** (integer) - Optional - ID of the booking account.
- **amount** (number) - Required - Amount of the expense.
- **tax_id** (integer) - Optional - ID of the tax.
- **exchange_rate** (number) - Optional - Required if currency_code differs from base_currency_code.
- **base_currency_amount** (number) - Optional - Required if currency_code differs from base_currency_code.
- **attachment_ids** (Array of strings, uuid) - Required - List of file IDs attached to the expense.
- **address** (object) - Optional - Address details.

### Request Example
{
  "paid_on": "2019-03-20",
  "currency_code": "CHF",
  "exchange_rate": 1.5243546497,
  "supplier_id": 123,
  "title": "Expense 42",
  "bank_account_id": 5,
  "booking_account_id": 16,
  "amount": 80.54,
  "tax_id": 15,
  "base_currency_amount": 167.87,
  "attachment_ids": ["3c570a07-1fa1-41e7-a761-0f486dfc01f6", "138c5618-744c-4c05-b504-c034ccf5f7d9"],
  "address": { "title": "Prof", "salutation": "Ms", "firstname_suffix": "John", "lastname_company": "Newman", "address_line": "Mega Street", "postcode": "6694", "city": "Tel Aviv", "country_code": "CH", "main_contact_id": 45, "contact_address_id": 827, "type": "PRIVATE" }
}

### Response
#### Success Response (201)
- **id** (string) - The created expense ID.
```

--------------------------------

### Fetch a Milestone

Source: https://docs.bexio.com/

Retrieves details of a single milestone for a specific project.

```APIDOC
## GET /3.0/projects/{project_id}/milestones/{milestone_id}

### Description
This action fetches a single milestone.

### Method
GET

### Endpoint
https://api.bexio.com/3.0/projects/{project_id}/milestones/{milestone_id}

### Parameters
#### Path Parameters
- **project_id** (integer) - Required - The ID of the project.
- **milestone_id** (integer) - Required - The ID of the milestone.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The unique identifier for the milestone.
- **name** (string) - The name of the milestone.
- **end_date** (string) - The end date for the milestone (YYYY-MM-DD).
- **comment** (string) - Description for the milestone.
- **pr_parent_milestone_id** (integer) - The ID of the parent milestone, if applicable.

#### Response Example
```json
{
  "id": 4,
  "name": "project documentation",
  "end_date": "2018-05-18",
  "comment": "Finish project documentation.",
  "pr_parent_milestone_id": 3
}
```
```

--------------------------------

### cURL Request for Purchase Orders

Source: https://docs.bexio.com/

Use this cURL command to fetch purchase orders. Ensure you replace '{access-token}' with your actual API token and set the 'Accept' header to 'application/json'.

```curl
curl -X GET \
  https://api.bexio.com/3.0/purchase_orders \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch Accounts List

Source: https://docs.bexio.com/

Retrieves a list of all accounts. Supports pagination via limit and offset parameters.

```curl
curl -X GET \
  https://api.bexio.com/2.0/accounts \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /2.0/country

Source: https://docs.bexio.com/

Creates a new country in the system.

```APIDOC
## POST /2.0/country

### Description
This action creates a new country.

### Method
POST

### Endpoint
/2.0/country

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **name** (string) - Required
- **name_short** (string) - Required
- **iso3166_alpha2** (string) - Required

### Request Example
```json
{
  "name": "Kiribati",
  "name_short": "KI",
  "iso3166_alpha2": "KI"
}
```

### Response
#### Success Response (201)
- **id** (integer) - Description
- **name** (string) - Description
- **name_short** (string) - Description
- **iso3166_alpha2** (string) - Description

#### Error Response (422)
- Description: Validation error

#### Response Example
```json
{
  "id": 1,
  "name": "Kiribati",
  "name_short": "KI",
  "iso3166_alpha2": "KI"
}
```
```

--------------------------------

### Create Work Package Request Body

Source: https://docs.bexio.com/

This JSON object represents the request body for creating a new work package. All required fields must be included.

```json
{
  "name": "Documentation",
  "spent_time_in_hours": 0.5,
  "estimated_time_in_hours": 1.75,
  "comment": "Crete project documentation",
  "pr_milestone_id": 3

}
```

--------------------------------

### POST /2.0/pr_project/{project_id}/archive

Source: https://docs.bexio.com/

Archives a specific project.

```APIDOC
## POST /2.0/pr_project/{project_id}/archive

### Description
This action archives a project.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/pr_project/{project_id}/archive

### Parameters
#### Path Parameters
- **project_id** (integer) - Required - The id of the project

#### Header Parameters
- **Accept** (string) - Required - application/json

### Response
#### Success Response (200)
- **success** (boolean) - Indicates if the archive was successful

#### Response Example
{
  "success": true
}
```

--------------------------------

### PUT /4.0/purchase/bills/{id}/bookings/{status}

Source: https://docs.bexio.com/

Updates the status of a specific purchase bill. Transitioning to BOOKED requires extensive validation of bill details, line items, and taxes, while transitioning to DRAFT requires the bill to be currently BOOKED.

```APIDOC
## PUT /4.0/purchase/bills/{id}/bookings/{status}

### Description
Updates the status of a purchase bill to either DRAFT or BOOKED. This endpoint enforces strict business rules regarding bill dates, line item amounts, tax configurations, and account types.

### Method
PUT

### Endpoint
https://api.bexio.com/4.0/purchase/bills/{id}/bookings/{status}

### Parameters
#### Path Parameters
- **id** (string <uuid>) - Required - The unique identifier of the Bill to update.
- **status** (string) - Required - The target status to update to. Must be one of: "DRAFT", "BOOKED".

### Request Example
```bash
curl -X PUT \
  https://api.bexio.com/4.0/purchase/bills/{id}/bookings/{status} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

### Response
#### Success Response (200)
- **message** (string) - Successful Bill update

#### Error Responses
- **400** - Bad request (Validation failed)
- **401** - Access token is missing or is invalid
- **403** - No access rights
- **404** - Bill with specified id was not found
```

--------------------------------

### PUT /3.0/accounting/manual_entries/{manual_entry_id}

Source: https://docs.bexio.com/

Updates an existing manual accounting entry.

```APIDOC
## PUT /3.0/accounting/manual_entries/{manual_entry_id}

### Description
This action updates a manual entry.

### Method
PUT

### Endpoint
/3.0/accounting/manual_entries/{manual_entry_id}

### Parameters
#### Path Parameters
- **manual_entry_id** (integer) - Required - The id of the manual_entry

#### Request Body
- **type** (string) - Required - ManualEntryType (manual_single_entry, manual_compound_entry, manual_group_entry)
- **date** (string) - Required - The booking date
- **reference_nr** (string) - Optional - A reference number for the booking (<= 80 characters)
- **entries** (Array) - Required - Array of objects (ManualEntry)
- **id** (number) - Optional - The id of the main resource

### Request Example
{
  "type": "manual_single_entry",
  "date": "2019-11-17",
  "reference_nr": "Booking BA-22",
  "entries": [
    {
      "debit_account_id": 77,
      "credit_account_id": 139,
      "tax_id": 3,
      "tax_account_id": 77,
      "description": "Payment for client Smith",
      "amount": 328.25,
      "currency_id": 1,
      "currency_factor": 1,
      "id": 2
    }
  ],
  "id": 1
}

### Response
#### Success Response (200)
- **id** (number) - The id of the manual entry
- **type** (string) - The type of entry
- **date** (string) - The booking date
- **entries** (Array) - List of entry details

#### Response Example
{
  "id": 1,
  "type": "manual_single_entry",
  "date": "2019-11-17",
  "reference_nr": "Booking BA-22",
  "entries": [
    {
      "id": 32,
      "amount": 328.25
    }
  ]
}
```

--------------------------------

### Response Sample for Fetching Additional Address

Source: https://docs.bexio.com/

This JSON represents a single additional address fetched by its ID. It contains all details of the address.

```json
{
  "id": 1,
  "name": "My new address",
  "name_addition": "Name addition",
  "address": "Walter Street 22",
  "street_name": "Walter Street",
  "house_number": "22",
  "address_addition": "Building C",
  "postcode": "9000",
  "city": "St. Gallen",
  "country_id": 1,
  "subject": "Additional address",
  "description": "This is an internal description"

}
```

--------------------------------

### Fetch a User via cURL

Source: https://docs.bexio.com/

Retrieve details for a specific user by ID.

```bash
curl -X GET \
  https://api.bexio.com/3.0/users/{user_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Response Sample for Malformed Request

Source: https://docs.bexio.com/

This JSON object illustrates an error response for a malformed request, typically due to missing or invalid parameters.

```json
{
  "status": 400,
  "title": "Malformed request (missing or invalid parameters)"
}
```

--------------------------------

### POST /2.0/kb_offer/{quote_id}/invoice

Source: https://docs.bexio.com/

Creates an invoice from a given quote. The positions array can be omitted to include all positions from the source quote.

```APIDOC
## POST /2.0/kb_offer/{quote_id}/invoice

### Description
This action creates an invoice from a quote.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/kb_offer/{quote_id}/invoice

### Parameters
#### Path Parameters
- **quote_id** (integer) - Required - The ID of the quote.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **positions** (Array of objects) - Optional - Please note that the positions array can be omitted to create a document with all positions from the source document.
  - **id** (integer) - Required
  - **type** (string) - Required
  - **amount** (integer) - Required

### Request Example
```json
{
  "positions": [
    {
      "id": 1,
      "type": "KbPositionArticle",
      "amount": 5
    }
  ]
}
```

### Response
#### Success Response (200)
OK
- **id** (integer) - The unique identifier for the invoice.
- **document_nr** (string) - The document number of the invoice.
- **title** (string) - The title of the invoice (can be null).
- **contact_id** (integer) - The ID of the contact associated with the invoice.
- **contact_sub_id** (integer) - The ID of the contact sub-entry (can be null).
- **user_id** (integer) - The ID of the user who created the invoice.
- **project_id** (integer) - The ID of the project associated with the invoice (can be null).
- **logopaper_id** (integer) - The ID of the logopaper used for the invoice.
- **language_id** (integer) - The ID of the language used for the invoice.
- **bank_account_id** (integer) - The ID of the bank account used for the invoice.
- **currency_id** (integer) - The ID of the currency used for the invoice.
- **payment_type_id** (integer) - The ID of the payment type for the invoice.
- **header** (string) - The header text of the invoice.
- **footer** (string) - The footer text of the invoice.
- **total_gross** (string) - The total amount including taxes.
- **total_net** (string) - The total amount excluding taxes.
- **total_taxes** (string) - The total tax amount.
- **total_received_payments** (string) - The total amount of payments received.
- **total_credit_vouchers** (string) - The total amount of credit vouchers.
- **total_remaining_payments** (string) - The remaining amount to be paid.
- **total** (string) - The final total amount of the invoice.
- **total_rounding_difference** (number) - The rounding difference for the total amount.
- **mwst_type** (integer) - The type of VAT.
- **mwst_is_net** (boolean) - Indicates if the prices are net.
- **show_position_taxes** (boolean) - Indicates if taxes should be shown for each position.
- **is_valid_from** (string) - The date from which the invoice is valid.
- **is_valid_to** (string) - The date until which the invoice is valid.
- **contact_address** (string) - The contact address formatted as a string.
- **kb_item_status_id** (integer) - The status ID of the invoice item.
- **reference** (string) - A reference for the invoice (can be null).
- **api_reference** (string) - An API reference for the invoice (can be null).
- **viewed_by_client_at** (string) - The date and time when the invoice was viewed by the client (can be null).
- **updated_at** (string) - The date and time when the invoice was last updated.
- **esr_id** (integer) - The ESR ID for the invoice.
- **qr_invoice_id** (integer) - The QR invoice ID.
- **template_slug** (string) - The slug of the template used for the invoice.
- **taxs** (Array of objects) - An array of tax objects.
  - **percentage** (string) - The tax percentage.
  - **value** (string) - The tax value.
- **network_link** (string) - The network link for the invoice.
- **positions** (Array of objects) - An array of position objects.
  - **id** (integer) - The unique identifier for the position.
  - **amount** (string) - The amount for the position.
  - **amount_reserved** (string) - The reserved amount for the position.
  - **amount_open** (string) - The open amount for the position.
  - **amount_completed** (string) - The completed amount for the position.
  - **unit_id** (integer) - The ID of the unit for the position.
  - **account_id** (integer) - The ID of the account for the position.
  - **unit_name** (string) - The name of the unit.
  - **tax_id** (integer) - The ID of the tax applied to the position.
  - **tax_value** (string) - The tax value for the position.
  - **text** (string) - The description of the position.
  - **unit_price** (string) - The unit price for the position.
  - **discount_in_percent** (string) - The discount percentage for the position.
  - **position_total** (string) - The total amount for the position.
  - **pos** (integer) - The position number.
  - **internal_pos** (integer) - The internal position number.
  - **is_optional** (boolean) - Indicates if the position is optional (can be null).
  - **type** (string) - The type of the position.
  - **parent_id** (integer) - The ID of the parent position (can be null).

#### Response Example (200)
```json
{
  "id": 4,
  "document_nr": "RE-00001",
  "title": null,
  "contact_id": 14,
  "contact_sub_id": null,
  "user_id": 1,
  "project_id": null,
  "logopaper_id": 1,
  "language_id": 1,
  "bank_account_id": 1,
  "currency_id": 1,
  "payment_type_id": 1,
  "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
  "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
  "total_gross": "17.800000",
  "total_net": "17.800000",
  "total_taxes": "1.3706",
  "total_received_payments": "0.000000",
  "total_credit_vouchers": "0.000000",
  "total_remaining_payments": "19.150000",
  "total": "19.150000",
  "total_rounding_difference": -0.02,
  "mwst_type": 0,
  "mwst_is_net": true,
  "show_position_taxes": false,
  "is_valid_from": "2019-06-24",
  "is_valid_to": "2019-07-24",
  "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
  "kb_item_status_id": 3,
  "reference": null,
  "api_reference": null,
  "viewed_by_client_at": null,
  "updated_at": "2019-04-08 13:17:32",
  "esr_id": 1,
  "qr_invoice_id": 1,
  "template_slug": "581a8010821e01426b8b456b",
  "taxs": [
    {
      "percentage": "7.70",
      "value": "1.3706"
    }
  ],
  "network_link": "",
  "positions": [
    {
      "id": 1,
      "amount": "5.000000",
      "amount_reserved": "5.000000",
      "amount_open": "5.000000",
      "amount_completed": "5.000000",
      "unit_id": 1,
      "account_id": 1,
      "unit_name": "kg",
      "tax_id": 4,
      "tax_value": "7.70",
      "text": "Apples",
      "unit_price": "3.560000",
      "discount_in_percent": "0.000000",
      "position_total": "17.800000",
      "pos": 1,
      "internal_pos": 1,
      "is_optional": null,
      "type": "KbPositionCustom",
      "parent_id": null
    }
  ]
}
```

#### Error Response (422)
Validation error
```

--------------------------------

### Retrieve Order Repetition via cURL

Source: https://docs.bexio.com/

Fetches the repetition schedule for a specific order.

```bash
curl -X GET \
  https://api.bexio.com/2.0/kb_order/{order_id}/repetition \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Required Request Headers

Source: https://docs.bexio.com/

Include 'Accept: application/json' and 'Authorization: Bearer <token>' in all requests. For requests with a payload, also include 'Content-Length: <length>'.

```http
Accept: application/json
```

```http
Authorization: Bearer <token>
```

```http
Content-Length: <length>
```

--------------------------------

### Show PDF

Source: https://docs.bexio.com/

Retrieve the PDF document for a specific quote.

```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_offer/{quote_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

```json
{
  * "name": "document-00005.pdf",
  * "size": 9768,
  * "mime": "application/pdf",
  * "content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="

}
```

--------------------------------

### Fetch a Task

Source: https://docs.bexio.com/

Retrieves the details of a single task by its ID.

```APIDOC
## GET /2.0/task/{task_id}

### Description
Fetches a single task using its unique identifier.

### Method
GET

### Endpoint
/2.0/task/{task_id}

### Parameters
#### Path Parameters
- **task_id** (integer) - Required - The ID of the task to retrieve.
- **Accept** (string) - Required - Specifies the desired response format, e.g., `application/json`.

### Response
#### Success Response (200)
- **id** (integer) - The unique identifier of the task.
- **user_id** (integer) - The ID of the user associated with the task.
- **finish_date** (string) - The completion date of the task in ISO 8601 format.
- **subject** (string) - The subject or title of the task.
- **place** (integer) - Placeholder or location information.
- **info** (string) - Additional details or notes about the task.
- **contact_id** (integer) - The ID of the contact associated with the task.
- **sub_contact_id** (integer|null) - The ID of a sub-contact, if applicable.
- **project_id** (integer|null) - The ID of the project the task belongs to, if applicable.
- **entry_id** (integer|null) - The ID of an associated entry.
- **module_id** (integer|null) - The ID of the module the task is related to.
- **todo_status_id** (integer) - The ID of the task's current status.
- **todo_priority_id** (integer|null) - The ID of the task's priority.
- **has_reminder** (boolean) - Indicates if a reminder is set for the task.
- **remember_type_id** (integer|null) - The type of reminder.
- **remember_time_id** (integer|null) - The time for the reminder.
- **communication_kind_id** (integer|null) - The type of communication.

### Response Example
```json
{
  "id": 1,
  "user_id": 1,
  "finish_date": "2018-04-09T07:44:10+00:00",
  "subject": "Unterlagen versenden",
  "place": 0,
  "info": "so schnell wie möglich.",
  "contact_id": 1,
  "sub_contact_id": null,
  "project_id": null,
  "entry_id": null,
  "module_id": null,
  "todo_status_id": 1,
  "todo_priority_id": null,
  "has_reminder": false,
  "remember_type_id": null,
  "remember_time_id": null,
  "communication_kind_id": null
}
```
```

--------------------------------

### Fetch Stock Areas via cURL

Source: https://docs.bexio.com/

Retrieve a list of all stock areas using a bearer token for authorization.

```bash
curl -X GET \
  https://api.bexio.com/2.0/stock_place \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /4.0/expenses/{id}/actions

Source: https://docs.bexio.com/

Executes specific actions for a given expense, such as duplicating an existing expense record.

```APIDOC
## POST /4.0/expenses/{id}/actions

### Description
Endpoint for executing actions for Expense.

### Method
POST

### Endpoint
/4.0/expenses/{id}/actions

### Parameters
#### Path Parameters
- **id** (string) - Required - id of Expense for which action will be executed

#### Request Body
- **action** (string) - Required - Value: "DUPLICATE"

### Request Example
{
  "action": "DUPLICATE"
}

### Response
#### Success Response (200)
- **id** (string) - Expense ID
- **document_no** (string) - Document number
- **status** (string) - Status of the expense

#### Response Example
{
  "id": "1355499f-aa07-4382-887e-acaf0323e6f6",
  "document_no": "123",
  "status": "DRAFT"
}
```

--------------------------------

### Update Project Work Package Response

Source: https://docs.bexio.com/

Expected JSON response after successfully updating a work package.

```json
{
  "id": 4,
  "name": "Documentation",
  "spent_time_in_hours": 0.5,
  "estimated_time_in_hours": 1.75,
  "comment": "Crete project documentation",
  "pr_milestone_id": 3
}
```

--------------------------------

### Search Functionality

Source: https://docs.bexio.com/

Details on how to perform searches using POST requests and available criteria.

```APIDOC
## Search
Some older endpoints implement search methods. Searching for these endpoint works by sending a POST request to the resource (e.g.: POST `/contact/search` or POST `/country/search`). The search parameters must be provided in the body of the POST request.   
  
Please have a look at the resource documentation to see a list of available search parameters.

### Criterias
You can use different criterias for the search. The criteria “like” will be used by default if you do not define a criteria.
Criteria | Description  
---|---
`=` | Exact match  
`equal` | Exact match (synonyme for =)  
`!=` | Not equal  
`not_equal` | Not equal (synonyme for !=)  
`>` | Greather than  
`greater_than` | Greather than (synonyme for >)  
`<` | Less than  
`less_than` | Less than (synonyme for <)  
`>=` | Greater or equal then  
`greater_equal` | Greater or equal then (synonyme for >=)  
`<=` | Lesser or equal then  
`less_equal` | Lesser or equal then (synonyme for <=)  
`like` | Partial match  
`not_like` | Does not partial match  
`is_null` | Value is `NULL`  
`not_null` | Value is not `NULL`  
`in` | Having multiple results which matche, value must be an array e.g. `[1, 2]`  
`not_in` | Having multiple results which do not match, value must be an array e.g. `[1, 2]`  
```

--------------------------------

### POST /invoices

Source: https://docs.bexio.com/

Creates a new invoice document with specified contact, financial, and position details.

```APIDOC
## POST /invoices

### Description
Creates a new invoice in the system.

### Method
POST

### Request Body
- **document_nr** (string) - Required - Document number
- **contact_id** (integer) - Required - ID of the contact
- **positions** (array) - Required - List of invoice positions

### Request Example
{
  "document_nr": "RE-00001",
  "contact_id": 14,
  "positions": [
    {
      "amount": "5.000000",
      "unit_id": 1,
      "text": "Apples",
      "unit_price": "3.560000"
    }
  ]
}

### Response
#### Success Response (201)
- **id** (integer) - The created invoice ID

#### Response Example
{
  "id": 4,
  "document_nr": "RE-00001"
}
```

--------------------------------

### Create Invoice Reminder (cURL)

Source: https://docs.bexio.com/

Use this cURL command to create a new reminder for a specific invoice. Ensure you replace `{invoice_id}` and `{access-token}` with actual values.

```curl
curl -X POST \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### JSON Response Sample for a Bill

Source: https://docs.bexio.com/

This JSON object represents a successful response for a bill, detailing its properties, line items, discounts, payment information, and attachments.

```json
{
  "id": "64bf865d-988a-496d-a24f-bab2d52e4b4a",
  "document_no": "LR-12345",
  "title": "Bill 42",
  "status": "DRAFT",
  "firstname_suffix": "LeSS",
  "lastname_company": "Organisation",
  "created_at": "2019-02-12T09:53:49",
  "supplier_id": 1323,
  "vendor_ref": "Reference text",
  "contact_partner_id": 647,
  "bill_date": "2019-02-12",
  "due_date": "2019-03-14",
  "pending_amount": 65.23,
  "amount_man": 23.87,
  "amount_calc": 23.9,
  "manual_amount": true,
  "currency_code": "USD",
  "exchange_rate": 2.3455365492,
  "base_currency_code": "USD",
  "item_net": false,
  "split_into_line_items": true,
  "purchase_order_id": 637,
  "base_currency_amount": 75.23,
  "overdue": true,
  "qr_bill_information": "//S1/10/10201409/11/190512/20/1400.000-53/30/106017086/31/180508/32/7.7/40/2:10;0:30",
  "address": {
    "title": "Prof",
    "salutation": "Mrs",
    "firstname_suffix": "John",
    "lastname_company": "Newman",
    "address_line": "Mega Street",
    "postcode": "6694",
    "city": "Tel Aviv",
    "country_code": "CH",
    "main_contact_id": 45,
    "contact_address_id": 827,
    "type": "PRIVATE"
},
  "line_items": [
    {
      "id": "2d267f64-6b94-4109-818e-c54515837004",
      "position": 0,
      "title": "First line item title",
      "tax_id": 15,
      "tax_calc": 12.89,
      "amount": 56.8,
      "booking_account_id": 16
},
    {
      "id": "e33ecd04-188e-40b5-92eb-02f9efbf1b1c",
      "position": 1,
      "title": "Second line item title",
      "tax_id": 15,
      "tax_calc": 8.89,
      "amount": 48.8,
      "booking_account_id": 14
}
],
  "discounts": [
    {
      "id": "8b102a32-5bef-462e-a41b-9c00197c26b9",
      "position": 1,
      "amount": 56.8
}
],
  "payment": {
    "type": "IBAN",
    "bank_account_id": 12,
    "fee": "BY_SENDER",
    "execution_date": "2019-03-15",
    "exchange_rate": 2.34553,
    "amount": 3.9,
    "iban": "CH121234567812345678900",
    "name": "LeSS Organisation",
    "address": "1147 Super Street",
    "street": "Super Street",
    "house_no": 1147,
    "postcode": "9999",
    "city": "Tel Aviv",
    "country_code": "CH",
    "message": "This is a message.",
    "booking_text": "Further education.",
    "salary_payment": false,
    "reference_no": "1212345675321984798456",
    "note": "Some note text"
},
  "attachment_ids": [
    "e84b9fe2-3fe2-4fcf-8c30-298fe16adb14",
    "aa9fc418-f292-49ad-9a35-9869123d1091"
]

}
```

--------------------------------

### Fetch Discount Position cURL

Source: https://docs.bexio.com/

Use this cURL command to retrieve a specific discount position from a document. Ensure to replace placeholders with actual document and position IDs.

```bash
curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch a User

Source: https://docs.bexio.com/

Fetches a single user by their ID.

```APIDOC
## Fetch a User

### Description
This action fetches a single user.

### Method
GET

### Endpoint
/3.0/users/{user_id}

### Parameters
#### Path Parameters
- **user_id** (integer) - Required - The ID of the user.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - Description
- **salutation_type** (string) - Description
- **firstname** (string) - Description
- **lastname** (string) - Description
- **email** (string) - Description
- **is_superadmin** (boolean) - Description
- **is_accountant** (boolean) - Description

### Response Example
```json
{
  "id": 4,
  "salutation_type": "male",
  "firstname": "Rudolph",
  "lastname": "Smith",
  "email": "rudolph.smith@example.com",
  "is_superadmin": true,
  "is_accountant": false
}
```
```

--------------------------------

### Add file to manual compound entry

Source: https://docs.bexio.com/

Uploads one or more files to a manual compound entry using multipart/form-data. Ensure the content-type is set correctly and note the 12MB file size limit.

```cURL
curl -X POST \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/files \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Issue an Invoice with Bexio API

Source: https://docs.bexio.com/

Use this cURL command to issue an invoice. Ensure you replace `{invoice_id}` and `{access-token}` with your specific values.

```curl
curl -X POST \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/issue \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Sample Invoice Reminder Response

Source: https://docs.bexio.com/

This is a sample JSON response for an invoice reminder. It includes details such as ID, validity dates, and reminder period.

```json
[
  {
    "id": 4,
    "kb_invoice_id": 1,
    "title": "First reminder",
    "is_valid_from": "2019-06-24",
    "is_valid_to": "2019-07-24",
    "reminder_period_in_days": 14,
    "reminder_level": 1,
    "show_positions": true,
    "remaining_price": "17.8000",
    "received_total": "0.0000",
    "is_sent": false,
    "header": null,
    "footer": null

}

]
```

--------------------------------

### Fetch a Note Response

Source: https://docs.bexio.com/

JSON response object for a single note retrieval.

```json
{
  * "id": 4,
  * "user_id": 1,
  * "event_start": "2019-01-16 14:20:00",
  * "subject": "API conception",
  * "info": "string",
  * "contact_id": 14,
  * "project_id": null,
  * "entry_id": null,
  * "module_id": null

}
```

--------------------------------

### Fetch a List of Default Positions

Source: https://docs.bexio.com/

Fetches a list of all default positions for a document. You can filter the results using limit and offset parameters.

```APIDOC
## GET /2.0/{kb_document_type}/{document_id}/kb_position_custom

### Description
This action fetches a list of all default positions for a document.

### Method
GET

### Endpoint
/2.0/{kb_document_type}/{document_id}/kb_position_custom

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - Enum: "kb_offer" "kb_order" "kb_invoice" - The type of the document. Default positions can be added to quotes, orders and invoices.
- **document_id** (integer) - Required - The ID of the document. E.g. if the `kb_document_type` is set to `kb_invoice` the `document_id` must be set to the ID of the invoice.

#### Query Parameters
- **limit** (integer) - Optional - Default: 500 - Limit the number of results (max is 2000).
- **offset** (integer) - Optional - Default: 0 - Skip over a number of elements by specifying an offset value for the query.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Response
#### Success Response (200)
- **id** (integer) - The ID of the position.
- **amount** (string) - The amount of the position.
- **amount_reserved** (string) - The reserved amount.
- **amount_open** (string) - The open amount.
- **amount_completed** (string) - The completed amount.
- **unit_id** (integer) - The ID of the unit.
- **account_id** (integer) - The ID of the account.
- **unit_name** (string) - The name of the unit.
- **tax_id** (integer) - The ID of the tax.
- **tax_value** (string) - The tax value.
- **text** (string) - The description of the position.
- **unit_price** (string) - The unit price.
- **discount_in_percent** (string) - The discount in percent.
- **position_total** (string) - The total amount for the position.
- **pos** (integer) - The position number.
- **internal_pos** (integer) - The internal position number.
- **is_optional** (boolean) - Indicates if the position is optional.
- **type** (string) - The type of the position (e.g., "KbPositionCustom").
- **parent_id** (integer) - The ID of the parent position, if applicable.

#### Response Example
```json
[
  {
    "id": 1,
    "amount": "5.000000",
    "amount_reserved": "5.000000",
    "amount_open": "5.000000",
    "amount_completed": "5.000000",
    "unit_id": 1,
    "account_id": 1,
    "unit_name": "kg",
    "tax_id": 4,
    "tax_value": "7.70",
    "text": "Apples",
    "unit_price": "3.560000",
    "discount_in_percent": "0.000000",
    "position_total": "17.800000",
    "pos": 1,
    "internal_pos": 1,
    "is_optional": false,
    "type": "KbPositionCustom",
    "parent_id": null
  }
]
```
```

--------------------------------

### Response format for created text position

Source: https://docs.bexio.com/

The JSON object returned upon successful creation of a text position.

```json
{
  "id": 1,
  "text": "This position type allows to add free text to a document",
  "show_pos_nr": false,
  "pos": null,
  "internal_pos": 1,
  "is_optional": false,
  "type": "KbPositionText",
  "parent_id": null
}
```

--------------------------------

### Retrieve Employee Paystub PDF

Source: https://docs.bexio.com/

This cURL command shows how to request a paystub PDF for a specific employee for a given year and month. The Accept header should be set to application/json.

```curl
curl -X GET \
  https://api.bexio.com/4.0/payroll/employees/{employeeId}/paystub-pdf/{year}/{month} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch a list of invoices

Source: https://docs.bexio.com/

Retrieves a list of all invoices with optional sorting, limit, and offset parameters.

```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_invoice \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/send

Source: https://docs.bexio.com/

Sends an invoice reminder by email.

```APIDOC
## POST /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/send

### Description
Sends an invoice reminder by email.

### Method
POST

### Endpoint
/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/send

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The ID of the invoice.
- **reminder_id** (integer) - Required - The ID of the reminder.

#### Header Parameters
- **Accept** (string) - Required - Example: application/json

#### Request Body
- **recipient_email** (string) - Required - During the trial period, the recipient is limited to the email address associated to the access token provided.
- **subject** (string) - Required
- **message** (string) - Required - The placeholder "[Network Link]" must be part of the text.

### Request Example
```json
{
  "recipient_email": "example@bexio.com",
  "subject": "Your new document",
  "message": "Please find the document at [Network Link]"
}
```

### Response
#### Success Response (200)
- **success** (boolean) - Indicates if the operation was successful.

#### Error Response (422)
Validation error.

#### Response Example
```json
{
  "success": true
}
```
```

--------------------------------

### JSON Response Sample for Created Invoice

Source: https://docs.bexio.com/

This JSON represents a successful response after creating an invoice from a quote. It details the invoice number, contact information, financial summary, and line items.

```json
{
  "id": 4,
  "document_nr": "RE-00001",
  "title": null,
  "contact_id": 14,
  "contact_sub_id": null,
  "user_id": 1,
  "project_id": null,
  "logopaper_id": 1,
  "language_id": 1,
  "bank_account_id": 1,
  "currency_id": 1,
  "payment_type_id": 1,
  "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
  "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
  "total_gross": "17.800000",
  "total_net": "17.800000",
  "total_taxes": "1.3706",
  "total_received_payments": "0.000000",
  "total_credit_vouchers": "0.000000",
  "total_remaining_payments": "19.150000",
  "total": "19.150000",
  "total_rounding_difference": -0.02,
  "mwst_type": 0,
  "mwst_is_net": true,
  "show_position_taxes": false,
  "is_valid_from": "2019-06-24",
  "is_valid_to": "2019-07-24",
  "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
  "kb_item_status_id": 3,
  "reference": null,
  "api_reference": null,
  "viewed_by_client_at": null,
  "updated_at": "2019-04-08 13:17:32",
  "esr_id": 1,
  "qr_invoice_id": 1,
  "template_slug": "581a8010821e01426b8b456b",
  "taxs": [
    {
      "percentage": "7.70",
      "value": "1.3706"
}
],
  "network_link": "",
  "positions": [
    {
      "id": 1,
      "amount": "5.000000",
      "amount_reserved": "5.000000",
      "amount_open": "5.000000",
      "amount_completed": "5.000000",
      "unit_id": 1,
      "account_id": 1,
      "unit_name": "kg",
      "tax_id": 4,
      "tax_value": "7.70",
      "text": "Apples",
      "unit_price": "3.560000",
      "discount_in_percent": "0.000000",
      "position_total": "17.800000",
      "pos": 1,
      "internal_pos": 1,
      "is_optional": null,
      "type": "KbPositionCustom",
      "parent_id": null
}
]

}
```

--------------------------------

### cURL Request to Fetch Deliveries

Source: https://docs.bexio.com/

This cURL command demonstrates how to fetch a list of all deliveries from the bexio API. You can include query parameters like `order_by`, `limit`, and `offset` to filter and sort the results. Replace `{access-token}` with your actual API token.

```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_delivery \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /2.0/timesheet/{timesheet_id}

Source: https://docs.bexio.com/

Creates or updates a timesheet entry. It supports different formats for tracking time, either as a duration or a range.

```APIDOC
## POST /2.0/timesheet/{timesheet_id}

### Description
Creates or updates a timesheet entry. It supports different formats for tracking time, either as a duration or a range.

### Method
POST

### Endpoint
https://api.bexio.com/2.0/timesheet/{timesheet_id}

### Parameters
#### Path Parameters
- **timesheet_id** (integer) - Required - The ID of the timesheet to update.

#### Request Body
- **user_id** (integer) - Required - References a user object.
- **status_id** (integer) - Optional - References a timesheet status object.
- **client_service_id** (integer) - Required - References a business activity object.
- **text** (string) - Optional - Description of the timesheet entry.
- **allowable_bill** (boolean) - Required - Indicates if the timesheet entry is billable.
- **charge** (string or null) - Optional - Charge associated with the timesheet entry.
- **contact_id** (integer or null) - Optional - References a contact object.
- **sub_contact_id** (integer or null) - Optional - References a sub-contact object.
- **pr_project_id** (integer or null) - Optional - References a project object.
- **pr_package_id** (integer or null) - Optional - References a package object.
- **pr_milestone_id** (integer or null) - Optional - References a milestone object.
- **estimated_time** (string or null) - Optional - Estimated time for the task in HH:MM format.
- **tracking** (object) - Required - Tracking details, can be of type `duration` or `range`.
  - **type** (string) - Required - Type of tracking, either 'duration' or 'range'.
  - **date** (string) - Required - Date of the tracking in YYYY-MM-DD format.
  - **duration** (string) - Required if type is 'duration' - Tracked time in HH:MM format.
  - **start_time** (string) - Required if type is 'range' - Start time of the tracking in HH:MM:SS format.
  - **end_time** (string) - Required if type is 'range' - End time of the tracking in HH:MM:SS format.

### Request Example
```json
{
  "user_id": 1,
  "status_id": 4,
  "client_service_id": 1,
  "text": "",
  "allowable_bill": true,
  "charge": null,
  "contact_id": 2,
  "sub_contact_id": null,
  "pr_project_id": null,
  "pr_package_id": null,
  "pr_milestone_id": null,
  "estimated_time": "02:30",
  "tracking": {
    "type": "duration",
    "date": "2019-05-20",
    "duration": "01:40"
  }
}
```

### Response
#### Success Response (200)
- **id** (integer) - The ID of the created or updated timesheet.
- **user_id** (integer) - References a user object.
- **status_id** (integer) - References a timesheet status object.
- **client_service_id** (integer) - References a business activity object.
- **text** (string) - Description of the timesheet entry.
- **allowable_bill** (boolean) - Indicates if the timesheet entry is billable.
- **charge** (string or null) - Charge associated with the timesheet entry.
- **contact_id** (integer or null) - References a contact object.
- **sub_contact_id** (integer or null) - References a sub-contact object.
- **pr_project_id** (integer or null) - References a project object.
- **pr_package_id** (integer or null) - References a package object.
- **pr_milestone_id** (integer or null) - References a milestone object.
- **travel_time** (string or null) - Travel time associated with the timesheet entry.
- **travel_charge** (string or null) - Travel charge associated with the timesheet entry.
- **travel_distance** (integer) - Travel distance associated with the timesheet entry.
- **estimated_time** (string) - Estimated time for the task in HH:MM format.
- **date** (string) - Date of the timesheet entry in YYYY-MM-DD format.
- **duration** (string) - Tracked time in HH:MM format.
- **running** (boolean) - Indicates if the timesheet is currently running.
- **tracking** (object) - Tracking details.
  - **type** (string) - Type of tracking.
  - **date** (string) - Date of the tracking.
  - **duration** (string) - Tracked time in HH:MM format.

#### Response Example
```json
{
  "id": 2,
  "user_id": 1,
  "status_id": 4,
  "client_service_id": 1,
  "text": "",
  "allowable_bill": true,
  "charge": null,
  "contact_id": 2,
  "sub_contact_id": null,
  "pr_project_id": null,
  "pr_package_id": null,
  "pr_milestone_id": null,
  "travel_time": null,
  "travel_charge": null,
  "travel_distance": 0,
  "estimated_time": "02:30",
  "date": "2019-05-20",
  "duration": "01:40",
  "running": false,
  "tracking": {
    "type": "duration",
    "date": "2019-05-20",
    "duration": "01:40"
  }
}
```

#### Error Response (422)
- Validation error details.
```

--------------------------------

### Fetch Fictional Users List

Source: https://docs.bexio.com/

Retrieves a list of all fictional users. Supports pagination via limit and offset parameters.

```curl
curl -X GET \
  https://api.bexio.com/3.0/fictional_users \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch List of Countries via cURL

Source: https://docs.bexio.com/

Retrieves a list of all countries with optional sorting and pagination parameters.

```bash
curl -X GET \
  https://api.bexio.com/2.0/country \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch Salutations cURL Request

Source: https://docs.bexio.com/

This cURL command fetches a list of all available salutations. You can optionally limit the results using the 'limit' parameter.

```curl
curl -X GET \
  https://api.bexio.com/2.0/salutation \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Task Priorities

Source: https://docs.bexio.com/

Retrieves a list of all available task priorities.

```APIDOC
## GET /task/priorities

### Description
Fetches a list of all available task priorities.

### Method
GET

### Endpoint
/task/priorities

### Parameters
#### Header Parameters
- **Accept** (string) - Required - Specifies the desired response format, e.g., `application/json`.

### Response
#### Success Response (200)
(Response structure for task priorities not detailed in the provided text, but typically would be an array of priority objects, each with an ID and name.)
```

--------------------------------

### Create Project Request Payload

Source: https://docs.bexio.com/

This JSON payload is used to create a new project. Ensure all required fields are provided according to the API schema.

```json
{
  "document_nr": "project name",
  "name": "Villa Kunterbunt",
  "start_date": "2019-07-12 00:00:00",
  "end_date": null,
  "comment": "",
  "pr_state_id": 2,
  "pr_project_type_id": 2,
  "contact_id": 2,
  "contact_sub_id": null,
  "pr_invoice_type_id": 3,
  "pr_invoice_type_amount": "230.00",
  "pr_budget_type_id": 1,
  "pr_budget_type_amount": "200.00",
  "user_id": 1

}
```

--------------------------------

### Fetch Titles cURL Request

Source: https://docs.bexio.com/

Use this cURL command to fetch a list of all titles. You can optionally specify sorting (`order_by`), limit, and offset parameters. Replace `{access-token}` with your Bearer token.

```curl
curl -X GET \
  https://api.bexio.com/2.0/title \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Create Calendar Year

Source: https://docs.bexio.com/

Creates a new calendar year. If only the year is provided, it defaults to the next year with settings from the previous year. Otherwise, all required parameters must be supplied.

```APIDOC
## POST /3.0/accounting/calendar_years

### Description
Creates a calendar year. If only the year parameter is passed, the next year is created with the same settings as the year before. Otherwise, all parameters must be passed.

### Method
POST

### Endpoint
https://api.bexio.com/3.0/accounting/calendar_years

### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Body
- **year** (string) - Required - The year for which to create an entry. Can be up to 10 years ahead and higher than 2016. If it's a future year, all in-between years are generated with the user's chosen settings.
- **is_vat_subject** (boolean) - Optional - Determines if the calendar year is VAT-subjected.
- **is_annual_reporting** (boolean) - Optional - Determines if annual reporting is enabled for the calendar year.
- **vat_accounting_method** (string) - Optional - VAT accounting method. Enum: "effective", "net_tax".
- **vat_accounting_type** (string) - Optional - VAT accounting type. Enum: "agreed", "collected".
- **default_tax_income_id** (integer) - Optional - Determines the default tax ID for income. References a tax object. Not required if the client has the "bexio mini" plan; in this case, the year is created with the tax ID from the previous year.
- **default_tax_expense_id** (integer) - Optional - Determines the default tax ID for expense. References a tax object. Not required if the client has the "bexio mini" plan; in this case, the year is created with the tax ID from the previous year.

### Request Example (JSON)
```json
{
  "year": "2018",
  "is_vat_subject": true,
  "is_annual_reporting": false,
  "vat_accounting_method": "effective",
  "vat_accounting_type": "agreed",
  "default_tax_income_id": 1,
  "default_tax_expense_id": 2
}
```

### Responses
#### Success Response (201)
- **id** (integer) - Unique identifier for the calendar year.
- **start** (string) - The start date of the calendar year (YYYY-MM-DD).
- **end** (string) - The end date of the calendar year (YYYY-MM-DD).
- **is_vat_subject** (boolean) - Indicates if the calendar year is subject to VAT.
- **is_annual_reporting** (boolean) - Indicates if annual reporting is enabled for the calendar year.
- **created_at** (string) - The timestamp when the calendar year was created.
- **updated_at** (string) - The timestamp when the calendar year was last updated.
- **vat_accounting_method** (string) - The VAT accounting method used (e.g., "effective").
- **vat_accounting_type** (string) - The VAT accounting type used (e.g., "agreed").

#### Error Response (422)
Validation error.

### Response Example (201)
```json
{
  "id": 1,
  "start": "2018-01-01",
  "end": "2018-12-31",
  "is_vat_subject": true,
  "is_annual_reporting": false,
  "created_at": "2017-04-28T19:58:58+00:00",
  "updated_at": "2018-04-30T19:58:58+00:00",
  "vat_accounting_method": "effective",
  "vat_accounting_type": "agreed"
}
```
```

--------------------------------

### Create Salutation Payload

Source: https://docs.bexio.com/

Use this JSON payload to create a new salutation. The 'name' field is required.

```json
{
  "name": "Herr"
}
```

--------------------------------

### Fetch a currency

Source: https://docs.bexio.com/

Retrieves details for a specific currency by ID.

```bash
curl -X GET \
  https://api.bexio.com/3.0/currencies/{currency_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

```json
{
  "id": 1,
  "name": "CHF",
  "round_factor": 0.05
}
```

--------------------------------

### Show reminder PDF

Source: https://docs.bexio.com/

Retrieves the PDF document for an invoice reminder.

```curl
curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### POST /3.0/fictional_users

Source: https://docs.bexio.com/

Creates a new fictional user.

```APIDOC
## POST /3.0/fictional_users

### Description
Creates a new fictional user.

### Method
POST

### Endpoint
https://api.bexio.com/3.0/fictional_users

### Header Parameters
- **Accept** (string) - Required - Example: application/json

### Request Body
- **salutation_type** (string) - Required - Enum: "male", "female"
- **firstname** (string) - Required - Max length: 80 characters.
- **lastname** (string) - Required - Max length: 80 characters.
- **email** (string) - Required - Must be a valid email format. This email can only be used once for both regular and fictional users.
- **title_id** (integer) - Optional - A reference to a title.

### Request Example
```json
{
  "salutation_type": "male",
  "firstname": "Rudolph",
  "lastname": "Smith",
  "email": "rudolph.smith@bexio.com",
  "title_id": null
}
```

### Responses
#### Success Response (201)
Created
- **id** (integer) - The unique identifier for the fictional user.
- **salutation_type** (string) - The salutation type (e.g., 'male', 'female').
- **firstname** (string) - The first name of the fictional user.
- **lastname** (string) - The last name of the fictional user.
- **email** (string) - The email address of the fictional user.
- **title_id** (integer) - A reference to a title.

#### Error Response (422)
Validation error

### Response Example (201)
```json
{
  "id": 4,
  "salutation_type": "male",
  "firstname": "Rudolph",
  "lastname": "Smith",
  "email": "rudolph.smith@bexio.com",
  "title_id": null
}
```
```

--------------------------------

### Response format for text positions

Source: https://docs.bexio.com/

The JSON structure returned when fetching text positions.

```json
[
  {
    "id": 1,
    "text": "This position type allows to add free text to a document",
    "show_pos_nr": false,
    "pos": null,
    "internal_pos": 1,
    "is_optional": false,
    "type": "KbPositionText",
    "parent_id": null
  }
]
```

--------------------------------

### Fetch Payment Response

Source: https://docs.bexio.com/

JSON object returned after successfully fetching a specific payment.

```json
{
  "id": 4,
  "date": "2019-06-29",
  "value": "10.0000",
  "bank_account_id": 1,
  "title": "Received Payment",
  "payment_service_id": null,
  "is_client_account_redemption": false,
  "is_cash_discount": false,
  "kb_invoice_id": 1,
  "kb_credit_voucher_id": null,
  "kb_bill_id": null,
  "kb_credit_voucher_text": ""
}
```

--------------------------------

### Invoice Response Sample

Source: https://docs.bexio.com/

JSON structure returned by the API after a successful invoice request.

```json
{
  "id": 4,
  "document_nr": "RE-00001",
  "title": null,
  "contact_id": 14,
  "contact_sub_id": null,
  "user_id": 1,
  "project_id": null,
  "logopaper_id": 1,
  "language_id": 1,
  "bank_account_id": 1,
  "currency_id": 1,
  "payment_type_id": 1,
  "header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
  "footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
  "total_gross": "17.800000",
  "total_net": "17.800000",
  "total_taxes": "1.3706",
  "total_received_payments": "0.000000",
  "total_credit_vouchers": "0.000000",
  "total_remaining_payments": "19.150000",
  "total": "19.150000",
  "total_rounding_difference": -0.02,
  "mwst_type": 0,
  "mwst_is_net": true,
  "show_position_taxes": false,
  "is_valid_from": "2019-06-24",
  "is_valid_to": "2019-07-24",
  "contact_address": "Muster AG\nMusterstrasse 15\n8640 Rapperswil",
  "kb_item_status_id": 3,
  "reference": null,
  "api_reference": null,
  "viewed_by_client_at": null,
  "updated_at": "2019-04-08 13:17:32",
  "esr_id": 1,
  "qr_invoice_id": 1,
  "template_slug": "581a8010821e01426b8b456b",
  "taxs": [
    {
      "percentage": "7.70",
      "value": "1.3706"
    }
  ],
  "network_link": "",
  "positions": [
    {
      "id": 1,
      "amount": "5.000000",
      "amount_reserved": "5.000000",
      "amount_open": "5.000000",
      "amount_completed": "5.000000",
      "unit_id": 1,
      "account_id": 1,
      "unit_name": "kg",
      "tax_id": 4,
      "tax_value": "7.70",
      "text": "Apples",
      "unit_price": "3.560000",
      "discount_in_percent": "0.000000",
      "position_total": "17.800000",
      "pos": 1,
      "internal_pos": 1,
      "is_optional": null,
      "type": "KbPositionCustom",
      "parent_id": null
    }
  ]
}
```

--------------------------------

### Create Title Request Payload

Source: https://docs.bexio.com/

Send this JSON payload to create a new title. The 'name' field is required.

```json
{
  "name": "Dr."

}
```

--------------------------------

### Purchase Order JSON Response Structure

Source: https://docs.bexio.com/

Represents the data structure returned when successfully fetching a purchase order.

```json
{
  "id": 1,
  "document_nr": "RE-00001",
  "kb_payment_template_id": 1,
  "payment_type_id": 1,
  "title": "purchase order example title",
  "contact_id": 14,
  "contact_sub_id": 1,
  "template_slug": "581a8010821e01426b8b456b",
  "user_id": 1,
  "project_id": 1,
  "logopaper_id": 1,
  "language": {
    "id": 1,
    "name": "Deutsch",
    "decimalpoint": ".",
    "thousandsseparator": "'",
    "iso_639_1": "de",
    "date_format": "d.m.Y"
},
  "language_id": 1,
  "bank_account_id": 1,
  "currency": {
    "id": 1,
    "name": "CHF",
    "round_factor": 0.05
},
  "currency_id": 1,
  "header": "We would like to order the following products:",
  "footer": "Many thanks for the fast processing of our order.",
  "total_rounding_difference": -0.02,
  "mwst_type": "included",
  "mwst_is_net": true,
  "is_compact_view": false,
  "show_position_taxes": false,
  "salesman_user_id": 1,
  "is_valid_from": "2019-06-24",
  "is_valid_to": "2019-07-24",
  "delivery_address_type": "contact_address",
  "contact_address_manual": "bexio AG\nReinluftweg 1\nCH - 9630 Wattwil",
  "delivery_address_manual": "bexio AG\nReinluftweg 1\nCH - 9630 Wattwil",
  "nb_decimals_amount": 2,
  "nb_decimals_price": 2,
  "kb_item_status_id": 22,
  "terms_of_payment_text": "Payable within 30 days",
  "reference": "Based on Quote Q-3860",
  "api_reference": null,
  "mail": "support@bexio.com",
  "viewed_by_client_at": "2020-07-24",
  "is_valid_until": "2019-07-24",
  "created_at": "2020-04-28T19:58:58+00:00",
  "updated_at": "2020-04-30T19:58:58+00:00",
  "custom_translations": { },
  "date_format": "d.m.Y",
  "positions": {
    "required": [
      {
        "type": "text",
        "pos": null,
        "is_optional": false,
        "id": 1,
        "text": "This position type allows to add free text to a document",
        "show_pos_nr": false
}
],
    "optional": [
      {
        "type": "text",
        "pos": null,
        "is_optional": false,
        "id": 1,
        "text": "This position type allows to add free text to a document",
        "show_pos_nr": false
}
],
    "discount": [
      {
        "type": "discount",
        "pos": null,
        "is_optional": false,
        "id": 1,
        "text": "Partner discount",
        "is_percentual": true,
        "value": 10,
        "discount_total": 1.78
}
]
}

}
```

--------------------------------

### Create Custom Document Position Payload

Source: https://docs.bexio.com/

JSON payload structure for creating a new custom document position.

```json
{
  * "amount": "5.000000",
  * "amount_reserved": "5.000000",
  * "amount_open": "5.000000",
  * "amount_completed": "5.000000",
  * "unit_id": 1,
  * "account_id": 1,
  * "tax_id": 4,
  * "text": "Apples",
  * "unit_price": "3.560000",
  * "discount_in_percent": "0.000000",
  * "is_optional": false

}
```

--------------------------------

### POST /bills

Source: https://docs.bexio.com/

Creates a new bill in the system with detailed line items, payment information, and address details.

```APIDOC
## POST /bills

### Description
Creates a new bill record.

### Method
POST

### Request Body
- **supplier_id** (integer) - Required
- **vendor_ref** (string) - Optional
- **title** (string) - Required
- **bill_date** (string) - Required
- **due_date** (string) - Required
- **line_items** (array) - Required
- **payment** (object) - Optional

### Request Example
{
  "supplier_id": 1323,
  "vendor_ref": "Reference text",
  "title": "Bill 42",
  "bill_date": "2019-02-12",
  "due_date": "2019-03-14"
}

### Response
#### Success Response (201)
- **id** (string) - The unique identifier of the created bill.

#### Response Example
{
  "id": "64bf865d-988a-496d-a24f-bab2d52e4b4a",
  "status": "DRAFT"
}
```

--------------------------------

### Specify Accept-Language Header

Source: https://docs.bexio.com/

Use the 'Accept-Language: xx' header to request translated elements, replacing 'xx' with the ISO 639-1 language code.

```http
Accept-Language: xx
```

--------------------------------

### POST /2.0/{kb_document_type}/{document_id}/kb_position_article

Source: https://docs.bexio.com/

Creates a new item position for a specified document.

```APIDOC
## POST /2.0/{kb_document_type}/{document_id}/kb_position_article

### Description
This action creates a new item position for a document.

### Method
POST

### Endpoint
/2.0/{kb_document_type}/{document_id}/kb_position_article

### Parameters
#### Path Parameters
- **kb_document_type** (string) - Required - The type of the document (kb_offer, kb_order, kb_invoice).
- **document_id** (integer) - Required - The ID of the document.

#### Request Body
- **amount** (string) - Required
- **amount_reserved** (string) - Required
- **amount_open** (string) - Required
- **amount_completed** (string) - Required
- **unit_id** (integer) - Required - References a unit object
- **account_id** (integer) - Required - References an account object
- **tax_id** (integer) - Required - References a tax object
- **text** (string) - Required
- **unit_price** (string) - Required - The price of one unit (max. 6 decimals)
- **discount_in_percent** (string) - Required - The discount (max. 6 decimals)
- **is_optional** (boolean) - Required - Only valid in the case of Quotes or Orders
- **article_id** (integer) - Required - References an item object

### Request Example
{
  "amount": "5.000000",
  "amount_reserved": "5.000000",
  "amount_open": "5.000000",
  "amount_completed": "5.000000",
  "unit_id": 1,
  "account_id": 1,
  "tax_id": 4,
  "text": "Apples",
  "unit_price": "3.560000",
  "discount_in_percent": "0.000000",
  "is_optional": false,
  "article_id": 3
}

### Response
#### Success Response (201)
- **id** (integer) - The created position ID

#### Response Example
{
  "id": 1,
  "amount": "5.000000",
  "amount_reserved": "5.000000",
  "amount_open": "5.000000",
  "amount_completed": "5.000000",
  "unit_id": 1,
  "account_id": 1,
  "unit_name": "kg",
  "tax_id": 4,
  "tax_value": "7.70",
  "text": "Apples",
  "unit_price": "3.560000",
  "discount_in_percent": "0.000000",
  "position_total": "17.800000",
  "pos": 1,
  "internal_pos": 1,
  "is_optional": null,
  "article_id": 3,
  "type": "KbPositionArticle",
  "parent_id": null
}
```

--------------------------------

### POST /2.0/kb_invoice/{invoice_id}/payment

Source: https://docs.bexio.com/

Creates a new payment for a specified invoice.

```APIDOC
## POST /2.0/kb_invoice/{invoice_id}/payment

### Description
This action creates a new payment for an invoice.

### Method
POST

### Endpoint
/2.0/kb_invoice/{invoice_id}/payment

### Parameters
#### Path Parameters
- **invoice_id** (integer) - Required - The id of the invoice.

#### Request Body
- **date** (string) - Required - The date of the payment.
- **value** (string) - Required - The amount of the payment.
- **bank_account_id** (integer or null) - References a bank account object.
- **payment_service_id** (integer or null) - Enum: 0, 1, 2. Specifies the payment service (e.g., PayPal, Stripe).

### Request Example
```json
{
  "date": "2019-06-29",
  "value": "10.0000",
  "bank_account_id": 1,
  "payment_service_id": null
}
```

### Response
#### Success Response (201)
- **id** (integer) - The unique identifier of the payment.
- **date** (string) - The date of the payment.
- **value** (string) - The amount of the payment.
- **bank_account_id** (integer) - The ID of the bank account used.
- **title** (string) - The title of the payment.
- **payment_service_id** (integer or null) - The ID of the payment service.
- **is_client_account_redemption** (boolean) - Indicates if it's a client account redemption.
- **is_cash_discount** (boolean) - Indicates if it's a cash discount.
- **kb_invoice_id** (integer) - The ID of the associated invoice.
- **kb_credit_voucher_id** (integer or null) - The ID of the associated credit voucher.
- **kb_bill_id** (integer or null) - The ID of the associated bill.
- **kb_credit_voucher_text** (string) - Text for the credit voucher.

#### Response Example
```json
{
  "id": 4,
  "date": "2019-06-29",
  "value": "10.0000",
  "bank_account_id": 1,
  "title": "Received Payment",
  "payment_service_id": null,
  "is_client_account_redemption": false,
  "is_cash_discount": false,
  "kb_invoice_id": 1,
  "kb_credit_voucher_id": null,
  "kb_bill_id": null,
  "kb_credit_voucher_text": ""
}
```
```

--------------------------------

### Delete a Project

Source: https://docs.bexio.com/

Permanently deletes a project by its ID. This action cannot be undone.

```bash
curl -X DELETE \
  https://api.bexio.com/2.0/pr_project/{project_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Fetch Account Groups

Source: https://docs.bexio.com/

Retrieves a list of all account groups.

```curl
curl -X GET \
  https://api.bexio.com/2.0/account_groups \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Accept Quote Request

Source: https://docs.bexio.com/

Accepts a quote. Requires the quote status to be set correctly.

```bash
curl -X POST \
  https://api.bexio.com/2.0/kb_offer/{quote_id}/accept \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Retrieve Languages via cURL

Source: https://docs.bexio.com/

Use this cURL command to fetch the list of available languages from the Bexio API.

```bash
curl -X GET \
  https://api.bexio.com/2.0/language \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```

--------------------------------

### Orders API

Source: https://docs.bexio.com/

This section details the API endpoints for managing orders, including fetching a list of all orders.

```APIDOC
## GET /orders

### Description
This action fetches a list of all orders.

### Method
GET

### Endpoint
/orders

### Parameters
No specific parameters are mentioned for this endpoint in the provided text.
```

--------------------------------

### Fetch a Comment (cURL)

Source: https://docs.bexio.com/

Use this cURL command to fetch a single comment for a specific document. Replace placeholders with actual document type, ID, comment ID, and access token.

```bash
curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/comment/{comment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'
```