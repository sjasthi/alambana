<?php
$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}

// Block unauthorized users from accessing the page
if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] != 'admin') {
    http_response_code(403);
    die('Forbidden');
  }
} else {
  http_response_code(403);
  die('Forbidden');
}

require 'db_configuration.php'; // Include your database configuration file
$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <title>Administration - Events</title>
</head>
<body>
  <header class="inverse">
    <div class="container">
      <h1><span class="accent-text">Events</span></h1>
    </div>
  </header>

  <div class="toggle_columns">
    Toggle column: <!-- Add links to toggle columns as needed -->
  </div>

  <div style="padding-top: 10px; padding-bottom: 30px; width:90%; margin:auto; overflow:auto">
    <table id="Event_table" class="display compact">
      <thead>
        <tr>
          <!-- Define table headers for events -->
          <th>Event ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Video Link</th>
          <th>Event Date</th>
          <th>Modified Time</th>
          <th>Created Time</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <!-- Populate table with event data from the database -->
        <?php
          $sql = "SELECT * FROM events"; // Modify this query to fetch events data
          $result = $connection->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["Event_Id"] . "</td>";
              echo "<td>" . $row["Title"] . "</td>";
              echo "<td>" . $row["Description"] . "</td>";
              echo "<td>" . $row["Video_Link"] . "</td>";
              echo "<td>" . $row["Event_Date"] . "</td>";
              echo "<td>" . $row["Modified_Time"] . "</td>";
              echo "<td>" . $row["Created_Time"] . "</td>";
              echo "<td>";
              echo "<form action='admin_edit_event.php' method='POST'>";
              echo "<input type='hidden' name='Event_Id' value='" . $row["Event_Id"] . "'>";
              echo "<input type='submit' id='admin_buttons' name='edit' value='Edit'/>";
              echo "</form>";
              echo "<form action='admin_delete_event.php' method='POST'>";
              echo "<input type='hidden' name='Event_Id' value='" . $row["Event_Id"] . "'>";
              echo "<input type='submit' id='admin_buttons' name='delete' value='Delete'/>";
              echo "</form>";
              echo "</td>";
              echo "</tr>";
            }
          } else {
            echo "0 results";
          }
          $connection->close();
        ?>
      </tbody>
    </table>
  </div>



</body>
</html>
