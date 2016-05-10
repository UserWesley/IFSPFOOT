<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	session_start();
	
	$consultaRodada = 'SELECT Jogo.timeCasa, Jogo.golCasa, Jogo.golVisitante, Jogo.timeVisitante,
	Rodada.data, Rodada.hora, Rodada.periodo FROM Jogo,Rodada WHERE Jogo.rodada = Rodada.numero and Rodada.numero = ?';
	$preparaConsultaRodada = $conn->prepare($consultaRodada);
	$preparaConsultaRodada->bindValue(1,$rodada);
	$preparaConsultaRodada->execute();
	
	$result = $preparaConsultaRodada->setFetchMode(PDO::FETCH_NUM);
	while ($row = $preparaConsultaRodada->fetch()) {
			
		echo '<tr class = "active">';
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