<?php  
  session_start();
  include 'conn.php';
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


<html>
    <head>
        <title>Student Grid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap.css"> 
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

  <body>
    <section id="header">
      <?php   include 'nav.php';?>
    </section>
    <?php   //include 'alert.php';?>

    <?php include 'btn.php';?>
    <div class="container" >
           
        
    <section id= "main">

   
      <div class="container"  id ="datatable">

        <div class="row justify-content-center">
        <table class="table datatable" id="tda">
              <thead>
                <tr>
                  <th><input type="checkbox" name="" id="master"></th>
                  <th>Student ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th>Course</th>
                  <th>Birthdate</th>
                  <th>Created Date</th>
                  <th>Updated Date</th>
                  <th colspan="4">Action</th>
                </tr>
              </thead>
              <tbody id="data">
                <?php $sql = "SELECT * FROM student INNER JOIN course ON student.course_id = course.course_id;"; 
                    $result = $conn->query($sql); 

                    // output data of each row
                  while($row = $result->fetch_assoc()):?> 
                  <div class="row" justify-content-center>
                    <tr>
                      <td><input type="checkbox" class="sil" id="checkbox" value=<?php echo $row['id'];?>></td>
                      <td><?php echo $row['id'];?></td>
                      <td><?php echo $row['fname'];?></td>
                      <td><?php echo $row['lname'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['m'];?></td>
                      <td><?php echo $row['course'];?></td>
                      <td><?php echo $row['bdate'];?></td>
                      <td><?php echo $row['created_date'];?></td>
                      <td><?php echo $row['update_date'];?></td>
                      <td>   
                      <button id="edit" class="btn btn-info edit1" 
                        did="<?php echo $row['id'];?>" 
                        dfname="<?php echo $row['fname'];?>" 
                        dlname = "<?php echo $row['lname'];?>"
                        dmail= "<?php echo $row['email'];?>"
                        dm = "<?php echo $row['m'];?>"
                        dbdate = "<?php echo $row['bdate'];?>"
                        dcourse = "<?php echo $row['course_id'];?>"
                        >
                        Edit
                      </button>
                      <button id="Delete" class="btn btn-danger delete1" did="<?php echo $row['id'];?>">Delete</button>
                      </td>
                          
                    </tr>
                  </div>  
                <?php endwhile;?>
              </tbody>
            </table>

                          
        </div>
       
                          
      </div>
    </section>  
    <section id = "course_form" class="container mt-5">
          <?php include 'addcr.php';?>
    </section>
    <section id = "student_form" class="studentForm container mt-5">
          <?php include 'record.php';?>
    </section>
  <div id="js">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/craction.js"></script>
    <script src="assets/js/saction.js"></script>
  </div>
  </body>
</html>