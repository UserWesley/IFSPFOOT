<?php
  require_once('../conexao.php');
  $id = $_GET['id'];
  $sql   = "SELECT * FROM campeonato WHERE id = $id";
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Atualizar Campeonato</title>
	  <meta charset="utf-8">
  </head>
  <body>
  	<center>  
    <?php
    foreach($dbh->query($sql) as $linha):
    ?>
      <form action="../_model/modelCrudAtualizarCampeonato.php" method="post">
	    ID: <input type="number"
                       name="id"
                       value="<?php echo $linha['id']?>" 
                       readonly="readonly" />
        <br />
		<br />
        Nome: <input type="text"
                       name="nome"
                       value="<?php echo $linha['nome']?>"/>                  
        <br />
		<br />
        Temporada: <input type="number" 
                     name="temporada"
                     value="<?php echo $linha['temporada']?>" />
        <br />
		<br />
        Vencedor: <input type="text" 
                      name="vencedor"
                      value="<?php echo $linha['vencedor']?>" />
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