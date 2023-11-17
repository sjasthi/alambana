<?php

use PhpOffice\PhpPresentation\Shape\Chart\Title;

  //require 'db_configuration.php';
  //require 'update_current_page.php';

  $status = session_status();
  if ($status == PHP_SESSION_NONE) {
    session_start();
  }

  $MAX_VISIBLE_POSTS = intval(get_session_value()); //intval(3);
  $MAX_NAV_BUTTONS = intval(3);
  $current_page = isset($_GET['current_page']) ? intval($_GET['current_page']) : 1; // intval ensure (INT | Variable Security)
  if (empty($MAX_VISIBLE_POSTS)) $MAX_VISIBLE_POSTS = intval(3);


  # Blog Page TOC
  function fill_TOC() {
    global $MAX_VISIBLE_POSTS;
    global $current_page;
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT Blog_Id, Title FROM blogs ORDER BY Created_Time DESC";
    $result = $connection->query($sql);
    $number_of_posts = 0;
    $number_of_page = 1;
    $number_of_tag = 1;
    $TOC_Entry = '';

    if ($result->num_rows > 0) {
      // Place title in TOC
      while($row = $result->fetch_assoc()) {
        if ($number_of_posts == $MAX_VISIBLE_POSTS) {
          break;
        }
        if (!getBlogVisibilityStateFromDatabase($row['Blog_Id'])) {
           $TOC_Entry .= '<li><a id="blog_TOC-item'. $number_of_tag++ . 
          '" href="single-post.php?blog_id=' 
          . $row['Blog_Id'] . '">' 
          . $row['Title'] . '</a></li>';

          $number_of_posts++;
        }
      }

      $TOC_Header = 
      '
        <div id="blog_TOC">
          <h3 id="TOC_title">Table of Contents</h3>
          <ul>';

      $TOC_Closing =
          '</ul>
        </div>';

      echo $TOC_Header.$TOC_Entry.$TOC_Closing;
    } else {
      echo "0 results";
    }
    $connection->close();
  }

  # Blog Page Fill
  function fill_blog() {
    global $MAX_VISIBLE_POSTS;
    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT * FROM blogs ORDER BY Created_Time DESC";
    $result = $connection->query($sql);

    $returnClassBlock = '';

    // Create Post from data from each row
    if ($result->num_rows > 0) {
      $number_of_posts = 0;
      $number_of_pages = 1;
      echo '<div class="blog_page" id="page'. $number_of_pages . '">';
      
      while($row = $result->fetch_assoc()) {
        if (!getBlogVisibilityStateFromDatabase($row['Blog_Id'])) {
          #create new page when the posts-per-page has been reached
          if ($number_of_posts == $MAX_VISIBLE_POSTS) {
            $number_of_pages += 1;
            echo '<div class="blog_page" id="page'. $number_of_pages . '" hidden="hidden">';
            $number_of_posts = 0;
          }

          # Video Link to blog
          if ($row["Video_Link"] != NULL) {
            $blog_video_link = '<a class="blog_video_link" href=' . $row["Video_Link"] . '> Video </a> ';
          } else {
            $blog_video_link = '';
          }
          # Photo to blog
          $picture_sql = "SELECT Location FROM blog_pictures WHERE Blog_Id = " . $row["Blog_Id"];
          $picture_locations = $connection->query($picture_sql);
          $blog_pictures = '';
          if ($picture_locations->num_rows > 0) {
            while($picture = $picture_locations->fetch_assoc()) {
              $blog_pictures = $blog_pictures . '<img src="'. $picture['Location'] . '" alt="">';
            }
          }
          # HTML Blog Body Elements
          $blog_body =
        '
              <div class="blog-list-item format-standard"  id=item' . $row['Blog_Id'] . '>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                    <a href="single-post.php?blog_id=' . $row['Blog_Id'] . '" class="media-box grid-featured-img">
                              ' . $blog_pictures . '
                          </a> '.$blog_video_link . '
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="single-post.php?blog_id=' . $row['Blog_Id'] . '">' . $row['Title'] . '</a></h3>
                        <span class="meta-data grid-item-meta"><i class="fa fa-calendar"></i>  
                        By: ' . $row['Author'] . ', Posted on ' . $row['Created_Time'] . '</span>
                        <div class="grid-item-excerpt">
                            <p>' . nl2br($row['Description']) . '</p>
                        </div>
                        <a href="single-post.php?blog_id=' . $row['Blog_Id'] . '"class="basic-link">Read more</a>
                    </div>
                </div>
              </div>
          ';
          
          echo $blog_body;
          $number_of_posts += 1;
          if ($number_of_posts == $MAX_VISIBLE_POSTS) { echo '</div>'; } // End of Full Page #
          //if ($number_of_posts == 0) { echo '</div>'; }
          // Need to close odd item on last page 1,2,3 | 4,5,6 | 7.....
        }
      }
      if ($number_of_posts < $MAX_VISIBLE_POSTS) { echo '</div>'; }// Catch last items of Row | Close Incomplete Page
      $returnClassBlock = '<div class="blog_page" id="page';
      return $returnClassBlock;
    } else {
      echo "0 results";
      return 0;
    }
    $connection->close();
  }

  # Blog Page Fill Story
  function fill_blog_story($blogId) {
    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $targetBlogId = $blogId; // Specify the target Blog_Id you want to select

    $sql = "SELECT * FROM blogs WHERE Blog_Id = $targetBlogId ORDER BY Blog_Id DESC";
    $result = $connection->query($sql);
    // Check if there are results
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc(); // Fetch the specific row with the specified Blog_Id

          # Video Link to blog
          if ($row["Video_Link"] != NULL) {
            $blog_video_link = '<a class="blog_video_link" href=' . $row["Video_Link"] . '> Video </a> </div>';
          } else {
            $blog_video_link = '</div>';
          }
          # Photo to blog
          $picture_sql = "SELECT Location FROM blog_pictures WHERE Blog_Id = " . $row["Blog_Id"];
          $picture_locations = $connection->query($picture_sql);
          $blog_pictures = '';
          if ($picture_locations->num_rows > 0) {
            while($picture = $picture_locations->fetch_assoc()) {
              $blog_pictures .= '<img src="'. $picture['Location'] . '" alt="">';
            }
          }
          # Paragraph to blog
          $paragraph_sql = "SELECT Paragraph FROM blog_story WHERE Blog_Id = " . $row["Blog_Id"];
          $paragraph_result = $connection->query($paragraph_sql);
          $blog_paragraphs = '';

          if ($paragraph_result->num_rows > 0) {
              while ($paragraph_row = $paragraph_result->fetch_assoc()) {
                  $blog_paragraphs .= nl2br($paragraph_row['Paragraph']);
              }
          }
          # About Author
          $about_author = '';
          $about_sql = "SELECT About_Author FROM blog_story WHERE Blog_Id = " . $row["Blog_Id"];
          $about_result = $connection->query($about_sql);
          if ($about_result && $about_result->num_rows > 0) {
              $about = $about_result->fetch_assoc();
              if (isset($about['About_Author'])) {
                  $about_author .= nl2br($about['About_Author']);
              }
          }
          if ($about_author === NULL) { $about_author = "";}



          # HTML Body Elements
          $blog_body =
            '
                  <h3>' . $row['Title'] . '</h3>
                  <div class="post-media">
                  ' . $blog_pictures . '
                    </div>
                    <div class="post-content">
                      <p>' . nl2br($row['Description']) . '</p>
                      <img src="images/cause3.jpg" alt="" class="align-left">
                      <p>' . $blog_paragraphs . '</p>
                    </div>
                    <div class="tag-cloud">
                        <i class="fa fa-tags"></i> 
                        <a href="#">Water</a>
                        <a href="#">Students</a>
                        <a href="#">NYC</a>
                    </div>
                    <!-- About Author -->
                    <section class="about-author">
                        <img src="images/user1.jpg" alt="avatar" class="img-thumbnail">
                        <div class="post-author-content">
                            <h3>' . $row['Author'] . '<span class="label label-primary">Author</span></h3>
                            <p><strong>' . $row['Author'] . '</strong>, ' . $about_author . '</p>
                        </div>
                    </section>
              
          ';
        
      echo $blog_body.$blog_video_link;
      #echo '</div>';
    } else {
      echo "0 results";
    }
    $connection->close();
  }
  
  # Comments
  function fill_blog_comments($blogId){
    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
    $returnClassBlock = '';

    $targetBlogId = $blogId; // Specify the target Blog_Id you want to select
    $sql = "SELECT * FROM blog_comments WHERE Blog_Id = $targetBlogId ORDER BY Subject_Id ASC, Created_Time ASC";
    $result = $connection->query($sql);
    
    // fetch Comment Post from data from each row | If data exist
    if ($result->num_rows > 0) {
    
      $is_new_topic = -1;
      $is_parent = 0;
      $is_subline = 0;
      $button_id = 1;
      $blog_body = "";
      $blog_reply_field = "";

      while($row = $result->fetch_assoc()) { // start in first row
        
        $reply_button = '';

        if ($is_new_topic != $row['Subject_Id']){ // new parent comment
          
          $formAction = "";#create_comment_post($targetBlogId); // Set the form action for creating
          $submitAction = "create_comment_post";

          if ($is_subline == 1){ $blog_body .= '</ul>';} // if previous parent contain children branch(s); close branch(s) to children
          if ($is_subline == 1){ $is_subline = 0;} // reset parent for new children 
          if ($is_parent == 1){  $blog_body .= $blog_reply_field;} // reset for new parent; close parent tree

          $is_new_topic = $row['Subject_Id']; // set as new parent subject
          
          # Intial HTML Blog Comment Body Elements
          if (isset($_SESSION['role'])){ // Verify SESSION
            $reply_button = '<a class="btn btn-default btn-xs pull-right" id="form_show_reply_submit_button'.$button_id.'"; onclick="reply_blog_comment('.$button_id.');">Reply</a>';
          }
          $blog_body .= 
          '
          <li>
              <div class="post-comment-parent-block"> 
                  <img src="images/default.jpg" alt="avatar" class="img-thumbnail">
                      <div class="post-comment-content">'
                      . $reply_button .
                      '<h5>' . $row['Name'] . ' <span>says</span></h5>
                          <span class="meta-data">' . $row['Created_Time'] . '</span>
                          <p>' . nl2br($row['Paragraph']) . '</p>
                      </div>
              </div>
                    

          '; $is_parent = 1;
          $button_id++;

        }else{ // child comment(s)

          $formAction = "";#create_comment_post($targetBlogId); // Set the form action for creating
          $submitAction = "create_comment_post_subline";
          if ($is_subline == 0){ $blog_body .= '<ul>';} // if parent comment has been initialized; open to first child branch structure
          $is_subline = 1;
          
          if (isset($_SESSION['role'])){ // Verify SESSION
            $reply_button = '<a class="btn btn-default btn-xs pull-right" id="form_show_reply_submit_button'.($button_id-1).'"; onclick="reply_blog_comment('.($button_id-1).');">Reply</a>';
          }
         
          $blog_body .=
          '
            <li>
                <div class="post-comment-block">
                    <img src="images/default.jpg" alt="avatar" class="img-thumbnail">
                        <div class="post-comment-content">'
                        . $reply_button .
                        '<h5>' . $row['Name'] . ' <span>says</span></h5>
                            <span class="meta-data">' . $row['Created_Time'] . '</span>
                            <p>' . nl2br($row['Paragraph']) . '</p>
                        </div>
                </div>
            </li>

          ';
        }
        if (isset($_SESSION['role'])){ // Verify SESSION
        $blog_reply_field = '
            <form id="blog_reply_form'.($button_id-1).'" action="'. $formAction .'" method="POST" enctype="multipart/form-data" hidden="hidden">
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
                          <button type="submit" class="btn btn-primary btn-lg"; name="'.$submitAction.'">Submit your reply</button>
                      </div>
                  </div>
              </div>
          </form>
        </li>';// close parent tree
        } else { $blog_reply_field = '';}
        
      }
      if ($is_subline == 1){ $blog_body .= '</ul>';} // if last contained child branch; close child branch    
      if ($blog_body != ""){
        echo $blog_body; //.$blog_video_link;
        echo $blog_reply_field; // close parent tree
      }
    } else {
      echo $returnClassBlock;
    }
    $connection->close();
    
  }

  # Page List Items
  function fill_blog_page_list(){
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
        var MAX_VISIBLE_POSTS = 1; // Initialize MAX_VISIBLE_POSTS with PHP value

        // UPDATE SERVER FOR NUMBER OF POST ITEMS ON PAGE
        document.getElementById("list-count").addEventListener("change", function() {
            var selectedValue = this.value;

            // Make an AJAX request to update the server with the count
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "update_server.php", true);
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




        function fetchBlogContent() {
          var contentPage = "page";
          removeAllBlogContent_ContainsString(contentPage);
          //<?php echo fill_blog(); ?>
        }

        function removeSingleBlogContent_ContainsString(pageContentName) {
          // Find the parent element by its id
            var parentElement = document.getElementById(pageContentName);

            // Check if the parent element exists
            if (parentElement) {
                // Remove the parent element
                parentElement.remove();
            }
        }

        function removeAllBlogContent_ContainsString(pageContentName) {
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
  function fill_blog_pagination() {
    global $MAX_VISIBLE_POSTS;
    global $MAX_NAV_BUTTONS;
    global $current_page;
    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT Blog_Id, Title FROM blogs ORDER BY Created_Time DESC";
    $result = $connection->query($sql);
    $blog_body_pagination="";
    
    // Create Post from data from each row
    if ($result->num_rows > 0) {
      $number_of_posts = 0;
      $number_of_pages = 1;
      $TOC_Array = array();
      
      // Initial Selection for Navigation Page [Default Set to 1]
      $blog_body_pagination .= '<li><a id="BlogPage' . $number_of_pages . 'Button" onclick="show_page(' . $number_of_pages . ')" href="#' . $number_of_pages . '">Page ' . $number_of_pages . '</a></li>';
      
      while($row = $result->fetch_assoc()) {
        #create new page when the posts-per-page has been reached 
        if ($number_of_posts == $MAX_VISIBLE_POSTS) {
          $number_of_pages++;
          if($number_of_pages <= $MAX_NAV_BUTTONS){ // [fixed : Nav Controls]
            $blog_body_pagination .= '<li><a id="BlogPage' . $number_of_pages . 'Button" onclick="show_page(' . $number_of_pages . ')" href="#' . $number_of_pages . '">Page ' . $number_of_pages . '</a></li>';
          }
          $number_of_posts = 0;
        }
        //////////////////////////////////////////
        // Place title in TOC
        $newBlogId = $row['Blog_Id']; 
        $newTitle = $row['Title']; 

        // Add TOC link and title to the array for the current page
        $TOC_Array[$number_of_pages][] = "single-post.php?blog_id=" . $newBlogId;
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
                      var link = document.getElementById("blog_TOC-item" + i); // [ assert: Static Link ] 
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
                    //alert("number_of_pages: '  .($number_of_pages) .'");

                // **********************************
                // NAV Page Selection algorithm    
                function show_page(selectedPage) {
                    //alert("currentPage: " + (selectedPage))
                    var totalNumberOfPages = '. $number_of_pages .'
                    
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
                               
                                // Re-index Blog Pages
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
                /* document.getElementById("BlogPage3Button").addEventListener("click", function(event) {
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
                      pageButton = document.getElementById("BlogPage" + navNumber + "Button");
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
                </li>'.
            $blog_body_pagination. 
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
  # Page Tabs Menu
  function fill_blog_tabs() {
    global $MAX_VISIBLE_POSTS;
    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT * FROM blogs ORDER BY Created_Time DESC";
    $result = $connection->query($sql);
    // Create Post from data from each row
    if ($result->num_rows > 0) {
      $number_of_posts = 0;

      $blog_body_tabs = '';

      while($row = $result->fetch_assoc()) {

        if ($number_of_posts == $MAX_VISIBLE_POSTS) {
          break;
        }
        if (!getBlogVisibilityStateFromDatabase($row['Blog_Id'])) {
          # Video Link to blog
          if ($row["Video_Link"] != NULL) {
            $blog_video_link = '<a class="blog_video_link" href=' . $row["Video_Link"] . '> Video </a> </div>';
          } else {
            $blog_video_link = '</div>';
          }
          # Photo to blog
          $picture_sql = "SELECT Location FROM blog_pictures WHERE Blog_Id = " . $row["Blog_Id"];
          $picture_locations = $connection->query($picture_sql);
          $blog_pictures = '';
          if ($picture_locations->num_rows > 0) {
            while($picture = $picture_locations->fetch_assoc()) {
              $blog_pictures = $blog_pictures . '<img src="'. $picture['Location'] . '" alt="">';
            }
          }
          # HTML Body Elements
          $blog_body_tabs .=
          '
            <li>
            <a href="single-post.php?blog_id=' . $row['Blog_Id'] . '" class="media-box">
            '. $blog_pictures .'
            </a>
            <h5><a href="single-post.php?blog_id=' . $row['Blog_Id'] . '">'. $row['Title'] .'</a></h5>
            <span class="meta-data grid-item-meta">Posted on '. $row['Description'] .'</span>
            </li>
          ';
        
          $number_of_posts++;
        }
      }
      echo '<br><br>
      <div class="col-md-4 sidebar-block">
        <div class="widget tabbed_content tabs">
          <ul class="nav nav-tabs">
            <li class="active"> <a data-toggle="tab" href="#Trecent">Recent</a> </li>
            <li> <a data-toggle="tab" href="#Tpopular">Popular</a> </li>
            <li> <a data-toggle="tab" href="#Tcomments">Tags</a> </li>
          </ul>
          <div class="tab-content">
            <div id="Trecent" class="tab-pane active">
              <div class="widget recent_posts">
                <ul> '.$blog_body_tabs.
                '</ul>
              </div>
            </div>
            <div id="Tpopular" class="tab-pane">
                <div class="widget recent_posts">
                    <ul>
                        <li>
                            <a href="https://demo1.imithemes.com/html/born-to-give/single-post.html" class="media-box">
                                <img src="./post2.jpg" alt="">
                            </a>
                            <h5><a href="https://demo1.imithemes.com/html/born-to-give/single-post.html">How to survive the tough path of life</a></h5>
                            <span class="meta-data grid-item-meta">Posted on 06th Dec, 2015</span>
                        </li>
                        <li>
                            <a href="https://demo1.imithemes.com/html/born-to-give/single-post.html" class="media-box">
                                <img src="./post1.jpg" alt="">
                            </a>
                            <h5><a href="https://demo1.imithemes.com/html/born-to-give/single-post.html">A single person can change million lives</a></h5>
                            <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                        </li>
                        <li>
                            <a href="https://demo1.imithemes.com/html/born-to-give/single-post.html" class="media-box">
                                <img src="./post3.jpg" alt="">
                            </a>
                            <h5><a href="https://demo1.imithemes.com/html/born-to-give/single-post.html">Donate your woolens this winter</a></h5>
                            <span class="meta-data grid-item-meta">Posted on 11th Dec, 2015</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="Tcomments" class="tab-pane">
                <div class="tag-cloud">
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Water</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Students</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">NYC</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Education</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Poverty</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Food</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Poor</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Business</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Love</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Help</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Savings</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Winter</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Soul</a>
                    <a href="https://demo1.imithemes.com/html/born-to-give/blog.html#">Power</a>
                </div>
            </div>
        </div>
    </div>';

    } else {
      echo "0 results";
    }
    $connection->close();
  }
  
  

# fetch Title
function getTitleFromDatabase($blogId) {
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  // Check connection
  if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
  }

  // Prepare SQL query to fetch Title based on blogId
  $sql = "SELECT Title FROM blogs WHERE Blog_Id = $blogId";

  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
      // Fetch the Title from the database
      $row = $result->fetch_assoc();
      $title = $row['Title'];
  } else {
      // If no matching blogId found, return an empty string or handle it as per your requirement
      $title = "";
  }

  // Close the connection
  $connection->close();

  return $title;
}
# fetch Story Paragraph
function getParagraphFromDatabase($blogId) {
    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare SQL query to fetch Paragraph based on blogId
    $sql = "SELECT Paragraph FROM blog_story WHERE Blog_Id = $blogId";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the Paragraph from the database
        $row = $result->fetch_assoc();
        $paragraph = $row['Paragraph'];
    } else {
        // If no matching blogId found, return an empty string or handle it as per your requirement
        $paragraph = "";
    }

    // Close the connection
    $connection->close();

    return $paragraph;
}
# fetch About_Author
function getAboutFromDatabase($blogId) {
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

  // Check connection
  if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
  }

  // Prepare SQL query to fetch About_Author based on blogId
  $sql = "SELECT About_Author FROM blog_story WHERE Blog_Id = $blogId";

  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
      // Fetch the About_Author from the database
      $row = $result->fetch_assoc();
      $about = $row['About_Author'];
  } else {
      // If no matching blogId found, return an empty string or handle it as per your requirement
      $about = "";
  }

  // Close the connection
  $connection->close();

  return $about;
}
# fetch Hash : Boolean (false | true) 
function getUserHashFromDatabase($blogId) {
  // If no matching blogId found, return an false (without permissions)
  if (isset($_SESSION['role'])){ // Verify SESSION
    // get current user hash
    $user_session_hash = $_SESSION['hash'];
    
    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    // Prepare SQL query to fetch hash based on blogId
    $sql = "SELECT hash FROM blogs WHERE Blog_Id = $blogId";

    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        // Fetch the hash from the database matching blog id
        $row = $result->fetch_assoc();
        $blog_hash = $row['hash'];
        if ($blog_hash === $user_session_hash)  return true;
    }
    // Close the connection
    $connection->close();
  }

  return false;
}
# fetch Blog Visiability : Boolean (false:0 | true:1) 
function getBlogVisibilityStateFromDatabase($blogId) {

  //if (isset($_SESSION['role'])){ // Verify SESSION
    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare SQL query to fetch hidden based on blogId
    $sql = "SELECT hidden FROM blogs WHERE Blog_Id = $blogId";

    $result = $connection->query($sql);
    // If no matching blogId found, return an false
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
# fetch Page Comment Count
function get_blog_page_comment_count($blogId){
  // Create connection
  $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $targetBlogId = $blogId; // Specify the target Blog_Id you want to select
  $sql = "SELECT * FROM blog_comments WHERE Blog_Id = $targetBlogId ORDER BY Subject_Id ASC, Created_Time ASC";
  $result = $connection->query($sql);
  $comments = 0;
  // fetch Comment Post from data from each row | If data exist
  if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) { // count rows
      $comments += 1;
    }
    
  }
  $connection->close();
  return $comments;
}




////////////////////////////////////////////////////////
// SESSSION
function save_button_id($button_id) {
  // Save button_id to the PHP session
  $_SESSION['saved_value'] = $button_id;
}
// Retrieve button_id from the session
function get_saved_button_id() {
  return isset($_SESSION['saved_value']) ? $_SESSION['saved_value'] : null;
}
function get_session_value() {
  return isset($_SESSION['count_class_elements']) ? $_SESSION['count_class_elements'] : null;
}

function get_session_blog_id() {
  return isset($_SESSION['get_session_blog_id']) ? $_SESSION['get_session_blog_id'] : null;
}
?>

