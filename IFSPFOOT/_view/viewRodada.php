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

	<?php include 'viewCabecalhoRodada.php'?>
    
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
	
		//recebe valor da rodada
		if(!empty($_GET['rodada'])) {
			echo "Rodada :".$rodada = $_GET['rodada'];
		
		}
		else { echo "Rodada :".$rodada = '1';}
		
		//Consulta para visualizar jogos da rodada
		$consultaRodada = 'SELECT Jogo.timeCasa, Jogo.golCasa, Jogo.golVisitante, Jogo.timeVisitante,
						Rodada.data, Rodada.hora, Rodada.periodo FROM Jogo,Rodada WHERE Jogo.rodada = Rodada.numero and Rodada.numero = ?';
		$preparaConsultaRodada = $conn->prepare($consultaRodada);
		$preparaConsultaRodada->bindValue(1,$rodada);
		$preparaConsultaRodada->execute();
	
		$result = $preparaConsultaRodada->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaRodada->fetch()) {
			
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