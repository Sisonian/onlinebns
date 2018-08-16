<?php
include("connect_db.php");
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
	$seller_id = $row[11];
	$date_posted = $row[12];
	$photo = "SELECT * FROM images where seller_id ='$seller_id' and item_name='$row[1]'";
	$photoresult = mysqli_query($connect,$photo)  or die("Error: ".mysqli_error($connect));	
				
				
			
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
						 <div class="menu">
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
					    </div>							
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
					     while($photorow = mysqli_fetch_array($photoresult, MYSQL_NUM)){
						 $item_image=$photorow[1];
					     echo"
							<li>
								<img class='etalage_thumb_image' src='images/item_images/$item_image' />
								<img class='etalage_source_image' src='images/item_images/$item_image' />
							</li>";
						}
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
				        	<p class="m_10"><b>Ad ID:</b> <?php echo "$item_id"; ?></p>				        	     	
				        </div>
				        <div class="clear"> </div>
				</div>
				<div class="col-md-3">
				  <div class="box-info-product">
					<center><p class='price2'>Action</p></center>
							<form action="adminviewitem.php?item_id=$item_id" method="post" enctype="multipart/form-data">
							<?php echo"<input type='hidden' name='approve_post' value=' $item_id '>";?>
							<input type="submit" name="approve" style="height: 40px; width: 220px; color: #fff; background:#2ecc71; border: 1px solid #2ecc71; border-radius: 5px; margin-bottom: 10px;" value="Approve">
							</form>
							<form action="adminviewitem.php?item_id=$item_id" method="post" enctype="multipart/form-data">
							<?php echo"<input type='hidden' name='decline_post' value=' $item_id '>";?>
							<input type="submit" name="decline"  style="height: 40px; width: 220px; color: #fff; background:#e74c3c; border: 1px solid #e74c3c; border-radius: 5px; margin-bottom: 10px;" value="Decline">
							</form>
							<form action="admin_update.php?item_id='<?php echo"$item_id";?>'" method="post" enctype="multipart/form-data">
							<?php echo"<input type='hidden' name='update_post' value=' $item_id '>";?>
							<input type="submit" name="update"  style="height: 40px; width: 220px; color: #fff; background:#3498db; border: 1px solid #3498db; border-radius: 5px;" value="Update">
							</form>
							<?php
										$connect=mysqli_connect("localhost","root","","buy");
											if (isset($_POST['approve'])) 
										{	

											$approve_post = $_POST['approve_post'];
											$approved_to_db = "UPDATE items SET approved_to_post='Approved' WHERE item_id='$approve_post'";
											if(mysqli_query($connect, $approved_to_db)){
    										 $message = "Post Approved.";
	    									 echo "<script type='text/javascript'>alert('$message');window.location.assign('adminpage.php');</script>";
											} else {
											 $message = "ERROR: Could not able to execute approval. $approve_post". mysqli_error($connect);
	    									 echo "<script type='text/javascript'>alert('$message');window.location.assign('adminpage.php');</script></script>";
											}
										}
										if (isset($_POST['decline'])) 
										{	

											$decline_post = $_POST['decline_post'];
											$declined_to_db = "UPDATE items SET approved_to_post='Declined' WHERE item_id='$decline_post'";
											if(mysqli_query($connect, $declined_to_db)){
    										 $message = "Post Declined.";
	    									 echo "<script type='text/javascript'>alert('$message');window.location.assign('adminpage.php');</script>";
											} else {
											 $message = "ERROR: Could not able to execute decline action. $approve_post". mysqli_error($connect);
	    									 echo "<script type='text/javascript'>alert('$message');window.location.assign('adminpage.php');</script></script>";
											}
										}
										if (isset($_POST['update'])) 
										{	

	    									 echo "<script type='text/javascript'>window.location.assign('admin_update.php?account_id=$approve_post');</script></script>";
										
										}
							?>
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
</html>