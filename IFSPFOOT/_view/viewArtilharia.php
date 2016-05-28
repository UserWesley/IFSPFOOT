<?php 
	
	/* Este arquivo mostra a artilharia do campeonato e ordena por número de gols 
	 */

	//Inclusão do arquivo para conexão com o banco de dados PDO
	//include_once '../_model/_bancodedados/modelBancodeDados.php';
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados1.php';
	
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
			
			$artilharia = new controllerMenu();
			
			$artilheiros = array();
			
			$artilheiros = $artilharia->buscaArtilharia();
			
			$colunas = 4;	
			for($i=0; $i < count($artilheiros); $i++) {
				echo "<td>".$artilheiros[$i]."</td>";
				if((($i+1) % $colunas) == 0 )
				echo "</tr><tr>";
			}
		
		?>
		
	  </tbody>
	 </table>
	</div>
	
</body>

</html>