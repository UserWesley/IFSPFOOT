<?php
	require_once('../conexao.php');
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
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Time</title>
			<meta charset="utf-8">
	</head>
	<body>
		<?php
			$sql = "INSERT INTO Time
					VALUES ( null 
					   , '$nome'
  		               , '$mascote'
  		               , '$cor'
					   ,  $dono
  		               ,  $dinheiro
					   , '$torcida'
  		               , '$nomeEstadio'
					   ,  $capacidade
  		               ,  $vitoria 
					   ,  $derrota
  		               ,  $empate	
					   ,  $pontos
					   )";

			$dbh->exec($sql);
			
			header("Location: ../indexCrud.php");
		
		?>
	</body>
</html>