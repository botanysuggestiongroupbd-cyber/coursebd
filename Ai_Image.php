<?php
if (isset($_GET['url']) && isset($_GET['filename'])) {
    $url = $_GET['url'];
    $filename = $_GET['filename'];
    
    // Validate URL
    if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
        die('Invalid URL');
    }

    // Get the content of the image
    $imageContent = file_get_contents($url);
    if ($imageContent === FALSE) {
        die('Error retrieving the image.');
    }

    // Set headers to force download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . strlen($imageContent));

    // Output the file
    echo $imageContent;
    exit;
} else {
    die('Invalid parameters');
}
