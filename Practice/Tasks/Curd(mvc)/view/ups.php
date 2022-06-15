<?php 
session_start();
include 'conn.php';
if(isset($_POST['a'])){
    $a = $_POST['a'];
    // echo $a."<br>";
}
else{
    return;
}
//echo $a;



if ($a == "add1") {
    //echo $a;
    //exit;
    $fname = $_POST['b'];
    $lname = $_POST['c'];
    $email = $_POST['f'];
    $m = $_POST['e'];
    $course_id =$_POST['g'];
    $bdate= $_POST['d'];
    $cdate= $_POST['h'];

    $r1 = "SELECT * FROM student WHERE `email` = '$email'";
    $r2 = $conn->query($r1);
    $tr = $r2->num_rows;
    //echo $r1;
    
    if($tr==0){
    $sql = "INSERT INTO student(`fname`, `lname`, `email`, `m`, `course_id`, `bdate`, `created_date`, `update_date`) VALUES ('$fname','$lname','$email','$m','$course_id','$bdate','$cdate','$cdate')";
    echo $tr;
    
    mysqli_query($conn, $sql);
    }else{
        echo $tr;

    }

   
  
    
}


if ($a == "del") {
   
    if(isset($_POST['ids'])){
        $ids=$_POST['ids'];
        foreach ($ids as $id_d)
        {
            $sql = "DELETE FROM student WHERE id = $id_d" or die("ERROR: Data no stored in database.".mysqli_error($conn));
            
            mysqli_query($conn, $sql);
        }
    }else{
        $id = $_POST['c'];
        $sql = "DELETE FROM student WHERE id = $id" or die("ERROR: Data no stored in database.".mysqli_error($conn));
        mysqli_query($conn, $sql);
    }

}


if ($a == "update1") {
    
    $id = $_POST['i'];
    $fname = $_POST['b'];
    $lname = $_POST['c'];
    $email = $_POST['f'];
    $m = $_POST['e'];
    $course_id =$_POST['g'];
    $bdate= $_POST['d'];
    $cdate= $_POST['h'];
    
    $sql = "UPDATE student SET `fname` = '$fname', `lname` = '$lname' , `email` = '$email' , `m` = $m , `course_id` = '$course_id' , `bdate` = '$bdate', `update_date`= '$cdate' WHERE id = $id" ;
    //echo $sql;  
    mysqli_query($conn, $sql);
     

  
    
    
}


if($a =="exp" AND isset($_POST['ids'])){
    $ids=$_POST['ids'];
    $output = fopen("output.csv", "w");
    fputcsv($output, array('fname','lname','email','m','course', 'bdate','created_date','update_date'));
    foreach ($ids as $id_d)
    {
          
        echo $id_d;
        $sql = "SELECT  `fname`, `lname`, `email`, `m`, `course`, `bdate`, `created_date`, `update_date` FROM student INNER JOIN  course ON student.course_id = course.course_id WHERE id=$id_d ;"; 
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            fputcsv($output, $row);
            
        }
        
    }
    fclose($output);
}
if($a =="expall"){

    $output = fopen("output.csv", "w");
    fputcsv($output, array('fname','lname','email','m','course', 'bdate','created_date','update_date'));


    $sql = "SELECT `fname`, `lname`, `email`, `m`, `course`, `bdate`, `created_date`, `update_date` FROM student INNER JOIN course ON student.course_id = course.course_id;"; 
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
        
    }

    fclose($output);
}





mysqli_close($conn);
?>