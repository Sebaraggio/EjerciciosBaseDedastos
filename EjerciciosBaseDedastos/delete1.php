<?php

mysql_connect("localhost","root","") or die("Error de conexion");
mysql_select_db("BaseDeprueba");


$resultado=mysql_query("SELECT * FROM Usuarios WHERE id='".$_REQUEST['id']."'");

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

echo "<tr><td align='center'>$id</td>
<td>$nombre</td><td>$email</td><td>$password</td></tr>"
;

}

echo "</table>";

mysql_close();

?>

<form method="post" action="delete2.php">
<p> Estas seguro que deseas borrar al usuario?</p>	
<input type="submit" name="submit" value="SI">
<a href="delete.php"> NO </a>
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"/>
</form>

<?php
include('links.php');
?>