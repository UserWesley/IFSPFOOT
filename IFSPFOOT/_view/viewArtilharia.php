<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

?>
<!DOCTYPE html>

<html>

<head>

	<title>Página Inicial</title>

</head>

<body>
	<table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Gol</th>
        </tr> 
      </thead>
      <tbody>
	<?php 
	
		//Listando Gols
        $consultaJogador = 'SELECT nome, sobrenome,gol FROM Jogador ORDER BY gol DESC';
		$preparaConsultaJogador = $conn->query($consultaJogador);
		$preparaConsultaJogador->execute();
		
		
		while ($row = $preparaConsultaJogador->fetch()) {
		
			echo '<tr>';
			echo "<td>{$row[0]}</td>";
			echo "<td>{$row[1]}</td>";
			echo "<td>{$row[2]}</td>";
			echo '</tr>';
		}
	?>
	</tbody>
	</table>
</body>

</html>