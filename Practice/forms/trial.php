<?php session_start(); error_reporting(0);?>
<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   if (empty($_POST["name"]))
     {$_SESSION['name']= "Name is required";}
   if (empty($_POST["email"]))
     {$_SESSION['email'] = "Email is required";}
   if (empty($_POST["website"]))
     {$_SESSION['website'] = "Website is required";}
   if (empty($_POST["comment"]))
     {$_SESSION['comment'] = "comment is required";}
   if (empty($_POST["gender"]))
     {$_SESSION['gender'] = "Gender is required";}
}
if($_POST['name']!="" && $_POST['email']!="" && $_POST['website']!="" && 

$_POST['gender']!="")
{
    header("Location: welcome.php");
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action=""> 
   <label>Name:</label> <input type="text" name="name"> <span class="error">* <?php echo $_SESSION['name'];?></span>
   <br><br>
   <label>E-mail:</label> <input type="text" name="email"> <span class="error">* <?php echo $_SESSION['email'];?></span>
   <br><br>
   <label>Website:</label> <input type="text" name="website"> <span class="error"><?php echo $_SESSION['website'];?></span>
   <br><br>
   <label>Comment:</label> <input type="text" name="comment">
   <br><br>
   <label>Gender:</label>
   <input type="radio" name="gender" value="female">Female
   <input type="radio" name="gender" value="male">Male
   <span class="error">* <?php echo $_SESSION['gender'];?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
</body>
</html>
<?php 
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['website']);
    unset($_SESSION['comment']);
    unset($_SESSION['gender']);
?>