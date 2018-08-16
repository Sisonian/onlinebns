<?php
session_start();
unset($_SESSION['chat_sender']);
unset($_SESSION['chat_subject_number']);
unset($_SESSION['chat_subject_name']);
$account_id=$_REQUEST['account_id'];
echo "<script>window.location.assign('chatpage.php?account_id=$account_id');</script>";
?>