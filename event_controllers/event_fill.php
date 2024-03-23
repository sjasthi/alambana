<?php
include 'get_events.php';
include 'time_formatting.php';
# Event Page Fill Box Display [owl-carousel]
function fill_event_post_display_container(){

  // Create connection
	$events = get_events( "", 0, 100 );
	foreach( $events as $event ) { ?>
		
		<li class="item">
		<div class="grid-item event-grid-item format-standard" id=eventboxitem <?php echo $event['id']; ?>>
			<div class="grid-item-inner">
			<a href="single-event.php?id=<?php echo $event["id"]; ?>" class="media-box">
				<img src="<?php echo $event["pic_location"]; ?>" alt="">
            </a>
                <div class="grid-item-content">
                <span class="event-date">
                <span class="date"><?php echo get_event_day( $event["event_date_start"] ); ?></span>
				<span class="month"><?php echo get_event_month( $event["event_date_start"] ); ?></span>
				<span class="year"><?php echo get_event_year( $event["event_date_start"] ); ?></span>
				</span>
                <span class="meta-data"><?php echo format_date( $event["event_date_start"], $event["event_date_end"] ); ?></span>
				<h3 class="post-title"><a href="single-event.php?id=<?php echo $event['id']; ?>"><?php echo $event['title']; ?></a></h3>
				<ul class="list-group">
				<li class="list-group-item"><?php echo $event['attendees']; ?><span class="badge">Attendees</span></li>
				<li class="list-group-item"><?php echo $event['location']; ?><span class="badge">Location</span></li>

				</ul>
				</div>
			</div>
        </div>
    </li>
	<?php }
} ?>
