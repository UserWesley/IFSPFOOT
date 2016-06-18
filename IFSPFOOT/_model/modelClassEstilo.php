<?php 
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassEstilo{
		
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
		
		//Consulta todos estilos
		public function consultaEstilo(){
			
			$estilosDisponiveis = array();
				
			$conn = Database::conexao();
				
			$consultaEstilo = 'SELECT id FROM Estilo';
			$preparaConsultaEstilo = $conn->query($consultaEstilo);
			$preparaConsultaEstilo->execute();
				
			$result = $preparaConsultaEstilo->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaEstilo->fetch()) {
					
				$estilosDisponiveis[]= $row[0];
					
			}
			
			return $estilosDisponiveis;
			
		}
		
		//Sorteia Estilo
		public function sortearEstilo($estilosDisponiveis){
			
			$valorMaximo = count($estilosDisponiveis);
			$nome = rand(1,$valorMaximo);
			
			return $nome;
		}
	}

?>