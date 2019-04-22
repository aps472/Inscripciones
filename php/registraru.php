<?php 
	include 'connection.php';
	$nombres = $_POST['nombres'];
	$primerAP = $_POST['primerAP'];
	$segundoAP = $_POST['segundoAP'];
	$correo = $_POST['correo'];
	$contraseña = $_POST['contraseña'];
	$matricula = $_POST['matricula'];
	$estado = 1;
	$tipo = 1;

	$conn = new mysqli($server,$user,$pass,$db) or die ("Error al conectar con la base de datos");

	$sqlQ = "SELECT * FROM usuarios_tb WHERE nombre_usuario=$nombres AND apellidoP_usuario=$primerAP AND apellidoM_usuario= $segundoAP AND correo_usuario= $correo";
	$sql = "INSERT INTO usuarios_tb (nombre_usuario,apellidoP_usuario,apellidoM_usuario,correo_usuario,password_usuario,saldo_usuario,estado_usuario,tipo_usuario) VALUES ('$nombres', '$primerAP', '$segundoAP', '$correo', '$contraseña', '$matricula', $estado, $tipo)";
	if(!($conn->query($sqlQ))){
		echo "si se hizo".'<br />';
		$conn->query($sql) or die (mysqli_error($conn));
	}else{
			echo "no se hizo";
	}

	//Cerramos conexión
	$conn->close();


	//Función para validar campos
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//Ejemplo de funcion para validar campos

	/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	$email = test_input($_POST["email"]);
	$website = test_input($_POST["website"]);
	$comment = test_input($_POST["comment"]);
	$gender = test_input($_POST["gender"]);
	}*/
	header("Location: ../index.html");
?>