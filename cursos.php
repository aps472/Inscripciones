<!DOCTYPE html>

<html>



<head>

	<title>Inscripciones</title>

	<link href="css/bootstrap.min.css" rel="stylesheet" />

	<link href="css/form-validation.css" rel="stylesheet" />

	<link href="css/dashboard.css" rel="stylesheet" />

	<?php
    session_start();
    if(isset($_SESSION['SI'])){
    }else{
        header("Location: index.html");
    }
    ?>
</head>



<body>
	
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Hola!!</a>

		<ul class="navbar-nav px-3">

			<li class="nav-item text-nowrap">

				<a class="nav-link" href="#">Cerrar Sesion</a>

			</li>

		</ul>

	</nav>

	<nav class="col-md-2 d-none d-md-block bg-light sidebar">

		<div class="sidebar-sticky">

			<ul class="nav flex-column">

				<li class="nav-item">

					<a class="nav-link" href="registro.html">

						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">

							<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>

							<polyline points="9 22 9 12 15 12 15 22"></polyline>

						</svg>

						Registrar Curso <span class="sr-only">(current)</span>

					</a>

				</li>

				<li class="nav-item">

					<a class="nav-link active" href="cursos.html">

						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">

							<path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>

							<polyline points="13 2 13 9 20 9"></polyline>

						</svg>

						Cursos

					</a>

				</li>

				<li class="nav-item">

					<a class="nav-link" href="#">

						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">

							<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>

							<polyline points="2 17 12 22 22 17"></polyline>

							<polyline points="2 12 12 17 22 12"></polyline>

						</svg>

						Proximamente...

					</a>

				</li>

			</ul>

			<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">

				<span>Agregar Cursos</span>

				<a class="d-flex align-items-center text-muted" href="registro.html">

					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">

						<circle cx="12" cy="12" r="10"></circle>

						<line x1="12" y1="8" x2="12" y2="16"></line>

						<line x1="8" y1="12" x2="16" y2="12"></line>

					</svg>

				</a>

			</h6>

			<ul class="nav flex-column mb-2">

				<li class="nav-item">

					<a class="nav-link" href="#">

						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">

							<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>

							<polyline points="14 2 14 8 20 8"></polyline>

							<line x1="16" y1="13" x2="8" y2="13"></line>

							<line x1="16" y1="17" x2="8" y2="17"></line>

							<polyline points="10 9 9 9 8 9"></polyline>

						</svg>

						Datos Personales

					</a>

				</li>

			</ul>

		</div>

	</nav>

	<div class="container">

		<div class="row">

			<div class="col-md-8 order-md-1">

				<h4 class="mb-3">Mis cursos</h4>



				<?php



				$id_usuario = 1;



				$server     = 'geoconstructor.com';

				$username   = 'geoconst_aps'; 

				$password   = 'Latimusdarken123'; 

				$database   = 'geoconst_APS'; 



				$conexion = new mysqli($server, $username, $password, $database);



				if ($conexion->connect_error)

					die('Error de conexión: ' . $conexion->connect_error);



				$sql = "select *from cual_tb where id_usuario = $id_usuario"; 

				$result = $conexion->query($sql);



				if ($result->num_rows > 0){

					while($row = $result->fetch_assoc()){

						$id_curso = $row['id_curso'];

						$sql2 = "select *from cursos_tb where id = $id_curso";

						$result2 = $conexion->query($sql2);

						while($row2 = $result2->fetch_assoc()){

							?>

							<div class="card" style="width: 18rem;">

								<div class="card-body">

									<h5 class="card-title"><?php echo utf8_encode ($row2['nombre_curso']); ?>.</h5>

									<h6 class="card-subtitle mb-2 text-muted">Docente: <?php echo utf8_encode ($row2['docente_curso']); ?>.</h6>

									<p class="card-text">Periodo: <?php echo $row2['inicio_curso']; ?> - <?php echo $row2['fin_curso']; ?>.</p>

									<a href="#" class="card-link">Ver</a>

									<a href="Bajas.html" class="card-link">Darse de baja</a>

								</div>

							</div>

							<?php           

						} 

					}

				}



				$conexion->close();



				?>

			</div>

		</div>

	</div>

</body>



</html>