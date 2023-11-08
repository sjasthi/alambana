<?php
/* Displays all error messages */
session_start();
include 'shared_resources.php';
?>

<!DOCTYPE html>
<html>
<head>

  <title>Error</title>
    <!-- CSS
    ================================================== -->
    <?php css() ?>

    <!-- SCRIPTS
    ================================================== -->
    <?php load_common_page_scripts() ?>
</head>
<body>
<div class="form" style="padding: 5px 25px; margin-top: 50px; margin-left: 100px; margin-right: 50px;">
    <h1>Error</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: loginForm.php" );
    endif;
    ?>
    </p>     
    <a href="loginForm.php"><button class="btn-primary btn-ghost btn-light btn-rounded" style="padding: 5px 25px; margin-left: 30px; margin-right: 50px;"/>Back</button></a>
</div>
</body>
</html>
