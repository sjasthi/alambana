<?php
require '../db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
    session_start();
}

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
// should use $db global in db_configuration.php
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id;
if (isset($_SESSION['id'])) { // Verify SESSION
    // Only Valid Users Logged In
    $user_id = $_SESSION['id']; #echo $hash;
}
$fileNameArray = [];
for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
    $fileName = $_FILES['file']['name'][$i];
    $fileTMP = $_FILES['file']['tmp_name'][$i];
    $fileError = $_FILES['file']['error'][$i];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if ($fileError === 0) {
        $fileNewName = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = 'images/users_pictures/' . $fileNewName;
        move_uploaded_file($fileTMP, '../' . $fileDestination);
        array_push($fileNameArray, $fileDestination);
    } else {
        echo "There was an error uploading your file.";
    }
}

foreach ($fileNameArray as $location) {
    $sql = "INSERT INTO pictures (user_id, location) VALUES (
        $user_id,
        '$location')";
    if (!mysqli_query($connection, $sql)) {
        echo "\n" . $sql . "\n";
        echo ("Error description: " . mysqli_error($connection));
        echo "\n" . $sql;
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
?>