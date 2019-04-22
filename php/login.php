<?php
	session_start();
	include 'connection.php';
 
 	$conn = new mysqli($server,$user,$pass,$db) or die ("Error al conectar con la base de datos");

	$usuario=$_POST['correo'];
	$contraseña=$_POST['contraseña'];
 
	$sql = "SELECT * FROM usuarios_tb WHERE correo_usuario='$usuario' AND password_usuario='$contraseña'";
	if($conn->query($sql)){ 
		$row=mysqli_fetch_array($query);
		$_SESSION['id']=$row['id'];
		header('Location: ../registro.html');
	} else{
		$_SESSION['message']="User not found!";
		header('location:index.php');
	}
?>