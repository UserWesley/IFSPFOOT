<?php
	
	//Inclusão da classe ModelUsuário
	include_once '../_model/modelClassTime.php';
	include_once '../_model/modelClassJogador.php';

	session_start();

	Class controllerClassFimCampeonato{
 		
		//Busca o nome do time vencedor do Campeonato
	 	public function BuscarTimeVencedor(){
	 		
	 		$tabela = new modelClassTabela();
	 		$tabela->setCampeonato($_SESSION['IdCampeonato']);
	 		$idTabela = $tabela->consultaCampeao($tabela);
	 		
	 		$time = new modelClassTime();
	 		$time->setTabela($idTabela);
	 		$timeCampeao = $time->consultaTimeCampeao();
	 		
	 		return $timeCampeao;
	 	
	 	}
	 	
	 	//Busca o artilheiro do campeonato
	 	public function BuscarArtilheiro(){
	 		
	 		$artilheiro = array();
	 		
	 		$jogador = new modelClassJogador();
	 		$jogador->setCampeonato($_SESSION['IdCampeonato']);
	 		$artilheiro = $jogador->consultaArtilheiroCampeonato($jogador);
	 		
	 		return $artilheiro;
	 		
	 	}
 	
 }
?>