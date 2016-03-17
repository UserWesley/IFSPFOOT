<?php
	require_once('../conexao.php');
	$id = $_GET['id'];
	$sql   = "DELETE FROM time WHERE id = $id";
	$total = $dbh->exec($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Remover Rodadas</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		echo "Total de times removidos foi: $total";
	?>
</body>
</html>