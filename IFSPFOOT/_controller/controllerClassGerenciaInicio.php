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
	include_once '../_model/modelClassNomePessoal.php';
	include_once '../_model/modelClassSobrenome.php';
	include_once '../_model/modelClassPosicao.php';
	include_once '../_model/modelClassTemperamento.php';
	include_once '../_model/modelClassEstilo.php';
	include_once '../_model/modelClassNacionalidade.php';
	include_once '../_model/modelClassNivel.php';
	include_once '../_model/modelClassEstrategia.php';
	include_once '../_model/modelClassFormacao.php';
	include_once '../_model/modelClassAgressividade.php';
	
	session_start();
	
	Class controllerGerenciaInicio{
		
		function __construct(){
			
			//$this->cadastroCampeonato();
			//$this->cadastroTime();
			//$this->cadastroJogador();
			//$this->cadastroRodada();
			//$this->cadastroJogo();
		}
		public function direcionaTela(){
			//Chamando o arquivo para iniciar um jogo
			header("LOCATION: ../_view/viewNovoJogo.php");
		}
		
		//Verificar se existe nome carregamento salvo no bancod
		public function verificaDados(){
				
			$campeonato = new modelClassCampeonato();
			
			$campeonato->setNomeCarregamento($_POST['nomeCarregamento']);
			$campeonato->setUsuario($_SESSION['idDono']); 
				
			$verificaCampeonato = $campeonato->consultaNomeCarregamento($campeonato);

			
			if(empty($verificaCampeonato)){
					
				$this->cadastroCampeonato();
				$this->cadastroTime();
				$this->cadastroRodada();
				$this->cadastroJogo();
				$this->direcionaTela();
				
			}else{
				header("Location: ../_view/viewNomeCarregamento.php");
				$_SESSION['cadastroNomeCarregamento'] = "Login Sendo Utilizado !";
				
			}
			

		}
		
		//cadastro de campeonato
		public function cadastroCampeonato(){
			
			$campeonato = new modelClassCampeonato();
			//Chama aqui Verificar nome do jogo
			$campeonato->setNome("IFSPFOOT");
			$campeonato->setRodadaAtual(1);
			$campeonato->setTemporada(2016);
			$campeonato->setNomeCarregamento($_POST['nomeCarregamento']);
			$campeonato->setUsuario($_SESSION['idDono']);
		    $campeonato->cadastrarCampeonato($campeonato);
		    
		    $_SESSION['IdCampeonato']= $campeonato->recolherUltimoIdCampeonato($campeonato);

		}
		//Cadastro de estadio
		public function cadastroEstadio(){
			
			$estadio = new modelClassEstadio();
			$estadio->setNome("estadio");
			$estadio->setCapacidade(10);
			$estadio->setCampeonato($_SESSION['IdCampeonato']);
			$estadio->cadastrarEstadio($estadio);
			
			$ultimoIdEstadio = $estadio->recolheUltimoIdEstadio($estadio);
			
			return $ultimoIdEstadio;

		}
		
		//Cadastro de tabela
		public function cadastroTabela(){
			
			$tabela = new modelClassTabela();
			$tabela->setVitoria(0);
			$tabela->setEmpate(0);
			$tabela->setDerrota(0);
			$tabela->setPonto(0);
			$tabela->setCampeonato($_SESSION['IdCampeonato']);
			$tabela->cadastrarTabela($tabela);
			
			$ultimoIdTabela = $tabela->recolherUltimoIdTabela($tabela);
			
			return $ultimoIdTabela;
		}
		
		//Cadastro de habilidade
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
		
		//Cadastro de jogador
		public function cadastroJogador($idTime){
			
			$nomePessoal = new modelClassNomePessoal;
			$nomePessoais = array();
			$sobrenome = new modelClassSobrenome;
			$sobrenomes = array();
			$posicao = new modelClassPosicao;
			$posicoes = array();
			$temperamento = new modelClassTemperamento;
			$temperamentos = array();
			$estilo = new modelClassEstilo;
			$estilos = array();
			$nacionalidade = new modelClassNacionalidade();
			$nacionalidades = array();
			$nivel = new modelClassNivel();
			$niveis = array();
			 
			$nomePessoais = $nomePessoal->consultaNomePessoal();
			$sobrenomes = $sobrenome->consultaSobrenome();
			$posicoes = $posicao->consultaPosicao();
			$temperamentos = $temperamento->consultaTemperamento();
			$estilos = $estilo->consultaEstilo();
			$niveis = $nivel->consultaNivel();
			$nacionalidades = $nacionalidade->consultaNacionalidade();
			
			for($i=1;$i<=22;$i++){
								
				$jogador = new modelClassJogador();
		
				$jogador->setTitular(TRUE);
				
				$nomeJogador = $nomePessoal->sortearNomePessoal($nomePessoais);
				$jogador->setNome($nomeJogador);
				
				$sobrenomeJogador = $sobrenome->sortearSobrenome($sobrenomes);
				$jogador->setSobrenome($sobrenomeJogador);
				
				$nacionalidadeJogador = $nacionalidade->sortearNacionalidade($nacionalidades);
				$jogador->setNacionalidade($nacionalidadeJogador);
				
				$idadeJogador = $jogador->sorteiaIdadeJogador();
				$jogador->setIdade($idadeJogador);
				$jogador->setEstamina(100);
				
				$nivelJogador = $nivel->sortearNivel($niveis);
				$jogador->setNivel($nivelJogador);
				
				$jogador->setGol(0);
				$jogador->setPasse(10);
				$jogador->setSalario(10);
				
				$jogador->setIdtime($idTime);
				
				$posicaoJogador = $posicao->sortearPosicao($posicoes);
				$jogador->setPosicao($posicaoJogador);
				
				$ultimoIdHabilidade = $this->cadastroHabilidade();
				$jogador->setHabilidade($ultimoIdHabilidade);
				
				$temperamentoJogador = $temperamento->sortearTemperamento($temperamentos);
				$jogador->setTemperamento($temperamentoJogador);
				
				$estiloJogador = $estilo->sortearEstilo($estilos);
				$jogador->setEstilo($estiloJogador);
				
				$jogador->setCampeonato($_SESSION['IdCampeonato']);
								
				$jogador->cadastrarJogador($jogador);
					
			}
				
		}
		
		//Cadastro de times
		public function cadastroTime(){
			
			$time = new modelClassTime();
			$times = array();
			$agressividade = new modelClassAgressividade();
			$agressividades = array();
			$formacao = new modelClassFormacao();
			$formacoes = array();
			$estrategia = new modelClassEstrategia();
			$estrategias = array();
			
			$formacoes = $formacao->consultaFormacao();
			$estrategias = $estrategia->consultaEstrategia();
			$agressividades = $agressividade->consultaAgressividade();
			//$times = $time->consultaNomeTime();

			
			for($i=1;$i<=20;$i++){
				
				switch ($i){
					
					case 1 : $timeTeste = "Americana";
						break;
					
					case 2 : $timeTeste = "Hortolândia";
						break;

					case 3 : $timeTeste = "Sumaré";	
						break;
					
					case 4 : $timeTeste = "Campinas";
						break;
					
					case 5 : $timeTeste = "Nova Odessa";
						break;
							
					case 6 : $timeTeste = "São Paulo";
						break;
						
					case 7 : $timeTeste = "Piracicaba";
						break;
							
					case 8 : $timeTeste = "Holambra";
						break;
						
					case 9 : $timeTeste = "Poços de Caldas";
						break;
							
					case 10 : $timeTeste = "Belo Horizonte";
						break;
						
					case 11 : $timeTeste = "Curitiba";
						break;
							
					case 12 : $timeTeste = "Jundiai";
						break;
							
					case 13 : $timeTeste = "Monte Mor";
						break;
							
					case 14 : $timeTeste = "Capivari";
						break;
						
					case 15 : $timeTeste = "Rafard";
						break;
							
					case 16 : $timeTeste = "Cuiaba";
						break;

					case 17 : $timeTeste = "Bragança";
						break;
							
					case 18 : $timeTeste = "Barueri";
						break;
							
					case 19 : $timeTeste = "Carapicuiba";
						break;
						
					case 20 : $timeTeste = "Visconde";
						break;
						
				}
				
				$ultimoIdEstadio = $this->cadastroEstadio();
				$ultimoIdTabela = $this->cadastroTabela();
				
				$time = new modelClassTime();
				
				$time->setNome($timeTeste);
				$time->setMascote($timeTeste);
				$time->setCor($timeTeste);
				$time->setDinheiro(10000);
				$time->setTorcida(100);
				//Dono será cadastro como nulo
				$time->setCampeonato($_SESSION['IdCampeonato']);
				$time->setEstadio($ultimoIdEstadio);
				
				$formacaoTime = $formacao->sortearFormacao($formacoes);
				$time->setFormacao($formacaoTime);
				
				$estrategiaTime = $estrategia->sortearEstrategia($estrategias);
				$time->setEstrategia($estrategiaTime);
				
				$agressividadeTime = $agressividade->sortearAgressividade($agressividades);
				$time->setAgressividade($agressividadeTime);
				
				$time->setTabela($ultimoIdTabela);
				$time->cadastrarTime($time);
				
				$ultimoIdTime = $time->recolheUltimoIdTime();
				$this->cadastroJogador($ultimoIdTime);
				
			}						
		}
		
		public function cadastroRodada(){
			
			$time = new modelClassTime();
			$quantidadeTimesCampeonato = $time->recolheNumerodeTimesCampeonato($_SESSION['IdCampeonato']);
			 
			$rodada = new modelClassRodada();			
			$quantidadeRodadasCampeonato = ($quantidadeTimesCampeonato * 2) - 2;
			
			for($i=1; $i <= $quantidadeRodadasCampeonato; $i++){
				
				$rodada->setNumero(1);
				$rodada->setCampeonato($_SESSION['IdCampeonato']);
				$rodada->cadastrarRodada($rodada);				
			}	
		}
		
		public function cadastroJogo(){
			
			//Array com o times do campeonato original, não serão alterados
			$arrayTimesCampeonatoOriginal = array();
			//Array com o times do campeonato que serão mexidos
			$arrayTimesCampeonato = array();
			//Array que conterá os climas disponiveis no banco
			$arrayClimas = array();
			//Array que conterá o jogo formada
			$jogoRodada = array();
			//Array que armazenará todos jogos
			$jogosFormados = array();
			//Array times que ja jogaram a rodada
			$timesJogosMarcados = array();
			
			
			$clima = new modelClassClima();
			$arrayClimas = $clima->recolheClimas();
			$time = new modelClassTime();
			$quantidadeTimesCampeonato = $time->recolheNumerodeTimesCampeonato($_SESSION['IdCampeonato']);

			$jogosRodada = $quantidadeTimesCampeonato / 2;

			$rodada = new modelClassRodada();
			$numeroRodada = $rodada->recolheNumeroRodada($_SESSION['IdCampeonato']);

			$arrayTimesCampeonatoOriginal = $time->recolheTimesCampeonato($_SESSION['IdCampeonato']);

			
			$i = 1;
			
			//Preencher todas rodadas
			for($i=1; $i<=$numeroRodada;$i++){
				
				//preenche novamente o contador
				$quantidadeTimesCampeonatoContador = $quantidadeTimesCampeonato;
				
				//Array times do campeonato recebe todos os id dos times do campeonato
				$arrayTimesCampeonato = $arrayTimesCampeonatoOriginal;
				$timesJogosMarcados[] = null;

				//Preencher todos jogos da rodada
				while($quantidadeTimesCampeonatoContador != $jogosRodada){
					
					$jogo = new modelClassJogo();
					
					do{
						
						unset($jogoRodada);
							
						//Sorteio time do array até que seja um que não jogou
						//do{
				
						$timeCasa = array_rand($arrayTimesCampeonato,1);
						$key = array_search($arrayTimesCampeonato[$timeCasa], $arrayTimesCampeonato);
						if($key!==false){
							unset($arrayTimesCampeonato[$key]);
						}
						//}while(in_array($timeCasa,$timesJogosMarcados));
						
						//Sorteio time do array até que seja um que não jogou
						//do{
						//$timeVisitante = $time->sorteiaTime($arrayTimesCampeonato);
						$timeVisitante = array_rand($arrayTimesCampeonato,1);
						$key = array_search($arrayTimesCampeonato[$timeVisitante], $arrayTimesCampeonato);
						if($key!==false){
							unset($arrayTimesCampeonato[$key]);
						}
						//unset($arrayTimesCampeonato[$timeVisitante]);
						//}while(in_array($timeVisitante,$timesJogosMarcados));
						
						$timesJogosMarcados[] = $arrayTimesCampeonatoOriginal[$timeCasa];
						$timesJogosMarcados[] = $arrayTimesCampeonatoOriginal[$timeVisitante];
						$jogoRodada[] = $arrayTimesCampeonatoOriginal[$timeCasa];
						$jogoRodada[] = $arrayTimesCampeonatoOriginal[$timeVisitante];
						
						$consulta = $time->verificaArray($arrayTimesCampeonatoOriginal[$timeCasa],$arrayTimesCampeonatoOriginal[$timeVisitante],$jogosFormados,$i);
					
					}while($consulta);
					
					$jogosFormados[] = $jogoRodada;

					//Dados do jogo
					$jogo->setData('2014-01-01');
					$jogo->setCampeonato($_SESSION['IdCampeonato']);
					$jogo->setRodada($i);
					
					//Times do jogo
					$jogo->setTimeCasa($arrayTimesCampeonatoOriginal[$timeCasa]);
					$jogo->setTimeVisitante($arrayTimesCampeonatoOriginal[$timeVisitante]);
					
					//Definindo clima
					$climaJogo = $clima->sorteioClima($arrayClimas);
					$jogo->setClima($climaJogo);
					
					//Cadastrar jogo
					$jogo->cadastrarJogo($jogo);
					
					$quantidadeTimesCampeonatoContador--;
		
				}

			}
		}
		
	}
	
	$gerenciaInicio = new controllerGerenciaInicio();
	$gerenciaInicio->verificaDados();




?>