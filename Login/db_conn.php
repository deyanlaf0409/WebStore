<?php
// Assuming you have a PostgreSQL database connection established
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Replace these variables with your actual database credentials
$host = "localhost";
$port = "5432";
$dbname = "website";
$user = "postgres";
$password = "12345";

// Establish the database connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // After retrieving email and password
    //echo "Email: $email, Password: $password";

    // Validate email and password (you may want to add more validation here)

    // Perform the database check using parameterized query to prevent SQL injection
    $sql = "SELECT * FROM USERS WHERE email = $1 AND password = $2 AND is_verified = true";

    //echo "SQL Query: $sql";

    $result = pg_query_params($conn, $sql, array($email, $password));

    if (pg_num_rows($result) > 0) {
        // User exists and is verified, perform login actions
        echo "success";
    } else {
        // Check if the user exists but is not verified
        $sqlUnverified = "SELECT * FROM USERS WHERE email = $1 AND password = $2 AND is_verified = false";
        $resultUnverified = pg_query_params($conn, $sqlUnverified, array($email, $password));

        if (pg_num_rows($resultUnverified) > 0) {
            // User exists but is not verified
            echo "unverified";
        } else {
            // User does not exist, is not verified, or login failed
            echo "failure";
        }
    }
} else {
    // Handle non-POST requests if needed
    echo "Invalid request method";
}

pg_close($conn);
?>


