<?php

require "vendor/autoload.php";
// require_once __DIR__."vendor/autoload.php";
 
 
use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://api.dev.ngsiwallet.net',
]);
 
// $response = $client->request('GET', '/api/users', [
//     'query' => [
//         'page' => '2',
//     ]
// ]);
$name = 'rupert';
$job = 'Dev';
$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNjg4Mzg2MTY0LCJpYXQiOjE2ODgyOTk3NjQsImp0aSI6IjgwYzFiYTU5NjRkODRkOTI4MzYxOGEzMGI0YTlmYTdkIiwidXNlcl9pZCI6MX0.KxwrXUhpK85i_JuE16dSepTVnIvIISr57smCO5OkCWA';

$response = $client->request('POST', '/pgw/api/v1/transactions/qr-codes/generate/', [
    
    "headers" => [
        // "auth" => ['ngsiadmin','super123456@'],
        'Content-Type' => 'application/json',
        "Authorization" => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNjg4Mzg2MTY0LCJpYXQiOjE2ODgyOTk3NjQsImp0aSI6IjgwYzFiYTU5NjRkODRkOTI4MzYxOGEzMGI0YTlmYTdkIiwidXNlcl9pZCI6MX0.KxwrXUhpK85i_JuE16dSepTVnIvIISr57smCO5OkCWA',
    
    ],
    
    'json' => [
        "app_uuid" => "0aa91257-2baa-437e-886c-d3cfce9552ce",
        "reference_number" =>"909fb27m2r3",
        "endpoint" => "p2p-generateQR",
        "merchant_details" => [
            "method" => "dynamic",
            "txn_type" => "transfer",
            "mobile_number" => "09511223438",
            "city" => "Pasig City",
            "txn_amount" => "1.00"
        ],
        "callback_uri" => "https://typedwebhook.tools/webhook/12f9f4eb-ff68-4df4-ade6-04728f7072b9"
    ]
]);

$status = $response->getStatusCode();

if (200 == $status || 201 == $status) {
    $body = $response->getBody();
    $arr_body = json_decode($body);
    

    echo $body ."\r \n \n";
    echo $status;

    
    $data = json_decode($body, true);
   
    $final_name = $data['message'];
    $final_name = $data['data']['raw_string'];

    echo $final_name;


}

else {
    echo "ERROR";
}
 




// $arr_body = json_decode($body);
// print_r ($arr_body);
// echo "\n";
// $json_body = json_encode($arr_body);
// print_r($json_body);
//get status code using $response->getStatusCode();
 


// $response = $client->request


?>



