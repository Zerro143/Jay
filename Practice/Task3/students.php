<?php include 'conn.php';?>

<style>
.col-2{
  text-align: center;
  margin-top: 6px;
}
.col-1{
  text-align: center;
  margin-top: 6px;
}



</style>

<?php $sql = "SELECT * FROM `student`;"; 
    $result = $conn->query($sql); 
        
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
        }
      } else {
        echo "0 results";
      }
     
    
    
?>
    

<html>
    <head>
        <title>Student Grid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    </head>
</html>
<body>
<div class="container">
     
  <div class="row">
        <div class="col-1">
            Id
        </div>
        <div class="col-1">
            First Name
        </div>
        <div class="col-2">
            Last Name
        </div>
        <div class="col-1">
             Birth Date
        </div>
        <div class="col-1">
             Mobile No.
        </div>
        <div class="col-2">
             Email
        </div>
        <div class="col-2">
             Course
        </div>
        <div class="col-1">
             Created Date
        </div>
        <div class="col-1">
             Updated Date
        </div>
        
         
    </div>
    <div class="row">
        <div class="col-1">
         
        </div>
        <div class="col-2">
        
        
        </div>
        <div class="col-1">
             Birth Date
        </div>
        <div class="col-1">
             Mobile No.
        </div>
        <div class="col-2">
             Email
        </div>
        <div class="col-2">
             Course
        </div>
        <div class="col-1">
             Created Date
        </div>
        <div class="col-1">
             Updated Date
        </div>
        
         
    </div>
  </div>
  
</div>
</body>