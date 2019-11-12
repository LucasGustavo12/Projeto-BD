<?php

$con = mysqli_connect('localhost', 'root', '');
	
	//abrir e selecionando o banco de dados.
	mysqli_select_db($con,'clinica') or 
		die ("erro na abertura do banco: " .	//caso dê erro, ira executar esse comando.
			mysqli_error($con));		//mostra o erro.
	
	//criação da variavel com o comando SELECT
	$comandoSql = "select * from receitas";
	
	//se quiser exibir a variavel na tela, retire as barras de comentário abaixo 
	//->*echo $comandoSql . "<br>";
	
	// enviar o comando ou variavel para o mysql
	$registros = mysqli_query($con, $comandoSql) or 
		die("erro na seleção de dados: " .
			mysqli_error($con));
	
	//ADICIONAL para caso a tabela esteja vazia
	$linhas = mysqli_num_rows($registros);
		if ($linhas < 1){ //se for <1 = não existe registro e encerra o programa
			die("cadastro de receitas");
		}
	//se passar para esse comando, existem registro
	echo "registros encontrados: $linhas <br>";
	
	//listand os dados (linhas) de registros
	$contador = 0;
	while( $contador < $linhas ){
		$dados = mysqli_fetch_array($registros); //esse comando cria uma matriz
			
			//colocando dados em variaveis
			$codReceita = $dados ['cod_receita'];
			$codPaciente = $dados ['cod_paciente'];
			$codMedico = $dados ['cod_medico'];
			$dtReceita = $dados ['dt_receita'];
			$codMedicamento  = $dados ['cod_medicamento'];
			$codExame  = $dados ['cod_exame'];
			$codClinica = $dados ['cod_clinica'];
			$dsObs = $dados ['ds_obs'];
	
	//exibindo dados na tela
	echo "Código do paciente: $codPaciente <br>";
	echo "Código do médico: $codMedico <br>";
	echo "Data da receita: $dtReceita <br>";
	echo "Código do medicamento: $codMedicamento <br>";
	echo "Código do exame: $codExame <br>";
	echo "Código da clinica: $codClinica<br>";
	echo "Notas: $dsObs<br>";
	echo "<a href='excluirReceita.php?c=$codReceita'>excluir</a> ";
	echo "<a href='alterarRec.php?c=$codReceita'>alterar</a>";
	echo "<hr>"; //separação de registros
	$contador++; //incrementando o contador
	}
	




?>