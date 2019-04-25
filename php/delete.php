<?php 

	//Aquí tenemos las variables para la conexion al servidor MySQL
	include 'connection.php';
	//Iniciamos una conexión orientada a objetos
	$conn = new mysqli($server,$user,$pass,$db) or die ("Error al conectar con la base de datos");

	//Recibimos por metodo POST el array checkbox del archivo Bajas.php
	$checkbox = $_POST['checkbox'];

	//Esta variable solo define que usuario 
	//(matícula o id) es quien está dentro de la sesión	
	$user_id = 1;

	//De cada indice obtenemos el "value"
	foreach ($checkbox as $key => $value) {
		$sql = "DELETE FROM cual_tb WHERE id_usuario = $user_id AND id_curso = $value";
		$conn->query($sql);
	}

	//Cerramos conexión
	$conn->close();
	header("Location:../Bajas.html");
 ?>