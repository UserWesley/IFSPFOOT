<?php
  require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Jogos Cadastrados</title>
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
          <th>Time de Casa</th>
          <th>Gols em Casa</th>
          <th>Gols Visitante</th>
		  <th>Time Visitante</th>
		  <th>Rodadas</th>		  
        </tr> 
      </thead>
      <tbody>
        <?php
          foreach($dbh->query('SELECT * FROM Jogo') as $linha){
            echo '<tr>';
            echo "<td>{$linha['id']}</td>";            
            echo "<td>{$linha['timeCasa']}</td>";
            echo "<td>{$linha['golCasa']}</td>";  
			echo "<td>{$linha['golVisitante']}</td>";   
			echo "<td>{$linha['timeVisitante']}</td>"; 
			echo "<td>{$linha['rodada']}</td>";
			echo "<td><a href=\"../_model/modelCrudRemoverJogo.php?id={$linha['id']}\">Remover Jogo</a></td>";				
            echo "<td><a href=\"viewCrudAtualizarJogo.php?id={$linha['id']}\">Atualizar Jogo</a></td>";	
			echo '</tr>';
          }
        ?>
		</center>
      </tbody>
    </table>
  </body>
</html>