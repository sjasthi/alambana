<?php
require 'db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}

$blogId = $_GET['blog_id']; // Get the Blog_Id from the URL parameter

#function delete_post($blogId) {

    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare SQL queries to delete data based on blog_id
    $deleteBlogQuery = "DELETE FROM blogs WHERE blog_id='$blogId'";
    $deletePicturesQuery = "DELETE FROM blog_pictures WHERE blog_id='$blogId'";
    $deleteStoryQuery = "DELETE FROM blog_story WHERE blog_id='$blogId'";

    // Execute the delete queries
    if (mysqli_query($connection, $deleteBlogQuery) &&
        mysqli_query($connection, $deletePicturesQuery) &&
        mysqli_query($connection, $deleteStoryQuery)) {
        // Post deleted successfully, you can redirect or display a success message
        echo "Post deleted successfully.";
    } else {
        // Error occurred while deleting the post
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);

    header('Location: blog.php');
#}
?>
