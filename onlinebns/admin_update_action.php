<?php
include 'connect_db.php';
$item_id = $_REQUEST['item_id'];
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


if (mysqli_query($connect, $sql)) 
{
		$message = "Success.";
	    echo "<script type='text/javascript'>alert('$message');window.location.href='adminviewitem.php?item_id=$item_id';</script>";
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
?>