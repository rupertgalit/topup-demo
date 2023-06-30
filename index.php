<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <title>Payment Selection</title>        
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
                background: url("assets/dendi.png");
                background-size: cover;
                background-position: center;
                margin: 0;
                color:white;
                padding: 0;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
}
                .input-field{
                    width: 94%;
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



    </style>
</head>
<body>
    <form id="payment-form" action="output.php" method="POST">
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
            <center>
            <h3>Select a Payment Method</h3>
            </center>
            <br>
            <div class="payment-options">





                <button class="payment-option" data-value="e-wallet" type="button">
                    <img src="assets/ewallet.png" alt="E-Wallet">
                </button>


                <form method="POST" action="localhost/topup-demo-dark/output.php">
                                                <!-- <span id = "total">sss</span> -->
                    <input type="hidden" name="first_name" class="form-control" id="card_first_name" value="" required/>
                    <input type="hidden" name="email_address" class="form-control" id="card_email_address" value="" required/>
                    <input type="hidden" name="amount" class="form-control" id="card_amount" value="" required/>

                <button class="payment-option" data-value="credit-card" type="submit">
                    <img src="assets/visa.png" alt="Credit card">
                </button>
               
                </form>


                <script>
                                                                                                        
                    function myFunction() {
                    
                        document.getElementById("card_first_name").value = document.getElementById("name").value;                               
                        document.getElementById("card_email_address").value = document.getElementById("email").value; 
                        document.getElementById("card_amount").value = document.getElementById("amount").value;
 
                        }                

                </script>




                <button class="payment-option" data-value="qr-ph" type="button">
                    <img src="assets/qrph.jpg" alt="QR PH">
                </button>
            </div>

            <input type="hidden" id="payment-method" name="payment-method">
            <br>
            <br>
        </div>
    </form>
    <script src="script.js"></script>
    <script></script>
</body>
</html>
