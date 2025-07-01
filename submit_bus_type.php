<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "bus_system";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$bus_name = $_POST['bus_name'];
$bus_type = $_POST['bus_type'];
$description = $_POST['description'];

// Insert into database
$sql = "INSERT INTO bus_types (bus_name, bus_type, description) 
        VALUES ('$bus_name', '$bus_type', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "<h3 style='text-align:center;font-family:sans-serif;'>Bus type posted successfully!</h3>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
