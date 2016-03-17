<?php
	require_once('../conexao.php');
	$id = $_GET['id'];
	$sql   = "DELETE FROM rodada WHERE id = $id";
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
		echo "Total de rodadas removidas foi: $total";
	?>
</body>
</html>