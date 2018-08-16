<!DOCTYPE HTML>
<html lang="en" class="no-js">
<head>
<title>OnlineBNS &mdash; The Country's Newest Buy and Sell Website</title>

<link rel="stylesheet" type="text/css" href="css/navbar.css">
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/b.css" rel='stylesheet' type='text/css' />
<link href="css/icomoon.css" rel='stylesheet' type='text/css' />
<link href="css/input1.css" rel='stylesheet' type='text/css' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style type="text/css">
#primary_nav_wrap
{
	margin-top:15px;
}

#primary_nav_wrap ul
{
	list-style:none;
	position:relative;
	float:left;
	margin:0;
	padding:0;
}

#primary_nav_wrap ul li:hover
{
	background:transparent;
	color:#000;
}
#primary_nav_wrap ul li:hover a
{
	background:transparent;
	color:#000;
}

#primary_nav_wrap ul a
{
	display:inline-block;
	color:#FFF;
	text-decoration:none;
	text-transform: uppercase;
	font-weight:700;
	font-size: 0.8125em;
	line-height:32px;
	padding:0 15px;
	font-family: 'Open Sans', sans-serif;
}

#primary_nav_wrap ul li
{
	position:relative;
	float:left;
	margin:0;
	padding:0;
}

#primary_nav_wrap ul ul
{
	display:none;
	position:absolute;
	top:100%;
	left:0;
	background:black;
	padding:0;
}

#primary_nav_wrap ul ul li
{
	float:none;
	width:200px;
}

#primary_nav_wrap ul ul a
{
	line-height:120%;
	padding:10px 15px;
}

#primary_nav_wrap ul ul ul
{
	top:0;
	left:100%;
}

#primary_nav_wrap ul li:hover > ul
{
	display:inline-block;
}
.main ul li{
  border-radius: 4px;
  padding: 10px;
  margin: 0;
  list-style: none;
  display: inline;
  color:gray;
}
.main ul li:hover{
  color:black;
  background:#D9D9D9;
}
.main ul a:hover{
	text-decoration: none;
	cursor: pointer;
}
.active{
  color:black;
  border:1px solid black;
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
     <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
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
     <div class="main">
     <div style="padding: 20px; width: 100%; height: 125px; border: 1px; background:#F2F2F2;"><div style="float: left;"><img src=<?php echo"'images/admin.jpg'"?> style="width: 80px;-webkit-border-radius: 50%;-moz-border-radius: 50%;-ms-border-radius: 50%;border-radius: 50%;">&nbsp;&nbsp;Administrator</div><div style="float: right; padding: 25px; padding-right: 30px;"><ul><a href="adminpage.php"><li>Admin Dashboard</li></a>&emsp;<a href="approve_pending_posts.php"><li class="active">Approve Pending Posts&emsp;<span class="badge count"></span></li></a>&emsp;<!--<a href="#"><li>Monitor Chats</li></a>&emsp;--><a href="logout.php"><li>Logout</li></a></ul></div></div><br>
     	<h1 style="float: left;">Approve Pending Posts :</h1>
      <div class="shop_top">
		<div class="container">
		  <div class="row shop_box-top">
			<?php
			include 'connect_db.php';
			$sql="SELECT * FROM items where approved_to_post = 'pending'";
			$result=mysqli_query($connect,$sql);
			$numResults = mysqli_num_rows($result);
			if (!$numResults)
			{
				echo "<center><h1>There's no Item Here Yet</h1></center>";
			}
			else
			{
				while ($row=mysqli_fetch_array($result)) 
				{
					$id = $row[0];
					$status = $row[12];
					$photo = "SELECT * FROM images where seller_id ='$row[11]' and item_name='$row[1]' LIMIT 1";
					$photoresult = mysqli_query($connect,$photo)  or die("Error: ".mysqli_error($connect));;
					$photorow = mysqli_fetch_array($photoresult, MYSQL_NUM);
					$item_image=$photorow[1];
						echo "<div class='col-md-3 shop_box'><a href='single.html'>";
						echo "<br>";
						echo "<a href='adminviewitem.php?item_id=$id' class='shop_image'>";
						echo "<figure>
												<img src='images/item_images/".$item_image."'' alt='Image' class='img-responsive'>
										  </figure> </a>";
						echo "<div class='shop_desc'>";
						echo "	<h3><a href='#'>".$row[1]."</a></h3>";
						echo "	<p>".$row[9]."</p>";
						echo "	<span class='actual'>&#8369; ".$row[5].".00</span><br>";
						echo "	<ul class='buttons'>
									<div class='clear'> </div>
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
		<script src="js/custom-file-input.js"></script>
				<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"ajax/fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"ajax/insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
      <script type="text/javascript" src="js/navbar.js"></script>