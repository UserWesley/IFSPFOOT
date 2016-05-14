<?php
	
	/*Este arquivo realizar o cadastramento automatico do campeonato*/

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	//Cadastro do campeonato inicial
	$insercaoNovoCampeonato = "INSERT INTO Campeonato VALUES (1,'LIGA IFSP','1', '2016',NULL)";
	$conn->exec($insercaoNovoCampeonato);
	
?>