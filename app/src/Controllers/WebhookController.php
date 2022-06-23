<?php

namespace Stripe\App\Controllers;

class WebhookController
{

    /**
     * WebHook from stripe
     */
    public function webhook(){

        $event = null;
        $payload = @file_get_contents('php://input');

        try {
            // Make sure the event is coming from Stripe by checking the signature header
            // $event = \Stripe\Webhook::constructEvent($input, $_SERVER['HTTP_STRIPE_SIGNATURE'], $config['stripe_webhook_secret']);
            $event = \Stripe\Webhook::constructEvent($payload, $_SERVER['HTTP_STRIPE_SIGNATURE'], env('STRIPE_SIGNATURE'));

        }
        catch (\Exception $e) {
            http_response_code(403);
            echo json_encode([ 'error' => $e->getMessage() ]);
            exit;
        }

        $details = '';

        _logger("Stripe Hook Object", $event->data->object->metadata->order_id ?? '');
        // _logger("Stripe Hook Event data", json_encode($event));


        if ($event->type == 'payment_intent.succeeded' || $event->type == 'charge.succeeded') {
            // Fulfill any orders, e-mail receipts, etc
            // To cancel the payment you will need to issue a Refund (https://stripe.com/docs/api/refunds)
            $details = '💰 Payment received!';

            // submit order and send redirect link
//            $this->orderService->fulfillOrder($event);

            \Log::info("Fulfill order called");

        }
        else if ($event->type == 'payment_intent.payment_failed') {

            $details = '❌ Payment failed.';
            \Log::info("Fulfill order called not called");
        }

        $output = [
            'status' => 'success',
            'details' => $details
        ];

        \Log::info("End of request trend");
        echo json_encode($output, JSON_PRETTY_PRINT);
    }
}
