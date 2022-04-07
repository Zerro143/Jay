<?php  
session_start();
include 'conn.php';?>

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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    </head>

  <body>
    <?php
    if(isset($_SESSION['message'])):
    ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        ?>

    </div>
    <?php endif ?>

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
                      <a href="course.php?edit=<?php echo $row['course_id'];?>"class="btn btn-info" onclick="openForm()">Edit</a>
                      <a href="upcr.php?delete=<?php echo $row['course_id'];?>"class="btn btn-danger">Delete</a>
                    </td>
                
                  </tr>
                </div>  
              <?php endwhile;?>
          </table>

                
      </div>
      <div class="row">
        <div class="col-4">
          <a class="btn btn-primary" onclick="openForm()">Add</a>
          <div style="padding-left:20px">
            <div class="form-popup" id="myForm">
              <form action="upcr.php" class="form-container" method="POSt">
                Add course
                <hr>
                <div class="row">
                  <label for="course"><b>Couse Name</b></label>
                  <input type="text" placeholder="Enter course" name="course" >
                </div>
                <button type="submit" class="btn btn-primary" name="add">Add</button>
                <button type="button" class="btn btn-primary" onclick="closeForm()">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
                
    </div>
  </body>
</html>