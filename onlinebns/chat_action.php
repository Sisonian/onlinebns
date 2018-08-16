<?php 
if(isset($_POST['action']))
{          
  if($_POST['action']=="send")
    {
        $chat_subject="$account_email$account_email2$subject";
        $message= mysqli_real_escape_string($connect,$_POST['textMessage']);
        $addaccount="INSERT INTO chat (sender_email,sender_name,sender_image,sender_message,receiver_email,receiver_name,receiver_image,chat_time,subject_id,subject_name,chat_subject) VALUES ('$account_email2','$account_fname2 $account_lname2','$account_image2','$message','$account_email','$account_fname $account_lname','$account_image',NOW(),'$subject','$subject_name','$chat_subject')";
          mysqli_query($connect, $addaccount);
          $redirecttoprevpage = "viewitem.php?item_id='$item_id'";
          echo "<script type='text/javascript'>window.location.href('$redirecttoprevpage');</script>";
    } 
}
?>
