<?php 

	include_once '../_model/modelClassJogador.php';
	include_once '../_model/modelClassJogo.php';
	include_once '../_model/modelClassTime.php';
	include_once '../_model/modelClassCampeonato.php';

	Class controllerClassMenu{	
		
		public function consultaIdCampeonato($usuario,$nomeCarregamento){
			
			$campeonato = new modelClassCampeonato();
			$campeonato->setNomeCarregamento($nomeCarregamento);
			$campeonato->setUsuario($usuario);
			$idCampeonato = $campeonato->consultaIdCampeonato($campeonato);
			
			return $idCampeonato;
		}
		
		public function buscaArtilharia(){
			
			$jogador = new modelClassJogador();
			$artilheiros = array();
			
			$artilheiros = $jogador->consultaArtilheiria();
			
			return $jogador->visualizaArtilharia($artilheiros);
		}

		public function buscaJogos($idCampeonato){
			
			$jogo = new modelClassJogo();
			$jogosCampeonato = array();
			
			$jogo->setCampeonato($idCampeonato);
			$jogosCampeonato = $jogo->consultaJogos($jogo);
			
			return $jogo->visualizaJogos($jogosCampeonato);
			
		}
		
		public function buscaJogador($idDono,$idCampeonato){
			
			$jogador = new modelClassJogador();
			$time = new modelClassTime();
			
			$jogadoresTime = array();
			
			$time->setDono($idDono);
			$time->setCampeonato($idCampeonato);
			$idTime = $time->consultaIdTime($time);
			
			$jogadoresTime = $jogador->consultaJogadorTime($idTime);

			
			return $jogador->visualizaJogador($jogadoresTime);
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