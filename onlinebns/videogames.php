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
<title>OnlineBNS &mdash; The Country's Newest Buy and Sell Website</title>
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/c.css" rel='stylesheet' type='text/css' />
<link href="css/icomoon.css" rel='stylesheet' type='text/css' />
	<style type="text/css">
		@import url(http://fonts.googleapis.com/css?family=Lato:100,300,400,700);
		@import url(https://raw.github.com/FortAwesome/Font-Awesome/master/docs/assets/css/font-awesome.min.css);
		#wrap {
		  display: inline-block;
		  position: relative;
		  height: 30px;
		  float: right;
		  padding: 0;
		  position: relative;
		}

		#wrap input[type="text"] {
		  height: 30px;
		  font-size: 15px;
		  display: inline-block;
		  font-family: "Lato";
		  font-weight: 300;
		  border: none;
		  outline: none;
		  color: white;
		  padding: 3px;
		  padding-right: 60px;
		  width: 0px;
		  position: absolute;
		  top: 0;
		  right: 0;
		  background: none;
		  z-index: 3;
		  transition: width .4s cubic-bezier(0.000, 0.795, 0.000, 1.000);
		  cursor: pointer;
		}

		#wrap input[type="text"]:focus:hover {
		  border-bottom: 1px solid #BBB;
		}

		#wrap input[type="text"]:focus {
		  width: 300px;
		  z-index: 1;
		  border-bottom: 1px solid #BBB;
		  cursor: text;
		}
		#wrap input[type="submit"] {
		  height: 36px;
		  width: 33px;
		  display: inline-block;
		  color:red;
		  float: right;
		  background: url(images/search.png) center center no-repeat;
		  text-indent: -10000px;
		  border: none;
		  position: absolute;
		  top: 0;
		  right: 0;
		  z-index: 2;
		  cursor: pointer;
		  opacity: 0.4;
		  cursor: pointer;
		  transition: opacity .4s ease;
		}

		#wrap input[type="submit"]:hover {
		  opacity: 0.8;
		}
	</style>
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
          	<div style="text-align: center; background: #F2F2F2; padding-top:18px;"><h1>Video Games</h1><br></div>
      <div class=""><!--    former name:   <div class="shop_top"> -->
		<div class="container">
			<div class="row shop_box-top">
			<?php
		$db=mysqli_connect("localhost","root","","buy");
		$sql="SELECT * FROM items where item_category='videogames' and approved_to_post='Approved'";
		$result=mysqli_query($db,$sql);
		$numResults = mysqli_num_rows($result);
		if (!$numResults)
{
			echo "<center><h1>There's no Item Here Yet</h1></center>";
}
else
{
			while ($row=mysqli_fetch_array($result)) {
						$id = $row[0];
						$status = $row[12];
						$photo = "SELECT * FROM images where seller_id ='$row[11]' and item_name='$row[1]' LIMIT 1";
						$photoresult = mysqli_query($db,$photo)  or die("Error: ".mysqli_error($db));;
						$photorow = mysqli_fetch_array($photoresult, MYSQL_NUM);
						$item_image=$photorow[1];
							echo "<div class='col-md-3 shop_box'><a href='single.html'>";
								echo "<br>";
								echo "<a href='viewitem.php?item_id=$id' class='shop_image'>";
								echo "<figure>
											<img src='images/item_images/".$item_image."'' alt='Image' class='img-responsive'>
									  </figure> </a>";
								echo "<div class='shop_desc'>";
								echo "	<h3><a href='#'>".$row[1]."</a></h3>";
								echo "	<p>".$row[9]."</p>";
								echo "	<span class='actual'>&#8369; ".$row[5]."</span><br>";
								echo "	<ul class='buttons'>";
								echo "		<div class='clear'> </div>
									    </ul>
				    				</div>
									</a></div>";
		}
}




?>							
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
							<li><a href="#"><i class="icon-phone"></i> +63-(909)-951-4698</a></li>
							<li><a href="#"><i class="icon-mail2"></i>ianexciminianosison@gmail.com</a></li>
							<li><a href="#"><i class="icon-mail2"></i>jeremyxarrabe@gmail.com</a></li>
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