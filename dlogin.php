<?php
session_start();

$conn = new mysqli("localhost", "root", "", "bus_system");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = md5($_POST['password']); 

$sql = "SELECT * FROM drivers WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $_SESSION['user'] = $user;
  header("Location: driverdashboard.html"); // redirect to dashboard
} else {
  echo "<script>alert('Invalid credentials!'); window.location.href='dlogin.html';</script>";
}

$conn->close();
?>
