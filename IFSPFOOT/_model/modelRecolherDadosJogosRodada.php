<?php
 
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	session_start();
	
	//Array com os times
	$times = array();
	
	
	//Buscando rodada
	$consultaCampeonatoRodadaAtual = 'SELECT rodadaAtual FROM Campeonato;';
	$preparaConsultaCampeonatoRodadaAtual = $conn->query($consultaCampeonatoRodadaAtual);
	$preparaConsultaCampeonatoRodadaAtual->execute();
		
	$result = $preparaConsultaCampeonatoRodadaAtual->setFetchMode(PDO::FETCH_NUM);
	while ($row = $preparaConsultaCampeonatoRodadaAtual->fetch()) {
	
		$rodada = $row[0];
		
	}
	
	//Busca jogos da rodada e apos os inserir um array de sessão
	$consultaRodada = 'SELECT Jogo.timeCasa, Jogo.timeVisitante FROM Jogo WHERE Jogo.rodada = ?';
	$preparaConsultaRodada = $conn->prepare($consultaRodada);
	$preparaConsultaRodada->bindValue(1,$rodada);
	$preparaConsultaRodada->execute();
	
	$result = $preparaConsultaRodada->setFetchMode(PDO::FETCH_NUM);
	while ($row = $preparaConsultaRodada->fetch()) {
		
		$times[]= $row[0];
		$times[]= $row[1];

	}
	
	$_SESSION['times'] = $times;
	
?>
