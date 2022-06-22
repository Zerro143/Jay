<?php
include("connection.php");

$id = $_POST['postid'];
$title= $_POST['titlecol'];
$desc=$_POST['desccol'];


//echo $id;

$sql ="UPDATE posts SET post_title='".$title."',description='".$desc."' where id='".$id."'";

mysqli_query($conn,$sql);



?>