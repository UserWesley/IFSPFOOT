<?php 
	
	/*Este arquivo mostrará todos os dados dos jogadores do time do usuário*/

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
	<h1 class="text-center">Jogadores do Time</h1>
	
	<div class="table-responsive">
    	<table class="table">
      		<thead>
        		<tr class = "info">
        			  
			          <th>Nome</th>
			          <th>Sobrenome</th>
			          <th>Nacionalidade</th>
			          <th>Idade</th>
			          <th>Estamina</th>
			          <th>Nivel</th>
			          <th>Gol</th>
			          <th>Posicao</th>
			          <th>Temperamento</th>
			          <th>Estilo</th>
		          	 
        		</tr> 
      		</thead>
      		
      		<tbody>
		    
		      <?php
		      	
		      	$jogador = new controllerClassMenu();   	
		      	$idDono = $_SESSION['idDono'];
		      	$idCampeonato = $_SESSION['IdCampeonato'];
	
		      	$jogador->buscaJogador($idDono,$idCampeonato);
		      	
		      ?>
		      
      		</tbody>
    	</table>
	</div>
</body>

</html>