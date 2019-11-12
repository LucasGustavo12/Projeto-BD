<?php
 // $cod_receita = $_POST['cod_receita']; //cod_receita é um numero q vai ser gerado aleatorio quando você inserir uma nova receita 
	$cod_medico = $_POST['cod_medico'];
	$cod_laudo = $_POST['cod_laudo'];
	$nm_medico = $_POST['nm_medico'];
	$nr_rg = $_POST['nr_rg'];
	$nr_cpf = $_POST['nr_cpf'];
	$nr_crm = $_POST['nr_crm'];
	$ds_area = $_POST['ds_area'];
	$nm_usuario = $_POST['nm_usuario'];
	$ds_senha = $_POST['ds_senha'];
	
	//conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "clinica";
	
	//criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);
			
	//variavel select
	$comandoSql = "select * from medicos";
    
    //aqui é o insert para a conexão
	$sql = "update medicos
			set cod_medico = '$cod_medico',
			cod_laudo = '$cod_laudo',
			nm_medico = '$nm_medico',
			nr_rg = '$nr_rg',
			nr_cpf = '$nr_cpf',
			nr_crm = '$nr_crm',
			ds_area = '$ds_area',
			nm_usuario = '$nm_usuario',
			ds_senha = '$ds_senha'";
			
	$sql = $sql . "where cod_medico=$cod_medico";
    mysqli_query($conn, $sql); 
    
  echo "<hr>";
  echo "<hr>";
	echo "<a href='listaMedicos.php'>Listagem de medicos</a>";

	
	
    
    
	?>