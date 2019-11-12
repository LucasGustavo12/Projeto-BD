<?php
	$cod_laudo= $_POST ['cod_laudo']; 
	$nm_paciente= $_POST ['nm_paciente'];
	$nmr_cpf= (int)$_POST ['nmr_cpf'];
	$nmr_rg= (int)$_POST ['nmr_rg']; //o (int) serve para transformar os textos em numeros, o mesmo ocorre se for numero decimal mudando (int) para (float).
	$nm_pai= $_POST ['nm_pai'];
	$nm_mae= $_POST ['nm_mae'];
	$num_carteira= (int)$_POST ['num_carteira'];
	$ds_endereco= $_POST ['ds_endereco'];
	$num_telres= (int)$_POST ['num_telres'];
	$num_telcel= (int)$_POST ['num_telcel'];
	$email= $_POST ['email'];
	
	echo "Nome completo: $nm_paciente <br>";
	echo "N°CPF: $nmr_cpf <br>";
	echo "N°RG: $nmr_rg <br>";
	echo "Nome do Pai: $nm_pai <br>";
	echo "Nome da Mae: $nm_mae <br>";
	echo "N°Carteira: $num_carteira <br>";
	echo "Endereço: $ds_endereco <br>";
	echo "N°Tel Residencial: $num_telres <br>";
	echo "N°Tel Celular: $num_telcel <br>";
	echo "Email: $email<br>";
		
	if (strlen($nm_paciente)<5)
	{
		echo "Nome de paciente inválido. <br>";
		die ("Programa cancelado !!");
	}
	
	if($nmr_cpf == "")
	{
		echo "Insira número do CPF. <br>";
		die ("Programa Cancelado !!");
	}
	
	if($nmr_rg== "")
	{
		echo "Insira número do RG. <br>";
		die ("Programa Cancelado !!");
	}
	if (strlen($nm_pai)<5)
	{
		echo "Nome do Pai invalido";
		die("Programa Cancelado");
	}
	
	if (strlen($nm_mae)<5)
	{
		echo "Nome da Mae invalido";
		die("Programa Cancelado");
	}
	if($num_carteira== "")
	{
		echo "Insira número do carteira. <br>";
		die ("Programa Cancelado !!");
	}
	
	if($ds_endereco== "")
	{
		echo "Insira nome do endereco. <br>";
		die ("Programa Cancelado !!");
	}
	
	if($num_telres== "")
	{
		echo "Insira número do tel residencial. <br>";
		die ("Programa Cancelado !!");
	}
	if($num_telcel== "")
	{
		echo "Insira número do tel celular. <br>";
		die ("Programa Cancelado !!");
	}
	
	if($email== "")
	{
		echo "Insira o seu email. <br>";
		die ("Programa Cancelado !!");
	}
	$con= mysqli_connect("localhost", "root",""); 
	
	$db= mysqli_select_db ($con,"clinica")or die("Erro na seleção do banco:" . mysqli_error($con));
	
	$sql= "insert into pacientes (cod_paciente,cod_laudo,nm_paciente,nmr_cpf,nmr_rg,nm_pai,nm_mae,num_carteira,ds_endereco,num_telres,num_telcel,email) values(
	'cod_paciente',
	'cod_laudo',
	'nm_paciente',
	'nmr_cpf',
	'nmr_rg',
	'nm_pai',
	'nm_mae',
	'num_carteira',
	'ds_endereco',
	'num_telres',
	'num_telcel',
	'email')";
	 
	 echo "Comando SQL: <hr> $sql <hr>";
	 
	 mysqli_query($con,$sql)or die("Erro na inserção de dados para o MySql:". mysqli_error($con));
?>