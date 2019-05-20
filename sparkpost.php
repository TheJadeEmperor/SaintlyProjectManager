<?php 

/**
 * Use this method to access the SparkPost API
 */
function sparkpost($method, $uri, $payload = [], $headers = [])
{
    $defaultHeaders = [ 'Content-Type: application/json' ];

    $curl = curl_init();
    $method = strtoupper($method);

    $finalHeaders = array_merge($defaultHeaders, $headers);

    $url = 'https://api.sparkpost.com:443/api/v1/'.$uri;

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    if ($method !== 'GET') {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
    }

    curl_setopt($curl, CURLOPT_HTTPHEADER, $finalHeaders);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

$payload = [
    'options' => [
        'sandbox' => false,
    ],
    'content' => [
        'from' => [
            'name' => 'BPS Team',
            'email' => 'contact@bestpayingsites.com',
        ],
        'subject' => 'Sending an email with SparkPost',
        'html' => '<html><body><h1>Sending mail with PHP+SparkPost+cURL!</h1></body></html>',
    ],
    'recipients' => [
        [ 'address' => 'kaiba.online.acc@gmail.com', ],
    ],
];

$headers = [ 'Authorization: efda8e4d07ad935287b2b265e78d1ac6564a2c62' ];

echo "Sending email...\n";
$email_results = sparkpost('POST', 'transmissions', $payload, $headers);

echo "Email results:\n"; 
echo json_encode(json_decode($email_results, false), JSON_PRETTY_PRINT);
echo "\n\n";

echo "Listing sending domains...\n";
$sending_domains_results = sparkpost('GET', 'sending-domains', [], $headers);

echo "Sending domain results:\n"; 
echo json_encode(json_decode($sending_domains_results, false), JSON_PRETTY_PRINT);
echo "\n";



?>