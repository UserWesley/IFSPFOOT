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
          <th>Mascote</th>
          <th>Cor</th>
		  <th>Dono</th>
		  <th>Dinheiro</th>
		  <th>Torcida</th>
		  <th>Nome do Estadio</th> 
		  <th>Capacidade</th>
		  <th>Vitorias</th>
		  <th>Derrotas</th>
		  <th>Empates</th>
		  <th>Pontos</th>				  
        </tr> 
      </thead>
      <tbody>
        <?php
          foreach($dbh->query('SELECT * FROM Time') as $linha){
            echo '<tr>';
            echo "<td>{$linha['id']}</td>";            
            echo "<td>{$linha['nome']}</td>";
            echo "<td>{$linha['mascote']}</td>";  
			echo "<td>{$linha['cor']}</td>";      
			echo "<td>{$linha['dono']}</td>"; 
			echo "<td>{$linha['dinheiro']}</td>"; 
			echo "<td>{$linha['torcida']}</td>"; 
			echo "<td>{$linha['nomeEstadio']}</td>"; 
			echo "<td>{$linha['capacidade']}</td>"; 
			echo "<td>{$linha['vitoria']}</td>"; 
			echo "<td>{$linha['derrota']}</td>"; 
			echo "<td>{$linha['empate']}</td>"; 
			echo "<td>{$linha['pontos']}</td>"; 
			echo "<td><a href=\"../_model/modelCrudRemoverTime.php?id={$linha['id']}\">Remover Time</a></td>";	
            echo "<td><a href=\"viewCrudAtualizarTime.php?id={$linha['id']}\">Atualizar Time</a></td>";
			echo '</tr>';
          }
        ?>
		</center>
      </tbody>
    </table>
  </body>
</html>