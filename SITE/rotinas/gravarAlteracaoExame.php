<?php

    $codexame   = $_POST['codexame'];
    $codreceita   = $_POST['codreceita'];
    $nmexame       = $_POST['nmexame'];
    $dsobs  = $_POST['dsexame'];
    

	// Checkbox veio? 
	// Se não veio, deixo valor padrão na variável

	echo "Codigo do exame: $codexame <br>";
	echo "codigo da receita: $codreceita <br>";
    echo "nome do exame: $nmexame <br>";
    echo "Descri��o: $dsobs   <br>";
  
	
	include "conexao.php";

	// 3 - Criando a string de alteração de POST
	$sql = "UPDATE exames 
			SET cod_receita	    = '$codreceita'	,
				nm_exame 	    = '$nmexame'    ,
                ds_obs          = '$dsobs'
                ";
				
	// finalizando o comando SQL:
	$sql = $sql . " WHERE cod_exame = $codexame";
	
	// paramos para exibir o comando SQL de alteração
	// na tela, para enviarmos para o console MYSQL 
	// para efeitos de testes
	//die($sql);
	
	// 4 - Enviando o comando de inserção para o MYSQL
	mysqli_query($con, $sql) or 
		die("Erro na inser��o de registro no banco:" .
			mysqli_error($con) );

	// 5 - Se chegou aqui é porque alterou
	// vou avisar usuário e colocar link p/listagem
	echo "<hr>";
	echo "Sucesso na altera��o de POST !<br>";
	echo "<hr>";
	echo "<a href='listagemExames.php'>Listagem de Exames</a>";
?>