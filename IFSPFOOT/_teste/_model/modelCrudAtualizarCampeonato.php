<?php
  require_once('../conexao.php');
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $temporada = $_POST['temporada'];
  $vencedor = $_POST['vencedor'];
	
  $sql = "UPDATE campeonato 
          SET nome  = '$nome'
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
      echo "Total Atualizado: $total";
    ?>
  </body>
</html>