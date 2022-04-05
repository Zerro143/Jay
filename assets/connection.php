<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<?php

		$servername = "localhost";
		$username = "root";
		$password = "Admin@123";
		$dbname = "jay";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$msg = '';
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
// define variables and set to empty values







function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$_SESSION["fnameErr"]=$fnameErr;
$_SESSION["lnameErr"]=$lnameErr;
$_SESSION["mailErr"]=$mailErr;
$_SESSION["pswErr"]=$pswErr;
$_SESSION["psw_rErr"]=$psw_repeatErr;


		// File upload path
		$targetDir = "/Jay/images/";
		$fileName = basename($_FILES["file"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
		/*if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
			//Insert image file name into database
			$fname = $_REQUEST['fname'];
			$lname = $_REQUEST['lname'];
			$gender = $_REQUEST['gender'];
			$mail = $_REQUEST['mail'];
			$psw= $_REQUEST['psw'];
		
			$insert = "INSERT into reg VALUES ('$fname',
			'$lname','$gender','$mail','$psw','.$fileName.')";
			if($insert){
                $msg = "The file ".$fileName. " has been uploaded successfully.";
            }
			else{
                $msg = "File upload failed, please try again.";
            } 
		}
		else{
			$msg = "File upload failed, please try again.";
		} */
		
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$gender = $_REQUEST['gender'];
		$mail = $_REQUEST['mail'];
		$psw= $_REQUEST['psw'];
	
		
		
		$sql = "INSERT INTO reg VALUES ('$fname',
			'$lname','$gender','$mail','$psw','$fileName')";
		
		
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Thanks and have a great day.</h3>";

			echo nl2br("$fname\n");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	
</body>

</html>
