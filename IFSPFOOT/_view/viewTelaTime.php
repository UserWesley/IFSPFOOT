<?php
	
	//Inclui cabeçalho na página
	include_once "viewCabecalho.php";
?>

<!DOCTYPE html>

<html lang="PT-BR">

<head>

	<meta charset= "UTF-8"/>
	<title>Gerenciamento Time</title>
	<link rel="stylesheet" href="_css/cssViewMenu.css">
	
</head>

<body>

	<nav>
	
		<ul>
	
			<li><a href="viewArtilharia.php" target="janela">Artilharia</a></li>
			
			<li><a href="viewEstadio.php" target="janela">Estádio</a></li>

			<li><a href="viewJogador.php" target="janela">Jogadores</a></li>
						
			<li><a href="viewTabela.php" target="janela">Tabela</a></li>
		
		</ul>
	
	</nav>
	
	<section> 
	
		<iframe src="viewJogador.php" name="janela" id="framePrincipal"></iframe>		
	
	</section>
	
	
	<footer><?php include_once "viewRodape.php"?></footer>	

</body>

</html>