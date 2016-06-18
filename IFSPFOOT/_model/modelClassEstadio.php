<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassEstadio{
		
		private $id;
		private $nome;
		private $capacidade;
		private $campeonato;
		
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
		
		public function getCampeonato(){
			return $this->campeonato;
		}
		
		public function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}
		
		public function cadastrarEstadio($estadio){
		
			$conn = Database::conexao();
		
			$nome = $this->getNome();
			$capacidade = $this->getCapacidade();
		
			$insercaoNovoEstadio = "INSERT INTO Estadio VALUES (DEFAULT,'$nome','$capacidade');";
			$conn->exec($insercaoNovoEstadio);
		
		}
		
		//Esta consulta irá recolher e retorna o ultimo id de estadio registrado e retorna-lo
		public function recolheUltimoIdEstadio($estadio){
			
			$idCampeonato = $this->getCampeonato();
			
			$conn = Database::conexao();
				
			$consultaUltimoId = 'SELECT MAX(id) FROM Estadio WHERE campeonato = ?;';
			$preparaConsultaUltimoId = $conn->prepare($consultaUltimoId);
			$preparaConsultaUltimoId->bindValue(1, $idCampeonato);
			$preparaConsultaUltimoId->execute();
				
			$result = $preparaConsultaUltimoId->setFetchMode(PDO::FETCH_NUM);
			
			while ($row = $preparaConsultaUltimoId->fetch()) {
				$id = $row[0];
			}
				
			return $id;
			
		}
		
		//Esta consulta irá obter e retorna os dados do estádio do time
		public function consultaEstadio($estadio){

			$dadosEstadio = array();
			
			$id = $this->getId();
			$conn = Database::conexao();
		
			$consultaEstadio = 'SELECT nome,capacidade FROM Estadio WHERE id = ? ';
			$preparaConsultaEstadio = $conn->prepare($consultaEstadio);
			$preparaConsultaEstadio->bindValue(1, $id);
			$preparaConsultaEstadio->execute();
			
			$result = $preparaConsultaEstadio->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaEstadio->fetch()) {
				
				$dadosEstadio = $row[0];
				$dadosEstadio = $row[1];
				
			}
			return $dadosEstadio;
				
		}
		
	}


?>