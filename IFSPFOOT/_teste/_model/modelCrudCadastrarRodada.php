<?php
	require_once('../conexao.php');
	$numero = $_POST['numero'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$periodo = $_POST['periodo'];
	$clima = $_POST['clima'];
	$campeonato = $_POST['campeonato'];	
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Cadastrar Rodada</title>
	  <meta charset="utf-8">
  </head>
  <body>
  	<?php
  		$sql = "INSERT INTO Rodada
  		        VALUES (  null
					   ,  $numero
  		               , '$data'
  		               , '$hora'
					   , '$periodo'
  		               , '$clima'
					   ,  $campeonato					   
					   )";

			$dbh->exec($sql);
		
		header("Location: ../indexCrud.php");
		
  	?>
  </body>
</html>