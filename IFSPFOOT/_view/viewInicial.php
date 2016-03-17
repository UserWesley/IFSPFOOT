<?php

	//Incluindo cabecalho na página
	include_once "viewCabecalho.php";
	echo "<hr></hr>";
?>

<!DOCTYPE html>

<html lang="PT-BR">

<head>

	<meta charset= "UTF-8"/>
	<title>Página Inicial</title>
	<link rel="stylesheet" href="_css/cssViewMenu.css">
	<link rel="stylesheet" href="_css/cssView.css">
	
	<!-- Incluindo Bootstrap CSS -->
	<link href="_view/_bootstrap-3.3.6-dist/_css/bootstrap.min.css" rel="stylesheet" media="screen">
	
	<!-- Incluindo Bootstrap JavaScript-->
	<script src="_view/_bootstrap-3.3.6-dist/_js/bootstrap.min.js"></script>
	
	<!-- Incluindo jquery-->
	<script src="_view/_jquery/jquery.js"></script>
</head>

<body>
	
	<header></header>
	
	<section>
	
		<nav>
			<ul>
				
				<li><a href = "../_controller/controllerGerenciaInicio.php">Novo Jogo</a></li>
				
				<li><a href = "viewTelaTime.php">Carregar Jogo</a></li>
				
				<li><a href = "viewEditarJogo.php">Editar Jogo</a></li>
				
			</ul>

		</nav>
		 
	 </section>
	 <hr></hr>
	 <footer><?php include_once "viewRodape.php"?></footer>
	
</body>

</html>