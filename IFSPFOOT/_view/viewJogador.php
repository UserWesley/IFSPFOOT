<?php 
	
	/*Este arquivo mostrará todos os dados dos jogadores do time do usuário*/

	session_start();
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
	<h1 class="text-center">Jogadores do Time</h1>
	
	<div class="table-responsive">
    	<table class="table">
      		<thead>
        		<tr class = "info">
        			  <th>Titular</th>
			          <th>Nome</th>
			          <th>Sobrenome</th>
			          <th>Posição</th>
			          <th>Nacionalidade</th>
			          <th>Habilidade</th>
			          <th>Idade</th>
			          <th>Forca</th>
			          <th>Estamina</th>
		          	  <th>Nivel</th>
		          	  <th>Gol</th>
        		</tr> 
      		</thead>
      		
      		<tbody>
		    
		      <?php
		      	
		      	$jogador = new controllerMenu();
		      	
		      	$idDono = $_SESSION['idDono'];
		      	
		      	$jogadores = $jogador->buscaJogador($idDono);
		      		      	
		      	$colunas = 11;
		      	
		      	for($i=0; $i < count($jogadores); $i++) {
		      		echo "<td>".$jogadores[$i]."</td>";
		      		if((($i+1) % $colunas) == 0 )
		      			echo "</tr><tr>";
		      	}
		      	
		      ?>
		      
      		</tbody>
    	</table>
	</div>
</body>

</html>