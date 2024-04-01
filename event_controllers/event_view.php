<?php
include 'event_controllers/time_formatting.php';

function grid_view( $categories, $events ) {
?>
    <div class="grid-filter">
        <ul class="nav nav-pills sort-source" data-sort-id="gallery" data-option-key="filter">
            <li data-option-value="*" class="active"><a href="#"><i class="fa fa-th"></i> <span>Show
                        All</span></a></li>
            <?php foreach ($categories as $category) { ?>
                <li data-option-value=".<?php echo str_replace(" ", "-", $category); ?>"><a
                        href="#"><span>
                            <?php echo $category; ?>
                        </span></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="row">
        <ul class="sort-destination isotope gallery-items" data-sort-id="gallery">
            <?php foreach ($events as $event) { ?>
                <li
                    class="col-md-4 col-sm-6 grid-item event-grid-item <?php echo str_replace(" ", "-", $event["category"]); ?> format-standard">
                    <div class="grid-item-inner">
                        <a href="single-event.php?id=<?php echo $event["id"]; ?>" class="media-box">
                            <img src="<?php echo $event["pic_location"]; ?>" alt="">
                        </a>
                        <div class="grid-item-content">
                            <span class="event-date">
                                <span class="date">
                                    <?php echo get_event_day($event["event_date_start"]); ?>
                                </span>
                                <span class="month">
                                    <?php echo get_event_month($event["event_date_start"]); ?>
                                </span>
                                <span class="year">
                                    <?php echo get_event_year($event["event_date_start"]); ?>
                                </span>
                            </span>
                            <span class="meta-data">
                                <?php echo format_date($event["event_date_start"], $event["event_date_end"]); ?>
                            </span>
                            <h3 class="post-title"><a href="single-event.php?id=<?php echo $event["id"]; ?>">
                                    <?php echo $event["title"]; ?>
                                </a></h3>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <?php echo $event["attendees"]; ?><span class="badge">Attendees</span>
                                </li>
                                <li class="list-group-item">
                                    <?php echo $event["location"]; ?><span class="badge">Location</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- Page Pagination -->
    <nav>
        <ul class="pagination pagination-lg">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
<?php
}

function list_view( $categories, $events ) {
?>
    <div class="row">
        <div class="col-md-8 content-block">
            <?php foreach ($events as $event) { ?>
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

                <?php if ( !empty( $event['pic_location'] ) ) { ?>
                    <a href="single-event.php?id=<?php echo $event['id']; ?>" class="media-box">
                        <img src="<?php echo $event['pic_location']; ?>">
                    </a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>

        <!-- Sidebar -->
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
        <div class="col-md-4 sidebar-block">
            <div class="widget sidebar-widget widget_categories">
                <h3 class="widgettitle">Event Categories</h3>
                <ul>
                    <?php
                    
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
<?php 
} 

function calandar_view( $categories, $events ) {
?>
    <div class="row">
        <div class="col-md-8 content-block">
            <ul class="events-list">
                <?php foreach ($events as $event) { ?>
                    <li class="event-list-item">
                        <span class="event-date">
                            <span class="date">
                                <?php echo get_event_day($event["event_date_start"]); ?>
                            </span>
                            <span class="month">
                                <?php echo get_event_month($event["event_date_start"]); ?>
                            </span>
                            <span class="year">
                                <?php echo get_event_year($event["event_date_start"]); ?>
                            </span>
                        </span>
                        <div class="event-list-cont">
                            <span class="meta-data">
                                <?php echo format_date($event["event_date_start"], $event["event_date_end"]); ?>
                            </span>
                            <h4 class="post-title"><a
                                    href="single-event.php?id=<?php echo $event["id"]; ?>">
                                    <?php echo $event["title"]; ?>
                                </a></h4>
                            <p>
                                <?php echo $event["description"]; ?>
                            </p>
                            <a href="#" class="btn btn-default">Book Tickets</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4 sidebar-block">
            <div class="widget sidebar-widget widget_categories">
                <h3 class="widgettitle">Event Categories</h3>
                <ul>
                    <?php
                    $categories = get_event_categories();
                    foreach ($categories as $category) { ?>
                        <li data-option-value=".<?php echo str_replace(" ", "-", $category); ?>">
                            <a href="#"><span>
                                    <?php echo $category; ?>
                                </span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="widget widget_recent_causes">
                <h3 class="widgettitle">Latest Causes</h3>
                <ul>
                    <li>
                        <a href="#" class="cause-thumb">
                            <img src="images/cause1.jpg" alt="" class="img-thumbnail">
                            <div class="cProgress" data-complete="88" data-color="42b8d4">
                                <strong></strong>
                            </div>
                        </a>
                        <h5><a href="single-cause.php">Help small shopkeepers of Sunyani</a></h5>
                        <span class="meta-data">10 days left to achieve</span>
                    </li>
                    <li>
                        <a href="#" class="cause-thumb">
                            <img src="images/cause5.jpg" alt="" class="img-thumbnail">
                            <div class="cProgress" data-complete="75" data-color="42b8d4">
                                <strong></strong>
                            </div>
                        </a>
                        <h5><a href="single-cause.php">Save tigers from poachers</a></h5>
                        <span class="meta-data">32 days left to achieve</span>
                    </li>
                    <li>
                        <a href="#" class="cause-thumb">
                            <img src="images/cause6.jpg" alt="" class="img-thumbnail">
                            <div class="cProgress" data-complete="88" data-color="42b8d4">
                                <strong></strong>
                            </div>
                        </a>
                        <h5><a href="single-cause.php">Help rebuild Nepal</a></h5>
                        <span class="meta-data">10 days left to achieve</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php
}

function single_event( $categories, $events) {
    ?>
    <div class="row">
        <div class="col-md-8 content-block">
            <h3>
                <?php echo $event["title"]; ?>
            </h3>
            <div class="post-media">
                <img src="<?php echo $event["pic_location"] ?>" alt="">
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <span class="event-date">
                        <span class="date">
                            <?php echo get_event_day($event["event_date_start"]); ?>
                        </span>
                        <span class="month">
                            <?php echo get_event_month($event["event_date_start"]); ?>
                        </span>
                        <span class="year">
                            <?php echo get_event_year($event["event_date_start"]); ?>
                        </span>
                    </span>
                    <span class="meta-data">
                        <?php echo format_date($event["event_date_start"], $event["event_date_end"]); ?>
                    </span>
                    <a href="#" class="btn btn-primary btn-event-single-book">Book Tickets</a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <?php echo $event["attendees"]; ?><span class="badge">Attendees</span>
                        </li>
                        <li class="list-group-item">
                            <?php echo $event["location"]; ?><span class="badge">Location</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="spacer-20"></div>
            <p class="lead">
                <?php echo $event["description"]; ?>
            </p>
            <p>
                <?php echo $event["information"]; ?>
            </p>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4 sidebar-block">
            <div class="widget widget_recent_causes">
                <h3 class="widgettitle">Latest Causes</h3>
                <ul>
                    <li>
                        <a href="#" class="cause-thumb">
                            <img src="images/cause1.jpg" alt="" class="img-thumbnail">
                            <div class="cProgress" data-complete="88" data-color="42b8d4">
                                <strong></strong>
                            </div>
                        </a>
                        <h5><a href="single-cause.php">Help small shopkeepers of Sunyani</a></h5>
                        <span class="meta-data">10 days left to achieve</span>
                    </li>
                    <li>
                        <a href="#" class="cause-thumb">
                            <img src="images/cause5.jpg" alt="" class="img-thumbnail">
                            <div class="cProgress" data-complete="75" data-color="42b8d4">
                                <strong></strong>
                            </div>
                        </a>
                        <h5><a href="single-cause.php">Save tigers from poachers</a></h5>
                        <span class="meta-data">32 days left to achieve</span>
                    </li>
                    <li>
                        <a href="#" class="cause-thumb">
                            <img src="images/cause6.jpg" alt="" class="img-thumbnail">
                            <div class="cProgress" data-complete="88" data-color="42b8d4">
                                <strong></strong>
                            </div>
                        </a>
                        <h5><a href="single-cause.php">Help rebuild Nepal</a></h5>
                        <span class="meta-data">10 days left to achieve</span>
                    </li>
                </ul>
            </div>
            <div class="widget sidebar-widget widget_categories">
                <h3 class="widgettitle">Event Categories</h3>
                <ul>
                    <?php
                    $categories = get_event_categories();
                    foreach ($categories as $category) { ?>
                        <li data-option-value=".<?php echo str_replace(" ", "-", $category); ?>"><a
                                href="#"><span>
                                    <?php echo $category; ?>
                                </span></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="widget recent_posts">
                <h3 class="widgettitle">Latest Posts</h3>
                <ul>
                    <li>
                        <a href="single-post.php" class="media-box">
                            <img src="images/post1.jpg" alt="">
                        </a>
                        <h5><a href="single-post.php">A single person can change million lives</a></h5>
                        <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                    </li>
                    <li>
                        <a href="single-post.php" class="media-box">
                            <img src="images/post3.jpg" alt="">
                        </a>
                        <h5><a href="single-post.php">Donate your woolens this winter</a></h5>
                        <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                    </li>
                    <li>
                        <a href="single-post.php" class="media-box">
                            <img src="images/post2.jpg" alt="">
                        </a>
                        <h5><a href="single-post.php">How to survive the tough path of life</a></h5>
                        <span class="meta-data grid-item-meta">Posted on 06th Dec, 2015</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>

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