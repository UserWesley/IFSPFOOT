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

	}

?>