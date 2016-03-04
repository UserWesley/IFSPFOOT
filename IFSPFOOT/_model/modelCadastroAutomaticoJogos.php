<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

	//Cadastro de Jogos Automaticos
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (1,'1',null,'2',null,'2015-01-01','tarde')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (2,'1',null,'3',null,'2015-01-01','tarde')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (3,'1',null,'4',null,'2015-01-01','tarde')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (4,'2',null,'3',null,'2015-01-01','tarde')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (5,'2',null,'4',null,'2015-01-01','tarde')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (6,'3',null,'4',null,'2015-01-01','tarde')";
	$conn->exec($insercaoNovoJogo);

?>