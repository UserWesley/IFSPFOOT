<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

	//Cadastro de Rodadas Automaticas
	$insercaoNovaRodada = "INSERT INTO Time VALUES (1,'1','2016-03-10','16:00','Tarde','Nublado',1)";
	$conn->exec($insercaoNovaRodada);
	$insercaoNovaRodada = "INSERT INTO Time VALUES (2,'2','2016-04-10','20:00','Noite','Chuva',1)";
	$conn->exec($insercaoNovaRodada);
	$insercaoNovaRodada = "INSERT INTO Time VALUES (3,'3','2016-05-10','09:00','Manhã','Sol',1)";
	$conn->exec($insercaoNovaRodada);
	$insercaoNovaRodada = "INSERT INTO Time VALUES (4,'4','2016-06-10','16:00','Tarde','Nublado',1)";
	$conn->exec($insercaoNovaRodada);
	$insercaoNovaRodada = "INSERT INTO Time VALUES (5,'5','2016-07-10','20:00','Noite','Chuva Fina',1)";
	$conn->exec($insercaoNovaRodada);
	$insercaoNovaRodada = "INSERT INTO Time VALUES (6,'6','2016-08-10','09:00','Manhã','Nublado',1)";
	$conn->exec($insercaoNovaRodada);
	
?>