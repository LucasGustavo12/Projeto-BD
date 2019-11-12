
<?php
	$codConvenio = $_POST['codigoConvenio'];
	$nomePaciente = $_POST['nomePaciente'];
	$numConvenio = $_POST['nomeConvenio'];
	$dataInicio = $_POST['dataInicio'];
	$regiao = $_POST['regiao'];
	
	//conexão
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
    $dbname = "clinica";
    
    //criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);

    $sql = "insert into convenio(
	cod_convenio, nome_paciente, num_convenio, data_inicio, regiao)
	values
	('$codConvenio','$nomePaciente','$numConvenio','$dataInicio','$regiao')";
    mysqli_query($conn, $sql);
    
    if(mysqli_insert_id($conn)){
		header("Location: convenio.html");

	}else{
		header("Location: convenio.html");
	}

?>