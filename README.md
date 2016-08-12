# Market for Laravel 5.2

## Installation

**1 - After install Laravel framework, insert on file composer.json, inside require object this value**
```
"syscover/market": "~1.0"
```
and execute on console:
```
composer install
```

**2 - Register service provider, on file config/app.php add to providers array**

```
Syscover\Market\MarketServiceProvider::class,

```

**3 - Run publish command**

```
php artisan vendor:publish --force
```

**4 - Run migrate command**

```
php artisan migrate
```

**5 - Register middleware pulsar.taxRule on file app/Http/Kernel.php add to routeMiddleware array**

```
'pulsar.taxRule' => \Syscover\Market\Middleware\TaxRule::class,

```

**6 - Run seed database**

```
php artisan db:seed --class="MarketTableSeeder"
```

**7 - Activate package**

Access to Pulsar Panel, and go to Administration -> Permissions -> Profiles, and set all permissions to your profile by clicking on the open lock.


## General configuration environment values
We indicate configuration variables available, to change them what you should do from the file environment variables .env

### Order id prefix [default value empty]
You can set a prefix for all your orders, for example, if you can set on all you orders the prefix ORDER, set this value on you .env file
```
ORDER_ID_PREFIX=ORDER
```

### Tax default country [default value ES]
To set default country to calculate tax, you can use this parameter, for example to change to US, set this value on you .env file

```
TAX_COUNTRY=US
```

### Default customer class tax [default value 1]
Set default ID customer class value for calculate tax amount of products

```
TAX_CUSTOMER_CLASS=1
```

### Set product price tax [default value 1]
Defines the types of prices that are introduced in products, this option is consulted when you create or update a product
You have this values:
* Value: 1 *Excluding tax*
* Value: 2 *Including tax*

```
TAX_PRODUCT_PRICES=1
```

### Set shipping price tax [default value 1]
Defines the types of prices that are introduced in shipping prices, this option is consulted when you create or update a shipping price
* Value: 1 *Excluding tax*
* Value: 2 *Including tax*

```
TAX_SHIPPING_PRICES=1
```

### Set product display price tax [default value 1]
Defines how you want display product prices
You have this values:
* Value: 1 *Excluding tax*
* Value: 2 *Including tax*

```
TAX_PRODUCT_DISPLAY_PRICES=1
```

### Set shipping display price tax [default value 1]
Defines how you want display shipping prices
* Value: 1 *Excluding tax*
* Value: 2 *Including tax*

```
TAX_SHIPPING_DISPLAY_PRICES=1
```

## PayPal environment values

### Set PayPal mode
* Value: sandbox *for testing or development environments* 
* Value: live *for production environments* 
```
PAYPAL_MODE=sandbox
```

### PayPal sandbox values
```
PAYPAL_SANDBOX_WEB_PROFILE=XX-XXXX-XXXX-XXXX-XXXX
PAYPAL_SANDBOX_CLIENT_ID=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
PAYPAL_SANDBOX_SECRET=xXxXxXxXxXxXxXxXxXxXxXxXxXxXxXxXx
```

### PayPal live values
```
PAYPAL_LIVE_WEB_PROFILE=XX-XXXX-XXXX-XXXX-XXXX
PAYPAL_LIVE_CLIENT_ID=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
PAYPAL_LIVE_SECRET_KEY=xXxXxXxXxXxXxXxXxXxXxXxXxXxXxXxXx
```

## Redsys environment values

### Set Redsys mode
* Value: test *for testing or development environments* 
* Value: live *for production environments* 
```
REDSYS_MODE=test
```

### Redsys test values
```
REDSYS_TEST_MERCHANT_NAME="MERCHANT NAME (TEST)"
REDSYS_TEST_MERCHANT_CODE=xxxxxxxxx
REDSYS_TEST_KEY=xXxXxXxXxXxXxXxXxXxXxXxXxXxXxXxXx
```

### Redsys live values
```
REDSYS_LIVE_MERCHANT_NAME="MERCHANT NAME"
REDSYS_LIVE_MERCHANT_CODE=xxxxxxxxx
REDSYS_LIVE_KEY=xXxXxXxXxXxXxXxXxXxXxXxXxXxXxXxXx
```

## Other concepts 

### Set tax rules values for each customer
When a customer is login on your web application, you need know your country and customer group to calculate tax rules for all products.
You have a Middleware who is responsible to do this actions.

```
Route::group(['middleware' => ['pulsar.taxRule']], function() {

    // write here your routes

});

```

This middleware set market.taxCountry and market.taxCustomerClass if customer has country ann customer group id defined