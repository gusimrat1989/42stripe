<?php

namespace Works42\Stripe;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Config;

require dirname(__DIR__) . '/src/stripe/init.php';

class StripeController extends Controller
{

    /*
     * @Set API 
     *
     *
     */
    public function __construct()
    {
        \Stripe\Stripe::setApiKey( Config::get( 'app.42stripeKey' ) );
    }

    /*
     * @Make View
     *
     *
     */
    public function makeStripeView_42( $data )
    {
        return view( 'stripe::index' )->with( 'data',  (object) $data );
    }

    /*
     * @Make Charge
     *
     *
     */
    public function makeStripeCharge_42( Request $request )
    {
        $data = $request->all();

        $charge = \Stripe\Charge::create(['amount' => $data['amount'], 'currency' => $data['currency'], 'customer' => $data['customer_id']]); // For Customer

        //$charge = \Stripe\Charge::create(['amount' => $data['amount'], 'currency' => $data['currency'], 'source' => 'test']);
        
        return $charge;
    }

    /*
     * @View Customer
     *
     *
     */
    public function makeStripeTokenView_42()
    {
        return view( 'stripe::token_make' );
    }

    /*
     * @Create Token
     *
     *
     */
    public function makeStripeToken_42( Request $request )
    {
        //::::: Token ::::://

        $stripeToken = \Stripe\Token::create([
                          "card" => [
                            "number" => $request->number,
                            "exp_month" => $request->exp_month,
                            "exp_year" => $request->exp_year,
                            "cvc" => $request->cvc
                          ]
                        ]);

        return $stripeToken;
    }

    /*
     * @Create Customer
     *
     *
     */
    public function makeStripeCustomer_42( $data )
    {
        //::::: customer ::::://

        $customerId = \Stripe\Customer::create([
                          "email" => $data['email'],
                          "description" => $data['description'],
                          "source" => $data['source']
                        ]);

        return $customerId;
    }

    /*
     * @Retrieve Customer
     *
     *
     */
    public function retrieveStripeCustomer_42( $customerId )
    {
        //::::: Customer ::::://

        $customer = \Stripe\Customer::retrieve( $customerId );
        return $customer;
    }

    /*
     * @Delete Customer
     *
     *
     */
    public function deleteStripeCustomer_42( $customerId )
    {
        //::::: Customer ::::://

        $cu = \Stripe\Customer::retrieve( $customerId );
        $data = $cu->delete();
        return $data;
    }

    /*
     * @Update Customer
     *
     *
     */
    public function updateStripeCustomer_42( $data )
    {
        //::::: Customer ::::://

        $cu = \Stripe\Customer::retrieve( $data['customer_id'] );
        $cu->description = $data['description'];
        $cu->source = $data['source'];

        $data = $cu->save();

        return $data;
    }
}
