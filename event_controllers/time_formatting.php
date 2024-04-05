<?php
function get_event_day( $event_date ) {
	$date = new DateTime( $event_date );
	$day = $date->format('j');
	return $day;
}	

function get_event_month( $event_date ) {
	$date = new DateTime( $event_date );
	$month = $date->format("M");
	return $month;
}

function get_event_year( $event_date ) {
	$date = new datetime( $event_date );
	$year = $date->format('Y');
	return $year;
}

function format_date( $start_date, $end_date ) {
	
	// Create a DateTime object from the event date string
	$start_date_time = new DateTime($start_date);
	$end_date_time = new DateTime($end_date);
	// Extract date components
	$dayName = $start_date_time->format('l');// Get the day name
	$day = $start_date_time->format('j');      // Day (01 to 31)
	$month = $start_date_time->format('M');    // Month (Jan, Feb, Mar, etc.)
	$year = $start_date_time->format('Y');     // Year (e.g., 2024)
	
	// Extract time components
	$start_hour = $start_date_time->format('h');     // Hour (00 to 23)
	$start_minute = $start_date_time->format('i');   // Minute (00 to 59)
	$start_second = $start_date_time->format('s');   // Second (00 to 59)
	$start_ampm = $start_date_time->format('a');     // AM or PM

	$end_hour = $end_date_time->format('h');     // Hour (00 to 23)
	$end_minute = $end_date_time->format('i');   // Minute (00 to 59)
	$end_second = $end_date_time->format('s');   // Second (00 to 59)
	$end_ampm = $end_date_time->format('a');     // AM or PM

	$timeScheduled = $dayName . " " . $month . " " . $day . ", " . $start_hour . ":" . $start_minute . " " . $start_ampm . " - " . $end_hour . ":" . $end_minute . " " . $end_ampm;
	return $timeScheduled;
}

?>
