<?php
 // $cod_receita = $_POST['cod_receita']; //cod_receita � um numero q vai ser gerado aleatorio quando voc� inserir uma nova receita 
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
	
	//criar a conex�o
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);
			
	//variavel select
	$comandoSql = "select * from receitas";
    
    //aqui � o insert para a conex�o
	$sql = "insert into receitas
	(cod_paciente,cod_medico,dt_receita,cod_medicamento,cod_exame,cod_clinica,ds_obs)
	values
	('$cod_paciente','$cod_medico','$dt_receita','$cod_medicamento','$cod_exame','$cod_clinica','$ds_obs')";
    mysqli_query($conn, $sql); 
    
    if(mysqli_insert_id($conn)){
		header("Location: listaReceita.php"); //colocar o nome do seu html

	}else{
		header("Location: cadReceita.html"); //colocar o nome do seu html
	}
			
    /*$line = mysqli_num_rows($registros);
		if($line < 1) {
			die("receitas vazia");
		}
	echo "receitas encontradas: $line <br>";
	
	$count = 0;
	while($count < $line) {
		
	
	echo "c�digo da receita: $cod_receita <br>";
	echo "c�digo do paciente: $cod_paciente <br>";
	echo "c�digo do m�dico: $cod_medico <br>";
	echo "data da receita: $dt_receita <br>";
	echo "c�digo do medicamento: $cod_medicamento <br>";
	echo "c�digo do exame: $cod_exame <br>";
	echo "c�digo da clinica: $cod_clinica <br>";
	echo "observa��o: $ds_obs <br>";
	echo "<hr>";
		$count++;
    }
    */
	?>