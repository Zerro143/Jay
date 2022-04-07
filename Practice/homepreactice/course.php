<?php
include 'conn.php';
session_start();
?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
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
                <input type="hidden" name="id" value="<?php echo $id = $_SESSION['id'];?>">
                <div class="row">
                  <label for="course"><b>Couse Name</b></label>
                  <input type="text" placeholder="Enter course" name="course" value="<?php //echo /*$course;*/$_SESSION['course'];  unset($_SESSION['course']);?>">
                </div>
                <?php
                  if($_SESSION['update']==true):
                ?>
                  <button type="submit" class="btn btn-info" placeholder="update" name="update">Update</button>
                <?php unset($_SESSION['update']); ?>  
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