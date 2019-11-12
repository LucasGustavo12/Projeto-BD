<?php

    $codconsulta   = $_POST['codconsulta'];
    $dtconsulta    = $_POST['dtconsulta'];
    $horario       = $_POST['hconsulta'];
    $cod_paciente  = $_POST['idpaciente'];
    $nm_paciente   = $_POST['npaciente'];
    $convenio      = $_POST['pconvenio'];
    $medico        = $_POST['nmmedico'];
    $tipo_consulta = $_POST['tconsulta'];

	// Checkbox veio? 
	// Se não veio, deixo valor padrão na variável

	echo "Codigo da consulta: $codconsulta <br>";
	echo "Data da consulta: $dtconsulta <br>";
    echo "Horario da consulta: $horario<br>";
    echo "codigo do paciente : $cod_paciente <br>";
    echo "Nome do paciente: $nm_paciente <br>";
    echo "Possui convenio: $convenio <br>";
    echo "Nome do médico: $medico <br>";
    echo "Tipo de consulta: $tipo_consulta <br>";
	
	include "conexao.php";

	// 3 - Criando a string de alteração de POST
	$sql = "UPDATE consultas 
			SET dt_consulta 	= '$dtconsulta'	,
				horario 	    = '$horario'        ,
                cod_paciente    = '$cod_paciente'   ,
                nome_paciente   = '$nm_paciente'  ,
                convenio        = '$convenio'       ,
                medico          = '$medico'         ,
                tipo_consulta   = '$tipo_consulta' ";
				
	// finalizando o comando SQL:
	$sql = $sql . " WHERE cod_consulta = $codconsulta";
	
	// paramos para exibir o comando SQL de alteração
	// na tela, para enviarmos para o console MYSQL 
	// para efeitos de testes
	//die($sql);
	
	// 4 - Enviando o comando de inserção para o MYSQL
	mysqli_query($con, $sql) or 
		die("Erro na inserção de registro no banco:" .
			mysqli_error($con) );

	// 5 - Se chegou aqui é porque alterou
	// vou avisar usuário e colocar link p/listagem
	echo "<hr>";
	echo "Sucesso na alteração de POST !<br>";
	echo "<hr>";
	echo "<a href='listagemConsulta.php'>Listagem de Cargos</a>";
?>