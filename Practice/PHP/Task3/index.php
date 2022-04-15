<?php  
session_start();
include 'conn.php';?>
<html>
    <head>

    </head>
    <body>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <section id="header">
          <?php   include 'nav.php';?>
        </section>
        <div class="container" >
           
            
            <button class="btn-xs btn-primary" onclick="window.open('record.php','popup','width=600,height=600'); return false;">Create Student Record</button>
            <button class="btn-xs btn-primary" onclick="location.href='students.php'">Show All Students Record</button>
            <?php /*
            <button class="btn-xs btn-primary" onclick="location.href='course.php'">Show Course</button>*/?>
        </div>            
        <div class="container">            
                   
           
            <div class="row justify-content-center">
              <table class="table">
                <thead>
                  <tr>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th colspan="4">Action</th>
                  </tr>
                </thead>
                  <?php $sql = "SELECT * FROM `student`;"; 
                      $result = $conn->query($sql); 
                      // output data of each row
                    while($row = $result->fetch_assoc()):?> 
                    <div class="row" justify-content-center>
                      <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td>   
                          <a class="btn btn-info" onclick="window.open('ups.php?edit=<?php echo $row['id'];?>','popup','width=600,height=600'); return false;">Edit</a>
                          <a href="ups.php?delete=<?php echo $row['id'];?>"class="btn btn-danger">Delete</a>
                        </td>
                    
                      </tr>
                    </div>  
                  <?php endwhile;?>
              </table>

            </div>
        </div>
        
        
    </body>
</html>


