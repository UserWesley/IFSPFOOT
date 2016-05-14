<?php
	/* Este arquivo será responsável por mostrar todos os dados da tabela */

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

	<h1 class="text-center">Tabela</h1>
	
	<div class="table-responsive">
    
	    <table class="table">
	      <thead>
	        <tr class="info">
	          <th>Posição</th>
	          <th>Nome</th>
	          <th>Vitorias</th>
	          <th>Derrotas</th>
	          <th>Empates</th>
	          <th>Pontos</th>
	        </tr> 
	      </thead>
	      <tbody>
	
			<?php
			 	
				//Lista Posições
				$posicao =1;
				
				//Listando times ordenado por número de pontos
				$consultaTabela = 'SELECT nome,vitoria,derrota,empate,pontos FROM Time ORDER BY pontos DESC';
				$preparaConsultaTabela = $conn->query($consultaTabela);
				$preparaConsultaTabela->execute();
			
				$result = $preparaConsultaTabela->setFetchMode(PDO::FETCH_NUM);
				while ($row = $preparaConsultaTabela->fetch()) {
					echo '<tr class="active">';
					echo "<td>{$posicao}</td>";
		            echo "<td>{$row[0]}</td>";            
		            echo "<td>{$row[1]}</td>";
		            echo "<td>{$row[2]}</td>";  
		            echo "<td>{$row[3]}</td>";
		            echo "<td>{$row[4]}</td>";
		            echo '</tr>';
		            $posicao++;
				}
			?>
			
		 </tbody>
	   </table>
	</div>
</body>

</html>