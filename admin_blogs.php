<?php
if (!isset($_GET["page"])) {
  header("Location: admin_blogs.php?page=1");
}
if ($_GET["page"] < 1) {
  header("Location: admin_blogs.php?page=1");
}
session_start();
require_once 'header/index.php';
require_once 'shared_resources.php';
require_once 'banner/index.php';
require_once 'blog_controllers/get_blogs.php';
$count = 10;
$page_count = ceil(get_blog_count() / $count);
css(2);
$start = $count * ($_GET["page"] - 1);
?>
<style>
  .display-events {
    padding: 10px;
    /* Adjust padding as needed */
    font-size: 12px;
    /* Adjust font size as needed */
    margin-left: 40px;
    /* Add margin for spacing between sign-in button and other elements */
    margin-top: 5px;
    /* Adjust margin-top to move the button down */
    color: #333;
    /* Set text color */
    cursor: pointer;
    /* Set cursor to pointer for better user experience */
  }

  #Event_table {
    width: 100%;
    /* Set table width to 100% */
    border-collapse: collapse;
    /* Collapse borders between table cells */
  }

  #Event_table th,
  #Event_table td {
    border: 1px solid #ccc;
    /* Add border to table cells */
    padding: 8px;
    /* Adjust padding for table cells */
    text-align: left;
    /* Align text to the left within cells */
  }

  #Event_table th {
    background-color: #f2f2f2;
    /* Set background color for table header cells */
  }

  .btn {
    /* background-color: #4CAF50;*/
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
  }

  #Event_table tbody tr td {
    line-height: 1;
    /* Adjust this value as needed */
  }

  /* Add these styles to your CSS file or within a <style> tag in your HTML */
  .button-container {
    display: flex;
    align-items: center;
  }

  .button-container form {
    margin-right: 10px;
    /* Adjust the spacing between buttons as needed */
  }

  .button-container input[type="submit"] {
    padding: 1px 4px;
    /* Adjust the padding to make buttons smaller */
    /*width: auto;  Allow buttons to adjust their width based on content */
  }

  /* Change font family, size, and color */
  .btn {
    /* font-family: 'Arial', sans-serif; Change to your preferred font family */
    font-size: 10px;
    /* Adjust the font size */
    /* color: #ffffff; Change the text color */
  }

  /* Change the font weight (e.g., from normal to bold) */
  .btn-bold {
    font-weight: bold;
  }

  .pages-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
  }
</style>
<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html, charset=utf-8">
  <title>Aalambana - Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, user-scalable=false;">
  <meta name="format-detection" content="telephone=no">
</head>

<body>
  <!-- Site Header Wrapper -->
  <?php
  generate_header();
  ?>
  <!-- Banner Area -->

  <main>
    <div id="admin-container-id">
      <div class="admin-content">
        <div class="admin-container">
          <div class="row">

            <!-- Admin Side Menu Panel -->
            <?php admin_side_menu() ?>

            <div style="padding-top: 96px; padding-left: 450px; width:90%; text-align:center;">
              <div class="pages-container">
                <?php
                for ($i = 1; $i <= $page_count; $i++) {
                  ?>
                  <a class="page-number-container-top-<?php echo $i; ?>">
                    <?php
                    if ($i != $_GET["page"]) {
                      echo "<p style='text-decoration: underline; margin: 4px; margin-top: 0;'>";
                    }
                    echo $i;
                    if ($i != $_GET["page"]) {
                      echo "</p>";
                    }
                    ?>
                  </a>
                  <script>
                    const pageNumber<?php echo $i; ?>TopContainer = document.getElementsByClassName("page-number-container-top-<?php echo $i; ?>")[0];
                            pageNumber<?php echo $i; ?>TopContainer.addEventListener("click", (event) => {
                      window.location.href = 'admin_blogs.php?page=<?php echo $i; ?>';
                    });
                  </script>
                  <?php
                }
                ?>
              </div>
              <br />
              <br />
              <br />
              <h2 style="margin: auto;">Blogs</h2>
              <table id="Event_table" class="display-events">
                <thead>
                  <tr>
                    <!-- Define table headers for events -->
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Video Link</th>
                    <th>Modified Time</th>
                    <th>Created Time</th>
                    <th>Open</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Populate table with event data from the database -->
                  <?php
                  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
                  // Check connection
                  if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
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
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["title"] ?></td>
                        <td><?php echo $row["description"] ?></td>
                        <td><?php echo $row["video_link"] ?></td>
                        <td><?php echo $row["modified_time"] ?></td>
                        <td><?php echo $row["created_time"] ?></td>
                        <td><a href="blog_view.php?id=<?php echo $row["id"]; ?>">Open</a></td>
                      </tr>
                      <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Site Footer -->
  <?php load_common_page_footer(2); ?>
  <!-- Libraries Loader -->
  <?php lib(); ?>
  <!-- Style Switcher Start -->
  <?php style_switcher(); ?>
</body>

</html>