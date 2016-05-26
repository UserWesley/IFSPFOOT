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
		
	}

?>