<?php
	require_once('../conexao.php');
	$timeCasa = $_POST['timeCasa'];
	$golCasa = $_POST['golCasa'];
	$golVisitante = $_POST['golVisitante'];
	$timeVisitante = $_POST['timeVisitante'];
	$rodada = $_POST['rodada'];	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Jogo</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			$sql = "INSERT INTO Jogo
					VALUES ( null 
					   , '$timeCasa'
  		               ,  $golCasa
  		               ,  $golVisitante
					   , '$timeVisitante'
  		               ,  $rodada					   				   
					   )";

			$dbh->exec($sql);
			
			header("Location: ../indexCrud.php");
			
		?>
	</body>
</html>