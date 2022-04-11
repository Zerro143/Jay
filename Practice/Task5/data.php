<?php  
include 'conn.php';?>

<style>
    * {
  box-sizing: border-box;
  font-family:Apple Chancery, cursive;
}

.col-2{
  text-align: center;
  margin-top: 6px;
  
}
.col-1{
  text-align: center;
  margin-top: 6px;
}
.form-popup {
    display: none;
    position: relative;
    right: 15px;
   
    z-index: 9;
  }
  .form-container {
    max-width: 400px;
   
    text-align: center;
    
  }
  .form-container input[type=text] {
    width: 100%;
    padding: 5px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }
  

</style>


<html>
    <head>
        <title>Api Data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>

  <body>
       
    <div class="container">

        <div class="row justify-content-center">
            <table class="table">
              <thead>
                <tr>
                  <th>API</th>
                  <th>Description</th>
                  <th>Auth</th>
                  <th>HTTPS</th>
                  <th>CORS</th>
                  <th>LINKS</th>
                  <th>Catag</th>
                
                </tr>
              </thead>
                <?php $sql = "SELECT * FROM apidata"; 
                    $result = $conn->query($sql); 

                  // output data of each row
                  while($row = $result->fetch_assoc()):?> 
                  <div class="row" justify-content-center>
                    <tr>

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
        
                          
    </div>
    
  </body>
</html>