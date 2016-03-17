<?php
  require_once('../conexao.php');
  $id = $_GET['id'];
  $sql   = "SELECT * FROM jogo WHERE id = $id";
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Atualizar Jogo</title>
	  <meta charset="utf-8">
  </head>
  <body>
  	<center>  
    <?php
    foreach($dbh->query($sql) as $linha):
    ?>
      <form action="../_model/modelCrudAtualizarJogo.php" method="post">
	    ID: <input type="number"
                       name="id"
                       value="<?php echo $linha['id']?>" 
                       readonly="readonly" />
        <br />
		<br />
        Time de Casa: <input type="text"
                       name="timeCasa"
                       value="<?php echo $linha['timeCasa']?>"/>                  
        <br />
		<br />
        Gols em Casa: <input type="number" 
                     name="golCasa"
                     value="<?php echo $linha['golCasa']?>" />
        <br />
		<br />
        Gols Visitante: <input type="number" 
                      name="golVisitante"
                      value="<?php echo $linha['golVisitante']?>" />
        <br />   
		<br />		
		Time Visitante: <input type="text" 
                      name="timeVisitante"
                      value="<?php echo $linha['timeVisitante']?>" />
        <br />   
		<br />
		Rodadas: <input type="number" 
                      name="rodada"
                      value="<?php echo $linha['rodada']?>" />
        <br />   
		<br />
        <input type="submit" value="Alterar" />
      </form>
    <?php
    endforeach;
    ?>
		</center>  
  </body>
</html>