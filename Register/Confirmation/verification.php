<?php

// Replace these variables with your actual database credentials
$host = "localhost";
$port = "5432";
$dbname = "website";
$user = "postgres";
$password = "12345";

// Establish the database connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['email'])) {
    $email = $_GET['email'];

    // Update the 'verify' column to true
    $query = "UPDATE users SET is_verified = true WHERE email = $1";
    $result = pg_query_params($conn, $query, array($email));
    "postgres";
    $password = "12345";
    
    if ($result) {
        // Redirect the user to verification success page
        header("Location: verification_success.php");
        exit();
    } else {
        echo "Error updating verification status: " . pg_last_error($conn);
    }
} else {
    // Invalid request
    echo "Invalid request.";
}
?>
