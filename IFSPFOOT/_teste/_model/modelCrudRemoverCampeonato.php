<?php
	require_once('../conexao.php');
	$id = $_GET['id'];
	$sql   = "DELETE FROM campeonato WHERE id = $id";
	$total = $dbh->exec($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Remover Campeonato</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		echo "Total de campeonatos removidos foi: $total";
	?>
</body>
</html>