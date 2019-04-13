<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bajas</title>
</head>
<body>
	<form action="delete.php" method="POST">
		<?php 
		
		include("connection.php");
		$user_id = 1; //Usuario que está dentro de la sesión
		$conn = new mysqli($server,$user,$pass,$db) or die ("Error al conectar con la base de datos");

		$sql = "SELECT * FROM cual_tb WHERE id_usuario = $user_id"; //Este query es para ver a que cursos esta inscrito acutalmente el usuario
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()) {
			$id = $row['id_curso']; //Tenemos que asignar en una variable para poder tratarla como un entero

			//Con la variable "$id" sabremos a que cursos esta inscrito y podremos hacer el siguiente query a la tabla de cursos 
			//y solo mostraremos a los que sabremos que está inscrito
			$nombre = $conn->query("SELECT nombre_curso FROM cursos_tb WHERE id = $id "); 
			$row2 = $nombre->fetch_assoc();
			?>
			<input type="checkbox" name="checkbox[]" value="<?php 
			//Aquí pondremos el valor que será la id del curso de la tabla "cual_tb"
			print($id); ?>" > <?php 
			//Aquí pondremos el nombre del curso pero de la tabla de cursos_tb
			print($row2['nombre_curso']);?> <br>
			<?php
		}
		$conn->close();
		?>
		<input type="submit">
	</form>
</body>
</html>