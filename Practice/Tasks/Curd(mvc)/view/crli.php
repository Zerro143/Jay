<html>
    <head>
        <title>Course Grid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/bootstrap.css"> 
        <script src="../assets/js/bootstrap.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/craction.js"></script>
        <script src="../assets/js/saction.js"></script>
        
    </head>

  <body>
    <section id="header">
      <?php 
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      include 'nav.php';?>
    </section>

   
    <?php include 'btn.php';?>
          
                
      
    <section id ="">
      <div class="container datatable" id = "">

        <div class="row justify-content-center" >
          <!-- <table class="table" id = "datatable">
            <thead>
              <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
              <?php 
               
                // output data of each row
                while($row = mysqli_fetch_array($result)):?> 
                <div class="row" justify-content-center>
                  <tr>
                    <td id = "course_id<?php echo $row['course_id'];?>"><?php echo $row['course_id'];?></td>
                    <td id = "course_name<?php echo $row['course'];?>"><?php echo $row['course'];?></td>
                    <td>  
                      <button id="edit" class="btn btn-info edit" did="<?php echo $row['course_id'];?>" dname="<?php echo $row['course'];?>">Edit</button>
                      <button id="Delete" class="btn btn-danger delete" did="<?php echo $row['course_id'];?>" dname="<?php echo $row['course'];?>">Delete</button>

                    </td>
                
                  </tr>
                </div>  
              <?php endwhile; mysqli_free_result($result)  ?>
          </table> -->



        </div>
      </div>
    </section>
    <section id = "course_form" class="container mt-5">
      <?php include 'addcr.php';?>
    </section>
    <section id = "student_form" class="studentForm container mt-5">
          <?php include 'record.php';?>
    </section>
          
    </div>


  </body>
</html>