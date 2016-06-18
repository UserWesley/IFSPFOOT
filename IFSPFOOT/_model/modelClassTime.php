<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
	
	Class modelClassTime {
		private $id;
		private $nome;
		private $mascote;
		private $cor;
		private $dinheiro;
		private $torcida;
		private $dono;
		private $campeonato;
		private $estadio;
		private $formacao;
		private $estrategia;
		private $agressividade;
		private $tabela;
	
		public function getId(){
			return $this->id;
		}
	
		public function setId($id){
			$this->id = $id;
		}
	
		public function getNome(){
			return $this->nome;
		}
	
		public function setNome($nome){
			$this->nome = $nome;
		}
	
		public function getMascote(){
			return $this->mascote;
		}
	
		public function setMascote($mascote){
			$this->mascote = $mascote;
		}
	
		public function getCor(){
			return $this->cor;
		}
	
		public function setCor($cor){
			$this->cor = $cor;
		}
	
		public function getDinheiro(){
			return $this->dinheiro;
		}
	
		public function setDinheiro($dinheiro){
			$this->dinheiro = $dinheiro;
		}
	
		public function getTorcida(){
			return $this->torcida;
		}
	
		public function setTorcida($torcida){
			$this->torcida = $torcida;
		}
	
		public function getDono(){
			return $this->dono;
		}
	
		public function setDono($dono){
			$this->dono = $dono;
		}
	
		public function getCampeonato(){
			return $this->campeonato;
		}
	
		public function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}
	
		public function getEstadio(){
			return $this->estadio;
		}
	
		public function setEstadio($estadio){
			$this->estadio = $estadio;
		}
	
		public function getFormacao(){
			return $this->formacao;
		}
	
		public function setFormacao($formacao){
			$this->formacao = $formacao;
		}
	
		public function getEstrategia(){
			return $this->estrategia;
		}
	
		public function setEstrategia($estrategia){
			$this->estrategia = $estrategia;
		}
	
		public function getAgressividade(){
			return $this->agressividade;
		}
	
		public function setAgressividade($agressividade){
			$this->agressividade = $agressividade;
		}
	
		public function getTabela(){
			return $this->tabela;
		}
	
		public function setTabela($tabela){
			$this->tabela = $tabela;
		}
		
		//Esta função irá cadastrar times do campeonato
		public function cadastrarTime($time){
				
			$conn = Database::conexao();
				
			$nome = $this->getNome();
			$mascote = $this->getMascote();
			$cor = $this->getCor();
			$dinheiro = $this->getDinheiro();
			$torcida = $this->getTorcida();
			$campeonato = $this->getCampeonato();
			$estadio = $this->getEstadio();
			$estrategia = $this->getEstrategia();
			$formacao = $this->getFormacao();
			$agressividade = $this->getAgressividade();
			$tabela = $this->getTabela();
				
			$insercaoNovoTime = "INSERT INTO Time VALUES (DEFAULT,'$nome','$mascote','$cor','$dinheiro'
			,'$torcida',NULL,'$campeonato','$estadio','$formacao','$estrategia','$agressividade','$tabela')";
			$conn->exec($insercaoNovoTime);
				
		}
	
		public function consultaId($nomeTime){
	
			$conn = Database::conexao();
	
			$consultaTime = 'SELECT id FROM Time WHERE nome = ?';
			$preparaConsultaTime = $conn->prepare($consultaTime);
			$preparaConsultaTime->bindValue(1, $nomeTime);
			$preparaConsultaTime->execute();
	
			$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaTime->fetch()) {
					
				$id = $row[0];
					
			}
	
			return $id;
	
		}
	
		public function consultaIdTime($time){
				
			$idDono = $this->getDono();
			$idCampeonato = $this->getCampeonato();	
			
			$conn = Database::conexao();
			
			$consultaTime = 'SELECT id FROM Time WHERE dono = ? and campeonato = ?';
			$preparaConsultaTime = $conn->prepare($consultaTime);
			$preparaConsultaTime->bindValue(1, $idDono);
			$preparaConsultaTime->bindValue(2, $idCampeonato);
			$preparaConsultaTime->execute();
				
			$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaTime->fetch()) {
					
				$id = $row[0];
					
			}
			
			return $id;
		}
	
		public function selecionarTime($time){
				
			$conn = Database::conexao();
				
		    $idTime = $time->getId();
			$idDono = $time->getDono();
				
			$atualizaDefinirseuTime = 'UPDATE Time SET dono = ? WHERE id = ?';
			$preparaAtualizaDefinirseuTime = $conn->prepare($atualizaDefinirseuTime);
			$preparaAtualizaDefinirseuTime->bindValue(1,$idDono);
			$preparaAtualizaDefinirseuTime->bindValue(2,$idTime);
			$preparaAtualizaDefinirseuTime->execute();
				
		}
	
		public function consultaTodosTime($campeonato){
				
			$times = array();

			$campeonato = $this->getCampeonato();
			
			$conn = Database::conexao();
			
			$consultaTime = 'SELECT id,nome FROM Time WHERE campeonato = ?';
			$preparaConsultaTime = $conn->prepare($consultaTime);
			$preparaConsultaTime->bindValue(1,$campeonato);
			$preparaConsultaTime->execute();
				
			$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
				
			while ($row = $preparaConsultaTime->fetch()) {
					
				$times[] = $row[0];
				$times[] = $row[1];
					
			}
				
			return $times;
		}
	
		public function consultaNomeTime($id){
				
			$conn = Database::conexao();
				
			$consultaTime = 'SELECT nome FROM Time WHERE id = ? ';
			$preparaConsultaTime = $conn->prepare($consultaTime);
			$preparaConsultaTime->bindValue(1,$id);
			$preparaConsultaTime->execute();
				
			$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
				
			while ($row = $preparaConsultaTime->fetch()) {
					
				$nome = $row[0];
					
			}
				
			return $nome;
		}
		
		public function consultaIdEstadioTime($time){
				
			$usuario = $this->getDono();
			$campeonato = $this->getCampeonato();
				
			$conn = Database::conexao();
		
			$consultaTimeEstadio = 'SELECT estadio FROM Time WHERE dono = ? and campeonato = ? ';
			$preparaConsultaTimeEstadio = $conn->prepare($consultaTimeEstadio);
			$preparaConsultaTimeEstadio->bindValue(1,$usuario);
			$preparaConsultaTimeEstadio->bindValue(2,$campeonato);
			$preparaConsultaTimeEstadio->execute();
		
			$result = $preparaConsultaTimeEstadio->setFetchMode(PDO::FETCH_NUM);
		
			while ($row = $preparaConsultaTimeEstadio->fetch()) {
					
				$idEstadio = $row[0];
					
			}
		
			return $idEstadio;
		}

        public function atualizaDinheiroTime($Time){
			$id = $this->getId();
			$dinheiro = $this->getDinheiro();

			$conn = Database::conexao();

	        $atualizaTime = 'UPDATE TIME SET DINHEIRO = ? WHERE ID = ? ';
	     	$preparaAtualizacaoTime = $conn->prepare($atualizaTime);
	     	$preparaAtualizacaoTime->bindValue(1,$dinheiro);
	     	$preparaAtualizacaoTime->bindValue(2,$id);	     	
	     	$preparaAtualizacaoTime->execute();


			}		
		
		//Esta função irá consultar os dados do time selecionado e retorna em array
		public function consultaDadoTime($id){
				
			$timeEscolhido= array();
				
			$conn = Database::conexao();
				
			$consultaTimeDado = 'SELECT nome, mascote ,cor ,dinheiro ,torcida FROM Time WHERE id = ? ';
			$preparaConsultaDadoTime = $conn->prepare($consultaTimeDado);
			$preparaConsultaDadoTime->bindValue(1,$id);
			$preparaConsultaDadoTime->execute();
				
			$result = $preparaConsultaDadoTime->setFetchMode(PDO::FETCH_NUM);
				
			while ($row = $preparaConsultaDadoTime->fetch()) {
					
				$timeEscolhido[] = $row[0];
				$timeEscolhido[] = $row[1];
				$timeEscolhido[] = $row[2];
				$timeEscolhido[] = $row[3];
				$timeEscolhido[] = $row[4];
	
			}
				
			return $timeEscolhido;
				
		}
	
		public function visualizaDadoTime($time){
				
			$colunas = 7;
				
			//Listando Jogadores do time
			for($i=0; $i < count($time); $i++) {
				echo "<td>".$time[$i]."</td>";
				if((($i+1) % $colunas) == 0 )
						
					echo "</tr><tr>";
			}
		}
	
		
	
		public function recolheUltimoIdTime(){
				
			$conn = Database::conexao();
				
			$consultaUltimoId = 'SELECT MAX(id) FROM Time;';
			$preparaConsultaUltimoId = $conn->query($consultaUltimoId);
			$preparaConsultaUltimoId->execute();
			$result = $preparaConsultaUltimoId->setFetchMode(PDO::FETCH_NUM);
	
			while ($row = $preparaConsultaUltimoId->fetch()) {
				$id = $row[0];
			}
				
			return $id;
				
		}
		
		//Esta função consulta no banco a quantidade de times participantes do campeonato
		public function recolheNumerodeTimesCampeonato($idCampeonato){
				
			$conn = Database::conexao();
	
			$consultaQuantidadeTimes = 'SELECT COUNT(id) FROM Time WHERE campeonato = ?';
			$preparaConsultaQuantidadeTimes = $conn->prepare($consultaQuantidadeTimes);
			$preparaConsultaQuantidadeTimes->bindValue(1, $idCampeonato);
			$preparaConsultaQuantidadeTimes->execute();
			$result = $preparaConsultaQuantidadeTimes->setFetchMode(PDO::FETCH_NUM);
				
			while ($row = $preparaConsultaQuantidadeTimes->fetch()) {
				$quantidadeTimesCampeonato = $row[0];
			}
	
			return $quantidadeTimesCampeonato;
		}
		
		//Esta função recolhe o nome dos time participantes do campeonato
		public function recolheTimesCampeonato($idCampeonato){
				
			$timesCampeonato = array();
				
			$conn = Database::conexao();
				
			$consultaTimesCampeonato = 'SELECT id FROM Time WHERE campeonato = ?';
			$preparaConsultaTimesCampeonato = $conn->prepare($consultaTimesCampeonato);
			$preparaConsultaTimesCampeonato->bindValue(1, $idCampeonato);
			$preparaConsultaTimesCampeonato->execute();
			$result = $preparaConsultaTimesCampeonato->setFetchMode(PDO::FETCH_NUM);
	
			while ($row = $preparaConsultaTimesCampeonato->fetch()) {
				$timesCampeonato[] = $row[0];
			}
				
			return $timesCampeonato;
		}

//-----------------------------------------------------------------------------------------------------		
		//Estas funções  abaixo iram tratar a geração de jogo
		
		//Sorteia valor
		public function sorteiaTime($timesCampeonato){
			
			$time = array_rand($timesCampeonato,1);
			
			return $time;
		}
		
		//Verifica array
		public function verificaArray($timeCasa,$timeVisitante,$jogosFormados,$rodada){
			
			$jogo = array();
			$jogoInvertido = array();

			$jogo[] = $timeCasa;
			$jogo[] = $timeVisitante;
			
			$jogoInvertido = $timeVisitante;
			$jogoInvertido = $timeCasa;

			//if($rodada > 19){

				//if(in_array($jogo, $jogosFormados)){
				//	return true;
			//	}

				//elseif(in_array($jogoInvertido, $jogosFormados)){
				//	return true;
				//}
				
				//else {
				//	return false;
			//	}
			//}
		}
	
	}
?>