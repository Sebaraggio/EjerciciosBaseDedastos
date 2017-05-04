<?php

	mysql_connect("localhost","root","") or die("Error de conexion". mysql_error());
	mysql_select_db("BaseDeprueba");

	$por_pagina = 6;
	
	$pagina_query = mysql_query("SELECT COUNT('id') FROM Usuarios");
	$paginas = ceil(mysql_result($pagina_query, 0) / $por_pagina);

	$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1 ;
	$start = ($pagina - 1) * $por_pagina;

	$query = mysql_query("SELECT Nombre FROM Usuarios LIMIT $start, $por_pagina");

	while ($query_row = mysql_fetch_assoc($query)){
		echo $query_row['Nombre']."<br />";

	}

	$anterior = $pagina - 1;
	$siguiente = $pagina + 1;


	if(!($pagina<=1)){
		echo "<a href='paginacion.php?pagina=$anterior'>Anterior</a> ";
	}

	if($paginas >= 1){
		for ($x=1;$x<=$paginas;$x++){

			echo ($x == $pagina) ? "<b>$x</b>" : '<a href="?pagina='.$x.'">'.$x.'</a> ' ;
		}
	}
	if($pagina < $paginas){
		echo "<a href='paginacion.php?pagina=$siguiente'>Siguiente</a> ";
	}
	
	mysql_close();
?>