<?php
#require 'db_configuration.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}

# Event Fill Single Page
function fillEventPostSinglePage($EventId) {
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
  }

  // Use a prepared statement to prevent SQL injection
  $sql = "SELECT * FROM events WHERE Event_Id = ?";
  $stmt = $connection->prepare($sql);
  $stmt->bind_param("i", $EventId);
  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      $eventDate = $row['Event_Date'];
      $formattedDate = date_create_from_format('Y-m-d H:i:s', $eventDate)->format('j M Y');

      // Create a DateTime object from the event date string
      $dateTime = new DateTime($eventDate);

      // Extract date components
      $dayName = $dateTime->format('l');// Get the day name
      $day = $dateTime->format('j');      // Day (01 to 31)
      $month = $dateTime->format('M');    // Month (Jan, Feb, Mar, etc.)
      $year = $dateTime->format('Y');     // Year (e.g., 2024)

      // Extract time components
      $hour = $dateTime->format('H');     // Hour (00 to 23)
      $minute = $dateTime->format('i');   // Minute (00 to 59)
      $second = $dateTime->format('s');   // Second (00 to 59)
      $ampm = $dateTime->format('a');     // AM or PM

      $timeScheduled = $hour .":". $minute ." ". $ampm;

      # Video Link to Event
      if ($row["Video_Link"] != NULL) {
        $Event_video_link = ''; #'<a class="Event_video_link" href=' . $row["Video_Link"] . '> Video </a> ';
      } else {
        $Event_video_link = '';
      }
      # Photo to Event
      $picture_sql = "SELECT Location FROM event_pictures WHERE Event_Id = " . $row["Event_Id"];
      $picture_locations = $connection->query($picture_sql);
      $Event_photo = '';
      if ($picture_locations->num_rows > 0) {
        while($picture = $picture_locations->fetch_assoc()) {
          $Event_photo = $Event_photo . '<img src="'. $picture['Location'] . '" alt="">';

        }
      }
      $attendees = $row['Attendees'];
      $address = $row['Address'];
      
      if(empty($attendees)) $attendees = 0;
      if(empty($address)) $address = 'Please contact Aalambana for details on event location.';


      $eventBody = '
          <div class="col-md-8 content-block" id="event_single_page' . $row['Event_Id'] . '">
              <h3>' . $row['Title'] . '</h3>
              <div class="post-media">
                  ' . $Event_photo . '
                  ' . $Event_video_link . '
              </div>
              <div class="row">
                  <div class="col-md-6 col-sm-6">
                      <span class="event-date">
                            <span class="date">'.$day.'</span>
                            <span class="month">'.$month.'</span>
                            <span class="year">'.$year.'</span>
                          <!-- <span class="date">' . $formattedDate . '</span> -->
                      </span>
                      <span class="meta-data">' . $dayName . ', ' . $timeScheduled . ' - ' . $timeScheduled . '</span>
                      <a href="#" class="btn btn-primary btn-event-single-book">Book Tickets</a>
                  </div>
                  <div class="col-md-6 col-sm-6">
                      <ul class="list-group">
                          <li class="list-group-item">' . $attendees . '<span class="badge">Attendees</span></li>
                          <li class="list-group-item">' . $address . '<span class="badge">Location</span></li>
                      </ul>
                  </div>
              </div>
              <div class="spacer-20"></div>
              <p class="lead">' . nl2br($row['Description']) . '</p>
              <p>' . nl2br($row['Paragraph']) . '</p>
          </div>';

      echo $eventBody;
      $returnClassBlock = '';
      return $returnClassBlock;
  } else {
      echo "No Events have been posted!";
      return 0;
  }

  $stmt->close();
  $connection->close();
}

# Event Page Fill Box Display [owl-carousel]
function fill_event_post_display_container(){

  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $sql = "SELECT * FROM Events ORDER BY Event_Date ASC";
  $result = $connection->query($sql);

  $returnClassBlock = '';

  // Create Post from data from each row
  if ($result->num_rows > 0) {
    $number_of_posts = 0;
    //$number_of_pages = 1;
    
    $Event_body = '';
    
    while($row = $result->fetch_assoc()) {
      
        $eventDate = $row['Event_Date'];

        // Create a DateTime object from the event date string
        $dateTime = new DateTime($eventDate);

        // Extract date components
        $dayName = $dateTime->format('l');// Get the day name
        $day = $dateTime->format('j');      // Day (01 to 31)
        $month = $dateTime->format('M');    // Month (Jan, Feb, Mar, etc.)
        $year = $dateTime->format('Y');     // Year (e.g., 2024)

        // Extract time components
        $hour = $dateTime->format('H');     // Hour (00 to 23)
        $minute = $dateTime->format('i');   // Minute (00 to 59)
        $second = $dateTime->format('s');   // Second (00 to 59)
        $ampm = $dateTime->format('a');     // AM or PM

        $timeScheduled = $hour .":". $minute ." ". $ampm;

        # Video Link to Event
        if ($row["Video_Link"] != NULL) {
          $Event_video_link = ''; #'<a class="Event_video_link" href=' . $row["Video_Link"] . '> Video </a> ';
        } else {
          $Event_video_link = '';
        }
        # Photo to Event
        $picture_sql = "SELECT Location FROM event_pictures WHERE Event_Id = " . $row["Event_Id"];
        $picture_locations = $connection->query($picture_sql);
        $Event_photo = '';
        if ($picture_locations->num_rows > 0) {
          while($picture = $picture_locations->fetch_assoc()) {
            $Event_photo = $Event_photo . '<img src="'. $picture['Location'] . '" alt="" style="width: 390px; height: 240px;">';

          }
        }
        $attendees = $row['Attendees'];
        $address = $row['Address'];
        
        if(empty($attendees)) $attendees = 0;
        if(empty($address)) $address = 'Please contact Aalambana for details on event location.';


        # HTML Event Body Elements
        $Event_body .=
                    '<li class="item">
                        <div class="grid-item event-grid-item format-standard" id=eventboxitem' . $row['Event_Id'] . '>
                            <div class="grid-item-inner">
                                <a href="event-post.php?event_id=' . $row['Event_Id'] . '" class="media-box">
                                ' . $Event_photo . '
                                </a>'.$Event_video_link . '
                                <div class="grid-item-content">
                                    <span class="event-date">
                                        <span class="date">'.$day.'</span>
                                        <span class="month">'.$month.'</span>
                                        <span class="year">'.$year.'</span>
                                    </span>
                                    <span class="meta-data">'.$dayName.', '.$timeScheduled.' - '.$timeScheduled.'</span>
                                    <h3 class="post-title"><a href="event-post.php?event_id=' . $row['Event_Id'] . '">' . $row['Title'] . '</a></h3>
                                    <ul class="list-group">
                                        <li class="list-group-item">' . $attendees . '<span class="badge">Attendees</span></li>
                                        <li class="list-group-item">' . $address . '<span class="badge">Location</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>';
        
        
        $number_of_posts += 1;
      
    }

    $container_open = '<div class="padding-tb75 lgray-bg">
                          <div class="container">
                              <div class="text-align-center">
                                  <h2 class="block-title block-title-center">upcoming events</h2>
                              </div>
                              <div class="spacer-20"></div>
                              <div class="carousel-wrapper">
                                  <div class="row">
                                      <ul class="owl-carousel carousel-fw" id="news-slider" data-columns="3" data-autoplay="" data-pagination="yes" data-arrows="yes" data-single-item="no" data-items-desktop="3" data-items-desktop-small="2" data-items-tablet="1" data-items-mobile="1">
                                          ';

    $container_close = '
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>';
    //if ($number_of_posts < $MAX_VISIBLE_POSTS) { echo '</div>'; }// Catch last items of Row | Close Incomplete Page
    echo $container_open. $Event_body. $container_close;
    $returnClassBlock = '';
    return $returnClassBlock;
  } else {
    echo "No Events";
    return 0;
  }
  $connection->close();
}

function fill_form() { // NOT IN USE; ONLY AN EXAMPLE

  if (isset($_COOKIE['email']) and !isset($_POST['action'])){
    $student_email = $_COOKIE['email'];
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection === false) {
  	  die("Failed to connect to database: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM registrations Natural Join classes WHERE Student_Email = '$student_email'";
    $row = mysqli_fetch_array(mysqli_query($connection, $sql));

    $db_id = $row['Reg_Id'];
    $sponsor_name = $row['Sponsor_Name'];
    $sponsor_email = $row['Sponsor_Email'];
    $sponsor_phone = $row['Sponsor_Phone_Number'];
    $spouse_name = $row['Spouse_Name'];
    $spouse_email = $row['Spouse_Email'];
    $spouse_phone = $row['Spouse_Phone_Number'];
    $student_name = $row['Student_Name'];
    $student_email = $row['Student_Email'];
    $student_phone = $row['Student_Phone_Number'];
    $class = $row['Class_Name'];
    $cause = $row['Cause'];

  } else {
    $db_id = $_POST['Reg_Id'];
    $student_email = $_POST['students-email'];
    $sponsor_name = $_POST['sponsers-name'];
    $sponsor_email = $_POST['sponsers-email'];
    $sponsor_phone = $_POST['sponsers-phone'];
    $spouse_name = $_POST['spouses-name'];
    $spouse_email = $_POST['spouses-email'];
    $spouse_phone = $_POST['spouses-phone'];
    $student_name = $_POST['students-name'];

    $student_phone = $_POST['students-phone'];
    $class = $_POST['class'];
    $cause = $_POST['cause'];
  }
    echo "<div id= \"container_2\">
      <form id=\"survey-form\" action=\"form-submit.php\" method = \"post\">
        <input type='hidden' name='Reg_Id' value=$db_id>
        <!---Sponsors Section -->
        <label id=\"name-label\">Sponsor's Name</label>
        <input type=\"text\" id=\"sponsers-name\" name=\"sponsers-name\" class=\"form\" value=\"$sponsor_name\" required><br><!--name--->
        <label id=\"sponsers-email-label\"> Sponsor's Email</label>
        <input type=\"email\" id=\"sponsers-email\" name=\"sponsers-email\" class=\"form\" value=\"$sponsor_email\" required><br><!---email-->
        <label id=\"sponsors-number-label\">Sponsor's Phone Number</label>
        <input type=\"tel\" id=\"sponsers-phone\" name=\"sponsers-phone\" value=\"$sponsor_phone\" required>

        <br>
        <!---Spouse Section -->
        <label id=\"spouses-name-label\">Spouse's Name</label>
        <input type=\"text\" id=\"spouses-name\" name=\"spouses-name\" class=\"form\" value=\"$spouse_name\" required><br>
        <label id=\"spouses-email-label\"> Spouse's Email</label>
        <input type=\"email\" id=\"spouses-email\" name=\"spouses-email\" class=\"form\" value=\"$spouse_email\" required ><br>
        <label id=\"spouses-number-label\">Spouse's Phone Number</label>
        <input type=\"tel\" id=\"spouses-phone\" name=\"spouses-phone\" value=\"$spouse_phone\" required>

        <br>
        </div>
        <div id=\"right\">
        <!---Student Section -->
        <label id=\"students-name-label\">Student's Name</label>
        <input type=\"text\" id=\"students-name\" name=\"students-name\" class=\"form\" required value=\"$student_name\"><br>
        <label id=\"students-email-label\"> Student's Email</label>
        <input type=\"email\" id=\"students-email\" name=\"students-email\" class=\"form\" required value=\"$student_email\"><br
        <label id=\"students-number-label\">Student's Phone Number</label>
        <input type=\"tel\" id=\"students-phone\" name=\"students-phone\" value=\"$student_phone\" required>

        <br>
        <label id=\"class\">Select Class</label>
        <select id=\"dropdown\" name=\"role\" required>
          <option disabled value>
            Select your class
          </option>
          <option value=2";
            if ($class == "Python 101")
                echo "selected";
        echo  ">
            Python 101
          </option>
          <option value=1 ";
          if ($class == "Java 101")
              echo "selected";
        echo ">
            Java 101
          </option>
          <option value=4 ";
          if ($class == "Python 201")
              echo "selected";
        echo ">
            Python 201
          </option>
		  <option value=3 ";
          if ($class == "Java 201")
              echo "selected";
        echo ">
			Java 201
		  </option>
		</select>
		<!--dropdown--->
		<p><strong>Cause</strong></p>
		<label>
		  <input type=\"radio\" name=\"cause\" value=\"lib\" ";
          if ($cause == "Library")
              echo "checked=\"checked\"";
        echo ">Library
		</label>
		<br>
		<label>
		  <input type=\"radio\" name=\"cause\" value=\"Dig_class\" ";
          if ($cause == "Digital Classroom")
              echo "checked=\"checked\"";
        echo ">Digital Classroom</label>
		<label>
		  <br>
		  <input type=\"radio\" name=\"cause\" value=\"Other\" ";
          if ($cause == "No Preference")
              echo "checked=\"checked\"";
        echo "> No Preference
		</label><!---radioButtons--->
    </div>
    ";
}


# fetch Title
function geEventtTitleFromDatabase($EventId){
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  // Prepare SQL query to fetch Title based on EventId
  $sql = "SELECT Title FROM events WHERE Event_Id = $EventId";

  $result = $connection->query($sql);
  $title = "";

  if ($result->num_rows > 0) {
    // Fetch the Title from the database
    $row = $result->fetch_assoc();
    $title = $row['Title'];
  }

  // Close the connection
  $connection->close();

  return $title;
}
# fetch Paragraph
function getEventParagraphFromDatabase($EventId){
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  // Prepare SQL query to fetch Paragraph based on EventId
  $sql = "SELECT * FROM Events ORDER BY Event_Date ASC";

  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
    // Fetch the Paragraph from the database
    $row = $result->fetch_assoc();
    $paragraph = $row['Paragraph'];
  } else {
    // If no matching EventId found, return an empty string or handle it as per your requirement
    $paragraph = "";
  }

  // Close the connection
  $connection->close();

  return $paragraph;
}
# fetch Photo
function getEventPhotoFromDatabase($EventId){
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $eventPhoto = '';

  $sql = "SELECT Events.*, event_pictures.Location FROM Events
          LEFT JOIN event_pictures ON Events.Event_Id = event_pictures.Event_Id
          WHERE Events.Event_Id = $EventId
          ORDER BY Events.Event_Date ASC";

  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $eventPhoto = '<img src="' . $row['Location'] . '" alt="" style="width: 390px; height: 240px;">';
  }

  $connection->close();

  return $eventPhoto;
}


#####################################################
# fetch Page event Count
function getAll__event_count(){
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $sql = "SELECT COUNT(*) AS event_count FROM events";
  $result = $connection->query($sql);

  $events = 0;

  // Fetch the count directly
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $events = $row['event_count'];
  }

  $connection->close();
  return $events;
}
?>
