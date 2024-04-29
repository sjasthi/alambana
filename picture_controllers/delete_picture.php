<?php
require_once "../db_configuration.php";
$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM pictures WHERE id=?";
$statement = $connection->prepare($sql);
$statement->bind_param("i", $_GET['id']);
$result = $statement->execute();
$picture = $statement->get_result()->fetch_assoc();
echo $picture["location"];
if (file_exists("../" . $picture["location"])) {
    // Attempt to delete the file
    if (unlink("../" . $picture["location"])) {
        echo "File deleted successfully.";
    } else {
        echo "Error deleting the file.";
    }
} else {
    echo "File does not exist.";
}
$sql = "DELETE FROM pictures WHERE id=?";
$statement = $connection->prepare($sql);
$statement->bind_param("i", $_GET['id']);
$result = $statement->execute();
$connection->close();