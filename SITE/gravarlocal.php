<?php
	$codLocal = $_POST['codigoLocal'];
	$codExame = $_POST['codigoExame'];
	$numClinica = $_POST['numeroClinica'];
	$endereco = $_POST['endereco'];
	$telefone = $_POST['telefone'];
	$obs = $_POST['obs'];
	
	//conexão
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
    $dbname = "clinica";
    
    //criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);

    $sql = "insert into local
	(cod_local, cod_exame , num_clinica, ds_endereco, nm_telefone, ds_obs)
	values
	('$codLocal','$codExame','$num_Clinica','$endereco','$telefone','$obs')";
    mysqli_query($conn, $sql);
    
    if(mysqli_insert_id($conn)){
		header("Location: local.html");

	}else{
		header("Location: local.html");
	}

?>