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
            $verificationLink = 'http://192.168.0.118/project/Register/Confirmation/verification.php?email=' . urlencode($email);
            $mail->Body = '
            <!DOCTYPE html>
            <html>
            <head>
              <title>Email Verification</title>
              <style>
                body {
                  font-family: Arial, sans-serif;
                  background-color: #f4f4f4;
                  padding: 20px;
                }
                .container {
                  max-width: 600px;
                  margin: 0 auto;
                  background-color: #ffffff;
                  padding: 40px;
                  border-radius: 10px;
                  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                }
                h2 {
                  color: #333333;
                }
                .button {
                  display: inline-block;
                  background-color: blue;
                  color: white !important;
                  padding: 10px 20px;
                  text-decoration: none;
                  border-radius: 25px;
                }
                .button:hover {
                  background-color: rgb(15, 122, 255);
                }
              </style>
            </head>
            <body>
              <div class="container">
                <h2>Email Verification</h2>
                <p>Please click the following button to verify your email:</p>
                <a class="button" href="' . $verificationLink . '">Verify Email</a>
              </div>
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
