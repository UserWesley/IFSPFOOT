<?php

	/*Este arquivo pegará o id do time, passado pelo formulário do arquivo viewMenuArquivo.php, feito isso
	passará como parametro para filtrar os jogadores do respectivoTime*/

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
		<!--  Cabeçalho da tabela jogador com seus atributos -->
		<p>
		<h2 class="text-center">Jogadores</h2>
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
		          	  <th>Posição</th>
		          	  <th>Temperamento</th>
		          	  <th>Estilo</th>
        		</tr> 
      		</thead>
      		<tbody>
      		
		      <?php
				
		      	$jogador = new controllerClassVerificaTime();
		      	$idTime = $_POST['selectTime'];

		      	$jogador->consultaJogador($idTime);     	
		      	
		      ?>
		      
      		</tbody>
    	</table>
	</div>


</body>

</html>