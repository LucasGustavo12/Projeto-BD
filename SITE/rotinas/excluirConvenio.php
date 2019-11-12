<?php
echo "<h2>pagina de exclusão de convênio</h2>";
$cod_convenio = $_GET ['c'];
echo "eliminando o convenio $cod_convenio...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de eliminação
		$sql = "DELETE FROM convenio WHERE cod_convenio = $cod_convenio";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclusão $cod_convenio: " .
				mysqli_error($con));
	
		echo "registro eliminado <br>";
		echo "<a href='listagemConvenio.php'>lista de convenio</a>";
?>