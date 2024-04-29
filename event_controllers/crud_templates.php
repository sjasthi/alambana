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
                        <a href="events.php?id=<?php echo $event["id"] . "&view=single_event"; ?>" class="media-box">
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
                            <h3 class="post-title"><a href="events.php?id=<?php echo $event["id"] . "&view=single_event"; ?>">
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
                    <a href="events.php?id=<?php echo $event["id"] . "&view=single_event"; ?>" class="media-box">
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
            <div class="widget sidebar-widget widget_categories">
                <h3 class="widgettitle">Event Categories</h3>
                <ul>
                    <?php
                    foreach($categories as $category) { ?>
                        <li data-option-value=".<?php echo str_replace( " ", "-", $category ); ?>"><a href="#"><span><?php echo $category; ?></span></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="widget recent_posts">
                <h3 class="widgettitle">Latest Postings</h3>
                <ul>
                    <!-- Side blog List (Lastest Postings) -->
                    <?php // fill_blog_post_side_container_small() ?>
                </ul>
            </div>
            <div class="widget widget_testimonials">
                <h3 class="widgettitle">Stories of change</h3>
                <div class="carousel-wrapper" style="background: none;">
                    <div class="row">
                        [under construction]
                    </div>
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
                                    href="events.php?id=<?php echo $event["id"] . "&view=single_event"; ?>">
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

function pagination( $view, $current_page, $eventsPerPage, $totalPages ) { ?>
    <nav>
        <ul class="pagination pagination-lg" <?php if( $view == "single_event" || $view == "create_event" || $view == "edit_event" )  echo "hidden"; ?>>
            <!-- Previous Page Link -->
            <?php if ($current_page > 1) { ?><li><a href="?current_page=<?php echo $current_page - 1; ?>&events_per_page=<?php echo $eventsPerPage; ?>&view=<?php echo $view; ?>">&laquo; Previous</a></li><?php }; ?>
            <!-- Page Number Links -->
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?><li <?php if ($i == $current_page) { echo 'class="active"'; } ?>><a href="?current_page=<?php echo $i; ?>&events_per_page=<?php echo $eventsPerPage; ?>&view=<?php echo $view; ?>" ><?php echo $i; ?></a></li><?php } ?>
            <!-- Next Page Link -->
            <?php if ($current_page < $totalPages) { ?><li><a href="?current_page=<?php echo $current_page + 1; ?>&events_per_page=<?php echo $eventsPerPage; ?>&view=<?php echo $view; ?>">Next &raquo;</a></li><?php } ?>
        </ul>
    </nav>
<?php 
}

function single_event( $categories, $events, $event_id ) {
    $event = get_event_by_id( $event_id ); 
    if ( isset( $_SESSION['role'] ) ) { $userRole = $_SESSION['role']; } ?>
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
                    <span class="meta-data">Category: <?php echo $event['category']; ?></span>
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
            <div class="form-group" <?php if ( !isset($userRole) || $userRole != "Administrator" )  echo "hidden"; ?>>
                <form action="" method="get">
                    <input type="hidden" name="id" value="<?php echo $event_id; ?>">
                    <button class="btn btn-primary" type="submit" name="view" id="view" value="edit_event" >Edit</button>
                    <button class="btn btn-primary" type="button" id="delete-event-button" >Delete</button>
                    <script>
                        const deleteEventButton = document.getElementById("delete-event-button");
                        deleteEventButton.addEventListener("click", () => {
                            let confirm = window.confirm("Are you sure you want to delete Event: <?php echo $event["title"]; ?>?");
                            if (confirm) {
                                $.ajax({
                                    type: "POST",
                                    url: "events.php?submit_event=delete",
                                    data: { id: <?php echo $event_id; ?> },
                                    success: function (res) {
                                        window.location.href = "events.php";
                                    }
                                });
                            }
                        });
                    </script>
                </form>
			</div>
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
<?php
}

function create_event() { ?>

    <div class="row">
        <a href="admin_events.php" class="btn btn-primary">Go to Events</a>
    </div>

    <div class="row">
        <br><br>
        <div class="col-md-6 mx-auto">
            <h1>Add new Event</h1>
            <form action="?submit_event=create" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Event Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                        <option value="Education">Education</option>
                        <option value="Water">Water</option>
                        <option value="Wild-Life">Wild-Life</option>
                        <option value="Human-Rights">Human-Rights</option>
                        <option value="Environment">Environment</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Event Description</label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>

                <div class="form-group">
                    <label for="information">Event Information</label>
                    <textarea name="information" class="form-control" id="information" rows="10" cols="61" ></textarea>
                </div>

                <div class="form-group">
                    <label for="video_link">Video Link</label>
                    <input type="text" class="form-control" name="video_link" id="video_link">
                </div>

                <div class="form-group">
                    <label for="event_date_start">Event Start Date</label>
                    <input type="datetime-local" class="form-control" name="event_date_start" id="event_date_start">

                    <label for="event_date_end">Event End Date</label>
                    <input type="datetime-local" class="form-control" name="event_date_end" id="event_date_end">
                </div>

                <div class="form-group">
                    <label for="location">Event location</label>
                    <input type="text" class="form-control" name="location" id="location">
                </div>

                <div class="form-group"> 
                    <label for="img_file">Event Image</label>
                    <input type="file" accept="image/*" class="form-control" onchange="loadFile(event)" name="img_file" id="img_file">
                        <img id="output"/>
                        <script>
                        var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
                            URL.revokeObjectURL(output.src) // free memory
                            }
                        };
                        </script>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name=submit" value="submit">Submit</button>
                    <button type="button" class="btn btn-primary" onclick="javascript:window.location='events.php';">Cancel</button>                
                </div>
            </form>
        </div>
    </div>
<?php
}

function edit_event( $categories, $events, $event_id ) { 
    $event = get_event_by_id( $event_id ); ?>
    <div class="row">
        <div class="col-md-8 content-block">
            <form action="?submit_event=update" method="post" enctype="multipart/form-data">
                <h3><input type="text" name="title" id="title" value="<?php echo $event["title"]; ?>"></h3>
                <div class="post-media">
                    <label>
                        <input type="file" accept="image/*" style="display: none;" onchange="loadFile(event)" name="img_file" id="img_file">
                        <img id="output" src="<?php echo $event["pic_location"] ?>"/>
                        <script>
                        var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
                            URL.revokeObjectURL(output.src) // free memory
                            }
                        };
                        </script>
                    </label>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <span class="meta-data">Category: 
                            <select name="category" id="category">
                                <option value="Education" <?php if ($event['category'] == "Education") echo 'selected'; ?>>Education</option>
                                <option value="Water" <?php if ($event['category'] == "Water") echo 'selected'; ?>>Water</option>
                                <option value="Wild-Life" <?php if ($event['category'] == "Wild-Life") echo 'selected'; ?>>Wild-Life</option>
                                <option value="Human-Rights" <?php if ($event['category'] == "Human-Rights") echo 'selected'; ?>>Human-Rights</option>
                                <option value="Environment" <?php if ($event['category'] == "Environment") echo 'selected'; ?>>Environment</option>
                            </select>
                        </span>
                        <span class="meta-data">
                            <input type="datetime-local" class="form-control" name="event_date_start" id="event_date_start" value="<?php echo form_value( $event["event_date_start"] ); ?>">
                            <input type="datetime-local" class="form-control" name="event_date_end" id="event_date_end" value="<?php echo form_value( $event["event_date_end"] ); ?>">
                        </span>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <?php echo $event["attendees"]; ?><span class="badge">Attendees</span>
                            </li>
                            <li class="list-group-item">
                                <input type="text" name="location" id="location" value="<?php echo $event["location"]; ?>"><span class="badge">Location</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="spacer-20"></div>
                <p class="lead">
                    <input type="text" name="description" id="description" value="<?php echo $event["description"]; ?>">
                </p>
                <p>
                    <input type="text" name="video_link" id="video_link" value="<?php echo $event["video_link"]; ?>">
                </p>
                <p>
                    <textarea name="information" id="information" rows="10" cols="84" ><?php echo $event["information"]; ?></textarea>
                </p>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name=submit" value="submit">Submit</button>
                    <button type="button" class="btn btn-primary" onclick="javascript:window.location='events.php?view=single_event&id=<?php echo $event_id; ?>';">Cancel</button>                
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $event['id']; ?>">
            </form>
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
<?php
}

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
