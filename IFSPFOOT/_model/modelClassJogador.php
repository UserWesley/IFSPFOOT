<?php 

	Class modelClassJogador{
		
		private $id;
		private $titular;
		private $nome;
		private $sobrenome;
		private $posicao;
		private $nacionalidade;
		private $habilidade;
		private $idade;
		private $forca;
		private $idTime;
		private $estamina;
		private $nivel;
		private $gol;
		
		public function __destruct(){
			
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getTitular(){
			return $this->titular;
		}
		
		public function setTitular($titular){
			$this->titular = $titular;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getSobrenome(){
			return $this->sobrenome;
		}
		
		public function setSobrenome($sobrenome){
			$this->sobrenome = $sobrenome;
		}
		
		public function getPosicao(){
			return $this->posicao;
		}
		
		public function setPosicao($posicao){
			$this->posicao = $posicao;
		}
		
		public function getNacionalidade(){
			return $this->nacionalidade;
		}
		
		public function setNacionalidade($nacionalidade){
			$this->nacionalidade = $nacionalidade;
		}
		
		public function getHabilidade(){
			return $this->habilidade;
			
		}
		
		public function setHabilidade($habilidade){
			$this->habilidade = $habilidade;
		}
		
		public function getIdade(){
			return $this->idade;
		}
		
		public function setIdade($idade){
			$this->idade = $idade;
		}
		
		public function getForca(){
			return $this->forca;
		}
		
		public function setForca($forca){
			$this->forca = $forca;
		}
		
		public function getIdtime(){
			return $this->idTime;
		}
		
		public function setIdtime($idTime){
			$this->idTime = $idTime;
		}

		public function getEstamina(){
			return $this->estamina;
		}
		
		public function setEstamina($estamina){
			$this->estamina = $estamina;	
		}
		
		public function getNivel(){
			return $this->nivel;
		}
		
		public function setNivel($nivel){
			$this->nivel = $nivel;
		}
		
		public function getGol(){
			return $this->gol;
		}
		
		public function setGol($gol){
			$this->gol = $gol;
		}
		
		public function cadastrarJogador($jogador){
			
			$id = $this->getId();
			$titular = $this->getTitular();
			$nome = $this->getNome();
			$sobrenome = $this->getSobrenome();
		    $posicao = $this->getPosicao();
			$nacionalidade = $this->getNacionalidade();
			$habilidade = $this->getHabilidade();
			$idade = $this->getIdade();
			$forca = $this->getForca();
			$idTime = $this->getIdtime();
			$estamina = $this->getEstamina();
			$nivel = $this->getNivel();
			$gol = $this->getGol();
			
			$conn = Database::conexao();
			
			$insercaoNovoJogador = "INSERT INTO Jogador VALUES ('$id','$titular','$nome','$sobrenome','$posicao',
			'$nacionalidade','$habilidade','$idade','$forca','$idTime','$estamina','$nivel','$gol')";
			
			$conn->exec($insercaoNovoJogador);
			
		}
	}

?>