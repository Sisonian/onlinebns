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
<!-- <!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>OnlineBNS &mdash; The Country's Newest Buy and Sell Website</title>
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/b.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<link href="css/icomoon.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
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
     <!-- Add fancyBox main JS and CSS files -->
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
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
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<ul class="team_list">
					 <center><h4>What is Online Buy and Sell?</h4></center>
					 <img src="images/preloved.jpg" class="img-responsive" alt=""/><br/>
					 <p class="m_7"> Online Buy and Sell is the country's newest classifieds platform which provides local communities in high-growth markets with vibrant online marketplaces: Our system connects local people to buy, sell or exchange used goods and services by making it fast and easy for anyone to post a listing through their mobile phone or on the web.<br><br>
					 &emsp;We hope and dream that someday, every month, hundreds of millions of people in local markets around the world are already using our system's online marketplace to find and sell a wide range of products, including computers, cell phones, furniture, sporting goods, services, cars, real estate, and many more..</p>
		          </ul>
				</div>
				<div class="col-md-4 team_bottom">
				  <ul class="team_list">
					<center><h4>Our Purpose</h4></center>
		            <li><a href="#">TO MAKE THE WORLD A BETTER PLACE</a><p>Here, we believe in making the world a better place.</p></li>
		            <li><a href="#">TO IMPROVE PEOPLE'S LIVES</a><p>We dream to improve people's lives by bringing them together for win-win exchanges.</p></li>
		            <li><a href="#">TO HELP OUR SELLERS</a><p>
					Sellers can easily earn some extra cash by simply posting items that are no longer of use them.</p></li>
		            <li><a href="#">TO HELP OUR BUYERS</a><p>We aim of giving buyers the opportunity to find great value items at affordable price deals.</p></li>
		          </ul>
				</div>
			</div>
			<div class="row team_box"><br>
				<center><h3 class="m_2">Our Developers</h3></center>
				<br>
				<div class="col-md-6 team1">
					<div class="gtco-staff">
						<img src="images/admin_2.jpg" alt="Free HTML5 Templates by gettemplates.co">
						<h3>Ian Exciminiano Sison</h3>
						<strong class="role">Documentation and Research Development</strong>
						<p>Ian Exciminiano Sison is the man in-charge of the documentation and research parts of our system. He is a hard-working member who is behind of our system's ideas.</p>
						<ul class="gtco-social-icons">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-google"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 team1">
					<div class="gtco-staff">
						<img src="images/admin_2.jpg" alt="Free HTML5 Templates by gettemplates.co">
						<h3>Ian Exciminiano Sison</h3>
						<strong class="role">Back-end Developer</strong>
						<p>He is our Back-End Developer who is in-charged of our system's main process and functions. He is a very hardworking member who can't afford to see his team failing.</p>
						<ul class="gtco-social-icons">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-google"></i></a></li>
						</ul>
					</div>
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
								<li><a href="#"><i class="icon-mail2"></i>ianexciminianosison@gmail.com</a></li>
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
</html> -->