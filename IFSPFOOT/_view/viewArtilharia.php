<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

?>
<!DOCTYPE html>

<html>

<head>

	<title>Página Inicial</title>
	<link rel="stylesheet" href="_css/cssView.css">

</head>

<body>
	<table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Time</th>
          <th>Gol</th>
        </tr> 
      </thead>
      <tbody>
	<?php 
	
		//Listando Gols
        $consultaJogador = 'SELECT Jogador.nome, Jogador.sobrenome,Time.nome,Jogador.gol FROM Jogador,Time WHERE Jogador.idTime = Time.id ORDER BY Jogador.gol DESC';
		$preparaConsultaJogador = $conn->query($consultaJogador);
		$preparaConsultaJogador->execute();
		
		
		while ($row = $preparaConsultaJogador->fetch()) {
		
			echo '<tr>';
			echo "<td>{$row[0]}</td>";
			echo "<td>{$row[1]}</td>";
			echo "<td>{$row[2]}</td>";
			echo "<td>{$row[3]}</td>";
			echo '</tr>';
		}
	?>
	</tbody>
	</table>
</body>

</html>