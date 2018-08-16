<?php 
	include 'connect_db.php';
	 // $target = "images/".basename($_FILES['item_image']['name']);
	 $rating=$_REQUEST['a'];
	 // $item_image=$_FILES['item_image']['name'];
	 $account=$_REQUEST['b']; 
	 $item_id=$_REQUEST['id'];
	 $addend="SELECT * FROM account WHERE account_id='$account'";
	 $a=mysqli_query($connect,$addend);
	 $b=mysqli_fetch_array($a);
	 $c=$b[13]+1;
	 $d=$b[12]+$rating;
	 $e=$d/$c;
	 $addrecord="UPDATE account SET seller_rating='$e', votes_sum='$d' , number_of_votes='$c' WHERE account_id='$account'";
	if(mysqli_query($connect, $addrecord))
	{
		$message = "You Rated Me: $rating";
	    echo "<script type='text/javascript'>alert('$message');window.location.href='viewitem.php?item_id=$item_id';</script>";
	}
	else
	{
		$message = "Error:".$addrecord."<br>".mysqli_error($connect).".";
	    echo "<script type='text/javascript'>alert('$message');</script>";
	}
	mysqli_close($connect);
?>