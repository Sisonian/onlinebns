<?php
session_start();
include 'connect_db.php';
if(isset($_POST['action']))
{          
  if($_POST['action']=="send")
    {
    	$id = $_POST['account_id'];
		$subject = $_POST['chat_subject'];
		$subject_name = $_POST['chat_subject_name'];
		$item_id = $_POST['item_id'];
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

        $chat_subject="$account_email$account_email2$subject";
        $message= mysqli_real_escape_string($connect,$_POST['textMessage']);
        if ($message=="") {}else{
		$addaccount="INSERT INTO chat (sender_email,sender_name,sender_image,sender_message,receiver_email,receiver_name,receiver_image,chat_time,subject_id,subject_name,chat_subject) VALUES ('$account_email2','$account_fname2 $account_lname2','$account_image2','$message','$account_email','$account_fname $account_lname','$account_image',NOW(),'$subject','$subject_name','$chat_subject')";
        mysqli_query($connect, $addaccount);
        // $redirecttoprevpage = "viewitem.php?item_id='$item_id'";
        // echo "<script type='text/javascript'>var x='viewitem.php?item_id=$item_id';window.location.assign(x);</script>";
        }
        
    } 
}
?>