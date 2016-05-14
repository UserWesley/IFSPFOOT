<?php 
	
	/* Este arquivo mostra a artilharia do campeonato e ordena por número de gols 
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
		
			//Listando alguns dados dos jogadores e ordena de forma decrescente
	        $consultaJogador = 'SELECT Jogador.nome, Jogador.sobrenome,Time.nome,Jogador.gol FROM Jogador,Time WHERE Jogador.idTime = Time.id ORDER BY Jogador.gol DESC';
			$preparaConsultaJogador = $conn->query($consultaJogador);
			$preparaConsultaJogador->execute();	
			
			while ($row = $preparaConsultaJogador->fetch()) {
			
				echo '<tr class="active">';
				echo "<td>{$row[0]}</td>";
				echo "<td>{$row[1]}</td>";
				echo "<td>{$row[2]}</td>";
				echo "<td>{$row[3]}</td>";
				echo '</tr>';
			}
		?>
		
	  </tbody>
	 </table>
	</div>
	
</body>

</html>