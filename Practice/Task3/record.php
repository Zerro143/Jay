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
    <?php
      if(isset($_SESSION['message'])):
    ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
      <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        unset($_Session['fnameErr'],$_SESSION['lnameErr'],$_SESSION['mailErr'],$_SESSION['mErr'],$_SESSION['bdateErr'],$_SESSION['course_idErr'],$_SESSION['cdateErr']);
      ?>

    </div>
    <?php endif; ?>
    <div class="container">
      <div class="form">
        <form name="student"  action="ups.php" method="post">
          
          <div class="row">

            <div class="col-25">
              <label for="fname">First Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="fname" placeholder="Your name.."value="<?php echo $fname;?>">
              <span class="error">* <?php echo $_SESSION['fnameErr'];?></span>
            </div>

          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lname" placeholder="Your last name.." value="<?php echo $lname;?>">
              <span class="error">* <?php echo $_SESSION['lnameErr'];?></span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Birth Date</label>
            </div>
            <div class="col-75">
              <input type="date" name="bdate" id="bdate">
              <span class="error">* <?php echo $_SESSION['bdateErr'] ;?></span>

            </div>
          </div>
          <div class="row">
            <div class="col-25">
            <label for="m">Mobile no:</label>
            </div>
            <div class="col-75">
            <input type="phone" id="m" name="m"placeholder="Mobile no." value="<?php echo $m;?>">  
            <span class="error">* <?php echo $_SESSION['mErr'];?></span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
            <label for="mail">Email:</label>
            </div>
            <div class="col-75">
            <input type="email" id="mail" name="mail"placeholder="Email" value="<?php echo $mail;?>">  
            <span class="error">* <?php echo $_SESSION['mailErr'];?></span>
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
              <span class="error">* <?php echo $_SESSION['course_idErr'];?></span>
            </div>
          </div>    
          <div class="row">
            <div class="col-25">
              <label>Created Date</label>
            </div>
            <div class="col-75">
              <input type="date" name="cdate" id="cdate">
              <span class="error">* <?php echo $_SESSION['cdateErr'] ;?></span>

            </div>
          </div>



          <div class="row">
          <hr>
                      

            <button type="submit" class="btn btn-primary" placeholder="ADD" name="add">Add</button>
            <p>


                      


          </div>
        </form>
      </div>
      </div>
  </body>
</html>      