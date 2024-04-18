<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['role'] != 'Administrator') {
    header('Location:events.php');
}

include 'shared_resources.php';
require_once "event_controllers/event_queries.php";
require_once "header/index.php";

ob_end_flush();

//$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
<!DOCTYPE HTML>
<html class="no-js">

<head>
    <!-- Basic Page Needs
  ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Include the favicon.ico file -->
    <?php generateFaviconLink() ?>
    <title>Events [admin]</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS
  ================================================== -->
    <?php css(2) ?>

    <!-- SCRIPTS
  ================================================== -->
    <?php load_common_page_scripts() ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">



</head>

<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
    <div class="body">

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
        </style>

        <!-- Site Header Wrapper -->
        <?php generate_header(); ?>
        <!-- Main Content -->
        <div id="admin-container-id">
            <div class="admin-content">
                <div class="admin-container">
                    <div class="row">

                        <!-- Admin Side Menu Panel -->
                        <?php admin_side_menu() ?>
                        <div style="padding-top: 100px; padding-left: 450px; width:100%">
                            <a href="events.php?view=create_event" class="btn">Add new Event </a>
                        </div>

                        <div style="padding-top: 20px; padding-left: 450px; width:90%">
                            <table id="Event_table" class="display-events">
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
                                    $events = get_events("", 0, event_count());
                                    foreach ($events as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row["title"] ?></td>
                                            <td><?php echo $row["description"] ?></td>
                                            <td><?php echo $row["video_link"] ?></td>
                                            <td><?php echo $row["event_date_start"] ?></td>
                                            <td><?php echo $row["modified_time"] ?></td>
                                            <td><?php echo $row["created_time"] ?></td>
                                            <td class="button-container">
                                                <form action="edit_event.php" method="get">
                                                    <input type="hidden" name="Event_Id" value="<?php echo $row[" id"] ?>">
                                                    <input
                                                        class="btn btn-sm btn-success btn-bold btn-text-shadow btn-background btn-border"
                                                        type="submit" value="Edit">
                                                </form>
                                                <form action="admin_delete_event.php" method="post">
                                                    <input type="hidden" name="Event_Id" value="<?php echo $row[" id"] ?>">
                                                    <input
                                                        class="btn btn-sm btn-danger btn-bold btn-text-shadow btn-background btn-border"
                                                        type="submit" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
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
    </div>
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a></div>
    <!-- Libraries Loader -->
    <?php lib() ?>


    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var table = document.querySelector('#Event_table');
            var dataTable = new DataTable(table);
        });
    </script>

    </script>
</body>

</html>