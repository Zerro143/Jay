<?php 
session_start();
include 'conn.php';
#$_SESSION['message']="";
#$_SESSION['msg_type']="";

//if (isset($_POST['add'])) {
//    
//    $course = $_POST['course'];
//    $sql = "INSERT INTO course(course) VALUES ('$course')"or die("ERROR: Data no stored in database.".mysqli_error($conn));
//   
//    
//    $_SESSION['message'] = "Course has been Added";
//    $_SESSION['msg_type'] = "Success";
//    
//    header("location:course.php");
//}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM student WHERE id = $id" or die("ERROR: Data no stored in database.".mysqli_error($conn));

   $_SESSION['message'] = "Student's record has been deleted";
   $_SESSION['msg_type'] = "Danger";
    
   header("location:students.php");
}

//if (isset($_GET['edit'])){
//    $course_id = $_GET['edit'];
//    $sql = "SELECT * FROM course WHERE course_id = $course_id" or die("ERROR: Data no stored in database.".mysqli_error($conn)); 
//    $result = $conn->query($sql);  
//    if ($result->num_rows > 0){
//        $row = $result->fetch_array();
//        $course_id = $row['course_id'];
//        $course = $row['course']; 
//        
//    }
// 
//}
 
mysqli_query($conn, $sql);

mysqli_close($conn);
?>