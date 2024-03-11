<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

// Assuming you have a PostgreSQL database connection established
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

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
    $query = "SELECT password FROM users WHERE email = $1";
    $result = pg_query_params($conn, $query, array($email));

    if ($result) {
        // Fetch the password from the result
        $row = pg_fetch_assoc($result);
        $userPassword = $row['password'];

        // Send email with the retrieved password
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
        $mail->Subject = 'Forgotten Password';
        $mail->Body    = 'Your password is: ' . $userPassword;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "success";
    } else {
        echo "Error querying the database: " . pg_last_error($conn);
    }
}



/*
// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();  
    $mail->SMTPDebug  = 2;  // Enable verbose debug output
    $mail->Host       = 'smtp.example.com';  // Set the SMTP server to send through
    $mail->SMTPAuth   = true;  // Enable SMTP authentication
    $mail->Username   = 'your_username@example.com';  // SMTP username
    $mail->Password   = 'your_password';  // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
    $mail->Port       = 587;  // TCP port to connect to: use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');  // Add a recipient

    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
*/

?>