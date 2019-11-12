<?php
echo "<h2>pagina de exclusão de funcionario</h2>";
$codfuncio = $_GET ['c'];
echo "eliminando a consulta $codfuncio...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de eliminaçao
		$sql = "DELETE FROM funcionario WHERE cod_funcionario = $codfuncio";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclusão $codfuncio: " .
				mysqli_error($con));
	
		echo "registro eliminado <br>";
		echo "<a href='listagemFuncionario.php'>lista de consultas</a>";

?>