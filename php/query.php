<?php 
	function info(){
		include ("connection.php");
		$conn = new mysqli($server,$user,$pass,$db) or die ("Error al conectar con la base de datos");
		$sql = "SELECT * FROM usuarios_tb WHERE nombre_usuario= '$_SESSION[SI]'";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()){
			echo $row['nombre_usuario'].$row['apellidoP_usuario'].$row['apellidoM_usuario'].$row['correo_usuario'].$row['password_usuario'];
			//echo "id: ".$row['id']." Curso: ".$row['nombre_curso']." Capacidad: ".$row['capacidad_curso']." Aula: ".$row['aula_curso']." Docente: ".$row['docente_curso']." Costo: ".$row['costo_curso']." Periodo: ".$row['inicio_curso']." - ".$row['fin_curso']."<br>";
		}
		$conn->close();
	}
?>