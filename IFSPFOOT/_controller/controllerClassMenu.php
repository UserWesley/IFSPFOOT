<?php 

	include_once '../_model/modelClassJogador.php';
	include_once '../_model/modelClassJogo.php';
	include_once '../_model/modelClassTime.php';
	
	Class controllerClassMenu{	
		
		public function buscaArtilharia(){
			
			$jogador = new modelClassJogador();
			$artilheiros = array();
			
			$artilheiros = $jogador->consultaArtilheiria();
			
			return $jogador->visualizaArtilharia($artilheiros);
		}

		public function buscaJogos(){
			
			$jogo = new modelClassJogo();
			$jogosCampeonato = array();
			
			$jogosCampeonato = $jogo->consultaJogos();
			
			return $jogosCampeonato;
		}
		
		public function buscaJogador($idDono){
			
			$jogador = new modelClassJogador();
			
			$time = new modelClassTime();
			
			$jogadorTime = array();
			
			$idTime = $time->consultaIdTime($idDono);
			
			$jogadorTime = $jogador->consultaJogadorTime($idTime);
			
			return $jogadorTime;
		}
		
		public function buscarTime($id){
			
			$time = new modelClassTime();
			
			$time->setId($id);
			$idTime = $time->getId();
			
			$timeEscolhido = $time->consultaNomeTime($idTime);
			
			return $timeEscolhido;
			
		}
		
		public function buscarDadoTime($id){
			
			$time = new modelClassTime();
			
			$time->setId($id);
			$idTime = $time->getId();
			
			$timeEscolhido = array();
			
			$timeEscolhido = $time->consultaDadoTime($idTime);
			
			return $timeEscolhido;
		}
		
	}

?>