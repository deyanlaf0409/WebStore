<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

// Assuming you have a PostgreSQL database connection established
// Replace these variables with your actual database credentials
$host = "localhost";
$port = "5432";
$dbname = "website";
$user = "postgres";
$password = "12345";

// Establish the database connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];

    // Query the database to get the password for the provided email
    $query = "SELECT is_verified FROM users WHERE email = $1";
    $result = pg_query_params($conn, $query, array($email));

    if ($result) {
        // Fetch the password and verification status from the result
        $row = pg_fetch_assoc($result);
        $verify = $row['is_verified'];
        //echo $verify;

        if ($verify === "f") {
            // Send email with the verification link
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            //$mail->SMTPDebug = 2;
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'reaper.laf@gmail.com';
            $mail->Password   = 'rftz vgeo wlgr biue';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('reaper.laf@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';

            // HTML body with verification link
            $verificationLink = 'http://yourwebsite.com/verify.php?email=' . urlencode($email);
            $mail->Body = '
            <!DOCTYPE html>
            <html>
            <head>
              <title>Email Verification</title>
            </head>
            <body>
              <p>Please click the following link to verify your email:</p>
              <a href="' . $verificationLink . '">Verify Email</a>
            </body>
            </html>
            ';

            $mail->AltBody = 'Please verify your email by visiting the following link: ' . $verificationLink;

            $mail->send();

            echo "success";
        } else {
            echo "failure";
        }
    } else {
        echo "Error querying the database: " . pg_last_error($conn);
    }
}
?>
