<?php
include("session.php");
include("connect_db.php");
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
                <span><p style='font-size: 15px; color:#000;'>$sender_message</p><p style='font-size:11px; float:right; color:gray;opacity:0.5;'>$time</p></span>
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
}
else{
  echo "";
}
?>
      <script>
      $(document).ready(function(){

        });
      setTimeout(function(){
      $('#show').animate({
      scrollTop: $('#show').get(0).scrollHeight}, 1)
}, 1000);
      </script>