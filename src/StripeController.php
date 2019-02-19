<?php

namespace Works42\Stripe;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

require dirname(__DIR__) . '/src/stripe/init.php';

class StripeController extends Controller
{
	/*
	 * @Set API key for the stripe
	 *
	 *
	 */
    public function setStripeApi_42( $apiKey )
    {
    	\Stripe\Stripe::setApiKey( $apiKey );
    }

    /*
     * @Make Charge
     *
     *
     */
    public function makeStripeCharge_42( $data )
    {
    	$charge = \Stripe\Charge::create(['amount' => $data['amount'], 'currency' => $data['currency'], 'source' => $data['source']]);
		echo $charge;
    }
}
