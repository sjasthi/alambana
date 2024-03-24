<?php
session_start();

// Block unauthorized users from accessing the page
if (isset($_SESSION['role']) && $_SESSION['role'] !== 'Administrator') {
    http_response_code(403);
    die('Forbidden');
}

$Blog_Id = $_POST['Blog_Id'];

require 'db_configuration.php';

// Create connection
$conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to delete records and associated files
function deleteRecords($conn, $table, $condition, $fileColumn) {
    global $Blog_Id;
    $sql = "SELECT * FROM $table WHERE $condition='$Blog_Id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $deleteSql = "DELETE FROM $table WHERE $condition=".$row['Blog_Id'];
            if (!$conn->query($deleteSql)) {
                echo "Error deleting record: " . $conn->error;
            }
            if ($fileColumn && file_exists($row[$fileColumn])) {
              unlink($row[$fileColumn]);
            }
          
        }
    }
}

// Delete pictures and associated files
deleteRecords($conn, 'blog_pictures', 'Blog_Id', 'Location');

// Delete storys and associated files
deleteRecords($conn, 'blog_story', 'Blog_Id', false);

// Delete comments and associated files
deleteRecords($conn, 'blog_comments', 'Blog_Id', false);

// Delete the blog record
$sql = "DELETE FROM blogs WHERE Blog_Id = $Blog_Id";
if (!$conn->query($sql)) {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script>
    // Redirect to admin_blogs.php after a delay
    setTimeout(function () {
        document.getElementById('form_submitted').submit();
    }, 500);
</script>

<div style="text-align: center; margin-top: 200px; background-color: white;">
    <h3>One moment please. Deleting records...</h3>
    <img src="images/loadingIcon.gif" width="48" height="48" alt="Loading">
</div>


<form method="POST" id="form_submitted" action="admin_blogs.php"></form>
