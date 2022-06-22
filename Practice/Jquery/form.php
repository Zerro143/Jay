<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<head>
    <title>Registration form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/jquery.js"></script>

<script>
    $(document).ready(function(){
        $("#submit").click(function(){ 
            
            const f = /^[a-zA-Z-' ]*$/;
           
            var fname = document.regform.fname;    
            var lname = document.regform.lname;    
            var mail = document.regform.mail;    
            
            if (fname.value.length <= 0) { 
                alert("Please Enter Your Name");    
                fname.focus();    
                return false;
                   
            }else{
                if(f.test(fname.value) == false){
                    alert("Invalid Charcter");
                    fname.focus();  
                    return false;   
                }
               
            }

            if (lname.value.length <= 0) {    
                alert("Please Enter Your Last Name");    
                lname.focus();    
                return false;    
            }
            else{
                if(f.test(lname.value) == false){
                    alert("Invalid Charcter");
                    fname.focus();  
                    return false;   
                }
               
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
        } );

    });
    
</script>

</head>
<body>


<?php include 'header.php';?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="main.css">



<div class="container">
  <form name="regform"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  enctype="multipart/form-data">
    <div class="row">
        <h2><i class="fa fa-user icon"></i> Registration Form </h2>
        <hr> 
    </div>
    <div class="row">
    <input type="hidden" name="id" value="<?php echo $id = $_SESSION['sid'];?>">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="fname" placeholder="Your name.."value="<?php echo $fname;?>">
        <span class="error" id="ferr">* <?php echo $fnameErr;?></span>
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
    <hr><center>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            
      <input id = "submit" type="submit" value="Submit">
      <p>
    	

    </center>

		
    </div>
  </form>
</div>
<?php echo $data;?>
</body>