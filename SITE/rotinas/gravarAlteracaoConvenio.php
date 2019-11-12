<?php

	$codConvenio = $_POST['codigoConvenio'];
	$nomePaciente = $_POST['nomePaciente'];
	$numeroConvenio = $_POST['numeroConvenio'];
	$dataInicio = $_POST['dataInicio'];
	$regiao = $_POST['regiao'];
	
	
	//conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "clinica";
	
	//criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);
			
	//variavel select
	$comandoSql = "select * from convenio";
    
    //aqui é o insert para a conexão
	$sql = "update convenio
			set cod_convenio = '$codConvenio',
			nome_paciente = '$nomePaciente',
			num_convenio = '$numeroConvenio',
			data_inicio = '$dataInicio',
			regiao = '$regiao'";
			
	$sql = $sql . "where cod_convenio=$codConvenio";
    mysqli_query($conn, $sql); 
    
  echo "<hr>";
  echo "<hr>";
	echo "<a href='listagemConvenio.php'>Listagem do Convenio</a>";

	
	
    
    
	?>