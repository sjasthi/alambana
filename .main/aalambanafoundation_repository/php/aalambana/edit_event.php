<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];
    $event_image = $_POST['event_image'];

    $stmt = $conn->prepare("UPDATE events SET Event_Name=?, Event_Date=?, Event_Description=?, Event_Image=? WHERE Event_Id=?");
    $stmt->execute([$event_name, $event_date, $event_description, $event_image, $id]);

    echo "Event updated successfully!";
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM events WHERE Event_Id = ?");
$stmt->execute([$id]);
$event = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<form action="edit_event.php" method="post">
    <input type="hidden" name="id" value="<?php echo $event['Event_Id']; ?>">
    Event Name: <input type="text" name="event_name" value="<?php echo $event['Event_Name']; ?>"><br>
    Event Date: <input type="date" name="event_date" value="<?php echo $event['Event_Date']; ?>"><br>
    Event Description: <textarea name="event_description"><?php echo $event['Event_Description']; ?></textarea><br>
    Event Image URL: <input type="text" name="event_image" value="<?php echo $event['Event_Image']; ?>"><br>
    <input type="submit" value="Update Event">
</form>
