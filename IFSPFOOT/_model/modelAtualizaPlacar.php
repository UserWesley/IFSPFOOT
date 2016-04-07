<?php
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	session_start();
	$rodadaAtual = $_SESSION['rodadaAtual'];
	
	$placar = $_REQUEST['content'];
	
	$placar = explode(",", $placar);
	
	echo "TimeCasaJogo1 :".$placar[0];
	echo "TimeCasaPlacarJogo1 :".$placar[1];
	$golCasa = $placar[1];
	
	echo "TimeVisitantePlacarJogo1 :".$placar[3];
	$golVisitante =$placar[3];
	echo "TimeVisitanteJogo1 :".$placar[4];
	
	echo "TimeCasaJogo2 :".$placar[6];
	echo "TimeCasaPlacarJogo2 :".$placar[7];
	$golCasa1 = $placar[7];
	
	echo "TimeVisitantePlacarJogo2 :".$placar[9];
	$golVisitante1 = $placar[9];
	echo "TimeVisitanteJogo2 :".$placar[10];
	

	switch($rodadaAtual){
		case 1: $inicioJogo = 1;
				$fimJogo = 2;
			break;
			
		case 2: $inicioJogo = 3;
			$fimJogo = 4;
			break;
			
		case 3:$inicioJogo = 5;
			$fimJogo = 6;
			break;
	}
	
	for($i=$inicioJogo;$i<=$fimJogo;$i++){
	
		if($i==$inicioJogo){
			$golCasa =$placar[1] ;
			$golVisitante = $placar[3];
		}	
		else{
			$golCasa =$placar[7] ;
			$golVisitante = $placar[9];
		}			
			
		$atualizaPlacarJogo = 'UPDATE Jogo SET golCasa = ?, golVisitante = ? WHERE id = ? and rodada = ?';
		$preparaAtualizaPlacarJogo = $conn->prepare($atualizaPlacarJogo);
		$preparaAtualizaPlacarJogo->bindValue(1,$golCasa);
		$preparaAtualizaPlacarJogo->bindValue(2,$golVisitante);
		$preparaAtualizaPlacarJogo->bindValue(3,$i);
		$preparaAtualizaPlacarJogo->bindValue(4,$rodadaAtual);
		$preparaAtualizaPlacarJogo->execute();
		
		$consultaJogo = 'SELECT timeCasa, timeVisitante FROM Jogo WHERE id = ? ';
		$preparaConsultaJogo = $conn->prepare($consultaJogo);
		$preparaConsultaJogo->bindValue(1, $i);
		$preparaConsultaJogo->execute();
		
		$result = $preparaConsultaJogo->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaJogo->fetch()) {
			
			$timeCasa = $row[0];
			$timeVisitante = $row[1];
			
		}

		$consultaTimeCasa = 'SELECT vitoria,empate,derrota,pontos FROM Time WHERE nome = ?';
		$preparaConsultaTimeCasa = $conn->prepare($consultaTimeCasa);
		$preparaConsultaTimeCasa->bindValue(1, $timeCasa);
		$preparaConsultaTimeCasa->execute();
		
		$result = $preparaConsultaTimeCasa->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaTimeCasa->fetch()) {
				
			$vitoriaTimeCasa = $row[0];
			$empateTimeCasa = $row[1];
			$derrotaTimeCasa = $row[2];
			$pontosTimeCasa = $row[3];
				
		}
		
		$consultaTimeVisitante = 'SELECT vitoria,empate,derrota,pontos FROM Time WHERE nome = ?';
		$preparaConsultaTimeVisitante = $conn->prepare($consultaTimeVisitante);
		$preparaConsultaTimeVisitante->bindValue(1, $timeVisitante);
		$preparaConsultaTimeVisitante->execute();
		
		$result = $preparaConsultaTimeVisitante->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaTimeVisitante->fetch()) {
		
			$vitoriaTimeVisitante = $row[0];
			$empateTimeVisitante = $row[1];
			$derrotaTimeVisitante = $row[2];
			$pontosTimeVisitante = $row[3];
		
		}
		
		if($golCasa > $golVisitante){
			
			$vitoriaTimeCasa++;
			$pontosTimeCasa = $pontosTimeCasa+3;
			
			$atualizaTime = 'UPDATE Time SET  vitoria = ?, pontos = ? WHERE id = ? and nome = ?';
			$preparaAtualizaTime = $conn->prepare($atualizaTime);
			$preparaAtualizaTime->bindValue(1,$vitoriaTimeCasa);
			$preparaAtualizaTime->bindValue(2,$pontosTimeCasa);
			$preparaAtualizaTime->bindValue(3,$i);
			$preparaAtualizaTime->bindValue(4,$timeCasa);
			$preparaAtualizaTime->execute();
			
		}
		elseif ($golVisitante < $golCasa){
			$vitoriaTimeVisitante++;
			$pontosTimeVisitante= $pontosTimeVisitante+3;
				
			$atualizaTime = 'UPDATE Time SET  vitoria = ?, pontos = ? WHERE id = ? and nome = ?';
			$preparaAtualizaTime = $conn->prepare($atualizaTime);
			$preparaAtualizaTime->bindValue(1,$vitoriaTimeVisitante);
			$preparaAtualizaTime->bindValue(2,$pontosTimeVisitante);
			$preparaAtualizaTime->bindValue(3,$i);
			$preparaAtualizaTime->bindValue(4,$timeVisitante);
			$preparaAtualizaTime->execute();
				
			
		}
		else {
			
		}
		
			
	}
	
?>