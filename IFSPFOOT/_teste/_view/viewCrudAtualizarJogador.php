<?php
  require_once('../conexao.php');
  $id = $_GET['id'];
  $sql   = "SELECT * FROM jogador WHERE id = $id";
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Atualizar Jogador</title>
	  <meta charset="utf-8">
  </head>
  <body>
  	<center>  
    <?php
    foreach($dbh->query($sql) as $linha):
    ?>
      <form action="../_model/modelCrudAtualizarJogador.php" method="post">
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
        Sobrenome: <input type="text" 
                     name="sobrenome"
                     value="<?php echo $linha['sobrenome']?>" />
        <br />
		<br />
        Posicao: <input type="text" 
                      name="posicao"
                      value="<?php echo $linha['posicao']?>" />
        <br />   
		<br />		
		Nacionalidade: <input type="text" 
                      name="nacionalidade"
                      value="<?php echo $linha['nacionalidade']?>" />
        <br />   
		<br />
		Habilidade: <input type="text" 
                      name="habilidade"
                      value="<?php echo $linha['habilidade']?>" />
        <br />   
		<br />
		Idade: <input type="number" 
                      name="idade"
                      value="<?php echo $linha['idade']?>" />
        <br />   
		<br />
		Forca: <input type="number" 
                      name="forca"
                      value="<?php echo $linha['forca']?>" />
        <br />   
		<br />
		ID Time: <input type="number" 
                      name="idTime"
                      value="<?php echo $linha['idTime']?>" />
        <br />   
		<br />
		Estamina: <input type="number" 
                      name="estamina"
                      value="<?php echo $linha['estamina']?>" />
        <br />   
		<br />
		Nivel: <input type="text" 
                      name="nivel"
                      value="<?php echo $linha['nivel']?>" />
        <br />   
		<br />
		Gols: <input type="number" 
                      name="gol"
                      value="<?php echo $linha['gol']?>" />
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