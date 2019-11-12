<?php
	$nm_paciente= $_POST ['nm_paciente'];
	$nm_medico= $_POST ['nm_medico'];
	$ds_laudo= $_POST ['ds_laudo']; //o (int) serve para transformar os textos em numeros, o mesmo ocorre se for numero decimal mudando (int) para (float).
	$dt_laudo= $_POST ['dt_laudo'];
	$hr_laudo= $_POST ['hr_laudo'];
	//$an_exame= $_POST ['an_exame'];
	$car_medico= $_POST ['car_medico'];
	
	echo "Nome completo: $nm_paciente <br>";
	echo "Nome do médico: $nm_medico <br>";
	echo "Descrição do laudo: $ds_laudo <br>";
	echo "Data do laudo: $dt_laudo <br>";
	echo "Horario do laudo: $hr_laudo <br>";
	//echo "Anexar exame: $an_exame <br>";
	echo "Carimbo médico: $car_medico <br>";
			
	if (strlen($nm_paciente)<5)
	{
		echo "Nome de paciente inválido. <br>";
		die ("Programa cancelado !!");
	}
	
	if(strlen($nm_medico)<5)
	{
		echo "Nome do médico inválido. <br>";
		die ("Programa Cancelado !!");
	}
	
	$con= mysqli_connect("localhost", "root",""); 
	
	$db= mysqli_select_db ($con,"clinica")or die("Erro na seleção do banco:" . mysqli_error($con));
	
	$sql= "insert into laudo('nm_paciente','nmr_cpf','nmr_rg','nm_pai','nm_mae','num_carteira','ds_endereco','num_telres','num_telcel','email') values(
	'$nm_paciente',
	'$nm_medico',
	'$ds_laudo',
	'$dt_laudo',
	'$hr_laudo',
	'$car_medico'
)";
//$an_exame	 
	 echo "Comando SQL: <hr> $sql <hr>";
	 
	 mysqli_query($con,$sql)or die("Erro na inserção de dados para o MySql:". mysqli_error($con));
?>