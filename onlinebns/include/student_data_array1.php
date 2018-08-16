<?php
//setting to header to json
header('Content-Type: application/json');

//Connection
require_once 'connect.php';

      //query to get data from table
      $sql = sprintf("SELECT item_category,count(item_category) as votes_sum FROM items GROUP BY item_category ORDER BY votes_sum DESC");

      //execute query
      $result = $conn->query($sql);

      //loop through the returned data
      $data = array();
      foreach ($result as $row){
          $data[] = $row;
      }

      //from memory associated with result
      $result->close();

      //close connection
      $conn->close();

//now print data
print json_encode($data);
?>
