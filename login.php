<?php
// Establish a connection to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['Email'];
$password = $_POST['Password'];

// Add more secure password handling (e.g., hashing) in a production environment

// Check if the user exists
$sql = "SELECT * FROM register WHERE Email='$email' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<script>alert('welcome to Profile page')</script>";
    echo '<script>window.location.href = "profile.html";</script>';
} else {
    echo "<script>alert('Email or  Password is Wrong.....')</script>";
    echo '<script>window.location.href = "login.html";</script>';
}

$conn->close();
?>
