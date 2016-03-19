<?php
 
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
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
	<h1 class="text-center">Selecione seu Time</h1>

	<div class="form-group"> <p>
		<form action= "#" method="POST">
		<label for="idSelectTime">Times Disponiveis</label>
		
		<?php 
			
			//Consulta para visualizar dados do estádio
			$consultaTime = 'SELECT id,nome FROM Time';
			$preparaConsultaTime = $conn->query($consultaTime);
			$preparaConsultaTime->execute();
		
			echo "<select id = \"idSelectTime\" name = \"selectTime\">";
		
			$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaTime->fetch()) {
	
				echo "<option value =".$row[0].">".$row[1]."</option>";
		
			}
					
			echo "</select>";
			
			if(empty($_POST['selectTime'])){
				
				$_SESSION['time'] = $_POST['selectTime'] = 1;
			}
			else {
				$_SESSION['time'] = $_POST['selectTime'];
			}
			
		?>
		<input	type="submit" value="Selecionar e Visualizar">
		
		</form>
		</div>
		
		<?php include_once('viewTimeAmostra.php');?> 
		
		<?php include_once('viewJogadorAmostra.php');?>  	
		

</html>