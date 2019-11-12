<?php
	header("Content-Type: text/html; charset=latin1");
    //comando de conex? 3 informa?s: endere? usuario; senha. 
    $con = mysqli_connect('localhost', 'root', '');

    //abrir e selecionando o banco de dados.
    mysqli_select_db($con,'clinica') or 
    die ("erro na abertura do banco: " .	//caso d?rro, ira executar esse comando.
    mysqli_error($con));		//mostra o erro.

    //cria? da variavel com o comando SELECT
    $comandoSql = "select * from pacientes";

    //se quiser exibir a variavel na tela, retire as barras de coment?o abaixo 
	//->*echo $comandoSql . "<br>";

    // enviar o comando ou variavel para o mysql
    $registros = mysqli_query($con, $comandoSql) or 
    die("erro na seleção de dados: " .
    mysqli_error($con));

    //ADICIONAL para caso a tabela esteja vazia
	$linhas = mysqli_num_rows($registros);
    if ($linhas < 1){ //se for <1 = n?existe registro e encerra o programa
        die("Cadastro de pacientes vazio");
    }
    //se passar para esse comando, existem registro
    echo "Registros encontrados: $linhas <br>";
   
    //listand os dados (linhas) de registros
	$contador = 0;
	while( $contador < $linhas ){
    $dados = mysqli_fetch_array($registros); //esse comando cria uma matriz
   
    //colocando dados em variaveis OBS as variveis q vem do banco de dados.
    
    $nm_paciente= $dados ['nm_paciente'];
	$nmr_cpf= $dados ['nmr_cpf'];
	$nmr_rg= $dados ['nmr_rg']; //o (int) serve para transformar os textos em numeros, o mesmo ocorre se for numero decimal mudando (int) para (float).
	$nm_pai= $dados ['nm_pai'];
	$nm_mae= $dados ['nm_mae'];
	$num_carteira= $dados ['num_carteira'];
	$ds_endereco= $dados ['ds_endereco'];
	$num_telres= $dados ['num_telres'];
	$num_telcel= $dados ['num_telcel'];
	$email= $dados ['email'];

    
    //exibindo dados na tela
    echo"<tableborder='1'>";
    echo"Nome do paciente: $nm_paciente<br>";
    echo"CPF: $nmr_cpf<br>";
    echo"RG: $nmr_rg<br>";
    echo"Nome do pai: $nm_pai<br>";
    echo"Nome da mãe: $nm_mae<br>";
    echo"Numero da carteira: $num_carteira<br>";
    echo"Endereço: $ds_endereco<br>";
    echo"Tel Residencial: $num_telres<br>";
    echo"Telefone Celular: $num_telcel<br>";
    echo"Email: $email<br>";
    echo"<td><a href='excluirpacientes.php?c=$cod_paciente'>Excluir Consulta</a></td>";
    echo"<hr>"; //separa? de registros
    $contador++; //incrementando o contador
}

?>