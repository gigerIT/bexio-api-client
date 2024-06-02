## Resources

- CONTACTS
  - Contacts
  - Contact Relations
  - Contact Groups
  - Contact Sectors
  - Additional Addresses
  - Salutations
  - Titles
- SALES ORDER MANAGEMENT
  - Quotes
  - Orders
  - Deliveries
  - Invoices
  - Document Settings
  - Comments
  - Default positions
  - Item positions
  - Text positions
  - Subtotal positions
  - Discount positions
  - Pagebreak positions
  - Sub positions
  - Document templates
- PURCHASE
  - Bills
  - Expenses
  - Purchase Orders
  - Outgoing Payment 
- ACCOUNTING
  - Accounts
  - Account Groups
  - Calendar Years
  - Business Years
  - Currencies
  - Manual Entries
  - Reports
  - Taxes
  - Vat Periods 
- BANKING
  - Bank Accounts
  - IBAN Payments
  - QR Payments
  - Payments 
- ITEMS & PRODUCTS
  - Items
  - Stock locations
  - Stock Areas 
- PROJECTS & TIME TRACKING
  - Projects
  - Timesheets
  - Business Activities
  - Communication Types 
- FILES
  - Files 
- OTHER
  - Company Profile
  - Countries
  - Languages
  - Notes
  - Payment Types
  - Permissions
  - Tasks
  - Units
  - User Management




## Endpoints
Contacts
Fetch a list of contacts
This action fetches a list of all contacts


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "nr" "name_1" "updated_at"
Example: order_by=name_1
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

show_archived	
boolean
Default: false
Example: show_archived=true
Show archived elements only

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/contact

Request samples

curl -X GET \
  https://api.bexio.com/2.0/contact \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 4,
"nr": "000001",
"contact_type_id": 1,
"name_1": "Example Company",
"name_2": null,
"salutation_id": 2,
"salutation_form": null,
"title_id": null,
"birthday": null,
"address": "Smith Street 22",
"postcode": 8004,
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
Create contact
This action creates a new contact



required
contact_type_id
required
integer
Please use the value 1 for companies or 2 for persons

name_1
required
string
This field is used as the company name if the field contact_type_id is set to 1. Otherwise, the field is used as the last name of the person

name_2	
string or null
This field is used as the company addition if the field contact_type_id is set to 1. Otherwise, the field is used as the first name of the person

salutation_id	
integer or null
References a salutation object

salutation_form	
integer or null
titel_id	
integer or null
References a title object

birthday	
string or null <date>
address	
string or null
postcode	
string or null
city	
string or null
country_id	
integer or null
References a country object

mail	
string or null <email>
mail_second	
string or null <email>
phone_fixed	
string or null
phone_fixed_second	
string or null
phone_mobile	
string or null
fax	
string or null
url	
string or null
skype_name	
string or null
remarks	
string or null
language_id	
integer or null
References a language object

contact_group_ids	
string or null
References one ore multiple contact group objects

contact_branch_ids	
string or null
References one ore multiple contact sector objects

user_id
required
integer
References a user object

owner_id
required
integer
Responses
201
Created

422
Validation error


POST
/2.0/contact

Request samples
Payloa
Content type
application/json

{
"contact_type_id": 1,
"name_1": "Example Company",
"name_2": null,
"salutation_id": 2,
"salutation_form": null,
"titel_id": null,
"birthday": null,
"address": "Smith Street 22",
"postcode": 8004,
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

Response samples
201422
Content type
application/json

{
"id": 4,
"nr": "000001",
"contact_type_id": 1,
"name_1": "Example Company",
"name_2": null,
"salutation_id": 2,
"salutation_form": null,
"title_id": null,
"birthday": null,
"address": "Smith Street 22",
"postcode": 8004,
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
Search contacts
Search contacts via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

id
name_1
name_2
nr
address
mail
mail_second
postcode
city
country_id
contact_group_ids
contact_type_id
updated_at
user_id
phone_fixed
phone_mobile
fax

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "nr" "name_1" "updated_at"
Example: order_by=name_1
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

show_archived	
boolean
Default: false
Example: show_archived=true
Show archived elements only

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/contact/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 4,
"nr": "000001",
"contact_type_id": 1,
"name_1": "Example Company",
"name_2": null,
"salutation_id": 2,
"salutation_form": null,
"title_id": null,
"birthday": null,
"address": "Smith Street 22",
"postcode": 8004,
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
Fetch a contact
This action fetches a single contact


PATH PARAMETERS
contact_id
required
integer <int32>
Example: 1
the id of the contact

QUERY PARAMETERS
show_archived	
boolean
Default: false
Example: show_archived=true
Show archived elements only

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/contact/{contact_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/contact/{contact_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 4,
"nr": "000001",
"contact_type_id": 1,
"name_1": "Example Company",
"name_2": null,
"salutation_id": 2,
"salutation_form": null,
"title_id": null,
"birthday": null,
"address": "Smith Street 22",
"postcode": 8004,
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
Edit a contact
This action edits a single contact


PATH PARAMETERS
contact_id
required
integer <int32>
Example: 1
the id of the contact

HEADER PARAMETERS
Accept
required
string


contact_type_id
required
integer
Please use the value 1 for companies or 2 for persons

name_1
required
string
This field is used as the company name if the field contact_type_id is set to 1. Otherwise, the field is used as the last name of the person

name_2	
string or null
This field is used as the company addition if the field contact_type_id is set to 1. Otherwise, the field is used as the first name of the person

salutation_id	
integer or null
References a salutation object

salutation_form	
integer or null
titel_id	
integer or null
References a title object

birthday	
string or null <date>
address	
string or null
postcode	
string or null
city	
string or null
country_id	
integer or null
References a country object

mail	
string or null <email>
mail_second	
string or null <email>
phone_fixed	
string or null
phone_fixed_second	
string or null
phone_mobile	
string or null
fax	
string or null
url	
string or null
skype_name	
string or null
remarks	
string or null
language_id	
integer or null
References a language object

contact_group_ids	
string or null
References one ore multiple contact group objects

contact_branch_ids	
string or null
References one ore multiple contact sector objects

user_id
required
integer
References a user object

owner_id
required
integer
Responses
200
OK

422
Validation error


POST
/2.0/contact/{contact_id}

Request samples
Payloa
Content type
application/json

{
"contact_type_id": 1,
"name_1": "Example Company",
"name_2": null,
"salutation_id": 2,
"salutation_form": null,
"titel_id": null,
"birthday": null,
"address": "Smith Street 22",
"postcode": 8004,
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

Response samples
200422
Content type
application/json

{
"id": 4,
"nr": "000001",
"contact_type_id": 1,
"name_1": "Example Company",
"name_2": null,
"salutation_id": 2,
"salutation_form": null,
"title_id": null,
"birthday": null,
"address": "Smith Street 22",
"postcode": 8004,
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
Delete a contact
This action deletes a contact. Please note that a contact is marked as deleted and can still be accessed by using the "show deleted contacts" filter.


PATH PARAMETERS
contact_id
required
integer <int32>
Example: 1
the id of the contact

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/contact/{contact_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/contact/{contact_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Bulk create contacts
This action creates multiple contacts in one request



Array 
contact_type_id
required
integer
Please use the value 1 for companies or 2 for persons

name_1
required
string
This field is used as the company name if the field contact_type_id is set to 1. Otherwise, the field is used as the last name of the person

name_2	
string or null
This field is used as the company addition if the field contact_type_id is set to 1. Otherwise, the field is used as the first name of the person

salutation_id	
integer or null
References a salutation object

salutation_form	
integer or null
titel_id	
integer or null
References a title object

birthday	
string or null <date>
address	
string or null
postcode	
string or null
city	
string or null
country_id	
integer or null
References a country object

mail	
string or null <email>
mail_second	
string or null <email>
phone_fixed	
string or null
phone_fixed_second	
string or null
phone_mobile	
string or null
fax	
string or null
url	
string or null
skype_name	
string or null
remarks	
string or null
language_id	
integer or null
References a language object

contact_group_ids	
string or null
References one ore multiple contact group objects

contact_branch_ids	
string or null
References one ore multiple contact sector objects

user_id
required
integer
References a user object

owner_id
required
integer
Responses
200
OK

422
Validation error


POST
/2.0/contact/_bulk_create

Request samples
Payloa
Content type
application/json

[
{
"contact_type_id": 1,
"name_1": "Example Company",
"name_2": null,
"salutation_id": 2,
"salutation_form": null,
"titel_id": null,
"birthday": null,
"address": "Smith Street 22",
"postcode": 8004,
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
]

Response samples
200422
Content type
application/json

[
{
"id": 4,
"nr": "000001",
"contact_type_id": 1,
"name_1": "Example Company",
"name_2": null,
"salutation_id": 2,
"salutation_form": null,
"title_id": null,
"birthday": null,
"address": "Smith Street 22",
"postcode": 8004,
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
Restore a contact
This action restores an archived contact.


PATH PARAMETERS
contact_id
required
integer <int32>
Example: 1
the id of the contact

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


PATCH
/2.0/contact/{contact_id}/restore

Request samples

curl -X PATCH \
  https://api.bexio.com/2.0/contact/{contact_id}/restore \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Contact Relations
Fetch a list of contact relations
This action fetches a list of all contact relations


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "contact_id" "contact_sub_id" "updated_at"
Example: order_by=contact_id
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/contact_relation

Request samples

curl -X GET \
  https://api.bexio.com/2.0/contact_relation \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"contact_id": 2,
"contact_sub_id": 3,
"description": "",
"updated_at": "2019-04-08 13:17:32"
}
]
Create contact relation
This action creates a new contact relation



required
contact_id
required
integer or null
References a contact object

contact_sub_id
required
integer or null
References a contact object

description	
string or null
Responses
201
Created

422
Validation error


POST
/2.0/contact_relation

Request samples
Payloa
Content type
application/json

{
"contact_id": 2,
"contact_sub_id": 3,
"description": ""
}

Response samples
201422
Content type
application/json

{
"id": 4,
"nr": "000001",
"contact_type_id": 1,
"name_1": "Example Company",
"name_2": null,
"salutation_id": 2,
"salutation_form": null,
"title_id": null,
"birthday": null,
"address": "Smith Street 22",
"postcode": 8004,
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
Search contact relations
Search contact relations via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

contact_id
contact_sub_id
updated_at

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "contact_id" "contact_sub_id" "updated_at"
Example: order_by=contact_id
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/contact_relation/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"contact_id": 2,
"contact_sub_id": 3,
"description": "",
"updated_at": "2019-04-08 13:17:32"
}
]
Fetch a contact relation
This action fetches a single contact relation


PATH PARAMETERS
contact_relation_id
required
integer <int32>
Example: 1
the id of the contact relation

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/contact_relation/{contact_relation_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/contact_relation/{contact_relation_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"contact_id": 2,
"contact_sub_id": 3,
"description": "",
"updated_at": "2019-04-08 13:17:32"
}
Edit a contact relation
This action edits a single contact relation


PATH PARAMETERS
contact_relation_id
required
integer <int32>
Example: 1
the id of the contact relation

HEADER PARAMETERS
Accept
required
string


contact_id
required
integer or null
References a contact object

contact_sub_id
required
integer or null
References a contact object

description	
string or null
Responses
200
OK

422
Validation error


POST
/2.0/contact_relation/{contact_relation_id}

Request samples
Payloa
Content type
application/json

{
"contact_id": 2,
"contact_sub_id": 3,
"description": ""
}

Response samples
200422
Content type
application/json

{
"id": 1,
"contact_id": 2,
"contact_sub_id": 3,
"description": "",
"updated_at": "2019-04-08 13:17:32"
}
Delete a contact relation
This action permanently deletes a contact relation. It cannot be undone.


PATH PARAMETERS
contact_relation_id
required
integer <int32>
Example: 1
the id of the contact relation

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/contact_relation/{contact_relation_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/contact_relation/{contact_relation_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Contact Groups
Fetch a list of contact groups
This action fetches a list of all contact groups


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/contact_group

Request samples

curl -X GET \
  https://api.bexio.com/2.0/contact_group \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Suppliers"
}
]
Create contact group
This action creates a new contact group



required
name
required
string
Responses
201
Created

422
Validation error


POST
/2.0/contact_group

Request samples
Payloa
Content type
application/json

{
"name": "Suppliers"
}

Response samples
201422
Content type
application/json

{
"id": 1,
"name": "Suppliers"
}
Search contact groups
Search contact groups via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/contact_group/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "Suppliers"
}
]
Fetch a contact group
This action fetches a single contact group


PATH PARAMETERS
contact_group_id
required
integer <int32>
Example: 1
the id of the contact group

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/contact_group/{contact_group_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/contact_group/{contact_group_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"name": "Suppliers"
}
Edit a contact group
This action edits a single contact group


PATH PARAMETERS
contact_group_id
required
integer <int32>
Example: 1
the id of the contact group

HEADER PARAMETERS
Accept
required
string


name
required
string
Responses
200
OK

422
Validation error


POST
/2.0/contact_group/{contact_group_id}

Request samples
Payloa
Content type
application/json

{
"name": "Suppliers"
}

Response samples
200422
Content type
application/json

{
"id": 1,
"name": "Suppliers"
}
Delete a contact group
This action permanently deletes a contact group. It cannot be undone.


PATH PARAMETERS
contact_group_id
required
integer <int32>
Example: 1
the id of the contact group

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/contact_group/{contact_group_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/contact_group/{contact_group_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Contact Sectors
Fetch a list of contact sectors
This action fetches a list of all contact sectors


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/contact_branch

Request samples

curl -X GET \
  https://api.bexio.com/2.0/contact_branch \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Photography"
}
]
Search contact sectors
Search contact sectors via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/contact_branch/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "Photography"
}
]
Additional Addresses
Fetch a list of additional addresses
This action fetches a list of all additional addresses for a given contact


PATH PARAMETERS
contact_id
required
integer <int32>
Example: 1
the id of the contact

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name" "postcode" "country_id"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/contact/{contact_id}/additional_address

Request samples

curl -X GET \
  https://api.bexio.com/2.0/contact/{contact_id}/additional_address \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "My new address",
"address": "Walter Street 22",
"postcode": 9000,
"city": "St. Gallen",
"country_id": 1,
"subject": "Additional address",
"description": "This is an internal description"
}
]
Create additional address
This action creates a new additional address


PATH PARAMETERS
contact_id
required
integer <int32>
Example: 1
the id of the contact

HEADER PARAMETERS
Accept
required
string


required
name	
string
address	
string or null
postcode	
string or null
city	
string or null
country_id	
integer or null
References a country object

subject	
string
description	
string
Responses
201
Created

422
Validation error


POST
/2.0/contact/{contact_id}/additional_address

Request samples
Payloa
Content type
application/json

{
"name": "My new address",
"address": "Walter Street 22",
"postcode": 9000,
"city": "St. Gallen",
"country_id": 1,
"subject": "Additional address",
"description": "This is an internal description"
}

Response samples
201422
Content type
application/json

{
"id": 1,
"name": "My new address",
"address": "Walter Street 22",
"postcode": 9000,
"city": "St. Gallen",
"country_id": 1,
"subject": "Additional address",
"description": "This is an internal description"
}
Search additional addresses
Search additional addresses via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name
address
postcode
city
country_id
subject
email

PATH PARAMETERS
contact_id
required
integer <int32>
Example: 1
the id of the contact

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name" "postcode" "country_id"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/contact/{contact_id}/additional_address/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "My new address",
"address": "Walter Street 22",
"postcode": 9000,
"city": "St. Gallen",
"country_id": 1,
"subject": "Additional address",
"description": "This is an internal description"
}
]
Fetch an additional address
This action fetches an additional address for a given contact


PATH PARAMETERS
contact_id
required
integer <int32>
Example: 1
the id of the contact

additional_address_id
required
integer <int32>
Example: 1
the id of the additional address

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/contact/{contact_id}/additional_address/{additional_address_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/contact/{contact_id}/additional_address/{additional_address_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"name": "My new address",
"address": "Walter Street 22",
"postcode": 9000,
"city": "St. Gallen",
"country_id": 1,
"subject": "Additional address",
"description": "This is an internal description"
}
Edit an additional address
This action edits an additional address


PATH PARAMETERS
contact_id
required
integer <int32>
Example: 1
the id of the contact

additional_address_id
required
integer <int32>
Example: 1
the id of the additional address

HEADER PARAMETERS
Accept
required
string


name	
string
address	
string or null
postcode	
string or null
city	
string or null
country_id	
integer or null
References a country object

subject	
string
description	
string
Responses
200
OK

422
Validation error


POST
/2.0/contact/{contact_id}/additional_address/{additional_address_id}

Request samples
Payloa
Content type
application/json

{
"name": "My new address",
"address": "Walter Street 22",
"postcode": 9000,
"city": "St. Gallen",
"country_id": 1,
"subject": "Additional address",
"description": "This is an internal description"
}

Response samples
200422
Content type
application/json

{
"id": 1,
"name": "My new address",
"address": "Walter Street 22",
"postcode": 9000,
"city": "St. Gallen",
"country_id": 1,
"subject": "Additional address",
"description": "This is an internal description"
}
Delete an additional address
This action permanently deletes an additional address. It cannot be undone.


PATH PARAMETERS
contact_id
required
integer <int32>
Example: 1
the id of the contact

additional_address_id
required
integer <int32>
Example: 1
the id of the additional address

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/contact/{contact_id}/additional_address/{additional_address_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/contact/{contact_id}/additional_address/{additional_address_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Salutations
Fetch a list of salutations
This action fetches a list of all salutations


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/salutation

Request samples

curl -X GET \
  https://api.bexio.com/2.0/salutation \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Herr"
}
]
Create salutation
This action creates a new salutation



required
name
required
string
Responses
201
Created

422
Validation error


POST
/2.0/salutation

Request samples
Payloa
Content type
application/json

{
"name": "Herr"
}

Response samples
201422
Content type
application/json

{
"id": 1,
"name": "Herr"
}
Search salutations
Search salutations via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/salutation/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "Herr"
}
]
Fetch a salutation
This action fetches a single salutation


PATH PARAMETERS
salutation_id
required
integer <int32>
Example: 1
the id of the salutation

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/salutation/{salutation_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/salutation/{salutation_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"name": "Herr"
}
Edit a salutation
This action edits a single salutation


PATH PARAMETERS
salutation_id
required
integer <int32>
Example: 1
the id of the salutation

HEADER PARAMETERS
Accept
required
string


name
required
string
Responses
200
OK

422
Validation error


POST
/2.0/salutation/{salutation_id}

Request samples
Payloa
Content type
application/json

{
"name": "Herr"
}

Response samples
200422
Content type
application/json

{
"id": 1,
"name": "Herr"
}
Delete a salutation
This action permanently deletes a salutation. It cannot be undone.


PATH PARAMETERS
salutation_id
required
integer <int32>
Example: 1
the id of the salutation

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/salutation/{salutation_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/salutation/{salutation_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Titles
Fetch a list of titles
This action fetches a list of all titles


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/title

Request samples

curl -X GET \
  https://api.bexio.com/2.0/title \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Dr."
}
]
Create title
This action creates a new title



required
name
required
string
Responses
201
Created

422
Validation error


POST
/2.0/title

Request samples
Payloa
Content type
application/json

{
"name": "Dr."
}

Response samples
201422
Content type
application/json

{
"id": 1,
"name": "Dr."
}
Search titles
Search titles via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/title/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "Dr."
}
]
Fetch a title
This action fetches a single title


PATH PARAMETERS
title_id
required
integer <int32>
Example: 1
the id of the title

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/title/{title_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/title/{title_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"name": "Dr."
}
Edit a title
This action edits a single title


PATH PARAMETERS
title_id
required
integer <int32>
Example: 1
the id of the title

HEADER PARAMETERS
Accept
required
string


name
required
string
Responses
200
OK

422
Validation error


POST
/2.0/title/{title_id}

Request samples
Payloa
Content type
application/json

{
"name": "Dr."
}

Response samples
200422
Content type
application/json

{
"id": 1,
"name": "Dr."
}
Delete a title
This action permanently deletes a title. It cannot be undone.


PATH PARAMETERS
title_id
required
integer <int32>
Example: 1
the id of the title

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/title/{title_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/title/{title_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Quotes
Fetch a list of quotes
This action fetches a list of all quotes


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "total" "total_net" "total_gross" "updated_at"
Example: order_by=total
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_offer

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_offer \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"api_reference": null,
"viewed_by_client_at": null,
"kb_terms_of_payment_template_id": null,
"show_total": true,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [],
"network_link": ""
}
]
Create quote
This action creates a new quote



required
title	
string or null
contact_id	
integer or null
References a contact object

contact_sub_id	
integer or null
References a contact object

user_id	
integer
References a user object

pr_project_id	
integer or null
References a project object

logopaper_id	
integer
Deprecated
language_id	
integer
References a language object

bank_account_id	
integer
References a bank account object

currency_id	
integer
References a currency object

payment_type_id	
integer
References a payment type object

header	
string
footer	
string
mwst_type	
integer
Enum: 0 1 2
value	description
0	including taxes
1	excluding taxes
2	exempt from taxes
mwst_is_net	
boolean
This value affects the total if the field mwst_type has been set to 0.
false = Taxes are included in the total
true = Taxes will be added to the total

show_position_taxes	
boolean
is_valid_from	
string <date>
is_valid_until	
string <date>
delivery_address_type	
integer
api_reference	
string or null
This field can only be read and edited by the api. It can be used to save references to other systems.

viewed_by_client_at	
string or null
kb_terms_of_payment_template_id	
integer or null
template_slug	
string or null
References a document template slug

positions	
Array of PositionCustomExtended (object) or PositionArticleExtended (object) or PositionTextExtended (object) or PositionSubtotalExtended (object) or PositionPagebreakExtended (object) or PositionDiscountExtended (object)
Please note that you can combine multiple positions. This means that an array containing KbPositionCustom and KbPositionArticle positions is valid.

Responses
201
Created

422
Validation error


POST
/2.0/kb_offer

Request samples
Payloa
Content type
application/json

{
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
"header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
"footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
"mwst_type": 0,
"mwst_is_net": true,
"show_position_taxes": false,
"is_valid_from": "2019-06-24",
"is_valid_until": "2019-07-24",
"delivery_address_type": 0,
"api_reference": null,
"viewed_by_client_at": null,
"kb_terms_of_payment_template_id": null,
"template_slug": "581a8010821e01426b8b456b",
"positions": [
{}
]
}

Response samples
201422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"api_reference": null,
"viewed_by_client_at": null,
"kb_terms_of_payment_template_id": null,
"show_total": true,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Search quotes
Search quotes via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

id
kb_item_status_id
document_nr
title
contact_id
contact_sub_id
user_id
currency_id
total_gross
total_net
total
is_valid_from
is_valid_to
is_valid_until
updated_at

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "total" "total_net" "total_gross" "updated_at"
Example: order_by=total
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/kb_offer/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"api_reference": null,
"viewed_by_client_at": null,
"kb_terms_of_payment_template_id": null,
"show_total": true,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [],
"network_link": ""
}
]
Fetch a quote
This action fetches a single quote


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_offer/{quote_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_offer/{quote_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"api_reference": null,
"viewed_by_client_at": null,
"kb_terms_of_payment_template_id": null,
"show_total": true,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Edit a quote
This action edits a single quote


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string


title	
string or null
contact_id	
integer or null
References a contact object

contact_sub_id	
integer or null
References a contact object

user_id	
integer
References a user object

pr_project_id	
integer or null
References a project object

logopaper_id	
integer
Deprecated
language_id	
integer
References a language object

bank_account_id	
integer
References a bank account object

currency_id	
integer
References a currency object

payment_type_id	
integer
References a payment type object

header	
string
footer	
string
mwst_type	
integer
Enum: 0 1 2
value	description
0	including taxes
1	excluding taxes
2	exempt from taxes
mwst_is_net	
boolean
This value affects the total if the field mwst_type has been set to 0.
false = Taxes are included in the total
true = Taxes will be added to the total

show_position_taxes	
boolean
is_valid_from	
string <date>
is_valid_until	
string <date>
delivery_address_type	
integer
api_reference	
string or null
This field can only be read and edited by the api. It can be used to save references to other systems.

viewed_by_client_at	
string or null
kb_terms_of_payment_template_id	
integer or null
template_slug	
string or null
References a document template slug

Responses
200
OK

422
Validation error


POST
/2.0/kb_offer/{quote_id}

Request samples
Payloa
Content type
application/json

{
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
"header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
"footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
"mwst_type": 0,
"mwst_is_net": true,
"show_position_taxes": false,
"is_valid_from": "2019-06-24",
"is_valid_until": "2019-07-24",
"delivery_address_type": 0,
"api_reference": null,
"viewed_by_client_at": null,
"kb_terms_of_payment_template_id": null,
"template_slug": "581a8010821e01426b8b456b"
}

Response samples
200422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"api_reference": null,
"viewed_by_client_at": null,
"kb_terms_of_payment_template_id": null,
"show_total": true,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Delete a quote
This action permanently deletes a quote. It cannot be undone.


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/kb_offer/{quote_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/kb_offer/{quote_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Issue a quote
This action issues a quote. The quote must be in the draft status.


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_offer/{quote_id}/issue

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_offer/{quote_id}/issue \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Revert issue a quote
This action reverts a quote to the draft status


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_offer/{quote_id}/revertIssue

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_offer/{quote_id}/revertIssue \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Accept a quote
This action accepts a quote. The value kb_item_status_id must be 2 in this case.


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_offer/{quote_id}/accept

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_offer/{quote_id}/accept \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Decline a quote
This action declines a quote. The value kb_item_status_id must be 2 in this case.


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_offer/{quote_id}/reject

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_offer/{quote_id}/reject \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Reissue a quote
This action re-issues a quote. Meaning the status is changed to pending from either accepted or declined.


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_offer/{quote_id}/reissue

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_offer/{quote_id}/reissue \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Mark quote as sent
This action marks a quote as sent


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_offer/{quote_id}/mark_as_sent

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_offer/{quote_id}/mark_as_sent \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Show PDF
This action returns a pdf document of the quote.


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_offer/{quote_id}/pdf

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_offer/{quote_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"name": "document-00005.pdf",
"size": 9768,
"mime": "application/pdf",
"content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="
}
Send a quote
This action sends a quote by email.


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string


recipient_email
required
string <email>
During the trial period, the recipient is limited to the email address associated to the access token provided.

subject
required
string
message
required
string
The placeholder "[Network Link]" must be part of the text.

mark_as_open
required
boolean
attach_pdf	
boolean
Attach PDF directly to the email

Responses
200
OK

422
Validation error


POST
/2.0/kb_offer/{quote_id}/send

Request samples
Payloa
Content type
application/json

{
"recipient_email": "example@bexio.com",
"subject": "Your new document",
"message": "Please find the document at [Network Link]",
"mark_as_open": true,
"attach_pdf": true
}

Response samples
200422
Content type
application/json

{
"success": true
} a quote
This action copies a quote.


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string


contact_id
required
integer or null
References a contact object

contact_sub_id	
integer or null
References a contact object

is_valid_from	
string <date>
pr_project_id	
integer or null
References a project object

title	
string or null
Responses
200
OK

422
Validation error


POST
/2.0/kb_offer/{quote_id}

Request samples
Payloa
Content type
application/json

{
"contact_id": 14,
"contact_sub_id": null,
"is_valid_from": "2019-06-27",
"pr_project_id": null,
"title": null
}

Response samples
200422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"api_reference": null,
"viewed_by_client_at": null,
"kb_terms_of_payment_template_id": null,
"show_total": true,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Create order from quote
This action creates an order from a quote.


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string


positions	
Array of objects
Please note that the positions array can be omitted to create a document with all positions from the source document.

Responses
200
OK

422
Validation error


POST
/2.0/kb_offer/{quote_id}/order

Request samples
Payloa
Content type
application/json

{
"positions": [
{}
]
}

Response samples
200422
Content type
application/json

{
"id": 4,
"document_nr": "AU-00001",
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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 5,
"is_recurring": false,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Create invoice from quote
This action creates an invoice from a quote.


PATH PARAMETERS
quote_id
required
integer <int32>
Example: 1
the id of the quote

HEADER PARAMETERS
Accept
required
string


positions	
Array of objects
Please note that the positions array can be omitted to create a document with all positions from the source document.

Responses
200
OK

422
Validation error


POST
/2.0/kb_offer/{quote_id}/invoice

Request samples
Payloa
Content type
application/json

{
"positions": [
{}
]
}

Response samples
200422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"reference": null,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"esr_id": 1,
"qr_invoice_id": 1,
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Orders
Fetch a list of orders
This action fetches a list of all orders


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "total" "total_net" "total_gross" "updated_at"
Example: order_by=total
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_order

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_order \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 4,
"document_nr": "AU-00001",
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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 5,
"is_recurring": false,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [],
"network_link": ""
}
]
Create order
This action creates a new order



required
title	
string or null
contact_id	
integer or null
References a contact object

contact_sub_id	
integer or null
References a contact object

user_id	
integer
References a user object

pr_project_id	
integer or null
References a project object

logopaper_id	
integer
Deprecated
language_id	
integer
References a language object

bank_account_id	
integer
References a bank account object

currency_id	
integer
References a currency object

payment_type_id	
integer
References a payment type object

header	
string
footer	
string
mwst_type	
integer
Enum: 0 1 2
value	description
0	including taxes
1	excluding taxes
2	exempt from taxes
mwst_is_net	
boolean
This value affects the total if the field mwst_type has been set to 0.
false = Taxes are included in the total
true = Taxes will be added to the total

show_position_taxes	
boolean
is_valid_from	
string <date>
delivery_address_type	
integer
api_reference	
string or null
This field can only be read and edited by the api. It can be used to save references to other systems.

template_slug	
string or null
References a document template slug

positions	
Array of PositionCustomExtended (object) or PositionArticleExtended (object) or PositionTextExtended (object) or PositionSubtotalExtended (object) or PositionPagebreakExtended (object) or PositionDiscountExtended (object)
Please note that you can combine multiple positions. This means that an array containing KbPositionCustom and KbPositionArticle positions is valid.

Responses
201
Created

422
Validation error


POST
/2.0/kb_order

Request samples
Payloa
Content type
application/json

{
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
"header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
"footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
"mwst_type": 0,
"mwst_is_net": true,
"show_position_taxes": false,
"is_valid_from": "2019-06-24",
"delivery_address_type": 0,
"api_reference": null,
"template_slug": "581a8010821e01426b8b456b",
"positions": [
{}
]
}

Response samples
201422
Content type
application/json

{
"id": 4,
"document_nr": "AU-00001",
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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 5,
"is_recurring": false,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Search orders
Search orders via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

id
kb_item_status_id
document_nr
title
contact_id
contact_sub_id
user_id
currency_id
total_gross
total_net
total
is_valid_from
is_valid_to
updated_at

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "total" "total_net" "total_gross" "updated_at"
Example: order_by=total
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/kb_order/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 4,
"document_nr": "AU-00001",
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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 5,
"is_recurring": false,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [],
"network_link": ""
}
]
Fetch an order
This action fetches a single order


PATH PARAMETERS
order_id
required
integer <int32>
Example: 1
the id of the order

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_order/{order_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_order/{order_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 4,
"document_nr": "AU-00001",
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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 5,
"is_recurring": false,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Edit an order
This action edits a single order


PATH PARAMETERS
order_id
required
integer <int32>
Example: 1
the id of the order

HEADER PARAMETERS
Accept
required
string


title	
string or null
contact_id	
integer or null
References a contact object

contact_sub_id	
integer or null
References a contact object

user_id	
integer
References a user object

pr_project_id	
integer or null
References a project object

logopaper_id	
integer
Deprecated
language_id	
integer
References a language object

bank_account_id	
integer
References a bank account object

currency_id	
integer
References a currency object

payment_type_id	
integer
References a payment type object

header	
string
footer	
string
mwst_type	
integer
Enum: 0 1 2
value	description
0	including taxes
1	excluding taxes
2	exempt from taxes
mwst_is_net	
boolean
This value affects the total if the field mwst_type has been set to 0.
false = Taxes are included in the total
true = Taxes will be added to the total

show_position_taxes	
boolean
is_valid_from	
string <date>
delivery_address_type	
integer
api_reference	
string or null
This field can only be read and edited by the api. It can be used to save references to other systems.

template_slug	
string or null
References a document template slug

Responses
200
OK

422
Validation error


POST
/2.0/kb_order/{order_id}

Request samples
Payloa
Content type
application/json

{
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
"header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
"footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
"mwst_type": 0,
"mwst_is_net": true,
"show_position_taxes": false,
"is_valid_from": "2019-06-24",
"delivery_address_type": 0,
"api_reference": null,
"template_slug": "581a8010821e01426b8b456b"
}

Response samples
200422
Content type
application/json

{
"id": 4,
"document_nr": "AU-00001",
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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 5,
"is_recurring": false,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Delete an order
This action permanently deletes an order. It cannot be undone.


PATH PARAMETERS
order_id
required
integer <int32>
Example: 1
the id of the order

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/kb_order/{order_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/kb_order/{order_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Create delivery from order
This action creates a delivery from an order.


PATH PARAMETERS
order_id
required
integer <int32>
Example: 1
the id of the order

HEADER PARAMETERS
Accept
required
string


positions	
Array of objects
Please note that the positions array can be omitted to create a document with all positions from the source document.

Responses
200
OK

422
Validation error


POST
/2.0/kb_order/{order_id}/delivery

Request samples
Payloa
Content type
application/json

{
"positions": [
{}
]
}

Response samples
200422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 10,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"taxs": [
{}
],
"positions": [
{}
]
}
Create invoice from order
This action creates an invoice from an order.


PATH PARAMETERS
order_id
required
integer <int32>
Example: 1
the id of the order

HEADER PARAMETERS
Accept
required
string


positions	
Array of objects
Please note that the positions array can be omitted to create a document with all positions from the source document.

Responses
200
OK

422
Validation error


POST
/2.0/kb_order/{order_id}/invoice

Request samples
Payloa
Content type
application/json

{
"positions": [
{}
]
}

Response samples
200422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"reference": null,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"esr_id": 1,
"qr_invoice_id": 1,
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Show PDF
This action returns a pdf document of the order.


PATH PARAMETERS
order_id
required
integer <int32>
Example: 1
the id of the order

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_order/{order_id}/pdf

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_order/{order_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"name": "document-00005.pdf",
"size": 9768,
"mime": "application/pdf",
"content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="
}
Show repetition
This action fetches an order repetition


PATH PARAMETERS
order_id
required
integer <int32>
Example: 1
the id of the order

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_order/{order_id}/repetition

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_order/{order_id}/repetition \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"start": "2019-01-01",
"end": "2019-12-31",
"repetition": {
"type": "daily",
"interval": 1
}
}
Edit a repetition
This action edits an order repetition


PATH PARAMETERS
order_id
required
integer <int32>
Example: 1
the id of the order

HEADER PARAMETERS
Accept
required
string


start	
string <date>
end	
string or null <date>
Date until the repetition is supposed to run. If empty indefinite repetition is assumed.

repetition	
OrderRepetitionDaily (object) or OrderRepetitionWeekly (object) or OrderRepetitionMonthly (object) or OrderRepetitionYearly (object)
Four different formats can be used to define the repetition. Either type daily, weekly, monthly or type yearly.

Responses
200
OK

422
Validation error


POST
/2.0/kb_order/{order_id}/repetition

Request samples
Payloa
Content type
application/json

{
"start": "2019-01-01",
"end": "2019-12-31",
"repetition": {
"type": "daily",
"interval": 1
}
}

Response samples
200422
Content type
application/json

{
"start": "2019-01-01",
"end": "2019-12-31",
"repetition": {
"type": "daily",
"interval": 1
}
}
Delete a repetition
This action permanently deletes an order repetition. It cannot be undone.


PATH PARAMETERS
order_id
required
integer <int32>
Example: 1
the id of the order

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/kb_order/{order_id}/repetition

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/kb_order/{order_id}/repetition \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Deliveries
Fetch a list of deliveries
This action fetches a list of all deliveries


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "total" "total_net" "total_gross" "updated_at"
Example: order_by=total
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_delivery

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_delivery \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 10,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"taxs": []
}
]
Fetch a delivery
This action fetches a single delivery


PATH PARAMETERS
delivery_id
required
integer <int32>
Example: 1
the id of the delivery

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_delivery/{delivery_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_delivery/{delivery_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"delivery_address_type": 0,
"delivery_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 10,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"taxs": [
{}
],
"positions": [
{}
]
}
Issue a delivery
This action issues a delivery. The delivery must be in the draft status.


PATH PARAMETERS
delivery_id
required
integer <int32>
Example: 1
the id of the delivery

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_delivery/{delivery_id}/issue

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_delivery/{delivery_id}/issue \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Invoices
Fetch a list of invoices
This action fetches a list of all invoices


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "total" "total_net" "total_gross" "updated_at"
Example: order_by=total
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_invoice

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_invoice \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"reference": null,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"esr_id": 1,
"qr_invoice_id": 1,
"template_slug": "581a8010821e01426b8b456b",
"taxs": [],
"network_link": ""
}
]
Create invoice
This action creates a new invoice



required
title	
string or null
contact_id	
integer or null
References a contact object

contact_sub_id	
integer or null
References a contact object

user_id	
integer
References a user object

pr_project_id	
integer or null
References a project object

logopaper_id	
integer
Deprecated
language_id	
integer
References a language object

bank_account_id	
integer
References a bank account object

currency_id	
integer
References a currency object

payment_type_id	
integer
References a payment type object

header	
string
footer	
string
mwst_type	
integer
Enum: 0 1 2
value	description
0	including taxes
1	excluding taxes
2	exempt from taxes
mwst_is_net	
boolean
This value affects the total if the field mwst_type has been set to 0.
false = Taxes are included in the total
true = Taxes will be added to the total

show_position_taxes	
boolean
is_valid_from	
string <date>
is_valid_to	
string <date>
reference	
string or null
api_reference	
string or null
This field can only be read and edited by the api. It can be used to save references to other systems.

template_slug	
string or null
References a document template slug

positions	
Array of PositionCustomExtended (object) or PositionArticleExtended (object) or PositionTextExtended (object) or PositionSubtotalExtended (object) or PositionPagebreakExtended (object) or PositionDiscountExtended (object)
Please note that you can combine multiple positions. This means that an array containing KbPositionCustom and KbPositionArticle positions is valid.

Responses
201
Created

422
Validation error


POST
/2.0/kb_invoice

Request samples
Payloa
Content type
application/json

{
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
"header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
"footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
"mwst_type": 0,
"mwst_is_net": true,
"show_position_taxes": false,
"is_valid_from": "2019-06-24",
"is_valid_to": "2019-07-24",
"reference": null,
"api_reference": null,
"template_slug": "581a8010821e01426b8b456b",
"positions": [
{}
]
}

Response samples
201422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"reference": null,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"esr_id": 1,
"qr_invoice_id": 1,
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Search invoices
Search invoices via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

id
kb_item_status_id
document_nr
title
api_reference
contact_id
contact_sub_id
user_id
currency_id
total_gross
total_net
total
is_valid_from
is_valid_to
updated_at

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "total" "total_net" "total_gross" "updated_at"
Example: order_by=total
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/kb_invoice/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"reference": null,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"esr_id": 1,
"qr_invoice_id": 1,
"template_slug": "581a8010821e01426b8b456b",
"taxs": [],
"network_link": ""
}
]
Fetch an invoice
This action fetches a single invoice


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_invoice/{invoice_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"reference": null,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"esr_id": 1,
"qr_invoice_id": 1,
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Edit an invoice
This action edits a single invoice


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string


title	
string or null
contact_id	
integer or null
References a contact object

contact_sub_id	
integer or null
References a contact object

user_id	
integer
References a user object

pr_project_id	
integer or null
References a project object

logopaper_id	
integer
Deprecated
language_id	
integer
References a language object

bank_account_id	
integer
References a bank account object

currency_id	
integer
References a currency object

payment_type_id	
integer
References a payment type object

header	
string
footer	
string
mwst_type	
integer
Enum: 0 1 2
value	description
0	including taxes
1	excluding taxes
2	exempt from taxes
mwst_is_net	
boolean
This value affects the total if the field mwst_type has been set to 0.
false = Taxes are included in the total
true = Taxes will be added to the total

show_position_taxes	
boolean
is_valid_from	
string <date>
is_valid_to	
string <date>
reference	
string or null
api_reference	
string or null
This field can only be read and edited by the api. It can be used to save references to other systems.

template_slug	
string or null
References a document template slug

Responses
200
OK

422
Validation error


POST
/2.0/kb_invoice/{invoice_id}

Request samples
Payloa
Content type
application/json

{
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
"header": "Thank you very much for your inquiry. We would be pleased to make you the following offer:",
"footer": "We hope that our offer meets your expectations and will be happy to answer your questions.",
"mwst_type": 0,
"mwst_is_net": true,
"show_position_taxes": false,
"is_valid_from": "2019-06-24",
"is_valid_to": "2019-07-24",
"reference": null,
"api_reference": null,
"template_slug": "581a8010821e01426b8b456b"
}

Response samples
200422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"reference": null,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"esr_id": 1,
"qr_invoice_id": 1,
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Delete an invoice
This action permanently deletes an invoice. It cannot be undone.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/kb_invoice/{invoice_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Show PDF
This action returns a pdf document of the invoice.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_invoice/{invoice_id}/pdf

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"name": "document-00005.pdf",
"size": 9768,
"mime": "application/pdf",
"content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="
} a invoice
This action copies a invoice.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string


contact_id
required
integer or null
References a contact object

contact_sub_id	
integer or null
References a contact object

is_valid_from	
string <date>
pr_project_id	
integer or null
References a project object

title	
string or null
Responses
200
OK

422
Validation error


POST
/2.0/kb_invoice/{invoice_id}

Request samples
Payloa
Content type
application/json

{
"contact_id": 14,
"contact_sub_id": null,
"is_valid_from": "2019-06-27",
"pr_project_id": null,
"title": null
}

Response samples
200422
Content type
application/json

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
"contact_address": "UTA Immobilien AG\nStadtturmstrasse 15\n5400 Baden",
"kb_item_status_id": 3,
"reference": null,
"api_reference": null,
"viewed_by_client_at": null,
"updated_at": "2019-04-08 13:17:32",
"esr_id": 1,
"qr_invoice_id": 1,
"template_slug": "581a8010821e01426b8b456b",
"taxs": [
{}
],
"network_link": "",
"positions": [
{}
]
}
Issue an invoice
This action issues an invoice. The invoice must be in the draft status.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_invoice/{invoice_id}/issue

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/issue \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Sets issued invoice to draft
This action set an already issued invoice to state draft.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_invoice/{invoice_id}/revert_issue

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/revert_issue \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Cancel an invoice
This action cancels an already issued invoice.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_invoice/{invoice_id}/cancel

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/cancel \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Mark invoice as sent
This action marks an invoice as sent


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_invoice/{invoice_id}/mark_as_sent

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/mark_as_sent \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Send an invoice
This action sends an invoice by email.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string


recipient_email
required
string <email>
During the trial period, the recipient is limited to the email address associated to the access token provided.

subject
required
string
message
required
string
The placeholder "[Network Link]" must be part of the text.

mark_as_open
required
boolean
attach_pdf	
boolean
Attach PDF directly to the email

Responses
200
OK

422
Validation error


POST
/2.0/kb_invoice/{invoice_id}/send

Request samples
Payloa
Content type
application/json

{
"recipient_email": "example@bexio.com",
"subject": "Your new document",
"message": "Please find the document at [Network Link]",
"mark_as_open": true,
"attach_pdf": true
}

Response samples
200422
Content type
application/json

{
"success": true
}
Fetch a list of payments
This action fetches a list of all payments for the invoice


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_invoice/{invoice_id}/payment

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Create payment
This action creates a new payment for an invoice


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice


required
date	
string <date>
value
required
string
bank_account_id	
integer or null
References a bank account object

payment_service_id	
integer or null
Responses
201
Created

422
Validation error


POST
/2.0/kb_invoice/{invoice_id}/payment

Request samples
Payloa
Content type
application/json

{
"date": "2019-06-29",
"value": "10.0000",
"bank_account_id": 1,
"payment_service_id": null
}

Response samples
201422
Content type
application/json

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
Fetch a payment
This action fetches a payment


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

payment_id
required
integer <int32>
Example: 1
the id of the payment

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_invoice/{invoice_id}/payment/{payment_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment/{payment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Delete a payment
This action permanently deletes a payment. It cannot be undone.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

payment_id
required
integer <int32>
Example: 1
the id of the payment

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/kb_invoice/{invoice_id}/payment/{payment_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/payment/{payment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Fetch a list of reminders
This action fetches a list of all reminders for the invoice


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_invoice/{invoice_id}/kb_reminder

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Create reminder
This action creates a new reminder for an invoice


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string

Responses
201
Created

400
Bad Request


POST
/2.0/kb_invoice/{invoice_id}/kb_reminder

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
201400
Content type
application/json

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
Search invoice reminders
Search invoice reminders via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

title
reminder_level
is_sent
is_valid_from
is_valid_to

PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/kb_invoice/{invoice_id}/kb_reminder/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

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
Fetch a reminder
This action deletes the most recent reminder


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

reminder_id
required
integer <int32>
Example: 1
the id of the reminder

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Delete a reminder
This action permanently deletes the most recent reminder. It cannot be undone.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

reminder_id
required
integer <int32>
Example: 1
the id of the reminder

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Mark reminder as sent
This action marks an invoice reminder as sent


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

reminder_id
required
integer <int32>
Example: 1
the id of the reminder

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/mark_as_sent

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/mark_as_sent \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Mark reminder as unsent
This action marks an invoice reminder as unsent


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

reminder_id
required
integer <int32>
Example: 1
the id of the reminder

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/mark_as_unsent

Request samples

curl -X POST \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/mark_as_unsent \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Send a reminder
This action sends an invoice reminder by email.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

reminder_id
required
integer <int32>
Example: 1
the id of the reminder

HEADER PARAMETERS
Accept
required
string


recipient_email
required
string <email>
During the trial period, the recipient is limited to the email address associated to the access token provided.

subject
required
string
message
required
string
The placeholder "[Network Link]" must be part of the text.

Responses
200
OK

422
Validation error


POST
/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/send

Request samples
Payloa
Content type
application/json

{
"recipient_email": "example@bexio.com",
"subject": "Your new document",
"message": "Please find the document at [Network Link]"
}

Response samples
200422
Content type
application/json

{
"success": true
}
Show reminder PDF
This action returns a pdf document of the invoice reminder.


PATH PARAMETERS
invoice_id
required
integer <int32>
Example: 1
the id of the invoice

reminder_id
required
integer <int32>
Example: 1
the id of the reminder

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/pdf

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/pdf \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"name": "document-00005.pdf",
"size": 9768,
"mime": "application/pdf",
"content": "R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs="
}
Document Settings
Fetch a list of document settings
This action fetches a list of all document settings


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "text"
Example: order_by=id
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/kb_item_setting

Request samples

curl -X GET \
  https://api.bexio.com/2.0/kb_item_setting \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Comments
Fetch a list of comments
This action fetches a list of all comments for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Item positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/comment

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/comment \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Create a comment
This action creates a new comment for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Comments can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

HEADER PARAMETERS
Accept
required
string


required
text
required
string
user_id
required
integer or null
References a user object

user_email	
string or null <email>
user_name
required
string or null
is_public	
boolean
Responses
201
Created

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/comment

Request samples
Payloa
Content type
application/json

{
"text": "Sample comment",
"user_id": 1,
"user_email": null,
"user_name": "Peter Smith",
"is_public": false
}

Response samples
201422
Content type
application/json

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
Fetch a comment
This action fetches a single comment for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Comments can be used in quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

comment_id
required
integer <int32>
Example: 1
the id of the comment

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/comment/{comment_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/comment/{comment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Default positions
Fetch a list of default positions
This action fetches a list of all default positions for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Default positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_custom

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"amount": "5.000000",
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
Create a default position
This action creates a new default position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Default positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

HEADER PARAMETERS
Accept
required
string


required
amount	
string
unit_id	
integer
References a unit object

account_id	
integer
References an account object

tax_id	
integer
References a tax object

Please note that only active sales taxes can be used as references on the document types quote, order and invoice. An easy way to retrieve all valid taxes is by calling the taxes endpoint with the query parameters types=sales_tax&scope=active (this would result in the path /3.0/taxes?types=sales_tax&scope=active).

text	
string
unit_price	
string
discount_in_percent	
string
Responses
201
Created

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_custom

Request samples
Payloa
Content type
application/json

{
"amount": "5.000000",
"unit_id": 1,
"account_id": 1,
"tax_id": 4,
"text": "Apples",
"unit_price": "3.560000",
"discount_in_percent": "0.000000"
}

Response samples
201422
Content type
application/json

{
"id": 1,
"amount": "5.000000",
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
Fetch a default position
This action fetches a single default position for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Default positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"amount": "5.000000",
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
Edit a default position
This action edits a single default position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Default positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string


amount	
string
unit_id	
integer
References a unit object

account_id	
integer
References an account object

tax_id	
integer
References a tax object

Please note that only active sales taxes can be used as references on the document types quote, order and invoice. An easy way to retrieve all valid taxes is by calling the taxes endpoint with the query parameters types=sales_tax&scope=active (this would result in the path /3.0/taxes?types=sales_tax&scope=active).

text	
string
unit_price	
string
discount_in_percent	
string
Responses
200
OK

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}

Request samples
Payloa
Content type
application/json

{
"amount": "5.000000",
"unit_id": 1,
"account_id": 1,
"tax_id": 4,
"text": "Apples",
"unit_price": "3.560000",
"discount_in_percent": "0.000000"
}

Response samples
200422
Content type
application/json

{
"id": 1,
"amount": "5.000000",
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
Delete a default position
This action permanently deletes a default position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Default positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Item positions
Fetch a list of item positions
This action fetches a list of all item positions for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Item positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_article

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"amount": "5.000000",
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
Create an item position
This action creates a new item position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Item positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

HEADER PARAMETERS
Accept
required
string


required
amount	
string
unit_id	
integer
References a unit object

account_id	
integer
References an account object

tax_id	
integer
References a tax object

Please note that only active sales taxes can be used as references on the document types quote, order and invoice. An easy way to retrieve all valid taxes is by calling the taxes endpoint with the query parameters types=sales_tax&scope=active (this would result in the path /3.0/taxes?types=sales_tax&scope=active).

text	
string
unit_price	
string
discount_in_percent	
string
article_id	
integer
References an item object

Responses
201
Created

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_article

Request samples
Payloa
Content type
application/json

{
"amount": "5.000000",
"unit_id": 1,
"account_id": 1,
"tax_id": 4,
"text": "Apples",
"unit_price": "3.560000",
"discount_in_percent": "0.000000",
"article_id": 3
}

Response samples
201422
Content type
application/json

{
"id": 1,
"amount": "5.000000",
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
Fetch an item position
This action fetches a single item position for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Item positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"amount": "5.000000",
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
Edit an item position
This action edits a single item position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Item positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string


amount	
string
unit_id	
integer
References a unit object

account_id	
integer
References an account object

tax_id	
integer
References a tax object

Please note that only active sales taxes can be used as references on the document types quote, order and invoice. An easy way to retrieve all valid taxes is by calling the taxes endpoint with the query parameters types=sales_tax&scope=active (this would result in the path /3.0/taxes?types=sales_tax&scope=active).

text	
string
unit_price	
string
discount_in_percent	
string
article_id	
integer
References an item object

Responses
200
OK

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}

Request samples
Payloa
Content type
application/json

{
"amount": "5.000000",
"unit_id": 1,
"account_id": 1,
"tax_id": 4,
"text": "Apples",
"unit_price": "3.560000",
"discount_in_percent": "0.000000",
"article_id": 3
}

Response samples
200422
Content type
application/json

{
"id": 1,
"amount": "5.000000",
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
Delete a item position
This action permanently deletes an item position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Item positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Text positions
Fetch a list of text positions
This action fetches a list of all text positions for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Text positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_text

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Create a text position
This action creates a new text position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Text positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

HEADER PARAMETERS
Accept
required
string


required
text	
string
show_pos_nr	
boolean
Responses
201
Created

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_text

Request samples
Payloa
Content type
application/json

{
"text": "This position type allows to add free text to a document",
"show_pos_nr": false
}

Response samples
201422
Content type
application/json

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
Fetch a text position
This action fetches a single text position for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Text positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Edit a text position
This action edits a single text position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Text positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string


text	
string
show_pos_nr	
boolean
Responses
200
OK

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}

Request samples
Payloa
Content type
application/json

{
"text": "This position type allows to add free text to a document",
"show_pos_nr": false
}

Response samples
200422
Content type
application/json

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
Delete a text position
This action permanently deletes a text position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Text positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Subtotal positions
Fetch a list of subtotal positions
This action fetches a list of all subtotal positions for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Subtotal positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_subtotal

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Create a subtotal position
This action creates a new subtotal position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Subtotal positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

HEADER PARAMETERS
Accept
required
string


required
text	
string
Responses
201
Created

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_subtotal

Request samples
Payloa
Content type
application/json

{
"text": "Subtotal"
}

Response samples
201422
Content type
application/json

{
"id": 1,
"text": "Subtotal",
"value": "17.800000",
"internal_pos": 1,
"is_optional": false,
"type": "KbPositionSubtotal",
"parent_id": null
}
Fetch a subtotal position
This action fetches a single subtotal position for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Subtotal positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"text": "Subtotal",
"value": "17.800000",
"internal_pos": 1,
"is_optional": false,
"type": "KbPositionSubtotal",
"parent_id": null
}
Edit a subtotal position
This action edits a single subtotal position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Subtotal positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string


text	
string
Responses
200
OK

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}

Request samples
Payloa
Content type
application/json

{
"text": "Subtotal"
}

Response samples
200422
Content type
application/json

{
"id": 1,
"text": "Subtotal",
"value": "17.800000",
"internal_pos": 1,
"is_optional": false,
"type": "KbPositionSubtotal",
"parent_id": null
}
Delete a subtotal position
This action permanently deletes a subtotal position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Subtotal positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Discount positions
Fetch a list of discount positions
This action fetches a list of all discount positions for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Discount positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_discount

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Create a discount position
This action creates a new discount position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Discount positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

HEADER PARAMETERS
Accept
required
string


required
text	
string
is_percentual	
boolean
value	
string
Responses
201
Created

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_discount

Request samples
Payloa
Content type
application/json

{
"text": "Partner discount",
"is_percentual": true,
"value": "10.000000"
}

Response samples
201422
Content type
application/json

{
"id": 1,
"text": "Partner discount",
"is_percentual": true,
"value": "10.000000",
"discount_total": "1.780000",
"type": "KbPositionDiscount"
}
Fetch a discount position
This action fetches a single discount position for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Discount positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"text": "Partner discount",
"is_percentual": true,
"value": "10.000000",
"discount_total": "1.780000",
"type": "KbPositionDiscount"
}
Edit a discount position
This action edits a single discount position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Discount positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string


text	
string
is_percentual	
boolean
value	
string
Responses
200
OK

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}

Request samples
Payloa
Content type
application/json

{
"text": "Partner discount",
"is_percentual": true,
"value": "10.000000"
}

Response samples
200422
Content type
application/json

{
"id": 1,
"text": "Partner discount",
"is_percentual": true,
"value": "10.000000",
"discount_total": "1.780000",
"type": "KbPositionDiscount"
}
Delete a discount position
This action permanently deletes a discount position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Discount positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Pagebreak positions
Fetch a list of pagebreak positions
This action fetches a list of all pagebreak positions for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Pagebreak positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"internal_pos": 1,
"is_optional": false,
"type": "KbPositionPagebreak",
"parent_id": null
}
]
Create a pagebreak position
This action creates a new pagebreak position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Pagebreak positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

HEADER PARAMETERS
Accept
required
string


required
pagebreak	
boolean
Responses
201
Created

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak

Request samples
Payloa
Content type
application/json

{
"pagebreak": true
}

Response samples
201422
Content type
application/json

{
"id": 1,
"internal_pos": 1,
"is_optional": false,
"type": "KbPositionPagebreak",
"parent_id": null
}
Fetch a pagebreak position
This action fetches a single pagebreak position for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Pagebreak positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"internal_pos": 1,
"is_optional": false,
"type": "KbPositionPagebreak",
"parent_id": null
}
Edit a pagebreak position
This action edits a single pagebreak position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Pagebreak positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string


pagebreak	
boolean
Responses
200
OK

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}

Request samples
Payloa
Content type
application/json

{
"pagebreak": true
}

Response samples
200422
Content type
application/json

{
"id": 1,
"internal_pos": 1,
"is_optional": false,
"type": "KbPositionPagebreak",
"parent_id": null
}
Delete a pagebreak position
This action permanently deletes a pagebreak position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Pagebreak positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Sub positions
Fetch a list of sub positions
This action fetches a list of all sub positions for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Sub positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_subposition

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Create a sub position
This action creates a new sub position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Sub positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

HEADER PARAMETERS
Accept
required
string


required
text	
string
show_pos_nr	
boolean
Responses
201
Created

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_subposition

Request samples
Payloa
Content type
application/json

{
"text": "This is a container to group other position types",
"show_pos_nr": true
}

Response samples
201422
Content type
application/json

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
Fetch a sub position
This action fetches a single sub position for a document.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Sub positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Edit a sub position
This action edits a single sub position for a document

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Sub positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string


text	
string
show_pos_nr	
boolean
Responses
200
OK

422
Validation error


POST
/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}

Request samples
Payloa
Content type
application/json

{
"text": "This is a container to group other position types",
"show_pos_nr": true
}

Response samples
200422
Content type
application/json

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
Delete a sub position
This action permanently deletes a sub position for a document. It cannot be undone.

If you have an invoice with ID 4 you should replace the path parameter kb_document_type with kb_invoice and replace the path parameter document_id with 4.


PATH PARAMETERS
kb_document_type
required
string
Enum: "kb_offer" "kb_order" "kb_invoice"
Example: kb_invoice
The type of the document. Sub positions can be added to quotes, orders and invoices

document_id
required
integer <int32>
Example: 1
the id of the document. E.g. if the kb_document_type is set to kb_invoice the document_id must be set to the ID of the invoice

position_id
required
integer <int32>
Example: 1
the id of the position

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Document templates
List document templates
This action fetches a list of document templates


Responses
200
OK


GET
/3.0/document_templates

Request samples

curl -X GET \
  https://api.bexio.com/3.0/document_templates \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"slug": "5f118cbc200a0c76ef1f34b2",
"name": "Standard template",
"is_default": true,
"default_for_document_types": []
}
]
Bills
Get Bills
Endpoint for retrieving Bills


QUERY PARAMETERS
limit	
integer
Default: 100
Example: limit=45
Limit the number of results (max is 500)

page	
integer
Default: 1
Example: page=2
current page

order	
string
Default: "asc"
Example: order=asc&order=desc
sorting order

sort	
string
Example: sort=document_no
field to sort by

search_term	
string [ 3 .. 255 ] characters
Example: search_term=term
term for which application will look for (minimum 3 signs, maximum 255 signs)

fields[]	
Array of strings
Items Enum: "firstname_suffix" "lastname_company" "vendor_ref" "currency_code" "document_no" "title"
fields for which search will be run (if no 'fields[]' is specified than searching will be done for all allowed fields)

status	
string
Enum: "DRAFTS" "TODO" "PAID" "OVERDUE"
Example: status=TODO
filter for Bill 'status' (DRAFTS: [DRAFT], TODO: [BOOKED, PARTIALLY_CREATED, CREATED, PARTIALLY_SENT, SENT, PARTIALLY_DOWNLOADED, DOWNLOADED, PARTIALLY_PAID, PARTIALLY_FAILED, FAILED], PAID: [PAID], OVERDUE: [BOOKED, PARTIALLY_CREATED, CREATED, PARTIALLY_SENT, SENT, PARTIALLY_DOWNLOADED, DOWNLOADED, PARTIALLY_PAID, PARTIALLY_FAILED, FAILED]) and for 'onlyOverdue' (DRAFTS: [FALSE], TODOS: [FALSE], PAID: [FALSE], OVERDUE: [TRUE]). Choosing OVERDUE means that only Bills with 'due_date' before now will be shown

bill_date_start	
string <date>
Example: bill_date_start=2019-04-19
filter for Bill 'bill_date', the earliest accepted date

bill_date_end	
string <date>
Example: bill_date_end=2019-04-27
filter for Bill 'bill_date', the latest accepted date

due_date_start	
string <date>
Example: due_date_start=2019-05-19
filter for Bill 'due_date', the earliest accepted date

due_date_end	
string <date>
Example: due_date_end=2019-05-27
filter for Bill 'due_date', the latest accepted date

vendor_ref	
string
Example: vendor_ref=reference
filter for Bill 'vendor_ref', text containing in field

title	
string
Example: title=Some Title
filter for Bill 'title', text containing in field

currency_code	
string
Example: currency_code=CHF
filter for Bill 'currency_code', text containing in field

pending_amount_min	
number <double>
Example: pending_amount_min=438.32
filter for Bill 'pending_amount', the lowest accepted value

pending_amount_max	
number <double>
Example: pending_amount_max=465.75
filter for Bill 'pending_amount', the greatest accepted value

vendor	
string
Example: vendor=bexio ag
filter for Bill 'vendor', text containing in fields lastname_company and firstname_suffix

gross_min	
number <double>
Example: gross_min=438.32
filter for Bill 'gross', the lowest accepted value

gross_max	
number <double>
Example: gross_max=465.75
filter for Bill 'gross', the greatest accepted value

net_min	
number <double>
Example: net_min=438.32
filter for Bill 'net', the lowest accepted value

net_max	
number <double>
Example: net_max=465.75
filter for Bill 'net', the greatest accepted value

document_no	
string
Example: document_no=DC-123
filter for Bill 'document_no', text containing in field

supplier_id	
integer
Example: supplier_id=1234
filter for Bill 'supplier_id'

Responses
200
Bill retrieved

400
Bad request

401
Access token is missing or is invalid

403
No access rights


GET
/4.0/purchase/bills

Request samples

curl -X GET \
  https://api.bexio.com/4.0/purchase/bills \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200400401403
Content type
application/json

{
"data": [
{},
{}
],
"paging": {
"page": 1,
"page_size": 10,
"page_count": 50,
"item_count": 300
}
}
Create new Bill
Endpoint for creating Bill



required
supplier_id
required
integer <int32>
vendor_ref	
string [ 1 .. 255 ] characters
title	
string [ 1 .. 80 ] characters
contact_partner_id
required
integer <int32>
bill_date
required
string <date>
due_date
required
string <date>
amount_man	
number <double>
Required when 'manual_amount' is true. Maximum of 17 digits and maximum of 2 decimal digits.

amount_calc	
number <double>
Required when 'manual_amount' is false. Maximum of 17 digits and maximum of 2 decimal digits.

manual_amount
required
boolean
indicates whether 'amount_man' or 'amount_calc' is required and considered as bill amount

currency_code
required
string [ 1 .. 20 ] characters
exchange_rate	
number <double>
Required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 5 digits and maximum of 10 decimal digits.

base_currency_amount	
number <double> >= 0
Required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 17 digits and maximum of 2 decimal digits.

item_net
required
boolean
Indicates whether 'amount' in 'line_items' is net or gross.

purchase_order_id	
integer <int32>
qr_bill_information	
string [ 1 .. 255 ] characters
attachment_ids
required
Array of strings <uuid> [ items <uuid > ]
address
required
object (address)
Address

line_items
required
Array of objects (createlineItem) [ 1 .. 100 ] items
discounts
required
Array of objects (discount) [ 0 .. 100 ] items
payment	
object (payment)
Responses
201
Successful Bill creation

400
Bad request

401
Access token is missing or is invalid

403
No access rights


POST
/4.0/purchase/bills

Request samples
Payloa
Content type
application/json

{
"supplier_id": 1323,
"vendor_ref": "Reference text",
"title": "Bill 42",
"contact_partner_id": 647,
"bill_date": "2019-02-12",
"due_date": "2019-03-14",
"amount_man": 23.8,
"amount_calc": 32.08,
"manual_amount": true,
"currency_code": "CHF",
"exchange_rate": 2.3455347621,
"base_currency_amount": 212.78,
"item_net": false,
"purchase_order_id": 637,
"qr_bill_information": "//S1/10/10201409/11/190512/20/1400.000-53/30/106017086/31/180508/32/7.7/40/2:10;0:30",
"address": {
"title": "Dr.",
"salutation": "Mr",
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
{},
{}
],
"discounts": [
{}
],
"payment": {
"type": "IBAN",
"bank_account_id": 12,
"fee": "BY_SENDER",
"execution_date": "2019-03-15",
"exchange_rate": 2.3455394587,
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

Response samples
201400401403
Content type
application/json

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
{},
{}
],
"discounts": [
{}
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
Get Bill
Endpoint for retrieving Bill by id


PATH PARAMETERS
id
required
string <uuid>
Example: 7572f70e-6bf5-47be-9a28-466423d8e3b1
id of Bill to retrieve

Responses
200
Bill retrieved

401
Access token is missing or is invalid

403
No access rights

404
Bill with specified id was not found


GET
/4.0/purchase/bills/{id}

Request samples

curl -X GET \
  https://api.bexio.com/4.0/purchase/bills/{id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200401403404
Content type
application/json

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
{},
{}
],
"discounts": [
{}
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
Update Bill
Endpoint for updating Bill


PATH PARAMETERS
id
required
string <uuid>
Example: 1d204702-00ba-447b-ad48-aefbfb1bf984
id of Bill to update


required
document_no	
string [ 1 .. 255 ] characters
title	
string [ 1 .. 80 ] characters
supplier_id
required
integer <int32>
vendor_ref	
string [ 1 .. 255 ] characters
amount_man	
number <double>
Required when 'manual_amount' is true. Maximum of 17 digits and maximum of 2 decimal digits.

amount_calc	
number <double>
Required when 'manual_amount' is false. Maximum of 17 digits and maximum of 2 decimal digits.

manual_amount
required
boolean
Indicates whether 'amount_man' or 'amount_calc' is required and considered as bill amount

contact_partner_id
required
integer <int32>
bill_date
required
string <date>
due_date
required
string <date>
currency_code
required
string [ 1 .. 20 ] characters
exchange_rate	
number <double>
Required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 5 digits and maximum of 10 decimal digits.

item_net
required
boolean
split_into_line_items
required
boolean
Indicates whether Bill has multiple items (true) or single item (false). By items it means 'line_items' and 'discounts'.

base_currency_amount	
number <double>
Maximum of 17 digits and maximum of 2 decimal digits.

attachment_ids
required
Array of strings <uuid> [ items <uuid > ]
address
required
object (address)
Address

line_items
required
Array of objects (updatelineItem) [ 1 .. 100 ] items
Each of Line Item's 'id' must be unique (no duplicates) and already existing on the Bill or it should be null for creating new Line Item. When 'split_into_line_items' is false then there must be only 1 Line Item.

discounts
required
Array of objects (discount) [ 0 .. 100 ] items
Each of Discount's 'id' must be unique (no duplicates) and already existing on the Bill or it should be null for creating new Discount. When 'split_into_line_items' is false then there must 0 Discounts.

payment	
object (payment)
Responses
200
Successful Bill update

400
Bad request

401
Access token is missing or is invalid

403
No access rights

404
Bill with specified id was not found


PUT
/4.0/purchase/bills/{id}

Request samples
Payloa
Content type
application/json

{
"document_no": "LR-12345",
"title": "Bill 42",
"supplier_id": 1323,
"vendor_ref": "Reference text",
"contact_partner_id": 647,
"bill_date": "2019-02-12",
"due_date": "2019-03-14",
"amount_man": 23.8,
"amount_calc": 23.83,
"manual_amount": true,
"currency_code": "CHF",
"exchange_rate": 2.3455354632,
"item_net": false,
"split_into_line_items": true,
"base_currency_amount": 63.23,
"attachment_ids": [
"e84b9fe2-3fe2-4fcf-8c30-298fe16adb14",
"aa9fc418-f292-49ad-9a35-9869123d1091"
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
},
"line_items": [
{},
{}
],
"discounts": [
{}
],
"payment": {
"type": "IBAN",
"bank_account_id": 12,
"fee": "BY_RECEIVER",
"execution_date": "2019-03-15",
"exchange_rate": 2.3455394678,
"amount": 3.9,
"account_no": 12345678125678900,
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
}
}

Response samples
200400401403404
Content type
application/json

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
{},
{}
],
"discounts": [
{}
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
Delete Bill
Endpoint for deleting Bill by id. Bill can be removed when it is in status DRAFT only.


PATH PARAMETERS
id
required
string <uuid>
Example: 047e0179-89ea-499c-a427-62b1b9adbe7d
id of Bill to delete

Responses
204
Bill deleted

401
Access token is missing or is invalid

403
No access rights

404
Bill with specified id was not found


DELETE
/4.0/purchase/bills/{id}

Request samples

curl -X DELETE \
  https://api.bexio.com/4.0/purchase/bills/{id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
401403404
Content type
application/json

{
"error_code": 401,
"message": "Invalid access token"
}
Update Bill status
Changing status to BOOKED
When changing status to BOOKED there are specific validations triggered:

Bill must be in status DRAFT.
'amount_man' is required and must be greater than 0 when 'manual_amount' is true.
'amount_calc' is required and must be greater than 0 when 'manual_amount' is false.
'exchange_rate' is required and must be greater than 0 when 'curency_code' does not equal 'base_currency_code'.
'base_currency_amount' is required and must be greater than 0 when 'curency_code' does not equal 'base_currency_code'.
'bill_date' must be in existing Business Year that is not Closed and not Locked.
'due_date' must be after or equal to 'bill_date'.
'document_no' cannot be blank and must be unique across all existing Bills in status other than DRAFT.
'item_net' cannot be set to 'true' when any of 'line_items' 'tax_id' is one of tax types that is ignorig vat:
pre_regards_tax_material
pre_regards_tax_investment
pre_customs_tax_material
pre_customs_tax_investment
'line_tems' total amount must be greater than 0.
'booking_account_id' is required for each 'line_item'. And this Booking Account:
Cannot be a system asset account (account type ID 3, is_locked true)
Cannot be a system liability account (account type ID 4, is_locked true) with the exception of account 2201
Cannot be a system complete account (account type ID 5, is_locked true)
'line_item' amount cannot be less or equal to 0 when 'tax_id' is one of types:
pre_customs_tax_investment
pre_customs_tax_material
pre_regards_tax_investment
pre_regards_tax_material
'line_item' 'tax_id' validation:
when Bill is not subject to Vat then 'tax_id' must be null
Tax cannot have 'digit' set to one of:
415
420
when Bill's Calendar Year has Effective Vat accounting method then Tax type must be one of:
pre_tax_material
pre_tax_investment
pre_customs_tax_investment
pre_customs_tax_material
pre_regards_tax_material
pre_regards_tax_investment
when Bill's Calendar Year does not have Effective Vat accounting method then 'tax_id' is not required
when Bill's Calendar Year does not have Effective Vat accounting method then Tax type must be one of:
pre_regards_tax_material
pre_regards_tax_investment
'discounts' total amount must be less than 'line_items' total amount.
Each 'discount' amount must be greater than 0.
'discounts' must be empty when there is 'line_item' with amount less or equal to 0.
'discounts' must be empty when there is 'line_item' with 'tax_id' being one of types rejecting discounts:
pre_customs_tax_material
pre_customs_tax_investment
'address.lastname_company' cannot be null or empty
Changing status to DRAFT
When changing status to DRAFT there are specific validations triggered:

Bill must be in status BOOKED.
'bill_date' must be in existing Business Year that is not Closed and not Locked.

PATH PARAMETERS
id
required
string <uuid>
Example: 166dcef6-91c8-487f-b135-64dbf9d395a7
id of Bill to update

status
required
string
Enum: "DRAFT" "BOOKED"
Example: BOOKED
Bill status to update to

Responses
200
Successful Bill update

400
Bad request

401
Access token is missing or is invalid

403
No access rights

404
Bill with specified id was not found


PUT
/4.0/purchase/bills/{id}/bookings/{status}

Request samples

curl -X PUT \
  https://api.bexio.com/4.0/purchase/bills/{id}/bookings/{status} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200400401403404
Content type
application/json

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
{},
{}
],
"discounts": [
{}
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
Execute Bill action
Endpoint for executing actions for Bill


PATH PARAMETERS
id
required
string <uuid>
Example: 96c5e76f-8b85-487b-bcfb-b9d2ebf92fcf
Id of a Bill for which action will be executed


action
required
string
Value: "DUPLICATE"
Responses
200
Successful Bill action execution

400
Bad request

401
Access token is missing or is invalid

403
No access rights

404
Bill with specified id was not found


POST
/4.0/purchase/bills/{id}/actions

Request samples
Payloa
Content type
application/json

{
"action": "DUPLICATE"
}

Response samples
200400401403404
Content type
application/json

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
{},
{}
],
"discounts": [
{}
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
Validate whether document number is available or not
Endpoint for retrieving validation for document number


QUERY PARAMETERS
document_no
required
string <= 255 characters
Example: document_no=AB-1234
document number to validate

Responses
200
Document Number validation response

400
Bad request

401
Access token is missing or is invalid

403
No access rights


GET
/4.0/purchase/documentnumbers/bills

Request samples

curl -X GET \
  https://api.bexio.com/4.0/purchase/documentnumbers/bills \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200400401403
Content type
application/json

{
"valid": false,
"next_available_no": "AB-1235"
}
Expenses
Get Expenses
Endpoint for retrieving Expenses


QUERY PARAMETERS
limit	
integer
Default: 100
Example: limit=45
results per page

page	
integer
Default: 1
Example: page=2
current page

order	
string
Default: "asc"
Example: order=asc&order=desc
sorting order

sort	
string
Example: sort=document_no
field to sort by

vendor	
string
Example: vendor=bexio ag
filter for Expense 'vendor', text containing in fields lastname_company and firstname_suffix

gross_min	
number <double>
Example: gross_min=438.32
filter for Expense 'gross', the lowest accepted value

gross_max	
number <double>
Example: gross_max=465.75
filter for Expense 'gross', the greatest accepted value

net_min	
number <double>
Example: net_min=438.32
filter for Expense 'net', the lowest accepted value

net_max	
number <double>
Example: net_max=465.75
filter for Expense 'net', the greatest accepted value

paid_on_start	
string <date>
Example: paid_on_start=2019-04-19
filter for Expense 'paid_on', the earliest accepted date

paid_on_end	
string <date>
Example: paid_on_end=2019-04-27
filter for Expense 'paid_on', the latest accepted date

created_at_start	
string <date-time>
Example: created_at_start=2020-01-24T13:08:01+0000
filter for Expense 'created_at', the earliest accepted date

created_at_end	
string <date-time>
Example: created_at_end=2020-01-27T13:08:01+0000
filter for Expense 'created_at', the latest accepted date

title	
string
Example: title=Some Title
filter for Expense 'title', text containing in field

currency_code	
string
Example: currency_code=CHF
filter for Expense 'currency_code', text containing in field

document_no	
string
Example: document_no=DC-123
filter for Expense 'document_no', text containing in field

supplier_id	
integer
Example: supplier_id=1234
filter for Expense 'supplier_id'

project_id	
string <uuid>
Example: project_id=1a1864c0-ba80-46a8-ad89-ffd128db9456
filter for Expense 'project_id'

Responses
200
Expenses retrieved

400
Bad request

401
Access token is missing or is invalid

403
No access rights


GET
/4.0/expenses

Request samples

curl -X GET \
  https://api.bexio.com/4.0/expenses \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200400401403
Content type
application/json

{
"data": [
{},
{}
],
"paging": {
"page": 1,
"page_size": 10,
"page_count": 50,
"item_count": 300
}
}
Create new Expense
Endpoint for creating Expense



required
paid_on
required
string <date>
currency_code
required
string [ 1 .. 20 ] characters
supplier_id	
integer <int32>
title	
string [ 1 .. 80 ] characters
bank_account_id	
integer <int32>
booking_account_id	
integer <int32>
amount
required
number <double> >= 0
Maximum of 17 digits and maximum of 2 decimal digits.

tax_id	
integer <int32>
exchange_rate	
number <double>
Required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 5 digits and maximum of 10 decimal digits.

base_currency_amount	
number <double> >= 0
Required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 17 digits and maximum of 2 decimal digits.

attachment_ids
required
Array of strings <uuid> [ items <uuid > ]
List of file ids that should be attached to this Expense. Cannot have duplicates.

address	
object (address)
Address

Responses
201
Successful Expense creation

400
Bad request

401
Access token is missing or is invalid

403
No access rights


POST
/4.0/expenses

Request samples
Payloa
Content type
application/json

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
"attachment_ids": [
"3c570a07-1fa1-41e7-a761-0f486dfc01f6",
"138c5618-744c-4c05-b504-c034ccf5f7d9"
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

Response samples
201400401403
Content type
application/json

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
Get Expense
Endpoint for retrieving Expense by id


PATH PARAMETERS
id
required
string <uuid>
Example: 170a3a1e-df4d-4153-abdf-3a8670efd0e7
id of Expense to retrieve

Responses
200
Expense retrieved

401
Access token is missing or is invalid

403
No access rights

404
Expense with specified id was not found


GET
/4.0/expenses/{id}

Request samples

curl -X GET \
  https://api.bexio.com/4.0/expenses/{id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200401403404
Content type
application/json

{
"id": "1355499f-aa07-4382-887e-acaf0323e6f6",
"document_no": "123",
"title": "Some Title",
"status": "DRAFT",
"firstname_suffix": "Less",
"lastname_company": "Organisation",
"created_at": "2019-03-23T09:53:49+0000",
"supplier_id": 1,
"paid_on": "2019-03-20",
"bank_account_id": 3,
"booking_account_id": 4,
"currency_code": "CHF",
"base_currency_code": "USD",
"exchange_rate": 1.4355684751,
"amount": 30.9,
"tax_man": 1.14,
"tax_calc": 3.45,
"tax_id": 6,
"base_currency_amount": 24.84,
"transaction_id": "b4229af3-a20f-4f68-b513-db651dd2c2ea",
"invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",
"project_id": "1a1864c0-ba80-46a8-ad89-ffd128db9456",
"attachment_ids": [
"06573f59-01a2-493d-9876-462deda4cee3",
"a230f087-f742-4259-925e-cf3abea5e6bf"
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
Update Expense
Endpoint for updating Expense


PATH PARAMETERS
id
required
string <uuid>
Example: b057613b-ba1a-4f4d-a55c-d88eb605c922
id of Expense to update


required
paid_on
required
string <date>
currency_code
required
string [ 1 .. 20 ] characters
exchange_rate	
number <double>
Required when 'currency_code' is different from 'base_currency_code' (taken from settings). Maximum of 5 digits and maximum of 10 decimal digits.

supplier_id	
integer <int32>
document_no	
string [ 1 .. 255 ] characters
title	
string [ 1 .. 80 ] characters
bank_account_id	
integer <int32>
booking_account_id	
integer <int32>
amount
required
number <double> >= 0
Maximum of 17 digits and maximum of 2 decimal digits.

tax_id	
integer <int32>
base_currency_amount	
number <double>
Maximum of 17 digits and maximum of 2 decimal digits.

attachment_ids
required
Array of strings <uuid> [ items <uuid > ]
List of file ids that should be attached to this Expense. Cannot have duplicates.

address	
object (address)
Address

Responses
200
Successful Expense update

400
Bad request

401
Access token is missing or is invalid

403
No access rights

404
Expense with specified id was not found


PUT
/4.0/expenses/{id}

Request samples
Payloa
Content type
application/json

{
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

Response samples
200400401403404
Content type
application/json

{
"id": "1355499f-aa07-4382-887e-acaf0323e6f6",
"document_no": "123",
"title": "Some Title",
"status": "DRAFT",
"firstname_suffix": "Less",
"lastname_company": "Organisation",
"created_at": "2019-03-23T09:53:49+0000",
"supplier_id": 1,
"paid_on": "2019-03-20",
"bank_account_id": 3,
"booking_account_id": 4,
"currency_code": "CHF",
"base_currency_code": "USD",
"exchange_rate": 1.4355684751,
"amount": 30.9,
"tax_man": 1.14,
"tax_calc": 3.45,
"tax_id": 6,
"base_currency_amount": 24.84,
"transaction_id": "b4229af3-a20f-4f68-b513-db651dd2c2ea",
"invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",
"project_id": "1a1864c0-ba80-46a8-ad89-ffd128db9456",
"attachment_ids": [
"06573f59-01a2-493d-9876-462deda4cee3",
"a230f087-f742-4259-925e-cf3abea5e6bf"
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
Delete Expense
Endpoint for deleting Expense by id. Expense cannot be removed when it is DONE.


PATH PARAMETERS
id
required
string <uuid>
Example: d00b2005-a52f-4d7b-ad72-217d549d9734
id of Expense to delete

Responses
204
Expense deleted

401
Access token is missing or is invalid

403
No access rights

404
Expense with specified id was not found


DELETE
/4.0/expenses/{id}

Request samples

curl -X DELETE \
  https://api.bexio.com/4.0/expenses/{id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
401403404
Content type
application/json

{
"error_code": 401,
"message": "Invalid access token"
}
Update Expense status
Changing status from DRAFT to DONE
When changing status to DONE there are specific validations triggered:

'bank_account_id' is required.
'base_currency_amount' is required when 'curency_code' does not equal 'base_currency_code' and must be greater than 0.
'booking_account_id' is required. And this Booking Account:
Cannot be a system asset account (account type ID 3, is_locked true)
Cannot be a system liability account (account type ID 4, is_locked true)
Cannot be a system complete account (account type ID 5, is_locked true)
'document_no' cannot be blank and must be unique across all existing Expenses in DONE status.
'exchange_rate' is required when 'curency_code' does not equal 'base_currency_code' and must be greater than 0.
'amount' must be greater than 0.
'tax_id' validation:
when Expense is not subject to Vat then 'tax_id' must be null
Tax cannot have 'digit' set to one of:
415
420
when Expense's Calendar Year has Effective Vat accounting method then Tax type must be one of:
pre_tax_material
pre_tax_investment
pre_customs_tax_investment
pre_customs_tax_material
pre_regards_tax_material
pre_regards_tax_investment
when Expense's Calendar Year does not have Effective Vat accounting method then 'tax_id' is not required
when Expense's Calendar Year does not have Effective Vat accounting method then Tax type must be one of:
pre_regards_tax_material
pre_regards_tax_investment
'paid_on' must be in existing Business Year that is not Closed and not Locked.
If 'supplier_id' is set then 'address' cannot be null.
If 'aupplier_id' is not set then 'address' must be null.
If 'address' is set then 'address.lastname_company' cannot be null or empty
Changing status from DONE to DRAFT
When changing status to DRAFT there are specific validations triggered:

'paid_on' date must be in existing Business Year that is not Closed and not Locked.
Expense cannot be linked to an Invoice ('invoice_id' must be null).
Expense cannot be reconciled with any Transaction ('transaction_id' must be null).

PATH PARAMETERS
id
required
string <uuid>
Example: f0cc58cb-3b71-42c7-b28b-aeed4aa0493f
Id of Expense to update

status
required
string
Enum: "DRAFT" "DONE"
Example: DONE
Expense status to update to

Responses
200
Successful Expense update

400
Bad request

401
Access token is missing or is invalid

403
No access rights

404
Expense with specified id was not found


PUT
/4.0/expenses/{id}/bookings/{status}

Request samples

curl -X PUT \
  https://api.bexio.com/4.0/expenses/{id}/bookings/{status} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200400401403404
Content type
application/json

{
"id": "1355499f-aa07-4382-887e-acaf0323e6f6",
"document_no": "123",
"title": "Some Title",
"status": "DRAFT",
"firstname_suffix": "Less",
"lastname_company": "Organisation",
"created_at": "2019-03-23T09:53:49+0000",
"supplier_id": 1,
"paid_on": "2019-03-20",
"bank_account_id": 3,
"booking_account_id": 4,
"currency_code": "CHF",
"base_currency_code": "USD",
"exchange_rate": 1.4355684751,
"amount": 30.9,
"tax_man": 1.14,
"tax_calc": 3.45,
"tax_id": 6,
"base_currency_amount": 24.84,
"transaction_id": "b4229af3-a20f-4f68-b513-db651dd2c2ea",
"invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",
"project_id": "1a1864c0-ba80-46a8-ad89-ffd128db9456",
"attachment_ids": [
"06573f59-01a2-493d-9876-462deda4cee3",
"a230f087-f742-4259-925e-cf3abea5e6bf"
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
Execute Expense action
Endpoint for executing actions for Expense


PATH PARAMETERS
id
required
string <uuid>
Example: 96c5e76f-8b85-487b-bcfb-b9d2ebf92fcf
id of Expense for which action will be executed


action
required
string
Value: "DUPLICATE"
Responses
200
Successful Expense action execution

400
Bad request

401
Access token is missing or is invalid

403
No access rights

404
Expense with specified id was not found


POST
/4.0/expenses/{id}/actions

Request samples
Payloa
Content type
application/json

{
"action": "DUPLICATE"
}

Response samples
200400401403404
Content type
application/json

{
"id": "1355499f-aa07-4382-887e-acaf0323e6f6",
"document_no": "123",
"title": "Some Title",
"status": "DRAFT",
"firstname_suffix": "Less",
"lastname_company": "Organisation",
"created_at": "2019-03-23T09:53:49+0000",
"supplier_id": 1,
"paid_on": "2019-03-20",
"bank_account_id": 3,
"booking_account_id": 4,
"currency_code": "CHF",
"base_currency_code": "USD",
"exchange_rate": 1.4355684751,
"amount": 30.9,
"tax_man": 1.14,
"tax_calc": 3.45,
"tax_id": 6,
"base_currency_amount": 24.84,
"transaction_id": "b4229af3-a20f-4f68-b513-db651dd2c2ea",
"invoice_id": "9d47155f-eac4-491e-96d0-8e187c5a7ab6",
"project_id": "1a1864c0-ba80-46a8-ad89-ffd128db9456",
"attachment_ids": [
"06573f59-01a2-493d-9876-462deda4cee3",
"a230f087-f742-4259-925e-cf3abea5e6bf"
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
Validate whether document number is available or not
Endpoint for retrieving validation for document number


QUERY PARAMETERS
document_no
required
string <= 255 characters
Example: document_no=AB-1234
document number to validate

Responses
200
Document Number validation response

400
Bad request

401
Access token is missing or is invalid

403
No access rights


GET
/4.0/expenses/documentnumbers

Request samples

curl -X GET \
  https://api.bexio.com/4.0/expenses/documentnumbers \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200400401403
Content type
application/json

{
"valid": false,
"next_available_no": "AB-1235"
}
Purchase Orders
Fetch a list of purchase orders
This action fetches a list of article orders


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "total" "total_net" "total_gross" "updated_at"
Example: order_by=total
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/purchase_orders

Request samples

curl -X GET \
  https://api.bexio.com/3.0/purchase_orders \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"language": {},
"language_id": 1,
"bank_account_id": 1,
"currency": {},
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
Create a purchase order
This action creates a new purchase order



required
id	
integer <int32>
The id of the purchase order

document_nr	
string
kb_payment_template_id	
integer or null
payment_type_id	
integer
References a payment type object

title	
string or null
contact_id	
integer
References a contact object

contact_sub_id	
integer or null
References a contact object

template_slug	
string or null
user_id	
integer
References a user object

project_id	
integer or null
References a project object

logopaper_id	
integer
language	
object (Language)
language_id	
integer
References a language object

bank_account_id	
integer
References a bank account object

currency	
object (Currency)
currency_id	
integer
References a currency object

header	
string or null
footer	
string or null
mwst_type	
string
Enum: "included" "excluded" "exempt"
Possible values are

included - included means that the tax is included in the total price
excluded - excluded means that the tax is excluded from the total price
exempt - exempt means that no tax is charged
mwst_is_net	
boolean
This value affects the total if the field mwst_type has been set to 0.
false = Taxes are included in the total
true = Taxes will be added to the total

is_compact_view	
boolean
show_position_taxes	
boolean
salesman_user_id	
integer or null
References a user object

is_valid_from	
string <date>
is_valid_to	
string <date>
delivery_address_type	
string
Enum: "contact_address" "manual"
contact_address_manual	
string <= 1000 characters
The contact address for the document. Newlines are in the format \n

delivery_address_manual	
string <= 1000 characters
The delivery address for order. Newlines are in the format \n

nb_decimals_amount	
integer <int32>
Default: 2
The maximum number of decimal digits to display for amounts (number of items).

nb_decimals_price	
integer <int32>
Default: 2
The maximum number of decimal digits to display for prices (line item prices, totals, etc.).

terms_of_payment_text	
string or null <= 255 characters
Additional text which is displayed below the terms of payment

reference	
string or null <= 1000 characters
A reference which can be added to the document by the client.

api_reference	
string or null
This field can only be read and edited by the api. It can be used to save references to other systems.

mail	
string or null <= 80 characters
The mail address of the company

is_valid_until	
string <date>
created_at	
string <date>
Creation date of the purchase order

updated_at	
string <date>
Last time when purchase order was updated

custom_translations	
object
date_format	
string
positions	
object
A purchase order can have multiple line items (positions). Please note that the line items must be grouped by required, optional and discount positions.

Responses
201
Created

422
Validation error


POST
/3.0/purchase_orders

Request samples
Payloa
Content type
application/json

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
"terms_of_payment_text": "Payable within 30 days",
"reference": "Based on Quote Q-3860",
"api_reference": null,
"mail": "support@bexio.com",
"is_valid_until": "2019-07-24",
"created_at": "2020-04-28T19:58:58+00:00",
"updated_at": "2020-04-30T19:58:58+00:00",
"custom_translations": { },
"date_format": "d.m.Y",
"positions": {
"required": [],
"optional": [],
"discount": []
}
}

Response samples
201422
Content type
application/json

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
"date_format": "d.m.Y",
"positions": {
"required": [],
"optional": [],
"discount": []
}
}
Fetch a single purchase order
This action fetches a single purchase order


PATH PARAMETERS
purchase_order_id
required
integer <int32>
Example: 1
the id of the purchase order

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/purchase_orders/{purchase_order_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/purchase_orders/{purchase_order_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Update a single purchase order
This action updates a purchase order.


PATH PARAMETERS
purchase_order_id
required
integer <int32>
Example: 1
the id of the purchase order

HEADER PARAMETERS
Accept
required
string


id	
integer <int32>
The id of the purchase order

document_nr	
string
kb_payment_template_id	
integer or null
payment_type_id	
integer
References a payment type object

title	
string or null
contact_id	
integer
References a contact object

contact_sub_id	
integer or null
References a contact object

template_slug	
string or null
user_id	
integer
References a user object

project_id	
integer or null
References a project object

logopaper_id	
integer
language	
object (Language)
language_id	
integer
References a language object

bank_account_id	
integer
References a bank account object

currency	
object (Currency)
currency_id	
integer
References a currency object

header	
string or null
footer	
string or null
mwst_type	
string
Enum: "included" "excluded" "exempt"
Possible values are

included - included means that the tax is included in the total price
excluded - excluded means that the tax is excluded from the total price
exempt - exempt means that no tax is charged
mwst_is_net	
boolean
This value affects the total if the field mwst_type has been set to 0.
false = Taxes are included in the total
true = Taxes will be added to the total

is_compact_view	
boolean
show_position_taxes	
boolean
salesman_user_id	
integer or null
References a user object

is_valid_from	
string <date>
is_valid_to	
string <date>
delivery_address_type	
string
Enum: "contact_address" "manual"
contact_address_manual	
string <= 1000 characters
The contact address for the document. Newlines are in the format \n

delivery_address_manual	
string <= 1000 characters
The delivery address for order. Newlines are in the format \n

nb_decimals_amount	
integer <int32>
Default: 2
The maximum number of decimal digits to display for amounts (number of items).

nb_decimals_price	
integer <int32>
Default: 2
The maximum number of decimal digits to display for prices (line item prices, totals, etc.).

terms_of_payment_text	
string or null <= 255 characters
Additional text which is displayed below the terms of payment

reference	
string or null <= 1000 characters
A reference which can be added to the document by the client.

api_reference	
string or null
This field can only be read and edited by the api. It can be used to save references to other systems.

mail	
string or null <= 80 characters
The mail address of the company

is_valid_until	
string <date>
created_at	
string <date>
Creation date of the purchase order

updated_at	
string <date>
Last time when purchase order was updated

custom_translations	
object
date_format	
string
Responses
200
OK

422
Validation error


PUT
/3.0/purchase_orders/{purchase_order_id}

Request samples
Payloa
Content type
application/json

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
"terms_of_payment_text": "Payable within 30 days",
"reference": "Based on Quote Q-3860",
"api_reference": null,
"mail": "support@bexio.com",
"is_valid_until": "2019-07-24",
"created_at": "2020-04-28T19:58:58+00:00",
"updated_at": "2020-04-30T19:58:58+00:00",
"custom_translations": { },
"date_format": "d.m.Y"
}

Response samples
200422
Content type
application/json

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
"date_format": "d.m.Y",
"positions": {
"required": [],
"optional": [],
"discount": []
}
}
Delete a purchase order
This action permanently deletes a purchase order. It cannot be undone.


PATH PARAMETERS
purchase_order_id
required
integer <int32>
Example: 1
the id of the purchase order

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/3.0/purchase_orders/{purchase_order_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/3.0/purchase_orders/{purchase_order_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Outgoing Payment
Retrieve Outgoing Payments

QUERY PARAMETERS
bill_id
required
string <uuid>
Example: bill_id=5d035f66-8217-433a-b01f-cf0d211c50b1
id of Bill for which Outgoing Payments were created

limit	
integer >= 1
Default: 100
Example: limit=15
results per page

page	
integer >= 1
Default: 1
Example: page=2
current page

order	
string
Default: "asc"
Enum: "asc" "desc"
Example: order=desc
sorting order

sort	
string
Example: sort=payment_type
field to sort by

Responses
200
Outgoing Payments retrieved

400
Bad request

401
Access token is missing or is invalid

403
No access rights


GET
/4.0/purchase/outgoing-payments

Request samples

curl -X GET \
  https://api.bexio.com/4.0/purchase/outgoing-payments \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200400401403
Content type
application/json

{
"data": [
{},
{}
],
"paging": {
"page": 1,
"page_size": 10,
"page_count": 50,
"item_count": 300
}
}
Create new Outgoing Payment
Endpoint for creating Outgoing Payment



New Outgoing Payment

bill_id
required
string <uuid>
Payment can be created only for Bill that is not in status DRAFT.

payment_type
required
string
Enum: "IBAN" "MANUAL" "CASH_DISCOUNT" "QR"
Bill's amount cannot be covered only by CASH_DISCOUNT payments.

execution_date
required
string <date>
Must be after or equal to Bill's 'bill_date'. Cannot be in CLOSED or LOCKED Business Year. Must be in existing Business Year. For IBAN and QR must be in present or future and cannot be on the weekend.

amount
required
number <double> > 0
Must be less or equal to Bill's 'pending_amount'. Maximum of 17 digits and maximum of 2 decimal digits.

currency_code
required
string [ 1 .. 20 ] characters
Must be equal to Bill's 'currency_code'. Only 'CHF' and 'EUR' is allowed for QR.

exchange_rate
required
number <double>
Maximum of 5 digits and maximum of 10 decimal digits.

note	
string [ 1 .. 80 ] characters
Not allowed for IBAN, QR.

sender_bank_account_id
required
integer <int32>
Required for IBAN, MANUAL, QR. Not allowed for CASH_DISCOUNT. For [IBAN, QR] it must be Bank Account with type 'bank'. For MANUAL it could be Bank Account with type 'bank' or 'cash'.

sender_iban	
string [ 1 .. 100 ] characters
Required for IBAN, QR. Not allowed for CASH_DISCOUNT.

sender_name	
string [ 1 .. 100 ] characters
Required for IBAN, QR. Not allowed for CASH_DISCOUNT.

sender_street	
string [ 1 .. 255 ] characters
Required for IBAN, QR. Not allowed for CASH_DISCOUNT.

sender_house_no	
string [ 1 .. 10 ] characters
Not allowed for CASH_DISCOUNT.

sender_city	
string [ 1 .. 50 ] characters
Required for IBAN, QR. Not allowed for CASH_DISCOUNT.

sender_postcode	
string [ 1 .. 10 ] characters
Required for IBAN, QR. Not allowed for CASH_DISCOUNT.

sender_country_code	
string [ 1 .. 4 ] characters
Not allowed for CASH_DISCOUNT.

sender_bc_no	
string [ 1 .. 20 ] characters
Not allowed for CASH_DISCOUNT.

sender_bank_no	
string [ 1 .. 50 ] characters
Not allowed for CASH_DISCOUNT.

sender_bank_name	
string [ 1 .. 80 ] characters
Not allowed for CASH_DISCOUNT.

receiver_account_no	
string [ 1 .. 100 ] characters
Deprecated
Not allowed for IBAN, QR, MANUAL, CASH_DISCOUNT.

receiver_iban	
string [ 1 .. 100 ] characters
Required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT. Must be valid Iban for IBAN Payment or must be valid QR Iban for QR Payment.

receiver_name	
string [ 1 .. 70 ] characters
Required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT.

receiver_street	
string [ 1 .. 255 ] characters
Required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT.

receiver_house_no	
string [ 1 .. 10 ] characters
Required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT.

receiver_city	
string [ 1 .. 50 ] characters
Required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT.

receiver_postcode	
string [ 1 .. 10 ] characters
Required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT.

receiver_country_code	
string [ 1 .. 4 ] characters
Required for IBAN, QR. Not allowed for MANUAL, CASH_DISCOUNT.

receiver_bc_no	
string [ 1 .. 20 ] characters
Not allowed for MANUAL, CASH_DISCOUNT.

receiver_bank_no	
string [ 1 .. 50 ] characters
Not allowed for MANUAL, CASH_DISCOUNT.

receiver_bank_name	
string [ 1 .. 80 ] characters
Not allowed for MANUAL, CASH_DISCOUNT.

fee_type	
string
Enum: "BY_SENDER" "BY_RECEIVER" "BREAKDOWN" "NO_FEE"
Required for IBAN. Not allowed for QR, MANUAL, CASH_DISCOUNT. Must be set to NO_FEE when 'receiver_iban' is a domestic IBAN (same country as 'sender_bank_account_id' Bank Account IBAN country). Cannot be set to NO_FEE when 'receiver_iban' is not a domestic IBAN.

is_salary_payment
required
boolean
Allowed to be set to true only for IBAN.

reference_no	
string [ 1 .. 27 ] characters [a-zA-Z0-9]+
Not allowed for IBAN, MANUAL, CASH_DISCOUNT. For QR, when 'receiver_iban' is QR Iban then 'reference_no' must be valid Isr Account number. For QR, when 'receiver_iban' is not QR Iban then 'reference_no' must be valid Creaditor Reference.

message	
string [ 1 .. 140 ] characters
Not allowed for QR, MANUAL, CASH_DISCOUNT.

booking_text	
string [ 1 .. 35 ] characters
Not allowed for MANUAL, CASH_DISCOUNT.

Responses
201
Successful Outgoing Payment creation

400
Bad request

401
Access token is missing or is invalid

403
No access rights


POST
/4.0/purchase/outgoing-payments

Request samples
Payloa
Content type
application/json
Example

IBAN
IBAN

{
"bill_id": "13e24b2d-355a-424f-9c80-f457c7ddd555",
"payment_type": "IBAN",
"execution_date": "2020-11-13",
"amount": 78.64,
"currency_code": "EUR",
"exchange_rate": 1.211,
"is_salary_payment": true,
"fee_type": "BY_SENDER",
"sender_bank_account_id": 2,
"sender_iban": "CH5604835012345678009",
"sender_name": "Muster Hans",
"sender_city": "London",
"sender_postcode": "6723",
"sender_street": "address no 2",
"receiver_iban": "DE91100000000123456789",
"receiver_name": "bexio ag",
"receiver_street": "Reinluftweg 1",
"receiver_city": "Wattwil",
"receiver_postcode": "9630",
"receiver_country_code": "CH"
}

Response samples
201400401403
Content type
application/json

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
Get Outgoing Payment
Endpoint for retrieving Outgoing Payment by id


PATH PARAMETERS
id
required
string <uuid>
Example: 8f276cb8-9220-452c-a649-6877207f47bb
id of Outgoing Payment to retrieve

Responses
200
Outgoing Payment retrieved

401
Access token is missing or is invalid

403
No access rights

404
Outgoing Payment with specified id was not found


GET
/4.0/purchase/outgoing-payments/{id}

Request samples

curl -X GET \
  https://api.bexio.com/4.0/purchase/outgoing-payments/{id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200401403404
Content type
application/json

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
Delete Outgoing Payment
Payment cannot be removed when it is RECONCILED (transaction_id is not null). Payment cannot be removed when it's Business Year is Closed or Locked.


PATH PARAMETERS
id
required
string <uuid>
Example: 9bcf8181-2843-4726-b023-d38261c56ca8
Outgoing Payment id

Responses
204
Outgoing Payment deleted

400
Bad request

401
Access token is missing or is invalid

403
No access rights

404
Outgoing Payment with specified id was not found


DELETE
/4.0/purchase/outgoing-payments/{id}

Request samples

curl -X DELETE \
  https://api.bexio.com/4.0/purchase/outgoing-payments/{id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
400401403404
Content type
application/json

{
"error_code": 400,
"message": "Parameters are invalid"
}
Accounts
Fetch a list of accounts
This action fetches a list of all accounts


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK

422
Validation error


GET
/2.0/accounts

Request samples

curl -X GET \
  https://api.bexio.com/2.0/accounts \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200422
Content type
application/json

[
{
"id": 1,
"account_no": "3201",
"name": "Gross proceeds credit sales",
"account_group_id": 65,
"account_type": 1,
"tax_id": 40,
"is_active": true,
"is_locked": false
}
]
Search Accounts
Search accounts via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

account_no
fibu_account_group_id
name
account_type

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/accounts/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"account_no": "3201",
"name": "Gross proceeds credit sales",
"account_group_id": 65,
"account_type": 1,
"tax_id": 40,
"is_active": true,
"is_locked": false
}
]
Account Groups
Fetch a list of account groups
This action fetches a list of all account groups


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/account_groups

Request samples

curl -X GET \
  https://api.bexio.com/2.0/account_groups \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"account_no": "1",
"name": "Assets",
"parent_fibu_account_group_id": 3,
"is_active": true,
"is_locked": false
}
]
Calendar Years
Fetch a list of calendar years
This action fetches a list of all calendar years


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/accounting/calendar_years

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/calendar_years \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"start": "2018-01-01",
"end": "2018-12-31",
"is_vat_subject": true,
"created_at": "2017-04-28T19:58:58+00:00",
"updated_at": "2018-04-30T19:58:58+00:00",
"vat_accounting_method": "effective",
"vat_accounting_type": "agreed"
}
]
Create calendar year.
This action creates a calendar year. If only year parameter is passed to request the next year is created with the same settings as the year before other way all parameters must be pass to request.



required
year	
string
The year for which we want to create an entry. It is possible to create years 10 years ahead and higher than 2016 year. If it is a future year, we generate all in between with the settings the user has chosen.

is_vat_subject	
boolean
Determines if the calendar year is vat subjected or not.

vat_accounting_method	
string
Enum: "effective" "net_tax"
Vat accounting method.

vat_accounting_type	
string
Enum: "agreed" "collected"
Vat accounting type.

default_tax_income_id	
integer
Determine default tax ID for income. References a tax object

default_tax_expense_id	
integer
Determine default tax ID for expense. Tax ID is not required if the client has the plan bexio mini. In this case, the year is created with the tax ID from the previous year. References a tax object.

Responses
201
OK

422
Validation error


POST
/3.0/accounting/calendar_years

Request samples
Payloa
Content type
application/json

{
"year": "2018",
"is_vat_subject": true,
"vat_accounting_method": "effective",
"vat_accounting_type": "agreed",
"default_tax_income_id": 1,
"default_tax_expense_id": 2
}

Response samples
201422
Content type
application/json

[
{
"id": 1,
"start": "2018-01-01",
"end": "2018-12-31",
"is_vat_subject": true,
"created_at": "2017-04-28T19:58:58+00:00",
"updated_at": "2018-04-30T19:58:58+00:00",
"vat_accounting_method": "effective",
"vat_accounting_type": "agreed"
}
]
Search calendar years
This action fetches a list of all calendar years which matches the search criteria. If you want to search for end date use "like" instead of "=" cause if you search for equality, you will have to provide the date in the following format: "2018-12-31 23:59:59"


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (SearchCriteria)
Default: "like"
Enum: "=" "==" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/3.0/accounting/calendar_years/search

Request samples
Payloa
Content type
application/json

[
{
"field": "start",
"value": "2018-01-01",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"start": "2018-01-01",
"end": "2018-12-31",
"is_vat_subject": true,
"created_at": "2017-04-28T19:58:58+00:00",
"updated_at": "2018-04-30T19:58:58+00:00",
"vat_accounting_method": "effective",
"vat_accounting_type": "agreed"
}
]
Fetch a calendar year
This action fetches a single calendar year


PATH PARAMETERS
calendar_year_id
required
integer <int32>
Example: 1
the id of the calendar_year

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/accounting/calendar_years/{calendar_year_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/calendar_years/{calendar_year_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"start": "2018-01-01",
"end": "2018-12-31",
"is_vat_subject": true,
"created_at": "2017-04-28T19:58:58+00:00",
"updated_at": "2018-04-30T19:58:58+00:00",
"vat_accounting_method": "effective",
"vat_accounting_type": "agreed"
}
Business Years
Fetch a list of business years
This action fetches a list of all business years


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/accounting/business_years

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/business_years \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"start": "2018-01-01",
"end": "2018-12-31",
"status": "open",
"closed_at": "2019-04-28"
}
]
Fetch a business year
This action fetches a single business year


PATH PARAMETERS
business_year_id
required
integer <int32>
Example: 1
the id of the business_year

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/accounting/business_years/{business_year_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/business_years/{business_year_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"start": "2018-01-01",
"end": "2018-12-31",
"status": "open",
"closed_at": "2019-04-28"
}
Currencies
Fetch a list of currencies
This action fetches a list of all currencies


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/currencies

Request samples

curl -X GET \
  https://api.bexio.com/3.0/currencies \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "CHF",
"round_factor": 0.05
}
]
Create a currency
This action creates a new currency



required
name
required
string <= 80 characters
A name of the currency. Must be in the format "ISO 4217" and must be unique.

round_factor
required
number
The round factor of the currency. E.g.: In order to round CHF to 5 Rp. the round_factor must be set to 0.05

Responses
201
Created

422
Validation error


POST
/3.0/currencies

Request samples
Payloa
Content type
application/json

{
"name": "CHF",
"round_factor": 0.05
}

Response samples
201422
Content type
application/json

{
"id": 1,
"name": "CHF",
"round_factor": 0.05
}
Fetch a currency
This action fetches a single currency


PATH PARAMETERS
currency_id
required
integer <int32>
Example: 1
the id of the currency

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/currencies/{currency_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/currencies/{currency_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"name": "CHF",
"round_factor": 0.05
}
Delete a currency
This action permanently deletes a currency. It cannot be undone.


PATH PARAMETERS
currency_id
required
integer <int32>
Example: 1
the id of the currency

HEADER PARAMETERS
Accept
required
string

Responses
200
OK

422
Validation error


DELETE
/3.0/currencies/{currency_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/3.0/currencies/{currency_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200422
Content type
application/json

{
"success": true
}
Update a currency
This action updates an existing currency


PATH PARAMETERS
currency_id
required
integer <int32>
Example: 1
the id of the currency

HEADER PARAMETERS
Accept
required
string


required
Any of CurrencyBase
round_factor	
number
The round factor of the currency. E.g.: In order to round CHF to 5 Rp. the round_factor must be set to 0.05

Responses
201
Created

422
Validation error


PATCH
/3.0/currencies/{currency_id}

Request samples
Payloa
Content type
application/json

{
"round_factor": 0.05
}

Response samples
201422
Content type
application/json

{
"id": 1,
"name": "CHF",
"round_factor": 0.05
}
Fetch exchange rates for currencies
This action fetches all configured exchange rates for a given currency


PATH PARAMETERS
currency_id
required
integer <int32>
the id of the currency

QUERY PARAMETERS
date	
date <date>
Example: date=2019-05-17
the validity date for the fetched exchange rate

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/currencies/{currency_id}/exchange_rates

Request samples

curl -X GET \
  https://api.bexio.com/3.0/currencies/{currency_id}/exchange_rates \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"factor_nr": 1.2,
"exchange_currency": {},
"ratio": 1,
"exchange_rate_to_ratio": 0.9849,
"source": "monthly_average",
"source_reason": "monthly_average_provided",
"exchange_rate_date": "2024-05-01"
}
]
Fetch all possible currency codes
This endpoint can be used to retrieve all available currency codes (in the format CHF, EUR, etc.)


Responses
200
OK


GET
/3.0/currencies/codes

Request samples

curl -X GET \
  https://api.bexio.com/3.0/currencies/codes \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
[
"EUR",
"GBP",
"PLN"
]
]
Manual Entries
Fetch a list of manual entries
This action fetches a list of all manual entries which have been added in the accounting module


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/accounting/manual_entries

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"type": "manual_single_entry",
"date": "2019-11-17",
"reference_nr": "Booking BA-22",
"created_by_user_id": 1,
"edited_by_user_id": 1,
"entries": [],
"is_locked": false,
"locked_info": "closed_business_year"
}
]
Create manual entry
This action creates a new manual entry for the account ledger



required
type
required
string (ManualEntryType)
Enum: "manual_single_entry" "manual_compound_entry" "manual_group_entry"
Choose one of the following three types:

manual_single_entry
Can be used to create a simple one line booking such as:

debit account	credit account	amount
1020	3200	13600
manual_compound_entry
Can be used to create a more complex booking where the total amount can be distributed among multiple accounts. The following example shows how a received bank transaction can be booked on multiple accounts:

debit account	credit account	amount
1020		25000
3200	10000
3201	8000
3202	7000
manual_group_entry
Can be used to create multiple one line bookings in one group entry. This means that the bookings will have the same reference_nr but can differ in accounts, currencies, etc. The following example shows how two received bank transaction can be booked on different accounts:

debit account	credit account	amount
1020	3200	13600
1021	3201	7230
date	
string <date>
the booking date

reference_nr	
string <= 80 characters
A reference number for the booking

entries
required
Array of objects (ManualEntry)
Responses
201
Created

422
Validation error


POST
/3.0/accounting/manual_entries

Request samples
Payloa
Content type
application/json

{
"type": "manual_single_entry",
"date": "2019-11-17",
"reference_nr": "Booking BA-22",
"entries": [
{}
]
}

Response samples
201422
Content type
application/json

{
"id": 1,
"type": "manual_single_entry",
"date": "2019-11-17",
"reference_nr": "Booking BA-22",
"created_by_user_id": 1,
"edited_by_user_id": 1,
"entries": [
{}
],
"is_locked": false,
"locked_info": "closed_business_year"
}
Get next reference number
This action can be used to get the next reference number for a manual entry


Responses
200
OK

422
Validation error


GET
/3.0/accounting/manual_entries/next_ref_nr

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/next_ref_nr \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200422
Content type
application/json

{
"next_ref_nr": "Booking BA-22"
}
Fetch files of accounting entry line
This action fetches a list of all files associated to a specific manual entry line


PATH PARAMETERS
manual_entry_id
required
integer <int32>
Example: 1
the id of the manual_entry

entry_id
required
integer <int32>
Example: 1
the id of a single entry in the manual_entry object

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Add file to accounting entry line
This action upload one or multiple files and attaches the files to an existing accounting entry line

Please note that you must set the content-type to multipart/form-data. You can upload multiple files with one request by providing different identifiers (e.g. fileName1 and fileName2)


PATH PARAMETERS
manual_entry_id
required
integer <int32>
Example: 1
the id of the manual_entry

entry_id
required
integer <int32>
Example: 1
the id of a single entry in the manual_entry object

HEADER PARAMETERS
Accept
required
string

REQUEST BODY SCHEMA: multipart/form-data
required
fileName	
Array of strings <binary> [ items <binary > ]
Please note that the same request parameter can only be used once. Please use different request parameter for multiple files.

Responses
201
Created

422
Validation error


POST
/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files

Request samples

curl -X POST \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
201422
Content type
application/json

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
Fetch file of accounting entry line
This action fetches a file associated to a specific manual entry line


PATH PARAMETERS
manual_entry_id
required
integer <int32>
Example: 1
the id of the manual_entry

entry_id
required
integer <int32>
Example: 1
the id of a single entry in the manual_entry object

file_id
required
integer <int32>
Example: 1
the id of the file

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"data": "iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAIAAADTED8xAAAACXBIWXMAAABIAAAASABGyWs+AAACu0lEQVR42u3TAQkAMBDEsHuYf80T0oRa6G07qdrbDbIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYA0A5BmANIMQJoBSDMAaQYgzQCkGYC0DxplBfxP7XIvAAAAAElFTkSuQmCC"
}
Delete file of accounting entry line
This action permanently deletes a file associated to a specific manual entry line. It cannot be undone.


PATH PARAMETERS
manual_entry_id
required
integer <int32>
Example: 1
the id of the manual_entry

entry_id
required
integer <int32>
Example: 1
the id of a single entry in the manual_entry object

file_id
required
integer <int32>
Example: 1
the id of the currency

Responses
200
OK


DELETE
/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Reports
Journal
This action fetches a list of all accounting journal bookings


QUERY PARAMETERS
from	
string <date>
Example: from=2019-01-01
Can be used to filter for entries after this date

to	
string <date>
Example: to=2019-12-31
Can be used to filter for entries until this date

account_uuid	
string <uuid>
Example: account_uuid=d591c997-5e88-486b-8fca-48dfd984d45d
Can be used to filter for entries with account with uuid

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/accounting/journal

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/journal \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"currency_id": 1
}
]
Taxes
Fetch a list of taxes
This action fetches a list of all taxes


QUERY PARAMETERS
scope	
string
Enum: "active" "inactive"
Example: scope=active
Can be used to filter for active or inactive taxes

date	
string <date>
Example: date=2018-03-17
Displays all taxes which are active at the date given

types	
string
Enum: "sales_tax" "pre_tax"
Example: types=sales_tax
Filter the types of the tax

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK

422
Validation error


GET
/3.0/taxes

Request samples

curl -X GET \
  https://api.bexio.com/3.0/taxes \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200422
Content type
application/json

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
"display_name": "ZOLLM  - Import Mat/SV 100.00%"
}
]
Fetch a tax
This action fetches a single tax


PATH PARAMETERS
tax_id
required
integer <int32>
Example: 1
the id of the tax

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/taxes/{tax_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/taxes/{tax_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"display_name": "ZOLLM  - Import Mat/SV 100.00%"
}
Delete a tax
This action permanently deletes a tax. It cannot be undone. Please note that taxes which are used and/or referenced within bexio can not be deleted. In that case, the API will throw a 409 error.


PATH PARAMETERS
tax_id
required
integer <int32>
Example: 1
the id of the tax

HEADER PARAMETERS
Accept
required
string

Responses
200
OK

409
Conflict


DELETE
/3.0/taxes/{tax_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/3.0/taxes/{tax_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200409
Content type
application/json

{
"success": true
}
Vat Periods
Fetch a list of vat periods
This action fetches a list of all vat periods


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/accounting/vat_periods

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/vat_periods \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"start": "2018-01-01",
"end": "2018-03-31",
"type": "quarter",
"status": "closed",
"closed_at": "2018-04-28"
}
]
Fetch a vat period
This action fetches a single vat period


PATH PARAMETERS
vat_period_id
required
integer <int32>
Example: 1
the id of the vat_period

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/accounting/vat_periods/{vat_period_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/accounting/vat_periods/{vat_period_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"start": "2018-01-01",
"end": "2018-03-31",
"type": "quarter",
"status": "closed",
"closed_at": "2018-04-28"
}
Bank Accounts
Fetch a list of bank accounts
This action fetches a list of all bank accounts which are shown on the banking component page


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/banking/accounts

Request samples

curl -X GET \
  https://api.bexio.com/3.0/banking/accounts \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 4,
"name": "UBS",
"owner": "Metzgerei Schneider",
"owner_address": "Alte Jonastrasse 10",
"owner_zip": 8640,
"owner_city": "Rapperswil",
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
]
Fetch a single bank account
This action fetches a single bank account which is shown on the banking component page


PATH PARAMETERS
bank_account_id
required
integer <int32>
ID of bank account to return

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/banking/accounts/{bank_account_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/banking/accounts/{bank_account_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 4,
"name": "UBS",
"owner": "Metzgerei Schneider",
"owner_address": "Alte Jonastrasse 10",
"owner_zip": 8640,
"owner_city": "Rapperswil",
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
IBAN Payments
Create IBAN payment
This action creates a new payment for the selected bank account


PATH PARAMETERS
bank_account_id
required
integer <int32>
the id of the bank account

HEADER PARAMETERS
Accept
required
string


optional
Payment that needs to be added for the selected bank account

instructed_amount
required
object (BankPaymentAmount)
recipient
required
object (BankPaymentRecipient)
iban
required
string <= 50 characters
The IBAN of the bank account

execution_date
required
string <date>
The execution date of the payment. The bank holds back the payment until this date is reached. Format (Y-m-d).

is_salary_payment
required
boolean
Describes whether the payment is a salary payment or not

is_editing_restricted	
boolean
If this value is set to true, the payment can be edited only by the initial creator. This means that the payment can not be edited within the frontend and by other API clients.

message	
string <= 140 characters
This is a free text field where the user can add an additional information for a bank payment

allowance_type	
string (AllowanceType)
Enum: "fee_paid_by_sender" "fee_paid_by_recipient" "fee_split" "no_fee"
Can either be
"fee_paid_by_sender" (payment initiator has to pay all fees related to the transaction)
"fee_paid_by_recipient" (payment recipient has to pay all fees related to the transaction)
"fee_split" (fee is split between payment initiator and payment recipient)
"no_fee" for domestic payments

The value must always be set for SEPA payments
Responses
201
Created

422
Validation error


POST
/3.0/banking/bank_accounts/{bank_account_id}/iban_payments

Request samples
Payloa
Content type
application/json

{
"instructed_amount": {
"currency": "CHF",
"amount": 187.2
},
"recipient": {
"name": "Müller GmbH",
"street": "Sonnenstrasse",
"zip": 8005,
"city": "Zürich",
"country_code": "CH",
"house_number": 36
},
"iban": "CH8100700110005554634",
"execution_date": "2018-03-17",
"is_salary_payment": false,
"is_editing_restricted": false,
"message": "Payment for invoice IV-1202842",
"allowance_type": "fee_paid_by_sender"
}

Response samples
201422
Content type
application/json

{
"id": 1,
"uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
"type": "iban",
"bank_account": {
"id": 4,
"iban": "CH560025025010367101Y"
},
"payment": {
"instructed_amount": {},
"recipient": {},
"iban": "CH8100700110005554634",
"execution_date": "2018-03-17",
"is_salary_payment": false,
"is_editing_restricted": false,
"message": "Payment for invoice IV-1202842",
"allowance_type": "fee_paid_by_sender"
},
"instruction_id": "5a335fe3345a96.14999616",
"status": "open",
"created_at": "2018-04-09T07:44:10+00:00"
}
Get IBAN payment
This action fetches an IBAN payment which is associated to the specified bank account


PATH PARAMETERS
bank_account_id
required
integer <int32>
the id of the bank account

payment_id
required
string or integer
ID or UUID of the IBAN payment

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/banking/bank_accounts/{bank_account_id}/iban_payments/{payment_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/banking/bank_accounts/{bank_account_id}/iban_payments/{payment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
"type": "iban",
"bank_account": {
"id": 4,
"iban": "CH560025025010367101Y"
},
"payment": {
"instructed_amount": {},
"recipient": {},
"iban": "CH8100700110005554634",
"execution_date": "2018-03-17",
"is_salary_payment": false,
"is_editing_restricted": false,
"message": "Payment for invoice IV-1202842",
"allowance_type": "fee_paid_by_sender"
},
"instruction_id": "5a335fe3345a96.14999616",
"status": "open",
"created_at": "2018-04-09T07:44:10+00:00"
}
Update IBAN payment
This action updates an existing payment for the selected bank account. Please note that a payment can only be edited, when the status is "open".

Please note that you do not have to provide all fields to update a payment.


PATH PARAMETERS
bank_account_id
required
string
payment_id
required
string or integer
ID or UUID of the IBAN payment

QUERY PARAMETERS
iban
required
integer <int32>
IBAN of the payment bank account

id
required
integer <int32>
ID of the IBAN payment

HEADER PARAMETERS
Accept
required
string


required
Payment that needs to be added for the selected bank account

instructed_amount
required
object (BankPaymentAmount)
recipient
required
object (BankPaymentRecipient)
iban
required
string <= 50 characters
The IBAN of the bank account

execution_date
required
string <date>
The execution date of the payment. The bank holds back the payment until this date is reached. Format (Y-m-d).

is_salary_payment
required
boolean
Describes whether the payment is a salary payment or not

is_editing_restricted	
boolean
If this value is set to true, the payment can be edited only by the initial creator. This means that the payment can not be edited within the frontend and by other API clients.

message	
string <= 140 characters
This is a free text field where the user can add an additional information for a bank payment

allowance_type	
string (AllowanceType)
Enum: "fee_paid_by_sender" "fee_paid_by_recipient" "fee_split" "no_fee"
Can either be
"fee_paid_by_sender" (payment initiator has to pay all fees related to the transaction)
"fee_paid_by_recipient" (payment recipient has to pay all fees related to the transaction)
"fee_split" (fee is split between payment initiator and payment recipient)
"no_fee" for domestic payments

The value must always be set for SEPA payments
Responses
200
OK

422
Validation error


PATCH
/3.0/banking/bank_accounts/{bank_account_id}/iban_payments/{payment_id}

Request samples
Payloa
Content type
application/json

{
"instructed_amount": {
"currency": "CHF",
"amount": 187.2
},
"recipient": {
"name": "Müller GmbH",
"street": "Sonnenstrasse",
"zip": 8005,
"city": "Zürich",
"country_code": "CH",
"house_number": 36
},
"iban": "CH8100700110005554634",
"execution_date": "2018-03-17",
"is_salary_payment": false,
"is_editing_restricted": false,
"message": "Payment for invoice IV-1202842",
"allowance_type": "fee_paid_by_sender"
}

Response samples
200422
Content type
application/json

{
"id": 1,
"uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
"type": "iban",
"bank_account": {
"id": 4,
"iban": "CH560025025010367101Y"
},
"payment": {
"instructed_amount": {},
"recipient": {},
"iban": "CH8100700110005554634",
"execution_date": "2018-03-17",
"is_salary_payment": false,
"is_editing_restricted": false,
"message": "Payment for invoice IV-1202842",
"allowance_type": "fee_paid_by_sender"
},
"instruction_id": "5a335fe3345a96.14999616",
"status": "open",
"created_at": "2018-04-09T07:44:10+00:00"
}
QR Payments
Create QR payment
This action creates a new payment for the selected bank account


PATH PARAMETERS
bank_account_id
required
integer <int32>
the id of the bank account

HEADER PARAMETERS
Accept
required
string


optional
Payment that needs to be added for the selected bank account

instructed_amount
required
object (BankPaymentAmount)
recipient
required
object (BankPaymentRecipient)
iban	
string <= 50 characters
The IBAN of the bank account

qr_reference_nr	
string <= 27 characters
A QR reference number or creditor reference number

additional_information	
string <= 255 characters
Additional information on the payment slip

is_editing_restricted	
boolean
If this value is set to true, the payment can be edited only by the initial creator. This means that the payment can not be edited within the frontend and by other API clients.

execution_date
required
string <date>
The execution date of the payment. The bank holds back the payment until this date is reached. Format (Y-m-d).

Responses
201
Created

422
Validation error


POST
/3.0/banking/bank_accounts/{bank_account_id}/qr_payments

Request samples
Payloa
Content type
application/json

{
"instructed_amount": {
"currency": "CHF",
"amount": 187.2
},
"recipient": {
"name": "Müller GmbH",
"street": "Sonnenstrasse",
"zip": 8005,
"city": "Zürich",
"country_code": "CH",
"house_number": 36
},
"iban": "CH8100700110005554634",
"qr_reference_nr": "998877000000000000000000634",
"additional_information": "//S1/10/5541/11/191210/20/1235/31/191220200108/32/2.5:337.5;3.7:3807.5/40/0:30",
"is_editing_restricted": false,
"execution_date": "2018-03-17"
}

Response samples
201422
Content type
application/json

{
"id": 1,
"uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
"type": "qr",
"bank_account": {
"id": 4,
"iban": "CH560025025010367101Y"
},
"payment": {
"instructed_amount": {},
"recipient": {},
"iban": "CH8100700110005554634",
"qr_reference_nr": "998877000000000000000000634",
"additional_information": "//S1/10/5541/11/191210/20/1235/31/191220200108/32/2.5:337.5;3.7:3807.5/40/0:30",
"is_editing_restricted": false,
"execution_date": "2018-03-17"
},
"instruction_id": "5a335fe3345a96.14999616",
"status": "open",
"created_at": "2018-04-09T07:44:10+00:00"
}
Get QR payment
This action fetches an IBAN payment which is associated to the specified bank account


PATH PARAMETERS
bank_account_id
required
integer <int32>
the id of the bank account

payment_id
required
string or integer
ID or UUID of the IBAN payment

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/banking/bank_accounts/{bank_account_id}/qr_payments/{payment_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/banking/bank_accounts/{bank_account_id}/qr_payments/{payment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
"type": "qr",
"bank_account": {
"id": 4,
"iban": "CH560025025010367101Y"
},
"payment": {
"instructed_amount": {},
"recipient": {},
"iban": "CH8100700110005554634",
"qr_reference_nr": "998877000000000000000000634",
"additional_information": "//S1/10/5541/11/191210/20/1235/31/191220200108/32/2.5:337.5;3.7:3807.5/40/0:30",
"is_editing_restricted": false,
"execution_date": "2018-03-17"
},
"instruction_id": "5a335fe3345a96.14999616",
"status": "open",
"created_at": "2018-04-09T07:44:10+00:00"
}
Update QR payment
This action updates an existing payment for the selected bank account. Please note that a payment can only be edited, when the status is "open".

Please note that you do not have to provide all fields to update a payment.


PATH PARAMETERS
bank_account_id
required
string
payment_id
required
string or integer
ID or UUID of the IBAN payment

QUERY PARAMETERS
iban
required
integer <int32>
IBAN of the payment bank account

id
required
integer <int32>
ID of the IBAN payment

HEADER PARAMETERS
Accept
required
string


required
Payment that needs to be added for the selected bank account

instructed_amount
required
object (BankPaymentAmount)
recipient
required
object (BankPaymentRecipient)
iban	
string <= 50 characters
The IBAN of the bank account

qr_reference_nr	
string <= 27 characters
A QR reference number or creditor reference number

additional_information	
string <= 255 characters
Additional information on the payment slip

is_editing_restricted	
boolean
If this value is set to true, the payment can be edited only by the initial creator. This means that the payment can not be edited within the frontend and by other API clients.

execution_date
required
string <date>
The execution date of the payment. The bank holds back the payment until this date is reached. Format (Y-m-d).

Responses
200
OK

422
Validation error


PATCH
/3.0/banking/bank_accounts/{bank_account_id}/qr_payments/{payment_id}

Request samples
Payloa
Content type
application/json

{
"instructed_amount": {
"currency": "CHF",
"amount": 187.2
},
"recipient": {
"name": "Müller GmbH",
"street": "Sonnenstrasse",
"zip": 8005,
"city": "Zürich",
"country_code": "CH",
"house_number": 36
},
"iban": "CH8100700110005554634",
"qr_reference_nr": "998877000000000000000000634",
"additional_information": "//S1/10/5541/11/191210/20/1235/31/191220200108/32/2.5:337.5;3.7:3807.5/40/0:30",
"is_editing_restricted": false,
"execution_date": "2018-03-17"
}

Response samples
200422
Content type
application/json

{
"id": 1,
"uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
"type": "qr",
"bank_account": {
"id": 4,
"iban": "CH560025025010367101Y"
},
"payment": {
"instructed_amount": {},
"recipient": {},
"iban": "CH8100700110005554634",
"qr_reference_nr": "998877000000000000000000634",
"additional_information": "//S1/10/5541/11/191210/20/1235/31/191220200108/32/2.5:337.5;3.7:3807.5/40/0:30",
"is_editing_restricted": false,
"execution_date": "2018-03-17"
},
"instruction_id": "5a335fe3345a96.14999616",
"status": "open",
"created_at": "2018-04-09T07:44:10+00:00"
}
Payments
Fetch a list of payments
This action fetches all payments


QUERY PARAMETERS
from	
string <date>
Filter payments by their date starting from the specified date (Format: Y-m-d)

to	
string <date>
Filter payments by their date ranging to the specified date (Format: Y-m-d)

bill_id	
string or integer
Filter payments by the referenced bill

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/banking/payments

Request samples

curl -X GET \
  https://api.bexio.com/3.0/banking/payments \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
"type": "iban",
"bank_account": {
"id": 4,
"iban": "CH560025025010367101Y"
},
"payment": {
"instructed_amount": {},
"recipient": {},
"iban": "CH8100700110005554634",
"execution_date": "2018-03-17",
"is_salary_payment": false,
"is_editing_restricted": false,
"message": "Payment for invoice IV-1202842",
"allowance_type": "fee_paid_by_sender"
},
"instruction_id": "5a335fe3345a96.14999616",
"status": "open",
"created_at": "2018-04-09T07:44:10+00:00"
}
Cancel a payment
This action cancels an existing payment. Please note that a payment can only be cancelled when the status is "downloaded", "transferred" or "error".


PATH PARAMETERS
payment_id
required
string or integer
ID or UUID of the payment

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/3.0/banking/payments/{payment_id}/cancel

Request samples

curl -X POST \
  https://api.bexio.com/3.0/banking/payments/{payment_id}/cancel \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"uuid": "046b6c7f-0b8a-43b9-b35d-6489e6daee91",
"type": "iban",
"bank_account": {
"id": 4,
"iban": "CH560025025010367101Y"
},
"payment": {
"instructed_amount": {},
"recipient": {},
"iban": "CH8100700110005554634",
"execution_date": "2018-03-17",
"is_salary_payment": false,
"is_editing_restricted": false,
"message": "Payment for invoice IV-1202842",
"allowance_type": "fee_paid_by_sender"
},
"instruction_id": "5a335fe3345a96.14999616",
"status": "open",
"created_at": "2018-04-09T07:44:10+00:00"
}
Delete a payment
This action permanently deletes an existing payment. It cannot be undone. Please note that a payment can only be deleted when the status is "open".


PATH PARAMETERS
payment_id
required
string or integer
ID or UUID of the payment

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/3.0/banking/payments/{payment_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/3.0/banking/payments/{payment_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Items
Fetch a list of items
This action fetches a list of all items / products


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "intern_name"
Example: order_by=intern_name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/article

Request samples

curl -X GET \
  https://api.bexio.com/2.0/article \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"article_group_id": null
}
]
Create item
This action creates a new item



required
user_id	
integer
References a user object

article_type_id	
integer
Please use the value 1 for physical products or 2 for services

contact_id	
integer or null
References a contact object

deliverer_code	
string or null
deliverer_name	
string or null
deliverer_description	
string or null
intern_code	
string
intern_name	
string
intern_description	
string or null
purchase_price	
number or null
sale_price	
number or null
purchase_total	
number or null
sale_total	
number or null
currency_id	
integer or null
References a currency object

tax_income_id	
integer or null
References a tax object

tax_expense_id	
integer or null
References a tax object

unit_id	
integer or null
References a unit object

is_stock	
boolean
stock_id	
integer or null
References a stock location object

stock_place_id	
integer or null
References a stock area object

stock_nr	
integer
Please note that the stock number can only be set if no bookings for this product have been made.

stock_min_nr	
integer
width	
integer or null
height	
integer or null
weight	
integer or null
volume	
integer or null
html_text	
string or null
Deprecated
remarks	
string or null
delivery_price	
number or null
article_group_id	
integer or null
Responses
201
Created

422
Validation error


POST
/2.0/article

Request samples
Payloa
Content type
application/json

{
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
"tax_expense_id": null,
"unit_id": null,
"is_stock": false,
"stock_id": null,
"stock_place_id": null,
"stock_nr": 0,
"stock_min_nr": 0,
"width": null,
"height": null,
"weight": null,
"volume": null,
"html_text": null,
"remarks": null,
"delivery_price": null,
"article_group_id": null
}

Response samples
201422
Content type
application/json

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
"article_group_id": null
}
Search items
Search items via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

intern_name
intern_code

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "intern_name"
Example: order_by=intern_name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/article/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

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
"article_group_id": null
}
]
Fetch an item
This action fetches a single item


PATH PARAMETERS
article_id
required
integer <int32>
Example: 1
the id of the item

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/article/{article_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/article/{article_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"article_group_id": null
}
Edit an item
This action edits a single item


PATH PARAMETERS
article_id
required
integer <int32>
Example: 1
the id of the item


user_id	
integer
References a user object

article_type_id	
integer
Please use the value 1 for physical products or 2 for services

contact_id	
integer or null
References a contact object

deliverer_code	
string or null
deliverer_name	
string or null
deliverer_description	
string or null
intern_code	
string
intern_name	
string
intern_description	
string or null
purchase_price	
number or null
sale_price	
number or null
purchase_total	
number or null
sale_total	
number or null
currency_id	
integer or null
References a currency object

tax_income_id	
integer or null
References a tax object

tax_expense_id	
integer or null
References a tax object

unit_id	
integer or null
References a unit object

is_stock	
boolean
stock_id	
integer or null
References a stock location object

stock_place_id	
integer or null
References a stock area object

stock_nr	
integer
Please note that the stock number can only be set if no bookings for this product have been made.

stock_min_nr	
integer
width	
integer or null
height	
integer or null
weight	
integer or null
volume	
integer or null
html_text	
string or null
Deprecated
remarks	
string or null
delivery_price	
number or null
article_group_id	
integer or null
Responses
200
OK

422
Validation error


POST
/2.0/article/{article_id}

Request samples
Payloa
Content type
application/json

{
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
"tax_expense_id": null,
"unit_id": null,
"is_stock": false,
"stock_id": null,
"stock_place_id": null,
"stock_nr": 0,
"stock_min_nr": 0,
"width": null,
"height": null,
"weight": null,
"volume": null,
"html_text": null,
"remarks": null,
"delivery_price": null,
"article_group_id": null
}

Response samples
200422
Content type
application/json

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
"article_group_id": null
}
Delete an item
This action permanently deletes an item. It cannot be undone.


PATH PARAMETERS
article_id
required
integer <int32>
Example: 1
the id of the item

Responses
200
OK


DELETE
/2.0/article/{article_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/article/{article_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Stock locations
Fetch a list of stock locations
This action fetches a list of all stock locations


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/stock

Request samples

curl -X GET \
  https://api.bexio.com/2.0/stock \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Stock Berlin"
}
]
Search stock locations
Search stock locations via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/stock/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "Stock Berlin"
}
]
Stock Areas
Fetch a list of stock areas
This action fetches a list of all stock areas


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/stock_place

Request samples

curl -X GET \
  https://api.bexio.com/2.0/stock_place \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Shelf A-06"
}
]
Search stock areas
Search stock areas via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name
stock_id

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/stock_place/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "Shelf A-06"
}
]
Projects
Fetch a list of projects
This action fetches a list of all projects


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/pr_project

Request samples

curl -X GET \
  https://api.bexio.com/2.0/pr_project \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"pr_budget_type_amount": "200.00"
}
]
Create project
This action creates a new project



required
name
required
string
start_date	
string or null <date-time>
end_date	
string or null <date-time>
comment	
string
pr_state_id
required
integer
References a project status object

pr_project_type_id
required
integer
References a project type object

contact_id
required
integer
References a contact object

contact_sub_id	
integer or null
References a contact object

pr_invoice_type_id	
integer or null
The following invoice types are available:

Id	Name	Description
1	type_hourly_rate_service	Hourly rate for client services
2	type_hourly_rate_employee	Hourly rate for employee
3	type_hourly_rate_project	Hourly rate for project
4	type_fix	Fix price for project
pr_invoice_type_amount	
string
This field can only be edited if the pr_invoice_type is set. (Only supported for invoice types: type_hourly_rate_project and type_fix)

pr_budget_type_id	
number or null
The following budget types are available:

Id	Name	Description
1	type_budgeted_costs	Total budget costs
2	type_budgeted_hours	Total budget hours
3	type_service_budget	Budget for each client services
4	type_service_employees	Budget for each employee
pr_budget_type_amount	
string
This field can only be edited if the pr_budget_type is set. (Only supported for budget types: type_budgeted_costs and type_budgeted_hours)

user_id
required
integer
References a user object

Responses
201
Created

422
Validation error


POST
/2.0/pr_project

Request samples
Payloa
Content type
application/json

{
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

Response samples
201422
Content type
application/json

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
"pr_budget_type_amount": "200.00"
}
Search projects
Search projects via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name
contact_id
pr_state_id

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/pr_project/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

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
"pr_budget_type_amount": "200.00"
}
]
Fetch a project
This action fetches a single project


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/pr_project/{project_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/pr_project/{project_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
"pr_budget_type_amount": "200.00"
}
Edit a project
This action edits a single project


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

HEADER PARAMETERS
Accept
required
string


name
required
string
start_date	
string or null <date-time>
end_date	
string or null <date-time>
comment	
string
pr_state_id
required
integer
References a project status object

pr_project_type_id
required
integer
References a project type object

contact_id
required
integer
References a contact object

contact_sub_id	
integer or null
References a contact object

pr_invoice_type_id	
integer or null
The following invoice types are available:

Id	Name	Description
1	type_hourly_rate_service	Hourly rate for client services
2	type_hourly_rate_employee	Hourly rate for employee
3	type_hourly_rate_project	Hourly rate for project
4	type_fix	Fix price for project
pr_invoice_type_amount	
string
This field can only be edited if the pr_invoice_type is set. (Only supported for invoice types: type_hourly_rate_project and type_fix)

pr_budget_type_id	
number or null
The following budget types are available:

Id	Name	Description
1	type_budgeted_costs	Total budget costs
2	type_budgeted_hours	Total budget hours
3	type_service_budget	Budget for each client services
4	type_service_employees	Budget for each employee
pr_budget_type_amount	
string
This field can only be edited if the pr_budget_type is set. (Only supported for budget types: type_budgeted_costs and type_budgeted_hours)

user_id
required
integer
References a user object

Responses
200
OK

422
Validation error


POST
/2.0/pr_project/{project_id}

Request samples
Payloa
Content type
application/json

{
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

Response samples
200422
Content type
application/json

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
"pr_budget_type_amount": "200.00"
}
Delete a project
This action permanently deletes a project. It cannot be undone.


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/pr_project/{project_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/pr_project/{project_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Archive a project
This action archives a project


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/pr_project/{project_id}/archive

Request samples

curl -X POST \
  https://api.bexio.com/2.0/pr_project/{project_id}/archive \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Unarchive a project
This action unarchives an archived project


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


POST
/2.0/pr_project/{project_id}/reactivate

Request samples

curl -X POST \
  https://api.bexio.com/2.0/pr_project/{project_id}/reactivate \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Project status
This action fetches a list of project status


Responses
200
OK


GET
/2.0/pr_project_state

Request samples

curl -X GET \
  https://api.bexio.com/2.0/pr_project_state \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Active"
}
]
Project types
This action fetches a list of project types


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/pr_project_type

Request samples

curl -X GET \
  https://api.bexio.com/2.0/pr_project_type \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Internal Project"
}
]
Fetch a list of milestones
This action fetches a list of all milestones for a given project


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK

422
Validation error


GET
/3.0/projects/{project_id}/milestones

Request samples

curl -X GET \
  https://api.bexio.com/3.0/projects/{project_id}/milestones \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200422
Content type
application/json

[
{
"id": 4,
"name": "project documentation",
"end_date": "2018-05-18",
"comment": "Finish project documentation.",
"pr_parent_milestone_id": 3
}
]
Create milestone
This action creates a new milestone


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

HEADER PARAMETERS
Accept
required
string


required
name
required
string <= 255 characters
The name of the milestone

end_date	
string <date>
The end date for the milestone

comment	
string <= 10000 characters
Description for milestone

pr_parent_milestone_id	
integer <int32>
Higher level milestone

Responses
201
Created

422
Validation error


POST
/3.0/projects/{project_id}/milestones

Request samples
Payloa
Content type
application/json

{
"name": "project documentation",
"end_date": "2018-05-18",
"comment": "Finish project documentation.",
"pr_parent_milestone_id": 3
}

Response samples
201422
Content type
application/json

{
"id": 4,
"name": "project documentation",
"end_date": "2018-05-18",
"comment": "Finish project documentation.",
"pr_parent_milestone_id": 3
}
Fetch a milestone
This action fetches a single milestone


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

milestone_id
required
integer <int32>
Example: 3
the id of the milestone

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/projects/{project_id}/milestones/{milestone_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/projects/{project_id}/milestones/{milestone_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 4,
"name": "project documentation",
"end_date": "2018-05-18",
"comment": "Finish project documentation.",
"pr_parent_milestone_id": 3
}
Edit a milestone
This action edits a single milestone


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

milestone_id
required
integer <int32>
Example: 3
the id of the milestone

HEADER PARAMETERS
Accept
required
string


name
required
string <= 255 characters
The name of the milestone

end_date	
string <date>
The end date for the milestone

comment	
string <= 10000 characters
Description for milestone

pr_parent_milestone_id	
integer <int32>
Higher level milestone

Responses
200
OK

422
Validation error


POST
/3.0/projects/{project_id}/milestones/{milestone_id}

Request samples
Payloa
Content type
application/json

{
"name": "project documentation",
"end_date": "2018-05-18",
"comment": "Finish project documentation.",
"pr_parent_milestone_id": 3
}

Response samples
200422
Content type
application/json

{
"id": 4,
"name": "project documentation",
"end_date": "2018-05-18",
"comment": "Finish project documentation.",
"pr_parent_milestone_id": 3
}
Delete a milestone
This action permanently deletes a milestone. It cannot be undone.


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

milestone_id
required
integer <int32>
Example: 3
the id of the milestone

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/3.0/projects/{project_id}/milestones/{milestone_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/3.0/projects/{project_id}/milestones/{milestone_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Fetch a list of work packages
This action fetches a list of all work packages for a given project


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK

422
Validation error


GET
/3.0/projects/{project_id}/packages

Request samples

curl -X GET \
  https://api.bexio.com/3.0/projects/{project_id}/packages \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200422
Content type
application/json

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
Create work package
This action creates a new work package


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

HEADER PARAMETERS
Accept
required
string


required
name
required
string <= 255 characters
The name of the work package

spent_time_in_hours	
number
time spent on work package

estimated_time_in_hours	
number
estimated time on work package

comment	
string <= 10000 characters
Description for work package

pr_milestone_id	
integer <int32>
References a milestone object

Responses
201
Created

422
Validation error


POST
/3.0/projects/{project_id}/packages

Request samples
Payloa
Content type
application/json

{
"name": "Documentation",
"spent_time_in_hours": 0.5,
"estimated_time_in_hours": 1.75,
"comment": "Crete project documentation",
"pr_milestone_id": 3
}

Response samples
201422
Content type
application/json

{
"id": 4,
"name": "Documentation",
"spent_time_in_hours": 0.5,
"estimated_time_in_hours": 1.75,
"comment": "Crete project documentation",
"pr_milestone_id": 3
}
Fetch a work package
This action fetches a single work package


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

package_id
required
integer <int32>
Example: 3
the id of the work package

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/projects/{project_id}/packages/{package_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/projects/{project_id}/packages/{package_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 4,
"name": "Documentation",
"spent_time_in_hours": 0.5,
"estimated_time_in_hours": 1.75,
"comment": "Crete project documentation",
"pr_milestone_id": 3
}
Delete a work package
This action permanently deletes a work package. It cannot be undone.


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

package_id
required
integer <int32>
Example: 3
the id of the work package

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/3.0/projects/{project_id}/packages/{package_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/3.0/projects/{project_id}/packages/{package_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Edit a work package
This action edits a single work package


PATH PARAMETERS
project_id
required
integer <int32>
Example: 1
the id of the project

package_id
required
integer <int32>
Example: 3
the id of the work package

HEADER PARAMETERS
Accept
required
string


name
required
string <= 255 characters
The name of the work package

spent_time_in_hours	
number
time spent on work package

estimated_time_in_hours	
number
estimated time on work package

comment	
string <= 10000 characters
Description for work package

pr_milestone_id	
integer <int32>
References a milestone object

Responses
200
OK

422
Validation error


PATCH
/3.0/projects/{project_id}/packages/{package_id}

Request samples
Payloa
Content type
application/json

{
"name": "Documentation",
"spent_time_in_hours": 0.5,
"estimated_time_in_hours": 1.75,
"comment": "Crete project documentation",
"pr_milestone_id": 3
}

Response samples
200422
Content type
application/json

{
"id": 4,
"name": "Documentation",
"spent_time_in_hours": 0.5,
"estimated_time_in_hours": 1.75,
"comment": "Crete project documentation",
"pr_milestone_id": 3
}
Timesheets
Fetch a list of timesheets
This action fetches a list of all timesheets


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "date"
Example: order_by=date
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/timesheet

Request samples

curl -X GET \
  https://api.bexio.com/2.0/timesheet \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
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
"tracking": {}
}
]
Create timesheet
This action creates a new timesheet



required
user_id
required
integer
References a user object

status_id	
integer
References a timesheet status object

client_service_id
required
integer
References a business activity object

text	
string
allowable_bill
required
boolean
charge	
string or null
contact_id	
integer or null
References a contact object

sub_contact_id	
integer or null
References a contact object

pr_project_id	
integer or null
References a project object

pr_package_id	
integer or null
pr_milestone_id	
integer or null
estimated_time	
string or null
tracking
required
TimesheetDuration (object) or TimesheetRange (object)
Two different formats can be used to submit the tracked time. Either type range or type duration.

Responses
201
Created

422
Validation error


POST
/2.0/timesheet

Request samples
Payloa
Content type
application/json

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

Response samples
201422
Content type
application/json

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
Search timesheets
Search timesheets via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

id
client_service_id
contact_id
user_id
pr_project_id
status_id

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "date"
Example: order_by=date
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/timesheet/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
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
"tracking": {}
}
]
Fetch a timesheet
This action fetches a single timesheet


PATH PARAMETERS
timesheet_id
required
integer <int32>
Example: 1
the id of the timesheet

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/timesheet/{timesheet_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/timesheet/{timesheet_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Edit a timesheet
This action edits a single timesheet


PATH PARAMETERS
timesheet_id
required
integer <int32>
Example: 1
the id of the timesheet

HEADER PARAMETERS
Accept
required
string


user_id
required
integer
References a user object

status_id	
integer
References a timesheet status object

client_service_id
required
integer
References a business activity object

text	
string
allowable_bill
required
boolean
charge	
string or null
contact_id	
integer or null
References a contact object

sub_contact_id	
integer or null
References a contact object

pr_project_id	
integer or null
References a project object

pr_package_id	
integer or null
pr_milestone_id	
integer or null
estimated_time	
string or null
tracking
required
TimesheetDuration (object) or TimesheetRange (object)
Two different formats can be used to submit the tracked time. Either type range or type duration.

Responses
200
OK

422
Validation error


POST
/2.0/timesheet/{timesheet_id}

Request samples
Payloa
Content type
application/json

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

Response samples
200422
Content type
application/json

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
Delete a timesheet
This action permanently deletes a timesheet. It cannot be undone.


PATH PARAMETERS
timesheet_id
required
integer <int32>
Example: 1
the id of the timesheet

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/timesheet/{timesheet_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/timesheet/{timesheet_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Timesheet status
This action fetches a list of all timesheet Status


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/timesheet_status

Request samples

curl -X GET \
  https://api.bexio.com/2.0/timesheet_status \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 2,
"name": "In Progress"
}
]
Business Activities
Fetch a list of business activities
This action fetches a list of all business activities


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/client_service

Request samples

curl -X GET \
  https://api.bexio.com/2.0/client_service \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Project Management",
"default_is_billable": false,
"default_price_per_hour": null,
"account_id": null
}
]
Create business activity
This action creates a new business activity



required
name
required
string
default_is_billable	
boolean or null
default_price_per_hour	
number or null
account_id	
integer or null
References an account object

Responses
201
Created

422
Validation error


POST
/2.0/client_service

Request samples
Payloa
Content type
application/json

{
"name": "Project Management",
"default_is_billable": false,
"default_price_per_hour": null,
"account_id": null
}

Response samples
201422
Content type
application/json

{
"id": 1,
"name": "Project Management",
"default_is_billable": false,
"default_price_per_hour": null,
"account_id": null
}
Search business activities
Search business activities via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/client_service/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "Project Management",
"default_is_billable": false,
"default_price_per_hour": null,
"account_id": null
}
]
Communication Types
Fetch a list of communication types
This action fetches a list of all communication types


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/communication_kind

Request samples

curl -X GET \
  https://api.bexio.com/2.0/communication_kind \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Mobile Phone"
}
]
Search communication types
Search communication types via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/communication_kind/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "Mobile Phone"
}
]
Files
Fetch a list of files
This action provides a list of files which are uploaded to a certain company


QUERY PARAMETERS
archived_state	
string
Example: archived_state=all
Include/Exclude archived files via filter (all, archived, not_archived)

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/files

Request samples

curl -X GET \
  https://api.bexio.com/3.0/files \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Create new file
Creates a new file from payload


REQUEST BODY SCHEMA: multipart/form-data
required
Upload file

file
required
string <binary> <= 255 characters
Input path to file

Responses
200
OK

422
Validation error


POST
/3.0/files

Request samples
Payloa
Content type
multipart/form-data

{
  "name": "form-data",
  "value": "@\"/path-to-your-file\""
}

Response samples
200422
Content type
application/json

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
Search files
Search files via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

id
uuid
created_at
name
extension
size_in_bytes
mime_type
user_id
is_archived
source_id

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (SearchCriteria)
Default: "like"
Enum: "=" "==" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/3.0/files/search

Request samples
Payloa
Content type
application/json

[
{
"field": "name",
"value": "screenshot"
}
]

Response samples
200422
Content type
application/json

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
Get single file
Tries to query the requested file from the backend


PATH PARAMETERS
file_id
required
integer <int32>
Example: 1
File ID to show

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/files/{file_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/files/{file_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Delete a existing file
Sets state of a file to deleted. It cannot be undone.


PATH PARAMETERS
file_id
required
integer <int32>
Example: 1
File ID to show

HEADER PARAMETERS
Accept
required
string

Responses
200
OK

422
Validation error


DELETE
/3.0/files/{file_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/3.0/files/{file_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200422
Content type
application/json

{
"success": true
}
Update existing file
Updates a existing file with provided properties


PATH PARAMETERS
file_id
required
integer <int32>
Example: 1
File ID to show

HEADER PARAMETERS
Accept
required
string


required
Update file

name	
string <= 255 characters
The name of the file

is_archived	
boolean
Define archived state

source_type	
string or null
Enum: "web" "email" "mobile"
type of the source (web, mobile, etc.) this file has been uploaded from

Responses
200
OK

422
Validation error


PATCH
/3.0/files/{file_id}

Request samples
Payloa
Content type
application/json

{
"name": "screenshot",
"is_archived": true,
"source_type": "web"
}

Response samples
200422
Content type
application/json

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
Download file
Provides requested file from backend as stream


PATH PARAMETERS
file_id
required
integer <int32>
Example: 1
File ID to show

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/files/{file_id}/download

Request samples

curl -X GET \
  https://api.bexio.com/3.0/files/{file_id}/download \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

"string"
Get file preview
Provides requested preview for file from backend as stream


PATH PARAMETERS
file_id
required
integer <int32>
Example: 1
File ID to get preview file

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/files/{file_id}/preview

Request samples

curl -X GET \
  https://api.bexio.com/3.0/files/{file_id}/preview \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

"string"
Show file usage
Tries to query the requested file from the backend


PATH PARAMETERS
file_id
required
integer <int32>
Example: 1
File ID to show

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/files/{file_id}/usage

Request samples

curl -X GET \
  https://api.bexio.com/3.0/files/{file_id}/usage \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"ref_class": "KbInvoice",
"title": "RE-00001",
"document_nr": "RE-00001"
}
Company Profile
Fetch a list of company profiles
Please note that each account currently has only one company profile.


Responses
200
OK


GET
/2.0/company_profile

Request samples

curl -X GET \
  https://api.bexio.com/2.0/company_profile \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
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
]
Show company profile
This action fetches a single company profile


PATH PARAMETERS
profile_id
required
integer <int32>
Example: 1
the id of the company profile

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/company_profile/{profile_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/company_profile/{profile_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Countries
Fetch a list of countries
This action fetches a list of all countries


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name" "name_short"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/country

Request samples

curl -X GET \
  https://api.bexio.com/2.0/country \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Kiribati",
"name_short": "KI",
"iso3166_alpha2": "KI"
}
]
Create country
This action creates a new country



required
name
required
string
name_short
required
string
iso3166_alpha2
required
string
Responses
201
Created

422
Validation error


POST
/2.0/country

Request samples
Payloa
Content type
application/json

{
"name": "Kiribati",
"name_short": "KI",
"iso3166_alpha2": "KI"
}

Response samples
201422
Content type
application/json

{
"id": 1,
"name": "Kiribati",
"name_short": "KI",
"iso3166_alpha2": "KI"
}
Search countries
Search countries via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name
name_short

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name" "name_short"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/country/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "Kiribati",
"name_short": "KI",
"iso3166_alpha2": "KI"
}
]
Fetch a country
This action fetches a single country


PATH PARAMETERS
country_id
required
integer <int32>
Example: 1
the id of the country

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/country/{country_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/country/{country_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"name": "Kiribati",
"name_short": "KI",
"iso3166_alpha2": "KI"
}
Edit a country
This action edits a single country


PATH PARAMETERS
country_id
required
integer <int32>
Example: 1
the id of the country

HEADER PARAMETERS
Accept
required
string


name
required
string
name_short
required
string
iso3166_alpha2
required
string
Responses
200
OK

422
Validation error


POST
/2.0/country/{country_id}

Request samples
Payloa
Content type
application/json

{
"name": "Kiribati",
"name_short": "KI",
"iso3166_alpha2": "KI"
}

Response samples
200422
Content type
application/json

{
"id": 1,
"name": "Kiribati",
"name_short": "KI",
"iso3166_alpha2": "KI"
}
Delete a country
This action permanently deletes a country. It cannot be undone.


PATH PARAMETERS
country_id
required
integer <int32>
Example: 1
the id of the country

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/country/{country_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/country/{country_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Languages
Fetch a list of languages
This action fetches a list of all languages


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/language

Request samples

curl -X GET \
  https://api.bexio.com/2.0/language \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Search languages
Search languages via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name
iso_639_1

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/language/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

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
Notes
Fetch a list of notes
This action fetches a list of all notes


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/note

Request samples

curl -X GET \
  https://api.bexio.com/2.0/note \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 4,
"user_id": 1,
"event_start": "2019-01-16 14:20:00",
"subject": "API conception",
"info": "string",
"contact_id": 14,
"project_id": null,
"entry_id": null,
"module_id": null
}
]
Create note
This action creates a new note



required
user_id
required
integer
References a user object

event_start
required
string <date-time>
subject
required
string
info	
string
contact_id	
integer or null
References a contact object

pr_project_id	
integer or null
References a project object

entry_id	
integer or null
module_id	
integer or null
Responses
201
Created

422
Validation error


POST
/2.0/note

Request samples
Payloa
Content type
application/json

{
"user_id": 1,
"event_start": "2019-01-16 14:20:00",
"subject": "API conception",
"info": "string",
"contact_id": 14,
"pr_project_id": null,
"entry_id": null,
"module_id": null
}

Response samples
201422
Content type
application/json

{
"id": 4,
"user_id": 1,
"event_start": "2019-01-16 14:20:00",
"subject": "API conception",
"info": "string",
"contact_id": 14,
"project_id": null,
"entry_id": null,
"module_id": null
}
Search notes
Search notes via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

event_start
contact_id
user_id
subject
module_id
entry_id

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/note/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 4,
"user_id": 1,
"event_start": "2019-01-16 14:20:00",
"subject": "API conception",
"info": "string",
"contact_id": 14,
"project_id": null,
"entry_id": null,
"module_id": null
}
]
Fetch a note
This action fetches a single note


PATH PARAMETERS
note_id
required
integer <int32>
Example: 1
the id of the note

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/note/{note_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/note/{note_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 4,
"user_id": 1,
"event_start": "2019-01-16 14:20:00",
"subject": "API conception",
"info": "string",
"contact_id": 14,
"project_id": null,
"entry_id": null,
"module_id": null
}
Edit a note
This action edits a single note


PATH PARAMETERS
note_id
required
integer <int32>
Example: 1
the id of the note

HEADER PARAMETERS
Accept
required
string


user_id
required
integer
References a user object

event_start
required
string <date-time>
subject
required
string
info	
string
contact_id	
integer or null
References a contact object

pr_project_id	
integer or null
References a project object

entry_id	
integer or null
module_id	
integer or null
Responses
200
OK

422
Validation error


POST
/2.0/note/{note_id}

Request samples
Payloa
Content type
application/json

{
"user_id": 1,
"event_start": "2019-01-16 14:20:00",
"subject": "API conception",
"info": "string",
"contact_id": 14,
"pr_project_id": null,
"entry_id": null,
"module_id": null
}

Response samples
200422
Content type
application/json

{
"id": 4,
"user_id": 1,
"event_start": "2019-01-16 14:20:00",
"subject": "API conception",
"info": "string",
"contact_id": 14,
"project_id": null,
"entry_id": null,
"module_id": null
}
Delete a note
This action permanently deletes a note. It cannot be undone.


PATH PARAMETERS
note_id
required
integer <int32>
Example: 1
the id of the note

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/note/{note_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/note/{note_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Payment Types
Fetch a list of payment types
This action fetches a list of all payment types


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name" "name_short"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/payment_type

Request samples

curl -X GET \
  https://api.bexio.com/2.0/payment_type \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Cash"
}
]
Search payment types
Search payment types via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name" "name_short"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/payment_type/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "Cash"
}
]
Permissions
Get access information of logged in user
Get components and user permissions of logged in user


Responses
200
OK


GET
/3.0/permissions

Request samples

curl -X GET \
  https://api.bexio.com/3.0/permissions \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"components": [
"functionality1",
"functionality2"
],
"permissions": {
"property": {}
}
}
Tasks
Fetch a list of tasks
This action fetches a list of all tasks


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "finish_date"
Example: order_by=finish_date
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/task

Request samples

curl -X GET \
  https://api.bexio.com/2.0/task \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Create task
This action creates a new task



required
user_id
required
integer <int32>
References a user object

finish_date	
string or null <date-time>
subject
required
string
info	
string
contact_id	
integer <int32>
References a contact object

sub_contact_id	
integer or null
References a contact object

pr_project_id	
integer or null
References a project object

entry_id	
integer or null
module_id	
integer or null
todo_status_id	
integer <int32>
todo_priority_id	
integer or null
have_remember	
boolean
remember_type_id	
integer <nullable>
Is required if have_remember is set to true.

remember_time_id	
integer or null
Is required if have_remember is set to true.

communication_kind_id	
integer or null
Responses
201
Created

422
Validation error


POST
/2.0/task

Request samples
Payloa
Content type
application/json

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

Response samples
201422
Content type
application/json

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
Search tasks
Search tasks via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

subject
updated_at
user_id
contact_id
todo_status_id
module_id
entry_id

QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "finish_date"
Example: order_by=finish_date
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/task/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

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
Fetch a task
This action fetches a single task


PATH PARAMETERS
task_id
required
integer <int32>
Example: 1
the id of the task

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/task/{task_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/task/{task_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Edit a task
This action edits a single task


PATH PARAMETERS
task_id
required
integer <int32>
Example: 1
the id of the task

HEADER PARAMETERS
Accept
required
string


user_id
required
integer <int32>
References a user object

finish_date	
string or null <date-time>
subject
required
string
info	
string
contact_id	
integer <int32>
References a contact object

sub_contact_id	
integer or null
References a contact object

pr_project_id	
integer or null
References a project object

entry_id	
integer or null
module_id	
integer or null
todo_status_id	
integer <int32>
todo_priority_id	
integer or null
have_remember	
boolean
remember_type_id	
integer <nullable>
Is required if have_remember is set to true.

remember_time_id	
integer or null
Is required if have_remember is set to true.

communication_kind_id	
integer or null
Responses
200
OK

422
Validation error


POST
/2.0/task/{task_id}

Request samples
Payloa
Content type
application/json

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

Response samples
200422
Content type
application/json

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
Delete a task
This action permanently deletes a task. It cannot be undone.


PATH PARAMETERS
task_id
required
integer <int32>
Example: 1
the id of the task

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/task/{task_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/task/{task_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Task priorities
This action fetches a list of all task priorities


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/todo_priority

Request samples

curl -X GET \
  https://api.bexio.com/2.0/todo_priority \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "High"
}
]
Task status
This action fetches a list of all task status


QUERY PARAMETERS
order_by	
string
Default: "id"
Enum: "id" "name"
Example: order_by=name
Defines the order of the results. Multiple sort parameters can be combined by using a comma separator. _asc and _desc can be appended to any parameter to either sort ascending (default) or descending.

limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/todo_status

Request samples

curl -X GET \
  https://api.bexio.com/2.0/todo_status \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "Open"
}
]
Units
Fetch a list of units
This action fetches a list of all units


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/unit

Request samples

curl -X GET \
  https://api.bexio.com/2.0/unit \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

[
{
"id": 1,
"name": "h"
}
]
Create unit
This action creates a new unit



required
name
required
string
Responses
201
Created

422
Validation error


POST
/2.0/unit

Request samples
Payloa
Content type
application/json

{
"name": "h"
}

Response samples
201422
Content type
application/json

{
"id": 1,
"name": "h"
}
Search units
Search units via query. Please refer to the Search section for detailed instructions.
The following search fields are supported:

name

QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string


required
Array 
field
required
string <= 255 characters
Field which should be search over

value
required
string <= 255 characters
Value to search for

criteria	
string (v2SearchCriteria)
Default: "like"
Enum: "=" "equal" "!=" "not_equal" ">" "greater_than" ">=" "greater_equal" "<" "less_than" "<=" "less_equal" "like" "not_like" "is_null" "not_null" "in" "not_in"
Responses
200
OK

422
Validation error


POST
/2.0/unit/search

Request samples
Payloa
Content type
application/json

[
{
"field": "search_field",
"value": "search term",
"criteria": "="
}
]

Response samples
200422
Content type
application/json

[
{
"id": 1,
"name": "h"
}
]
Fetch a unit
This action fetches a single unit


PATH PARAMETERS
unit_id
required
integer <int32>
Example: 1
the id of the unit

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/2.0/unit/{unit_id}

Request samples

curl -X GET \
  https://api.bexio.com/2.0/unit/{unit_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 1,
"name": "h"
}
Edit a unit
This action edits a single unit


PATH PARAMETERS
unit_id
required
integer <int32>
Example: 1
the id of the unit

HEADER PARAMETERS
Accept
required
string


name
required
string
Responses
200
OK

422
Validation error


POST
/2.0/unit/{unit_id}

Request samples
Payloa
Content type
application/json

{
"name": "h"
}

Response samples
200422
Content type
application/json

{
"id": 1,
"name": "h"
}
Delete a unit
This action permanently deletes a unit. It cannot be undone.


PATH PARAMETERS
unit_id
required
integer <int32>
Example: 1
the id of the unit

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/2.0/unit/{unit_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/2.0/unit/{unit_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
User Management
Fetch a list of users
This action fetches a list of all users


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/users

Request samples

curl -X GET \
  https://api.bexio.com/3.0/users \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Fetch a user
This action fetches a single user


PATH PARAMETERS
user_id
required
integer <int32>
Example: 4
the id of the user

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/users/{user_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/users/{user_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 4,
"salutation_type": "male",
"firstname": "Rudolph",
"lastname": "Smith",
"email": "rudolph.smith@example.com",
"is_superadmin": true,
"is_accountant": false
}
Fetch the authenticated user
This action fetches the user authenticated by the bearer token.


Responses
200
OK


GET
/3.0/users/me

Request samples

curl -X GET \
  https://api.bexio.com/3.0/users/me \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 4,
"salutation_type": "male",
"firstname": "Rudolph",
"lastname": "Smith",
"email": "rudolph.smith@example.com",
"is_superadmin": true,
"is_accountant": false
}
Fetch a list of fictional users
This action fetches a list of all fictional users. These fictional users can be used in dropdowns but can not log in to the application


QUERY PARAMETERS
limit	
integer <int32>
Default: 500
Example: limit=20
Limit the number of results (max is 2000)

offset	
integer <int32>
Default: 0
Example: offset=0
Skip over a number of elements by specifying an offset value for the query

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/fictional_users

Request samples

curl -X GET \
  https://api.bexio.com/3.0/fictional_users \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

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
Create a fictional user
This action creates a new fictional user



required
salutation_type
required
string
Enum: "male" "female"
firstname
required
string <= 80 characters
The first name of the fictional user

lastname
required
string <= 80 characters
The last name of the fictional user

email
required
string <email>
The email address of the fictional user. Please note that an email address can only be used once for both regular and fictional users.

title_id	
integer
A reference to a title

Responses
201
Created

422
Validation error


POST
/3.0/fictional_users

Request samples
Payloa
Content type
application/json

{
"salutation_type": "male",
"firstname": "Rudolph",
"lastname": "Smith",
"email": "rudolph.smith@bexio.com",
"title_id": null
}

Response samples
201422
Content type
application/json

{
"id": 4,
"salutation_type": "male",
"firstname": "Rudolph",
"lastname": "Smith",
"email": "rudolph.smith@bexio.com",
"title_id": null
}
Fetch a fictional User
This action fetches a single fictional user


PATH PARAMETERS
fictional_user_id
required
integer <int32>
Example: 4
the id of the fictional user

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


GET
/3.0/fictional_users/{fictional_user_id}

Request samples

curl -X GET \
  https://api.bexio.com/3.0/fictional_users/{fictional_user_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"id": 4,
"salutation_type": "male",
"firstname": "Rudolph",
"lastname": "Smith",
"email": "rudolph.smith@bexio.com",
"title_id": null
}
Delete a fictional user
This action permanently deletes a fictional user. It cannot be undone.


PATH PARAMETERS
fictional_user_id
required
integer <int32>
Example: 4
the id of the fictional user

HEADER PARAMETERS
Accept
required
string

Responses
200
OK


DELETE
/3.0/fictional_users/{fictional_user_id}

Request samples

curl -X DELETE \
  https://api.bexio.com/3.0/fictional_users/{fictional_user_id} \
  -H 'Accept: application/json' \
  -H 'Authorization: Bearer {access-token}'

Response samples
200
Content type
application/json

{
"success": true
}
Update a fictional User
This action updates an existing fictional user


PATH PARAMETERS
fictional_user_id
required
integer <int32>
Example: 4
the id of the fictional user

HEADER PARAMETERS
Accept
required
string


required
salutation_type
required
string
Enum: "male" "female"
firstname
required
string <= 80 characters
The first name of the fictional user

lastname
required
string <= 80 characters
The last name of the fictional user

email
required
string <email>
The email address of the fictional user. Please note that an email address can only be used once for both regular and fictional users.

title_id	
integer
A reference to a title

Responses
200
Ok

422
Validation error


PATCH
/3.0/fictional_users/{fictional_user_id}

Request samples
Payloa
Content type
application/json

{
"salutation_type": "male",
"firstname": "Rudolph",
"lastname": "Smith",
"email": "rudolph.smith@bexio.com",
"title_id": null
}

Response samples
200422
Content type
application/json

{
"id": 4,
"salutation_type": "male",
"firstname": "Rudolph",
"lastname": "Smith",
"email": "rudolph.smith@bexio.com",
"title_id": null
}