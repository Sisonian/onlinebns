<?php
include 'connect_db.php';
$item_id = $_REQUEST['item_id'];
$account_id = $_REQUEST['account_id'];
$item_sql = "DELETE FROM items WHERE item_id = '$item_id'";
if (mysqli_query($connect, $item_sql)) 
{
		$message = "Post Successfully Deleted.";
	    echo "<script type='text/javascript'>alert('$message');window.location.href='userpage.php?account_id=$account_id';</script>";
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
?>