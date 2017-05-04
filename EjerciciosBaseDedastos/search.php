
<?php
	session_start();

	if(!isset($_SESSION['nombre'])){ 
		echo "Acceso no permitido";
	}else{

	echo "<!DOCTYPE html>";
	echo "<html> ";
	echo "<head>";
	echo "<title></title>";
	echo "</head>";
	echo "<body>";
	echo "<center>";
	echo "<form method='get' action=''>";
	echo "<input type='text' name='search'>";
	echo "<input type='submit' name='submit' value='Buscar en base de datos'>";
	echo "</form>";
	echo "</center>";
	echo "<hr />";
	echo "</body>";




	if(isset($_REQUEST['submit'])){
		$search = $_GET['search'];
		$terms = explode(" ",$search);
		$query = "SELECT * FROM Usuarios WHERE ";

		$i=0;
		foreach ($terms as $each) {
			$i++;

			if($i==1){
				$query .="Nombre Like '%$each%'";
				}else{
					$query .="OR Nombre Like '%$each%'";
				}
		}

		mysql_connect("localhost","root","") or die("Error de conexion");
		mysql_select_db("BaseDePrueba");
		$queryPlus = mysql_query($query);

		$numero = mysql_num_rows($queryPlus);

		echo "$numero resultado(s) encontrados para <b>$search</b>";
		

		if($numero > 0 && $search!=""){
			echo "<table width='90%' align='center' border=2>";
			echo "<tr><td width='40%' align='center' bgcolor='FFFF00'>ID</td>
			<td width='40%' align='center' bgcolor='FFFF00'>NAME</td>
			<td width='40%' align='center' bgcolor='FFFF00'>EMAIL</td>
			<td width='40%' align='center' bgcolor='FFFF00'>PASSWORD</td></tr>";

			while ($row = mysql_fetch_assoc($queryPlus)) {
				
				$id = $row['id'];
				$name = $row['Nombre'];
				$email = $row['Email'];
				$password = $row['Password'];


				echo "<tr><td width='40%' align='center'>$id</td>
					<td width='40%' align='center'>$name</td>
					<td width='40%' align='center'>$email</td>
					<td width='40%' align='center'>$password</td></tr>";

			}
			echo "</table>";
		}else{
			echo "No hay resultados con este nombre";
		}

		mysql_close();
	}else{
		echo "Busca algo...";
	}
	include('user.php');
include('links.php');
}
?>

