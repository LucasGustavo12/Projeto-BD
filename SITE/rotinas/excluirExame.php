<?php
echo "<h2>pagina de exclusão</h2>";
$codexame = $_GET ['c'];
echo "eliminando o exame codigo $codexame...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de eliminação
		$sql = "DELETE FROM exames WHERE cod_exame=$codexame";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclusao $codexame: " .
				mysqli_error($con));
	
		echo "registro eliminado<br>";
		echo "<a href='listagemExames.php'>listagem de Exames</a>";
?>