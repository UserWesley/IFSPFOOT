<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	//Cadastro dos Times Automatico
	$insercaoNovoTime = "INSERT INTO Time VALUES (2,'Time2','mascote2','cor2',null,'10,00','10','time2','10')";
  	$conn->exec($insercaoNovoTime);
  	$insercaoNovoTime = "INSERT INTO Time VALUES (3,'Time3','mascote3','cor3',null,'10,00','10','time3','10')";
  	$conn->exec($insercaoNovoTime);
  	$insercaoNovoTime = "INSERT INTO Time VALUES (4,'Time4','mascote4','cor4',null,'10,00','10','time4','10')";
  	$conn->exec($insercaoNovoTime);


?>