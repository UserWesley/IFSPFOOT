<?php
  require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Campeonatos Cadastrados</title>
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
				<th>Rodada Atual</th>
				<th>Temporada</th>
				<th>Vencedor</th>
				<th colspan="2">Opcoes</th>
				</tr> 
				</thead>
			<tbody>
			<?php
				foreach($dbh->query('SELECT * FROM Campeonato') as $linha){
				echo '<tr>';
				echo "<td>{$linha['id']}</td>";            
				echo "<td>{$linha['nome']}</td>";
				echo "<td>{$linha['rodadaAtual']}</td>";
				echo "<td>{$linha['temporada']}</td>";  
				echo "<td>{$linha['vencedor']}</td>";  
				echo "<td><a href=\"../_model/modelCrudRemoverCampeonato.php?id={$linha['id']}\">Remover Campeonato</a></td>";
				echo "<td><a href=\"viewCrudAtualizarCampeonato.php?id={$linha['id']}\">Atualizar Campeonato</a></td>";			
				echo '</tr>';
				}
			?>
			</tbody>	  
			</table>
			<script type="text/javascript" src="js/slideshow1.js"></script>
		</body>
</html>