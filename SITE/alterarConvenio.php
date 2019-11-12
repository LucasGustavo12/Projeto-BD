<html>
<head>
</head>
<body>
<h2> alterando os dados</h2>
<?php

$cod_convenio = $_GET['c'];
 
 	//conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "clinica";
	
	//criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);
			
		$sql = "select * from convenio where cod_convenio=$cod_convenio";
		
	$registro = mysqli_query($conn,$sql);
	
	$dados = mysqli_fetch_array($registro);
	
	$codConvenio = $dados ['cod_convenio'];
	$nomePaciente= $dados ["nome_paciente"];
	$numeroConvenio = $dados ["num_convenio"];
	$dataInicio = $dados ["data_inicio"];
	$regiao = $dados ["regiao"];
	

	
	
 ?>
 
 
 <form action="gravarAlteracaoConvenio.php"
			  method="post"
			  enctype="multipart/form-data">
			 <b> 
					 
			 
			  <input type="hidden"
					 name="codigoConvenio"
					 id="codigoConvenio"
					 value="<?php echo $codConvenio;?>"
					 maxlength="4"
					 size="2px"
					 required >
					 
					 
					 
					 Nome do Paciente:
			  <input type="text"
					 name="nomePaciente"
					 value="<?php echo $nomePaciente;?>"
					 maxlength="40"
					 size="15px"
					 required >
					 <br>
					 <br>
			  
			 
			  Número do Convênio:
			  <input type="text"
					 name="numeroConvenio"
					 value="<?php echo $numeroConvenio;?>"
					 maxlength="17"
					 placeholder="Somente números"
					 size="30px"
					 required>
					 <br>
					 <br>
			  
			 Data de Início:
			  <input	type="date"
						name="dataInicio"
						value="<?php echo $dataInicio;?>"
						min="1994-01-01"
						max="2019-12-31">
					 <br>
					 <br>
					 
			 Região:
			  <input type="text"
					 name="regiao"
					 value="<?php echo $regiao;?>"
					 maxlength="17"
					 placeholder="Informe a região"
					 size="15px"
					 required>
					 <br>
					 <br>
		     
							
					 
			  <hr>
			  
			<input type="submit" value="Alterar">
			<input type="reset" value="Esquecer">
			
			</b>
		</form>
		</body>

</html>
 

	
