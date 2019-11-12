<?php
	//$cod_exame = $_POST['cod_exame'];
	$codreceita = $_POST['cod_receita'];
    $nmexame = $_POST['nm_exame'];
	$dsexame = $_POST['ds_obs'];
	
	//conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
    $dbname = "clinica";
	
	//criar a conexão
	$con = mysqli_connect ($servidor, $usuario, $senha, $dbname);
	
	$sql = "insert into exames
	(cod_receita,nm_exame,ds_obs)
	values
	('$codreceita','$nmexame','$dsexame')";
    mysqli_query($con, $sql);
    
    if(mysqli_insert_id($con)){
		header("Location: exames.html");

	}else{
		header("Location: exames.html");
	}


?>