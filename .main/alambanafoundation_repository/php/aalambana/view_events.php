<?php
include 'dbconnect.php';

$stmt = $conn->prepare("SELECT * FROM events");
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($events as $event) {
    echo "Name: " . $event['Event_Name'] . ", Date: " . $event['Event_Date'] . ", Description: " . $event['Event_Description'] . ", Image: " . $event['Event_Image'] . "<br>";
}
?>
