<?php
require_once "blog_controllers/templates.php";
require_once "comment_controllers/templates.php";
require_once "comment_controllers/get_comments.php";
$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}
function get_blogs($start, $count)
{
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die ("Connection failed: " . $connection->connect_error);
  }
  $sql = "SELECT blogs.*,
          users.first_name, 
          users.last_name, 
          users.picture_id, 
          pictures.location AS user_picture_location 
          FROM blogs 
          JOIN users ON blogs.user_id = users.id 
          LEFT JOIN pictures ON users.picture_id = pictures.id 
          ORDER BY blogs.created_time DESC LIMIT $start, $count";

  $result = $connection->query($sql);
  $connection->close();
  ?>
  <link rel="stylesheet" href="blog_controllers/styles.css" />
  <?php
  if ($result->num_rows > 0) {
    while ($blog = $result->fetch_assoc()) {
      generate_blog($blog);
    }
  }
}

function get_blog($blog_id)
{
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die ("Connection failed: " . $connection->connect_error);
  }
  $sql = "SELECT blogs.*,
        users.id AS user_id, 
        users.first_name, 
        users.last_name, 
        users.picture_id AS user_picture_id, 
        pictures.location AS user_picture_location 
        FROM blogs
        JOIN users ON blogs.user_id = users.id 
        LEFT JOIN pictures ON users.picture_id = pictures.id 
        WHERE blogs.id = ?";

  $statement = $connection->prepare($sql);
  if (!$statement) {
    die ("Error in preparing statement: " . $connection->error);
  }
  $statement->bind_param("i", $blog_id);
  $success = $statement->execute();
  if (!$success) {
    die ("Error in executing statement: " . $statement->error);
  }
  $result = $statement->get_result();
  $blog = ($result->fetch_all(MYSQLI_ASSOC))[0];
  increment_blog_page_visitor_count($blog_id);
  ?>
  <link rel="stylesheet" href="blog_controllers/styles.css" />
  <?php
  generate_blog_view($blog);
  generate_new_comment_form($blog_id);
  get_blog_comments($blog_id); 
}
function get_blog_count() {
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die ("Connection failed: " . $connection->connect_error);
  }
  $sql = "SELECT COUNT(*) as count FROM blogs";
  $statement = $connection->prepare($sql);
  if (!$statement) {
    die ("Error in preparing statement: " . $connection->error);
  }
  $success = $statement->execute();
  if (!$success) {
    die ("Error in executing statement: " . $statement->error);
  }
  $result = $statement->get_result();
  return ($result->fetch_assoc())["count"];
}

# update Page Visitor Count
function increment_blog_page_visitor_count($blog_id)
{
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  // Check connection
  if ($connection->connect_error) {
    die ("Connection failed: " . $connection->connect_error);
  }

  // Increment the visitor count in the database
  $sql = "UPDATE blogs SET visitor_count = visitor_count + 1 WHERE id = $blog_id";
  $connection->query($sql);
  $connection->close();
}


# fetch Page Comment Count
# trasnform day with suffix
function getDayWithSuffix($day)
{
  if ($day >= 11 && $day <= 13) {
    // If the day is between 11 and 13, use "th" suffix
    $suffix = 'th';
  } else {
    // Otherwise, use appropriate suffix based on the last digit
    switch ($day % 10) {
      case 1:
        $suffix = 'st';
        break;
      case 2:
        $suffix = 'nd';
        break;
      case 3:
        $suffix = 'rd';
        break;
      default:
        $suffix = 'th';
        break;
    }
  }
  return $day . $suffix;
}



////////////////////////////////////////////////////////
// SESSSION
function save_button_id($button_id)
{
  // Save button_id to the PHP session
  $_SESSION['saved_value'] = $button_id;
}
// Retrieve button_id from the session
function get_saved_button_id()
{
  return isset ($_SESSION['saved_value']) ? $_SESSION['saved_value'] : null;
}
function get_session_value()
{
  return isset ($_SESSION['update_server_page_list_number']) ? $_SESSION['update_server_page_list_number'] : 3;
}

function get_session_blog_id()
{
  return isset ($_SESSION['get_session_blog_id']) ? $_SESSION['get_session_blog_id'] : null;
}
