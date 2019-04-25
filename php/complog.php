 	<?php
 	session_start();
 	if(isset($_SESSION['SI'])){
 		header("Location: {$_SERVER['HTTP_REFERER']}");
 	}else{
 		header("Location: index.html");
 	}
 	?>