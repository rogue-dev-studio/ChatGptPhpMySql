<?php

// Fungsi untuk mengirim permintaan ke API ChatGPT
function sendChatGPTRequest($message) {
    $apiKey = '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'; // Ganti dengan kunci API ChatGPT Anda
    $url = 'https://api.openai.com/v1/chat/completions';

    $data = array(
        'model' => 'gpt-3.5-turbo',
        'messages' => array(
            array('role' => 'system', 'content' => 'You are ChatGPT'),
            array('role' => 'user', 'content' => $message)
        )
    );

    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($response, true);
    $chatGPTResponse = $responseData['choices'][0]['message']['content'];

    return $chatGPTResponse;
}

// Menerima permintaan dari JavaScript
if (isset($_POST['message'])) {
    $userMessage = $_POST['message'];
    $chatGPTResponse = sendChatGPTRequest($userMessage);
    echo $chatGPTResponse;
}
?>
