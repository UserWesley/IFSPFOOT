<?php
	
	/* Este arquivo chamará os arquivos responsáveis por iniciar um novo jogo*/
	
	include_once '../_model/modelClassCampeonato.php';
	include_once '../_model/modelClassTime.php';
	include_once '../_model/modelClassJogador.php';
	include_once '../_model/modelClassRodada.php';
	include_once '../_model/modelClassJogo.php';
	
	//Zerar tabelas novo jogo
	include_once '../_model/modelZerarTabela.php';
	
	
	Class controllerGerenciaInicio{
		
		function __construct(){
			
			$this->cadastroCampeonato();
			$this->cadastroTime();
			$this->cadastroJogador();
			$this->cadastroRodada();
			$this->cadastroJogo();
		}
		
		function __destruct(){
			
		}
		
		public function cadastroCampeonato(){
			
			$campeonato = new modelClassCampeonato();
			$campeonato->setId(1);
			$campeonato->setNome("IFSPFOOT");
			$campeonato->setRodadaAtual(1);
			$campeonato->setTemporada(2016);
			$campeonato->setVencedor("null");
			$campeonato->setUsuario(1);
			$campeonato->cadastrarCampeonato($campeonato);
		
		}
		
		public function cadastroTime(){
			
			for($i=1;$i<=4;$i++){
				
				switch ($i){
					case 1 : $timeTeste = "Time1";
						break;
					case 2 : $timeTeste = "Time2";
						break;
					case 3 : $timeTeste = "Time3";
						break;
					case 4 : $timeTeste = "Time4";
						break;
				}
				
				$time = new modelClassTime();
				
				$time->setId($i);
				$time->setNome($timeTeste);
				$time->setMascote($timeTeste);
				$time->setCor($timeTeste);
				$time->setDinheiro(100);
				$time->setTorcida(100);
				$time->setNomeEstadio($timeTeste);
				$time->setCapacidade(100);
				$time->setVitoria(0);
				$time->setDerrota(0);
				$time->setEmpate(0);
				$time->setPonto(0);
				$time->cadastrarTime($time);
				
			}						
		}
		
		public function cadastroJogador(){
			$i;
			
			for($i=1;$i<=16;$i++){
				
				if($i <= 4){	
					$idTime = 1;
				}
				elseif (($i>4) && ($i <= 8)) {
					$idTime = 2;
				}
						
				elseif (($i >8) && ($i <=12)){
					$idTime = 3;
				}
				
				else {	
					$idTime = 4;
				}
				
				$jogador = new modelClassJogador();
				$jogador->setId($i);
				$jogador->setTitular("T");
				$jogador->setNome("Nome");
				$jogador->setSobrenome("Sobrenome");
				$jogador->setPosicao("Posição");
				$jogador->setNacionalidade("Nacionalidade");
				$jogador->setHabilidade("Habilidade");
				$jogador->setIdade(20);
				$jogador->setForca(100);
				$jogador->setIdtime($idTime);
				$jogador->setEstamina(100);
				$jogador->setNivel("Nivel");
				$jogador->setGol(0);
				$jogador->cadastrarJogador($jogador);
				
			}
			
		}
		
		public function cadastroRodada(){
			
			$rodada = new modelClassRodada();
			
			for($i=1;$i<=6;$i++){
				
				$rodada->setId($i);		
				$rodada->setNumero($i);
				$rodada->setCampeonato(1);
				$rodada->cadastrarRodada($rodada);
				
			}
			
		}
		public function cadastroJogo(){
			
			$jogo = new modelClassJogo();
					
			$jogo->setId(1);
			$jogo->setTimeCasa("Time1");
			$jogo->setTimeVisitante("Time2");
			$jogo->setRodada(1);
			$jogo->cadastrarJogo($jogo);

			$jogo->setId(2);
			$jogo->setTimeCasa("Time3");
			$jogo->setTimeVisitante("Time4");
			$jogo->setRodada(1);
			$jogo->cadastrarJogo($jogo);
				
			$jogo->setId(3);
			$jogo->setTimeCasa("Time1");
			$jogo->setTimeVisitante("Time3");
			$jogo->setRodada(2);
			$jogo->cadastrarJogo($jogo);
				
			$jogo->setId(4);
			$jogo->setTimeCasa("Time2");
			$jogo->setTimeVisitante("Time4");
			$jogo->setRodada(2);
			$jogo->cadastrarJogo($jogo);
				
			$jogo->setId(5);
			$jogo->setTimeCasa("Time1");
			$jogo->setTimeVisitante("Time4");
			$jogo->setRodada(3);
			$jogo->cadastrarJogo($jogo);
				
			$jogo->setId(6);
			$jogo->setTimeCasa("Time2");
			$jogo->setTimeVisitante("Time3");
			$jogo->setRodada(3);
			$jogo->cadastrarJogo($jogo);
				
			$jogo->setId(7);
			$jogo->setTimeCasa("Time2");
			$jogo->setTimeVisitante("Time1");
			$jogo->setRodada(4);
			$jogo->cadastrarJogo($jogo);
				
			$jogo->setId(8);
			$jogo->setTimeCasa("Time4");
			$jogo->setTimeVisitante("Time3");
			$jogo->setRodada(4);
			$jogo->cadastrarJogo($jogo);
				
			$jogo->setId(9);
			$jogo->setTimeCasa("Time3");
			$jogo->setTimeVisitante("Time1");
			$jogo->setRodada(5);
			$jogo->cadastrarJogo($jogo);
				
			$jogo->setId(10);
			$jogo->setTimeCasa("Time4");
			$jogo->setTimeVisitante("Time2");
			$jogo->setRodada(5);
			$jogo->cadastrarJogo($jogo);
				
			$jogo->setId(11);
			$jogo->setTimeCasa("Time4");
			$jogo->setTimeVisitante("Time1");
			$jogo->setRodada(6);
			$jogo->cadastrarJogo($jogo);
				
			$jogo->setId(12);
			$jogo->setTimeCasa("Time3");
			$jogo->setTimeVisitante("Time2");
			$jogo->setRodada(6);
			$jogo->cadastrarJogo($jogo);		
			
		}
	}
	
	$gerenciaInicio = new controllerGerenciaInicio();

	//Chama arquivo que irá gerar times
	//include_once '../_model/modelCadastrarTimesAutomatico.php';
	//Chama arquivo que irá gerar jogadores
	//include_once '../_model/modelCadastrarJogadoresAutomatico.php';
	//Chama arquivo que irá gerar Rodadas
	//include_once '../_model/modelCadastrarRodadasAutomaticas.php';
	//Chama arquivo que irá gerar jogos
	//include_once '../_model/modelCadastroAutomaticoJogos.php';
	
	//Chamando o arquivo para iniciar um jogo
	header("LOCATION: ../_view/viewNovoJogo.php");	

?>