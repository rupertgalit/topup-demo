<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You!</title>
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
      color: #fff;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      animation: slide-down 1s ease-in-out;
    }
    
    h1 {
      font-size: 35px;
      margin-bottom: 20px;
    }
    
    p {
      margin-bottom: 30px;
      font-size:16px;
      color: #ccc;
    }
    
    .button {
      display: inline-block;
      padding: 10px 20px;
      background: linear-gradient(to right, #DECBA4, #3E5151); 
      color: #000000;
      text-decoration: none;
      border-radius: 4px;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    .button:hover {
        background: linear-gradient(to right, #eadbbc, #657b7b); 
    }
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
   <h1>Thank you! </h1>
    <p>We appreciate your business and value you as our customer.</p>
    <a href="https://topup-demo.netglobalsolutions.net" class="button">Back to Main Page</a>
  </div>
</body>
</html>