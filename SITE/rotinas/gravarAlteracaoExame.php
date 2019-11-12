<?php

    $codexame   = $_POST['codexame'];
    $codreceita   = $_POST['codreceita'];
    $nmexame       = $_POST['nmexame'];
    $dsobs  = $_POST['dsexame'];
    

	// Checkbox veio? 
	// Se n√£o veio, deixo valor padr√£o na vari√°vel

	echo "Codigo do exame: $codexame <br>";
	echo "codigo da receita: $codreceita <br>";
    echo "nome do exame: $nmexame <br>";
    echo "DescriÁ„o: $dsobs   <br>";
  
	
	include "conexao.php";

	// 3 - Criando a string de altera√ß√£o de POST
	$sql = "UPDATE exames 
			SET cod_receita	    = '$codreceita'	,
				nm_exame 	    = '$nmexame'    ,
                ds_obs          = '$dsobs'
                ";
				
	// finalizando o comando SQL:
	$sql = $sql . " WHERE cod_exame = $codexame";
	
	// paramos para exibir o comando SQL de altera√ß√£o
	// na tela, para enviarmos para o console MYSQL 
	// para efeitos de testes
	//die($sql);
	
	// 4 - Enviando o comando de inser√ß√£o para o MYSQL
	mysqli_query($con, $sql) or 
		die("Erro na inserÁ„o de registro no banco:" .
			mysqli_error($con) );

	// 5 - Se chegou aqui √© porque alterou
	// vou avisar usu√°rio e colocar link p/listagem
	echo "<hr>";
	echo "Sucesso na alteraÁ„o de POST !<br>";
	echo "<hr>";
	echo "<a href='listagemExames.php'>Listagem de Exames</a>";
?>