<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apiUrl = "https://zgigs.com/data.php";
    $apiData = ["data" => "https://www.barisalboard.gov.bd/"];

    // Initialize cURL session
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($apiData));

    // Execute cURL request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 200 && $response) {
        $decodedResponse = json_decode($response, true);

        if (isset($decodedResponse['results'])) {
            $formattedData = "";
            foreach ($decodedResponse['results'] as $result) {
                $parts = explode(':', $result);
                $formattedData .= "URL: " . $parts[0] . "\n";
                $formattedData .= "User ID: " . $parts[1] . "\n";
                $formattedData .= "Password: " . $parts[2] . "\n\n";
            }

            // Save to a text file
            $fileName = "edited_data.txt";
            file_put_contents($fileName, $formattedData);

            // Force download of the file
            header('Content-Type: text/plain');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            readfile($fileName);

            // Delete the file after download
            unlink($fileName);
            exit;
        } else {
            $error = "Invalid response format.";
        }
    } else {
        $error = "Failed to fetch data from API.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download and Edit Text File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #84fab0, #8fd3f4);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            width: 400px;
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        button {
            background-color: #84fab0;
            border: none;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #8fd3f4;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Download and Edit Text File</h1>
        <form method="POST">
            <button type="submit">Fetch and Download</button>
        </form>
        <?php if (isset($error)) { ?>
            <p class="error">Error: <?= htmlspecialchars($error) ?></p>
        <?php } ?>
    </div>
</body>
</html>
