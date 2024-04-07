<?php
ob_start();
if (!isset ($_SESSION)) {
    session_start();
}

if ($_SESSION['role'] != 'Administrator') {
    header('Location:index.php');
}

#require 'bin/functions.php';
#require 'db_configuration.php';
include 'shared_resources.php';
//include 'blog_fill.php';
include 'event_controllers/event_fill.php';
include 'user_fill.php';
require_once "header/index.php";
require_once "bootstrap.php";
set_up_bootstrap();
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs
  ================================================== -->
    <!-- Include the favicon.ico file -->
    <?php generateFaviconLink() ?>
    <title>Admin Panel</title>
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

</head>

<body>


    </style>
    <!-- Site Header Wrapper -->
    <?php generate_header() ?>
    <!-- Main Content -->
    <div id="admin-container-id">
        <div class="admin-content">
            <div class="admin-container">
                <div class="row">

                    <!-- Admin Side Menu Panel -->
                    <?php admin_side_menu() ?>
                    <div class="a-container">
                        <div class="header">
                            <div class="nav">
                                <div class="search">
                                    <input type="text" placeholder="Search..">
                                    <button type="submit"><img src="search.png" alt=""></button>
                                </div>
                                <div class="user">
                                    <a href="#" class="btn"
                                        style="padding: 5px 25px; margin-left: 30px; margin-right: 50px;">Add New</a>
                                    <img src="notifications.png" alt="">
                                    <div class="img-case">
                                        <img src="user.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="cards">
                                <div class="card"
                                    style="margin-top: 10px; margin-bottom: 10px; margin-left: 30px; margin-right: 50px;">
                                    <div class="box">
                                        <h1>
                                            <?php //echo getAll__blog_comment_count() ?>
                                        </h1>
                                        <h3>Blogs</h3>
                                    </div>
                                    <div class="icon-case">
                                        <img src="students.png" alt="">
                                    </div>
                                </div>
                                <div class="card"
                                    style="margin-top: 10px; margin-bottom: 10px; margin-left: 30px; margin-right: 50px;">
                                    <div class="box">
                                        <h1>
                                            <?php //echo getAll__event_count() ?>
                                        </h1>
                                        <h3>Events</h3>
                                    </div>
                                    <div class="icon-case">
                                        <img src="teachers.png" alt="">
                                    </div>
                                </div>
                                <div class="card"
                                    style="margin-top: 10px; margin-bottom: 10px; margin-left: 30px; margin-right: 50px;">
                                    <div class="box">
                                        <h1>
                                            <?php echo getAll__user_count() ?>
                                        </h1>
                                        <h3>Users</h3>
                                    </div>
                                    <div class="icon-case">
                                        <img src="schools.png" alt="">
                                    </div>
                                </div>

                            </div>
                            <div class="content-2">
                                <div class="box">
                                    <div class="title">
                                        <h2>Recent Blogs</h2>
                                        <a href="#" class="btn">View All</a>
                                    </div>
                                    <table>
                                        <tr>
                                            <th>Name</th>
                                            <th>Topic</th>
                                            <th>Amount</th>
                                            <th>Option</th>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>St. James College</td>
                                            <td>$120</td>
                                            <td><a href="#" class="btn">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>St. James College</td>
                                            <td>$120</td>
                                            <td><a href="#" class="btn">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>St. James College</td>
                                            <td>$120</td>
                                            <td><a href="#" class="btn">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>St. James College</td>
                                            <td>$120</td>
                                            <td><a href="#" class="btn">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>St. James College</td>
                                            <td>$120</td>
                                            <td><a href="#" class="btn">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>St. James College</td>
                                            <td>$120</td>
                                            <td><a href="#" class="btn">View</a></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="new-students">
                                    <div class="title">
                                        <h2>New Users</h2>
                                        <a href="#" class="btn">View All</a>
                                    </div>
                                    <table>
                                        <tr>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>option</th>
                                        </tr>
                                        <tr>
                                            <td><img src="user.png" alt=""></td>
                                            <td>John Steve Doe</td>
                                            <td><img src="info.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td><img src="user.png" alt=""></td>
                                            <td>John Steve Doe</td>
                                            <td><img src="info.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td><img src="user.png" alt=""></td>
                                            <td>John Steve Doe</td>
                                            <td><img src="info.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td><img src="user.png" alt=""></td>
                                            <td>John Steve Doe</td>
                                            <td><img src="info.png" alt=""></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Site Footer -->
    <?php load_common_page_footer(2) ?>
    <!-- Libraries Loader -->
    <?php lib() ?>
</body>

</html>