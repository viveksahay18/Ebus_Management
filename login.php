<?php
session_start();
include 'db_config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['email'] = $user['email'];
        header("Location: view_details.html");
        exit();
    } else {
        echo "<h3 style='text-align:center;color:red;'>Incorrect password.</h3>";
    }
} else {
    echo "<h3 style='text-align:center;color:red;'>User not found.</h3>";
}
$conn->close();
?>
