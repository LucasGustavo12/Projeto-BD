<?php
echo "<h2>pagina de exclus�o</h2>";
$codReceita = $_GET ['c'];
echo "eliminando a receita com o c�digo $codReceita...<br>";

		//conectar mysql
		$con = mysqli_connect("localhost","root","");
		
		//abrir banco
		mysqli_select_db($con,"clinica");
		
		//criar string de elimina��o
		$sql = "DELETE FROM receitas WHERE cod_receita=$codReceita";
		
		//mandando o comando para o mysql
		mysqli_query($con, $sql) or
			die ("erro de exclus�o $codReceita: " .
				mysqli_error($con));
	
		echo "receita excluida com exito <br>";
		echo "<a href='listaReceita.php'>listagem de receitas</a>";
?>