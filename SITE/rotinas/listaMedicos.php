<?php

$con = mysqli_connect('localhost', 'root', '');
	
	//abrir e selecionando o banco de dados.
	mysqli_select_db($con,'clinica') or 
		die ("erro na abertura do banco: " .	//caso d� erro, ira executar esse comando.
			mysqli_error($con));		//mostra o erro.
	
	//cria��o da variavel com o comando SELECT
	$comandoSql = "select * from medicos";
	
	//se quiser exibir a variavel na tela, retire as barras de coment�rio abaixo 
	//->*echo $comandoSql . "<br>";
	
	// enviar o comando ou variavel para o mysql
	$registros = mysqli_query($con, $comandoSql) or 
		die("erro na sele��o de dados: " .
			mysqli_error($con));
	
	//ADICIONAL para caso a tabela esteja vazia
	$linhas = mysqli_num_rows($registros);
		if ($linhas < 1){ //se for <1 = n�o existe registro e encerra o programa
			die("cadastro de m�dicos");
		}
	//se passar para esse comando, existem registro
	echo "registros encontrados: $linhas <br>";
	
	//listand os dados (linhas) de registros
	$contador = 0;
	while( $contador < $linhas ){
		$dados = mysqli_fetch_array($registros); //esse comando cria uma matriz
			
			//colocando dados em variaveis
			$codMedico = $dados ['cod_medico'];
			$codLaudo = $dados ['cod_laudo'];
			$nomeMed = $dados ['nm_medico'];
			$numRg  = $dados ['nr_rg'];
			$numCpf  = $dados ['nr_cpf'];
			$numCrm = $dados ['nr_crm'];
			$dsArea = $dados ['ds_area'];
			$nomeUser = $dados ['nm_usuario'];
			$senha = $dados ['ds_senha'];
	
	//exibindo dados na tela
	echo "C�digo do m�dico: $codMedico <br>";
	echo "C�digo do laudo: $codLaudo <br>";
	echo "Nome do m�dico: $nomeMed <br>";
	echo "N�mero do RD: $numRg <br>";
	echo "N�mero do CPF: $numCpf <br>";
	echo "N�mero do CRM: $numCrm <br>";
	echo "�rea: $dsArea <br>";
	echo "Nome de Usuario: $nomeUser <br>";
	echo "Senha: $senha<br>";
	echo "<a href='excluirMedico.php?c=$codMedico'>excluir</a> ";
	echo "<a href='alterarMed.php?c=$codMedico'>alterar</a> ";
	echo "<hr>"; //separa��o de registros
	$contador++; //incrementando o contador
	}
	




?>