<?php
// db_connect.php

// Database configuration
$dbHost = "";
$dbUser = "";
$dbPass = "";
$dbName = "";

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check the connection
if ($conn->connect_error) {
    echo "Database connection failed.";

    die("Connection failed: " . $conn->connect_error);
    echo "Database connection failed.";
}
else{
    echo "Connected successfully";
}

