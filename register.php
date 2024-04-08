<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require 'db_configuration.php';


/* User registers as a new user, (checks if user exists and password is correct) */
if (isset($_POST['password']) && isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {

    $pass = $db->escape_string($_POST['password']);
    $pass_confirm = $db->escape_string($_POST['password_confirm']);
    //Password Field Confirmation
    if ($pass === $pass_confirm) {
        //hash password to store in DB
        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
        //escape email to protect against SQL injections
        $email = $db->escape_string($_POST['email']);
        $first_name = $db->escape_string($_POST['first_name']);
        $last_name = $db->escape_string($_POST['last_name']);

        // (SU23-30) (Feature) create an email validation token
        // reference https://code.tutsplus.com/how-to-implement-email-verification-for-new-members--net-3824t
        $email_validation = md5(rand(0, 1000));
        $email_validation = substr($email_validation, 0, 10); // chop validation to 10 digits since database field only holds 10

        //insert user info into DB
        $sql = "INSERT INTO users (first_name, last_name, email, hash, validation_code, role)
                VALUES ('$first_name', '$last_name', '$email', '$hash_pass', '$email_validation', 'User')";

        if (mysqli_query($db, $sql)) {
            // read config.ini
            $email_settings = parse_ini_file("smtp.ini");
            // case where unable to read config file
            if (!$email_settings) {
                echo "failed to read smtp.ini";
            } else {
                set_time_limit(10); // Set maximum execution time to 300 seconds (5 minutes)
                $mail = new PHPMailer(true);
                try {
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->isSMTP();
                    $mail->Host = $email_settings["host"];
                    $mail->Port = $email_settings["port"];

                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

                    $mail->setFrom($email_settings["sender"], 'Aalambana');
                    $mail->addAddress($email, $first_name . " " . $last_name);     //Add a recipient
                    $mail->Subject = 'Signup | Validation';
                    $mail->Body = '

                    Your account has been created. Please click this link to activate your account:
                    ' . $email_settings["URL"] . '/validation.php?email=' . $email . '&email_validation=' . $email_validation . '
                    
                    ';
                    $mail->send();
                    echo 'Message has been sent';
                    header("location: loginForm.php?success=true");
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                // send validation email
                /*$email_subject = 'Signup | Validation';
                $email_message = '

                Your account has been created. Please click this link to activate your account:
                ' . $email_settings["URL"] . '/validation.php?email=' . $email . '&email_validation=' . $email_validation . '
                
                ';
                $email_headers = 'From: noreply@projectaalambana.com' . "\r\n";
                $email_headers .= "MIME-Version: 1.0\r\n";
                $email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                error_reporting(-1);
                ini_set('display_errors', 'On');
                set_error_handler("var_dump");
                if (mail($email, $email_subject, $email_message, $email_headers)) {
                    $_SESSION['status'] = "Sucess";
                    $_SESSION['email'] = $email;
                    header("location: validation.php");
                } else {
                    $last_error = error_get_last();
                    echo "Email failed with error: " . $last_error['message'];
                }*/
            }
        }
        // case where the sql insert failed
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
}
?>