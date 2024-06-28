<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensor_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest data
$sql_latest = "SELECT * FROM data ORDER BY timestamp DESC LIMIT 1";
$result_latest = $conn->query($sql_latest);

$data_latest = [];
if ($result_latest->num_rows > 0) {
    $data_latest = $result_latest->fetch_assoc();
}

// Fetch the data from 10 minutes ago
$sql_10_min_ago = "SELECT * FROM data WHERE timestamp <= DATE_SUB(NOW(), INTERVAL 10 MINUTE) ORDER BY timestamp DESC LIMIT 1";
$result_10_min_ago = $conn->query($sql_10_min_ago);

$data_10_min_ago = [];
if ($result_10_min_ago->num_rows > 0) {
    $data_10_min_ago = $result_10_min_ago->fetch_assoc();
}

$response = array_merge($data_latest, [
    'temperature_10_min_ago' => $data_10_min_ago['temperature'] ?? null,
    'humidity_10_min_ago' => $data_10_min_ago['humidity'] ?? null,
    'air_quality_10_min_ago' => $data_10_min_ago['air_quality'] ?? null,
    'timestamp_10_min_ago' => $data_10_min_ago['timestamp'] ?? null
]);

echo json_encode($response);

$conn->close();
?>
