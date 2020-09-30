<?php

// Definisikan variabel yang diperlukan
$api_key = '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'; // Ganti dengan API key Anda
$api_url = 'https://api.openai.com/v1/chat/completions'; // URL API ChatGPT

// Definisikan data yang akan dikirim ke API
$data = array(
    'model' => 'gpt-3.5-turbo', // Model bahasa yang akan digunakan
    'messages' => array(
        array(
            'role' => 'system',
            'content' => 'You are a helpful assistant.'
        ),
        array(
            'role' => 'user',
            'content' => 'Halo'
        )
    ),
    'max_tokens' => 50, // Jumlah token maksimum dalam respons
);

// Konversi data menjadi format JSON
$json_data = json_encode($data);

// Buat header permintaan HTTP
$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key,
);

// Buat permintaan POST ke API ChatGPT
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Eksekusi permintaan
$response = curl_exec($ch);

// Cek jika permintaan berhasil
if ($response === false) {
    die('Error: ' . curl_error($ch));
}

// Tampilkan respons dari API
echo $response;

// Tutup koneksi
curl_close($ch);
