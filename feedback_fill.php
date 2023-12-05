<?php

use PhpOffice\PhpPresentation\Shape\Chart\Title;

//require 'db_configuration.php';
//require 'update_current_page.php';

$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}
//define('MAX_VISIBLE_POSTS', 5); // Replace 5 with your desired value
// Define the number of feedbacks per page (default to 3)
$MAX_VISIBLE_POSTS = intval(get_session_value()); //intval(3);
if (empty($MAX_VISIBLE_POSTS)) $MAX_VISIBLE_POSTS = intval(3);

$MAX_NAV_BUTTONS = intval(3);
//$current_page = isset($_GET['current_page']) ? intval($_GET['current_page']) : intval(1); // intval ensure (INT | Variable Security)



# Comments
function fill_feedback_comments($Hidden=0)
{
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }
  $returnClassBlock = '';

  $targetHidden = $Hidden; // Specify the target feedback_Id you want to select
  $sql = "SELECT * FROM feedback_comments WHERE Hidden = $targetHidden ORDER BY Created_Time ASC";
  $result = $connection->query($sql);

  // fetch Comment Post from data from each row | If data exist
  if ($result->num_rows > 0) {

    $is_new_topic = -1;
    $is_parent = 0;
    $is_subline = 0;
    $button_id = 1;
    $feedback_body = "";
    $feedback_reply_field = "";

    

    while ($row = $result->fetch_assoc()) { // start in first row

      $reply_button = '';
      $emailAddress = $row['Email'];
      # Photo to blog user id
      $user_photo_path = getUserPhotoFromDatabase($emailAddress);
      $user_photo_id = (!empty($user_photo_path)) && file_exists($user_photo_path) 
                     ? $user_photo_path : "images/default.jpg";

        $formAction = ""; #create_comment_post($targetfeedbackId); // Set the form action for creating
        $submitAction = "create_comment_post";

        if ($is_parent == 1) {
          $feedback_body .= $feedback_reply_field;
        } // reset for new parent; close parent tree


        # Intial HTML feedback Comment Body Elements
       
        $feedback_body .=
          '
          <li>
              <div class="post-comment-parent-block"> 
                <img src="' . $user_photo_id . '" alt="avatar" class="img-thumbnail" style="width:75px;height:70px;">
                      <div class="post-comment-content">'
          . '' .
          '<h5>' . $row['Name'] . ' <span>says</span></h5>
                          <span class="meta-data">' . $row['Created_Time'] . '</span>
                          <p>' . nl2br($row['Paragraph']) . '</p>
                      </div>
              </div>
                    

          ';
        $is_parent = 1;
        $button_id++;
      
      if (isset($_SESSION['role'])) { // Verify SESSION
        $feedback_reply_field = '
            <form id="feedback_reply_form' . ($button_id - 1) . '" action="' . $formAction . '" method="POST" enctype="multipart/form-data" hidden="hidden">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                          <textarea name="comment_paragraph" cols="50" rows="1" class="form-control input-lg" placeholder="Your comment reply"></textarea>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group">
                      <div class="col-md-12">
                          <button type="submit" class="btn btn-primary btn-lg"; name="' . $submitAction . '">Submit your reply</button>
                      </div>
                  </div>
              </div>
          </form>
        </li>'; // close parent tree
      } else {
        $feedback_reply_field = '';
      }
    }
    if ($is_subline == 1) {
      $feedback_body .= '</ul>';
    } // if last contained child branch; close child branch    
    if ($feedback_body != "") {
      echo $feedback_body; //.$feedback_video_link;
      echo $feedback_reply_field; // close parent tree
    }
  } else {
    echo $returnClassBlock;
  }
  $connection->close();
}

# Page List Items
function fill_feedback_page_list()
{
  global $MAX_VISIBLE_POSTS;
  echo '
     
    <label for="list-count">Select Number of Post :</label>
    <select id="list-count">
        <option value="">List Number Of Page(s)</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option> <!-- Set as default -->
        <option value="5">5</option>
        <option value="10">10</option>
    </select>

    <script>
        var MAX_VISIBLE_POSTS = 3; // Initialize MAX_VISIBLE_POSTS with PHP value

        // UPDATE SERVER FOR NUMBER OF POST ITEMS ON PAGE
        document.getElementById("list-count").addEventListener("change", function() {
            var selectedValue = this.value;
            
            // Make an AJAX request to update the server with the count
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "update_server_page_list_number.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // var confirmation = confirm(xhr.responseText);
                    console.log("Server response:", xhr.responseText);

                    // Save selected option based on the userSelectedValue
                    document.getElementById("list-count").value = selectedValue;

                    // Reload the page after updating the server
                    location.reload();
                }
            };

            // Send the count as a parameter
            xhr.send("elementCount=" + selectedValue);
        });




        function fetchfeedbackContent() {
          var contentPage = "page";
          removeAllfeedbackContent_ContainsString(contentPage);
          //<?php echo fill_feedback(); ?>
        }

        function removeSinglefeedbackContent_ContainsString(pageContentName) {
          // Find the parent element by its id
            var parentElement = document.getElementById(pageContentName);

            // Check if the parent element exists
            if (parentElement) {
                // Remove the parent element
                parentElement.remove();
            }
        }

        function removeAllfeedbackContent_ContainsString(pageContentName) {
          // Select all elements whose IDs contain the string "page"
          var elementsToRemove = document.querySelectorAll(\'[id*="page"]\');

          // Loop through the matched elements and remove them
          elementsToRemove.forEach(function(element) {
              element.remove();
          });
        }

    </script>
    <br><br>
    ';
}
# Page Pagination
function fill_feedback_pagination()
{
  global $MAX_VISIBLE_POSTS;
  global $MAX_NAV_BUTTONS;
  global $current_page;
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $sql = "SELECT feedback_Id, Title FROM feedbacks ORDER BY Created_Time DESC";
  $result = $connection->query($sql);
  $feedback_body_pagination = "";

  // Create Post from data from each row
  if ($result->num_rows > 0) {
    $number_of_posts = 0;
    $number_of_pages = 1;
    $TOC_Array = array();

    // Initial Selection for Navigation Page [Default Set to 1]
    $feedback_body_pagination .= '<li><a id="feedbackPage' . $number_of_pages . 'Button" onclick="show_page(' . $number_of_pages . ')" href="#' . $number_of_pages . '">Page ' . $number_of_pages . '</a></li>';

    while ($row = $result->fetch_assoc()) {
      #create new page when the posts-per-page has been reached 
      if ($number_of_posts == $MAX_VISIBLE_POSTS) {
        $number_of_pages++;
        if ($number_of_pages <= $MAX_NAV_BUTTONS) { // [fixed : Nav Controls]
          $feedback_body_pagination .= '<li><a id="feedbackPage' . $number_of_pages . 'Button" onclick="show_page(' . $number_of_pages . ')" href="#' . $number_of_pages . '">Page ' . $number_of_pages . '</a></li>';
        }
        $number_of_posts = 0;
      }
      //////////////////////////////////////////
      // Place title in TOC
      $newfeedbackId = $row['feedback_Id'];
      $newTitle = $row['Title'];

      // Add TOC link and title to the array for the current page
      $TOC_Array[$number_of_pages][] = "feedback-post.php?feedback_id=" . $newfeedbackId;
      $TOC_Array[$number_of_pages][] = $newTitle;

      $number_of_posts++;
    }

    // Calculate the next page number
    #$nextPage = ($current_page % $number_of_pages) + 1;

    // TOC Pagination
    echo '   
            <script>
                          
                // **********************************
                // NAV TOC Pagination   
                function show_toc(TOC_Array, setPageVisible) {
                  var step = 0;
                  // Update TOC links
                  for (var i = 1; i <= 3; i++) {
                      var link = document.getElementById("feedback_TOC-item" + i); // [ assert: Static Link ] 
                      //alert("number_of_pages: " + i);
                      if (link) {
                          // Modify href and text content here
                          link.href =  TOC_Array[setPageVisible][step]; // Set the new href
                          link.textContent =  TOC_Array[setPageVisible][step + 1]; // Set the new text content
                          step += 2;
                      }
                  }
                }
            </script>';

    // UI Pagination Script
    echo '   
            <script>
                    //alert("number_of_pages: '  . ($number_of_pages) . '");

                // **********************************
                // NAV Page Selection algorithm    
                function show_page(selectedPage) {
                    //alert("currentPage: " + (selectedPage))
                    var totalNumberOfPages = ' . $number_of_pages . '
                    
                    // Limit selectedPage within the range of available pages
                    selectedPage = Math.min(totalNumberOfPages, Math.max(selectedPage, 1));

                    for (var i = 1; i <=totalNumberOfPages; i++) {
                        var pageId = "page" + i;
                        var page = document.getElementById(pageId);
                        if (page) { 

                            // Show Current Page
                            if (i === selectedPage) {
                                page.removeAttribute("hidden");
                                setPageVisible = i;
                               
                                // Re-index feedback Pages
                                var currentPage = getCurrentPageNumber(); // Get the current page number from PHP
                                var direction =  (setPageVisible) - currentPage;
                                updatePaginationButtons(setPageVisible, totalNumberOfPages) 

                                // Re-index TOC
                                var tocArray = ' . json_encode($TOC_Array) . '; // Passing as array json; not string script
                                show_toc(tocArray, setPageVisible);
                              
                                //updatePaginationButtons(currentPageNumber, totalNumberOfPages)
                                //alert("currentPage: " + (currentPage) + " | setPageVisible: " + setPageVisible + " | direction: " + direction);
                            } 
                            else { // Hide All Other Pages
                                page.setAttribute("hidden", "true");
                            }
                        }
                    }
                }
                // Button1 Page Link Event Listener
                /* document.getElementById("feedbackPage3Button").addEventListener("click", function(event) {
                    updatePageLink(event, function(currentPageNumber) {
                        return Math.max(currentPageNumber, 1); // Ensure the page number does not go below 1
                    });
                }); */
                
                function updatePaginationButtons(currentPageNumber, totalNumberOfPages) {
                  var maxNavigationRange = ( currentPageNumber + 2 );
                  var navNumber = 1;
                  var pageButton;
                  for (var nextPageNumber = currentPageNumber + 0; nextPageNumber <= maxNavigationRange; nextPageNumber++) {
                    //alert("navNumber: " + (navNumber) + " |  nextPageNumber: " + (nextPageNumber));
                    if(maxNavigationRange > totalNumberOfPages ) { break;}
                    //if(navNumber > 3) { break;)
                      pageButton = document.getElementById("feedbackPage" + navNumber + "Button");
                      pageButton.onclick = function() { show_page(nextPageNumber);};
                      pageButton.textContent = "Page " + nextPageNumber;
                      pageButton.href = "#" + (nextPageNumber);
                      navNumber++;
                  }
                }
                
                function getCurrentPageNumber() {
                  var currentUrl = window.location.href;
                  var pageNumber = currentUrl.match(/page#(\d+)/);
                  if (pageNumber !== null) {
                      return parseInt(pageNumber[1]);
                  } else {
                      return 1; // Default to page 1 if page number is not found
                  }
                }
              
                function updatePageLink(event, operation) {
                  event.preventDefault();
                  var currentUrl = window.location.href;
                  if (currentUrl.includes("#")) {
                      var currentPageNumber = getCurrentPageNumber();
                      var updatedPageNumber = operation(currentPageNumber);
                      var updatedPageLink = "#" + updatedPageNumber;

                      if (updatedPageNumber > 0 && updatedPageNumber <= ' . $number_of_pages . ') {
                        // Update the URL without triggering a full page refresh
                        history.pushState(null, null, updatedPageLink);

                        show_page(updatedPageNumber);
                        event.target.href = updatedPageLink;
                      }
                  }
                }
            </script>
            
            ';



    // << Pagination >>
    echo '<nav>
              <ul class="pagination pagination-lg">
                <li>
                  <a id="prevousPageLink" onclick="" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>' .
      $feedback_body_pagination .
      '<li>
               <a id="nextPageLink" onclick="" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
        <script>
        
            // Previous Page Link Event Listener
            document.getElementById("prevousPageLink").addEventListener("click", function(event) {
                updatePageLink(event, function(currentPageNumber) {
                    return Math.max(currentPageNumber - 1, 1); // Ensure the page number does not go below 1
                });
            });

            // Next Page Link Event Listener
            document.getElementById("nextPageLink").addEventListener("click", function(event) {
                updatePageLink(event, function(currentPageNumber) {
                    return currentPageNumber + 1;
                });
            });
        </script>';
  } else {
    echo "0 results";
  }
  $connection->close();
}




# fetch Title
function getTitleFromDatabase($feedbackId)
{
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  // Prepare SQL query to fetch Title based on feedbackId
  $sql = "SELECT Title FROM feedbacks WHERE feedback_Id = $feedbackId";

  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
    // Fetch the Title from the database
    $row = $result->fetch_assoc();
    $title = $row['Title'];
  } else {
    // If no matching feedbackId found, return an empty string or handle it as per your requirement
    $title = "";
  }

  // Close the connection
  $connection->close();

  return $title;
}
# fetch About_Author
function getAboutFromDatabase($feedbackId)
{
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  // Prepare SQL query to fetch About_Author based on feedbackId
  $sql = "SELECT About_Author FROM feedback_story WHERE feedback_Id = $feedbackId";

  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
    // Fetch the About_Author from the database
    $row = $result->fetch_assoc();
    $about = $row['About_Author'];
  } else {
    // If no matching feedbackId found, return an empty string or handle it as per your requirement
    $about = "";
  }

  // Close the connection
  $connection->close();

  return $about;
}
# fetch User_Photo
function getUserPhotoFromDatabase($userInfo)
{
    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT id FROM users WHERE email = ? OR CONCAT(last_name, ', ', first_name) = ?";

    $statement = $connection->prepare($sql);

    if (!$statement) {
        die("Error in prepare statement: " . $connection->error);
    }

    $statement->bind_param("ss", $userInfo, $userInfo);
    $statement->execute();
    $statement->bind_result($userId);

    // Fetch the user ID
    if ($statement->fetch()) {
        // Close the statement
        $statement->close();

        // Prepare and execute the second statement
        $picture_sql = "SELECT Location FROM user_photos WHERE User_Id = ?";
        $picture_statement = $connection->prepare($picture_sql);

        if (!$picture_statement) {
            die("Error in prepare statement: " . $connection->error);
        }

        $picture_statement->bind_param("i", $userId);
        $picture_statement->execute();
        $picture_statement->bind_result($user_photo_id);

        // Fetch the user photo location
        if ($picture_statement->fetch()) {
            // Close the second statement
            $picture_statement->close();

            // Close the connection
            $connection->close();

            return $user_photo_id;
        }
    }

    // If no matching user found or no photo found, return an empty string or handle it as per your requirement
    //$statement->close();

    // Close the connection
    $connection->close();

    return "";
}
# fetch Hash : Boolean (false | true) 
function getUserHashFromDatabase($feedbackId)
{
  // If no matching feedbackId found, return an false (without permissions)
  if (isset($_SESSION['role'])) { // Verify SESSION
    // get current user hash
    $user_session_hash = $_SESSION['hash'];

    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    // Check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
    // Prepare SQL query to fetch hash based on feedbackId
    $sql = "SELECT hash FROM feedbacks WHERE feedback_Id = $feedbackId";

    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
      // Fetch the hash from the database matching feedback id
      $row = $result->fetch_assoc();
      $feedback_hash = $row['hash'];
      if ($feedback_hash === $user_session_hash)  return true;
    }
    // Close the connection
    $connection->close();
  }

  return false;
}
# fetch feedback Visiability : Boolean (false:0 | true:1) 
function getfeedbackVisibilityStateFromDatabase($feedbackId)
{

  //if (isset($_SESSION['role'])){ // Verify SESSION
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  // Prepare SQL query to fetch hidden based on feedbackId
  $sql = "SELECT hidden FROM feedbacks WHERE feedback_Id = $feedbackId";

  $result = $connection->query($sql);
  // If no matching feedbackId found, return an false
  $hidden = false;

  if ($result->num_rows > 0) {
    // Fetch the hidden info. from the database
    $row = $result->fetch_assoc();
    $hidden = $row['hidden'];
  }

  //}
  // Close the connection
  $connection->close();

  return $hidden;
}



# fetch Page Comment Count [Visible / Hidden : (true,false)]
function get_blog_page_comment_count($Hidden=0)
{
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $targetHidden = $Hidden; // Specify the target Blog_Id you want to select
  $sql = "SELECT * FROM feedback_comments WHERE Hidden = $targetHidden ORDER BY Created_Time ASC";
  $result = $connection->query($sql);
  $comments = 0;
  // fetch Comment Post from data from each row | If data exist
  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) { // count rows
      $comments += 1;
    }
  }
  $connection->close();
  return $comments;
}

# fetch Page Comment Total Count
function getAll__feedback_comment_count()
{
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $sql = "SELECT COUNT(*) AS comment_count FROM feedback_comments";
  $result = $connection->query($sql);

  $comments = 0;

  // Fetch the count directly
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $comments = $row['comment_count'];
  }

  $connection->close();
  return $comments;
}
# trasnform day with suffix
function getDayWithSuffix($day) {
  if ($day >= 11 && $day <= 13) {
      // If the day is between 11 and 13, use "th" suffix
      $suffix = 'th';
  } else {
      // Otherwise, use appropriate suffix based on the last digit
      switch ($day % 10) {
          case 1:
              $suffix = 'st';
              break;
          case 2:
              $suffix = 'nd';
              break;
          case 3:
              $suffix = 'rd';
              break;
          default:
              $suffix = 'th';
              break;
      }
  }
  return $day . $suffix;
}



////////////////////////////////////////////////////////
// SESSSION
function save_button_id($button_id)
{
  // Save button_id to the PHP session
  $_SESSION['saved_value'] = $button_id;
}
// Retrieve button_id from the session
function get_saved_button_id()
{
  return isset($_SESSION['saved_value']) ? $_SESSION['saved_value'] : null;
}
function get_session_value()
{
  return isset($_SESSION['update_server_page_list_number']) ? $_SESSION['update_server_page_list_number'] : 3;
}

function get_session_feedback_id()
{
  return isset($_SESSION['get_session_feedback_id']) ? $_SESSION['get_session_feedback_id'] : null;
}
