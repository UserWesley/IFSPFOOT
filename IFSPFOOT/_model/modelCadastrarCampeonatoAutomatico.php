<?php
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	//Cadastro do campeonato inicial
	$insercaoNovoCampeonato = "INSERT INTO Campeonato VALUES (1,'LIGA IFSP', '2016','')";
	$conn->exec($insercaoNovoCampeonato);
	
?>