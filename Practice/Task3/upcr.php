<?php 
session_start();
include 'conn.php';
$id="0";
$_SESSION['crupdate']=false;

#$_SESSION['message']="";
#$_SESSION['msg_type']="";

if (isset($_POST['add'])) {
    
    $course = $_POST['course'];
    $sql = "INSERT INTO course(course) VALUES ('$course')"or die("ERROR: Data no stored in database.".mysqli_error($conn));
    mysqli_query($conn, $sql);
    
    $_SESSION['message'] = "Course has been Added";
    $_SESSION['msg_type'] = "Success";
    
    header("location:course.php");
}

if (isset($_GET['delete'])) {
    $course_id = $_GET['delete'];
    $sql = "DELETE FROM course WHERE course_id = $course_id" or die("ERROR: Data no stored in database.".mysqli_error($conn));
   mysqli_query($conn, $sql);
  

   $_SESSION['message'] = "Course and Course Related Students has been deleted";
   $_SESSION['msg_type'] = "Danger";
    
   header("location:course.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $_SESSION['crupdate']=true;
    $sql = "SELECT * FROM course WHERE course_id = $id" or die("ERROR: Data no stored in database.".mysqli_error($conn));
    mysqli_query($conn, $sql); 
    $result = $conn->query($sql);  
    $row = $result->fetch_array();
    $_SESSION['cid']=$row['course_id'];
    $_SESSION['course']=$row['course'];
    header("location:course.php"); 
    
     
   
}
#if (isset($_GET['edit'])){
#    $id = $_GET['edit'];
#    $update=true;
#    $sql = "SELECT * FROM course WHERE course_id = $id" or die("ERROR: Data no stored in database.".mysqli_error($conn)); 
#    $result = $conn->query($sql);  
#    $row = $result->fetch_array();
#    $course_id=$row['course_id'];
#    $course=$row['course'];
#    header("location:course.php"); 
#    
#     
#   
#}
if (isset($_POST['update'])) {
    
    $id = $_POST['id'];
    $course = $_POST['course'];
    //echo $id;
    //echo $course;
    $sql = "UPDATE course SET course = '$course' WHERE course_id = $id";// or die("ERROR: Data not stored in database.".mysqli_error($conn));
    mysqli_query($conn, $sql);
    //echo $sql;   
    $_SESSION['message'] = "Course has been Edited";
    $_SESSION['msg_type'] = "Success";
    header("location:course.php"); 
  
    
    
}



mysqli_close($conn);
?>