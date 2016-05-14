<?php

	/*Este arquivo mostrará todos jogos do Campeonato e seus atributos
	 */

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

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
	          <th></th>
	          <th>Gol</th>
	          <th>Time Visitante</th>
	          <th>Data</th>
	          <th>Hora</th>
	          <th>Período</th>
	        </tr> 
	      </thead>
	      <tbody>

			<?php
			 
				//Consulta para visualizar jogos e seus atributos
				$consultaJogo = 'SELECT Jogo.timeCasa, Jogo.golCasa, Jogo.golVisitante, Jogo.timeVisitante,
								Rodada.data, Rodada.hora, Rodada.periodo FROM Jogo,Rodada WHERE Jogo.rodada = Rodada.numero ORDER BY Rodada.data';
				$preparaConsultaJogo = $conn->query($consultaJogo);
				$preparaConsultaJogo->execute();
			
				$result = $preparaConsultaJogo->setFetchMode(PDO::FETCH_NUM);
				while ($row = $preparaConsultaJogo->fetch()) {
		
		            echo '<tr class = "active">';
		            echo "<td>{$row[0]}</td>";            
		            echo "<td>{$row[1]}</td>";
		            echo "<td> X </td>";
		            echo "<td>{$row[2]}</td>";  
		            echo "<td>{$row[3]}</td>";
		            echo "<td>{$row[4]}</td>";
		            echo "<td>{$row[5]}</td>";
		            echo "<td>{$row[6]}</td>";
		            echo '</tr>';
		            
		        }
			?>
			
		  </tbody>
    	</table>
	</div>
	
</body>

</html>