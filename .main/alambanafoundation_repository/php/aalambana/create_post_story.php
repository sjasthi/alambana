<?php
#require 'db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}

function create_post_story($blogId) {
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    #$blogId = $_GET['blog_id']; // Get the Blog_Id from the URL parameter [Previously Clicked Link ID]

    # Field Entries
    if (isset($_POST['create_post_story'])) {
        $paragraph = addslashes($_POST['paragraph']);
        $about_author = addslashes($_POST['about_author']);

        // Check if the entry already exists
        $checkQuery = "SELECT * FROM blog_story WHERE blog_id = '$blogId'";
        $checkResult = mysqli_query($connection, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Entry already exists, handle the situation (e.g., show an error message)
            echo "Error: Entry already exists for Blog ID $blogId";
        } else {
            // Entry doesn't exist, proceed with the insertion
            $sql = "INSERT INTO blog_story (story_id, blog_id, paragraph, about_author) VALUES (NULL, '$blogId', '$paragraph', '$about_author')";

            if (mysqli_query($connection, $sql)) {
                // Get the last inserted ID
                $last_id = mysqli_insert_id($connection);
                
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

# Check IF Post Exit
function checkIfBlogPostExists($blog_Id) {
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT * FROM blog_story WHERE Blog_Id = '$blog_Id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // Blog exists
        return true;
    } else {
        // Blog doesn't exist
        return false;
    }
}
?>

