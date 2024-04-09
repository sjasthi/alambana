<?php
require_once "../db_configuration.php";
session_start();
echo "comment_id: " . $_POST["id"] . "\n";
echo "content: " . $_POST["content"] . "\n";
$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
$sql;
$statement;
$result;
if ($_SESSION["role"] === "Administrator") {
  $sql = "UPDATE comments SET content=? WHERE id=?";
  $statement = $connection->prepare($sql);
  $statement->bind_param("si", $_POST['content'], $_POST['id']);
  $result = $statement->execute();
} else {
  $sql = "UPDATE comments SET content=? WHERE id=? AND user_id=?";
  $statement = $connection->prepare($sql);
  $statement->bind_param("sii", $_POST['content'], $_POST['id'], $_SESSION['id']);
  $result = $statement->execute();
}
$connection->close();