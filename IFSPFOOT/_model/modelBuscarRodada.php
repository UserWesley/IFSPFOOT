<?php

//Inclusão do arquivo para conexão com o banco de dados PDO
include_once '../_model/_bancodedados/modelBancodeDados.php';

$consultaJogosRodada = 'SELECT Jogo.timeCasa, Jogo.golCasa, Jogo.golVisitante, Jogo.timeVisitante,
Rodada.data, Rodada.hora, Rodada.periodo FROM Jogo,Rodada WHERE Jogo.rodada = Rodada.numero and Rodada.numero = ?';
$preparaConsultaJogosRodada = $conn->prepare($consultaJogosRodada);
$preparaConsultaJogosRodada->bindValue(1,$rodada);
$preparaConsultaJogosRodada->execute();

session_start();

$result = $preparaConsultaJogosRodada->setFetchMode(PDO::FETCH_NUM);
while ($row = $preparaConsultaJogosRodada->fetch()) {
		
	echo '<tr class = "active">';
	echo "<td>{$_SESSION['timeCasa1'] = $row[0];}</td>";
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