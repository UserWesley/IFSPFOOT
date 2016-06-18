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
		
		public function cadastroEstadio(){
			
			$estadio = new modelClassEstadio();
			$estadio->setNome("estadio");
			$estadio->setCapacidade(10);
			$estadio->setCampeonato($_SESSION['IdCampeonato']);
			$estadio->cadastrarEstadio($estadio);
			
			$ultimoIdEstadio = $estadio->recolheUltimoIdEstadio($estadio);
			
			return $ultimoIdEstadio;

		}
		
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
				$jogador->setCampeonato($_SESSION['IdCampeonato']);
								
				$jogador->cadastrarJogador($jogador);
					
			}
				
		}
		
		public function cadastroTime(){
			
			for($i=1;$i<=20;$i++){
				
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
						
					case 9 : $timeTeste = "Time9";
						break;
							
					case 10 : $timeTeste = "Time10";
						break;
						
					case 11 : $timeTeste = "Time11";
						break;
							
					case 12 : $timeTeste = "Time12";
						break;
							
					case 13 : $timeTeste = "Time13";
						break;
							
					case 14 : $timeTeste = "Time14";
						break;
						
					case 15 : $timeTeste = "Time15";
						break;
							
					case 16 : $timeTeste = "Time16";
						break;

					case 17 : $timeTeste = "Time17";
						break;
							
					case 18 : $timeTeste = "Time18";
						break;
							
					case 19 : $timeTeste = "Time19";
						break;
						
					case 20 : $timeTeste = "Time20";
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
				$time->setCampeonato($_SESSION['IdCampeonato']);
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
			//echo "Climas";
			//print_r($arrayClimas);
			//echo "<p>";
			$time = new modelClassTime();
			$quantidadeTimesCampeonato = $time->recolheNumerodeTimesCampeonato($_SESSION['IdCampeonato']);
			//echo "quantidade de times : ".$quantidadeTimesCampeonato."<p>";
			$jogosRodada = $quantidadeTimesCampeonato / 2;
			//echo "jogos rodada : ".$jogosRodada."<p>";
			$rodada = new modelClassRodada();
			$numeroRodada = $rodada->recolheNumeroRodada($_SESSION['IdCampeonato']);
			//echo "numero rodada : ".$numeroRodada."<p>";
			$arrayTimesCampeonatoOriginal = $time->recolheTimesCampeonato($_SESSION['IdCampeonato']);
			//echo "times campeonato : ";
			//print_r($arrayTimesCampeonatoOriginal);
		//	echo "<p>";
			
			$i = 1;
			
			//Preencher todas rodadas
			for($i=1; $i<=$numeroRodada;$i++){
				
				//preenche novamente o contador
				$quantidadeTimesCampeonatoContador = $quantidadeTimesCampeonato;
				
				//Array times do campeonato recebe todos os id dos times do campeonato
				$arrayTimesCampeonato = $arrayTimesCampeonatoOriginal;
				$timesJogosMarcados[] = null;
				//$timesJogosMarcados[] = -1;
				//$timesJogosMarcados[] = -2;
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