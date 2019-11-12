<?php
	//LINHA 30 TABELA COM BORDA
	//comando de conexão, 3 informaçoes: endereço; usuario; senha. 
	$con = mysqli_connect('localhost', 'root', '');
	
	//abrir e selecionando o banco de dados.
	mysqli_select_db($con,'clinica') or 
		die ("erro na abertura do banco: " .	//caso dï¿½ erro, ira executar esse comando.
			mysqli_error($con));		//mostra o erro.
	
	//criaï¿½ï¿½o da variavel com o comando SELECT
	$comandoSql = "select * from exames";
	
	//se quiser exibir a variavel na tela, retire as barras de comentï¿½rio abaixo 
	//->*echo $comandoSql . "<br>";
	
	// enviar o comando ou variavel para o mysql
	$registros = mysqli_query($con, $comandoSql) or 
		die("erro na seleï¿½ï¿½o de dados: " .
			mysqli_error($con));
	
	//ADICIONAL para caso a tabela esteja vazia
	$linhas = mysqli_num_rows($registros);
		if ($linhas < 1){ //se for <1 = nï¿½o existe registro e encerra o programa
			die("cadastro de exames");
		}
	//se passar para esse comando, existem registro
	echo "registros encontrados: $linhas <br>";
	
	//listand os dados (linhas) de registros
	$contador = 0;
	//criando a tabela
	echo "<table border='1'";
	//criando a primeira linha (titulos/cabeï¿½alhos)
    echo "<tr>";
    echo "<th>codigo exame</th>";
	echo "<th>codigo receita</th>";
	echo "<th>nome exame</th>";
	echo "<th>descriÃ§ao</th>";
	echo "</tr>";
	

	while( $contador < $linhas ){
		$dados = mysqli_fetch_array($registros); //esse comando cria uma matriz
			
            //colocando dados em variaveis
            $codexame = $dados ['cod_exame'];
			$codreceita = $dados ['cod_receita'];
			$nmexame = $dados ['nm_exame'];
			$dsexame  = $dados ['ds_obs'];
	
	//exibindo dados na tela
	echo "<tr>"; //abrir linha
	echo "<td> $codexame</td>"; // celulas
	echo "<td> $codreceita </td>";
	echo "<td> $nmexame </td>";
	echo "<td> $dsexame </td>";
	echo "<td> <a href='excluirExame.php?c=$codexame'>excluir</a> </td>"; //?c=1($codexame) metodo get
	echo "<td> <a href='alterarExame.php?c=$codexame'>Alterar</a> </td>"; //?c=1($codexame) metodo get
	echo "</tr>"; //fecha linha
	$contador++; //incrementando o contador
	}
	echo "<td> <a href='exames.html'>Novo Exame</a> </td>";
	echo "</table>";
?>