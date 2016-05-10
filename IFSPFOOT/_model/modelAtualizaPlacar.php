<?php
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	session_start();
	$rodadaAtual = $_SESSION['rodadaAtual'];
	
	//Obtendo os dados enviados pelo ajax
	$placar = $_REQUEST['content'];
	
	//explodindo os dados em array para obter os placares e os nomes dos times
	$placar = explode(",", $placar);
	
	//Variaveis com os placares
	$timeCasa = $placar[0];
	$golCasa = $placar[1];
	
	$golVisitante =$placar[3];
	$timeVisitante = $placar[4];
	
	$timeCasa1 = $placar[6];
	$golCasa1 = $placar[7];
	
	$golVisitante1 = $placar[9];
	$timeVisitante1 = $placar[10];
	
	//Debug placar
	echo "Dados Rodada gol da rodada";
	
	echo $timeCasa." : ".$golCasa;
	echo $timeVisitante." : ".$golVisitante;
	echo "  |  ".$timeCasa1." : ".$golCasa1;
	echo $timeVisitante1." : ".$golVisitante1;
	echo "///////////////////////";
	
	//identificando a rodada e atribundo os valores para percorrer jogos da rodada
	switch($rodadaAtual){
		case 1: $inicioJogo = 1;
				$fimJogo = 2;
			break;
			
		case 2: $inicioJogo = 3;
			$fimJogo = 4;
			break;
			
		case 3: $inicioJogo = 5;
			$fimJogo = 6;
			break;

		case 4: $inicioJogo = 7;
			$fimJogo = 8;
			break;
			
		case 5: $inicioJogo = 9;
			$fimJogo = 10;
			break;
			
		case 6: $inicioJogo = 11;
			$fimJogo = 12;
			break;
	}
	//Percorrendo jogo a jogo da rodada
	for($i=$inicioJogo;$i<=$fimJogo;$i++){
	
		if($i==$inicioJogo){
			$golCasa =$placar[1] ;
			$golVisitante = $placar[3];
		}	
		else{
			$golCasa =$placar[7] ;
			$golVisitante = $placar[9];
		}
					
		//Atualizando placar do jogo no banco dados	
		$atualizaPlacarJogo = 'UPDATE Jogo SET golCasa = ?, golVisitante = ? WHERE id = ? and rodada = ?';
		$preparaAtualizaPlacarJogo = $conn->prepare($atualizaPlacarJogo);
		$preparaAtualizaPlacarJogo->bindValue(1,$golCasa);
		$preparaAtualizaPlacarJogo->bindValue(2,$golVisitante);
		$preparaAtualizaPlacarJogo->bindValue(3,$i);
		$preparaAtualizaPlacarJogo->bindValue(4,$rodadaAtual);
		$preparaAtualizaPlacarJogo->execute();
		
		//Consultando o nome os times do jogo
		$consultaJogo = 'SELECT timeCasa, timeVisitante FROM Jogo WHERE id = ? ';	
		$preparaConsultaJogo = $conn->prepare($consultaJogo);
		$preparaConsultaJogo->bindValue(1, $i);
		$preparaConsultaJogo->execute();
		
		$result = $preparaConsultaJogo->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaJogo->fetch()) {
			
			$timeCasa = $row[0];
			$timeVisitante = $row[1];
			
		}
		
		//Obtendo dados do time da casa
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
		
		//Obtendo dados do time visitante
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
		
		echo "//////////////////";
		echo "Antes do jogo";
		echo "Time : ".$timeCasa;
		echo "Vitorias : ".$vitoriaTimeCasa."Derrotas : ".$derrotaTimeCasa."Empates : ".$empateTimeCasa."Pontos : ".$pontosTimeCasa;
		echo "||| time : ".$timeVisitante;
		echo "Vitorias : ".$vitoriaTimeVisitante."Derrotas : ".$derrotaTimeVisitante."Empates : ".$empateTimeVisitante."Pontos : ".$pontosTimeVisitante;
		
		//Verifica quem ganhou e efetua a eventuais atualizações de valores como empate, ponto e derrota
		if($golCasa > $golVisitante){
			
			$vitoriaTimeCasa++;
			$pontosTimeCasa = $pontosTimeCasa+3;
			$derrotaTimeVisitante++;
			
			$atualizaTimeCasa1 = 'UPDATE Time SET  vitoria = ?, pontos = ? WHERE nome = ?';
			$preparaAtualizaTimeCasaTabela1 = $conn->prepare($atualizaTimeCasa1);
			$preparaAtualizaTimeCasaTabela1->bindValue(1,$vitoriaTimeCasa);
			$preparaAtualizaTimeCasaTabela1->bindValue(2,$pontosTimeCasa);
			$preparaAtualizaTimeCasaTabela1->bindValue(3,$timeCasa);
			$preparaAtualizaTimeCasaTabela1->execute();
			
			$atualizaTime1 = 'UPDATE Time SET  derrota = ? WHERE nome = ?';
			$preparaAtualizaTimeVisitanteTabela1 = $conn->prepare($atualizaTime1);
			$preparaAtualizaTimeVisitanteTabela1 ->bindValue(1,$derrotaTimeVisitante);
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
		else{
			
			$empateTimeCasa++;
			$empateTimeVisitante++;
			$pontosTimeCasa++;
			$pontosTimeVisitante++;
			
			$atualizaTimeCasa3 = 'UPDATE Time SET  empate = ?, pontos=? WHERE nome = ?';
			$preparaAtualizaTimeCasaTabela3 = $conn->prepare($atualizaTimeCasa3);
			$preparaAtualizaTimeCasaTabela3->bindValue(1,$empateTimeCasa);
			$preparaAtualizaTimeCasaTabela3->bindValue(2,$pontosTimeCasa);
			$preparaAtualizaTimeCasaTabela3->bindValue(3,$timeCasa);
			$preparaAtualizaTimeCasaTabela3->execute();
			
			$atualizaTimeVisitante3 = 'UPDATE Time SET  empate = ?, pontos=? WHERE nome = ?';
			$preparaAtualizaTimeVisitanteTabela3 = $conn->prepare($atualizaTimeVisitante3);
			$preparaAtualizaTimeVisitanteTabela3 ->bindValue(1,$empateTimeVisitante);
			$preparaAtualizaTimeVisitanteTabela3 ->bindValue(2,$pontosTimeVisitante);
			$preparaAtualizaTimeVisitanteTabela3 ->bindValue(3,$timeVisitante);
			$preparaAtualizaTimeVisitanteTabela3 ->execute();
		}
		echo "//////////////////";
		echo "Depois do jogo";
		echo "Time : ".$timeCasa;
		echo "Vitorias : ".$vitoriaTimeCasa."Derrotas : ".$derrotaTimeCasa."Empates : ".$empateTimeCasa."Pontos : ".$pontosTimeCasa;
		echo "||| time : ".$timeVisitante;
		echo "Vitorias : ".$vitoriaTimeVisitante."Derrotas : ".$derrotaTimeVisitante."Empates : ".$empateTimeVisitante."Pontos : ".$pontosTimeVisitante;
		
			
	}
	
?>