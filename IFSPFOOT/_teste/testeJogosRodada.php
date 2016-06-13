<?php 



$timesCampeonato = array('1','2','3','4','5','6');
$timesCampeonatoReplica = array();
$time = array();
$time2 = array();
$jogo = array();
$jogoInverso = array();
$jogos = array();

$quantidadeTimes = count($timesCampeonato);
$quantidadeJogos = $quantidadeTimes / 2;
$timesCampeonatoReplica = $timesCampeonato;

while($quantidadeTimes != $quantidadeJogos ){

	sorteia();
	
	$quantidadeTimes--;

}



function sorteia(){
	
	unset($jogo);
	unset($jogoInverso);
	
	$timeCasa = array_rand($timesCampeonatoReplica,1);
	
	$key = array_search($timesCampeonatoReplica[$timeCasa], $timesCampeonatoReplica);
	if($key!==false){
		unset($timesCampeonatoReplica[$key]);
	}
	
	$timeVisitante = array_rand($timesCampeonatoReplica,1); ;
	
	$key = array_search($timesCampeonatoReplica[$timeVisitante], $timesCampeonatoReplica);
	if($key!==false){
		unset($timesCampeonatoReplica[$key]);
	}
	
	$jogo[] = $timesCampeonato[$timeCasa];
	$jogo[] = $timesCampeonato[$timeVisitante];
	$jogoInverso[] = $timesCampeonato[$timeVisitante];
	$jogoInverso[] = $timesCampeonato[$timeCasa];
	
	$jogos[] = $jogo;
}


function verifica(){
	
	if(in_array($jogo, $jogos)){
		sorteia();
	}
	if(in_array($jogoInverso,$jogos)){
		sorteia();
	}
}


?>
