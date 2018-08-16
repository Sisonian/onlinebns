<?php
session_start();
$sender = $_REQUEST['sender'];
$subject = $_REQUEST['chat_subject_number'];
$subject_name = $_REQUEST['chat_subject'];
$account_id=$_REQUEST['account_id'];
$_SESSION['chat_sender'] = $sender;
$_SESSION['chat_subject_number'] = $subject;
$_SESSION['chat_subject_name'] = $subject_name;
header("location:chatpage.php?account_id=$account_id");
?>