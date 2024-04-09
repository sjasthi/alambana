<?php
function create_blog($title, $description, $content, $video_link, $user_id) {
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
    $sql = "INSERT INTO blogs (title, description, content, video_link, user_id) VALUES (?, ?, ?, ?, ?)";
    $statement = $connection->prepare($sql);
    $statement->bind_param("ssssi", $title, $description, $content, $video_link, $user_id);
    $result = $statement->execute();
    if ($result === true) {
        $last_id = mysqli_insert_id($connection);
        $connection->close();
        return $last_id;
    } else {
        $connection->close();
        return false;
    }
}
?>