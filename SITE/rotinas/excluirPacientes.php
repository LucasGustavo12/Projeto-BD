<?php
echo "<h2>pagina de exclusão de consulta</h2>";
$cod_paciente = $_GET ['c'];
echo "eliminando o paciente $cod_paciente...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de elimina??o
		$sql = "DELETE FROM pacientes WHERE cod_paciente = $cod_paciente";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclusão $cod_paciente: " .
				mysqli_error($con));
	
		echo "registro eliminado <br>";
		echo "<a href='listagemPacientes.php'>lista de pacientes</a>";
?>