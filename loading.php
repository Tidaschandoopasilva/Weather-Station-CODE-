<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading - ESP32 Weather Station</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #001f3f; /* Darker blue background */
            color: #fff;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }
        .loading-container {
            text-align: center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .loading-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 0 0 5px #fff, 0 0 10px #3498db, 0 0 15px #3498db;
        }
        .loading-container h2 {
            font-size: 18px;
            margin-top: 20px;
            opacity: 0;
            color: #fff;
            text-shadow: 0 0 5px #fff, 0 0 10px #3498db, 0 0 15px #3498db;
            transition: opacity 1s ease-in-out;
        }
        .progress-bar {
            position: relative;
            width: 300px;
            height: 40px;
            background-color: #f3f3f3;
            border-radius: 5px;
            overflow: hidden;
            margin: 20px auto;
            box-shadow: 0 0 5px #fff, 0 0 10px #3498db, 0 0 15px #3498db;
        }
        .progress-bar-fill {
            width: 0;
            height: 100%;
            background-color: #3498db;
            transition: width 2.5s ease-in-out;
        }
        .percentage {
            font-size: 18px;
            margin-bottom: 10px;
            color: #fff;
            text-shadow: 0 0 5px #fff, 0 0 10px #3498db, 0 0 15px #3498db;
        }
    </style>
</head>
<body>
    <div class="loading-container" id="loading-container">
        <h1>NOW LOADING ESP32 WEATHER STATION</h1>
        <div class="percentage" id="percentage">Loading: 0%</div>
        <div class="progress-bar">
            <div class="progress-bar-fill" id="progress-bar-fill"></div>
        </div>
        <h2 id="students-message">MINI PROJECT - CINEC CAMPUS</h2>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadingContainer = document.getElementById('loading-container');
            const progressBarFill = document.getElementById('progress-bar-fill');
            const percentageText = document.getElementById('percentage');
            const studentsMessage = document.getElementById('students-message');

            setTimeout(function() {
                loadingContainer.style.opacity = 1;
                progressBarFill.style.width = '100%';

                let currentPercentage = 0;
                const interval = setInterval(function() {
                    currentPercentage += 1;
                    percentageText.innerText = `Loading: ${currentPercentage}%`;
                    if (currentPercentage === 100) {
                        clearInterval(interval);
                    }
                }, 25); // 2.5 seconds / 100 = 25 ms per percentage point

                setTimeout(function() {
                    studentsMessage.style.opacity = 1;
                }, 1500); // Delay for students message to appear

                setTimeout(function() {
                    studentsMessage.style.opacity = 0;
                    loadingContainer.style.opacity = 0;
                    setTimeout(function() {
                        window.location.href = "dashboard.php";
                    }, 1000); // Wait for the transition to complete
                }, 3500); // Adjust the delay time (3500ms = 3.5s) as needed
            }, 100); // Small delay to trigger the transition
        });
    </script>
</body>
</html>
