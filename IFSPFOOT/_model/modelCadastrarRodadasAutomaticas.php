<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

	//Cadastro de Rodadas Automaticas
	$insercaoNovaRodada = "INSERT INTO Time VALUES (1,'1','1')";
	$conn->exec($insercaoNovaRodada);
	$insercaoNovaRodada = "INSERT INTO Time VALUES (2,'6','1')";
	$conn->exec($insercaoNovaRodada);
	$insercaoNovaRodada = "INSERT INTO Time VALUES (3,'2','2')";
	$conn->exec($insercaoNovaRodada);
	$insercaoNovaRodada = "INSERT INTO Time VALUES (4,'5','2')";
	$conn->exec($insercaoNovaRodada);
	$insercaoNovaRodada = "INSERT INTO Time VALUES (5,'3','3')";
	$conn->exec($insercaoNovaRodada);
	$insercaoNovaRodada = "INSERT INTO Time VALUES (6,'4','3')";
	$conn->exec($insercaoNovaRodada);
	
?>