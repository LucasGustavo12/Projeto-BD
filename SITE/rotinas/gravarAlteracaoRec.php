<?php
 // $cod_receita = $_POST['cod_receita']; //cod_receita é um numero q vai ser gerado aleatorio quando você inserir uma nova receita 
	$cod_receita = $_POST['cod_receita'];
	$cod_paciente = $_POST['cod_paciente'];
	$cod_medico = $_POST['cod_medico'];
	$dt_receita = $_POST['dt_receita'];
	$cod_medicamento = $_POST['cod_medicamento'];
	$cod_exame = $_POST['cod_exame'];
	$cod_clinica = $_POST['cod_clinica'];
	$ds_obs = $_POST['ds_obs'];
	
	
	//conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "clinica";
	
	//criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);
			
	//variavel select
	$comandoSql = "select * from receitas";
    
    //aqui é o insert para a conexão
	$sql = "update receitas
			set cod_receita = '$cod_receita',
			cod_paciente = '$cod_paciente',
			cod_medico = '$cod_medico',
			dt_receita = '$dt_receita',
			cod_medicamento = '$cod_medicamento',
			cod_exame = '$cod_exame',
			cod_clinica = '$cod_clinica',
			ds_obs = '$ds_obs'";
			
			
	$sql = $sql . "where cod_receita=$cod_receita";
    mysqli_query($conn, $sql); 
    
  echo "<hr>";
  echo "<hr>";
	echo "<a href='listaReceita.php'>Listagem de receitas</a>";

	
	
    
    
	?>