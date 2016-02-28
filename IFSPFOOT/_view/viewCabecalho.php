<?php

	//Iniciando sessão
	session_start();
	
?>

<!DOCTYPE html>

<html>

<head>

</head>

<body>

	<header> 
		Usuario :<?php echo $_SESSION['usuario'];?>
		<a href="../_controller/controllerLogout.php">Sair </a>  
		
	</header>
	
</body>

</html>