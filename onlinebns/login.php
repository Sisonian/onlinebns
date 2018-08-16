<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if(isset($_POST['action']))
{          
    if($_POST['action']=="login")
    {
        include 'connect_db.php';
        
        $email = mysqli_real_escape_string($connect,$_POST['email']);
        $password = md5(mysqli_real_escape_string($connect,$_POST['password']));
        $userSQL = mysqli_query($connect,"select * from account where account_email='".$email."' and account_password='".$password."' and account_type='user' and account_verified = 1");
        $userSQL2 = mysqli_query($connect,"select * from account where account_email='".$email."' and account_password='".$password."' and account_type='user' and account_verified = 0");
        $userSQL3 = mysqli_query($connect,"select * from account where account_email='".$email."' and account_password='".$password."' and account_type='user'");
        $userResults = mysqli_fetch_array($userSQL);
        $userid=$userResults[0];
        $adminSQL = mysqli_query($connect,"select * from account where account_email='".$email."' and account_password='".$password."' and account_type='admin'");
        $adminResults = mysqli_fetch_array($adminSQL, MYSQL_NUM);

        $rows = mysqli_num_rows($userSQL);
        $rows2 = mysqli_num_rows($userSQL2);
        $rows3 = mysqli_num_rows($userSQL3);
        if ($rows == 1) {
            $_SESSION['login_user'] = $email; // Initializing Session
            header("location:userpage.php?account_id=$userid"); // Redirecting To Other Page
        }         
        if ($rows3 == 0)
        {
             $message = "Username and/or Password incorrect.Try again.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        if(count($adminResults)>=1)
        {
            $_SESSION['login_admin'] = $email;
            header("location:adminpage.php?account_id=$userid");
        }
        if ($rows2==1){
             $message = "Please verify your account and Try again.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        mysqli_close($connect); // Closing Connection
    }
}
?>