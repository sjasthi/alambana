<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];
    $event_image = $_POST['event_image'];

    $stmt = $conn->prepare("INSERT INTO events (Event_Name, Event_Date, Event_Description, Event_Image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$event_name, $event_date, $event_description, $event_image]);

    echo "Event added successfully!";
}

?>

<form action="add_event.php" method="post">
    Event Name: <input type="text" name="event_name"><br>
    Event Date: <input type="date" name="event_date"><br>
    Event Description: <textarea name="event_description"></textarea><br>
    Event Image URL: <input type="text" name="event_image"><br>
    <input type="submit" value="Add Event">
</form>
