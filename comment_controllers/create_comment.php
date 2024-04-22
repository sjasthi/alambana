<?php
require_once "../db_configuration.php";

echo "user_id: " . $_POST["user_id"] . "\n";
echo "blog_id: " . $_POST["blog_id"] . "\n";
echo "content: " . $_POST["content"] . "\n";
$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
if ($_POST["blog_id"] !== null) {
  $sql = "INSERT INTO comments (blog_id, user_id, content) VALUES (?, ?, ?)";
  $statement = $connection->prepare($sql);
  $blog_id = $_POST["blog_id"];
  $statement->bind_param("iis", $blog_id, $_POST["user_id"], $_POST["content"]);
  $result = $statement->execute();
} else {
  $sql = "INSERT INTO comments (user_id, content) VALUES (?, ?)";
  $statement = $connection->prepare($sql);
  $statement->bind_param("is",$_POST["user_id"], $_POST["content"]);
  $result = $statement->execute();
}
$connection->close();
?>