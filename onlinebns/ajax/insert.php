<?php
//insert.php
if(isset($_POST["subject"]))
{
 include("connect.php");
 $subject = mysqli_real_escape_string($connect, $_POST["subject"]);
 $comment = mysqli_real_escape_string($connect, $_POST["comment"]);
 $query = "
 INSERT INTO chat(receiver_name,chat_subject)
 VALUES ('$subject', '$comment')
 ";
 mysqli_query($connect, $query);
}
?>