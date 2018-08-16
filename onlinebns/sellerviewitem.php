<?php
require("connect_db.php");
$id =$_REQUEST['item_id'];
				
$sql = "SELECT * FROM items where item_id = '$id'";
$result=mysqli_query($connect,$sql);
$row = mysqli_fetch_array($result, MYSQL_NUM);	
	$item_id = $row[0];
	$item_name = $row[1];
	$item_image = $row[2];
	$item_description = $row[3];
	$item_condition = $row[4];
	$item_price = $row[5];
	$item_category = $row[6];
	$seller_name = $row[7];
	$seller_image = $row[8];
	$seller_location = $row[9];
	$seller_phone = $row[10];
	$date_posted = $row[11];
				
				
			
mysqli_close($connect);
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
<title>SafeBNS &mdash; The Country's Newest Buy and Sell Website</title>
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
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.html"><img src="images/abc.png" alt="" style="width: 72px; height: 65px;" /></a>
					 </div>
<!-- 						 <div class="menu">
							  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
							    <ul class="nav" id="nav">
							    	<li><a href="index.php">Home</a></li>
							    	<li style="color: white;">|</li>
							    	<li><a href="shoes.php">Sell Your Items</a></li>
							    	<li style="color: white;">|</li>
							    	<li><a href="about.php">About</a></li>
							    	<li style="color: white;">|</li>
							    	<li><a href="block.php">Login</a></li>							
									<div class="clear"></div>
								</ul>
								<script type="text/javascript" src="js/responsive-nav.js"></script>
					    </div> -->							
	    		    <div class="clear"></div>
	    	    </div>
	       		<div class="header_right">
					<div id="wrap">
					  <form action="" autocomplete="on">
					  <input id="search" name="search" type="text" placeholder="What're you looking for ?" autocomplete="off"><input id="search_submit" value="Rechercher" type="submit">
					  </form>
					</div>
	       		</div>
	      	  </div>
		 	</div>
	    </div>
	</div>
     <div class="main">
     			<div style="text-align: center; background: #F2F2F2; padding-top:18px;">
					<h1><?php echo "$item_name"; ?></h1><br>
				</div>
      <div class="shop_top">
		<div class="container">
			<div class="row">
				<div class="col-md-9 single_left">
				   <div class="single_image">
					     <ul id="etalage">
					     <?php
					     echo"
							<li>
								<img class='etalage_thumb_image' src='images/$item_image' />
								<img class='etalage_source_image' src='images/$item_image' />
							</li>";
						 ?>							
						</ul>
					    </div>
				        <!-- end product_slider -->
				        <div class="single_right">
				        	<h3>DESCRIPTION</h3>
				        	<p class="m_10"><?php echo "$item_description"; ?></p>
				        	<h3>DETAILS</h3>
				        	<p class="m_10"><b>Condition:</b> <?php echo "$item_condition"; ?></p>
				        	<p class="m_10"><b>Location:</b> <?php echo "$seller_location"; ?></p>
				        	<p class="m_10"><b>Date Posted:</b> <?php echo "$date_posted"; ?></p>
				        	<p class="m_10"><b>Category:</b> <?php echo "$item_category"; ?></p>
				        	<p class="m_10"><b>Ad ID:</b> <?php echo "$item_description"; ?></p>				        	     	
				        </div>
				        <div class="clear"> </div>
				</div>
				<div class="col-md-3">
				  <div class="box-info-product">
					<?php echo "<p class='price2'>&#8369; $item_price.00</p>";?>
							<button type="submit" name="Submit" class="exclusive">
							   <span>Chat Seller&nbsp;</span>
							</button>
							<br>
							<button type="submit" name="Submit" class="exclusive">
							   <span><?php echo"$seller_phone"; ?></span>
							</button>
				   </div><br>
				   <div class="box-info-product">
							<center><img src=<?php echo"'images/".$seller_image."'"?> style="width: 60px;-webkit-border-radius: 50%;-moz-border-radius: 50%;-ms-border-radius: 50%;border-radius: 50%;"><h3><?php echo"$seller_name"?></h3>
						<p class="info"><?php echo"$seller_location"?></p>
						<p class="info"><?php echo"$seller_phone" ?></p></center>
				   </div>
			   </div>
			</div>		
			<div class="row">
				<h4 class="m_11">Other Products From <?php echo "$seller_name"; ?></h4>
				<?php
		$db=mysqli_connect("localhost","root","","buy");
		$sql="SELECT * FROM items where seller_name='$seller_name' and approved_to_post='1'";
		$result=mysqli_query($db,$sql);
		$numResults = mysqli_num_rows($result);
		if ($numResults)
		{
			while ($row=mysqli_fetch_array($result)) {
						$id = $row[0];
							echo "<div class='col-md-3 shop_box'><a href='single.html'>";
								echo "<br>";
								echo "<a href='viewitem.php?item_id=$id' class='shop_image'>";
								echo "<figure>
											<img src='images/".$row['item_image']."'' alt='Image' class='img-responsive'>
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
</html>