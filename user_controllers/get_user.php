<?php
require_once "templates.php";
function get_profile($id, $edit)
{
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $sql = "SELECT 
          users.id AS user_id,
          users.first_name,
          users.last_name,
          users.role,
          users.about,
          users.email,
          users.picture_id AS user_picture_id, 
          pictures.location AS user_picture_location 
          FROM users
          LEFT JOIN pictures ON users.picture_id = pictures.id 
          WHERE users.id = ?";

    $statement = $connection->prepare($sql);
    if (!$statement) {
        die("Error in preparing statement: " . $connection->error);
    }
    $statement->bind_param("i", $id);
    $success = $statement->execute();
    if (!$success) {
        die("Error in executing statement: " . $statement->error);
    }
    $result = $statement->get_result();
    $user = ($result->fetch_all(MYSQLI_ASSOC))[0];
    $connection->close();
    ?>
    <link rel="stylesheet" href="user_controllers/styles.css" />
    <?php
    if ($edit) {
        generate_profile_edit($user);
    } else {
        generate_profile_view($user);
    }
}

function getUserCount() {
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
  
    $sql = "SELECT COUNT(*) AS user_count FROM users";
    $result = $connection->query($sql);
  
    $users = 0;
  
    // Fetch the count directly
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $users = $row['user_count'];
    }
  
    $connection->close();
    return $users;
}