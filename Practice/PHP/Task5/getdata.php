  

<?php

//echo $_POST['sel'];
    if (isset($_POST['sel'])){
        $per_page_record = $_POST['sel']; 
    }
    
    else{$per_page_record = 10;}// Number of entries to show in a page.   
    // Look for a GET variable page if not found default is 1. 
?>

<?php  
      
    // Import the file where we defined the connection to Database.     
    require_once "conn.php";   
          
    
    if (isset($_POST['page'])) {    
        $page  = $_POST['page'];    
    }    
    else {    
      $page=1;    
    } 
    //echo $page;
    $start_from = ($page-1) * $per_page_record;   
    
        
        
    
?>  


<?php
                   
    $sql = "SELECT * FROM apidata LIMIT $start_from, $per_page_record";   
    //echo $sql;
    $result = $conn->query($sql); // output data of each row
    while($row = $result->fetch_assoc()):?> 
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


  
  
      <div class="inline">   
        <select onChange=selectChange(this.value)>
            <option value='5'>5</option>
            <option value='10'>10</option>
            <option value='25'>25</option>
        </select>
      <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
      placeholder="<?php echo $page."/".$total_pages; ?>" required>   
      <button onClick="go2Page();">Go</button>   
     </div>    
    </div>   
  </div>  
