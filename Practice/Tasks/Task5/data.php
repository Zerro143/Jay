<?php  
include 'conn.php';?>

<style>
    * {
  box-sizing: border-box;
  font-family:Apple Chancery, cursive;
}


</style>


<html>
    <head>
        <title>Api Data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        
    </head>

  <body>

        
    <div class="container">

        <div class="row justify-content-center">
          <table class="table datatable" id = "datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>API</th>
                  <th>Description</th>
                  <th>Auth</th>
                  <th>HTTPS</th>
                  <th>CORS</th>
                  <th>LINKS</th>
                  <th>Catag</th>
                
                </tr>
              </thead>
               
                <?php
                    $b = 25;   
                    $c = 1;
                    $sql = "SELECT * FROM apidata WHERE id BETWEEN $c AND $b"; 
                    $result = $conn->query($sql); 

                  // output data of each row
                  while($row = $result->fetch_assoc()):?> 
                  <div class="row" justify-content-center>
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
            </table>

                          
        </div>

       
        <?php 

          $sql = "SELECT * FROM apidata";
          //echo $sql;
          $result = mysqli_query($conn, $sql);
          $a = $result->num_rows;
          $x = $a/25;
          for ($i = 0; $i <= $x; $i++ ){
            $q = $i+1 ;
            echo "<button id = '$q' value = '$q'>$q</button>";
          }          

          $x = $a/$b;
        ?>
    </div>
    
  </body>
</html>