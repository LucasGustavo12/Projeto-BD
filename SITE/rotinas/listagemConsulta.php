<?php
	header("Content-Type: text/html; charset=latin1");
    //comando de conexao 3 informaçoes: endereço usuario; senha. 
    $con = mysqli_connect('localhost', 'root', '');

    //abrir e selecionando o banco de dados.
    mysqli_select_db($con,'clinica') or 
    die ("erro na abertura do banco: " .	//caso d?rro, ira executar esse comando.
    mysqli_error($con));		//mostra o erro.

    //criação da variavel com o comando SELECT
    $comandoSql = "select * from consultas";

    //se quiser exibir a variavel na tela, retire as barras de coment?o abaixo 
	//->*echo $comandoSql . "<br>";

    // enviar o comando ou variavel para o mysql
    $registros = mysqli_query($con, $comandoSql) or 
    die("erro na sele? de dados: " .
    mysqli_error($con));

    //ADICIONAL para caso a tabela esteja vazia
	$linhas = mysqli_num_rows($registros);
    if ($linhas < 1){ //se for <1 = n?existe registro e encerra o programa
        die("Cadastro de consultas vazio");
    }
    //se passar para esse comando, existem registro
    echo "Registros encontrados: $linhas <br>";
   
    //listand os dados (linhas) de registros
	$contador = 0;
	while( $contador < $linhas ){
    $dados = mysqli_fetch_array($registros); //esse comando cria uma matriz
   
    //colocando dados em variaveis OBS as variveis q vem do banco de dados.
    
    $cod_consulta = $dados['cod_consulta'];
    $dtconsulta = $dados['dt_consulta'];
    $hconsulta = $dados['horario'];
    $idpaciente = $dados['cod_paciente'];
    $npaciente = $dados['nome_paciente'];
    $pconvenio = $dados['convenio'];
    $nmmedico = $dados['medico'];
    $tconsulta = $dados['tipo_consulta'];

    
    //exibindo dados na tela
    echo"<tableborder='1'>";
    echo"data da consulta: $dtconsulta<br>";
    echo"Hora da consulta: $hconsulta<br>";
    echo"(id) do paciente: $idpaciente<br>";
    echo"Nome do paciente: $npaciente<br>";
    echo"Possui convenio: $pconvenio<br>";
    echo"Nome do medico: $nmmedico<br>";
    echo"Tipo de consulta: $tconsulta<br>";
    echo"<td><a href='excluirconsulta.php?c=$cod_consulta'>Excluir</a><br></td>";
    echo"<td><a href='alterarConsulta.php?c=$cod_consulta'>Alterar</a><br></td>";
    echo"<hr>"; //separa? de registros
    $contador++; //incrementando o contador
}
echo "<td> <a href='consultas.html'>Nova Consulta</a></td>";

?>