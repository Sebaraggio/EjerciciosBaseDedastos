<?php

mysql_connect("localhost","root","") or die("Error de conexion");
mysql_select_db("BaseDePrueba");

$resultado = mysql_query("DELETE FROM Usuarios where id='".$_REQUEST['id']."'");


echo "El usuario a sido eliminado";


mysql_close();
include('links.php');
?>