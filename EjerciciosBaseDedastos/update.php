<?php
	session_start();

	if(!isset($_SESSION['nombre'])){
		echo "Acceso no autorizado";
	}else{

	mysql_connect("localhost","root","");
	mysql_select_db("BaseDeprueba");


	$por_pagina = 6;
	
	$pagina_query = mysql_query("SELECT COUNT('id') FROM Usuarios");
	$paginas = ceil(mysql_result($pagina_query, 0) / $por_pagina);

	$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1 ;
	$start = ($pagina - 1) * $por_pagina;

	


	$resultado=mysql_query("SELECT * FROM Usuarios LIMIT $start, $por_pagina");

	echo "<table width='90%' align='center' border=2>";

	echo "<tr><td width='40%' align='center' bgcolor='FFFF00'>ID</td>
		<td width='40%' align='center' bgcolor='FFFF00'>NAME</td>
		<td width='40%' align='center' bgcolor='FFFF00'>EMAIL</td>
		<td width='40%' align='center' bgcolor='FFFF00'>PASSWORD</td></tr>";

	while ($row = mysql_fetch_array($resultado)){

		$id=$row['id'];
		$nombre=$row['Nombre'];
		$email=$row['Email'];
		$password=$row['Password'];

		echo "<tr><td align='center'>
		<a href='edit.php?id=$id&name=$nombre&email=$email&password=$password'>$id</a>
		<td>$nombre</td><td><a href='email.php?email=$email'>$email</a></td><td>$password</td></tr>";
	}
	echo "</table>";
	$anterior = $pagina - 1;
	$siguiente = $pagina + 1;

	echo "<center><p>";
	if(!($pagina<=1)){
		echo "<a href='update.php?pagina=$anterior'>Anterior</a> ";
	}

	if($paginas >= 1){
		for ($x=1;$x<=$paginas;$x++){

			echo ($x == $pagina) ? "<b>$x</b>" : '<a href="?pagina='.$x.'">'.$x.'</a> ' ;
		}
	}
	if($pagina < $paginas){
		echo "<a href='update.php?pagina=$siguiente'>Siguiente</a> ";
	}
	echo "</center>";

	include('user.php');
	include('links.php');
	mysql_close();
}
?>