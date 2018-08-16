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
  $account_location = $row[6];
  $account_image = $row[8];
  $account_id = $row[0];
  $account_email = $row[3];
$receiver_email=$row[3];
$inboxquery="SELECT * FROM chat WHERE receiver_email='$receiver_email' GROUP BY chat_subject";
$inboxresults=mysqli_query($connect,$inboxquery);
$prevpagequery="SELECT * FROM account WHERE account_email='".$_SESSION['login_user']."'";
$prevpageresults=mysqli_query($connect,$prevpagequery);
$back=mysqli_fetch_array($prevpageresults);
$user_id=$back[0];
$user_email=$back[3];
$seen_notification="UPDATE chat SET notification=1 WHERE receiver_email='$receiver_email' and notification=0";
mysqli_query($connect,$seen_notification);
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
<link rel="stylesheet" type="text/css" href="css/chatpagestyle.css">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/c.css" rel='stylesheet' type='text/css' />
<link href="css/icomoon.css" rel='stylesheet' type='text/css' />
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
     <div class="main" style="padding: 20px; width: 100%; height: 125px; border: 1px; background:#F2F2F2;"><div style="float: left;"><img src=<?php echo"'images/".$account_image."'"?> style="width: 80px;-webkit-border-radius: 50%;-moz-border-radius: 50%;-ms-border-radius: 50%;border-radius: 50%;">&nbsp;&nbsp;<?php echo "$account_email";?></div><div style="float: right; padding: 25px; padding-right: 30px;"><ul><a href="userpage.php?account_id=<?php echo "$account_id" ?>"><li>Manage Ads</li></a>&emsp;<a href="sellitems.php?account_id=<?php echo "$id";?>"><li>Sell your Items</li></a>&emsp;<a href="chatpage.php?account_id=<?php echo"$id";?>"><li class="active">Chats&emsp;<span class="badge count"></span></li></a>&emsp;<a href="logout.php"><li>Logout</li></a></ul></div></div><br>
      <div class="containerx" id="inbox">
           <div class="content-container clearfix">
               <div class="col-md-12">
                   <h1 class="content-title"><i class="icon-mail2"></i>&nbsp;INBOX    <input type="hidden" name="" id="abc"></h1>
                   
<!--                    <input type="search" placeholder="Search Mail" class="form-control mail-search" /> -->

                   <ul class="mail-list">
                         <?php
      $numResults = mysqli_num_rows($inboxresults);
      if (!$numResults)
      {
        echo "<center><h1>There's no Messages</h1></center>";
      }
      else
      {
        ?>
        <form>
        <?php
      while($row=mysqli_fetch_array($inboxresults)) 
      {
            $sender = $row[1];
            $seller_image = $row[3];
            $chat_subject=$row[11];
            $chat_subject_number=$row[10];?>
             <li><a href="chat_session.php?sender=<?php echo "$sender";?>&chat_subject_number=<?php echo "$chat_subject_number";?>&chat_subject=<?php echo "$chat_subject";?>&account_id=<?php echo "$id";?>">
<?php              echo"
 
                               <span style='float:left;'><img src='images/$seller_image' style='width: 50px;-webkit-border-radius: 50%;-moz-border-radius: 50%;-ms-border-radius: 50%;border-radius: 50%; margin-right:10px;'></span>
                               <span class='mail-sender'>$sender</span>
                               <span class='mail-subject'>SUBJECT: $chat_subject</span>

</a>
                       </li>                               </label>";

      }
      ?>
      </form>
      <?php
    }
      ?>
                   </ul>
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
            <div id='closechat'></div>
          </div>
      </div>
    </div>
</body> 
    <script src="js/custom-file-input.js"></script>
<script type="text/javascript" src="index.js"></script>
</html>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
      $(function () {
        $('#chatsend').submit( function (event) {
      event.preventDefault();
      // using this page stop being refreshing 
          $.ajax({
            type: 'POST',
            url: 'send_chat2.php',
            data: $('#chatsend').serialize(),
            success: function () {
              // alert('form was submitted');
              $("#chatsend")[0].reset();
            }
          });

        });
      });
    </script>
<?php if (!empty($_SESSION['chat_sender'])) { 
      $sender_chat=$_SESSION['chat_sender'];
      $sql = "SELECT * FROM account where account_email = '$sender_chat' ";
$result = mysqli_query($connect,$sql)  or die("Error: ".mysqli_error($connect));;
$row = mysqli_fetch_array($result, MYSQL_NUM);
  $sender_fname = $row[1];
  ?>
      <div class="container" id="chat">
        <div class="row">
            <div class="panel panel-chat">
              <div class="panel-heading">
                  <a href="#" class="chatMinimize" onclick="return true"><span><i class="icon-chat" style="color: #42B72A;"></i>&nbsp;&nbsp;<?php echo "$sender_fname"; ?></span></a>
                  <a href="#" onclick="closechat()"><b>X</b></a>
                  <div class="clearFix"></div>
              </div>
              <div class="panel-body" id="show">
                <div class="clearFix"></div>
              </div>
              <div class="panel-footer">
                <form action="" id="chatsend" method="post" enctype="multipart/form-data"><input type="text" name="textMessage" placeholder="  Type a message" autocomplete="off"><input name="action" type="hidden" value="send" required /><input type="submit" class="send" name="send" value="SEND"/></form>
                  </form>
              </div>
            </div>
        </div>
      </div>
      <?php } ?>
      <script type="text/javascript">     
    $(document).ready(function(){
        setInterval(function(){
    $.ajax({
        url: 'chat_data2.php',
        type: 'POST',
        success: function(data) {
            $('#abc').val(data)
        }
    })      },1);
    });
</script>
     <script type="text/javascript">
        $(document).ready(function(){
          setInterval(function(){
            $('#show').load('chat_data2.php')
          },1);
        });
     </script>
     <script type="text/javascript">
      function openchat(){
            var chat = document.getElementById('chat');
            chat.style.display = 'block';
      }
      function closechat(){
            window.location.href='unset_chat_session.php?account_id=<?php echo "$id";?>';
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

      <script>
      $(document).ready(function(){

        });
      setTimeout(function(){
      $('#show').animate({
      scrollTop: $('#show').get(0).scrollHeight}, 1)
}, 1000);
      </script>
      <script type="text/javascript" src="js/navbar.js"></script>