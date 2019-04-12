<?php 
	include ("connection.php");

	$conn = new mysqli($server,$user,$pass,$db) or die ("Error al conectar con la base de datos");

	$checkbox = $_POST['checkbox'];
	$user_id = 1;
	//$sql = "INSERT INTO  (name) VALUES ('Manuel')";
	
	/*if ($conn->query($sql) === TRUE) {
		echo "Grabado Exitosamente";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}*/
	//"INSERT INTO cual_tb WHERE id_usuario = '$user_id' SET id_curso = '$valor' ";
	
	/*foreach ($checkbox as $key => $value) {
		$sql = "INSERT INTO cual_tb SET id_usuario = '$user_id', id_curso = '$value' ";
		$excute = mysqli_query($conn, $sql);
	}*/


	foreach ($checkbox as $key => $value) {
		$sql = "INSERT INTO cual_tb (id_usuario, id_curso) VALUES ($user_id, $value)";
		$conn->query($sql);
	}

	$conn->close();

	/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input($_POST["name"]);
		$email = test_input($_POST["email"]);
		$website = test_input($_POST["website"]);
		$comment = test_input($_POST["comment"]);
		$gender = test_input($_POST["gender"]);
	}*/

	//Función para validar campos
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>