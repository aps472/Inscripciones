 	<?php
 	session_start();
 	logout();
 	header("Location: ../index.html");
 	function logout(){
 		unset($_SESSION['SI']);
 	}
 	?>