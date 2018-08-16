<?php
require('session.php');
include 'connect_db.php';
$receiver_email=$_REQUEST['receiveremail'];
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
<!DOCTYPE html>
<html>
<head>
<title>SafeBNS &mdash; The Country's Newest Buy and Sell Website</title>
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="inbox.css">
</head>
<body>
  <div class='container'>
    <div class='container_ui'>
      <div class='container_ui__heading'>
        <div class='header_icon'>
         <a href="userpage.php?account_id='<?php echo"$user_id";?>'"><img src='images/icons/back_icon2.png' style="width:35px; height:35px;"></a> 
        </div>
        <h1>
          INBOX
        </h1>
      </div>
      <?php
      $numResults = mysqli_num_rows($inboxresults);
      if (!$numResults)
      {
        echo "<center><h1>There's no Messages</h1></center>";
      }
      else
      {
      while($row=mysqli_fetch_array($inboxresults)) 
      {
            $sender = $row[1];
            $seller_image = $row[3];
            $chat_subject=$row[11];
            $chat_subject_number=$row[10];
            ?>
            <a href="chat2.php?sender=<?php echo"$sender";?> && chat_subject_number=<?php echo"$chat_subject_number";?> && chat_subject=<?php echo"$chat_subject";?>" style="text-decoration:none;">
            <?php
            echo"
            <div>
            <input id='message-1' type='checkbox'>
            <label for='message-1' href='#move' style='border-bottom:5px solid white;'>
              <div class='container_ui__item'>
                <div class='face'>
                  <img src='images/$seller_image'>
                </div>
                <h2>
                  $sender
                </h2>
                <h3>SUBJECT: $chat_subject</h3>
                </a>
              </div>
            </label>
            </div>";
      }
    }


      ?>
    </div>
  </div>
</body>
</html>


