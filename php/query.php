<?php 
	include ("connection.php");
	
	function info(){
		$conn = new mysqli($server,$user,$pass,$db) or die ("Error al conectar con la base de datos");
		$sql = "SELECT * FROM cursos_tb";
		$result = $conn->query($sql);
		
		while ($row = $result->fetch_assoc()){
			echo "id: ".$row['id']." Curso: ".$row['nombre_curso']." Capacidad: ".$row['capacidad_curso']." Aula: ".$row['aula_curso'].
				 " Docente: ".$row['docente_curso']." Costo: ".$row['costo_curso']." Periodo: ".$row['inicio_curso']." - ".$row['fin_curso']."<br>";
		}
		$conn->close();
	}
	
?>