<?php 

    $live = "https://topup-demo.netglobalsolutions.net";
    $dev = "http://localhost/topup-demo";


    if ($_SERVER['SERVER_NAME'] == "localhost"){
    $base_url = $dev;
    
    }
    else{
        $base_url = $live;
    }
    
?>