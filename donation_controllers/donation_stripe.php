<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the payment information from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $currency = 'usd';

    // Retrieve the Stripe API keys
    $stripe = array(
        "secret_key" => "sk_test_51P0aNgRqID97Nih52PUAEMxPM2kOO3Gma8AaWKHkSCTf1AEbvgbpR8q8zh2rvhjO2Joo1P3toSYsGeB2b9oBL1Ha00OKMc1Uhg",
        "publishable_key" => "pk_test_51P0aNgRqID97Nih54tHbWA3JLFaRVulV5A3Vw6RgumJgsd28m14riCEv5qXahriSFbBKvmWCszxl4UEspJTnbSlW00BTsOGdf6"
    );
    \Stripe\Stripe::setApiKey($stripe['secret_key']);

    // Create a payment token
    $token = \Stripe\Token::create(array(
        "card" => array(
            "number" => $_POST['card_number'],
            "exp_month" => $_POST['exp_month'],
            "exp_year" => $_POST['exp_year'],
            "cvc" => $_POST['cvc']
        )
    ));

    // Create a charge using the payment token
    $charge = \Stripe\Charge::create(array(
        "amount" => $amount * 100,
        "currency" => $currency,
        "description" => "Donation from $name",
        "source" => $token
    ));

    // Redirect the user to a confirmation page or send an email
    header("Location: confirmation.php?charge_id=" . $charge['id']);
}
?>