<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the value sent from the client-side
    $valueToSave = isset($_POST["value"]) ? $_POST["value"] : null;

    // Save the value into a PHP session variable
    $_SESSION['saved_value'] = $valueToSave;

    // Send a response back to the client (optional)
    //echo "Value saved successfully";
} else {
    // Handle invalid requests (optional)
    echo "Invalid request";
}
?>
