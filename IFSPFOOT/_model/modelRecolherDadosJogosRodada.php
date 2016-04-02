<?php
 
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	session_start();
	$rodada = 1;
	$id = "teste";
	$times = array();
	//$consultaRodada = 'SELECT Jogo.timeCasa, Jogo.timeVisitante FROM Jogo,Rodada WHERE Jogo.rodada = Rodada.numero and Rodada.numero = ?';
	$consultaRodada = 'SELECT Jogo.timeCasa, Jogo.timeVisitante FROM Jogo WHERE Jogo.rodada = ?';
	$preparaConsultaRodada = $conn->prepare($consultaRodada);
	$preparaConsultaRodada->bindValue(1,$rodada);
	$preparaConsultaRodada->execute();
	
	$result = $preparaConsultaRodada->setFetchMode(PDO::FETCH_NUM);
	while ($row = $preparaConsultaRodada->fetch()) {

		echo $_SESSION['timeCasa']= $row[0];
		echo $_SESSION['timeVisitante']=$row[1];

		
		$times[]= $row[0];
		$times[]= $row[1];
/*		for($i=1;$i<=2;$i++){
			
			$jogo = array();
			$jogo['idJogo']=$i;
			$jogo['timeCasa']=$row[0];
			$jogo['timeCasagol']=$row[1];
			$jogo['timeVisitantegol']=$row[2];
			$jogo['timeVisitante']=$row[3];
			$jogo['timeCasa']=$id;
			$_SESSION['jogo'] = $jogo;
		}*/
	}
	list($a, $b, $c, $d) = $times;
	$_SESSION['times'] = $times;
?>
