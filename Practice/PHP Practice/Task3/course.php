<?php  
session_start();
include 'conn.php';
//$course="";
//if (isset($_GET['edit'])){
//  $id = $_GET['edit'];
//  $_SESSION['update']=true;
//  $sql = "SELECT * FROM course WHERE course_id = $id" or die("ERROR: Data no stored in database.".mysqli_error($conn)); 
//  $result = $conn->query($sql);  
//  $row = $result->fetch_array();
//  //$_SESSION['course']=$row['course'];
//  $course=$row['course'];    
//}
$id="";
mysqli_query($conn, $sql);
?>

<style>

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
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<html>
    <head>
        <title>Student Grid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    </head>

  <body>
    <section id="header">
      <?php   include 'nav.php';?>
    </section>
    <?php   include 'alert.php';?>
    <div class="container" >
               
                
      <button class="btn-xs btn-primary" onclick="window.open('record.php','popup','width=600,height=600'); return false;">Create Student Record</button>
      <button class="btn-xs btn-primary" onclick="location.href='students.php'">Show All Students Record</button>
      <?php /*
      <button class="btn-xs btn-primary" onclick="location.href='course.php'">Show Course</button>*/?>
    </div> 

    <div class="container">

      <div class="row" justify-content-center>
        <table class="table">
          <thead>
            <tr>
              <th>Course ID</th>
              <th>Course Name</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
            <?php $sql = "SELECT * FROM `course`;"; 
                $result = $conn->query($sql); 
                // output data of each row
              while($row = $result->fetch_assoc()):?> 
              <div class="row" justify-content-center>
                <tr>
                  <td><?php echo $row['course_id'];?></td>
                  <td><?php echo $row['course'];?></td>
                  <td>  
                    <a href="upcr.php?edit=<?php echo $row['course_id'];?>"class="btn btn-info">Edit</a>
                    <a href="upcr.php?delete=<?php echo $row['course_id'];?>"class="btn btn-danger">Delete</a>
                  </td>
              
                </tr>
              </div>  
            <?php endwhile;?>
        </table>

                
      </div>
      <div class="row">
        <div class="col-4">
          <?php //<a class="btn btn-primary" onclick="openForm()">Add</a>?>
          <div style="padding-left:20px">
            <div class="form" id="myForm">
              <form action="upcr.php" class="form-container" method="POSt">
                <input type="hidden" name="id" value="<?php echo $id = $_SESSION['cid'];?>">
                <div class="row">
                  <label for="course"><b>Couse Name</b></label>
                  <input type="text" placeholder="Enter course" name="course" value="<?php echo /*$course;*/$_SESSION['course'];  unset($_SESSION['course']);?>" >
                </div>
                <?php
                  if($_SESSION['crupdate']==true):
                ?>
                  <button type="submit" class="btn btn-info" placeholder="update" name="update">Update</button>
                <?php unset($_SESSION['crupdate']); ?>  
                <?php else:?>
                  <button type="submit" class="btn btn-primary" placeholder="ADD" name="add">Add</button>
                <?php endif;?>  
                <button type="button" class="btn btn-primary" onclick="closeForm()">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
          
    </div>
  </body>
</html>