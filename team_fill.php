<?php

$status = session_status();
if ($status == PHP_SESSION_NONE) {
  session_start();
}

function getCoreTeamInfo() {
    $coreTeam = array(
        'VARMA ALLURI',
        'RAM YALAMANCHILLI',
        'RAJU VATSAVAI',
        'ROHAN CHAVA',
        'MOUNIKA TIRUVAIPATI',
        'DEEPA AGRAWAL',
        'RAVI TIRUVAIPATI',
        'SURYA GANGIREDDY',
        'SURESH MALLINA',
        'APARNA ALLURI',
        'PRATHYUSHA YALAMANCHILI',
        'SARADA KOTNANI',
        'BHAVANA REDDY',
        'SWETHA GANGIREDDY',
        'AJAY CHAVA'
    );

    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $coreTeamList = "'" . implode("', '", $coreTeam) . "'";
    $query = "SELECT users.*, user_photos.Location AS picture_location 
              FROM users 
              LEFT JOIN user_photos ON users.Picture_Id = user_photos.Picture_Id
              WHERE CONCAT(users.first_name, ' ', users.last_name) IN ($coreTeamList)";

    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        echo '<div class="user-list">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 col-sm-4">';
            echo '<div class="grid-item grid-staff-item">';
            echo '<div class="grid-item-inner">';
            echo '<div class="media-box"><img src="' . $row['picture_location'] . '" alt=""></div>';
            echo '<div class="grid-item-content">';
            echo '<h3>' . $row['first_name'] . ' ' . $row['last_name'] . '</h3>';
            echo '<p>Email: ' . $row['email'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "No matching users found in the database.";
    }

    $connection->close();
}