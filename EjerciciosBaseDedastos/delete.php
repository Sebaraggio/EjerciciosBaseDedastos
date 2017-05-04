<?php

session_start();

if(!isset($_SESSION['nombre'])){
	echo "Acceso no permitido";
}else{

mysql_connect("localhost","root","") or die("Error de conexion");
mysql_select_db("BaseDeprueba");

echo "<h3>Escoge un usuario a ser eliminado</h3>";


$resultado=mysql_query("SELECT * FROM Usuarios");

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
<a href='delete1.php?id=$id&name=$nombre&email=$email&password=$password'>$id</a>
<td>$nombre</td><td>$email</td><td>$password</td></tr>"
;

}

echo "</table>";
include('user.php');
include('links.php');
mysql_close();
}
?>