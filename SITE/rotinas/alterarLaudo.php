<html>
	<head>
		<title>Alteração de Laudo</title>
	</head>
	
	<body>
	<fieldset>
		<h2>Alterar Laudos</h2>
	<?php
		if(! isset($_GET['c']))
			die("Forma de chamada de rotina de alteraÃ§Ã£o incorreta!!");
		
		$codigo=$_GET['c'];
		
		//Conectar no Mysql e abrir o banco
		include 'conexao.php';
		
		//Trazer os dados da tabela
		$sql="select * from laudos where id=$cod_laudo";
		
		//Executar o comando ($sql) no MySql
		$registro= mysqli_query($con,$sql);
		
		//Encontrou ?
		$linhas= mysqli_num_rows ($registro);
		
		if($linhas <1){
			die('Código laudo: $cod_laudo não existe mais !!');
		}
		
		$dados= mysqli_fetch_array($registro);
		
		$cod_laudo= $dados ['cod_laudo'];
		$cod_paciente= $dados['cod_paciente'];
		$nm_paciente= $dados['nm_paciente'];
		$nm_medico= $dados['nm_medico'];
		$ds_laudo= $dados['ds_laudo'];
		$dt_laudo= $dados['dt_laudo'];
		$hr_laudo= $dados['hr_laudo'];
		$an_exame= $dados['an_exame'];
		$car_medico= $dados['car_medico'];
				
	?>
		<form	method="post"
				enctype="multipart/form-data"
				action="cadLaudo.php">
			<fieldset>
			<input	type="hidden"
					name="cod_laudo"
					id="cod_laudo"
					max="1000"
					min="01"
					placeholder="Digite o numero do Laudo"> <br>
			<input	type="hidden"
					name="cod_paciente"
					id="cod_paciente"
					max="1000"
					min="01"
					placeholder="Digite o codigo do paciente"> <br>
		Nome do Paciente:
			<input	type="text"
					name="nomePaciente"
					id="nm_paciente"
					maxlength="30"
					size="30"
					placeholder="Digite o nome do paciente"> <br>
			Nome do Médico:
			<input	type="text"
					name="nomeMedico"
					id="nm_medico"
					maxlength="30"
					size="30"
					placeholder="Digite o nome do médico"> <br>
			DescriÃ§Ã£o do Laudo:<br>
			<textarea	name="descricao"
						id="ds_laudo"
						rows="4"
						cols="50">
			</textarea><br>
			Data Laudo:
			<input	name="dataLaudo"
					type="date"
					id="dt_laudo"
					><br>
			Horario Laudo:
			<input	name="horarioLaudo"
					type="time"
					id="hr_laudo"
					><br>
			Anexar exame:
			<input	type="file"
					name="anexar"
					id="an_exame"><br>
			Carimbo médico:
			<input	type="text"
					id="car_medico"
					name="car_medico">
			</fieldset>
			Enviar:
			<input	type="submit"
					value="enviar"
					name="enviar">
			Limpar:
			<input	type="reset"
					value="limpar"
					name="limpar">
		</form>			
	</body>
</html>