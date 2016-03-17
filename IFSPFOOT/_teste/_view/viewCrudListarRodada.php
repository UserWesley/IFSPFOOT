<?php
  require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Rodadas Cadastradas</title>
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
          <th>Numero</th>
          <th>Data</th>
          <th>Hora</th>
		  <th>Periodo</th>
		  <th>Clima</th>
		  <th>Campeonato</th>			  
        </tr> 
      </thead>
      <tbody>
        <?php
          foreach($dbh->query('SELECT * FROM rodada') as $linha){
            echo '<tr>';
            echo "<td>{$linha['id']}</td>";            
            echo "<td>{$linha['numero']}</td>";
            echo "<td>{$linha['data']}</td>";  
			echo "<td>{$linha['hora']}</td>";  
			echo "<td>{$linha['periodo']}</td>";  
			echo "<td>{$linha['clima']}</td>";  
			echo "<td>{$linha['campeonato']}</td>";
			echo "<td><a href=\"../_model/modelCrudRemoverRodada.php?id={$linha['id']}\">Remover Rodada</a></td>";	
            echo "<td><a href=\"viewCrudAtualizarRodada.php?id={$linha['id']}\">Atualizar Rodada</a></td>";	
			echo '</tr>';
          }
        ?>
		</center>
      </tbody>
    </table>
  </body>
</html>