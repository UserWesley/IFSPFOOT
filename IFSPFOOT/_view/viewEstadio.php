<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	session_start();
	$donoTime = $_SESSION['idDono'];
	
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
	<h1 class="text-center">Estádio</h1>
	<div class="table-responsive">
	<table class="table">
	<thead>
        	<tr class = "info">
			    <th>Nome do Estádio</th>
			   	<th>Capacidade</th> 
      		</tr>
      		</thead>
      		<tbody>
	<?php

		//Consulta para visualizar dados do estádio
		$consultaEstadio = 'SELECT nomeEstadio,capacidade FROM Time WHERE dono = ? ';
		$preparaConsultaEstadio = $conn->prepare($consultaEstadio);
		$preparaConsultaEstadio->bindValue(1, $donoTime);
		$preparaConsultaEstadio->execute();
	
		$result = $preparaConsultaEstadio->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaEstadio->fetch()) {
			echo '<tr  class = "active">';
			echo "<td>{$row[0]}</td>";
			echo "<td>{$row[1]}</td>";
			echo "</tr>";
		}
		
	?>
	</table>
	</div>
</body>

</html>