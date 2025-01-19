IoT-Enabled Weather Station
This project implements an IoT-enabled weather station using an ESP32 microcontroller. The weather station collects environmental data such as temperature, humidity, and air quality, and displays it on a web dashboard for remote monitoring. The system is powered by a LiPo battery with an XL6009 step-up converter for power efficiency.

Components Used
ESP32: Microcontroller for processing and Wi-Fi connectivity.
DHT11: Temperature and humidity sensor.
MQ135: Air quality sensor (measures CO2, ammonia, alcohol, etc.).
LiPo Battery: Power source for the weather station.
XL6009 Step-Up Converter: Efficient power management for LiPo battery.
Web Dashboard: HTML, CSS, PHP, and JavaScript to visualize data.
Features
Real-time temperature, humidity, and air quality monitoring.
Data sent wirelessly to the cloud via the ESP32 Wi-Fi.
Web-based dashboard for remote viewing of weather data.
Battery-powered with efficient energy management.
Setup Instructions
Hardware
Wiring the Sensors:
Connect the DHT11 sensor to the ESP32 GPIO pins.
Connect the MQ135 sensor to the ESP32 GPIO pins.
Connect the LiPo battery to the XL6009 step-up converter, and then connect the converter to the ESP32 for power.
Power Supply:
Use the XL6009 Step-Up Converter to regulate the battery voltage to a suitable level for the ESP32.
Software
Arduino IDE Setup:

Install the ESP32 board support in Arduino IDE.
Install the necessary libraries for DHT11 and MQ135 sensors.
Upload Code to ESP32:

Open the provided Arduino sketch and upload it to the ESP32.
The ESP32 will read data from the sensors and send it to the web dashboard via Wi-Fi.
Web Dashboard:

Place the HTML, CSS, PHP, and JS files on a web server or local server (e.g., XAMPP or WAMP).
Ensure the ESP32 sends data to the correct server IP or domain.
Web Dashboard
The dashboard is built using HTML for structure, CSS for styling, PHP for backend logic, and JavaScript for real-time updates.
The dashboard displays real-time temperature, humidity, and air quality data collected from the sensors.
