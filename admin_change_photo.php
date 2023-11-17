<?php
session_start();

echo "Script is running"; // Add this line for debugging

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_photo'])) {
    echo "Form submitted<br>";

    if (isset($_FILES['file'])) {
        echo "File input is set<br>";

        $fileError = $_FILES['file']['error'];
        if ($fileError === 0) {
            echo "No file upload error<br>";

            $fileTMP = $_FILES['file']['tmp_name'];
            $fileNewName = uniqid('', true) . "." . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $fileDestination = 'images/users_pictures/' . $fileNewName;

            echo "Before file upload<br>";

            if (move_uploaded_file($fileTMP, $fileDestination)) {
                echo "File successfully uploaded to: $fileDestination<br>";

                require 'db_configuration.php';

                $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Check if the user already has a picture
                $user_id = $_POST["user_id"];
                $check_user_photo_sql = "SELECT * FROM user_photos WHERE User_Id = $user_id";
                $check_result = $connection->query($check_user_photo_sql);

                if ($check_result->num_rows > 0) {
                    // If the user has a picture, update the existing row
                    $update_user_photo_sql = "UPDATE user_photos SET Location = '$fileDestination' WHERE User_Id = $user_id";

                    echo "SQL Query: $update_user_photo_sql<br>";

                    if (mysqli_query($connection, $update_user_photo_sql)) {
                        echo "Picture updated successfully.";
                    } else {
                        echo "Error updating user picture: " . mysqli_error($connection);
                    }
                } else {
                    // If the user doesn't have a picture, insert a new row
                    $insert_user_photo_sql = "INSERT INTO user_photos (User_Id, Picture_Id, Location) VALUES (
                        $user_id,
                        NULL,
                        '$fileDestination')";

                    echo "SQL Query: $insert_user_photo_sql<br>";

                    if (mysqli_query($connection, $insert_user_photo_sql)) {
                        $last_picture_id = mysqli_insert_id($connection);

                        $update_user_picture_sql = "UPDATE users SET Picture_Id = $last_picture_id WHERE id = $user_id";

                        echo "SQL Query: $update_user_picture_sql<br>";

                        if (mysqli_query($connection, $update_user_picture_sql)) {
                            echo "Picture changed successfully.";
                        } else {
                            echo "Error updating user picture: " . mysqli_error($connection);
                        }
                    } else {
                        echo "Error inserting user photo: " . mysqli_error($connection);
                    }
                }

                mysqli_close($connection);
            } else {
                echo "Error moving file";
            }

            echo "After file upload<br>";
        } else {
            echo "File upload error: $fileError";
        }
    } else {
        echo "File input is not set<br>";
    }
} else {
    echo "Form not submitted<br>";
    die(); // Stop script if the form is not submitted
}
header("Location: admin_users.php");
?>
