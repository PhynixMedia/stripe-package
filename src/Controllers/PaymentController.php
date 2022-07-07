<?php

namespace Stripe\App\Controllers;


use Illuminate\Http\Request;
use Stripe;
use Exception;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function __construct(){

        \Stripe\Stripe::setApiKey(config("stripe-app.secret_key"));
    }

    public function index(){

        if(!$this->check()){
            return redirect()->back()->withErrors(["error"=>"Required Values are missing"]);
        }

        $total = session()->get(Stripe\App\StripeConstants::CHECKOUT_TOTAL);
        $items = session()->get(Stripe\App\StripeConstants::CHECKOUT_ITEMS);

        return view("stripe-app::pay", compact('total', 'items'));
    }

    public function verify(Request $request){

        //Note the GET method here
        $redirect_status = $request->get("redirect_status");
        $payment_intent = $request->get("payment_intent");

        if($redirect_status == "succeeded"){

            session()->put(Stripe\App\StripeConstants::PAYMENT_STATUS, $redirect_status);
            return redirect()->to(route('stripe.confirm', ["status"=>"success"]))->withSuccess('Payment successfully processed.');
        }

        return redirect()->to(route('stripe.confirm', ["status"=>"failed"]))->withError('Unable to process payment, Please contact support.');

    }

    /**
     * Payment Intent from view
     */
    public function paymentIntent(){

        if(!$this->check()){
            return response()->json([], 200);
        }

        $total = (double) session()->get(Stripe\App\StripeConstants::CHECKOUT_TOTAL);

        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $total * 100,
            'currency' => 'gbp',
            'payment_method_types' => ['card'],
            'metadata' => [
                'order_id' => session()->get(Stripe\App\StripeConstants::CHECKOUT_REFERENCE),
            ],
        ]);

        $output = [
            'publishableKey' => config("stripe-app.publish_key"),
            'clientSecret' => $paymentIntent->client_secret,
        ];

        return response()->json($output, 200);

    }

    private function check(){

        $total = session()->get(Stripe\App\StripeConstants::CHECKOUT_TOTAL);
        $items = session()->get(Stripe\App\StripeConstants::CHECKOUT_ITEMS);
        $reference = session()->get(Stripe\App\StripeConstants::CHECKOUT_REFERENCE);

        if(!$total || !$reference){
            return false;
        }
        return true;
    }

    public function confirm(Request $request){

        $response = (object) $request->all();
        return view("stripe-app::confirm", compact('response'));
    }

}
