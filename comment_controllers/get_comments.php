<?php
require_once ("templates.php");
function get_blog_comments($blog_id)
{
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
        die ("Connection failed: " . $connection->connect_error);
    }
    $sql = "SELECT 
          comments.*, 
          users.first_name, 
          users.last_name, 
          users.picture_id AS user_picture_id, 
          pictures.location AS user_picture_location 
          FROM comments 
          JOIN users ON comments.user_id = users.id 
          LEFT JOIN pictures ON users.picture_id = pictures.id 
          WHERE comments.blog_id = $blog_id 
          ORDER BY comments.created_time DESC";
    $result = $connection->query($sql);
    $connection->close();
    ?>
    <link rel="stylesheet" href="comment_controllers/styles.css">
    <?php
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($comment = $result->fetch_assoc()) {
            generate_comment($comment);
        }
    }
}
?>