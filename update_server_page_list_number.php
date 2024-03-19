<?php

// Start the session
session_start();

// UPDATE SERVER COMMENT COUNT FOR PARENT (Allows sub blogging)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the count from the POST data
    $elementCount = isset($_POST['elementCount']) ? $_POST['elementCount'] : 0;

    // Save the count into the PHP session
    $_SESSION['update_server_page_list_number'] = $elementCount;

    // Send a response back to the client
    echo 'Server received ' . $elementCount . ' elements.';
}
?>