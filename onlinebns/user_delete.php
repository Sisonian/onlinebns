<?php
include 'connect_db.php';
$item_id = $_REQUEST['item_id'];
$id = $_REQUEST['account_id'];
$item="SELECT * FROM items WHERE item_id='$item_id'";
$items=mysqli_query($connect,$item);
$row = mysqli_fetch_array($items, MYSQL_NUM);
$item_name=$row[1];
?>
<script type='text/javascript'>
	var prompt = confirm('Are you sure you want to delete this post?<?php echo "$id $item_name";?>');
	if (prompt==true) 
	{
		var redirecttoprevpage = "user_delete_action.php?item_id=<?php echo"$item_id"; ?>&&account_id=<?php echo "$id"; ?>&item_name=<?php echo"$item_name" ?>";
		window.location.assign(redirecttoprevpage);
	}
	if (prompt==false)
	{
		var message = "Post Successfully not Deleted";
		var redirecttoprevpage2 = "<?php echo "user_view_item.php?item_id=$item_id" ?>";
		window.location.assign(redirecttoprevpage2);
	}

</script>