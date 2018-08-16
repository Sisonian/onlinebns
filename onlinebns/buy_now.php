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
$buyer=$_SESSION['login_user'];
$buyer_sql="SELECT * FROM account WHERE account_email='".$buyer."'";
$buyer_result=mysqli_query($connect,$buyer_sql);
$buyer_fetch=mysqli_fetch_array($buyer_result);
$buyer_name="$buyer_fetch[1] $buyer_fetch[2]";
$buyer_email="$buyer_fetch[3]";
?>
            <div class="btn">
                <form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1' id="paypal">
                    <input type='hidden' name='business' value='<?php echo $paypal_id;?>'>
                    <input type='hidden' name='cmd' value='_xclick'>

                    <input type='hidden' name='item_name' value='<?php echo $product_name;?>'>
                    <input type='hidden' name='item_number' value='<?php echo $product_id;?>'>
                    <input type='hidden' name='amount' value='<?php echo $product_price;?>'>

                    <input type='hidden' name='no_shipping' value='1'>
                    <input type='hidden' name='currency_code' value='PHP'>
                    <input type='hidden' name='handling' value='0'>
                    <input type='hidden' name='cancel_return' value='http://localhost/onlinebns/index.php'>
                    <input type='hidden' name='return' value='http://localhost/onlinebns/success.php?product_id=<?php echo $product_id;?>&product_name=<?php echo $product_name;?>&product_price=<?php echo $product_price;?>&seller_name=<?php echo $seller_name;?>&seller_email=<?php echo $seller_email;?>&buyer_name=<?php echo $buyer_name;?>&buyer_email=<?php echo $buyer_email;?>'>

                    <!-- <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"> -->
                </form> 
            </div>
<script type="text/javascript">
    document.getElementById("paypal").submit();
</script>
