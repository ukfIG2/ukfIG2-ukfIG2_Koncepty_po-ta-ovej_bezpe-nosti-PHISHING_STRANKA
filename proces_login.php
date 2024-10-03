<?php
// db_connect.php

include 'database.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Validate the form data (e.g., check if username and password are not empty)
if (empty($username) || empty($password)) {
    echo "Username and password are required.";
    exit;
}

// Insert the username and password into the database
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "Za chvílu Vás presmerujeme!";

    session_start();

        // Get the ID of the inserted user
        $last_id = $stmt->insert_id;
        //echo "User ID: " . $last_id;

        // Store the user ID in the session
    $_SESSION['user_id'] = $last_id;


    header("Location: udaje.php");

} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>