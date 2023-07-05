<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Successful</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: url('assets/dendi.png') no-repeat fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    
@keyframes slide-down {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
    .container {
      max-width: 400px;
      padding: 20px;
      background-color: #333;
      border-radius: 15px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
      color: #fff;
      animation: slide-down 1s ease-in-out;
    }
    
    h1 {
      font-size: 28px;
      color: #008000;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }
    
    .icon {
      font-size: 48px;
      color: #008000;
      margin-right: 10px;
    }
    
    p {
      margin-top: 20px;
      color: #ccc;
    }
        /*background cover whole page in mobile devices*/
        @media (max-width: 767px) {
                body {
      
                    background-position: center;
                    background-attachment: fixed;
                }
                }
  </style>
</head>
<body>
  <div class="container">
    <h1><i class="fas fa-check-circle icon"></i> Payment Successful</h1>
    <p>Thank you for your payment. Your transaction was successful.</p>
  </div>
</body>
</html>
