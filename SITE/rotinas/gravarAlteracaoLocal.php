<?php

	$codigoLocal = $_POST['codigoLocal'];
	$codigoExame = $_POST['codigoExame'];
	$numeroClinica = $_POST['numeroClinica'];
	$endereco = $_POST['endereco'];
	$telefone = $_POST['telefone'];
	$obs = $_POST['obs'];
	
	
	
	//conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "clinica";
	
	//criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);
			
	//variavel select
	$comandoSql = "select * from local";
    
    //aqui é o insert para a conexão
	$sql = "update local
			set cod_local = '$codigoLocal',
			cod_exame = '$codigoExame',
			num_clinica = '$numeroClinica',
			ds_endereco = '$endereco',
			nm_telefone = '$telefone',
			ds_obs = '$obs'";
			
	$sql = $sql . "where cod_local=$codigoLocal";
    mysqli_query($conn, $sql); 
    
  echo "<hr>";
  echo "<hr>";
	echo "<a href='listagemLocal.php'>Listagem do Local</a>";

	
	
    
    
	?>