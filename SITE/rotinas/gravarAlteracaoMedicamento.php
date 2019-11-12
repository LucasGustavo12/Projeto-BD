<?php

    $codmed        = $_POST['cod_medicamento'];
    $dssubstancia  = $_POST['ds_substancia'];
    $dscontraind   = $_POST['ds_contraind'];
    $dsgenerico    = $_POST['ds_generico'];

	// Checkbox veio? 
	// Se não veio, deixo valor padrão na variável

	echo "Codigo do Medicamento: $codmed <br>";
	echo "Substancia: $dssubstancia <br>";
    echo "Contraindica��o: $dscontraind <br>";
    echo "descri��o do generico: $dsgenerico <br>";
	
	include "conexao.php";

	// 3 - Criando a string de alteração de POST
	$sql = "UPDATE medicamento 
			SET ds_substancia 	= '$dssubstancia'	,
				ds_contraind	= '$dscontraind'    ,
                ds_generico    =  '$dsgenerico'     
                ";
				
	// finalizando o comando SQL:
	$sql = $sql . " WHERE cod_medicamento = $codmed";
	
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
	echo "Sucesso na altera��o de POST !<br>";
	echo "<hr>";
	echo "<a href='listagemMedicamentos.php'>Listagem de Medicamentos</a>";
?>