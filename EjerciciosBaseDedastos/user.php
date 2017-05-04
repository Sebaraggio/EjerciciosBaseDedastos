<?php

if(!isset($_SESSION['nombre'])){
	echo "No se ha inciado session aun";
}else{
	$dir = "fotos/".$_SESSION['nombre'];
	$abrir = opendir($dir);

	while(($files = readdir($abrir))!= FALSE){
		if($files!= "." && $files!=".." && $files!="Thumbs.db"){
		echo "<br />";
		echo "<img border='1' width='50' src='$dir/$files'>";
		}
	}
	echo "<a href='logout.php'> Salir de la session</a>";
}

?>