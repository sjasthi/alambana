<?php
session_start();

// Example debugging messages
echo "Reached point 1";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['disable_enable_user'])) {
    require 'db_configuration.php';

    $user_id = $_POST["user_id"];

    // Toggle the status
    $update_status_sql = "UPDATE users SET status = CASE WHEN status = 'enabled' THEN 'disabled' ELSE 'enabled' END WHERE id = $user_id";

    // Example debugging messages
    echo "Reached point 2: SQL Query: $update_status_sql";

    if ($db->query($update_status_sql)) {
        echo "User account status updated successfully.";
    } else {
        echo "Error updating user account status: " . $db->error;
    }

    $db->close();

    // Reload the current page using JavaScript
    echo '<script>location.reload();</script>';
} else {
    echo "Invalid request.";
}

// Example debugging messages
echo "Reached point 3";

header("Location: admin_users.php");
?>
