<?php 
	
	/*Arquivo será responsável por salvo no banco as informações de estratégia*/
	
	session_start();
	include_once '../_controller/controllerClassMenu.php';
	
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

	<form>
		<h1 class="text-center">Definição Tática do Time</h1>
		<h3 class="text-center">Formação</h3>
		<?php
		 
			$controllerMenu = new controllerClassMenu();
			
			$estrategia = array();
			$formacao = array();
			$agressividade = array();
			
			$estrategia = $controllerMenu->buscaEstrategia();
			$formacao = $controllerMenu->buscaFormacao();
			$agressividade= $controllerMenu->buscaAgressividade();		

			echo "<select id = \"idSelectFormacao\" name = \"selectFormacao\">";
				
			for($i=0; $i < 5; $i++) {
			
				echo "<option value = ".current($formacao).">".next($formacao)."</option>";
				next($formacao);
			}
				
			echo "</select>";
			
		?>
			<h3 class="text-center">Estratégia</h3>
		<?php
			echo "<select id = \"idSelectEstrategia\" name = \"selectEstrategia\">";
			
			for($i=0; $i < 4; $i++) {
					
				echo "<option value = ".current($estrategia).">".next($estrategia)."</option>";
				next($estrategia);
			}
			
			echo "</select>";
		?>
			<h3 class="text-center">Agressividade</h3>
		<?php	
			echo "<select id = \"idSelectAgressividade\" name = \"selectAgressividade\">";
				
			for($i=0; $i < 3; $i++) {
					
				echo "<option value = ".current($agressividade).">".next($agressividade)."</option>";
				next($agressividade);
			}
				
			echo "</select>";
		?>

</body>

</html>