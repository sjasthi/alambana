<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM events WHERE Event_Id = ?");
    $stmt->execute([$id]);

    echo "Event deleted successfully!";
}

// Here, you can add a list of events with a delete button next to each one or redirect to the main events page.
?>
