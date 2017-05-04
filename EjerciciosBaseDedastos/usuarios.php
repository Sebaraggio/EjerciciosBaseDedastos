<?php  
session_start();

if(!isset($_SESSION['nombre'])){
	echo "Acceso no permidio!";
	exit;
}else{

	echo "Bienvenido <b>".$_SESSION['nombre']. "</b> estas dentro de la zona, la CabeZona";
	
	include('user.php');
	include('links.php');
}




?>

