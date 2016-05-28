<?php
 
	/*ESte arquivo será responsável por chamar o arquivo que recolher os dados antes do jogo, ou seja, qualquer
	 arquivo que prepare a configurações dos times para iniciar uma nova rodada
	 */
	session_start();

	//Inclusão do arquivo para recolher dados do jogos da rodada
	//include_once '../_model/modelRecolherDadosJogosRodada.php';
	
	include_once '../_model/modelClassCampeonato.php';
	include_once '../_model/modelClassJogo.php';
	
	Class controllerPreparaJogo{
		
		private $rodadaAtual;
		private $jogosArray;
		
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
		
		public function __construct(){
			
			$this->verificaRodada();
		}
		
		public function __destruct(){
			
		}
		
		public function verificaRodada(){
			
			$rodada = new modelClassCampeonato();
			$rodadaAtual = $rodada->rodadaAtual();
			$this->setRodadaAtual($rodadaAtual);
		
		}
		
		public function preparaJogosRodada($rodadaAtual){
			
			$jogo = new modelClassJogo();
			$jogos = $jogo->consultaJogoRodada($rodadaAtual);
			
			return $jogos;
		}
		
	}
	
	$preparacaoJogo = new controllerPreparaJogo();
	$preparacaoJogo->verificaRodada();
	$rodadaAtual =  $preparacaoJogo->getRodadaAtual();

	$_SESSION['times'] = $preparacaoJogo->preparaJogosRodada($rodadaAtual);


	header("Location: ../_view/viewJogo.php");
	
?>
