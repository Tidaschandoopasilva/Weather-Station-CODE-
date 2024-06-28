<?php
$servername = "localhost";  // Usually this is 'localhost' for local servers
$username = "root";         // Default XAMPP username
$password = "";             // Default XAMPP password
$dbname = "sensor_data";    // The database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if data is received
if (isset($_POST['temperature']) && isset($_POST['humidity']) && isset($_POST['air_quality'])) {
    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];
    $air_quality = $_POST['air_quality'];

    $sql = "INSERT INTO data (temperature, humidity, air_quality) VALUES ('$temperature', '$humidity', '$air_quality')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid data";
}

$conn->close();
?>
