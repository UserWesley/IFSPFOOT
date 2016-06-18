<?php
	
	/*Este arquivo serve como um cabeçalho para utilizar o select e verificar 
	 como esta o time selecionado no decorrer do campeonato campeonato */

	session_start();
	include_once '../_controller/controllerClassVerificaTime.php';

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
	<h1 class="text-center">Selecione o Time</h1>

	<div class="form-group"> <p>
		<form action= "#" method="POST">
		<label for="idSelectTime">Times</label>
		
		<?php  
			
			$time = new controllerClassVerificaTime();
					
			$times = array();
			$times = $time->visualizaTime();
					
			echo "<select id = \"idSelectTime\" name = \"selectTime\">";
					
			for($i=0; $i < 20; $i++) {
						
				echo "<option value = ".current($times).">".next($times)."</option>";
				next($times);
			}
					
			echo "</select>";

			// Caso a variavel esteja vazia, define o time fixo na visualização
			if(empty($_POST['selectTime'])){
						
				$_SESSION['time'] = $_POST['selectTime'] = 1;
						
			}
			else {
						
				$_SESSION['time'] = $_POST['selectTime'];
						
			}
			
		?>
		<input	type="submit" value=" Visualizar">
		
		</form>
		</div>
		
		<!-- Reaproveitamento do arquivo, ele é utilizado pelos arquivo (viewTime.php e viewMenuEscolheTime.php) |
		 Chama o arquivo abaixo passando o id do time por _POST e retorna dados do time -->
		<?php include_once('viewTimeAmostra.php');?>
		 
		<!-- Reaproveitamento do arquivo, ele é utilizado pelos arquivo (viewTime.php e viewMenuEscolheTime.php) | 
		Chama o arquivo abaixo passando o id do time por _POST e retorna jogadores do time-->
		<?php include_once('viewJogadorAmostra.php');?>