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
<title>SafeBNS &mdash; The Country's Newest Buy and Sell Website</title>
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="style.css">
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
                  <?php echo "<li><a href='userpage.php?account_id=$account_id'>$account_fname</a></li>";?>             
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
           <div style="padding: 20px; width: 100%; height: 125px; border: 1px; background:#F2F2F2;"><div style="float: left;"><img src=<?php echo"'images/".$account_image."'"?> style="width: 80px;-webkit-border-radius: 50%;-moz-border-radius: 50%;-ms-border-radius: 50%;border-radius: 50%;">&nbsp;&nbsp;<?php echo "$account_email";?></div><div style="float: right; padding: 25px; padding-right: 30px;"><ul><a href="userpage.php?account_id=<?php echo "$account_id" ?>"><li> Manage Ads</li></a>&emsp;<a href="sellitems.php?account_id=<?php echo "$id";?>"><li>Sell your Items</li></a>&emsp;<a href="chatpage.php?account_id=<?php echo "$account_id"; ?>"><li class="active">Chats</li></a>&emsp;<a href="logout.php"><li>Logout</li></a></ul></div></div><br></div>
      <div class="containerx" id="inbox">
           <div class="content-container clearfix">
               <div class="col-md-12">
                   <h1 class="content-title"><i class="icon-mail2"></i>&nbsp;INBOX</h1>
                   
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
                    <script type="text/javascript">
                        function see() {
                        if (document.getElementById("service").value == 'Posted') {
                    var posted = document.getElementById('posted');
                    posted.style.display = 'block';
                    var sold = document.getElementById('sold');
                    sold.style.display = 'none';
                      }
                        else if(document.getElementById("service").value == 'Sold'){
                    var posted = document.getElementById('posted');
                    posted.style.display = 'none';
                    var sold = document.getElementById('sold');
                    sold.style.display = 'block';
                      }
                     };
                 </script>
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
    <script src="js/custom-file-input.js"></script>
<script type="text/javascript" src="index.js"></script>
</html>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("#chatsend").submit(function() {
      $.ajax({
        type: "POST",
        url: "send_chat2.php",
        data: $(this).serialize(),
        success: function() {

         }
      })
      // // Prevent that page reloads hehe
      // return false;
    })
  })
</script>
<?php
// unset($_SESSION['chat_content']);
if (!empty($_SESSION['chat_sender'])) {
$sender=$_SESSION['chat_sender'];
$subject=$_SESSION['chat_subject_number'];
$subject_name=$_SESSION['chat_subject_name'];
$sql = "SELECT * FROM account where account_email = '$sender' ";
$result = mysqli_query($connect,$sql)  or die("Error: ".mysqli_error($connect));;
$row = mysqli_fetch_array($result, MYSQL_NUM);
  $account_fname = $row[1];
  $account_lname = $row[2];
  $account_phone = $row[5];
  $account_location = $row[6];
  $account_image = $row[8];
  $account_id = $row[0];
  $account_email = $row[3];
$sql2 = "SELECT * FROM account where account_email ='".$_SESSION['login_user']."'";
$result2 = mysqli_query($connect,$sql2)  or die("Error: ".mysqli_error($connect));;
$row2 = mysqli_fetch_array($result2, MYSQL_NUM);
  $account_fname2 = $row2[1];
  $account_lname2 = $row2[2];
  $account_phone2 = $row2[5];
  $account_location2 = $row2[6];
  $account_image2 = $row2[8];
  $account_id2 = $row2[0];
  $account_email2 = $row2[3];
$chat_sql = "SELECT * FROM chat WHERE (sender_email = '$account_email' AND receiver_email = '$account_email2' and subject_id='$subject')
OR (sender_email = '$account_email2' AND receiver_email = '$account_email' and subject_id='$subject')";
$chat_result = mysqli_query($connect,$chat_sql)  or die("Error: ".mysqli_error($connect));
if(isset($_POST['action']))
{          
  if($_POST['action']=="send")
    {
        $chat_subject="$account_email$account_email2$subject";
        $message= mysqli_real_escape_string($connect,$_POST['textMessage']);
        $addaccount="INSERT INTO chat (sender_email,sender_name,sender_image,sender_message,receiver_email,receiver_name,receiver_image,chat_time,subject_id,subject_name,chat_subject) VALUES ('$account_email2','$account_fname2 $account_lname2','$account_image2','$message','$account_email','$account_fname $account_lname','$account_image',NOW(),'$subject','$subject_name','$chat_subject')";
          mysqli_query($connect, $addaccount);
          $redirecttoprevpage = "chatpage.php?account_id=$account_id";
          echo "<script type='text/javascript'>window.location.assign('$redirecttoprevpage');</script>";
    } 
}
?>
    <div class="container" id="chat">
  <div class="row">
      <div class="panel panel-chat">
        <div class="panel-heading">
            <a href="#" class="chatMinimize" onclick="return true"><span><i class="icon-chat" style="color: #42B72A;"></i>&nbsp;&nbsp;<?php echo "$account_fname"; ?></span></a>
            <a href="#" onclick="closechat()"><b>X</b></a>
            <div class="clearFix"></div>
        </div>
        <div class="panel-body" id="chat-scroll">
        <?php 


while ($chat_row = mysqli_fetch_array($chat_result)) {
  $sender_name = $chat_row[1];
  $sender_full = $chat_row[2];
  $receiver_name = $chat_row[6];
  $receiver_image = $chat_row[7];
  $sender_image = $chat_row[3];
  $chat_id = $chat_row[0];
  $sender_message = $chat_row[4];
  $time=date('M d Y | h:i A',strtotime($chat_row[9]));
  $chat_subject=$chat_row[8];
  $chat;
  if ($sender_name==$account_email) {
  $chat="   <div class='messageMe'>
                <img src='images/$sender_image' draggable='false''>
                <span><p style='font-size: 15px; color:#000;'>$sender_message</p><p style='font-size:13px; float:right; color:gray;''>Sent: $time</p></span>
                <div class='clearFix'></div>
            </div>";
  }
  if ($sender_name==$account_email2) {
  $chat="<div class='messageHer'>
                <img src='images/$sender_image' draggable='false' alt=''/>
                <span><p style='font-size: 15px; color:#FFF;'>$sender_message</p><p style='font-size:11px; float:right; color:lightgray; opacity:0.3;'>$time</p></span>
                <div class='clearFix'></div>
            </div>";
  }
  echo $chat;
}
?>
            <div class="clearFix"></div>
        </div>
        <div class="panel-footer">
          <form action="" id="chatsend" method="post" enctype="multipart/form-data"><input type="text" name="textMessage" placeholder="  Type a message" autocomplete="off"><input name="action" type="hidden" value="send" required /><input type="submit" class="send" name="send" value="SEND"/></form>
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
      <?php
      }
      ?>