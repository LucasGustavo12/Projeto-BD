<?php
    $codfuncio          = $_POST['codfuncio'];
    $nomefuncio         = $_POST['nomefuncio'];
    $rgfuncio           = $_POST['rgfuncio'];
    $cpffuncio          = $_POST['cpffuncio'] ;
    $codcargo           = $_POST['codcargo'];
    $nmendereco         = $_POST['nmendereco'];
    $numero             = $_POST['numero'];
    $bairro             = $_POST['bairro'];
    $cep                = $_POST['cep'];
    $telres             = $_POST['telres'];
    $telcel             = $_POST['telcel'];

	// Checkbox veio? 
	// Se não veio, deixo valor padrão na variável

	echo "Codigo do funcionario: $codfuncio <br>";
	echo "Nome do funcionario: $nomefuncio <br>";
    echo "RG do funcionario: $rgfuncio<br>";
    echo "cpf do Funcionario : $cpffuncio <br>";
    echo "Cargo do funcionario: $codcargo <br>";
    echo "Endere�o do funcionario: $nmendereco <br>";
    echo "Numero da residencia: $numero <br>";
    echo "cep: $cep <br>";
    echo "bairro: $bairro <br>";
    echo "telres: $telres <br>";
    echo "telcel: $telcel <br>";
	
	include "conexao.php";

	// 3 - Criando a string de alteração de POST
	$sql = "UPDATE funcionario 
			SET nm_funcionario 	    = '$nomefuncio'	        ,
				nr_rg    	        = '$rgfuncio'           ,
                nr_cpf              = '$cpffuncio'          ,
                cod_cargo           = '$codcargo'           ,
                ds_endereco         = '$nmendereco'         ,
                nr_numero           = '$numero'             ,
                nr_cep              = '$cep'                ,
                ds_bairro           = '$bairro'             ,
                nr_telres           = '$telres'             ,
                nr_telcel           = '$telcel' ";
				
	// finalizando o comando SQL:
	$sql = $sql . " WHERE cod_funcionario = $codfuncio";
	
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
	echo "<a href='listagemFuncionario.php'>Listagem de Funcionarios</a>";
?>