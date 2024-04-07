<?php
require_once '../db_configuration.php';
require_once 'create_blog.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
// should use $db global in db_configuration.php
if ($connection->connect_error) {
  die ("Connection failed: " . $conn->connect_error);
}

$user_id;
if (isset ($_SESSION['id'])) { // Verify SESSION
  // Only Valid Users Logged In
  $user_id = $_SESSION['id']; #echo $hash;
}

if (!empty ($user_id)) { // Only Allow Users To Create Entry

  # Field Entries
  if (isset ($_POST['create_post'])) {
    $title = addslashes($_POST['title']);
    $description = addslashes($_POST['description']);
    $video_link = $_POST['video_link'];
    $content = $_POST['content'];

    $fileNameArray = [];
    // Photo upload / copy temp image to destination 
    echo count($_FILES['file']['name']) . "<br/>";
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
      $fileName = $_FILES['file']['name'][$i];
      $fileTMP = $_FILES['file']['tmp_name'][$i];
      $fileError = $_FILES['file']['error'][$i];
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      if ($fileError === 0) {
        $fileNewName = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = 'images/blog_pictures/' . $fileNewName;
        move_uploaded_file($fileTMP, $fileDestination);
        array_push($fileNameArray, $fileDestination);
      } else {
        echo "There was an error uploading your file.";
      }
    }

    // Modification to MySQL Database

    $blog_id = create_blog($title, $description, $content, $video_link, $user_id);
    if ($blog_id !== false) {
      foreach ($fileNameArray as $location) {
        $sql = "INSERT INTO pictures (blog_id, user_id, location) VALUES (
          $blog_id,
          $user_id,
          '$location')";
        if (!mysqli_query($connection, $sql)) {
          echo "\n" . $sql . "\n";
          echo ("Error description: " . mysqli_error($connection));
          echo "\n" . $sql;
        }
      }
    } else {
      echo "Blog could not be created.";
    }
  }
}

mysqli_close($connection);

echo "<script>window.location.href='../blogs.php';</script>"; //hacky but it works for now
