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
        die("Cadastro de laudos vazio");
    }
    //se passar para esse comando, existem registro
    echo "Registros encontrados: $linhas <br>";
   
    //listand os dados (linhas) de registros
	$contador = 0;
	while( $contador < $linhas ){
    $dados = mysqli_fetch_array($registros); //esse comando cria uma matriz
   
    //colocando dados em variaveis OBS as variveis q vem do banco de dados.
    
    $numeroLaudo= $dados ['num_laudo'];
	$nomePaciente= $dados ['nm_paciente'];
	$nomeMedico= $dados ['nm_medico'];
	$descricao= $dados ['ds_laudo'];
	$dataLaudo= $dados ['dt_laudo'];
	$horarioLaudo= $dados ['hr_laudo'];
	$carimbo= $dados ['car_medico'];

    
    //exibindo dados na tela
    echo"<tableborder='1'>";
    echo"Numero do laudo: $numeroLaudo<br>";
    echo"Nome do paciente: $nomePaciente<br>";
    echo"Nome do médico: $nomeMedico<br>";
    echo"Descrição do Laudo: $descricao<br>";
    echo"Data laudo: $dataLaudo<br>";
    echo"Horario laudo: $horarioLaudo<br>";
    echo"Carimbo do medico: $carimbo<br>";
    echo"<td><a href='excluirconsulta.php?c=$cod_laudo'>Excluir Consulta</a></td>";
    echo"<hr>"; //separa? de registros
    $contador++; //incrementando o contador
}

?>