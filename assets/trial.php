$fnameErr = $lnameErr = $genderErr = $mailErr  = $pswErr = $psw_repeatErr = "";
$fname = $lname = $gender =$mail  = $psw = $psw_repeat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Please Enter Your First Name";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["lname"])) {
    $lnameErr = "Please Enter Your Last Name";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
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
    }
  }
    
 if (empty($_POST["psw"])) {
   $pswErr= "Please Enter Your Password";
  }// else {
    //$psw = test_input($_POST["psw"]);
    // check if URL address syntax is valid
   // if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$psw)) {
      //  $pswErr = "Please Enter a Valid Password";
  //  }    
  //}
  if (empty($_POST["psw_repeat"])) {
    $psw_repeatErr = "Please Enter Your Password Again";
  } else {
        $psw_repeat= test_input($_POST["psw_repeat"]);
        // check if URL address syntax is valid
        if ($psw_repeat!=$psw) {
        $psw_repeatErr = "Password Does Not Match";
        }
    }    

  
  
}