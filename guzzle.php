<?php

require "vendor/autoload.php";
// require_once __DIR__."vendor/autoload.php";
 
 
use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://reqres.in',
]);
 
// $response = $client->request('GET', '/api/users', [
//     'query' => [
//         'page' => '2',
//     ]
// ]);
$name = 'rupert';
$job = 'Dev';

$response = $client->request('POST', '/api/users', [
    'form_params' => [
        'name' => $name,
        'job' => $job
    ]
]);

$status = $response->getStatusCode();

if (200 == $status || 201 == $status) {
    $body = $response->getBody();
    $arr_body = json_decode($body);
    
    echo "\r \n";
    echo $body ."\r \n \n";
    echo "\r \n";
    echo $status;

    
    $data = json_decode($body, true);
   
    $final_name = $data['name'];
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>




    
</body>
</html>

<?php

   
?>