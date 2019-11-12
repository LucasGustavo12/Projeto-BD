<?php
	header("Content-Type: text/html; charset=latin1");
    //comando de conex? 3 informa?s: endere? usuario; senha. 
    $con = mysqli_connect('localhost', 'root', '');

    //abrir e selecionando o banco de dados.
    mysqli_select_db($con,'clinica') or 
    die ("erro na abertura do banco: " .	//caso de erro, ira executar esse comando.
    mysqli_error($con));		//mostra o erro.

    //cria? da variavel com o comando SELECT
    $comandoSql = "select * from local";

    //se quiser exibir a variavel na tela, retire as barras de comentario abaixo 
	//->*echo $comandoSql . "<br>";

    // enviar o comando ou variavel para o mysql
    $registros = mysqli_query($con, $comandoSql) or 
    die("erro na selecao de dados: " .
    mysqli_error($con));

    //ADICIONAL para caso a tabela esteja vazia
	$linhas = mysqli_num_rows($registros);
    if ($linhas < 1){ //se for <1 = n existe registro e encerra o programa
        die("Cadastro de Local vazio");
    }
    //se passar para esse comando, existem registro
    echo "Registros encontrados: $linhas <br>";
   
    //listando os dados (linhas) de registros
	$contador = 0;
	while( $contador < $linhas ){
    $dados = mysqli_fetch_array($registros); //esse comando cria uma matriz
   
    //colocando dados em variaveis OBS as variveis q vem do banco de dados.
    
    $codigoLocal = $dados['cod_local'];
    $codigoExame = $dados['cod_exame'];
    $numeroClinica = $dados['num_clinica'];
    $endereco = $dados['ds_endereco'];
    $telefone = $dados['nm_telefone'];
	$obs = $dados['ds_obs'];
    

    
    //exibindo dados na tela
    echo"<tableborder='1'>";
    echo"Código do local: $codigoLocal<br>";
    echo"Código do exame: $codigoExame<br>";
    echo"Número da clínica: $numeroClinica<br>";
    echo"Endereço: $endereco<br>";
    echo"Telefone: $telefone<br>";
    echo"OBS: $obs <br>";
    echo"<td><a href='excluirLocal.php?c=$codigoLocal'>Excluir </a> </td>";
	echo"<td><a href='alterarLocal.php?c=$codigoLocal'>Alterar </a> </td>";
    echo"<hr>"; //separa? de registros
    $contador++; //incrementando o contador
}

?>