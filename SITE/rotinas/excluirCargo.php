<?php
echo "<h2>pagina de exclusão de cargo</h2>";
$codcargo = $_GET ['c'];
echo "eliminando a consulta $codcargo...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de elimina��o
		$sql = "DELETE FROM cargo WHERE cod_cargo = $codcargo";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclus�o $codfuncio: " .
				mysqli_error($con));
	
		echo "registro eliminado <br>";
        echo "<a href='listagemCargos.php'>lista de cargos</a>";

?>