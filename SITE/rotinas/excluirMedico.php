<?php
echo "<h2>pagina de exclus�o</h2>";
$codMedico = $_GET ['c'];
echo "eliminando o m�dico com o c�digo $codMedico...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de elimina��o
		$sql = "DELETE FROM medicos WHERE cod_medico=$codMedico";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclus�o $codMedico: " .
				mysqli_error($con));
	
		echo "dados de m�dico excluido com exito <br>";
		echo "<a href='listaMedicos.php'>listagem de m�dicos</a>";
?>