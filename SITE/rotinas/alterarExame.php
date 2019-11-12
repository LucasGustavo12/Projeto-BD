<html>
	<head>
		<title>Altera��o de Exame</title>
	</head>
	
	<body>
		<h2>Altera��o de Exame</h2>
<?php
  if(! isset($_GET['c']))
	die("Forma de chamada da rotina de alteração incorreta!");

	// OK â€“ cÃ³digo informado. Vamos salvÃ¡-lo numa variÃ¡vel
	// NÄƒo use acentos em nome de variÃ¡veis
	$codexame = $_GET['c'];
	
	// Conectar no MYSQL e abrir o banco 
	include "conexao.php";
	
	// Trazer os dados da tabela
	$sql = "SELECT * FROM exames WHERE cod_exame=$codexame";
	
	// Executar o comando ($sql) no MYSQL
	$registro = mysqli_query($con, $sql);
	
	//Encontrou?
	$linhas = mysqli_num_rows($registro);
	
	if($linhas <1)
	{
		// NÄƒo encontrou - interrompo
		die("exame: $codexame nao existe mais!!");
    }
  
	
	//die($sql);
	
	// Criar $dados que Ã© um vetor/matriz da 1a linha
	$dados = mysqli_fetch_array($registro);

	// Transferindo dados do vetor p/ variÃ¡veis
	$codexame       = $dados["cod_exame"] ;
	$codreceita     = $dados["cod_receita"];
    $nmexame	    = $dados["nm_exame"] ;
    $dsobs	        = $dados["ds_obs"];	
?>

    <form action="gravarAlteracaoExame.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="codexame" id="codexame"value="<?php echo $codexame; ?>">
	
    Codigo da Receita:		
                    
    <input type="text" name="codreceita" placeholder="Digite o codigo da receita" 
    id="nome" maxlength="50" size="20"  required value="<?php echo $codreceita; ?>"><br><br>
    Tipo de exame:
    <input type="text" name = "nmexame" placeholder = "Digite o nome do exame"
    id="nome" maxlength="50" size="20" value = "<?php echo $nmexame; ?>"><br>				

    Descri��o do exame:<br>
    <textarea name="dsexame"
       rows="10" cols="50"></textarea value="<?php echo $dsobs; ?>"><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpar Dados">
            
    </form>
	</body>
</html>