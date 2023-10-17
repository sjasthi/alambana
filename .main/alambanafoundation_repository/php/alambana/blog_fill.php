<?php

use PhpOffice\PhpPresentation\Shape\Chart\Title;

  require 'db_configuration.php';

  $status = session_status();
  if ($status == PHP_SESSION_NONE) {
    session_start();
  }

  $MAX_POSTS = 3;
  
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
            </div>
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
            <div class="blog-list-item format-standard"  id="' . $row['Blog_Id'] . '">
              <div class="row">
                  <div class="col-md-4 col-sm-4">
                      <a href="single-post.php" class="media-box grid-featured-img">
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
                        <a href="single-post.php" class="basic-link">Read more</a>
                    </div>
                </div>
            </div>
        ';
        
        echo $blog_body.$blog_link;
        $number_of_posts += 1;
      }
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

    // Create Post from data from each row
    if ($result->num_rows > 0) {
      $number_of_posts = 0;
      $number_of_pages = 1;
      while($row = $result->fetch_assoc()) {

        #create new page when the posts-per-page has been reached 
        if ($number_of_posts == $MAX_POSTS) {
          $number_of_pages += 1;
          $blog_body_pagination .=
          '<li><a href="#'. $number_of_pages . '">Page '. $number_of_pages . '</a></li>';

          $number_of_posts = 0;
        }
        $number_of_posts += 1;
      }
      echo '<nav>
            <ul class="pagination pagination-lg">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="active"><a href="#">1</a></li>';
      echo $blog_body_pagination 
          .'<li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>';
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
          <a href="single-post.php" class="media-box">
          '. $blog_pictures .'
          </a>
          <h5><a href="single-post.php">'. $row['Title'] .'</a></h5>
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
  ?>
