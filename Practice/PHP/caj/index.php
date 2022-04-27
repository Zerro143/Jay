<?php
include("connection.php");



if(isset($_GET['del_id']))
{
	$id=$_GET['del_id'];
	
	$sql="delete from posts where id='".$id."'";
	$result=mysqli_query($conn,$sql);
	
	header('location:index.php');
	
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Select Data Using AJAX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container py-5">
<div class="row">
<div class="col-lg-12">
<h1 class="text-center">Select Data Using AJAX</h1>
<p class="text-right"><a href="add.php" class="btn btn-primary">Add Blog</a></p>
<table class="table table-bordered table-striped" id="content">
</table>
</div>
</div>
</div>


<script>
$(document).ready(function(){
$.ajax({url:"select.php",
success:function(dataabc){
		//console.log(dataabc);
	$("#content").html(dataabc);		
}});


});
</script>
</body>
</html>

