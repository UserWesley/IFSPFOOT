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
				<th>Titular</th>
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
				<th colspan="2">Opcoes</th>		  
				</tr> 
				</thead>    	
			<tbody>	        
	        <?php
				foreach($dbh->query('SELECT * FROM Jogador') as $linha){
				echo '<tr>';
				echo "<td>{$linha['id']}</td>"; 
				echo "<td>{$linha['titular']}</td>";
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
			</tbody>	  
			</table>	
			<script type="text/javascript" src="js/slideshow2.js"></script>			
		</body>
</html>