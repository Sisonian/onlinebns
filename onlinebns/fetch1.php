<?php
session_start();
//fetch.php;
if(isset($_POST["view"]))
{
 include("connect_db.php");
 $query = "SELECT * FROM chat ORDER BY chat_time DESC LIMIT 5";
 $result = mysqli_query($connect, $query);
 $output = "";
 // if(mysqli_num_rows($result) > 0)
 // {
 //  while($row = mysqli_fetch_array($result))
 //  {
 //   $output .= '
 //   <li>
 //    <a href="#">
 //     <strong>'.$row["item_name"].'</strong><br />
 //     <small><em>'.$row["item_name"].'</em></small>
 //    </a>
 //   </li>
 //   <li class="divider"></li>
 //   ';
 //  }
 // }
 // else
 // {
 //  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 // }
 $b=$_SESSION['login_user'];
 $query_1 = "SELECT * FROM chat WHERE receiver_email='$b' and notification=0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $fetch = mysqli_fetch_array($result_1);
 $a=$fetch[5];
 if ($a=$b) {
   $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
 }
 
?>