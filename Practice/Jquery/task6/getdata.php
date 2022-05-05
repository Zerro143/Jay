<?php
    require_once "conn.php";   
    $sql = "SELECT * FROM apidata";
    
   
    $result = $conn->query($sql); // output data of each row
    
    while($row = $result->fetch_assoc()){
        $data[] =$row;
    }
    echo json_encode($data)
  ?> 
   
 
  

