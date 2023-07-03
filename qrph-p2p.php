<?php
include 'base_url.php';


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

          
$full_name = $_POST['first_name'];            
$email_address = $_POST['email_address'];                  
$amount = $_POST['amount'];
// $mobile_num = $_POST['mobile_num'];
$last_name = null;
$ref_num = uniqid();

$name = 'rupert';
$job = 'Dev';

$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNjg4Mzg2MTY0LCJpYXQiOjE2ODgyOTk3NjQsImp0aSI6IjgwYzFiYTU5NjRkODRkOTI4MzYxOGEzMGI0YTlmYTdkIiwidXNlcl9pZCI6MX0.KxwrXUhpK85i_JuE16dSepTVnIvIISr57smCO5OkCWA';

$response = $client->request('POST', '/pgw/api/v1/transactions/qr-codes/generate/', [
    
    "headers" => [
        // "auth" => ['ngsiadmin','super123456@'],
        'Content-Type' => 'application/json',
        "Authorization" => 'Bearer '.$token,
    
    ],
    
    'json' => [
        "app_uuid" => "0aa91257-2baa-437e-886c-d3cfce9552ce",
        "reference_number" =>$ref_num,
        "endpoint" => "p2p-generateQR",
        "merchant_details" => [
            "method" => "dynamic",
            "txn_type" => "transfer",
            "mobile_number" => '09511223438',
            "city" => "Pasig City",
            "txn_amount" => $amount
        ],
        "callback_uri" => "https://typedwebhook.tools/webhook/12f9f4eb-ff68-4df4-ade6-04728f7072b9"
    ]
]);

$status = $response->getStatusCode();
echo $status;

if (200 == $status || 201 == $status) {
    $body = $response->getBody();
    $arr_body = json_decode($body);    
    // echo $body ."\r \n \n";
    // echo $status;    
    $data = json_decode($body, true);  
    $final_name = $data['message'];
    $final_name = $data['data']['raw_string'];
    // echo $final_name;
    // echo $mobile_num;
    echo $amount;
    }

else if($status == 401) {
    echo "INVALID TOKEN";
    echo $status;
}
else{
    echo "ERROR";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"> 
    <title>QRPH</title>

    <script src="qrcode-lib/easy.qrcode.min.js"></script>

    <style>
        .cred{
            font-size: 110%;
            font-family: "Lucida Console", Courier, monospace;
            padding-left: 10px;
            color:aliceblue;
        }
        .cred-span{
        font-size: 90%;
        font-weight: 400;
        }
        body{
        background: url("<?php echo $base_url;?>/assets/dendi.png");
        background-size: cover;
        background-position: center;
        }
        .qrcode{
            margin: 20px;
        }
    </style>    
</head>
<body>

<body>
    <div class="payment-selection">
        <div class="logo">
            <img src="<?php echo $base_url;?>/assets/nobg-netglobalpay.png" alt="Logo">
        </div>
            <div class="title">
            
                <!-- <h2 class="nice-heading">Payment Summary</h2> -->
                
            </div>
        <hr class="light-hr">
        <div class="output">
        
        
            <center>
            
                <div style="background-color: white; padding-top: 5px; padding-bottom: 13px">
                <br>
                <img src="assets/qrph-head.png" class="img-fluid" style="max-width: 25%; height: auto;"><br>
                    <div id="qrcode" class="qrcode"> </div>


                </div>
            
            <br><br>
            
            <label class="cred">Mobile No. : <span class="cred-span">09xxxxx3438</span></label><br>
            <label class="cred">Amount : <span class="cred-span">₱<?php echo $amount ?>.00</span></label>
            </center>
            
        </div>
        <hr class="light-hr">

    </div>

</body>

<script>
        
        
        let text3 = '<?php echo $final_name; ?>';
        let text2 = "asdasdasdasdasdsadasdfasdgsdfgsdfgsdfsdfgsdfgsdfgsdfssfgdffdfghfghfghfghfghfghfghfghfgfsssssssssssssssssssfgrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrsergsgfsgdfgfgggrt345tg453rgafdg34terg";
        var qrcode = new QRCode(document.getElementById("qrcode"), {
        

      text: text3,
             
      logo: "assets/qr-logo.png", 
      logoWidth: 30,
      logoHeight: 30, 
      logoBackgroundColor: 'black',
      logoBackgroundTransparent: false,                          
      }); 

      console.log(text3);
      console.log(text2);
      console.log(text);
      
</script>;

</html>



