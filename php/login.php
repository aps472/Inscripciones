<?php
	session_start();
	include 'connection.php';
 
 	$conn = new mysqli($server,$user,$pass,$db) or die ("Error al conectar con la base de datos");
 	
 	if(isset($_SESSION['SI'])){
 		//unset($_SESSION['SI']);
 		header("Location: registro.html");
 	}else{
 		if(isset($_POST['correo']) AND isset($_POST['contraseña'])){
 			$usuario=$_POST['correo'];
 			$contraseña= $_POST['contraseña'];
 			$sql = "SELECT * FROM usuarios_tb WHERE correo_usuario='$usuario' AND password_usuario='$contraseña'";
 			$query = $conn->query($sql);
 			if($sqlextraido = $query->fetch_assoc()){
 				$_SESSION['SI']= $sqlextraido['nombre_usuario'];
 				header("Location: registro.html");

 			}else{
 				$error = "Nombre o contraseña incorrectos";
 				header("Location: index.html");
 			}
 		}
 	}
?>