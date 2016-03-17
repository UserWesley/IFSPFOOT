<?php
  require_once('../conexao.php');
	$nome = $_POST['nome'];
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
  		$sql = "INSERT INTO campeonato
  		        VALUES ( null
					   , '$nome'
  		               ,  $temporada
  		               , '$vencedor'					   				   
					   )";

			$dbh->exec($sql);
  	?>
  </body>
</html>