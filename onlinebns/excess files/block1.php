<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: user.php?account_id=$userid");
}
if(isset($_SESSION['login_admin'])){
header("location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Online Buy and Sell &mdash; The Country's Newest Buy and Sell Website</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online Buy and Sell-The Country's Newest Buy and Sell Website" />
    <meta name="keywords" content="online buy and sell, buy and sell, buy and sell website" />
    <link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/loginpage.css">

  
</head>

<body style="background-image: url(images/block_BG.png); background-size: cover;  background-position: top center; background-repeat: no-repeat; position: relative;">
<div class="gtco-loader"></div>

<div class="container">
  <div class="info">
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="images/admin.png"/></div>
  <form enctype = "multipart/form-data" id="login-form" action="" method="post">
    <p><input id="username" name="username" type="text" placeholder="Username" required></p>
    <p><input id="password" name="password" type="password" placeholder="Password" required>
    <input name="action" type="hidden" value="login" /></p>
    <p><input class="btn" type="submit" id="login" value="Login" /></p>
    <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    <p class="message">Go Back to <a href="index.html">Home</a></p>
  </form>
</div>

    <script src='js/loginjquery.min.js'></script>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="js/jquery.countTo.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
</body>
</html>
