<?php
session_start();// Starting Session
//making a connection 
define('SERVER_SESSION', 'localhost');
define('USERNAME_SESSION', 'root');
define('PASSWORD_SESSION', '');
define('DB_SESSION', 'buy');
$connect=mysqli_connect(SERVER_SESSION,USERNAME_SESSION,PASSWORD_SESSION,DB_SESSION);
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($connect,"SELECT account_email FROM account WHERE account_email ='".$user_check."'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['account_email'];
if(!isset($login_session)){
mysqli_close($connect); // Closing Connection

$location = 'block.php';
echo '<META http-equiv="refresh" content="0;URL='.$location.'">';

}

?>