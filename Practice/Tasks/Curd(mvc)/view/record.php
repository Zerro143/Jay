<?php 
  //session_start();
  include 'conn.php';
  $sql = "SELECT * FROM `course`;"; 
  $result = $conn->query($sql); 

  //$id = $_POST['c'];
  //echo $id;
  
  // if ($id > ""){
  // $sql1 = "SELECT * FROM `student` WHERE $id;";
  // $result1 = $conn->query($sql1);
  // while($row = $result1->fetch_assoc()):

  //   $fname = $row['fname'];
  //   $lname = $row['lname'];
  //   $bdate = $row['bdate'];
  //   $m = $row['m'];
  //   $mail =$row['email'];

  
  
  // endwhile;

  //print_r($result1);
  //exit; 
  //}
 
  // output data of each row

?>
<style>
  
  .col-25 {
    text-align: center;
    float: Left;
    width: 25%;
    margin-top: 6px;
  }
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  form{
      align-self: center;
  }
  .studentform{
    display: none;
  }
</style>

<html>
  <head>
      <title>Create Record</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="assets/css/bs.css"> 
  </head>
  <body>
    <section id="header">
        <?php //include 'nav.php';?>
    </section>
    <?php   //include 'alert.php';?>
    
    <div class="container">
      <div class="studentForm">
        <form name="student" method="post">
          
          <div class="row">
          <input id= "did"type="hidden" name="id" value="<?php echo $id;?>">
            <div class="col-25">
              <label for="fname">First Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="fname" placeholder="Your name.."value="<?php echo $fname;?>">
              <span class="error"id = "ferr">* </span>
            </div>

          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lname" placeholder="Your last name.." value="<?php echo $lname;?>">
              <span class="error" id = "lerr">* </span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Birth Date</label>
            </div>
            <div class="col-75">
              <input type="date" name="bdate" max="2013-01-01" id="bdate"value="<?php echo $bdate;?>">
              <span class="error" id="bderr">*</span>

            </div>
          </div>
          <div class="row">
            <div class="col-25">
            <label for="m">Mobile no:</label>
            </div>
            <div class="col-75">
            <input type="phone" id="m" name="m"placeholder="Mobile no." value="<?php echo $m ?>">  
            <span class="error"id = "merr">* </span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
            <label for="mail">Email:</label>
            </div>
            <div class="col-75">
            <input type="email" id="mail" name="mail"placeholder="Email" value="<?php echo  $mail?>">  
            <span class="error" id="mailerr">* </span>
            </div>
          </div>
        
          <div class="row">
              <div class="col-25">
                  <label for="course">Course:</label>
              </div>
              <div class="col-75">
              <select id = "course1" class = "course "name = "course">
                      <?php while($row1 = $result->fetch_assoc()): ?>
                      <option value="<?php echo $row1['course_id'];?>"><?php echo $row1['course'];?> </option>

                      <?php endwhile;?>
                  </select> 
              <span class="error">* </span>
            </div>
          </div>
             
        <div class="justify-content-center" >
          <center>
          <button id ="upd" class="btn btn-info" placeholder="update" value="update1">Update</button>
          <button id="add1" class="btn btn-primary" value = "add1">Add</button>
          <button class="btn btn-primary" id="cls">Close</button>
          </center>
       </div>  
         
          


                      


          
        </form>

      </div>
      </div>
      <div class="container">
    
    <form action="csvst.php" method="post" enctype="multipart/form-data" id="upload_csv_form">
      <div class="form-group">
        <label for="exampleFormControlFile1">Please Select File</label>
        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
      </div>
      <div class="form-group">
       <input type="submit" name="submit" value="submit" class="btn btn-primary">
     </div>
</form>
</div>

  </body>
</html>      