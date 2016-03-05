<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	//Passsando nome do time para cadastrarTime
	session_start();
	$nomeTime    = $_SESSION['nomeTime'];

	//Cadastro de Jogos Automaticos
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (1,'$nomeTime',NULL,NULL,'Time2','1')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (2,'$nomeTime',NULL,NULL,'Time3','2')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (3,'$nomeTime',NULL,NULL,'Time4','3')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (4,'Time2',NULL,NULL,'Time3','3')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (5,'Time2',NULL,NULL,'Time4','2')";
	$conn->exec($insercaoNovoJogo);
	$insercaoNovoJogo = "INSERT INTO Jogo VALUES (6,'Time3',NULL,NULL,'Time4','1')";
	$conn->exec($insercaoNovoJogo);

?>