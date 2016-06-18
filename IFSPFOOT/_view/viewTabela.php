<?php
	/* Este arquivo será responsável por mostrar todos os dados da tabela */

	session_start();
	include_once ('../_controller/controllerClassMenu.php');

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

	<h1 class="text-center">Tabela</h1>
	
	<div class="table-responsive">
    
	    <table class="table">
	      <thead>
	        <tr class="info">
	          <!--  <th>Posição</th>-->
	          <th>Nome</th>
	          <th>Vitorias</th>
	          <th>Derrotas</th>
	          <th>Empates</th>
	          <th>Pontos</th>
	        </tr> 
	      </thead>
	      <tbody>
	
			<?php
			
				$idCampeonato = $_SESSION['IdCampeonato'];
				$tabela = new controllerClassMenu();
				$tabela->buscarTabela($idCampeonato);
				
			?>
			
		 </tbody>
	   </table>
	</div>
</body>

</html>