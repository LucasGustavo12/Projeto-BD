<?php
echo "<h2>pagina de exclusão de consulta</h2>";
$cod_consulta = $_GET ['c'];
echo "eliminando a consulta $cod_consulta...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de elimina��o
		$sql = "DELETE FROM consultas WHERE cod_consulta = $cod_consulta";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclusão $cod_consulta: " .
				mysqli_error($con));
	
		echo "registro eliminado <br>";
		echo "<a href='listagemConsulta.php'>lista de consultas</a>";
?>