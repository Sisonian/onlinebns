<?php
require'session.php';
include('connect_db.php');
$product_id=$_REQUEST['product_id'];
$product_name=$_REQUEST['product_name'];
$product_price=$_REQUEST['product_price'];
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
$paypal_id=$_REQUEST['seller_email'];  // sriniv_1293527277_biz@inbox.com

$seller_sql="SELECT * FROM account where account_email='".$paypal_id."'";
$seller_result=mysqli_query($connect,$seller_sql);
$seller_fetch=mysqli_fetch_array($seller_result);
$seller_name="$seller_fetch[1] $seller_fetch[2]";
$seller_email = "$seller_fetch[3]";
$seller_phone = "$seller_fetch[5]";
$seller_image = "$seller_fetch[8]";
$buyer=$_SESSION['login_user'];
$buyer_sql="SELECT * FROM account WHERE account_email='".$buyer."'";
$buyer_result=mysqli_query($connect,$buyer_sql);
$buyer_fetch=mysqli_fetch_array($buyer_result);
$buyer_name="$buyer_fetch[1] $buyer_fetch[2]";
$buyer_email="$buyer_fetch[3]";
$buyer_phone="$buyer_fetch[5]";
$buyer_image="$buyer_fetch[8]";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/receipt.css">
</head>
<body>

</body>
</html>
<div id="invoiceholder">
  <div id="invoice" class="effect2">
    
    <div id="invoice-top">
      <div class="logo" style="background: url(<?php echo"'images/$seller_image'"?>);float: left;height: 60px;width: 60px;background-size: 60px 60px;border-radius: 50px;"></div>
      <div class="info">
        <h2><?php echo"$seller_name";?></h2>
        <p> <?php echo"$seller_email"; ?> </br>
            <?php echo"$seller_phone"; ?>
        </p>
      </div><!--End Info-->
      <div class="title">
        <h1>Receipt #<?php echo" $product_id"; ?></h1>
        <p>Issued: <?php $a=date("m/d/Y"); echo "$a"; ?></br>

        </p>
      </div><!--End Title-->
    </div><!--End InvoiceTop-->


    
    <div id="invoice-mid">
      
      <div class="logo" style="background: url(<?php echo"'images/$buyer_image'"?>);float: left;height: 60px;width: 60px;background-size: 60px 60px;border-radius: 50px;"></div>
      <div class="info">
        <h2><?php echo"$buyer_name";?></h2>
        <p> <?php echo"$buyer_email"; ?> </br>
            <?php echo"$buyer_phone"; ?>
        </p>
      </div>

      <div id="project">
        <h2>Item Details</h2><br>
        <p><?php 
        echo "<b>Prooduct ID: </b> $product_id <br><br>";
        echo "<b>Prooduct Name: </b> $product_name <br><br>";
        echo "<b>Prooduct Price: </b> ₱ $product_price";

        ?></p>
      </div>   

    </div><!--End Invoice Mid-->
    
    <div id="invoice-bot">
      
      <div id="table">
        <table>
          <tr class="tabletitle">
            <td class="item"><h2>Item Name</h2></td>
            <td class="Hours"><h2>Date of Purchase</h2></td>
            <td class="Rate"><h2>Price</h2></td>
            <td class="subtotal"><h2>Payment</h2></td>
          </tr>
          
          <tr class="service">
            <td class="tableitem"><p class="itemtext"><?php echo "$product_name"; ?></p></td>
            <td class="tableitem"><p class="itemtext"><?php echo "$a"; ?></p></td>
            <td class="tableitem"><p class="itemtext"><?php echo "₱$product_price"; ?></p></td>
            <td class="tableitem"><p class="itemtext"><?php echo "₱$product_price"; ?></p></td>
          </tr>
            
          <tr class="tabletitle">
            <td></td>
            <td></td>
            <td class="Rate"><h2>Total</h2></td>
            <td class="payment"><h2><?php echo "₱$product_price"; ?></h2></td>
          </tr>
          
        </table>
      </div><!--End Table-->
      
    <form>
      <a href="buy_now.php?product_id=<?php echo $product_id; ?>&product_name=<?php echo $product_name; ?>&product_price= <?php echo $product_price; ?>&seller_email=<?php echo $paypal_id; ?>"><img src="images/paypal.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></a>
    </form>

      
      <div id="legalcopy">
        <p class="legal"><strong>Thank you for your business!</strong> 
        </p>
      </div>
      
    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
</div><!-- End Invoice Holder-->