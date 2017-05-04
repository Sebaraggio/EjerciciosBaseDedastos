<?php

$id = $_REQUEST['id'];
$nombre = $_REQUEST['nuevoNombre'];
$email = $_REQUEST['nuevoEmail'];
$password = md5($_REQUEST['nuevoPass']);


mysql_connect("localhost","root","") or die("Error de conexion");
mysql_select_db("BaseDePrueba");

$resultado = mysql_query("UPDATE Usuarios SET Nombre='$nombre',
Email='$email', Password='$password' WHERE id = '$id'");

$resultado = mysql_affected_rows();
echo "Se han afetado ".$resultado." lineas";


include('user.php');
include('links.php');
mysql_close();
?>