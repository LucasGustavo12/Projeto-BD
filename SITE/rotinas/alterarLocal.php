<html>
<head>
</head>
<body>
<h2> alterando os dados</h2>
<?php

$codigoLocal = $_GET['c'];
 
 	//conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "clinica";
	
	//criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);
			
		$sql = "select * from local where cod_local=$codigoLocal";
		
	$registro = mysqli_query($conn,$sql);
	
	$dados = mysqli_fetch_array($registro);
	
	$codigoLocal = $dados ["cod_local"];
	$cod_exame= $dados ["cod_exame"];
	$num_clinica = $dados ["num_clinica"];
	$ds_endereco = $dados ["ds_endereco"];
	$nm_telefone = $dados ["nm_telefone"];
	$ds_obs = $dados ["ds_obs"];
	

	
	
 ?>
 
 
 <form action="gravarAlteracaoLocal.php"
			  method="post"
			  enctype="multipart/form-data">
			 <b> 
					 
			 Código do Local:
			  <input type="text"
					 name="codigoLocal"
					 value="<?php echo $codigoLocal;?>"
					 maxlength="15"
					 size="15px"
					 required >
					 <br>
					 <br>
					 
					 
			 Código do Exame:
			  <input type="text"
					 name="codigoExame"
					 value="<?php echo $cod_exame;?>"
					 maxlength="10"
					 size="15px"
					 required >
					 <br>
					 <br>
			  
			 
			  Número da Clínica:
			  <input type="text"
					 name="numeroClinica"
					 value="<?php echo $num_clinica;?>"
					 maxlength="4"
					 placeholder="Favor informar número completo"
					 size="30px"
					 required>
					 <br>
					 <br>
			  
			 Endereço:
			  <input type="text"
					 name="endereco"
					 value="<?php echo $ds_endereco;?>"
					 maxlength="100"
					 placeholder="Favor informar endereço completo"
					 size="30px"
					 required>
					 <br>
					 <br>
					 
			 Telefone:
			  <input type="text"
					 name="telefone"
					 value="<?php echo $nm_telefone;?>"
					 value="(11)"
				 	 maxlength="13"> 
					 <br>
					 <br>
					 
			 Obs:
			 
			 
			 
			 <textarea name="obs" id="obs" value="<?php echo $ds_obs;?>" cols="30" rows="10"></textarea>
		     
							
					 
			  <hr>
			  
			<input type="submit" value="Alterar">
			<input type="reset" value="Esquecer">
			
			</b>
		</form>
		</body>

</html>
 

	
