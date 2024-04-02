<?php
if ( !isset( $_SESSION ) ) { 
    session_start();
} 

include 'shared_resources.php';
include 'feedback_fill.php';
include 'event_controllers/get_events.php';
include 'event_controllers/templates.php';
require_once "header/index.php";
require_once "bootstrap.php";

set_up_bootstrap();
if ( isset( $_SESSION['role'] ) ) {
    $userRole = $_SESSION['role'];
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
        <title>Aalambana - Events</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <!-- css
        ================================================== -->
        <?php css() ?>

        <style>
                .event {
                    margin-bottom: 30px; /* Adds space below each event */
                    padding: 15px; /* Adds padding inside each event container */
                    border-bottom: 1px solid #ccc; /* Adds a border line below each event */
                }
            </style>
            <?php load_common_page_scripts() ?>
        <style>
                /* Style for the custom button label */
                .custom-file-upload {
                    display: inline-block;
                    padding: 6px 12px;
                    cursor: pointer;
                    background-color: #007bff;
                    color: #fff;
                    border: 1px solid #007bff;
                    border-radius: 5px;
                }

                /* Hide the actual file input element */
                #imageUpload {
                    display: none;
                }
        </style>
    </head>


    <body>
        <div class="body">
            <?php generate_header(); ?>

            <div class="hero-area">
                <div class="page-banner parallax" id="banner" style="background-image:url(images/parallax6.jpg);">
                    <div class="container">
                        <div class="page-banner-text">
                            <h1 class="block-title">Events</h1>
                            <?php if (isset($userRole) && $userRole === "admin") {
                                // Display the "Change Image" button for admin users
                                echo '<label for="imageUpload" class="custom-file-upload">Change Banner Image</label>';
                                echo '<input type="file" id="imageUpload" accept="image/*" multiple="multiple">';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const imageUpload = document.getElementById('imageUpload');
                const banner = document.getElementById('banner');

                // Retrieve the stored image URL from local storage on page load
                const storedImageUrl = localStorage.getItem('blog_Banner');
                if (storedImageUrl) {
                    banner.style.backgroundImage = `url(${storedImageUrl})`;
                }

                imageUpload.addEventListener('change', function () {
                    const file = imageUpload.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            banner.style.backgroundImage = `url(${e.target.result})`;

                            // Store the selected image URL for Page 1 in local storage
                            localStorage.setItem('blog_Banner', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            </script>

        
            <style>
                .content {
                display: flex;
                align-items: flex-start; /* Align items at the top */
                }
                #search_bar {
                width: 350px; /* Set a fixed width for the TOC */
                margin-right: 100px; /* Add margin between TOC and main content */
                }
                #blog_TOC {
                width: 250px; /* Set a fixed width for the TOC */
                margin-right: -110px; /* Add margin between TOC and main content */
                }
                #TOC_list {
                width: 250px; /* Set a fixed width for the TOC */
                margin-right: 100px; /* Add margin between TOC and main content */
                }
                #main-container {
                flex: 1; /* Allow the main container to take remaining space */
                }
            </style>
            <?php
            // Define the number of events per page (default to 3)
            $eventsPerPage = isset( $_GET['events_per_page'] ) ? ( int )$_GET['events_per_page'] : 10;
            $view = isset( $_GET['view'] ) ? $_GET['view'] : "list";

            // Calculate the total number of pages
            $totalEvents = event_count();
            $totalPages = ceil( $totalEvents / $eventsPerPage );

            // Get the current page number from the URL parameters, default to 1 if not set
            $current_page = isset( $_GET['current_page'] ) ? ( int )$_GET['current_page'] : 1;

            // Calculate the offset for the SQL query
            $offset = ( $current_page - 1 ) * $eventsPerPage;

            $events = get_events( "", $offset, $eventsPerPage );
            $categories = get_event_categories();
            ?>
            
            <div id="main-container">
                <div class="content">
                    <div class="container">
                        <form action="" method="get" <?php if( $view == "single-event" )  echo "hidden"; ?>>
                            <label for="events_per_page">Events per page:</label>
                            <select name="events_per_page" id="events_per_page" onchange="this.form.submit()">
                                <?php for( $i = 1; $i < 11; $i++ ) { ?>
                                <option value="<?php echo $i; ?>" <?php if ( $eventsPerPage == $i ) echo 'selected'; ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <label for="view">View:</label>
                            <select name="view" id="view" onchange="this.form.submit()">
                                <option value="list" <?php if ($view == "list") echo 'selected'; ?>>list</option>
                                <option value="grid" <?php if ($view == "grid") echo 'selected'; ?>>grid</option>
                                <option value="calendar" <?php if ($view == "calendar") echo 'selected'; ?>>calendar</option>
                            </select>
                        </form>                        
                        <?php
                        pagination( $view, $current_page, $eventsPerPage, $totalPages );
                        switch( $view ) {
                            case "list": list_view( $categories, $events ); break;
                            case "grid": grid_view( $categories, $events ); break;
                            case "calendar": calandar_view( $categories, $events ); break;
                            case "single-event": single_event( $categories, $events, $_GET["id"] ); break;
                        } 
                        pagination( $view, $current_page, $eventsPerPage, $totalPages );
                        ?>                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Site Footer -->
        <?php load_common_page_footer() ?>
        <!-- Libraries Loader -->
        <?php lib() ?>
        <!-- Style Switcher Start -->
        <?php style_switcher() ?>
    </body>
</html>

