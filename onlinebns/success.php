 <!DOCTYPE html>
 <html>
 <head>
<title>SafeBNS &mdash; The Country's Newest Buy and Sell Website</title>
<link rel="shortcut icon" href="images/abc.png" type="image/x-icon">
 	<link rel="stylesheet" href="css/iziToast.min.css">
  <script src="js/iziToast.min.js" type="text/javascript"></script>
 </head>
<body>
		<?php
			include('connect_db.php');
			$product_id = $_REQUEST['product_id'];
			$product_name = $_REQUEST['product_name'];
			$product_price = $_REQUEST['product_price'];
			$seller_name = $_REQUEST['seller_name'];
			$seller_email = $_REQUEST['seller_email'];			
			$buyer_name = $_REQUEST['buyer_name'];
			$buyer_email = $_REQUEST['buyer_email'];
			$transaction_sql = "INSERT INTO transaction (item_id,item_name,item_price,seller_name,seller_email,buyer_name,buyer_email,transaction_date) VALUES ('$product_id','$product_name','$product_price','$seller_name','$seller_email','$buyer_name','$buyer_email',NOW())";
			$account_income_query = "SELECT * FROM account WHERE account_email = '".$seller_email."'";
			$account_income_result = mysqli_query($connect,$account_income_query);
			$account_income_fetch=mysqli_fetch_array($account_income_result);
			$account_income = $account_income_fetch[14];
			$account_income_sum = $account_income + $product_price;
			mysqli_query($connect,"UPDATE account SET account_income='".$account_income_sum."' WHERE account_email = '".$seller_email."'");
			if(mysqli_query($connect,$transaction_sql) and mysqli_query($connect,"UPDATE items SET approved_to_post='Sold' WHERE item_id = '$product_id'")){
		?>
		<script type="text/javascript">
			        iziToast.success({
		                title: 'Success',
		                message: 'Your transaction is done',
		                position: 'center',
		                onClose: function(){
		                    window.location.href='index.php';
		                }
		            });
		</script>
		<?php
		}
		?>
 </body>
 </html> 