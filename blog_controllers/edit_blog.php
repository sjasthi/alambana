<?php
require_once "../db_configuration.php";

echo "blog_id: " . $_POST["blog_id"] . "\n";
echo "title: " . $_POST["title"] . "\n";
echo "video_link: " . $_POST["video_link"] . "\n";
echo "description: " . $_POST["description"] . "\n";
echo "content: " . $_POST["content"] . "\n";
$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
if ($connection->connect_error) {
  die ("Connection failed: " . $connection->connect_error);
}
$sql = "UPDATE blogs SET title=?, video_link=?, description=?, content=? WHERE id=?";
$statement = $connection->prepare($sql);
$statement->bind_param("ssssi", $_POST['title'], $_POST['video_link'], $_POST['description'], $_POST['content'], $_POST['blog_id']);
$result = $statement->execute();
header("Location: " . $_SERVER['HTTP_REFERER']);