<?php
	$url="localhost";
	$user="root";
	$password="";
	
	$con= mysqli_connect($url,$user,$password);
	
	$db="clinica";
	mysqli_select_db($con,$db) or
	die("Erro na sele��o/abertura do banco $db: ". mysqli_error($con));
?>