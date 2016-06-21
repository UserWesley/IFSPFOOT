<?php
	
	session_start();
	
	include_once '../_controller/controllerClassMenu.php';
	
	$controllerMenu = new controllerClassMenu();
	
	$timeUsuario = array();
	$formacao = array();
	$estrategia = array();
	$agresssividade = array();
	
	$idCampeonato = $_SESSION['IdCampeonato'];
	$idDono = $_SESSION['idDono'];
	$timeUsuario = $controllerMenu->buscaTimeUsuario($idCampeonato,$idDono);
/*	
	$formacao = $controllerMenu->buscaFormacao();
	$estrategia = $controllerMenu->buscaEstrategia();
	$agressividade = $controllerMenu->buscaAgressividade();
	*/
?>	
	
<!DOCTYPE html>

<html>

<head>

	<meta charset= "UTF-8"/>
	
	<title>Página Inicial</title>
	
	<!-- Visualização Mobile" -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Incluindo Bootstrap CSS -->
	<link href="_bootstrap-3.3.6-dist/_css/bootstrap.min.css" rel="stylesheet" media="screen">
	
	<!-- Incluindo Bootstrap JavaScript-->
	<script src="_bootstrap-3.3.6-dist/_js/bootstrap.min.js"></script>
	
	<!-- Incluindo jquery-->
	<script src="_jquery/jquery.js"></script>
	
</head>

<body>
	<h1 class="text-center">Dados do Meu Time</h1>
	
	<?php echo "<h2 class=\"text-center\">Nome : ".$timeUsuario[0]."</h2>" ?>
	
	<?php echo "<h2 class=\"text-center\">Dinheiro : ".$timeUsuario[1]."</h2>" ?>
	
	<?php echo "<h2 class=\"text-center\">Torcida : ".$timeUsuario[2]."</h2>" ?>
	
	</body>

</html>