# Project Title

42Works Stripe Package for Laravel

### Installing

Create packages folder in your root of laravel and put this 42works folder in it

Add below code in your config file

```
'42stripeKey' => 'YOUR_STRIPE_API_SECRET_KEY',
```

Add below code in your service provider file app.php

```
Works42\Stripe\StripeServiceProvider::class
```

And add this code in autoload->psr-4 section in composer.json

```
"Works42\\Stripe\\": "packages/42works/stripe/src"
```

After that please run below command in terminal

```
composer dump-autoload
```

## Getting Started

After installation use below class in any of your controller

```
use Works42\Stripe\StripeController;
```

In functions you can create instance of class and run the 42works stripe package methods

```
$42stripeObject = new StripeController;
```

## Predefined Functions

To create view of products

```
$data[0] = array('amount' => '123', 'currency' => 'USD', 'customer_id' => 'CUSTOMER_ID', 'image' => 'IMAGE_URL');
$data[1] = array('amount' => '12345', 'currency' => 'USD', 'customer_id' => 'CUSTOMER_ID', 'image' => 'IMAGE_URL');
$data[2] = array('amount' => '12345', 'currency' => 'USD', 'customer_id' => 'CUSTOMER_ID', 'image' => 'IMAGE_URL');


return $42stripeObject->makeStripeView_42( $data );
```

To create token (View)

```
return $42stripeObject->makeStripeTokenView_42();	
```

Create Customer

```
$data = array( 'email' => 'test@test.com', 'description' => 'test description', 'source' => TOKEN_OF_STRIPE );

return $42stripeObject->makeStripeCustomer_42( $data );
```

Update Customer

```
$data = array( 'email' => 'test@test.com', 'description' => 'test description updated', 'customer_id' => CUSTOMER_ID, 'source' => TOKEN_OF_STRIPE );

return $42stripeObject->updateStripeCustomer_42( $data );
```

Retrieve Customer

```
return $42stripeObject->retrieveStripeCustomer_42( CUSTOMER_ID );
```

Delete Customer

```
return $42stripeObject->deleteStripeCustomer_42( CUSTOMER_ID );
```