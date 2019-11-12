<?php
echo "<h2>pagina de exclusão de local</h2>";
$cod_local = $_GET ['c'];
echo "eliminando o local $cod_local...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de eliminação
		$sql = "DELETE FROM local WHERE cod_local = $cod_local";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclusão $cod_local: " .
				mysqli_error($con));
	
		echo "registro eliminado <br>";
		echo "<a href='listagemLocal.php'>lista de local</a>";
?>