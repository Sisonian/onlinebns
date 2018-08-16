<?php
session_start();// Starting Session

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
			
$rating_sql="SELECT * FROM account WHERE account_id = $seller_id";
$query_rating=mysqli_query($connect,$rating_sql);
$fetch_rating=mysqli_fetch_array($query_rating,MYSQL_NUM);
$account_email=$fetch_rating[3];
$seller_rating=$fetch_rating[11];
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
<link href="css/style4.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>	
<link rel="stylesheet" type="text/css" href="css/rate.css">
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
 <script type="text/javascript">

 $(document).ready(function() {

    // $("#display").click(function() {                

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "samplefetch.php?seller_id=<?php echo $seller_id; ?>&item_id=<?php echo $item_id; ?>&item_name=<?php echo $item_name; ?>",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#chat-scroll").html(response); 
            //alert(response);
        }

    });
// });
});

</script>
<script src="js/jquery.min.js"></script>
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
            background: rgba(236, 240, 241,2.0);
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
            background: rgba(52, 73, 94,0.99);
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
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.php"><img src="images/abc.png" alt="" style="width: 72px; height: 65px;" /></a>
					 </div>							
	    		    <div class="clear"></div>
	    	    </div>
	       		<div class="header_right">
						    		  <!-- start search-->
				      <div class="search-box">
							<div id="sb-search" class="sb-search">
								<form name="search" action="searcheditem.php" method="post">
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="searchbox" id="search">
									<input name="action" type="hidden" value="signup"/>
									<input class="sb-search-submit" type="submit" name="search" value="Search">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
						<!----search-scripts---->
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
						<!----//search-scripts---->
	       		</div>
	      	  </div>
		 	</div>
	    </div>
	</div>
	
     <div class="main container-fluid">
     			<div style=" background: #FFF; padding-top:10px; padding-bottom: 10px;">
					<a href="<?php echo"$item_category"; ?>.php"><img src='images/icons/back_icon.png' style="width:65px; height:65px;"></a>
					<center><h1 style="font-size: 30px; font-weight: bolder;"><?php echo "$item_name"; ?></h1></center>
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
				       <div class="single_right" style="float: right;">
				        	<h3>DESCRIPTION</h3>
				        	<p class="m_10" style="text-align: justify;"><?php echo "$item_description"; ?></p>
				        	<h3>DETAILS</h3>
				        	<p class="m_10" style="text-align: left;"><b>Condition:</b> <?php echo "$item_condition"; ?></p>
				        	<p class="m_10" style="text-align: left;"><b>Location:</b> <?php echo "$seller_location"; ?></p>
				        	<p class="m_10" style="text-align: left;"><b>Date Posted:</b> <?php echo "$date_posted"; ?></p>
				        	<p class="m_10" style="text-align: left;"><b>Category:</b> <?php echo "$item_category"; ?></p>
				        	<p class="m_10" style="text-align: left;"><b>Ad ID:</b> <?php echo "$item_id"; ?></p>		       	  
				        </div>
				        <div class="clear"> </div>
				</div>
				<div class="col-md-3">
				  <div class="box-info-product" style="box-shadow: 1px 1px 20px gray">
					<center><?php echo "<p class='price2'>&#8369; $item_price</p>";?>
							<button type="submit" name="Submit" onclick="
							<?php
							if (!empty($_SESSION['login_user'])) { 
							echo "openchat()";
							}
							else{
							echo "location.href='block.php'";
							}
							?>
							" style="border:none; outline: none; position: relative; display: block; background:#27ae60;">
							   <span style="	font-weight: 700; font-size: 20px; line-height: 22px; padding: 12px 36px 14px 60px; color: #FFF;display: block !important;">Chat Seller&nbsp;</span></button>
							<br>
							<a href="buy_now.php?product_id=<?php echo $item_id; ?>&product_name=<?php echo $item_name; ?>&product_price= <?php echo $item_price; ?>&seller_email=<?php echo $account_email; ?>" style="text-decoration: none;"><img src="images/btn_buynowCC_LG.gif"></a></center>
				   </div><br>
				   <div class="box-info-product" style="box-shadow: 1px 1px 20px gray">
							<center><img src=<?php echo"'images/".$seller_image."'"?> style="width: 60px;-webkit-border-radius: 50%;-moz-border-radius: 50%;-ms-border-radius: 50%;border-radius: 50%;"><h3><?php echo"$seller_name"?></h3>
						<p class="info"><?php echo"$seller_location"?></p>
						<p class="info"><?php echo"$seller_phone" ?></p>
						<p class="info" style="font-size: 20px;">Seller Rating: <b><?php echo"$seller_rating" ?></b> <b class="star" style="color:  #FFD700;"></b></p></center>
				   </div><br>
				   <?php
					if (!empty($_SESSION['login_user'])) {?>
				   <div class="box-info-product" style="box-shadow: 1px 1px 20px gray">
						<center></center>
						<fieldset class="rating">
						<p class="info" style="font-size: 20px;">Rate Me:</p>
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
			<div class="row">
				<h4 class="m_11">Other Products From <?php echo "$seller_name"; ?></h4>
				<?php
		$ssql="SELECT * FROM items where seller_name='$seller_name' and approved_to_post='Approved' LIMIT 4";
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
							echo "<div class='col-md-3 shop_box'><a href='single.html'>";
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
			  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("#chatsend").submit(function() {
      $.ajax({
        type: "POST",
        url: "send_chat.php",
        data: $(this).serialize(),
        success: function() {
            $("#textMessage").value(''); 
         }
      })
      // Prevent that page reloads hehe
      return false;
    })
  })
</script>
	  <div class="container" id="chat">
	<div class="row">
    	<div class="panel panel-chat">
        <div class="panel-heading">
            <a href="#" class="chatMinimize" onclick="return true"><span><i class="icon-chat" style="color: #42B72A;"></i>&nbsp;&nbsp;<?php echo "$seller_name"; ?></span></a>
            <a href="#" onclick="closechat()"><b>X</b></a>
            <div class="clearFix"></div>
        </div>
        <div class="panel-body" id="chat-scroll">
        <!-- para to sa mga content ng chats -->
            <div class="clearFix"></div>
        </div>
        <div class="panel-footer">
        	<form action="" id="chatsend" method="post" enctype="multipart/form-data"><input type="text" name="textMessage" id="textMessage" placeholder="  Type a message" autocomplete="off"><input name="action" type="hidden" value="send" required /><input type="hidden" name="account_id" value="<?php echo "$seller_id"; ?>"><input type="hidden" name="chat_subject" value="<?php echo "$item_id"; ?>"><input type="hidden" name="chat_subject_name" value="<?php echo "$item_name"; ?>"><input type="hidden" name="item_id" value="<?php echo "$item_id"; ?>"><input type="submit" class="send" name="send" value="SEND"/></form>
            </form>
        </div>
    </div>
	</div>
</div>
</body>	
</html>
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
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>
      <script type="text/javascript" src="js/initialize.js"></script>
      <script>$('#chat-scroll').animate({
      scrollTop: $('#chat-scroll').get(0).scrollHeight}, 2000);</script>