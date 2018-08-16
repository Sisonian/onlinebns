<?php
//setting to header to json
header('Content-Type: application/json');

//Connection
require_once 'connect.php';

      //query to get data from table
      $sql = sprintf("SELECT account_email,seller_rating FROM account WHERE account_type='user' GROUP BY account_email ORDER BY seller_rating DESC LIMIT 3");

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
