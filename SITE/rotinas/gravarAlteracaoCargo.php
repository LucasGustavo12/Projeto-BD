<?php	// File - Save As gravarAlteracaoTime.php
	$codcargo	= $_POST['codcargo'];  //cpo escondido/hidden
	$ncargo 	= $_POST['ncargo'];
    $dscargo	= $_POST['dscargo'];
    
	// Checkbox veio? 
	// Se não veio, deixo valor padrão na variável

	echo "codigo do cargo: $codcargo <br>";
	echo "Nome do cargo: $ncargo <br>";
	echo "Descriçao do cargo: $dscargo <br>";
	
	
	include "conexao.php";

	// 3 - Criando a string de alteração de dados
	$sql = "UPDATE cargo 
			SET nm_cargo 	= '$ncargo'			,
				ds_cargo 	= '$dscargo'		";
				
	// finalizando o comando SQL:
	$sql = $sql . " WHERE cod_cargo = $codcargo";
	
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
	echo "Sucesso na alteração de dados !<br>";
	echo "<hr>";
	echo "<a href='listagemCargos.php'>Listagem de Cargos</a>";
?>