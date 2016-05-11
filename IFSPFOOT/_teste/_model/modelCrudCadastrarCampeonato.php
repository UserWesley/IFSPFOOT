<?php
	require_once('../conexao.php');
	$nome = $_POST['nome'];
	$rodadaAtual = $_POST['rodadaAtual'];
	$temporada = $_POST['temporada'];
	$vencedor = $_POST['vencedor'];	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Campeonato</title>
			<meta charset="utf-8">
	</head>
	<body>
		<?php
			$sql = "INSERT INTO Campeonato
					VALUES ( null
					   , '$nome'
					   ,  $rodadaAtual
  		               ,  $temporada
  		               , '$vencedor'					   				   
					   )";

			$dbh->exec($sql);
	
			header("Location: ../indexCrud.php");

		?>
	</body>
</html>