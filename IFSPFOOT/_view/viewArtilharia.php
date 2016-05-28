<?php 
	
	/* Este arquivo mostra a artilharia do campeonato e ordena por número de gols 
	 */
	
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
	<h1 class="text-center">Artilharia</h1>
	
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
			
			$artilharia = new controllerClassMenu();
			$artilharia->buscaArtilharia();
		
		?>
		
	  </tbody>
	 </table>
	</div>
	
</body>

</html>