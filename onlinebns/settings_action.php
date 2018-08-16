<?php
include 'connect_db.php';
$account_id = $_REQUEST['account_id'];
$account_sql = "SELECT * FROM account WHERE account_id = '$account_id'";
$account_results = mysqli_query($connect, $account_sql) or die("Error: ".mysqli_error($connect));
$row = mysqli_fetch_array($account_results, MYSQL_NUM);
	$account_id = $row[0];

	 $email      = mysqli_real_escape_string($connect,$_POST['email']);
     $fname      = mysqli_real_escape_string($connect,$_POST['fname']);
     $lname      = mysqli_real_escape_string($connect,$_POST['lname']);
     $number      = mysqli_real_escape_string($connect,$_POST['number']);
     $location = mysqli_real_escape_string($connect,$_POST['location']); 




$sql = "UPDATE account SET account_firstname = '$fname', account_lastname = '$lname', account_email = '$email', account_phone = '$number', account_location = '$location' WHERE account_id = '$account_id' ";


if (mysqli_query($connect, $sql)) 
{
		$message = "Success.";
	    echo "<script type='text/javascript'>alert('$message');window.location.href='settings.php?account_id=$account_id';</script>";
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
?>