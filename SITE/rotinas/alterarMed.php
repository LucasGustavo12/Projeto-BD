<html>
<head>
</head>
<body>
<h2> alterando os dados</h2>
<?php

$cod_medico = $_GET['c'];
 
 	//conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "clinica";
	
	//criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);
			
		$sql = "select * from medicos where cod_medico=$cod_medico";
		
	$registro = mysqli_query($conn,$sql);
	
	$dados = mysqli_fetch_array($registro);
	
	$cod_medico = $dados ["cod_medico"];
	$cod_laudo= $dados ["cod_laudo"];
	$nm_medico = $dados ["nm_medico"];
	$nr_rg = $dados ["nr_rg"];
	$nr_cpf = $dados ["nr_cpf"];
	$nr_crm = $dados ["nr_crm"];
	$ds_area = $dados ["ds_area"];
	$nm_usuario = $dados ["nm_usuario"];
	$ds_senha = $dados ["ds_senha"];

	
	
 ?>
 

	
<form 	action="gravarAlteracaoMed.php"
			method="post">
			
			<input type="hidden" type = "int" name="cod_medico"
				   id = "cod_medico" value="<?php echo $cod_medico;?>" maxlength="11"
				   size="25"> <br>
			código do laudo:
			<input type="int" name="cod_laudo"
			id="cod_laudo"  value="<?php echo $cod_laudo;?>" maxlength="11"
			size="25"> <br>
			nome do médico:
			<input type="text" name="nm_medico"
			id="nm_medico"  value="<?php echo $nm_medico;?>" maxlength="100"
			size="25"> <br>
			número de rg:
			<input type="int" name="nr_rg"
			id="nr_rg"  value="<?php echo $nr_rg;?>" maxlength="9"
			size="25"> <br>
			número de cpf:
			<input type="int" name="nr_cpf"
			id="nr_cpf"  value="<?php echo $nr_cpf;?>" maxlength="11"
			size="25"> <br>
			número do CRM:
			<input type="int" name="nr_crm"
			id="nr_crm"  value="<?php echo $nr_crm;?>" maxlength="15"
			size="25"> <br>
			Descrição da area:
			<input type="text" name="ds_area"
			id="ds_area"  value="<?php echo $ds_area;?>" maxlength="100"
			size="120"> <br>
			nome do usuario:
			<input type="text" name="nm_usuario"
			id="nm_usuario"  value="<?php echo $nm_usuario;?>" maxlength="30"
			size="25"> <br>
			Senha:
			<input type="int" name="ds_senha"
			id="ds_senha"  value="<?php echo $ds_senha;?>" maxlength="20"
			size="25"> <br>
			<hr>
	 		<input type="submit" value="Alterar">
			<input type="reset" value="Esquecer">
			</body>
</html>