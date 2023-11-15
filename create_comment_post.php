<?php
#require 'db_configuration.php';
$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}
 
function create_comment_post($blogId) {
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    
    # Field Entries
    if (isset($_POST['create_comment_post']) || isset($_POST['create_comment_post_anonymous'])) {

        // Update the variables with form data
        $paragraph = addslashes($_POST['comment_paragraph']);
        $author = addslashes($_POST['comment_name']);
        $email = addslashes($_POST['comment_email']);

        // If any required item is still blank, display a message and continue the loop
        if (empty($paragraph) || empty($author) || empty($email)) {
            echo "Please fill in all required fields.";
        }
        else{

            $url = addslashes($_POST['comment_url']);
            $timestamp = date("Y-m-d H:i:s");
            $subject_id = get_saved_button_id();
            if (!$subject_id) { // if not child button clicked then parent
                $subject_id = get_session_value() + 1;
            }

            if ($subject_id > 0) {
            // Check if the entry already exists
            $checkQuery = "SELECT * FROM blog_comments WHERE blog_id = '$blogId'";
            $checkResult = mysqli_query($connection, $checkQuery);

            //if (mysqli_num_rows($checkResult) > 0) {
                // Entry already exists, handle the situation (e.g., show an error message)
            // echo "Error: Entry already exists for Blog ID $blogId";
            //} else {
                // Entry doesn't exist, proceed with the insertion
                $sql = "INSERT INTO blog_comments (comment_id, blog_id, subject_id, paragraph, name, email, url, created_time) 
                        VALUES (NULL, '$blogId', '$subject_id', '$paragraph', '$author', '$email', '$url', '$timestamp')";

                if (mysqli_query($connection, $sql)) {
                    // Get the last inserted ID
                    $last_id = mysqli_insert_id($connection);
                    save_button_id(null);
                    // Refresh to updated page
                    echo '<script>window.location.href = window.location.href;</script>';
                    // Redirect to updated page
                    #header('Location: single-post.php?blog_id=' . $blogId);
                    #exit();
                } else {
                    echo("Error: " . mysqli_error($connection));
                }
            //}
            }
        }  
    }

    mysqli_close($connection);
}



?>

