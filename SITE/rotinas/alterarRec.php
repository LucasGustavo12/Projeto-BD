<html>
<head>
</head>
<body>
<h2> alterando receitas</h2>

<?php

	$cod_receita = $_GET['c'];
	
	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "clinica";
	
	$con = mysqli_connect ($servidor, $usuario, $senha, $dbname);
		$sql = "select * from receitas where cod_receita=$cod_receita";
		
	$registro = mysqli_query($con,$sql);
	
	$dados = mysqli_fetch_array($registro);	
	
	$cod_receita = $dados ["cod_receita"];
	$cod_paciente = $dados ["cod_paciente"];
	$cod_medico = $dados ["cod_medico"];
	$dt_receita = $dados  ["dt_receita"];
	$cod_medicamento = $dados ["cod_medicamento"];
	$cod_exame = $dados ["cod_exame"];
	$cod_clinica = $dados ["cod_clinica"];
	$ds_obs = $dados ["ds_obs"];

?>
<form 	action="gravarAlteracaoRec.php"
			method="post">
			
			<input type="hidden" type = "int" name="cod_receita"
				   id = "cod_receita"  value="<?php echo $cod_receita;?>" maxlength="11"
				   size="25"> <br>
			código do paciente:
			<input type="int" name="cod_paciente"
			id="cod_paciente"  value="<?php echo $cod_paciente;?>" maxlength="11"
			size="25"> <br>
			código do médico:
			<input type="int" name="cod_medico"
			id="cod_medico"  value="<?php echo $cod_medico;?>" maxlength="11"
			size="25"> <br>
			Data do registro:
					<input type="date"
							name="dt_receita"
							id="dt_receita"
							 value="<?php echo $dt_receita;?>"
							min="2018-02-20"
							max="2019-12-31">
						<br>
			código do medicamento:
			<input type="int" name="cod_medicamento"
			id="cod_medicamento"  value="<?php echo $cod_medicamento;?>" maxlength="11"
			size="25"> <br>
			
			<input type="hidden" type="int" name="cod_exame"
			id="cod_exame"  value="<?php echo $cod_exame;?>" maxlength="11"
			size="25">
			código da clinica:
			<input type="int" name="cod_clinica"
			id="cod_clinica"  value="<?php echo $cod_clinica;?>" maxlength="11"
			size="25"> <br>
			Observações:
			<input type="text" name="ds_obs"
			id="ds_obs"  value="<?php echo $ds_obs;?>" maxlength="120"
			size="120"> <br>
			
	 		<input type="submit" value="Alterar">
			<input type="reset" value="Esquecer">
			</body>
</html>