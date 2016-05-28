<?php 

	/*Este arquio será responsável por realizar o gerenciamento após o jogo*/
	
	//Inclusão do arquivo para atualizar o placar
	include_once('../_model/modelClassJogo.php');
	include_once('../_model/modelClassTime.php');
	include_once('../_model/modelClassJogador.php');
	include_once('../_model/modelClassCampeonato.php');
	
	class GerenciaPosJogo{
		
		public function __construct(){
			$this->atualizarPlacar();
		}
		
		public function __destruct(){
			
		}
		
		public function atualizarPlacar(){
	
			//Obtendo os dados enviados pelo ajax
			$dadosCompactados = $_REQUEST['content'];
			
			//explodindo os dados em array para obter os placares e os nomes dos times
			$dadosExplodidosArray = explode(",", $dadosCompactados);
			
			//Percorrendo jogo a jogo da rodada
			$quantidadeElemento = count($dadosExplodidosArray);
			$percorreElementos=0;
			
			$jogo = new modelClassJogo();
			
			//Debug - echo $quantidadeElemento;
			
			while($percorreElementos < $quantidadeElemento){
				
				$jogo->setTimeCasa($dadosExplodidosArray[$percorreElementos]);
				$percorreElementos++;
				$jogo->setGolCasa($dadosExplodidosArray[$percorreElementos]);
					
				$percorreElementos=$percorreElementos+2;
					
				$jogo->setGolVisitante($dadosExplodidosArray[$percorreElementos]);
				$percorreElementos++;
				$jogo->setTimeVisitante($dadosExplodidosArray[$percorreElementos]);
					
				$percorreElementos=$percorreElementos+2;
				
				$timeCasa = $jogo->getTimeCasa();
				$timeVisitante = $jogo->getTimeVisitante();
				$golCasa = $jogo->getGolCasa();
				$golVisitante = $jogo->getGolVisitante();
				
				$jogo->atualizaPlacar($jogo);
				
				$this->controleTabela($timeCasa, $golCasa, $golVisitante, $timeVisitante);
				$this->controleArtilharia($timeCasa,$golCasa,$golVisitante,$timeVisitante);
			
			}
		}
		
		public function controleTabela($timeCasa,$golCasa,$golVisitante,$timeVisitante){
			
			$time = new modelClassTime();
			$jogo = new modelClassJogo();
			
			$timeCasaArray = array();
			$timeVisitanteArray = array();
				
			$timeCasaArray = $time->consultaTabela($timeCasa);
			$timeVisitanteArray = $time->consultaTabela($timeVisitante);
			
			$resultado = $jogo->verificaPlacar($golCasa,$golVisitante);
			
			if($resultado == 1){
				
				$time->atualizaTimeVencedorTabela($timeCasaArray);
				$time->atualizaTimePerdedorTabela($timeVisitanteArray);
			
			}
			elseif ($resultado == 2){
				
				$time->atualizaTimeVencedorTabela($timeVisitanteArray);
				$time->atualizaTimePerdedorTabela($timeCasaArray);
			
			}
			
			else {
				
				$time->empateTabela($timeCasaArray);
				$time->empateTabela($timeVisitanteArray);
			}
			
		}
		
		public function controleArtilharia($timeCasa,$golCasa,$golVisitante,$timeVisitante){
			
			$jogador = new modelClassJogador();
			$time = new modelClassTime();
			
			$jogadoresCasa = array();
			$jogadoresVisitante = array();
			
			$iterador = 1;
			while ($iterador <= $golCasa){
				
				$idTime = $time->consultaId($timeCasa);
				$jogadoresCasa = $jogador->consultaJogador($idTime);	
			 	$jogadorCasa = $jogador->sorteiaJogador($jogadoresCasa);
				$quantidadeGol = $jogador->consultaGol($jogadorCasa);
				$jogador->inseriGol($quantidadeGol,$jogadorCasa);
				$iterador++;
				
			}
			
			$iterador = 1;
			while ($iterador <= $golCasa){
				
				$idTime = $time->consultaId($timeVisitante);
				$jogadoresVisitante = $jogador->consultaJogador($idTime);
				$jogadorVisitante = $jogador->sorteiaJogador($jogadoresVisitante);
				$quantidadeGol = $jogador->consultaGol($jogadorVisitante);
				$jogador->inseriGol($quantidadeGol,$jogadorVisitante);
				$iterador++;
			}
		}
		
		function avancaRodada(){
			
			$campeonato = new modelClassCampeonato();
			
			$rodada = $campeonato->rodadaAtual();
			$campeonato->avancaRodada($rodada);
		}
	}
	
	$gerenciaPosJogo = new GerenciaPosJogo();
	$gerenciaPosJogo->avancaRodada();
	

?>