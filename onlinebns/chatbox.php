<?php
$id = $_REQUEST['account_id'];
$subject = $_REQUEST['chat_subject'];
$subject_name = $_REQUEST['chat_subject_name'];
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
$chat_result = mysqli_query($connect,$chat_sql)  or die("Error: ".mysqli_error($connect));;

if(isset($_POST['action']))
{          
  if($_POST['action']=="send")
    {
        $chat_subject="$account_email$account_email2$subject";
        $message= mysqli_real_escape_string($connect,$_POST['textMessage']);
        $addaccount="INSERT INTO chat (sender_email,sender_name,sender_image,sender_message,receiver_email,receiver_name,receiver_image,chat_time,subject_id,subject_name,chat_subject) VALUES ('$account_email2','$account_fname2 $account_lname2','$account_image2','$message','$account_email','$account_fname $account_lname','$account_image',NOW(),'$subject','$subject_name','$chat_subject')";
          mysqli_query($connect, $addaccount);
          $redirecttoprevpage = "chatbox.php?account_id=$id && chat_subject=$subject && chat_subject_name=$subject_name";
          echo "<script type='text/javascript'>window.location.assign('$redirecttoprevpage');</script>";
    } 
}
?>
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style type="text/css">
    #chat{
        display: block;
    }
            .clearFix
        {
            clear:both;
        }
        .panel.panel-chat
        {
            position: fixed;
            bottom:0;
            right:0;
            max-width: 350px;
            box-shadow: none;
            -webkit-box-shadow: none;
            z-index: 300;
        }
        .panel.panel-chat *
        {
            background: none;
            border: none;
        }
        .panel.panel-chat .panel-heading
        {
            background: rgba(52, 73, 94,1.0);
            border: 1px solid #2e4588;
            color:#FFF;
        }
        .panel.panel-chat .panel-heading a:nth-of-type(1)
        {
            text-decoration: none;
            width: 290px;
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
            max-height: 250px;
            height: 250px;
            border-left: 1px solid #b2b2b2;
            border-right: 1px solid #b2b2b2;
            background: #EDEFF4;
            overflow: auto;
        }
        .panel.panel-chat .panel-body::-webkit-scrollbar {
             display: none;
         }
        .panel.panel-chat .panel-body .messageMe
        {
            border-bottom:1px dotted #b2b2b2;
        }
        .panel.panel-chat .panel-body .messageMe img
         {
             float:left;
             margin-top: 15px;
             max-width: 50px;
             max-height: 50px;
         }
        .panel.panel-chat .panel-body .messageMe span
        {
            display: block;
            float:left;
            padding: 5px;
            background: #FFF;
            min-height: 80px;
            max-width: 280px;
            height: 80px;
            width: 280px;
            word-break: break-all;
        }
        .panel.panel-chat .panel-body .messageHer
        {
            border-bottom:1px dotted #b2b2b2;
        }
        .panel.panel-chat .panel-body .messageHer img
        {
            float:right;
            margin-top: 15px;
            max-width: 50px;
            max-height: 50px;
        }
        .panel.panel-chat .panel-body .messageHer span
        {
            display: block;
            float:right;
            padding: 5px;
            background: #FFF;
            min-height: 80px;
            max-width: 280px;
            height: 80px;
            width: 280px;
            word-break: break-all;
        }
        .panel.panel-chat .panel-footer
        {
            padding: 0;
            margin: 0;
            border: 1px solid #b2b2b2;
            max-height: 50px;
            height: 50px;
        }
        .panel.panel-chat .panel-footer input
        {
            margin-bottom: -5px;
            resize: none;
            width: 100%;
            height: 100%;
        }
</style>
<div class="container" id="chat">
	<div class="row">
    	<div class="panel panel-chat">
        <div class="panel-heading">
            <a href="#" class="chatMinimize" onclick="return true"><span>Jeremy</span></a>
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
  $time=date('h:i A',strtotime($chat_row[9]));
  $chat_subject=$chat_row[8];
  $chat;
  if ($sender_name==$account_email) {
  $chat="   <div class='messageMe'>
                <img src='images/$sender_image' draggable='false''>
                <span>$sender_message</span>
                <div class='clearFix'></div>
            </div>";
  }
  if ($sender_name==$account_email2) {
  $chat="<div class='messageHer'>
                <img src='images/$sender_image' draggable='false' alt=''/>
                <span>$sender_message</span>
                <div class='clearFix'></div>
            </div>";
  }
  echo $chat;
}
?>
            <div class="clearFix"></div>
        </div>
        <div class="panel-footer">
        	<form action="" method="post" enctype="multipart/form-data">
            <input name="action" type="hidden" value="send" required />
            <input type="text" name="textMessage" cols="0" rows="0" placeholder="Type Here">
            <input type="submit" name="send" value="Send" style="color:blue;float: right;">
            </form>
        </div>
    </div>
	</div>
</div>
      <script type="text/javascript">
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

                    $('.panel.panel-chat > .panel-footer').animate({height: "75px"}, 500).show();
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