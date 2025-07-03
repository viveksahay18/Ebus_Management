<html>
<head>
<style>
.a {
	align-items: center;
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
        <a href="driverdashboard.html">Dashboard</a>
</body>
</html>
<?php
include 'db_config.php';

$start_city = $_POST['start_city'];
$destination_city = $_POST['destination_city'];
$intermediate_stops = $_POST['intermediate_stops'];
$departure_time = $_POST['departure_time'];
$arrival_time = $_POST['arrival_time'];
$days = isset($_POST['days']) ? implode(", ", $_POST['days']) : '';
$bus_number = $_POST['bus_number'];
$seating_capacity = $_POST['seating_capacity'];
$facilities = isset($_POST['facilities']) ? implode(", ", $_POST['facilities']) : '';

$sql = "INSERT INTO buses (
    start_city, destination_city, intermediate_stops, departure_time, arrival_time,
    days_of_operation, bus_number, seating_capacity, facilities
) VALUES (
    '$start_city', '$destination_city', '$intermediate_stops', '$departure_time', '$arrival_time',
    '$days', '$bus_number', '$seating_capacity', '$facilities'
)";

if ($conn->query($sql) === TRUE) {
    echo "<h3 style='text-align:center; font-family:sans-serif;'>Bus information submitted successfully.</h3>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
