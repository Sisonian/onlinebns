<?php
require('session.php');

include 'connect_db.php';
$id = $_REQUEST['account_id'];
$sql = "SELECT * FROM account where account_id =$id";
$result = mysqli_query($connect,$sql)  or die("Error: ".mysqli_error($connect));;
$row = mysqli_fetch_array($result, MYSQL_NUM);
	$account_fname = $row[1];
	$account_lname = $row[2];
	$account_phone = $row[5];
	$account_password = $row[4];
	$account_location = $row[6];
	$account_image = $row[8];
	$account_id = $row[0];
	$account_email = $row[3];
if(isset($_POST['action']))
{          
  if($_POST['action']=="signup")
    {
        $targetlocation = "images/".basename($_FILES['userphoto']['name']);
        $user_image=$_FILES['userphoto']['name'];
        $email      = mysqli_real_escape_string($connect,$_POST['email']);
        $fname      = mysqli_real_escape_string($connect,$_POST['fname']);
        $lname      = mysqli_real_escape_string($connect,$_POST['lname']);
        $password   = md5(mysqli_real_escape_string($connect,$_POST['password1']));
        $password2 = md5(mysqli_real_escape_string($connect,$_POST['password2']));
        $number      = mysqli_real_escape_string($connect,$_POST['number']);
        $location = mysqli_real_escape_string($connect,$_POST['location']);
        $query = "SELECT * FROM account where account_email='".$email."'";
        $result = mysqli_query($connect,$query);
        $numResults = mysqli_num_rows($result);
        if($numResults>=1)
        {
            $message = $email." This email already exist!!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        elseif($password !== $password2) 
        {
          $message = "Your passwords do not match!";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $message = "$email is not a valid email format";
          echo "<script type='text/javascript'>alert('$message');</script>";
		}

		}
        elseif(strlen($_POST['password1']) < 6) {
          $message= 'Your password must be at least 6 characters!';
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else
        {
          $addaccount="INSERT INTO account (account_firstname,account_lastname,account_email,account_password,account_phone,account_location,account_registration_date,account_image,account_type) VALUES ('$fname','$lname','$email','$password','$number','$location',NOW(),'$user_image','user')";
          move_uploaded_file($_FILES['userphoto']['tmp_name'], $targetlocation);
         
        if(mysqli_query($connect, $addaccount))
        {
          $message="Success";
          $redirecttoprevpage = "register.php";
          echo "<script type='text/javascript'>alert('$message');window.location.assign('$redirecttoprevpage');</script>";
        }
        }

        $redirecttoprevpage = "register.php";
        echo "<script type='text/javascript'>alert('$message');window.location.assign('$redirecttoprevpage');</script>";
    }

    if(isset($_POST['changepass']))
	{          
		$oldpass=$_POST['oldpass'];
		$newpass=$_POST['newpass'];
		$confirmpass=$_POST['confirmpass'];

		$account_sql = "SELECT * FROM account WHERE account_id = $id";
		$account_results = mysqli_query($connect, $account_sql) or die("Error: ".mysqli_error($connect));
		$row = mysqli_fetch_array($account_results, MYSQL_NUM);
		$account_pass = $row[4];
		if ($account_pass==$oldpass) {
			echo "<script>alert('match');</script>";
		}
		else
		{
			echo "<script>alert('your old password do not match');</script>";
		}
    }
 
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="en" class="no-js">
<head>
<title>SafeBNS &mdash; The Country's Newest Buy and Sell Website</title>
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/b.css" rel='stylesheet' type='text/css' />
<link href="css/icomoon.css" rel='stylesheet' type='text/css' />
<link href="css/style4.css" rel='stylesheet' type='text/css' />
<link href="css/input1.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="css/icomoon.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.php"><img src="images/abc.png" alt="" style="width: 72px; height: 65px;" /></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
						    	<?php echo "<li><a href='sellitems.php?account_id=$id'>Sell Your Items</a></li>";?>							
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
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
     <div class="main">
     <div style="padding: 20px; width: 100%; height: 125px; border: 1px; background:#F2F2F2;"><div style="float: left;"><img src=<?php echo"'images/".$account_image."'"?> style="width: 80px;-webkit-border-radius: 50%;-moz-border-radius: 50%;-ms-border-radius: 50%;border-radius: 50%;">&nbsp;&nbsp;<?php echo "$account_email";?></div><div style="float: right; padding: 25px; padding-right: 30px;"><ul><a href="userpage.php?account_id=<?php echo "$account_id" ?>"><li>Manage Ads</li></a>&emsp;<a href="inbox.php?receiveremail=<?php echo "$account_email";?>"><li>Chats</li></a>&emsp;<a href="settings.php?account_id=<?php echo "$account_id" ?>"><li class="active">Settings</li></a>&emsp;<a href="logout.php"><li>Logout</li></a></ul></div></div>
      <div class="shop_top">
	     <div class="container">
						<?php 	$account_id = $row[0];
							echo "<form method='post' action='settings_action.php?account_id=$account_id' enctype='multipart/form-data'>" ?>
								<div class="register-top-grid">
										<h3>PERSONAL INFORMATION</h3>
										<div>
											<span>First Name</span>
											<input type="text" name="fname" required auto"complete="off" value="<?php echo"$account_fname";?>"> 
										</div>
										<div>
											<span>Last Name</span>
											<input type="text" name="lname" required autocomplete="off" value="<?php echo"$account_lname";?>"> 
										</div>
										<div>
											<span>Email Address</span>
											<input type="text" name="email" required autocomplete="off" value="<?php echo"$account_email";?>"> 
										</div>
										<div>
											<span>Mobile Number</span>
											<input type="text" name="number" required autocomplete="off" value="<?php echo"$account_phone";?>"> 
										</div>
										<div>
											<span>Location</span>
											<input type="text" name="location" required autocomplete="off" value="<?php echo"$account_location";?>"> 
										</div>
										<div>
											<span>Location</span>
											<button type="button" style="background:#34495e;color:white;border:none;width:300px;height: 40px;" data-toggle="modal" data-target="#myModal">Change Password</button>
										</div>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<div class="clear"> </div>
								<div class="submit_button">
								<input name="action" type="hidden" value="signup"/>
								<input type="submit" name="signup" value="Save"></div>
								
						</form>
																	  <!-- Modal -->
											  <div class="modal fade" id="myModal" role="dialog">
											    <div class="modal-dialog">
											    
											      <!-- Modal content-->
											      <div class="modal-content">
											        <div class="modal-header">
											          <button type="button" class="close" data-dismiss="modal">&times;</button>
											          <center><h4 class="modal-title">Change Password</h4></center>
											        </div>
											        <div class="modal-body">
											        <center>
											          <form action="settings.php?account_id='$id'" method='post'>
											          	<label style="float: left;">Old Password</label>
											          	<input type="text" name="oldpass" style="float: right; height: 30px; width: 340px;"><br><br>
											          	<label style="float: left;">New Password</label>
											          	<input type="text" name="newpass" style="float: right; height: 30px; width: 340px;"><br><br>
											          	<label style="float: left;">Confirm Password</label>
											          	<input type="text" name="confirmpass" style="float: right; height: 30px; width: 340px;"><br>
											         </center>
											        </div>
											        <div class="modal-footer">
											          <input type="submit" class="btn btn-default" name="changepass">
											          </form>
											          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											        </div>
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
</html>
		<script src="js/custom-file-input.js"></script>