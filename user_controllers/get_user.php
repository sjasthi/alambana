<?php
require_once "templates.php";
function get_profile($id)
{
    $user = array(
        "first_name" => "Michael",
        "last_name" => "Scarr",
        "about" => "Hi! I'm Michael, a software engineer from St. Paul Minnesota.",
        "email" => "test@test.com",
        "role" => "Administrator",
        "user_picture_location" => null
    );
    ?>
    <link rel="stylesheet" href="user_controllers/styles.css" />
    <?php
    if ($id == $_SESSION["id"]) {
        generate_profile_edit($user);
    }
}