<?php

	/*Este arquivo será responsável por mostrar a rodada que o usuário selecionar no select*/

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
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
				if(!empty($_GET['rodada'])) {
					echo "Rodada :".$rodada = $_GET['rodada'];
				
				}
				else { echo "Rodada :".$rodada = '1';}
				$campeonato = $_SESSION['IdCampeonato'];
				$conn = Database::conexao();
				//Consulta para visualizar jogos da rodada assim como o placar
				$consultaRodada = 'SELECT timeCasa.nome, Jogo.placarCasa, Jogo.placarVisitante, timeVisitante.nome,
								Jogo.data FROM Jogo,Rodada,time as timeCasa, time as timeVisitante WHERE rodada.campeonato = ? 
								and Jogo.rodada = ? and jogo.timeCasa = timeCasa.id 
								and jogo.timeVisitante = timeVisitante.id';
			
				$preparaConsultaRodada = $conn->prepare($consultaRodada);
				$preparaConsultaRodada->bindValue(1,$campeonato);
				$preparaConsultaRodada->bindValue(2,$rodada);
				$preparaConsultaRodada->execute();
			
				$result = $preparaConsultaRodada->setFetchMode(PDO::FETCH_NUM);
				while ($row = $preparaConsultaRodada->fetch()) {
					
					echo '<tr class = "active">';
		            echo "<td>{$row[0]}</td>";            
		            echo "<td>{$row[1]}</td>";
		            
		            echo "<td>{$row[2]}</td>";  
		            echo "<td>{$row[3]}</td>";
		            echo "<td>{$row[4]}</td>";
		            echo '</tr>';
				}
				
			?>
			
		   </tbody>
    	</table>
    </div>
</body>

</html>