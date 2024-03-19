<?php
#require 'db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}


function edit_post_story($blogId) {

    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    #$blogId = $_GET['blog_id']; // Get the Blog_Id from the URL parameter [Previously Clicked Link ID]
    if (getUserHashFromDatabase($blogId) ){ // Verify SESSION with Hash Code

        # Field Entries
        if (isset($_POST['update_post_story'])) {
            $paragraph = addslashes($_POST['paragraph']);
            $about_author = addslashes($_POST['about_author']);

            // Update existing post data
            $updateQuery = "UPDATE blog_story SET paragraph='$paragraph', about_author='$about_author' WHERE blog_id='$blogId'";
            
            if (mysqli_query($connection, $updateQuery)) {
                // Refresh to updated page
                echo '<script>window.location.href = window.location.href;</script>';
                // Redirect to updated page
                #header('Location: single-post.php?blog_id=' . $blogId);
                #exit();
            } else {
                echo("Error: " . mysqli_error($connection));
            }
        }
    }
    mysqli_close($connection);
}
?>