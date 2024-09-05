<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Our Application</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        }

        .container {
            text-align: center;
            padding: 20px;
            background-color: #333;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #4caf50;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .download-btn {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 15px 30px;
            font-size: 1.2rem;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            /* Ensures no underline on the button */
        }

        .download-btn img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .download-btn:hover {
            background-color: #45a049;
        }
/*
        .info-text, .website-btn {
            display: none;
        } */

        .info-text {
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .website-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }

        .website-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thank You for Registering!</h1>
        <h2>Download Our Application</h2>
        <p>We're excited to have you on board. Experience the best features and stay connected with our mobile app. Get
            it now!</p>
        <a href="https://play.google.com/store/apps/details?id=com.byinvestment.sparkx" class="download-btn">
            <img src="https://e7.pngegg.com/pngimages/530/733/png-clipart-goggle-playstore-icon-google-play-computer-icons-android-play-button-angle-rectangle.png"
                alt="Google Play">
            Download on Play Store
        </a>
        <!-- The following will always be present but hidden unless the device is an iPhone -->
        <p class="info-text">If you're an iPhone user please visit our website</p>
        <a href="https://spark-x.online/dashboard" class="website-btn">Visit Our Website</a>
    </div>

    <script>
        // Display additional content if the user is on an iPhone
        // if (/iPhone/i.test(navigator.userAgent)) {
        //     document.querySelector('.info-text').style.display = 'block';
        //     document.querySelector('.website-btn').style.display = 'inline-flex';
        // }
    </script>
</body>

</html>
