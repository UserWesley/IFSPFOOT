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
			,'$torcida',NULL,'$campeonato','$estadio','$estrategia','$formacao','$agressividade','$tabela')";
			$conn->exec($insercaoNovoTime);
			
		}
		
		public function consultaTabela($nomeTime){
			
			$timeTabela = array();
			
			$conn = Database::conexao();
			
			$consultaTime = 'SELECT id,vitoria,derrota,empate,pontos FROM Time WHERE nome = ?';
			$preparaConsultaTime = $conn->prepare($consultaTime);
			$preparaConsultaTime->bindValue(1, $nomeTime);
			$preparaConsultaTime->execute();
			
			$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaTime->fetch()) {
					
				$timeTabela[] = $row[0];
				$timeTabela[] = $row[1];
				$timeTabela[] = $row[2];
				$timeTabela[] = $row[3];
				$timeTabela[] = $row[4];
					
			}
			
			return $timeTabela;
			
		}
		
		public function atualizaTimeVencedorTabela($time){
			
			$id = $time[0];
			$vitoria = $time[1] + 1;
			$pontos = $time[4]+3;
			
			$conn = Database::conexao();
			
			$atualizaTimeVencedor = 'UPDATE Time SET  vitoria = ?, pontos = ? WHERE id = ?';
			$preparaAtualizaTimeVencedor = $conn->prepare($atualizaTimeVencedor);
			$preparaAtualizaTimeVencedor->bindValue(1,$vitoria);
			$preparaAtualizaTimeVencedor->bindValue(2,$pontos);
			$preparaAtualizaTimeVencedor->bindValue(3,$id);
			$preparaAtualizaTimeVencedor->execute();
				
		}
		
		public function removerTimeArray(){
			
			$key = array_search($timesCampeonato[$time], $timesCampeonato);
			if($key!==false){
				unset($timesCampeonato[$key]);
			}
		}
		
		public function atualizaTimePerdedorTabela($time){

			$id = $time[0];
			$derrota = $time[2]+1;
			
			$conn = Database::conexao();
			
			$atualizaTimePerdedor = 'UPDATE Time SET  derrota = ? WHERE id = ?';
			$preparaAtualizaTimePerdedor = $conn->prepare($atualizaTimePerdedor);
			$preparaAtualizaTimePerdedor->bindValue(1,$derrota);
			$preparaAtualizaTimePerdedor->bindValue(2,$id);
			$preparaAtualizaTimePerdedor->execute();

		}
		
		public function empateTabela($time){
			
			$empate = $time[3]+1;
			$pontos = $time[4]+1;
			$id = $time[0];
			
			$conn = Database::conexao();

			$atualizaTimeEmpate = 'UPDATE Time SET  empate = ?, pontos = ? WHERE id = ?';
			$preparaAtualizaTimeEmpate = $conn->prepare($atualizaTimeEmpate);
			$preparaAtualizaTimeEmpate->bindValue(1,$empate);
			$preparaAtualizaTimeEmpate->bindValue(2,$pontos);
			$preparaAtualizaTimeEmpate->bindValue(3,$id);
			$preparaAtualizaTimeEmpate->execute();
			
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
		
		public function consultaIdTime($id){
			
			$this->setId($id);
			$idTime = $this->getId();
			
			$conn = Database::conexao();
			
			$consultaTime = 'SELECT id FROM Time WHERE dono = ?';
			$preparaConsultaTime = $conn->prepare($consultaTime);
			$preparaConsultaTime->bindValue(1, $idTime);
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
		
		public function consultaTodosTime(){
			
			$times = array();
			
			$conn = Database::conexao();
			$campeonato= 1;
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
		
		public function consultaDadoTime($id){
			
			$timeEscolhido= array();
			
			$conn = Database::conexao();
			
			$consultaTimeDado = 'SELECT nome ,mascote,cor,dinheiro,torcida ,nomeEstadio ,capacidade FROM Time WHERE id = ? ';
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
				$timeEscolhido[] = $row[5];
				$timeEscolhido[] = $row[6];
				
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
		
		public function consultaTabelaCampeonato(){
			
			$tabelaCampeonato = array();
			
			//Listando times ordenado por número de pontos
			$conn = Database::conexao();
			
			$consultaTabela = 'SELECT nome, vitoria, derrota, empate, pontos FROM Time ORDER BY pontos DESC';
			$preparaConsultaTabela = $conn->query($consultaTabela);
			$preparaConsultaTabela->execute();
			
			$result = $preparaConsultaTabela->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaTabela->fetch()) {

				$tabelaCampeonato[] = $row[0];
				$tabelaCampeonato[] = $row[1];
				$tabelaCampeonato[] = $row[2];
				$tabelaCampeonato[] = $row[3];
				$tabelaCampeonato[] = $row[4];
			}

			return $tabelaCampeonato;
		}
		
		public function visualizaTabelaCampeonato($tabela){
			
			$colunas = 5;
			
			for($i=0; $i < count($tabela); $i++) {
				echo "<td>".$tabela[$i]."</td>";
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
		
	
	}

?>