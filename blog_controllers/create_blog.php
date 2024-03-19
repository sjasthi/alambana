<?php
function create_blog($title, $description, $video_link, $user_id) {
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
    $content = "";
    $sql = "INSERT INTO blogs (title, description, content, video_link, user_id) VALUES (?, ?, ?, ?, ?)";
    $statement = $connection->prepare($sql);
    $statement->bind_param("ssssi", $title, $description, $content, $video_link, $user_id);
    $result = $statement->execute();
    if ($result === true) {
        $connection->close();
        return true;
    } else {
        $connection->close();
        return false;
    }
}
?>