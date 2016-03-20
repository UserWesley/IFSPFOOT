<?php
	require_once('../conexao.php');
	$id = $_POST['id'];
	$timeCasa = $_POST['timeCasa'];
	$golCasa = $_POST['golCasa'];
	$golVisitante = $_POST['golVisitante'];
	$timeVisitante = $_POST['timeVisitante'];
	$rodada = $_POST['rodada'];
	
	$sql = "UPDATE Jogo 
          SET timeCasa = '$timeCasa'
            , golCasa = $golCasa
			, golVisitante = $golVisitante
			, timeVisitante = '$timeVisitante'
			, rodada = $rodada			
          WHERE id = $id";
	$total = $dbh->exec($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Atualizar Jogo</title>
			<meta charset="utf-8">
	</head>
	<body>
		<?php
			header("Location: ../_view/viewCrudListarJogo.php");
		?>
	</body>
</html>