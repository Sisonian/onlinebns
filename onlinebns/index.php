<?php
session_start();// Starting Session
$location = "userpage.php";
$login_nav="<li class='upper-links'><a class='links' href='block.php'>Login</a></li>";
include 'connect_db.php';
if (!empty($_SESSION['login_user'])) {
	// Storing Session
	$user=$_SESSION['login_user'];
	$userSQL = mysqli_query($connect,"select * from account where account_email='".$user."'");
	$userResults = mysqli_fetch_array($userSQL);
	$userid=$userResults[0];
	$userfname=$userResults[1];
	$location="sellitems.php?account_id=$userid";
	$login_nav="<li class='upper-links'><a class='links' href='userpage.php?account_id=$userid'>$userfname</a></li>";
}
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OnlineBNS &mdash; The Country's Newest Buy and Sell Website</title>
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/b.css" rel='stylesheet' type='text/css' />
<link href="css/icomoon.css" rel='stylesheet' type='text/css' />
<link href="css/style4.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<!--<script src="js/jquery.easydropdown.js"></script>-->
<!--start slider -->
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>
<!--end slider -->
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
</head>
<body>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<div id="flipkart-navbar">
	    <div class="container">
	        <div class="row row1" style="padding-top: 10px;">
	            <ul class="largenav pull-right">
	                <li class="upper-links"><a class="links" href="index.php">Home</a></li>
	                <?php echo "<li class='upper-links'><a class='links' href='$location'>Sell Your Items</a></li>";?>
	                <li class="upper-links"><a class="links" href="about.php">About</a></li>
	                <?php echo"$login_nav"; ?>
	            </ul>
	        </div>
	        <div class="row row2">
	            <div class="col-sm-3">
	                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ <img src="images/abc.png" alt="" style="width: 150px; height: 70px;" /></span></h2>
	                <a href="index.php"><h1 style="margin:0px;"><span class="largenav" style="font-family: "calibri";"><img src="images/abc.png" alt="" style="width: 150px; height: 70px;" /></span></h1></a>
	            </div>
	            <div class="flipkart-navbar-search smallsearch col-sm-9 col-xs-11" style="padding-top: 10px;">
	                <div class="row">
	                	<form name="search" action="searcheditem.php" method="post">
	                	    <input class="flipkart-navbar-input col-xs-11" type="search" placeholder="Search for Products, Locations and more" name="searchbox">
							<input name="action" type="hidden" value="signup"/>
							<input class="sb-search-submit" type="submit" name="search" value="Search">
						</form>

	                    <button class="flipkart-navbar-button col-xs-1">
	                        <svg width="15px" height="15px">
	                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
	                        </svg>
	                    </button>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div id="mySidenav" class="sidenav">
	    <div class="container" style="background:  #2C3E50;">
	        <span class="sidenav-heading">ONLINE BNS</span>
	        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
	    </div>
	        <a href="index.php">Home</a>
	                <?php echo "<a href='$location'>Sell Your Items</a>";?>
	                <a href="about.php">About</a>
	                <?php echo"$login_nav"; ?>
	</div>
	<div class="banner">
	<!-- start slider -->
       <div id="fwslider">
         <div class="slider_container">
            <div class="slide"> 
                <!-- Slide image -->
               <img src="images/preloved.jpg" class="img-responsive" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <h1 class="title">Sell your<br>Pre-loved Items</h1>
                        <!-- /Text title -->
                    </div>
                </div>
               <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
               <img src="images/preloved2.jpg" class="img-responsive" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h1 class="title">Run Over<br>Everything</h1>
                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
       </div>
       <!--/slider -->
      </div>
		<div class="gtco-gray-bg">
		      <div class="s_top">
				<div class="containerx">
					<div class="row">
						<div class="col-md-3 shop_box">								
							<a href="shoes.php" class="gtco-card-item">
								<div class="gtco-text text-center">
								<br>
									<img src="images/icons/shoe_icon.png" style="width: 100px; height:100px;">
									<br><br>
									<h2>Shoes and Footwear</h2>
								</div>
							</a>
						</div>
							<div class="col-md-3 shop_box">
								<a href="videogames.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/videogame_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Video Games</h2>
									</div>
								</a>
							</div>
							<div class="col-md-3 shop_box">
								<a href="phones.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/phone_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Phones and Tablets</h2>
									</div>
								</a>
							</div>
							<div class="col-md-3 shop_box">
								<a href="computers.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/computer_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Computers</h2>
									</div>
								</a>
							</div>
							<div class="col-md-3 shop_box">
								<a href="electronics.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/camera_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Consumer Electronics</h2>
									</div>
								</a>
							</div>
<!-- 							<div class="col-md-3 shop_box">
								<a href="pets.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/paw_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Pets and Animals</h2>
									</div>
								</a>
							</div> -->
							<div class="col-md-3 shop_box">
								<a href="furnitures.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/sofa_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Home and Furniture</h2>
									</div>
								</a>
							</div>
							<div class="col-md-3 shop_box">
								<a href="health.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/treadmill_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Beauty and Health</h2>
									</div>
								</a>
							</div>
							<div class="col-md-3 shop_box">
								<a href="clothing.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/shirt_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Clothing</h2>
									</div>
								</a>
							</div>
							<div class="col-md-3 shop_box">
								<a href="sports.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/ball_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Sports and Hobbies</h2>
									</div>
								</a>
							</div>
							<div class="col-md-3 shop_box">
								<a href="baby.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/stroller_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Baby Stuffs</h2>
									</div>
								</a>
							</div>
<!-- 							<div class="col-md-3 shop_box">
								<a href="real_estate.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/building_icon.png" style="width: 100px; height:100px;">
										<br><br>
										<h2>Real Estate</h2>
									</div>
								</a>
							</div> -->
<!-- 							<div class="col-md-3 shop_box">
								<a href="cars.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/car_front_icon.png" style="width: 110px; height:110px;">
										<br><br>
										<h2>Cars and Automotives</h2>
									</div>
								</a>
							</div> -->
<!-- 							<div class="col-md-3 shop_box">
								<a href="motors.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/motor_icon.png" style="width: 130px; height:110px;">
										<br><br>
										<h2>Motorcycles</h2>
									</div>
								</a>
							</div> -->
							<div class="col-md-3 shop_box">
								<a href="appliances.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br>
										<img src="images/icons/blender_icon.png" style="width: 110px; height:110px;">
										<br><br>
										<h2>Appliances</h2>
									</div>
								</a>
							</div>
							<div class="col-md-3 shop_box">
								<a href="all.php" class="gtco-card-item">
									<div class="gtco-text text-center">
									<br><br><br>
										<h1>View All<br>Categories</h1>
									<br><br>
									</div>
								</a>
							</div>
					</div>
				</div>
			   </div>
		</div>
		<div class="footer_container">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<ul class="footer_box">
							<h4>About Us</h4>
							<p> Online Buy and Sell is the country's newest classifieds platform which provides local communities in high-growth markets with vibrant online marketplaces: Our system connects local people to buy, sell or exchange used goods and services by making it fast and easy for anyone to post a listing through their mobile phone or on the web.</p>
							<br/>
							<p><a href="about.php">Learn more...</a></p>
						</ul>
					</div>
					<div class="col-md-4">
						<ul class="footer_box">

						</ul>
					</div>
					<div class="col-md-4">
						<ul class="footer_box">
						<h4>Get In Touch</h4>
							<ul class="gtco-quick-contact">
								<li><a href="#"><i class="icon-phone"></i> +63-(909)-951-4698</a></li>
								<li><a href="#"><i class="icon-mail2"></i>ianexciminianosison@gmail.com</a></li>
								<li><a href="#"><i class="icon-mail2"></i>jeremyxarrabe@gmail.com</a></li>
							</ul>
						</ul>
					</div>
				</div>
				<div class="row footer_bottom">
				    <div class="copy">
			           <p>&copy; 2017 Online Buy and Sell. <br>Design Credits to: <a href="http://w3layouts.com" target="_blank">w3layouts</a></p>
		            </div>
   				</div>
			</div>
		</div>
</body>	
<script type="text/javascript" src="js/navbar.js"></script>
</html>