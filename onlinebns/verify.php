<?php
include 'connect_db.php';
$account_email=$_REQUEST['account_email'];

$query="UPDATE account SET account_verified = '1' WHERE account_email='$account_email'";
if(mysqli_query($connect,$query)){
	$message="Your account has been successfully verified and active!";
	$redirecttoprevpage="block.php";
	echo "<script type='text/javascript'>alert('$message');window.location.assign('$redirecttoprevpage')</script>";
}
else
{
	$message="Fail";
	$redirecttoprevpage="block.php";
	echo "<script type='text/javascript'>alert('$message');window.location.assign('$redirecttoprevpage');";
}
?>