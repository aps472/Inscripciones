<?php 

	//Aquí tenemos las variables para la conexion al servidor MySQL
	include 'connection.php';

	//Iniciamos una conexión orientada a objetos
	$conn = new mysqli($server,$user,$pass,$db) or die ("Error al conectar con la base de datos");

	//Recibimos por metodo POST el array checkbox del archivo Altas.php
	$checkbox = $_POST['checkbox'];

	//Esta variable solo define que usuario 
	//(matícula o id) es quien está dentro de la sesión
	$user_id = 1;


	//De cada indice obtenemos el "value" 
	foreach ($checkbox as $key => $value) {
		$sqlQ = "SELECT id_curso FROM cual_tb WHERE id_curso= $value";
		$result = $conn->query($sqlQ);
		if(!($row = $result->fetch_assoc())){
			$sql = "INSERT INTO cual_tb (id_usuario, id_curso) VALUES ($user_id, $value)";
			$conn->query($sql);
		}
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
	header("Location:../registro.html");
?>