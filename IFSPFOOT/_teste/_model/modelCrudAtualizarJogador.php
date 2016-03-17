<?php
	require_once('../conexao.php');
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$posicao = $_POST['posicao'];
	$nacionalidade = $_POST['nacionalidade'];
	$habilidade = $_POST['habilidade'];
	$idade = $_POST['idade'];
	$forca = $_POST['forca'];
	$idTime = $_POST['idTime'];
	$estamina = $_POST['estamina'];
	$nivel = $_POST['nivel'];
	$gol = $_POST['gol'];
	
  $sql = "UPDATE jogador 
          SET nome = '$nome'
            , sobrenome = '$sobrenome'
			, posicao = '$posicao'
			, nacionalidade = '$nacionalidade'
			, habilidade = '$habilidade'
			, idade = $idade
			, forca = $forca
			, idTime = $idTime
			, estamina = $estamina
			, nivel = '$nivel'
			, gol = $gol
			
          WHERE id = $id";
  $total = $dbh->exec($sql);
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Atualizar Jogador</title>
	  <meta charset="utf-8">
  </head>
  <body>
    <?php
      echo "Total Atualizado: $total";
    ?>
  </body>
</html>