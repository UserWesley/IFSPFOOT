<?php
echo "Teste do Algoritmo de analise do jogo";
?>

<!DOCTYPE html>

<html lang="PT-BR">

<head>

	<meta charset= "UTF-8"/>
	<title>Gerenciamento Time</title>
	<link rel="stylesheet" href="_css/cssViewMenu.css">
	<link rel="stylesheet" href="_css/cssView.css">
	
</head>

<body>

	<hr></hr>
	
	<header> <?php include_once "viewTesteMenuAlgoritimoJogo.php"?></header>
	
	<hr></hr>
	
	<section> 
	
	<?php include_once "../_model/modelTesteAlgoritmoAnaliseJogo.php"?>			
	
	</section>
	
	<hr></hr>
	<footer><?php include_once "viewTesteRodape.php"?></footer>	

</body>

</html>