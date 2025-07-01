<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "bus_system";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$start_city = $conn->real_escape_string($_POST['start_city']);
$destination_city = $conn->real_escape_string($_POST['destination_city']);

// Simple query for buses matching start and destination cities (case-insensitive)
$sql = "SELECT * FROM buses WHERE LOWER(start_city) = LOWER('$start_city') AND LOWER(destination_city) = LOWER('$destination_city')";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="container">
    <h2>Search Results</h2>

    <?php
    if ($result->num_rows > 0) {
        while ($bus = $result->fetch_assoc()) {
            echo '<div class="bus-card">';
            echo '<h3>Bus Number: ' . htmlspecialchars($bus['bus_number']) . '</h3>';
            echo '<p class="bus-details"><strong>Departure Time:</strong> ' . htmlspecialchars($bus['departure_time']) . '</p>';
            echo '<p class="bus-details"><strong>Arrival Time:</strong> ' . htmlspecialchars($bus['arrival_time']) . '</p>';
            echo '<p class="bus-details"><strong>Days of Operation:</strong> ' . htmlspecialchars($bus['days_of_operation']) . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>No buses found for the given route. Please try another.</p>';
    }
    $conn->close();
    ?>

    <a href="view_details.html" style="display:block;margin-top:30px;text-align:center;color:#007bff;">Search Again</a>
</div>
</body>
</html>
