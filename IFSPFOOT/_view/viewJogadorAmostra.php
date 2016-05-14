<?php

	/*Este arquivo pegará o id do time, passado pelo formulário do arquivo viewMenuArquivo.php, feito isso
	passará como parametro para filtrar os jogadores do respectivoTime*/

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
		<!--  Cabeçalho da tabela jogador com seus atributos -->
		<p>
		<h2 class="text-center">Jogadores</h2>
		<div class="table-responsive">
    	<table class="table">
      		<thead>
        		<tr class = "info">
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

      	//Listando Jogadores do time
        $consultaJogador = 'SELECT nome ,sobrenome,posicao,nacionalidade,habilidade ,idade ,forca ,estamina ,nivel,gol FROM Jogador WHERE idTime = ? ';
		$preparaConsultaJogador = $conn->prepare($consultaJogador);
		$preparaConsultaJogador->bindValue(1,$_POST['selectTime']);
		$preparaConsultaJogador->execute();
		
		$result = $preparaConsultaJogador->setFetchMode(PDO::FETCH_NUM);
		
		while ($row = $preparaConsultaJogador->fetch()) {

            echo '<tr  class = "active">';
            echo "<td>{$row[0]}</td>";            
            echo "<td>{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";  
            echo "<td>{$row[3]}</td>";
            echo "<td>{$row[4]}</td>";
            echo "<td>{$row[5]}</td>";
            echo "<td>{$row[6]}</td>";
            echo "<td>{$row[7]}</td>";
            echo "<td>{$row[8]}</td>";
            echo "<td>{$row[9]}</td>";
            echo '</tr>';
          }
		
      ?>
      </tbody>
    </table>
	</div>


</body>

</html>