<?php
 
	/*ESte arquivo será responsável por chamar o arquivo que recolher os dados antes do jogo, ou seja, qualquer
	 arquivo que prepare a configurações dos times para iniciar uma nova rodada
	 */
	session_start();

	include_once '../_model/modelClassCampeonato.php';
	include_once '../_model/modelClassJogo.php';
	include_once '../_model/modelClassRodada.php';
	
	Class controllerPreparaJogo{
		
		private $rodadaAtual;
		private $jogosArray;
		
		public function __construct(){
				
			$this->verificaRodada();
		}
		
		public function getRodadaAtual(){
			return $this->rodadaAtual;
		}
		
		public function setRodadaAtual($rodadaAtual){
			$this->rodadaAtual = $rodadaAtual;
		}
		
		public function getJogosArray(){
			return $this->jogosArray;
		}
		
		public function setJogosArray($jogosArray){
			$this->jogosArray = $jogosArray;
		}
		public function verificaFimCampeonato(){
				
			$rodada = new modelClassRodada();
			$rodada->setCampeonato($_SESSION['IdCampeonato']);
			$ultimaRodada = $rodada->consultaQuantidadeRodadas($rodada);
				
			$campeonato = new modelClassCampeonato();
			$campeonato->setId($_SESSION['IdCampeonato']);
			$rodadaAtual = $campeonato->rodadaAtual($campeonato);
				
			if($rodadaAtual == $ultimaRodada){
		
				header("Location: ../_view/viewTelaFimCampeonato.php");
			}
				
		}
		
		public function verificaRodada(){
			
			$campeonato = new modelClassCampeonato();
			$campeonato->setId($_SESSION['IdCampeonato']);
			$rodadaAtual = $campeonato->rodadaAtual($campeonato);
			$this->setRodadaAtual($rodadaAtual);
		
		}
		
		public function preparaJogosRodada($rodadaAtual){
			
			$jogo = new modelClassJogo();
			$jogo->setRodada($rodadaAtual);
			$jogo->setCampeonato($_SESSION['IdCampeonato']);
			$jogos = $jogo->consultaJogoRodada($jogo);
			
			return $jogos;
		}
		
	}
	
	$preparacaoJogo = new controllerPreparaJogo();
	$preparacaoJogo->verificaFimCampeonato();
	$preparacaoJogo->verificaRodada();
	$rodadaAtual =  $preparacaoJogo->getRodadaAtual();

	$_SESSION['times'] = $preparacaoJogo->preparaJogosRodada($rodadaAtual);


	header("Location: ../_view/viewJogo.php");
	
?>
