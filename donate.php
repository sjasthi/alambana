<?php

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51P0aNgRqID97Nih52PUAEMxPM2kOO3Gma8AaWKHkSCTf1AEbvgbpR8q8zh2rvhjO2Joo1P3toSYsGeB2b9oBL1Ha00OKMc1Uhg";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    'submit_type' => 'donate',
    "success_url" => "http://localhost/alambana/success.php",
    "cancel_url" => "http://localhost/alambana",
    "locale" => "auto",
    'line_items' => [[
        # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
        'price' => 'price_1P0bW5RqID97Nih5CUbqqPwy',
        'quantity' => 1,
      ]],
]);

http_response_code(303);
header("Location: " . $checkout_session->url);