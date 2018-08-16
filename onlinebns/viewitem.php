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

$id =$_REQUEST['item_id'];
				
$sql = "SELECT * FROM items where item_id = '$id'";
$result=mysqli_query($connect,$sql);
$row = mysqli_fetch_array($result, MYSQL_NUM);	
	$item_id = $row[0];
	$item_name = $row[1];
	$item_description = $row[3];
	$item_condition = $row[4];
	$item_price = $row[5];
	$item_category = $row[6];
	$seller_name = $row[7];
	$seller_image = $row[8];
	$seller_location = $row[9];
	$seller_phone = $row[10];
	$seller_id = $row[11];
	$date_posted = date('M d Y | h:i A',strtotime($row[12]));				
	$status = $row[12];
	$photo = "SELECT * FROM images where seller_id ='$seller_id' and item_name='$row[1]' LIMIT 5 OFFSET 1";
	$photoresult = mysqli_query($connect,$photo)  or die("Error: ".mysqli_error($connect));	
	$photo1 = "SELECT * FROM images where seller_id ='$seller_id' and item_name='$row[1]' LIMIT 1";	
	$photoresult1 = mysqli_query($connect,$photo1)  or die("Error: ".mysqli_error($connect));
	$photoresult2 = mysqli_query($connect,$photo)  or die("Error: ".mysqli_error($connect));		
	$photoresult3 = mysqli_query($connect,$photo1)  or die("Error: ".mysqli_error($connect));		
$rating_sql="SELECT * FROM account WHERE account_id = $seller_id";
$query_rating=mysqli_query($connect,$rating_sql);
$fetch_rating=mysqli_fetch_array($query_rating,MYSQL_NUM);
$account_email=$fetch_rating[3];
$seller_rating=$fetch_rating[11];
$_SESSION['chat_seller'] = $seller_id;
$_SESSION['chat_item_number'] = $item_id;
$_SESSION['chat_item_name'] = $item_name;
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
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/b.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<link href="css/icomoon.css" rel='stylesheet' type='text/css' />
<link href="css/style4.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/rate.css">
<link rel="stylesheet" type="text/css" href="login_modal_style.css">
<style type="text/css">
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
		  font-family: 'Raleway',sans-serif;
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
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- <script src="js/jquery.min.js"></script> -->
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
     <!----details-product-slider--->
				<!-- Include the Etalage files -->
					<link rel="stylesheet" href="css/etalage.css">
					<script src="js/jquery.etalage.min.js"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!--//details-product-slider-->	
<!-- 
<script src="js/jquery.min.js"></script> -->
<style type="text/css">
	    #chat{
	        display: block;
	        position: fixed;
	        bottom: 0;
	        z-index: 300;
	        box-shadow:  0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            -webkit-box-shadow:  0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
	    }
        .clearFix
        {
            clear:both;
        }
        .panel.panel-chat
        {
        	background: none;
            position: fixed;
            bottom:0;
            right:0;
            margin-bottom: 0; 
            max-width: 350px;
            width: 280px;
            box-shadow:  0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            -webkit-box-shadow:  0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            z-index: 300px;
        }
        .panel.panel-chat *
        {
            background: none;
            border: none;
        }
        .panel.panel-chat .panel-heading
        {
        	z-index: 500px;
        	border-top-right-radius:10px;
        	border-top-left-radius:10px;
            background: #2C3E50;
            border: none;
            color:#FFF;
            border-bottom:1px solid rgba(236, 240, 241,0.5);
            box-shadow:  0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            -webkit-box-shadow:  0 5px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }
        .panel.panel-chat .panel-heading a:nth-of-type(1)
        {
            text-decoration: none;
            width: 150px;
            color:#FFF;
            font-weight: bold;
            float:left;
        }
        .panel.panel-chat .panel-heading a:nth-of-type(2)
        {
            text-decoration: none;
            max-width: 11px;
            width: 11px;
            color:#FFF;
            float:right;
        }
        .panel.panel-chat .panel-body
        {
            display: block;
            padding: 0;
            margin: 0;
            max-height: 280px;
            height: 280px;
/*            border-left: 1px solid #b2b2b2;
            border-right: 1px solid #b2b2b2;*/
            background: #FFFFFF;
            overflow: auto;
/*            border-bottom:1px solid gray;*/
        }
        .panel.panel-chat .panel-body::-webkit-scrollbar {
             display: all;
         }
        .panel.panel-chat .panel-body .messageMe
        {
/*            border-bottom:1px dotted #b2b2b2;*/
        }
        .panel.panel-chat .panel-body .messageMe img
         {
            float:left;
            margin: 15px 10px 15px 10px;
            max-width: 50px;
            max-height: 50px;
            width: 30px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%
            ;border-radius: 50%;
         }
        .panel.panel-chat .panel-body .messageMe span
        {
            display: block;
            float:left;
            padding: 5px;
            background: rgba(236, 230, 245,1);
/*            min-height: 100px;*/
            max-width: 200px;
/*            width: 200px;*/
            margin-bottom: 3px;
            border-radius: 12px;
            word-break: break-all;
            overflow: hidden;
        }
        .panel.panel-chat .panel-body .messageHer
        {
/*            border-bottom:1px dotted #b2b2b2;*/
        }
        .panel.panel-chat .panel-body .messageHer img
        {
            float:right;
            margin: 15px 10px 15px 10px;
            max-width: 50px;
            max-height: 50px;
            width: 30px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%
            ;border-radius: 50%;
        }
        .panel.panel-chat .panel-body .messageHer span
        {
            display: block;
            float:right;
            padding: 5px;
            background: rgb(80, 130, 255);
/*            min-height: 100px;*/
            max-width: 200px;
/*            width: 200px;*/
            margin-bottom: 3px;
            border-radius: 12px;
            word-break: break-all;
            overflow: hidden;
        }
        .panel.panel-chat .panel-footer
        {
        	background: #fff;
            padding: 2px;
            margin: 0;
            border-top: 0.5px solid rgba(0,0,0,0.1);
            max-height: 50px;
            height: 26px;
        }
        .panel.panel-chat .panel-footer input[type="text"]
        {
            resize: none;
            width: 200px;
            height: 10%;
            font-size: 15px;
            float: left;
            outline: none;
            padding: 2px;
        }
        .panel.panel-chat .panel-footer input[type="submit"]
        {
        	resize: none;
            width: 50px;
            height: 100%;
            font-size: 15px;
            float: right;
            font-weight: bold;
            outline: none;
            color: rgba(41, 128, 185,1.0);
        }
</style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    
<!--     <link rel="stylesheet" type="text/css" href="itemcss/bootstrap.css"> -->

    <link rel="stylesheet" type="text/css" href="itemcss/style.css.map">
	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="itemcss/magnific-popup.css">

	<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
	<script src="itemjs/jquery.min.js"></script>

	<!-- Magnific Popup core JS file -->
	<script src="itemjs/jquery.magnific-popup.js"></script>
</head>
<body>
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
	                <a href="index.php"><h1 style="margin:0px;"><span class="largenav" style="font-family: 'Raleway',sans-serif;"><img src="images/abc.png" alt="" style="width: 150px; height: 70px;" /></span></h1></a>
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
	

	<div class="">
		<div style="float: left;"><a href="<?php echo"$item_category"; ?>.php"><img src='images/icons/back_icon.png' style="width:65px; height:65px;"></a></div>
		<div class="" style="  margin-top: 10px;background: #fff;padding: 3em;line-height: 1.5em;">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-5">
						
						<div class="preview-pic tab-content gallery">
						<?php
					     while($photorow = mysqli_fetch_array($photoresult3, MYSQL_NUM)){
						 $item_image=$photorow[1];
					     echo"
							<div class='tab-pane active' id='$item_image'><a class='galleryItem' href='images/item_images/$item_image'> <img src='images/item_images/$item_image' /></a></div>";
						}
						 ?>
						 <?php
					     while($photorow = mysqli_fetch_array($photoresult2, MYSQL_NUM)){
						 $item_image=$photorow[1];
					     echo"
							<div class='tab-pane' id='$item_image'><a class='galleryItem' href='images/item_images/$item_image'> <img src='images/item_images/$item_image' /></a></div>";
						}
						 ?>	
						</div>
					</div>
					<div class="details col-md-4">
						<center><h2 class="product-title"><?php echo"$item_name";?></h2></center>
						<h4 class="price">description:</h4><p class="product-description"><?php echo "$item_description"; ?></p>
				        	<p class="m_12" style=" text-align: left;margin-bottom: 2px;"><b>CONDITION:</b> <?php echo "$item_condition"; ?></p>
				        	<p class="m_12" style="text-align: left;margin-bottom: 2px;"><b>LOCATION:</b> <?php echo "$seller_location"; ?></p>
				        	<p class="m_12" style="text-align: left;margin-bottom: 2px;"><b>DATE POSTED:</b> <?php echo "$date_posted"; ?></p>
				        	<p class="m_12" style="text-align: left;margin-bottom: 2px;"><b>CATEGORY:</b> <?php echo "$item_category"; ?></p>
				        	<p class="m_12" style="text-align: left;margin-bottom: 2px;"><b>AD ID:</b> <?php echo "$item_id"; ?></p></center>
					</div>
					<div class="details col-md-3">
				  <div class="box-info-product">
					<center><?php echo "<p class='price2'>&#8369; $item_price</p>";?>
							<?php
							if (!empty($_SESSION['login_user'])) { 
							echo '							<button type="submit" name="Submit" onclick="openchat()" style="border:none; outline: none; position: relative; display: block; background:#27ae60;">
							   <span style="	font-weight: 700; font-size: 20px; line-height: 22px; padding: 12px 36px 14px 60px; color: #FFF;display: block !important;">Chat Seller&nbsp;</span></button>';
							}
							else{
							echo '<a href="#" role="button" data-toggle="modal" data-target="#login-modal" style="border:none; outline: none; position: relative; display: block; background:#27ae60; text-decoration:none;"><span style="	font-weight: 700; font-size: 20px; line-height: 22px; padding: 12px 36px 14px 60px; color: #FFF;display: block !important;">Chat Seller&nbsp;</span></a>';
							}
							?>
													<!-- BEGIN # MODAL LOGIN -->
						<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
						    	<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header" align="center">
											<img class="img-circle" id="img_logo" src="images/abc2.png">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
											</button>
										</div>
						                
						                <!-- Begin # DIV Form -->
						                <div id="div-forms">
						                    <!-- Begin # Login Form -->
						                    <form id="login-form">
								                <div class="modal-body">
										    		<div id="div-login-msg">
						                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
						                                <span id="text-login-msg">You must Log-in first.</span>
						                            </div>
										    		<input id="login_username" name="email" class="form-control" type="text" placeholder="Username " required>
										    		<input id="login_password" name="password" class="form-control" type="password" placeholder="Password" required>
						        		    	</div>
										        <div class="modal-footer">
						                            <div>
						                                <button type="submit" class="btn btn-lg btn-block" style="background: #34495e; color: #fff;">Login</button>
						                            </div>
										    	    <div>
						                                <a href="register.php"><button id="login_register_btn" type="button" class="btn btn-link">Register</button></a>
						                            </div>
										        </div>
						                    </form>
						                    <!-- End # Login Form -->
						                    
						                </div>
						                <!-- End # DIV Form -->
						                
									</div>
								</div>
							</div>
						    <!-- END # MODAL LOGIN -->
							<br>
							<?php
							if (!empty($_SESSION['login_user'])) { 
							?>
							<a href="receipt.php?product_id=<?php echo $item_id; ?>&product_name=<?php echo $item_name; ?>&product_price= <?php echo $item_price; ?>&seller_email=<?php echo $account_email; ?>" style="text-decoration: none;"><img src="images/btn_buynowCC_LG.gif"></a>
							<?php
							}
							else{
							echo '<a href="#" role="button" data-toggle="modal" data-target="#login-modal" style="text-decoration:none;"><img src="images/btn_buynowCC_LG.gif"></a>';
							}
							?>
							</center>
				   </div><br>
				   	<?php
					if (!empty($_SESSION['login_user'])) {?>
				   <div class="box-info-product">
						<center></center>
						<fieldset class="rating">
						<p class="info" style="font-size: 20px;">Rate Seller:</p>
							<?php $account_id=$seller_id ?>
						    <input type="hidden" id="star5" name="rating" value="5"/><label class = "full" for="star5" title="Awesome - 5 stars" onClick="location.href='save.php?a=5&b=<?php echo "$account_id" ?>&id=<?php echo "$item_id" ?>';"></label>
						    <input type="hidden" id="star4" name="rating" value="4"/><label class = "full" for="star4" title="Pretty good - 4 stars"  onClick="location.href='save.php?a=4&b=<?php echo "$account_id" ?>&id=<?php echo "$item_id" ?>';"></label>
						    <input type="hidden" id="star3" name="rating" value="3"/><label class = "full" for="star3" title="Meh - 3 stars"  onClick="location.href='save.php?a=3&b=<?php echo "$account_id" ?>&id=<?php echo "$item_id" ?>';"></label>
						    <input type="hidden" id="star2" name="rating" value="2"/><label class = "full" for="star2" title="Kinda bad - 2 stars"  onClick="location.href='save.php?a=2&b=<?php echo "$account_id" ?>&id=<?php echo "$item_id" ?>';"></label>
						    <input type="hidden" id="star1" name="rating" value="1"/><label class = "full" for="star1" title="Sucks big time - 1 star"  onClick="location.href='save.php?a=1&b=<?php echo "$account_id" ?>&id=<?php echo "$item_id" ?>';"></label>
						</fieldset>
				   </div>
				   <?php
					}

					?>
					</div>
				</div>
			</div>
		</div>
					<div class="row team_box"><br>
				
				<br>
				<div class="col-md-4 team1">
					<div class="gtco-staff">
						<center><h3 class="m_2">SELLER</h3></center>
						<img src=<?php echo"'images/".$seller_image."'"?> alt="Free HTML5 Templates by gettemplates.co">
						<h3><?php echo"$seller_name"?></h3>
						<h1 class="" style="font-size: 17px; margin-top: 10px;"><?php echo"$seller_location"?></h1>
						<h1 class="" style="font-size: 17px; margin-top: 10px;"><?php echo"$seller_phone" ?></h1>
						<h1 class="" style="font-size: 17px; margin-top: 10px;">Seller Rating: <b><?php echo"$seller_rating" ?></b> <b class="star" style="color:  #FFD700;"></b></h1>
					</div>
				</div>
				<div class="col-md-8 team1">
				<h4 class="m_11">Other Products From <?php echo "$seller_name"; ?></h4>
				<?php
		$ssql="SELECT * FROM items where seller_name='$seller_name' and approved_to_post='Approved' LIMIT 3";
		$rresult=mysqli_query($connect,$ssql);
		$nnumResults = mysqli_num_rows($rresult);
		if ($nnumResults)
		{
			while ($row=mysqli_fetch_array($rresult)) {
						$id = $row[0];
						$status = $row[12];
						$photo = "SELECT * FROM images where seller_id ='$row[11]' and item_name='$row[1]' LIMIT 1";
						$photoresult = mysqli_query($connect,$photo)  or die("Error: ".mysqli_error($connect));;
						$photorow = mysqli_fetch_array($photoresult, MYSQL_NUM);
						$item_image=$photorow[1];
							echo "<div class='col-md-4 shop_box'><a href='single.html'>";
								echo "<br>";
								echo "<a href='viewitem.php?item_id=$id' class='shop_image'>";
								echo "<figure>
											<img src='images/item_images/".$item_image."'' alt='Image' class='img-responsive'>
									  </figure> </a>";
								echo "<div class='shop_desc'>";
								echo "	<h3><a href='#'>".$row[1]."</a></h3>";
								echo "	<p>".$row[9]."</p>";
								echo "	<span class='actual'>&#8369; ".$row[5].".00</span><br>";
								echo "	<ul class='buttons'>";
								echo "		<div class='clear'> </div>
									    </ul>
				    				</div>
									</a></div>";
			}
		}



mysqli_close($connect);
?>							
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
<!-- 			  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script>
      $(function () {
        $('#chatsend').submit( function (event) {
      event.preventDefault();
      // using this page stop being refreshing 
          $.ajax({
            type: 'POST',
            url: 'send_chat.php',
            data: $('#chatsend').serialize(),
            success: function () {
              // alert('form was submitted');
              $("#chatsend")[0].reset();
            }
          });

        });
      });
    </script>
<?php
if (!empty($_SESSION['login_user'])) {
?>
	  <div class="container" id="chat">
	<div class="row">
    	<div class="panel panel-chat">
        <div class="panel-heading">
            <a href="#" class="chatMinimize" onclick="return true"><span><i class="icon-chat" style="color: #42B72A;"></i>&nbsp;&nbsp;<?php echo "$seller_name"; ?></span></a>
            <a href="#" onclick="closechat()"><b>X</b></a>
            <div class="clearFix"></div>
        </div>
        <div class="panel-body" id="chat-scroll">

            <div class="clearFix"></div>
        </div>
        <div class="panel-footer">
        	<form action="" id="chatsend" method="post" enctype="multipart/form-data"><input type="text" name="textMessage" placeholder="  Type a message" autocomplete="off"><input name="action" type="hidden" value="send" required /><input type="hidden" name="account_id" value="<?php echo "$seller_id"; ?>"><input type="hidden" name="chat_subject" value="<?php echo "$item_id"; ?>"><input type="hidden" name="chat_subject_name" value="<?php echo "$item_name"; ?>"><input type="hidden" name="item_id" value="<?php echo "$item_id"; ?>"><input type="submit" class="send" name="send" value="SEND"/></form>
            </form>
        </div>
    </div>
	</div>
</div>
</body>	
</html>
	 <script type="text/javascript">
        $(document).ready(function(){
          setInterval(function(){
            $('#chat-scroll').load('chat_data.php')
          },1);
        });
     </script>
     <script type="text/javascript">
      function openchat(){
      	    var chat = document.getElementById('chat');
            chat.style.display = 'block';
      }
      function closechat(){
            var chat = document.getElementById('chat');
            chat.style.display = 'none';
      }

        $(function(){
            $(".panel.panel-chat > .panel-heading > .chatMinimize").click(function(){
                if($(this).parent().parent().hasClass('mini'))
                {
                    $(this).parent().parent().removeClass('mini').addClass('normal');

                    $('.panel.panel-chat > .panel-body').animate({height: "250px"}, 500).show();

                    $('.panel.panel-chat > .panel-footer').animate({height: "26px"}, 500).show();
                }
                else
                {
                    $(this).parent().parent().removeClass('normal').addClass('mini');

                    $('.panel.panel-chat > .panel-body').animate({height: "0"}, 500);

                    $('.panel.panel-chat > .panel-footer').animate({height: "0"}, 500);

                    setTimeout(function() {
                        $('.panel.panel-chat > .panel-body').hide();
                        $('.panel.panel-chat > .panel-footer').hide();
                    }, 500);


                }

            });
            $(".panel.panel-chat > .panel-heading > .chatClose").click(function(){
                $(this).parent().parent().remove();
            });
        })
      </script>
<!--       <script type="text/javascript" src="js/jquery.min.js"></script> -->
      <script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>
      <script type="text/javascript" src="js/initialize.js"></script>

      <?php
  		}
      ?>
      <!-- Javasscript files -->

<script type="text/javascript">
//initializing your javascript
$(document).ready(function() {
  $('.image-link').magnificPopup({type:'image'});

$('.galleryItem').magnificPopup({
 gallery: {
      enabled: true
    },
  type: 'image'
  // other options
});
  
});

</script>
<script type="text/javascript">
$(function() {
    
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function () {
      var formValues = $("form").serialize();
      $.ajax({
        url: "login2.php",
        method: "POST",
        data: formValues,
        success: function(result){
            if (result == "ERROR") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                }
            else {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                    location.reload();
                }

        }
      });
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
                if ($lg_username == "ERROR") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                }
                return false;
                break;
            default:
                return false;
        }
        return false;
    });
    
    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
    $('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
    $('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
    $('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });
    
    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }
    
    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }
    
    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
        }, $msgShowTime);
    }
});
</script>
<script type="text/javascript" src="itemjs/bootstrap.js"></script>
<script type="text/javascript" src=""></script>
<script type="text/javascript" src="js/navbar.js"></script>
<!-- <script type="text/javascript" src="jquery-2.2.1.min.js"></script> -->