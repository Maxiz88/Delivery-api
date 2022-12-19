
## Laravel API for work with package deliveries

How install
- clone this repo
- configure your database in .env 
- $ composer install
- $ php artisan migrate:fresh --seed
- $ php artisan test(to execute tests)
- $ php artisan deliveries:calculate (to show packages with delivery companies and delivery price)


## Delivery API
Use Postman

 Registration
- POST /api/register with form-data with email, name, password fields
- you should receive status 200 in response

 Login
- POST /api/login with form-data with email, name, password fields
- you should receive status 200 in response with JSON fields 'access_token' and 'token_type':
  {
  "access_token": "1|M14xYcpFXJ8HJyyZ3NehDfzPkMyTXYAnEqqVVgSx",
  "token_type": "Bearer"
  }
- copy 'access_token' field value and use it in all next endpoints
 
Deliveries

Get deliveries data
- GET /api/deliveries with Authorization: Bearer M14xYcpFXJ8HJyyZ3NehDfzPkMyTXYAnEqqVVgSx and
  Content-Type: application/json 
  - you should receive status 200 in response with JSON data like
    {
        "data": [  
            {
                "id": 2,
                "company_name": "DHL",
                "description": "DHL is an international company...",
                "currency": {
                "id": 1,
                "name": "EUR"
                },
                ...
            },
            ...
        ]
    }

Update delivery by id
- PUT /api/deliveries/{delivery} with Accept: application/json
  Authorization: Bearer M14xYcpFXJ8HJyyZ3NehDfzPkMyTXYAnEqqVVgSx
  Content-Type: application/json
- pass JSON data in body {
  "company_name": "TEST",
  "description": "Operating bla-bla",
  "currency_id": 1
  }
    
- where "currency_id" is id from relational table currencies: 1 (1 - currency in EUR, 2 - currency in USD)
- you should receive status 200 in response with JSON data like 
  - {
    "message": "Delivery 1 has been updated successful.",
    "data": {
    "id": 1,
    "currency_id": 1,
    "company_name": "TEST",
    "description": "Operating bla-bla",
    "created_at": null,
    "updated_at": "2022-12-19T21:29:58.000000Z",
    "deleted_at": null
    }
    }

Update delivery unit by delivery id and delivery_unit id
- PUT /api/deliveries/{delivery}/unit/{unit} with Accept: application/json
  Authorization: Bearer M14xYcpFXJ8HJyyZ3NehDfzPkMyTXYAnEqqVVgSx
  Content-Type: application/json
- pass JSON data in body 
  - {
    "unit_type": 1,
    "unit_value": 4.5,
    "unit_from": 0,
    "unit_to": 1,
    "price": 2,
    "unit_id": 1
    }

- where "unit_type" is type of unit(0 - fixed, 1 - defer), "unit_value" is value of unit(is float), "unit_from" is used 
for defer unit types(true/false), "unit_to" is used for defer unit types(true/false, in our case true is mean that used
for weights less or equal 4.5 kg), "price" is price for one unit in currency, "unit_id" is id from relational table 
units: 1 (1 - is weight in g, 2 - is weight in kg)
- you should receive status 200 in response with JSON data like
    - {
      "message": "Delivery unit 1 has been updated successful.",
      "data": {
      "id": 1,
      "delivery_id": 1,
      "unit_id": 1,
      "unit_type": 1,
      "unit_value": 4.5,
      "unit_from": 0,
      "unit_to": 1,
      "price": 2,
      "created_at": null,
      "updated_at": "2022-12-19T21:36:55.000000Z",
      "deleted_at": null
      }
      }

Create delivery
- POST /api/deliveries with Accept: application/json
  Authorization: Bearer M14xYcpFXJ8HJyyZ3NehDfzPkMyTXYAnEqqVVgSx
  Content-Type: application/json
- pass JSON data in body {
  "company_name": "TEST",
  "description": "Operating bla-bla",
  "currency_id": 1
  }

- you should receive status 200 in response with JSON data like
    - {
      "message": "Delivery 4 has been created successful.",
      "data": {
      "id": 4,
      "currency_id": 1,
      "company_name": "TEST",
      "description": "Operating bla-bla",
      "created_at": null,
      "updated_at": "2022-12-19T21:29:58.000000Z",
      "deleted_at": null
      }
      }

Create delivery unit by delivery id
- POST /api/deliveries/{delivery}/unit with Accept: application/json
  Authorization: Bearer M14xYcpFXJ8HJyyZ3NehDfzPkMyTXYAnEqqVVgSx
  Content-Type: application/json
- pass JSON data in body
    - {
      "unit_type": 1,
      "unit_value": 4.5,
      "unit_from": 0,
      "unit_to": 1,
      "price": 2,
      "unit_id": 1
      }

- you should receive status 200 in response with JSON data like
    - {
      "message": "Delivery unit 5 has been created successful.",
      "data": {
      "id": 5,
      "delivery_id": 1,
      "unit_id": 1,
      "unit_type": 1,
      "unit_value": 4.5,
      "unit_from": 0,
      "unit_to": 1,
      "price": 2,
      "created_at": null,
      "updated_at": "2022-12-19T21:36:55.000000Z",
      "deleted_at": null
      }
      }
