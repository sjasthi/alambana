<?php
  $status = session_status();
  if ($status == PHP_SESSION_NONE) {
    session_start();
  }

  // Block unauthorized users from accessing the page
  if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'Administrator') {
      http_response_code(403);
      die('Forbidden');
    }
  } else {
    http_response_code(403);
    die('Forbidden');
  }


require 'db_configuration.php';
$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

// Get form data
$Event_Id = $_POST['Event_Id'];
$Title = $_POST['Title'];
$Description = $_POST['Description'];
$Video_Link = $_POST['Video_Link'];
$Event_Date = $_POST['Event_Date'];

// Get the current time for Modified_Time
$Modified_Time = date('Y-m-d H:i:s');

if($Event_Id!="" && $Event_Id!="0"){
// SQL query to update the event record
$sql = "UPDATE events SET
         Title = '$Title',
         Description = '$Description',
         Video_Link = '$Video_Link',
         Event_Date = '$Event_Date',
         Modified_Time = '$Modified_Time'
         WHERE Event_Id = '$Event_Id'";

if (!mysqli_query($connection, $sql)) {
    echo("Error description: " . mysqli_error($connection));
}else{
    echo"<script type=\"text/javascript\">setTimeout(function(){document.getElementbyID('add_submitted_form').submit();},500);
    </script>";

}    
    // Handle event picture uploads (similar to your previous example)
    if (!empty(array_filter($_FILES['Location']['name']))) {
        $fileCount = count($_FILES['Location']['name']);
        for ($i = 0; $i < $fileCount; $i++) {
            $fileTmpName = $_FILES['Location']['tmp_name'][$i];
            $fileType = $_FILES['Location']['type'][$i];
            $guid = uniqid();
            $extension = pathinfo($_FILES['Location']['name'][$i], PATHINFO_EXTENSION);
            $FileLocation = $guid . '.' . $extension;
            $destination = 'images/event_pictures/' . $FileLocation;

            // SQL query to insert event picture data into the event_pictures table
            $sql = "INSERT INTO event_pictures (Event_Id, Location) VALUES ('$Event_Id', '$destination')";
            
            mysqli_query($connection, $sql);
            move_uploaded_file($fileTmpName, $destination);
        }    
        }
    }
    

    // Close the database connection
    mysqli_close($connection);

?>
<div style="text-align:center;margin-top:200px;"><h4>One moment please. Processing changes...</h4>
       <img src="images/loadingIcon.gif"></img>
</div>
<form method="POST" id="edit_event_form" action="admin_edit_event.php">
    <?php echo "<input type=\"hidden\" name=\"Event_Id\" value=\"$Event_Id\">"; ?>
</form>

