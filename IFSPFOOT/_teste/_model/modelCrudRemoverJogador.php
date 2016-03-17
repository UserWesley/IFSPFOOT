<?php
	require_once('../conexao.php');
	$id = $_GET['id'];
	$sql   = "DELETE FROM jogador WHERE id = $id";
	$total = $dbh->exec($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Remover Jogadores</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		echo "Total de jogadores removidos foi: $total";
	?>
</body>
</html>