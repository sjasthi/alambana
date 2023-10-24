<?php

use PhpOffice\PhpPresentation\Shape\Chart\Title;

  require 'db_configuration.php';
  //require 'update_current_page.php';

  $status = session_status();
  if ($status == PHP_SESSION_NONE) {
    session_start();
  }

  $MAX_POSTS = 4;

  # Blog Page TOC
  function fill_TOC() {
    global $MAX_POSTS;
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT Blog_Id, Title FROM blogs ORDER BY Created_Time DESC";
    $result = $connection->query($sql);
    $number_of_posts = 0;
    $TOC_Entry = '';

    if ($result->num_rows > 0) {
      // Place title in TOC
      while($row = $result->fetch_assoc()) {
        if ($number_of_posts == $MAX_POSTS) {
          break;
        }
        $TOC_Entry .= '<li><a onclick="scrollToPost(\'' . $row['Blog_Id'] . '\')">' . $row['Title'] . '</a></li>';
        
        $number_of_posts++;
      }

      $TOC_Header = 
      '<div>
        <div id="blog_TOC">
          <h3 id="TOC_title">Table of Contents</h3>
          <ul>';

      $TOC_Closing =
          '</ul>
        </div>
      <div>';

      echo $TOC_Header.$TOC_Entry.$TOC_Closing;
    } else {
      echo "0 results";
    }
    $connection->close();
  }
  # Blog Page Fill
  function fill_blog() {
    global $MAX_POSTS;
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
      $number_of_pages = 1;
      echo '<div class="blog_page" id="page'. $number_of_pages . '">';
      
      while($row = $result->fetch_assoc()) {

        #create new page when the posts-per-page has been reached
        if ($number_of_posts == $MAX_POSTS) {
          $number_of_pages += 1;

          echo '
            
            <div class="blog_page" id="page'. $number_of_pages . '" hidden="hidden">
            ';

          $number_of_posts = 0;
        }
        # Video Link to blog
        if ($row["Video_Link"] != NULL) {
          $blog_link = '<a class="blog_link" href=' . $row["Video_Link"] . '> Video </a> </div>';
        } else {
          $blog_link = '</div>';
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
        $blog_body =
      '
            <div class="blog-list-item format-standard"  id=item' . $row['Blog_Id'] . '>
              <div class="row">
                  <div class="col-md-4 col-sm-4">
                  <a href="single-post.php?blog_id=' . $row['Blog_Id'] . '" class="media-box grid-featured-img">
                            ' . $blog_pictures . '
                        </a>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="single-post.php">' . $row['Title'] . '</a></h3>
                        <span class="meta-data grid-item-meta"><i class="fa fa-calendar"></i>  
                        By: ' . $row['Author'] . 'Posted on ' . $row['Created_Time'] . '</span>
                        <div class="grid-item-excerpt">
                            <p>' . nl2br($row['Description']) . '</p>
                        </div>
                        <a href="single-post.php?blog_id=' . $row['Blog_Id'] . '"class="basic-link">Read more</a>
                    </div>
                </div>
            
        ';
        
        echo $blog_body.$blog_link;
        $number_of_posts += 1;
        if ($number_of_posts == $MAX_POSTS) { echo '</div>'; }
      }
      #echo '</div>';
    } else {
      echo "0 results";
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
            $blog_link = '<a class="blog_link" href=' . $row["Video_Link"] . '> Video </a> </div>';
          } else {
            $blog_link = '</div>';
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
        
      echo $blog_body.$blog_link;
      #echo '</div>';
    } else {
      echo "0 results";
    }
    $connection->close();
  }

  # Page Pagination
  function fill_blog_pagination() {
    global $MAX_POSTS;
    // Create connection
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    // Check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT * FROM blogs ORDER BY Created_Time DESC";
    $result = $connection->query($sql);
    $blog_body_pagination="";
    $current_page="1";
    
    // Create Post from data from each row
    if ($result->num_rows > 0) {
      $number_of_posts = 0;
      $number_of_pages = 1;
      $blog_body_pagination .= '<li><a onclick="show_page(' . $number_of_pages . ')" href="#">Page ' . $number_of_pages . '</a></li>';
      while($row = $result->fetch_assoc()) {

        #create new page when the posts-per-page has been reached 
        if ($number_of_posts == $MAX_POSTS) {
          $number_of_pages += 1;
          
          #for ($i = 1; $i <= $number_of_pages; $i++) {
              $blog_body_pagination .= '<li><a onclick="show_page(' . $number_of_pages . ')" href="#">Page ' . $number_of_pages . '</a></li>';
          #}
          $number_of_posts = 0;
        }
        $number_of_posts += 1;
      }
      
      // IF Odd Number Set of Pages
      if ($number_of_posts == 1) { echo '</div>';}

      // Pagination Script
      echo '   
            <script>
                function show_page(selected_page) {
                    for (var i = 1; i <=' . $number_of_pages . '; i++) {
                        
                        // Limit selected_page within the range of available pages
                        selected_page = Math.min(' . $number_of_pages . ', Math.max(selected_page, 1));
                        
                        // Avoid Negative Values
                        //if(selected_page <= 0) {selected_page = 1; current_page = 1;}

                        var pageId = "page" + i;
                        var page = document.getElementById(pageId);
                        if (page) { 
                            // Show Current Page
                            if (i === selected_page) {
                                page.removeAttribute("hidden");
                                current_page = i;
                                //alert("Current Page: " + current_page);
                            } 
                            else { // Hide All Other Pages
                                page.setAttribute("hidden", "true");
                            }
                        }
                    }
                }
            </script>

            ';
      // << Pagination >>
      echo '<nav>
              <ul class="pagination pagination-lg">
                <li>
                  <a onclick="show_page(' . ($current_page - 1) . ')" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>'.
            $blog_body_pagination. 
            '<li>
              <a onclick="show_page(' . ($current_page + 1) . ')" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>';

      //if ($number_of_posts == 1) { echo '</div>';}
      
    } else {
      echo "0 results";
    }
    $connection->close();
  }
  # Page Tabs Menu
  function fill_blog_tabs() {
    global $MAX_POSTS;
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

        if ($number_of_posts == $MAX_POSTS) {
          break;
        }

        # Video Link to blog
        if ($row["Video_Link"] != NULL) {
          $blog_link = '<a class="blog_link" href=' . $row["Video_Link"] . '> Video </a> </div>';
        } else {
          $blog_link = '</div>';
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
                <ul> '.$blog_body_tabs;

    } else {
      echo "0 results";
    }
    $connection->close();
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
?>

