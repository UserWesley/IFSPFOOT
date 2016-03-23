<?php
	require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Times Cadastrados</title>
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
				<th colspan="2">Opcoes</th>
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
			</tbody>	
			<script type="text/javascript" src="js/slideshow5.js"></script>			
			</table> 
		</body>
</html>