<?php

	/*Este arquivo será responsável por mostrar a rodada que o usuário selecionar no select*/

	include_once '../_controller/controllerClassMenu.php';
	session_start();
	
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

	<h1 class="text-center">Rodada</h1>
	
	<!-- Incluindo cabeçalho da rodada com o select, onde será selecionado a rodada pelo usuário -->
	<?php include 'viewCabecalhoRodada.php'?>
    
    <div class="table-responsive">
	    
	    <table class="table">
	      <thead>
	        <tr class = "info">
	          <th>Time Casa</th>
	          <th>Gol</th>
	          <th>Gol</th>
	          <th>Time Visitante</th>
	          <th>Data</th>
	        </tr> 
	      </thead>
	
	      <tbody>
	      
			<?php
			
				//recebe valor da rodada
				if(!empty($_GET['selectRodada'])) {
					echo "Rodada :".$rodada = $_GET['selectRodada'];
				
				}
				else { echo "Rodada :".$rodada = 1;}
				$campeonato = $_SESSION['IdCampeonato'];
				
				$rodadaNumero = array();
				$controllerMenu = new controllerClassMenu();
				$rodada = $controllerMenu->buscaRodada($rodada, $campeonato);
				
				print_r($rodada);
				
			?>
			
		   </tbody>
    	</table>
    </div>
</body>

</html>