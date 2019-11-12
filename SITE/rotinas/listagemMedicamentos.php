<?php
	//LINHA 30 TABELA COM BORDA
	$con = mysqli_connect('localhost', 'root', '');
	
	//abrir e selecionando o banco de dados.
	mysqli_select_db($con,'clinica') or 
		die ("erro na abertura do banco: " .	//caso dï¿½ erro, ira executar esse comando.
			mysqli_error($con));		//mostra o erro.
	

	$comandoSql = "select * from medicamento";
	
	//se quiser exibir a variavel na tela, retire as barras de comentï¿½rio abaixo 
	//->*echo $comandoSql . "<br>";
	
	// enviar o comando ou variavel para o mysql
	$registros = mysqli_query($con, $comandoSql) or 
		die("erro na seleção de dados: " .
			mysqli_error($con));
	
	//ADICIONAL para caso a tabela esteja vazia
	$linhas = mysqli_num_rows($registros);
		if ($linhas < 1){ //se for <1 = nï¿½o existe registro e encerra o programa
			die("cadastro de medicamentos");
		}
	//se passar para esse comando, existem registro
	echo "registros encontrados: $linhas <br>";
	
	//listand os dados (linhas) de registros
	$contador = 0;
	//criando a tabela
	echo "<table border='1'";
	//criando a primeira linha (titulos/cabeçalhos)
    echo "<tr>";
    echo "<th>Codigo medicamento</th>";
    echo "<th>Substancia</th>";
	echo "<th>Contraindicacao</th>";
	echo "<th>Descricao do Generico</th>";
	echo "</tr>";
	

	while( $contador < $linhas ){
		$dados = mysqli_fetch_array($registros); //esse comando cria uma matriz
			
            //colocando dados em variaveis
            $codmed = $dados ['cod_medicamento'];
			$dssubstancia = $dados ['ds_substancia'];
			$dscontraind = $dados ['ds_contraind'];
			$dsgenerico  = $dados ['ds_generico'];
	
	//exibindo dados na tela
	echo "<tr>"; //abrir linha
	echo "<td> $codmed</td>"; // celulas
	echo "<td> $dssubstancia </td>";
	echo "<td> $dscontraind </td>";
	echo "<td> $dsgenerico </td>";
	echo "<td> <a href='excluirMedicamento.php?c=$codmed'>Excluir</a> </td>"; //?c=1($codexame) metodo get
	echo "<td> <a href='alterarMedicamento.php?c=$codmed'>Alterar</a> </td>"; //?c=1($codexame) metodo get
	echo "</tr>"; //fecha linha
	$contador++; //incrementando o contador
	}
	echo "<td> <a href='medicamentos.html'>Novo Medicamento</a></td>";
	echo "</table>";
?>