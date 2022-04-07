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
    <div class="container">
    <div class="form">
      <form name="student"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="row justify-content-center">
          
        </div>
        <div class="row">

          <div class="col-25">
            <label for="fname">First Name</label>
          </div>
          <div class="col-75">
            <input type="text" id="fname" name="fname" placeholder="Your name.."value="<?php echo $fname;?>">
            <span class="error">* <?php echo $fnameErr;?></span>
          </div>

        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Last Name</label>
          </div>
          <div class="col-75">
            <input type="text" id="lname" name="lname" placeholder="Your last name.." value="<?php echo $lname;?>">
            <span class="error">* <?php echo $lnameErr;?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label>Birth Date</label>
          </div>
          <div class="col-75">
            <input type="date" name="bdate" id="bdate">

          </div>
        </div>
        <div class="row">
          <div class="col-25">
          <label for="mail">Mobile no:</label>
          </div>
          <div class="col-75">
          <input type="phone" id="mail" name="mail"placeholder="Mobile no." value="<?php echo $mail;?>">  
          <span class="error">* <?php echo $mailErr;?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
          <label for="mail">Email:</label>
          </div>
          <div class="col-75">
          <input type="email" id="mail" name="mail"placeholder="Email" value="<?php echo $mail;?>">  
          <span class="error">* <?php echo $mailErr;?></span>
          </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="browser">Course:</label>
            </div>
            <div class="col-75">
            <input list="browsers" name="browser"> 
                <datalist id="browsers">
                    <option value="Internet Explorer">
                    <option value="Firefox">
                    <option value="Chrome">
                    <option value="Opera">
                    <option value="Safari">
                </datalist>
            <span class="error">* <?php echo $pswErr;?></span>
          </div>
        </div>    
        <div class="row">
          <div class="col-25">
            <label>Created Date</label>
          </div>
          <div class="col-75">
            <input type="date" name="cdate" id="cdate">

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

