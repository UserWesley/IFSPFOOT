<?php
	require_once('../conexao.php');
	$titular= $_POST['titular'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$posicao = $_POST['posicao'];
	$nacionalidade = $_POST['nacionalidade'];
	$habilidade = $_POST['habilidade'];
	$idade = $_POST['idade'];
	$forca = $_POST['forca'];
	$idTime = $_POST['idTime'];
	$estamina = $_POST['estamina'];
	$nivel = $_POST['nivel'];
	$gol = $_POST['gol'];	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Jogador</title>
			<meta charset="utf-8">
	</head>
	<body>
		<?php
			$sql = "INSERT INTO Jogador
					VALUES ( null
					   , '$titular'
					   , '$nome'
  		               , '$sobrenome'
  		               , '$posicao'
					   , '$nacionalidade'
  		               , '$habilidade'
					   ,  $idade
  		               ,  $forca
					   ,  $idTime
  		               ,  $estamina 
					   , '$nivel'
  		               ,  $gol					   
					   )";

			$dbh->exec($sql);
			
			header("Location: ../indexCrud.php");
		
		?>
	</body>
</html>