<?php
    $codfuncio = $_POST['codfuncio'];
    $nomefuncio = $_POST['nomefuncio'];
    $rgfuncio = $_POST['rgfuncio'];
    $cpffuncio = $_POST['cpffuncio'];
    $codcargo =  $_POST['codcargo'];
    $nmendereco = $_POST['nmendereco'];
    $numero = $_POST['numero'];
    $cep = $_POST['cep'];
    $bairro = $_POST['bairro'];
    $telres = $_POST['telres'];
	$telcel = $_POST['telcel'];
	
	/*echo"codigo do funcionario: $codfuncio <br>";
	echo"nome do funcionario: $nomefuncio <br>";
	echo"rg do funcionario do funcionario: $rgfuncio <br>";
	echo"codigo do cargo: $codcargo <br>";
	echo"endereço do funcionario: $nmendereco <br>";
	echo"numero: $numero <br>";
	echo"cep do funcionario: $cep <br>";
	echo"bairro do funcionario: $bairro <br>";
	echo"telres: $telres <br>";
	echo"telcel: $telcel <br>";
	*/

	//conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "clinica";

	//criar a conexão
	$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);

	$sql = "insert into funcionario
	(nm_funcionario,nr_rg,nr_cpf,cod_cargo,ds_endereco,nr_numero,nr_cep,ds_bairro,nr_telres,nr_telcel)
	values
	('$nomefuncio','$rgfuncio','$cpffuncio','$codcargo','$nmendereco','$numero','$cep','$bairro','$telres','$telcel')";
	mysqli_query($conn, $sql);
	
	if(mysqli_insert_id($conn)){
		header("Location: cadFuncionario.html");

	}else{
		header("Location: cadFuncionario.html");
	}
	
?>