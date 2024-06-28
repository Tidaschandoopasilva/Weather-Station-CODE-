<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Specifications - ESP 32 Weather Station</title>
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
        .header .btn.active {
            background-color: #0056b3;
            color: #ffffff;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .specification-box {
            background-color: #fff;
            border: 2px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 60%;
            margin: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
        }
        .specification-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .specification-title {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }
        .specification-description {
            font-size: 16px;
            color: #333;
            margin-bottom: 15px;
        }
        .specification-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .links-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
        }
        .datasheet-link, .purchase-link {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
    text-align: center;
    width: 50%;
}

.datasheet-link:hover, .purchase-link:hover {
    background-color: #ffffff; /* Change background color on hover */
    color: #007bff; /* Change text color on hover */
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
        @media (max-width: 768px) {
            .specification-box {
                width: 80%;
            }
            .links-container {
                flex-direction: column;
            }
            .datasheet-link, .purchase-link {
                width: 100%;
            }
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
            <a href="graph.php" class="btn">
                <i class="fas fa-chart-line"></i> Graph
            </a>
            <a href="device.php" class="btn active">
                <i class="fas fa-microchip"></i> Device
            </a>
            <a href="about.php" class="btn">
                <i class="fas fa-info-circle"></i> About Us
            </a>
        </div>
    </div>
    <div class="container">
        <h2>Device Specifications</h2>
        <div class="specification-box">
            <h3 class="specification-title">ESP32 Microcontroller</h3>
            <img src="esp32.jpg" alt="ESP32 Microcontroller" class="specification-image">
            <p class="specification-description">
                The ESP32 microcontroller is a powerful yet low-cost solution for IoT applications. It features
                WiFi and Bluetooth connectivity, making it ideal for wireless data transmission in the ESP 32 Weather Station.
            </p>
            <div class="links-container">
                <a href="https://www.espressif.com/sites/default/files/documentation/esp32_datasheet_en.pdf" target="_blank" class="datasheet-link">
                    View ESP32 Datasheet <i class="fas fa-external-link-alt"></i>
                </a>
                <a href="https://example.com/purchase/esp32" target="_blank" class="purchase-link">
                    Purchase ESP32 <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
        <div class="specification-box">
            <h3 class="specification-title">OLED 0.96 Display</h3>
            <img src="oled_0.96.jpg" alt="OLED 0.96 Display" class="specification-image">
            <p class="specification-description">
                The OLED 0.96 display provides a compact, high-contrast screen for displaying sensor data
                and status information in the ESP 32 Weather Station project.
            </p>
            <div class="links-container">
                <a href="https://cdn-shop.adafruit.com/datasheets/SSD1306.pdf" target="_blank" class="datasheet-link">
                    View OLED 0.96 Datasheet <i class="fas fa-external-link-alt"></i>
                </a>
                <a href="https://example.com/purchase/oled_0.96" target="_blank" class="purchase-link">
                    Purchase OLED 0.96 <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
        <div class="specification-box">
            <h3 class="specification-title">DHT11 Temperature and Humidity Sensor</h3>
            <img src="dht11.jpg" alt="DHT11 Temperature and Humidity Sensor" class="specification-image">
            <p class="specification-description">
                The DHT11 sensor provides accurate readings of temperature and humidity, crucial for monitoring
                environmental conditions in the ESP 32 Weather Station.
            </p>
            <div class="links-container">
                <a href="https://www.mouser.com/datasheet/2/758/DHT11-Technical-Data-Sheet-Translated-Version-1143054.pdf" target="_blank" class="datasheet-link">
                    View DHT11 Datasheet <i class="fas fa-external-link-alt"></i>
                </a>
                <a href="https://example.com/purchase/dht11" target="_blank" class="purchase-link">
                    Purchase DHT11 <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
        <div class="specification-box">
            <h3 class="specification-title">MQ135 Gas Sensor</h3>
            <img src="mq135.jpg" alt="MQ135 Gas Sensor" class="specification-image">
            <p class="specification-description">
                The MQ135 gas sensor detects a variety of gases, including ammonia, nitrogen oxides, and benzene,
                providing valuable air quality data for the ESP 32 Weather Station.
            </p>
            <div class="links-container">
                <a href="https://www.olimex.com/Products/Modules/Sensors/MOD-GAS/MQ135.pdf" target="_blank" class="datasheet-link">
                    View MQ135 Datasheet <i class="fas fa-external-link-alt"></i>
                </a>
                <a href="https://example.com/purchase/mq135" target="_blank" class="purchase-link">
                    Purchase MQ135 <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
        <div class="specification-box">
            <h3 class="specification-title">USB Type-C Charging Module</h3>
            <img src="usb_type_c.jpg" alt="USB Type-C Charging Module" class="specification-image">
            <p class="specification-description">
                The USB Type-C charging module enables fast and efficient charging for the LiPo battery in the
                ESP 32 Weather Station, ensuring reliable power supply.
            </p>
            <div class="links-container">
                <a href="https://www.ti.com/lit/ds/symlink/bq25703a.pdf" target="_blank" class="datasheet-link">
                    View USB Type-C Module Datasheet <i class="fas fa-external-link-alt"></i>
                </a>
                <a href="https://example.com/purchase/usb_type_c" target="_blank" class="purchase-link">
                    Purchase USB Type-C Module <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
        <div class="specification-box">
            <h3 class="specification-title">LiPo Battery</h3>
            <img src="lipo_battery.jpg" alt="LiPo Battery" class="specification-image">
            <p class="specification-description">
                The LiPo (Lithium Polymer) battery provides compact and high-capacity power for the ESP 32 Weather Station,
                ensuring long-lasting operation in portable applications.
            </p>
            <div class="links-container">
                <a href="https://cdn-shop.adafruit.com/datasheets/5035629254330.pdf" target="_blank" class="datasheet-link">
                    View LiPo Battery Datasheet <i class="fas fa-external-link-alt"></i>
                </a>
                <a href="https://example.com/purchase/lipo_battery" target="_blank" class="purchase-link">
                    Purchase LiPo Battery <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </div>
    <footer>
        Design by Tidas Chandoopa Silva | <a href="https://www.linkedin.com/in/your-linkedin-profile" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
