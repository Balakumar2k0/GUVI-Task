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
$name = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$confirm = $_POST['Confirm'];

// Add more secure password handling (e.g., hashing) in a production environment

// Insert data into MySQL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $checkEmailQuery = "SELECT * FROM register WHERE Email='$email'";
    $result = $conn->query($checkEmailQuery);
    if ($result->num_rows > 0) {
        echo '<script>alert("Email is already registered. Please use a different email.");</script>';
        exit();
        
    }
}
if($password==$confirm)
{
    $sql = "INSERT INTO register (Name, Email, Password, Confirm) VALUES ('$name', '$email', '$password', '$confirm')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Sign up Successfully....");</script>';
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
    echo '<script>alert("Password and confirm password must be same.");</script>';
    echo '<script>window.location.href = "register.html";</script>';
    

}



$conn->close();
?>
