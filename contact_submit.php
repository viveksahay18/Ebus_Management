<html>
<head>
<style>
.a {
  background-color: #007bff; 
  padding: 15px 20px;
  position: fixed;
  top: 0;
  width: 100%;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
  z-index: 100;
}
</style>
</head>
<body>
        <a href="driverdashboard.html">Dashboard</a></li>
</html>
<?php
include 'db_config.php';

$full_name = $_POST['full_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_info (full_name, phone, email, message)
        VALUES ('$full_name', '$phone', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<h3 style='text-align:center; font-family:sans-serif;'>Contact info submitted successfully!</h3>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
