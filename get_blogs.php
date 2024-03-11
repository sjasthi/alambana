<?php

use PhpOffice\PhpPresentation\Shape\Chart\Title;

//require 'db_configuration.php';
//require 'update_current_page.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}

function get_blogs($start, $count)
{
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $sql = "SELECT blogs.*, 
  users.id AS user_id, 
  users.first_name, 
  users.last_name, 
  users.picture_id,
  pictures.location AS user_picture_location
  FROM blogs
  JOIN users ON blogs.user_id = users.id
  JOIN pictures ON users.picture_id = pictures.id 
  ORDER BY blogs.created_time DESC 
  LIMIT $start - 1, $count";
}

function get_blog($blog_id) #THIS SHOULD BE INCREMENTING VISITORS- REMEMBER TO COME BACK TO THIS
{
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $sql = "SELECT blogs.*, 
  users.id AS user_id, 
  users.first_name, 
  users.last_name, 
  users.picture_id,
  pictures.location AS user_picture_location
  FROM blogs
  JOIN users ON blogs.user_id = users.id
  JOIN pictures ON users.picture_id = pictures.id
  WHERE id = $blog_id";

  $result = $connection->query($sql);
  $connection->close();
  if ($result->num_rows > 0) {
    $blog = $result->fetch_assoc();
    ?>
    <div>
      Author:
      <div>
        <img alt="Profile Picture" src=<?php echo htmlspecialchars($blog["user_picture_location"]); ?> /><?php echo htmlspecialchars($blog["first_name"] . " " . $blog["last_name"]); ?><br />
        <?php echo htmlspecialchars($blog["modified_time"]) ?>
      </div>
      Content:
      <div>
        <?php echo htmlspecialchars($blog["content"]); ?>
      </div>
      Comments:
      <div>
        <?php get_blog_comments($blog_id); ?>
      </div>
    </div>
    <?php
  }
}
function get_blog_comments($blog_id)
{
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $sql = "SELECT 
  comments.*, 
  users.id AS user_id, 
  users.first_name, 
  users.last_name, 
  users.picture_id, 
  pictures.location AS user_picture_location 
FROM comments 
JOIN users ON comments.user_id = users.id 
JOIN pictures ON users.picture_id = pictures.id 
WHERE comments.blog_id = $blog_id 
ORDER BY comments.created_time ASC";
  $result = $connection->query($sql);
  $connection->close();
  if ($result->num_rows > 0) {
    // Output data of each row
    while ($comment = $result->fetch_assoc()) {
      ?>
      <div>
        Author:
        <div>
          <img alt="Profile Picture" src=<?php echo htmlspecialchars($comment["user_picture_location"]); ?> /><?php echo htmlspecialchars($comment["first_name"] . " " . $comment["last_name"]); ?><br />
          <?php echo htmlspecialchars($comment["modified_time"]) ?>
        </div>
        Content:
        <div>
          <?php echo htmlspecialchars($comment["content"]); ?>
        </div>
      </div>
      <?php
    }
  }
}

# update Page Visitor Count
function increment_blog_page_visitor_count($blog_id)
{
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
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
  return isset($_SESSION['saved_value']) ? $_SESSION['saved_value'] : null;
}
function get_session_value()
{
  return isset($_SESSION['update_server_page_list_number']) ? $_SESSION['update_server_page_list_number'] : 3;
}

function get_session_blog_id()
{
  return isset($_SESSION['get_session_blog_id']) ? $_SESSION['get_session_blog_id'] : null;
}
