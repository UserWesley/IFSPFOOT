<?php
	require_once('../conexao.php');
	$id = $_POST['id'];
	$numero = $_POST['numero'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$periodo = $_POST['periodo'];
	$clima = $_POST['clima'];
	$campeonato = $_POST['campeonato'];	
	
	$sql = "UPDATE Rodada 
          SET numero  = $numero
            , data = '$data'
			, hora = '$hora'
			, periodo = '$periodo'
			, clima = '$clima'
			, campeonato = $campeonato		
          WHERE id = $id";
	$total = $dbh->exec($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Atualizar Rodada</title>
			<meta charset="utf-8">
	</head>
	<body>
		<?php
			header("Location: ../_view/viewCrudListarRodada.php");
		?>
	</body>
</html>