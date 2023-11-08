<?php
ob_start();
if(!isset($_SESSION)) { 
    session_start();
} 

if ($_SESSION['role'] != 'admin'){
    header('Location:events.php'); 
}

include('shared_resources.php'); 

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
        padding: 10px; /* Adjust padding as needed */
        font-size: 12px; /* Adjust font size as needed */
        margin-left: 40px; /* Add margin for spacing between sign-in button and other elements */
        margin-top: 5px; /* Adjust margin-top to move the button down */
        color: #333; /* Set text color */
        cursor: pointer; /* Set cursor to pointer for better user experience */
    }

    #Event_table {
        width: 100%; /* Set table width to 100% */
        border-collapse: collapse; /* Collapse borders between table cells */
    }

    #Event_table th,
    #Event_table td {
        border: 1px solid #ccc; /* Add border to table cells */
        padding: 8px; /* Adjust padding for table cells */
        text-align: left; /* Align text to the left within cells */
    }

    #Event_table th {
        background-color: #f2f2f2; /* Set background color for table header cells */
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

    </style>
    
     <!-- Site Header Wrapper -->
    <?php load_common_page_header(2) ?>
    <!-- Main Content -->
    <div id="admin-container-id">
    	<div class="admin-content">
        	<div class="admin-container">
            	<div class="row">

                    <!-- Admin Side Menu Panel -->
                    <?php admin_side_menu() ?>
                    <div style="padding-top: 100px; padding-left: 450px; width:100%">
                        <a href="add_event.php" class="btn">Add new Event  </a>
                    </div>

                    <div class="toggle_columns" style="padding-top: 50px; padding-left: 450px; width:100%">
                        Toggle column: <!-- Add links to toggle columns as needed -->
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
                                $sql = "SELECT * FROM events"; // Modify this query to fetch events data
                                $result = $db->query($sql);

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
                                        echo "<form action='edit_event.php' method='get'>";
                                        echo "<input type='hidden' name='Event_Id' value='" . $row["Event_Id"] . "'>";
                                        echo "<input class='btn btn-sm btn-success' type='submit' value='Edit'/>";
                                        echo "</form>
                                        <br>";
                                        echo "<form action='admin_delete_event.php' method='post'>";
                                        echo "<input type='hidden' name='Event_Id' value='" . $row["Event_Id"] . "'>";
                                        echo "<input class='btn btn-sm btn-danger mx-2 my-2' type='submit' value='Delete'/>";
                                        echo "</form>";
                                        echo "</td>";
                                        echo "</tr>";
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