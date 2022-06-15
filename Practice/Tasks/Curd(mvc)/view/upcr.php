<?php 
session_start();
include 'conn.php';

$a = $_POST['a'];
//echo $a;
//exit;


if ($a == "add") {
    
    $course = $_POST['b'];
    $r1 = "SELECT * FROM course WHERE course = '$course'";
    $r2 = mysqli_query($conn,$r1);
    $tr = $r2->num_rows;
    if($tr==0){
        $sql = "INSERT INTO course(course) VALUES ('$course')"or die("ERROR: Data no stored in database.".mysqli_error($conn));
        //echo $sql;
        echo $tr;
        mysqli_query($conn, $sql);
       
    }
    else{
        echo $tr;

    }
   
  
    
}

if ($a == "del") {
    $course_id = $_POST['c'];
    $sql = "DELETE FROM course WHERE course_id = $course_id" or die("ERROR: Data no stored in database.".mysqli_error($conn));
    //echo $sql;
    mysqli_query($conn, $sql);
  

   
    
  
}


if ($a == "update") {
    
    $id = $_POST['c'];
    $course = $_POST['b'];
    
    $sql = "UPDATE course SET course = '$course' WHERE course_id = $id";// or die("ERROR: Data not stored in database.".mysqli_error($conn));
    echo $sql;  
    mysqli_query($conn, $sql);
     

  
    
    
}



mysqli_close($conn);

?>