<?php
  require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>	
	<head>
		<title>Rodadas Cadastradas</title>
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
				<th>Numero</th>
				<th>Data</th>
				<th>Hora</th>
				<th>Periodo</th>
				<th>Clima</th>
				<th>Campeonato</th>	
				<th colspan="2">Opcoes</th>
				</tr> 
				</thead>	    
			<tbody>	    
	        <?php
				foreach($dbh->query('SELECT * FROM Rodada') as $linha){
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
			</tbody>			  
			</table> 
			<script type="text/javascript" src="js/slideshow4.js"></script>
		</body>
</html>