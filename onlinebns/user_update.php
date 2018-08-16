<?php
include 'connect_db.php';
$id = $_REQUEST['item_id'];
$sql = "SELECT * FROM items where item_id =$id";
$result = mysqli_query($connect,$sql)  or die("Error: ".mysqli_error($connect));;
$row = mysqli_fetch_array($result, MYSQL_NUM);
    $item_name = $row[1];
    $item_price = $row[5];
    $item_description = $row[3];
    $item_condition = $row[4];
    $account_image = $row[8];
    $item_category = $row[6];
    $item_id=$row[0];
    $seller_id=$row[11];
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
<link href="css/input1.css" rel='stylesheet' type='text/css' />
<style type="text/css">
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
      <div class="shop_top">
        <div class="container">
            <?php   $account_id = $row[0];
            echo "<form method='post' action='user_update_action.php?item_id=$item_id&&seller_id=$seller_id&&item_nam=$item_name' enctype='multipart/form-data'>" ?>
                <div class="register-top-grid">
                    <h3>ITEM DETAILS</h3>
                        <div>
                            <span>Item Name<label>*</label></span>
                            <input type="text" name="item_name" required autocomplete="off" value="<?php echo "$item_name"; ?>"> 
                        </div>
                        <div>
                            <span>Item Price<label>*</label></span>
                            <input type="text" name="item_price" required autocomplete="off" value="<?php echo "$item_price"; ?>"> 
                        </div>
                        <div>
                            <span>Item Description<label>*</label></span>
                            <input type="text" name="item_description" required autocomplete="off"  value="<?php echo "$item_description"; ?>"> 
                        </div>
                        <div>
                            <span>Item Condition<label>*</label></span>
                            <select name="item_condition" required>
                                <optgroup label="Choose One:">
                                    <option value="<?php echo "$item_condition"; ?>" selected hidden><?php echo "$item_condition"; ?></option>
                                    <option value="Brand New">Brand New</option>
                                    <option value="2nd Hand">2nd Hand</option>
                                </optgroup>
                            </select> 
                        </div>
                        <div>
                            <span>Item Category<label>*</label></span>
                            <select name="item_category" required>
                                <optgroup label="Choose One:">
                                    <option value="<?php echo "$item_category"; ?>" selected hidden><?php echo "$item_category"; ?></option>
                                    <option value="shoes">Shoes and Footwear</option>
                                    <option value="videogames">Video Games</option>
                                    <option value="phones">Phones and Tablets</option>
                                    <option value="computers">Computers</option>
                                    <option value="electronics">Consumer Electronics</option>
                                    <option value="pets">Pets and Animals</option>
                                    <option value="furniture">Home and Furniture</option>
                                    <option value="health">Beauty and Health</option>
                                    <option value="clothing">Clothing</option>
                                    <option value="sports">Sports And Hobbies</option>
                                    <option value="baby">Baby Stuffs</option>
<!--                                     <option value="real_estate">Real Estate</option> -->
                                    <option value="cars">Cars and Automotives</option>
                                    <option value="motors">Motorcycles</option>
                                    <option value="appliances">Appliances</option>
                                </optgroup>
                            </select>
                        </div>
<!--                         <div>
                            <span>Item Photos<label>*</label></span>
                            <input type="file" name="file[]" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple required/>
                            <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a photo&hellip;</strong></label>
                        </div> -->
                        <div class="clear"> </div>
                                </div>
                                <div class="clear"> </div>
                                <div class="register-bottom-grid">
                                <input type="hidden" name="account_id" value="<?php echo $id ?>">
                                <div class="clear"> </div>
                                </div>
                                <div class="clear"> </div>
                                <div class="submit_button">
                                <input name="action" type="hidden" value="update"/>
                                <input type="submit" name="submit" value="Update"></div>
                                
                        </form> 
            </div>
         </div>
       </div>
       <?php include'upload.php' ?>
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
        <script type="text/javascript" src="js/navbar.js"></script>