<html>
	<head>
		<title>Altera��o de Medicamento</title>
	</head>
	
	<body>
		<h2>Altera��o de Medicamento</h2>
<?php
  if(! isset($_GET['c']))
	die("Forma de chamada da rotina de alteraçăo incorreta!");

	// OK – código informado. Vamos salvá-lo numa variável
	// Năo use acentos em nome de variáveis
	$codmed = $_GET['c'];
	
	// Conectar no MYSQL e abrir o banco 
	include "conexao.php";
	
	// Trazer os dados da tabela
	$sql = "SELECT * FROM medicamento WHERE cod_medicamento=$codmed";
	
	// Executar o comando ($sql) no MYSQL
	$registro = mysqli_query($con, $sql);
	
	//Encontrou?
	$linhas = mysqli_num_rows($registro);
	
	if($linhas <1)
	{
		// Năo encontrou - interrompo
		die("medicamento: $codmed năo existe mais!!");
    }
  
	
	//die($sql);
	
	// Criar $dados que é um vetor/matriz da 1a linha
	$dados = mysqli_fetch_array($registro);

	// Transferindo dados do vetor p/ variáveis
	$codmed         = $dados["cod_medicamento"];
	$dssub          = $dados["ds_substancia"];
    $dscontraind    = $dados["ds_contraind"];
    $dsgenerico     = $dados["ds_generico"];
     
?>
<form action="gravarAlteracaoMedicamento.php" method="POST" enctype="multipart/form-data">
	
		<input type="hidden" name="cod_medicamento"
		id="cod_medicamento"maxlength="200" size="20" value="<?php echo $codmed; ?>"><br>	
		        Substancia:
    <input type="text" name="ds_substancia" placeholder="Informe a Substancia" 
		               	id="ds_substancia" maxlength="200" size="20" value = "<?php echo $dssub; ?>"><br>
			    Contraindica��o:
	<input type="text" name="ds_contraind"
	id="ds_contraind" maxlength="200" size="20" value = "<?php echo $dscontraind; ?>"><br>
			
			   descri��o do gen�rico:
	<input type="text" name="ds_generico" placeholder="Descri��o"
	id="ds_generico" maxlength="200" size="20" value = "<?php echo $dsgenerico;?>"><br>
					
			<input type="submit" value="Enviar">
			<input type="reset" value="Limpar Dados">
				
		</form>
	</body>
</html>
