<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cursos</title>
</head>
<body>
	<form action="insert.php" method="POST">
		<?php 
			include("connection.php");

			$conn = new mysqli($server,$user,$pass,$db) or die ("Error al conectar con la base de datos");

			$sql = "SELECT id,nombre_curso FROM cursos_tb";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()) {
			?>
				<input type="checkbox" name="checkbox[]" value="<?php print($row['id']); ?>" > <?php print($row['nombre_curso']);?> <br>
			<?php
			}
			$conn->close();
		 ?>
		<input type="submit">

	</form>
	
</body>
</html>