<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['role'] != 'admin') {
    header('Location:team.php');
}

include('shared_resources.php');

ob_end_flush();

$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
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
    <!-- table styling -->
    <style>
        /* Add the styles here */
        #User_table {
            border-collapse: collapse;
            margin: auto;
            width: 90%;
        }

        #User_table th, #User_table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #User_table th {
            background-color: #f2f2f2;
        }

        /* Adjust DataTables elements */
        .dataTables_wrapper {
            width: 80%;
            margin: auto;
        }

        /* Add these styles to your CSS file or within a <style> tag in your HTML */
        .button-container {
            display: flex;
            align-items: center;
        }

        .button-container form {
            margin-right: 10px; /* Adjust the spacing between buttons as needed */
        }

        .button-container input[type="submit"] {
            padding: 1px 4px; /* Adjust the padding to make buttons smaller */
            /*width: auto;  Allow buttons to adjust their width based on content */
        }
        /* Change font family, size, and color */
        .btn {
            /* font-family: 'Arial', sans-serif; Change to your preferred font family */
            font-size: 10px; /* Adjust the font size */
            /* color: #ffffff; Change the text color */
        }

        /* Change the font weight (e.g., from normal to bold) */
        .btn-bold {
            font-weight: bold;
        }

        .show-button,
        .hidden-state { 
            background-color: lightcoral; /* Set the background color for the buttons */
            border-radius: 5px; /* Add border-radius for rounded corners */
            text-align: center; /* Center text horizontally */
            /* Additional styles as needed */
            color: black; /* or any other styling you want */
        }

        .clickable {
            cursor: pointer;
        } 
    </style>
    
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
                                    <th>Account Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Populate table with User data from the database -->
                                <?php
                                $sql = "SELECT users.id, users.first_name, users.last_name, users.email, users.status, user_photos.Location 
                                        FROM users 
                                        LEFT JOIN user_photos ON users.Picture_Id = user_photos.Picture_Id";
                                $result = $db->query($sql);

                               

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $statusClass = ($row["status"] == 'enabled') ? 'btn-success' : 'btn-danger';
                                        $statusAction = ($row["status"] == 'enabled') ? 'Disable' : 'Enable';
                                        $user_photo = isset($row["Location"]) && file_exists($row["Location"]) ? $row["Location"] : "images/add-account-icon.png";
                                        echo '<tr>
                                        <td>' . $row["id"] . '</td>
                                        <td>' . $row["first_name"] . '</td>
                                        <td>' . $row["last_name"] . '</td>
                                        <td>' . $row["email"] . '</td>';
                                        if(isset($row["Location"]) && file_exists($row["Location"])){
                                            echo '<td>
                                            <style>
                                                .default-avatar' . $row["id"] . ' {
                                                    position: relative;
                                                    overflow: hidden;
                                                    display: inline-block;
                                                }

                                                .overlay' . $row["id"] . ' {
                                                    position: absolute;
                                                    top: 0;
                                                    left: 0;
                                                    width: 100%;
                                                    height: 100%;
                                                    background: rgba(0, 0, 0, 0.5);
                                                    color: #fff;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    opacity: 0;
                                                    transition: opacity 0.3s;
                                                    cursor: pointer;
                                                }

                                                .default-avatar' . $row["id"] . ':hover .overlay' . $row["id"] . ' {
                                                    opacity: 1;
                                                }
                                                .testimonial-avatar:hover .overlay {
                                                    opacity: 1;
                                                }
                                            </style>
                                            <form action="admin_change_photo.php" method="post" enctype="multipart/form-data" style="display: flex; align-items: center;">
                                                <label for="fileInput' . $row["id"] . '" class="testimonial-avatar default-avatar' . $row["id"] . ' clickable">
                                                    <img src="' . $user_photo . '" alt="" style="width:70px;height:70px;">
                                                    <div class="overlay' . $row["id"] . '">Change Photo</div>
                                                </label>

                                                <input type="hidden" name="user_id" value="' . $row["id"] . '">
                                                <input id="fileInput' . $row["id"] . '" type="file" name="file" accept="image/*" style="display: none;">
                                                <input class="btn btn-sm btn-danger btn-bold btn-text-shadow btn-background btn-border" type="submit" name="change_photo" value="Apply">
                                            </form>

                                           
                                        ';
                                        }else{
                                            echo '<td>
                                            <style>
                                                .default-avatar' . $row["id"] . ' {
                                                    position: relative;
                                                    overflow: hidden;
                                                    display: inline-block;
                                                }

                                                .overlay' . $row["id"] . ' {
                                                    position: absolute;
                                                    top: 0;
                                                    left: 0;
                                                    width: 100%;
                                                    height: 100%;
                                                    background: rgba(0, 0, 0, 0.5);
                                                    color: #fff;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    opacity: 0;
                                                    transition: opacity 0.3s;
                                                    cursor: pointer;
                                                }

                                                .default-avatar' . $row["id"] . ':hover .overlay' . $row["id"] . ' {
                                                    opacity: 1;
                                                }
                                                .testimonial-avatar:hover .overlay {
                                                    opacity: 1;
                                                }
                                            </style>
                                            <form action="admin_change_photo.php" method="post" enctype="multipart/form-data"  style="display: flex; align-items: center;">
                                                <label for="fileInput' . $row["id"] . '" class="default-avatar' . $row["id"] . ' clickable" style="margin-right: 20px;">
                                                    <img src="' . $user_photo . '" alt="" style="width:50px;height:50px;">
                                                    <div class="overlay' . $row["id"] . '">Change Photo</div>
                                                </label>

                                                <input type="hidden" name="user_id" value="' . $row["id"] . '">
                                                <input id="fileInput' . $row["id"] . '" type="file" name="file" accept="image/*" style="display: none;">
                                                <input class="btn btn-sm btn-danger btn-bold btn-text-shadow btn-background btn-border" type="submit" name="change_photo" value="Apply">
                                            </form>

                                            
                                        ';
                                        }
                                        echo'
                                            <td>' . $row["status"] . '</td>
                                            <td>
                                                <form action="admin_disable_enable.php" method="post">
                                                    <input type="hidden" name="user_id" value="' . $row["id"] . '">
                                                    <button type="submit" name="disable_enable_user" class="btn btn-sm enable-disable-btn ' . $statusClass . '">
                                                        ' . $statusAction . ' User
                                                    </button>
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var enableDisableButtons = document.querySelectorAll('.enable-disable-btn');

        enableDisableButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                button.closest('form').submit();
            });
        });
    });
    </script>



</body>

</html>
