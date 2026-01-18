<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Driving License</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .license-container {
            width: 850px;
            height: 500px;
            display: flex;
            flex-direction: row;
            gap: 20px;
        }
        .card {
            width: 50%;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
            padding: 20px;
            position: relative;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-front .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-front .header img {
            width: 60px;
            height: 60px;
        }
        .card-front .header .title {
            text-align: center;
        }
        .card-front .header .title h1 {
            font-size: 18px;
            margin: 0;
            font-weight: bold;
        }
        .card-front .header .title h2 {
            font-size: 14px;
            margin: 0;
        }
        .card-front .info {
            display: flex;
            margin-top: 20px;
        }
        .card-front .info .photo {
            width: 100px;
            height: 120px;
            border: 1px solid #ddd;
            margin-right: 20px;
        }
        .card-front .info .details {
            flex: 1;
        }
        .card-front .info .details p {
            margin: 4px 0;
            font-size: 14px;
        }
        .card-front .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }
        .card-front .footer .qr-code {
            margin: auto;
            width: 80px;
            height: 80px;
            border: 1px solid #ddd;
        }
        .card-back {
            position: relative;
        }
        .card-back .notice {
            text-align: center;
            font-size: 12px;
            margin-bottom: 10px;
        }
        .card-back .barcode {
            width: 100%;
            height: 50px;
            background-color: #ddd;
            margin: 20px 0;
        }
        .card-back .details {
            font-size: 14px;
            margin-top: 10px;
        }
        .card-back .details p {
            margin: 5px 0;
        }
        .card-back .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="license-container">
        <!-- Front Side -->
        <div class="card card-front">
            <div class="header">
                <img src="logo.png" alt="Logo">
                <div class="title">
                    <h1>Professional Driving License</h1>
                    <h2>People's Republic of Bangladesh</h2>
                </div>
                <img src="emblem.png" alt="Emblem">
            </div>
            <div class="info">
                <img src="photo.png" alt="Photo" class="photo">
                <div class="details">
                    <p><strong>Name:</strong> Sadequl Islam</p>
                    <p><strong>Date of Birth:</strong> 16-Jun-2002</p>
                    <p><strong>Blood Group:</strong> A+</p>
                    <p><strong>Sex:</strong> Male</p>
                    <p><strong>Father:</strong> Sekender Ali</p>
                    <p><strong>Issue Date:</strong> 01-Jun-2023</p>
                    <p><strong>Validity:</strong> 01-Jun-2029</p>
                </div>
            </div>
            <div class="footer">
                <div><strong>Center:</strong> Naogaon, BRTA</div>
                <div class="qr-code"></div>
            </div>
        </div>

        <!-- Back Side -->
        <div class="card card-back">
            <div class="notice">
                <p>If this provisional driving license is lost or found, please inform Police Station.</p>
            </div>
            <div class="barcode"></div>
            <div class="details">
                <p><strong>Address:</strong> Dangapara, Kasimpur, Raninagar, Naogaon-6591</p>
                <p><strong>Class of Vehicle Authorized to Drive:</strong> Light</p>
                <p><strong>First Issue Date:</strong> 04-Jun-2024</p>
            </div>
            <div class="footer">
                <p>For further assistance, please visit <strong>www.brta.gov.bd</strong> or email <strong>info@brta.gov.bd</strong></p>
            </div>
        </div>
    </div>
</body>
</html>
