<?php
// gets events with options for past and upcoming events use get_events("") to get all events
function get_events( $tense, $offset, $events_per_page ) {
	$events = array();
	$connection = new mysqli( DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE );

	if ( $connection -> connect_error ) {
      die("Connection failed: " . $connection -> connect_error);
    }

	if( strtolower( $tense ) == "past" ) {
		$sql = "SELECT events.*, pictures.location AS pic_location 
				FROM events JOIN pictures ON events.id = pictures.event_id 
				WHERE event_date_start <= CURRENT_TIME 
				ORDER BY events.event_date_start DESC LIMIT $events_per_page OFFSET $offset";
	} elseif( strtolower( $tense ) == "upcoming" ) {
		$sql = "SELECT events.*, pictures.location AS pic_location 
				FROM events JOIN pictures ON events.id = pictures.event_id 
				WHERE event_date_start > CURRENT_TIME 
				ORDER BY events.event_date_start DESC LIMIT $events_per_page OFFSET $offset";
	} else {
		$sql = "SELECT events.*, pictures.location AS pic_location 
				FROM events JOIN pictures ON events.id = pictures.event_id 
				ORDER BY events.event_date_start DESC LIMIT $events_per_page OFFSET $offset";
	}

	$result = $connection -> query( $sql );
	$events = $result -> fetch_all( MYSQLI_ASSOC );
	$result -> free_result();
	$connection -> close();
	return sanitize( $events );
}

// gets a single event using the events id
function get_event_by_id( $id ) {
	$connection = new mysqli( DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE );

	if ( $connection -> connect_error ) {
      die("Connection failed: " . $connection -> connect_error);
    }

	$sql = "SELECT events.*, pictures.location AS pic_location 
			FROM events JOIN pictures ON events.id = pictures.event_id 
			WHERE events.id = '$id'";
	$result = $connection -> query( $sql );
	$event = $result -> fetch_assoc();
	$result -> free_result();
	$connection -> close();

	return sanitize( $event );
}

// gets the count of events in the database
function event_count() {
	$connection = new mysqli( DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE );

	if ( $connection -> connect_error ) {
      die("Connection failed: " . $connection -> connect_error);
    }

	$sql = "SELECT COUNT(*) FROM events";
	$result = $connection -> query( $sql );
	$count = $result -> fetch_assoc();
	$result -> free_result();
	$connection -> close();

	return sanitize( $count );

}

// gets the categories of events in the database
function get_event_categories() {
	$connection = new mysqli( DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE );
	if ( $connection -> connect_error ) {
      die("Connection failed: " . $connection -> connect_error);
    }

	$sql = "SELECT events.category FROM events";

	$result = $connection -> query( $sql );
	$events = $result -> fetch_all( MYSQLI_ASSOC );
	$event_categories = array_unique( array_column( $events, 'category' ) );
	$result -> free_result();
	$connection -> close();
	return sanitize( $event_categories );
}

// iterates through the query and sanitizes it with htmlspecialchars
function sanitize( $arr ) {
    return ( is_array( $arr ) ) ? array_map( 'sanitize', $arr ) : htmlspecialchars( $arr, ENT_QUOTES, 'UTF-8' );
}

?>
