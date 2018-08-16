<?php
include 'connect_db.php';
$item_id = $_REQUEST['item_id'];
$seller_id = $_REQUEST['seller_id'];
$item_nameeee = $_REQUEST['item_nam'];
$item_sql = "SELECT * FROM items WHERE item_id = '$item_id'";
$item_results = mysqli_query($connect, $item_sql) or die("Error: ".mysqli_error($connect));
$row = mysqli_fetch_array($item_results, MYSQL_NUM);
	$item_id = $row[0];

	 $item_name      = mysqli_real_escape_string($connect,$_POST['item_name']);
     $item_price      = mysqli_real_escape_string($connect,$_POST['item_price']);
     $item_condition      = mysqli_real_escape_string($connect,$_POST['item_condition']);
     $item_description      = mysqli_real_escape_string($connect,$_POST['item_description']);
     $item_category = mysqli_real_escape_string($connect,$_POST['item_category']); 




$sql = "UPDATE items SET item_name='$item_name',item_price='$item_price',item_category='$item_category',item_description='$item_description',item_condition='$item_condition' WHERE item_id = '$item_id' ";
$update = "UPDATE images SET item_name ='$item_name' WHERE seller_id = '$seller_id' and item_name='$item_nameeee'";
$update1 = mysqli_query($connect, $update);
$sql1 = mysqli_query($connect, $sql);
if ($update1) 
{
		$message = "Success.";
	    echo "<script type='text/javascript'>alert('$message');window.location.href='user_view_item.php?item_id=$item_id';</script>";
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
?>