<?php 
    session_start();
    include 'conn.php';
    //$_SESSION['message']="";
    //$_SESSION['msg_type']="";


    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "DELETE FROM student WHERE id = $id" or die("ERROR: Data no stored in database.".mysqli_error($conn));

        $_SESSION['message'] = "Student's record has been deleted";
        $_SESSION['msg_type'] = "Danger";

        header("location:students.php");
    }
    
    if (isset($_POST['add'])) {

        
        $fname = $lname = $email = $m = $course_id = $bdate = $cdate = "";

        $errcount="0";


        //if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["fname"])) {
                $_Session['fnameErr'] = "Please Enter Your First Name";
                $errcount = "1";
            } else {
                    $fname = test_input($_POST["fname"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
                        $_SESSION['fnameErr']  = "Only letters and white space allowed";
                        $errcount = "1";
                    }
                }
          
            if (empty($_POST["lname"])) {
                $_SESSION['lnameErr']  = "Please Enter Your Last Name";

            } else {
                    $lname = test_input($_POST["lname"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
                        $_SESSION['lnameErr'] = "Only letters and white space allowed";
                        $errcount = "1";
                    }
                }
          

          
            if (empty($_POST["mail"])) {
                $_SESSION['mailErr']= "Email is required";

            } else {
                    $mail = test_input($_POST["mail"]);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $_SESSION['mailErr'] = "Please enter a valid Email Address";
                        $errcount = "1";
                    }
            }
        //}
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if($errcount==0){
            $_SESSION['message'] = "Student's record has been Added";
            $_SESSION['msg_type'] = "Success";

        }
        header("location:record.php");
    }  

    
?>