<?php 

	//Esta classe controla as opçoes do menu do jogo


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
		
		//controla a consulta do idcampeonato caso o usuario carrega um novo jogo
		public function consultaIdCampeonato($usuario,$nomeCarregamento){
			
			$campeonato = new modelClassCampeonato();
			$campeonato->setNomeCarregamento($nomeCarregamento);
			$campeonato->setUsuario($usuario);
			$idCampeonato = $campeonato->consultaIdCampeonato($campeonato);
			
			return $idCampeonato;
		}
		
		//controla a artilharia do campeonato
		public function buscaArtilharia($idCampeonato){
			
			$artilheiros = array();
				
			$jogador = new modelClassJogador();
			$jogador->setCampeonato($idCampeonato);
			
			$artilheiros = $jogador->consultaArtilheiria($jogador);
			
			return $jogador->visualizaArtilharia($artilheiros);
		}
		
		//controla os jogos do campeonato
		public function buscaJogos($idCampeonato){
			
			$jogo = new modelClassJogo();
			$jogosCampeonato = array();
			
			$jogo->setCampeonato($idCampeonato);
			$jogosCampeonato = $jogo->consultaJogos($jogo);
			
			return $jogo->visualizaJogos($jogosCampeonato);
			
		}
		
		//Controla a busca de jogadores do seu time
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
		
		//controla a busca de time
		public function buscarTime($id){
			
			$time = new modelClassTime();
			
			$time->setId($id);
			$idTime = $time->getId();
			
			$timeEscolhido = $time->consultaNomeTime($idTime);
			
			return $timeEscolhido;
			
		}
		
		//controle a busca de dados de time
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
		
		//controla a busca de rodada
		public function buscaRodada($idRodada,$idCampeonato){
				
			$rodadaSelecionada = array();
				
			$rodada = new modelClassRodada();
				
			$rodada->setNumero($idRodada);
			$rodada->setCampeonato($idCampeonato);
				
			$rodadaSelecionada = $rodada->consultaRodada($rodada);
				
			return $rodada->exibeRodada($rodadaSelecionada);
		}
		
		//controla a cabecalho Rodada do campeonato
		public function cabecalhoRodada($idCampeonato){
		
			$rodada = new modelClassRodada();
			$rodada->setCampeonato($idCampeonato);
				
			$quantidadeRodada = $rodada->consultaQuantidadeRodadas($rodada);
				
			return $quantidadeRodada;
		}
		
		//controla a tabela do campeonato
		public function buscarTabela($idCampeonato){
			
			$tabela = new modelClassTabela();
			$tabela->setCampeonato($idCampeonato);
			
			$tabelaCampeonato = array();
			
			$tabelaCampeonato = $tabela->consultaTabelaCampeonato($tabela);
			
			return $tabela->visualizaTabelaCampeonato($tabelaCampeonato);
			
		}
		
		//controla a consulta de estrategias
		public function buscaEstrategia(){
			
			$estrategias = array();
			
			$estrategia = new modelClassEstrategia();
			$estrategias = $estrategia->consultaEstrategiaMenu();
			
			return $estrategias;
			
		}
		
		//controla a busca de formacao no banco
		public function buscaFormacao(){
			
			$formacoes = array();
			
			$formacao = new modelClassFormacao();
			$formacoes = $formacao->consultaFormacaoMenu();
			
			return $formacoes;
		}
		
		//controla a busca de agressivadade disponiveis no banco
		public function buscaAgressividade(){
			
			$agressividades = array();
			
			$agressividade = new modelClassAgressividade();
			$agressividades = $agressividade->consultaAgressividadeMenu();
			
			return $agressividades;
			
		}
		//controla a busca da rodadade inicial do campeonato
		public function buscaRodadaAtual($idCampeonato){
				
			$campeonato = new modelClassCampeonato();
			$campeonato->setId($idCampeonato);
			$rodadaAtual = $campeonato->rodadaAtual($campeonato);
			return $rodadaAtual;
				
		}
			
		
	}

?>