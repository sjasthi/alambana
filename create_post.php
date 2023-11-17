<?php
require 'db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
// should use $db global in db_configuration.php
if ($connection->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$hash = "";
if (isset($_SESSION['role'])){ // Verify SESSION
  // Only Valid Users Logged In
  $hash = $_SESSION['hash']; #echo $hash;
}

if (!empty($hash)){ // Only Allow Users To Create Entry

  # Field Entries
  if (isset($_POST['create_post'])) {
    $title = addslashes($_POST['title']);
    $author = $_SESSION['last_name'] . ", " . $_SESSION['first_name'];  #addslashes($_POST['author']);
    $description = addslashes($_POST['description']);
    $video_link = $_POST['video_link'];
    $timestamp = date("Y-m-d H:i:s");
    
    $fileNameArray = [];
    // Photo upload / copy temp image to destination 
    for($i = 0; $i < count($_FILES['file']['name']); $i++) {
      $fileName = $_FILES['file']['name'][$i];
      $fileTMP = $_FILES['file']['tmp_name'][$i];
      $fileError = $_FILES['file']['error'][$i];
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      if ($fileError === 0) {
        $fileNewName = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'images/blog_pictures/'.$fileNewName;
        move_uploaded_file($fileTMP, $fileDestination);
        array_push($fileNameArray, $fileDestination);
      } else {
        echo "There was an error uploading your file.";
      }
    }

    // Modification to MySQL Database
    $sql = "INSERT INTO blogs VALUES (
      NULL,
      '$title',
      '$author',
      '$description',
      '$video_link',
      '$timestamp',
      '$timestamp',
      '$hash');";

    if (!mysqli_query($connection, $sql)) {
      echo("Error description: " . mysqli_error($connection));
    } else {
      $last_id = mysqli_insert_id($connection);
      foreach($fileNameArray as $location){
        $sql = "INSERT INTO blog_pictures VALUES (
          NULL,
          '$last_id',
          '$location');";

        if (!mysqli_query($connection, $sql)) {
          echo("Error description: " . mysqli_error($connection));
        }
      }
    }
  }
}

mysqli_close($connection);

header('Location: blog.php');
?>
