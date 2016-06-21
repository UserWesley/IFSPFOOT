<?php 

	/*Este arquio será responsável por realizar o gerenciamento após o jogo*/
	
	//Inclusão do arquivo para atualizar o placar
	include_once('../_model/modelClassJogo.php');
	include_once('../_model/modelClassTime.php');
	include_once('../_model/modelClassJogador.php');
	include_once('../_model/modelClassCampeonato.php');
	include_once('../_model/modelClassRodada.php');
	include_once('../_model/modelClassTabela.php');
	
	session_start();
	
	class GerenciaPosJogo{
		
		//Atualiza placares dos jogos
		public function atualizarPlacar(){
			
			//Rodada Atual
			$campeonato = new modelClassCampeonato();
			$idCampeonato = $campeonato->setId($_SESSION['IdCampeonato']);
			$rodada = $campeonato->rodadaAtual($idCampeonato);
	
			//Obtendo os dados enviados pelo ajax
			$dadosCompactados = $_REQUEST['content'];
			
			//explodindo os dados em array para obter os placares e os nomes dos times
			$dadosExplodidosArray = explode(",", $dadosCompactados);
			
			//Percorrendo jogo a jogo da rodada
			$quantidadeElemento = count($dadosExplodidosArray);
			$percorreElementos = 0;
			
			$jogo = new modelClassJogo();
			
			//Debug - echo $quantidadeElemento;
			
			//Percorrera todos os dados recebidos coletando os dados necessários para as devidas consultaas
			while($percorreElementos < $quantidadeElemento){
				
				//Consulta pelo nome e campeonato o id do timeCasa
				$time = new modelClassTime();
				$time->setNome($dadosExplodidosArray[$percorreElementos]);
				$time->setCampeonato($_SESSION['IdCampeonato']);
				$idTimeCasa = $time->consultaId($time);
				$timeCasa = $jogo->setTimeCasa($idTimeCasa);
				
				$percorreElementos++;
				
				//Pega placa do time Casa
				$jogo->setGolCasa($dadosExplodidosArray[$percorreElementos]);
				$golCasa = $dadosExplodidosArray[$percorreElementos];
				
				$percorreElementos = $percorreElementos+2;
				
				//Pega placar do time Visitante
				$jogo->setGolVisitante($dadosExplodidosArray[$percorreElementos]);
				$golVisitante = $dadosExplodidosArray[$percorreElementos];
				$percorreElementos++;
				
				//Consulta pelo nome e campeonato o id do timeVisitante
				$time = new modelClassTime();
				$time->setNome($dadosExplodidosArray[$percorreElementos]);
				$time->setCampeonato($_SESSION['IdCampeonato']);
				$idTimeVisitante = $time->consultaId($time);
				$jogo->setTimeVisitante($idTimeVisitante);
					
				$percorreElementos=$percorreElementos+2;
				
				$jogo->setCampeonato($_SESSION['IdCampeonato']);
				$jogo->setRodada($rodada);
				$jogo->atualizaPlacar($jogo);
				
				$this->controleTabela($idTimeCasa, $golCasa, $golVisitante, $idTimeVisitante);
				$this->controleArtilharia($idTimeCasa,$golCasa,$golVisitante,$idTimeVisitante);
			
			}
		}
		
		//Controla todas operações da tabela, quem ganhou quem perdeu e quem empatou e efetiva as devidas mudanças
		public function controleTabela($timeCasa,$golCasa,$golVisitante,$timeVisitante){
			
			$jogo = new modelClassJogo();
			$tabela = new modelClassTabela();
			
			$timeCasaArray = array();
			$timeVisitanteArray = array();
			
			$time = new modelClassTime();
			$time->setId($timeCasa);
			$idTabelaTimeCasa = $time->consultaIdTabelaTime($time);
			
			$time = new modelClassTime();
			$time->setId($timeVisitante);	
			$idTabelaTimeVisitante = $time->consultaIdTabelaTime($time);
		
			$timeCasaArray = $tabela->consultaTabela($idTabelaTimeCasa);
			$timeVisitanteArray = $tabela->consultaTabela($idTabelaTimeVisitante);
			
			$time = new modelClassTime();
			
			$resultado = $jogo->verificaPlacar($golCasa,$golVisitante);
			
			if($resultado == 1){

				$tabela->atualizaTimeVencedorTabela($timeCasaArray);
				$tabela->atualizaTimePerdedorTabela($timeVisitanteArray);
				
				//Atualiza dinheiro do time vencedor
				$saldo = $time->consultaDinheiroTime($timeCasa);
				$time->atribuirSaldoTimeVencedor($timeCasa, $saldo);
				
				//Atualiza torcida do time casa
				$torcida = $time->consultaTorcida($timeCasa);
				$time->atribuirTorcidaTime($timeCasa, $torcida);
				
				//Atualiza torcida do time casa perdedor
				$torcida = $time->consultaTorcida($timeVisitante);
				$time->retiraTorcidaTime($timeVisitante, $torcida);
				
			
			}
			elseif ($resultado == 2){
				
				//Atualiza tabela do time Vencedor
				$tabela->atualizaTimeVencedorTabela($timeVisitanteArray);
				$tabela->atualizaTimePerdedorTabela($timeCasaArray);
				
				//Atualiza Saldo do time Vencedor
				$saldo = $time->consultaDinheiroTime($timeVisitante);
				$time->atribuirSaldoTimeVencedor($timeVisitante, $saldo);
				
				//Atualiza torcida do time vencedor
				$torcida = $time->consultaTorcida($timeVisitante);
				$time->atribuirTorcidaTime($timeVisitante, $torcida);
			
				//Atualiza torcida do time Perdedor
				$torcida = $time->consultaTorcida($timeCasa);
				$time->atribuirTorcidaTime($timeCasa, $torcida);
			}
			
			else {
				
				$tabela->empateTabela($timeCasaArray);
				$tabela->empateTabela($timeVisitanteArray);
				
				//Consulta de saldo
				$saldoTimeCasa = $time->consultaDinheiroTime($timeCasa);
				$saldoTimeVisitante = $time->consultaDinheiroTime($timeVisitante);
				
				//Atribui saldo time por empate
				$time->atribuirSaldoTimeEmpate($timeCasa, $saldoTimeCasa);
				$time->atribuirSaldoTimeEmpate($timeVisitante, $saldoTimeVisitante);
				
			}
			
		}
		
		//Sorteia que fez o gol do time
		public function controleArtilharia($timeCasa,$golCasa,$golVisitante,$timeVisitante){

			$jogador = new modelClassJogador();
			$time = new modelClassTime();
		
			$jogadoresCasa = array();
			$jogadoresVisitante = array();
			
			$iterador = 1;
			while ($iterador <= $golCasa){
				
				//$idTime = $time->consultaId($timeCasa);
				$jogadoresCasa = $jogador->consultaJogador($timeCasa);
				
			 	$jogadorCasa = $jogador->sorteiaJogador($jogadoresCasa);
				$quantidadeGol = $jogador->consultaGol($jogadorCasa);
				$jogador->inseriGol($quantidadeGol,$jogadorCasa);
				$iterador++;
				
			}
			
			$iterador = 1;
			while ($iterador <= $golCasa){
				
				//$idTime = $time->consultaId($timeVisitante);
				$jogadoresVisitante = $jogador->consultaJogador($timeVisitante);
				$jogadorVisitante = $jogador->sorteiaJogador($jogadoresVisitante);
				$quantidadeGol = $jogador->consultaGol($jogadorVisitante);
				$jogador->inseriGol($quantidadeGol,$jogadorVisitante);
				$iterador++;
			}
		}
		
		//Após o jogo realiza o avanço da rodada
		function avancaRodada(){
			
			$campeonato = new modelClassCampeonato();
			$idCampeonato = $campeonato->setId($_SESSION['IdCampeonato']);
			$rodada = $campeonato->rodadaAtual($idCampeonato);
			$campeonato = new modelClassCampeonato();
			$campeonato->setId($_SESSION['IdCampeonato']);
			$campeonato->setRodadaAtual($rodada);
			$campeonato->avancaRodada($campeonato);
			echo "Fim de rodada !";
		}
	}
	
	$gerenciaPosJogo = new GerenciaPosJogo();
	$gerenciaPosJogo->atualizarPlacar();
	$gerenciaPosJogo->avancaRodada();
	

?>