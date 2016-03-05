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
          <th>Time Casa</th>
          <th>Gol</th>
          <th></th>
          <th>Gol</th>
          <th>Time Visitante</th>
          <th>Data</th>
          <th>Hora</th>
          <th>Período</th>
        </tr> 
      </thead>
      <tbody>

	<?php
	 
		//Consulta para visualizar jogos e seus atributos
		$consultaJogo = 'SELECT Jogo.timeCasa, Jogo.golCasa, Jogo.golVisitante, Jogo.timeVisitante,
						Rodada.data, Rodada.hora, Rodada.periodo FROM Jogo,Rodada WHERE Jogo.rodada = Rodada.numero ORDER BY Rodada.data';
		$preparaConsultaJogo = $conn->query($consultaJogo);
		$preparaConsultaJogo->execute();
	
		$result = $preparaConsultaJogo->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaJogo->fetch()) {

            echo '<tr>';
            echo "<td>{$row[0]}</td>";            
            echo "<td>{$row[1]}</td>";
            echo "<td> X </td>";
            echo "<td>{$row[2]}</td>";  
            echo "<td>{$row[3]}</td>";
            echo "<td>{$row[4]}</td>";
            echo "<td>{$row[5]}</td>";
            echo "<td>{$row[6]}</td>";
            echo '</tr>';
            
          }
	?>
	</tbody>
    </table>
	
</body>

</html>