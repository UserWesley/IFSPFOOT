<?php
	//Incluindo cabecalho na página
	include_once "viewCabecalho.php";
?>

<!DOCTYPE html>

<html lang="PT-BR">

<head>
	<meta charset= "UTF-8"/>
	<title>Página Inicial</title>
	<link rel="stylesheet" href="_css/cssViewMenu.css">

</head>

<body>
	
	<header></header>
	
	<section>
	
		<nav>
			<ul>
				
				<li><a href = "viewNovoJogo.php">Novo Jogo</a></li>
				
				<li><a href = "viewCarregarJogo.php">Carregar Jogo</a></li>
				
				<li><a href = "viewEditarJogo.php">Editar Jogo</a></li>
				
			</ul>
		
		</nav>
		 
	 </section>
	 
	 <footer><?php include_once "viewRodape.php"?></footer>
	
</body>

</html>