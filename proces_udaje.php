<?php
// db_connect.php

include 'database.php'; 

// Get the form data
$user_id = $_POST['user_id'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Validate the form data (e.g., check if required fields are not empty)
if (empty($user_id) || empty($street) || empty($city) || empty($state) || empty($name) || empty($surname) || empty($phone) || empty($email)) {
    echo "All fields are required.";
    exit;
}
else{
    echo "Form submitted successfully!";
}

// Insert the form data into the database
$sql = "INSERT INTO udaje (street, city, state, name, surname, phone, email, id_usera) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt->bind_param("ssssssss", $street, $city, $state, $name, $surname, $phone, $email, $user_id)) {
    echo "Bound parameters successfully.<br>";
} else {
    echo "Error binding parameters: " . $stmt->error . "<br>";
}

if ($stmt->execute()) {
    echo "Data inserted successfully!<br>";
    header("Location: https://www.facebook.com");
} else {
    echo "Error executing statement: " . $stmt->error . "<br>";
}

$stmt->close();
$conn->close();

?>
