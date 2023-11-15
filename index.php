<?Php

  if(!isset($_session)) { 
      session_start();
  } 

  include 'shared_resources.php';
  if (isset($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
  }
?>


<!doctype html>
<html class="no-js">
<head>
<!-- basic page needs
  ================================================== -->
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<!-- include the favicon.ico file -->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>aalambana foundation - empowering dreams through education</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- mobile specific metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- css
  ================================================== -->
<?php css() ?>

<!-- scripts
  ================================================== -->
<?php load_common_page_scripts() ?>
<style>
        /* Style for the custom button label */
        .custom-file-upload {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 5px;
        }

        /* Hide the actual file input element */
        #imageUpload {
            display: none;
        }
		#imageUpload2 {
            display: none;
        }
		#imageUpload3 {
            display: none;
        }
    </style>
</head>
<body>

<div class="body">
	<!-- site header wrapper -->
    <?php load_common_page_header(2) ?>
    <!-- banner area -->
    <div class="hero-area">
    	<!-- start banner image slider -->
      	<div class="flexslider heroflex hero-slider" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-pause="yes">
            <ul class="slides">
                <li class="parallax" id="banner1" style="background-image:url(images/slide6.jpg)">
                	<div class="flex-caption">
                    	<div class="container">
                        	<div class="flex-caption-table">
                            	<div class="flex-caption-cell">
                                	<div class="flex-caption-text text-align-center">
                                        <h2>make the world to smile</h2>
                                        <a href="community-support.php" class="btn btn-warning">start the change</a>
										<?php
										if (isset($userRole) && $userRole === "admin") {
											// Display the "Change Image" button for admin users
											echo '<label for="imageUpload" class="custom-file-upload">Change Banner Image</label>';
											echo '<input type="file" id="imageUpload" accept="image/*" multiple="multiple">';
										}
										?>
                                    </div>
                               	</div>
                          	</div>
                        </div>
                    </div>
                </li>
				<script>
					const imageUpload = document.getElementById('imageUpload');
					const banner1 = document.getElementById('banner1');

					// Retrieve the stored image URL from local storage on page load
					const storedImageUrl = localStorage.getItem('indexBanner1');
					if (storedImageUrl) {
						banner1.style.backgroundImage = `url(${storedImageUrl})`;
					}

					imageUpload.addEventListener('change', function () {
						const file = imageUpload.files[0];
						if (file && file.type.startsWith('image/')) {
							const reader = new FileReader();
							reader.onload = function (e) {
								banner1.style.backgroundImage = `url(${e.target.result})`;

								// Store the selected image URL for Page 1 in local storage
								localStorage.setItem('indexBanner1', e.target.result);
							};
							reader.readAsDataURL(file);
						}
					});
				</script>
				
                <li class="parallax" id="banner2" style="background-image:url(images/slide2.jpg)">
                	<div class="flex-caption">
                    	<div class="container">
                        	<div class="flex-caption-table">
                            	<div class="flex-caption-cell">
                                	<div class="flex-caption-text text-align-center">
                                        <h2>make a difference for people<br>who needs it the most</h2>
                                        <a href="community-support.php" class="btn btn-primary">start with a little</a>
										<?php
										if (isset($userRole) && $userRole === "admin") {
											// Display the "Change Image" button for admin users
											echo '<label for="imageUpload2" class="custom-file-upload">Change Banner Image</label>';
											echo '<input type="file" id="imageUpload2" accept="image/*" multiple="multiple">';
										}
										?>
                                    </div>
                               	</div>
                          	</div>
                        </div>
                    </div>
                </li>
				<script>
					const imageUpload2 = document.getElementById('imageUpload2');
					const banner2 = document.getElementById('banner2');

					// Retrieve the stored image URL from local storage on page load
					const storedImageUrl2 = localStorage.getItem('indexBanner2');
					if (storedImageUrl2) {
						banner2.style.backgroundImage = `url(${storedImageUrl2})`;
					}

					imageUpload2.addEventListener('change', function () {
						const file = imageUpload2.files[0];
						if (file && file.type.startsWith('image/')) {
							const reader = new FileReader();
							reader.onload = function (e) {
								banner2.style.backgroundImage = `url(${e.target.result})`;

								// Store the selected image URL for Page 1 in local storage
								localStorage.setItem('indexBanner2', e.target.result);
							};
							reader.readAsDataURL(file);
						}
					});
				</script>
                <li class="parallax" id="banner3"  style="background-image:url(images/slide1.jpg)">
                	<div class="flex-caption">
                    	<div class="container">
                        	<div class="flex-caption-table">
                            	<div class="flex-caption-cell text-align-center">
                        			<div class="flex-caption-cause">
                            			<h3><a href="#">please help</a></h3>
                    					<p>lorem ipsum dolor sit amet, consectet adipiscing elit. Nam malesuada dapi bus diam, ut fringilla purus efficitur  eget.</p>
                                            <span class="meta-data">Donated $26400 / <span class="cause-target">$30000</span></span>
                                    		<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#DonateModal">Donate Now</a>
											<?php
											if (isset($userRole) && $userRole === "admin") {
												// Display the "Change Image" button for admin users
												echo '<label for="imageUpload3" class="custom-file-upload">Change Banner Image</label>';
												echo '<input type="file" id="imageUpload3" accept="image/*" multiple="multiple">';
											}
											?>
                          			</div>
                        		</div>
                    		</div>
                        </div>
                    </div>
                </li>
          	</ul>
       	</div>
        <!-- end hero slider -->
		<script>
			const imageUpload3 = document.getElementById('imageUpload3');
			const banner3 = document.getElementById('banner3');

			// Retrieve the stored image URL from local storage on page load
			const storedImageUrl3 = localStorage.getItem('indexBanner3');
			if (storedImageUrl3) {
				banner3.style.backgroundImage = `url(${storedImageUrl3})`;
			}

			imageUpload3.addEventListener('change', function () {
				const file = imageUpload3.files[0];
				if (file && file.type.startsWith('image/')) {
				const reader = new FileReader();
					reader.onload = function (e) {
						banner3.style.backgroundImage = `url(${e.target.result})`;

						// Store the selected image URL for Page 1 in local storage
						localStorage.setItem('indexBanner3', e.target.result);
					};
					reader.readAsDataURL(file);
				}
			});
		</script>
    </div>
    <div class="accent-bg padding-tb20 cta-fw">
        <div class="container">
            <a href="#" class="btn btn-default btn-ghost btn-light btn-rounded pull-right">become a volunteer</a>
            <h4>let's start doing your bit for the world. Join us as a volunteer</h4>
        </div>
    </div>
    <!-- main content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-6 col-sm-6">
                    	<h4 class="accent-color short">why to join</h4>
                    	<h1>your support can make a huge difference</h1>
                    </div>
                    <div class="col-md-6 col-sm-6">
                    	<p>ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate <a href="#">velit esse</a> molestie consequat. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                        <p>donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla <a href="#">convallis egestas rhoncus</a>. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                    </div>
                </div>
                <div class="spacer-40"></div>
                <!-- latest causes -->
                <div class="carousel-wrapper">
                    <div class="row">
                        <ul class="owl-carousel carousel-fw" id="causes-slider" data-columns="5" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="5" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="causes-women.php" class="media-box">
                                            <img src="images/causeg1.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="88" data-color="f23827" data-toggle="tooltip" data-original-title="10 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="causes-women.php">help small shopkeepers of sunyani</a></h3>
                                            <div class="meta-data">donated $26400 / <span class="cause-target">$30000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donatemodal">donate now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="causes-hunger.php" class="media-box">
                                            <img src="images/causeg2.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="52" data-color="f6bb42" data-toggle="tooltip" data-original-title="25 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="causes-hunger.php">help relocate the refugees</a></h3>
                                            <div class="meta-data">donated $21840 / <span class="cause-target">$40000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donatemodal">donate now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg5.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="75" data-color="8cc152" data-toggle="tooltip" data-original-title="65 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">save tigers from poachers</a></h3>
                                            <div class="meta-data">donated $15000 / <span class="cause-target">$20000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donatemodal">donate now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg6.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="88" data-color="8cc152" data-toggle="tooltip" data-original-title="70 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">help rebuild nepal</a></h3>
                                            <div class="meta-data">donated $176000 / <span class="cause-target">$200000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donatemodal">donate now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="causes-education.php" class="media-box">
                                            <img src="images/causeg3.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="20" data-color="8cc152" data-toggle="tooltip" data-original-title="102 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="causes-education.php">education for everyone</a></h3>
                                            <div class="meta-data">donated $4000 / <span class="cause-target">$20000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donatemodal">donate now</a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="grid-item cause-grid-item small-business format-standard">
                                    <div class="grid-item-inner">
                                        <a href="single-cause.php" class="media-box">
                                            <img src="images/causeg4.jpg" alt="">
                                        </a>
                                        <div class="grid-item-content">
                                            <a class="cprogress" data-complete="50" data-color="8cc152" data-toggle="tooltip" data-original-title="105 days left"><strong></strong></a>
                                            <h3 class="post-title"><a href="single-cause.php">save water initiative</a></h3>
                                            <div class="meta-data">donated $5000 / <span class="cause-target">$10000</span></div>
                                        </div>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donatemodal">donate now</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        
            <div class="spacer-50"></div>
            
            <div class="padding-tb75 lgray-bg">
            	<div class="container">
                	<div class="text-align-center">
                  		<h2 class="block-title block-title-center">upcoming events</h2>
                    </div>
                    <div class="spacer-20"></div>
                    <div class="carousel-wrapper">
                        <div class="row">
                            <ul class="owl-carousel carousel-fw" id="news-slider" data-columns="3" data-autoplay="" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="3" data-items-desktop-small="2" data-items-tablet="1" data-items-mobile="1">
                                <li class="item">
                                    <div class="grid-item event-grid-item format-standard">
                                        <div class="grid-item-inner">
                                            <a href="single-event.php" class="media-box">
                                                <img src="images/event1.jpg" alt="">
                                            </a>
                                            <div class="grid-item-content">
                                                <span class="event-date">
                                                    <span class="date">14</span>
                                                    <span class="month">jan</span>
                                                    <span class="year">2016</span>
                                                </span>
                                                <span class="meta-data">thursday, 11:20 am - 02:20 pm</span>
                                                <h3 class="post-title"><a href="single-event.php">summer camp: students get together</a></h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item">200<span class="badge">attendees</span></li>
                                                    <li class="list-group-item">341 magetic state, us<span class="badge">location</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="grid-item event-grid-item format-standard">
                                        <div class="grid-item-inner">
                                            <a href="single-event.php" class="media-box">
                                                <img src="images/event2.jpg" alt="">
                                            </a>
                                            <div class="grid-item-content">
                                                <span class="event-date">
                                                    <span class="date">18</span>
                                                    <span class="month">jan</span>
                                                    <span class="year">2016</span>
                                                </span>
                                                <span class="meta-data">monday, 07:00 pm</span>
                                                <h3 class="post-title"><a href="single-event.php">campaign: fundraising for meals</a></h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item">200<span class="badge">attendees</span></li>
                                                    <li class="list-group-item">341 magetic state, us<span class="badge">location</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                             	</li>
                                <li class="item">
                                    <div class="grid-item event-grid-item format-standard">
                                        <div class="grid-item-inner">
                                            <a href="single-event.php" class="media-box">
                                                <img src="images/event3.jpg" alt="">
                                            </a>
                                            <div class="grid-item-content">
                                            <span class="event-date">
                                                <span class="date">26</span>
                                                <span class="month">feb</span>
                                                <span class="year">2016</span>
                                            </span>
                                                <span class="meta-data">friday, 01:00 pm</span>
                                                <h3 class="post-title"><a href="single-event.php">campaign: green environment</a></h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item">200<span class="badge">attendees</span></li>
                                                    <li class="list-group-item">341 magetic state, us<span class="badge">location</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                             	</li>
                                <li class="item">
                                    <div class="grid-item event-grid-item format-standard">
                                        <div class="grid-item-inner">
                                            <a href="single-event.php" class="media-box">
                                                <img src="images/event4.jpg" alt="">
                                            </a>
                                            <div class="grid-item-content">
                                            <span class="event-date">
                                                <span class="date">02</span>
                                                <span class="month">mar</span>
                                                <span class="year">2016</span>
                                            </span>
                                                <span class="meta-data">wednesday, 10:00 am</span>
                                                <h3 class="post-title"><a href="single-event.php">campaign: medical checkup camp</a></h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item">200<span class="badge">attendees</span></li>
                                                    <li class="list-group-item">341 magetic state, us<span class="badge">location</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                             	</li>
                                <li class="item">
                                    <div class="grid-item event-grid-item format-standard">
                                        <div class="grid-item-inner">
                                            <a href="single-event.php" class="media-box">
                                                <img src="images/event5.jpg" alt="">
                                            </a>
                                            <div class="grid-item-content">
                                                <span class="event-date">
                                                    <span class="date">02</span>
                                                    <span class="month">mar</span>
                                                    <span class="year">2016</span>
                                                </span>
                                                <span class="meta-data">wednesday, 01:30 pm</span>
                                                <h3 class="post-title"><a href="single-event.php">tips: rain water harvesting</a></h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item">200<span class="badge">attendees</span></li>
                                                    <li class="list-group-item">341 magetic state, us<span class="badge">location</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                             	</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="parallax parallax5 parallax-light text-align-center padding-tb100" style="background-image:url(images/parallax6.jpg)">
            	<div class="container">
                    <div class="carousel-wrapper">
                        <div class="row">
                            <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="1" data-autoplay="5000" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                <li class="item">
                                    <div class="testimonial-block">
                                        <blockquote>
                                            <p>lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                        </blockquote>
                                        <div class="testimonial-avatar"><img src="images/story1.jpg" alt="" width="70" height="70"></div>
                                        <div class="testimonial-info">
                                            <div class="testimonial-info-in">
                                                <strong>ada ajimobi</strong>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="testimonial-block">
                                        <blockquote>
                                            <p>lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                        </blockquote>
                                        <div class="testimonial-avatar"><img src="images/story2.jpg" alt="" width="70" height="70"></div>
                                        <div class="testimonial-info">
                                            <div class="testimonial-info-in">
                                                <strong>chloe lévesque</strong>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer-75"></div>
            <!-- latest blog posts -->
            <div class="container">
            	<div class="row">
                	<div class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                        <div class="grid-item-inner">
                            <a href="single-event.php" class="media-box">
                                <img src="images/post1.jpg" alt="">
                            </a>
                            <div class="grid-item-content">
                                <h3 class="post-title"><a href="single-post.php">a single person can change million lives</a></h3>
                                <span class="meta-data"><i class="fa fa-calendar"></i> posted on 11th dec, 2015</span>
                                <p>a blog post sample excerpt text which can be edited by editing the blog post page...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                        <div class="grid-item-inner">
                            <a href="single-event.php" class="media-box">
                                <img src="images/post2.jpg" alt="">
                            </a>
                            <div class="grid-item-content">
                                <h3 class="post-title"><a href="single-post.php">donate your woolens this winter</a></h3>
                                <span class="meta-data"><i class="fa fa-calendar"></i> posted on 11th dec, 2015</span>
                                <p>a blog post sample excerpt text which can be edited by editing the blog post page...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 grid-item blog-grid-item format-standard">
                        <div class="grid-item-inner">
                            <a href="single-event.php" class="media-box">
                                <img src="images/post3.jpg" alt="">
                            </a>
                            <div class="grid-item-content">
                                <h3 class="post-title"><a href="single-post.php">how to survive the tough path of life</a></h3>
                                <span class="meta-data"><i class="fa fa-calendar"></i> posted on 11th dec, 2015</span>
                                <p>a blog post sample excerpt text which can be edited by editing the blog post page...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">

    // frontpage time counter
    var expirydate = $('#counter').data('date');
    var target = new date(expirydate),
    finished = false,
    availiableexamples = {
        set15daysfromnow: 15 * 24 * 60 * 60 * 1000,
        set5minfromnow  : 5 * 60 * 1000,
        set1minfromnow  : 1 * 60 * 1000
    };
    function callback(event) {
        $this = $(this);
        switch(event.type) {
            case "seconds":
            case "minutes":
            case "hours":
            case "days":
            case "weeks":
            case "daysleft":
                $this.find('div span#'+event.type).php(event.value);
                if(finished) {
                    $this.fadeto(0, 1);
                    finished = false;
                }

                break;
            case "finished":
                $this.fadeto('slow', .5);
                finished = true;
                break;
        }
    }
    $('#counter').countdown(target.valueof(), callback);
    </script>
    
    <!-- site footer -->
    <?php load_common_page_footer() ?>
    <!-- donate form modal -->
    <?php donate_dialog() ?>
    <!-- libraries loader -->
    <?php lib() ?>
    <!-- style switcher start -->
    <?php style_switcher() ?>

</body>
</html>