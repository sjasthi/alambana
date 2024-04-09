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
if (!is_numeric($blogId)) { // Validation for a numeric user ID
    echo "Invalid user ID: " . $blogId;
    exit();
} else { echo "Good user ID: " . $blogId;
}

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    if (getUserHashFromDatabase($blogId) || $_SESSION['role']== 'admin') {
        // Retrieve the current value of 'hidden' from the database
        $currentHiddenValue = getBlogVisibilityStateFromDatabase($blogId);

        // Toggle the value
        $newHiddenValue = $currentHiddenValue ? false : true;

        // Modification to MySQL Database
        $updateQuery = "UPDATE blogs SET hidden=? WHERE blog_id=?";
        $stmtBlogVisibility = $connection->prepare($updateQuery);
        $stmtBlogVisibility->bind_param("ii", $newHiddenValue, $blogId);

        if ($stmtBlogVisibility->execute()) {
            $response = array('status' => 'success', 'message' => 'Post visibility toggled successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Error: ' . $connection->error);
        }

        $stmtBlogVisibility->close();
    }
    // If the code reaches here, it means the hash check failed
    mysqli_close($connection);

    $isRole = '';
    if (isset($_SESSION['role'])) {
        $isRole = $_SESSION['role'];
        if ($isRole == 'admin'){ // Verify SESSION with Hash Code or is 'admin'
            header('Location:admin_blogs.php'); 
        }
    }
    
}



/**/
# fetch Hash (User Validation)
function getUserHashFromDatabase($blogId) {

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
# fetch Blog Visiability : Boolean (false:0 | true:1) 
function getBlogVisibilityStateFromDatabase($blogId) {

    if (isset($_SESSION['role'])){ // Verify SESSION
      // Create connection
      $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  
      // Check connection
      if ($connection->connect_error) {
          die("Connection failed: " . $connection->connect_error);
      }
  
      // Prepare SQL query to fetch hidden based on blogId
      $sql = "SELECT hidden FROM blogs WHERE Blog_Id = $blogId";
  
      $result = $connection->query($sql);
      // If no matching blogId found, return an false
      $hidden = false;
  
      if ($result->num_rows > 0) {
          // Fetch the hidden info. from the database
          $row = $result->fetch_assoc();
          $hidden = $row['hidden'];
      }
  
    }
    // Close the connection
    $connection->close();
  
    return $hidden;
}
# pull BlogID from Session
function get_session_blog_id() {
    return isset($_SESSION['get_session_blog_id']) ? $_SESSION['get_session_blog_id'] : null;
}


?>
