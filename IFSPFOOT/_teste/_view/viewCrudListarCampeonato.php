<?php
  require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>
  <head>
	  <title>Campeonatos Cadastrados</title>
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
          <th>Temporada</th>
          <th>Vencedor</th>
        </tr> 
      </thead>
      <tbody>
        <?php
          foreach($dbh->query('SELECT * FROM campeonato') as $linha){
            echo '<tr>';
            echo "<td>{$linha['id']}</td>";            
            echo "<td>{$linha['nome']}</td>";
            echo "<td>{$linha['temporada']}</td>";  
			echo "<td>{$linha['vencedor']}</td>";  
			echo "<td><a href=\"../_model/modelCrudRemoverCampeonato.php?id={$linha['id']}\">Remover Campeonato</a></td>";
			echo "<td><a href=\"viewCrudAtualizarCampeonato.php?id={$linha['id']}\">Atualizar Campeonato</a></td>";			
            echo '</tr>';
          }
        ?>
		</center>
      </tbody>
    </table>
  </body>
</html>