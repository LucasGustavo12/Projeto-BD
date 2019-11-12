<html>
	<head>
		<title>Alteração de pacientes</title>
	</head>
	
	<body>
	<fieldset>
		<h2>Alterar Pacientes</h2>
	<?php
		if(! isset($_GET['c']))
			die("Forma de chamada de rotina de alteração incorreta!!");
		
		$codigo=$_GET['c'];
		
		//Conectar no Mysql e abrir o banco
		include 'conexao.php';
		
		//Trazer os dados da tabela
		$sql="select * from pacientes where id=$cod_paciente";
		
		//Executar o comando ($sql) no MySql
		$registro= mysqli_query($con,$sql);
		
		//Encontrou ?
		$linhas= mysqli_num_rows ($registro);
		
		if($linhas <1){
			die('código paciente: $cod_paciente não existe mais !!');
		}
		
		$dados= mysqli_fetch_array($registro);
		
		$cod_paciente= $dados['cod_paciente'];
		$cod_laudo= $dados ['cod_laudo'];
		$nm_paciente= $dados['nm_paciente'];
		$nmr_cpf= $dados['nmr_cpf'];
		$nmr_rg= $dados['nmr_rg'];
		$nm_pai= $dados['nm_pai'];
		$nm_mae= $dados['nm_mae'];
		$num_carteira= $dados['num_carteira'];
		$ds_endereco= $dados['ds_endereco'];
		$num_telres= $dados['num_telres'];
		$num_telcel= $dados['num_telcel'];
		$email= $dados['email'];
		
	?>
		<form	method="post"
				enctype="multipart/form-data"
				action="cadPaciente.php">
			<fieldset>
			<input	type="hidden" name="cod_paciente"
					id="cod_paciente"
					max="1000"
					min="01"
					placeholder="Digite o código do paciente">
			<input	type="hidden" name="cod_laudo"
					id="cod_laudo"
					max="1000"
					min="01"
					placeholder="Digite o cÃ³digo do laudo do paciente">

			Nome completo:
			<input	type="text"
					name="nm_paciente"
					id="nm_paciente"
					maxlength="30"
					size="30"
					placeholder="Digite o nome do Paciente"> <br>
			NÂ°CPF:
			<input	type="text"
					name="nmr_cpf"
					id="nmr_cpf"
					maxlength="11"
					size="11"
					placeholder="Digite o nÃºmero do seu RG"> <br>
			NÂ°RG:
			<input	type="text"
					name="nmr_rg"
					id="nmr_rg"
					maxlength="11"
					size="11"
					placeholder="Digite o número do seu RG"> <br>
			Nome do Pai:
			<input	type="text"
					name="nm_pai"
					id="nm_pai"
					maxlength="30"
					size="30"
					placeholder="Digite o nome do Pai"> <br>
			Nome da MÃ£e:
			<input	type="text"
					name="nm_mae"
					id="nm_mae"
					maxlength="30"
					size="30"
					placeholder="Digite o nome da MÃ£e"> <br>
			</fieldset>
			<fieldset>
			NÂ°Carteira:
			<input	type="text"
					name="num_carteira"
					id="num_carteira"
					maxlength="11"
					size="30"
					placeholder="Digite o número da sua carteira"> <br>
			EndereÃ§o:
			<input	type="text"
					name="ds_endereco"
					id="ds_endereco"
					maxlength="40"
					size="40"
					placeholder="Digite o seu endereço"> <br>
			NÂ°Tel Res:
			<input	type="text"
					name="num_telres"
					id="num_telres"
					maxlength="11"
					size="11"
					placeholder="Digite o número da sua carteira"> <br>
			NÂ°Tel Cel:
			<input	type="text"
					name="num_telcel"
					id="num_telcel"
					maxlength="11"
					size="11"
					placeholder="Digite o número da sua carteira"> <br>
			Email:
			<input 		type="text"
						name="email"
						id="email"
						maxlength="30"
						size="30"
						placeholder="Digite seu email"><br>
			Enviar:
			<input	type="submit"
					value="enviar"
					name="enviar">
			Limpar:
			<input	type="reset"
					value="limpar"
					name="limpar">
			</fieldset>
		</form>			
	</body>
</html>