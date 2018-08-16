<?php
if (isset($_POST['submit'])) {
	include 'connect_db.php';
	 // $target = "images/".basename($_FILES['item_image']['name']);
	 $item_name=$_POST['item_name'];
	 // $item_image=$_FILES['item_image']['name'];
	 $item_description=$_POST['item_description']; 
	 $item_price=$_POST['item_price'];
	 $item_category=$_POST['item_category'];
	 $seller_name=$_POST['seller_name']; 
	 $seller_image=$_POST['seller_imagephoto']; 
	 $seller_location=$_POST['seller_location']; 
	 $seller_phone=$_POST['seller_phone'];
	 $item_condition=$_POST['item_condition'];
	 $account_id = $_POST['account_id'];
	 $post_left = $_POST['post_left'];
	 $addrecord="INSERT INTO items (item_id, item_name, item_description,item_condition,item_price, item_category, seller_name, seller_image, seller_location, seller_phone,seller_id, date_posted, approved_to_post) VALUES (NULL,'$item_name','$item_description','$item_condition','$item_price','$item_category','$seller_name','$seller_image','$seller_location','$seller_phone','$account_id', NOW(), 'Pending')";
	// move_uploaded_file($_FILES['item_image']['tmp_name'], $target);
	$j = 0;     // Variable for indexing uploaded image.
	// $target_path = "images/".basename($_FILES['file']['name'][$i]);    // Declaring Path for uploaded images.
	for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
	// Loop to get individual element from the array
	$image=$_FILES['file']['name'][$i];
	mysqli_query($connect,"INSERT INTO  images (file_name,seller_id,item_name) VALUES ('$image','$account_id','$item_name')");
	$validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
	$ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
	$file_extension = end($ext); // Store extensions in the variable.
	$target_path = "images/item_images/".basename($_FILES['file']['name'][$i]);    // Set the target path with a new name of image.
	$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
	// if (($_FILES["file"]["size"][$i] < 100000)     // Approx. 100kb files can be uploaded.
	// && in_array($file_extension, $validextensions)) {
	if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
	// echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
	} else {     //  If File Was Not Moved.
	// echo $j. ').<span id="error">please try again!.</span><br/><br/>';
	}
	// } 
	// else {     //   If File Size And File Type Was Incorrect.
	// echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
	// }
	}
	$left = $post_left-1;
	$post_update = "UPDATE account SET post_left = '".$left."' WHERE account_id='".$account_id."'";
	if ($post_left > 0) {
		if(mysqli_query($connect, $addrecord))
		{	
			mysqli_query($connect, $post_update);
			$message = "Success.";
		    echo "<script type='text/javascript'>alert('$message');window.location.href='userpage.php?account_id=$account_id';</script>";
		}
		else
		{
			$message = "Error:".$addrecord."<br>".mysqli_error($connect).".";
		    echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	else{
		$message = "You have no post balance left. Please reload to be able to post again. Thank you!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	mysqli_close($connect);
}
?>
<script type='text/javascript'>window.location.href='userpage.php?account_id=<?php echo $account_id ?>';</script>