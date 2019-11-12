<?php
	header("Content-Type: text/html; charset=latin1");
    //comando de conexão 
    $con = mysqli_connect('localhost', 'root', '');

    //abrir e selecionando o banco de dados.
    mysqli_select_db($con, 'clinica') or 
    die ("erro na abertura do banco: " .	//caso de erro, ira executar esse comando.
    mysqli_error($con));		//mostra o erro.

    //cria? da variavel com o comando SELECT
    $comandoSql = "select * from convenio";

    //se quiser exibir a variavel na tela, retire as barras de comentario abaixo 
	//->*echo $comandoSql . "<br>";

    // enviar o comando ou variavel para o mysql
    $registros = mysqli_query($con, $comandoSql) or 
    die("erro na selecao de dados: " .
    mysqli_error($con));

    //ADICIONAL para caso a tabela esteja vazia
	$linhas = mysqli_num_rows($registros);
    if ($linhas < 1){ //se for <1 = n existe registro e encerra o programa
        die("Cadastro de convenio vazio");
    }
    //se passar para esse comando, existem registro
    echo "Registros encontrados: $linhas <br>";
   
    //listando os dados (linhas) de registros
	$contador = 0;
	while( $contador < $linhas ){
    $dados = mysqli_fetch_array($registros); //esse comando cria uma matriz
   
    //colocando dados em variaveis OBS as variveis q vem do banco de dados.
    
    $codConvenio = $dados['cod_convenio'];
    $nomePaciente = $dados['nome_paciente'];
    $numeroConvenio = $dados['num_convenio'];
    $dataInicio = $dados['data_inicio'];
    $regiao = $dados['regiao'];
    

    /*
    //exibindo dados na tela
    echo"<tableborder='1'>";
    echo"Código do convênio: $codigoConvenio<br>";
    echo"Nome do paciente: $nomePaciente<br>";
    echo"Número do convênio: $num_convenio<br>";
    echo"Data de inicio: $data_inicio<br>";
    echo"Região: $regiao<br>";
    echo"<td><a href='excluirconvenio.php?c=$cod_convenio'>Excluir Convênio</a></td>";
    echo"<hr>"; //separa? de registros
    $contador++; //incrementando o contador
	*/
	
	//exibindo dados na tela
	echo "<tr>"; //abrir linha
	echo "<td> $codConvenio</td><br>"; // celulas
	echo "<td> $nomePaciente</td><br>";
	echo "<td> $numeroConvenio</td><br>";
	echo "<td> $dataInicio</td><br>";
	echo "<td> $regiao</td><br>";
	echo "<td> <a href='excluirConvenio.php?c=$codConvenio'>excluir</a> </td>";
	echo "<td> <a href='alterarConvenio.php?c=$codConvenio'>alterar</a> </td>";
	echo "</tr>"; //fecha linha
	$contador++; //incrementando o contador
	
}
			
?>