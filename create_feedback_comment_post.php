<?php
#require 'db_configuration.php';
$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}
 
function create_feedback_post() {
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    # Field Entries
    if (isset($_POST['create_feedback_post']) || isset($_POST['create_feedback_post_subline'])) {
       
        if (isset($_SESSION['role'])){ // Verify SESSION
            // Only Users Logged In
            if ($_SESSION['role'] == 'user') {
                $paragraph = addslashes($_POST['feedback_paragraph']);
                $author = $_SESSION['first_name'];
                $email = $_SESSION['email'];
                $url = "";
            }
            // Admin Logged In
            elseif ($_SESSION['role'] == 'admin') {
                // Update the variables with form data
                $paragraph = addslashes($_POST['feedback_paragraph']);
                $author = "Administration";
                $email = $_SESSION['email'];
                $url = addslashes($_POST['feedback_url']);
            }
        }
        else {// New / Anonymous User.
            // Update the variables with form data
            $paragraph = $_POST['feedback_paragraph'] ?? '';
            $author = $_POST['feedback_name'] ?? '';
            $email = $_POST['feedback_email'] ?? '';
            $url = $_POST['feedback_url'] ?? '';

            if (empty($author)) {$author = "Anonymous User";}
            
        }


        // If any required item is still blank, display a message and continue the loop
        if ((empty($paragraph) || empty($author) || empty($email))) {
            echo "Please fill in all required fields.";
        }
        else{
            
            $timestamp = date("Y-m-d H:i:s");
            $subject_id = get_saved_button_id();
            if (!$subject_id) { // if not child button clicked then parent
                $subject_id = get_session_value() + 1;
            }

            if ($subject_id > 0) {
            // Check if the entry already exists
            $checkQuery = "SELECT * FROM feedback_feedbacks WHERE feedback_id = '$feedbackId'";
            $checkResult = mysqli_query($connection, $checkQuery);

            //if (mysqli_num_rows($checkResult) > 0) {
                // Entry already exists, handle the situation (e.g., show an error message)
            // echo "Error: Entry already exists for feedback ID $feedbackId";
            //} else {
                // Entry doesn't exist, proceed with the insertion
                $sql = "INSERT INTO feedback_feedbacks (feedback_id, feedback_id, subject_id, paragraph, name, email, url, created_time) 
                        VALUES (NULL, '$feedbackId', '$subject_id', '$paragraph', '$author', '$email', '$url', '$timestamp')";

                if (mysqli_query($connection, $sql)) {
                    // Get the last inserted ID
                    $last_id = mysqli_insert_id($connection);
                    save_button_id(null);
                    // Refresh to updated page
                    echo '<script>window.location.href = window.location.href;</script>';
                    // Redirect to updated page
                    #header('Location: single-post.php?feedback_id=' . $feedbackId);
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

