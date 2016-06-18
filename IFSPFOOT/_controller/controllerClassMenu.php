<?php 

	include_once '../_model/modelClassJogador.php';
	include_once '../_model/modelClassJogo.php';
	include_once '../_model/modelClassTime.php';
	include_once '../_model/modelClassCampeonato.php';
	include_once '../_model/modelClassRodada.php';
	include_once '../_model/modelClassEstadio.php';
	include_once '../_model/modelClassEstrategia.php';
	include_once '../_model/modelClassAgressividade.php';
	include_once '../_model/modelClassFormacao.php';
	include_once '../_model/modelClassTabela.php';
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
		
		//Realiza as operações para buscar e exibir os dados do estadio do time na tela
		public function buscarEstadio($usuario,$campeonato){
				
			$dadosEstadio = array();
				
			$time = new modelClassTime();
			$estadio = new modelClassEstadio();
				
			$time->setDono($usuario);
			$time->setCampeonato($campeonato);
				
			$idTimeEstadio = $time->consultaIdEstadioTime($time);
			$estadio->setId($idTimeEstadio);
			$dadosEstadio = $estadio->consultaEstadio($estadio);
				
			return $estadio->exibeEstadio($dadosEstadio);
		}
		
		public function buscaRodada($idRodada,$idCampeonato){
				
			$rodadaSelecionada = array();
				
			$rodada = new modelClassRodada();
				
			$rodada->setNumero($idRodada);
			$rodada->setCampeonato($idCampeonato);
				
			$rodadaSelecionada = $rodada->consultaRodada($rodada);
				
			return $rodada->exibeRodada($rodadaSelecionada);
		}
		
		public function cabecalhoRodada($idCampeonato){
		
			$rodada = new modelClassRodada();
			$rodada->setCampeonato($idCampeonato);
				
			$quantidadeRodada = $rodada->consultaQuantidadeRodadas($rodada);
				
			return $quantidadeRodada;
		}
		
		public function buscarTabela($idCampeonato){
			
			$tabela = new modelClassTabela();
			$tabela->setCampeonato($idCampeonato);
			
			$tabelaCampeonato = array();
			
			$tabelaCampeonato = $tabela->consultaTabelaCampeonato($tabela);
			
			return $tabela->visualizaTabelaCampeonato($tabelaCampeonato);
			
		}
		
		public function buscaEstrategia(){
			
			$estrategias = array();
			
			$estrategia = new modelClassEstrategia();
			$estrategias = $estrategia->consultaEstrategia();
			
			return $estrategias;
			
		}
		
		public function buscaFormacao(){
			
			$formacoes = array();
			
			$formacao = new modelClassFormacao();
			$formacoes = $formacao->consultaFormacao();
			
			return $formacoes;
		}
		
		public function buscaAgressividade(){
			
			$agressividades = array();
			
			$agressividade = new modelClassAgressividade();
			$agressividades = $agressividade->consultaAgressividade();
			
			return $agressividades;
			
		}

		public function buscaRodadaAtual($idCampeonato){
				
			$campeonato = new modelClassCampeonato();
			$campeonato->setId($idCampeonato);
			$rodadaAtual = $campeonato->rodadaAtual($campeonato);
			return $rodadaAtual;
				
		}
			
		
	}

?>