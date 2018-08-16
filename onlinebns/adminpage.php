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

<!-- Chartjs CSS External -->
<!-- <link rel="stylesheet" type="text/css" href="lib/materialize/css/materialize.min.css"> -->
<link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.min.css">
<style type="text/css">
.h2 {
  text-align: center;
}

table caption {
	padding: .5em 0;
}

@media screen and (max-width: 767px) {
  table caption {
    border-bottom: 1px solid #ddd;
  }
}

.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}
	div.hiden{
		display: none;
		 size: 100% 100%;
	}
	@media print and (color) {
   * {
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
   }
}
@page {
        size: auto;
        /* auto is the initial value */

        /* this affects the margin in the printer settings */
    }
    
    html {
        background-color: #FFFFFF;
        margin: 0px;
        /* this affects the margin on the html before sending to printer */
    }

</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
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
	font-family: 'Raleway', sans-serif;
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
<link href="admin/css/bootstrap2.css" rel="stylesheet" type="text/css" media="all"/>
<link href="admin/css/style2.css" rel="stylesheet" type="text/css" media="all"/>
<!--icons-css-->
<link href="admin/css/font-awesome.css" rel="stylesheet"> 

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
     <script type="text/javascript">
    window.onload = setInterval(clock,1);

    function clock()
    {
	  var d = new Date();
	  
	  var date = d.getDate();
	  
	  var month = d.getMonth();
	  var montharr =["January","February","March","April","May","June","July","August","September","October","November","December"];
	  month=montharr[month];
	  
	  var year = d.getFullYear();
	  
	  var day = d.getDay();
	  var dayarr =["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	  day=dayarr[day];
	  
	  var hour =d.getHours();
      var min = d.getMinutes();
	  var sec = d.getSeconds();
	  var x;	
	  if (min<10) {min="0"+min}
	  if (sec<10) {sec="0"+sec}
	  document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
	  document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
	  document.getElementById("date2").innerHTML=day+" "+date+" "+month+" "+year;
	  if (hour>12) {x="pm";}
	  if (hour<12) {x="am";}
	  if (hour==12) {x="nn";}
	  document.getElementById("time2").innerHTML=hour+":"+m+":"+sec+x;
    }
  </script>
  <script type="text/javascript">
    window.onload = setInterval(clock2,1);

    function clock2()
    {
	  var d2 = new Date();
	  
	  var date2 = d2.getDate();
	  
	  var month2 = d2.getMonth();
	  var montharr2 =["January","February","March","April","May","June","July","August","September","October","November","December"];
	  month2=montharr2[month2];
	  
	  var year2 = d2.getFullYear();
	  
	  var day2 = d2.getDay();
	  var dayarr2 =["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	  day2=dayarr2[day2];
	  
	  var hour2 =d2.getHours();
      var min2 = d2.getMinutes();
	  var sec2 = d2.getSeconds();
	  var x2;	

	  document.getElementById("month").innerHTML=month2;
	  document.getElementById("year").innerHTML=year2;
	  if (hour2>12) {x2="pm";}
	  if (hour2<12) {x2="am";}
	  if (hour2==12) {x2="nn";}
    }
  </script>
    <script src="js/ajax.min.js"></script>


      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <!-- CSS External -->
      <link rel="stylesheet" type="text/css" href="Chartjs/lib/materialize/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="Chartjs/lib/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="Chartjs/css/style.min.css">
</head>
<body>
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
	                <a href="index.php"><h1 style="margin:0px;"><span class="largenav" style="font-family: 'Raleway', sans-serif;"><img src="images/abc.png" alt="" style="width: 150px; height: 70px;" /></span></h1></a>
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
     <div style="padding: 20px; width: 100%; height: 125px; border: 1px; background:#F2F2F2;"><div style="float: left;"><img src=<?php echo"'images/admin.jpg'"?> style="width: 80px;-webkit-border-radius: 50%;-moz-border-radius: 50%;-ms-border-radius: 50%;border-radius: 50%;">&nbsp;&nbsp;Administrator</div><div style="float: right; padding: 25px; padding-right: 30px;"><ul><a href="adminpage.php"><li class="active">Admin Dashboard</li></a>&emsp;<a href="approve_pending_posts.php"><li>Approve Pending Posts&emsp;<span class="badge count"></span></li></a>&emsp;<!--<a href="#"><li>Monitor Chats</li></a>&emsp;--><a href="logout.php"><li>Logout</li></a></ul></div></div><br>
     	 <div class="market-updates">
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-8 market-update-left">
					<?php 
						include 'connect_db.php'; 
						$registered_user_query="SELECT COUNT(account_id) FROM account WHERE account_type='user' and account_verified='1'";
						$registered_user_result=mysqli_query($connect,$registered_user_query);
						$row_user=mysqli_fetch_array($registered_user_result);
						$user_number=$row_user[0];
					?>
						<h3><?php echo"$user_number";?></h3>
						<h4>Registered Users</h4>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file-text-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-2">
				 <div class="col-md-8 market-update-left">
				 <?php
						$pending_posts_query="SELECT COUNT(approved_to_post) FROM items WHERE approved_to_post='Pending'";
						$pending_posts_result=mysqli_query($connect,$pending_posts_query);
						$row_pending=mysqli_fetch_array($pending_posts_result);
						$pending_number=$row_pending[0];
				 ?>
					<h3><?php echo "$pending_number"; ?></h3>
					<h4>Pending Posts</h4>
				  </div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-8 market-update-left">
						<h3 id="time"></h3>
						<h4 id="date"></h4>	
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-calendar"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div><br>
		<center><div style="width: 100%;padding-left: 1.5%;padding-right: 1.5%;" id="printableArea">
                 <div class="row">
                        <div style="width: 49%;float: left;margin-left: 10px;margin-right: 3px;">

                              <div class="card z-depth-3" style="    border-radius: 10px;">
                                    <center><div style="color: white; background: rgba(52, 73, 94,1.0); height: 50px; padding: 10px;     border-top-left-radius: 10px;     border-top-right-radius: 10px;">
                                          <h5 class="" style=" font-size: 20px; margin:10px; font-family: 'Raleway',sans-serif;">Top 3 Highest Rated Users</h5>
                                    </div></center>
                                    <div class="card-content">
                                          <div class="chart-container">
                                          		<div style="float: left;">User<br>Rating</div>
                                                <canvas id="mycanvas" width="600" height="350"></canvas>
                                                <center><div>Users</div></center>
                                          </div>
                                    </div>
                              </div><!-- End of card -->

                        </div><!-- End of col -->
                        <div style="width: 49%;float: left;margin-left: 3px;margin-right: 10px;">

                              <div class="card z-depth-3" style="  border-radius: 10px;">
                                    <center><div style="color: white; background: rgba(52, 73, 94,1.0); height: 50px; padding: 10px;    border-top-left-radius: 10px;     border-top-right-radius: 10px;">
                                          <b><h5 class="" style=" font-size: 20px;  margin:10px;font-family: 'Raleway',sans-serif;">Number of Items per Category</h5></b>
                                    </div></center>
                                    <div class="card-content">
                                          <div class="chart-container">
                                          		<div style="float: left;">No. of<br>Items</div>
                                                <canvas id="mycanvas7" width="600" height="350"></canvas>
                                                <center><div>Categories</div></center>
                                          </div>
                                    </div>
                              </div><!-- End of card -->

                        </div><!-- End of col -->
                  </div><!-- End of row -->
		</div></center>
	<center>
    <div id="print" class="hiden">
<div style="height: 950px; width: 100%; padding: 15px;">
<center><div style=" padding: 10px;"><img src="images/report_logo.png" style="width: 200px; height: 100px;"><br><p style="font-size:35px;margin-top:2px;color: #000; font-family:'Raleway',sans-serif;"><b>ONLINE BNS</b></p><p style=" font-size:20px;margin-top:2px;color: #000;">Olongapo City Sports Complex, East Tapinac, Olongapo City</p><p style="font-size:20px;margin-top:2px;color: #000;">0939-631-1446</p></div></center>
<center><br>
<h2>USER PROFIT</h2>

<div class="container" style="overflow-x: hidden;">
  <div class="row" style="overflow-x: hidden;">
    <div class="col-xs-12" style="overflow-x: hidden;">
      <div class="table-responsive" style="overflow-x: hidden;">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover" style="overflow-x: hidden;">
          <thead>
            <tr>
		      <th>First Name</th>
		      <th>Last Name</th>
		      <th>User Profit</th>
            </tr>
          </thead>
          <tbody>
		    <?php
		    $income_users="SELECT * FROM account WHERE account_type='user' ORDER BY account_income DESC";
		    $income_users2=mysqli_query($connect,$income_users);
		    $count_income = mysqli_num_rows($income_users2);
		    while ($income_rated=mysqli_fetch_array($income_users2)) {
		    echo"
		    <tr>
		      <td>$income_rated[1]</td>
		      <td>$income_rated[2]</td>
		      <td>₱ $income_rated[14]</td>
		    </tr>";	
		    }


		    ?>
          </tbody>
          <tfoot>
            <tr>
            <td colspan="1"></td>
                <?php
				    $count_users_query="SELECT * FROM account WHERE account_type='user'";
				    $count_users_result = mysqli_query($connect,$count_users_query);
				    $count_users=mysqli_num_rows($count_users_result);
				    $count_items_query="SELECT * FROM items ";
				    $count_items_result = mysqli_query($connect,$count_items_query);
				    $count_items=mysqli_num_rows($count_items_result);
				    $result=mysqli_query($connect,"SELECT account_income FROM account WHERE account_type='user'");
				    $sum=0.00;
				while ($row = mysqli_fetch_assoc($result)){
				    $value = $row['account_income'];

				    $sum += $value;
				}
				?>
			<b>
            <td>TOTAL</td>
            <td><?php echo "₱ $sum.00"; ?></td></b>
            </tr>
          </tfoot>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>

<h2>TOP RATED SELLERS</h2>
<div class="container" style="overflow-x: hidden;">
  <div class="row" style="overflow-x: hidden;">
    <div class="col-xs-12" style="overflow-x: hidden;">
      <div class="table-responsive" style="overflow-x: hidden;">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover" style="overflow-x: hidden;">
          <thead>
            <tr>
		      <th>First Name</th>
		      <th>Last Name</th>
		      <th>Rating</th>
            </tr>
          </thead>
          <tbody>
			    <?php
			    $rated_users="SELECT * FROM account WHERE account_type='user' ORDER BY seller_rating DESC";
			    $rated_users2=mysqli_query($connect,$rated_users);
			    while ($user_rated=mysqli_fetch_array($rated_users2)) {
			    echo"
			    <tr>
			      <td>$user_rated[1]</td>
			      <td>$user_rated[2]</td>
			      <td>$user_rated[11] stars</td>
			    </tr>";	
			    }
			    ?>
		   </tbody>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>

<h2>OVER-ALL SUMMARY OF POSTED ITEMS</h2>
<div class="container" style="overflow-x: hidden;">
  <div class="row" style="overflow-x: hidden;">
    <div class="col-xs-12" style="overflow-x: hidden;">
      <div class="table-responsive" style="overflow-x: hidden;">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover" style="overflow-x: hidden;">
          <thead>
            <tr>
		      <th>Category</th>
		      <th>Number of Posted Items</th>
            </tr>
          </thead>
          <tbody>
			    <?php
			    $xx="count(item_category)";
			    $accposts="SELECT item_category,$xx FROM items GROUP BY item_category ORDER BY $xx DESC";
			    $accposts2=mysqli_query($connect,$accposts);
			    $accposts3="SELECT $xx FROM items";
			    $accposts4=mysqli_query($connect,$accposts3);
			    $posted2=mysqli_fetch_array($accposts4);
			    while ($posted=mysqli_fetch_array($accposts2)) {
			    echo"
			    <tr>
			      <td>$posted[0]</td>
			      <td>$posted[1]</td>
			    </tr>";	
			    }
			    ?>
			    <td colspan="">TOTAL NUMBER OF POSTED ITEMS</td>
			    <td><?php echo"$posted2[0]"; ?></td>
		   </tbody>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>

<h2>OVER-ALL SUMMARY OF SOLD ITEMS</h2>
<div class="container" style="overflow-x: hidden;">
  <div class="row" style="overflow-x: hidden;">
    <div class="col-xs-12" style="overflow-x: hidden;">
      <div class="table-responsive" style="overflow-x: hidden;">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover" style="overflow-x: hidden;">
          <thead>
            <tr>
		      <th>Category</th>
		      <th>Number of Sold Items</th>
            </tr>
          </thead>
          <tbody>
 			 	<?php
			    $yy="count(item_category)";
			    $accsoldposts="SELECT item_category,count(approved_to_post) FROM items WHERE approved_to_post = 'Sold' GROUP BY item_category ORDER BY $yy DESC";
			    $accsoldposts2=mysqli_query($connect,$accsoldposts);
			    $accsoldposts3="SELECT count(approved_to_post) FROM items WHERE approved_to_post = 'Sold'";
			    $accsoldposts4=mysqli_query($connect,$accsoldposts3);
			    $sold2=mysqli_fetch_array($accsoldposts4);
			    while ($sold=mysqli_fetch_array($accsoldposts2)) {
			    echo"
			    <tr>
			      <td>$sold[0]</td>
			      <td>$sold[1]</td>
			    </tr>";	
			    }
			    ?>
			    <td colspan="">TOTAL NUMBER OF SOLD ITEMS:</td>
			    <td><?php echo"$sold2[0]"; ?></td>
		   </tbody>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>

</center>
</div>
</div>
    <center><br><input type="button" onclick="printDiv('print')" value="Print Report" style="background:rgba(52, 73, 94,1.0);color:white;font-size: 20px;width: 250px;height: 90px;border:none;border-radius: 10px;" /><br><br></center>
    <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    </script>
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

      <!-- JS External -->
      <script type="text/javascript" src="lib/materialize/js/jquery.min.js"></script>
      <script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>
      <script type="text/javascript" src="lib/chartjs/Chart.min.js"></script>
      <script type="text/javascript" src="js/get_studentdata.js"></script>
      <script type="text/javascript" src="js/get_studentdata2.js"></script>
      <script type="text/javascript" src="js/get_studentdata3.js"></script>
      <script type="text/javascript" src="js/get_studentdata4.js"></script>
      <script type="text/javascript" src="js/get_studentdata5.js"></script>
      <script type="text/javascript" src="js/get_studentdata6.js"></script>
      <script type="text/javascript" src="js/get_studentdata7.js"></script>
      <script type="text/javascript" src="js/initialize.js"></script>
      <script type="text/javascript" src="js/navbar.js"></script>