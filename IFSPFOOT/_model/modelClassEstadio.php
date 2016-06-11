<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassEstadio{
		
		private $id;
		private $nome;
		private $capacidade;
		
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
		
		public function getCapacidade(){
			return $this->capacidade;
		}
		
		public function setCapacidade($capacidade){
			$this->capacidade = $capacidade;
		}
		
		public function cadastrarEstadio($estadio){
		
			$conn = Database::conexao();
		
			$nome = $this->getNome();
			$capacidade = $this->getCapacidade();
		
			$insercaoNovoEstadio = "INSERT INTO Estadio VALUES (DEFAULT,'$nome','$capacidade');";
			$conn->exec($insercaoNovoEstadio);
		
		}
		
		public function recolheUltimoIdEstadio(){
			
			$conn = Database::conexao();
				
			$consultaUltimoId = 'SELECT MAX(id) FROM Estadio;';
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