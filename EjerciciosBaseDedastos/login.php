<?php
	session_start();

	$_SESSION['nombre'] = $_POST['nombre'];
	$_SESSION['password'] = md5($_POST['pass']);


	if($_POST){

	if($_SESSION['nombre'] && $_SESSION['password']){
		mysql_connect("localhost","root","") or die("Error de conexion");
		mysql_select_db("BaseDePrueba");
		$query = mysql_query("SELECT * FROM Usuarios WHERE Nombre='".$_SESSION['nombre']."'");
		$numrow = mysql_num_rows($query);

		if($numrow!= 0){
			while($row = mysql_fetch_assoc($query)){

				$bdnombre = $row['Nombre'];
				$bdpassword = $row['Password'];

			}

			if($_SESSION['nombre']==$bdnombre){
				if($_SESSION['password']==$bdpassword){
					header('location: usuarios.php');	


				}else{
					echo "Password Incorrecta";
				}
			}else{
				echo "Nombre invalido";
			}
		}else{
			echo "Este nombre no esta registrado";
		}
	
	}else{
		echo "Usuario y contrasena inavalido";
	}
}else{
	echo "Acceso no autorizado";
	exit;
}
?>