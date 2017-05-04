	<!DOCTYPE html>
	<html>
	<head>
		<title>Enviar Email</title>
	</head>
	<body>

	<form method="post" action="">
		<table border="1" width="25%">
			<tr>
				<td width="10px">Para:</td>
				<td><input type="text" name="para" size="20" value="<?php echo $_REQUEST['email']; ?>"></td>
			</tr>
			<tr>
				<td width="10px">Asunto:</td>
				<td><input type="text" name="asunto" size="20"></td>
			</tr>
			<tr>
				<td width="10px">Mensaje:</td>
				<td><textarea name="mensaje" cols="30" rows="5"></textarea></td>
			</tr>
			
		</table>

		<p>
			<input type="submit" name="submit" value="Enviar Email">
		</p>
	</form>

	<?php
	if(isset($_REQUEST['submit'])){
		
		$para = $_REQUEST['para'];
		$asunto = $_REQUEST['asunto'];
		$mensaje = $_REQUEST['mensaje'];
		$de = "falseti@noexisto.com";
		$headers = "From: $de";

		if($para && $asunto && $mensaje){
			mail($para, $asunto, $mensaje, $headers);
			echo "Tu email ha sido enviado!";
			header("Refresh:4; url=usuarios.php");
		}else{
			echo "Faltan parametros para el envio de correo";
		}

	}

	?>
	</body>
	</html>