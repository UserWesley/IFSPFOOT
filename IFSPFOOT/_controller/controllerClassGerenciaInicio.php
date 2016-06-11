<?php
	
	/* Este arquivo chamará os arquivos responsáveis por iniciar um novo jogo*/
	
	//Inclusão dos arquivos model
	include_once '../_model/modelClassCampeonato.php';
	include_once '../_model/modelClassTime.php';
	include_once '../_model/modelClassEstadio.php';
	include_once '../_model/modelClassTabela.php';
	include_once '../_model/modelClassHabilidade.php';
	include_once '../_model/modelClassJogador.php';
	include_once '../_model/modelClassRodada.php';
	include_once '../_model/modelClassJogo.php';
	include_once '../_model/modelClassClima.php';
	
	//Zerar tabelas novo jogo
	//include_once '../_model/modelZerarTabela.php';
	session_start();
	
	Class controllerGerenciaInicio{
		
		function __construct(){
			
			//$this->cadastroCampeonato();
			//$this->cadastroTime();
			//$this->cadastroJogador();
			//$this->cadastroRodada();
			//$this->cadastroJogo();
		}
		
		public function verificaDados(){
				
			$campeonato = new modelClassCampeonato();
			
			$nomeCampeonato = $_POST['nomeCarregamento']; 
				
			$verificaCampeonato = $campeonato->consultaNomeCarregamento($nomeCampeonato);
				
			if($verificaCampeonato != NULL){
		
				header("Location: ../_view/viewNomeCarregamento.php");
		
			}else{
				
				$_SESSION['cadastroNomeCarregamento'] = "Login Sendo Utilizado !";
				
			}
			

		}
		
		public function cadastroCampeonato(){
			
			$campeonato = new modelClassCampeonato();
			//Chama aqui Verificar nome do jogo
			$campeonato->consultaNomeCarregamento();
			$campeonato->setNome("IFSPFOOT");
			$campeonato->setRodadaAtual(1);
			$campeonato->setTemporada(2016);
			$campeonato->setNomeCarregamento($_POST['nomeCarregamento']);
			$campeonato->setUsuario($_SESSION['idDono']);
		    $campeonato->cadastrarCampeonato($campeonato);

		}
		
		public function cadastroEstadio(){
			
			$estadio = new modelClassEstadio();
			$estadio->setNome("estadio");
			$estadio->setCapacidade(10);
			$estadio->cadastrarEstadio($estadio);
			
			$ultimoIdEstadio = $estadio->recolheUltimoIdEstadio();
			
			return $ultimoIdEstadio;

		}
		
		public function cadastroTabela(){
			
			$tabela = new modelClassTabela();
			$tabela->setVitoria(0);
			$tabela->setEmpate(0);
			$tabela->setDerrota(0);
			$tabela->setPonto(0);
			$tabela->cadastrarTabela($tabela);
			
			$ultimoIdTabela = $tabela->recolherUltimoIdTabela();
			
			return $ultimoIdTabela;
		}
		
		public function cadastroHabilidade(){
				
			$habilidade = new modelClassHabilidade();
			
			$habilidade->setAgilidade(10);
			$habilidade->setAtaque(10);
			$habilidade->setChute(10);
			$habilidade->setDefesa(10);
			$habilidade->setForca(10);
			$habilidade->setPasse(10);
			$habilidade->setResistencia(10);
			
			$habilidade->cadastrarHabilidade();
			
			$ultimoIdHabilidade = $habilidade->recolheUltimoIdHabilidade();
			
			return $ultimoIdHabilidade;
			
		}
		
		public function cadastroJogador($idTime){
				
			for($i=1;$i<=22;$i++){
		
				$jogador = new modelClassJogador();
		
				$jogador->setTitular(TRUE);
				$jogador->setNome("Nome");
				$jogador->setSobrenome("Sobrenome");
				$jogador->setNacionalidade("Nacionalidade");
				$jogador->setIdade(20);
				$jogador->setEstamina(100);
				$jogador->setNivel("Nivel");
				$jogador->setGol(0);
				$jogador->setPasse(10);
				$jogador->setSalario(10);
				$ultimoIdHabilidade = $this->cadastroHabilidade();
				$jogador->setIdtime($idTime);
				$jogador->setPosicao(1);
				$jogador->setHabilidade($ultimoIdHabilidade);
				$jogador->setTemperamento(1);
				$jogador->setEstilo(1);
								
				$jogador->cadastrarJogador($jogador);
					
			}
				
		}
		
		public function cadastroTime(){
			
			$campeonato = new modelClassCampeonato();
			$idCampeonato = $campeonato->recolherUltimoIdCampeonato();
			
			for($i=1;$i<=8;$i++){
				
				switch ($i){
					
					case 1 : $timeTeste = "Time1";
						break;
					
					case 2 : $timeTeste = "Time2";
						break;

					case 3 : $timeTeste = "Time3";	
						break;
					
					case 4 : $timeTeste = "Time4";
						break;
					
					case 5 : $timeTeste = "Time5";
						break;
							
					case 6 : $timeTeste = "Time6";
						break;
						
					case 7 : $timeTeste = "Time7";
						break;
							
					case 8 : $timeTeste = "Time8";
						break;
				}
				
				$ultimoIdEstadio = $this->cadastroEstadio();
				$ultimoIdTabela = $this->cadastroTabela();
				
				$time = new modelClassTime();
				
				$time->setNome($timeTeste);
				$time->setMascote($timeTeste);
				$time->setCor($timeTeste);
				$time->setDinheiro(100);
				$time->setTorcida(100);
				//Dono será cadastro como nulo
				$time->setCampeonato($idCampeonato);
				$time->setEstadio($ultimoIdEstadio);
				$time->setFormacao(1);
				$time->setEstrategia(1);
				$time->setAgressividade(1);
				$time->setTabela($ultimoIdTabela);
				$time->cadastrarTime($time);
				
				$ultimoIdTime = $time->recolheUltimoIdTime();
				$this->cadastroJogador($ultimoIdTime);
				
			}						
		}
		
		public function cadastroRodada(){
			
			$campeonato = new modelClassCampeonato();
			$ultimoIdCampeonato = $campeonato->recolherUltimoIdCampeonato();
			
			$time = new modelClassTime();
			$quantidadeTimesCampeonato = $time->recolheNumerodeTimesCampeonato($ultimoIdCampeonato);
			 
			
			$rodada = new modelClassRodada();			
			$rodada->setNumero(1);
			$rodada->setCampeonato($ultimoIdCampeonato);
			$rodada->cadastrarRodada($rodada,$quantidadeTimesCampeonato);				
				
		}
		
		public function cadastroJogo(){
			
			$arrayTimesCampeonato = array();
			$arrayClimas = array();
			
			$clima = new modelClassClima();
			$arrayClimas = $clima->recolheClimas();
			
			$campeonato = new modelClassCampeonato();
			$ultimoIdCampeonato = $campeonato->recolherUltimoIdCampeonato();
			
			$time = new modelClassTime();
			$quantidadeTimesCampeonato = $time->recolheNumerodeTimesCampeonato($ultimoIdCampeonato);
			$jogosRodada = $quantidadeTimesCampeonato /2;
			
			$rodada = new modelClassRodada();
			$numeroRodada = $rodada->recolheNumeroRodada($ultimoIdCampeonato);
			
			$i = 1;
			
			for($i=1; $i<=$numeroRodada;$i++){
				
				$quantidadeTimesCampeonatoContador = $quantidadeTimesCampeonato;
				
				//$arrayTimesCampeonato = $time->recolheTimesCampeonato();
					
				while($quantidadeTimesCampeonatoContador != $jogosRodada){
					
					$jogo = new modelClassJogo();
		
					//$timeCasa = $jogo->sorteiaJogo($arrayTimesCampeonato);
					//$jogo->removerTimeArray($arrayTimesCampeonato[$timeCasa]);
					//$timeVisitante = $jogo->sorteiaJogo($arrayTimesCampeonato);
					//$jogo->removerTimeArray($arrayTimesCampeonato[$timeVistante]);
					
					$jogo->setData('2014-01-01');
					
					$jogo->setCampeonato($ultimoIdCampeonato);
					$jogo->setRodada($i);	
					$jogo->setTimeCasa(1);
					$jogo->setTimeVisitante(2);
					$climaJogo = $clima->sorteioClima($arrayClimas);
					$jogo->setClima($climaJogo);
					$jogo->cadastrarJogo($jogo);
					
					$quantidadeTimesCampeonatoContador--;
		
				}

			}
		}
	}
	
	$gerenciaInicio = new controllerGerenciaInicio();
	$gerenciaInicio->verificaDados();
	$gerenciaInicio->cadastroCampeonato();
	$gerenciaInicio->cadastroTime();
	$gerenciaInicio->cadastroRodada();
	$gerenciaInicio->cadastroJogo();
	
	//Chamando o arquivo para iniciar um jogo
	header("LOCATION: ../_view/viewNovoJogo.php");	

?>