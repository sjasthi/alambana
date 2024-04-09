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

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$video_link = $_POST['video_link'];

if ($blog_id != "" && $blog_id != "0") {
  $sql = "UPDATE blogs SET
                     title = '$title',
                     author = '$author',
                     description = '$description',
                     video_link = '$video_link',
                     WHERE id = '$id'";
  if (!mysqli_query($connection, $sql)) {
    echo ("Error description: " . mysqli_error($connection));
  } else {
    echo "<script type=\"text/javascript\">setTimeout(function(){document.getElementById('add_submitted_form').submit();},500);
		  		</script>";
  }

  if (!empty(array_filter($_FILES['location']['name']))) {
    $user_id = $_SESSION["id"];
    $file_count = count($_FILES['location']['name']);
    for ($i = 0; $i < $file_count; $i++) {
      $file_tmp_name = $_FILES['location']['tmp_name'][$i];
      $file_type = $_FILES['location']['type'][$i];
      $guid = uniqid();
      $extension = pathinfo($_FILES['location']['name'][$i], PATHINFO_EXTENSION);
      $file_location = $guid . '.' . $extension;
      $destination = 'images/blog_pictures/' . $file_location;
      $sql = "INSERT INTO pictures (blog_id, user_id, location) VALUES ('$id', '$user_id', '$destination')";
      mysqli_query($connection, $sql);
      move_uploaded_file($file_tmp_name, $destination);
    }
  }
}
mysqli_close($connection);
?>
<div style="text-align:center;margin-top:200px;">
  <h4>One moment please. Processing changes...</h4>
  <img src="images/loadingIcon.gif"></img>
</div>
<form method="POST" id="add_submitted_form" action="admin_edit_blog.php">
  <?php echo "<input type=\"hidden\" name=\"id\" value=\"$id\">"; ?>
</form>