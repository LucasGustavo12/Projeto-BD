<html>
	<head>
		<title>Alteraçao de Cargo</title>
	</head>
	
	<body>
		<h2>Alteração de Cargo</h2>
<?php
  if(! isset($_GET['c']))
	die("Forma de chamada da rotina de alteração incorreta!");

	// OK â€“ cÃ³digo informado. Vamos salvÃ¡-lo numa variÃ¡vel
	// NÄƒo use acentos em nome de variÃ¡veis
	$codcargo = $_GET['c'];
	
	// Conectar no MYSQL e abrir o banco 
	include "conexao.php";
	
	// Trazer os dados da tabela
	$sql = "SELECT * FROM cargo WHERE cod_cargo=$codcargo";
	
	// Executar o comando ($sql) no MYSQL
	$registro = mysqli_query($con, $sql);
	
	//Encontrou?
	$linhas = mysqli_num_rows($registro);
	
	if($linhas <1)
	{
		// NÄƒo encontrou - interrompo
		die("Cargo: $codcargo nao existe mais!!");
    }
  
	
	//die($sql);
	
	// Criar $dados que Ã© um vetor/matriz da 1a linha
	$dados = mysqli_fetch_array($registro);

	// Transferindo dados do vetor p/ variÃ¡veis
	$codcargo   = $dados["cod_cargo"] ;
	$ncargo     = $dados["nm_cargo"];
	$dscargo	    = $dados["ds_cargo"] ;	
?>

<form action="gravarAlteracaoCargo.php" method="post">
        <input 	type="hidden" name="codcargo"
		value="<?php echo $codcargo; ?>">
        <fieldset>
        Nome do Cargo:<br>
        <input type="text" name="ncargo" id="ncargo"
        placeholder="Digite o nome do cargo"
        size="36"value="<?php echo $ncargo; ?>"><br>
        Descrição do Cargo: <br>
        <textarea name="dscargo" id="dscargo" 
		    rows="10" cols="30"><?php echo $dscargo;?></textarea>
        <hr>
        <input type="submit" value="Cadastrar">
        <input type="reset" value="Limpar Dados">
        </form>
	</body>
</html>