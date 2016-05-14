<?php

 	/* Este arquivo será responsável por avançar a rodada atual do campeonato se encontra
 	 */

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	$consultaCampeonatoRodadaAtual = 'SELECT rodadaAtual FROM Campeonato;';
	$preparaConsultaCampeonatoRodadaAtual = $conn->query($consultaCampeonatoRodadaAtual);
	$preparaConsultaCampeonatoRodadaAtual->execute();
	
	$result = $preparaConsultaCampeonatoRodadaAtual->setFetchMode(PDO::FETCH_NUM);
	
	while ($row = $preparaConsultaCampeonatoRodadaAtual->fetch()) {
		$rodada = $row[0];
	}	
	
	$rodada++;
	
	$atualizaCampeonatoRodadaAtual = 'UPDATE Campeonato SET rodadaAtual = ? WHERE id = 1';
	$preparaAtualizaCampeonatoRodadaAtual = $conn->prepare($atualizaCampeonatoRodadaAtual);
	$preparaAtualizaCampeonatoRodadaAtual->bindValue(1,$rodada);
	$preparaAtualizaCampeonatoRodadaAtual->execute();
	
	
?>