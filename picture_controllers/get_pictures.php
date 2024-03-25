<?php
require_once "templates.php";
function get_blog_pictures($blog_id)
{
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
        die ("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT * FROM pictures WHERE blog_id = $blog_id";
    $result = $connection->query($sql);
    $connection->close();
    $pictures = array();

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Fetch associative array for each row
        while ($row = $result->fetch_assoc()) {
            // Append the row to the pictures array
            $pictures[] = $row;
        }
        ?>
        <link rel="stylesheet" href="picture_controllers/styles.css" />
        <?php
        generate_picture_carousel($pictures);
    }
}
?>