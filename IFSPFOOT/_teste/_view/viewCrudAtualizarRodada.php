<?php
  require_once('../conexao.php');
  $id = $_GET['id'];
  $sql   = "SELECT * FROM Rodada WHERE id = $id";
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Atualizar Rodada</title>
	  <meta charset="utf-8">
  </head>
  <body>
  	<center>  
    <?php
    foreach($dbh->query($sql) as $linha):
    ?>
      <form action="../_model/modelCrudAtualizarRodada.php" method="post">
	    ID: <input type="number"
                       name="id"
                       value="<?php echo $linha['id']?>" 
                       readonly="readonly" />
        <br />
		<br />
        Numero: <input type="number"
                       name="numero"
                       value="<?php echo $linha['numero']?>"/>                  
        <br />
		<br />
        Data: <input type="date" 
                     name="data"
                     value="<?php echo $linha['data']?>" />
        <br />
		<br />
        Hora: <input type="time" 
                      name="hora"
                      value="<?php echo $linha['hora']?>" />
        <br />   
		<br />	
		Periodo: <input type="text" 
                      name="periodo"
                      value="<?php echo $linha['periodo']?>" />
        <br />   
		<br />
		Clima: <input type="text" 
                      name="clima"
                      value="<?php echo $linha['clima']?>" />
        <br />   
		<br />		
		Campeonato: <input type="number" 
                      name="campeonato"
                      value="<?php echo $linha['campeonato']?>" />
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