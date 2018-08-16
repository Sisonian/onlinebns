<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	div.hidden{
		display: all;
		 size: 100% 100%;
	}
	@media print and (color) {
   * {
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
   }
}
@page {
        size: auto;
        /* auto is the initial value */
        margin: 0mm;
        /* this affects the margin in the printer settings */
    }
    
    html {
        background-color: #FFFFFF;
        margin: 0px;
        /* this affects the margin on the html before sending to printer */
    }

</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<div id="print" class="hidden">
<div style="height: 950px; width: 100%; background-color: rgba(236, 240, 241,0.3); padding: 15px;">
<center><div style="background-color: #2C3E50; padding: 10px;"><img src="images/abc.png" width="100" height="100"></div></center>
<center><h1 style="color: #333333;
font-family: ‘Lucida Console’, Monaco, monospace;">Data Analytics Report</h1></center>
<center>
    <div class="w3-container"><br>
  <table class="w3-bordered w3-table">
  <tr><div style="background: rgba(52, 73, 94,0.9);margin:0px;padding: 1px;border-top-left-radius:10px ;border-top-right-radius: 10px;"><h2 style="color: white;">Top Rated Sellers</h2></div></tr>
  <div style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Rating</th>
    </tr>
<tr>
      <td>Jill</td>
      <td>Smith</td>
      <td>50</td>
    </tr>
    <tr>
      <td>Eve</td>
      <td>Jackson</td>
      <td>94</td>
    </tr>
    <tr>
      <td>Adam</td>
      <td>Johnson</td>
      <td>67</td>
    </tr>
    </div>
  </table><br><br>
  <table class="w3-bordered w3-table">
  <tr><div style="background: rgba(52, 73, 94,0.9);margin:0px;padding: 1px;border-top-left-radius:10px ;border-top-right-radius: 10px;"><h2 style="color: white;">Number of Posts Per Category</h2></div></tr>
  <div style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
    <tr>
      <th>Category</th>
      <th>Number of Posts</th>
    </tr>
<tr>
      <td>Jill</td>
      <td>Smith</td>
    </tr>
    <tr>
      <td>Eve</td>
      <td>Jackson</td>
    </tr>
    <tr>
      <td>Adam</td>
      <td>Johnson</td>
    </tr>
    </div>
  </table>
</div>
</center>
</div>
</div>
    <center><input type="button" onclick="printDiv('print')" value="Print" /></center>
    <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    </script>
</body>
</html>
