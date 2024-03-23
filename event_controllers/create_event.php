<?php
function create_event($title, $description, $information, $video_link, $event_date_start, $event_date_end, $location, $catagory, $user_id) {
    $connection = new mysqli( DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE );
    if ( $connection -> connect_error ) {
      die( "Connection failed: " . $connection -> connect_error );
    }
    $sql = "INSERT INTO events (title, description, information, video_link, event_date_start, event_date_end, attendees, location, user_id, catagory) VALUES (?, ?, ?, ?, ?)";
    $statement = $connection -> prepare( $sql );
    $statement -> bind_param( $title, $description, $information, $video_link, $event_date_start, $event_date_end, $attendees, $location, $user_id, $catagory );
    $result = $statement -> execute();
    if ( $result == true ) {
        $last_id = mysqli_insert_id( $connection );
        $connection -> close();
        return $last_id;
    } else {
        $connection -> close();
        return false;
    }
}
?>
