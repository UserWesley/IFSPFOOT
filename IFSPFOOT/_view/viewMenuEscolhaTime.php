<?php

$id = "1";
//Consulta para visualizar dados do estádio
$consultaTime = 'SELECT nome,mascote,cor,dono,dinheiro FROM Time WHERE id = ? ';
$preparaConsultaTime = $conn->prepare($consultaTime);
$preparaConsultaTime->bindValue(1, $id);
$preparaConsultaTime->execute();

$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
while ($row = $preparaConsultaTime->fetch()) {
	echo '<tr class="active">';
	echo "<td>{$row[0]}</td>";
	echo "<td>{$row[1]}</td>";
	echo "<td>{$row[2]}</td>";
	echo "<td>{$row[3]}</td>";
	echo "<td>{$row[4]}</td>";
	echo '</tr>';
	
	<select>
	</select>
}

?>