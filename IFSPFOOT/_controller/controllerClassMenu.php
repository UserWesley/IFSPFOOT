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
			
			return $jogo->visualizaJogos($jogosCampeonato);
			
		}
		
		public function buscaJogador($idDono){
			
			$jogador = new modelClassJogador();
			$time = new modelClassTime();
			
			$jogadoresTime = array();
			
			$idTime = $time->consultaIdTime($idDono);
			
			$jogadoresTime = $jogador->consultaJogadorTime($idTime);
			
			return $jogador->visualizaJogadorTime($jogadoresTime);
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
			
			return $time->visualizaDadoTime($timeEscolhido);
			
		}
		
		public function buscarTabela(){
			
			$time = new modelClassTime();
			
			$tabela = array();
			
			$tabela = $time->consultaTabelaCampeonato();
			
			return $time->visualizaTabelaCampeonato($tabela);
			
		}
		
	}

?>