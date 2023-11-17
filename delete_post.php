<?php
require 'db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}

// UPDATE SERVER TO CURRENT BLOG ID 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the id from the POST data
    $blogId = isset($_POST['blog_id']) ? $_POST['blog_id'] : 0;

    // Save the id into the PHP session
    $_SESSION['get_session_blog_id'] = $blogId;

    // Send a response back to the client
    echo 'Server received ' . $blogId . ' blog_id.';
}
$blogId = get_session_blog_id();
if (!is_numeric($blogId)) {
    echo "Invalid user ID: " . $blogId;
    exit();
} else {
    echo "Good user ID: " . $blogId;
}

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}else{

    if (getHashFromDatabase($blogId)) {
        //if (isset($_POST['delete_post_button'])) {  // No longer needed while using AJAX
            $deleteBlogQuery = "DELETE FROM blogs WHERE blog_id=?";
            $deletePicturesQuery = "DELETE FROM blog_pictures WHERE blog_id=?";
            $deleteStoryQuery = "DELETE FROM blog_story WHERE blog_id=?";

            $stmtBlog = $connection->prepare($deleteBlogQuery);
            $stmtPictures = $connection->prepare($deletePicturesQuery);
            $stmtStory = $connection->prepare($deleteStoryQuery);

            $stmtBlog->bind_param("i", $blogId);
            $stmtPictures->bind_param("i", $blogId);
            $stmtStory->bind_param("i", $blogId);

            if ($stmtBlog->execute() && $stmtPictures->execute() && $stmtStory->execute()) {
                $response = array('status' => 'success', 'message' => 'Post deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Error: ' . $connection->error);
            }

            $stmtBlog->close();
            $stmtPictures->close();
            $stmtStory->close();

            

            // Output the response as JSON
            //echo json_encode($response);

            // Close the connection
            //mysqli_close($connection);
            //exit(); // Terminate script execution after sending JSON response
       //}
    }
    // If the code reaches here, it means the hash check failed
    mysqli_close($connection);
}

/**/
# fetch Hash (User Validation)
function getHashFromDatabase($blogId) {

  if (isset($_SESSION['role'])){ // Verify SESSION
    // Only Users Logged In with matching Hash
    $session_hash = $_SESSION['hash'];

    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare SQL query to fetch Title based on blogId
    $sql = "SELECT hash FROM blogs WHERE Blog_Id = $blogId";

    $result = $connection->query($sql);
    // If no matching blogId found, return an false
    $hash = false;

    if ($result->num_rows > 0) {
        // Fetch the Title from the database
        $row = $result->fetch_assoc();
        $hash = $row['hash'];
        if ($hash == $session_hash)  return true;
    }

  }

  // Close the connection
  $connection->close();

  return $hash;
}

# pull BlogID from Session
function get_session_blog_id() {
    return isset($_SESSION['get_session_blog_id']) ? $_SESSION['get_session_blog_id'] : null;
}


?>
