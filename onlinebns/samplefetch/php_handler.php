<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'buy');
$connect=mysqli_connect(SERVER,USERNAME,PASSWORD,DB);
$result=mysqli_query($connect,"SELECT * FROM account");
$a=$_REQUEST['a'];
while($data = mysqli_fetch_array($result))
{   
    echo "<tr>";
    echo "<td align=center>$data[0]$a</td>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center>$data[2]</td>";
    echo "<td align=center>$data[3]</td>";
    echo "<td align=center>$data[4]</td>";
    echo "</tr>";
}
?>