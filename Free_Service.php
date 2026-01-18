<?php
if (isset($_POST['submit'])) {
    $msisdn = $_POST['msisdn'];
    // Validate the phone number starts with 019 or 014
    if (preg_match("/^(019|014)[0-9]{8}$/", $msisdn)) {
        $url = "https://location.serversheba.my.id/btscode.php?msisdn=$msisdn";
        
        // Get the response from the API
        $response = file_get_contents($url);
        $data = json_decode($response, true);
    } else {
        $error_message = "Please enter a valid number starting with 019 or 014.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Location Info</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Serif Bengali', serif;
            background-color: #f4f7f6;
            color: #333;
        }
        .container {
            margin-top: 50px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
        }
        h1 {
            text-align: center;
            color: #0062cc;
            font-size: 28px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #0062cc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #004b8d;
        }
        .result-box {
            margin-top: 30px;
            padding: 20px;
            background-color: #d3f4d3;
            border-radius: 10px;
            display: none;
        }
        .result-box table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .result-box table, .result-box th, .result-box td {
            border: 1px solid #ccc;
        }
        .result-box th, .result-box td {
            padding: 10px;
            text-align: left;
        }
        .result-box th {
            background-color: #f4f4f4;
        }
        .credit {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #555;
        }
        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
        @media (max-width: 576px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Enter Number to Get Location Info</h1>
    <form method="post">
        <div class="form-group">
            <input type="text" name="msisdn" placeholder="Enter Number (e.g. 01966869587)" required>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php if (isset($error_message)): ?>
        <div class="error-message">
            <?php echo $error_message; ?>
        </div>
    <?php elseif (isset($data) && $data['success'] == "true"): ?>
        <div class="result-box" style="display: block;">
            <table>
                <tr>
                    <th>Number</th>
                    <td><?php echo $data['data']['Number']; ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?php echo $data['data']['Status']; ?></td>
                </tr>
                <tr>
                    <th>Network</th>
                    <td><?php echo $data['data']['Network']; ?></td>
                </tr>
                <tr>
                    <th>Cluster</th>
                    <td><?php echo $data['data']['Cluster']; ?></td>
                </tr>
                <tr>
                    <th>Thana</th>
                    <td><?php echo $data['data']['Thana']; ?></td>
                </tr>
                <tr>
                    <th>District</th>
                    <td><?php echo $data['data']['District']; ?></td>
                </tr>
                <tr>
                    <th>Region</th>
                    <td><?php echo $data['data']['Region']; ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo $data['data']['Address']; ?></td>
                </tr>
                <tr>
                    <th>Site Address</th>
                    <td><?php echo $data['data']['Site_Address']; ?></td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td><?php echo $data['data']['Latitude']; ?></td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td><?php echo $data['data']['Longitude']; ?></td>
                </tr>
                <tr>
                    <th>Google Maps URL</th>
                    <td><a href="<?php echo $data['data']['Google_Maps_URL']; ?>" target="_blank">View on Google Maps</a></td>
                </tr>
            </table>
        </div>
    <?php elseif (isset($data)): ?>
        <div class="result-box" style="display: block;">
            <p>Sorry, no data found for this number.</p>
        </div>
    <?php endif; ?>
</div>

<div class="credit">
    <p>Developed by <strong>BDTOOLBD.XYZ</strong></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
