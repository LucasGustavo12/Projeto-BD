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
	$sql = "insert into medicos
	(cod_medico,cod_laudo,nm_medico,nr_rg,nr_cpf,nr_crm,ds_area,nm_usuario,ds_senha)
	values
	('$cod_medico','$cod_laudo','$nm_medico','$nr_rg','$nr_cpf','$nr_crm','$ds_area','$nm_usuario','$ds_senha')";
    mysqli_query($conn, $sql); 
    
    if(mysqli_insert_id($conn)){
		header("Location: listaMedicos.php"); //colocar o nome do seu html

	}else{
		header("Location: cadMedico.html"); //colocar o nome do seu html
	}
			
    /*$line = mysqli_num_rows($registros);
		if($line < 1) {
			die("receitas vazia");
		}
	echo "receitas encontradas: $line <br>";
	
	$count = 0;
	while($count < $line) {
		
	
	echo "código da receita: $cod_receita <br>";
	echo "código do paciente: $cod_paciente <br>";
	echo "código do médico: $cod_medico <br>";
	echo "data da receita: $dt_receita <br>";
	echo "código do medicamento: $cod_medicamento <br>";
	echo "código do exame: $cod_exame <br>";
	echo "código da clinica: $cod_clinica <br>";
	echo "observação: $ds_obs <br>";
	echo "<hr>";
		$count++;
    }
    */
	?>