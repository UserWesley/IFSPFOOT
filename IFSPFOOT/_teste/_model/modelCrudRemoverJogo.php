<?php
	require_once('../conexao.php');
	$id = $_GET['id'];
	$sql = "DELETE FROM Jogo WHERE id = $id";
	$total = $dbh->exec($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Remover Jogos</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			header("Location: ../indexCrud.php");
		?>
	</body>
</html>