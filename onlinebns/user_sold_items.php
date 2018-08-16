<?php

require("connect_db.php");
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
	$photo = "SELECT * FROM images where seller_id ='$seller_id' and item_name='$row[1]'";
	$photoresult = mysqli_query($connect,$photo)  or die("Error: ".mysqli_error($connect));	
	$photo1 = "SELECT * FROM images where seller_id ='$seller_id' and item_name='$row[1]' LIMIT 1";	
	$photoresult1 = mysqli_query($connect,$photo1)  or die("Error: ".mysqli_error($connect));
	$photoresult2 = mysqli_query($connect,$photo)  or die("Error: ".mysqli_error($connect));		
	$photoresult3 = mysqli_query($connect,$photo1)  or die("Error: ".mysqli_error($connect));	
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
<link href="css/b.css" rel='stylesheet' type='text/css' />
<link href="css/icomoon.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>	
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

				    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    
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
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <div id="flipkart-navbar">
      <div class="container">
          <div class="row row1" style="padding-top: 10px;">
              <ul class="largenav pull-right">
                  <li class="upper-links"><a class="links" href="index.php">Home</a></li>
                  <li class="upper-links"><a class="links" href="about.php">About</a></li>
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
          <a href="about.php">About</a>
  </div>
	
	<div class="">
		<div style="float: left;"><a href="userpage.php?account_id=<?php echo $seller_id;?>"><img src='images/icons/back_icon.png' style="width:65px; height:65px;"></a></div>
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
				<div class="col-md-3">
				  <div class="box-info-product" style="box-shadow: 1px 1px 20px gray">
					<center><?php echo "<p class='price2'>&#8369; $item_price</p>";?>
							<a href="receipt2.php?product_name=<?php echo "$item_name"; ?>&product_id=<?php echo "$item_id"; ?>&seller_id=<?php echo "$seller_id"; ?>&product_price=<?php echo $item_price; ?>" style="text-decoration: none;">
							<button type="submit" name="Submit" style="border:none; outline: none; position: relative; display: block; background:#e67e22;">
							   <span style="	font-weight: 700; font-size: 20px; line-height: 22px; padding: 13px 40px 13px 40px; color: #FFF;display: block !important;">View Receipt</span></button></a>
					</center>
				   </div><br>
				   <div class="box-info-product" style="box-shadow: 1px 1px 20px gray">
							<center><img src=<?php echo"'images/".$seller_image."'"?> style="width: 60px;-webkit-border-radius: 50%;-moz-border-radius: 50%;-ms-border-radius: 50%;border-radius: 50%;"><h3><?php echo"$seller_name"?></h3>
						<p class="info"><?php echo"$seller_location"?></p>
						<p class="info"><?php echo"$seller_phone" ?></p></center>
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
</html>
      <script type="text/javascript" src="js/navbar.js"></script>