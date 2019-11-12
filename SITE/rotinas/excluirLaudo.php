<?php
echo "<h2>pagina de exclusão de consulta</h2>";
$cod_laudo = $_GET ['c'];
echo "eliminando o laudo $cod_laudo...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de eliminação
		$sql = "DELETE FROM laudo WHERE cod_laudo= $cod_laudo";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclusão $cod_laudo: " .
				mysqli_error($con));
	
		echo "registro eliminado <br>";
		echo "<a href='listagemLaudo.php'>lista de laudos</a>";
?>