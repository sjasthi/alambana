<?php
if ( !isset( $_SESSION ) ) { 
    session_start();
} 

include 'shared_resources.php';
include 'feedback_fill.php';
include 'event_controllers/get_events.php';
include 'event_controllers/time_formatting.php';
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
      <div class="page-banner parallax" id="banner" style="background-image:url(images/event_banner.jpg);">
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
$eventsPerPage = isset( $_GET['events_per_page'] ) ? ( int )$_GET['events_per_page'] : 3;

// Calculate the total number of pages
$totalEvents = event_count();
$totalPages = ceil( ( int )$totalEvents / $eventsPerPage );

// Get the current page number from the URL parameters, default to 1 if not set
$current_page = isset( $_GET['current_page'] ) ? ( int )$_GET['current_page'] : 1;

// Calculate the offset for the SQL query
$offset = ( $current_page - 1 ) * $eventsPerPage;

$events = get_events( "", $offset, $eventsPerPage );
?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 content-block">
                    <!-- Event Per Page Selection Form -->
                    <form action="" method="get">
                        <label for="events_per_page">Events per page:</label>
                        <select name="events_per_page" id="events_per_page" onchange="this.form.submit()">
                            <option value="3" <?php if ( $eventsPerPage == 3 ) echo 'selected'; ?>>3</option>
                            <option value="5" <?php if ( $eventsPerPage == 5 ) echo 'selected'; ?>>5</option>
                            <option value="10" <?php if ( $eventsPerPage == 10 ) echo 'selected'; ?>>10</option>
                        </select>
                    </form>
                    <?php foreach ($events as $event): ?>
    <div class="event">
        <h3><?php echo $event['title']; ?></h3>
        <p><?php echo $event['description']; ?></p>
        <p>Date: <?php echo format_date( $event['event_date_start'], $event['event_date_end'] ); ?></p>

        <?php 
        if ( !empty( $event['video_link'] ) ) {
            $embedURL = transformYouTubeURL( $event['video_link'] ); // Transform the URL
            if ( !empty( $embedURL ) ) {
                echo '<div class="video-container">';
                echo '<iframe width="560" height="315" src="' . htmlspecialchars( $embedURL ) . '" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
            }
        }
        ?> 

        <?php if ( !empty( $event['pic_location'] ) ) : ?>
            <a href="event_controllers/single-event.php?id=<?php echo $event['id']; ?>" class="media-box">
                <img src="<?php echo $event['pic_location']; ?>">
            </a>
        <?php endif; ?>

    </div>
<?php endforeach; ?>
                    <!-- Pagination Links -->
                    <div class="pagination">
                        <!-- Previous Page Link -->
                        <?php if ($current_page > 1): ?>
                            <a href="?current_page=<?php echo $current_page - 1; ?>&events_per_page=<?php echo $eventsPerPage; ?>">&laquo; Previous</a>
                        <?php endif; ?>

                        <!-- Page Number Links -->
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="?current_page=<?php echo $i; ?>&events_per_page=<?php echo $eventsPerPage; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>>
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>

                        <!-- Next Page Link -->
                        <?php if ($current_page < $totalPages): ?>
                            <a href="?current_page=<?php echo $current_page + 1; ?>&events_per_page=<?php echo $eventsPerPage; ?>">Next &raquo;</a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Event Per Page Selection Form 
                <form action="" method="get">
                    <label for="events_per_page">Events per page:</label>
                    <select name="events_per_page" id="events_per_page" onchange="this.form.submit()">
                        <option value="3" <?php if ($eventsPerPage == 3) echo 'selected'; ?>>3</option>
                        <option value="5" <?php if ($eventsPerPage == 5) echo 'selected'; ?>>5</option>
                        <option value="10" <?php if ($eventsPerPage == 10) echo 'selected'; ?>>10</option>
                    </select>
                </form><br>-->
                
                <div class="col-md-4 sidebar-block">
                    <div class="widget sidebar-widget widget_search" id="search_bar">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter your keywords">
                            <span class="input-group-btn">
                            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <br><br><br> 
                <div class="col-md-4 sidebar-block">
                    <div class="widget sidebar-widget widget_categories">
                        <h3 class="widgettitle">Event Categories</h3>
						<ul>
							<?php
							$categories = get_event_categories();
							foreach($categories as $category) { ?>
								<li data-option-value=".<?php echo str_replace( " ", "-", $category ); ?>"><a href="#"><span><?php echo $category; ?></span></a></li>
							<?php } ?>
						</ul>
                    </div>
                </div>
                <div class="col-md-4 sidebar-block">
                    <!-- Side blog List (Lastest Postings) -->
                    <?php // fill_blog_post_side_container_small() ?>
                </div>
                
                <div class="widget widget_testimonials">
                    <h3 class="widgettitle">Stories of change</h3>
                    <div class="carousel-wrapper" style="background: none;">
                        <div class="row">
                            <?php //fill_feedback_comments_carousel() ?>
                        </div>
                    </div>
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

<?php
function transformYouTubeURL($url) {
    // Parse the URL to extract its components
    $parsedUrl = parse_url($url);
    if ($parsedUrl === false) {
        return ''; // Invalid URL
    }

    // Check for the short YouTube URL format (youtu.be)
    if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'youtu.be') {
        $videoId = ltrim($parsedUrl['path'], '/');
        return 'https://www.youtube.com/embed/' . $videoId;
    } 
    // Check for the standard YouTube URL format
    elseif (isset($parsedUrl['host']) && in_array($parsedUrl['host'], ['www.youtube.com', 'youtube.com'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['v'])) {
            return 'https://www.youtube.com/embed/' . $queryParams['v'];
        }
    }
    // Return empty string if URL does not match YouTube formats
    return '';
}
?>



