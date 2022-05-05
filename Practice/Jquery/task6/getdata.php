<?php
    require_once "conn.php";   
    $sql = "SELECT * FROM apidata";
    
   
    $result = $conn->query($sql); // output data of each row
    while($row = $result->fetch_assoc()):
  ?> 
    <div class="row justify-content-center" id="row">
      <tr>
          
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['api'];?></td>
          <td><?php echo $row['description'];?></td>
          <td><?php echo $row['auth'];?></td>
          <td><?php echo $row['https'];?></td>
          <td><?php echo $row['cors'];?></td>
          <td><?php echo $row['link'];?></td>
          <td><?php echo $row['cat'];?></td>
        </tr>
    </div>  
  <?php endwhile;?>
  
?>
