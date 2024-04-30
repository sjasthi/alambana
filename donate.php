<?php

require __DIR__ . "/vendor/autoload.php";

# Make sure to create a Stripe account for test mode and activate the account for real payments.
# Enter Stripe secret key below (Located at the Developer and api key section on the Stripe website). 
$stripe_secret_key = "sk_test_51P0aNgRqID97Nih52PUAEMxPM2kOO3Gma8AaWKHkSCTf1AEbvgbpR8q8zh2rvhjO2Joo1P3toSYsGeB2b9oBL1Ha00OKMc1Uhg";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    'submit_type' => 'donate',
    "success_url" => "https://aalambana.jasthi.com/success.php", # update this section with the right domain
    "cancel_url" => "https://aalambana.jasthi.com/",    # update this section with the right domain
    "locale" => "auto",
    'line_items' => [[
        # Provide the exact Price ID (e.g. pr_1234) of the product/page you want to showcase (Found under product catalog)
        'price' => 'price_1P0bW5RqID97Nih5CUbqqPwy',
        'quantity' => 1,
      ]],
]);

http_response_code(303);
header("Location: " . $checkout_session->url);