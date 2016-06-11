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
		
		public function cadastrarRodada($rodada,$quantidadeTimesCampeonato){
			
			$conn = Database::conexao();
			
			$numero = $this->getNumero();
			$campeonato = $this->getCampeonato();
			
			$quantidadeRodadasCampeonato = ($quantidadeTimesCampeonato * 2) - 2;
			
			for($i=1; $i <= $quantidadeRodadasCampeonato; $i++){

				$insercaoNovaRodada = "INSERT INTO Rodada VALUES (DEFAULT,'$numero','$campeonato');";
				$conn->exec($insercaoNovaRodada);
			
			}
		}
		
		public function recolheNumeroRodada($idCampeonato){
				
			$conn = Database::conexao();
				
			$consultaNumeroRodada = 'SELECT COUNT(id) FROM Rodada WHERE campeonato = ?';
			$preparaConsultaNumeroRodada = $conn->prepare($consultaNumeroRodada);
			$preparaConsultaNumeroRodada->bindValue(1,$idCampeonato);
			$preparaConsultaNumeroRodada->execute();
				
			$result = $preparaConsultaNumeroRodada->setFetchMode(PDO::FETCH_NUM);
			
			while ($row = $preparaConsultaNumeroRodada->fetch()) {
				$numeroRodada = $row[0];
			}
				
			return $numeroRodada;
			
		}
		
		
	}
	
?>