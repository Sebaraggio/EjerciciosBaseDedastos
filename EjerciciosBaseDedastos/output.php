<?php

mysql_connect("localhost","root","") or die("Error de conexion");

mysql_select_db("BaseDePrueba");

$resultado = mysql_query("SELECT * FROM Usuarios");

while($row = mysql_fetch_array($resultado)){
	echo $row['Nombre']." ".$row['Email']." ".$row['Password']."<br/>";
}

include('links.php');
mysql_close();
?>