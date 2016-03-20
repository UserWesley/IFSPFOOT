<?php
	require_once('../conexao.php');
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$mascote = $_POST['mascote'];
	$cor = $_POST['cor'];
	$dono = $_POST['dono'];
	$dinheiro = $_POST['dinheiro'];
	$torcida = $_POST['torcida'];
	$nomeEstadio = $_POST['nomeEstadio'];
	$capacidade = $_POST['capacidade'];
	$vitoria = $_POST['vitoria'];
	$derrota = $_POST['derrota'];
	$empate = $_POST['empate'];
	$pontos = $_POST['pontos'];
	
	$sql = "UPDATE Time 
          SET nome  = '$nome'
            , mascote = '$mascote'
			, cor = '$cor'
			, dono = $dono
			, dinheiro = $dinheiro
			, torcida = '$torcida'
			, nomeEstadio = '$nomeEstadio'
			, capacidade = $capacidade
			, vitoria = $vitoria
			, derrota = $derrota
			, empate = $empate
			, pontos = $pontos
          WHERE id = $id";
	$total = $dbh->exec($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Atualizar Time</title>
			<meta charset="utf-8">
	</head>
	<body>
		<?php
			header("Location: ../_view/viewCrudListarTime.php");
		?>
	</body>
</html>