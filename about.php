<!DOCTYPE html>
<html>
<head>
    <title>About Us - ESP 32 Weather Station</title>
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
        .about-us-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            width: 100%;
            margin-top: 20px;
        }
        .student-box {
            background-color: #fff;
            border: 2px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 30%;
            margin: 10px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .student-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .student-box img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .student-name {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
        }
        .student-role {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }
        .student-description {
            font-size: 14px;
            color: #333;
        }
        .contact-icons {
            margin-top: 10px;
        }
        .contact-icons a {
            color: #007bff;
            margin: 0 5px;
            font-size: 1.5em;
        }
        .contact-icons a:hover {
            color: #0056b3;
            text-decoration: none;
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
            .student-box {
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
            <a href="device.php" class="btn">
                <i class="fas fa-microchip"></i> Device
            </a>
            <a href="about_us.php" class="btn active">
                <i class="fas fa-info-circle"></i> About Us
            </a>
        </div>
    </div>
    <div class="container">
        <h2>About Us</h2>
        <p class="text-center">Meet the dedicated team behind the ESP 32 Weather Station project.</p>
        <div class="about-us-container">
            <div class="student-box">
                <img src="student1.jpg" alt="STUDENT 1">
                <div class="student-name">Tidas Chandoopa Silva</div>
                <div class="student-role">Web Design - Programming</div>
                <div class="student-description">Student of BSc - Mechatronic Engineering, Batch 05</div>
                <div class="contact-icons">
                    <a href="tel:+123456789"><i class="fas fa-phone"></i></a>
                    <a href="mailto:tidassilva@example.com"><i class="fas fa-envelope"></i></a>
                    <a href="https://www.linkedin.com/in/your-linkedin-profile" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="student-box">
                <img src="student2.jpg" alt="STUDENT 2">
                <div class="student-name">Balavan Kulendran</div>
                <div class="student-role">Circuit Designing </div>
                <div class="student-description">Student of BSc - Mechatronic Engineering, Batch 05</div>
                <div class="contact-icons">
                    <a href="tel:+123456789"><i class="fas fa-phone"></i></a>
                    <a href="mailto:balavank@example.com"><i class="fas fa-envelope"></i></a>
                    <a href="https://www.linkedin.com/in/your-linkedin-profile" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="student-box">
                <img src="student3.jpg" alt="STUDENT 3">
                <div class="student-name">Chathil Basitha</div>
                <div class="student-role">3D Modelling - Designing</div>
                <div class="student-description">Student of BSc - Mechatronic Engineering, Batch 05</div>
                <div class="contact-icons">
                    <a href="tel:+123456789"><i class="fas fa-phone"></i></a>
                    <a href="mailto:chathilb@example.com"><i class="fas fa-envelope"></i></a>
                    <a href="https://www.linkedin.com/in/your-linkedin-profile" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
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
