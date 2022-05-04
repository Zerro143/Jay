  

<?php
require_once "conn.php";   
//echo $_POST['sel'];
    if (isset($_POST['sel'])){
        $per_page_record = $_POST['sel']; 
    }
    
    else{$per_page_record = 10;}// Number of entries to show in a page.   
    // Look for a GET variable page if not found default is 1. 
?>

<?php  
      
    // Import the file where we defined the connection to Database.     
    
    $sql = "SELECT * FROM apidata";
    //echo $sql;
    $result = mysqli_query($conn, $sql);
    $a = $result->num_rows;
 
    
    if (isset($_POST['page'])) {    
        $page  = $_POST['page'];    
    }    
    else {    
      $page=1;    
    } 
    //echo $page;

    $tt = ceil($a/$per_page_record)
   
    
        
        
    
?>  
<input type="hidden" id="totalRecords" value ="<?php echo $a; ?>">
<input type="hidden" id="tt" value ="<?php echo $tt; ?>">
<input type="hidden" id="page" value ="<?php echo $page; ?>">
<input type="hidden" id="records" value ="<?php echo $per_page_record; ?>">
<?php
  
    
  $start_from = ($page-1) * $per_page_record;                  
  $sql = "SELECT * FROM apidata LIMIT $start_from, $per_page_record";   
  
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

