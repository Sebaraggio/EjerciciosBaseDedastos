<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<body>
<h2>Registro</h2>
<form enctype="multipart/form-data" method="post" action="insert.php">

<table border="0" width="60%">	

	<tr><td width="10%"> Nombre:</td><td> <input type="text" name="nombre" maxlength="20"> </td></tr>
	<tr><td width="10%">Email: </td><td><input type="text" name="email" maxlength="20"></td></tr>
	<tr><td width="10%">Passowrd: </td><td><input type="password" name="pass" maxlength="20"></td></tr>
	<tr><td width="10%">Confrima Passowrd: </td><td><input type="password" name="cpass" maxlength="20"></td></tr>
	<input type="hidden" name="MAX_FILE_SIZE" value="10000" />
</table>
<p>Escoge una foto de la computadora:<input type="file" name="upload">  </p>

<input type="submit" name="submit" value="Enviar">

</form>

<br />

</body>
</html>
