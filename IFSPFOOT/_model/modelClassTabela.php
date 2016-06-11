<?php 
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassTabela {
		
		//Variáveis
		private $id;
		private $vitoria;
		private $empate;
		private $derrota;
		private $ponto;
		
		//Getters e Setters
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getVitoria(){
			return $this->vitoria;
		}
		
		public function setVitoria($vitoria){
			$this->vitoria = $vitoria;
		}
		
		public function getEmpate(){
			return $this->empate;
		}
		
		public function setEmpate($empate){
			$this->empate = $empate;
		}
		
		public function getDerrota(){
			return $this->derrota;
		}
		
		public function setDerrota($derrota){
			$this->derrota = $derrota;
		}
		
		public function getPonto(){
			return $this->ponto;
		}
		
		public function setPonto($ponto){
			$this->ponto = $ponto;
		}
		
		public function cadastrarTabela($tabela){
		
			$conn = Database::conexao();
		
			$vitoria = $this->getVitoria();
			$empate = $this->getEmpate();
			$derrota = $this->getDerrota();
			$ponto = $this->getPonto();
		
			$insercaoNovaTabela = "INSERT INTO Tabela VALUES (DEFAULT,'$vitoria','$empate','$derrota','$ponto');";
			$conn->exec($insercaoNovaTabela);
			
		
		}
		
		public function recolherUltimoIdTabela(){
			
			$conn = Database::conexao();
				
			$consultaUltimoId = 'SELECT MAX(id) FROM Tabela;';
			$preparaConsultaUltimoId = $conn->query($consultaUltimoId);
			$preparaConsultaUltimoId->execute();
				
			$result = $preparaConsultaUltimoId->setFetchMode(PDO::FETCH_NUM);
			
			while ($row = $preparaConsultaUltimoId->fetch()) {
				$id = $row[0];
			}
				
			return $id;
			
			
		}
		
	}

?>