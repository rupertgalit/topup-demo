f<?php
include 'base_url.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="icon" href="assets/netglobalpay.jpg" type="image/x-icon">
    <title>Topup Demo</title>        
    <style>

    /* payment option selector */


                .payment-option.selected {
                border: 2px solid #4caf50; 
                transform: scale(1.1); 
                }
                
                .payment-option.selected::after {
                content: "\f00c"; 
                font-family: "Font Awesome 5 Free";
                position: absolute;
                color: #4caf50; 
                font-size: 20px;
                top: 5px; 
                right: 5px;
                }

                .payment-option.selected img {
                opacity: 0.7; 
                }


                .payment-option:hover {
                border: 2px solid #0261fb;
                }

                .payment-option:hover::after {
                color: #0261fb; 
                }
                .error-message {
                display: none;
                color: red;
                font-size: 14px;
                margin-top: 5px;
                }

                body {
                background: url("<?php echo $base_url;?>/assets/dendi.png");
                background-size: cover;
                background-position: center;
                margin: 0;
                color:white;
                padding: 0;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
}
                .input-field{
                    width: 100%;
                    padding: 1px 5px;
                }

                .input-field label {
                display: block;
                color: whitesmoke;
                margin-bottom: 5px;
                font-size: 15px;
                font-family: "Lucida Console", Courier, monospace;
                }
                
                .input-field input {
                    padding: 10px;
                    border-radius: 5px;
                    background: #ffffff;
                    width: 100%;
                    font-size: 15px;
                }
                h3{
                    font-family: "Lucida Console", Courier, monospace;
                }
                .payment-card{
                    padding-top: 8px;
                    padding-bottom: 8px;
                }
                .payment-qr{
                    padding-top: 6px;
                    padding-bottom: 7px;
                }





    </style>
</head>
<body>
    <form id="payment-form" name="myForm" onsubmit="return klik()" action="#" method="POST">
        <div class="payment-selection">
            <div class="logo">
                <img src="assets/nobg-netglobalpay.png" alt="Logo">
            </div>
            <div class="title">
                <h2 class="nice-heading">Topup Request</h2>
            </div>

            <div class="input-field">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="cred" placeholder="Enter your name" oninput="myFunction()" required>
            </div>

            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" oninput="myFunction()" required>
            </div>



            <div class="input-field">
                <label for="amount">Amount</label>
                <input type="number" id="amount" name="amount" placeholder="Enter the payment amount" oninput="myFunction()" min="0">
            </div>
            <br>
            <hr>

            </form>


                            <!-- FORM VALIDATION SCRIPT -->
            <script>    
            function makeToast(message) 
            {
                var toast = document.createElement("div");
                toast.innerText = message;
                toast.style.backgroundColor = "lightblue";
                toast.style.color = "black";
                toast.style.padding = "10px";
                toast.style.borderRadius = "8px";
                toast.style.boxShadow = "0px 2px 4px rgba(0, 0, 0, 0.3)";
                toast.style.position = "fixed";
                toast.style.top = "77%";
                toast.style.left = "50%";
                toast.style.transform = "translate(-50%, -50%)";
                toast.style.opacity = "0";
                toast.style.transition = "opacity 0.4s";
                toast.style.zIndex = "9999";
                document.body.appendChild(toast);

                setTimeout(function() {
                    toast.style.opacity = "1";
                }, 100); // Delay the fade-in effect

                setTimeout(function() {
                    toast.style.opacity = "0";
                }, 2500); // Delay before starting the fade-out effect

                setTimeout(function() {
                    toast.remove();
                }, 3000); // Total duration of the toast message
                }

                          
                function klik(){
                    var x = document.forms["myForm"]["name"].value;
                    var y = document.forms["myForm"]["email"].value;
                    var z = document.forms["myForm"]["amount"].value;
                    
                        if (x == "" || x == null) {
                            let message = "Name must be filled out";
                            makeToast(message); 
                            return false;
                            }
                        else if(y == "" || y == null ){
                            let message = ("Email must be filled out");
                            makeToast(message); 
                            return false;
                        }
                        else if(z == "" || z == null ){
                            let message = ("Amount is Required");
                            makeToast(message); 
                            return false;
                        }

                    }
            </script>








            <center>
            <h3>Select a Payment Method</h3>
            </center>
            <br>
            <div class="payment-options">




                <form method="POST" action="<?php echo $base_url;?>/output.php">
                <button class="payment-option" data-value="e-wallet" type="button">
                    <img src="assets/ewallet.png" alt="E-Wallet">
                </button>
                </form>

                <!-- CARDS 2C2P -->
                <form method="POST" action="<?php echo $base_url;?>/output.php" onsubmit="return klik()">
                                                <!-- <span id = "total">sss</span> -->
                    <input type="hidden" name="first_name" class="form-control" id="card_first_name" value="" required/>
                    <input type="hidden" name="email_address" class="form-control" id="card_email_address" value="" required/>
                    <input type="hidden" name="amount" class="form-control" id="card_amount" value="" required/>

                <button class="payment-option payment-card" data-value="credit-card" type="submit">
                    <img src="assets/visa.png" alt="Credit card">
                </button>
               
                </form>

                <form method="POST" action="<?php echo $base_url;?>/qrph.php" onsubmit="return klik()">

                    <input type="hidden" name="first_name" class="form-control" id="qr_first_name" value="" required/>
                    <input type="hidden" name="email_address" class="form-control" id="qr_email_address" value="" required/>
                    <!-- <input type="hidden" name="mobile_num" class="form-control" id="qr_mobile_num" value="" required/> -->
                    <input type="hidden" name="amount" class="form-control" id="qr_amount" value="" required/>

                <button class="payment-option payment-card" data-value="qr-ph" type="submit">
                    <img src="assets/qrph.jpg" alt="QR PH" class="payment-qr">
                </button>

                </form>


                <script>
                                                                                                        
                    function myFunction() {                  
                        document.getElementById("card_first_name").value = document.getElementById("name").value;                               
                        document.getElementById("card_email_address").value = document.getElementById("email").value; 
                        document.getElementById("card_amount").value = document.getElementById("amount").value;

                        document.getElementById("qr_first_name").value = document.getElementById("name").value;                               
                        document.getElementById("qr_email_address").value = document.getElementById("email").value; 
                        // ocument.getElementById("qr_mobile_num").value = document.getElementById("mobile_num").value; 
                        document.getElementById("qr_amount").value = document.getElementById("amount").value;
                        }                
                </script>

            </div>

            <input type="hidden" id="payment-method" name="payment-method">
            <br>
            <br>
        </div>
    
    <script src="script.js"></script>
    <script></script>
</body>
</html>
