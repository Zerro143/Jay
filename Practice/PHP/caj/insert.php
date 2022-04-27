<?php
include("connection.php");

$title= $_POST['titlecol'];
$desc=$_POST['desccol'];
$adddate=date('Y-m-d');


$sql ="insert into posts(post_title,description,post_at) values ('".$title."','".$desc."','".$adddate."')";

mysqli_query($conn,$sql);


?>