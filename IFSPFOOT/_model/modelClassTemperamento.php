<?php 
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassTemperamento{
		
		private $id;
		private $nome;
		
		//Getters e setters
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
		
		//Consulta Temperamento
		public function consultaTemperamento(){
				
			$temperamentosDisponiveis = array();
		
			$conn = Database::conexao();
		
			$consultaTemperamento = 'SELECT id FROM Temperamento';
			$preparaConsultaTemperamento= $conn->query($consultaTemperamento);
			$preparaConsultaTemperamento->execute();
		
			$result = $preparaConsultaTemperamento->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaTemperamento->fetch()) {
					
				$temperamentosDisponiveis[]= $row[0];
					
			}
				
			return $temperamentosDisponiveis;
				
		}
		//Sortea um temperamento
		public function sortearTemperamento($temperamentosDisponiveis){
				
			$valorMaximo = count($temperamentosDisponiveis);
			$nome = rand(1,$valorMaximo);
				
			return $nome;
		}
		
	}


?>