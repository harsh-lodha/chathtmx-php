<?php
function generateTextFromFlaskAPI($prompt) {
    // Define the Flask API endpoint
    $flaskApiUrl = "http://127.0.0.1:5000/generate_text"; // Update with your Flask API URL

    // Prepare the data to send as JSON
    $data = array(
        'prompt' => $prompt,
    );
    $dataString = json_encode($data);

    // Initialize cURL session
    $ch = curl_init($flaskApiUrl);

    // Set cURL options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL session and get the response
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Parse and return the response from the Flask API
    $responseData = json_decode($response, true);

    if (isset($responseData['generated_text'])) {
        return $responseData['generated_text'];
    } else {
        return "Error: Unable to generate text.";
    }
}

// // Example usage:
// $generatedText = generateTextFromFlaskAPI("Your prompt here");
// echo "Generated Text: " . $generatedText;
