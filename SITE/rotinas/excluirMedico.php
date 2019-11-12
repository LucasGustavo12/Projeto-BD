<?php
echo "<h2>pagina de exclusão</h2>";
$codMedico = $_GET ['c'];
echo "eliminando o médico com o código $codMedico...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de eliminação
		$sql = "DELETE FROM medicos WHERE cod_medico=$codMedico";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclusão $codMedico: " .
				mysqli_error($con));
	
		echo "dados de médico excluido com exito <br>";
		echo "<a href='listaMedicos.php'>listagem de médicos</a>";
?>