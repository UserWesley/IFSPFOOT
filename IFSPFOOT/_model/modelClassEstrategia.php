<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassEstrategia{
		
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
		
		public function cadastrarEstrategia($estrategia){
				
			$conn = Database::conexao();
				
			$nome = $this->getNome();

			$insercaoNovaEstrategia = "INSERT INTO Estrategia VALUES (DEFAULT,'$nome')";
			$conn->exec($insercaoNovaEstrategia);
				
		}
		
		//Consulta todos nome de estrategias disponiveis para cadastro time
		public function consultaEstrategia(){
				
			$estrategiasDisponiveis = array();
				
			$conn = Database::conexao();
				
			$consultaEstrategia = 'SELECT id FROM Estrategia;';
			$preparaConsultaEstrategia= $conn->query($consultaEstrategia);
			$preparaConsultaEstrategia->execute();
				
			$result = $preparaConsultaEstrategia->setFetchMode(PDO::FETCH_NUM);
		
			while ($row = $preparaConsultaEstrategia->fetch()) {
		
				$estrategiasDisponiveis[] = $row[0];

		
			}
			
			return $estrategiasDisponiveis;
		}
		
		//Consulta todas estrategia disponiveis para menu
		public function consultaEstrategiaMenu(){
			
			$estrategiasDisponiveis = array();
			
			$conn = Database::conexao();
			
			$consultaEstrategia = 'SELECT id,nome FROM Estrategia;';
			$preparaConsultaEstrategia= $conn->query($consultaEstrategia);
			$preparaConsultaEstrategia->execute();
			
			$result = $preparaConsultaEstrategia->setFetchMode(PDO::FETCH_NUM);
				
			while ($row = $preparaConsultaEstrategia->fetch()) {
				
				$estrategiasDisponiveis[] = $row[0];
				$estrategiasDisponiveis[] = $row[1];
				
			}
			
			return $estrategiasDisponiveis;
			
		}
		
		//Sorteia estrategia disponivel para cadastro de time
		public function sortearEstrategia($estrategiasDisponiveis){
			
			$valorMaximo = count($estrategiasDisponiveis);
			$estrategia = rand(1,$valorMaximo);
			return $estrategia;
			
		}
		
	}

?>