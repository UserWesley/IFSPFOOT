<?php
	
	/*Este arquivo serve como um cabeçalho para utilizar o select e verificar 
	 como esta o time selecionado no decorrer do campeonato campeonato */
	
	session_start();

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

	
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
	<h1 class="text-center">Selecione o Time</h1>

	<div class="form-group"> <p>
		<form action= "#" method="POST">
		<label for="idSelectTime">Times</label>
		
		<?php 
			
			//Consulta para resgatar no banco o id e nome do time, assim disponibilizando seus nomes no select
			$consultaTime = 'SELECT id,nome FROM Time';
			$preparaConsultaTime = $conn->query($consultaTime);
			$preparaConsultaTime->execute();
		
			echo "<select id = \"idSelectTime\" name = \"selectTime\">";
		
			$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaTime->fetch()) {
	
				echo "<option value =".$row[0].">".$row[1]."</option>";
		
			}
					
			echo "</select>";
			
			// Caso a variável esteja vazia, define o time fixo na visualização 
			if(empty($_POST['selectTime'])){
				
				$_SESSION['time'] = $_POST['selectTime'] = 1;
			}
			else {
				$_SESSION['time'] = $_POST['selectTime'];
			}
			
		?>
		<input	type="submit" value=" Visualizar">
		
		</form>
		</div>
		
		<!-- Reaproveitamento do arquivo, ele é utilizado pelos arquivo (viewTime.php e viewMenuEscolheTime.php) |
		 Chama o arquivo abaixo passando o id do time por _POST e retorna dados do time -->
		<?php include_once('viewTimeAmostra.php');?>
		 
		<!-- Reaproveitamento do arquivo, ele é utilizado pelos arquivo (viewTime.php e viewMenuEscolheTime.php) | 
		Chama o arquivo abaixo passando o id do time por _POST e retorna jogadores do time-->
		<?php include_once('viewJogadorAmostra.php');?>