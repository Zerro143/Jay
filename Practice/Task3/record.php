<?php 
  session_start();
  include 'conn.php';
  $sql = "SELECT * FROM `course`;"; 
  $result = $conn->query($sql); 
  // output data of each row

?>
<style>
  .container {

    border-radius: 70px;

    padding: 20px;
    margin: 20%; 

    margin-top: 0%;
  }
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
</style>

<html>
  <head>
      <title>Create Record</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  </head>
  <body>
    <section id="header">
        <?php   include 'nav.php';?>
    </section>
    <?php   include 'alert.php';?>
    <div class="container">
      <div class="form">
        <form name="student"  action="ups.php" method="post">
          
          <div class="row">
          <input type="hidden" name="id" value="<?php echo $id = $_SESSION['sid'];?>">
            <div class="col-25">
              <label for="fname">First Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="fname" placeholder="Your name.."value="<?php echo $_SESSION['fname']; unset($_SESSION['fname']);?>">
              <span class="error">* <?php echo $_SESSION['fnameErr'];unset($_SESSION['fnameErr']);?></span>
            </div>

          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lname" placeholder="Your last name.." value="<?php echo $_SESSION['lname'];unset($_SESSION['lname']);?>">
              <span class="error">* <?php echo $_SESSION['lnameErr'];unset($_SESSION['lnameErr']);?></span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Birth Date</label>
            </div>
            <div class="col-75">
              <input type="date" name="bdate" id="bdate"value="<?php echo $_SESSION['bdate'];unset($_SESSION['bdate']);?>">
              <span class="error">* <?php echo $_SESSION['bdateErr'];unset($_SESSION['bdateErr']);?></span>

            </div>
          </div>
          <div class="row">
            <div class="col-25">
            <label for="m">Mobile no:</label>
            </div>
            <div class="col-75">
            <input type="phone" id="m" name="m"placeholder="Mobile no." value="<?php echo $_SESSION['m']; unset($_SESSION['m']);?>">  
            <span class="error">* <?php echo $_SESSION['mErr'];unset($_SESSION['mErr']);?></span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
            <label for="mail">Email:</label>
            </div>
            <div class="col-75">
            <input type="email" id="mail" name="mail"placeholder="Email" value="<?php echo  $_SESSION['mail'];unset( $_SESSION['mail']);?>">  
            <span class="error">* <?php echo $_SESSION['mailErr'];unset($_SESSION['mailErr']);?></span>
            </div>
          </div>
          <div class="row">
              <div class="col-25">
                  <label for="course">Course:</label>
              </div>
              <div class="col-75">
              <select name = "course">
                      <?php while($row = $result->fetch_assoc()): ?>
                      <option value="<?php echo $row['course_id'];?>"><?php echo $row['course'];?> </option>

                      <?php endwhile;?>
                  </select> 
              <span class="error">* <?php echo $_SESSION['course_idErr'];unset($_SESSION['course_idErr']);?></span>
            </div>
          </div>
          <?php
            if($_SESSION['supdate']==true):
          ?>    
          <div class="row">
            <div class="col-25">
              <label>Updated Date</label>
            </div>
            <div class="col-75">
              <input type="date" name="cdate" id="cdate"  value="<?php echo  $_SESSION['cdate'];unset( $_SESSION['cdate']);?>">
              <span class="error">* <?php echo $_SESSION['cdateErr'];unset($_SESSION['cdateErr']);?></span>

            </div>
          </div>
      
          
          <center><button type="submit" class="btn btn-info" placeholder="update" name="update">Update</button></center>
          <?php unset($_SESSION['supdate']); ?>  
          
          <?php else:?>
            <div class="row">
            <div class="col-25">
              <label>Created Date</label>
            </div>
            <div class="col-75">
              <input type="date" name="cdate" id="cdate"  value="<?php echo  $_SESSION['cdate'];unset( $_SESSION['cdate']);?>">
              <span class="error">* <?php echo $_SESSION['cdateErr'];unset($_SESSION['cdateErr']);?></span>

            </div>
          </div>

          <center><button type="submit" class="btn btn-primary" placeholder="add" name="add">Add</button></center>
          <?php endif;?>
          


                      


          
        </form>
      </div>
      </div>
  </body>
</html>      