<?Php

if (!isset ($_session)) {
    session_start();
}

include 'shared_resources.php';
//include 'event_controllers/event_fill.php';
include 'feedback_fill.php';
require_once 'header/index.php';

if (isset ($_SESSION['role'])) {
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
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- css
  ================================================== -->
    <?php css(); ?>

    <!-- scripts
  ================================================== -->
    <?php load_common_page_scripts(); ?>
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

        .carousel-item {
            z-index: 0;
        }

        .carousel-item img {
            object-fit: cover;
            width: 100%;
            height: 416px;
        }

        #carouselExampleControls {
            margin-top: 54px;
        }

        .body-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
      
        section {
            max-width: 1200px;
            margin: 0px auto;
            padding: 20px;
            padding-top: 0;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid black;
        }
        h2 {
            color: black;
        }
        p {
            line-height: 1.6;
            color: gray;
        }
        
        .section-content {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .text {
            flex: 1;
            padding-left: 10px;
        }

        .image {
            flex: 1;
            text-align: center;
        }

        .image img {
            max-width: 100%;
            height: auto;
        }

        h4 {
        font-style: italic;
        }

        .button {
            background-color: gray;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }

        .button:hover {
            background-color: blue;
        }

    
        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        
        .image-container {
            margin: 10px;
            width: 200px;
            height: 200px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        
        .image-container:hover img {
            transform: scale(1.1);
        }

        h3 {
            text-align: center;
        }

        .image-row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-row img {
            width: 100px;
            height: 75px;
            margin: 25px;
        }

        .image-class {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .image {
            flex: 0 0 30%;
            text-align: center;
        }

        .images {
            flex: 0 0 30%;
            text-align: center;
        }

        .images img {
            width: 25%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .images p {
            font-size: 14px;
            color: #333;
        }

        .images p b {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="body">
        <!-- site header wrapper -->
        <?php generate_header(); ?>
        <!-- banner area -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/cover_image.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="flex-caption-text text-align-center">
                            <h2 class="text-light">Together - We Can Serve Better</h2>
                            <a href="donate.php"><button type="button" class="btn btn-primary">Donate Now</button></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/slide2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="flex-caption-text text-align-center">
                            <h2 class="text-light">Make a difference for people who needs it the most</h2>
                            <a href="donate.php"><button type="button" class="btn btn-primary">Start the Change</button></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/slide6.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="flex-caption-text text-align-center">
                            <h2 class="text-light">Make a donation Today</h2>
                            <a href="donate.php"><button type="button" class="btn btn-primary">Start with little</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- end hero slider -->
    </div>
    
    <!-- main content -->
    <div class="body-container">
    <section>
    <div class="section-content">
        <div class="text">
            <h2>Welcome to Aalambana Foundation</h2>
            <h4>We will strive to bring together community members to serve the underprivileged better.</h4>
            <p>Aalambana Foundation is making a positive and lasting impact by enabling women empowerment, supporting socioeconomically disadvantaged children, and undertaking community betterment activities by bringing like-minded individuals together. We do this by volunteering at multiple charities, food banks, shelters, rescue missions and by funding back to school drives, food drives, enrichment, development activities, medical camps, mentoring and education programs and providing scholarships.</p>
        
            <p><a href="about.php"><button class="button">Know More!</button></a></p></div>
        <div class="image">
        </br /> </br /> </br />
            <img src="images/welcome.png">
        </div>
        
    </div>
    </section>
    <div class="spacer-30"></div>

    <div class="cta">
    <a href="community-support.php" class="btn btn-primary pull-right">Become a Volunteer</a>
    <p>Let's start doing your bit for the world. Join us as a volunteer.</p>
    </div>
    <div class="spacer-20"></div>
  
    <div>
    <h3>Photo Gallery</h3>
    <div class="image-gallery">
    <div class="image-container">
        <a href="gallery.php"><img src="images/Annadanam.png"></a>
    </div>
    <div class="image-container">
        <a href="gallery.php"><img src="images/Netralayam.png"></a>
    </div>
    <div class="image-container">
        <a href="gallery.php"><img src="images/1Netralayam.png"></a>
    </div>
    <div class="image-container">
        <a href="gallery.php"><img src="images/2Annadanam.png"></a>
    </div>
    </div>
    <div class="image-gallery">
    <div class="image-container">
        <a href="gallery.php"><img src="images/2Netralayam.png"></a>
    </div>
    <div class="image-container">
        <a href="gallery.php"><img src="images/1DBNO.jpg"></a>
    </div>
    <div class="image-container">
        <a href="gallery.php"><img src="images/3Netralayam.jpg"></a>
    </div>
    <div class="image-container">
        <a href="gallery.php"><img src="images/OCFoodBank.jpg"></a>
    </div>
</div>
<div class="spacer-30"></div>
<div class="image-class">
    <div class="images">
      <img src="images/blogIcon.png">
      <p><b>Blogs</b></p>
      <p>Register or login to connect and engage with the community through blogs by posting blogs and more.</p>
    </div>
  </div>
<div class="spacer-30"></div>
<div class="spacer-30"></div>
<div>
<h3>Some of the Organizations we Help</h3>
    <div class="image-row">
        <img src="images/org1.png">
        <img src="images/org2.png">
        <img src="images/org3.png">
        <img src="images/org4.png">
        <img src="images/org5.png">
        <img src="images/org6.png">
    </div>
</div>
<div class="spacer-30"></div>
</div>



            <script type="text/javascript">

                // frontpage time counter
                var expirydate = $('#counter').data('date');
                var target = new date(expirydate),
                    finished = false,
                    availiableexamples = {
                        set15daysfromnow: 15 * 24 * 60 * 60 * 1000,
                        set5minfromnow: 5 * 60 * 1000,
                        set1minfromnow: 1 * 60 * 1000
                    };
                function callback(event) {
                    $this = $(this);
                    switch (event.type) {
                        case "seconds":
                        case "minutes":
                        case "hours":
                        case "days":
                        case "weeks":
                        case "daysleft":
                            $this.find('div span#' + event.type).php(event.value);
                            if (finished) {
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
            <!-- site footer -->
            <?php load_common_page_footer(); ?>
            <!-- donate form modal -->
            <?php donate_dialog(); ?>
            <!-- libraries loader -->
            <?php lib(); ?>
            <!-- style switcher start -->
            <?php style_switcher(); ?>

</body>

</html>