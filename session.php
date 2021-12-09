<?php

session_start();

    include("connection/connection.php");

	$staffNo=$_SESSION['staffNo'];
	$staffPass=$_SESSION['staffPass'];
        
	if(empty($_SESSION))
	{  	
	header('Location:../index.php');
	}
?>
