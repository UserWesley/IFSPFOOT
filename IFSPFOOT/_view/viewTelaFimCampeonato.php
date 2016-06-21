<?php 
	
	//session_start();
	
	include_once '../_controller/controllerClassFimCampeonato.php';
	
	
	$controllerFimCampeonato = new controllerClassFimCampeonato();

	$timeCampeao = array();
	$artilheiroCampeonato = array();
	
	$timeCampeao = $controllerFimCampeonato->buscarTimeVencedor();
	$artilheiroCampeonato = $controllerFimCampeonato->buscarArtilheiro();

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

	
      	
    <?php
   		echo "<h1 class=\"text-center\">Time Campeão : ".
    	$timeCampeao."</h1>"
      	
    ?>


	<h1 class="text-center">Artilheiro Campeonato</h1>
	
	<div class="table-responsive">
	<table class="table">
      <thead>
        <tr class="info">
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Time</th>
          <th>Gol</th>
        </tr> 
      </thead>
      <tbody>
      	
      	<?php
      	
	      	$colunas = 4;
	      	
	      	for($i=0; $i < count($artilheiroCampeonato); $i++) {
	      		echo "<td>".$artilheiroCampeonato[$i]."</td>";
	      		if((($i+1) % $colunas) == 0 )
	      			echo "</tr><tr>";
	      	}
      	
      	
      	?>
      
      </tbody>
	 </table>
	</div>
	
</body>

</html>
