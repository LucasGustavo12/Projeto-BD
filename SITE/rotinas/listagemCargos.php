<?php
//comando de conexão, 3 informações: endereço; usuario; senha. 
header("Content-Type: text/html; charset=latin1");
$con = mysqli_connect('localhost', 'root', '');

//abrir e selecionando o banco de dados.
mysqli_select_db($con,'clinica') or 
die ("erro na abertura do banco: " .	//caso de erro, ira executar esse comando.
mysqli_error($con));		//mostra o erro.

//cria��o da variavel com o comando SELECT
$comandoSql = "select * from cargo";

//se quiser exibir a variavel na tela, retire as barras de comentário abaixo 
//->*echo $comandoSql . "<br>";

// enviar o comando ou variavel para o mysql
$registros = mysqli_query($con, $comandoSql) or 
die("erro na sele��o de dados: " .
mysqli_error($con));

//ADICIONAL para caso a tabela esteja vazia
$linhas = mysqli_num_rows($registros);
if ($linhas < 1){ //se for <1 = n�o existe registro e encerra o programa
    die("Cadastro de Cargos vazio");
}
//se passar para esse comando, existem registro
echo "Registros encontrados: $linhas <br>";

//listand os dados (linhas) de registros
$contador = 0;
while( $contador < $linhas ){
$dados = mysqli_fetch_array($registros); //esse comando cria uma matriz

//colocando dados em variáveis
$codcargo = $dados['cod_cargo'];
$ncargo = $dados['nm_cargo'];
$dscargo = $dados['ds_cargo'];

//exibindo dados na tela
echo"Nome do cargo: $ncargo<br>";
echo"Descri��o do cargo: $dscargo<br>";
echo"<td><a href='excluirCargo.php?c=$codcargo'>Excluir</a> </td>";
echo"<td><a href='alterarCargo.php?c=$codcargo'>Alterar</a> <br> </td>";
echo"<hr>"; 
$contador++; //incrementando o contador
}
echo "<td> <a href='cadcargo.html'>Novo Cargo</a></td>";
?>
