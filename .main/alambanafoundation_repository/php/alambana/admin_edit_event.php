<?php
require 'db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
    session_start();
}

// Block unauthorized users from accessing the page
/*
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'admin') {
        http_response_code(403);
        die('Forbidden');
    }
} else {
    http_response_code(403);
    die('Forbidden');
}
*/
$Event_Id = $_POST['Event_Id'];

// Create connection
$conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM events where Event_Id='$Event_Id'";
$result = $conn->query($sql);
$result = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/icon_logo.png" type="image/icon type">
    <title>Edit Event</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;900&display=swap" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
<?php include 'show-navbar.php'; ?>
<?php show_navbar(); ?>
<header class="inverse">
    <div class="container">
        <h1><span class="accent-text">Edit Event</span></h1>
    </div>
</header>
<form method="POST" action="admin_events.php">
    <input type="submit" value="Return to Events">
</form>
<div id="container_1" style="text-align:center">
    <center>
        <form action="admin_event_submit.php" method="post">
            <table id="event_edit">
                <tr>
                    <td class="td_right">Event ID</td>
                    <td class="td_left">&nbsp;&nbsp; <?php echo $result['Event_Id']; ?></td>
                </tr>
                <tr>
                    <td class="td_right">Title</td>
                    <td class="td_left"><input type="text" id="Title" name="Title" value='<?php echo $result['Title']; ?>'></td>
                </tr>
                <tr>
                    <td class="td_right">Description</td>
                    <td class="td_left"><textarea id="Description" name="Description"><?php echo $result['Description']; ?></textarea></td>
                </tr>
                <tr>
                    <td class="td_right">Video Link</td>
                    <td class="td_left"><input type="text" id="Video_Link" name="Video_Link" value='<?php echo $result['Video_Link']; ?>'></td>
                </tr>
                <tr>
                    <td class="td_right">Event Date</td>
                    <td class="td_left"><input type="datetime-local" id="Event_Date" name="Event_Date" value='<?php echo date("Y-m-d\TH:i:s", strtotime($result['Event_Date'])); ?>'></td>
                </tr>
            </table>
            <input type="hidden" id="Event_Id" name="Event_Id" value="<?php echo $result['Event_Id']; ?>">
            <input type="submit" value="Save" id="btnSave" name="btnSave">
        </form>
    </center>
</div>
</body>
</html>
