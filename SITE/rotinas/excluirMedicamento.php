<?php

echo "<h2>pagina de exclusão</h2>";
$codmed = $_GET ['c'];
echo "eliminando o exame codigo $codmed...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de elimina��o
		$sql = "DELETE FROM medicamento WHERE cod_medicamento=$codmed";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclusao $codexame: " .
				mysqli_error($con));
	
		echo "registro eliminado<br>";
		echo "<a href='listagemMedicamentos.php'>listagem de medicamento</a>";



?>