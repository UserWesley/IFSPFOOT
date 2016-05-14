<?php

	/*Este arquivo será responsável por realizar o cadastramento automático dos jogos*/	

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	//Cadastro de Jogos Automaticos
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (1,'Time1',NULL,NULL,'Time2','1')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (2,'Time3',NULL,NULL,'Time4','1')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (3,'Time1',NULL,NULL,'Time3','2')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (4,'Time2',NULL,NULL,'Time4','2')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (5,'Time1',NULL,NULL,'Time4','3')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (6,'Time2',NULL,NULL,'Time3','3')";
	$conn->exec($insercaoNovoJogo);
	
	//jogos de volta
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (7,'Time2',NULL,NULL,'Time1','4')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (8,'Time4',NULL,NULL,'Time3','4')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (9,'Time3',NULL,NULL,'Time1','5')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (10,'Time4',NULL,NULL,'Time2','5')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (11,'Time4',NULL,NULL,'Time1','6')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (12,'Time3',NULL,NULL,'Time2','6')";
	$conn->exec($insercaoNovoJogo);

?>