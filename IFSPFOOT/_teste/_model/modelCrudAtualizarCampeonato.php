<?php
	require_once('../conexao.php');
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$rodadaAtual = $_POST['rodadaAtual'];
	$temporada = $_POST['temporada'];
	$vencedor = $_POST['vencedor'];
	
	$sql = "UPDATE Campeonato 
          SET nome  = '$nome'
            , rodadaAtual = $rodadaAtual
            , temporada = $temporada
			, vencedor = '$vencedor'
          WHERE id = $id";
	$total = $dbh->exec($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Atualizar Campeonato</title>
			<meta charset="utf-8">
	</head>   
	<body>
		<?php		
			header("Location: ../_view/viewCrudListarCampeonato.php");
		?>
	</body>
</html>