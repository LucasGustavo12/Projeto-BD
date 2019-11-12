<html>
	<head>
		<title>Altera��o de Funcionario</title>
	</head>
	
	<body>
		<h2>Altera��o de Funcionario</h2>
<?php
  if(! isset($_GET['c']))
	die("Forma de chamada da rotina de alteraçăo incorreta!");

	// OK – código informado. Vamos salvá-lo numa variável
	// Năo use acentos em nome de variáveis
	$codfuncio = $_GET['c'];
	
	// Conectar no MYSQL e abrir o banco 
	include "conexao.php";
	
	// Trazer os dados da tabela
	$sql = "SELECT * FROM funcionario WHERE cod_funcionario=$codfuncio";
	
	// Executar o comando ($sql) no MYSQL
	$registro = mysqli_query($con, $sql);
	
	//Encontrou?
	$linhas = mysqli_num_rows($registro);
	
	if($linhas <1)
	{
		// Năo encontrou - interrompo
		die("Funcionario: $codigo năo existe mais!!");
    }
  
	
	//die($sql);
	
	// Criar $dados que é um vetor/matriz da 1a linha
	$dados = mysqli_fetch_array($registro);

	// Transferindo dados do vetor p/ variáveis
        $codfuncio  = $dados["cod_funcionario"];
        $nomefuncio = $dados["nm_funcionario"];
        $rgfuncio   = $dados["nr_rg"];
        $cpffuncio  = $dados["nr_cpf"];
        $codcargo   = $dados["cod_cargo"];
        $nmendereco = $dados["ds_endereco"];
        $numero     = $dados["nr_numero"];
        $cep        = $dados["nr_cep"];
        $bairro     = $dados["ds_bairro"];
        $telres     = $dados["nr_telres"];
        $telcel     = $dados["nr_telcel"];
?>

        <form action="gravarAlteracaoFuncionario.php"
        method="POST" enctype="multipart/form-data">
        <input type="hidden" name="codfuncio"
        id="codfuncio"
        min="01" max="999" value="<?php echo $codfuncio;?>"><br>
    
        Nome completo: <br>
        <input type="text" name="nomefuncio"
        id="nomefuncio" maxlength="40"
        size="36" placeholder="Informe o nome completo"
        value="<?php echo $nomefuncio;?>"><br>
        
        N° RG:<br>
        <input type="text" name="rgfuncio"
        id="rgfuncio" placeholder="Somente números"
        value="<?php echo $rgfuncio;?>"><br>
    
        N° CPF:<br>
        <input type="text" name="cpffuncio"
         id="cpffuncio" placeholder="Somente números"
         value="<?php echo $cpffuncio;?>"><br><br>
    
        Código cargo:
        <input type = "number" name="codcargo"
        placeholder="Maximo 2 caracteres"
        id="codcargo"
        min="01" max="99"
        value="<?php echo $codcargo;?>"><br>
        </fieldset>
    
        
        Endereço:<br>
        <textarea name="nmendereco" 
        id="nmendereco" cols="30" rows="5">
        </textarea value="<?php echo $nmendereco?>"><br>
        Número:
        <input type="number" name="numero"
        id="numero"value="<?php echo $numero;?>"><br>
        Bairro:
        <input type="text" name="bairro"
        id="bairro"value ="<?php echo $bairro;?>">
        Cep:
        <input type="number" name="cep"
        id="cep" value="<?php echo $cep;?>"><br>
        
        
        
        Telefones:<br>
         <input type="text" name="telres" 
         id="telRes" placeholder="Res: (00) 0000-0000"
         value="<?php echo $telres;?>">
         <br>
         <input type="text" name=""
         id="telCel" placeholder="Cel: (00) 00000-0000"
         value="<?php echo $telcel;?>">
         <br>
         <br>
         <input type="submit" value="Alterar">
        <input type="reset" value="Limpar Dados">
        </form>
	</body>
</html>