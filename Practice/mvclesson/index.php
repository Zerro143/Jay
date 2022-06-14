<?php
	session_unset();
	require_once  'controller/sportsController.php';		
    $controller = new sportsController();	
    $controller->mvcHandler();
?>