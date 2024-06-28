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

// Fetch the latest 100 data points
$sql = "SELECT id, temperature, humidity, air_quality, timestamp FROM data ORDER BY timestamp DESC LIMIT 100";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "No data found";
    exit;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ESP 32 Weather Station - Data Visualization</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 15px;
            background-color: white;
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
            padding: 20px;
        }
        .chart-container {
            margin-top: 20px;
            height: 300px; /* Adjusted height */
        }
        h1, h3 {
            color: #0056b3;
        }
        .card {
            background-color: #f8f9fa;
            border: 1px solid #0056b3;
            border-radius: 10px;
            padding: 20px;
            width: 100%; /* Adjusted width to be responsive */
            margin-top: 20px;
        }
        .icon {
            color: #0056b3;
            font-size: 1.5em;
        }
        #daterange, #specificDate {
            border-radius: 5px;
            border: 1px solid #0056b3;
            padding: 5px;
        }
        .avg-data p {
            margin: 10px 0;
        }
        .btn-group {
            display: flex;
            gap: 5px;
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
            <a href="history.php" class="btn">
                <i class="fas fa-history"></i> History
            </a>
            <a href="graph.php" class="btn active">
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
        <h1 class="text-center"><i class="fas fa-cloud-sun icon"></i> ESP 32 Weather Station - Data Visualization</h1>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <input type="text" id="daterange" class="form-control" placeholder="Select Date Range">
                    </div>
                </div>
                <div id="temperatureChart" class="chart-container"></div>
                <div id="humidityChart" class="chart-container"></div>
                <div id="airQualityChart" class="chart-container"></div>
            </div>
            <div class="col-md-3">
                <h3><i class="fas fa-chart-line icon"></i> Average Data</h3>
                <div class="form-group">
                    <input type="text" id="specificDate" class="form-control" placeholder="Select Date">
                </div>
                <div class="card">
                    <div id="averageData" class="avg-data">
                        <p><i class="fas fa-thermometer-half icon"></i> Average Temperature: <span id="avgTemperature">N/A</span></p>
                        <p><i class="fas fa-tint icon"></i> Average Humidity: <span id="avgHumidity">N/A</span></p>
                        <p><i class="fas fa-wind icon"></i> Average Air Quality: <span id="avgAirQuality">N/A</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            let data = <?php echo json_encode($data); ?>;
            console.log(data);

            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawCharts);

            function drawCharts(filteredData = data) {
                drawTemperatureChart(filteredData);
                drawHumidityChart(filteredData);
                drawAirQualityChart(filteredData);
            }

            function drawTemperatureChart(data) {
                const dataArray = [['Timestamp', 'Temperature']];
                data.forEach(item => {
                    dataArray.push([new Date(item.timestamp), parseFloat(item.temperature)]);
                });

                const dataTable = google.visualization.arrayToDataTable(dataArray);

                const options = {
                    title: 'Temperature Over Time',
                    legend: { position: 'bottom' },
                    hAxis: { title: 'Timestamp' },
                    vAxis: { title: 'Temperature (°C)' },
                    colors: ['#1b9e77'],
                    trendlines: { 0: {} }, // Adds trendline
                    pointSize: 5, // Points size for scatter plot
                    height: 300, // Adjusted height
                };

                const chart = new google.visualization.ScatterChart(document.getElementById('temperatureChart'));
                chart.draw(dataTable, options);
            }

            function drawHumidityChart(data) {
                const dataArray = [['Timestamp', 'Humidity']];
                data.forEach(item => {
                    dataArray.push([new Date(item.timestamp), parseFloat(item.humidity)]);
                });

                const dataTable = google.visualization.arrayToDataTable(dataArray);

                const options = {
                    title: 'Humidity Over Time',
                    legend: { position: 'bottom' },
                    hAxis: { title: 'Timestamp' },
                    vAxis: { title: 'Humidity (%)' },
                    colors: ['#d95f02'],
                    trendlines: { 0: {} }, // Adds trendline
                    pointSize: 5, // Points size for scatter plot
                    height: 300, // Adjusted height
                };

                const chart = new google.visualization.ScatterChart(document.getElementById('humidityChart'));
                chart.draw(dataTable, options);
            }

            function drawAirQualityChart(data) {
                const dataArray = [['Timestamp', 'Air Quality']];
                data.forEach(item => {
                    dataArray.push([new Date(item.timestamp), parseFloat(item.air_quality)]);
                });

                const dataTable = google.visualization.arrayToDataTable(dataArray);

                const options = {
                    title: 'Air Quality Over Time',
                    legend: { position: 'bottom' },
                    hAxis: { title: 'Timestamp' },
                    vAxis: { title: 'Air Quality' },
                    colors: ['#7570b3'],
                    trendlines: { 0: {} }, // Adds trendline
                    pointSize: 5, // Points size for scatter plot
                    height: 300, // Adjusted height
                };

                const chart = new google.visualization.ScatterChart(document.getElementById('airQualityChart'));
                chart.draw(dataTable, options);
            }

            $('#daterange').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                const filteredData = data.filter(item => {
                    const timestamp = new Date(item.timestamp);
                    return timestamp >= start.toDate() && timestamp <= end.toDate();
                });
                drawCharts(filteredData);
            });

            $('#specificDate').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end, label) {
                const selectedDate = start.format('YYYY-MM-DD');
                const filteredData = data.filter(item => {
                    const timestamp = new Date(item.timestamp).toISOString().split('T')[0];
                    return timestamp === selectedDate;
                });

                const avgTemperature = filteredData.reduce((sum, item) => sum + parseFloat(item.temperature), 0) / filteredData.length || 0;
                const avgHumidity = filteredData.reduce((sum, item) => sum + parseFloat(item.humidity), 0) / filteredData.length || 0;
                const avgAirQuality = filteredData.reduce((sum, item) => sum + parseFloat(item.air_quality), 0) / filteredData.length || 0;

                document.getElementById('avgTemperature').textContent = avgTemperature.toFixed(2) + ' °C';
                document.getElementById('avgHumidity').textContent = avgHumidity.toFixed(2) + ' %';
                document.getElementById('avgAirQuality').textContent = avgAirQuality.toFixed(2);
            });
        });
    </script>
</body>
</html>
