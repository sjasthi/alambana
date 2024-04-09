<?php
require_once "../db_configuration.php";
session_start();
echo "blog_id: " . $_POST["blog_id"] . "\n";
echo "title: " . $_POST["title"] . "\n";
echo "video_link: " . $_POST["video_link"] . "\n";
echo "description: " . $_POST["description"] . "\n";
echo "content: " . $_POST["content"] . "\n";
$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
$sql;
$statement;
$result;
if ($_SESSION["role"] === "Administrator") {
  $sql = "UPDATE blogs SET title=?, video_link=?, description=?, content=? WHERE id=?";
  $statement = $connection->prepare($sql);
  $statement->bind_param("ssssi", $_POST['title'], $_POST['video_link'], $_POST['description'], $_POST['content'], $_POST['blog_id']);
  $result = $statement->execute();
} else {
  $sql = "UPDATE blogs SET title=?, video_link=?, description=?, content=? WHERE id=? AND user_id=?";
  $statement = $connection->prepare($sql);
  $statement->bind_param("ssssii", $_POST['title'], $_POST['video_link'], $_POST['description'], $_POST['content'], $_POST['blog_id'], $_SESSION["id"]);
  $result = $statement->execute();
}
$connection->close();
header("Location: ../blog_view.php?id=".$_POST["blog_id"]);