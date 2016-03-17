<?php
  require_once('../conexao.php');
  $id = $_GET['id'];
  $sql   = "SELECT * FROM time WHERE id = $id";
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Atualizar Time</title>
	  <meta charset="utf-8">
  </head>
  <body>
  	<center>  
    <?php
    foreach($dbh->query($sql) as $linha):
    ?>
      <form action="../_model/modelCrudAtualizarTime.php" method="post">
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
        Mascote: <input type="text" 
                     name="mascote"
                     value="<?php echo $linha['mascote']?>" />
        <br />
		<br />
        Cor: <input type="text" 
                      name="cor"
                      value="<?php echo $linha['cor']?>" />
        <br />   
		<br />	
		Dono: <input type="number" 
                      name="dono"
                      value="<?php echo $linha['dono']?>" />
        <br />   
		<br />
		Dinheiro: <input type="number" 
                      name="dinheiro"
                      value="<?php echo $linha['dinheiro']?>" />
        <br />   
		<br />		
		Torcida: <input type="text" 
                      name="torcida"
                      value="<?php echo $linha['torcida']?>" />
        <br />   
		<br />	
		Nome do Estadio: <input type="text" 
                      name="nomeEstadio"
                      value="<?php echo $linha['nomeEstadio']?>" />
        <br />   
		<br />	
		Capacidade: <input type="number" 
                      name="capacidade"
                      value="<?php echo $linha['capacidade']?>" />
        <br />   
		<br />	
		Vitorias: <input type="number" 
                      name="vitoria"
                      value="<?php echo $linha['vitoria']?>" />
        <br />   
		<br />
		Derrotas: <input type="number" 
                      name="derrota"
                      value="<?php echo $linha['derrota']?>" />
        <br />   
		<br />
		Empates: <input type="number" 
                      name="empate"
                      value="<?php echo $linha['empate']?>" />
        <br />   
		<br />
		Pontos: <input type="number" 
                      name="pontos"
                      value="<?php echo $linha['pontos']?>" />
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