<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ESP32 Weather Station</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            overflow: hidden;
            position: relative;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border: 2px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 620px;
            text-align: center;
            z-index: 10;
            display: flex;
            flex-direction: row;
        }
        .login-container, .weather-container {
            width: 50%;
            padding: 10px;
        }
        .login-container {
            margin-left: 20px;
        }
        .weather-container {
            margin-right: 20px;
        }
        .login-container h3, .weather-container h3 {
            margin-bottom: 20px;
            color: #007bff;
        }
        .login-container .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            width: 100%;
        }
        .raindrop {
            position: absolute;
            width: 2px;
            height: 15px;
            background-color: rgba(0, 123, 255, 0.5);
            bottom: 100%;
            animation: fall 2s linear infinite;
        }
        @keyframes fall {
            to {
                transform: translateY(100vh);
            }
        }
        .weather-container i {
            font-size: 24px;
            margin-right: 10px;
        }
        .weather-data {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .weather-data span {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="weather-container">
            <h3><i class="fas fa-cloud"></i> Weather Data</h3>
            <div class="form-group">
                <select class="form-control" id="country" required>
                    <option value="Sri Lanka" selected>Sri Lanka</option>
                </select>
                <select class="form-control mt-2" id="city" required>
                    <option value="" disabled selected>Select City</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Galle">Galle</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Negombo">Negombo</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Matara">Matara</option>
                </select>
                <button id="getWeather" class="btn btn-primary mt-2">Get Weather</button>
            </div>
            <div id="weatherData" class="mt-3">
                <!-- Weather data will be inserted here -->
            </div>
        </div>
        <div class="login-container">
            <h3><i class="fas fa-cloud-sun"></i> Login </h3>
            <form id="loginForm">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button> 
                <div id="error-message" class="mt-3 text-danger" style="display: none;">Invalid username or password</div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('error-message');

            if (username === 'tidaschandoopa' && password === 'tidas2002') {
                window.location.href = 'loading.php';
            } else {
                errorMessage.style.display = 'block';
            }
        });

        document.getElementById('getWeather').addEventListener('click', function() {
            const city = document.getElementById('city').value;
            const country = document.getElementById('country').value;
            const apiKey = 'f8898525fd3f28d13466d3e6adbe51bb'; // Replace with your OpenWeatherMap API key
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${city},${country}&appid=${apiKey}&units=metric`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.cod === 200) {
                        const weatherData = `
                            <div class="weather-data"><i class="fas fa-thermometer-half"></i><span>Temperature: ${data.main.temp}°C</span></div>
                            <div class="weather-data"><i class="fas fa-tint"></i><span>Humidity: ${data.main.humidity}%</span></div>
                            <div class="weather-data"><i class="fas fa-tachometer-alt"></i><span>Pressure: ${data.main.pressure} hPa</span></div>
                            <div class="weather-data"><i class="fas fa-wind"></i><span>Wind Speed: ${data.wind.speed} m/s</span></div>
                            <div class="weather-data"><i class="fas fa-cloud-rain"></i><span>Rainfall: ${data.rain ? data.rain['1h'] : '0'} mm</span></div>
                            <div class="weather-data"><i class="fas fa-eye"></i><span>Visibility: ${data.visibility / 1000} km</span></div>
                        `;
                        document.getElementById('weatherData').innerHTML = weatherData;
                    } else {
                        document.getElementById('weatherData').innerHTML = '<div class="text-danger">Location not found</div>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching weather data:', error);
                    document.getElementById('weatherData').innerHTML = '<div class="text-danger">Error fetching weather data</div>';
                });
        });

        // Function to create raindrops
        function createRaindrops() {
            const body = document.body;
            for (let i = 0; i < 100; i++) {
                const raindrop = document.createElement('div');
                raindrop.classList.add('raindrop');
                raindrop.style.left = `${Math.random() * 100}vw`;
                raindrop.style.animationDuration = `${Math.random() * 2 + 1}s`;
                body.appendChild(raindrop);
            }
        }

        createRaindrops();
    </script>
</body>
</html>
