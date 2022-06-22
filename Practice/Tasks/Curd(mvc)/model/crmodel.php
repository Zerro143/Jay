<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hostname     = "localhost";
$username     = "root";
$password     = "Admin@123"; 
//$password     = ""; 
$databasename = "jay"; 
// Create connection 
$conn = new mysqli($hostname, $username, $password,$databasename);
 // Check connection 
if ($conn->connect_error) { 
die("Unable to Connect database: " . $conn->connect_error);
}

if(isset($_POST['a'])){
    $a = $_POST['a'];
}
else{
    $a = "";
}


switch($a){

    case "add":
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
    break;

    case "del":
        $course_id = $_POST['c'];
        $sql = "DELETE FROM course WHERE course_id = $course_id" or die("ERROR: Data no stored in database.".mysqli_error($conn));
        //echo $sql;
        mysqli_query($conn, $sql);
    break;
    
    case "update":
        $id = $_POST['c'];
        $course = $_POST['b'];
        
        $sql = "UPDATE course SET course = '$course' WHERE course_id = $id";// or die("ERROR: Data not stored in database.".mysqli_error($conn));
        echo $sql;  
        mysqli_query($conn, $sql);
    break;

    default:
        $sql = "SELECT * FROM `course`;"; 
        $result = $conn->query($sql); 
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        // foreach($data as $row){
            print_r($data);
            //echo json_encode($data);
        // }
    break;
}
 
mysqli_close($conn);
 
 ?>