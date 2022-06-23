<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('stripe/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('stripe/css/global.css') }}" />
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('stripe/js/new_stripe_script.js') }}" defer></script>
    <title>Document</title>
</head>
<body>

    <div class="row justify-content-center">

        <!-- payment dom -->
        <div class="col-lg-7 col-md-12">
            @if(session()->get("status_confirm") == "success")

                <div class="alert alert-success mt-30" data-role="alert">payment successfully processed</div>
                <p style="padding:30px 0">
                    Payment Successfully received. We will notify you as soon as the result for this test is available for download.
                </p>


            @elseif(session()->get("status_confirm") == "success")

                <div class="alert alert-danger mt-30" data-role="alert">Unable to process Payment</div>
                <p style="padding:30px 0">
                    We are unable to process your payment at the moment, please, navigate back to dashboard to try again. </br>
                    This is possibly an issue with our payment provider or your bank. Also please, kindly verify that you
                    have sufficient balance or are allowed to make payment using your card from any location before you try again.
                </p>
            @else

                <div class="alert alert-danger mt-30" data-role="alert">Creating a test request is simple !</div>
                <p style="padding:30px 0">
                    To create a test request, navigate back to the dashboard or select the type of test you want on the right bar.
                </p>

            @endif

                        <div class="sr-root">

                            <div class="sr-main">
                                <h4 id="payment-title text-center">Pay for your Test</h4>
                                <p style="padding:30px 0">
                                    As soon as we confirm your payment we will process your test and send you
                                    update when test result is available for download.
                                </p>

                                <form id="payment-form" data-action-verify="{{ route('stripe.verify') }}" data-action="{{ route('stripe.intent') }}" class="sr-payment-form">@csrf
                                    <div id="payment-element">
                                        <!-- Elements will create form elements here -->
                                    </div>
{{--                                              <button id="submit">Submit</button>--}}
                                    <button id="submit">
                                        <div class="spinner hidden" id="spinner"></div>
                                        <span id="button-text">Pay</span> <span id="order-amount">£{{ $total }}</span>
                                    </button>
                                    <div id="payment-message" class="hidden"></div>
                                </form>

  </div>
</div>






</body>
</html>
