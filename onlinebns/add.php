<?php
if (isset($_POST['submit'])) {
	include 'connect_db.php';
	 $target = "images/".basename($_FILES['item_image']['name']);
	 $item_name=$_POST['item_name'];
	 $item_image=$_FILES['item_image']['name'];
	 $item_description=$_POST['item_description']; 
	 $item_price=$_POST['item_price'];
	 $item_category=$_POST['item_category'];
	 $seller_name=$_POST['seller_name']; 
	 $seller_image=$_POST['seller_imagephoto']; 
	 $seller_location=$_POST['seller_location']; 
	 $seller_phone=$_POST['seller_phone'];
	 $item_condition=$_POST['item_condition'];
	 $account_id = $_POST['account_id'];
	 $addrecord="INSERT INTO items (item_id, item_name, item_image, item_description,item_condition,item_price, item_category, seller_name, seller_image, seller_location, seller_phone, date_posted, approved_to_post) VALUES (NULL,'$item_name','$item_image','$item_description','$item_condition','$item_price','$item_category','$seller_name','$seller_image','$seller_location','$seller_phone', NOW(), 'Pending')";
	move_uploaded_file($_FILES['item_image']['tmp_name'], $target);
	if(mysqli_query($connect, $addrecord))
	{
		$message = "Success.";
	    echo "<script type='text/javascript'>alert('$message');window.location.href='userpage.php?account_id=$account_id';</script>";
	}
	else
	{
		$message = "Error:".$addrecord."<br>".mysqli_error($connect).".";
	             echo "<script type='text/javascript'>alert('$message');</script>";
	}
	mysqli_close($connect);
}
?>