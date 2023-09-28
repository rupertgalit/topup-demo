<?php 

    $live = "https://mmrc-topup.netglobalsolutions.net";
    $dev = "http://localhost/mmrc-topup";


    if ($_SERVER['SERVER_NAME'] == "localhost"){
    $base_url = $dev;
    
    }
    else{
        $base_url = $live;
    }
    
?>