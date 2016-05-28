<?php

	/*Este arquivo mostrará todos jogos do Campeonato e seus atributos
	 */

	include_once '../_controller/controllerMenu.php';
	
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
	<h1 class="text-center">Jogos</h1>
	
	<div class="table-responsive">
    	<table class="table">
	      <thead>
	        <tr class = "info">
	          <th>Time Casa</th>
	          <th>Gol</th>

	          <th>Gol</th>
	          <th>Time Visitante</th>
	          <th>Data</th>
	          <th>Hora</th>
	          <th>Clima</th>
	        </tr> 
	      </thead>
	      <tbody>

			<?php
			 
				$jogo = new controllerMenu();
				
				$jogos = array();
				
				$jogos = $jogo->buscaJogos();
				
				$colunas = 7;	
				for($i=0; $i < count($jogos); $i++) {
					
					echo "<td>".$jogos[$i]."</td>";
					if((($i+1) % $colunas) == 0 )
					echo "</tr><tr>";
				}
		
			?>
			
		  </tbody>
    	</table>
	</div>
	
</body>

</html>