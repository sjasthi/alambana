<?php
require_once "../db_configuration.php";
session_start();
echo "user_id: " . $_SESSION["id"] . "\n";
echo "blog_id: " . $_POST["id"] . "\n";

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
if ($_SESSION["role"] === "Administrator") {
    $sql = "DELETE FROM comments WHERE id=?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $_POST["id"]);
    $result = $statement->execute();
} else {
    $sql = "DELETE FROM comments WHERE id=? AND user_id=?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("ii", $_POST["id"], $_SESSION["id"]);
    $result = $statement->execute();
}
$connection->close();
?>