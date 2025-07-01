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
    echo "Bus information submitted successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>


