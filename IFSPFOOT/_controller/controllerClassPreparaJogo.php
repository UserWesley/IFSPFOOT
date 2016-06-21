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

		
		public function verificaRodada(){
			
			$campeonato = new modelClassCampeonato();
			$campeonato->setId($_SESSION['IdCampeonato']);
			$rodadaAtual = $campeonato->rodadaAtual($campeonato);
			
			if($rodadaAtual > 38){
				header("Location: ../_view/viewTelaFimCampeonato.php");
			}
			else{
								
				$this->preparaJogosRodada($rodadaAtual);

				$_SESSION['times'] = $this->preparaJogosRodada($rodadaAtual);
				
				header("Location: ../_view/viewJogo.php");
				
			}
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

	
?>
