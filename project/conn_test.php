<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


$host = "localhost";
$port = "5432";
$dbname = "website";
$user = "postgres";
$password = "12345";

// Establish the database connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Check if the connection is successful
if (!$conn) {
    echo "Connection failed: " . pg_last_error($conn);
} else {
    echo "Connected successfully!";
}

// Close the database connection
pg_close($conn);
?>
