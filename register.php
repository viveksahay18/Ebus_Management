<?php
include 'db_config.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password hash

$sql = "INSERT INTO users (first_name, last_name, email, password) 
        VALUES ('$first_name', '$last_name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    // Redirect to login page after successful registration
    header("Location: login.html");
    exit(); // Always exit after a redirect
} else {
    echo "<h3 style='text-align:center;color:red;'>Error: " . $conn->error . "</h3>";
}
$conn->close();
?>
