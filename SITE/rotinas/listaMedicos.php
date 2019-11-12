<?php

$con = mysqli_connect('localhost', 'root', '');
	
	//abrir e selecionando o banco de dados.
	mysqli_select_db($con,'clinica') or 
		die ("erro na abertura do banco: " .	//caso dê erro, ira executar esse comando.
			mysqli_error($con));		//mostra o erro.
	
	//criação da variavel com o comando SELECT
	$comandoSql = "select * from medicos";
	
	//se quiser exibir a variavel na tela, retire as barras de comentário abaixo 
	//->*echo $comandoSql . "<br>";
	
	// enviar o comando ou variavel para o mysql
	$registros = mysqli_query($con, $comandoSql) or 
		die("erro na seleção de dados: " .
			mysqli_error($con));
	
	//ADICIONAL para caso a tabela esteja vazia
	$linhas = mysqli_num_rows($registros);
		if ($linhas < 1){ //se for <1 = não existe registro e encerra o programa
			die("cadastro de médicos");
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
	echo "Código do médico: $codMedico <br>";
	echo "Código do laudo: $codLaudo <br>";
	echo "Nome do médico: $nomeMed <br>";
	echo "Número do RD: $numRg <br>";
	echo "Número do CPF: $numCpf <br>";
	echo "Número do CRM: $numCrm <br>";
	echo "Área: $dsArea <br>";
	echo "Nome de Usuario: $nomeUser <br>";
	echo "Senha: $senha<br>";
	echo "<a href='excluirMedico.php?c=$codMedico'>excluir</a> ";
	echo "<a href='alterarMed.php?c=$codMedico'>alterar</a> ";
	echo "<hr>"; //separação de registros
	$contador++; //incrementando o contador
	}
	




?>