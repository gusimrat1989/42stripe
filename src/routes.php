<?php

Route::get('stripe', 'Works42\Stripe\StripeController@index');
Route::post('stripe42/charge', 'Works42\Stripe\StripeController@makeStripeCharge_42');
Route::post('stripe42/token/create', 'Works42\Stripe\StripeController@makeStripeToken_42');