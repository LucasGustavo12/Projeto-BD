<?php

header("Content-Type: text/html; charset=latin1");
$con = mysqli_connect('localhost', 'root', '');

//abrir e selecionando o banco de dados.
mysqli_select_db($con,'clinica') or 
die ("erro na abertura do banco: " .	
mysqli_error($con));		

//criação da variavel com o comando SELECT
$comandoSql = "select * from funcionario";

//se quiser exibir a variavel na tela, retire as barras de comentÃ¡rio abaixo 
//->*echo $comandoSql . "<br>";

// enviar o comando ou variavel para o mysql
$registros = mysqli_query($con, $comandoSql) or 
die("erro na seleção de dados: " .
mysqli_error($con));

//ADICIONAL para caso a tabela esteja vazia
$linhas = mysqli_num_rows($registros);
if ($linhas < 1){ //se for <1 = não existe registro e encerra o programa
    die("Cadastro de funcionarios vazio");
}
//se passar para esse comando, existem registro
echo "Registros encontrados: $linhas <br>";

//listando os dados (linhas) de registros
$contador = 0;
while( $contador < $linhas ){
$dados = mysqli_fetch_array($registros); //esse comando cria uma matriz

$codfuncio = $dados['cod_funcionario'];
$nomefuncio = $dados['nm_funcionario'];
$rgfuncio = $dados['nr_rg'];
$cpffuncio = $dados['nr_cpf'];
$codcargo =  $dados['cod_cargo'];
$nmendereco = $dados['ds_endereco'];
$numero = $dados['nr_numero'];
$cep = $dados['nr_cep'];
$bairro = $dados['ds_bairro'];
$telres = $dados['nr_telres'];
$telcel = $dados['nr_telcel'];

//exibindo dados na tela
echo"Codigo do funcionario: $codfuncio <br>";
echo"Nome do funcionario: $nomefuncio <br>";
echo"Rg do funcionario do funcionario: $rgfuncio <br>";
echo"Codigo do cargo: $codcargo <br>";
echo"Endereï¿½o do funcionario: $nmendereco <br>";
echo"Numero: $numero <br>";
echo"Cep do funcionario: $cep <br>";
echo"Bairro do funcionario: $bairro <br>";
echo"Tel res: $telres <br>";
echo"Tel cel: $telcel <br>";
echo"<td><a href='excluirFuncionario.php?c=$codfuncio'>Excluir<br></a></td>";
echo"<td><a href='alterarFuncionario.php?c=$codfuncio'>Alterar</a></td>";
echo"<hr>"; //separação de registros
$contador++; //incrementando o contador
}
echo "<td> <a href='cadFuncionario.html'>Novo FuncionÃ¡rio </a></td>";

?>