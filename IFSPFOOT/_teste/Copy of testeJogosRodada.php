<?php

$times = array("1","2","3","4","5","6","7","8","9","10");
$times2 = array();
$jogo = array();
$jogos = array();
$rodada = array();

$numeroTimes = count($times);
$times2 = $times;
$jog = $numeroTimes /2;

$rodadas= ($numeroTimes *2)-2;
$i=1;

while($i <= $rodadas){
	
	$times= $times2;
	
	while($numeroTimes != $jog){
		
		do{
			unset($jogo);
			
		//	echo "<br>Jogo".$numeroTimes;
		//	echo "<br>Index : ".$timeCasa = array_rand($times2,1);
		//	echo "<p>Elemento TimeCasa : ".$times2[$timeCasa];
			
			$key = array_search($times2[$timeCasa], $times2);
			if($key!==false){
		    	unset($times2[$key]);
			}
			
		//	echo "<p>Index 2:".$timeVisitante = array_rand($times2,1);
		//	echo "<p>Elemento TimeVisitante : ".$times2[$timeVisitante];
			
			$key1 = array_search($times2[$timeVisitante], $times2);
			if($key1!==false){
		    	unset($times2[$key1]);
			}
			
			$jogo[]= $times[$timeCasa];
			$jogo[]= $times[$timeVisitante];
			
		}while(in_array(array($timeCasa,$timeVisitante), $jogos) || (in_array(array($timeVisitante,$timeCasa), $jogos));
		/*if(in_array($jogo, $jogos)){
			echo "Tem";
		}
		else{
			echo "Não tem";
		}
		*/
		$jogos[]= $jogo;
		
		$numeroTimes--;
	/*	echo "<br>=============================";
		echo "<p><p>Elementos do array ";
		foreach ($times2 as &$value) {
	    	echo "<br>".$value;
		}
		echo "<br>=============================";
	*/
		
	}
	$rodada = $jogos;
	
$i++;

}
	print_r($jogos);
	if(in_array(array($timeCasa,$timeVisitante), $jogos) || (in_array(array($timeCasa,$timeVisitante), $jogos)){
		
	}
	if(in_array($jogo, $jogos)){
		echo "Tem";	
	}
	else{
		echo "Não tem";
	}
	


