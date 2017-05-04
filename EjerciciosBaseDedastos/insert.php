	<?php

	$mypic = $_FILES['upload']['name'];
	$temp = $_FILES['upload']['tmp_name'];
	$type = $_FILES['upload']['type'];

	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$cpassword = $_POST['cpass'];


	if($nombre && $email && $password && $cpassword){

		if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)){

			if(strlen($password)>4){

		if($password==$cpassword){

		mysql_connect("localhost","root","") or die("Error de conexion");
		mysql_select_db("BaseDePrueba");
		
		$usuario = mysql_query("SELECT Nombre From Usuarios WHERE Nombre ='$nombre'");
		
		$contar = mysql_num_rows($usuario);


		$remail = mysql_query("SELECT Email From Usuarios WHERE Email ='$email'");

		$checkMail=mysql_num_rows($remail);


		if($contar!=0 || $checkMail!=0){

			echo "El nombre o el correo ya existen en la db";
		}else{

			if(($type=="image/jpeg") || ($type=="image/jpg") || ($type=="image/bmp")){

				$directory = "./fotos/$nombre/";
				mkdir($directory, 0777, true);
				move_uploaded_file($temp, "fotos/$nombre/$mypic");
				echo "Tu foto de perfil: <p><img border='1' width='70'  src='fotos/$nombre/$mypic'><p>";

				$passwordmd5 = md5($password);
				mysql_query("INSERT INTO Usuarios(Nombre, Email, Password) VALUES ('$nombre','$email','$passwordmd5')");

				$registro =  mysql_affected_rows();
				echo $registro. " lineas afectadas";
				mysql_close();
				}else{
					echo "El archivo no cumple el formato espeficificado (jpeg,jpg,bmp) y tener menos de 10Kb";
				}
			}
		}else{
			echo "Tu password no es igual a la confirmada";
		}
		}else{
			echo "El password debe ser mayor a 4 caracteres";	
		}	
	}else{
		echo "Por favor escribe un email valido!";
	}	

	}else{

		echo "Error uno de los datos es inavlido";

	}
	include('user.php');
	include('links.php');


	?>