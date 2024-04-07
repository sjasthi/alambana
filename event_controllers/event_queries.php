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

	return sanitize( $count["COUNT(*)"] );

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

function insert_event( $title, $description, $category, $information, $video_link, $event_date_start, $event_date_end, $location, $img_file, $user_id ) {
	
	$fileName = $img_file['name'];
	$fileTMP = $img_file['tmp_name'];
	$fileError = $img_file['error'];
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	if ($fileError === 0) {
		$fileNewName = uniqid('', true).".".$fileActualExt;
		$fileDestination = 'images/event_pictures/'.$fileNewName;
		move_uploaded_file($fileTMP, $fileDestination);
	
		$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
		if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		}
		$sql = "INSERT INTO events (title, description, category, information, video_link, event_date_start, event_date_end, location, user_id) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ? )";
		$statement = $connection->prepare($sql);
		$statement->bind_param("ssssssssi", $title, $description, $category, $information, $video_link, $event_date_start, $event_date_end, $location, $user_id );
		$result = $statement->execute();
		if ($result === true) {
			$last_id = mysqli_insert_id($connection);
			$connection->close();

			$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
			if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}
			$sql = "INSERT INTO pictures (user_id, event_id, location) VALUES ( ?, ?, ? )";
			$statement = $connection->prepare($sql);
			$statement->bind_param("iis", $user_id, $last_id, $fileDestination);
			$result = $statement->execute();

			$connection->close();
			return $last_id;
		} else {
			$connection->close();
			return false;
		}
	} else {
		return false;
	}
}

function update_event( $title, $description, $category, $information, $video_link, $event_date_start, $event_date_end, $location, $img_file, $event_id ) {

	$fileName = $img_file['name'];
    $fileTMP = $img_file['tmp_name'];
    $fileError = $img_file['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Check if there's an existing picture associated with the event
    $sqlSelectPicture = "SELECT location FROM pictures WHERE event_id=?";
    $statementSelectPicture = $connection->prepare($sqlSelectPicture);
    $statementSelectPicture->bind_param("i", $event_id);
    $statementSelectPicture->execute();
    $resultSelectPicture = $statementSelectPicture->get_result();

    if ($resultSelectPicture->num_rows > 0) {
        $row = $resultSelectPicture->fetch_assoc();
        $oldFileLocation = $row['location'];
        if (file_exists($oldFileLocation)) {
            unlink($oldFileLocation); // Delete the old picture file
        }
    }

    // Update event information
    $sql = "UPDATE events SET title=?, description=?, category=?, information=?, video_link=?, event_date_start=?, event_date_end=?, modified_time=CURRENT_TIMESTAMP, location=? WHERE id=?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("ssssssssi", $title, $description, $category, $information, $video_link, $event_date_start, $event_date_end, $location, $event_id);
    $result = $statement->execute();

    // Upload new picture
    if ($fileError === 0 && $fileName != "") {
        $fileNewName = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = 'images/event_pictures/' . $fileNewName;
        move_uploaded_file($fileTMP, $fileDestination);

        // Update picture location in the database
        $sqlUpdatePicture = "UPDATE pictures SET location = ? WHERE event_id=?";
        $statementUpdatePicture = $connection->prepare($sqlUpdatePicture);
        $statementUpdatePicture->bind_param("si", $fileDestination, $event_id);
        $resultUpdatePicture = $statementUpdatePicture->execute();
    }

    $connection->close();

    if ($result === true) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}

function delete_event($event_id) {

	$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Delete event picture if it exists
    $sqlSelectPicture = "SELECT location FROM pictures WHERE event_id=?";
    $statementSelectPicture = $connection->prepare($sqlSelectPicture);
    $statementSelectPicture->bind_param("i", $event_id);
    $statementSelectPicture->execute();
    $resultSelectPicture = $statementSelectPicture->get_result();

    if ($resultSelectPicture->num_rows > 0) {
        $row = $resultSelectPicture->fetch_assoc();
        $fileLocation = $row['location'];
        if (file_exists($fileLocation)) {
            unlink($fileLocation); // Delete the picture file
        }
    }

    // Delete event record
    $sqlDeleteEvent = "DELETE FROM events WHERE id=?";
    $statementDeleteEvent = $connection->prepare($sqlDeleteEvent);
    $statementDeleteEvent->bind_param("i", $event_id);
    $resultDeleteEvent = $statementDeleteEvent->execute();

    // Delete picture record
    $sqlDeletePicture = "DELETE FROM pictures WHERE event_id=?";
    $statementDeletePicture = $connection->prepare($sqlDeletePicture);
    $statementDeletePicture->bind_param("i", $event_id);
    $resultDeletePicture = $statementDeletePicture->execute();

    $connection->close();

    if ($resultDeleteEvent && $resultDeletePicture) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }
}

?>
