<?php

    $dtconsulta = $_POST['dtconsulta'];
    $hconsulta = $_POST['hconsulta'];
    $idpaciente = $_POST['idpaciente'];
    $npaciente = $_POST['npaciente'];
    $pconvenio = $_POST['pconvenio'];
    $nmmedico = $_POST['nmmedico'];
    $tconsulta = $_POST['tconsulta'];
   
    /*
    echo"data da consulta: $dtconsulta<br>";
    echo"hora consulta: $hconsulta<br>";
    echo"idpaciente: $idpaciente<br>";
    echo"nome paciente: $npaciente<br>";
    echo"possui convenio: $pconvenio<br>";
    echo"nomemedico: $nmmedico<br>";
    echo"tipo consulta: $tconsulta<br>";
    */
    
    //conexao
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
    $dbname = "clinica";
    
    //criar a conexão
	$con = mysqli_connect ($servidor, $usuario, $senha, $dbname);

    $sql = "insert into consultas
	(dt_consulta,horario,cod_paciente,nome_paciente,convenio,medico,tipo_consulta)
	values
	('$dtconsulta','$hconsulta','$idpaciente','$npaciente','$pconvenio','$nmmedico','$tconsulta')";
    mysqli_query($con, $sql);
    
    if(mysqli_insert_id($con)){
		header("Location: cadFuncionario.html");

	}else{
		header("Location: cadFuncionario.html");
	}
?>