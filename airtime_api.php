<?php

$api_key = 'YOUR_API_KEY';
$base_url = 'https://api.airtimeprovider.com';

$headers = [
    'Authorization: Bearer ' . $api_key,
    'Content-Type: application/json'
];

// Check Balance
function check_balance($base_url, $headers) {
    $url = $base_url . '/api/v1/balance';
    $response = file_get_contents($url, false, stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => implode("\r\n", $headers)
        ]
    ]));
    print_r(json_decode($response, true));
}

// Purchase Airtime
function purchase_airtime($base_url, $headers, $mobile_number, $amount) {
    $url = $base_url . '/api/v1/topup';
    $data = json_encode([
        'mobile_number' => $mobile_number,
        'amount' => $amount,
        'currency' => 'USD'
    ]);
    $response = file_get_contents($url, false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => implode("\r\n", $headers) . "\r\nContent-Length: " . strlen($data),
            'content' => $data
        ]
    ]));
    print_r(json_decode($response, true));
}

// Check Transaction Status
function check_transaction_status($base_url, $headers, $transaction_id) {
    $url = $base_url . '/api/v1/transaction/' . $transaction_id;
    $response = file_get_contents($url, false, stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => implode("\r\n", $headers)
        ]
    ]));
    print_r(json_decode($response, true));
}

// Example usage
check_balance($base_url, $headers);
purchase_airtime($base_url, $headers, '+1234567890', 10.00);
check_transaction_status($base_url, $headers, '1234567890ABC');

?>
