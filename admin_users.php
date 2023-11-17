<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['role'] != 'admin') {
    header('Location:team.php');
}

include('shared_resources.php');

ob_end_flush();

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>

<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Include the favicon.ico file -->
    <?php generateFaviconLink() ?>
    <title>Users [admin]</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas ================================================== -->
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS ================================================== -->
    <?php css(2) ?>

    <!-- SCRIPTS ================================================== -->
    <?php load_common_page_scripts() ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <!-- Body Content -->

    <!-- Site Header Wrapper -->
    <?php load_common_page_header(2) ?>

    <!-- Main Content -->
    <div id="admin-container-id">
        <div class="admin-content">
            <div class="admin-container">
                <div class="row">
                    <!-- Admin Side Menu Panel -->
                    <?php admin_side_menu() ?>

                    <!-- User Table -->
                    <div style="padding-top: 50px; padding-left: 450px; width:100%">

                        <table id="User_table" class="display-Blogs">
                            <thead>
                                <tr>
                                    <!-- Define table headers for Users -->
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Profile Picture</th>
                                    <th>Change photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Populate table with User data from the database -->
                                <?php
                                $sql = "SELECT users.id, users.first_name, users.last_name, users.email, user_photos.Location 
                                        FROM users 
                                        LEFT JOIN user_photos ON users.Picture_Id = user_photos.Picture_Id"; // Modify this query to fetch Users data
                                $result = $db->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>
                                        <td>' . $row["id"] . '</td>
                                        <td>' . $row["first_name"] . '</td>
                                        <td>' . $row["last_name"] . '</td>
                                        <td>' . $row["email"] . '</td>
                                        <td><img src="' . $row["Location"] . '" alt="Profile Picture" style="width:50px;height:50px;"></td>
                                        <td> 
                                            <form action="admin_change_photo.php" method="post" enctype="multipart/form-data">
                                              <input type="hidden" name="user_id" value="' . $row["id"] . '">
                                              <input type="file" name="file" accept="image/*">
                                              <input class="btn btn-sm btn-danger btn-bold btn-text-shadow btn-background btn-border" type="submit" name="change_photo" value="Change Photo">
                                            </form>
                                        </td>
                                    </tr>';
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $db->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Site Footer -->
    <?php load_common_page_footer(2) ?>
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- Libraries Loader -->
    <?php lib() ?>

    <!-- DataTables Script -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var table = document.querySelector('#User_table');
            var dataTable = new DataTable(table);
        });
    </script>
</body>

</html>
