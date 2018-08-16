<?php
include('connect_db.php');
if(isset($_POST['action']))
{          
  if($_POST['action']=="signup")
    {
    	include 'class/PHPMailerAutoload.php';
		$fname2 = $_POST['fname'];
        $lname2 = $_POST['lname'];
        $name = "$fname2 $lname2";
		$email = $_POST['email'];
		$mailer = new PHPMailer();
		$mailer->IsSMTP();
		$mailer->Host = 'smtp.gmail.com:465'; 
		$mailer->SMTPAuth = TRUE;
		$mailer->Port = 465;
		$mailer->mailer="smtp";
		$mailer->SMTPSecure = 'ssl'; 
		$mailer->IsHTML(true); // pwede na maka gamit ng html tags sa loob ng body
		$mailer->SMTPOptions = array('ssl' => array(
				'verify_peer' => false, 
				'verify_peer_name' => false, 
				'allow_self_signed' => true));
		$mailer->Username = 'cosinazam@gmail.com '; // username ng gmail
		$mailer->Password = '09078682562'; // password ng gmail
		$mailer->From = 'admin@noreply.com'; 
		$mailer->FromName = 'Account Verification';
		$mailer->Body =  '<div style="height: 700px; width: 700px; background-color: #EFEFEF; padding: 15px;">
							<center><div style="background-color: #2C3E50;"><img src="http://images.all-free-download.com/images/graphiclarge/vector_black_background_shopping_cart_icon_280673.jpg" style="width:50px; height:50px;"></div></center>
							<h1 style="color: #333333;
							font-family: ‘Lucida Console’, Monaco, monospace;">Verify your Account</h1>
							<p style="font-size: 20px;color: #333333;
							font-family: Century Gothic, sans-serif;">
								Hello,'.$name.'.
								<br><br>
								The email address you used to register is '.$email.' Now you only have to verify this email address to activate your account.
							</p>
							<br><br>
							<center><a href="http://localhost/onlinebns/verify.php?account_email='.$email.'"><button style="height: 100px;width: 250px; background:#006FA8; border:none; font-size: 30px;color: #FFF;
							font-family: Century Gothic, sans-serif;">Verify your<br>Account!</button></a></center>
							<p style="font-size: 20px;color: #333333;
							font-family: Century Gothic, sans-serif;">
							<br>
							Thank you for registering and welcome to OnlineBnS!
							<br><br><br>
							<b>-The OnlineBnS Team</b>
							</p>
							</div>';
		$mailer->Subject = 'Signup/Account Verification';
		$mailer->AddAddress($email);
        $targetlocation = "images/".basename($_FILES['userphoto']['name']);
        $user_image=$_FILES['userphoto']['name'];
        $email2      = mysqli_real_escape_string($connect,$email);
        $fname      = mysqli_real_escape_string($connect,$_POST['fname']);
        $lname      = mysqli_real_escape_string($connect,$_POST['lname']);
        $password   = md5(mysqli_real_escape_string($connect,$_POST['password1']));
        $password2 = md5(mysqli_real_escape_string($connect,$_POST['password2']));
        $number      = mysqli_real_escape_string($connect,$_POST['number']);
        $location = mysqli_real_escape_string($connect,$_POST['location']);
        $query = "SELECT * FROM account where account_email='".$email."'";
        $result = mysqli_query($connect,$query);
        $numResults = mysqli_num_rows($result);
        $addaccount="INSERT INTO account (account_firstname,account_lastname,account_email,account_password,account_phone,account_location,account_registration_date,account_image,account_type,account_verified) VALUES ('$fname','$lname','$email2','$password','$number','$location',NOW(),'$user_image','user','0')";
          move_uploaded_file($_FILES['userphoto']['tmp_name'], $targetlocation);
        if($numResults>=1)
        {
            $message = $email." This email already exist!!";
            echo "<script type='text/javascript'>alert('$message');</script>";   
    
    	}
    	
    	elseif (!eregi("^[A-Za-z]+$", $fname)) {
    		$message = "Please Letters Only!";
            echo "<script type='text/javascript'>alert('$message');</script>";
    	}

    	elseif($password !== $password2) 
        {
          	$message = "Your passwords do not match!";
          	echo "<script type='text/javascript'>alert('$message');</script>";
        }

		elseif(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
		  	$message = "$email is not a valid email format";
          	echo "<script type='text/javascript'>alert('$message');</script>";
		}

        elseif(strlen($_POST['password1']) < 6) {
          	$message= 'Your password must be at least 6 characters!';
          	echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else
        {
        	if(!$mailer->send()) {
        	mysqli_query($connect, $addaccount);
			$message= 'Message could not be sent.Mailer Error: ' . $mailer->ErrorInfo;
			$redirecttoprevpage = "register.php";
          	echo "<script type='text/javascript'>alert('$message');</script>";
          	echo "<script type='text/javascript'>alert('$message');window.location.assign('$redirecttoprevpage');</script>";
			} else {
	        mysqli_query($connect, $addaccount);
	        $message="Success! Please check your email account for Account Verification. Thank You.";
	        $redirecttoprevpage = "register.php";
	        echo "<script type='text/javascript'>alert('$message');window.location.assign('$redirecttoprevpage');</script>";
	    	}
        }	
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
<title>OnlineBNS &mdash; The Country's Newest Buy and Sell Website</title>
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/b.css" rel='stylesheet' type='text/css' />
<link href="css/icomoon.css" rel='stylesheet' type='text/css' />
<link href="css/style4.css" rel='stylesheet' type='text/css' />
<link href="css/input1.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="css/icomoon.css">
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
      <div class="shop_top">
	     <div class="container">
						<form action="" method="post" enctype="multipart/form-data"> 
								<div class="register-top-grid">
										<ul>
										</ul>
										<h3>PERSONAL INFORMATION</h3>
										<div>
											<span>First Name<label>*</label></span>
											<input type="text" id="fname" name="fname" required autocomplete="off"> 
										</div>
										<div>
											<span>Last Name<label>*</label></span>
											<input type="text" name="lname" required autocomplete="off"> 
										</div>
										<div>
											<span>Email Address<label>*</label></span>
											<input type="text" name="email" required autocomplete="off"> 
										</div>
										<div>
											<span>Mobile Number<label>*</label></span>
											<input type="text" name="number" required autocomplete="off"> 
										</div>
										<div>
											<span>Location<label>*</label></span>
											<input type="text" list="location" name="location" required autocomplete="off"> 
											<datalist id="location">
												<option value="Alaminos City, Pangasinan">
												<option value="Angeles City, Pampanga">
												<option value="Antipolo City, Rizal">
												<option value="Bacolod City, Negros Occidental">
												<option value="Baccor City, Cavite">
												<option value="Bago City, Benguet">
												<option value="Bais City, Negros Oriental">
												<option value="Balanga City, Bataan">
												<option value="Batac City, Ilocos Norte">
												<option value="Batangas Cty, Batangas">
												<option value="Bayawan City, Negros Oriental">
												<option value="Baguio City, Benguet">
												<option value="Baybay City, Leyte">
												<option value="Bayugan City, Agusan Del Sur">
												<option value="Biñan City, Laguna">
												<option value="Bislig City, Surigao del Sur">
												<option value="Bogo City, Cebu">
												<option value="Borongan City, Eastern Samar">
												<option value="Butuan City, Agusan del Norte">
												<option value="Cabanatuan City, Nueva Ecija">
												<option value="Cabuyao City, Laguna">
												<option value="Cadiz City, Negros Occidental">
												<option value="Cagayan de Oro City, Misamis Oriental">
												<option value="Calamba City, Laguna">
												<option value="Calapan City, Oriental Mindoro">
												<option value="Calbayog City, Western Samar">
												<option value="Caloocan City">
												<option value="Candon City, Ilocos Sur">
												<option value="Canlaon City, Negros Oriental">
												<option value="Carcar City, Cebu">
												<option value="Catbalogan City, Western Samar">
												<option value="Cauayan City, Isabela">
												<option value="Cavite City, Cavite">
												<option value="Cebu City, Cebu">
												<option value="Cotabato City, Maguindanao">
												<option value="Dagupan City, Pangasinan">
												<option value="Danao City, Cebu">
												<option value="Dapitan City, Zamboanga del Norte">
												<option value="Dasmariñas City, Cavite">
												<option value="Davao City, Davao del Sur">
												<option value="Digos City, Davao del Sur">
												<option value="Dipolog City, Zamboanga del Norte">
												<option value="Dumaguete City, Negros Oriental">
												<option value="El Salvador City, Misamis Oriental">
												<option value="Escalante City, Negros Occidental">
												<option value="Gapan City, Nueva Ecija">
												<option value="General Santos City, South Cotabato">
												<option value="General Trias City, Cavite">
												<option value="Gingoong City Misamis Oriental">
												<option value="Guihulngan City, Negros Oriental">
												<option value="Himamaylan City, Negros Oriental">
												<option value="Ilagan City, Isabela">
												<option value="Iligan City, Lanao del Norte">
												<option value="Iloilo City, Iloilo">
												<option value="Imus City, Cavite">
												<option value="Iriga City, Camarines Sur">
												<option value="Isabela City, Basilan">
												<option value="Kabankalan City, Negros Occidental">
												<option value="Kidapawan City, North Cotabato">
												<option value="Koronadal City, South Cotabato">
												<option value="La Carlota City, Negros Occidental">
												<option value="Lamitan City, Basilan">
												<option value="Laoag City, Ilocos Norte">
												<option value="Lapu-Lapu City, Cebu">
												<option value="Las Piñas City">
												<option value="Legazpi City, Albay">
												<option value="Ligao City, Albay">
												<option value="Lipa City, Batangas">
												<option value="Lucena City, Quezon">
												<option value="Maasin City, Southern Leyte">
												<option value="Mabalacat City, Pampanga">
												<option value="Makati City">
												<option value="Malabon City">
												<option value="Malaybalay City, Bukidnon">
												<option value="Malolos City, Bulacan">
												<option value="Mandaluyong City">
												<option value="Mandaue City, Cebu">
												<option value="Manila City">
												<option value="Marawi City, Lanao del Sur">
												<option value="Marikina City">
												<option value="Masbate City, Masbate">
												<option value="Mati City, Davao Oriental">
												<option value="Meycuayan City, Bulacan">
												<option value="Muñoz City, Nueva Ecija">
												<option value="Muntinlupa City">
												<option value="Naga City, Cebu">
												<option value="Navotas City">
												<option value="Naga City, Camarines Sur">
												<option value="Olongapo City, Zambales">
												<option value="Ormoc City, Leyte">
												<option value="Oroquieta City, Misamis Occidental">
												<option value="Ozamiz City, Misamis Occidental">
												<option value="Pagadian City, Zamboanga del Sur">
												<option value="Palayan City, Nueva Ecija">
												<option value="Panabo City, Davao del Norte">
												<option value="Parañaque City">
												<option value="Pasay City">
												<option value="Pasig City">
												<option value="Passi City, Iloilo">
												<option value="Puerto Princesa City, Palawan">
												<option value="Quezon City">
												<option value="Roxas City, Capiz">
												<option value="Sagay City, Negros Occidental">
												<option value="Samal City, Davao del Norte">
												<option value="San Carlos City, Negros Occidental">
												<option value="San Carlos City, Pangasinan">
												<option value="San Fernando City, La Union">
												<option value="San Fernando City, Pampanga">
												<option value="San Jose City, Nueva Ecija">
												<option value="San Jose del Monte City, Bulacan">
												<option value="San Juan City">
												<option value="San Pablo City, Laguna">
												<option value="San Pedro City, Laguna">
												<option value="Santa Rosa City, Laguna">
												<option value="Santiago City, Isabela">
												<option value="Silay City, Negros Occidental">
												<option value="Sipalay City, Negros Occidental">
												<option value="Sorsogon City, Sorsogon">
												<option value="Surigao City, Surigao del Norte">
												<option value="Tabaco City, Albay">
												<option value="Tabuk City, Kalinga">
												<option value="Tacloban City, Leyte">
												<option value="Tacurong City, Sultan Kudarat">
												<option value="Tagaytay City, Cavite">
												<option value="Tagbilaran City, Bohol">
												<option value="Taguig City">
												<option value="Tagum City, Davao del Norte">
												<option value="Talisay City, Negros Occidental">
												<option value="Tanauan City, Batangas">
												<option value="Tandag City, Surigao del Norte">
												<option value="Tangub City, Misamis Occidental">
												<option value="Tanjay City, Negros Oriental">
												<option value="Tarlac City, Tarlac">
												<option value="Tayabas City, Quezon">
												<option value="Toledo City, Cebu">
												<option value="Trece Martires City, Cavite">
												<option value="Tuguegarao City, Cagayan">
												<option value="Urdaneta City, Pangasinan">
												<option value="Valencia City, Bukidnon">
												<option value="Valenzuela City">
												<option value="Victorias City, Negros Occidental">
												<option value="Vigan City, Ilocos Sur">
												<option value="Zamboanga City, Zamboanga del Sur">
<!-- 												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value="">
												<option value=""> -->

											</datalist>
										</div>
										<div>
											<span>Account Photo<label>*</label></span>
											<input type="file" name="userphoto" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple required/>
											<label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a photo&hellip;</strong></label>
										</div>

										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<div class="register-bottom-grid">
										<h3>LOGIN INFORMATION</h3>
										<div>
											<span>Password<label>*</label></span>
											<input type="password" name="password1" required autocomplete="off">
										</div>
										<div>
											<span>Confirm Password<label>*</label></span>
											<input type="password" name="password2" required autocomplete="off">
										</div>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<div class="submit_button">
								<input name="action" type="hidden" value="signup"/>
								<input type="submit" name="signup" value="Register"></div>
								
						</form>
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
				<script type="text/javascript" src="js/navbar.js"></script>