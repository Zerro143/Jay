<?php
    require_once "conn.php";   
    $sql = "SELECT * FROM apidata";
    
   
    $result = $conn->query($sql); // output data of each row
    //echo $rows[] =$result->fetch_assoc();
    while($row = $result->fetch_assoc()){
        $data[] =$row;
    }
    echo json_encode($data)
  ?> 
   
 
  

