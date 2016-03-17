<?php
  require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Times Cadastrados</title>
	  <meta charset="utf-8">
    <style>
      table, td, th{
        border: 1px solid black;
      }
      table{
        border-collapse: collapse;
      }
    </style>
  </head>
  <body>
	<center>   
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Posicao</th>
		  <th>Nacionalidade</th>
		  <th>Habilidade</th>
		  <th>Idade</th>
		  <th>Forca</th> 
		  <th>ID Time</th>
		  <th>Estamina</th>
		  <th>Nivel</th>
		  <th>Gols</th>			  
        </tr> 
      </thead>
      <tbody>
        <?php
          foreach($dbh->query('SELECT * FROM jogador') as $linha){
            echo '<tr>';
            echo "<td>{$linha['id']}</td>";            
            echo "<td>{$linha['nome']}</td>";
            echo "<td>{$linha['sobrenome']}</td>";  
			echo "<td>{$linha['posicao']}</td>";      
			echo "<td>{$linha['nacionalidade']}</td>"; 
			echo "<td>{$linha['habilidade']}</td>"; 
			echo "<td>{$linha['idade']}</td>"; 
			echo "<td>{$linha['forca']}</td>"; 
			echo "<td>{$linha['idTime']}</td>"; 
			echo "<td>{$linha['estamina']}</td>"; 
			echo "<td>{$linha['nivel']}</td>"; 
			echo "<td>{$linha['gol']}</td>";
			echo "<td><a href=\"../_model/modelCrudRemoverJogador.php?id={$linha['id']}\">Remover Jogador</a></td>";				
            echo "<td><a href=\"viewCrudAtualizarJogador.php?id={$linha['id']}\">Atualizar Jogador</a></td>";	
			echo '</tr>';
          }
        ?>
		</center>
      </tbody>
    </table>
  </body>
</html>