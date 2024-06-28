<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensor_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$startDate = '';
$endDate = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
}

$sql = "SELECT * FROM data";
if ($startDate && $endDate) {
    $sql .= " WHERE timestamp BETWEEN '$startDate' AND '$endDate'";
}
$result = $conn->query($sql);

if (isset($_POST['generate_xml'])) {
    $xml = new SimpleXMLElement('<data/>');
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $entry = $xml->addChild('entry');
            $entry->addChild('id', $row['id']);
            $entry->addChild('temperature', $row['temperature']);
            $entry->addChild('humidity', $row['humidity']);
            $entry->addChild('air_quality', $row['air_quality']);
            $entry->addChild('timestamp', $row['timestamp']);
        }
    }

    Header('Content-type: text/xml');
    Header('Content-Disposition: attachment; filename="sensor_data.xml"');
    print($xml->asXML());
    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sensor Data History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
        }
        .header h3 {
            flex: 0 0 auto;
            margin: 0;
        }
        .header .button-container {
            display: flex;
            gap: 10px;
        }
        .header .btn {
            background-color: #ffffff;
            color: #000;
            border: none;
        }
        .header .btn.active {
            background-color: #0056b3;
            color: #ffffff;
        }
        .container {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-generate-xml {
            margin-right: 10px;
        }
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3><i class="fas fa-cloud-sun"></i> ESP 32 Weather Station</h3>
        <div class="button-container">
            <a href="dashboard.php" class="btn">
                <i class="fas fa-home"></i> Home
            </a>
            <a href="history.php" class="btn active">
                <i class="fas fa-history"></i> History
            </a>
            <a href="graph.php" class="btn">
                <i class="fas fa-chart-line"></i> Graph
            </a>
            <a href="device.php" class="btn">
                <i class="fas fa-microchip"></i> Device
            </a>
            <a href="about.php" class="btn">
                <i class="fas fa-info-circle"></i> About Us
            </a>
          
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="title-box">Sensor Data History</h1>
       
        </div>
        <form method="post" action="" class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="start_date">Start Date and Time:</label>
                    <input type="datetime-local" id="start_date" name="start_date" class="form-control" value="<?php echo $startDate; ?>">
                </div>
                <div class="form-group col-md-5">
                    <label for="end_date">End Date and Time:</label>
                    <input type="datetime-local" id="end_date" name="end_date" class="form-control" value="<?php echo $endDate; ?>">
                </div>
                <div class="form-group col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                </div>
            </div>
        </form>
        
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Temperature</th>
                    <th>Humidity</th>
                    <th>Air Quality</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['temperature']}</td>
                                <td>{$row['humidity']}</td>
                                <td>{$row['air_quality']}</td>
                                <td>{$row['timestamp']}</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
