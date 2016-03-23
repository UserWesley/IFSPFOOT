<?php
  require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Jogos Cadastrados</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<link rel="stylesheet" href="../css/style.css" />
	</head>	
		<body> 	
			<a href="../indexCrud.php">IFSPFOOT</a>
			<p>	
			<table>
				<thead>	
				<tr>
				<th>ID</th>
				<th>Time de Casa</th>
				<th>Gols em Casa</th>
				<th>Gols Visitante</th>
				<th>Time Visitante</th>
				<th>Rodadas</th>	
				<th colspan="2">Opcoes</th>
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
			</tbody>	  
			</table>	
			<script type="text/javascript" src="js/slideshow3.js"></script>			
		</body>
</html>