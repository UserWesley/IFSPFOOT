<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados1.php';

	Class modelClassTime {

		private $id;
		private $nome;
		private $mascote;
		private $cor;
		private $dono;
		private $dinheiro;
		private $torcida;
		private $nomeEstadio;
		private $capacidade;
		private $vitoria;
		private $derrota;
		private $empate;
		private $ponto;
		
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
		
		public function getDono(){
			return $this->dono;
		}
		
		public function setDono($dono){
			$this->dono = $dono;
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
		
		public function getNomeEstadio(){
			return $this->nomeEstadio;
		}
		
		public function setNomeEstadio($nomeEstadio){
			$this->nomeEstadio = $nomeEstadio;
		}
		
		public function getCapacidade(){
			return $this->capacidade;
		}
		
		public function setCapacidade($capacidade){
			$this->capacidade = $capacidade;
		}
		
		public function getVitoria(){
			return $this->vitoria;
		}
		
		public function setVitoria($vitoria){
			$this->vitoria = $vitoria;
		}
		
		public function getDerrota(){
			return $this->derrota;
		}
		
		public function setDerrota($derrota){
			$this->derrota = $derrota;
		}
		
		public function getEmpate(){
			return $this->empate;
		}
		
		public function setEmpate($empate){
			$this->empate = $empate;
		}
		
		public function getPonto(){
			return $this->ponto;
		}
		
		public function setPonto($ponto){
			$this->ponto = $ponto;
		}
		
		public function cadastrarTime($time){
			
			$conn = Database::conexao();
			
			$id = $this->getId();
			$nome = $this->getNome();
			$mascote = $this->getMascote();
			$cor = $this->getCor();
			$dinheiro = $this->getDinheiro();
			$torcida = $this->getTorcida();
			$nomeEstadio = $this->getNomeEstadio();
 			$capacidade = $this->getCapacidade();
			$vitoria = $this->getVitoria();
			$derrota = $this->getDerrota();
			$empate = $this->getEmpate();
			$ponto = $this->getPonto();
			
			$insercaoNovoTime = "INSERT INTO Time VALUES ('$id','$nome','$mascote','$cor',NULL,'$dinheiro'
			,'$torcida','$nomeEstadio','$capacidade','$vitoria','$derrota','$empate','$ponto')";
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
			
			$consultaTime = 'SELECT id,nome FROM Time';
			$preparaConsultaTime = $conn->query($consultaTime);
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
			
				$timeEscolhido = $row[0];				
				$timeEscolhido = $row[1];
				$timeEscolhido = $row[2];
				$timeEscolhido = $row[3];
				$timeEscolhido = $row[4];
				$timeEscolhido = $row[5];
				$timeEscolhido = $row[6];
				
			}
			
			return $timeEscolhido;
			
		}
	}

?>