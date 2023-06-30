<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"> 
    <title>Payment Selection - Output</title>


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
    </style>
</head>

<body>
    <div class="payment-selection">
        <div class="logo">
            <img src="assets/nobg-netglobalpay.png" alt="Logo">
        </div>
            <div class="title">
            
                <h2 class="nice-heading">Payment Summary</h2>
                
            </div>
        <hr class="light-hr">
        <div class="output">
            
            
            <?php
            // Retrieve the form data
            $pid = isset($_GET['pid']) ? $_GET['pid'] : time();            
            $full_name = $_POST['first_name'];            
            $email_address = $_POST['email_address'];                  
            $amount = $_POST['amount'];
            $mobile_num = null; 
            $last_name = null;

            $rand= (rand(10,100));
            $date = date("Ymdhis");
            $randid= $rand.+$date;
            date_default_timezone_set('Asia/Manila');    
            $DateAndTime = date('m-d-Y h:i:s a', time());

            // Process the data and display the output        
            ?>
            
            <label class="cred">Date : <span class="cred-span"><?php echo $DateAndTime ?></span></label><br>
            
            <br>
            <label class="cred">Full Name : <span class="cred-span"><?php echo $full_name ?></span></label><br>
            <label class="cred">Email : <span class="cred-span"><?php echo $email_address ?></span></label><br>
            <label class="cred">Amount : <span class="cred-span">₱<?php echo $amount ?>.00</span></label>
        </div>
        <hr class="light-hr">

                <!-- form -->

            <form class="form-signin" method="POST"
                action="https://apipay-dendi.netglobalsolutions.cn/api/v3/payment-gateway/create_order">

                <br>
                <input type="hidden" name="page_source" value="<?php echo $_GET['pogo'] ?? 1; ?>">

                <div class="form-group  ">
                    <input class="form-control mb-3 " type="hidden" id="external_id" name="external_id"
                        value="<?php echo $randid;  ?>" placeholder="Enter Member Account">
                </div>

                <div class="form-group  ">
                    <input type="hidden" class="form-control " id="fname" name="fname" value="<?php echo $full_name; ?>"
                        placeholder="First and Last Name" required="">
                </div>

                <input class="form-control mb-3" type="hidden" id="lname" name="lname" value="<?php echo $last_name; ?>"
                    placeholder="Last Name">
                <input class="form-control mb-3" type="hidden" id="contnumber" name="contnumber" placeholder="Mobile"
                    value="<?php echo $mobile_num; ?>">
                <input class="form-control mb-3" type="hidden" id="emailaddress" name="emailaddress"
                    value="<?php echo $email_address; ?>" placeholder="安全邮箱 - Email"
                    pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required="">

                <input type=hidden name="currency" value="PHP">

                <div class="input-group">
                    <input type="hidden" class="form-control" placeholder="Amount" id="basic-amount" name="amount"
                        value=<?php echo $amount ?> placeholder="Amount" required="">
                    <div class="input-group-btn">
                        <!-- <button class="btn " id="btn-cur"  type="submit"  placeholder="USD" disbaled>
                                
                                </button> -->
                        <!-- <span class="btn " id="btn-cur-usd"  placeholder="USD" disbaled>USD</span> -->
                    </div>
                </div>

                <!-- <button class="submit-button" type="submit">Submit</button> -->
                <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
                <a href="/topup-demo-dark" class="cancel-link">Cancel</a>

            </form>

    </div>

</body>

</html>