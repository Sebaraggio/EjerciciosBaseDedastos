<!DOCTYPE html>
<html>
<head>
	<title>Editar Usuario</title>
</head>
<body>
<?php echo "<h3>Editar Usuario: ".$_REQUEST['name']."</h3>" ?>

<form method="post" action="actualiza.php">
	<table border="0" width="60%">
		<tr>
			<td width="30%">Nombre:</td>
			<td><input type="text" name="nuevoNombre" value="<?php echo $_REQUEST['name']; ?>"></td>
		</tr>
		<tr>
			<td width="30%">Email:</td>
			<td><input type="text" name="nuevoEmail" value="<?php echo $_REQUEST['email']; ?>"></td>
		</tr>
		<tr>
			<td width="30%">Password:</td>
			<td><input type="password" name="nuevoPass" value="<?php echo $_REQUEST['password']; ?>"></td>
		</tr>

	</table>

<input type="submit" name="submit" value="Actualizar">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"/>
</form>


</body>
</html>