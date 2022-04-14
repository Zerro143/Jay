<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<link rel="stylesheet" href="/Jay/assets/main.css">
<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($currect_page == $url){
      echo 'active'; //class name in css 
  } 
}
?>
<div class="header">
  <a href="http://localhost/Jay/index.php" class="logo">Game Mania</a>
  <div class="header-right">
    <a class="<?php active('index.php');?>"href="http://localhost/Jay/index.php">Home</a>
    <a class="<?php active('contact.php');?>"href="http://localhost/Jay/Practice/">Practice</a>
    <a class="<?php active('about.php');?>"href="#about">About</a>
    <a class="<?php active('#Login');?>"href="#login" class="open-button" onclick="openForm()">Login</a>
    <a class="<?php active('regform.php');?>"href="http://localhost/Jay/assets/regform.php">Registration</a>
  </div>
</div>

<div style="padding-left:20px">

<div class="form-popup" id="myForm">
  <form action="#" class="form-container">
    <h2>Login</h2>
    <hr>
    <div class="row">
      
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
    </div>
    <div class="row"  
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
    </div>    
    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<section id="Login">
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</section>

  

</body>
</html>
