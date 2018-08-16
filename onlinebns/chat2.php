<?php
require('session.php');

include 'connect_db.php';
$sender = $_REQUEST['sender'];
$subject = $_REQUEST['chat_subject_number'];
$subject_name = $_REQUEST['chat_subject'];
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
        $message= mysqli_real_escape_string($connect,$_POST['message']);
        $addaccount="INSERT INTO chat (sender_email,sender_name,sender_image,sender_message,receiver_email,receiver_name,receiver_image,chat_time,subject_id,subject_name,chat_subject) VALUES ('$account_email2','$account_fname2 $account_lname2','$account_image2','$message','$account_email','$account_fname $account_lname','$account_image',NOW(),'$subject','$subject_name','$chat_subject')";
          mysqli_query($connect, $addaccount);
          $redirecttoprevpage = "chat2.php?sender=$sender && chat_subject_number=$subject && chat_subject=$subject_name";
          echo "<script type='text/javascript'>window.location.assign('$redirecttoprevpage');</script>";
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>SafeBNS &mdash; The Country's Newest Buy and Sell Website</title>
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/chat.css">
</head>
<body id="chat-scroll">
<div class="menu">
            <a href="inbox.php?receiveremail=<?php echo"$account_email2"; ?>" class="back"><i class="fa fa-angle-left"></i><img src="images/<?php echo "$account_image"; ?>" draggable="false"/></a>
            <div class="name"><?php echo"$account_fname $account_lname"; ?></div>
</div>
    <ol class="chat" id="chat-scroll"  >
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
  $chat="
   <li class='other'>
    <div class='avatar'><img src='images/$sender_image' draggable='false'/></div>&nbsp;
      <div class='msg'>
          <div class='use'>$sender_name</div>
        <p>$sender_message</p>
        <time>$time</time>
        <p></p>
      </div>
    </li>";
  }
  if ($sender_name==$account_email2) {
  $chat="
   <li class='self'>
      <div class='msg'>
          <div class='use'>$sender_name</div>
        <p>$sender_message</p>
        <time>$time</time>
        <p></p>
      </div>&nbsp;
      <div class='avatar'><img src='images/$sender_image' draggable='false'/></div>&nbsp;
    </li>";
  }
  echo $chat;
}
?>


    </ol>
<div class="typezone">
<form action="" method="post" enctype="multipart/form-data"><input type="text" name="message" placeholder="Say something"> <input name="action" type="hidden" value="send" required /><input type="submit" class="send" name="send" value=""/></form></div>
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>
      <script type="text/javascript" src="js/initialize.js"></script>
      <script>$('#chat-scroll').animate({
      scrollTop: $('#chat-scroll').get(0).scrollHeight}, 2000);</script>
</body>
</html>
