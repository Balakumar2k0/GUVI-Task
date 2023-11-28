<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['Email'];
$password = $_POST['Password'];

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
