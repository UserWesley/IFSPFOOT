<?php 

	Class modelClassRodada{
		
		private $id;
		private $numero;
		private $campeonato;
		
		public function __destruct(){
			
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getNumero(){
			return $this->numero;
		}
		
		public function setNumero($numero){
			$this->numero = $numero;
		}
		
		public function getCampeonato(){
			return $this->campeonato;	
		}
		
		public function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}
		
		public function cadastrarRodada($rodada){
			
			$conn = Database::conexao();
			
			$id = $this->getId();
			$numero = $this->getNumero();
			$campeonato = $this->getCampeonato();
			
			$insercaoNovaRodada = "INSERT INTO Rodada VALUES ('$id','$numero','$campeonato')";
			$conn->exec($insercaoNovaRodada);
		}
		
	}
	
?>