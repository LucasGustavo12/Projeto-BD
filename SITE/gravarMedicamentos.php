<?php
	$codmed = $_POST['cod_medicamento'];
    $dssubstancia = $_POST['ds_substancia'];
	$dscontraind= $_POST['ds_contraind'];
	$dsgenerico = $_POST['ds_generico'];
	
	//conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
    $dbname = "clinica";
	
	//criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);
	
	$sql = "insert into medicamento
	(ds_substancia,ds_contraind,ds_generico)
	values
	('$dssubstancia','$dscontraind','$dsgenerico')";
    mysqli_query($conn, $sql);
    
    if(mysqli_insert_id($conn)){
		header("Location: medicamentos.html");

	}else{
		header("Location: medicamentos.html");
	}


?>