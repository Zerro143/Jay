<style>
  * {
  box-sizing: border-box;
  font-family:Apple Chancery, cursive;
  
  }
  
  .header {
  overflow: hidden;
  opacity: 0.5;
  padding: 20px 10px;

  
}
.header:hover  {
  overflow: hidden;
  padding: 20px 10px;
  background-color: #ddd;
  
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}



.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: left;
}


</style>
<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <div class="header-right">

    <a class="<?php active('student.php');?>"href="http://192.168.3.122/Jay/Practice/Tasks/Curd(mvc)array/view/student.php">Student</a>
    <a class="<?php active('course.php');?>"href="http://192.168.3.122/Jay/Practice/Tasks/Curd(mvc)array/view/course.php">Course</a>

  </div>
</div>