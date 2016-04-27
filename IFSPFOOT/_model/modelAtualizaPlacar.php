<?php
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	session_start();
	$rodadaAtual = $_SESSION['rodadaAtual'];
	
	$placar = $_REQUEST['content'];
	
	$placar = explode(",", $placar);
	
	echo "TimeCasaJogo1 :".$placar[0]."<br>";
	echo "TimeCasaPlacarJogo1 :".$placar[1]."<br>";
	$golCasa = $placar[1];
	
	echo "TimeVisitantePlacarJogo1 :".$placar[3]."<br>";
	$golVisitante =$placar[3];
	echo "TimeVisitanteJogo1 :".$placar[4]."<br>";
	
	echo "TimeCasaJogo2 :".$placar[6]."<br>";
	echo "TimeCasaPlacarJogo2 :".$placar[7]."<br>";
	$golCasa1 = $placar[7];
	
	echo "TimeVisitantePlacarJogo2 :".$placar[9]."<br>";
	$golVisitante1 = $placar[9];
	echo "TimeVisitanteJogo2 :".$placar[10]."<br>";
	

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

		$consultaTimeCasa = 'SELECT vitoria,derrota,empate,pontos FROM Time WHERE nome = ?';
		$preparaConsultaTimeCasa = $conn->prepare($consultaTimeCasa);
		$preparaConsultaTimeCasa->bindValue(1, $timeCasa);
		$preparaConsultaTimeCasa->execute();
		
		$result = $preparaConsultaTimeCasa->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaTimeCasa->fetch()) {
				
			$vitoriaTimeCasa = $row[0];
			$derrotaTimeCasa = $row[1];
			$empateTimeCasa = $row[2];
			$pontosTimeCasa = $row[3];
				
		}
		
		$consultaTimeVisitante = 'SELECT vitoria,derrota,empate,pontos FROM Time WHERE nome = ?';
		$preparaConsultaTimeVisitante = $conn->prepare($consultaTimeVisitante);
		$preparaConsultaTimeVisitante->bindValue(1, $timeVisitante);
		$preparaConsultaTimeVisitante->execute();
		
		$result = $preparaConsultaTimeVisitante->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaTimeVisitante->fetch()) {
		
			$vitoriaTimeVisitante = $row[0];
			$derrotaTimeVisitante = $row[1];
			$empateTimeVisitante = $row[2];
			$pontosTimeVisitante = $row[3];
		
		}
		
		/*
		echo "vitorias time casa".$vitoriaTimeCasa."--------";
		echo "derrotas time casa".$derrotaTimeCasa."---------------";
		echo "empate time casa".$empateTimeCasa."---------------";
		echo "Pontos time casa".$pontosTimeCasa."---------------";
		
		echo "vitorias time Visitante".$vitoriaTimeVisitante."--------";
		echo "derrotas time Visitante".$empateTimeVisitante."--------";
		echo "empate time Visitante".$derrotaTimeVisitante."--------";
		echo "Pontos time Visitante".$pontosTimeVisitante."--------";
		*/
		if($golCasa > $golVisitante){
			
			$vitoriaTimeCasa++;
			$pontosTimeCasa = $pontosTimeCasa+3;
			$derrotaTimeCasa++;
			
			$atualizaTimeCasa1 = 'UPDATE Time SET  vitoria = ?, pontos = ? WHERE nome = ?';
			$preparaAtualizaTimeCasaTabela1 = $conn->prepare($atualizaTimeCasa1);
			$preparaAtualizaTimeCasaTabela1->bindValue(1,$vitoriaTimeCasa);
			$preparaAtualizaTimeCasaTabela1->bindValue(2,$pontosTimeCasa);
			$preparaAtualizaTimeCasaTabela1->bindValue(3,$timeCasa);
			$preparaAtualizaTimeCasaTabela1->execute();
			
			$atualizaTime1 = 'UPDATE Time SET  derrota = ? WHERE nome = ?';
			$preparaAtualizaTimeVisitanteTabela1 = $conn->prepare($atualizaTime1);
			$preparaAtualizaTimeVisitanteTabela1 ->bindValue(1,$derrotaTimeCasa);
			$preparaAtualizaTimeVisitanteTabela1 ->bindValue(2,$timeVisitante);
			$preparaAtualizaTimeVisitanteTabela1 ->execute();
			
		}
		else if ($golVisitante > $golCasa){
			
			$vitoriaTimeVisitante++;
			$pontosTimeVisitante= $pontosTimeVisitante+3;
			$derrotaTimeCasa++;
				
			$atualizaTimeVisitante2 = 'UPDATE Time SET  vitoria = ?, pontos = ? WHERE nome = ?';
			$preparaAtualizaTimeVisitanteTabela2 = $conn->prepare($atualizaTimeVisitante2);
			$preparaAtualizaTimeVisitanteTabela2->bindValue(1,$vitoriaTimeVisitante);
			$preparaAtualizaTimeVisitanteTabela2->bindValue(2,$pontosTimeVisitante);
			$preparaAtualizaTimeVisitanteTabela2->bindValue(3,$timeVisitante);
			$preparaAtualizaTimeVisitanteTabela2->execute();
			
			$atualizaTimeCasa2 = 'UPDATE Time SET  derrota = ? WHERE nome = ?';
			$preparaAtualizaTimeCasaTabela2 = $conn->prepare($atualizaTimeCasa2);
			$preparaAtualizaTimeCasaTabela2->bindValue(1,$derrotaTimeCasa);
			$preparaAtualizaTimeCasaTabela2->bindValue(2,$timeCasa);
			$preparaAtualizaTimeCasaTabela2->execute();
				
			
		}
		else if($golCasa == $golVisitante) {
			$empateTimeCasa++;
			$empateTimeVisitante++;
			
			$atualizaTimeCasa3 = 'UPDATE Time SET  empate = ? WHERE nome = ?';
			$preparaAtualizaTimeCasaTabela3 = $conn->prepare($atualizaTimeCasa3);
			$preparaAtualizaTimeCasaTabela3->bindValue(1,$empateTimeCasa);
			$preparaAtualizaTimeCasaTabela3->bindValue(2,$timeCasa);
			$preparaAtualizaTimeCasaTabela3->execute();
			
			$atualizaTimeVisitante3 = 'UPDATE Time SET  empate = ? WHERE nome = ?';
			$preparaAtualizaTimeVisitanteTabela3 = $conn->prepare($atualizaTimeVisitante3);
			$preparaAtualizaTimeVisitanteTabela3 ->bindValue(1,$empateTimeVisitante);
			$preparaAtualizaTimeVisitanteTabela3 ->bindValue(2,$timeVisitante);
			$preparaAtualizaTimeVisitanteTabela3 ->execute();
		}
		
			
	}
	
?>