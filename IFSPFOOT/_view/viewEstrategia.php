<?php 
	
	/*Arquivo será responsável por salvo no banco as informações de estratégia*/
	
	session_start();
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	$idTime = $_SESSION['idDono'];
	
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

	<form>
	
		<h1 class="text-center">Estratégia</h1>
		
		<h3 class="text-center">Formação</h3>
		<select id="idFormacao"> 
			<option value="1">5-4-1</option>
			<option value="2">4-5-1</option>
			<option value="3">4-4-2</option>
			<option value="4">4-4-3</option>
			<option value="5">3-5-2</option>
		</select>
		
		<h3 class="text-center">Estilo de jogo</h3>
		<select id="idEstiloJogo"> 
			<option value="1">Ataque Total</option>
			<option value="2">Jogo Equilibrado</option>
			<option value="3">Contra-ataque</option>
			<option value="4">Defesa Total</option>
		</select>
	
	</form>
	<!-- 
	<h3 class="text-center">Selecionar Titulares</h3>
	<div class="table-responsive">
    	<table class="table">
      		<thead>
        		<tr class = "info">
        			  <th>Titular</th>
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
      	
      	$consultaTime = 'SELECT id FROM Time WHERE dono = ? ';
      	$preparaConsultaTime = $conn->prepare($consultaTime);
      	$preparaConsultaTime->bindValue(1,$idTime);
      	$preparaConsultaTime->execute();
      
      	$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
      
      	while ($row = $preparaConsultaTime->fetch()) { 
      		$idTimeJogador = $row[0];     
      		
      	}
      	//Listando Jogadores do time
        $consultaJogador = 'SELECT titular,nome ,sobrenome,posicao,nacionalidade,habilidade ,idade ,forca ,estamina ,nivel,gol FROM Jogador WHERE idTime = ? ';
		$preparaConsultaJogador = $conn->prepare($consultaJogador);
		$preparaConsultaJogador->bindValue(1, $idTimeJogador);
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
            echo "<td>{$row[10]}</td>";
            echo '</tr>';
          }
      ?>
      
        </tbody>
      </table>
	</div>
	 -->
</body>

</html>