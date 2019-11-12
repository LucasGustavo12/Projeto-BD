<html>
	<head>
		<title>Altera��o de Consulta</title>
	</head>
	
	<body>
		<h2>Altera��o de Consulta</h2>
<?php
  if(! isset($_GET['c']))
	die("Forma de chamada da rotina de alteraçăo incorreta!");

	// OK – código informado. Vamos salvá-lo numa variável
	// Năo use acentos em nome de variáveis
	$cod_consulta = $_GET['c'];
	
	// Conectar no MYSQL e abrir o banco 
	include "conexao.php";
	
	// Trazer os dados da tabela
	$sql = "SELECT * FROM consultas WHERE cod_consulta=$cod_consulta";
	
	// Executar o comando ($sql) no MYSQL
	$registro = mysqli_query($con, $sql);
	
	//Encontrou?
	$linhas = mysqli_num_rows($registro);
	
	if($linhas <1)
	{
		// Năo encontrou - interrompo
		die("Consulta: $cod_consulta năo existe mais!!");
    }
  
	
	//die($sql);
	
	// Criar $dados que é um vetor/matriz da 1a linha
	$dados = mysqli_fetch_array($registro);

	// Transferindo dados do vetor p/ variáveis
	$cod_consulta   = $dados["cod_consulta"];
	$dt_consulta    = $dados["dt_consulta"];
    $horario        = $dados["horario"];
    $cod_paciente   = $dados["cod_paciente"] ;
	$nm_paciente    = $dados["nome_paciente"];
    $convenio       = $dados["convenio"];
    $medico         = $dados["medico"];
    $tipo_consulta  = $dados["tipo_consulta"];
    
?>

<form action="gravarAlteracaoConsulta.php" method="POST"
    enctype="multipart/form-data">
    <input 	type="hidden" name="codconsulta"
	value="<?php echo $cod_consulta;?>">
    <fieldset>
        Informe a data da consulta:<br>
        <input type="date" name="dtconsulta"
        id="dtconsulta" value="<?php echo $dt_consulta; ?>"><br>
    
        Horário da consulta:<br>
        <input type="time" name="hconsulta"
        id="hconsulta" min="06:00:00"
        max="23:00:00"value = "<?php echo $horario; ?>"><br>
    </fieldset>
    <hr>
        Código do paciente:<br>
        <input type="number" name="idpaciente"
        id="idpaciente" placeholder="Digite até 4 caracteres"
        min="0000" max="9999"value="<?php echo $cod_paciente; ?>"><br>

        Nome do paciente:<br>
        <input type="text" name="npaciente"
        maxlength="40" size="36"
        id="npaciente" placeholder="Digite o nome do paciente"
        value="<?php echo $nm_paciente; ?>"><br>

        Possui convenio:<br>
        <input type="number" name="pconvenio"
        id="pconvenio" placeholder="0(Não) 1(sim)"
        min="0" max="1"value = "<?php echo $convenio; ?>"> 
    <fieldset>
        Médico:<br>
        <input type="text" name="nmmedico"
        id="nmmedico" maxlength="40" size="35"
        placeholder="Digite o nome do medico"
        value = "<?php echo $medico; ?>"><br>

        Tipo de consulta:<br>
        <input type="text" name="tconsulta"
        id="tconsulta" placeholder="Selecione o tipo de consulta"
        required
        maxlength="40" size="35"
        list="listaconsulta" value = "<?php echo $tipo_consulta; ?>">

        <datalist id="listaconsulta">
				<option value="Ortopedia">
				<option value="Raio-X">
				<option value="Checkup">
				<option value="Tomografia">
				<option value="Vacina">
                <option value="Eletrocardiograma">
		</datalist>
    </fieldset>
        <input type="submit" value="Alterar">
        <input type="reset" value="Limpar Dados">
    </form>
	</body>
</html>