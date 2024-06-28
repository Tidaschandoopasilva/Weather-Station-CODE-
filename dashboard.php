<!DOCTYPE html>
<html>
<head>
    <title>ESP 32 Weather Station</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
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
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }
        .welcome-statement {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            
        }
        .data-container {
            display: flex;
            justify-content: space-around;
            width: 120%;
            flex-wrap: wrap;
            margin-top: 5px;
        }
        .data-box {
            background-color: #fff;
            border: 2px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 30%;
            margin-bottom: 12px;
        }
        .data {
            font-size: 15px;
            margin: 20px 0;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            white-space: nowrap; 
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .label {
            font-weight: bold;
        }
        .forecast-container {
            display: flex;
            justify-content: space-around;
            width: 100%;
            flex-wrap: wrap;
            margin-top: 5px;
        }
        .forecast-box {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            padding: 15px;
            width: 28%;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .forecast-box h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .forecast-data {
            font-size: 20px;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #555;
            position: fixed;
            bottom: 10px;
            width: 100%;
            background-color: #000;
            color: #fff;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3><i class="fas fa-cloud-sun"></i> ESP 32 Weather Station</h3>
        <div class="button-container">
            <a href="history.php" class="btn">
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
            <a href="index.php" class="btn" style='color:red'>
                <i class="fas fa-sign-out-alt"style='color:red'></i> Log-out
            </a>
        </div>
    </div>
    <div class="container">
        <div class="welcome-statement">
            <p>Welcome Tidas Chandoopa</p>
        </div>
        <div class="data-container">
            <div class="data-box">
                <h4>Weather in Colombo, Sri Lanka (WEB)</h4>
                <div class="data">
                    <span class="label"><i class="fas fa-thermometer-half"></i> Temperature:</span> 
                    <span id="colombo_temperature">Loading...</span> °C
                </div>
                <div class="data">
                    <span class="label"><i class="fas fa-tint"></i> Humidity:</span> 
                    <span id="colombo_humidity">Loading...</span> %
                </div>
                <div class="data">
                    <span class="label"><i class="fas fa-wind"></i> Wind Speed:</span> 
                    <span id="colombo_wind_speed">Loading...</span> m/s
                </div>
                <div class="data">
                    <span class="label"><i class="fas fa-eye"></i> Visibility:</span> 
                    <span id="colombo_visibility">Loading...</span> m
                </div>
                <div class="data">
                    <span class="label"><i class="fas fa-cloud"></i> Weather:</span> 
                    <span id="colombo_weather">Loading...</span>
                </div>
            </div>
            <div class="data-box">
                <h4>Current Data - Station</h4>
                <div class="data">
                    <span class="label"><i class="fas fa-thermometer-half"></i> Temperature:</span> 
                    <span id="temperature">Loading...</span> °C
                </div>
                <div class="data">
                    <span class="label"><i class="fas fa-tint"></i> Humidity:</span> 
                    <span id="humidity">Loading...</span> %
                </div>
                <div class="data">
                    <span class="label"><i class="fas fa-wind"></i> Air Quality:</span> 
                    <span id="air_quality">Loading...</span>
                </div>
                <div class="data">
                    <span class="label"><i class="fas fa-clock"></i> Timestamp:</span> 
                    <span id="timestamp">Loading...</span>
                </div>
            </div>
            <div class="data-box">
                <h4>Last data recieved - Station</h4>
                <div class="data">
                    <span class="label"><i class="fas fa-thermometer-half"></i> Temperature:</span> 
                    <span id="temperature_10_min_ago">Loading...</span> °C
                </div>
                <div class="data">
                    <span class="label"><i class="fas fa-tint"></i> Humidity:</span> 
                    <span id="humidity_10_min_ago">Loading...</span> %
                </div>
                <div class="data">
                    <span class="label"><i class="fas fa-wind"></i> Air Quality:</span> 
                    <span id="air_quality_10_min_ago">Loading...</span>
                </div>
                <div class="data">
                    <span class="label"><i class="fas fa-clock"></i> Timestamp:</span> 
                    <span id="timestamp_10_min_ago">Loading...</span>
                </div>
            </div>
        </div>
        <div class="forecast-container">
            <div class="forecast-box">
                <h5 id="day1_date">Loading...</h5>
                <div class="forecast-data">
                    <div><i class="fas fa-thermometer-half"></i> <span id="day1_temperature">Loading...</span> °C</div>
                    <div><i class="fas fa-cloud"></i> <span id="day1_weather">Loading...</span></div>
                </div>
            </div>
            <div class="forecast-box">
                <h5 id="day2_date">Loading...</h5>
                <div class="forecast-data">
                    <div><i class="fas fa-thermometer-half"></i> <span id="day2_temperature">Loading...</span> °C</div>
                    <div><i class="fas fa-cloud"></i> <span id="day2_weather">Loading...</span></div>
                </div>
            </div>
            <div class="forecast-box">
                <h5 id="day3_date">Loading...</h5>
                <div class="forecast-data">
                    <div><i class="fas fa-thermometer-half"></i> <span id="day3_temperature">Loading...</span> °C</div>
                    <div><i class="fas fa-cloud"></i> <span id="day3_weather">Loading...</span></div>
                </div>
            </div>
            
        </div>
    </div>
    <footer>
        Design by Tidas Chandoopa - W. B.  Silva | <a href="https://www.linkedin.com/in/your-linkedin-profile" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
    </footer>

    <script>
        const apiKey = 'f8898525fd3f28d13466d3e6adbe51bb';
        const colomboWeatherUrl = `https://api.openweathermap.org/data/2.5/weather?q=Colombo,LK&units=metric&appid=${apiKey}`;
        const colomboForecastUrl = `https://api.openweathermap.org/data/2.5/forecast?q=Colombo,LK&units=metric&appid=${apiKey}`;

        function fetchColomboWeather() {
            fetch(colomboWeatherUrl)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("colombo_temperature").textContent = data.main.temp;
                    document.getElementById("colombo_humidity").textContent = data.main.humidity;
                    document.getElementById("colombo_wind_speed").textContent = data.wind.speed;
                    document.getElementById("colombo_visibility").textContent = data.visibility;
                    document.getElementById("colombo_weather").textContent = data.weather[0].description;
                })
                .catch(error => {
                    console.error("Error fetching Colombo weather data:", error);
                    document.getElementById("colombo_temperature").textContent = "Error";
                    document.getElementById("colombo_humidity").textContent = "Error";
                    document.getElementById("colombo_wind_speed").textContent = "Error";
                    document.getElementById("colombo_visibility").textContent = "Error";
                    document.getElementById("colombo_weather").textContent = "Error";
                });
        }

        function fetchColomboForecast() {
            fetch(colomboForecastUrl)
                .then(response => response.json())
                .then(data => {
                    const day1 = new Date(data.list[8].dt * 1000);
                    const day2 = new Date(data.list[16].dt * 1000);
                    const day3 = new Date(data.list[24].dt * 1000);

                    document.getElementById("day1_date").textContent = day1.toLocaleDateString();
                    document.getElementById("day1_temperature").textContent = data.list[8].main.temp;
                    document.getElementById("day1_weather").textContent = data.list[8].weather[0].description;

                    document.getElementById("day2_date").textContent = day2.toLocaleDateString();
                    document.getElementById("day2_temperature").textContent = data.list[16].main.temp;
                    document.getElementById("day2_weather").textContent = data.list[16].weather[0].description;

                    document.getElementById("day3_date").textContent = day3.toLocaleDateString();
                    document.getElementById("day3_temperature").textContent = data.list[24].main.temp;
                    document.getElementById("day3_weather").textContent = data.list[24].weather[0].description;
                })
                .catch(error => {
                    console.error("Error fetching Colombo forecast data:", error);
                    document.getElementById("day1_date").textContent = "Error";
                    document.getElementById("day1_temperature").textContent = "Error";
                    document.getElementById("day1_weather").textContent = "Error";

                    document.getElementById("day2_date").textContent = "Error";
                    document.getElementById("day2_temperature").textContent = "Error";
                    document.getElementById("day2_weather").textContent = "Error";

                    document.getElementById("day3_date").textContent = "Error";
                    document.getElementById("day3_temperature").textContent = "Error";
                    document.getElementById("day3_weather").textContent = "Error";
                });
        }

        function fetchData() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_data.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var data = JSON.parse(xhr.responseText);
                    if (data && data.temperature !== undefined) {
                        document.getElementById("temperature").textContent = data.temperature;
                        document.getElementById("humidity").textContent = data.humidity;
                        document.getElementById("air_quality").textContent = data.air_quality;
                        document.getElementById("timestamp").textContent = data.timestamp;

                        document.getElementById("temperature_10_min_ago").textContent = data.temperature_10_min_ago || "No data";
                        document.getElementById("humidity_10_min_ago").textContent = data.humidity_10_min_ago || "No data";
                        document.getElementById("air_quality_10_min_ago").textContent = data.air_quality_10_min_ago || "No data";
                        document.getElementById("timestamp_10_min_ago").textContent = data.timestamp_10_min_ago || "No data";
                    } else {
                        document.getElementById("temperature").textContent = "No data";
                        document.getElementById("humidity").textContent = "No data";
                        document.getElementById("air_quality").textContent = "No data";
                        document.getElementById("timestamp").textContent = "No data";

                        document.getElementById("temperature_10_min_ago").textContent = "No data";
                        document.getElementById("humidity_10_min_ago").textContent = "No data";
                        document.getElementById("air_quality_10_min_ago").textContent = "No data";
                        document.getElementById("timestamp_10_min_ago").textContent = "No data";
                    }
                }
            };
            xhr.send();
        }

        window.onload = function() {
            fetchColomboWeather();
            fetchColomboForecast();
            fetchData();
            setInterval(fetchData, 5000);
        };
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
