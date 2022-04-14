<?php  
    session_start();
    include 'conn.php';

    //if (isset($_GET['edit'])){
    //  $id = $_GET['edit'];
    //  $sql = "SELECT * FROM course WHERE course_id = $id" or die("ERROR: Data no stored in database.".mysqli_error($conn)); 
    //  $result = $conn->query($sql);  
    //  $row = $result->fetch_array();
    //  $course=$row['course'];
    //}

    mysqli_query($conn, $sql);
?>
<html>
    
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    </head>
    <body>
    <div class="row">
        <div class="col-4">
          <?php //<a class="btn btn-primary" onclick="openForm()">Add</a>?>
          <div style="padding-left:20px">
            <div class="form" id="myForm">
              <form action="upcr.php" class="form-container" method="POSt">
                
                <div class="row">
                  <label for="course"><b>Couse Name</b></label>
                  <input type="text" placeholder="Enter course" name="course" value="<?php echo $_SESSION['course'];  unset($_SESSION['course']);?>" >
                </div>
                <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>