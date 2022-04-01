<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<head>
    <title>Registration form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>


<?php include 'header.php';?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/Jay/assets/main.css">


<script>
/*function validate() {    
            var fname = document.regform.fname;    
            var lname = document.regform.lname;    
            var mail = document.regform.mail;    
            
            if (fname.value.length <= 0) {    
                alert("Please Enter Your Name");    
                fname.focus();    
                return false;    
            }    
            if (lname.value.length <= 0) {    
                alert("Please Enter Your Last Name");    
                lname.focus();    
                return false;    
            }    
                 
            if (mail.value.length <= 0) {    
                alert("Please Enter Your Email");    
                mail.focus();    
                return false;    
            }    
             
            if (psw.value.length <= 0) {    
                alert("Password is required");    
                course.focus();    
                return false;    
            }    
            if (psw_r.value !== psw.value) {    
                alert("Password Does not Match");    
                course.focus();    
                return false;    
            } 

            return false;    
        }    */
</script>


<div class="container">
  <form name="regform"  action="<?php 
  $fnameErr = $lnameErr = $genderErr = $mailErr  = $pswErr = $psw_repeatErr = "";
$fname = $lname = $gender =$mail  = $psw = $psw_repeat = $errcount= "";



if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST["fname"])) {
    $fnameErr = "Please Enter Your First Name";
   
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
      $errcount=1;
    }
  }

  if (empty($_POST["lname"])) {
    $lnameErr = "Please Enter Your Last Name";
    
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
      $errcount=1;
    }
  }

  /*if (empty($_POST["gender"])) {
    $genderErr = "Please Select Your Gender";
  } else {
    $gender = test_input($_POST["gender"]);
  }*/

  if (empty($_POST["mail"])) {
    $mailErr = "Email is required";
    
  } else {
    $mail = test_input($_POST["mail"]);
    // check if e-mail address is well-formed
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mailErr = "Please enter a valid Email Address";
      $errcount=1;
    }
  }
   
 if (empty($_POST["psw"])) {
   $pswErr= "Please Enter Your Password";
   
  } /*else {
    $psw = test_input($_POST["psw"]);
   // check if URL address syntax is valid
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$psw)) {
        $pswErr = "Please Enter a Valid Password";
   }    
  }*/
  if (empty($_POST["psw_repeat"])) {
    $psw_repeatErr = "Please Enter Your Password Again";
    
  } else {
        $psw_repeat= test_input($_POST["psw_repeat"]);
        $psw = test_input($_POST["psw"]);
        // check if URL address syntax is valid
        if ($psw_repeat!=$psw) {
        $psw_repeatErr = "Password Does Not Match";
        $errcount=1;
        }
    } 
    
    if(empty($errcount)){
      echo htmlspecialchars($_SERVER["PHP_SELF"]);
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>" method="post"  enctype="multipart/form-data">
    <div class="row">
        <h2><i class="fa fa-user icon"></i> Registration Form </h2>
        <hr> 
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
        <label >Gender:</label>
      </div>
      <div class="col-75">
        <input type="radio"  id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        
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
            <label for="psw">Password:</label>
        </div>
        <div class="col-75">
        <input type="password" placeholder="Enter Password" name="psw" id="psw"  > 
        <span class="error">* <?php echo $pswErr;?></span>
      </div>
    </div>    
    <div class="row">
        <div class="col-25">
            <label for="psw_repeat">Re-Enter Your Password: </label>
        </div>
        <div class="col-75">
            <input type="password" placeholder="Re-Enter Your Password" name="psw_repeat" id="psw_repeat" >
            <span class="error">* <?php echo $psw_repeatErr;?></span>
      </div>
    </div>    
    <div class="row">
        <div class="col-75">
          <center>  <br><input type="file" name="file" multiple></center>
        </div>

    </div>  
    <div class="row">
    <hr><center>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
      <input name = "submit" type="submit" value="Submit"></center>
    </div>
  </form>
</div>
<?php echo $data;?>
</body>