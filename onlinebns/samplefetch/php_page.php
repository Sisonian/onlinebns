<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'buy');
$connect=mysqli_connect(SERVER,USERNAME,PASSWORD,DB);
$result=mysqli_query($connect,"SELECT * FROM account");
while($data = mysqli_fetch_array($result))
{   
    $ian= "
    <tr>
    <td align=center>$data[0]</td>
    <td align=center>$data[1]</td>
    <td align=center>$data[2]</td>
    <td align=center>$data[3]</td>
    <td align=center>$data[4]</td>
    </tr>";
}
?>
<html>
 <script type="text/javascript" src="../js/jQuery-3.2.1.js"> </script>

 <script type="text/javascript">

 $(document).ready(function() {

    // $("#display").click(function() {                

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "php_handler.php?a=1",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });
// });
});

</script>

<body>
<h3 align="center">Manage Student Details</h3>
<table border="1" align="center">
   <tr>
       <td> <input type="button" id="display" value="Display All Data" /> </td>
   </tr>
</table>
<?php
echo "<table border='1' >
<tr>
<td align=center> <b>Roll No</b></td>
<td align=center><b>Name</b></td>
<td align=center><b>Address</b></td>
<td align=center><b>Stream</b></td></td>
<td align=center><b>Status</b></td>";
?>
<div id="responsecontainer" align="center">

</div>
echo "</table>";
</body>
</html>