<?php
    $ncargo = $_POST['ncargo'];
    $dscargo = $_POST['dscargo'];

    /*echo"nome cargo: $ncargo<br>";
    echo"ds cargo: $dscargo<br>";
    */

    include "conexao.php";

    $sql = "insert into cargo
	(nm_cargo,ds_cargo)
	values
	('$ncargo','$dscargo')";
    mysqli_query($con, $sql);
    
    if(mysqli_insert_id($con)){
		header("Location: cadcargo.html");

	}else{
		header("Location: cadcargo.html");
	}
?>